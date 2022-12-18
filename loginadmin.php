<?php
  $mysqli = @new mysqli('localhost', 'root', '', 'ittech123');
if (mysqli_connect_errno()) {
	echo "Подключение невозможно: ".mysqli_connect_error();
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	
</head>
<body class="body_log_reg">
	<div class="parent">
		
	
		<div class="header">
			<h2 class="title">
		</div>
		<form method ="GET" action="proverkaadmin.php" class="mid_window">
			<p class="main_nadpis">Вход в личный кабинет</p>
			<input  type="login" name="login" class="input_log" placeholder="Введите почту" value="">
			<input type="password" name="password" class="input_pas" placeholder="Введите пароль" value="">
			<input type="submit" class="licab_log" value="Войти">	
			
			<a class="logining_as" href="loginsotrudnik.php">Войти как сотрудник"</a>
        </form>
		
		<div class ="footer"></div>
		</div>
		</div>
</body>
</html>
