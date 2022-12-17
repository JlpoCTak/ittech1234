<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
use LDAP\Result;
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}


$login = $_GET['login'];
$pas = $_GET['password'];

$query = "SELECT `email` FROM `sotrudniki` WHERE `email`='$login'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_num_rows($result);
if ($row > 0) {
    echo "da";
} else {
    echo "no";
}
if ($login == '' and $pas == "") {
    session_start();
    $_SESSION['login'] = $login;
    $script = 'profile.php';
}else{
    $script = 'loginsotrudnik.php';
}


header("Location: $script");
?>