<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
use LDAP\Result;
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}


$login = $_GET['login'];
$pas = $_GET['password'];

$query_email = "SELECT `email` FROM `sotrudniki` WHERE `email`='$login'";
$result_email = mysqli_query($mysqli, $query_email);
$rezemail = mysqli_fetch_assoc($result_email);
$row_email = mysqli_num_rows($result_email);
$emailrok = $rezemail['email'];

$query_pass = "SELECT `password` FROM `sotrudniki` WHERE `email`='$login'";
$result_pass = mysqli_query($mysqli, $query_pass);
$rezpas = mysqli_fetch_assoc($result_pass);
$row_pass = mysqli_num_rows($result_pass);
$passrok = $rezpas['password'];

if (($row_email > 0) and ($row_pass > 0)) {
    if ($login == $emailrok and $pas == $passrok) {
        session_start();
        $_SESSION['login'] = $login;
        $script = 'profile.php';
    }else{
        $script = 'loginsotrudnik.php';
    }
   
    
}

header("Location: $script");
?>