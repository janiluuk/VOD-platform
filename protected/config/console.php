<?php

$main = include_once 'main.php';


// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
$console = array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',

    // autoloading model and component classes
    'import' => array(
        'application.extensions.yiidebugtb.*',
        'application.models.*',
        'application.components.*',
        'application.extensions.file.*',
        'application.behaviors.*',
        'application.components.actions.*',
        'application.extensions.yiidebugtb.*',
        'application.modules.user.models.*',
        'application.helpers.*',
        'application.exceptions.*',
        'ext.yiiext.behaviors.model.taggable.*',
        'ext.giix-components.*',
        'ext.giix-components.*',
        'ext.giix-core.*',
        'ext.gtc.*',
    ),
    'commandMap' => array(
        //Map command configurations to their files in respective directories
        'video' => dirname(__FILE__) . '/../modules/transcoder/commands/VideoCommand.php',
        'transcoder' => dirname(__FILE__) . '/../modules/transcoder/commands/TranscoderCommand.php',
        'database' => dirname(__FILE__) . '/../commands/EDatabaseCommand.php',


    ),
    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=backend',
            'charset' => 'utf8',
            'username' => 'root',
            'emulatePrepare' => true,
            'password' => 'zxcvfdsA',
            'enableParamLogging' => true,
            'enableProfiling' => true,
            'schemaCachingDuration' => 240,
        ),
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name' => 'Gonzales',
        // preloading 'log' component
        'preload' => array(
            'log',
        ),

        'log' => array(
            'class' => 'CLogRouter',
        ),
    ),
    'params' => require (dirname(__FILE__) . '/params.php'),

);

return $console;

