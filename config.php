<?php

define('DEFAULT_CONTROLLER','News');
define('DEFAULT_ACTION','default');
define('DS',DIRECTORY_SEPARATOR);
define('CLS_DIR', 'inc');
define('DB_HOST','localhost');
define('DB_NAME','db-buh');
define('DB_USER','root');
define('DB_PASSWORD','1276547');
define('DB_DSN','mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8');
define('DB_prefix','buh_');
define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
define('MAIL_USER','');
define('MAIL_PASSWORD','');
define('LIMIT_PER_PAGE', 15);
include_once 'inc/utils/PHPMailer-master/PHPMailerAutoload.php';

function autoload($classname) {
    $clsFile = __DIR__.DS.CLS_DIR.DS.$classname.'.php';
    $clsFileUtils = __DIR__.DS.CLS_DIR.DS.'utils'.DS.$classname.'.php';
    $clsFileModel = __DIR__.DS.CLS_DIR.DS.'models'.DS.$classname.'.php';
    $clsFileController = __DIR__.DS.CLS_DIR.DS.'controllers'.DS.$classname.'.php';
    if(file_exists($clsFile)) {
        require_once $clsFile;
        return true;
    } elseif (file_exists($clsFileUtils)) {
        require_once $clsFileUtils;
        return true;
    } elseif(file_exists($clsFileModel)) {
        require_once $clsFileModel;
        return true;
    } elseif (file_exists($clsFileController)) {
        require_once $clsFileController;
        return true;
    }
    return false;
}
spl_autoload_register('autoload');