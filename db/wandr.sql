-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2026 at 06:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wandr`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse_reports`
--

CREATE TABLE `abuse_reports` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `for_users__id` int(10) UNSIGNED NOT NULL,
  `by_users__id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `moderator_remarks` varchar(255) DEFAULT NULL,
  `moderated_by_users__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `__data` text DEFAULT NULL,
  `entity_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Short description',
  `action_type` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Create, Update, Delete',
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `user_role_id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`_id`, `created_at`, `user_id`, `__data`, `entity_type`, `project_id`, `action_type`, `entity_id`, `user_role_id`) VALUES
(1, '2026-05-26 17:46:00', 1, '1 fake users created.', NULL, NULL, NULL, NULL, NULL),
(2, '2026-05-26 17:46:01', 1, '1 fake users authority created.', NULL, NULL, NULL, NULL, NULL),
(3, '2026-05-26 17:46:01', 1, '1 fake users profiles created.', NULL, NULL, NULL, NULL, NULL),
(4, '2026-05-26 17:48:14', 1, '1 fake users created.', NULL, NULL, NULL, NULL, NULL),
(5, '2026-05-26 17:48:14', 1, '1 fake users authority created.', NULL, NULL, NULL, NULL, NULL),
(6, '2026-05-26 17:48:14', 1, '1 fake users profiles created.', NULL, NULL, NULL, NULL, NULL),
(7, '2026-05-26 17:48:54', 1, '10 fake users created.', NULL, NULL, NULL, NULL, NULL),
(8, '2026-05-26 17:48:54', 1, '10 fake users authority created.', NULL, NULL, NULL, NULL, NULL),
(9, '2026-05-26 17:48:54', 1, '10 fake users profiles created.', NULL, NULL, NULL, NULL, NULL),
(10, '2026-05-26 17:55:38', 1, 'test gift gift created. ', NULL, NULL, NULL, NULL, NULL),
(11, '2026-05-29 16:11:29', 15, 'dev dev update own user profile.', NULL, NULL, NULL, NULL, NULL),
(12, '2026-05-29 18:03:27', 1, 'dev dev profile visited.', NULL, NULL, NULL, NULL, NULL),
(13, '2026-05-29 18:06:33', 15, 'dev dev update own user profile.', NULL, NULL, NULL, NULL, NULL),
(14, '2026-05-29 18:09:50', 15, 'dev dev update own user profile.', NULL, NULL, NULL, NULL, NULL),
(15, '2026-05-29 18:10:05', 15, 'dev dev update own user profile.', NULL, NULL, NULL, NULL, NULL),
(16, '2026-05-29 18:11:04', 15, 'dev dev update cover picture.', NULL, NULL, NULL, NULL, NULL),
(17, '2026-05-29 18:11:06', 15, 'dev dev update profile picture.', NULL, NULL, NULL, NULL, NULL),
(18, '2026-05-29 18:31:22', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(19, '2026-05-29 18:33:02', 15, 'dev dev update own location.', NULL, NULL, NULL, NULL, NULL),
(20, '2026-05-29 18:46:39', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(21, '2026-05-29 18:46:49', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(22, '2026-05-29 18:47:23', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(23, '2026-05-29 18:48:01', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(24, '2026-05-29 18:48:02', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(25, '2026-05-29 19:06:02', 15, 'Abhishek Chatterjee profile visited.', NULL, NULL, NULL, NULL, NULL),
(26, '2026-05-29 19:09:44', 15, 'Abhishek Chatterjee profile liked.', NULL, NULL, NULL, NULL, NULL),
(27, '2026-05-29 22:46:38', 22, 'dev6 dev6 update cover picture.', NULL, NULL, NULL, NULL, NULL),
(28, '2026-05-29 22:46:41', 22, 'dev6 dev6 update profile picture.', NULL, NULL, NULL, NULL, NULL),
(29, '2026-05-29 22:46:45', 22, 'dev6 dev6 update own user profile.', NULL, NULL, NULL, NULL, NULL),
(30, '2026-05-29 22:47:05', 22, 'dev6 dev6 update own location.', NULL, NULL, NULL, NULL, NULL),
(31, '2026-05-29 22:55:26', 22, 'Booster activated by user dev6 dev6', NULL, NULL, NULL, NULL, NULL),
(32, '2026-05-29 22:55:44', 22, 'Booster activated by user dev6 dev6', NULL, NULL, NULL, NULL, NULL),
(33, '2026-05-29 23:35:03', 22, 'dev6 dev6 upload new photos.', NULL, NULL, NULL, NULL, NULL),
(34, '2026-05-29 23:35:04', 22, 'dev6 dev6 upload new photos.', NULL, NULL, NULL, NULL, NULL),
(35, '2026-05-29 23:35:05', 22, 'dev6 dev6 upload new photos.', NULL, NULL, NULL, NULL, NULL),
(36, '2026-05-29 23:48:08', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(37, '2026-05-29 23:48:48', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(38, '2026-05-29 23:49:12', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(39, '2026-05-29 23:49:44', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(40, '2026-05-29 23:54:08', 22, 'dev6 dev6 update own user settings.', NULL, NULL, NULL, NULL, NULL),
(41, '2026-05-29 23:54:15', 22, 'dev6 dev6 update own user settings.', NULL, NULL, NULL, NULL, NULL),
(42, '2026-05-29 23:54:21', 22, 'dev6 dev6 update own user settings.', NULL, NULL, NULL, NULL, NULL),
(43, '2026-05-29 23:54:30', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(44, '2026-05-29 23:54:44', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(45, '2026-05-29 23:54:52', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(46, '2026-05-29 23:55:06', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(47, '2026-05-29 23:57:39', 22, 'dev6 dev6 update own user settings.', NULL, NULL, NULL, NULL, NULL),
(48, '2026-05-29 23:58:03', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(49, '2026-05-29 23:58:17', 22, 'dev6 dev6 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(50, '2026-06-01 16:48:18', 20, 'dev4 dev4 update cover picture.', NULL, NULL, NULL, NULL, NULL),
(51, '2026-06-01 16:48:24', 20, 'dev4 dev4 update profile picture.', NULL, NULL, NULL, NULL, NULL),
(52, '2026-06-01 16:49:07', 20, 'dev4 dev4 update own location.', NULL, NULL, NULL, NULL, NULL),
(53, '2026-06-01 16:49:36', 20, 'dev4 dev4 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(54, '2026-06-15 15:38:49', 22, 'dev4 dev4 profile visited.', NULL, NULL, NULL, NULL, NULL),
(55, '2026-06-15 15:40:46', 20, 'dev4 dev4 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(56, '2026-06-15 15:42:09', 20, 'dev4 dev4 updated Wandr profile details.', NULL, NULL, NULL, NULL, NULL),
(57, '2026-06-15 15:42:57', 22, 'dev4 dev4 profile liked.', NULL, NULL, NULL, NULL, NULL),
(58, '2026-06-15 15:44:21', 20, 'dev6 dev6 profile visited.', NULL, NULL, NULL, NULL, NULL),
(59, '2026-06-24 15:19:13', 1, 'devtest test user verified.', NULL, NULL, NULL, NULL, NULL),
(60, '2026-06-24 15:19:33', 1, 'devtest test user info updated.', NULL, NULL, NULL, NULL, NULL),
(61, '2026-06-24 15:31:54', 1, 'dev5 dev5 user verified.', NULL, NULL, NULL, NULL, NULL),
(62, '2026-06-24 15:38:03', 23, 'devtest test update cover picture.', NULL, NULL, NULL, NULL, NULL),
(63, '2026-06-24 15:38:38', 23, 'devtest test update cover picture.', NULL, NULL, NULL, NULL, NULL),
(64, '2026-06-24 15:38:43', 23, 'devtest test update profile picture.', NULL, NULL, NULL, NULL, NULL),
(65, '2026-06-24 15:39:09', 23, 'devtest test update own location.', NULL, NULL, NULL, NULL, NULL),
(66, '2026-06-24 16:15:19', 1, 'dev5 dev5 user verified.', NULL, NULL, NULL, NULL, NULL),
(67, '2026-06-24 16:20:43', 1, 'dev6 dev6 user verified.', NULL, NULL, NULL, NULL, NULL),
(68, '2026-06-24 16:33:28', 1, 'dev4 dev4 user verified.', NULL, NULL, NULL, NULL, NULL),
(69, '2026-06-24 16:33:32', 1, 'dev dev user verified.', NULL, NULL, NULL, NULL, NULL),
(70, '2026-06-24 16:33:36', 1, 'dev dev user verified.', NULL, NULL, NULL, NULL, NULL),
(71, '2026-06-24 18:01:28', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(72, '2026-06-24 18:11:28', 20, 'devtest test profile visited.', NULL, NULL, NULL, NULL, NULL),
(73, '2026-06-24 18:17:34', 23, 'dev4 dev4 profile visited.', NULL, NULL, NULL, NULL, NULL),
(74, '2026-06-24 18:30:38', 20, 'dev5 dev5 profile visited.', NULL, NULL, NULL, NULL, NULL),
(75, '2026-06-24 22:24:04', 1, 'markblack black user verified.', NULL, NULL, NULL, NULL, NULL),
(76, '2026-06-24 22:24:08', 1, 'johnwhite white user verified.', NULL, NULL, NULL, NULL, NULL),
(77, '2026-06-24 22:24:40', 25, 'markblack black update cover picture.', NULL, NULL, NULL, NULL, NULL),
(78, '2026-06-24 22:24:45', 25, 'markblack black update profile picture.', NULL, NULL, NULL, NULL, NULL),
(79, '2026-06-24 22:25:16', 25, 'markblack black update own location.', NULL, NULL, NULL, NULL, NULL),
(80, '2026-06-24 22:26:01', 24, 'johnwhite white update cover picture.', NULL, NULL, NULL, NULL, NULL),
(81, '2026-06-24 22:26:05', 24, 'johnwhite white update profile picture.', NULL, NULL, NULL, NULL, NULL),
(82, '2026-06-24 22:26:26', 24, 'johnwhite white update own location.', NULL, NULL, NULL, NULL, NULL),
(83, '2026-06-24 22:31:46', 25, 'johnwhite white profile visited.', NULL, NULL, NULL, NULL, NULL),
(84, '2026-06-24 23:01:40', 24, 'markblack black profile visited.', NULL, NULL, NULL, NULL, NULL),
(85, '2026-06-24 23:02:01', 24, 'johnwhite white blocked by. markblack black', NULL, NULL, NULL, NULL, NULL),
(86, '2026-06-24 23:04:22', 24, 'dev dev profile visited.', NULL, NULL, NULL, NULL, NULL),
(87, '2026-06-24 23:05:32', 24, 'dev dev profile visited.', NULL, NULL, NULL, NULL, NULL),
(88, '2026-06-24 23:06:49', 24, 'johnwhite white Unblock by. markblack black', NULL, NULL, NULL, NULL, NULL),
(89, '2026-06-24 23:33:36', 24, 'User settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(90, '2026-06-26 15:34:23', 22, 'dev4 dev4 profile liked.', NULL, NULL, NULL, NULL, NULL),
(91, '2026-06-26 15:34:30', 22, 'dev4 dev4 profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(92, '2026-06-26 15:34:33', 22, 'dev4 dev4 profile liked.', NULL, NULL, NULL, NULL, NULL),
(93, '2026-06-29 16:32:18', 20, 'johnwhite white profile visited.', NULL, NULL, NULL, NULL, NULL),
(94, '2026-07-16 16:48:17', 23, 'dev5 dev5 profile visited.', NULL, NULL, NULL, NULL, NULL),
(95, '2026-07-16 16:53:36', 1, 'free package created. ', NULL, NULL, NULL, NULL, NULL),
(96, '2026-07-16 16:53:47', 1, 'free package updated. ', NULL, NULL, NULL, NULL, NULL),
(97, '2026-07-16 16:56:54', 1, 'Wandr Plus package created. ', NULL, NULL, NULL, NULL, NULL),
(98, '2026-07-16 16:57:23', 1, 'Wandr Premium package created. ', NULL, NULL, NULL, NULL, NULL),
(99, '2026-07-16 17:34:35', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(100, '2026-07-16 18:14:57', 1, 'Wandr Plus package updated. ', NULL, NULL, NULL, NULL, NULL),
(101, '2026-07-22 15:39:01', 1, 'johnwhite white profile visited.', NULL, NULL, NULL, NULL, NULL),
(102, '2026-07-22 15:40:04', 1, 'johnwhite white profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(103, '2026-07-22 15:40:06', 1, 'markblack black profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(104, '2026-07-22 15:40:08', 1, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(105, '2026-07-22 15:40:14', 1, 'dev dev profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(106, '2026-07-22 15:40:16', 1, 'dev4 dev4 profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(107, '2026-07-22 15:40:20', 1, 'dev6 dev6 profile liked.', NULL, NULL, NULL, NULL, NULL),
(108, '2026-07-22 15:40:27', 1, 'devtest test profile liked.', NULL, NULL, NULL, NULL, NULL),
(109, '2026-07-22 15:40:31', 1, 'dev5 dev5 profile liked.', NULL, NULL, NULL, NULL, NULL),
(110, '2026-07-22 15:40:34', 1, 'Abhishek Chatterjee profile liked.', NULL, NULL, NULL, NULL, NULL),
(111, '2026-07-22 15:40:37', 1, 'Sabrine Van der Ham profile liked.', NULL, NULL, NULL, NULL, NULL),
(112, '2026-07-22 15:40:40', 1, 'Väinö Lahti profile liked.', NULL, NULL, NULL, NULL, NULL),
(113, '2026-07-22 15:40:43', 1, 'Alicia Lam profile liked.', NULL, NULL, NULL, NULL, NULL),
(114, '2026-07-22 15:40:47', 1, 'Iina Takala profile liked.', NULL, NULL, NULL, NULL, NULL),
(115, '2026-07-22 15:40:51', 1, 'Samarth Prajapati profile liked.', NULL, NULL, NULL, NULL, NULL),
(116, '2026-07-22 15:40:55', 1, 'Jisk Renes profile liked.', NULL, NULL, NULL, NULL, NULL),
(117, '2026-07-22 15:40:58', 1, 'admin admin profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(118, '2026-07-22 15:42:39', 1, 'markblack black profile visited.', NULL, NULL, NULL, NULL, NULL),
(119, '2026-07-22 15:42:52', 1, 'dev dev profile visited.', NULL, NULL, NULL, NULL, NULL),
(120, '2026-07-22 15:43:08', 1, 'dev4 dev4 profile visited.', NULL, NULL, NULL, NULL, NULL),
(121, '2026-07-22 15:43:19', 1, 'admin admin profile visited.', NULL, NULL, NULL, NULL, NULL),
(122, '2026-07-22 15:43:45', 1, 'johnwhite white profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(123, '2026-07-22 15:43:47', 1, 'markblack black profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(124, '2026-07-22 15:43:49', 1, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(125, '2026-07-22 15:43:53', 1, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(126, '2026-07-22 15:43:56', 1, 'dev4 dev4 profile liked.', NULL, NULL, NULL, NULL, NULL),
(127, '2026-07-22 15:48:18', 20, 'johnwhite white profile liked.', NULL, NULL, NULL, NULL, NULL),
(128, '2026-07-22 15:48:20', 20, 'markblack black profile liked.', NULL, NULL, NULL, NULL, NULL),
(129, '2026-07-22 15:48:30', 20, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(130, '2026-07-22 15:48:33', 20, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(131, '2026-07-22 15:48:35', 20, 'dev6 dev6 profile liked.', NULL, NULL, NULL, NULL, NULL),
(132, '2026-07-22 15:48:40', 20, 'devtest test profile liked.', NULL, NULL, NULL, NULL, NULL),
(133, '2026-07-22 15:48:43', 20, 'dev5 dev5 profile liked.', NULL, NULL, NULL, NULL, NULL),
(134, '2026-07-22 15:48:46', 20, 'Abhishek Chatterjee profile liked.', NULL, NULL, NULL, NULL, NULL),
(135, '2026-07-22 15:48:48', 20, 'Sabrine Van der Ham profile liked.', NULL, NULL, NULL, NULL, NULL),
(136, '2026-07-22 15:48:51', 20, 'Väinö Lahti profile liked.', NULL, NULL, NULL, NULL, NULL),
(137, '2026-07-22 15:48:53', 20, 'Alicia Lam profile liked.', NULL, NULL, NULL, NULL, NULL),
(138, '2026-07-22 15:48:55', 20, 'Iina Takala profile liked.', NULL, NULL, NULL, NULL, NULL),
(139, '2026-07-22 15:48:58', 20, 'Samarth Prajapati profile liked.', NULL, NULL, NULL, NULL, NULL),
(140, '2026-07-22 15:49:00', 20, 'Jisk Renes profile liked.', NULL, NULL, NULL, NULL, NULL),
(141, '2026-07-22 15:49:03', 20, 'admin admin profile liked.', NULL, NULL, NULL, NULL, NULL),
(142, '2026-07-22 15:52:16', 20, 'markblack black profile visited.', NULL, NULL, NULL, NULL, NULL),
(143, '2026-07-22 15:52:26', 20, 'dev dev profile visited.', NULL, NULL, NULL, NULL, NULL),
(144, '2026-07-22 15:52:39', 20, 'dev dev profile visited.', NULL, NULL, NULL, NULL, NULL),
(145, '2026-07-22 15:55:44', 20, 'johnwhite white profile liked.', NULL, NULL, NULL, NULL, NULL),
(146, '2026-07-22 15:55:47', 20, 'markblack black profile liked.', NULL, NULL, NULL, NULL, NULL),
(147, '2026-07-22 15:55:50', 20, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(148, '2026-07-22 16:00:41', 20, 'User settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(149, '2026-07-22 16:00:52', 20, 'User settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(150, '2026-07-22 16:16:20', 20, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(151, '2026-07-22 16:16:50', 20, 'dev6 dev6 profile liked.', NULL, NULL, NULL, NULL, NULL),
(152, '2026-07-22 16:20:44', 20, 'devtest test profile liked.', NULL, NULL, NULL, NULL, NULL),
(153, '2026-07-22 16:24:53', 20, 'dev5 dev5 profile liked.', NULL, NULL, NULL, NULL, NULL),
(154, '2026-07-22 16:27:35', 20, 'Abhishek Chatterjee profile visited.', NULL, NULL, NULL, NULL, NULL),
(155, '2026-07-22 16:27:59', 20, 'Abhishek Chatterjee profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(156, '2026-07-22 16:32:50', 20, 'Sabrine Van der Ham profile visited.', NULL, NULL, NULL, NULL, NULL),
(157, '2026-07-22 16:33:31', 20, 'Väinö Lahti profile visited.', NULL, NULL, NULL, NULL, NULL),
(158, '2026-07-22 16:35:40', 20, 'Alicia Lam profile visited.', NULL, NULL, NULL, NULL, NULL),
(159, '2026-07-22 16:35:53', 20, 'Sabrine Van der Ham profile liked.', NULL, NULL, NULL, NULL, NULL),
(160, '2026-07-22 16:35:59', 20, 'Väinö Lahti profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(161, '2026-07-22 16:36:03', 20, 'Alicia Lam profile liked.', NULL, NULL, NULL, NULL, NULL),
(162, '2026-07-22 16:39:54', 20, 'Iina Takala profile visited.', NULL, NULL, NULL, NULL, NULL),
(163, '2026-07-22 16:40:06', 20, 'Samarth Prajapati profile visited.', NULL, NULL, NULL, NULL, NULL),
(164, '2026-07-22 16:40:16', 20, 'Jisk Renes profile visited.', NULL, NULL, NULL, NULL, NULL),
(165, '2026-07-22 16:41:13', 20, 'johnwhite white profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(166, '2026-07-22 16:41:42', 20, 'User settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(167, '2026-07-22 16:52:32', 20, 'markblack black profile liked.', NULL, NULL, NULL, NULL, NULL),
(168, '2026-07-22 16:52:39', 20, 'dev dev profile liked.', NULL, NULL, NULL, NULL, NULL),
(169, '2026-07-22 16:52:44', 20, 'dev6 dev6 profile liked.', NULL, NULL, NULL, NULL, NULL),
(170, '2026-07-22 16:55:54', 22, 'johnwhite white profile liked.', NULL, NULL, NULL, NULL, NULL),
(171, '2026-07-22 16:55:58', 22, 'markblack black profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(172, '2026-07-22 16:56:01', 22, 'dev dev profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(173, '2026-07-22 16:56:04', 22, 'dev dev profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(174, '2026-07-22 16:56:06', 22, 'devtest test profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(175, '2026-07-22 16:56:16', 22, 'dev5 dev5 profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(176, '2026-07-22 16:56:18', 22, 'Abhishek Chatterjee profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(177, '2026-07-22 16:56:19', 22, 'Sabrine Van der Ham profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(178, '2026-07-22 16:56:21', 22, 'Väinö Lahti profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(179, '2026-07-22 16:56:22', 22, 'Alicia Lam profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(180, '2026-07-22 16:56:24', 22, 'Iina Takala profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(181, '2026-07-22 16:56:26', 22, 'Samarth Prajapati profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(182, '2026-07-22 16:56:28', 22, 'Jisk Renes profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(183, '2026-07-22 16:56:29', 22, 'admin admin profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(184, '2026-07-22 16:59:34', 20, 'Alicia Lam send gift.', NULL, NULL, NULL, NULL, NULL),
(185, '2026-07-23 17:39:50', 1, 'Premuim Likes Super Like package created.', NULL, NULL, NULL, NULL, NULL),
(186, '2026-07-23 17:40:56', 20, 'Purchased Super Like package: Premuim Likes', NULL, NULL, NULL, NULL, NULL),
(187, '2026-07-23 17:46:11', 20, 'Purchased Super Like package: Premuim Likes', NULL, NULL, NULL, NULL, NULL),
(188, '2026-07-23 17:46:37', 20, 'Iina Takala profile Super Liked.', NULL, NULL, NULL, NULL, NULL),
(189, '2026-07-23 17:55:05', 1, 'Premuim Likes Super Like package updated.', NULL, NULL, NULL, NULL, NULL),
(190, '2026-07-23 17:55:20', 1, 'Premuim Likes Super Like package updated.', NULL, NULL, NULL, NULL, NULL),
(191, '2026-07-23 17:56:04', 22, 'johnwhite white profile visited.', NULL, NULL, NULL, NULL, NULL),
(192, '2026-07-23 17:59:41', 22, 'johnwhite white profile Super Liked.', NULL, NULL, NULL, NULL, NULL),
(193, '2026-07-23 17:59:49', 22, 'dev4 dev4 profile Super Liked.', NULL, NULL, NULL, NULL, NULL),
(194, '2026-07-23 18:12:09', 1, 'dev devin user info updated.', NULL, NULL, NULL, NULL, NULL),
(195, '2026-07-23 18:13:25', 26, 'dev devin update cover picture.', NULL, NULL, NULL, NULL, NULL),
(196, '2026-07-23 18:28:38', 1, 'dev devin user info updated.', NULL, NULL, NULL, NULL, NULL),
(197, '2026-07-23 18:31:56', 27, 'dev devin update cover picture.', NULL, NULL, NULL, NULL, NULL),
(198, '2026-07-23 18:32:10', 27, 'dev devin update profile picture.', NULL, NULL, NULL, NULL, NULL),
(199, '2026-07-23 18:32:49', 27, 'dev devin update own location.', NULL, NULL, NULL, NULL, NULL),
(200, '2026-07-23 18:42:15', 1, 'dev12 devin user info updated.', NULL, NULL, NULL, NULL, NULL),
(201, '2026-07-23 18:42:49', 28, 'dev12 devin update profile picture.', NULL, NULL, NULL, NULL, NULL),
(202, '2026-07-23 18:42:55', 28, 'dev12 devin update cover picture.', NULL, NULL, NULL, NULL, NULL),
(203, '2026-07-23 18:44:04', 28, 'dev12 devin update own location.', NULL, NULL, NULL, NULL, NULL),
(204, '2026-07-23 19:04:58', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(205, '2026-07-23 19:05:57', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(206, '2026-07-23 19:29:29', 28, 'Booster activated by user dev12 devin', NULL, NULL, NULL, NULL, NULL),
(207, '2026-07-23 19:42:11', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(208, '2026-07-23 19:42:29', 1, 'Site configuration settings stored / updated.', NULL, NULL, NULL, NULL, NULL),
(209, '2026-07-23 19:42:41', 20, 'dev12 devin profile Super Liked.', NULL, NULL, NULL, NULL, NULL),
(210, '2026-07-23 19:44:42', 20, 'dev devin profile Disliked.', NULL, NULL, NULL, NULL, NULL),
(211, '2026-07-23 19:54:42', 20, 'loveria Admin profile visited.', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT 'Sent,delivered,seen/read',
  `message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL COMMENT 'Text,image,emoji,video,audio, audio call init, video call init, giphy, accept message. Declined message',
  `from_users__id` int(10) UNSIGNED NOT NULL,
  `to_users__id` int(10) UNSIGNED NOT NULL,
  `items__id` int(10) UNSIGNED DEFAULT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `integrity_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `message`, `type`, `from_users__id`, `to_users__id`, `items__id`, `users__id`, `integrity_id`) VALUES
(1, '2ee4baed-5bcc-43d5-af07-8550720b8fd4', '2026-06-24 16:44:55', '2026-06-24 16:44:55', 2, 'Message Request', 9, 1, 15, NULL, 1, 'a7fca370-5f30-4c7e-87f4-5d5cc1121692'),
(2, 'fba42250-5c53-4167-9ad4-0b132f963e2f', '2026-06-24 16:44:55', '2026-06-24 16:44:55', 2, 'Message Request', 9, 1, 15, NULL, 15, 'a7fca370-5f30-4c7e-87f4-5d5cc1121692'),
(3, 'f7912677-f0d1-40df-9233-c8275a999da3', '2026-06-24 16:44:55', '2026-06-24 16:44:55', 2, 'hi', 1, 1, 15, NULL, 1, '367a3b9c-a1ad-4349-b1d0-1922bf1315d0'),
(4, 'c726604d-87a8-4f2b-a6cb-069700e9e7c4', '2026-06-24 16:44:55', '2026-06-24 16:44:55', 2, 'hi', 1, 1, 15, NULL, 15, '367a3b9c-a1ad-4349-b1d0-1922bf1315d0'),
(5, '5e904d7b-ed12-4278-8b51-2cb607734413', '2026-06-24 18:15:18', '2026-06-24 18:15:18', 2, 'Message Request', 10, 20, 23, NULL, 20, 'baa2c9a5-5edb-4bc5-bd5d-507f1d2a30b0'),
(6, 'd4793a1f-3284-4010-8118-9ea01ac7698a', '2026-06-24 18:15:18', '2026-06-24 18:15:18', 2, 'Message Request', 10, 20, 23, NULL, 23, 'baa2c9a5-5edb-4bc5-bd5d-507f1d2a30b0'),
(7, 'd4d5b900-2098-4c26-aff6-580490124009', '2026-06-24 18:15:18', '2026-06-24 18:15:18', 2, 'hi', 1, 20, 23, NULL, 20, '223b602b-f358-4ef7-89b7-f7252d7f1319'),
(10, '6b5a9fd0-ed12-4265-8fec-ff2ad8e4c671', '2026-06-24 18:17:55', '2026-06-24 18:17:57', 1, 'lskdnflksndfklsdnf', 1, 23, 20, NULL, 20, '13a6598b-b183-45ff-b09b-bd50801e60b9'),
(11, '89009ba7-57a3-4149-b473-bd68a9e258b5', '2026-06-24 18:25:21', '2026-06-24 18:25:21', 2, 'asdasdasd', 1, 20, 23, NULL, 20, '880735ad-9ac8-449b-8e83-2bc0d1a9978e'),
(13, '0a116c06-8cf1-4221-a84c-b7f1faf8d280', '2026-06-24 18:31:00', '2026-06-24 18:31:00', 2, 'Message Request', 9, 20, 21, NULL, 20, '51f343c1-2c85-4187-a4c9-408eaa59ac18'),
(14, '3ed7d023-b534-469c-a2a4-c763499b1488', '2026-06-24 18:31:00', '2026-06-24 18:31:00', 2, 'Message Request', 9, 20, 21, NULL, 21, '51f343c1-2c85-4187-a4c9-408eaa59ac18'),
(15, 'cc229d73-f99d-45f4-9c7f-1ccf923ef904', '2026-06-24 18:31:00', '2026-06-24 18:31:00', 2, 'hi', 1, 20, 21, NULL, 20, '0fe82c6c-1128-41b1-8e83-9fe5c4af6470'),
(17, 'a3f4b6a5-85a0-4bd5-9b24-a2ddf121c4c9', '2026-06-24 18:31:16', '2026-06-24 18:31:16', 2, 'asdasdasd', 1, 20, 21, NULL, 20, '9a2d94b8-819b-41e8-9462-be8f95deafcb'),
(18, 'b876f8e7-9420-4d94-ab49-70b13236316b', '2026-06-24 18:31:16', '2026-06-24 18:31:16', 2, 'asdasdasd', 1, 20, 21, NULL, 21, '9a2d94b8-819b-41e8-9462-be8f95deafcb'),
(19, 'd3a9764a-0cd5-436a-ac5c-03a5b26a9e59', '2026-06-24 18:31:30', '2026-06-24 18:31:30', 2, '😝', 1, 20, 21, NULL, 20, 'af90b20f-a65e-46c7-b215-3df20ca3f4cb'),
(20, '6d792518-3852-442f-b18e-6be618e2f3a7', '2026-06-24 18:31:30', '2026-06-24 18:31:30', 2, '😝', 1, 20, 21, NULL, 21, 'af90b20f-a65e-46c7-b215-3df20ca3f4cb'),
(25, 'cb490537-5ccf-4de5-9809-19ae5aecd163', '2026-06-24 18:33:32', '2026-06-24 18:33:32', 2, 'asdasdasd', 1, 20, 23, NULL, 20, '610a6623-fd90-4f1f-9a28-2be1a220afd9'),
(27, 'd75eb8dc-c6c5-43ab-a4f9-901f6023e87d', '2026-06-24 18:33:43', '2026-06-24 18:33:43', 2, 'asdasd', 1, 20, 23, NULL, 20, 'c509b275-4cc6-4dea-8657-f577806877bf'),
(29, '579ad85f-5cc9-4fb4-a218-7180d42daa62', '2026-06-24 18:34:20', '2026-06-24 18:34:20', 2, 'asdasdasd', 1, 20, 23, NULL, 20, 'cd59233a-2a66-41d4-8398-72533f6cad72'),
(31, 'cb2992a1-cff4-4165-9e76-6082fe9d5275', '2026-06-24 18:34:31', '2026-06-24 18:34:31', 2, 'asdasdasd', 1, 20, 23, NULL, 20, '1d789c3d-0552-415e-ba00-86fed52d5eff'),
(33, '3cc22c2b-bfa6-4eb3-aa20-6de6f71de45e', '2026-06-24 18:34:44', '2026-06-24 18:34:44', 2, 'asdasdasd', 1, 20, 23, NULL, 20, '7f4a9aa3-3223-44d6-817e-cc9ad8fd4214'),
(35, '872f3503-c624-404a-925f-1145f3cd6a66', '2026-06-24 18:37:01', '2026-06-24 18:37:01', 2, 'asdasdad', 1, 20, 23, NULL, 20, '1604e627-bea1-410d-9523-65d91aafc981'),
(37, '85493706-be35-4e45-956d-14bf9564dc61', '2026-06-24 18:37:03', '2026-06-24 18:37:03', 2, 'asdasdasd', 1, 20, 23, NULL, 20, '664adbcb-8641-4105-b63d-a03d0976da18'),
(39, '0f7aa495-cd4f-4169-986f-94cb35c9183b', '2026-06-24 18:37:05', '2026-06-24 18:37:05', 2, 'asdasdsad', 1, 20, 23, NULL, 20, 'cd72ecd6-c7be-4e23-9a32-906093f30011'),
(41, '8f1a0645-6608-46ff-9c98-57ffc4e4be51', '2026-06-24 18:37:56', '2026-06-24 18:37:56', 2, 'asdasdasdasd', 1, 20, 23, NULL, 20, '259578c7-e365-4d34-aec6-2ce4be3ef833'),
(44, '78676a7d-2553-4505-bf98-ad41c47fd478', '2026-06-24 18:38:11', '2026-06-24 18:38:13', 1, 'asdasdasd', 1, 23, 20, NULL, 20, 'fb98eace-1226-40bd-8ffe-4cf87c0c036b'),
(46, '771aa65e-39a8-429b-839c-f2d657789193', '2026-06-24 18:38:31', '2026-06-24 18:38:40', 1, 'asdasdasd', 1, 23, 20, NULL, 20, '0d72a9da-5b2d-4b34-bba8-7941a216b358'),
(47, '8ba4f877-cf14-4cd2-ba05-d273c496a748', '2026-06-24 18:38:46', '2026-06-24 18:38:46', 2, 'aasdasdasd', 1, 20, 23, NULL, 20, 'f2530839-3410-4773-b584-7683eb8051da'),
(49, '96a4a709-8e0f-44bf-ab30-99d3b7b73e5d', '2026-06-24 18:39:10', '2026-06-24 18:39:10', 2, 'asdasdasd', 1, 20, 23, NULL, 20, 'd098fe05-463b-4a98-a9ef-f5e0144a0372'),
(53, '56d0704d-09e0-4940-8bb8-8148cec2d13b', '2026-06-24 22:51:10', '2026-06-24 22:51:10', 2, 'Message Request', 10, 25, 24, NULL, 25, 'ff0bb0fb-6d92-408f-b46c-f9401759d51c'),
(54, '821e984a-4fe6-4dd9-a9ff-682a217266dc', '2026-06-24 22:51:10', '2026-06-24 22:51:10', 2, 'Message Request', 10, 25, 24, NULL, 24, 'ff0bb0fb-6d92-408f-b46c-f9401759d51c'),
(57, '3e84267d-ded1-4729-8f57-f024c9c448bc', '2026-06-24 23:07:41', '2026-06-24 23:07:41', 2, 'asdasdasd', 1, 24, 25, NULL, 24, '0f7c3d61-6b3d-463f-bc2f-cbc4dc1c2472'),
(58, '108d312f-181d-4618-b260-dab4bde7179b', '2026-06-24 23:07:41', '2026-06-24 23:07:45', 1, 'asdasdasd', 1, 24, 25, NULL, 25, '0f7c3d61-6b3d-463f-bc2f-cbc4dc1c2472'),
(59, '5cb24b85-79a0-420b-b35d-1518c5fdfa92', '2026-06-24 23:07:53', '2026-06-24 23:07:53', 2, 'asdasdsad', 1, 25, 24, NULL, 25, 'd54d337b-df6b-4351-ad4f-189480198a23'),
(60, '896d6548-1225-4e69-8454-7eaa7134c002', '2026-06-24 23:07:53', '2026-06-24 23:07:54', 1, 'asdasdsad', 1, 25, 24, NULL, 24, 'd54d337b-df6b-4351-ad4f-189480198a23'),
(61, '9def445e-5992-4d5b-8cca-d9c219f02f2b', '2026-06-24 23:08:00', '2026-06-24 23:08:00', 2, 'asdasdasd', 1, 25, 24, NULL, 25, '1640a787-0820-4ee3-816e-5488f5c78e5d'),
(62, '96e3a735-52f5-47e4-b8e4-cfd946b5bb63', '2026-06-24 23:08:00', '2026-06-24 23:08:04', 1, 'asdasdasd', 1, 25, 24, NULL, 24, '1640a787-0820-4ee3-816e-5488f5c78e5d'),
(63, '0b3738b0-f4d7-4d6b-b4bb-00def79994eb', '2026-06-29 16:19:44', '2026-06-29 16:19:44', 2, 'asdasdasd', 1, 20, 23, NULL, 20, '5e3edd1a-6812-4699-a491-06e2c68fc12e'),
(64, '2d4e158e-1d7e-41c2-b75e-030cc61af56c', '2026-06-29 16:19:44', '2026-06-29 16:19:44', 2, 'asdasdasd', 1, 20, 23, NULL, 23, '5e3edd1a-6812-4699-a491-06e2c68fc12e'),
(65, 'df1e7785-644b-40e8-a36a-3ec2575a68a0', '2026-06-29 16:19:55', '2026-06-29 16:19:55', 2, 'asdasdasd', 1, 20, 23, NULL, 20, 'bdf101b7-56fe-42d3-9223-22fca09ae2f5'),
(66, '4c900956-b398-4cd2-ae8b-5c927108ea8e', '2026-06-29 16:19:55', '2026-06-29 16:19:55', 2, 'asdasdasd', 1, 20, 23, NULL, 23, 'bdf101b7-56fe-42d3-9223-22fca09ae2f5'),
(67, '48ad21db-6e8b-4981-9218-e70d1972c47b', '2026-06-29 16:32:39', '2026-06-29 16:32:39', 2, 'Message Request', 9, 20, 24, NULL, 20, '59801079-8a85-433b-8425-8f4da8707a93'),
(68, 'ad784400-0e73-4216-8722-7d34d3ecd61c', '2026-06-29 16:32:39', '2026-06-29 16:32:39', 2, 'Message Request', 9, 20, 24, NULL, 24, '59801079-8a85-433b-8425-8f4da8707a93'),
(69, 'e30bfc79-70b5-40cf-90c2-74e8566d63a8', '2026-06-29 16:32:39', '2026-06-29 16:32:39', 2, 'sadasdasdasd', 1, 20, 24, NULL, 20, 'ccedc8bb-cc09-4eeb-9e3a-77764fbcabc5'),
(71, '6bda3357-3a98-4121-a334-f40419fc95ad', '2026-07-22 16:27:47', '2026-07-22 16:27:47', 2, 'Message Request', 10, 20, 9, NULL, 20, 'cbc0e5c2-0b0b-4f91-9cf4-e7312677e75f'),
(72, '06b0ebaf-f06c-4f3e-902b-86f6cef9c8ed', '2026-07-22 16:27:47', '2026-07-22 16:27:47', 2, 'Message Request', 10, 20, 9, NULL, 9, 'cbc0e5c2-0b0b-4f91-9cf4-e7312677e75f'),
(73, '28f79b47-3c50-488a-88b1-76c68aa731ee', '2026-07-22 16:27:47', '2026-07-22 16:27:47', 2, 'asdasdasd', 1, 20, 9, NULL, 20, 'a8cba9fc-e8ad-4ce6-b1c6-ef516c70acad'),
(74, 'f7a18c2b-af9e-49a4-ac7c-94c89aa44223', '2026-07-22 16:27:47', '2026-07-22 16:27:47', 2, 'asdasdasd', 1, 20, 9, NULL, 9, 'a8cba9fc-e8ad-4ce6-b1c6-ef516c70acad'),
(75, '15ad19a8-43ec-47c2-ab1b-71019016f947', '2026-07-22 16:56:53', '2026-07-22 16:56:53', 2, 'Message Request', 10, 22, 20, NULL, 22, '65d8b24b-3839-4e64-a64d-c63bfdf7ce41'),
(76, 'a37e1f49-1245-4ded-b6ce-8ac9713d5219', '2026-07-22 16:56:53', '2026-07-22 16:56:53', 2, 'Message Request', 10, 22, 20, NULL, 20, '65d8b24b-3839-4e64-a64d-c63bfdf7ce41'),
(77, 'a52ea3d8-94d1-49a7-b6d8-5b1eb0a524ab', '2026-07-22 16:56:53', '2026-07-22 16:56:53', 2, 'asdasdasd', 1, 22, 20, NULL, 22, 'a139f5c3-b49c-44a1-8abc-12098541ebdb'),
(78, '2c7fba69-67e3-46d3-a688-07a5aaff3d35', '2026-07-22 16:56:53', '2026-07-22 16:56:58', 1, 'asdasdasd', 1, 22, 20, NULL, 20, 'a139f5c3-b49c-44a1-8abc-12098541ebdb'),
(79, '2942d60d-0022-46c4-b422-0ba4fc3a3e78', '2026-07-22 16:57:06', '2026-07-22 16:57:06', 2, 'asdasdasd', 1, 20, 22, NULL, 20, 'be328508-e1e3-4d1d-a30b-9b0cc6ff1288'),
(80, 'd4d92211-dbc5-4811-a49c-a3a766528d3b', '2026-07-22 16:57:06', '2026-07-22 16:57:09', 1, 'asdasdasd', 1, 20, 22, NULL, 22, 'be328508-e1e3-4d1d-a30b-9b0cc6ff1288');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` mediumint(8) UNSIGNED NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `country_code` char(2) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2013-12-31 19:31:01',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(45) NOT NULL,
  `value` text DEFAULT NULL,
  `data_type` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`_id`, `created_at`, `updated_at`, `name`, `value`, `data_type`) VALUES
(1, '2026-05-29 18:31:22', '2026-05-29 18:31:22', 'display_open_street_map', '1', 2),
(2, '2026-05-29 18:31:22', '2026-05-29 18:31:22', 'display_google_map', '0', 2),
(4, '2026-05-29 18:46:39', '2026-05-29 18:46:39', 'logo_name', 'new-logo.png', 1),
(5, '2026-05-29 18:46:49', '2026-05-29 18:46:49', 'small_logo_name', 'new-logo.png', 1),
(12, '2026-05-29 18:48:02', '2026-05-29 18:48:02', 'name', 'Wandr', 1),
(13, '2026-05-29 18:48:02', '2026-05-29 18:48:02', 'business_email', 'your-business-email@domain.com', 1),
(14, '2026-05-29 18:48:02', '2026-05-29 18:48:02', 'contact_email', 'your-contact-email@domain.com', 1),
(15, '2026-05-29 18:48:02', '2026-05-29 18:48:02', 'timezone', 'UTC', 1),
(16, '2026-05-29 18:48:02', '2026-05-29 18:48:02', 'distance_measurement', '6371', 1),
(17, '2026-05-29 18:48:02', '2026-05-29 18:48:02', 'default_language', 'en_US', 1),
(18, '2026-06-24 18:01:27', '2026-06-24 18:01:27', 'allow_pusher', '1', 2),
(19, '2026-06-24 18:01:27', '2026-06-24 18:01:27', 'pusher_app_id', '2170382', 1),
(20, '2026-06-24 18:01:27', '2026-06-24 18:01:27', 'pusher_app_key', 'd1c20119d1a66d491882', 1),
(21, '2026-06-24 18:01:27', '2026-06-24 18:01:27', 'pusher_app_secret', '7aebf1467bdb25b603a9', 1),
(22, '2026-06-24 18:01:27', '2026-06-24 18:01:27', 'pusher_app_cluster_key', 'ap2', 1),
(23, '2026-07-16 17:34:35', '2026-07-16 17:34:35', 'enable_stripe', '1', 2),
(24, '2026-07-16 17:34:35', '2026-07-16 17:34:35', 'use_test_stripe', '1', 2),
(25, '2026-07-16 17:34:35', '2026-07-16 17:34:35', 'stripe_testing_secret_key', '', 1),
(26, '2026-07-16 17:34:35', '2026-07-16 17:34:35', 'stripe_testing_publishable_key', '', 1),
(27, '2026-07-16 17:34:35', '2026-07-16 17:34:35', 'stripe_testing_webhook_secret', '', 1),
(33, '2026-07-23 19:05:57', '2026-07-23 19:05:57', 'booster_period', '5', 3),
(34, '2026-07-23 19:05:57', '2026-07-23 19:05:57', 'booster_price', '100', 3),
(35, '2026-07-23 19:05:57', '2026-07-23 19:05:57', 'booster_price_for_premium_user', '100', 3),
(36, '2026-07-23 19:42:28', '2026-07-23 19:42:28', 'super_like_price', '10', 3),
(37, '2026-07-23 19:42:28', '2026-07-23 19:42:28', 'super_like_price_premium', '5', 3),
(38, '2026-07-23 19:42:28', '2026-07-23 19:42:28', 'super_like_daily_free', '1', 3),
(39, '2026-07-23 19:42:28', '2026-07-23 19:42:28', 'super_like_daily_free_premium', '5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `_id` smallint(5) UNSIGNED NOT NULL,
  `iso_code` char(2) DEFAULT NULL,
  `name_capitalized` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `iso3_code` char(3) DEFAULT NULL,
  `iso_num_code` smallint(6) DEFAULT NULL,
  `phone_code` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`_id`, `iso_code`, `name_capitalized`, `name`, `iso3_code`, `iso_num_code`, `phone_code`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 243),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 7),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263),
(240, 'RS', 'SERBIA', 'Serbia', 'SRB', 688, 381),
(241, 'AP', 'ASIA PACIFIC REGION', 'Asia / Pacific Region', '0', 0, 0),
(242, 'ME', 'MONTENEGRO', 'Montenegro', 'MNE', 499, 382),
(243, 'AX', 'ALAND ISLANDS', 'Aland Islands', 'ALA', 248, 358),
(244, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 599),
(245, 'CW', 'CURACAO', 'Curacao', 'CUW', 531, 599),
(246, 'GG', 'GUERNSEY', 'Guernsey', 'GGY', 831, 44),
(247, 'IM', 'ISLE OF MAN', 'Isle of Man', 'IMN', 833, 44),
(248, 'JE', 'JERSEY', 'Jersey', 'JEY', 832, 44),
(249, 'XK', 'KOSOVO', 'Kosovo', '---', 0, 381),
(250, 'BL', 'SAINT BARTHELEMY', 'Saint Barthelemy', 'BLM', 652, 590),
(251, 'MF', 'SAINT MARTIN', 'Saint Martin', 'MAF', 663, 590),
(252, 'SX', 'SINT MAARTEN', 'Sint Maarten', 'SXM', 534, 1),
(253, 'SS', 'SOUTH SUDAN', 'South Sudan', 'SSD', 728, 211);

-- --------------------------------------------------------

--
-- Table structure for table `credit_packages`
--

CREATE TABLE `credit_packages` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `credits` int(10) UNSIGNED NOT NULL,
  `price` decimal(13,4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `users__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `credit_packages`
--

INSERT INTO `credit_packages` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `title`, `credits`, `price`, `image`, `users__id`) VALUES
(1, '12b65136-0cf3-49cb-965b-e6eba54c480d', '2026-07-16 16:53:36', '2026-07-16 16:53:47', 1, 'free', 10, 0.0000, 'packages-01.jpg', 1),
(2, '793256a5-655a-43f2-ac5c-59231e53b102', '2026-07-16 16:56:54', '2026-07-16 18:14:57', 1, 'Wandr Plus', 100, 5.9900, 'package-02.jpg', 1),
(3, '32dc6dd7-9eca-4ce7-bfa5-bce868ff4596', '2026-07-16 16:57:23', '2026-07-16 16:57:23', 1, 'Wandr Premium', 250, 6.0000, 'package-03.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `credit_wallet_transactions`
--

CREATE TABLE `credit_wallet_transactions` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `credits` int(11) NOT NULL COMMENT '- (minus) for debit & + for credit',
  `financial_transactions__id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `credit_type` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Purchased, bonuses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `credit_wallet_transactions`
--

INSERT INTO `credit_wallet_transactions` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `users__id`, `credits`, `financial_transactions__id`, `description`, `credit_type`) VALUES
(1, '54442415-5b79-4d99-8504-ac3b8a90b385', '2026-05-29 22:55:26', '2026-05-29 22:55:26', 1, 22, 0, NULL, NULL, NULL),
(2, 'e165a69e-2dec-4819-8aae-74625e21d114', '2026-05-29 22:55:44', '2026-05-29 22:55:44', 1, 22, 0, NULL, NULL, NULL),
(3, '751b94d3-8646-4b97-8d70-c4ea0f039bdd', '2026-07-16 17:40:06', '2026-07-16 17:40:06', 1, 20, 10, 1, NULL, 2),
(4, 'd162ec34-ac56-471a-8761-a46d6803c5d0', '2026-07-16 17:42:07', '2026-07-16 17:42:07', 1, 20, 100, 2, NULL, 2),
(5, '8b34ec64-238c-4343-b934-50ea9c9ac794', '2026-07-16 19:01:56', '2026-07-16 19:01:56', 1, 20, 10, 3, NULL, 2),
(6, '4491ecb6-12d6-4956-b68d-260f8b3ce964', '2026-07-16 19:03:06', '2026-07-16 19:03:06', 1, 20, 100, 4, NULL, 2),
(7, '717c78be-94ed-4d12-a161-786f4cee6ea1', '2026-07-16 19:09:37', '2026-07-16 19:09:37', 1, 20, 10, 5, NULL, 2),
(8, 'abef9b22-f5b2-41a3-b354-747263406e05', '2026-07-22 16:59:34', '2026-07-22 16:59:34', 1, 20, -100, NULL, NULL, NULL),
(9, '606fd0c1-a07c-48d7-8e75-05ea9e1d9ef3', '2026-07-23 17:40:56', '2026-07-23 17:40:56', 1, 20, -50, NULL, 'super_like_package_buy:1', NULL),
(10, '8c58a044-5588-4278-af5e-63ec1b05aca7', '2026-07-23 17:46:11', '2026-07-23 17:46:11', 1, 20, -50, NULL, 'super_like_package_buy:1', NULL),
(11, '3ad639e6-b4e5-41c8-b65b-6f16f7f2f1ea', '2026-07-23 19:06:24', '2026-07-23 19:06:24', 1, 28, 10, 7, NULL, 2),
(12, '5b6e3b11-9da8-48ec-9274-d97a5c642005', '2026-07-23 19:07:40', '2026-07-23 19:07:40', 1, 28, 100, 8, NULL, 2),
(13, '77e879ce-57ef-4ed1-ae3f-42f400579c76', '2026-07-23 19:29:29', '2026-07-23 19:29:29', 1, 28, -100, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_change_requests`
--

CREATE TABLE `email_change_requests` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `new_email` varchar(255) NOT NULL,
  `activation_key` varchar(255) NOT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `user_authorities__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_transactions`
--

CREATE TABLE `financial_transactions` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `amount` decimal(13,4) DEFAULT NULL,
  `__data` text DEFAULT NULL,
  `users__id` int(10) UNSIGNED DEFAULT NULL,
  `method` varchar(36) NOT NULL,
  `currency_code` varchar(5) DEFAULT NULL,
  `is_test` tinyint(3) UNSIGNED DEFAULT NULL,
  `txn_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `financial_transactions`
--

INSERT INTO `financial_transactions` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `amount`, `__data`, `users__id`, `method`, `currency_code`, `is_test`, `txn_id`) VALUES
(1, '259794cb-aa64-472a-94c8-108c00433634', '2026-07-16 17:40:06', '2026-07-16 17:40:06', 2, 0.0000, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"cs_test_a1PG3KboVbw5UEEsyx82BZK2165fBj0XlDsnqnEkF8GQhyb98P3MlXDPla\\\",\\\"amount\\\":0,\\\"status\\\":\\\"succeeded\\\",\\\"currency\\\":\\\"usd\\\",\\\"metadata\\\":{\\\"userId\\\":20,\\\"packageUid\\\":\\\"12b65136-0cf3-49cb-965b-e6eba54c480d\\\"}}\",\"packageName\":\"free\"}', 20, 'Stripe', 'USD', 1, 'cs_test_a1PG3KboVbw5UEEsyx82BZK2165fBj0XlDsnq'),
(2, '17383e2f-6c42-4cfe-9f1a-2c3ad2d5d2e3', '2026-07-16 17:42:07', '2026-07-16 17:42:07', 2, 599.0000, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"pi_3TttIGRpT4YVvGC71dgSyC0o\\\",\\\"object\\\":\\\"payment_intent\\\",\\\"amount\\\":59900,\\\"amount_capturable\\\":0,\\\"amount_details\\\":{\\\"tip\\\":[]},\\\"amount_received\\\":59900,\\\"application\\\":null,\\\"application_fee_amount\\\":null,\\\"automatic_payment_methods\\\":null,\\\"canceled_at\\\":null,\\\"cancellation_reason\\\":null,\\\"capture_method\\\":\\\"automatic_async\\\",\\\"client_secret\\\":\\\"pi_3TttIGRpT4YVvGC71dgSyC0o_secret_6b6zcvV4edXCp2EPTQU1bWjqK\\\",\\\"confirmation_method\\\":\\\"automatic\\\",\\\"created\\\":1784223716,\\\"currency\\\":\\\"usd\\\",\\\"customer\\\":null,\\\"customer_account\\\":null,\\\"description\\\":null,\\\"excluded_payment_method_types\\\":null,\\\"last_payment_error\\\":null,\\\"latest_charge\\\":\\\"ch_3TttIGRpT4YVvGC71HGV5CTs\\\",\\\"livemode\\\":false,\\\"managed_payments\\\":{\\\"enabled\\\":false},\\\"metadata\\\":{\\\"packageUid\\\":\\\"793256a5-655a-43f2-ac5c-59231e53b102\\\",\\\"userId\\\":\\\"20\\\"},\\\"next_action\\\":null,\\\"on_behalf_of\\\":null,\\\"payment_details\\\":{\\\"customer_reference\\\":null,\\\"order_reference\\\":\\\"cs_test_a1IKde8vovulJX7hiTjVGTd2AHrrBaEkQ0rVp9LQJCyvdUdUS2GrKDTvGT\\\"},\\\"payment_method\\\":\\\"pm_1TttIGRpT4YVvGC7yFyGIrJM\\\",\\\"payment_method_configuration_details\\\":null,\\\"payment_method_options\\\":{\\\"card\\\":{\\\"installments\\\":null,\\\"mandate_options\\\":null,\\\"network\\\":null,\\\"request_three_d_secure\\\":\\\"automatic\\\"}},\\\"payment_method_types\\\":[\\\"card\\\"],\\\"presentment_details\\\":{\\\"presentment_amount\\\":17268028,\\\"presentment_currency\\\":\\\"pkr\\\"},\\\"processing\\\":null,\\\"receipt_email\\\":null,\\\"review\\\":null,\\\"setup_future_usage\\\":null,\\\"shared_payment_granted_token\\\":null,\\\"shipping\\\":null,\\\"source\\\":null,\\\"statement_descriptor\\\":null,\\\"statement_descriptor_suffix\\\":null,\\\"status\\\":\\\"succeeded\\\",\\\"transfer_data\\\":null,\\\"transfer_group\\\":null}\",\"packageName\":\"Wandr Plus\"}', 20, 'Stripe', 'USD', 1, 'pi_3TttIGRpT4YVvGC71dgSyC0o'),
(3, '6c679d49-70c5-465f-9a78-d0fbb0fe5944', '2026-07-16 19:01:55', '2026-07-16 19:01:55', 2, 0.0000, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"free_pkg_6a592aa3e6de02.13445525\\\",\\\"amount\\\":0,\\\"status\\\":\\\"succeeded\\\",\\\"metadata\\\":{\\\"userId\\\":20,\\\"packageUid\\\":\\\"12b65136-0cf3-49cb-965b-e6eba54c480d\\\"}}\",\"packageName\":\"free\"}', 20, 'Stripe', 'USD', 1, 'free_pkg_6a592aa3e6de02.13445525'),
(4, '86bec8dd-2d25-4fb9-8530-86b9174f56f2', '2026-07-16 19:03:06', '2026-07-16 19:03:06', 2, 5.9900, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"pi_3TtuYlRpT4YVvGC70cLVDQco\\\",\\\"object\\\":\\\"payment_intent\\\",\\\"amount\\\":599,\\\"amount_capturable\\\":0,\\\"amount_details\\\":{\\\"tip\\\":[]},\\\"amount_received\\\":599,\\\"application\\\":null,\\\"application_fee_amount\\\":null,\\\"automatic_payment_methods\\\":null,\\\"canceled_at\\\":null,\\\"cancellation_reason\\\":null,\\\"capture_method\\\":\\\"automatic_async\\\",\\\"client_secret\\\":\\\"pi_3TtuYlRpT4YVvGC70cLVDQco_secret_SDttwQc6wHoLvgLrpZeNBIumf\\\",\\\"confirmation_method\\\":\\\"automatic\\\",\\\"created\\\":1784228583,\\\"currency\\\":\\\"usd\\\",\\\"customer\\\":null,\\\"customer_account\\\":null,\\\"description\\\":null,\\\"excluded_payment_method_types\\\":null,\\\"last_payment_error\\\":null,\\\"latest_charge\\\":\\\"ch_3TtuYlRpT4YVvGC70bjddDJA\\\",\\\"livemode\\\":false,\\\"managed_payments\\\":{\\\"enabled\\\":false},\\\"metadata\\\":{\\\"packageUid\\\":\\\"793256a5-655a-43f2-ac5c-59231e53b102\\\",\\\"userId\\\":\\\"20\\\"},\\\"next_action\\\":null,\\\"on_behalf_of\\\":null,\\\"payment_details\\\":{\\\"customer_reference\\\":null,\\\"order_reference\\\":\\\"cs_test_a1a5a179Lj0VZECk7ZaW9PRA906ye3vL7Fe7hJOLRlpXBRqrtJ31jPMae7\\\"},\\\"payment_method\\\":\\\"pm_1TtuYkRpT4YVvGC7zLjVobcN\\\",\\\"payment_method_configuration_details\\\":null,\\\"payment_method_options\\\":{\\\"card\\\":{\\\"installments\\\":null,\\\"mandate_options\\\":null,\\\"network\\\":null,\\\"request_three_d_secure\\\":\\\"automatic\\\"}},\\\"payment_method_types\\\":[\\\"card\\\"],\\\"presentment_details\\\":{\\\"presentment_amount\\\":173175,\\\"presentment_currency\\\":\\\"pkr\\\"},\\\"processing\\\":null,\\\"receipt_email\\\":null,\\\"review\\\":null,\\\"setup_future_usage\\\":null,\\\"shared_payment_granted_token\\\":null,\\\"shipping\\\":null,\\\"source\\\":null,\\\"statement_descriptor\\\":null,\\\"statement_descriptor_suffix\\\":null,\\\"status\\\":\\\"succeeded\\\",\\\"transfer_data\\\":null,\\\"transfer_group\\\":null}\",\"packageName\":\"Wandr Plus\"}', 20, 'Stripe', 'USD', 1, 'pi_3TtuYlRpT4YVvGC70cLVDQco'),
(5, '96bb7358-8833-4585-84df-c7ee0f955484', '2026-07-16 19:09:37', '2026-07-16 19:09:37', 2, 0.0000, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"free_pkg_6a592c712aa958.72816128\\\",\\\"amount\\\":0,\\\"status\\\":\\\"succeeded\\\",\\\"metadata\\\":{\\\"userId\\\":20,\\\"packageUid\\\":\\\"12b65136-0cf3-49cb-965b-e6eba54c480d\\\"}}\",\"packageName\":\"free\"}', 20, 'Stripe', 'USD', 1, 'free_pkg_6a592c712aa958.72816128'),
(6, '18ec9d8b-3ec0-4a65-a2a8-5bf09d4604a1', '2026-07-23 17:59:25', '2026-07-23 17:59:25', 2, 99.9900, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"pi_3TwQtwRpT4YVvGC71jxVLZWL\\\",\\\"object\\\":\\\"payment_intent\\\",\\\"allowed_payment_method_types\\\":null,\\\"amount\\\":9999,\\\"amount_capturable\\\":0,\\\"amount_details\\\":{\\\"shipping\\\":{\\\"amount\\\":0,\\\"from_postal_code\\\":null,\\\"to_postal_code\\\":null},\\\"tax\\\":{\\\"total_tax_amount\\\":0},\\\"tip\\\":[]},\\\"amount_received\\\":9999,\\\"application\\\":null,\\\"application_fee_amount\\\":null,\\\"automatic_payment_methods\\\":null,\\\"canceled_at\\\":null,\\\"cancellation_reason\\\":null,\\\"capture_method\\\":\\\"automatic_async\\\",\\\"client_secret\\\":\\\"pi_3TwQtwRpT4YVvGC71jxVLZWL_secret_y25RW2PKRjLXRJJEMAp6kLvi2\\\",\\\"confirmation_method\\\":\\\"automatic\\\",\\\"created\\\":1784829560,\\\"currency\\\":\\\"usd\\\",\\\"customer\\\":null,\\\"customer_account\\\":null,\\\"description\\\":null,\\\"excluded_payment_method_types\\\":null,\\\"invoice\\\":null,\\\"last_payment_error\\\":null,\\\"latest_charge\\\":\\\"ch_3TwQtwRpT4YVvGC71D33u3um\\\",\\\"livemode\\\":false,\\\"managed_payments\\\":{\\\"enabled\\\":false},\\\"metadata\\\":{\\\"packageType\\\":\\\"super_like\\\",\\\"packageUid\\\":\\\"2428b324-81d3-484b-95b4-769e45b8801c\\\",\\\"userId\\\":\\\"22\\\"},\\\"next_action\\\":null,\\\"on_behalf_of\\\":null,\\\"payment_details\\\":{\\\"customer_reference\\\":null,\\\"order_reference\\\":\\\"cs_test_a1yUfw9woV98oeDfeQZAoJ9Uk1wNWdBfMHazXDqjBZfBawb1oGb4wvLLXH\\\"},\\\"payment_method\\\":\\\"pm_1TwQtvRpT4YVvGC7KtnSr3i0\\\",\\\"payment_method_configuration_details\\\":null,\\\"payment_method_options\\\":{\\\"card\\\":{\\\"installments\\\":null,\\\"mandate_options\\\":null,\\\"network\\\":null,\\\"request_three_d_secure\\\":\\\"automatic\\\"}},\\\"payment_method_types\\\":[\\\"card\\\"],\\\"processing\\\":null,\\\"receipt_email\\\":null,\\\"review\\\":null,\\\"setup_future_usage\\\":null,\\\"shared_payment_granted_token\\\":null,\\\"shipping\\\":null,\\\"source\\\":null,\\\"statement_descriptor\\\":null,\\\"statement_descriptor_suffix\\\":null,\\\"status\\\":\\\"succeeded\\\",\\\"transfer_data\\\":null,\\\"transfer_group\\\":null}\",\"packageName\":\"Premuim Likes\",\"packageUid\":\"2428b324-81d3-484b-95b4-769e45b8801c\"}', 22, 'Stripe', 'USD', 1, 'pi_3TwQtwRpT4YVvGC71jxVLZWL'),
(7, '5d705fdd-75ad-46c4-8026-512d75385afb', '2026-07-23 19:06:24', '2026-07-23 19:06:24', 2, 0.0000, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"free_pkg_28_12b65136-0cf3-49cb-965b-e6eba54c480d\\\",\\\"amount\\\":0,\\\"status\\\":\\\"succeeded\\\",\\\"metadata\\\":{\\\"userId\\\":28,\\\"packageUid\\\":\\\"12b65136-0cf3-49cb-965b-e6eba54c480d\\\",\\\"packageType\\\":\\\"credit\\\"}}\",\"packageName\":\"free\",\"packageUid\":\"12b65136-0cf3-49cb-965b-e6eba54c480d\"}', 28, 'Stripe', 'USD', 1, 'free_pkg_28_12b65136-0cf3-49cb-965b-e6eba54c4'),
(8, 'ff6799cf-1126-497f-92d3-6fc7f7ff9d7c', '2026-07-23 19:07:40', '2026-07-23 19:07:40', 2, 5.9900, '{\"rawPaymentData\":\"{\\\"id\\\":\\\"pi_3TwRxyRpT4YVvGC71DRFYOXB\\\",\\\"object\\\":\\\"payment_intent\\\",\\\"allowed_payment_method_types\\\":null,\\\"amount\\\":599,\\\"amount_capturable\\\":0,\\\"amount_details\\\":{\\\"tip\\\":[]},\\\"amount_received\\\":599,\\\"application\\\":null,\\\"application_fee_amount\\\":null,\\\"automatic_payment_methods\\\":null,\\\"canceled_at\\\":null,\\\"cancellation_reason\\\":null,\\\"capture_method\\\":\\\"automatic_async\\\",\\\"client_secret\\\":\\\"pi_3TwRxyRpT4YVvGC71DRFYOXB_secret_I4HRqyLvVlSr9n1DJgZvi5S0K\\\",\\\"confirmation_method\\\":\\\"automatic\\\",\\\"created\\\":1784833654,\\\"currency\\\":\\\"usd\\\",\\\"customer\\\":null,\\\"customer_account\\\":null,\\\"description\\\":null,\\\"excluded_payment_method_types\\\":null,\\\"invoice\\\":null,\\\"last_payment_error\\\":null,\\\"latest_charge\\\":\\\"ch_3TwRxyRpT4YVvGC71Mq8pTth\\\",\\\"livemode\\\":false,\\\"managed_payments\\\":{\\\"enabled\\\":false},\\\"metadata\\\":{\\\"packageType\\\":\\\"credit\\\",\\\"packageUid\\\":\\\"793256a5-655a-43f2-ac5c-59231e53b102\\\",\\\"userId\\\":\\\"28\\\"},\\\"next_action\\\":null,\\\"on_behalf_of\\\":null,\\\"payment_details\\\":{\\\"customer_reference\\\":null,\\\"order_reference\\\":\\\"cs_test_a1XBtMi1vW0F6xK5ROIwLhHFYuabADfHiMLaVADiUOxcxDIqDcGtVMnjA6\\\"},\\\"payment_method\\\":\\\"pm_1TwRxxRpT4YVvGC71WxDP6jd\\\",\\\"payment_method_configuration_details\\\":null,\\\"payment_method_options\\\":{\\\"card\\\":{\\\"installments\\\":null,\\\"mandate_options\\\":null,\\\"network\\\":null,\\\"request_three_d_secure\\\":\\\"automatic\\\"}},\\\"payment_method_types\\\":[\\\"card\\\"],\\\"presentment_details\\\":{\\\"presentment_amount\\\":173083,\\\"presentment_currency\\\":\\\"pkr\\\"},\\\"processing\\\":null,\\\"receipt_email\\\":null,\\\"review\\\":null,\\\"setup_future_usage\\\":null,\\\"shared_payment_granted_token\\\":null,\\\"shipping\\\":null,\\\"source\\\":null,\\\"statement_descriptor\\\":null,\\\"statement_descriptor_suffix\\\":null,\\\"status\\\":\\\"succeeded\\\",\\\"transfer_data\\\":null,\\\"transfer_group\\\":null}\",\"packageName\":\"Wandr Plus\",\"packageUid\":\"793256a5-655a-43f2-ac5c-59231e53b102\"}', 28, 'Stripe', 'USD', 1, 'pi_3TwRxyRpT4YVvGC71DRFYOXB');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT 'Gift or Sticker',
  `title` varchar(150) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `normal_price` decimal(13,4) DEFAULT NULL,
  `premium_price` varchar(45) DEFAULT NULL,
  `user_authorities__id` int(10) UNSIGNED DEFAULT NULL,
  `premium_only` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `type`, `title`, `file_name`, `normal_price`, `premium_price`, `user_authorities__id`, `premium_only`) VALUES
(1, '81bfd14a-257c-4638-bb04-e68c56a4d93c', '2026-05-26 17:55:38', '2026-05-26 17:55:38', 1, 1, 'test gift', 'admin.jpg', 100.0000, '100', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like_dislikes`
--

CREATE TABLE `like_dislikes` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `to_users__id` int(10) UNSIGNED NOT NULL,
  `by_users__id` int(10) UNSIGNED NOT NULL,
  `like` tinyint(3) UNSIGNED NOT NULL COMMENT '0 for dislike, 1 for like',
  `why` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `like_dislikes`
--

INSERT INTO `like_dislikes` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `to_users__id`, `by_users__id`, `like`, `why`) VALUES
(9, '81906711-379e-4e69-9059-0f1e0b7d633a', '2026-07-22 15:40:20', '2026-07-22 15:40:20', 1, 22, 1, 1, NULL),
(10, '9de9701d-f6bc-4e9e-8c6a-ea20adbe0045', '2026-07-22 15:40:27', '2026-07-22 15:40:27', 1, 23, 1, 1, NULL),
(11, '972df371-37fe-4f36-acf3-a598945c4c84', '2026-07-22 15:40:31', '2026-07-22 15:40:31', 1, 21, 1, 1, NULL),
(12, '42aef9bb-86e3-419d-bf70-46fd6e3f297b', '2026-07-22 15:40:34', '2026-07-22 15:40:34', 1, 9, 1, 1, NULL),
(13, 'ff984d08-44dc-4b39-8929-da931780b916', '2026-07-22 15:40:37', '2026-07-22 15:40:37', 1, 13, 1, 1, NULL),
(14, 'c7fc9a56-fb57-42b3-bc2e-8bb7f929b17f', '2026-07-22 15:40:40', '2026-07-22 15:40:40', 1, 12, 1, 1, NULL),
(15, '74c6656d-eac0-4bf0-81cd-62fd7186f74d', '2026-07-22 15:40:43', '2026-07-22 15:40:43', 1, 11, 1, 1, NULL),
(16, '1d8a8eb5-1f43-4a5b-a877-9943d7e60847', '2026-07-22 15:40:47', '2026-07-22 15:40:47', 1, 10, 1, 1, NULL),
(17, '96f26aaf-2590-4e28-a140-2e86825c8776', '2026-07-22 15:40:51', '2026-07-22 15:40:51', 1, 4, 1, 1, NULL),
(18, 'bb6d6f0e-f43c-4b52-bf21-6662f608c420', '2026-07-22 15:40:55', '2026-07-22 15:40:55', 1, 3, 1, 1, NULL),
(19, '39a8e10f-7d6c-46b7-bcdb-0b76a02b2224', '2026-07-22 15:40:58', '2026-07-22 15:40:58', 1, 2, 1, 0, NULL),
(20, 'ac088b88-98a2-46e1-a7f6-2352524516c0', '2026-07-22 15:43:45', '2026-07-22 15:43:45', 1, 24, 1, 0, NULL),
(21, 'f4be1ae7-f2fb-4754-9924-ee7fe15c2b04', '2026-07-22 15:43:47', '2026-07-22 15:43:47', 1, 25, 1, 0, NULL),
(22, '8d7ce975-9df9-40d5-836e-89ffeaa1591e', '2026-07-22 15:43:49', '2026-07-22 15:43:49', 1, 15, 1, 1, NULL),
(23, '39dbfed6-936c-41d8-8572-642787b567f8', '2026-07-22 15:43:53', '2026-07-22 15:43:53', 1, 19, 1, 1, NULL),
(24, '94d555a6-4b11-4ed2-a5b2-73e9488bd926', '2026-07-22 15:43:56', '2026-07-22 15:43:56', 1, 20, 1, 1, NULL),
(39, '8cedd07a-85fd-4cbe-a495-9f3cb8353753', '2026-07-22 15:49:03', '2026-07-22 15:49:03', 1, 2, 20, 1, NULL),
(43, 'de0c4880-d7de-451e-a5db-9d67a0ecb671', '2026-07-22 16:16:20', '2026-07-22 16:16:20', 1, 19, 20, 1, NULL),
(45, '25975ae8-4f9f-42d4-a8b0-5f8bee8a0789', '2026-07-22 16:20:44', '2026-07-22 16:20:44', 1, 23, 20, 1, NULL),
(46, 'd5e4c961-9c18-4880-a3bd-fcf09d7ba1f5', '2026-07-22 16:24:53', '2026-07-22 16:24:53', 1, 21, 20, 1, NULL),
(47, '3adf39dc-d139-4eb6-a4f5-0b932fad2917', '2026-07-22 16:27:59', '2026-07-22 16:27:59', 1, 9, 20, 0, NULL),
(48, '9a5e1075-5d64-48d0-8a75-da221d92fe69', '2026-07-22 16:35:53', '2026-07-22 16:35:53', 1, 13, 20, 1, NULL),
(49, '6c762676-a3b4-4fa5-8844-c8e0e6db24f6', '2026-07-22 16:35:59', '2026-07-22 16:35:59', 1, 12, 20, 0, NULL),
(50, 'ee103513-c298-47c9-b9d9-8b925142fe04', '2026-07-22 16:36:03', '2026-07-22 16:36:03', 1, 11, 20, 1, NULL),
(51, '07f557a3-3aba-443d-b273-3d5fa48c61fd', '2026-07-22 16:41:13', '2026-07-22 16:41:13', 1, 24, 20, 0, NULL),
(52, '2b4972e2-9c05-4f0e-aa84-2e2d74ac23c1', '2026-07-22 16:52:32', '2026-07-22 16:52:32', 1, 25, 20, 1, NULL),
(53, '73ec0488-c8ba-494c-98b3-838b4668d1b7', '2026-07-22 16:52:39', '2026-07-22 16:52:39', 1, 15, 20, 1, NULL),
(54, 'd7eecbee-3c91-4545-a24b-483d17b3f4c2', '2026-07-22 16:52:44', '2026-07-22 16:52:44', 1, 22, 20, 1, NULL),
(56, '8cc3c0b2-944e-4056-aa68-3dbdcdb53a86', '2026-07-22 16:55:58', '2026-07-22 16:55:58', 1, 25, 22, 0, NULL),
(57, '77f95a5a-ef45-413d-b871-753925464a25', '2026-07-22 16:56:01', '2026-07-22 16:56:01', 1, 15, 22, 0, NULL),
(58, '85cece90-c6b4-4bdd-ad28-bfa4b3729b0e', '2026-07-22 16:56:04', '2026-07-22 16:56:04', 1, 19, 22, 0, NULL),
(59, '7074e934-1c37-4aac-a876-3648c8cde01c', '2026-07-22 16:56:06', '2026-07-22 16:56:06', 1, 23, 22, 0, NULL),
(60, 'ecaa5c67-b78f-47cb-9e88-bc8577361ab1', '2026-07-22 16:56:16', '2026-07-22 16:56:16', 1, 21, 22, 0, NULL),
(61, 'faf35398-7837-4323-acd2-1743806d0126', '2026-07-22 16:56:18', '2026-07-22 16:56:18', 1, 9, 22, 0, NULL),
(62, '5d2594e6-b5fd-4db6-b670-ecf510b30626', '2026-07-22 16:56:19', '2026-07-22 16:56:19', 1, 13, 22, 0, NULL),
(63, '06576228-8602-4d28-bbb0-58a57fe93dbe', '2026-07-22 16:56:21', '2026-07-22 16:56:21', 1, 12, 22, 0, NULL),
(64, '508d5731-4cf6-4ef0-a917-ddb0622d1a15', '2026-07-22 16:56:22', '2026-07-22 16:56:22', 1, 11, 22, 0, NULL),
(65, '80100fe7-8106-41ed-8158-c33f4255d207', '2026-07-22 16:56:24', '2026-07-22 16:56:24', 1, 10, 22, 0, NULL),
(66, '7839ad79-09ec-48b9-aa78-38912b4b723a', '2026-07-22 16:56:26', '2026-07-22 16:56:26', 1, 4, 22, 0, NULL),
(67, '85a00922-6ff4-4b41-9cd6-ff260c78cb7b', '2026-07-22 16:56:28', '2026-07-22 16:56:28', 1, 3, 22, 0, NULL),
(68, '428d4a51-4c4d-4be9-9b79-dd25906cc951', '2026-07-22 16:56:29', '2026-07-22 16:56:29', 1, 2, 22, 0, NULL),
(69, '5aafb99c-68b2-40c9-a5b2-822faae7cd2a', '2026-07-23 17:46:37', '2026-07-23 17:46:37', 1, 10, 20, 1, 'super_like'),
(70, '74dd8c5e-e989-4bd5-b935-ea97f29fcc54', '2026-07-23 17:59:41', '2026-07-23 17:59:41', 1, 24, 22, 1, 'super_like'),
(71, '968bfa2f-a43f-4b7d-8caa-9fd7d46b25b7', '2026-07-23 17:59:49', '2026-07-23 17:59:49', 1, 20, 22, 1, 'super_like'),
(72, '98bc606b-cdf0-418f-9577-bac0e3999b74', '2026-07-23 19:42:41', '2026-07-23 19:42:41', 1, 28, 20, 1, 'super_like'),
(73, '1ed9f67b-1135-4d84-8686-2506e1e5842e', '2026-07-23 19:44:42', '2026-07-23 19:44:42', 1, 27, 20, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `attempts` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`_id`, `created_at`, `updated_at`, `email`, `role`, `user_id`, `ip_address`) VALUES
(1, '2026-05-20 22:05:03', '2026-07-23 22:09:48', 'firstadmin@domain.com', 0, 1, '127.0.0.1'),
(2, '2026-05-26 17:24:10', '2026-05-26 17:29:18', 'admin@gmail.com', 0, 2, '127.0.0.1'),
(3, '2026-05-26 19:19:43', '2026-05-29 22:15:13', 'dev@yopmail.com', 0, 15, '127.0.0.1'),
(4, '2026-05-29 22:33:47', '2026-05-29 22:33:49', 'devdev3@yopmail.com', 0, 19, '127.0.0.1'),
(5, '2026-05-29 22:46:24', '2026-07-23 18:00:21', 'dev6@yopmail.com', 0, 22, '127.0.0.1'),
(6, '2026-06-01 16:45:57', '2026-07-23 19:42:34', 'dev4@yopmail.com', 0, 20, '127.0.0.1'),
(7, '2026-06-24 15:19:39', '2026-07-16 17:35:02', 'devtest@yopmail.com', 0, 23, '127.0.0.1'),
(8, '2026-06-24 22:24:21', '2026-06-24 23:06:35', 'markblack@yopmail.com', 0, 25, '127.0.0.1'),
(9, '2026-06-24 22:25:46', '2026-06-24 23:07:33', 'johnwhite@yopmail.com', 0, 24, '127.0.0.1'),
(10, '2026-07-23 18:12:15', '2026-07-23 18:27:15', 'dev10@yopmail.com', 0, 26, '127.0.0.1'),
(11, '2026-07-23 18:28:46', '2026-07-23 18:40:24', 'dev11@yopmail.com', 0, 27, '127.0.0.1'),
(12, '2026-07-23 18:42:33', '2026-07-23 19:29:35', 'dev12@yopmail.com', 0, 28, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `message` varchar(500) NOT NULL,
  `action` varchar(255) NOT NULL,
  `is_read` tinyint(3) UNSIGNED DEFAULT 0,
  `users__id` int(10) UNSIGNED NOT NULL,
  `from_users__id` int(10) UNSIGNED DEFAULT NULL,
  `type` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `message`, `action`, `is_read`, `users__id`, `from_users__id`, `type`) VALUES
(1, '0e2d113e-8f86-4063-aad4-a552f253584d', '2026-05-29 18:03:27', '2026-05-29 18:03:27', 1, 'Profile visited by loveria Admin', 'http://localhost:8000/@admin', 1, 15, 1, 1),
(2, 'f65f0458-389d-4537-a690-acec36a8d635', '2026-05-29 19:06:03', '2026-05-29 19:06:03', 1, 'Profile visited by dev dev', 'http://localhost:8000/@dev22', NULL, 9, 15, 1),
(3, 'e75bf1ee-2046-4513-9188-5fbfd20c13ae', '2026-05-29 19:09:44', '2026-05-29 19:09:44', 1, 'Profile liked by dev dev', 'http://localhost:8000/@dev22', NULL, 9, 15, 2),
(4, '8f4f9937-b168-4759-9e16-ed474009e48b', '2026-06-15 15:38:50', '2026-06-15 15:38:50', 1, 'Profile visited by dev6 dev6', 'http://localhost:8000/@devdev6', 1, 20, 22, 1),
(5, 'e38057f1-154b-444e-86d7-4f3221f4be34', '2026-06-15 15:42:57', '2026-06-15 15:42:57', 1, 'Profile liked by dev6 dev6', 'http://localhost:8000/@devdev6', 1, 20, 22, 2),
(6, 'bf5ad9c8-6c22-4c06-aca4-b383f0f9a69b', '2026-06-15 15:44:21', '2026-06-15 15:44:21', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', 1, 22, 20, 1),
(7, '4201d97c-3c17-46f8-94e3-1e37e9e96b1f', '2026-06-24 16:44:55', '2026-06-24 16:44:55', 1, 'Message request received from  loveria Admin', 'http://localhost:8000/@admin', NULL, 15, 1, 3),
(8, 'eb429d70-0f64-4dac-b2dd-a30aa0357d7a', '2026-06-24 18:11:28', '2026-06-24 18:11:28', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', 1, 23, 20, 1),
(9, 'a83a4e46-84d3-481a-94e8-6a3ce113e62a', '2026-06-24 18:15:18', '2026-06-24 18:15:18', 1, 'Message request received from  dev4 dev4', 'http://localhost:8000/@devdev4', 1, 23, 20, 3),
(10, 'e1a471c6-548f-4311-a168-a8a7a0e507ef', '2026-06-24 18:17:34', '2026-06-24 18:17:34', 1, 'Profile visited by devtest test', 'http://localhost:8000/@devtest', 1, 20, 23, 1),
(11, '968cea87-60ff-4c0b-9e8c-c273bfcd208c', '2026-06-24 18:17:46', '2026-06-24 18:17:46', 1, 'Message request accepetd by  devtest test', 'http://localhost:8000/@devtest', 1, 20, 23, 5),
(12, '8191c4fd-e0c5-4a3b-81c2-2d60a67c021e', '2026-06-24 18:30:38', '2026-06-24 18:30:38', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 21, 20, 1),
(13, 'ccb97a28-e3b5-4ed4-8743-c531f31c94bd', '2026-06-24 18:31:00', '2026-06-24 18:31:00', 1, 'Message request received from  dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 21, 20, 3),
(14, '38b0bfff-6648-4fd4-8a14-90fc6e46b092', '2026-06-24 22:31:46', '2026-06-24 22:31:46', 1, 'Profile visited by markblack black', 'http://localhost:8000/@markblack', 1, 24, 25, 1),
(15, '8f5191c1-3486-4461-a936-e7d0b70d9af6', '2026-06-24 22:51:10', '2026-06-24 22:51:10', 1, 'Message request received from  markblack black', 'http://localhost:8000/@markblack', 1, 24, 25, 3),
(16, '78eee653-f68d-4607-8443-66321ec67029', '2026-06-24 22:51:25', '2026-06-24 22:51:25', 1, 'Message request accepetd by  johnwhite white', 'http://localhost:8000/@johnwhite', 1, 25, 24, 5),
(17, '7ffb458c-7c65-4f8a-8532-98af323f2c26', '2026-06-24 23:01:41', '2026-06-24 23:01:41', 1, 'Profile visited by johnwhite white', 'http://localhost:8000/@johnwhite', NULL, 25, 24, 1),
(18, '89d7a70d-a72d-4312-b40b-477b6e3d2438', '2026-06-24 23:04:22', '2026-06-24 23:04:22', 1, 'Profile visited by johnwhite white', 'http://localhost:8000/@johnwhite', NULL, 15, 24, 1),
(19, '8cb9b569-3f40-4fba-959d-f9a35dd0dde7', '2026-06-24 23:05:33', '2026-06-24 23:05:33', 1, 'Profile visited by johnwhite white', 'http://localhost:8000/@johnwhite', NULL, 19, 24, 1),
(20, 'b95590d3-c535-4fc8-9cd0-c5cb17a0b4c9', '2026-06-26 15:34:23', '2026-06-26 15:34:23', 1, 'Profile liked by dev6 dev6', 'http://localhost:8000/@devdev6', 1, 20, 22, 2),
(21, 'e1beb7b3-7089-40e1-b2d3-44c311cf8074', '2026-06-26 15:34:33', '2026-06-26 15:34:33', 1, 'Profile liked by dev6 dev6', 'http://localhost:8000/@devdev6', 1, 20, 22, 2),
(22, '1f265355-02a7-4fb8-bd32-c8a0de352e83', '2026-06-29 16:32:18', '2026-06-29 16:32:18', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 24, 20, 1),
(23, 'c8cfdc39-136f-495b-b7d5-d9084f5a2178', '2026-06-29 16:32:39', '2026-06-29 16:32:39', 1, 'Message request received from  dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 24, 20, 3),
(24, '1cecd9c3-6724-44a8-b30b-101ad1fa06bf', '2026-07-16 16:48:17', '2026-07-16 16:48:17', 1, 'Profile visited by devtest test', 'http://localhost:8000/@devtest', NULL, 21, 23, 1),
(25, 'e8d409ba-a42a-4278-a32e-d824d59750bf', '2026-07-22 15:39:01', '2026-07-22 15:39:01', 1, 'Profile visited by loveria Admin', 'http://localhost:8000/@admin', NULL, 24, 1, 1),
(26, '23bebad6-bc4a-44bd-b49f-5842f608c455', '2026-07-22 15:40:08', '2026-07-22 15:40:08', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 15, 1, 2),
(27, '510f8038-aba9-44e9-a9a5-24735246020b', '2026-07-22 15:40:20', '2026-07-22 15:40:20', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', 1, 22, 1, 2),
(28, '88070799-8655-4c28-8d97-acce13a7fd40', '2026-07-22 15:40:27', '2026-07-22 15:40:27', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 23, 1, 2),
(29, '276e50d7-1060-428d-a7a2-1843cb75d098', '2026-07-22 15:40:31', '2026-07-22 15:40:31', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 21, 1, 2),
(30, 'beb95570-3146-47b5-af5f-f29dc470b4cc', '2026-07-22 15:40:34', '2026-07-22 15:40:34', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 9, 1, 2),
(31, 'fdb8b5cb-8b1e-4295-a811-a48c7dff4614', '2026-07-22 15:40:37', '2026-07-22 15:40:37', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 13, 1, 2),
(32, '0afb0d43-5b4f-4199-a7fb-58916cef4239', '2026-07-22 15:40:40', '2026-07-22 15:40:40', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 12, 1, 2),
(33, '077d5396-9860-41e7-9ecb-b09aa5fc13bd', '2026-07-22 15:40:43', '2026-07-22 15:40:43', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 11, 1, 2),
(34, '345d1ceb-db4f-40c2-9739-e7b6ea87817c', '2026-07-22 15:40:47', '2026-07-22 15:40:47', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 10, 1, 2),
(35, '5d6c2d58-44b9-473b-bdef-bb9be92f2704', '2026-07-22 15:40:51', '2026-07-22 15:40:51', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 4, 1, 2),
(36, '26a22f2d-5fd7-44d8-9597-b0dd7d58ce49', '2026-07-22 15:40:55', '2026-07-22 15:40:55', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 3, 1, 2),
(37, 'cce43315-8e60-40b1-9785-18226ffbd98b', '2026-07-22 15:42:39', '2026-07-22 15:42:39', 1, 'Profile visited by loveria Admin', 'http://localhost:8000/@admin', NULL, 25, 1, 1),
(38, '482cd2b2-123a-4fd3-ad45-1aadf40be807', '2026-07-22 15:42:52', '2026-07-22 15:42:52', 1, 'Profile visited by loveria Admin', 'http://localhost:8000/@admin', NULL, 19, 1, 1),
(39, '274c02f4-af82-4786-a31b-5547df3a09a2', '2026-07-22 15:43:08', '2026-07-22 15:43:08', 1, 'Profile visited by loveria Admin', 'http://localhost:8000/@admin', 1, 20, 1, 1),
(40, '47a38b01-83dd-4589-a671-dad74999f6a4', '2026-07-22 15:43:19', '2026-07-22 15:43:19', 1, 'Profile visited by loveria Admin', 'http://localhost:8000/@admin', NULL, 2, 1, 1),
(41, '0c008053-645d-4079-b62c-01352aa38726', '2026-07-22 15:43:50', '2026-07-22 15:43:50', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 15, 1, 2),
(42, '8a701b60-5b74-4d0e-a649-e6cf52f83622', '2026-07-22 15:43:53', '2026-07-22 15:43:53', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', NULL, 19, 1, 2),
(43, 'eebdb2ff-6cca-4151-b37c-a6c1b2fc6fd5', '2026-07-22 15:43:56', '2026-07-22 15:43:56', 1, 'Profile liked by loveria Admin', 'http://localhost:8000/@admin', 1, 20, 1, 2),
(44, '0ab6c4ba-5f66-48f7-bcb9-e7c407a9d68e', '2026-07-22 15:48:18', '2026-07-22 15:48:18', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 24, 20, 2),
(45, '30e9f5e7-720a-4799-9149-eef4ff911f36', '2026-07-22 15:48:20', '2026-07-22 15:48:20', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 25, 20, 2),
(46, 'b0a19ef0-443e-4e49-a5cd-249a2fbe0fb2', '2026-07-22 15:48:30', '2026-07-22 15:48:30', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 15, 20, 2),
(47, 'b505ea04-d880-421f-8015-b24ed07c6153', '2026-07-22 15:48:33', '2026-07-22 15:48:33', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 19, 20, 2),
(48, '800bc3ee-2039-45b9-9969-a0b24e72ed44', '2026-07-22 15:48:35', '2026-07-22 15:48:35', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', 1, 22, 20, 2),
(49, 'f23fdcdb-f963-4ad1-9c55-12b5b7ba1216', '2026-07-22 15:48:40', '2026-07-22 15:48:40', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 23, 20, 2),
(50, '67127c47-6c49-4f00-a56f-36a68f788721', '2026-07-22 15:48:44', '2026-07-22 15:48:44', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 21, 20, 2),
(51, '759e4004-7d88-476c-a6ac-6a2725f27630', '2026-07-22 15:48:46', '2026-07-22 15:48:46', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 9, 20, 2),
(52, '8f6ab831-9992-486e-b77d-95ccccff2778', '2026-07-22 15:48:48', '2026-07-22 15:48:48', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 13, 20, 2),
(53, '0d9357fd-c267-4eb1-8f9f-7d72d612a34e', '2026-07-22 15:48:51', '2026-07-22 15:48:51', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 12, 20, 2),
(54, 'eabb062b-97df-43e3-a6dc-24879caba07a', '2026-07-22 15:48:53', '2026-07-22 15:48:53', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 11, 20, 2),
(55, '8ae297c0-062d-47c6-9d6c-f1bf397d9530', '2026-07-22 15:48:55', '2026-07-22 15:48:55', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 10, 20, 2),
(56, 'f936dcf0-0d78-4b9e-9f2b-f142ae845716', '2026-07-22 15:48:58', '2026-07-22 15:48:58', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 4, 20, 2),
(57, 'b8967a34-1a8a-4526-aa14-4c5dfca75748', '2026-07-22 15:49:00', '2026-07-22 15:49:00', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 3, 20, 2),
(58, '2636bad7-3fd6-4961-9de9-46ce35a31bcd', '2026-07-22 15:49:03', '2026-07-22 15:49:03', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 2, 20, 2),
(59, '63a295dc-4276-451c-a6e0-ef0d502c66e1', '2026-07-22 15:52:16', '2026-07-22 15:52:16', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 25, 20, 1),
(60, '301d87cf-3c2d-45ee-bbfb-ed13d8a7b57c', '2026-07-22 15:52:26', '2026-07-22 15:52:26', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 15, 20, 1),
(61, '5ba1d747-c749-4078-90cb-192e3166a434', '2026-07-22 15:52:39', '2026-07-22 15:52:39', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 19, 20, 1),
(62, '89ea61a2-ed07-4259-8ff6-275e078d7dbb', '2026-07-22 15:55:44', '2026-07-22 15:55:44', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 24, 20, 2),
(63, '6391b892-31b9-45c7-bedc-e410158fd940', '2026-07-22 15:55:47', '2026-07-22 15:55:47', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 25, 20, 2),
(64, '2bf639f8-3a99-4c55-8883-08702f5cdb54', '2026-07-22 15:55:51', '2026-07-22 15:55:51', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 15, 20, 2),
(65, '61a00c29-db32-40fa-ab91-d662ebcd03b0', '2026-07-22 16:16:20', '2026-07-22 16:16:20', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 19, 20, 2),
(66, '9ff70b10-1d0c-457c-b5cc-9ce4dbaa73ff', '2026-07-22 16:16:50', '2026-07-22 16:16:50', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', 1, 22, 20, 2),
(67, '26658e0f-da83-4d2d-b589-40fedb747594', '2026-07-22 16:20:44', '2026-07-22 16:20:44', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 23, 20, 2),
(68, 'c35a71e9-34bd-480e-af84-967e4093808a', '2026-07-22 16:24:53', '2026-07-22 16:24:53', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 21, 20, 2),
(69, 'eb5acf65-fe9d-4345-b702-c2b09b207c4c', '2026-07-22 16:27:35', '2026-07-22 16:27:35', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 9, 20, 1),
(70, 'fd82e820-cf53-42a1-b7c2-5392b1f5b64f', '2026-07-22 16:27:47', '2026-07-22 16:27:47', 1, 'Message request received from  dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 9, 20, 3),
(71, '24cfcbe7-c383-4d2c-8ea9-4e19a6edde75', '2026-07-22 16:32:50', '2026-07-22 16:32:50', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 13, 20, 1),
(72, '7f0f5eac-6725-4cb0-b713-0e95b0586fe7', '2026-07-22 16:33:31', '2026-07-22 16:33:31', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 12, 20, 1),
(73, '7c20fd73-9aa0-410b-bb89-07134e51500f', '2026-07-22 16:35:40', '2026-07-22 16:35:40', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 11, 20, 1),
(74, 'a242c39f-f721-4237-9a08-f82e17a80d3a', '2026-07-22 16:35:53', '2026-07-22 16:35:53', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 13, 20, 2),
(75, 'dd4b08d6-3cd7-468b-b5bd-4a21a29096ab', '2026-07-22 16:36:03', '2026-07-22 16:36:03', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 11, 20, 2),
(76, '18b946a4-2e84-4fe1-8cc8-c24a0e33c0c6', '2026-07-22 16:39:55', '2026-07-22 16:39:55', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 10, 20, 1),
(77, 'e33fc918-e5a9-47dc-9d57-0f72695fcfe8', '2026-07-22 16:40:06', '2026-07-22 16:40:06', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 4, 20, 1),
(78, '19dddb00-f08d-4af6-83f5-3765b815b685', '2026-07-22 16:40:16', '2026-07-22 16:40:16', 1, 'Profile visited by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 3, 20, 1),
(79, '1a7d292f-c159-4e13-80ef-1ed1b65291b9', '2026-07-22 16:52:32', '2026-07-22 16:52:32', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 25, 20, 2),
(80, '99073ba2-b424-4c1f-a506-51654d48f7c9', '2026-07-22 16:52:40', '2026-07-22 16:52:40', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 15, 20, 2),
(81, '97eb8166-ff1f-4be0-a4c2-d93cffd7f97b', '2026-07-22 16:52:44', '2026-07-22 16:52:44', 1, 'Profile liked by dev4 dev4', 'http://localhost:8000/@devdev4', 1, 22, 20, 2),
(82, 'b8f2fde7-c008-4a13-a717-58cab9ba8804', '2026-07-22 16:55:54', '2026-07-22 16:55:54', 1, 'Profile liked by dev6 dev6', 'http://localhost:8000/@devdev6', NULL, 24, 22, 2),
(83, '921dd289-ddbf-46c4-8528-5b3fe2009af9', '2026-07-22 16:56:53', '2026-07-22 16:56:53', 1, 'Message request received from  dev6 dev6', 'http://localhost:8000/@devdev6', 1, 20, 22, 3),
(84, 'b38a233b-d402-4a4c-89a2-48af7b031dc9', '2026-07-22 16:57:02', '2026-07-22 16:57:02', 1, 'Message request accepetd by  dev4 dev4', 'http://localhost:8000/@devdev4', 1, 22, 20, 5),
(85, '88f19acc-0423-479f-888b-a9111e9bb37e', '2026-07-22 16:59:35', '2026-07-22 16:59:35', 1, 'Gift send by dev4 dev4', 'http://localhost:8000/@devdev4', NULL, 11, 20, 4),
(86, '93c6312e-f6b8-4187-8d4b-7aca1d2231d5', '2026-07-23 17:46:37', '2026-07-23 17:46:37', 1, 'Super Liked by dev4 dev4', 'http://localhost:9000/@devdev4', NULL, 10, 20, 6),
(87, '7d08a96e-7eb7-457a-aead-9482db92a940', '2026-07-23 17:56:04', '2026-07-23 17:56:04', 1, 'Profile visited by dev6 dev6', 'http://localhost:9000/@devdev6', NULL, 24, 22, 1),
(88, '35ff6fc4-21a4-4f96-bbb1-069538d686cf', '2026-07-23 17:59:41', '2026-07-23 17:59:41', 1, 'Super Liked by dev6 dev6', 'http://localhost:9000/@devdev6', NULL, 24, 22, 6),
(89, 'f621ed27-786d-4f54-9d89-6ac0843d59af', '2026-07-23 17:59:49', '2026-07-23 17:59:49', 1, 'Super Liked by dev6 dev6', 'http://localhost:9000/@devdev6', 1, 20, 22, 6),
(90, 'eea4a7ee-c62e-41cb-b2fa-8f5a556e82d2', '2026-07-23 19:03:46', '2026-07-23 19:03:46', 1, 'Message request accepetd by  loveria Admin', 'http://localhost:9000/@admin', 1, 20, 9, 5),
(91, 'a539716c-d1d8-4af5-b5e3-3e2409ed1f3b', '2026-07-23 19:42:41', '2026-07-23 19:42:41', 1, 'Super Liked by dev4 dev4', 'http://localhost:9000/@devdev4', NULL, 28, 20, 6),
(92, '31e20037-c1c4-4801-b832-c6c6b6fe47c1', '2026-07-23 19:54:42', '2026-07-23 19:54:42', 1, 'Profile visited by dev4 dev4', 'http://localhost:9000/@devdev4', NULL, 1, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `show_in_menu` tinyint(3) UNSIGNED DEFAULT NULL,
  `content` text DEFAULT NULL,
  `type` tinyint(3) UNSIGNED DEFAULT NULL,
  `users__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_boosts`
--

CREATE TABLE `profile_boosts` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `for_users__id` int(10) UNSIGNED NOT NULL,
  `expiry_at` datetime NOT NULL,
  `credit_wallet_transactions__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_boosts`
--

INSERT INTO `profile_boosts` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `for_users__id`, `expiry_at`, `credit_wallet_transactions__id`) VALUES
(1, '53981283-91a2-41ec-b9d4-b6b52e1497b6', '2026-05-29 22:55:26', '2026-05-29 22:55:26', 1, 22, '2026-05-29 23:00:26', 1),
(2, 'efb7159f-c38b-4fc3-9291-f433973b2502', '2026-05-29 22:55:44', '2026-05-29 22:55:44', 1, 22, '2026-05-29 23:05:26', 2),
(3, '4e41bcd0-897e-4a1b-ae27-486c9dabc5d8', '2026-07-23 19:29:29', '2026-07-23 19:29:29', 1, 28, '2026-07-23 19:34:29', 13);

-- --------------------------------------------------------

--
-- Table structure for table `profile_visitors`
--

CREATE TABLE `profile_visitors` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `to_users__id` int(10) UNSIGNED NOT NULL,
  `by_users__id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_visitors`
--

INSERT INTO `profile_visitors` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `to_users__id`, `by_users__id`) VALUES
(1, '8e7a6e9c-7891-487b-92b8-38cdca6b3f7c', '2026-05-29 18:03:27', '2026-05-29 18:03:27', 1, 15, 1),
(2, '1dbcfc1a-3061-463c-955a-83dc681d33c5', '2026-05-29 19:06:02', '2026-05-29 19:06:02', 1, 9, 15),
(3, '0f7238ba-b60a-4947-8e8e-bbea5b13e227', '2026-06-15 15:38:49', '2026-06-15 15:38:49', 1, 20, 22),
(4, '907fd770-9fe5-42b4-81d4-1e5bb3ea5070', '2026-06-15 15:44:21', '2026-06-15 15:44:21', 1, 22, 20),
(5, '96542c8e-1186-480c-82a3-21f267ec0e96', '2026-06-24 18:11:28', '2026-06-24 18:11:28', 1, 23, 20),
(6, '08fcd0cb-e27e-44e2-8685-42863973a34f', '2026-06-24 18:17:34', '2026-06-24 18:17:34', 1, 20, 23),
(7, '95007602-1c38-47f8-8132-5c63e7714a2b', '2026-06-24 18:30:38', '2026-06-24 18:30:38', 1, 21, 20),
(8, 'fbd7cbaf-36ff-4315-9b22-ea579c837472', '2026-06-24 22:31:46', '2026-06-24 22:31:46', 1, 24, 25),
(9, '69fbb938-2b1a-446c-a485-f31dc5e9404d', '2026-06-24 23:01:40', '2026-06-24 23:01:40', 1, 25, 24),
(10, 'caf6b314-0753-422d-a15b-5b1441595a51', '2026-06-24 23:04:22', '2026-06-24 23:04:22', 1, 15, 24),
(11, '4a31e131-d8f6-4e2e-9190-6e7ece4bcfe6', '2026-06-24 23:05:32', '2026-06-24 23:05:32', 1, 19, 24),
(12, 'c2d611e0-f276-48dd-a5f2-861b70383bd8', '2026-06-29 16:32:18', '2026-06-29 16:32:18', 1, 24, 20),
(13, '2c90b6f3-0b48-4094-b6d0-f5b29be59c43', '2026-07-16 16:48:17', '2026-07-16 16:48:17', 1, 21, 23),
(14, 'b7c5e763-770b-428f-99b4-8783b4c0fdbf', '2026-07-22 15:39:01', '2026-07-22 15:39:01', 1, 24, 1),
(15, 'fb7e017d-eccc-449a-9a6d-e0357a69ec32', '2026-07-22 15:42:39', '2026-07-22 15:42:39', 1, 25, 1),
(16, '592d4fc0-2889-4d4e-88bf-d8cb26d3b141', '2026-07-22 15:42:52', '2026-07-22 15:42:52', 1, 19, 1),
(17, 'dc772bbe-70ab-4e5a-8b17-726bf641b4fd', '2026-07-22 15:43:08', '2026-07-22 15:43:08', 1, 20, 1),
(18, '0ccde55a-7692-4ed0-abe5-319744ed61c8', '2026-07-22 15:43:19', '2026-07-22 15:43:19', 1, 2, 1),
(19, 'c7ed26bd-93e2-4a91-b3f6-34b44d8f27cd', '2026-07-22 15:52:16', '2026-07-22 15:52:16', 1, 25, 20),
(20, '6c2c424e-8c9a-420d-8d3a-d9b03b35347e', '2026-07-22 15:52:26', '2026-07-22 15:52:26', 1, 15, 20),
(21, '186ca435-e029-4f57-8968-bf9e8ed1d795', '2026-07-22 15:52:39', '2026-07-22 15:52:39', 1, 19, 20),
(22, 'b396894d-53d0-427b-8b7a-23b68aed20b4', '2026-07-22 16:27:35', '2026-07-22 16:27:35', 1, 9, 20),
(23, '3ef0a05f-9df8-4ac8-8ea5-ff671a272559', '2026-07-22 16:32:50', '2026-07-22 16:32:50', 1, 13, 20),
(24, '28c38038-5e65-4e53-8af4-6d86fb84ba5b', '2026-07-22 16:33:31', '2026-07-22 16:33:31', 1, 12, 20),
(25, '603c1af3-b15e-494d-b26a-0841860036d0', '2026-07-22 16:35:40', '2026-07-22 16:35:40', 1, 11, 20),
(26, '290d501f-fa73-4db2-a5a6-53acaef30868', '2026-07-22 16:39:54', '2026-07-22 16:39:54', 1, 10, 20),
(27, '5fe2fd0d-2b6e-49e2-97c4-cefa92c5c6c1', '2026-07-22 16:40:06', '2026-07-22 16:40:06', 1, 4, 20),
(28, '7c3d57c1-986f-4623-b066-a1d396aeb3f2', '2026-07-22 16:40:16', '2026-07-22 16:40:16', 1, 3, 20),
(29, '9333d26a-abae-49e2-8357-41db28358239', '2026-07-23 17:56:04', '2026-07-23 17:56:04', 1, 24, 22),
(30, '67ae58b4-3a6a-4846-92df-0930f724a51b', '2026-07-23 19:54:42', '2026-07-23 19:54:42', 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` varchar(45) DEFAULT NULL,
  `country_code` char(2) NOT NULL,
  `fips_code` varchar(45) DEFAULT NULL,
  `iso2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `super_like_packages`
--

CREATE TABLE `super_like_packages` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `total_likes` int(10) UNSIGNED NOT NULL,
  `price` decimal(13,4) NOT NULL DEFAULT 0.0000,
  `credit_price` int(10) UNSIGNED NOT NULL,
  `users__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_like_packages`
--

INSERT INTO `super_like_packages` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `title`, `description`, `total_likes`, `price`, `credit_price`, `users__id`) VALUES
(1, '2428b324-81d3-484b-95b4-769e45b8801c', '2026-07-23 17:39:50', '2026-07-23 17:55:20', 1, 'Premuim Likes', 'testing', 10, 99.9900, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_like_wallet_transactions`
--

CREATE TABLE `super_like_wallet_transactions` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `users__id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `super_like_packages__id` int(10) UNSIGNED DEFAULT NULL,
  `credit_wallet_transactions__id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_like_wallet_transactions`
--

INSERT INTO `super_like_wallet_transactions` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `users__id`, `quantity`, `super_like_packages__id`, `credit_wallet_transactions__id`, `description`) VALUES
(1, '15c7d30d-70f9-4840-a729-b580cc34dd43', '2026-07-23 17:40:56', '2026-07-23 17:40:56', 1, 20, 10, 1, 9, 'purchase:2428b324-81d3-484b-95b4-769e45b8801c'),
(2, '35bb9369-7fc2-4730-8475-299a9d4c5d1d', '2026-07-23 17:46:11', '2026-07-23 17:46:11', 1, 20, 10, 1, 10, 'purchase:2428b324-81d3-484b-95b4-769e45b8801c'),
(3, 'e40c9bb1-d95e-4fc0-be23-3304934820fc', '2026-07-23 17:46:37', '2026-07-23 17:46:37', 1, 20, -1, NULL, NULL, 'use:10'),
(4, '2fe0488e-15c7-461e-9e0e-00ee51c4bd8b', '2026-07-23 17:59:25', '2026-07-23 17:59:25', 1, 22, 10, 1, NULL, 'purchase_paid:2428b324-81d3-484b-95b4-769e45b8801c:ft:6'),
(5, '06b920b0-e25f-4e07-8e65-9bad5b08fb4d', '2026-07-23 17:59:41', '2026-07-23 17:59:41', 1, 22, -1, NULL, NULL, 'use:24'),
(6, 'e95b3f14-3cee-4364-ba6c-137f5132bbb1', '2026-07-23 17:59:48', '2026-07-23 17:59:48', 1, 22, -1, NULL, NULL, 'use:20'),
(7, 'b09e59ca-8294-4d16-9c3b-4d7d4232dddb', '2026-07-23 19:42:41', '2026-07-23 19:42:41', 1, 20, -1, NULL, NULL, 'use:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `timezone` varchar(45) DEFAULT NULL,
  `registered_via` varchar(15) DEFAULT NULL,
  `block_reason` varchar(255) DEFAULT NULL,
  `is_fake` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `_uid`, `created_at`, `updated_at`, `username`, `email`, `password`, `status`, `remember_token`, `first_name`, `last_name`, `designation`, `mobile_number`, `timezone`, `registered_via`, `block_reason`, `is_fake`) VALUES
(1, '50ee1967-7341-4c3a-b071-f2ea0722b179', '2026-04-15 18:12:09', '2026-05-26 19:30:20', 'admin', 'admin@gmail.com', '$2y$12$/fu5QVTI6zcky2DylfMYleS9DKz.DUiKZfGQRyuasUGluQuyo.CkS', 1, 'O4G7hgyto34OhcWQUYM9ULx3kSEMNTrFIsflasaiq0AgfeBWVBxGeK9Kwp', 'loveria', 'Admin', 'Admin', '9999999999', NULL, NULL, NULL, NULL),
(2, '6d884586-f754-48ad-a0cb-57519f30bd4b', '2026-05-26 17:24:07', '2026-05-26 17:24:07', 'admin2', 'admin@gmail.com', '$2y$12$kPqSBuKdgYEBnv4ECY6M9O6NHUVGfNlq/FA653cVt2B41PtZPkUeW', 1, 'moTKnzLEj3ieYyl4D5mZAdPEFrSfSK9Kc4VVHqAuRDKHmBCqun14dJB2dcyT', 'admin', 'admin', 'Admin', '091-5551234567', NULL, NULL, NULL, NULL),
(3, '8854af22-ad4c-425f-815e-882f77348338', '2026-05-26 17:47:00', '2026-05-26 17:47:00', 'lazywolf328', 'jisk.renes@example.com', '$2y$12$YaE3qg89pfxSGpPt7.B.runf7guw5/T8x5CDq/oH.gC.CzpIhJcWW', 1, NULL, 'Jisk', 'Renes', NULL, '(0533) 829689', 'Pacific Time (US & Canada)', NULL, NULL, 1),
(4, 'f941a17f-7654-4e4d-9657-c96f7610b172', '2026-05-26 17:49:13', '2026-05-26 17:49:13', 'sadladybug588', 'samarth.prajapati@example.com', '$2y$12$1K.O/tzHG4NAh0wITYj6ieBPgoQjkCVtEjE0s2AFjScmvq0lYsKNO', 1, NULL, 'Samarth', 'Prajapati', NULL, '9005229072', 'Bombay, Calcutta, Madras, New Delhi', NULL, NULL, 1),
(5, '6a371e6b-b343-43b8-9f39-f0c066eedc0e', '2026-05-26 17:49:51', '2026-05-26 17:49:51', 'lazygorilla873', 'valentina.lindas@example.com', '$2y$12$JMPoeFAnfevHL1ZcADaB5OBkG15HBAnchZXof35X9mX9rsEGfIp2a', 1, NULL, 'Valentina', 'Lindås', NULL, '59866907', 'Mountain Time (US & Canada)', NULL, NULL, 1),
(6, '35431168-f6f2-451e-972d-db6d65a9c069', '2026-05-26 17:50:51', '2026-05-26 17:50:51', 'organicsnake100', 'becky.howell@example.com', '$2y$12$QUsRRMKlQBf0GyUaXXeqNuolXOKOwkqQS/UBS.SmJROU1PaqF/u3i', 1, NULL, 'Becky', 'Howell', NULL, '(494) 437-3175', 'Hawaii', NULL, NULL, 1),
(7, '20558457-1971-41d0-8c8b-1e1a9f60c3dc', '2026-05-26 17:51:52', '2026-05-26 17:51:52', 'redostrich315', 'angel.caldwell@example.com', '$2y$12$fVWbICHOnMqL6Jg0cxoYxeV6hjZJtBteiLAOJKkienH.Hm11t1r5m', 1, NULL, 'Angel', 'Caldwell', NULL, '051-865-8278', 'Abu Dhabi, Muscat, Baku, Tbilisi', NULL, NULL, 1),
(8, '11049824-3f96-42b8-b172-3f0f0dc43685', '2026-05-26 17:52:52', '2026-05-26 17:52:52', 'greenduck867', 'victor.thompson@example.com', '$2y$12$wBMoTYs1E0D/6plgop154.V3U16yUsOajKT1HxP7EvGGl.PADpNVO', 1, NULL, 'Victor', 'Thompson', NULL, 'J80 G35-8232', 'Kaliningrad, South Africa', NULL, NULL, 1),
(9, '8266dc3e-4898-413e-b13b-b8c7a6be495d', '2026-05-26 17:53:52', '2026-05-26 17:53:52', 'heavykoala143', 'abhishek.chatterjee@example.com', '$2y$12$tDcOdwXfKY5RxjLU2QzKI.9FNIpfkPR4PpxqI80gsWb/hp2rCLrh6', 1, NULL, 'Abhishek', 'Chatterjee', NULL, '9888586244', 'Brussels, Copenhagen, Madrid, Paris', NULL, NULL, 1),
(10, '14d7162a-319f-417b-b32f-3ea0d5aec56a', '2026-05-26 17:54:53', '2026-05-26 17:54:53', 'organicleopard549', 'iina.takala@example.com', '$2y$12$wizWtmXiT5oy6oFEEn8fPOKMtrFBR3a0wGcV1yu.7QPRKMyxkn2AS', 1, NULL, 'Iina', 'Takala', NULL, '06-145-937', 'Tehran', NULL, NULL, 1),
(11, '199ee083-f321-4f9c-9076-1abd1cb07509', '2026-05-26 17:55:53', '2026-05-26 17:55:53', 'ticklishzebra800', 'alicia.lam@example.com', '$2y$12$wy76WqH7zFuz0RbMk803veC5pRZPj0B6hotWq14ZLadMAmkgdnWbW', 1, NULL, 'Alicia', 'Lam', NULL, 'V55 A12-2454', 'Hawaii', NULL, NULL, 1),
(12, '1bc4e041-100a-460e-b61a-b03808cdeaf9', '2026-05-26 17:56:53', '2026-05-26 17:56:53', 'bluegoose815', 'vaino.lahti@example.com', '$2y$12$kSQWuGg30ltvHQP0i4cwwOuzkeb4nVLDVK6RlPALdxk9qI16GfRg6', 1, NULL, 'Väinö', 'Lahti', NULL, '04-027-803', 'Atlantic Time (Canada), Caracas, La Paz', NULL, NULL, 1),
(13, '6c1ba715-2445-453d-93a8-82999ee7aa85', '2026-05-26 17:57:54', '2026-05-26 17:57:54', 'tinyswan785', 'sabrine.vanderham@example.com', '$2y$12$0zKqC7g4Uaen/xW0E8qUnOIdYmJPcUom3qy/JpyYNX.LocioifLzq', 1, NULL, 'Sabrine', 'Van der Ham', NULL, '(0233) 515567', 'Central Time (US & Canada), Mexico City', NULL, NULL, 1),
(14, '0b6db792-f74a-44ae-b910-e5b38874c811', '2026-05-26 17:58:54', '2026-05-26 17:58:54', 'organicelephant158', 'silvia.patino@example.com', '$2y$12$7cOtxVoXC4giZpCPGX1M/ujDiWc/cvnhsJdK2Fl4aL/Xdf0JZhp52', 1, NULL, 'Silvia', 'Patiño', NULL, '(682) 703 9764', 'Tokyo, Seoul, Osaka, Sapporo, Yakutsk', NULL, NULL, 1),
(15, '205f8860-41cc-4a7c-b159-107ea61b042c', '2026-05-26 19:19:41', '2026-05-26 19:19:41', 'dev22', 'dev@yopmail.com', '$2y$12$f.oe2XV7LO/et5kG8DH0I.D8D856hJYfMDLyZaWemX6o5DsqX7QrW', 1, 'lSRp2Dmlsok8rSTEfLyURwW2hIrEAiLAzNGQCji46CCZ5b2SKdVmoO8bQthP', 'dev', 'dev', NULL, '044-5551234567', NULL, NULL, NULL, NULL),
(16, 'c8742143-df97-490c-9ff8-138c9b31a10b', '2026-05-29 19:20:19', '2026-05-29 19:20:19', 'markallen', 'markallen@yopmail.com', '$2y$12$eJmXUrE1SvCh9cihOWlPVOcuPTsqmt3LQVAmtzZvWVy6tNSu1hYX6', 4, '5dd6166b-cdfc-4266-a7e3-d4198dff35ee', 'mark', 'allen', NULL, '01-5551234567', NULL, NULL, NULL, NULL),
(17, 'c6ab5af4-fe62-48c9-9200-9abed64edbbc', '2026-05-29 22:17:46', '2026-05-29 22:17:46', 'jackpanther', 'jackpanther@yopmail.com', '$2y$12$nKlQ7nR25EYsH7z1Be/Jpuc2gSOAqcG4Z5MbjIZCpl7Ga1U376TCe', 4, '39983581-b1be-4072-83ef-345b5b4f9f64', 'jack', 'panther', NULL, '01-55512345678', NULL, NULL, NULL, NULL),
(18, '117c3b24-5b3a-4a2c-acd2-52558eedf17c', '2026-05-29 22:20:26', '2026-05-29 22:20:26', 'jackpanther2', 'jackpanther2@yopmail.com', '$2y$12$Vh9pFFBVmASLeLHlnGUGX.iA/lY9WxrTepZZF2MH80ApNJPnihUki', 4, 'd0d39712-7f8f-4212-a632-4c189b17c449', 'jack', 'panther2', NULL, '01-555123456789', NULL, NULL, NULL, NULL),
(19, '6bbc1cf2-4bb6-4e2d-bce8-aa023b67aa0e', '2026-05-29 22:31:42', '2026-05-29 22:33:17', 'devdev3', 'devdev3@yopmail.com', '$2y$12$tNJIxO.cRe.IRnLzx3ovD.zhXV8nEU7g.mnu9F.Jf0hlRuV8kso9a', 1, 'm1lMOThPnwUo4uPUCgdkILmCL3QZF4KnqcL5UdGyAYDfzTHrycesZtq04jrl', 'dev', 'dev', NULL, '0256-5551234567', NULL, NULL, NULL, NULL),
(20, 'fb977864-5849-46e1-8488-5f2141db32a2', '2026-05-29 22:34:43', '2026-05-29 22:37:42', 'devdev4', 'dev4@yopmail.com', '$2y$12$5CgLb212.LkGuDRRIvShuuNzE46PKl.aMGf28iPp/HQlK7f/7mMq2', 1, 'RDlmpSGvjImp1S6KfiVMJqePbKbyL98docsYVssOfOg2t7fQhGRx3tByOwp2', 'dev4', 'dev4', NULL, '0355-1234567891', NULL, NULL, NULL, NULL),
(21, 'c0beab21-15bb-47c9-832d-70e6d22b1175', '2026-05-29 22:38:27', '2026-06-24 16:15:19', 'devdev5', 'dev5@yopmail.com', '$2y$12$wedaT6rHQhkr.dXSv5.lvO5cnH.YB6rs/QrAYHtlFNAuwr77anqMK', 1, 'a4e10cd9-5967-4fe4-aafa-c2550ff335e2', 'dev5', 'dev5', NULL, '0355-5465465465', NULL, NULL, NULL, NULL),
(22, '71f036fc-46d4-414f-8514-ddca553ea98d', '2026-05-29 22:45:25', '2026-05-29 22:46:13', 'devdev6', 'dev6@yopmail.com', '$2y$12$8kvY.d7bzfmv0o9T4lHoOu1xl9rjH3LZy75.k.7Vr3iEX5Vz6vW0a', 1, 'jD6vy6C8ObPMa0c74HHo0yzVwkvf456bNHWRcARPevvugjwWqepe7s3psgmd', 'dev6', 'dev6', NULL, '0355-1546546135', NULL, NULL, NULL, NULL),
(23, '0b5ba3f5-52fa-4a64-9857-11a56820510e', '2026-06-24 15:18:04', '2026-06-24 15:19:33', 'devtest', 'devtest@yopmail.com', '$2y$12$GWDy2nFRLDq4TKbssqRiK.9mndw99o5Mmv/SZdFyF5DNanZ6reFwy', 1, 'fizjGljWK9RL62eavlCOhS3hYED9tV5eISGW35ZJd6hssQGgGexm3DDzZor5', 'devtest', 'test', NULL, '0355-5551234567', NULL, NULL, NULL, NULL),
(24, '0abeeafc-2985-4793-b155-7167a28a2676', '2026-06-24 22:20:43', '2026-06-24 22:24:08', 'johnwhite', 'johnwhite@yopmail.com', '$2y$12$/eFBViWbnQDodUJopp.9A.cyV3bC97YuYFsU2qlSUppqwfU.5HYd6', 1, '98bb117c-9dc4-4a02-bce4-b76556e20190', 'johnwhite', 'white', NULL, '0355-5551234567', NULL, NULL, NULL, NULL),
(25, 'ac76ac71-c377-4502-b103-3010975dadaa', '2026-06-24 22:22:40', '2026-06-24 22:24:04', 'markblack', 'markblack@yopmail.com', '$2y$12$XgAnKLd5UcQwoaDsSoR4xOFnlHF/QwbK1KOgLgKN8L/9nNqj9VTLy', 1, '92e0788f-f8ec-4745-a248-abe2b41761d8', 'markblack', 'black', NULL, '0355-5551234565', NULL, NULL, NULL, NULL),
(26, '4d2bcc00-0a6d-486d-8714-f9f8db49e766', '2026-07-23 18:10:14', '2026-07-23 18:12:09', 'dev10', 'dev10@yopmail.com', '$2y$12$f8T9q/zUsusq6KmS0PpHZ.nqw/gqalpkbUhrqIma3JAdQj4KxSN6m', 1, 'zw0CbUVbEkW0DBBbeIsEEVkokgWNfDVxqJVSZ4Wso1iRFw9Z5t0ZkIzorCfk', 'dev', 'devin', NULL, '01-9999456412', NULL, NULL, NULL, NULL),
(27, '069372c5-4b86-49d2-8728-4811f931227d', '2026-07-23 18:28:25', '2026-07-23 18:28:38', 'dev11', 'dev11@yopmail.com', '$2y$12$1gP8fGtzOFneiq5uuqoMUODUygnfVGt/D7mVkpZ0HPH5v7cBrIMku', 1, '1rPZ9gHr11ALbai82K1GivxrkD3iWxHCj9k1hCOSiJG13cVlhdtcUxxeya9H', 'dev', 'devin', NULL, '01-555512345698', NULL, NULL, NULL, NULL),
(28, '5d4aae28-668d-4373-8722-ac2752157ff5', '2026-07-23 18:41:40', '2026-07-23 18:42:14', 'dev12', 'dev12@yopmail.com', '$2y$12$xyyfrEo4Vum20zZW8Y5TqOLj9yscTuHu7pxWqbWGRSOZIqY1zaNtC', 1, 'b4097bbf-9573-41af-9fc8-892ee96a6ad4', 'dev12', 'devin', NULL, '01-55512356898', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_authorities`
--

CREATE TABLE `user_authorities` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `user_roles__id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_authorities`
--

INSERT INTO `user_authorities` (`_id`, `_uid`, `status`, `created_at`, `updated_at`, `users__id`, `user_roles__id`) VALUES
(1, '307303c0-6dae-4066-a613-b26a8146df59', 1, '2026-04-15 18:12:09', '2026-07-23 22:26:19', 1, 1),
(2, '1b90fa40-3bc3-4c37-a635-02f74a135a3b', 1, '2026-05-26 17:24:07', '2026-05-26 17:27:22', 2, 2),
(3, '340035db-8a20-4051-9abc-5564c3c51f4e', 1, '2026-05-26 17:47:00', '2026-05-26 17:47:00', 3, 2),
(4, '659c7b3c-bbbc-422c-9ff2-e7a41174805c', 1, '2026-05-26 17:49:14', '2026-05-26 17:49:14', 4, 2),
(5, '41d35d43-ffd1-4bb1-b80a-d28d4ad60220', 1, '2026-05-26 17:49:54', '2026-05-26 17:49:54', 14, 2),
(6, 'f02e20a8-181d-401b-bc1b-84a2eb6d0a36', 1, '2026-05-26 17:50:54', '2026-05-26 17:50:54', 8, 2),
(7, '5969a48f-ac4b-4f4e-a7d7-72882a35af33', 1, '2026-05-26 17:51:54', '2026-05-26 17:51:54', 10, 2),
(8, '00e7f1ce-a1b0-420e-a52d-0a3858b7a487', 1, '2026-05-26 17:52:54', '2026-05-26 17:52:54', 11, 2),
(9, 'ff03fc63-ec0c-4780-b598-b77be93d4e04', 1, '2026-05-26 17:53:54', '2026-05-26 17:53:54', 12, 2),
(10, '91e8f660-d04f-43f0-9eab-0a730a1fc473', 1, '2026-05-26 17:54:54', '2026-05-26 17:54:54', 7, 2),
(11, '09a91c86-14da-445c-9d0f-b56e908d337b', 1, '2026-05-26 17:55:54', '2026-05-26 17:55:54', 6, 2),
(12, '65b146a9-2dc7-466a-881b-ccac65891369', 1, '2026-05-26 17:56:54', '2026-05-26 17:56:54', 5, 2),
(13, 'de91a8a0-7c32-4181-980a-b9f1533ba458', 1, '2026-05-26 17:57:54', '2026-05-26 17:57:54', 13, 2),
(14, '5c322017-ac73-4ed5-bed6-cada6e231503', 1, '2026-05-26 17:58:54', '2026-07-23 21:55:24', 9, 2),
(15, '81811c54-171a-4fb8-a9a0-e4c9de8170b0', 1, '2026-05-26 19:19:41', '2026-05-29 22:14:34', 15, 2),
(16, '37b25814-91ea-4feb-95bc-7d0f4be2c46f', 1, '2026-05-29 19:20:19', '2026-05-29 19:20:19', 16, 2),
(17, 'cd34568d-f6ec-449d-9645-865c132bfb67', 1, '2026-05-29 22:17:46', '2026-05-29 22:17:46', 17, 2),
(18, 'c1f5f3f3-ffe8-4769-a595-06a94a40b730', 1, '2026-05-29 22:20:26', '2026-05-29 22:20:26', 18, 2),
(19, 'f47bca5f-43e3-4a8c-9085-55cf4578be4b', 1, '2026-05-29 22:31:43', '2026-05-29 22:31:56', 19, 2),
(20, '76d16ef7-22d8-4028-b836-788235280177', 1, '2026-05-29 22:34:43', '2026-07-23 23:38:10', 20, 2),
(21, '563e383f-e8d5-437b-aeb7-a1df8b00d24c', 1, '2026-05-29 22:38:27', '2026-05-29 22:38:27', 21, 2),
(22, '144dbac0-7855-4a3e-84b2-11eb2be8a71c', 1, '2026-05-29 22:45:25', '2026-07-23 17:59:01', 22, 2),
(23, 'c4a00ccb-47bb-41a1-b2f0-514b9d793a3e', 1, '2026-06-24 15:18:04', '2026-07-16 17:35:07', 23, 2),
(24, '53b20986-d40f-4760-85b6-f2ead520152d', 1, '2026-06-24 22:20:43', '2026-06-24 23:33:36', 24, 2),
(25, 'e347693b-044b-46ae-a3ee-30052e411efc', 1, '2026-06-24 22:22:41', '2026-06-24 23:07:59', 25, 2),
(26, 'ff135e43-9f6b-4a11-961a-ada0488f722f', 1, '2026-07-23 18:10:15', '2026-07-23 18:25:28', 26, 2),
(27, 'e9926c5f-3e73-4c32-b072-b59c80084664', 1, '2026-07-23 18:28:25', '2026-07-23 18:38:52', 27, 2),
(28, 'efea8f0e-5997-41e2-8405-8b0bd67677b8', 1, '2026-07-23 18:41:40', '2026-07-23 19:32:58', 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_block_users`
--

CREATE TABLE `user_block_users` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `to_users__id` int(10) UNSIGNED NOT NULL,
  `by_users__id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_encounters`
--

CREATE TABLE `user_encounters` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `by_users__id` int(10) UNSIGNED NOT NULL,
  `to_users__id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_gifts`
--

CREATE TABLE `user_gifts` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `from_users__id` int(10) UNSIGNED NOT NULL,
  `to_users__id` int(10) UNSIGNED NOT NULL,
  `items__id` int(10) UNSIGNED NOT NULL,
  `price` decimal(13,4) DEFAULT NULL,
  `credit_wallet_transactions__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_gifts`
--

INSERT INTO `user_gifts` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `from_users__id`, `to_users__id`, `items__id`, `price`, `credit_wallet_transactions__id`) VALUES
(1, '8b5d5815-656e-4575-b62f-5cf70e746314', '2026-07-22 16:59:34', '2026-07-22 16:59:34', 0, 20, 11, 1, 100.0000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_items`
--

CREATE TABLE `user_items` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `items__id` int(10) UNSIGNED NOT NULL,
  `price` decimal(13,4) DEFAULT NULL,
  `credit_wallet_transactions__id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`_id`, `_uid`, `created_at`, `updated_at`, `status`, `users__id`, `file`) VALUES
(1, 'c406f43f-b678-49f3-8caa-58a448cd46a5', '2026-05-29 23:35:03', '2026-05-29 23:35:03', 1, 22, 'logo-design-1-6a1a22a6f3678.jpeg'),
(2, 'd7c3efc6-c957-46f4-8003-360001fa7351', '2026-05-29 23:35:04', '2026-05-29 23:35:04', 1, 22, 'logo-design-6a1a22a7f0fe9.jpeg'),
(3, '4138615b-cac0-4c72-b07f-2e0adbdd727e', '2026-05-29 23:35:05', '2026-05-29 23:35:05', 1, 22, 'image-8-6a1a22a8eec9b.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `__data` text DEFAULT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `countries__id` smallint(5) UNSIGNED DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `about_me` varchar(500) DEFAULT NULL,
  `location_latitude` decimal(11,8) DEFAULT NULL,
  `location_longitude` decimal(11,8) DEFAULT NULL,
  `preferred_language` varchar(15) DEFAULT NULL,
  `relationship_status` tinyint(3) UNSIGNED DEFAULT NULL,
  `work_status` tinyint(3) UNSIGNED DEFAULT NULL,
  `education` tinyint(4) DEFAULT NULL,
  `cover_picture` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`_id`, `_uid`, `created_at`, `updated_at`, `__data`, `users__id`, `countries__id`, `profile_picture`, `gender`, `dob`, `city`, `about_me`, `location_latitude`, `location_longitude`, `preferred_language`, `relationship_status`, `work_status`, `education`, `cover_picture`, `is_verified`, `status`) VALUES
(1, 'dda0244e-b41b-4c83-8e14-be54ca53db56', '2026-05-26 17:24:07', '2026-05-26 17:24:07', NULL, 2, NULL, NULL, 1, '2008-05-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'e70af9ac-d816-4b6a-9b26-66c88c2db072', '2026-05-26 17:47:00', '2026-05-26 17:47:00', NULL, 3, 173, 'https://picsum.photos/id/35/360/360', 3, '1983-05-26', 'Schroederfurt', 'Qui sit cum nemo ea. Excepturi est dolorum nesciunt sed consequatur eius molestiae aut. Sequi exercitationem aspernatur porro nihil omnis. Sequi qui temporibus ea animi repellendus est omnis ipsam. Voluptates ea voluptatem aut sint et. Doloribus rerum labore facilis. Est voluptate est vitae laudantium voluptatem voluptatem.', 59.97146000, 4.08076300, '21', 2, 3, 6, 'https://picsum.photos/id/98/820/360', 0, 0),
(3, '292b0f5c-2b18-46a2-a9f0-c6a0a9e0b461', '2026-05-26 17:49:14', '2026-05-26 17:49:14', NULL, 4, 229, 'https://picsum.photos/id/77/360/360', 1, '1989-05-26', 'North Jamey', 'Id cupiditate autem possimus consequatur sit hic dolor provident. Voluptatibus temporibus totam hic minus possimus. Quis accusantium perspiciatis eaque amet delectus et. Id alias molestiae sit fuga sit dolorem voluptatem aut. Incidunt ex est facilis corrupti ipsum. Qui earum magni porro.', -63.15603400, 70.86523800, '9', 4, 1, 6, 'https://picsum.photos/id/48/820/360', 1, 0),
(4, 'c3b7b96e-0e56-4570-a1b9-6b5122415d46', '2026-05-26 17:49:54', '2026-05-26 17:49:54', NULL, 14, 248, 'https://picsum.photos/id/83/360/360', 2, '1971-05-26', 'Steviebury', 'Sapiente cumque officiis est. Officia recusandae libero esse nam. Id voluptatem laudantium atque ad quia animi facere aut. Dolor deserunt corrupti repellendus corporis aliquid repellendus. Dolorum ut doloremque ullam.', 78.45201600, -129.80404700, '18', 3, 1, 4, 'https://picsum.photos/id/86/820/360', 1, 0),
(5, '42a55742-50f3-40ff-881b-8da0b5438d37', '2026-05-26 17:50:54', '2026-05-26 17:50:54', NULL, 8, 11, 'https://picsum.photos/id/44/360/360', 2, '1957-05-26', 'North Dovie', 'Sint qui corporis quis saepe amet. Eum quod nulla ducimus officiis quidem. Est et deserunt est dolor velit vitae sit.', -10.18482200, -9.08244400, '14', 3, 5, 3, 'https://picsum.photos/id/47/820/360', 0, 0),
(6, 'c8c81e41-df06-4031-aa9c-38c88f3fb3f6', '2026-05-26 17:51:54', '2026-05-26 17:51:54', NULL, 10, 91, 'https://picsum.photos/id/51/360/360', 2, '1977-05-26', 'Sidneyfort', 'Sit laborum inventore iste.', -82.21952700, 90.91407000, '12', 3, 6, 4, 'https://picsum.photos/id/13/820/360', 1, 0),
(7, '542d1acd-fa90-43ef-a3cb-49698c78f246', '2026-05-26 17:52:54', '2026-05-26 17:52:54', NULL, 11, 96, 'https://picsum.photos/id/40/360/360', 2, '1992-05-26', 'East Jefferey', 'Repellat soluta sit iure necessitatibus sunt quos praesentium. Quibusdam consequatur expedita esse consectetur fuga alias similique. Dignissimos earum ut quo corrupti. Qui beatae accusamus tempore voluptas nemo qui dolor.', -52.29032000, 14.73444300, '5', 4, 3, 4, 'https://picsum.photos/id/20/820/360', 0, 0),
(8, '590f1d3b-d861-4071-aa00-2c463b44918c', '2026-05-26 17:53:54', '2026-05-26 17:53:54', NULL, 12, 121, 'https://picsum.photos/id/37/360/360', 2, '1993-05-26', 'South Judahmouth', 'Quisquam at odio est ut hic. Laborum iusto eius impedit repudiandae. Voluptatibus corrupti minus voluptas dicta explicabo. Aut fuga repellendus tempora ducimus voluptatem molestiae. Velit rerum et impedit ut ipsum vel. Ut reiciendis dignissimos accusantium. Atque autem autem provident rerum porro expedita.', 27.12058300, -161.78884100, '14', 3, 5, 3, 'https://picsum.photos/id/41/820/360', 1, 0),
(9, 'f8674163-7201-4461-8dd3-e5b5f353e531', '2026-05-26 17:54:54', '2026-05-26 17:54:54', NULL, 7, 187, 'https://picsum.photos/id/7/360/360', 2, '1973-05-26', 'West Cullen', 'Qui perspiciatis delectus enim ea doloremque qui. Laboriosam iusto atque quis eveniet. Eum quis aut quibusdam doloremque et numquam accusantium saepe. Atque recusandae fugit rerum ducimus at quis. Est quia aut illum et. Nulla facilis harum sed provident. Sapiente et laboriosam repellat eum delectus magnam quae.', -4.28587400, 62.76288800, '16', 2, 1, 5, 'https://picsum.photos/id/79/820/360', 1, 0),
(10, '2b0f831b-5b9c-4437-a85e-e428d22f9fce', '2026-05-26 17:55:54', '2026-05-26 17:55:54', NULL, 6, 157, 'https://picsum.photos/id/52/360/360', 3, '1963-05-26', 'Reedshire', 'Et non deleniti vero corrupti eos dolor.', 31.52445500, -33.52814200, '6', 1, 4, 2, 'https://picsum.photos/id/65/820/360', 0, 0),
(11, 'bd52f408-3717-43d1-bb8f-ed5d2527e166', '2026-05-26 17:56:54', '2026-05-26 17:56:54', NULL, 5, 238, 'https://picsum.photos/id/57/360/360', 2, '1962-05-26', 'North Melany', 'Modi eos mollitia vitae laudantium aliquam. Soluta id maxime velit illo sit enim perferendis. Non non et iure molestias quo. Optio omnis quam quidem perferendis quo.', 58.73329200, 55.95858500, '9', 1, 1, 6, 'https://picsum.photos/id/87/820/360', 0, 0),
(12, '574828a6-ebfc-4cf7-ab10-58fc8b448c76', '2026-05-26 17:57:54', '2026-05-26 17:57:54', NULL, 13, 52, 'https://picsum.photos/id/46/360/360', 1, '2007-05-26', 'Dickiside', 'In aspernatur facere sequi assumenda et dolores aut. Nesciunt at hic porro libero ex minus dicta. Sit quam nobis minus hic sunt non sapiente sit. Sapiente quae doloremque in fugiat qui laborum. Soluta minima animi ut nemo eum. Molestiae odit et omnis distinctio. Magnam numquam iure facilis cum accusantium iure nulla ipsa.', -14.02625000, -117.29663800, '4', 2, 1, 3, 'https://picsum.photos/id/20/820/360', 1, 0),
(13, '4b5fb501-8087-4e1c-86a1-47c2fcca90e5', '2026-05-26 17:58:54', '2026-05-26 17:58:54', NULL, 9, 91, 'https://picsum.photos/id/85/360/360', 3, '2008-05-26', 'Bartellmouth', 'Ut consequatur ut est ut dolor. Totam blanditiis velit maxime id deserunt consequatur. Nihil hic ea provident id. Eveniet placeat ipsa aut vitae dolores maxime facilis. Eaque sequi quis quo illo. Sit quisquam recusandae est mollitia. Ut corporis eos dolor.', -40.53552800, -45.72359700, '14', 4, 1, 6, 'https://picsum.photos/id/45/820/360', 1, 0),
(14, 'ca09d3d9-fd9a-4267-a8c1-48212f3b5cae', '2026-05-26 19:19:41', '2026-06-24 16:33:36', NULL, 15, 226, 'logo-design-6a19d6ba40256.jpeg', 1, '2008-05-02', 'california', NULL, 36.70146310, -118.75599700, NULL, NULL, NULL, NULL, 'logo-design-6a19d6b732c58.jpeg', 1, 2),
(15, 'd292ac39-070f-43f2-8418-a7ed7fc5ba85', '2026-05-26 19:29:26', '2026-05-26 19:29:26', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(16, 'acc0f7e4-e10f-4438-a6b8-b2b2f901b707', '2026-05-29 19:20:19', '2026-05-29 19:20:19', NULL, 16, NULL, NULL, 1, '2000-01-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(17, '7588c798-a1a9-4f51-bd83-91b5754d9349', '2026-05-29 22:17:46', '2026-05-29 22:17:46', NULL, 17, NULL, NULL, 1, '2008-05-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(18, '9d1cfec9-e01b-4af2-a11c-0e676117d26e', '2026-05-29 22:20:26', '2026-05-29 22:20:26', NULL, 18, NULL, NULL, 1, '2008-05-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(19, 'ad0ac83a-2cad-4198-a4ee-f52541402088', '2026-05-29 22:31:43', '2026-06-24 16:33:32', NULL, 19, NULL, NULL, 1, '2008-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(20, 'bf9b0786-b068-4ca2-8c5a-20e5afe4a477', '2026-05-29 22:34:43', '2026-06-24 16:33:28', '{\"wandr\":{\"interests\":[],\"travel_experiences\":[{\"destination\":\"asdasdasdasda\",\"year\":\"asdasdasd\",\"description\":\"\"}],\"event_preferences\":{\"types\":[],\"frequency\":\"\",\"budget\":\"\",\"notes\":\"\"},\"gift_preferences\":{\"categories\":[\"experiences\",\"flowers\",\"personalized\"],\"occasions\":[\"birthday\",\"anniversary\",\"first_date\"],\"notes\":\"i need these gifts...\"}}}', 20, 226, '1-6a1db7d7eabc9.png', 1, '2008-05-12', 'chicago', NULL, 41.87556160, -87.62442120, NULL, NULL, NULL, NULL, '1-6a1db7d1df287.png', 1, 2),
(21, 'fcd02c4a-ba63-4b69-8828-2a663cc058e4', '2026-05-29 22:38:27', '2026-06-24 15:31:54', NULL, 21, NULL, NULL, 1, '2008-05-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(22, 'a1f25dfd-2476-4d9b-bd45-45d833bb4c6e', '2026-05-29 22:45:25', '2026-06-24 16:20:42', '{\"wandr\":{\"interests\":[\"Music\",\"Fitness\",\"Food & Dining\",\"asdasd\"],\"travel_experiences\":[{\"destination\":\"sadasd\",\"year\":\"2026\",\"description\":\"\"}],\"event_preferences\":{\"types\":[\"social\",\"dating\",\"outdoor\"],\"frequency\":\"weekly\",\"budget\":\"low\",\"notes\":\"testing\"},\"gift_preferences\":{\"categories\":[\"experiences\",\"flowers\",\"personalized\"],\"occasions\":[],\"notes\":\"testing\"}}}', 22, 226, 'logo-design-1-6a1a175149698.jpeg', 1, '2008-05-15', 'california', NULL, 36.70146310, -118.75599700, NULL, NULL, NULL, NULL, 'logo-design-1-6a1a174dd0007.jpeg', 1, 2),
(23, '7ad3a82f-bfdb-4e4d-81f0-b28681631254', '2026-06-24 15:18:04', '2026-06-24 15:39:24', NULL, 23, 226, 'davin-6a3bfa033d71e.png', 1, '2008-06-24', 'chicago', NULL, 41.87556160, -87.62442120, NULL, NULL, NULL, NULL, 'image-12-6a3bf9fe1bba3.png', 1, 2),
(24, 'd7b22f62-a4f9-4e5b-9dbb-53e312ad75bb', '2026-06-24 22:20:43', '2026-06-24 22:26:31', NULL, 24, 226, 'davin-6a3c597dafdf7.png', 1, '2008-06-24', 'chicago', NULL, 41.87556160, -87.62442120, NULL, NULL, NULL, NULL, 'image-13-6a3c597929bd6.png', 1, 2),
(25, '45909b15-0c04-4d19-831c-5213a8f6bd82', '2026-06-24 22:22:41', '2026-06-24 22:25:19', NULL, 25, 226, 'alex-6a3c592da8975.png', 1, '2008-06-12', 'california', NULL, 36.70146310, -118.75599700, NULL, NULL, NULL, NULL, 'localhost-3000-demo-6a3c59274e421.png', 1, 2),
(26, '06e60121-c9fc-4e2f-8430-31140f084e77', '2026-07-23 18:10:15', '2026-07-23 18:13:25', NULL, 26, NULL, NULL, 1, '1998-01-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'image-18-6a6259c3df1e3.png', NULL, 1),
(27, 'e8fa3d64-45af-4f3d-9f2e-5e2f2761a712', '2026-07-23 18:28:26', '2026-07-23 18:32:49', NULL, 27, 226, 'image-18-6a625e2a040f4.png', 1, '2008-03-24', 'california', NULL, 36.70146310, -118.75599700, NULL, NULL, NULL, NULL, 'image-19-6a625e1bc7ab4.png', NULL, 1),
(28, '7a5eae75-1cf6-4be6-ad05-db4eeffa934a', '2026-07-23 18:41:40', '2026-07-23 18:44:15', NULL, 28, 226, 'image-20-6a6260a95f079.png', 1, '1981-12-29', 'California', NULL, 36.70146310, -118.75599700, NULL, NULL, NULL, NULL, 'package-02-6a6260af9080a.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `_id` tinyint(3) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`_id`, `_uid`, `status`, `created_at`, `updated_at`, `title`) VALUES
(1, '15f21c9f-88bb-4fec-bad4-03eb9d9065f8', 1, '2026-04-15 18:12:09', '2026-04-15 18:12:09', 'Admin'),
(2, '287133c4-2afc-4f65-ab3c-28b0df8a099a', 1, '2026-04-15 18:12:09', '2026-04-15 18:12:09', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `key_name` varchar(45) NOT NULL,
  `value` text DEFAULT NULL,
  `data_type` tinyint(4) DEFAULT NULL,
  `users__id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`_id`, `created_at`, `updated_at`, `key_name`, `value`, `data_type`, `users__id`) VALUES
(1, '2026-06-24 23:33:36', '2026-06-24 23:33:36', 'distance', '10', 3, 24),
(2, '2026-06-24 23:33:36', '2026-06-24 23:33:36', 'user_type', '1', 3, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user_specifications`
--

CREATE TABLE `user_specifications` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `specification_key` varchar(15) NOT NULL,
  `specification_value` varchar(150) DEFAULT NULL,
  `users__id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_specifications`
--

INSERT INTO `user_specifications` (`_id`, `_uid`, `created_at`, `updated_at`, `type`, `status`, `specification_key`, `specification_value`, `users__id`) VALUES
(1, 'dbab4423-1106-4367-9154-f0d68aac03cb', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'height', '193', 3),
(2, 'a0febb6b-51a3-4d4c-b062-538f872ee0b7', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'ethnicity', 'latin_american', 3),
(3, '63352a55-207d-447d-8488-da0cba1a2d8a', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'body_type', 'curvy', 3),
(4, 'b6385651-0d84-471c-9f62-a1320c065f33', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'hair_color', 'purple', 3),
(5, '2a718397-6674-4a37-b1d7-ac58d500627d', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'nature', 'sensitive', 3),
(6, 'bd778c4f-54a0-4eab-ba38-ad77a841b05c', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'friends', 'no_friends', 3),
(7, '48863012-2b1d-4d41-80f7-b18b4aac96fc', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'children', 'expecting', 3),
(8, '477259b7-d78a-4b87-929d-684ae6f0192e', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'pets', 'have_pets', 3),
(9, '74b6be28-524f-4492-965a-72fa6a9dc100', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'religion', 'sikh', 3),
(10, '49821e40-d20e-409f-9f66-d6c43a0e6639', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'i_live_with', 'parents', 3),
(11, 'b0186dc1-0a66-4de9-9254-2ed82a7837dc', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'car', 'none', 3),
(12, 'cf0c9aaa-0a86-4273-af20-7b19fe77dbde', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'travel', 'no', 3),
(13, '7953ba61-f836-4c67-ba89-b4e10c2c1740', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'smoke', 'chain_smoker', 3),
(14, '3a1698d4-b693-4c41-aad7-f77c2047d2f1', '2026-05-26 17:46:01', '2026-05-26 17:46:01', 1, 1, 'drink', 'i_drink_sometimes', 3),
(15, 'ebcd3301-6827-486f-a04b-babeae00d95d', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'height', '210', 4),
(16, 'd0e20db4-f696-4276-935f-1b760aa52d23', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'ethnicity', 'mixed', 4),
(17, 'f9c9d1f9-fb4a-4efc-9c33-fdb6e4395361', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'body_type', 'round', 4),
(18, 'ccf606a8-02c6-471b-b2a6-489880b4cef1', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'hair_color', 'black', 4),
(19, '0997b91c-6ebe-4cb7-897e-7fb7935a015b', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'nature', 'nervous', 4),
(20, 'fd10436a-d1f0-45ee-895b-428fee26b113', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'friends', 'no_friends', 4),
(21, '719e4396-f323-41d7-af4f-1141557106d7', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'children', 'someday_maybe', 4),
(22, '58464fc3-6cab-4c5a-99d7-ff459ef7eb93', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'pets', 'none', 4),
(23, 'a97f1314-788e-4ec2-975e-04cc1ccc3dc8', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'religion', 'agnostic', 4),
(24, '72c99a94-c63e-4de2-9b71-4e080dfa84ca', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'i_live_with', 'other', 4),
(25, 'ac908152-ae55-4816-a7f1-204f9f38f4a7', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'car', 'my_own_car', 4),
(26, '5a0896c6-0ee3-4c1d-b6b0-d5efd41dc099', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'travel', 'no', 4),
(27, '7ac903e4-ca41-4de4-b87a-6a7eb639c49a', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'smoke', 'chain_smoker', 4),
(28, '54fbe1e3-f2ee-4618-a257-ba87263d6336', '2026-05-26 17:48:14', '2026-05-26 17:48:14', 1, 1, 'drink', 'never', 4),
(29, '2264776c-b6bb-4d81-adf0-237d7f26b48e', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '155', 14),
(30, '886e3593-e491-418c-af85-687d0bc3a315', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'mixed', 14),
(31, 'c993cc63-7e7c-4655-b1c2-318675598309', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'other', 14),
(32, '1b719f98-01f8-442e-aa92-4ca8cce76494', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'sandy', 14),
(33, '59b4931d-9a61-4f53-83e2-64cc9ce70a78', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'loner', 14),
(34, 'c29f5ccd-3298-4bc5-ba63-a36d5a494e00', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'only_good_friends', 14),
(35, 'b4e8f04c-e545-42f7-b962-40a3e2490f63', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'no_never', 14),
(36, '93eefe19-e27c-4ab7-b831-fbfc35289454', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'none', 14),
(37, '86b6c140-7221-4ff2-bb31-108b1ba12cdc', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'muslim', 14),
(38, 'f93ecf88-d169-41b2-bf21-433b7752beb9', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'alone', 14),
(39, '14c5616c-abdd-4f59-a60a-084675004cc6', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'none', 14),
(40, '00776862-1cb6-4f5d-8d06-4d1499525e9b', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'no', 14),
(41, '753719da-65b8-4b12-b837-91ae160ba240', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'i_some_sometimes', 14),
(42, '4adc55f0-d8b2-48f9-bfe2-b5c057ab0415', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'never', 14),
(43, '75e6fcf2-863b-4ec5-aa95-04899caffe3a', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '220', 8),
(44, 'b1b142b3-9787-4c95-a9cf-3dad3912dcea', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'north_african', 8),
(45, '127c8448-d891-40ac-9b10-8403b43a0970', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'average', 8),
(46, '528939ef-5da3-4318-950d-22e8ed1cca8c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'blond/strawberry', 8),
(47, 'd4cd68fd-fc53-40fc-98ca-2003ec0ad40c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'reliable', 8),
(48, '1e3cc0df-a53a-4113-b545-bac98d83bef5', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'many_friends', 8),
(49, '97f2649d-8ed4-4547-b78e-417d703fc2e4', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'no_never', 8),
(50, '95076416-55f6-48d5-bd81-044ef75c17e1', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'have_pets', 8),
(51, 'b8007336-bf2c-4ee7-949f-246d929e708f', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'buddhist', 8),
(52, 'bdf72409-739d-4bfa-879c-47b1100e8f51', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'parents', 8),
(53, 'e02368c6-0bf4-49a4-8f0c-0ef7f93bae13', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'none', 8),
(54, 'e09150ce-39eb-49ca-ba78-0fc66229cda1', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'no', 8),
(55, 'ad47bbb3-df3e-4569-94b3-891186626366', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'i_some_sometimes', 8),
(56, 'e8d7e9e0-2536-4607-a095-fbd2a39bddc0', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'never', 8),
(57, '31e37066-c65f-49c0-bd35-52215e8e66cd', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '162', 10),
(58, '78187f0e-879a-43af-9f73-b4e840482252', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'mixed', 10),
(59, 'f294d482-bb9f-4552-9475-727b511f08d2', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'round', 10),
(60, '0509f35f-acdb-40aa-be96-7cad43bda89c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'blue', 10),
(61, 'f6818def-f783-4b9b-abaf-7fe56535bde0', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'reliable', 10),
(62, 'dc1e45e6-b320-4e4c-95d4-24316df80b2d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'many_friends', 10),
(63, '559c9ec6-1ce6-4c8a-9131-ee9c41ace189', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'someday_maybe', 10),
(64, '15de5be4-7ecb-4402-8dd0-6d72330a229d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'have_pets', 10),
(65, 'd34cefe0-86d2-4264-b7a6-e79497e39f12', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'agnostic', 10),
(66, 'f30f849d-d98b-475c-9aac-6ee8d7090bd4', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'friends', 10),
(67, '88f562a5-74e4-4d88-98c8-15af6788345b', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'my_own_car', 10),
(68, 'f44caaec-2b2b-47e7-af98-ebf1c15cfc44', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'not_very_much', 10),
(69, 'bd3b8e8a-7433-4223-bdc4-007dc98b16b8', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'i_some_sometimes', 10),
(70, '9777c151-af24-4213-a3eb-e5686c6b4423', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'never', 10),
(71, '4863d91c-b1e8-47cf-a8a1-13fcf7060887', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '206', 11),
(72, '128ee054-442e-4cbe-aeb5-0bfed81647b4', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'latin_american', 11),
(73, '978c0c65-d7b7-4af4-963c-221b5ccc0e35', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'average', 11),
(74, 'a7cd63e9-bceb-4609-8520-62ff2ed3d7b1', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'blue', 11),
(75, 'a5b3a59c-b594-4f4e-97b2-a6e37d16c164', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'shy', 11),
(76, '51034439-139d-4698-9718-9b5a6503d1d5', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'no_friends', 11),
(77, 'de2405a5-facd-4e1d-9eed-da228418c0f7', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'no_never', 11),
(78, 'a1d8df4c-0e74-4145-a0bd-5116ed31194f', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'none', 11),
(79, 'a2349f18-190c-4387-9c30-1bca09682ec0', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'jewish', 11),
(80, 'dbfff986-b90b-41f4-acd1-5da298999910', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'alone', 11),
(81, '40f26081-3999-44a8-8939-a7bfd75e688d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'my_own_car', 11),
(82, 'a2d38916-6d26-4bc3-b91c-146594ae2e78', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'yes_all_the_time', 11),
(83, 'b166581b-4a9d-4579-a82c-d3242bd9801c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'chain_smoker', 11),
(84, 'def133ee-683b-4cb6-ac5f-8d6ce32a163a', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'i_drink_sometimes', 11),
(85, 'd257a120-b910-494a-8522-d154afc817f8', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '178', 12),
(86, 'e3fec482-1a36-46fe-96fe-2ea14a79dbce', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'middle_eastern', 12),
(87, 'e0d3d55b-42d8-4070-8a02-3a6cc8809c88', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'other', 12),
(88, 'fb2dbd9b-a44e-45aa-b551-242a3bdc2fa3', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'pink', 12),
(89, '5241fba4-f000-4332-877c-63ec5b4aa712', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'reliable', 12),
(90, '4a1a9136-45e5-43fe-83e6-7d7e6e4e62bb', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'only_good_friends', 12),
(91, 'bd977a14-dd29-4b20-b368-4feae716579d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'no_never', 12),
(92, '395a9093-6389-4ad0-a457-99118813da1d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'none', 12),
(93, '598153ee-6951-478d-a2c0-68da581ac600', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'atheist', 12),
(94, 'a04ee8a0-7c70-443b-8e0e-ed4ac1597142', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'other', 12),
(95, 'ae6cf21c-0618-4e81-ae29-400d8728f9a6', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'my_own_car', 12),
(96, 'dda0aed1-694b-4930-8e5a-0f01f5a34dd4', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'yes_all_the_time', 12),
(97, '5eb90bc1-5a35-4558-89cc-23b03464cb58', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'chain_smoker', 12),
(98, 'e197a83e-b6bc-4806-bd0a-2161c3150829', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'never', 12),
(99, '0e587830-ce71-4c23-ab96-c1bfaedca1b2', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '193', 7),
(100, 'c13365b5-3b9e-4b5f-8789-186806a11b08', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'north_african', 7),
(101, '2f7fb459-1113-4b73-a362-ffe99e08d83d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'slim', 7),
(102, 'fb93fb9e-37a1-4bf7-bb9d-5815654d9c7c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'sandy', 7),
(103, 'd3daa2b4-71d7-4fd0-b825-558b214e14a4', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'honest', 7),
(104, '1941e7bf-a438-4ab6-8bfc-a2ca04a59f85', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'many_friends', 7),
(105, 'a61f95ee-d881-4cc8-b2f6-1500113e38e8', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'expecting', 7),
(106, '5b2e116b-78f6-4c65-bbee-61d6d02c8098', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'have_pets', 7),
(107, 'ea5f733c-9948-44cb-8591-5780267873ce', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'muslim', 7),
(108, 'f4f2a7a8-7ca8-4c4a-b465-28261c622988', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'other', 7),
(109, 'b8edcecc-ef1d-4bfe-ac15-2c66c03d246e', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'none', 7),
(110, 'b5181b3f-2578-47c4-8d08-2af57be613fb', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'not_very_much', 7),
(111, '11881765-bbe4-4027-aca5-4e754c9d321b', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'i_some_sometimes', 7),
(112, '27714244-b6ac-46a4-a1c5-c419faeea40a', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'never', 7),
(113, 'e43e8820-fd51-4531-8442-d6395f96e967', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '187', 6),
(114, '2ecf5ac8-40fb-4dcc-ad52-99e9c0fb14a3', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'white', 6),
(115, '01d6f34c-3fb8-46a3-b4c1-908b3c826362', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'average', 6),
(116, 'e04a4759-eed4-4411-85cd-6fec292ccd05', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'partly_or_completely_bald', 6),
(117, 'ed99eb11-fb85-4ead-a027-26c38963a876', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'cheerful', 6),
(118, '9c91bcf8-0b69-4a0b-8a49-4e8811391216', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'some_friends', 6),
(119, '7c4308d3-cd8f-4870-8bab-5215173468da', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'expecting', 6),
(120, '677d7022-6ec8-4d48-b159-51a4d7d7871d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'none', 6),
(121, '434885b7-64bd-4b31-aec1-b588e840f808', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'atheist', 6),
(122, '38756044-7efe-4ab8-a2df-01287cf9d330', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'partner', 6),
(123, '4e7e948c-eec8-4f9f-a5c3-463e86d69f05', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'none', 6),
(124, 'd5f1358f-688d-4523-99b5-f75a71b10c47', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'yes_sometimes', 6),
(125, '9f81cd5b-fe0d-4d76-ba53-877b88f3624d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'chain_smoker', 6),
(126, 'fa77486d-30a2-4346-a9d9-ded2e63942a9', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'i_drink_sometimes', 6),
(127, '786f5d71-c182-417a-bb62-3607e7f2f25c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '201', 5),
(128, 'bbe160b8-5b87-4838-ba96-839c51774f27', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'north_african', 5),
(129, '7b4e0f2a-8722-4dd6-9835-8178c0dd1aa3', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'round', 5),
(130, '96bb49f8-8fac-4c59-bb0e-f401da021543', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'purple', 5),
(131, '0350def7-e561-440a-b085-6cb5c69495f9', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'calm', 5),
(132, '7f3e8f04-1da3-4f84-91f2-c4cc530afb1b', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'only_good_friends', 5),
(133, 'b5b5c577-5cac-4ac8-a159-e90f823ac211', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'expecting', 5),
(134, '2265fdc8-c5ac-4d18-b365-5265fe5d0cdb', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'have_pets', 5),
(135, '1dc069fa-b99e-436a-9d50-25d417646939', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'muslim', 5),
(136, '19372151-60a8-4e30-bd6e-2abc4b7e1685', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'children', 5),
(137, 'ca3b8039-cb57-40d0-a5a4-90da1de69118', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'none', 5),
(138, 'bb34e46c-7826-40ca-8cba-0951359ee233', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'no', 5),
(139, '325dd62e-647e-4d1d-9730-42bd1d2ce5a3', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'i_some_sometimes', 5),
(140, '0334b525-93ce-401b-9a42-b8166f3183b2', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'i_drink_sometimes', 5),
(141, '18360129-6839-47ec-b9b3-b619b7099a33', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '186', 13),
(142, '5377190a-eb88-4949-92a9-077105f33386', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'north_african', 13),
(143, '129b28d4-02c4-4460-a1e2-7cfadf3827e6', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'curvy', 13),
(144, '099a12c7-cf9f-431c-8eac-299c00d1a4c5', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'white', 13),
(145, 'b70913a6-6d32-49df-9af1-166633d1311c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'humorous', 13),
(146, '56a40a55-7e20-44a9-8548-75dacfdc806d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'no_friends', 13),
(147, '2c7e262a-c277-42f9-9000-80a35fee7deb', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'no_never', 13),
(148, '25d73971-07c9-4ab9-808e-8fe6b2457d99', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'none', 13),
(149, 'cb8086a4-7bea-4fea-859c-dc2ca77a5339', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'buddhist', 13),
(150, '38dd6e46-1169-4515-aa2d-42f7e01a8498', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'friends', 13),
(151, '4290afd9-fec1-4e31-a6a6-f7dace1c3c8d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'none', 13),
(152, '32ef06b6-c38c-441f-aeed-2e5631825d2c', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'yes_sometimes', 13),
(153, '5455bad1-a918-4c2c-b24d-a666c0f5b006', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'chain_smoker', 13),
(154, '13d1eb78-e57e-4630-b5c5-f94d7da0c967', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'never', 13),
(155, 'b12fe18d-b4ca-4df1-86d7-2fea9eb899d4', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'height', '200', 9),
(156, '368f87b1-394b-477e-91c6-d0dab443f6f2', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'ethnicity', 'asian', 9),
(157, '1d081781-f03c-423c-81de-626c875bff59', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'body_type', 'other', 9),
(158, 'c81ac9eb-4f16-4947-bbd3-0e021c460d4f', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'hair_color', 'blond/strawberry', 9),
(159, '432c6949-d5f7-47a2-8b86-8a291e101f63', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'nature', 'humorous', 9),
(160, 'ac2c2347-70c4-4c9f-b889-add10d8c0c73', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'friends', 'no_friends', 9),
(161, '25014789-d951-4c56-a811-e3e1213b4483', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'children', 'expecting', 9),
(162, '1be8ff46-1de9-446d-b275-a79451077b31', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'pets', 'none', 9),
(163, 'f74571df-1767-49c2-927b-16b59c78a53e', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'religion', 'catholic', 9),
(164, '848d790c-7729-43a1-a799-3fb82cc624b4', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'i_live_with', 'friends', 9),
(165, '9b627f78-a705-4203-8680-6a80ad7bfa42', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'car', 'my_own_car', 9),
(166, '8998b9ad-b4fa-4627-810a-0991d245c091', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'travel', 'yes_all_the_time', 9),
(167, '3e4d2202-ae2e-4cd3-846b-95f0158e8deb', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'smoke', 'i_some_sometimes', 9),
(168, 'eb506f3d-6fa4-495f-9d03-6b4e855bbe1d', '2026-05-26 17:48:54', '2026-05-26 17:48:54', 1, 1, 'drink', 'i_drink_sometimes', 9),
(169, '3d83c53f-65c0-47de-bce4-bb24c7287b48', '2026-05-29 23:54:08', '2026-05-29 23:54:08', 1, 1, 'nature', 'lively', 22),
(170, '3dc7b44b-d40f-4a7d-a321-5a61ba2308c6', '2026-05-29 23:54:15', '2026-05-29 23:54:15', 1, 1, 'friends', 'some_friends', 22),
(171, '34452b11-2595-4160-9cf6-705fc9e09712', '2026-05-29 23:54:21', '2026-05-29 23:54:21', 1, 1, 'car', 'none', 22),
(172, '98dc7277-9ac9-4041-b01c-d03aac65fabd', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'music_genre', 'jhjkhjk', 22),
(173, 'c67e9e75-7c3c-41e1-8aeb-b34d192d1014', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'singer', NULL, 22),
(174, '5a1efb3f-9bbc-4e50-9ba2-789acffa3154', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'song', NULL, 22),
(175, 'fb7acddb-e484-4e8b-9250-4935a0f8cdfd', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'hobby', NULL, 22),
(176, '263f899a-ef25-41f4-9d48-26a82718c6d2', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'sport', NULL, 22),
(177, '744e0bd3-6c11-4b42-8c91-802765ea44f8', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'book', NULL, 22),
(178, '115e6f5b-9e28-4d66-aeda-3bd64eb260de', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'dish', NULL, 22),
(179, '6af0f744-0cd9-436e-ade5-b74b5276132a', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'color', NULL, 22),
(180, '61d5f634-9e7b-4d26-98c6-9a1aa57fb6a3', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'movie', NULL, 22),
(181, '8d7f6f10-d22e-4316-8bb5-99a4430d6414', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'show', NULL, 22),
(182, 'b3e3be28-74e9-441f-9544-7b322c9c39b2', '2026-05-29 23:57:39', '2026-05-29 23:57:39', 1, 1, 'inspired_from', NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_uid` char(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `users__id` int(10) UNSIGNED NOT NULL,
  `expiry_at` datetime DEFAULT NULL,
  `credit_wallet_transactions__id` int(10) UNSIGNED DEFAULT NULL,
  `plan_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abuse_reports`
--
ALTER TABLE `abuse_reports`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_abuse_reports_users1_idx` (`for_users__id`),
  ADD KEY `fk_abuse_reports_users2_idx` (`by_users__id`),
  ADD KEY `fk_abuse_reports_users3_idx` (`moderated_by_users__id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_chats_users1_idx` (`from_users__id`),
  ADD KEY `fk_chats_users2_idx` (`to_users__id`),
  ADD KEY `fk_chats_items1_idx` (`items__id`),
  ADD KEY `fk_chats_users3_idx` (`users__id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cities_states1_idx` (`state_id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `credit_packages`
--
ALTER TABLE `credit_packages`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_credit_packages_users1_idx` (`users__id`);

--
-- Indexes for table `credit_wallet_transactions`
--
ALTER TABLE `credit_wallet_transactions`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_credit_wallet_transactions_users1_idx` (`users__id`),
  ADD KEY `fk_credit_wallet_transactions_financial_transactions1_idx` (`financial_transactions__id`);

--
-- Indexes for table `email_change_requests`
--
ALTER TABLE `email_change_requests`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD KEY `fk_email_change_requests_users1_idx` (`users__id`),
  ADD KEY `fk_email_change_requests_user_authorities1_idx` (`user_authorities__id`);

--
-- Indexes for table `financial_transactions`
--
ALTER TABLE `financial_transactions`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_financial_transactions_users1_idx` (`users__id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_gifts_user_authorities1_idx` (`user_authorities__id`);

--
-- Indexes for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_like_dislikes_users1_idx` (`to_users__id`),
  ADD KEY `fk_like_dislikes_users2_idx` (`by_users__id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_notifications_users1_idx` (`users__id`),
  ADD KEY `fk_notifications_users2_idx` (`from_users__id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD UNIQUE KEY `title_UNIQUE` (`title`),
  ADD KEY `fk_pages_users1_idx` (`users__id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`);

--
-- Indexes for table `profile_boosts`
--
ALTER TABLE `profile_boosts`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_profile_boosts_users1_idx` (`for_users__id`),
  ADD KEY `fk_profile_boosts_credit_wallet_transactions1_idx` (`credit_wallet_transactions__id`);

--
-- Indexes for table `profile_visitors`
--
ALTER TABLE `profile_visitors`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_profile_visitors_users1_idx` (`to_users__id`),
  ADD KEY `fk_profile_visitors_users2_idx` (`by_users__id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_like_packages`
--
ALTER TABLE `super_like_packages`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `super_like_packages__uid_unique` (`_uid`);

--
-- Indexes for table `super_like_wallet_transactions`
--
ALTER TABLE `super_like_wallet_transactions`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `super_like_wallet_transactions__uid_unique` (`_uid`),
  ADD KEY `super_like_wallet_transactions_users__id_index` (`users__id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`);

--
-- Indexes for table `user_authorities`
--
ALTER TABLE `user_authorities`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_authorities_users1_idx` (`users__id`),
  ADD KEY `fk_user_authorities_user_roles1_idx` (`user_roles__id`);

--
-- Indexes for table `user_block_users`
--
ALTER TABLE `user_block_users`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_block_users1_idx` (`to_users__id`),
  ADD KEY `fk_user_block_users2_idx` (`by_users__id`);

--
-- Indexes for table `user_encounters`
--
ALTER TABLE `user_encounters`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_encounters_users1_idx` (`by_users__id`),
  ADD KEY `fk_user_encounters_users2_idx` (`to_users__id`);

--
-- Indexes for table `user_gifts`
--
ALTER TABLE `user_gifts`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_gifts_users1_idx` (`from_users__id`),
  ADD KEY `fk_user_gifts_users2_idx` (`to_users__id`),
  ADD KEY `fk_user_gifts_items1_idx` (`items__id`),
  ADD KEY `fk_user_gifts_credit_wallet_transactions1_idx` (`credit_wallet_transactions__id`);

--
-- Indexes for table `user_items`
--
ALTER TABLE `user_items`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_items_users1_idx` (`users__id`),
  ADD KEY `fk_user_items_items1_idx` (`items__id`),
  ADD KEY `fk_user_items_credit_wallet_transactions1_idx` (`credit_wallet_transactions__id`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_photos_users1_idx` (`users__id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD KEY `fk_user_profiles_users1_idx` (`users__id`),
  ADD KEY `fk_user_profiles_countries1_idx` (`countries__id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `name` (`key_name`),
  ADD KEY `fk_user_settings_users1_idx` (`users__id`);

--
-- Indexes for table `user_specifications`
--
ALTER TABLE `user_specifications`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_favorites_users1_idx` (`users__id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_uid_UNIQUE` (`_uid`),
  ADD UNIQUE KEY `_uid` (`_uid`),
  ADD KEY `fk_user_subscriptions_users1_idx` (`users__id`),
  ADD KEY `fk_user_subscriptions_credit_wallet_transactions1_idx` (`credit_wallet_transactions__id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abuse_reports`
--
ALTER TABLE `abuse_reports`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `credit_packages`
--
ALTER TABLE `credit_packages`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `credit_wallet_transactions`
--
ALTER TABLE `credit_wallet_transactions`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `email_change_requests`
--
ALTER TABLE `email_change_requests`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_transactions`
--
ALTER TABLE `financial_transactions`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_boosts`
--
ALTER TABLE `profile_boosts`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile_visitors`
--
ALTER TABLE `profile_visitors`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `super_like_packages`
--
ALTER TABLE `super_like_packages`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_like_wallet_transactions`
--
ALTER TABLE `super_like_wallet_transactions`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_authorities`
--
ALTER TABLE `user_authorities`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_block_users`
--
ALTER TABLE `user_block_users`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_encounters`
--
ALTER TABLE `user_encounters`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_gifts`
--
ALTER TABLE `user_gifts`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_items`
--
ALTER TABLE `user_items`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_specifications`
--
ALTER TABLE `user_specifications`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abuse_reports`
--
ALTER TABLE `abuse_reports`
  ADD CONSTRAINT `fk_abuse_reports_users1` FOREIGN KEY (`for_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_abuse_reports_users2` FOREIGN KEY (`by_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_abuse_reports_users3` FOREIGN KEY (`moderated_by_users__id`) REFERENCES `users` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `fk_chats_items1` FOREIGN KEY (`items__id`) REFERENCES `items` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chats_users1` FOREIGN KEY (`from_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chats_users2` FOREIGN KEY (`to_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chats_users3` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_cities_states1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `credit_packages`
--
ALTER TABLE `credit_packages`
  ADD CONSTRAINT `fk_credit_packages_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `credit_wallet_transactions`
--
ALTER TABLE `credit_wallet_transactions`
  ADD CONSTRAINT `fk_credit_wallet_transactions_financial_transactions1` FOREIGN KEY (`financial_transactions__id`) REFERENCES `financial_transactions` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_credit_wallet_transactions_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `email_change_requests`
--
ALTER TABLE `email_change_requests`
  ADD CONSTRAINT `fk_email_change_requests_user_authorities1` FOREIGN KEY (`user_authorities__id`) REFERENCES `user_authorities` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_email_change_requests_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `financial_transactions`
--
ALTER TABLE `financial_transactions`
  ADD CONSTRAINT `fk_financial_transactions_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_gifts_user_authorities1` FOREIGN KEY (`user_authorities__id`) REFERENCES `user_authorities` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  ADD CONSTRAINT `fk_like_dislikes_users1` FOREIGN KEY (`to_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_dislikes_users2` FOREIGN KEY (`by_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notifications_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notifications_users2` FOREIGN KEY (`from_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `profile_boosts`
--
ALTER TABLE `profile_boosts`
  ADD CONSTRAINT `fk_profile_boosts_credit_wallet_transactions1` FOREIGN KEY (`credit_wallet_transactions__id`) REFERENCES `credit_wallet_transactions` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profile_boosts_users1` FOREIGN KEY (`for_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `profile_visitors`
--
ALTER TABLE `profile_visitors`
  ADD CONSTRAINT `fk_profile_visitors_users1` FOREIGN KEY (`to_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profile_visitors_users2` FOREIGN KEY (`by_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_authorities`
--
ALTER TABLE `user_authorities`
  ADD CONSTRAINT `fk_user_authorities_user_roles1` FOREIGN KEY (`user_roles__id`) REFERENCES `user_roles` (`_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_authorities_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_block_users`
--
ALTER TABLE `user_block_users`
  ADD CONSTRAINT `fk_user_block_users1` FOREIGN KEY (`to_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_block_users2` FOREIGN KEY (`by_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_encounters`
--
ALTER TABLE `user_encounters`
  ADD CONSTRAINT `fk_user_encounters_users1` FOREIGN KEY (`by_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_encounters_users2` FOREIGN KEY (`to_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_gifts`
--
ALTER TABLE `user_gifts`
  ADD CONSTRAINT `fk_user_gifts_credit_wallet_transactions1` FOREIGN KEY (`credit_wallet_transactions__id`) REFERENCES `credit_wallet_transactions` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_gifts_items1` FOREIGN KEY (`items__id`) REFERENCES `items` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_gifts_users1` FOREIGN KEY (`from_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_gifts_users2` FOREIGN KEY (`to_users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_items`
--
ALTER TABLE `user_items`
  ADD CONSTRAINT `fk_user_items_credit_wallet_transactions1` FOREIGN KEY (`credit_wallet_transactions__id`) REFERENCES `credit_wallet_transactions` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_items_items1` FOREIGN KEY (`items__id`) REFERENCES `items` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_items_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD CONSTRAINT `fk_user_photos_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `fk_user_profiles_countries1` FOREIGN KEY (`countries__id`) REFERENCES `countries` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_profiles_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `fk_user_settings_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_specifications`
--
ALTER TABLE `user_specifications`
  ADD CONSTRAINT `fk_user_favorites_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD CONSTRAINT `fk_user_subscriptions_credit_wallet_transactions1` FOREIGN KEY (`credit_wallet_transactions__id`) REFERENCES `credit_wallet_transactions` (`_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_subscriptions_users1` FOREIGN KEY (`users__id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
