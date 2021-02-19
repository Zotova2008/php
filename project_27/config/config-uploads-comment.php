<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require 'connect.php';

$errors = [];
$messages = [];


$imageFileName = $_GET['name'];

$sqlCommitAll = mysqli_query($connect, "SELECT * FROM comments WHERE img_name = '$imageFileName'");
$resCommitAll = mysqli_num_rows($sqlCommitAll);

if ($resCommitAll > 0) {
  for ($dataCommit = []; $row = mysqli_fetch_assoc($sqlCommitAll); $dataCommit[] = $row);
  $dataCommit = array_reverse($dataCommit);
}

// Находим картинку с таким именем 
$sqlImg = mysqli_query($connect, "SELECT * FROM images WHERE name = '$imageFileName'");
$resImg = mysqli_num_rows($sqlImg);

if ($resImg > 0) {
  $imgArr = mysqli_fetch_assoc($sqlImg);
  $imgLogin = $imgArr['login'];
  $imgPath = $imgArr['path'];
  $imgName = $imgArr['name'];
}

$sqlCommit = mysqli_query($connect, "SELECT * FROM comments WHERE img_name = '$imageFileName'");
$resCommit = mysqli_num_rows($sqlCommit);

if ($resCommit > 0) {
  $commitArr = mysqli_fetch_assoc($sqlCommit);
  $commitLogin = $commitArr['login'];
  $commitText = $commitArr['text'];
  $commitTime = $commitArr['time'];
}

// Если коммент был отправлен
if (!empty($_POST['comment'])) {

  $comment = trim($_POST['comment']);

  // Валидация коммента
  if ($comment === '') {
    $errors[] = 'Вы не ввели текст комментария';
  }

  // Если нет ошибок записываем коммент
  if (empty($errors)) {
    $login_user = $_SESSION['user']['login'];
    mysqli_query($connect, "INSERT INTO comments (login, img_name, text) VALUES ('$login_user', '$imgName', '$comment')");
    $messages[] = 'Комментарий был добавлен';
    header("Refresh:1");
  }
}

if (isset($_POST['comm_del'])) {
  $commitId = $_POST[('id_comment')];
  mysqli_query($connect, "DELETE FROM comments WHERE id = '$commitId'");
  $messages[] = 'Комментарий был удален';
  header("Refresh:1");
}
