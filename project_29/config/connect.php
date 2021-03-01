<?php

$host = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'module29';

// Подключаемся к БД
$connect = mysqli_connect($host, $dbUser, $dbPass, $dbName);
// Задаем кодировку
mysqli_query($connect, "SET NAME 'utf8'");

if (!$connect) {
  die("Не удалось соединиться: " . mysqli_connect_error());
}
