-- Adminer 5.4.2 MariaDB 12.2.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `cccinfo`;
CREATE DATABASE `cccinfo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `cccinfo`;

DROP TABLE IF EXISTS `accontractor`;
CREATE TABLE `accontractor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `pic_name` varchar(128) NOT NULL,
  `pic_phone` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `bc_dealer`;
CREATE TABLE `bc_dealer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_branch` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `dealer_name` varchar(128) NOT NULL,
  `dealer_phone` varchar(256) NOT NULL,
  `dealer_address` varchar(256) NOT NULL,
  `category` varchar(128) NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `branch_code`;
CREATE TABLE `branch_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(32) NOT NULL,
  `code` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `dealer`;
CREATE TABLE `dealer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_branch` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `dealer_name` varchar(128) NOT NULL,
  `dealer_phone` varchar(256) NOT NULL,
  `dealer_address` varchar(512) NOT NULL,
  `category` varchar(128) NOT NULL,
  `remark` text DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `email_inquiry`;
CREATE TABLE `email_inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `distributed_date` date DEFAULT NULL,
  `customer_email` varchar(128) NOT NULL,
  `customer_data` varchar(256) NOT NULL,
  `email_subject` varchar(128) NOT NULL,
  `replied_date` date DEFAULT NULL,
  `system_code` varchar(8) DEFAULT NULL,
  `inquiry_group` varchar(128) DEFAULT NULL,
  `product_category` varchar(128) DEFAULT NULL,
  `model` varchar(64) DEFAULT NULL,
  `i_detail` varchar(512) DEFAULT NULL,
  `action_detail` varchar(512) DEFAULT NULL,
  `remark` varchar(512) DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `info_blast`;
CREATE TABLE `info_blast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blast_category` varchar(32) NOT NULL,
  `blast_date` date DEFAULT NULL,
  `blast_time` time DEFAULT NULL,
  `blast_title` varchar(128) NOT NULL,
  `blast_content` varchar(4096) NOT NULL,
  `blast_picture` varchar(256) NOT NULL,
  `blast_status` varchar(32) NOT NULL,
  `remark` varchar(128) DEFAULT NULL,
  `blast_qty` int(11) NOT NULL DEFAULT 0,
  `requested_by` varchar(32) NOT NULL,
  `request_date` date DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `info_bopart`;
CREATE TABLE `info_bopart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `title` varchar(512) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `date` date DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `info_general`;
CREATE TABLE `info_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `title` varchar(512) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `date` date DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `info_memo`;
CREATE TABLE `info_memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memo_category` varchar(128) DEFAULT NULL,
  `memo_date` date DEFAULT NULL,
  `memo_title` varchar(500) DEFAULT NULL,
  `memo_description` varchar(4096) DEFAULT NULL,
  `memo_docs` varchar(512) DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `info_sassar`;
CREATE TABLE `info_sassar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `sass_csmsid` varchar(16) NOT NULL,
  `sass_sapid` varchar(16) NOT NULL,
  `sass_name` varchar(64) NOT NULL,
  `under_branch` varchar(64) NOT NULL,
  `remain_limit` int(11) NOT NULL DEFAULT 0,
  `tat` int(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `remark` varchar(128) NOT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(32) NOT NULL,
  `link` varchar(32) NOT NULL,
  `icon` text NOT NULL,
  `need_session` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `menu_access`;
CREATE TABLE `menu_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `role_access` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `part_price`;
CREATE TABLE `part_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` date DEFAULT NULL,
  `price_code` varchar(4) NOT NULL,
  `price_dealer` int(11) NOT NULL,
  `price_customer` int(11) NOT NULL,
  `price_blackmarket` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `pricelist`;
CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` date DEFAULT NULL,
  `category` varchar(128) NOT NULL,
  `model` varchar(32) NOT NULL,
  `specification` varchar(512) NOT NULL,
  `debut` date DEFAULT NULL,
  `price` int(11) NOT NULL,
  `is_nla` int(11) NOT NULL,
  `remark` varchar(64) NOT NULL,
  `upload_by` varchar(32) DEFAULT NULL,
  `upload_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `promo_list`;
CREATE TABLE `promo_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` varchar(32768) NOT NULL,
  `link` varchar(4096) NOT NULL,
  `link_note` varchar(128) NOT NULL,
  `date` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `remark` varchar(256) DEFAULT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `sap_user`;
