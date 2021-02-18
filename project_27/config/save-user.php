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
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);

require_once "config/connect.php";

$result = mysqli_query("SELECT id FROM users WHERE login='$login'", $connect);
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['id'])) {
  exit("Такой логин уже зарегистрирован.");
}
// если такого нет, то сохраняем данные
$result2 = mysqli_query($connect, "INSERT INTO users SET user_login='" . $login . "', user_password='" . $password . "'");
// Проверяем, есть ли ошибки
if ($result2 == 'TRUE') {
  echo "Вы успешно зарегистрированы!";
} else {
  echo "Ошибка! Вы не зарегистрированы.";
}
