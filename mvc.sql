-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 20 2022 г., 17:08
-- Версия сервера: 8.0.28-0ubuntu0.20.04.3
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `user` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `edited` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `content`, `user`, `email`, `status`, `edited`) VALUES
(1, 'alert();', 'usernsdgdfg', 'userem@dfgdg.dfgd11', 1, 0),
(2, '2test2test', 'eserna2', 'userem2', 1, 0),
(3, 'testtest', 'usern', 'userem@sdf.sdf', 0, 1),
(4, 'testtestsdvdfbv', 'usern', 'userem', 1, 0),
(5, 'text', 'add', 'em', 0, 0),
(6, 'erhgdrthdryjrt', 'sdfsdfds', 'dfghfdgh@fdsgs.dfg', 1, 0),
(7, 'svfvdfv', 'dfgfdgd', 'fghgf', 1, 0),
(8, 'dfgdfg', 'sdfsf', 'dfgdfg', 1, 0),
(9, 'tesr', 'testadd', 'restadd0101@qw.qwee', 1, 1),
(10, 'status', 'status', 'status@st.st', 1, 1),
(11, 'sdfdsf', 'csdf', 'sdf@fd.32', 0, 0),
(12, 'sdfsdf', 'sdfsdf', 'sdfsdf@re.er', 0, 0),
(13, 'sdfsgfd', 'dfgdg', 'dfg@df.fd', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
