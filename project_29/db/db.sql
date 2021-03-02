-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 02 2021 г., 17:38
-- Версия сервера: 5.7.30
-- Версия PHP: 7.4.9
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
--
  -- База данных: `module29`
  --
  -- --------------------------------------------------------
  --
  -- Структура таблицы `users`
  --
  CREATE TABLE `users` (
    `id` int(255) NOT NULL,
    `login` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `vk_user` tinyint(1) NOT NULL DEFAULT '0',
    `role` varchar(255) NOT NULL DEFAULT 'quest'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Дамп данных таблицы `users`
  --
INSERT INTO
  `users` (
    `id`,
    `login`,
    `password`,
    `name`,
    `vk_user`,
    `role`
  )
VALUES
  (
    2,
    '111',
    '$2y$10$wEwI4z6f8FUaRf5eCOc7ZuQ8lSdmNyfRasfMEziReYe11BLurRN1q',
    'Nat',
    0,
    'quest'
  );
--
  -- Индексы сохранённых таблиц
  --
  --
  -- Индексы таблицы `users`
  --
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `login` (`login`);
--
  -- AUTO_INCREMENT для сохранённых таблиц
  --
  --
  -- AUTO_INCREMENT для таблицы `users`
  --
ALTER TABLE
  `users`
MODIFY
  `id` int(255) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;