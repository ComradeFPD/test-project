-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 06 2017 г., 14:59
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kr_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `action_history`
--

CREATE TABLE `action_history` (
  `id` int(11) NOT NULL COMMENT 'Идентификатор действия',
  `task_id` int(11) NOT NULL COMMENT 'Название задачи',
  `description` mediumtext COMMENT 'Описание задачи',
  `date` date DEFAULT NULL COMMENT 'Дата'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `action_history`
--

INSERT INTO `action_history` (`id`, `task_id`, `description`, `date`) VALUES
(1, 3, 'Создали задачу', '2017-11-06'),
(2, 5, 'Добавили задачу', '2017-11-06');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1509969271),
('m171106_114857_create_task_category_table', 1509969275),
('m171106_115630_create_task_table', 1509969415),
('m171106_115648_create_action_history_table', 1509969416);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL COMMENT 'Идентификатор задачи',
  `name` mediumtext NOT NULL COMMENT 'Название задачи',
  `category_id` int(11) NOT NULL COMMENT 'Категория задачи'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `name`, `category_id`) VALUES
(1, 'Удалил', 1),
(2, 'Создание задачи', 2),
(3, 'Создание задачи', 2),
(4, 'Создание тестовой задачи', 2),
(5, 'Создание тестовой задачи', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `task_category`
--

CREATE TABLE `task_category` (
  `id` int(11) NOT NULL COMMENT 'Идентификатор категории задач',
  `category_name` varchar(30) NOT NULL COMMENT 'Название категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории задач';

--
-- Дамп данных таблицы `task_category`
--

INSERT INTO `task_category` (`id`, `category_name`) VALUES
(1, 'Обновление'),
(2, 'Важные операции');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `action_history`
--
ALTER TABLE `action_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-action_history-task_id` (`task_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-task-category_id` (`category_id`);

--
-- Индексы таблицы `task_category`
--
ALTER TABLE `task_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `action_history`
--
ALTER TABLE `action_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор действия', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор задачи', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `task_category`
--
ALTER TABLE `task_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор категории задач', AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `action_history`
--
ALTER TABLE `action_history`
  ADD CONSTRAINT `fk-action_history-task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk-task-category_id` FOREIGN KEY (`category_id`) REFERENCES `task_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
