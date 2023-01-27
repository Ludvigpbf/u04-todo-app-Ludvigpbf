-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `darkmode`;
CREATE TABLE `darkmode` (
  `id` int DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `darkmode` (`id`, `class`) VALUES
(1,	'dark-mode');

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `task` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'notDone',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tasks` (`id`, `title`, `task`, `done`, `class`) VALUES
(224,	'This is a title',	'This is the task. Now its updated',	1,	'done'),
(225,	'Titles can be long',	'But tasks can be longer. Like this for example. I can write a very long task text. Maby this is enough? ',	0,	'notDone'),
(227,	'This is a title',	'This is the task. Now its updated and have been cloned and updated again',	1,	'done'),
(229,	'Ett test',	'Kan man skriva med å,ä eller ö?',	0,	'notDone');

-- 2023-01-27 10:38:43