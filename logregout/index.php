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
?>
