<?php
session_start();
// Подключаем настройки пути для загружаемых файлов
include 'config/config.php';

// Для обработки загружаемых файлов через форму
include 'config/config-upload-file.php';

if ($_SESSION['user']) {
  $_SESSION['user'] = [
    "login" => $user['login'],
  ];

  // echo $_SESSION['user']['login'] . ', OK';
  echo 'Все хорошо';
  var_dump($_SESSION['user']);
  // var_dump($user);
}
// else {
//   echo $_SESSION['user']['login'] . ', NOt OK';
// }

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

    <div class="form-box">

      <?php if (!$_SESSION['user']) { ?>
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
          <button type="submit" class="btn btn-primary">Войти</button>
          <p>У вас нет аккаунта? - <a href="reg.php">Зарегистрироваться</a></p>
        </form>

      <?php } else { ?>

        <div class="welcom">
          <h2>Привет <?php echo $_SESSION['user']['login']; ?>!</h2>
          <a class="btn btn-primary" href="config/logout.php">Выход</a>
        </div>
      <?php } ?>

      <?php
      if ($_SESSION['error']) { ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
      <?php unset($_SESSION['error']);
      }; ?>

      <?php if ($_SESSION['message']) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
      <?php unset($_SESSION['message']);
      }; ?>

      <!-- Вывод сообщений об успехе/ошибке -->
      <?php foreach ($errors as $error) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endforeach; ?>

      <?php foreach ($messages as $message) : ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
      <?php endforeach; ?>
    </div>
    <h2>Галерея изображений</h2>

    <!-- Вывод изображений -->
    <div class="mb-4">
      <?php if (!empty($files)) : ?>
        <div class="row">
          <?php foreach ($files as $file) : ?>

            <div class="img-container col-12 col-sm-3 mb-4">
              <form method="post">
                <input type="hidden" name="name" value="<?php echo $file; ?>">
                <?php if ($_SESSION['user']) { ?>
                  <button type="submit" class="img-delete btn btn-primary" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <?php }; ?>
              </form>
              <a data-fancybox="gallery" href="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>"><img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>" class="img-thumbnail" alt="<?php echo $file; ?>"></a>
              <a class="comments-link btn btn-primary" href="<?php echo URL . '/file.php?name=' . $file; ?>" title="Просмотр полного изображения">Комментировать</a>
            </div>

          <?php endforeach; ?>
        </div><!-- /.row -->
      <?php else : ?>
        <div class="alert alert-secondary">Нет загруженных изображений</div>
      <?php endif; ?>
    </div>

    <?php if ($_SESSION['user']) { ?>
      <!-- Форма загрузки файлов -->
      <form method="post" enctype="multipart/form-data">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
          <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файлы</label>
          <small class="form-text text-muted">
            Максимальный размер файла: <?php echo UPLOAD_MAX_SIZE / 1000000; ?>Мб.
            Допустимые форматы: <?php echo implode(', ', ALLOWED_TYPES) ?>.
          </small>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Загрузить</button>
      </form>

    <?php }; ?>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js"></script>
  <script>
    $(() => {
      bsCustomFileInput.init();
    });
  </script>
  <script>

  </script>
</body>

</html>