<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require 'connect.php';
// Массив ошибок
$errors = [];
// Массив сообщений
$messages = [];

// Если файл был отправлен
if (!empty($_FILES)) {
  print_r($_FILES['files']);
  // Проходим в цикле по файлам
  for ($i = 0; $i < count($_FILES['files']['name']); $i++) {

    $fileName = $_FILES['files']['name'][$i];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Проверяем размер
    if ($_FILES['files']['size'][$i] > UPLOAD_MAX_SIZE) {
      $errors[] = 'Недопостимый размер файла ' . $fileName;
      continue;
    }

    // Проверяем формат
    if (!in_array($_FILES['files']['type'][$i], ALLOWED_TYPES)) {
      $errors[] = 'Недопустимый формат файла ' . $fileName;
      continue;
    }

    $filePath = UPLOAD_DIR . '/' . time() . '.' . $fileExtension;

    // Пытаемся загрузить файл
    if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
      $errors[] = 'Ошибка загрузки файла ' . $fileName;
      continue;
    } else {
      $login_user = $_SESSION['user']['login'];
      $img_name = $_FILES['files']['name'][$i];
      mysqli_query($connect, "INSERT INTO images (login, name, path) VALUES ('$login_user', '$img_name', '$filePath')");
    }
  }

  if (empty($errors)) {
    $messages[] = 'Файлы были загружены';
    header('Location: ../index.php');
    exit();
  }
}

// Если файл был удален
if (!empty($_POST['name'])) {

  $filePath = UPLOAD_DIR . '/' . $_POST['name'];
  $commentPath = COMMENT_DIR . '/' . $_POST['name'] . '.txt';

  // Удаляем изображение
  unlink($filePath);

  // Удаляем файл комментариев, если он существует
  if (file_exists($commentPath)) {
    unlink($commentPath);
  }

  $messages[] = 'Файл был удален';
}

// Получаем список файлов, исключаем системные
$files = scandir(UPLOAD_DIR);
$files = array_filter($files, function ($file) {
  return !in_array($file, ['.', '..', '.gitkeep']);
});
// Создаем массив из картинок из БД
$imgSql = mysqli_query($connect, "SELECT * FROM images");
// Получаем массив из выборки
for ($dataImg = []; $row = mysqli_fetch_assoc($imgSql); $dataImg[] = $row);
