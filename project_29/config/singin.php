<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
require 'connect.php';
include '../log.php';

$login = $_POST['login'];
$password = $_POST['password'];

$check = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'");
$resCheck = mysqli_num_rows($check);

if ($login && $password) {

  if ($resCheck > 0) {
    // Получаем массив из выборки
    $user = mysqli_fetch_assoc($check);
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "name" => $user['name'],
        "role" => $user['role'],
      ];
      $_SESSION['message'] = "Авторизация прошла успешно";
    } else {
      $_SESSION['error'] = "Пароль не верный";
      $log->error("Пароль не верный");
    }
  } else {
    $_SESSION['error'] = "Такого пользователя не существует";
    $log->error("Такого пользователя не существует");
  }
} else {
  $_SESSION['error'] = "Заполните все поля";
  $log->error("Заполните все поля");
}

header('Location: ../index.php');
