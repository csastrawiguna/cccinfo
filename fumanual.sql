-- Adminer 5.4.2 MariaDB 12.2.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `fumanual`;
CREATE DATABASE `fumanual` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `fumanual`;

DROP TABLE IF EXISTS `websurvey_result`;
CREATE TABLE `websurvey_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fu_type` varchar(32) NOT NULL,
  `notification` varchar(32) NOT NULL,
  `q1_point` varchar(128) NOT NULL,
  `q1_remark` varchar(500) DEFAULT NULL,
  `q2_point` varchar(128) NOT NULL,
  `q2_remark` varchar(500) DEFAULT NULL,
  `q3_point` varchar(128) NOT NULL,
  `q3_remark` varchar(500) DEFAULT NULL,
  `q4_point` varchar(128) NOT NULL,
  `survey_submission` datetime DEFAULT NULL,
  `data_upload_by` varchar(32) NOT NULL,
  `data_upload_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `websurvey_setting`;
CREATE TABLE `websurvey_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(256) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 1,
  `remark` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- 2026-05-27 08:16:48 UTC
