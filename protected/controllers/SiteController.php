<?php
class SiteController extends Controller
{
    /**
     * Class configuration
     */
    public $layout = "column1_menu";
    public $pageTitle = "Dashboard";

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = "//layouts/error/error";
        if ($error = Yii::app()->errorHandler->error) {
            $this->pageTitle = "Error";
            if ($error["code"] >= 500) $view = "//site/error";
            else $view = "//site/error_simple";
            if (Yii::app()->request->isAjaxRequest) echo $error['message'];
            else $this->render($view, $error);
        }
    }
}
?>
