<?php

    /*
    * CKFinder Configuration File
    *
    * For the official documentation visit http://docs.cksource.com/ckfinder3-php/
    */

    /*============================ PHP Error Reporting ====================================*/
    // http://docs.cksource.com/ckfinder3-php/debugging.html

    // Production
    //error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    //ini_set('display_errors', 0);

    // Development
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    /*============================ General Settings =======================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html

    $config = array();

    $config['loadRoutes'] = true;

    $config['authentication'] = function() {
    // Cho phép mọi request upload
    return true;
};


    /*============================ License Key ============================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_licenseKey

    $config['licenseName'] = 'http://127.0.0.1:8000';
    $config['licenseKey']  = '4WPW2GKJ1RBMX2SRUPAMWYWG6YYKR';

    /*============================ CKFinder Internal Directory ============================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_privateDir

    $config['privateDir'] = array(
        'backend' => 'laravel_cache',
        'tags'    => 'ckfinder/tags',
        'cache'   => 'ckfinder/cache',
        'thumbs'  => 'ckfinder/cache/thumbs',
        'logs'    => array(
            'backend' => 'laravel_logs',
            'path'    => 'ckfinder/logs'
        )
    );

    /*============================ Images and Thumbnails ==================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_images

    $config['images'] = array(
        'maxWidth'  => 1600,
        'maxHeight' => 1200,
        'quality'   => 80,
        'sizes' => array(
            'small'  => array('width' => 480, 'height' => 320, 'quality' => 80),
            'medium' => array('width' => 600, 'height' => 480, 'quality' => 80),
            'large'  => array('width' => 800, 'height' => 600, 'quality' => 80)
        )
    );

    /*=================================== Backends ========================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_backends

    // The two backends defined below are internal CKFinder backends for cache and logs.
    // Plase do not change these, unless you really want it.
    $config['backends']['laravel_cache'] = array(
        'name'         => 'laravel_cache',
        'adapter'      => 'local',
        'root'         => storage_path('framework/cache')
    );

    $config['backends']['laravel_logs'] = array(
        'name'         => 'laravel_logs',
        'adapter'      => 'local',
        'root'         => storage_path('logs')
    );

    // Backends

    $config['backends']['default'] = array(
        'name'         => 'default',
        'adapter'      => 'local',
        'baseUrl'      => config('app.url').'/mediaroot/mediaroot/',
        'root'         => public_path('/mediaroot/mediaroot/'),
        'chmodFiles'   => 0644,
        'chmodFolders' => 0755,
        'filesystemEncoding' => 'UTF-8'
    );

    /*================================ Resource Types =====================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_resourceTypes

    $config['defaultResourceTypes'] = '';

$config['defaultResourceTypes'] = 'Images';

$config['resourceTypes'][] = array(
    'name'              => 'Images', // Exact match for type=Images in the request
    'directory'         => 'images',
    'maxSize'           => 1048576, // 1MB in bytes
    'allowedExtensions' => 'gif,jpeg,jpg,png',
    'deniedExtensions'  => 'js,php,asp,aspx,htm,html,exe,bat,sh,cgi,pl,py,jsp,jspx,jar',
    'backend'           => 'default'
);    /*================================ Access Control =====================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_roleSessionVar

    $config['roleSessionVar'] = 'CKFinder_UserRole';

    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_accessControl
    $config['accessControl'][] = array(
        'role'                => '*',
        'resourceType'        => '*',
        'folder'              => '/',

        'FOLDER_VIEW'         => true,
        'FOLDER_CREATE'       => true,
        'FOLDER_RENAME'       => true,
        'FOLDER_DELETE'       => true,

        'FILE_VIEW'           => true,
        'FILE_UPLOAD'         => true,
        'FILE_RENAME'         => true,
        'FILE_DELETE'         => true,

        'IMAGE_RESIZE'        => true,
        'IMAGE_RESIZE_CUSTOM' => true
    );


    /*================================ Other Settings =====================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html

    $config['overwriteOnUpload'] = true;
    $config['checkDoubleExtension'] = true;
    $config['disallowUnsafeCharacters'] = false;
    $config['secureImageUploads'] = true;
    $config['checkSizeAfterScaling'] = true;
    $config['htmlExtensions'] = array('html', 'htm', 'xml', 'js');
    $config['hideFolders'] = array('.*', 'CVS', '__thumbs');
    $config['hideFiles'] = array('.*');
    $config['forceAscii'] = false;
    $config['xSendfile'] = false;

    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_debug
    $config['debug'] = true;

    /*==================================== Plugins ========================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_plugins

    $config['plugins'] = array();

    /*================================ Cache settings =====================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_cache

    $config['cache'] = array(
        'imagePreview' => 24 * 3600,
        'thumbnails'   => 24 * 3600 * 365
    );

    /*============================ Temp Directory settings ================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_tempDirectory

    $config['tempDirectory'] = sys_get_temp_dir();

    /*============================ Session Cause Performance Issues =======================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_sessionWriteClose

    $config['sessionWriteClose'] = true;

    /*================================= CSRF protection ===================================*/
    // http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_csrfProtection

    $config['csrfProtection'] = false; // hoặc thêm vào ngoại lệ CSRF

    /*============================== End of Configuration =================================*/

    /**
     * Config must be returned - do not change it.
     */
    return $config;
