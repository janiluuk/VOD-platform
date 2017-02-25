<?php

/**
 * production configuration file
 *
 * @author        janiluuk@gmail.com
 * @Copyright (c) 2011-2012 Jani Luukkanen
 * @description
 * This is the production Web application configuration
 *
 * */
error_reporting(0);
// Load main config file
$main = include_once 'main.php';

// Production configurations
$production = array(
    'params' => array(
        'title' => 'Gonzalez',
    ),
    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableProfiling' => false,
            'schemaCacheID' => 'vifi',
            'schemaCachingDuration' => 9200,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error, warning',
                    'emails' => array(''),
                    'sentFrom' => 'guarddog@localhost',
                    'subject' => 'System Error',
                    'categories' => 'system.*, error.*, php, php.*',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace, debug',
                    'logFile' => 'apptrace.log',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    'logFile' => 'error.log',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, info, trace, debug',
                    'categories' => 'api.*, api',
                    'logFile' => 'api.log',
                ),
            ),
        ),
    ),
);

//merge both configurations and return them
return CMap::mergeArray($main, $production);
