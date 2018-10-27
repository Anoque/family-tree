-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `members` (`id`, `name`, `parent_id`) VALUES
(1,	'Самый главный',	0),
(2,	'Сын главного',	1),
(3,	'Дочь главного',	1),
(4,	'Первый внучок главного',	2),
(5,	'Внучка',	2),
(6,	'Ещё внук',	3);

-- 2018-10-27 14:22:15