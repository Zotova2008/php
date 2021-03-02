<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require 'connect.php';

// Параметры приложения
$client_id = '7776014'; // ID приложения
$client_secret = 'JV2OucI6JKBsfzhrppCv'; // Защищённый ключ
$redirect_uri = 'http://localhost:8888/index.php'; // Адрес, на который будет переадресован пользователь после прохождения авторизации
$code = 'code';
$url = 'http://oauth.vk.com/authorize';

// Формируем ссылку для авторизации
$params = [
  'client_id' => $client_id,
  'client_secret' => $client_secret,
  'code' => $code,
  'redirect_uri' => $redirect_uri,
  // Права доступа приложения https://vk.com/dev/permissions
  // Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
  // Если не указать "offline", то полученный токен будет жить 12 часов.
  'scope' => 'offline',

];

if (isset($_GET['code'])) {
  $result = true;
  $params = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'code' => $_GET['code'],
    'redirect_uri' => $redirect_uri
  ];

  $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

  if (isset($token['access_token'])) {
    // Сохраняем токен в сессии
    $_SESSION['token'] = $token;
    $params = [
      'uids' => $token['user_id'],
      'fields' => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
      'access_token' => $token['access_token'],
      'v' => '5.130'
    ];

    $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
    if (isset($userInfo['response'][0]['id'])) {
      $userInfo = $userInfo['response'][0];
      $result = true;
    }
  }

  if ($result) {
    $name = $userInfo['first_name'];
    $login = $userInfo['id'];
    $password = $userInfo['id'];
    $vk_user = '1';
    $role = 'vk';

    $check = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'");
    $resCheck = mysqli_num_rows($check);

    if ($resCheck > 0) {
      $_SESSION['message'] = "Логин уже занесен в базу";
    } else {
      $password = password_hash($password, PASSWORD_DEFAULT);
      mysqli_query($connect, "INSERT INTO users (login, password, name, vk_user, role) VALUES ('$login', '$password', '$name', '$vk_user', '$role')");

      $check = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'");
      $resCheck = mysqli_num_rows($check);

      if ($resCheck > 0) {
        // Получаем массив из выборки
        $user = mysqli_fetch_assoc($check);
        $_SESSION['user'] = [
          "id" => $user['id'],
          "login" => $user['login'],
          "name" => $user['name'],
          "role" => $user['role'],
        ];
      }

      $_SESSION['message'] = "Авторизация прошла успешно.";
      header('Location: ../index.php');
    }
  }
}
