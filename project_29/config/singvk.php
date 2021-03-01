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
  // 'scope' => 'photos,offline'
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
    $vk_id = $userInfo['id'];
    $vk_name = $userInfo['first_name'];
    $vk_link = $userInfo['screen_name'];

    $check = mysqli_query($connect, "SELECT * FROM users_vk WHERE vk_id = '$vk_id'");
    $resCheck = mysqli_num_rows($check);

    if ($resCheck > 0) {
      $_SESSION['message'] = "Логин уже занесен в базу";
    } else {
      mysqli_query($connect, "INSERT INTO users_vk (vk_id, vk_name, vk_link) VALUES ('$vk_id', '$vk_name', '$vk_link')");

      $check = mysqli_query($connect, "SELECT * FROM users_vk WHERE vk_id = '$vk_id'");
      $resCheck = mysqli_num_rows($check);

      if ($resCheck > 0) {
        // Получаем массив из выборки
        $user_vk = mysqli_fetch_assoc($check);
        $_SESSION['user_vk'] = [
          "id" => $user_vk['id'],
          "vk_id" => $user_vk['vk_id'],
          "vk_name" => $user_vk['vk_name'],
        ];
      }

      $_SESSION['message'] = "Авторизация прошла успешно.";
    }
  }
}

if (isset($token)) {
  echo 'var_dump($token)' . '<br>';
  var_dump($token);
  echo '<br>';
}

if (isset($vk_id)) {
  echo 'Пользователь vk' . ': ' . $vk_id . ', ' . $vk_name . ', ' . $vk_link . '<br>';
}

echo 'var_dump($_SESSION)' . '<br>';
var_dump($_SESSION);
echo '<br>';

echo 'var_dump($_GET)' . '<br>';
var_dump($_GET);
echo '<br>';

echo 'var_dump($_POST)' . '<br>';
var_dump($_POST);
echo '<br>';
