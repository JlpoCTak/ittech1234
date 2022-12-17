<?php
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}


$login = $_GET['login'];
$pas = $_GET['password'];


$result_login = $mysqli->query("SELECT `login` FROM `admin` WHERE `login`= $login");
if ($result->num_rows == 1) {
    $result_password = $mysqli->query("SELECT `password` FROM `admin` WHERE `login`= $login");
    if ($pas == $result_password){
        session_start();
        $_SESSION['admin'] = true;
        $script = 'sotrudniki.php';

    }else{
        $script == 'login.php';}

header("Location: $script");
    }

    ?>