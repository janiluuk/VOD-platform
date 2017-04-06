<?php
class ApiTvController extends WSController
{

    // Initialize new session

    public function actionGetSession()
    {

        $unpair = Yii::app()->request->getQuery('unpair');

        if ($unpair == 1 && $this->authenticated) {
            $session = VodPendingActivation::model()->find("t.user_id=:id and ipAddress=:ip", array(
                "id" => $this->_user->id,
                "ip" => $this->_ip_address,
            ));
            $session->status = 0;
            $session->save();
        }

        $activation = VodPendingActivation::model()->getNew($this->_useragent, $this->_ip_address);
        if ($this->authenticated) {
            $this->actionSession($activation);
        }

        // Generate activation code
        $data = array(
            "activationCode" => $activation,
        );
        $this->sendResponse(200, $data);
    }

    // Get session data if authenticated

    public function actionSession($id = '')
    {

        $unpair = Yii::app()->request->getQuery('unpair');
        $deviceInfo = Yii::app()->request->getQuery('deviceInfo');

        $model = VodPendingActivation::model();

        if ($unpair == 1) {
            if ($model->unpair($id, $this->_ip_address)) {
                $this->sendResponse(200, "Logged out");
            } else {
                $this->fail("Could not unpair session this time.");
            }
        }

        if (!$activation = $model->find("t.activationKey=:key and t.status>0", array(
            "key" => $id,
        ))) {
            if (!$activation = $model->find("t.activationKey=:key", array(
                "key" => $id,
            ))) {
                $this->sendResponse(200, "Session not found");
            }

        }

        if (empty($this->_user)) {
            $this->_user = GonzalesUser::model()->generateAppUser($activation);
        }
        if (empty($activation->user_id)) {
            $activation->user_id = $this->_user->id;
        }

        $activation->deviceInfo = $deviceInfo;
        $activation->save();
        $data = $activation->getCookieData();
        $profiledata = $this->_user->getAccountData(true);

        if (!empty($profiledata)) {
            $data["profile"] = $profiledata;
        }

        $this->sendResponse(200, $data);
    }

    /*
     * Poll for session with given key, and activate it if one found.
     * This is used by the device after pair procedure has started.
     *
     * @params int activation key
     */

    public function actionPairSession($key)
    {

        $activationKey = VodPendingActivation::model()->find("t.activationKey=:key and t.status>=:status", array(
            'key' => $key,
            'status' => VodPendingActivation::STATUS_ACTIVE,
        ));

        if ($activationKey) {

            $activationKey->userAgent = $this->_useragent;

            if ($this->_user) {
                $activationKey->user_id = $this->_user->id;
            }
            $activationKey->ipAddress = $this->_ip_address;
            $activationKey->status = VodPendingActivation::STATUS_PAIRED;
            $activationKey->save();

            $this->success(array(
                "status" => "ok",
                "message" => "Session pairing successful",
                "data" => $activationKey->getCookieData(),
            ));
        } else {
            $this->fail("Activation key not valid");
        }
    }

    /**
     * Unpair device from the web interface
     *
     * @param string email
     * @param int id of the session
     */

    public function actionUnpair($email, $id)
    {
        if ($this->_user) {
            $user_id = $this->_user->profile->id;
        } else if ($profile = YumProfile::model()->find("email = :email", array(
            "email" => $email,
        ))) {
            $user_id = $profile->user->id;
        } else {
            $this->response(Ticket::STATUS_USER_NOT_FOUND);
            Yii::app()->end();
        }

        if ($user_id && $session = VodPendingActivation::model()->find("t.id=:id", array("id" => $id))) {
            if ($session->User->profile->email == $email) {

                $session->delete();
                $this->success(array(
                    "status" => "ok",
                    "message" => "Device unpaired successfully",
                ));
                Yii::app()->end();
            }
        }
        $this->response(
            "error", "Could not delete the device"
        );
    }

    /**
     * Handle activating the session from the web interface
     *
     * @param $email string email-address
     * @param $key string key to pair the session with
     *
     */

    public function actionActivateSession($email, $key)
    {
        if ($this->_user) {
            $profile = $this->_user->profile;
        } else if (!$profile = YumProfile::model()->find("email = :email", array(
            "email" => $email,
        ))) {
            $this->response(Ticket::STATUS_USER_NOT_FOUND);
            Yii::app()->end();
        }

        $activationKey = VodPendingActivation::model()->find("t.activationKey=:key", array(
            'key' => $key,
        ));

        if ($activationKey) {
            if ($activationKey->status > VodPendingActivation::STATUS_ACTIVE) {
                $this->success(array(
                    "status" => "error",
                    "message" => "Device already paired!",
                ));
            }
            $activationKey->status = VodPendingActivation::STATUS_ACTIVE;
            $activationKey->user_id = $profile->user->id;
            if ($activationKey->save()) {
                $this->success(array(
                    "status" => "ok",
                    "message" => "Device successfully paired!",
                ));
            }

        }
        $this->response(Ticket::getStatusCode(Ticket::STATUS_PAIRING_FAILED));
    }

