<?php
require_once ('mysql.php');
if(empty($_POST['login'])){}
elseif(empty($_POST['password'])){}
else {
    $query = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `user` WHERE `login`='".$_POST['login']."' AND `password`='".md5($_POST['password'])."' "));
    if($query){
        $_SESSION['login'] = $_POST['login'];
        echo 'Авторизуемся';
        header('location: /index.php');
    }
    else {
        echo 'Пользователь не найден';
    }


}
?>
<h1>Авторизация</h1>
<form method="post" action="">
    <input type="text" name="login"> 
    <br>
    <input type="password" name="password">
    <br>
    <input type="submit">
</form>
<br>
<a href='index.php?p=login'>Авторизация</a>
<br>
<a href='index.php?p=register'>регистрация</a>

