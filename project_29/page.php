<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

// Подключаем настройки пути для загружаемых файлов
include 'config/config.php';
include 'config/singvk.php';

if (!isset($_SESSION['user'])) {
  header('Location: ../index.php');
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>Модуль 29. Безопасность и идентификация пользователя</title>
</head>

<body>
  <div class="container">
    <div class="welcom">
      <h2>Привет <?php echo $_SESSION['user']['name']; ?>!</h2>
      <a class="btn" href="config/logout.php">Выход</a>
      <a class="btn btn-more" href="index.php">На главную</a>
    </div>
    Только зарегестрированный пользователь
  </div>
</body>

</html>