<?php
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}

header('Content-type: text/html; charset=utf-8');
session_start();
if (! $_SESSION['admin'])
header('Location: proverkaadmin.php');

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
			<h1>Данные сотрудников</h1>
			<form action='main.php' target="_blank">
            <button>Переход на главную </button>
        </form>

			<table>
				<thead>
					<th>ФИО</th>
					<th>Электронная почта</th>
					<th>Отдел</th>
					<th>ДАта Рождения</th>
					<th>Уровень доступа</th>
					
				</thead>
				<form action=""  class="mid_window">	
					<tbody>
						<td><input name="fio"></td>
						<td><input name="email"></td>
						<td>
							<select name ="otdel">
								<option> Коммерческий</option>
								<option>Финансовый</option>
								<option>Маркетинговый</option>
							</select>
						</td>
						<td><input type="date" name="birthday"></td>
						<td><input type="checkbox" name="lvldostup" value="true"></td>
						<td><input type="submit" name="check" value="Добавить работника"></td>
					</tbody>
				</form>
				<?php

                if (isset($_GET["email"])) {
	                if (isset($_GET["otdel"])) {
		                if (isset($_GET["fio"]))
			                if (isset($_GET["birthday"])) {
				                if (empty($_GET["lvldostup"])) {
					                $sql = mysqli_query($mysqli, "INSERT INTO `sotrudniki` (`fio`, `email`, `otdel`, `birthday`, `lvldostup`) VALUES ('{$_GET['fio']}',
						 			'{$_GET['email']}', '{$_GET['otdel']}', '{$_GET['birthday']}', 'false')");
				                } else {
					                $sql = mysqli_query($mysqli, "INSERT INTO `sotrudniki` (`fio`, `email`, `otdel`, `birthday`, `lvldostup`) VALUES ('{$_GET['fio']}',
						 			'{$_GET['email']}', '{$_GET['otdel']}', '{$_GET['birthday']}', 'true')");
				                }
			                } else {
				                if (empty($_GET["lvldostup"])) {
					                $sql = mysqli_query($mysqli, "INSERT INTO `sotrudniki` (`fio`, `email`, `otdel`, `lvldostup`) VALUES ('{$_GET['fio']}',
						 			'{$_GET['email']}', '{$_GET['otdel']}', 'false')");
				                } else {
					                $sql = mysqli_query($mysqli, "INSERT INTO `sotrudniki` (`fio`, `email`, `otdel`, `lvldostup`) VALUES ('{$_GET['fio']}',
						 			'{$_GET['email']}', '{$_GET['otdel']}',  'true')");
				                }
			                }
	                }
                }
			

				$result = $mysqli->query('SELECT * FROM `sotrudniki`'); // запрос на выборку
				while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
				{
					echo '<tbody>
					<td>'.$row['fio'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['otdel'].'</td>
					<td>'.$row['birthday'].'</td>
					<td>'.$row['lvldostup'].'</td>
				</tbody>';// выводим данные
				}
				
				?>
			</table>
		</div>
		<div class ="footer"></div>
		</div>
		</div>
</body>
</html>
