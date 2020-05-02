-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 05:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
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
  `message` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `address` text COLLATE utf8_unicode_ci,
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
  `result` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `route` text COLLATE utf8_unicode_ci,
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
  `route` text COLLATE utf8_unicode_ci,
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
(1, 0, 'Dashboard', 'Admin', 'get', 'admin/dashboard/{id}', 'DashboardController', 'index', NULL, NULL, NULL, 1, 'Active', '---', 1, NULL, '2019-04-01 01:13:39', '2019-04-21 23:34:58'),
(2, 0, 'Operation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Active', '', 1, NULL, '2019-04-01 01:13:39', '2019-04-21 23:34:58'),
(3, 2, 'Customer', 'Admin\\Operation', 'get,get,get,post,post,post,get,post,get,post', 'admin/operation/customer/{id},admin/operation/customer/gets/{search_string}/{record_per_page},admin/operation/customer/get/{id},admin/operation/customer/save,admin/operation/customer/apply/bulk/operation,admin/operation/customer/change/status,admin/operation/customer/get/bookings/by/customer/id,admin/operation/customer/delete,admin/operation/customer/get/access/code,admin/operation/customer/save/access/code', 'CustomerController', 'index,gets,get,save,applyBulkOperation,changeStatus,getBookings,delete,getAccessCode,saveAccessCode', 'activeMenuValue:Operation,activeSubMenuValue:Customer,activeMenuId:2,activeSubMenuId:3,recordPerPage:10', NULL, NULL, 3, 'Active', '---', 1, NULL, '2019-03-30 10:00:00', '2019-04-21 17:34:59'),
(4, 2, 'Booking and Reservation', 'Admin\\Operation', 'get,get,get,post,post,post', 'admin/operation/booking/and/reservation/{id},admin/operation/booking/and/reservation/gets/{date_from}/{date_to}/{start_date}/{end_date}/{status}/{venue_id}/{customer_id}/{record_per_page},admin/operation/booking/and/reservation/get/{id},admin/operation/booking/and/reservation/save,admin/operation/booking/and/reservation/apply/bulk/operation,admin/operation/booking/and/reservation/delete', 'BookingAndReservationController', 'index,gets,get,save,applyBulkOperation,delete', 'activeMenuValue:Operation,activeSubMenuValue:Booking and Reservation,activeMenuId:2,activeSubMenuId:4,recordPerPage:10', NULL, NULL, 3, 'Active', '---', 1, NULL, '2019-03-30 10:00:00', '2019-04-21 17:34:59'),
(5, 2, 'Blocked Booking Date', 'Admin\\Operation', 'get,get,get,post,post,post,post', 'admin/operation/blocked/booking/date/{id},admin/operation/blocked/booking/date/gets/{search_string}/{record_per_page},admin/operation/blocked/booking/date/get/{id},admin/operation/blocked/booking/date/single/save,admin/operation/blocked/booking/date/bulk/save,admin/operation/blocked/booking/date/apply/bulk/operation,admin/operation/blocked/booking/date/delete', 'BlockedBookingDateController', 'index,gets,get,saveSingle,saveBulk,applyBulkOperation,delete', 'activeMenuValue:Operation,activeSubMenuValue:Blocked Booking Date,activeMenuId:2,activeSubMenuId:5,recordPerPage:10', NULL, NULL, 4, 'Active', '---', 1, NULL, '2020-01-01 22:00:00', NULL),
(6, 0, 'Configuration', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Active', '', 1, NULL, '2019-04-01 01:13:39', '2019-04-21 23:34:58'),
(7, 6, 'Venue', 'Admin\\Configuration', 'get,get,get,post,post,post', 'admin/configuration/venue/{id},admin/configuration/venue/gets/{search_string}/{record_per_page},admin/configuration/venue/get/{id},admin/configuration/venue/save,admin/configuration/venue/apply/bulk/operation,admin/configuration/venue/delete/image', 'VenueController', 'index,gets,get,save,applyBulkOperation,deleteImage', 'activeMenuValue:Configuration,activeSubMenuValue:Venue,activeMenuId:6,activeSubMenuId:7,recordPerPage:10', NULL, NULL, 6, 'Active', '---', 1, NULL, '2019-03-30 16:00:00', '2019-04-21 23:34:59'),
(8, 0, 'Report', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'Active', '', 1, NULL, '2019-03-30 19:48:44', '2019-04-21 23:34:59'),
(9, 8, 'Booking and Reservation', 'Admin\\Report', 'get,get,get', 'admin/report/booking/and/reservation/{id},admin/report/booking/and/reservation/gets/{date_from}/{date_to}/{start_date}/{end_date}/{status}/{venue_id}/{customer_id},admin/report/booking/and/reservation/generate/report', 'BookingAndReservationController', 'index,gets,generateReport', 'activeMenuValue:Report,activeSubMenuValue:Booking and Reservation,activeMenuId:8,activeSubMenuId:9,recordPerPage:10', NULL, NULL, 8, 'Active', '---', 1, NULL, '2019-03-30 10:00:00', '2019-04-21 17:34:59');

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
  `refund_policy` text COLLATE utf8_unicode_ci,
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_bookings`
--
ALTER TABLE `customer_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
