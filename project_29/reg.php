<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

if (isset($_SESSION['user'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/style.css">
  <title>Регистрация</title>
</head>

<body>
  <div class="container">
    <div class="form-box">
      <h5>Зарегистрироваться</h5>
      <form class="form form-in" action="config/singup.php" method="POST">
        <div class="form__item">
          <label for="login">Логин:</label>
          <input type="text" name="login" id="login" placeholder="Введите логин">
        </div>
        <div class="form__item">
          <label for="password">Пароль:</label>
          <input type="password" name="password" id="password" placeholder="Введите пароль">
        </div>
        <button type="submit" name="submit" class="btn btn-more">Зарегистрироваться</button>
        <p class="form__text">У вас уже есть аккаунт? - <a href="index.php">Авторизуйтесь</a></p>

        <?php if (isset($_SESSION['error'])) { ?>
          <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']);
        }; ?>

        <?php if (isset($_SESSION['message'])) { ?>
          <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
        <?php unset($_SESSION['message']);
        }; ?>

      </form>
    </div>

    <p class="home-link"><a href="index.php">На главную</a></p>

  </div>

</body>

</html>