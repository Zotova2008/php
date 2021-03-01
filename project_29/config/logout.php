<?php
session_start();
session_destroy();
// unset($_SESSION['user']);
$_SESSION['message'] = 'Вы вышли из аккаунта';
header('Location: ../index.php');
