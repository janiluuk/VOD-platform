<?php

/**
 * main configuration file for gonzales
 *
 * @author        janiluuk@gmail.com
 * @Copyright (c) 2011-2012 Jani Luukkanen
 * @description
 * This is the main Web application configuration
 * CWebApplication properties can be configured here.
 *
 **/
ini_set("memory_limit", "1G");

$root = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');
$protocol = isset($_SERVER['HTTPS'] && !empty($_SERVER['HTTPS'])) ? 'https://' : 'http://';
$url = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '127.0.0.1';
$homeUrl = $protocol . $url;


// Load db config file
$db = include_once 'db.php';

$main = array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'homeUrl' => $homeUrl,
    'name' => 'Gonzalez',

    // preloading 'log' component
    'preload' => array(
        'log',
    ),
    'aliases' => array(
        'widgets' => 'application.widgets',
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'),
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.behaviors.*',
        'application.actions.*',
        'application.widgets.*',        
        'application.extensions.EDataTables.*',
        'application.extensions.yiidebugtb.*',
        'application.modules.user.models.*',
        'application.exceptions.*',
        'ext.yiiext.behaviors.model.taggable.*',
        'ext.giix-components.*',
        'ext.giix-core.*',
        'bootstrap.widgets.*',
        'ext.select2.Select2',
        'application.modules.transcoder.*',
        'ext.gtc.components.*',
    ),
    'defaultController' => 'site',
    'controllerMap' => array(
        'api.user' => array(
            'class' => 'application.controllers.ApiUserController',
            'modelName' => 'GonzalesUser',
        ),
    ),
    // application components
    'modules' => array(
        'transcoder' => array(
            'class' => 'application.modules.transcoder.TranscoderModule',
        ),
        'rbac'=>array(
            'class'=>'application.modules.rbacui.RbacuiModule',
            'userClass' => 'GonzalesUser',
            'userIdColumn' => 'id',
            'userNameColumn' => 'username',
            'rbacUiAdmin' => true,
            'rbacUiAssign' => true,
        ),

        'user' => array(
            'actionTable' => 'vod_user_action',
            'activitiesTable' => 'vod_user_activity',
            'friendshipTable' => 'vod_user_friendship',
            'userUsergroupTable' => 'vod_usergroup',
            'messagesTable' => 'vod_user_messages',
            'permissionTable' => 'vod_user_permission',
            'privacySettingTable' => 'vod_user_privacysetting',
            'profileFieldsTable' => 'vod_user_profile_fields',
            'profileFieldsGroupTable' => 'vod_user_profile_fields_group',
            'profileTable' => 'vod_user_profiles',
            'profileVisitTable' => 'vod_user_profile_visit',
            'rolesTable' => 'vod_user_roles',
            'settingsTable' => 'vod_user_settings',
            'textSettingsTable' => 'vod_user_textsettings',
            'usergroupTable' => 'vod_user_group',
            'usersTable' => 'vod_user',
            'userRoleTable' => 'vod_user_has_role',
            'friendshipTable' => 'vod_user_friendship',
            'returnLogoutUrl' => '/',
            'LogoutUrl' => '/user/logout',
            'debug' => false,
        ),
        'webshell' => array(
            'class' => 'application.modules.webshell.WebShellModule',
            // when typing 'exit', user will be redirected to this URL
            'exitUrl' => '/',
            // custom wterm options
            'wtermOptions' => array(
                // linux-like command prompt
                'PS1' => '%',
            ),
            // additional commands (see below)
            'commands' => array(
                'test' => array('js:function(){return "Hello, world!";}', 'Just a test.'),
            ),
            'checkAccessCallback' => function ($controller, $action) {
                return !Yii::app()->user->isAdmin;
            },
            // uncomment to disable yiic
            // 'useYiic' => false,
            // adding custom yiic commands not from protected/commands dir
            'yiicCommandMap' => array(
                'email' => array(
                    'class' => 'ext.mailer.MailerCommand',
                    'from' => 'mailer@localhost',
                ),
            ),
        ),
    ),
    // application components

    'components' => array(
        'swiftMailer' => array(
            'class' => 'ext.swiftMailer.SwiftMailer',
        ),
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.ui.min.css' => false,
                'jquery-ui.css' => false,
            ),
        ),
        'messages' => array(
            'class' => 'CPhpMessageSource',
        ),

        /* Bank payment components */
        
        'payment' => array(
            'class' => 'application.components.Banklink.PaymentComponent',
            'banks' => array(
                'Seb' => array(
                    'class' => 'SEB',
                    'protocol_class' => 'IPizza',
                    'private_key' => 'seb/none.pem', // Directory in the payment component
                    'public_key' => 'seb/none.pem', 
                    'merchant_id' => '',
                    'merchant_account' => '',
                    'merchant_name' => '',
                ),
		
                'Swedbank' => array(
                    'class' => 'Swedbank',
                    'protocol_class' => 'IPizza',                    
                    'public_key' => 'swedbank/none.pem',
                    'private_key' => 'swedbank/none.pem',
                    'merchant_id' => '',
                ),
                'Sampo' => array(
                    'merchant_id' => 'TEST',
                    'class' => 'Danskebank',
                    'protocol_class' => 'IPizza',                    
                    'merchant_account' => '',
                    'public_key' => 'sampo/none.pem',
                    'private_key' => 'sampo/none.pem',
                    'merchant_name' => 'Sampo Client',
                )
            )           
        ),
        'banklink' => array(
            'class' => 'application.components.GBanklink.GBanklink',
            'banks' => array(
                
                'testing' => array(
                    'type' => 'testing',
                    'sendparams' => array('VK_SND_ID' => 'TEST', 'VK_ACC' => '123456', 'VK_NAME' => 'Test payment'),
                ),
                'Nordea' => array(
                    'type' => 'GBanklink',
                    'class' => 'PaymentNordea',
                    'sendparams' => array('SOLOPMT_RCV_ID' => 00000000),
                ),
                'Estcard' => array(
                    'type' => 'estcard',
                    'sendparams' => array('hash' => 'estlinkhash'),
                    'receiveparams' => array('ver', 'id', 'ecuno', 'receipt_no', 'eamount', 'cur', 'respcode', 'datetime', 'msgdata', 'actiontext', 'mac'),
                ),
            ),

        ),
        'file' => array(
            'class' => 'application.extensions.file.CFile',
        ),
        'user' => array(
            'class' => 'application.modules.user.components.YumWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => '/user/auth',
        ),

        'widgetFactory' => array(
            'widgets' => array(
                'CGridView' => array('summaryCssClass' => 'ui-footer-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix', 'summaryText' => '<li>Total: {count}</li>', 'cssFile' => false, 'pagerCssClass' => 'pagination', 'itemsCssClass' => '', 'afterAjaxUpdate' => 'function() { $(".admin-button-column .button:not(.no-uniform), .button-column .button:not(.no-uniform)").each(function(){$(this).button({icons:{primary:$(this).attr("data-icon-primary")?$(this).attr("data-icon-primary"):null,secondary:$(this).attr("data-icon-primary")?$(this).attr("data-icon-secondary"):null},text:$(this).attr("data-icon-only")==="true"?false:true});}) }'),
                'CListView' => array('summaryCssClass' => 'ui-footer-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix', 'summaryText' => '<li>Total: {count}</li>', 'cssFile' => '/css/listview.css'),
                'CLinkPager' => array('cssFile' => false, 'header' => '', 'nextPageLabel' => '»', 'prevPageLabel' => '«', 'htmlOptions' => array('class' => 'pagination clearfix leading')),
                'CDetailView' => array('cssFile' => false, 'htmlOptions' => array('class' => 'simple full ui-widget-content')),
                'XDetailView' => array('cssFile' => false, 'htmlOptions' => array('class' => 'simple full ui-widget-content'), 'cssFile' => false),
                'GGridView' => array('title' => '', 'tagName' => 'section', 'htmlOptions' => array('class' => 'no-padding clearfix'), 'template' => '{items}{summary}{pager}', 'summaryCssClass' => 'ui-footer-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix', 'summaryText' => '<div class="ui-summary-count">Total {count} items</div>', 'cssFile' => false, 'pagerCssClass' => 'pagination', 'itemsCssClass' => 'full', 'afterAjaxUpdate' => 'function() { $(".admin-button-column .button:not(.no-uniform), .button:not(.no-uniform)").each(function(){$(this).button({icons:{primary:$(this).attr("data-icon-primary")?$(this).attr("data-icon-primary"):null,secondary:$(this).attr("data-icon-primary")?$(this).attr("data-icon-secondary"):null},text:$(this).attr("data-icon-only")==="true"?false:true});}) }'),
                'RefreshGridView' => array('title' => '', 'tagName' => 'section', 'htmlOptions' => array('class' => 'no-padding clearfix'), 'template' => '{items}{summary}{pager}', 'summaryCssClass' => 'ui-footer-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix', 'summaryText' => '<div class="ui-summary-count">Total {count} items</div>', 'cssFile' => false, 'pagerCssClass' => 'pagination', 'itemsCssClass' => 'full', 'afterAjaxUpdate' => 'function() { $(".admin-button-column .button:not(.no-uniform), .button:not(.no-uniform)").each(function(){$(this).button({icons:{primary:$(this).attr("data-icon-primary")?$(this).attr("data-icon-primary"):null,secondary:$(this).attr("data-icon-primary")?$(this).attr("data-icon-secondary"):null},text:$(this).attr("data-icon-only")==="true"?false:true});}) }'),
            )
        ),
        'urlManager' => array(
            'showScriptName' => false,
            'urlSuffix' => '',
            'caseSensitive' => true,
            'urlFormat' => 'path',
            'rules' => require (dirname(__FILE__) . '/routing.php'),
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),

        'session' => array(
            'class' => 'CHttpSession',
            'timeout' => 3600 * 24 * 12,
            'autoStart' => true,
            'gCProbability' => 100,
        ),
        'cache' => array(
            'class' => 'CApcCache',
        ),
        'authManager'=>array(
          'class'=>'CDbAuthManager',
        ),       
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require (dirname(__FILE__) . '/params.php'),
);

return CMap::mergeArray($main, $db);
?>
