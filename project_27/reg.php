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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="css/style.css">

    <title>Регистрация</title>
</head>

<body>
    <div class="container pt-4">

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
                <button type="submit" name="submit" class="btn btn-primary">Зарегистрироваться</button>
                <p>У вас уже есть аккаунт? - <a href="index.php">Авторизуйтесь</a></p>

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

        <h1 class="mb-4"><a href="index.php">На главную</a></h1>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>

        </script>
</body>

</html>