<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Авторизация</title>

</head>

<body>

  <div class="container pt-4">

    <h2>Вход</h2>
    <?php
    if (isset($_SESSION['message'])) {
      echo "<div class='alert alert-danger'>" . $_SESSION['message'] . "</div>";
      unset($_SESSION['message']);
    }
    ?>

    <form class="form" action="config/checklogin.php" method="post">
      <input name="login" type="text" size="15" maxlength="15" placeholder="Логин">
      <input name="password" type="password" size="15" maxlength="15" placeholder="Пароль">
      <button class="btn btn-primary" type="submit" name="submit">Войти</button>
    </form>


    <ul class="btn-other">
      <li><a class="btn btn-secondary" href="reg.php">Регистрация</a></li>
      <li><a class="btn btn-secondary" href="index.php">Главная</a></li>
    </ul>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>