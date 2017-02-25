<?php

/**
 * dev configuration file
 *
 * @author      janiluuk@gmail.com
 * @Copyright (c) 2011-2012 Jani Luukkanen
 * @description
 * This is the development Web application configuration
 *
 */

// Load main config file
$main = include_once ('main.php');

// Development configurations
$development = array(
    
    'params' => array(
        'title' => 'Gonzales DEV',
    ),
    'modules' => array(

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'ipFilters' => array(
                '127.0.0.1', 
            ),
            'password' => 'mypassword',
            'generatorPaths' => array(
                'ext.gtc', 
                'ext.gii-ajax',
                'ext.giix-master.generators',
                'ext.giix-components',
            ),
        ),        
    ) ,
    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'schemaCacheID' => 'cache',
            'schemaCachingDuration' => 3600
        ) ,
        
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'appinfo.log',
                    'levels' => 'info',
                    'categories' => 'system.*',
                ) ,
                
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'apptrace.log',
                    'levels' => 'trace, debug, warning, error',
                    'categories' => 'system.*',
                ) ,
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'apperror.log',
                    'levels' => 'error,warning',
                ) ,
                array(
                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array(
                     '127.0.0.1'
                    ) , 
                ) , 
                array(
                    'class' => 'XWebDebugRouter',
                    'config' => 'alignLeft, opaque, runInDebug, fixedPos, collapsed',
                    'levels' => 'error, warning, trace, debug',
                    'allowedIPs' => array(
                        '127.0.0.1',
                    ) ,
                ) ,
            ) ,
        ) ,
    ) ,
);

//merge both configurations and return them
return CMap::mergeArray($main, $development);
