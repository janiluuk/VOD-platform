<?php

/**
 * Controller is the customized base controller class.
 * Includes menu and breadcrumbs + default layout for views
 */
abstract class Controller extends CController
{

    /**
     * meaning using a menu layout. See 'protected/views/layouts/column_1'.
     */
    public $layout = 'application.views.layouts.column1_menu';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array Menu item for single model view {@link CMenu::items}.
     */

    public $detailmenu = array();

    public $pageTitle = "";

    public $contextmenu = array();
    public $menuGroup = "";

    /**
     * @var array The breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    private $_model = null;

    public function __toString()
    {
        return get_class($this);
    }

    /**
     * Returns the data model based on the primary key or another attriˇute.
     * This method is designed to work with the values passed via GET.
     * If the data model is not found or there's a malformed key, an
     * HTTP exception will be raised.
     * #MethodTracker
     * This method is based on the gii generated method controller::loadModel, from version 1.1.7 (r3135). Changes:
     * <ul>     * <li>Support to composite PK.</li>
     * <li>Support to use any attribute (column) name besides the PK.</li>
     * <li>Support to multiple attributes.</li>
     * <li>Automatically detects the PK column names.</li>
     * </ul>
     * @param mixed $key The key or keys of the model to be loaded.
     * If the key is a string or an integer, the method will use the tables' PK if
     * the PK has a single column. If the table has a composite PK and the key
     * has a separator (see below), the method will detect it and use it.
     * <pre>
     * $key = '12-27'; // PK values with separator for tables with composite PK.
     * </pre>
     * If $key is an array, it can be indexed by integers or by attribute (column)
     * names, as for {@link CActiveRecord::findByAttributes}.
     * If the array doesn't have attribute names, as below, the method will use
     * the table composite PK.
     * <pre>
     * $key = array(
     *   12,
     *   27,
     *   ...,
     * );
     * </pre>
     * If the array is indexed by attribute names, as below, the method will use
     * the attribute names to search for and load the model.
     * <pre>
     * $key = array(
     *   'model_id' => 44,
     *   ...,
     * );
     * </pre>
     * Warning: each attribute used should have an index on the database and the set of
     * attributes used should identify only one item on the database (the attributes being
     * ideally part of or multiple unique keys).
     * @param string $modelClass The model class name.
     * @return GxActiveRecord The loaded model.
     * @see GxActiveRecord::pkSeparator
     * @throws CHttpException if there's an invalid request (with code 400) or if the model is not found (with code 404).
     */

    public function filters()
    {
        return array('accessControl');
    }

