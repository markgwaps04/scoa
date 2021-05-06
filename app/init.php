<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/14/2019
 * Time: 5:48 PM
 */

/**
 * This php file include by public/index.php
 */


const URL_SLASH = '/';


define("PARENT_URI",strtolower(substr($_SERVER["SERVER_PROTOCOL"],
        0,strpos($_SERVER['SERVER_PROTOCOL'],
            '/')))
    ."://".@apache_request_headers()['Host']);


define('PUBLIC_PATH' ,PARENT_URI."/SCOA/public/" );


define('VENDOR_PATH' , PUBLIC_PATH."vendor".URL_SLASH);

define('CSS_PATH' , PUBLIC_PATH ."css" . URL_SLASH);

define('JS_PATH' , PUBLIC_PATH ."js" . URL_SLASH);

define('PUBLIC_ROOT', "../public/");

define('CONTROLLERS_PATH', '../app/controllers/' );

define('MODELS_PATH', '../app/models/' );

define('APP_VIEW','../app/views'.URL_SLASH);

define('ROOT', dirname(getcwd()).DIRECTORY_SEPARATOR);

define('FILES_ROOT', "../public/files");

define('FILES_FOLDER', PUBLIC_PATH."files");

define('ROOT_URI','/SCOA/public/');

define('LIBRARY', '../app/libs/');




include_once '../app/core/contants.php';
include_once '../app/libs/Medoo.php';
include_once '../app/core/Misc.php';
include_once '../app/core/interface.php';
include_once '../app/core/database.php';
include_once '../app/core/App.php';
include_once '../app/core/Controller.php';
include_once '../app/core/Smarty/Smarty.php';
include_once '../app/core/smarty_config.php';


$scoa = new SCOA();

$app = new App;
