<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

include 'config/config.php';
include 'log.php';
include 'config/singvk.php';

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

        <div class="welcome">
          <h2>Привет <?php echo $_SESSION['user']['name']; ?>!</h2>
          <a class="btn btn-more" href="page.php">Страница для авторизованных пользователей</a>
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

    <p>Так как вы не авторизованный пользователь, тогда вы видите только это</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur architecto natus harum ullam deleniti! Obcaecati voluptatem cupiditate est sit, fugiat amet animi sequi, eligendi ut totam maxime voluptatum. Architecto, aperiam.
      Id vero reprehenderit ipsa soluta suscipit unde corporis, magnam minima consequatur, dolores illo ut velit in aperiam, aliquam natus quae est placeat asperiores beatae omnis corrupti numquam hic eos. Nobis.
      Facilis sequi, obcaecati quidem unde, quam praesentium perferendis qui ipsam ea iste eius aut ab consequuntur pariatur corrupti amet maiores ad! Necessitatibus molestias iusto quam magni reprehenderit. Animi, temporibus! Voluptates.
      Fugit repellendus accusantium doloremque at, ipsum ipsam, odio nesciunt, laborum delectus dolorum nostrum facilis est tempore. Voluptatem ut laboriosam rem iste, quas explicabo autem, corrupti culpa, tempore consequatur earum sed!
      Nemo, quasi aut? Praesentium tenetur tempora nesciunt cum! Consectetur error ex consequatur quod ullam ducimus, laborum, eaque corrupti repellendus expedita esse! Eligendi similique saepe maxime voluptate iure, magnam nemo tenetur..</p>
  </div>

</body>

</html>