    public function accessRules()
    {
        return array(
            array('allow',
                // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'), 'users' => array('@')),
            array('allow',
                // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'list', 'generate_tickets', '*', 'toplists', 'filter', 'filter', 'filterPreview', 'sort', 'genreSelector', 'toggle', 'import', 'search', 'preview'), 'users' => array('admin')),
            array('deny',
                // deny all users
                'users' => array('*')));
    }

    public static function label()
    {
        return $this->pageTitle;
    }

    public function loadModel($key = "", $modelClass = "")
    {

        if (empty($modelClass))
        {
            $modelClass = str_replace("Controller", "", ucfirst($this->id));
        }

        if (empty($key))
        {

            if ($this->_model === null)
            {

                if (isset($_REQUEST['id']))
                {
                    $key = $_REQUEST['id'];
                }
            }
        }

        // Get the static model.
        $staticModel = GxActiveRecord::model($modelClass);

        if (is_array($key))
        {

            // The key is an array.
            // Check if there are column names indexing the values in the array.
            reset($key);
            if (key($key) === 0)
            {

                // There are no attribute names.
                // Check if there are multiple PK values. If there's only one, start again using only the value.
                if (count($key) === 1)
                {
                    return $this->loadModel($key, $modelClass);
                }

                // Now we will use the composite PK.
                // Check if the table has composite PK.
                $tablePk = $staticModel->getTableSchema()->primaryKey;

                if (!is_array($tablePk))
                {
                    throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));
                }

                // Check if there are the correct number of keys.
                if (count($key) !== count($tablePk))
                {
                    throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));
                }

                // Get an array of PK values indexed by the column names.
                $pk = $staticModel->fillPkColumnNames($key);

                // Then load the model.
                $model = $staticModel->findByPk($pk);
            }
            else
            {

                // There are attribute names.
                // Then we load the model now.

            }
        }
        else
        {

            // The key is not an array.
            // Check if the table has composite PK.
            $tablePk = $staticModel->getTableSchema()->primaryKey;

            if (is_array($tablePk))
            {

                // The table has a composite PK.
                // The key must be a string to have a PK separator.
                if (!is_string($key))
                {
                    throw new CHttpException(400, Yii::t('yii', 'Your request is invalid.'));
                }

                $model = $staticModel->findByPk($key);

                // There must be a PK separator in the key.
                if (stripos($key, GxActiveRecord::$pkSeparator) === false)
                {
                    throw new CHttpException(400, Yii::t('yii', 'Your request is invalid.'));
                }

                // Generate an array, splitting by the separator.
                $keyValues = explode(GxActiveRecord::$pkSeparator, $key);

                // Start again using the array.
                return $this->loadModel($keyValues, $modelClass);
            }
            else
            {

                // The table has a single PK.
                // Then we load the model now.

                if (empty($key))
                {
                    $this->_model = $model = GxActiveRecord::model($modelClass);
                }
                else
                {
                    $model = $staticModel->findByPk($key);
                    $this->contextMenu($model);
                }
            }
        }

        // Check if we have a model.
        if ($model === null)
        {
            throw new CHttpException(404, Yii::t('yii', 'The requested page does not exist.'));
        }

        return $model;
    }

    /**
     * Return contextmenu for the model
     */

    public function contextMenu(CActiveRecord $model)
    {
        return $this->contextmenu;
    }

    /**
     * Performs the AJAX validation.
     * #MethodTracker
     * This method is based on the gii generated method controller::performAjaxValidation, from version 1.1.7 (r3135). Changes:
     * <ul>
     * <li>Supports multiple models.</li>
     * </ul>
     * @param CModel|array $model The model or array of models to be validated.
     * @param string $form The name of the form. Optional.
     */
    protected function performAjaxValidation($model, $form = null)
    {
        if (Yii::app()->getRequest()->getIsAjaxRequest() && (($form === null) || ($_POST['ajax'] == $form)))
        {

            echo GxActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Finds the related primary keys specified in the form POST.
     * Only for HAS_MANY and MANY_MANY relations.
     * @param array $form The post data.
     * @param array $relations A list of model relations in the format returned by {@link CActiveRecord::relations}.
     * @param string $uncheckValue Since Yii 1.1.7, htmlOptions (in {@link CHtml::activeCheckBoxList})
     * has an option named 'uncheckValue'. If you set it to different values than the default value (''), you will
     * need to set the appropriate value to this argument. This method can't be used when 'uncheckValue' is null.
     * @return array An array where the keys are the relation names (string) and the values are arrays with the related model primary keys (int|string) or composite primary keys (array with pk name (string) => pk value (int|string)).
     * Example of returned data:
     * <pre>
     * array(
     *   'categories' => array(1, 4),
     *   'tags' => array(array('id1' => 3, 'id2' => 7), array('id1' => 2, 'id2' => 0)) // composite pks
     * )
     * </pre>
     * An empty array is returned in case there is no related pk data from the post.
     * This data comes directly from the form POST data.
     * @see GxHtml::activeCheckBoxList
     * @throws InvalidArgumentException If uncheckValue is null.
     */
    protected function getRelatedData($form, $relations, $uncheckValue = '')
    {
        if ($uncheckValue === null)
        {
            throw new InvalidArgumentException(Yii::t('giix', 'giix cannot handle automatically the POST data if "uncheckValue" is null.'));
        }

        $relatedPk = array();
        foreach ($relations as $relationName => $relationData)
        {
            if (isset($form[$relationName]) && (($relationData[0] == GxActiveRecord::HAS_MANY) || ($relationData[0] == GxActiveRecord::MANY_MANY)))
            {
                $relatedPk[$relationName] = $form[$relationName] === $uncheckValue ? null : $form[$relationName];
            }

        }
        return $relatedPk;
    }

    public function actionToggle($id, $attribute, $model)
    {
        if (Yii::app()->request->isPostRequest)
        {
            $model = $this->loadModel($id, $model);

            ($model->$attribute == 1) ? $model->$attribute = 0 : $model->$attribute = 1;
            $model->save();
        }
    }

    /**
     * Generate tabular layout for views.
     * Usage: array('viewname'=>'title', 'editor'=>'Ulkoasu', 'color' => 'Värivalinnat')
     * @param  CActiveForm $form       [description]
     * @param  CActiveRecord $model      [description]
     * @param  array  $view_array
     * @param  array  $data
     * @return array
     */
    public function getTabularFormTabs($form, $model, $view_array = array(), $data = array())
    {
        $tabs = array();
        $count = 0;
        $arr = array();
        if (!empty($data))
        {
            foreach ($data as $k => $d)
            {
                $arr[$k] = $d;
            }
        }

        foreach ((array) $view_array as $view => $title)
        {
            $tabs[] = array('active' => $count++ === 0, 'label' => $title, 'content' => $this->renderPartial($view, array_merge($arr, array('form' => $form, 'model' => $model, 'ident' => $view, 'data' => $data)), true));
        }

        return $tabs;
    }

    /*
     * For non JSON popups
     */
    protected function ajaxRenderPlain($view, $data = "", $status = "render", $options = [])
    {
        if (!empty($data) && !is_array($data))
        {
            $cs = Yii::app()->getClientScript();
            $cs->registerScript($view . rand(1, 100), $data, CClientScript::POS_READY);

        }
        $options["plain"] = true;
        $cs = Yii::app()->getClientScript();

        $cs->registerScript($view . rand(100, 200), 'reloadStyle();', CClientScript::POS_READY);

        $this->ajaxRender($view, $data, $status, $options);
    }

    /*
     * Render content preferably as partial and with normal render as a fallback
     *
     */
    protected function ajaxRender($view, $data = array(), $status = "render", $options = array())
    {

        if (empty($data) && isset($_GET))
        {
            $data = array('model' => $this->loadModel($_GET['id'], ucfirst($this->id)));
        }

        if (is_string($data))
        {
            $data = array("model" => $data);
        }

        if (Yii::app()->request->isAjaxRequest)
        {

            if (!empty($options["preload"]))
            {
                $cs = Yii::app()->getClientScript();
                foreach ((array) $options["preload"] as $script)
                {

                    if (strpos($script, '.css') !== false)
                    {
                        Yii::app()->clientScript->registerCssFile($script);
                    }

                    if (strpos($script, '.js') !== false)
                    {
                        $cs->registerScriptFile($script, CClientScript::POS_HEAD);
                    }

                }
            }

            $this->getDialog($view, $data, $status, $options);
        }
        else
        {

            $this->render($view, $data);
        }

        Yii::app()->end();

    }

    /**
     * Render ajax status message
     * @param  string $statusMessage Statusmessage
     * @param  string $status success, error or reload
     */

    protected function ajaxStatus($statusMessage, $status = 'success')
    {
        $this->excludeScripts();

        echo CJSON::encode(array(
            'status' => $status,
            'content' => $statusMessage,
        ));

        Yii::app()->end();
    }

    /**
     * Render success errormessage
     * @param  string $statusMessage Statusmessage
     */

    protected function ajaxError($statusMessage)
    {
        $this->excludeScripts();

        echo CJSON::encode(array(
            'status' => 'error',
            'content' => $statusMessage,
        ));

        Yii::app()->end();
    }

    /**
     * Render success statusmessage
     * @param  string $statusMessage Statusmessage
     */

    protected function ajaxSuccess($statusMessage)
    {

        if (!Yii::app()->request->isAjaxRequest)
        {
            Yii::app()->user->setFlash("Success!", $statusMessage);

            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array(
                'admin',
            ));
            return;
        }

        $this->excludeScripts();

        echo CJSON::encode(array(
            'status' => 'success',
            'content' => $statusMessage,
        ));

        Yii::app()->end();
    }

    /**
     * Render reload ajax message
     * @param  string $statusMessage Statusmessage
     * @param  string $view View to render
     */

    protected function ajaxReload($statusMessage, $view)
    {
        $this->excludeScripts();

        echo CJSON::encode(array(
            'status' => 'reloadtab',
            'content' => $statusMessage,
            'url' => $view,
        ));

        Yii::app()->end();
    }

    /*
     * Print out dialog content
     *
     */

    protected function getDialog($content, $data, $status = "render", $options = array())
    {

        if (Yii::app()->request->isAjaxRequest)
        {

            // Stop jQuery from re-initialization
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery-ui.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery-ui.min.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

            if (Yii::app()->request->getParam("ajax") != "" || (isset($options['plain']) && $options["plain"] == true))
            {
                $this->renderPartial($content, $data, false, true);
            }
            else
            {
                $output = $this->renderPartial($content, $data, true, true);

                echo CJSON::encode(array("status" => $status, "content" => $output));
                Yii::app()->end();
            }
        }
    }

    public function doRender($template, $attributes, $nodraw = false, $loadscripts = true)
    {

        if (Yii::app()->request->isAjaxRequest)
        {
            $this->excludeScripts();
            $this->renderPartial($template, $attributes, $nodraw, $loadscripts);
            Yii::app()->end();

        }
        else
        {
            $this->render($template, $attributes);
        }
    }

    /**
     *  don't reload scripts or they will mess up the page
     */
    protected function excludeScripts()
    {

        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.yiigridview.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.ba-bbq.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery-ui.min.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery-ui.js'] = false;
    }

    /**
     * Build crud menu for menus
     */

    public function getCrudMenu()
    {
        $id = $this->id;
        $action = $this->action->id;

        try {
            if (!$model = $this->loadModel())
            {
                return false;
            }

        }
        catch (Exception $e)
        {

            return false;
        }

        $crudMenu = array(
            array('label' => Yii::t('app', 'View'), 'url' => Yii::app()->createUrl(Yii::app()->controller->module->id . "/" . $id . '/view/' . $model->id), 'visible' => $action == 'view' || $action == 'update', 'active' => $this->action->id == 'view', 'linkOptions' => array('data-icon-primary' => 'ui-icon-search', 'class' => 'button')),
            array('label' => Yii::t('app', 'Edit'), 'url' => Yii::app()->createUrl(Yii::app()->controller->module->id . "/" . $id . '/update/' . $model->id), 'active' => $action == 'update' ? true : false, 'linkOptions' => array('data-icon-primary' => 'ui-icon-pencil', 'class' => 'button')),
            array('label' => Yii::t('app', 'Delete'), 'url' => Yii::app()->createUrl(Yii::app()->controller->module->id . "/" . $id . '/delete/' . $model->id), 'visible' => $action == 'view' || $action == 'update', 'linkOptions' => array('data-icon-primary' => 'ui-icon-trash', 'class' => 'button update-dialog-open-link ', 'id' => 'deleteTitle'), 'callback' => "$('table.detail-view').fadeOut('slow'); $('li.current').removeClass('loading').removeClass('current').css('opacity','.2'); $('a#deleteTitle').attr('disabled', 'disabled').attr('onclick', 'return false;');"));

        $contextMenus = $this->contextMenu($model);

        foreach ((array) $contextMenus as $menu)
        {
            $crudMenu[] = $menu;
        }

        return $crudMenu;
    }

    /*
     * Get navigation info based on controller / action
     *
     */
    protected function getMenus($items = array())
    {

        $id = $this->id;
        $action = $this->action->id;
        $menus = ['sideMenu' => [], 'topMenu' => []];

        if (isset($this->menuGroup) && file_exists($menuFile = Yii::app()->basePath . '/views/layouts/menugroup/_' . $this->menuGroup . '.php'))
        {
            include_once $menuFile;
        }

        if (empty($items))
        {
            $default_file = Yii::app()->basePath . '/views/layouts/_actionBar.php';

            if (!file_exists($default_file))
            {
                throw new Exception("Default setting file for navigation system is missing!");
            }

            // Using default navigation

            if (file_exists($file = Yii::app()->basePath . '/views/' . $id . '/_actionBar.php'))
            {

                include_once $file;
            }
        }

        if (!empty($items["sideMenu"]))
        {
            $menus["sideMenu"] = $items["sideMenu"];
        }

        if ($action == 'update' || $action == 'view')
        {
            if ($menu = $this->getCrudMenu())
            {
                foreach ((array) $menu as $item)
                {
                    $menus["topMenu"][] = $item;
                }
            }
        }

        if (!empty($items["topMenu"]))
        {
            $menus["topMenu"] = array_merge((array) $menus["topMenu"], (array) $items["topMenu"]);
        }

        return (array) $menus;
    }

    public function setFlash($key, $value, $defaultValue = null)
    {
        Yii::app()->user->setFlash($key, $value, $defaultValue);
    }

    public function getFlash()
    {
        foreach ((array) Yii::app()->user->getFlashes() as $key => $flash)
        {
            echo $flash;
        }
    }

    protected function notify($message, $messageType = "information", $permanent = false, $render = true)
    {

        $isAjax = Yii::app()->request->isAjaxRequest;

        $html = $this->renderPartial('application.views.layouts.notifications._' . $messageType, array(
            'message' => $message,
            'permanent' => $permanent,
            'render' => !$isAjax,

        ), true, $isAjax ? false : true);

        if ($render && $isAjax)
        {
            echo $html;
        }
        else
        {
            if (!$isAjax)
            {
                Yii::app()->user->setFlash($messageType, $html);
            }

            return $html;
        }
    }

    protected function notifyError($message, $messageType = "error", $permanent = false, $render = true)
    {

        $this->notify($message, $messageType, $permanent, $render);

    }

    protected function notifySuccess($message, $messageType = "success", $permanent = false, $render = true)
    {
        $this->notify($message, $messageType, $permanent, $render);

    }

}