    /**
     * Search for content. Usually used for initial content fetching
     *
     * Accepted query variables;
     * int limit,
     * short 0|1
     * string q
     * string durations,periods,genres divided by ;
     *
     */

    public function actionSearch()
    {

        $limit = Yii::app()->request->getQuery('limit', Yii::app()->params['api']['search']['defaultLimit']);
        $short = Yii::app()->request->getQuery('short', false);
        $offset = Yii::app()->request->getQuery('offset', false);

        $fulldetails = $short ? false : true;

        foreach (array('q', 'durations', 'periods', 'genres') as $param) {

            $value = Yii::app()->request->getQuery($param, '');
            if (!empty($value)) {
                $parts = explode(';', $value);
                if (sizeof($parts) > 1) {
                    $searchParams[$param] = $parts;
                } else {
                    $searchParams[$param] = $value;
                }

            }
            $queryParams .= $value;

        }

        // Generate session

        $activationCode = false;

        if (empty($this->_session_key)) {
            $activationCode = VodPendingActivation::model()->getNew($this->_useragent, $this->_ip_address);
        }

        // Generate cache ID

        $cacheSuffix = ($fulldetails === true) ? "full" : "short";
        $cacheId = md5($this->_distributor->id . $limit . "_" . $cacheSuffix . "_" . $queryParams);

        $distributorDependency = new CDbCacheDependency('SELECT MAX(updated_at) from vod_distributor');
        $vodDependency = new CDbCacheDependency('SELECT MAX(updated_at) from vod_title');
        $genreDependency = new CDbCacheDependency('SELECT MAX(updated_at) from vod_genre');

        $chainedCache = new CChainedCacheDependency(array(
            $distributorDependency,
            $vodDependency,
        ));

        /* Cached Content */

        if (!$this->cacheEnabled || !$data = Yii::app()->cache->get($cacheId)) {

            $dataProvider = new CActiveDataProvider(VodTitle::model()->with_distributor($this->_distributor->id)->approved()->newest()->with_title($searchParams["q"])->with_periods($searchParams["periods"])->with_category($searchParams["genres"])->with_durations($searchParams["durations"]), array(
                'pagination' => array(
                    'pageSize' => $limit,
                    'offset' => $offset,
                ),
            ));

            $models = $dataProvider->getData();

            $data = array();

            foreach ((array) $models as $model) {
                $data[] = array(
                    "id" => $model->id,
                    "film" => $model->getSummaryData($fulldetails, $this->_distributor->id, true),
                );
            }

            if ($this->cacheEnabled) {
                Yii::app()->cache->set($cacheId, $data, 60 * 60 * 96, $chainedCache);
            }

        }

        /* Cached Genres */

        if (!$this->cacheEnabled || !$genrelist = Yii::app()->cache->get($this->_distributor->id . "_genrelist")) {
            $genres = VodGenre::model()->active()->with_distributor($this->_distributor->id)->getGenres();
            $lists = VodGenre::model()->active()->with_distributor($this->_distributor->id)->getLists();
            $i = 0;
            foreach ((array) $lists as $list) {
                $lists[$i]['type'] = "list";
                $i++;
            }
            $genrelist = array_merge((array) $lists, $genres);
            if ($this->cacheEnabled) {
                Yii::app()->cache->set($this->_distributor->id . "_genrelist", $genrelist, 60 * 60 * 72, $genreDependency);
            }

        }

        /* Payment methods for this distributor */

        $payment_methods = TicketPaymentMethod::model()->active()->with_distributor($this->_distributor)->getDataSummary();

        /* Banner items for this distributor */

        $banners = VodBanner::model()->active()->with_distributor($this->_distributor)->getDataSummary();

        /* Subscriptions for this distributor */

        $subs = VodSubscription::model()->getDataSummary();

        $results = array(
            'results' => $data,
            'subscriptions' => $subs,
            'paymentmethods' => $payment_methods,
            'banners' => (array) $banners,
            'queue' => array(),
            'activationCode' => $activationCode,
            'genres' => $genrelist,
            'search' => $searchParams,
            'pagination' => CJSON::decode('{"count": ' . count($data) . ', "page_range": [1, 2, 3, "...", 40], "has_next": true, "num_pages": 40, "page_start_index": 1, "has_previous": false, "current_page": 1, "next_page_number": 2, "page_end_index": 60, "previous_page_number": 0}'),
        );

        $this->sendResponse(200, $results, "application/json");
    }

}
