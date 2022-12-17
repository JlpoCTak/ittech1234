<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}

header('Content-type: text/html; charset=utf-8');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css" />
	<title>Document</title>
</head>
<body class="body_korzina">
	<div class="parent">
		
		
		<div class="header">
			<h2 class="title">
				SATAIRU
			</h2>
		</div>
		<div class="fon_of_tovar">
        <form method ="GET" action="" class="mid_window">
			<p class="main_nadpis">Вход в личный кабинет</p>
			<input type="password" name="password" class="input_log" placeholder="Введите ваш старый пароль" value="">
            <input type="password" name="new_password" class="input_pas" placeholder="Введите пароль" value="">
			<input type="submit" class="licab_log" value="Войти">	
        </form>
        <?php
            $old_pas = $_GET['password'];
            $new_pas = $_GET['new_password'];
            $email= $_SESSION['login'];
            $query = "SELECT `password` FROM `sotrudniki` WHERE `email`='$email'";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_assoc($result);
            $name = $row['password'];
            if($old_pas == $name){
            $query = "UPDATE `sotrudniki` SET `password`='$new_pas' WHERE `email`='$email'";
                mysqli_query($mysqli,$query);

            }
        ?>
		</div>
		<div class ="footer"></div>
		</div>
		</div>
</body>
</html>
