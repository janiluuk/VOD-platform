<?php
$db = array(
    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=127.0.0.1;dbname=gonzalez',
            'emulatePrepare' => true,
            'username' => 'test',
            'password' => 'test',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableProfiling' => false,
            'schemaCacheID' => 'gonzalez',
            'schemaCachingDuration' => 12000),
    ),
);

return $db;
?>
