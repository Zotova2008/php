<?php

$host = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'module27';

// Подключаемся к БД
// $connect = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die(mysqli_error($connect));
// Задаем кодировку
// mysqli_query($connect, "SET NAME 'utf8'");

$connect = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

if (!$connect) {
  die("Не удалось соединиться: " . mysqli_connect_error());
} else {
  echo "подключено";
}
