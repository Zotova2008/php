<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();

require 'config/config.php';
require 'config/config-uploads-comment.php';
if (isset($_SESSION['user'])) {
    $login = $_SESSION['user']['login'];
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

    <link rel="stylesheet" href="css/style.css">

    <title>Галерея изображений | Файл <?php echo $imgName; ?></title>
</head>

<body>
    <div class="container pt-4">
        <div class="form-box">

            <?php if (!isset($_SESSION['user'])) { ?>
                <h5>Комментарии, могут оставлять только авторизованные пользователи</h5>
                <div class="link">
                    <a href="index.php" class="btn btn-primary">Войти</a>
                    <a href="reg.php" class="btn btn-primary">Зарегистрироваться</a>
                </div>
            <?php } else { ?>
                <div class="welcom">
                    <h2>Привет <?php echo $_SESSION['user']['login']; ?>!</h2>
                    <a class="btn btn-primary" href="config/logout.php">Выход</a>
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

        <h1 class="mb-4"><a href="<?php echo URL; ?>">Галерея изображений</a></h1>

        <!-- Вывод сообщений об успехе/ошибке -->


        <h2 class="mb-4">Файл <?php echo $imgName; ?></h2>

        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2">

                <img src="<?php echo URL . '/' . $imgPath ?>" class="img-thumbnail mb-4" alt="<?php echo $imgName ?>">

                <h3>Комментарии</h3>
                <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endforeach; ?>

                <?php foreach ($messages as $message) : ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endforeach; ?>

                <?php if (isset($_SESSION['user'])) { ?>
                    <!-- Форма добавления комментария -->
                    <form method="post">
                        <div class="form-group">
                            <label for="comment">Ваш комментарий</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required minlength="10" maxlength="200" placeholder="Длинна комментария от 10 до 200 символов"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                <?php }; ?>

                <?php if (!empty($dataCommit)) : ?>
                    <?php foreach ($dataCommit as $comm) : ?>
                        <?php
                        $authorComm = $comm['login'];
                        $text = $comm['text'];
                        $time = $comm['time'];
                        $id = $comm['id'];
                        ?>
                        <div class="comment-box">
                            <div class="comment-box__item">
                                <p class="comment-box__auth"><?php echo $authorComm; ?></p>
                                <p class="comment-box__time"><?php echo $time; ?></p>
                                <form method="post">
                                    <input type="hidden" name="id_comment" value="<?php echo $id; ?>">
                                    <?php if (isset($_SESSION['user'])) {
                                        if ($login === $authorComm) { ?>
                                            <button type="submit" class="comment-box__del" name="comm_del" aria-label="Удалить">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    <?php }
                                    }; ?>
                                </form>
                            </div>
                            <p class="comment-box__text"><?php echo $text; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class=" text-muted">Пока ни одного коммантария, будте первым!</p>
                <?php endif; ?>


            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>