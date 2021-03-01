<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

// Подключаем настройки пути для загружаемых файлов
include 'config/config.php';
include 'config/singvk.php';

echo '<br>$_SESSION<br><pre>';
print_r($_SESSION);
echo '</pre><br>';



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

    <div class="form-box">

      <?php if (!isset($_SESSION['user'])) { ?>
        <h5>Вы не авторизованы</h5>
        <form class="form form-in" method="POST" action="config/singin.php">
          <div class="form__item">
            <label for="login">Логин:</label>
            <input type="text" name="login" id="login" placeholder="Введите логин">
          </div>
          <div class="form__item">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" placeholder="Введите пароль">
          </div>
          <input type="hidden" name="token" value="<?php $token ?>">
          <div class="form__button">
            <button type="submit" class="btn">Войти</button><a class="btn btn-more btn-vk" href="<?php echo $url . "?" . urldecode(http_build_query($params)); ?>">Войти через VK</a>
          </div>
          <p class=" form__text">У вас нет аккаунта? - <a href="reg.php">Зарегистрироваться</a></p>
        </form>
      <?php } else { ?>

        <div class="welcom">
          <h2>Привет <?php echo $_SESSION['user']['name']; ?>!</h2>
          <a class="btn" href="config/logout.php">Выход</a>
        </div>
      <?php } ?>

      <?php
      if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
      <?php unset($_SESSION['error']);
      }; ?>

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
      <?php unset($_SESSION['message']);
      }; ?>
    </div>

    <?php if (isset($_SESSION['user'])) { ?>
      <p>Авторизованный пользователь видит этот текст</p>
    <?php }; ?>
  </div>

</body>

</html>