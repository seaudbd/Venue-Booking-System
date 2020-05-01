-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2020 at 03:50 PM
-- Server version: 10.2.30-MariaDB-log-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hornsbyb_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocked_booking_dates`
--

CREATE TABLE `blocked_booking_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `background_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blocked_booking_dates`
--

INSERT INTO `blocked_booking_dates` (`id`, `venue_id`, `date`, `start_time`, `end_time`, `background_color`, `text_color`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, NULL, '2020-01-21', '00:00:00', '23:59:59', '#ff0000', '#f0f8ff', 'Active', '---', NULL, NULL, '2020-01-20 19:50:58', '2020-02-06 03:09:21'),
(4, NULL, '2020-02-08', '14:30:00', '18:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes , Children Feast of Dominion\r\nHBCL', NULL, NULL, '2020-01-26 22:14:12', '2020-02-05 01:54:46'),
(5, NULL, '2020-01-31', '01:30:00', '03:30:00', '#ff0000', '#f0f8ff', 'Active', '---', NULL, NULL, '2020-01-30 14:50:01', '2020-02-02 13:58:07'),
(7, NULL, '2020-03-07', '14:30:00', '18:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes, Children\'s feast of Ala ( Loftiness)-HBCL', NULL, NULL, '2020-02-02 01:52:11', '2020-02-05 01:55:51'),
(8, NULL, '2020-02-07', '19:30:00', '11:30:00', '#8080ff', '#000000', 'Active', 'Fireside - HBCL', NULL, NULL, '2020-02-05 00:57:23', '2020-02-05 01:13:08'),
(9, 1, '2020-02-09', '15:00:00', '20:00:00', '#8080ff', '#f0f8ff', 'Active', 'Unit Convention- HBCL', NULL, NULL, '2020-02-05 00:59:44', '2020-03-01 12:35:26'),
(10, 8, '2020-02-17', '19:30:00', '23:00:00', '#ffff80', '#000000', 'Active', 'LSA Meeting -LSA Room \r\n176-22', NULL, NULL, '2020-02-05 01:01:16', '2020-03-01 12:33:32'),
(12, 8, '2020-03-02', '20:15:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA Meeting- LSA Room\r\n176-23', NULL, NULL, '2020-02-05 01:10:20', '2020-03-01 12:33:06'),
(13, 1, '2020-03-06', '19:30:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', 'Fireside- Role of family\r\nHBCL', NULL, NULL, '2020-02-05 01:17:14', '2020-03-01 12:37:22'),
(14, 8, '2020-03-16', '20:15:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting- LSA room\r\n176-24', NULL, NULL, '2020-02-05 01:19:44', '2020-02-18 02:09:52'),
(15, 7, '2020-03-19', '17:45:00', '19:45:00', '#00cc00', '#000000', 'Active', 'Christine Foley Yoga -Unity hall', NULL, NULL, '2020-02-05 01:21:23', '2020-03-22 00:40:45'),
(16, 8, '2020-03-30', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room\r\n176-25', NULL, NULL, '2020-02-05 01:22:59', '2020-02-18 02:10:42'),
(17, NULL, '2020-04-07', '18:00:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', 'Large Feast of Sultan\r\nHBCL', NULL, NULL, '2020-02-05 01:24:44', '2020-02-05 01:24:44'),
(18, NULL, '2020-04-13', '19:30:00', '23:00:00', '#ffff00', '#f0f8ff', 'Active', 'LAS meeting- LAS room\r\n176-26', NULL, NULL, '2020-02-05 01:26:01', '2020-02-05 01:26:01'),
(19, NULL, '2020-04-19', '18:30:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', 'First of Ridvan -LSA Election\r\nHBCL', NULL, NULL, '2020-02-05 01:27:23', '2020-02-05 01:27:23'),
(20, 8, '2020-04-20', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting- LSA room', NULL, NULL, '2020-02-05 01:28:32', '2020-02-18 02:11:03'),
(21, NULL, '2020-04-27', '19:30:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', '9Th of Ridvan- HBCL', NULL, NULL, '2020-02-05 01:29:29', '2020-02-05 01:29:29'),
(22, NULL, '2020-04-30', '19:30:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', '12th of Ridvan- HBCL', NULL, NULL, '2020-02-05 01:35:22', '2020-02-05 01:35:22'),
(23, 8, '2020-05-04', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA Meeting- LSA room', NULL, NULL, '2020-02-05 01:36:14', '2020-02-18 02:11:27'),
(24, NULL, '2020-05-08', '19:30:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', 'Fireside - HBCL', NULL, NULL, '2020-02-05 01:39:43', '2020-02-05 01:39:43'),
(25, NULL, '2020-03-21', '14:30:00', '18:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- Children\'s feast of Splendour- HBCL', NULL, NULL, '2020-02-05 01:49:00', '2020-02-05 02:09:09'),
(27, NULL, '2020-02-22', '14:30:00', '16:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- HBCL', NULL, NULL, '2020-02-05 02:02:08', '2020-02-05 02:02:08'),
(28, NULL, '2020-03-28', '14:30:00', '16:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- HBCL', NULL, NULL, '2020-02-05 02:09:53', '2020-02-05 02:09:53'),
(29, NULL, '2020-04-04', '14:30:00', '16:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- HBCL', NULL, NULL, '2020-02-05 02:10:42', '2020-02-05 02:10:42'),
(30, NULL, '2020-04-11', '14:30:00', '18:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes-Children feast of Glory- HBCL', NULL, NULL, '2020-02-05 02:11:53', '2020-02-05 02:11:53'),
(32, 1, '2020-04-25', '14:30:00', '17:00:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- HBCL', NULL, NULL, '2020-02-05 02:13:02', '2020-03-01 06:34:15'),
(33, NULL, '2020-05-02', '14:30:00', '18:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- Children feast of Beauty- HBCL', NULL, NULL, '2020-02-05 02:14:01', '2020-02-05 02:14:01'),
(34, 1, '2020-05-09', '14:30:00', '17:00:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- HBCL', NULL, NULL, '2020-02-05 02:14:29', '2020-03-01 06:33:33'),
(35, NULL, '2020-05-16', '15:00:00', '23:30:00', '#8080ff', '#f0f8ff', 'Active', 'Deceleration of Bab- HBCL', NULL, NULL, '2020-02-05 02:16:40', '2020-02-05 02:24:40'),
(36, 1, '2020-05-23', '14:30:00', '17:00:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- HBCL', NULL, NULL, '2020-02-05 02:17:15', '2020-03-01 06:33:10'),
(37, 1, '2020-05-30', '14:30:00', '17:00:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- HBCL', NULL, NULL, '2020-02-05 02:17:45', '2020-03-01 06:32:45'),
(38, NULL, '2020-06-06', '14:30:00', '18:30:00', '#8080ff', '#f0f8ff', 'Active', 'Children classes- Children Fest of Light- HBCL', NULL, NULL, '2020-02-05 02:19:52', '2020-02-05 02:19:52'),
(39, 8, '2020-05-18', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA Meeting- LSA room', NULL, NULL, '2020-02-05 02:21:07', '2020-03-08 14:22:50'),
(40, NULL, '2020-06-01', '19:30:00', '23:00:00', '#ffff00', '#f0f8ff', 'Active', 'LAS meeting - LSA room', NULL, NULL, '2020-02-05 02:25:45', '2020-02-05 02:25:45'),
(41, NULL, '2020-06-03', '19:30:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', 'Large Feast of Nur - HBCL', NULL, NULL, '2020-02-05 02:27:09', '2020-02-05 02:27:09'),
(42, NULL, '2020-06-05', '19:30:00', '23:00:00', '#8080ff', '#f0f8ff', 'Active', 'Fireside', NULL, NULL, '2020-02-05 02:28:15', '2020-02-05 02:28:15'),
(43, 8, '2020-06-15', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA Meeting- LSA room', NULL, NULL, '2020-02-10 00:45:29', '2020-02-10 00:45:29'),
(44, 8, '2020-06-29', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting- LSA room', NULL, NULL, '2020-02-10 01:09:16', '2020-02-10 01:09:16'),
(45, 1, '2020-07-03', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside', NULL, NULL, '2020-02-10 01:15:13', '2020-02-10 01:15:13'),
(46, 1, '2020-07-12', '10:30:00', '14:00:00', '#8080ff', '#000000', 'Active', 'Large Feast of Kalimat', NULL, NULL, '2020-02-10 01:17:00', '2020-02-10 01:17:00'),
(47, 8, '2020-07-13', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA Meeting -LSA room', NULL, NULL, '2020-02-10 01:18:06', '2020-02-10 01:18:06'),
(48, 8, '2020-07-27', '19:31:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA Meeting- LSA room', NULL, NULL, '2020-02-10 01:19:13', '2020-02-10 01:19:13'),
(49, 1, '2020-08-07', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside', NULL, NULL, '2020-02-10 01:20:15', '2020-02-10 01:20:15'),
(51, 1, '2020-02-22', '18:00:00', '22:00:00', '#8080ff', '#000000', 'Active', 'Ms. Saryazdi\'s seminar', NULL, NULL, '2020-02-18 22:01:15', '2020-02-18 22:01:15'),
(52, 1, '2020-03-01', '17:00:00', '21:00:00', '#8080ff', '#000000', 'Active', 'Mini Feast groups 2&6', NULL, NULL, '2020-02-24 11:54:15', '2020-02-24 11:54:15'),
(53, 8, '2020-08-10', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting- LSA room', NULL, NULL, '2020-02-24 12:05:21', '2020-02-24 12:05:21'),
(54, 8, '2020-08-24', '19:28:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting- LSA room', NULL, NULL, '2020-02-24 12:07:58', '2020-02-24 12:07:58'),
(55, 1, '2020-09-04', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside -HBCL', NULL, NULL, '2020-02-24 12:09:03', '2020-02-24 12:12:10'),
(56, 1, '2020-08-06', '18:00:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Large feast of Izzat -HBCL', NULL, NULL, '2020-02-24 12:10:24', '2020-02-24 12:12:24'),
(57, 8, '2020-09-07', '19:29:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting -LSA room', NULL, NULL, '2020-02-24 12:16:45', '2020-02-24 12:16:45'),
(58, 8, '2020-09-21', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:17:59', '2020-02-24 12:17:59'),
(59, 1, '2020-10-02', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside - HBCL', NULL, NULL, '2020-02-24 12:19:09', '2020-02-24 12:19:09'),
(60, 8, '2020-10-05', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:21:01', '2020-02-24 12:21:01'),
(61, 1, '2020-10-17', '19:00:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Birth of Bob- HBCL', NULL, NULL, '2020-02-24 12:22:07', '2020-02-24 12:22:07'),
(62, 1, '2020-10-18', '08:00:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Birth of the Bob - HBCL', NULL, NULL, '2020-02-24 12:23:59', '2020-02-24 12:27:51'),
(63, 1, '2020-10-19', '08:00:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Birth of Baha\'u\'llah - HBCL', NULL, NULL, '2020-02-24 12:25:11', '2020-02-24 12:27:40'),
(64, 8, '2020-10-26', '07:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:26:09', '2020-02-24 12:26:09'),
(65, 1, '2020-11-06', '19:29:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside - HBCL', NULL, NULL, '2020-02-24 12:27:23', '2020-02-24 12:27:23'),
(66, 8, '2020-11-09', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:29:10', '2020-02-24 12:29:10'),
(67, 1, '2020-11-22', '10:30:00', '15:00:00', '#8080ff', '#000000', 'Active', 'Large feest of Qwal - HBCL', NULL, NULL, '2020-02-24 12:31:38', '2020-02-24 12:31:38'),
(68, 8, '2020-11-23', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:32:40', '2020-02-24 12:32:40'),
(69, 1, '2020-11-24', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Day of Covennant - HBCL', NULL, NULL, '2020-02-24 12:33:58', '2020-02-24 12:33:58'),
(70, 1, '2020-12-04', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside - HBCL', NULL, NULL, '2020-02-24 12:34:58', '2020-02-24 12:34:58'),
(71, 8, '2020-12-07', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:36:08', '2020-02-24 12:36:08'),
(72, 1, '2020-12-29', '20:00:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Feast of Sharaf - HBCL', NULL, NULL, '2020-02-24 12:39:41', '2020-02-24 12:39:41'),
(73, 8, '2021-01-11', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:40:54', '2020-02-24 12:40:54'),
(74, 8, '2021-01-25', '19:30:00', '23:00:00', '#ffff00', '#000000', 'Active', 'LSA meeting - LSA room', NULL, NULL, '2020-02-24 12:41:58', '2020-02-24 12:41:58'),
(75, 8, '2021-01-29', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside - HBCL', NULL, NULL, '2020-02-24 12:43:58', '2020-02-24 12:43:58'),
(76, 1, '2021-02-07', '10:30:00', '15:00:00', '#8080ff', '#000000', 'Active', 'Large feast of Mulk - HBCL', NULL, NULL, '2020-02-24 12:45:20', '2020-02-24 12:45:20'),
(77, 1, '2020-03-22', '16:00:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Large fest of Baha - HBCL', NULL, NULL, '2020-02-24 12:50:00', '2020-02-24 12:50:00'),
(78, 1, '2020-04-03', '19:30:00', '23:00:00', '#8080ff', '#000000', 'Active', 'Fireside - HBCL', NULL, NULL, '2020-02-24 12:51:43', '2020-02-24 12:51:43'),
(79, 1, '2020-04-20', '09:00:00', '23:00:00', '#ff8080', '#000000', 'Active', 'First of Ridvan - HBCL', NULL, NULL, '2020-02-24 12:54:37', '2020-02-24 12:54:37'),
(80, 1, '2020-07-09', '11:00:00', '14:30:00', '#8080ff', '#000000', 'Active', 'Martyrdom of Bab - HBCL', NULL, NULL, '2020-02-24 12:56:52', '2020-02-24 12:56:52'),
(81, 1, '2020-05-28', '03:00:00', '06:00:00', '#ff8080', '#000000', 'Active', 'Ascension of Baha\'u\'llah - Individual\'s hosting', NULL, NULL, '2020-02-24 12:59:46', '2020-02-24 12:59:46'),
(82, 1, '2020-02-06', '07:30:00', '23:00:00', '#ff8080', '#000000', 'Active', 'Mini Feast of Mulk', NULL, NULL, '2020-02-24 13:01:23', '2020-02-24 13:01:23'),
(83, 1, '2020-04-26', '17:30:00', '22:00:00', '#ff8080', '#000000', 'Active', 'Mini feast of Jamal -', NULL, NULL, '2020-02-24 13:06:33', '2020-02-24 13:06:33'),
(84, 1, '2020-05-15', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini fest of Azamat', NULL, NULL, '2020-02-24 13:11:33', '2020-02-24 13:11:33'),
(85, 1, '2020-06-22', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini feast of Rahmat', NULL, NULL, '2020-02-24 13:12:31', '2020-02-24 13:12:31'),
(86, 1, '2020-07-30', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini Fest of Kamal', NULL, NULL, '2020-02-24 13:13:42', '2020-02-24 13:13:42'),
(87, 1, '2020-08-18', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini feast of Asma', NULL, NULL, '2020-02-24 13:14:39', '2020-02-24 13:14:39'),
(88, 1, '2020-09-25', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini feast of Mashiyyat', NULL, NULL, '2020-02-24 13:15:30', '2020-02-24 13:15:30'),
(89, 1, '2020-10-14', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini feast of Ilm', NULL, NULL, '2020-02-24 13:16:14', '2020-02-24 13:16:48'),
(90, 1, '2020-11-02', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini feast of Qudrat', NULL, NULL, '2020-02-24 13:17:42', '2020-02-24 13:17:42'),
(91, 1, '2020-12-10', '19:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini feast of Masa\'il', NULL, NULL, '2020-02-24 13:19:04', '2020-02-24 13:19:04'),
(92, 1, '2020-11-27', '01:30:00', '03:30:00', '#6f6fff', '#000000', 'Active', 'Ascention of Abdu\'l-Baha', NULL, NULL, '2020-02-24 13:20:59', '2020-02-24 13:23:24'),
(93, 1, '2021-01-17', '20:30:00', '23:00:00', '#ffb0b0', '#000000', 'Active', 'Mini fest of - Soltan', NULL, NULL, '2020-02-24 13:22:41', '2020-02-24 13:22:41'),
(94, 1, '2020-06-27', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children feast of Mercy- HBCL', NULL, NULL, '2020-02-24 13:28:12', '2020-02-25 13:49:57'),
(95, 1, '2020-07-18', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Words - HBCL', NULL, NULL, '2020-02-24 13:29:40', '2020-02-25 13:49:31'),
(96, 1, '2020-08-01', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Perfection- HBCL', NULL, NULL, '2020-02-24 13:30:43', '2020-02-25 13:49:01'),
(97, 1, '2020-08-22', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Names- HBCL', NULL, NULL, '2020-02-24 13:31:41', '2020-02-25 13:48:39'),
(99, 1, '2020-09-26', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Will - HBCL', NULL, NULL, '2020-02-24 13:33:35', '2020-02-25 13:48:06'),
(100, 1, '2020-10-17', '17:00:00', '18:55:00', '#6f6fff', '#000000', 'Active', 'Children fest of Ilm- HBCL', NULL, NULL, '2020-02-24 13:36:00', '2020-02-25 13:47:42'),
(101, 1, '2020-11-07', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Power- HBCL', NULL, NULL, '2020-02-24 13:36:55', '2020-02-25 13:47:23'),
(102, 1, '2020-11-28', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Speach- HBCL', NULL, NULL, '2020-02-24 13:37:59', '2020-02-25 13:47:11'),
(103, 1, '2020-12-12', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Questions- HBCL', NULL, NULL, '2020-02-24 13:39:13', '2020-02-25 13:47:02'),
(104, 1, '2021-01-02', '17:00:00', '19:00:00', '#6f6fff', '#000000', 'Active', 'Children fest of Honour- HBCL', NULL, NULL, '2020-02-24 13:46:56', '2020-02-25 13:46:53'),
(105, 5, '2020-04-18', '12:00:00', '18:00:00', '#00bb00', '#000000', 'Active', 'The Hills community High Tea Fundraising- Unity hall', NULL, NULL, '2020-02-25 13:41:14', '2020-02-25 13:41:14'),
(106, 1, '2020-02-08', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:52:54', '2020-02-25 13:52:54'),
(107, 1, '2020-02-15', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:53:35', '2020-02-25 13:54:01'),
(108, 1, '2020-02-22', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:54:42', '2020-02-25 13:54:42'),
(109, 1, '2020-02-29', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:55:18', '2020-02-25 13:55:18'),
(111, 1, '2020-03-14', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:56:25', '2020-02-25 13:56:25'),
(112, 1, '2020-03-21', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:57:00', '2020-02-25 13:57:00'),
(113, 1, '2020-03-28', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:58:02', '2020-02-25 13:58:02'),
(114, 1, '2020-04-04', '14:30:00', '17:00:00', '#6f6fff', '#000000', 'Active', 'Baha\'i Children classes- HBCL', NULL, NULL, '2020-02-25 13:58:43', '2020-02-25 13:58:43'),
(115, 4, '2020-02-04', '19:00:00', '20:30:00', '#9bcdff', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189) Dorothy Rookwood Hall', NULL, NULL, '2020-02-26 10:25:08', '2020-03-08 13:52:10'),
(116, 4, '2020-02-11', '19:00:00', '20:30:00', '#0f87ff', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189) Dorothy Rookwood Hall', NULL, NULL, '2020-02-26 10:26:01', '2020-03-08 13:52:44'),
(117, 4, '2020-02-18', '19:00:00', '20:30:00', '#9bcdff', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189) Dorothy Rookwood Hall', NULL, NULL, '2020-02-26 10:26:33', '2020-03-08 13:53:27'),
(118, 4, '2020-02-25', '19:00:00', '20:30:00', '#9bcdff', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189) Dorothy Rookwood Hall', NULL, NULL, '2020-02-26 10:27:40', '2020-03-08 13:54:14'),
(119, 7, '2020-03-03', '19:00:00', '20:30:00', '#00cc00', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189) Unity Hall', NULL, NULL, '2020-02-26 10:28:38', '2020-03-05 14:17:40'),
(120, 7, '2020-03-10', '19:00:00', '20:30:00', '#00bb00', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189) Unity Hall', NULL, NULL, '2020-02-26 10:30:19', '2020-03-04 13:54:35'),
(121, 7, '2020-03-17', '19:00:00', '20:30:00', '#00cc00', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189) Unity Hall', NULL, NULL, '2020-02-26 10:32:35', '2020-03-05 14:19:24'),
(122, 7, '2020-03-24', '19:00:00', '20:30:00', '#00cc00', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189)  Unity Hall', NULL, NULL, '2020-02-26 10:33:09', '2020-03-05 14:20:15'),
(123, 7, '2020-03-31', '19:00:00', '20:30:00', '#00cc00', '#000000', 'Active', 'HKCC Yoga-( Leanne Meli , 94821189)  Unity Hall', NULL, NULL, '2020-02-26 10:33:50', '2020-03-05 14:21:15'),
(124, 7, '2020-02-06', '17:45:00', '19:45:00', '#00bb00', '#f0f8ff', 'Active', 'Christine Foley Yoga -0405398897\r\n Unity Hall', NULL, NULL, '2020-02-27 12:23:19', '2020-02-28 13:09:23'),
(125, 7, '2020-02-20', '17:45:00', '19:45:00', '#ff0000', '#f0f8ff', 'Active', 'Christine Foley Yoga -0405398897\r\n Unity Hall', NULL, NULL, '2020-02-27 12:23:56', '2020-02-28 13:07:54'),
(126, 7, '2020-03-05', '17:45:00', '19:45:00', '#00bb00', '#000000', 'Active', 'Christine Foley Yoga -0405398897\r\n Unity Hall', NULL, NULL, '2020-02-27 12:24:41', '2020-02-28 13:08:10'),
(127, 7, '2020-03-12', '17:45:00', '19:45:00', '#00bb00', '#000000', 'Active', 'Christine Foley Yoga -0405398897\r\n Unity Hall', NULL, NULL, '2020-02-27 12:25:18', '2020-02-28 13:08:18'),
(129, 7, '2020-03-26', '17:45:00', '19:45:00', '#00bb00', '#000000', 'Active', 'Christine Foley Yoga -0405398897\r\n Unity Hall', NULL, NULL, '2020-02-27 12:26:46', '2020-02-28 13:08:30'),
(130, 7, '2020-04-02', '17:45:00', '19:45:00', '#00bb00', '#000000', 'Active', 'Christine Foley Yoga -0405398897\r\n Unity Hall', NULL, NULL, '2020-02-27 12:27:24', '2020-02-28 13:08:40'),
(131, 4, '2020-01-05', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:10:41', '2020-02-28 01:10:41'),
(132, 4, '2020-01-12', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:11:29', '2020-02-28 01:11:29'),
(133, 4, '2020-01-19', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:12:18', '2020-02-28 01:12:18'),
(134, 4, '2020-01-26', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:12:55', '2020-02-28 01:12:55'),
(135, 4, '2020-02-02', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:13:28', '2020-02-28 01:13:28'),
(136, 4, '2020-02-09', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:14:32', '2020-02-28 01:14:32'),
(137, 4, '2020-02-16', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:15:45', '2020-02-28 01:16:04'),
(138, 4, '2020-03-01', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:17:54', '2020-02-28 01:17:54'),
(139, 4, '2020-03-08', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:18:32', '2020-02-28 01:18:32'),
(140, 4, '2020-03-15', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:19:11', '2020-02-28 01:19:11'),
(141, 4, '2020-03-22', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:19:45', '2020-02-28 01:19:45'),
(142, 4, '2020-04-05', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:21:07', '2020-02-28 01:21:07'),
(143, 4, '2020-04-12', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:21:46', '2020-02-28 01:21:46'),
(144, 4, '2020-04-19', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:22:32', '2020-02-28 01:22:32'),
(145, 4, '2020-04-26', '11:30:00', '13:30:00', '#59acff', '#000000', 'Active', 'Senal Church group- Dorothy Rookwood', NULL, NULL, '2020-02-28 01:23:34', '2020-02-28 01:23:34'),
(147, 7, '2020-01-08', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga\r\nUnity Hall -86267363', NULL, NULL, '2020-02-28 03:10:57', '2020-02-28 03:11:57'),
(148, 7, '2020-01-12', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga\r\nUnity Hall -86267363', NULL, NULL, '2020-02-28 03:13:39', '2020-02-28 03:18:50'),
(149, 7, '2020-01-15', '19:30:00', '20:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:15:00', '2020-02-28 03:17:55'),
(150, 7, '2020-01-19', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:15:45', '2020-02-28 03:19:44'),
(151, 7, '2020-02-05', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:27:51', '2020-02-28 03:27:51'),
(152, 7, '2020-02-12', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:28:22', '2020-02-28 03:28:22'),
(153, 7, '2020-02-19', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:29:01', '2020-02-28 03:29:01'),
(154, 7, '2020-02-26', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:30:19', '2020-02-28 03:30:19'),
(155, 7, '2020-03-04', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:30:59', '2020-02-28 03:31:21'),
(156, 7, '2020-03-11', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:31:55', '2020-02-28 04:43:06'),
(157, 7, '2020-03-18', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:32:35', '2020-02-28 03:32:35'),
(158, 7, '2020-03-25', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:33:16', '2020-02-28 03:33:16'),
(159, 7, '2020-04-01', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:34:26', '2020-02-28 03:34:26'),
(160, 7, '2020-04-08', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:35:04', '2020-02-28 03:35:04'),
(161, 7, '2020-04-15', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:35:55', '2020-02-28 03:35:55'),
(162, 7, '2020-04-22', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:36:35', '2020-02-28 03:36:35'),
(163, 7, '2020-04-29', '19:00:00', '20:00:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:37:03', '2020-02-28 03:37:03'),
(164, 7, '2020-02-02', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:38:18', '2020-02-28 03:38:18'),
(165, 7, '2020-02-09', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:39:18', '2020-02-28 03:39:18'),
(166, 7, '2020-02-16', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:40:12', '2020-02-28 03:40:12'),
(167, 7, '2020-02-23', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:40:47', '2020-02-28 03:40:47'),
(168, 7, '2020-03-01', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:41:36', '2020-02-28 03:41:36'),
(169, 7, '2020-03-08', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:42:28', '2020-02-28 03:42:28'),
(170, 7, '2020-03-15', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:43:12', '2020-02-28 03:43:12'),
(171, 7, '2020-03-22', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:43:42', '2020-02-28 03:45:07'),
(172, 7, '2020-03-29', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:44:26', '2020-02-28 03:44:26'),
(173, 7, '2020-04-05', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:46:12', '2020-02-28 03:46:12'),
(175, 7, '2020-04-19', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:47:21', '2020-02-28 03:47:21'),
(176, 7, '2020-04-26', '09:30:00', '10:45:00', '#00bb00', '#000000', 'Active', 'Mother Nurture Yoga- Caroline Bagga -86267363\r\nUnity Hall', NULL, NULL, '2020-02-28 03:47:53', '2020-02-28 03:47:53'),
(178, 8, '2020-03-03', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:20:40', '2020-03-01 06:23:40'),
(179, 8, '2020-03-10', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:21:19', '2020-03-01 06:23:23'),
(180, 8, '2020-03-17', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:22:47', '2020-03-01 06:22:47'),
(181, 8, '2020-03-24', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:24:52', '2020-03-01 06:24:52'),
(182, 8, '2020-03-31', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:26:48', '2020-03-01 06:26:48'),
(183, 8, '2020-04-07', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:27:44', '2020-03-01 06:27:44'),
(184, 8, '2020-04-14', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:28:54', '2020-03-08 14:18:47'),
(185, 8, '2020-04-21', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:30:14', '2020-03-01 06:30:14'),
(186, 8, '2020-04-28', '17:30:00', '20:00:00', '#ffff00', '#000000', 'Active', 'JY (Nabile) LSA room- every Tuesday', NULL, NULL, '2020-03-01 06:31:10', '2020-03-01 06:31:10'),
(187, 1, '2020-09-09', '09:00:00', '23:30:00', '#8080ff', '#000000', 'Active', 'Choral Festival -Katerina Lap - 0412889139 \r\nWhole HBCL', NULL, NULL, '2020-03-05 14:30:00', '2020-03-05 14:30:00'),
(188, 1, '2020-09-10', '09:00:00', '23:30:00', '#8080ff', '#000000', 'Active', 'Choral Festival -Katerina Lap - 0412889139 \r\nWhole HBCL', NULL, NULL, '2020-03-05 14:32:11', '2020-03-05 14:32:11'),
(189, 1, '2020-09-11', '09:00:00', '23:30:00', '#8080ff', '#000000', 'Active', 'Choral Festival -Katerina Lap - 0412889139 \r\nWhole HBCL', NULL, NULL, '2020-03-05 14:33:59', '2020-03-05 14:33:59'),
(190, 1, '2020-09-12', '09:00:00', '23:30:00', '#8080ff', '#000000', 'Active', 'Choral Festival -Katerina Lap - 0412889139 \r\nWhole HBCL', NULL, NULL, '2020-03-05 14:39:51', '2020-03-05 14:39:51'),
(191, 1, '2020-09-13', '09:00:00', '18:00:00', '#8080ff', '#000000', 'Active', 'Choral Festival -Katerina Lap - 0412889139 \r\nWhole HBCL', NULL, NULL, '2020-03-05 14:42:20', '2020-03-05 14:42:20'),
(192, 8, '2020-04-13', '19:30:00', '23:00:00', '#ffff35', '#000000', 'Active', 'LSA Meeting 176-26 - LSA room', NULL, NULL, '2020-03-08 14:27:00', '2020-03-08 14:27:00'),
(193, 8, '2020-03-14', '10:00:00', '15:00:00', '#ffff80', '#000000', 'Active', 'Rouhi Book 1- Nabil- LSA room', NULL, NULL, '2020-03-13 11:17:02', '2020-03-13 11:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interested_in` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `company_name`, `email`, `phone`, `interested_in`, `message`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Asraf Ud Duha', 'ABC Inc.', 'seaudbd@gmail.com', '8801776648825', 'Meeting Room', 'Testing Message', NULL, NULL, NULL, NULL, '2019-12-21 12:31:13', '2019-12-21 12:31:13'),
(2, 'Adam', 'Test PTY', 'test@abcd.org.au', 'Jones', 'Meeting Room', 'This is a test request -----', NULL, NULL, NULL, NULL, '2020-01-09 18:13:15', '2020-01-09 18:13:15'),
(3, 'Bora Lee', 'CreamHaus Australia', 'bora.lee0406@outlook.com', '425147425', 'Meeting Room', 'Hi\r\n\r\nCan I please have a reservation for \r\n\r\n1. My son\'s birthday in 30 May\r\n2. Company anniversary meeting June.\r\n\r\nFor the birthday I will have from 10am to 4pm.\r\nEstimated people 40 to 50 people including kids.\r\n\r\nI will bring my own finger foods etc.\r\n\r\nPlease advise me if anything requires.', NULL, NULL, NULL, NULL, '2020-01-16 16:59:02', '2020-01-16 16:59:02'),
(4, 'Nadine Brischke', 'Namaskaar Yoga', 'nadinebrischke@gmail.com', '0413537448', 'Meeting Room', 'Hello, I am enquiring on behalf of Malabi, I was wondering if we could please set up a meeting to \r\ndiscuss a regular hire of a room for a yoga class. We were hoping to have a Monday evening slot. Thanx so much \r\nNadine Brischke \r\n0413537448', NULL, NULL, NULL, NULL, '2020-02-19 18:18:42', '2020-02-19 18:18:42'),
(5, 'Katrina Lapp', 'Australian Bahai\' Choral Festival', 'Katrina.Lapp@gmail.com', '0412 889139', 'Meeting Room', 'We would like to book Hornsby BCL (not just a meeting room)for the usual 5 full days Wednesday 9 Sep to Sunday 13 September 2020. The insurance certificate you have on file is valid until August 2020 and we will email a copy once renewed. Please check those dates and hopefully you can confirm our booking soonest.', NULL, NULL, NULL, NULL, '2020-03-01 08:11:20', '2020-03-01 08:11:20'),
(6, 'Katrina Lapp', 'Australian Bahai\' Choral Festival', 'Katrina.Lapp@gmail.com', '0412 889139', 'Meeting Room', 'We would like to book Hornsby BCL for the usual 5 full days Wednesday 9 Sep to Sunday 13 September 2020. The insurance certificate you have on file is valid until August 2020 and we will email a copy once renewed. Please check those dates and hopefully you can confirm our booking soonest.', NULL, NULL, NULL, NULL, '2020-03-01 08:20:00', '2020-03-01 08:20:00'),
(7, 'Katrina Lapp', 'Australian Bahai\' Choral Festival', 'Katrina.Lapp@gmail.com', '0412 889139', 'Meeting Room', 'We would like to book Hornsby BCL for the usual 5 full days Wednesday 9 Sep to Sunday 13 September 2020. The insurance certificate you have on file is valid until August 2020 and we will email a copy once renewed. Please check those dates and hopefully you can confirm our booking soonest.', NULL, NULL, NULL, NULL, '2020-03-02 01:30:44', '2020-03-02 01:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `contact_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `number`, `login_id`, `name`, `company_name`, `address`, `email`, `contact_number`, `photo`, `password`, `verification_code`, `access_code`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, '100005', 'seaudbd@gmail.com', 'Asraf Ud Duha', 'ABC INC.', 'Dhaka', 'seaudbd@gmail.com', '01776648825', '---', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'SLXOQS', '---', 'Casual', '---', 0, NULL, '2019-12-29 18:09:19', '2020-01-02 15:13:50'),
(10, '100008', 'Info@creamhaus.com.au', 'Bora Lee', 'CreamHaus Australia', '2/4\r\nBridge Rd hornsby q', 'Info@creamhaus.com.au', '425147425', '---', '97ab5a33d205449a0bba04a7fcd7c6aaa07944bb', '---', '---', 'Casual', '---', 0, NULL, '2020-01-16 05:13:44', '2020-01-16 05:13:44'),
(11, '100009', 'moboodi@tpg.com.au', 'Mehran Oboodi', 'Private', '88\r\nMalton Road', 'moboodi@tpg.com.au', '0409038660', '---', '718eea10ccea4a6f08bd14578bdb1ae6ea5692df', '---', '---', 'Casual', '---', 0, NULL, '2020-02-20 16:19:43', '2020-02-20 16:19:43'),
(12, '100010', 'ssamimi8@gmail.com', 'Saman Samimi', 'Samimi Incorporated', '19 Dural Street\r\nHornsby NSW 2077', 'ssamimi8@gmail.com', '0416119412', '---', 'e867856f71e6ef73b610f51150bd87657d6670b6', '---', '---', 'Casual', '---', 0, NULL, '2020-02-20 17:15:58', '2020-02-20 17:15:58'),
(13, '100011', 'daryush.ashjari@optusnet.com.au', 'Daryush', 'Ashjari', '4 Namo Street North Epping', 'daryush.ashjari@optusnet.com.au', '0449859909', '---', 'd45407c3fdb4d3f47bdf9ed3dcc36e701ed1a58d', '---', '---', 'Casual', '---', 0, NULL, '2020-02-24 03:36:42', '2020-02-24 03:36:42'),
(14, '100012', 'Katrina.Lapp@gmail.comj', 'Katrina Lapp', 'Australian Bahai\' Choral Festival', '1/1 Centre Court Burwood VIC 3125', 'Katrina.Lapp@gmail.comj', '0412 889139', '---', '547c43d3bc4a0aab904db95e713f8463884c545d', '---', '---', 'Casual', '---', 0, NULL, '2020-03-01 08:16:55', '2020-03-01 08:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bookings`
--

CREATE TABLE `customer_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `venue_id` int(10) UNSIGNED DEFAULT NULL,
  `arrival_date_time` datetime DEFAULT NULL,
  `starting_date_time` datetime DEFAULT NULL,
  `ending_date_time` datetime DEFAULT NULL,
  `number_of_children` int(10) UNSIGNED DEFAULT NULL,
  `number_of_adult` int(10) UNSIGNED DEFAULT NULL,
  `price_per_hour` double UNSIGNED DEFAULT NULL,
  `total_hour` double UNSIGNED DEFAULT NULL,
  `cleaning_fee` double UNSIGNED DEFAULT NULL,
  `city_fee` double UNSIGNED DEFAULT NULL,
  `security_deposit_amount` double UNSIGNED DEFAULT NULL,
  `security_deposit_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_bookings`
--

INSERT INTO `customer_bookings` (`id`, `invoice_number`, `customer_id`, `venue_id`, `arrival_date_time`, `starting_date_time`, `ending_date_time`, `number_of_children`, `number_of_adult`, `price_per_hour`, `total_hour`, `cleaning_fee`, `city_fee`, `security_deposit_amount`, `security_deposit_status`, `result`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(19, '5E4F239B4FFA5', 11, 1, '2020-03-10 07:00:00', '2020-03-10 07:00:00', '2020-03-10 08:00:00', 0, 50, 1, 1, 0, 0, 0, 'Paid', '{\n    \"id\": \"PAYID-LZHSHHA9SG61865CT0880036\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"31C051021S306180N\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"Moboodi@TPG.com.au\",\n            \"first_name\": \"Sami\",\n            \"last_name\": \"Oboodi\",\n            \"payer_id\": \"RUA4JYEUWBVS8\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Sami Oboodi\",\n                \"line1\": \"1/2 parramatta road\",\n                \"city\": \"granville\",\n                \"state\": \"NSW\",\n                \"postal_code\": \"2142\",\n                \"country_code\": \"AU\"\n            },\n            \"country_code\": \"AU\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"1.00\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"1.00\",\n                    \"tax\": \"0.00\",\n                    \"shipping\": \"0.00\",\n                    \"insurance\": \"0.00\",\n                    \"handling_fee\": \"0.00\",\n                    \"shipping_discount\": \"0.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"FCAGQ3YTQVBVE\",\n                \"email\": \"hornsbybahaicentre@gmail.com\"\n            },\n            \"description\": \"Payment description\",\n            \"invoice_number\": \"5E4F239B4FFA5\",\n            \"soft_descriptor\": \"PAYPAL *HBCL\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Regular Hirer UNITY HALL and DOROTHY ROCKWOOD HALL (Both halls )\",\n                        \"sku\": \"5063\",\n                        \"price\": \"1.00\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Sami Oboodi\",\n                    \"line1\": \"1/2 parramatta road\",\n                    \"city\": \"granville\",\n                    \"state\": \"NSW\",\n                    \"postal_code\": \"2142\",\n                    \"country_code\": \"AU\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"4YD541695F636453E\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"1.00\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"1.00\",\n                                \"tax\": \"0.00\",\n                                \"shipping\": \"0.00\",\n                                \"insurance\": \"0.00\",\n                                \"handling_fee\": \"0.00\",\n                                \"shipping_discount\": \"0.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"0.33\",\n                            \"currency\": \"USD\"\n                        },\n                        \"receivable_amount\": {\n                            \"value\": \"1.00\",\n                            \"currency\": \"USD\"\n                        },\n                        \"exchange_rate\": \"0.63433328928241\",\n                        \"parent_payment\": \"PAYID-LZHSHHA9SG61865CT0880036\",\n                        \"create_time\": \"2020-02-21T00:29:04Z\",\n                        \"update_time\": \"2020-02-21T00:29:04Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/4YD541695F636453E\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/4YD541695F636453E/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZHSHHA9SG61865CT0880036\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ],\n                        \"soft_descriptor\": \"PAYPAL *HBCL\"\n                    }\n                }\n            ]\n        }\n    ],\n    \"redirect_urls\": {\n        \"return_url\": \"http://hornsbybahais.org.au/booking/customer/payment/execute?paymentId=PAYID-LZHSHHA9SG61865CT0880036\",\n        \"cancel_url\": \"http://hornsbybahais.org.au/booking/customer/payment/cancel\"\n    },\n    \"create_time\": \"2020-02-21T00:26:04Z\",\n    \"update_time\": \"2020-02-21T00:29:04Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZHSHHA9SG61865CT0880036\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ],\n    \"failed_transactions\": []\n}', 'Reserved', '---', 11, NULL, '2020-02-20 16:29:06', '2020-02-20 16:29:06'),
(21, '5E4F372AC4707', 12, 1, '2020-02-10 10:00:00', '2020-02-10 10:00:00', '2020-02-10 11:00:00', 4, 50, 1, 1, 0, 0, 0, 'Paid', '{\n    \"id\": \"PAYID-LZHTOLA8HD409941B605913B\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"0CB07234RT6411819\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"ssamimi8@gmail.com\",\n            \"first_name\": \"Saman\",\n            \"last_name\": \"Samimi\",\n            \"payer_id\": \"HU2SLUDDXFNX8\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Saman Samimi\",\n                \"line1\": \"86 South Street\",\n                \"city\": \"Rydalemere\",\n                \"state\": \"NSW\",\n                \"postal_code\": \"2116\",\n                \"country_code\": \"AU\"\n            },\n            \"country_code\": \"AU\",\n            \"business_name\": \"Parts Alliance P/L\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"1.00\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"1.00\",\n                    \"tax\": \"0.00\",\n                    \"shipping\": \"0.00\",\n                    \"insurance\": \"0.00\",\n                    \"handling_fee\": \"0.00\",\n                    \"shipping_discount\": \"0.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"FCAGQ3YTQVBVE\",\n                \"email\": \"hornsbybahaicentre@gmail.com\"\n            },\n            \"description\": \"Payment description\",\n            \"invoice_number\": \"5E4F372AC4707\",\n            \"soft_descriptor\": \"PAYPAL *HBCL\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Regular Hirer UNITY HALL and DOROTHY ROCKWOOD HALL (Both halls )\",\n                        \"sku\": \"5063\",\n                        \"price\": \"1.00\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Saman Samimi\",\n                    \"line1\": \"86 South Street\",\n                    \"city\": \"Rydalemere\",\n                    \"state\": \"NSW\",\n                    \"postal_code\": \"2116\",\n                    \"country_code\": \"AU\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"9VA05161AU349120T\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"1.00\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"1.00\",\n                                \"tax\": \"0.00\",\n                                \"shipping\": \"0.00\",\n                                \"insurance\": \"0.00\",\n                                \"handling_fee\": \"0.00\",\n                                \"shipping_discount\": \"0.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"0.33\",\n                            \"currency\": \"USD\"\n                        },\n                        \"receivable_amount\": {\n                            \"value\": \"1.00\",\n                            \"currency\": \"USD\"\n                        },\n                        \"exchange_rate\": \"0.63433328928241\",\n                        \"parent_payment\": \"PAYID-LZHTOLA8HD409941B605913B\",\n                        \"create_time\": \"2020-02-21T01:49:50Z\",\n                        \"update_time\": \"2020-02-21T01:49:50Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/9VA05161AU349120T\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/9VA05161AU349120T/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZHTOLA8HD409941B605913B\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ],\n                        \"soft_descriptor\": \"PAYPAL *HBCL\"\n                    }\n                }\n            ]\n        }\n    ],\n    \"redirect_urls\": {\n        \"return_url\": \"http://hornsbybahais.org.au/booking/customer/payment/execute?paymentId=PAYID-LZHTOLA8HD409941B605913B\",\n        \"cancel_url\": \"http://hornsbybahais.org.au/booking/customer/payment/cancel\"\n    },\n    \"create_time\": \"2020-02-21T01:49:32Z\",\n    \"update_time\": \"2020-02-21T01:49:50Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZHTOLA8HD409941B605913B\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ],\n    \"failed_transactions\": []\n}', 'Reserved', '---', 12, NULL, '2020-02-20 17:49:51', '2020-02-20 17:49:51'),
(23, '5E531ADA6E27E', 13, 1, '2020-02-25 09:00:00', '2020-02-25 09:00:00', '2020-02-25 10:00:00', 0, 30, 1, 1, 0, 0, 0, 'Paid', '{\n    \"id\": \"PAYID-LZJRVXA9UH00967AA798884T\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"1DE83069W3009412L\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"daryush.ashjari@optusnet.com.au\",\n            \"first_name\": \"Daryush\",\n            \"last_name\": \"Ashjari\",\n            \"payer_id\": \"VGBZVWQG2G4KC\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Daryush Ashjari\",\n                \"line1\": \"No 4\",\n                \"line2\": \"Namoi Street\",\n                \"city\": \"North Epping\",\n                \"state\": \"NSW\",\n                \"postal_code\": \"2121\",\n                \"country_code\": \"AU\"\n            },\n            \"country_code\": \"AU\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"1.00\",\n                \"currency\": \"AUD\",\n                \"details\": {\n                    \"subtotal\": \"1.00\",\n                    \"tax\": \"0.00\",\n                    \"shipping\": \"0.00\",\n                    \"insurance\": \"0.00\",\n                    \"handling_fee\": \"0.00\",\n                    \"shipping_discount\": \"0.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"FCAGQ3YTQVBVE\",\n                \"email\": \"hornsbybahaicentre@gmail.com\"\n            },\n            \"description\": \"Payment description\",\n            \"invoice_number\": \"5E531ADA6E27E\",\n            \"soft_descriptor\": \"PAYPAL *HBCL\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Regular Hirer UNITY HALL and DOROTHY ROCKWOOD HALL (Both halls )\",\n                        \"sku\": \"5063\",\n                        \"price\": \"1.00\",\n                        \"currency\": \"AUD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Daryush Ashjari\",\n                    \"line1\": \"No 4\",\n                    \"line2\": \"Namoi Street\",\n                    \"city\": \"North Epping\",\n                    \"state\": \"NSW\",\n                    \"postal_code\": \"2121\",\n                    \"country_code\": \"AU\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"0BF27299CJ5159348\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"1.00\",\n                            \"currency\": \"AUD\",\n                            \"details\": {\n                                \"subtotal\": \"1.00\",\n                                \"tax\": \"0.00\",\n                                \"shipping\": \"0.00\",\n                                \"insurance\": \"0.00\",\n                                \"handling_fee\": \"0.00\",\n                                \"shipping_discount\": \"0.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"payment_hold_status\": \"HELD\",\n                        \"payment_hold_reasons\": [\n                            \"PAYMENT_HOLD\"\n                        ],\n                        \"transaction_fee\": {\n                            \"value\": \"0.33\",\n                            \"currency\": \"AUD\"\n                        },\n                        \"parent_payment\": \"PAYID-LZJRVXA9UH00967AA798884T\",\n                        \"create_time\": \"2020-02-24T00:38:58Z\",\n                        \"update_time\": \"2020-02-24T00:38:58Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/0BF27299CJ5159348\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/0BF27299CJ5159348/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZJRVXA9UH00967AA798884T\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ],\n                        \"soft_descriptor\": \"PAYPAL *HBCL\"\n                    }\n                }\n            ]\n        }\n    ],\n    \"redirect_urls\": {\n        \"return_url\": \"http://hornsbybahais.org.au/booking/customer/payment/execute?paymentId=PAYID-LZJRVXA9UH00967AA798884T\",\n        \"cancel_url\": \"http://hornsbybahais.org.au/booking/customer/payment/cancel\"\n    },\n    \"create_time\": \"2020-02-24T00:37:48Z\",\n    \"update_time\": \"2020-02-24T00:38:58Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZJRVXA9UH00967AA798884T\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ],\n    \"failed_transactions\": []\n}', 'Reserved', '---', 13, NULL, '2020-02-24 03:38:59', '2020-02-24 03:38:59'),
(24, '5E539B59A9F7C', 11, 1, '2020-02-26 09:00:00', '2020-02-26 08:00:00', '2020-02-26 12:00:00', 0, 10, 1, 4, 0, 0, 0, 'Paid', '{\n    \"id\": \"PAYID-LZJZWWY9EN722958L656703H\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"0J570805HF152994P\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"Moboodi@TPG.com.au\",\n            \"first_name\": \"Sami\",\n            \"last_name\": \"Oboodi\",\n            \"payer_id\": \"RUA4JYEUWBVS8\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Sami Oboodi\",\n                \"line1\": \"1/2 parramatta road\",\n                \"city\": \"granville\",\n                \"state\": \"NSW\",\n                \"postal_code\": \"2142\",\n                \"country_code\": \"AU\"\n            },\n            \"country_code\": \"AU\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"4.00\",\n                \"currency\": \"AUD\",\n                \"details\": {\n                    \"subtotal\": \"4.00\",\n                    \"tax\": \"0.00\",\n                    \"shipping\": \"0.00\",\n                    \"insurance\": \"0.00\",\n                    \"handling_fee\": \"0.00\",\n                    \"shipping_discount\": \"0.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"FCAGQ3YTQVBVE\",\n                \"email\": \"hornsbybahaicentre@gmail.com\"\n            },\n            \"description\": \"Payment description\",\n            \"invoice_number\": \"5E539B59A9F7C\",\n            \"soft_descriptor\": \"PAYPAL *HBCL\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Regular Hirer UNITY HALL and DOROTHY ROCKWOOD HALL (Both halls )\",\n                        \"sku\": \"5063\",\n                        \"price\": \"4.00\",\n                        \"currency\": \"AUD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Sami Oboodi\",\n                    \"line1\": \"1/2 parramatta road\",\n                    \"city\": \"granville\",\n                    \"state\": \"NSW\",\n                    \"postal_code\": \"2142\",\n                    \"country_code\": \"AU\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"5D785780G6654054P\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"4.00\",\n                            \"currency\": \"AUD\",\n                            \"details\": {\n                                \"subtotal\": \"4.00\",\n                                \"tax\": \"0.00\",\n                                \"shipping\": \"0.00\",\n                                \"insurance\": \"0.00\",\n                                \"handling_fee\": \"0.00\",\n                                \"shipping_discount\": \"0.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"payment_hold_status\": \"HELD\",\n                        \"payment_hold_reasons\": [\n                            \"PAYMENT_HOLD\"\n                        ],\n                        \"transaction_fee\": {\n                            \"value\": \"0.40\",\n                            \"currency\": \"AUD\"\n                        },\n                        \"parent_payment\": \"PAYID-LZJZWWY9EN722958L656703H\",\n                        \"create_time\": \"2020-02-24T09:46:59Z\",\n                        \"update_time\": \"2020-02-24T09:46:59Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/5D785780G6654054P\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/sale/5D785780G6654054P/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZJZWWY9EN722958L656703H\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ],\n                        \"soft_descriptor\": \"PAYPAL *HBCL\"\n                    }\n                }\n            ]\n        }\n    ],\n    \"redirect_urls\": {\n        \"return_url\": \"http://hornsbybahais.org.au/booking/customer/payment/execute?paymentId=PAYID-LZJZWWY9EN722958L656703H\",\n        \"cancel_url\": \"http://hornsbybahais.org.au/booking/customer/payment/cancel\"\n    },\n    \"create_time\": \"2020-02-24T09:46:03Z\",\n    \"update_time\": \"2020-02-24T09:46:59Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.paypal.com/v1/payments/payment/PAYID-LZJZWWY9EN722958L656703H\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ],\n    \"failed_transactions\": []\n}', 'Reserved', '---', 11, NULL, '2020-02-24 12:47:01', '2020-02-24 12:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer_menus`
--

CREATE TABLE `customer_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `root_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operation_list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibilities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibility_count` tinyint(3) UNSIGNED DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_menus`
--

INSERT INTO `customer_menus` (`id`, `root_id`, `menu`, `route_group`, `method`, `route`, `controller`, `action`, `operation_list`, `accessibilities`, `accessibility_count`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'Customer', 'get', 'customer/dashboard/{id}', 'DashboardController', 'index', NULL, NULL, NULL, 1, 'Active', '---', 1, NULL, '2019-04-02 09:13:39', '2019-04-23 07:34:58'),
(2, 0, 'Profile', 'Customer', 'get', 'customer/profile/{id}', 'ProfileController', 'index', NULL, NULL, NULL, 4, 'Active', '---', 1, NULL, '2019-03-31 18:00:00', '2019-04-23 01:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `root_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operation_list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibilities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibility_count` tinyint(3) UNSIGNED DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `root_id`, `menu`, `route_group`, `method`, `route`, `controller`, `action`, `operation_list`, `accessibilities`, `accessibility_count`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'Admin', 'get', 'admin/dashboard/{id}', 'DashboardController', 'index', NULL, NULL, NULL, 1, 'Active', '---', 1, NULL, '2019-03-31 17:13:39', '2019-04-21 15:34:58'),
(2, 0, 'Operation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Active', '', 1, NULL, '2019-03-31 17:13:39', '2019-04-21 15:34:58'),
(3, 2, 'Customer', 'Admin\\Operation', 'get,get,get,post,post,post,get,post,get,post', 'admin/operation/customer/{id},admin/operation/customer/gets/{search_string}/{record_per_page},admin/operation/customer/get/{id},admin/operation/customer/save,admin/operation/customer/apply/bulk/operation,admin/operation/customer/change/status,admin/operation/customer/get/bookings/by/customer/id,admin/operation/customer/delete,admin/operation/customer/get/access/code,admin/operation/customer/save/access/code', 'CustomerController', 'index,gets,get,save,applyBulkOperation,changeStatus,getBookings,delete,getAccessCode,saveAccessCode', 'activeMenuValue:Operation,activeSubMenuValue:Customer,activeMenuId:2,activeSubMenuId:3,recordPerPage:10', NULL, NULL, 3, 'Active', '---', 1, NULL, '2019-03-30 02:00:00', '2019-04-21 09:34:59'),
(4, 2, 'Booking and Reservation', 'Admin\\Operation', 'get,get,get,post,post,post', 'admin/operation/booking/and/reservation/{id},admin/operation/booking/and/reservation/gets/{date_from}/{date_to}/{start_date}/{end_date}/{status}/{venue_id}/{customer_id}/{record_per_page},admin/operation/booking/and/reservation/get/{id},admin/operation/booking/and/reservation/save,admin/operation/booking/and/reservation/apply/bulk/operation,admin/operation/booking/and/reservation/delete', 'BookingAndReservationController', 'index,gets,get,save,applyBulkOperation,delete', 'activeMenuValue:Operation,activeSubMenuValue:Booking and Reservation,activeMenuId:2,activeSubMenuId:4,recordPerPage:10', NULL, NULL, 3, 'Active', '---', 1, NULL, '2019-03-30 02:00:00', '2019-04-21 09:34:59'),
(5, 2, 'Blocked Booking Date', 'Admin\\Operation', 'get,get,get,post,post,post,post', 'admin/operation/blocked/booking/date/{id},admin/operation/blocked/booking/date/gets/{search_string}/{record_per_page},admin/operation/blocked/booking/date/get/{id},admin/operation/blocked/booking/date/single/save,admin/operation/blocked/booking/date/bulk/save,admin/operation/blocked/booking/date/apply/bulk/operation,admin/operation/blocked/booking/date/delete', 'BlockedBookingDateController', 'index,gets,get,saveSingle,saveBulk,applyBulkOperation,delete', 'activeMenuValue:Operation,activeSubMenuValue:Blocked Booking Date,activeMenuId:2,activeSubMenuId:5,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2020-01-01 14:00:00', NULL),
(6, 0, 'Configuration', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Active', '', 1, NULL, '2019-03-31 17:13:39', '2019-04-21 15:34:58'),
(7, 6, 'Venue', 'Admin\\Configuration', 'get,get,get,post,post,post', 'admin/configuration/venue/{id},admin/configuration/venue/gets/{search_string}/{record_per_page},admin/configuration/venue/get/{id},admin/configuration/venue/save,admin/configuration/venue/apply/bulk/operation,admin/configuration/venue/delete/image', 'VenueController', 'index,gets,get,save,applyBulkOperation,deleteImage', 'activeMenuValue:Configuration,activeSubMenuValue:Venue,activeMenuId:6,activeSubMenuId:7,recordPerPage:10', NULL, NULL, 6, 'Active', '---', 1, NULL, '2019-03-30 08:00:00', '2019-04-21 15:34:59'),
(8, 0, 'Report', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'Active', '', 1, NULL, '2019-03-30 11:48:44', '2019-04-21 15:34:59'),
(9, 8, 'Booking and Reservation', 'Admin\\Report', 'get,get,get', 'admin/report/booking/and/reservation/{id},admin/report/booking/and/reservation/gets/{date_from}/{date_to}/{start_date}/{end_date}/{status}/{venue_id}/{customer_id},admin/report/booking/and/reservation/generate/report', 'BookingAndReservationController', 'index,gets,generateReport', 'activeMenuValue:Report,activeSubMenuValue:Booking and Reservation,activeMenuId:8,activeSubMenuId:9,recordPerPage:10', NULL, NULL, 8, 'Active', '---', 1, NULL, '2019-03-30 02:00:00', '2019-04-21 09:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_id`, `name`, `email`, `contact_number`, `photo`, `password`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '---', '---', '---', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Active', '---', 1, 1, '2019-10-26 18:00:00', '2019-10-26 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(10) UNSIGNED NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_per_hour` double UNSIGNED DEFAULT NULL,
  `security_deposit_amount` double UNSIGNED DEFAULT NULL,
  `number_of_rooms` int(10) UNSIGNED DEFAULT NULL,
  `number_of_seats` int(10) UNSIGNED DEFAULT NULL,
  `number_of_guests` int(10) UNSIGNED DEFAULT NULL,
  `is_party_allowed` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_pet_allowed` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `are_children_allowed` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_smoking_allowed` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_additional_guest_allowed` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_policy` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `cleaning_fee` double UNSIGNED DEFAULT NULL,
  `city_fee` double UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sequence` double UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue`, `type`, `number`, `price_per_hour`, `security_deposit_amount`, `number_of_rooms`, `number_of_seats`, `number_of_guests`, `is_party_allowed`, `is_pet_allowed`, `are_children_allowed`, `is_smoking_allowed`, `is_additional_guest_allowed`, `refund_policy`, `cleaning_fee`, `city_fee`, `image`, `background_color`, `text_color`, `sequence`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Regular Hirer UNITY HALL and DOROTHY ROCKWOOD HALL (Both halls )', 'Regular', '5063', 1, 0, 1, 100, 100, 'No', 'Yes', 'Yes', 'No', 'Yes', '---', 0, 0, 'venue/1_1_1579633801.jpg,venue/1_2_1579633801.jpg,venue/1_3_1579633801.jpg', '#a52a2a', '#f0fff0', NULL, 'Active', '---', NULL, NULL, '2019-12-10 13:34:56', '2020-02-20 16:23:41'),
(2, 'Casual Hirer DOROTHY ROCKWOOD HALL', 'Casual', '5054', 48, 500, 1, 100, 100, 'No', 'Yes', 'No', 'No', 'No', '---', 50, 20, 'venue/2_1_1579633824.jpeg,venue/2_2_1579633824.jpeg', '#6495ed', '#f5fffa', NULL, 'Active', '---', NULL, NULL, '2019-12-10 17:58:44', '2020-02-02 14:07:50'),
(3, 'Regular Hirer DOROTHY ROCKWOOD HALL wider community (weekends booking)', 'Regular', '5055', 53, 500, 1, 140, 140, 'No', 'Yes', 'Yes', 'No', 'No', '---', 50, 20, 'venue/3_1_1579633843.jpg,venue/3_2_1579633843.jpg,venue/3_3_1579633843.jpg', '#dc143c', '#0000ff', NULL, 'Active', '---', NULL, NULL, '2019-12-11 04:03:22', '2020-02-02 14:08:58'),
(4, 'Regular Hirer DOROTHY ROCKWOOD HALL', 'Regular', '5056', 37, 500, 1, 140, 140, 'No', 'No', 'Yes', 'No', 'No', '---', 50, 20, 'venue/4_1_1579633864.jpeg,venue/4_2_1579633864.jpeg', '#00008b', '#dc143c', NULL, 'Active', '---', NULL, NULL, '2019-12-11 04:31:59', '2020-02-02 14:10:11'),
(5, 'Casual Hire UNITY HALL', 'Casual', '5057', 37, 350, 1, 80, 80, 'No', 'Yes', 'Yes', 'No', 'No', '---', 50, 20, 'venue/5_1_1579633902.jpg,venue/5_2_1579633902.jpg', '#006400', '#00ffff', NULL, 'Active', '---', NULL, NULL, '2019-12-11 04:38:05', '2020-02-02 14:11:48'),
(6, 'Regular Hirer wider community UNITY HALL (weekend booking)', 'Regular', '5061', 32, 350, 1, 100, 100, 'No', 'Yes', 'Yes', 'No', 'No', '---', 50, 20, 'venue/6_1_1579634150.jpg,venue/6_2_1579634150.jpg,venue/6_3_1579634150.jpg,venue/6_4_1579634150.jpg,venue/6_5_1579634150.jpg', '#8b008b', '#80ffff', NULL, 'Active', '---', NULL, NULL, '2019-12-11 04:41:23', '2020-02-18 01:36:35'),
(7, 'Regular Hirer Unity Hall', 'Regular', '5059', 27, 350, 1, 100, 100, 'No', 'Yes', 'Yes', 'No', 'No', '---', 50, 20, 'venue/7_1_1579633973.jpg,venue/7_2_1579633973.jpg', '#20b2aa', '#0000cd', NULL, 'Active', '---', NULL, NULL, '2019-12-11 04:42:46', '2020-02-02 14:14:28'),
(8, 'Assembly Room', 'Assembly', '5060', 25, 250, 1, 15, 15, 'No', 'No', 'Yes', 'No', 'No', '---', 80, 0, 'venue/8_1_1579633998.jpeg', '#ff4500', '#00ffff', NULL, 'Active', 'For Bahá’ís only', NULL, NULL, '2019-12-25 21:15:30', '2020-02-02 14:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `venue_opening_hours`
--

CREATE TABLE `venue_opening_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` int(10) UNSIGNED DEFAULT NULL,
  `name_of_day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `venue_opening_hours`
--

INSERT INTO `venue_opening_hours` (`id`, `venue_id`, `name_of_day`, `opening_time`, `closing_time`, `status`, `narrative`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(26, 1, 'Monday to Friday', '08:00:00', '17:00:00', 'Active', '---', 11, NULL, '2020-02-20 16:23:41', '2020-02-20 16:23:41'),
(27, 1, 'Saturday', '08:00:00', '17:00:00', 'Active', '---', 11, NULL, '2020-02-20 16:23:41', '2020-02-20 16:23:41'),
(28, 1, 'Sunday', '08:00:00', '17:00:00', 'Active', '---', 11, NULL, '2020-02-20 16:23:41', '2020-02-20 16:23:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocked_booking_dates`
--
ALTER TABLE `blocked_booking_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_bookings`
--
ALTER TABLE `customer_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_menus`
--
ALTER TABLE `customer_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue_opening_hours`
--
ALTER TABLE `venue_opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocked_booking_dates`
--
ALTER TABLE `blocked_booking_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer_bookings`
--
ALTER TABLE `customer_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer_menus`
--
ALTER TABLE `customer_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venue_opening_hours`
--
ALTER TABLE `venue_opening_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
