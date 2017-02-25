<?php

// this contains the application parameters that can be maintained via GUI
return array(

    'defaultPageSize' => 20,
    'pageSizeOptions' => array(10 => 10, 20 => 20, 50 => 50, 100 => 100, 500 => 500, 10000 => 'All'),

    'api' => array(
        // Default parameter used when doing API call internally
        'api_path' => '/api',
        'default_params' => array('api_key' => '12345', 'ip_address' => '127.0.0.1'), // Source IP & API-key for mock orders
        'email' => 'demo@example.com', // Mock e-mail from which to make orders
    ),

    'geoip' => $root . '/protected/data/GeoIP.dat',
    /* System limited country codes, leave empty for no restriction */

    'allowed_country_codes' => array('EE', 'FI'),

    'tmdb' => array(
        'key' => '9b7b8510ed034dc34f79e88934c829a3',
    ),
    'google' => array(
        'key' => 'AIzaSyBQXn89JI7augeMGMAtL9qBbyiJwsBtiBM',
    ),
    'rottentomatoes' => array(
        'key' => 'ckggf2er2ur93h6kjmxkem5m',
    ),
    'transcoder' => array(
        'path' => '/usr/local/bin/transcode.sh',
    ),

    // Image paths
    'images' => array(
        'no_image' => '/images/no_image.jpg',
        'no_avatar' => '/images/no_avatar_available.jpg',
        'directory' => $root . '/files/images/', // Image upload directory
        'flags' => '/images/flags/'),
    // System path

    'uploads' => array(
        'directory' => $root . '/files',
        'public' => '/files',
    ),

    'subtitles' => array(
        'directory' => $root . '/subs/',
        'allowedExtensions' => ['srt'],
        'sizeLimit' => 1024 * 1024,
        'defaultLanguage' => 'ee',
    ),
    'content' => array(
        'public_directory' => $root . '/files',
        'public_url' => $homeUrl . '/files',
        'MediaVideo' => '/video',
        'MediaImage' => $root . '/files/MediaImage',
        'MediaSubtitle' => $root . '/subs',
    ),
    'banklink' => array(
        'certificate_path' => 'application.components.GBanklink.lib.certificates',
    ),
    'file_manager' => array(
        'path' => $root . '/files',
        'url' => $homeUrl . '/files',
    ),
    'uploads' => array(
        'public' => '/files/upload/',
        'directory' => $root . '/files/upload/',
    ),
    'email' => 'janiluuk@gmail.com',
    'adminEmail' => 'janiluuk@gmail.com',
    // the copyright information displayed in the footer section
    'copyrightInfo' => 'Copyright &copy; ' . date("Y") . ' janiluuk@gmail.com',
);
