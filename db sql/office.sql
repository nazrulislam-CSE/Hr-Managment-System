-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 05:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankings`
--

CREATE TABLE `bankings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bankings`
--

INSERT INTO `bankings` (`id`, `holder_name`, `bank_name`, `account_no`, `opening_balance`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(5, 'abc', 'abc', 'abc 202', '25000', '01721452321', 'some', 1, '2022-10-26 10:07:30', '2022-10-26 10:07:30'),
(6, 'xyz', 'xyz', 'xyz 203', '30000', '01721452323', 'some text', 1, '2022-10-26 10:07:53', '2022-10-26 10:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `gender`, `date`, `username`, `email`, `password`, `phone`, `address`, `client_image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Shorna', 'male', '1992-08-06', 'khatun', 'shorna@gmail.com', '$2y$10$1FJEOPnrG/47S7YqAdSMv./vxuAHdL9uns6D8vJdOjWhXow1Y9vY6', '01721021054', 'pabna', 'uploads/clients/1747674448336091.jpg', 1, '2022-10-25 07:02:21', '2022-10-25 09:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `designations`, `status`, `created_at`, `updated_at`) VALUES
(2, 'MSC', NULL, 'Student', 1, '2022-10-25 09:25:18', '2022-10-26 03:24:11'),
(3, 'BSC', 'asf', 'Job', 1, '2022-10-26 03:23:55', '2022-10-26 03:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sallary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joing_date` date DEFAULT NULL,
  `joing_salary` int(11) DEFAULT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `name`, `gender`, `date_birth`, `user_id`, `role_id`, `department_id`, `designation_id`, `designation`, `sallary`, `joing_date`, `joing_salary`, `username`, `email`, `password`, `phone`, `address`, `expense`, `employe_image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Masud Rana', 'male', '2022-10-26', 7, 3, 3, 3, 'Employe', '0', '2022-10-26', 97, 'Rana', 'vicoxedywy@mailinator.com', '$2y$10$hNr2d7Id56vTe7qBUorPqu1nF3V2Kua6Ci/zpw5plO8eMu8qujGAC', '0171201021', 'Quia in non aspernat', 'Numquam est natus v', 'uploads/employe/1747834717373943.jpg', 1, '2022-10-26 02:09:45', '2022-10-27 04:04:42'),
(4, 'Asraful Islam', 'male', '2022-10-04', 8, 3, 3, 3, 'Employe', '0', '2022-10-07', 25000, 'islam', 'rakibul@gmail.com', '$2y$10$jymDZQB4JrklJAm2osl.WuOkbdg/.OF24c.iMR4qEm0s4cSxbadF.', '01721452329', 'pabna', 'some', 'uploads/employe/1747834671449939.jpg', 1, '2022-10-26 02:10:30', '2022-10-27 04:03:55'),
(5, 'Siyam Ahmed', 'male', '1978-08-09', 9, 2, 3, 3, 'Customer Support', '0', '2009-07-26', 38, 'siyam', 'lacepofo@mailinator.com', '$2y$10$.ZFyLg0ZreN55M07g/QndeZ41wLd.uVsLfUa5ghDTcmREUI6jotnS', '01721502103', 'Qui consequat Magni', 'Atque ut accusantium', 'uploads/employe/1747834619830877.jpg', 1, '2022-10-26 03:27:57', '2022-10-27 04:03:06'),
(6, 'Rakibul Islam', 'male', '2022-10-05', 10, 2, 2, 3, 'Developer', '0', '2022-10-13', 52000, 'Rakibul', 'abc@gmail.com', '$2y$10$bfpD3I21uy4NF3gljwaUN.cPmirdEFc.ZZHaOX0.Hnd3dE.4NvHgG', '01721452327', 'Aut eu quod Nam ut o', 'some', 'uploads/employe/1747834584452487.jpg', 1, '2022-10-26 19:18:22', '2022-10-27 04:02:32'),
(8, 'Shakibul Islam', 'male', '2016-08-13', 12, 3, 3, 3, 'Hr Manager', '0', '2015-11-01', 63, 'shakibul', 'siyam@gmail.com', '$2y$10$NZPZ4gchfixvZ/0jvRRyW.YAfvxTo/Y.z4E4Bk9hMscXtEAbKngj6', '99', 'Provident officia s', 'Ex omnis dolorem ali', 'uploads/employe/1747834555454220.jpg', 1, '2022-10-26 19:21:55', '2022-10-27 04:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leaves` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `name`, `leaves`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sick Off a', 5, 'Sick Off a leave', 0, '2022-10-25 21:59:37', '2022-10-25 21:59:53'),
(3, 'Annual Leave', 3, 'some leave Annual Leave', 1, '2022-10-25 22:00:12', '2022-10-25 22:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_11_062430_create_sessions_table', 1),
(8, '2022_10_25_095605_create_clients_table', 2),
(9, '2022_10_25_150233_create_departments_table', 3),
(10, '2022_10_26_032125_create_notices_table', 4),
(11, '2022_10_26_034628_create_leaves_table', 5),
(13, '2022_10_26_060423_create_roles_table', 6),
(15, '2014_10_12_000000_create_users_table', 7),
(16, '2022_10_26_053214_create_employes_table', 7),
(17, '2022_10_26_141407_create_bankings_table', 8),
(18, '2022_10_26_145458_create_transfers_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Test Title here', '2022-10-13', 1, '2022-10-25 21:41:41', '2022-10-25 21:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '[\"1\",\"2\",\"3\",\"4\"]', '2022-10-26 03:08:02', '2022-10-26 03:17:22'),
(2, 'Hr Manager', '[\"1\",\"5\",\"6\",\"13\"]', '2022-10-26 03:08:16', '2022-10-26 03:08:16'),
(3, 'Employe', '[\"1\",\"2\"]', '2022-10-26 03:17:05', '2022-10-26 03:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` int(11) DEFAULT NULL,
  `absent_days` int(11) DEFAULT NULL,
  `pay_amount` double(8,2) DEFAULT NULL,
  `bonus_commission` int(100) DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employe_id`, `absent_days`, `pay_amount`, `bonus_commission`, `month`, `year`, `created_at`, `updated_at`) VALUES
(36, 8, 3, 27000.00, 0, 'October', 2022, '2022-10-28 06:40:40', '2022-10-28 06:40:40'),
(37, 6, 3, 22500.00, 0, 'October', NULL, '2022-10-28 06:42:09', '2022-10-28 06:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1zB4Kgj0bNXm70FjV2Ovz6TbvfRWLxAEuznRODJu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMWRPa3BjY1RkeUlkMlExNHluSmdBMlBCTk5HVXZzNnJKZnl6NUVGVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llcy9lbXBsb3llL3NhbGxhcnkvOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1666976002);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_account` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(20,2) DEFAULT 0.00,
  `date` date DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `form_account`, `to_account`, `amount`, `date`, `reference`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, '5', '6', 100.00, '2022-10-26', 'fa', 'afd', 1, '2022-10-26 18:47:07', '2022-10-26 18:59:19'),
(3, '6', '6', 2000.00, '2022-09-27', 'some amount', 'some', 1, '2022-10-27 19:38:44', '2022-10-27 19:38:44'),
(4, '6', '6', 1000.00, '2022-09-28', 'some amount', 'asf', 1, '2022-10-27 19:42:16', '2022-10-27 19:42:16'),
(5, '6', '6', 1000.00, '2022-10-27', 'some amount', 'jjj', 1, '2022-10-27 19:47:42', '2022-10-27 19:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1=>Admin,2=>User,3=>Employe',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', NULL, 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$A/p2NdiF2keGpGuCdDieCO2pvEQ6BUsuEgox3ugu0ClD/7VHW5g22', NULL, NULL, NULL, '2022-10-26 00:52:54', '2022-10-26 00:52:54'),
(7, 3, 'Masud Rana', NULL, 'vicoxedywy@mailinator.com', '0171201021', NULL, NULL, '$2y$10$wC4lU8F9FNH5PlQZrS2JVOhU7TCZmPdgTFv8XQud3dhjERgCN/8Xu', NULL, NULL, NULL, '2022-10-26 02:09:45', '2022-10-27 04:04:39'),
(8, 3, 'Asraful Islam', NULL, 'rakibul@gmail.com', '01721452329', NULL, NULL, '$2y$10$qBRABk7QsXhXqDFSuEeCWOgiR4RZk6n6R6TWlkJttKztz15bEw1pe', NULL, NULL, NULL, '2022-10-26 02:10:30', '2022-10-27 04:03:55'),
(9, 3, 'Siyam Ahmed', NULL, 'lacepofo@mailinator.com', '01721502103', NULL, NULL, '$2y$10$BS0B3AchIQFTZEaW5k6bKeKCG.E24g1b42.6eMBFT3P4liAl0.d6C', NULL, NULL, NULL, '2022-10-26 03:27:57', '2022-10-27 04:03:06'),
(10, 3, 'Rakibul Islam', NULL, 'abc@gmail.com', '01721452327', NULL, NULL, '$2y$10$DqEZl9OMr6IIstIS2Mr/zOMR7Q9vjyrBr64pHbyPYB7MKxZlGs9Oe', NULL, NULL, NULL, '2022-10-26 19:18:22', '2022-10-27 04:02:32'),
(11, 3, 'xyz', NULL, 'xyz@gmail.com', '01721452329', NULL, NULL, '$2y$10$JmEaooKFXRu9KXr3zg2wN.LiAZHl/ezJRyxK6idDZZNfJ7Bk.vGJ2', NULL, NULL, NULL, '2022-10-26 19:19:23', '2022-10-26 19:19:23'),
(12, 3, 'Shakibul Islam', NULL, 'siyam@gmail.com', '99', NULL, NULL, '$2y$10$60yHUyOmGVdaA24bk/Ay1.Of1cykcedfDxHm8C7rCUF.2BrKW47Ru', NULL, NULL, NULL, '2022-10-26 19:21:55', '2022-10-27 04:02:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankings`
--
ALTER TABLE `bankings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bankings_phone_unique` (`phone`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employes_email_unique` (`email`),
  ADD UNIQUE KEY `employes_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankings`
--
ALTER TABLE `bankings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
