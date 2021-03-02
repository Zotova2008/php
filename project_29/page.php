<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

if (!isset($_SESSION['user'])) {
  header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/style.css">

  <title>Модуль 29. Безопасность и идентификация пользователя</title>
</head>

<body>
  <div class="container">

    <div class="welcome">
      <h2>Привет <?php echo $_SESSION['user']['name']; ?>!</h2>
      <a class="btn btn-more" href="index.php">Главная</a>
      <a class="btn" href="config/logout.php">Выход</a>
    </div>

    <?php if ($_SESSION['user']['role'] == 'vk') { ?>
      <img class="img" src="img/1551511801_1.jpg" alt="" width="500">
    <?php }; ?>

    <p>Земля в иллюминаторе, земля в иллюминаторе,<br>
      Земля в иллюминаторе видна...<br>
      Как сын грyстит о матери, как сын грyстит о матери,<br>
      Грyстим мы о земле - она одна.<br>
      А звезды тем не менее, а звезды тем не менее чyть ближе,<br>
      Но все также холодны.<br>
      И, как в часы затмения, и, как в часы затмения ждем света<br>
      И земные видим сны.</p>
  </div>

</body>

</html>