-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 01 2019 г., 11:14
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
  `full_name` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_message`, `dt`, `full_name`, `name`, `text`) VALUES
(1, '2019-10-31 17:50:25', 'Starikov Uriy Egorovoch', 'Hello', '123'),
(2, '2019-10-31 18:01:02', 'Brunev Alexandr Vinalievich', 'Hello from Sanya', 'I am a friend of Uriy'),
(3, '2019-11-01 09:28:23', 'Skutin Alex Vitalievich', 'Hello from Alex', 'My name is Alex. And i am a friend of Uriy Starikov');

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
(12, 1, '70efbee8a4bc3dd0fd18d4f950db6756858aadb79506b68b8cd6e8dbae38d5a8', '2019-11-01 09:59:49', '1');

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
(1, 'uriy', '269e81967f8048b9f85e31c1b4268397e87e7f06d08fc4d932ab9738c80b730d', 'Starikov Uriy Egorovoch', '0', '', '2019-10-31 15:29:00'),
(2, 'Canya', '59e560923de5b569563b0fe8f58af2cae82857a38a527c876010e4968b2a4bb9', 'Brunev Alexandr Vinalievich', '0', '', '2019-10-31 18:00:18'),
(3, 'Alex123', '59e560923de5b569563b0fe8f58af2cae82857a38a527c876010e4968b2a4bb9', 'Skutin Alex Vitalievich', '0', '', '2019-11-01 09:23:57');

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
  MODIFY `id_message` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
