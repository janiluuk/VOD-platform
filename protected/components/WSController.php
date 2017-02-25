<?php
class WSController extends GxController
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_FILM_NOT_FOUND = 2;
    const STATUS_USER_NOT_FOUND = 3;
    const STATUS_PAYMENT_METHOD_NOT_FOUND = 4;
    const STATUS_PRICE_CLASS_NOT_FOUND = 5;
    const STATUS_SESSION_NOT_FOUND = 6;
    const STATUS_INVALID_AUTH_KEY = 7;
    const STATUS_TICKET_EXPIRED = 8;
    const STATUS_NOT_YET_ACTIVE = 9;
    const STATUS_UNKNOWN = 10;
    const STATUS_TICKET_NOT_FOUND = 11;
    const STATUS_USER_ACTIVATION_FAILURE = 12;
    const STATUS_IP_ADDRESS_MISMATCH = 13;
    const STATUS_ACTIVATION_FAILED = 14;
    const STATUS_NO_ACCESS = 15;
    const STATUS_INVALID_REQUEST = 16;
    const STATUS_INVALID_CONTENT_TYPE = 17;
    const STATUS_INSUFFICIENT_AMOUNT_PAID = 18;
    const STATUS_PAIRING_FAILED = 19;
    const STATUS_BANK_CONFIGURATION_FAILED = 20;  
    const STATUS_AUTH_CODE_NOT_FOUND= 21; 
    const STATUS_ORDER_NOT_FOUND = 22;
    const STATUS_NEEDS_AUTHENTICATION = 30;
    const STATUS_INVALID_PASSWORD = 31;
    const STATUS_USER_EXISTS = 32;
    const STATUS_INVALID_TOKEN = 33;
    const STATUS_GEO_IP_FAILURE = 34;
    const STATUS_GEO_RESTRICTED = 35;
    /** Session */
    const STATUS_SESSION_TERMINATED = 97;
    const STATUS_SESSION_EXPIRED = 98;
    const STATUS_SESSION_OVERRIDEN = 99;
    const STATUS_SESSION_ACTIVE = 100;
    const STATUS_SESSION_IDLE = 101;
    const STATUS_SESSION_ACTIVE_MESSAGE_WAITING = 102;
    const STATUS_SESSION_ACTIVE_CONFIRM_WAITING = 103;

    // Output format xml|json
    public $output = "/api/xml";
    public $layout = "json";
    protected $authenticated = false;
    protected $log;
    protected $parameters = array();
    protected $_distributor = null;
    protected $_api_key = null;
    protected $_user = null;
    protected $_lang = "en";
    protected $cacheEnabled = true;
    protected $_password = null;
    protected $_ip_address = null;
    protected $_session_key = null;
    protected $_auth_key = null;
    protected $_useragent = null;
    protected $filters;
    protected $format;

    //    protected $filters = array("timestamp" => array("query" => "updated_at","operator" => ">" "value" => ""))
    protected $queryfilter = "";
    public function accessRules() {
        
        return array(
            array(
                'allow',
                'users' => array(
                    '*'
                ) ,
            ) ,
        );
    }
    
  
      /* Prefilters for ApiController requests */

    public function filters() {
        
        return array(
            'GeoRestricted + PurchaseBalance,Purchase,Authorize_Film,New_token,Get_token,PurchaseSubscription',
            //   'accessControl', // perform access control for CRUD operations
            'apiContext - PaymentReturnEstlink -PaymentCancel -Cancel',
            array(
                'COutputCache + credits + genre ',
                 //cache the entire output from    the actionView() actionMovies() and actionMovie() method for 10 minutes
                'duration' => 600,
                'varyByParam' => array(
                    'timestamp'
                ) ,
            ) ,
        );
    }

    /*
     * Perform a user authentication
     * @params string $username username
     * @params string $password password
     * @return GonzalesUser object
    */
    public function authenticateUser($username, $password) {
        $user = new GonzalesUser;
        $user->username = $username;
        $user->password = $password;
        if (!$valid_user = $user->authenticate($user)) {
            
            throw new ApiException("Could not authenticate user {$username}", self::STATUS_INVALID_PASSWORD);
        } 
        else {
            
            return $valid_user;
        }
    }
    
    public function authenticateToken() {
        try {
            if ($userInformation = GonzalesUser::model()->authenticateToken($this->_session_key, $this->_auth_key, $this->_ip_address, $this->_useragent)) {
                $this->_user = $userInformation;
                $this->authenticated = true;
                return $userInformation;
            }
        }
        catch(Exception $e) {
            Gonzales::log($e->getMessage() , $this, 'trace');
            
            //   $this->sendResponse(200,  array("status" => "error", "message" => $e->getMessage()) );
        }
        
        return false;
    }
    
    /*
     * Generate initial log entry for the request
     * @params ContentDistributor $distributor Distributor object
     * @return ContentDistributorLog object
    */
    protected function generateLogEntry(ContentDistributor $distributor) {
        
        $command_parts = explode("?", $_SERVER["REQUEST_URI"]);
        $commands = $command_parts[0];


        $commands = explode("/", $commands);
        
        array_shift($commands);
        array_shift($commands);
        $command = implode("/",$commands);
        $log_entry = new ContentDistributorLog;
        $log_entry->distributor_id = $distributor->id;
        $log_entry->request_path = $_SERVER["REQUEST_URI"];
        $log_entry->ip_address = $this->_ip_address;
        $log_entry->request = $command;
        $log_entry->log_time = date("Y-m-d H:i:s");
        $log_entry->save();

        foreach ((array)$commands as $cmd) {
            if (strlen($cmd) == 32) $log_entry->session_id = $cmd;
        }
        if ($this->_session_key && strlen($this->_session_key) == 32) $log_entry->session_id = $this->_session_key;
        
        foreach ($_REQUEST as $key => $var) {
            
            // Assign parameters and set filters
            $this->parameters[$key] = $var;
            if (isset($this->filters[$key])) $this->filters[$key]["value"] = $var;
        }
        
        return $log_entry;
    }

    /**
     * Get requested variable or revert to default
     *
     * If default empty and error message passed, 
     * throw error message and end the app.
     * @param string $item - Query attribute
     * @param string $default - Default value
     * @param string $errorMsg - Message to display if no default or string found
     * @return mixed
     * 
     */
    

    protected function getRequest($item, $default='', $errorMsg='') { 
        
        if (isset($_REQUEST[$item]) && !empty($_REQUEST[$item])) { 
            return $_REQUEST[$item];
        }
        if (!empty($errorMsg) && empty($default)) {
            $this->fail($errorMsg);
        }

        return $default;
    }
    
    /**
     * @param \CFilterChain $filterChain
     */
    public function filterAuthenticatedOnly($filterChain)
    {
        if (Yii::app()->user->isGuest) {
            $this->fail("Authenticated users only");
        }
        $filterChain->run();
    }
    /**
     * @param \CFilterChain $filterChain
     */
    public function filterGeoRestricted($filterChain)
    {
        if (!$this->validateCountry()) {
            $this->fail(self::STATUS_GEO_RESTRICTED);
        }
        $filterChain->run();
    }

    /**
     * @param \CFilterChain $filterChain
     */
    public function filterEnsureToken($filterChain)
    {
        $this->getRequest('token','', self::STATUS_INVALID_TOKEN));
        $filterChain->run();

    }

    public function filterApiContext($filterChain) {
        

        
        try {
            
            $this->_api_key = $this->getRequest('api_key', "");
            $this->_ip_address = $this->getRequest('ip_address', $_SERVER['REMOTE_ADDR']);
            
            //set the distributor identifier based on either the GET or POST input
            //request variables, since we allow both types for our actions    
                    
            if (!$this->_distributor = ContentDistributor::model()->authenticate($this->_api_key, $this->_ip_address)) {
                throw new ApiException(403, Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
            }
            
            $this->_useragent = $_SERVER['HTTP_USER_AGENT'];
            $this->_auth_key = $this->getRequest('authId', '');
            $this->_session_key = $this->getRequest('sessionId', "");
            $this->_lang = $this->getRequest('lang', empty($distributor->language) ? $this->_lang : $distributor->language);
            $this->_distributor->last_access = date('Y-m-d H:i:s');
            $this->_distributor->save();
            
            // Clear cache with cache=false
            
            $this->cacheEnabled = Yii::app()->request->getQuery('cache', true) === "false" ? false : true;
            if (!$this->cacheEnabled) {
	
                Yii::app()->cache->flush();
            }
            
            $this->log = $this->generateLogEntry($this->_distributor);
            
            if (!empty($this->_auth_key)) {
                $this->authenticateToken();
            }
            
            Gonzales::log('Request:' . $_SERVER["REQUEST_URI"] .' with api key ' . $this->_api_key . ' from IP ' . $this->_ip_address , $this, 'api', $this->log->session_id ? $this->log->session_id : $this->log->request);
            
            if (isset($_REQUEST['format']) && $_REQUEST['format'] =='json') {
                $this->output = "/api/index";
            }
        }
        catch(Exception $e) {
            Gonzales::log($e->getMessage() , $this, 'trace');
            throw $e;
        }
        
        /* Handle Cors */

        $url = $this->_distributor->url;
        $host = '';
         
        $hosts = Yii::app()->params['api']['access_control_origin_allow'];
        if (in_array('*', $hosts)) {
            $host = '*';           
        } else {
            if (in_array($_SERVER['REMOTE_ADDR'], Yii::app()->params['api']['access_control_origin_allow'])) {
                $host = $_SERVER['REMOTE_ADDR'];
            }   
        }

        if (!empty($url)) {
            header("Access-Control-Allow-Origin: " . $host);
        }

        //complete the running of other filters and execute the requested action
        $filterChain->run();
    }
    
    public function validateCountry() {
        $ip = $this->checkIPaddress();
        $location = Gonzales::getCountry($ip);
        if ($ip == "127.0.0.1") $location = "FI";
        if (empty($location)) {
            return false;
        }
        if (!empty(Yii::app()->params['allowed_country_codes']) && (!in_array($location, Yii::app()->params['allowed_country_codes'])) {
            return false;
        }

        Gonzales::log("{$ip} located at " . Gonzales::getLocation($ip) , $this, 'api');
        return true;
    }

    public function checkIPaddress($ip_address = "") {
        $ip = $this->getRequest('ip_address', $ip_address);

        if (empty($ip)) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if (empty($ip)) $this->response("No IP address provided!");
        }
        $this->_ip_address = $ip;
        
        return $ip;
    }
    public function getFilters() {
        
        foreach ((array)$this->filters as $filter) {
            $filter = new CDbCriteria();
            if ($filter["value"] != "") {
                $criteria = new CDbCriteria();
                $criteria->compare($filter["query"], $filter["operator"] . $filter["value"]);
                $criteria->mergeWith($filter);
            }
        }
        
        return $this->queryfilter;
    }

    /*
     * Shorthand function for making prompt response for errors / status updates, logs the essential info
     * @params string $status status code
    */
    protected function response($status, $message = "") {
        $statuscode = is_array($status) && isset($status["status"]) ? $status["status"] : $status;
        if (is_int($status) && empty($message)) $message = $this->getStatusCodeMessage($status);
        
        if ($this->log) {
            $this->log->response = $message;
            $this->log->status = $status;
            $this->log->save();
        }
        
        Gonzales::log("Status: $statuscode - $message", $this, 'api');
        
        $this->render($this->output, array(
            'data' => array(
                'status' => $status == "0" ? "ok" : $statuscode,
                'message' => $message,
            )
        ));
        Yii::app()->end();
        
    }
    
    protected function success($data, $status = "ok") {
        
        $field = "data";
        if (is_string($data)) {
                $field = "message";        
        }
        $res = array(
            'data'=>array(
                "status" => $status,
                $field => $data
            )
        );
        if (is_array($data)) $res['data'] = $data;

        $msg = $status;

        if ($status == "ok") $status = 200;
        
        if (!empty($res["message"])) $msg.=" - " . $res["message"];

        $this->onSuccess($msg);

        $this->render($this->output, $res);
        Yii::app()->end();
    }
    
    protected function fail($message, $status = "fail") {
        if (is_int($message)) {
            $message = $this->getStatusCodeMessage($message);
        }
        $data = array(
            'data'=>array(
                "status" => $status,
                "message" => $message
            )
        );
        $this->onError($message);

        $this->render($this->output, $data);
        Yii::app()->end();
    }
    
    public function processResponse($view, $data_array = array()) {
        if (isset($_REQUEST["timestamp"]) || isset($this->parameters["timestamp"])) {
            $data = $data_array["data"];
            if (!empty($data) && is_array($data)) {
                $filterfield = "updated_at";
                $filtervalue = $_GET["timestamp"];
                $keys = array_keys($data);
                
                foreach ($keys as $key) {
                    if (is_array($data[$key])) {
                        if (isset($data[$key][$filterfield])) {
                            $filtered_data = "";
                            if ($data[$key][$key][$filterfield][0] == "2") $filtered_data = strtotime($data[$key][$filterfield]);
                            if (empty($filtered_data)) $filtered_data = $data[$key][$filterfield];
                            if ($filtered_data < $filtervalue) continue;
                            else $new_data[] = array(
                                "id" => $data[$key]["id"],
                                $filterfield => $filtered_data
                            );
                        }
                    }
                }
                if (is_array($new_data)) usort($new_data, function ($func_a, $func_b) {
                    if ($func_a[$filterfield] == $func_b[$filterfield]) return 0;
                    
                    return ($func_a[$filterfield] < $func_b[$filterfield]) ? -1 : 1;
                });
            }
            $data = $new_data;
            $data_array["data"] = $data;
        } 
        else {
            if (isset($data_array["data"]["updated_at"]) && ($data_array["data"]["updated_at"][4] == "-")) {
                $data_array["data"]["updated_at"] = strtotime($data_array["data"]["updated_at"]);
            }
        }
        $this->render($view, $data_array);
    }
    
    /*
     *  Log a failed response.
     *  @params string Message
     * 
     */
     
    protected function onError($message) {

        if ($this->log) {
            $this->log->status = "fail";
            $this->log->response = $message;
            $this->log->save();
        }
        Gonzales::log("ERROR: ".$message . "  request " . $this->log->request , $this, 'api');
    }
        /*
     *  Log a successful response.
     *  @params string Message
     * 
     */
     
    protected function onSuccess($message) {

        if ($this->log) {
            $this->log->status = "ok";
            $this->log->response = is_array($message) ? var_export($message,true) : $message;
            $this->log->save();
            
        }
        Gonzales::log("SUCCESS: $status - $message", $this, 'api');
    }

    /*
     * Get essential info on the request
     * @return array
    */
    
    protected function getRequestInfo() {
        return array(
            "request" => !empty($_REQUEST) ? serialize($_REQUEST) : array() ,
            "user" => $this->_user->attributes ? serialize($this->_user->attributes) . serialize($this->_user->profile->attributes) : "",
            "distributor_ip_address" => $this->_ip_address,
            "distributor" => $this->_distributor
        );
    }
    
    public function getDeletedSyncData(CActiveRecord $model, $updated_at = "0") {
        $data = array();
        $items = $model->deleted()->findAll();
        
        foreach ((array)$items as $item) {
            $data[] = array(
                "id" => $item->id,
                "updated_at" => strtotime($item->updated_at)
            );
        }
        $this->processResponse('//api/index', array(
            'data' => (array)$data
        ));
    }
    
    public function getSyncData(CActiveRecord $model, $updated_at = "0") {
        $table = $model->tableName();
        if ($updated_at == "0" && $this->parameters["timestamp"] > 0) $updated_at = $this->parameters["timestamp"];
        
        $items = Yii::app()->db->createCommand()->select('id, updated_at')->where("updated_at > '" . date("Y-m-d H:i:s", $updated_at) . "'")->from($table)->queryAll();
        if (!empty($items[0]["updated_at"]) && (!is_int($items[0]["updated_at"]))) {
            
            foreach ($items as $item) {
                $data[] = array(
                    "id" => $item["id"],
                    "updated_at" => strtotime($item["updated_at"])
                );
            }
        }
        $this->processResponse('//api/index', array(
            'data' => (array)$data
        ));
    }
    
    public function sendSyncData($array) {
        
        foreach ((array)$array as $item) {
            $data[] = array(
                "id" => $item->id,
                "updated_at" => strtotime($item->updated_at) ,
            );
        }
        
        $this->processResponse('//api/index', array(
            'data' => (array)$data
        ));
    }
    
    /**
     * Send raw HTTP response
     * @param int $status HTTP status code
     * @param string $body The body of the HTTP response
     * @param string $contentType Header content-type
     * @return HTTP response
     */
    protected function sendResponse($status = 200, $body = '', $contentType = 'application/json') {
        
        $statusText = "ok";
        
        if ($status && $status != 200) {
            
            $statusText = $this->getStatusCodeMessage($status);
        
        }
        if (is_string($body) && $contentType == "application/json") { 
            $body = array(
            'status' => $statusText,
            'message' => $body
            );
        }
        
        if ($contentType == "application/json" && is_array($body)) $body = CJSON::encode($body);

        $callback = $this->getRequest( "callback", $_REQUEST["jsoncallback"]);
        if (!empty($callback)) $body = $callback."(".$body.")";

        
        // Set the status
        $statusHeader = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusCodeMessage($status);
        header($statusHeader);
        // Set the content type
        header('Content-type: ' . $contentType);
        
        if ($this->log) {
            $this->log->status = $status;
            $this->log->response = substr($body, 0, 70) . "...";
            $this->log->save();
        }
        
        echo $body;
        Yii::app()->end();
    }
    
    /*
     * Get authentication token for the user.
     * @params string $username username or e-mail address
     * @params string $password md5 password if registered user.
     * @params string $ip_address IP address of the client
    */
    
    public function generateToken($username, $password = "", $ip_address = "") {
        
        try {
            $user = new GonzalesUser;


            // E-mail registration
            //
            //
            $email = $username;
            
            Gonzales::log("Authenticating {$username}", $this, 'api');
            if (empty($password) && (filter_var($username, FILTER_VALIDATE_EMAIL))) {
                
                if ($valid_user = $user->find("username=:email", array(
                    "email" => $email
                ))) {
                    
                    $email = $username;
                    Gonzales::log("Found user with email {$email}", $this, 'api');
                    
                    // Check that user is anonymous and he doesnt have real account.
                    // If does, drop an error.
                    //        echo $valid_user->username; echo $this->_user->username;
                    if ($valid_user->username == $this->_user->username) {
                        Gonzales::log("Found user {$username}, returning activationkey", $this, 'api');
                                      return $this->_user->activationKey;
                    }
                    if ($valid_user->isRegisteredUser()) {
                        Gonzales::log("{$username} is registered user, generating token based on password", $this, 'api');
                        
                        //$this->response(self::STATUS_NEEDS_AUTHENTICATION);
                        if (!$this->_user && $this->_user->username != "_anonymousv") $valid_user->activationKey = $key = $valid_user->generateActivationKey(false, $valid_user->password);
                        else return $valid_user->activationKey;
                    }
                    if (empty($valid_user->activationKey)) $key = $valid_user->generateActivationKey();
                    
                    // Not found, generate anonymous user
                
    
                } 
                elseif (!$valid_user = $user->generateAnonymousUser($email)) {
                    Gonzales::log("Failed to handle registered user {$username}, fallback to anonymous", $this, 'api');
                    
                    throw new ApiException("Could not generate user for email {$user->email}");
                }

            }
            
            /* Password or facebook auth */
            elseif (!empty($username) && (!empty($password))) {
                
                Gonzales::log("Authenticating {$username} with {$password}", $this, 'api');
                if ($valid_user = $this->authenticateUser($username, $password)) {
                    Gonzales::log("Authentication successful for $username", $this, 'api');
                    
                    if ($profile = $user->find("username=:email", array(
                        "email" => $email
                    ))) {
                        
                        $key = $profile->activationKey;
                    }
                }
            }

            if (!empty($key)) $valid_user->activationKey = $key;
            else $key = $valid_user->generateActivationKey();
            if (empty($this->_user)) {
                if (!$this->_user = $valid_user->assignActivationKey($key)) throw new ApiException("Could not assign activation key {$key} for {$username}");
            }
            
            if (!isset($this->_user) || !isset($this->_user->activationKey)) {
                
                throw new ApiException("Could not generate user for email {$user->email}");
            } 
            else {
                
                return $this->_user->activationKey;
            }
        }
        catch(Exception $e) {
            Gonzales::log($e->getMessage() , $this, 'api');
            $this->response($e->getCode() , $e->getMessage());
        }
    }
    
    /**
     * Return the http status message based on integer status code
     * @param int $status HTTP status code
     * @return string status message
     */
    protected function getStatusCodeMessage($status) {

        $codes = array(

            self::STATUS_INACTIVE => "Ticket inactive",
            self::STATUS_ACTIVE => "Ticket Active", 
            self::STATUS_FILM_NOT_FOUND => "Film not found", 
            self::STATUS_USER_NOT_FOUND => "User not found",
            self::STATUS_PAYMENT_METHOD_NOT_FOUND => "Payment method not found", 
            self::STATUS_AUTH_CODE_NOT_FOUND => "Invalid code",
            self::STATUS_PRICE_CLASS_NOT_FOUND => "Price class not found", 
            self::STATUS_SESSION_NOT_FOUND => "Session not found", 
            self::STATUS_ORDER_NOT_FOUND => "Order not found", 
            self::STATUS_INVALID_AUTH_KEY => "Invalid authentication information",
            self::STATUS_TICKET_EXPIRED => 'Ticket has expired', 
            self::STATUS_NOT_YET_ACTIVE => "Ticket is not yet active", 
            self::STATUS_UNKNOWN => "Unknown error", 
            self::STATUS_TICKET_NOT_FOUND => "Ticket not found", 
            self::STATUS_USER_ACTIVATION_FAILURE => "User activation failure", 
            self::STATUS_IP_ADDRESS_MISMATCH => "IP address mismatch ", 
            self::STATUS_ACTIVATION_FAILED => "Activation failed", 
            self::STATUS_NO_ACCESS => "No access for this film", 
            self::STATUS_INVALID_REQUEST => "Invalid request", 
            self::STATUS_INVALID_CONTENT_TYPE => "Insufficient amount paid", 
            self::STATUS_INSUFFICIENT_AMOUNT_PAID => "Insufficient amount paid", 
            self::STATUS_PAIRING_FAILED => "Invalid pairing code", 
            self::STATUS_BANK_CONFIGURATION_FAILED => "Could not load bank configuration",           
            self::STATUS_NEEDS_AUTHENTICATION => "Authentication needed",
            self::STATUS_INVALID_PASSWORD => "Invalid password",
            self::STATUS_USER_EXISTS => "User exists", 
            self::STATUS_INVALID_TOKEN =>"Invalid token information", 
            self::STATUS_GEO_IP_FAILURE => "GeoIP failure",
            self::STATUS_GEO_RESTRICTED => "This product is not available in your country",
                    /* Http codes */

            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
        );
        
        return (isset($codes[$status])) ? $codes[$status] : 'Unknown';
    }
    
    /**
     * Gets RestFul data and decodes its JSON request
     * @return mixed
     */
    public function getJsonInput() {
        
        return CJSON::decode(file_get_contents('php://input'));
    }
}
?>
