-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Фев 18 2021 г., 02:44
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
  -- Структура таблицы `users`
  --
  CREATE TABLE `users` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `login` varchar(60) NOT NULL,
    `password` varchar(60) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  --