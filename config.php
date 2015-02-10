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
define('BASE_URL',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('MAIL_USER','');
define('MAIL_PASSWORD','');
define('LIMIT_PER_PAGE', 15);
include 'inc/utils/PHPMailer-master/PHPMailerAutoload.php';

function autoload($classname) {
    $clsFile = __DIR__.DS.CLS_DIR.DS.$classname.'.php';
    $clsFileAnother = __DIR__.DS.CLS_DIR.DS.'utils'.DS.$classname.'.php';
    if(file_exists($clsFile)) {
        require_once $clsFile;
        return true;
    } elseif (file_exists($clsFileAnother)) {
        require_once $clsFileAnother;
        return true;
    }
    return false;
}
spl_autoload_register('autoload');