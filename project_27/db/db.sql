-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Фев 19 2021 г., 15:16
-- Версия сервера: 5.7.30
-- Версия PHP: 7.4.9
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
--
  -- База данных: `module27`
  --
  -- --------------------------------------------------------
  --
  -- Структура таблицы `comments`
  --
  CREATE TABLE `comments` (
    `id` int(11) NOT NULL,
    `login` varchar(60) NOT NULL,
    `img_name` varchar(255) NOT NULL,
    `text` varchar(255) NOT NULL,
    `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Дамп данных таблицы `comments`
  --
INSERT INTO
  `comments` (`id`, `login`, `img_name`, `text`, `time`)
VALUES
  (
    10,
    '222',
    '01613728747',
    'Абракадабра',
    '2021-02-19 14:41:49'
  ),
  (
    12,
    '222',
    '01613728747',
    'Ghbdtn\r\ndff',
    '2021-02-19 15:00:59'
  ),
  (
    13,
    '222',
    '01613728747',
    'И еще раз и еще',
    '2021-02-19 15:01:25'
  );
-- --------------------------------------------------------
  --
  -- Структура таблицы `images`
  --
  CREATE TABLE `images` (
    `id` int(11) NOT NULL,
    `login` varchar(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `path` varchar(255) NOT NULL,
    `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Дамп данных таблицы `images`
  --
INSERT INTO
  `images` (`id`, `login`, `name`, `path`, `time`)
VALUES
  (
    32,
    '888',
    '01613728759',
    'uploads/001613728759.jpg',
    '2021-02-19 09:59:19'
  );
-- --------------------------------------------------------
  --
  -- Структура таблицы `users`
  --
  CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `login` varchar(60) NOT NULL,
    `password` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Дамп данных таблицы `users`
  --
INSERT INTO
  `users` (`id`, `login`, `password`)
VALUES
  (
    1,
    '111',
    '$2y$10$xCCBrytn8b99IGCUIvnA4OYUH0CzDGslmCy5AxXDSka2HCkVG2Oje'
  ),
  (
    2,
    'Natali',
    '$2y$10$Bfm5Zjpb0wzpxzisJ27lLOmCLx.zGsQTrpCMhXbJPB6VtFM15RfeW'
  ),
  (
    3,
    '222',
    '$2y$10$6LRP4FeRzVPoVSOUZYlxJ.G0SRWWmcnUJN4X69KaJxQiB7FpkPJc2'
  ),
  (
    4,
    '444',
    '$2y$10$eUKm0hbmIW1O5J3TFg2gyOVUegBkDlwLj/RYI9EEHpOTjkNidbmvi'
  ),
  (
    5,
    '333',
    '$2y$10$nojgCoZa4QUr4f184hyVtOaZeHO4qFFeeQN8E6SY45VTcn4g/BnSW'
  ),
  (
    6,
    '555',
    '$2y$10$BWnYtG.yvRKt6a18xOSnseLZRy5kcbyRsNpE/2sOGdOi.lahvM08a'
  ),
  (
    7,
    '666',
    '$2y$10$OjSHopMBbWcPKpgbrZKoJumOcmRFautn2PzYH7E9N7VUlBqNtXXR.'
  ),
  (
    8,
    '777',
    '$2y$10$v8uODWMFJ4e6SCNXNg8./.jXAFBJa83fdc50KaObZZ3zVQltLS7iq'
  ),
  (
    9,
    '888',
    '$2y$10$qOU.gbtPz9HVCDn7NMDDpuYoHIE.zy/TlreDVVOP6Xma0Xkqh7kEC'
  );
--
  -- Индексы сохранённых таблиц
  --
  --
  -- Индексы таблицы `comments`
  --
ALTER TABLE
  `comments`
ADD
  PRIMARY KEY (`id`);
--
  -- Индексы таблицы `images`
  --
ALTER TABLE
  `images`
ADD
  PRIMARY KEY (`id`);
--
  -- Индексы таблицы `users`
  --
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);
--
  -- AUTO_INCREMENT для сохранённых таблиц
  --
  --
  -- AUTO_INCREMENT для таблицы `comments`
  --
ALTER TABLE
  `comments`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 16;
--
  -- AUTO_INCREMENT для таблицы `images`
  --
ALTER TABLE
  `images`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 34;
--
  -- AUTO_INCREMENT для таблицы `users`
  --
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;