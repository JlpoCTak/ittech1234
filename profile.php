<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $mysqli = new mysqli('localhost', 'root', '', 'ittech123');
if (mysqli_connect_errno()) {
	echo "Подключение невозможно: ".mysqli_connect_error();
}
session_start();
?>
<link rel="stylesheet" href="style.css" />
<body class="body_korzina">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css" />
<style>
.card {

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title-card {
  color: grey;
  font-size: 14px;
}

.button-card {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 14px;
}

.a_card {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
 
</style>
</head>
<body>

<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
  
  <?php
  $email= $_SESSION['login'];
  $query = "SELECT `fio`,`otdel`,`birthday`,`lvldostup` FROM `sotrudniki` WHERE `email`='$email'";

  $result = $mysqli->query($query);
  
  foreach($result as $row){
      $fio =$row['fio'];
      $otdel = $row['otdel'];
      $birthday = $row['birthday'];
      $lvldostup = $row['lvldostup'];
      echo "<h1>".$email."</h1>
      <h1>".$fio."</h1>
      <h1>".$otdel."</h1>
      <h1>".$birthday."</h1>
      <h1>".$lvldostup."</h1>";
  }
  ?>
<p><input type="button" class="button_card" onclick="window.location.href ='smenapassword.php'" value="Сменить пароль"></p>
</div>

</body>
</html>

