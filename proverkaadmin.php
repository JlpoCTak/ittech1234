<?php
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}


$login = $_GET['login'];
$pas = $_GET['password'];


$query_email = "SELECT `login` FROM `admin` WHERE `login`='$login'";
$result_email = mysqli_query($mysqli, $query_email);
$rezemail = mysqli_fetch_assoc($result_email);
$row_email = mysqli_num_rows($result_email);
$emailrok = $rezemail['login'];

$query_pass = "SELECT `password` FROM `admin` WHERE `login`='$login'";
$result_pass = mysqli_query($mysqli, $query_pass);
$rezpas = mysqli_fetch_assoc($result_pass);
$row_pass = mysqli_num_rows($result_pass);
$passrok = $rezpas['password'];

if (($row_email > 0) and ($row_pass > 0)) {
    if ($login == $emailrok and $pas == $passrok) {
        session_start();
        $_SESSION['admin'] = true;
        $script = 'sotrudniki.php';
    } else {
        echo "da";
    }
  
}


/*if (($login == "admin") and ($pas =="admin")) {
    session_start();
    $_SESSION['admin'] = true;
    $script = 'sotrudniki.php';
} else {
    $script ='smenapassword.php';
}*/


header("Location: $script");
?>