-- Adminer 5.4.2 MariaDB 12.2.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `part_code`;
CREATE DATABASE `part_code` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `part_code`;

DROP TABLE IF EXISTS `log_list`;
CREATE TABLE `log_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) NOT NULL,
  `prev_part_desc` varchar(128) NOT NULL,
  `new_part_desc` varchar(128) NOT NULL,
  `prev_is_nla` int(11) NOT NULL,
  `new_is_nla` int(11) NOT NULL,
  `prev_is_bht` int(11) NOT NULL,
  `new_is_bht` int(11) NOT NULL,
  `prev_model` varchar(960) NOT NULL,
  `new_model` varchar(960) NOT NULL,
  `prev_category` varchar(64) NOT NULL,
  `new_category` varchar(64) NOT NULL,
  `prev_remark` varchar(512) DEFAULT NULL,
  `new_remark` varchar(512) NOT NULL,
  `is_count` int(11) NOT NULL DEFAULT 1,
  `updated_by` varchar(32) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `checked_by` varchar(32) DEFAULT NULL,
  `checked_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `part_list`;
CREATE TABLE `part_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_code` varchar(64) NOT NULL,
  `is_bht` int(11) NOT NULL DEFAULT 0,
  `is_nla` int(11) NOT NULL DEFAULT 0,
  `part_desc` varchar(128) NOT NULL,
  `remark` varchar(512) DEFAULT NULL,
  `model` varchar(960) NOT NULL,
  `category` varchar(64) NOT NULL,
  `input_by` varchar(32) NOT NULL,
  `input_at` datetime DEFAULT NULL,
  `hit` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- 2026-05-27 08:16:52 UTC
