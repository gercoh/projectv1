<?php
session_start();
require_once('mysql.php');
header('Content-Type: text/html; charset=utf-8');

if(empty($_SESSION['login'])){
    if($_GET['p']==''){
        echo "
        <a href='/index.php?p=login'>Авторизация</a>
        
        <a href='/index.php?p=register'>регистрация</a>
        ";

    }
    elseif($_GET['p']=='login'){
        require_once('page/login.php');
    }
    elseif($_GET['p']=='register'){
        require_once('page/register.php');
    }
}
else {

    require_once('page/auth.php');
    echo "
    <br>
    <a href='page/logout.php'>Выход</a>";
}
define('BASE_PATH', __DIR__);
session_start();

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

use common\Config;
use common\Router;
use administration\controllers\IndexController as AdminIndexController;
use application\controllers\IndexController as ApplicationIndexController;

$config = require_once(__DIR__ . '/configs/web.php');
Config::getInstance()->load($config);

try {
    $controller = Router::getInstance()->getController();
    $action = Router::getInstance()->getAction();

    if (class_exists($controller)) {
        $object = new $controller();
        if (method_exists($object, $action)) {
            echo $object->$action(Router::getInstance()->getParameters());
            exit;
        }
    }

    $indexController = Router::getInstance()->isAdmin() ? new AdminIndexController() : new ApplicationIndexController();
    echo $indexController->action404();
    exit;
} catch (Exception $ex) {
    die($ex->getMessage());
}

?>
