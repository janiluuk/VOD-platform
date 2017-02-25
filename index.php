<?php
// change the following paths if necessary
$yii = dirname(__FILE__) . '/protected/vendors/yii/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/';
// remove the following lines when in production mode

if (!empty($_REQUEST["debug"]) && $_REQUEST["debug"] == 1) define('YII_DEBUG',true);
defined('YII_DEBUG') or define('YII_DEBUG',false);
// defined('YII_TRACE_LEVEL') othr define('YII_TRACE_LEVEL', 3);
$configFile = (YII_DEBUG == true) ? 'dev.php' : 'production.php';
require_once($yii);
Yii::createWebApplication($config . $configFile)->run();
?>
 
