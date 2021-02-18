<?php $errors = [];
$messages = [];

$imageFileName = $_GET['name'];
$commentFilePath = COMMENT_DIR . '/' . $imageFileName . '.txt';

// Если коммент был отправлен
if (!empty($_POST['comment'])) {

  $comment = trim($_POST['comment']);

  // Валидация коммента
  if ($comment === '') {
    $errors[] = 'Вы не ввели текст комментария';
  }

  // Если нет ошибок записываем коммент
  if (empty($errors)) {

    // Чистим текст, земеняем переносы строк на <br/>, дописываем дату
    $comment = strip_tags($comment);
    $comment = str_replace(array(["\r\n", "\r", "\n", "\\r", "\\n", "\\r\\n"]), "<br/>", $comment);
    $comment = date('d.m.y H:i') . ': ' . $comment;

    // Дописываем текст в файл (будет создан, если еще не существует)
    file_put_contents($commentFilePath,  $comment . "\n", FILE_APPEND);

    $messages[] = 'Комментарий был добавлен';

    fclose($comment);
  }
}

// Получаем список комментов
$comments = file_exists($commentFilePath)
  ? file($commentFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
  : [];
$GLOBALS['comments'];
