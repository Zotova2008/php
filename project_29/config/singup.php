<?php
session_start();
require 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];

$check = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'");
$resCheck = mysqli_num_rows($check);

if ($resCheck > 0) {
  $_SESSION['error'] = "Такой логин уже существует";
  header('Location: ../reg.php');
} else {
  if ($login && $password && $name) {
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connect, "INSERT INTO users (login, password, name) VALUES ('$login', '$password', '$name')");

    $check = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'");
    $resCheck = mysqli_num_rows($check);

    if ($resCheck > 0) {
      // Получаем массив из выборки
      $user = mysqli_fetch_assoc($check);
      $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "name" => $user['name'],
        "role" => $user['role'],
      ];
    }

    $_SESSION['message'] = "Регистрация прошла успешно.";

    header('Location: ../index.php');
  } else {

    $_SESSION['error'] = "Заполните все поля";
    header('Location: ../reg.php');
  }
}
