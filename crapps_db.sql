-- Adminer 5.4.2 MariaDB 12.2.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `crapps_db`;
CREATE DATABASE `crapps_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `crapps_db`;

DROP TABLE IF EXISTS `bc_svc_area`;
CREATE TABLE `bc_svc_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(256) DEFAULT NULL,
  `subdistrict` varchar(128) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `city` varchar(64) NOT NULL,
  `province` varchar(64) NOT NULL,
  `postal_code` varchar(5) DEFAULT '-',
  `under_svc` varchar(64) NOT NULL,
  `notif_type` varchar(32) NOT NULL,
  `sap_code` varchar(32) NOT NULL,
  `remark` varchar(1024) NOT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address` (`address`,`subdistrict`,`district`,`city`,`province`,`postal_code`,`under_svc`,`sap_code`,`remark`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `branch_sales`;
CREATE TABLE `branch_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(32) NOT NULL,
  `branch` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `branch_service`;
CREATE TABLE `branch_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `svc_type` varchar(32) NOT NULL,
  `svc_name` varchar(64) NOT NULL,
  `svc_name_group` varchar(128) NOT NULL,
  `svc_group` varchar(128) DEFAULT NULL,
  `sap_code` varchar(8) NOT NULL,
  `phone1` varchar(32) NOT NULL,
  `phone2` varchar(32) NOT NULL,
  `phone3` varchar(32) NOT NULL,
  `phone4` varchar(32) NOT NULL,
  `phone_ext` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `under_branch` varchar(64) NOT NULL,
  `region` varchar(64) NOT NULL,
  `svchead` int(11) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `timezone` varchar(8) NOT NULL,
  `status` varchar(64) DEFAULT NULL,
  `hit` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(256) NOT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `complaint_list`;
CREATE TABLE `complaint_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `claim_date` date DEFAULT NULL,
  `claim_source` varchar(64) NOT NULL,
  `claim_category` varchar(64) NOT NULL,
  `agent` varchar(32) NOT NULL,
  `claim_description` varchar(64) NOT NULL,
  `product_category` varchar(64) NOT NULL,
  `model` varchar(64) NOT NULL,
  `serial_number` varchar(32) NOT NULL,
  `ticket_number` varchar(64) DEFAULT NULL,
  `notification` varchar(64) NOT NULL,
  `notif_date` date DEFAULT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_phone` varchar(128) NOT NULL,
  `customer_address` varchar(128) NOT NULL,
  `claim_detail` varchar(2048) NOT NULL,
  `agent_action` varchar(1024) DEFAULT NULL,
  `claim_status` varchar(32) NOT NULL,
  `closed_on` date DEFAULT NULL,
  `propose_close` int(11) NOT NULL DEFAULT 0,
  `propose_close_by` varchar(32) DEFAULT NULL,
  `propose_close_at` datetime DEFAULT NULL,
  `response_request` varchar(512) DEFAULT NULL,
  `responsed_by` varchar(32) DEFAULT NULL,
  `responsed_at` datetime DEFAULT NULL,
  `pic_report_1` varchar(64) DEFAULT NULL,
  `pic_report_2` varchar(64) DEFAULT NULL,
  `sass_name` varchar(128) DEFAULT NULL,
  `sass_group` varchar(128) NOT NULL,
  `under_branch` varchar(32) NOT NULL,
  `regional_area` varchar(32) DEFAULT NULL,
  `isresponsed_branch` int(11) NOT NULL DEFAULT 0,
  `isresponsed_sass` int(11) NOT NULL DEFAULT 0,
  `isresponsed_sasshq` int(11) NOT NULL DEFAULT 0,
  `isresponsed_part` int(11) NOT NULL DEFAULT 0,
  `forwarded_date` date DEFAULT NULL,
  `is_urgent` int(11) NOT NULL,
  `is_sent` int(11) NOT NULL DEFAULT 0,
  `part_reservation` varchar(32) DEFAULT NULL,
  `part1_type` varchar(128) DEFAULT NULL,
  `part1_code` varchar(128) DEFAULT NULL,
  `part1_isready` int(11) DEFAULT NULL,
  `part2_type` varchar(128) DEFAULT NULL,
  `part2_code` varchar(128) DEFAULT NULL,
  `part2_isready` int(11) DEFAULT NULL,
  `part3_type` varchar(128) DEFAULT NULL,
  `part3_code` varchar(128) DEFAULT NULL,
  `part3_isready` int(11) DEFAULT NULL,
  `part4_type` varchar(128) DEFAULT NULL,
  `part4_code` varchar(128) DEFAULT NULL,
  `part4_isready` int(11) DEFAULT NULL,
  `part5_type` varchar(128) DEFAULT NULL,
  `part5_code` varchar(128) DEFAULT NULL,
  `part5_isready` int(11) DEFAULT NULL,
  `part6_type` varchar(128) DEFAULT NULL,
  `part6_code` varchar(128) DEFAULT NULL,
  `part6_isready` int(11) DEFAULT NULL,
  `part7_type` int(11) DEFAULT NULL,
  `part7_code` varchar(128) DEFAULT NULL,
  `part7_isready` varchar(128) DEFAULT NULL,
  `part8_type` varchar(128) DEFAULT NULL,
  `part8_code` varchar(128) DEFAULT NULL,
  `part8_isready` varchar(128) DEFAULT NULL,
  `part9_type` varchar(128) DEFAULT NULL,
  `part9_code` varchar(128) DEFAULT NULL,
  `part9_isready` varchar(128) DEFAULT NULL,
  `part10_type` varchar(128) DEFAULT NULL,
  `part10_code` varchar(128) DEFAULT NULL,
  `part10_isready` varchar(128) DEFAULT NULL,
  `remark` varchar(128) NOT NULL,
  `remark_internal` varchar(1024) DEFAULT NULL,
  `rootcause` varchar(1024) DEFAULT NULL,
  `countermeasure` varchar(1024) DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `claim_description` (`claim_description`),
  KEY `notification` (`notification`),
  KEY `claim_status` (`claim_status`),
  KEY `model` (`model`,`customer_name`,`claim_detail`),
  KEY `claim_date` (`claim_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `complaint_setting`;
