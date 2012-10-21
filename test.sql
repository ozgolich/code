-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 19 2012 г., 22:12
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `beznal`
--

CREATE TABLE IF NOT EXISTS `beznal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) DEFAULT NULL,
  `schet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `beznal`
--

INSERT INTO `beznal` (`id`, `bank`, `schet`) VALUES
(1, 'БПС Банк', 21314),
(2, '9mY7XtrgNN2KCTnRWRKrFiRTkjU1RuC0HWf0TdsmQrvCwc7hrAsbxdiFi0QAF1Oh0RozGjmQKs', 888477130),
(3, '9mY7XtrgNN2KCTnRWRKrFiRTkjU1RuC0HWf0TdsmQrvCwc7hrAsbxdiFi0QAF1Oh0RozGjmQKs', 888477130),
(4, 'BDadSEiR7VMVoDplmvAB5N8G9am4DSaDbCRYSChZgCO9tPfq8WYifcNKui6cVuFF9tVBetDYOcdfXTsnfeJSOtQFdjbfzZzzsdm', 1157465249);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) DEFAULT NULL,
  `pasport` varchar(255) DEFAULT NULL,
  `personal_info` text,
  `contacts` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `fio`, `pasport`, `personal_info`, `contacts`) VALUES
(1, 'Григорович Виктор Михайлович', 'МР214214', 'Покупка дома', 'Велком 134-51-12'),
(2, 'Василевский Михаил Сергеевич', 'МР314212', 'Богатый клиент', 'skype: vasil\r\nVelcom: 351-14-61');

-- --------------------------------------------------------

--
-- Структура таблицы `dogovors`
--

CREATE TABLE IF NOT EXISTS `dogovors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `nomer` int(11) DEFAULT NULL,
  `summa` int(11) DEFAULT NULL,
  `srok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `dogovors`
--

INSERT INTO `dogovors` (`id`, `data`, `nomer`, `summa`, `srok`) VALUES
(1, '2000-01-24 00:00:00', 2004, 13567123, 3),
(6, '2006-09-13 00:00:00', 2007, 13417123, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) DEFAULT NULL,
  `pasport` varchar(255) DEFAULT NULL,
  `dolzhnost` varchar(255) DEFAULT NULL,
  `dannie` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `manager`
--

INSERT INTO `manager` (`id`, `fio`, `pasport`, `dolzhnost`, `dannie`) VALUES
(1, 'Зголич Олег Александрович', 'mp1859860', 'Программист', 'skype: o.zgolich'),
(2, 'Павлюченко Виктория Вячеславовна', 'mp1141526', 'Менеджер по маркетингу', 'velcom: 151-15-16'),
(3, 'Андреев Григорий Михайлович', 'мр1516615', 'HR ', 'skype: andrgrmix');

-- --------------------------------------------------------

--
-- Структура таблицы `nedvizhimost`
--

CREATE TABLE IF NOT EXISTS `nedvizhimost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `ulica` varchar(255) DEFAULT NULL,
  `mashtab` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `nedvizhimost`
--

INSERT INTO `nedvizhimost` (`id`, `number`, `address`, `cost`, `ulica`, `mashtab`) VALUES
(1, 69, 'Горецкого 69-9', 70000, 'Горецкого', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `sdelki`
--

CREATE TABLE IF NOT EXISTS `sdelki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `description` text,
  `stoimost` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `sdelki`
--

INSERT INTO `sdelki` (`id`, `data`, `manager_id`, `description`, `stoimost`) VALUES
(1, '2003-06-12 00:00:00', 1, 'Разработка веб сайта ', 1200),
(2, '2007-10-03 00:00:00', 2, 'Заказ на разработку веб сайта', 1350),
(3, '2003-01-01 00:00:00', 3, 'Принял на работу senior dev.', 1200),
(4, '2012-11-20 20:15:26', 3, '3snXhsvHFp2Z5juuNC3sFifA7Od8T9wKnKhGqB6Gmb1X4qEcPQ9Dvn12tvowycTT7UyjWC3yqOnOpqcMeWAHJl0je5XOB', 1172157565);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sdelki`
--
ALTER TABLE `sdelki`
  ADD CONSTRAINT `fk_manager` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
