<?php
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}


$login = $_GET['login'];
$pas = $_GET['password'];



if ($login == 'ivanov@gmail.com' and $pas == "1234") {
    session_start();
    $_SESSION['login'] = $login;
    $script = 'profile.php';
}else{
    $script = 'loginsotrudnik.php';
}


header("Location: $script");
?>