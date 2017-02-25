<?php

/**
 * production configuration file
 * 
 * @author		janiluuk@gmail.com
 * @Copyright (c) 2011-2012 Jani Luukkanen
 * @description
 * This is the production Web application configuration
 *
 */

error_reporting(0);
// Load main config file
$main = include_once('main.php');

// Production configurations
$production = array(
    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'emulatePrepare' => true,
            'enableProfiling' => false,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error, warning',
                    'emails' => array('janiluuk@gmail.com'),
                    'sentFrom' => 'guarddog@vifi.ee',
                    'subject' => 'System Error',
                    'categories' => 'system.*',
                ),
            ),
        ),
    ),
);

//merge both configurations and return them
return CMap::mergeArray($main, $production);

?>
