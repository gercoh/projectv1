<?php
require_once ('mysql.php');
if(empty($_POST['login'])){}
elseif(empty($_POST['password'])){}
else{
    $result = mysql_query("INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '".$_POST['login']."', '".md5($_POST['password'])."');");
    if($result){
        header('location: /index.php?p=login');
    }
    else{
        echo 'Ошибка запроса в базу';
    }
}
?>
<h1>Регистрация</h1>
<form method="post" action="">
    <input type="text" name="login" required>
    <br>
    <input type="password" name="password" required>
    <br>
    <input type="submit">
</form>
<a href='index.php?p=login'>Авторизация</a>
<br>
<a href='index.php?p=register'>регистрация</a>