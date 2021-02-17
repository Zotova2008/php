<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// require_once "connect.php";
$host = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'module27';

// Подключаемся к БД
$connect = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die(mysqli_error($connect));
// Задаем кодировку
mysqli_query($connect, "SET NAME 'utf8'");

// $connect = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

if (!$connect) {
  die("Не удалось соединиться: " . mysqli_connect_error());
} else {
  echo "подключено";
}


// if (isset($_POST['username']) && isset($_POST['pass'])) {
//   $username = $_POST['username'];
//   $pass = $_POST['pass'];

//   $query = "INSERT INTO users (user_login, user_password) VALUES ($username, $pass)";
//   $result = mysqli_query($connect, $query);

//   if ($result) {
//     $resultMess = "Регистрация прошла успешно";
//   } else {
//     $resultMessError = "Ошибка";
//   }
// }

// if (isset($_POST['usernameIn']) && isset($_POST['passIn'])) {
//   $usernameIn = $_POST['usernameIn'];
//   $passIn = $_POST['passIn'];
// }

if (isset($_POST['submit'])) {
  echo "был submit";
  $err = [];
  // проверяем логин
  if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['username'])) {
    $err[] = "Логин может состоять только из букв английского алфавита и цифр";
  }
  if (strlen($_POST['username']) < 3 or strlen($_POST['username']) > 255) {
    $err[] = "Логин должен быть не меньше 3-х символов и не больше 255";
  }
  // проверяем, не существует ли пользователя с таким именем
  $query = mysqli_query($connect, "SELECT username FROM users WHERE username='" . mysqli_real_escape_string($connect, $_POST['username']) . "'");

  if (mysqli_num_rows($query) > 0) {
    $err[] = "Пользователь с таким логином уже существует в базе данных";
  }

  // Если нет ошибок, то добавляем в БД нового пользователя
  if (count($err) == 0) {
    $username = $_POST['username'];
    // Убираем лишние пробелы и делаем двойное хэширование (используем старый метод md5)
    $password = crypt($_POST['password']);
    mysqli_query($connect, "INSERT INTO users SET username='" . $username . "', password='" . $password . "'");
    // header("Location: login.php");
    print "<br>Успешно</br><br>";
    exit();
  } else {
    print "<b>При регистрации произошли следующие ошибки:</b><br>";
    foreach ($err as $error) {
      print $error . "<br>";
    }
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="css/style.css">

  <title>Галерея изображений | Список файлов</title>
</head>

<body>
  <div class="container pt-4">
    <h1 class="mb-4"><a href="#">Галерея изображений</a></h1>
    <div class="login">
      <!-- <a href="#login-out" class="btn btn-primary login__out-js">Зарегистрироваться</a>
      <a href="#login-in" class="btn btn-primary login__in-js">
        Войти
      </a> -->

      <div class="login__form login__out">
        <!--  <div class="login__form-content">
          <button class="icon-close"></button> -->
        <?php if (isset($resultMess)) {
          echo "<div class='alert alert-success' role='alert'>" . $resultMess . " </div>";
        }
        ?>
        <?php if (isset($resultMessError)) {
          echo "<div class='alert alert-danger' role='alert'>" . $resultMessError . " </div>";
        }
        ?>
        <h2>Зарегистрироваться</h2>
        <form class="form-sighin" action="" method="POST">
          <input type="text" id="username" name="username" placeholder="Введите ваш логин">
          <input type="password" id="pass" name="password" placeholder="Введите ваш пароль">
          <button type="submit" name="submit" class="btn btn-primary">Войти</button>
        </form>
        <!-- </div> -->
      </div>
      <div class="login__form login__in">
        <!--    <div class="login__form-content">
          <button class="icon-close"></button> -->

        <h2>Войти</h2>
        <form class="form-sighin" action="" method="POST">
          <input type="text" id="usernameIn" name="usernameIn" placeholder="Введите ваш логин">
          <input type="password" id="passIn" name="passIn" placeholder="Введите ваш пароль">
          <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        <!-- </div> -->
      </div>


      <!-- </div> -->
      <?php
      // Проверяем, пусты ли переменные логина и id пользователя
      if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
        // Если пусты, то мы не выводим ссылку
        echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
      } else {

        // Если не пусты, то мы выводим ссылку
        echo "Вы вошли на сайт, как " . $_SESSION['login'] . "<br><a  href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
      }
      ?>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js"></script>
      <script>
        $(() => {
          bsCustomFileInput.init();
        });
      </script>
      <script src="js/script.js"></script>
</body>

</html>