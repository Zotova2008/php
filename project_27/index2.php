<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
require_once "config/login.php";
print "Привет, " . $userdata['user_login'];

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
    <h1 class="mb-4"><a href="<?php echo URL; ?>">Галерея изображений</a></h1>
    <div class="login">
      <a href="#login-out" class="btn btn-primary login__out-js">Зарегистрироваться</a>
      <a href="#login-in" class="btn btn-primary login__in-js">
        Войти
      </a>

      <div class="login__form login__in" id="login-in">
        <div class="login__form-content">
          <button class="icon-close"></button>

          <h2>Войти</h2>
          <form class="form-in" action="" method="POST">
            <input type="text" id="name" name="name" placeholder="Введите ваш логин">
            <input type="password" id="pass" name="pass" placeholder="Введите ваш пароль">
            <input type="password" id="repeat-pass" name="repeat-pass" placeholder="Введите ваш пароль еще раз">
            <button type="submit" class="btn btn-primary">Войти</button>
          </form>
        </div>
      </div>

      <div class="login__form login__out" id="login-out">
        <div class="login__form-content">
          <button class="icon-close"></button>

          <h2>Зарегистрироваться</h2>
          <form class="form-out" action="" method="POST">
            <input type="text" id="name2" name="name2" placeholder="Введите ваш логин">
            <input type="password" id="pass2" name="pass2" placeholder="Введите ваш пароль">
            <input type="password" id="repeat-pass2" name="repeat-pass2" placeholder="Введите ваш пароль еще раз">
            <button type="submit" class="btn btn-primary">Войти</button>
          </form>
        </div>
      </div>
    </div>


    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Имя</th>
          <th>Email</th>
          <th>Зарегистрирован</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $users = getUsersList();
        echo getUsersList();
        echo "a нет ни чего"
        ?>
        <?php if (!empty($users)) : ?>
          <?php foreach ($users as $user) : ?>
            <tr>
              <th scope="row"><?= $user['id'] ?></th>
              <td><?= $user['name'] ?></td>
              <td><?= $user['pass'] ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>






    <!-- Вывод сообщений об успехе/ошибке -->
    <?php foreach ($errors as $error) : ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <?php foreach ($messages as $message) : ?>
      <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endforeach; ?>

    <h2>Список файлов</h2>

    <!-- Вывод изображений -->
    <div class="mb-4">
      <?php if (!empty($files)) : ?>
        <div class="row">
          <?php foreach ($files as $file) : ?>

            <div class="img-container col-12 col-sm-3 mb-4">
              <form method="post">
                <input type="hidden" name="name" value="<?php echo $file; ?>">
                <button type="submit" class="img-delete btn btn-primary" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </form>
              <a data-fancybox="gallery" href="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>"><img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>" class="img-thumbnail" alt="<?php echo $file; ?>"></a>
              <a class="comments-link btn btn-primary" href="<?php echo URL . '/comments.php?name=' . $file; ?>" title="Просмотр полного изображения">Комментировать</a>
            </div>

          <?php endforeach; ?>
        </div><!-- /.row -->
      <?php else : ?>
        <div class="alert alert-secondary">Нет загруженных изображений</div>
      <?php endif; ?>
    </div>


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
  </div><!-- /.container -->

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
  <script src="public_html/js/script.js"></script>
</body>

</html>