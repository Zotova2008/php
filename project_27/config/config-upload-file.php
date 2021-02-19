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
    $img_name = time();
    $img_name = $i . $img_name;
    $filePath = UPLOAD_DIR . '/' . $i . $img_name . '.' . $fileExtension;

    // Пытаемся загрузить файл
    if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
      $errors[] = 'Ошибка загрузки файла ' . $fileName;
      continue;
    } else {
      $login_user = $_SESSION['user']['login'];
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
if (isset($_POST['img_del'])) {

  $imgDel = $_POST['name'];

  $sql = mysqli_query($connect, "SELECT * FROM images WHERE name = '$imgDel'");
  $res = mysqli_fetch_assoc($sql);

  $nameImgDel = $res['name'];
  $pathImgDel = $res['path'];

  $sqlDel = mysqli_query($connect, "DELETE FROM images WHERE name = '$nameImgDel'");
  // Удаляем из папки
  unlink($pathImgDel);

  $sqlCommit = mysqli_query($connect, "SELECT * FROM comments WHERE img_name = '$nameImgDel'");
  $resCommit = mysqli_num_rows($sqlCommit);

  if ($resCommit > 0) {
    $resCommitDel = mysqli_query($connect, "DELETE FROM comments WHERE img_name = '$nameImgDel'");
  }
}
// Создаем массив из картинок из БД
$imgSql = mysqli_query($connect, "SELECT * FROM images");
// Получаем массив из выборки
for ($dataImg = []; $row = mysqli_fetch_assoc($imgSql); $dataImg[] = $row);
