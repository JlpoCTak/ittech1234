<?php
$mysqli = new mysqli('localhost', 'root', '', 'ittech123');

if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();}
if (isset($_POST["check"])) {

    $sql = mysqli_query($mysqli, "INSERT INTO `sotrudniki` (`fio`, `email`, `otdel`, `birthday`, `lvldostup`) VALUES ('{$_POST['fio']}',
         '{$_POST['email']}', '{$_POST['otdel']}', '{$_POST['birthday']}', '{$_POST['lvldostu']}')");

    if ($sql) {
        echo '<p>Данные успешно добавлены в таблицу.</p>';
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}