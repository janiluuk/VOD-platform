<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */


// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/vendors/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/dev.php';

define('YII_DEBUG', true);
// remove the following line when in production mode
 
require_once($yii);
Yii::createWebApplication($config)->run();