CREATE TABLE `sap_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(64) NOT NULL,
  `access` varchar(16) NOT NULL,
  `remark` varchar(128) NOT NULL,
  `share` varchar(64) NOT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `schedule_acinstall`;
CREATE TABLE `schedule_acinstall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_date` date DEFAULT NULL,
  `contractor_id` int(11) NOT NULL,
  `spk_letter` varchar(64) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_phone` varchar(128) NOT NULL,
  `customer_address` varchar(256) NOT NULL,
  `model` varchar(32) NOT NULL,
  `purchasement` varchar(128) NOT NULL,
  `remark` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `schedule_repair`;
CREATE TABLE `schedule_repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(32) NOT NULL,
  `notif` varchar(11) NOT NULL,
  `notif_status` varchar(2) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_address` varchar(256) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `model` varchar(32) NOT NULL,
  `description` varchar(64) NOT NULL,
  `technician` varchar(64) NOT NULL,
  `visit_schedule` date DEFAULT NULL,
  `remark` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `serial_number`;
CREATE TABLE `serial_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category` varchar(64) NOT NULL,
  `howto_picture` varchar(128) NOT NULL,
  `howto_text` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `serial_number_code`;
CREATE TABLE `serial_number_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  `model` varchar(32) NOT NULL,
  `first_code` varchar(16) NOT NULL,
  `saved_by` varchar(32) NOT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `socmed_inquiry`;
CREATE TABLE `socmed_inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `socmed_type` varchar(64) NOT NULL,
  `date` date DEFAULT NULL,
  `customer_account` varchar(128) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_phone` varchar(128) NOT NULL,
  `system_code` varchar(8) DEFAULT NULL,
  `inquiry_group` varchar(128) DEFAULT NULL,
  `product_category` varchar(128) DEFAULT NULL,
  `model` varchar(64) DEFAULT NULL,
  `i_detail` varchar(512) NOT NULL,
  `action_detail` varchar(512) NOT NULL,
  `remark` varchar(512) DEFAULT NULL,
  `saved_by` varchar(32) DEFAULT NULL,
  `saved_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `submenu`;
CREATE TABLE `submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `link` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `submenu_access`;
CREATE TABLE `submenu_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submenu_id` int(11) NOT NULL,
  `role_access` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `svc_cost`;
CREATE TABLE `svc_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` date DEFAULT NULL,
  `category` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `job` varchar(128) NOT NULL,
  `charge_major` int(11) NOT NULL,
  `chage_minor` int(11) NOT NULL,
  `plus_transport_inside_city` int(11) NOT NULL,
  `plus_transport_outside_city` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `svc_cost_freonac_model`;
CREATE TABLE `svc_cost_freonac_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(32) NOT NULL,
  `type_capacity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `svc_cost_freonac_type`;
CREATE TABLE `svc_cost_freonac_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` date DEFAULT NULL,
  `description` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `capacity` varchar(64) NOT NULL,
  `refrigerant` varchar(64) NOT NULL,
  `max_refrigerant_volume` int(11) NOT NULL,
  `cost_per_gram` int(11) NOT NULL,
  `svc_cost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `svc_cost_freonac_type_until_4nov2024`;
CREATE TABLE `svc_cost_freonac_type_until_4nov2024` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` date DEFAULT NULL,
  `description` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `capacity` varchar(64) NOT NULL,
  `refrigerant` varchar(64) NOT NULL,
  `max_refrigerant_volume` int(11) NOT NULL,
  `cost_per_gram` int(11) NOT NULL,
  `svc_cost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `svc_cost_freon_list`;
CREATE TABLE `svc_cost_freon_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` date DEFAULT NULL,
  `refrigerant` varchar(64) NOT NULL,
  `capacity` varchar(64) NOT NULL,
  `measurement` varchar(32) NOT NULL,
  `max_volume` int(11) NOT NULL,
  `cost_per_gram` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `system_code`;
CREATE TABLE `system_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_code` varchar(32) NOT NULL,
  `inquiry` varchar(128) NOT NULL,
  `remart` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `access` int(11) NOT NULL,
  `access_level` varchar(32) NOT NULL,
  `area_scope` varchar(64) DEFAULT NULL,
  `base_ipaddress` varchar(32) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_login` int(11) NOT NULL DEFAULT 0,
  `latest_login_on` varchar(32) DEFAULT NULL,
  `latest_login_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) NOT NULL,
  `icon` varchar(32) NOT NULL,
  `remark` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- 2026-05-27 08:16:23 UTC
