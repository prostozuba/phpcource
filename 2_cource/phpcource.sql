-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 28 2019 г., 13:48
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpcource`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id_message` int(10) UNSIGNED NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(64) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_message`, `dt`, `name`, `text`) VALUES
(5, '2017-12-14 18:44:11', '768768768', '7687687yiu'),
(7, '2017-12-14 19:05:36', '45654', 'tytrsyryrtdyty'),
(8, '2017-12-14 19:11:39', '32543', '43534654'),
(9, '2017-12-18 18:32:58', 'rty546754', '654654654'),
(10, '2017-12-18 18:39:09', 'неке', 'нкенке'),
(11, '2017-12-18 18:39:15', '554325423', '455234'),
(12, '2017-12-18 18:46:03', '6765765', '6765'),
(13, '2017-12-18 18:49:04', 'admin', '3432432'),
(14, '2017-12-21 17:56:27', '65756', '757654756'),
(15, '2017-12-21 17:58:28', '768765', '67587'),
(16, '2017-12-21 18:20:13', '5634', '54363'),
(17, '2017-12-21 18:26:13', '56546546', '54654'),
(18, '2017-12-21 18:36:06', '67876876', '67868678'),
(20, '2017-12-21 18:38:20', '654635', '654635 65463 5654635 65463 5 654635 65463 5 654635 65463 5 654635 65463 5 654635 65463 5 654635 65463 5 654635 65463 5'),
(41, '2018-02-12 18:41:09', 'asfasf', 'sdgjksdgkjsdgjkksdgksd'),
(42, '2019-10-28 12:44:15', 'rreer', 'erererer');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id_session` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `dt_open` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id_session`, `id_user`, `token`, `dt_open`, `status`) VALUES
(3, 11, '42dcbe858d3446b22c03385ab5abca8c0021b64e2e7b42efbf7ffae86287be3e', '2019-10-28 12:44:42', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `info` text NOT NULL,
  `dt_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `name`, `status`, `info`, `dt_reg`) VALUES
(1, 'admin', 'b44b5d4e73e46fb62419404722b336ff644b267c1577dba07ae6411c2205b33f', 'Dmitry', '1', '', '2017-12-11 18:16:49'),
(2, 'maganer', 'b44b5d4e73e46fb62419404722b336ff644b267c1577dba07ae6411c2205b33f', 'Some', '1', 'active user now', '2017-12-11 18:17:48'),
(7, 'uriy', '$argon2i$v=19$m=1024,t=2,p=2$dGhpc2lzc2x0Zm9yYXJnbw$AwObnldFnizr', '', '0', '', '2019-10-28 12:30:02'),
(10, 'Yriy', '269e81967f8048b9f85e31c1b4268397e87e7f06d08fc4d932ab9738c80b730d', '', '0', '', '2019-10-28 12:41:10'),
(11, 'Canya', '096505d97b82efc0df6dcc7a6c70bc0464134cf0b8b8085c2769dc39023c4fce', '', '0', '', '2019-10-28 12:44:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id_session`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