CREATE TABLE `complaint_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `complaint_status`;
CREATE TABLE `complaint_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL,
  `group_status` varchar(128) NOT NULL,
  `remark` varchar(128) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `daily_activity`;
CREATE TABLE `daily_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `icall` int(11) NOT NULL DEFAULT 0,
  `whatsapp` int(11) NOT NULL DEFAULT 0,
  `sms` int(11) NOT NULL DEFAULT 0,
  `email` int(11) NOT NULL DEFAULT 0,
  `callback` int(11) NOT NULL DEFAULT 0,
  `confirmation_call` int(11) NOT NULL DEFAULT 0,
  `followup` int(11) NOT NULL DEFAULT 0,
  `socmed_inquiry` int(11) NOT NULL DEFAULT 0,
  `work_hour` int(11) DEFAULT NULL,
  `remark` varchar(500) DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `detail_progress`;
CREATE TABLE `detail_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_id` int(11) NOT NULL,
  `progress_update` varchar(1024) NOT NULL,
  `evidence_file` varchar(500) NOT NULL DEFAULT '-',
  `read_by` varchar(2048) DEFAULT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `current_status` int(11) DEFAULT 21,
  PRIMARY KEY (`id`),
  KEY `complaint_id` (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `svc_area`;
CREATE TABLE `svc_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(256) DEFAULT NULL,
  `subdistrict` varchar(128) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `city` varchar(64) NOT NULL,
  `province` varchar(64) NOT NULL,
  `postal_code` varchar(5) DEFAULT '-',
  `under_svc` varchar(64) DEFAULT NULL,
  `notif_type` varchar(32) DEFAULT NULL,
  `sap_code` varchar(32) DEFAULT NULL,
  `remark` varchar(1024) DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subdistrict` (`subdistrict`),
  KEY `district` (`district`),
  KEY `city` (`city`),
  KEY `postal_code` (`postal_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `technician`;
CREATE TABLE `technician` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `svc_group` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone1_remark` varchar(128) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `phone2_remark` varchar(128) DEFAULT NULL,
  `phone3` varchar(20) DEFAULT NULL,
  `phone3_remark` varchar(128) DEFAULT NULL,
  `phone4` varchar(20) DEFAULT NULL,
  `phone4_remark` varchar(128) DEFAULT NULL,
  `remark` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `status` varchar(128) DEFAULT NULL,
  `saved_by` varchar(32) DEFAULT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- 2026-05-27 08:16:09 UTC
