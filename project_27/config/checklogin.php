<?php
session_start();

if (isset($_POST['login'])) {
  $login = $_POST['login'];
  if ($login == '') {
    unset($login);
  }
}
if (isset($_POST['password'])) {
  $password = $_POST['password'];
  if ($password == '') {
    unset($password);
  }
}

if (empty($login) or empty($password)) {
  exit("Вы заполнили не все поля!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);

require_once 'config/connect.php';

$result = mysqli_query("SELECT * FROM users WHERE login='$login'", $connect);
$myrow = mysqli_fetch_array($result);
if (empty($myrow['password'])) {

  exit("login или пароль неверный.");
} else {

  if ($myrow['password'] == $password) {

    $_SESSION['login'] = $myrow['login'];
    $_SESSION['id'] = $myrow['id'];
    echo "Вы успешно вошли на сайт!";
  } else {
    exit("Извините, введённый вами login или пароль неверный.");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Авторизация</title>

</head>

<body>

  <div class="container pt-4">

    <ul class="btn-other">
      <li><a class="btn btn-secondary" href="reg.php">Регистрация</a></li>
      <li><a class="btn btn-secondary" href="login.php">Войти</a></li>
      <li><a class="btn btn-secondary" href="index.php">Главная</a></li>
    </ul>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>