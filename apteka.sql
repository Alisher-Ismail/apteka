-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 08:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `chiqimsavdo`
--

CREATE TABLE `chiqimsavdo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tovar_id` int(11) NOT NULL,
  `miqdori` int(11) NOT NULL,
  `miqdoridona` int(11) NOT NULL,
  `summa` int(11) NOT NULL,
  `summadona` int(11) NOT NULL,
  `toliqsumma` int(11) NOT NULL DEFAULT 0,
  `bolimid` int(11) NOT NULL DEFAULT 0,
  `sotildi` int(11) NOT NULL DEFAULT 0,
  `turi` varchar(255) DEFAULT NULL,
  `tolovturi` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chiqimsavdo`
--

INSERT INTO `chiqimsavdo` (`id`, `tovar_id`, `miqdori`, `miqdoridona`, `summa`, `summadona`, `toliqsumma`, `bolimid`, `sotildi`, `turi`, `tolovturi`, `userid`, `created_at`, `updated_at`) VALUES
(46, 6, 1, 0, 1100, 0, 1100, 1, 1, NULL, NULL, 1, '2024-06-12 11:57:15', '2024-06-12 12:13:32'),
(48, 6, 0, 2, 0, 220, 220, 2, 1, NULL, NULL, 1, '2024-06-12 12:14:18', '2024-06-12 12:14:21'),
(49, 6, 1, 1, 1100, 110, 1210, 3, 1, NULL, NULL, 1, '2024-06-12 12:18:47', '2024-06-12 12:18:51'),
(50, 6, 0, 1, 0, 110, 110, 4, 1, NULL, NULL, 1, '2024-06-12 12:20:16', '2024-06-12 12:20:20'),
(51, 4, 1, 0, 110, 0, 110, 5, 1, NULL, NULL, 1, '2024-06-13 05:08:09', '2024-06-13 05:52:42'),
(52, 6, 1, 1, 1100, 110, 1210, 5, 1, NULL, NULL, 1, '2024-06-13 05:08:19', '2024-06-13 05:52:42'),
(53, 4, 1, 0, 110, 0, 110, 6, 1, NULL, NULL, 1, '2024-06-13 05:53:18', '2024-06-13 05:53:22'),
(54, 6, 0, 1, 0, 110, 110, 7, 1, NULL, NULL, 1, '2024-06-13 05:56:25', '2024-06-13 06:00:32'),
(55, 6, 0, 1, 0, 110, 110, 8, 1, NULL, NULL, 1, '2024-06-13 06:02:32', '2024-06-13 06:02:40'),
(57, 4, 1, 0, 110, 0, 110, 9, 1, NULL, NULL, 1, '2024-06-13 06:04:29', '2024-06-13 06:04:32'),
(58, 4, 5, 0, 550, 0, 550, 10, 1, NULL, NULL, 1, '2024-06-13 06:17:38', '2024-06-13 06:17:48'),
(59, 6, 27, 0, 29700, 0, 29700, 11, 1, NULL, NULL, 1, '2024-06-13 06:19:51', '2024-06-13 08:55:48'),
(60, 6, 0, 1, 0, 110, 110, 12, 1, NULL, NULL, 1, '2024-06-13 08:56:14', '2024-06-13 08:56:24'),
(61, 6, 0, 1, 0, 110, 110, 13, 1, NULL, NULL, 1, '2024-06-13 09:22:28', '2024-06-13 09:22:50'),
(63, 4, 1, 0, 110, 0, 110, 14, 1, NULL, NULL, 1, '2024-06-13 09:28:10', '2024-06-13 09:28:15'),
(65, 6, 0, 1, 0, 110, 110, 15, 1, NULL, NULL, 1, '2024-06-13 09:32:57', '2024-06-13 09:35:59'),
(66, 6, 0, 1, 0, 110, 110, 15, 1, NULL, NULL, 1, '2024-06-13 14:35:40', '2024-06-13 09:35:59'),
(67, 6, 0, 1, 0, 110, 110, 16, 1, NULL, NULL, 1, '2024-06-17 05:16:39', '2024-06-17 00:16:48'),
(85, 7, 1, 0, 120, 0, 120, 17, 1, NULL, NULL, 1, '2024-06-23 17:17:14', '2024-06-23 12:17:35'),
(86, 7, 0, 2, 0, 24, 24, 18, 1, NULL, NULL, 1, '2024-06-27 10:28:23', '2024-06-27 10:28:52'),
(87, 7, 0, 3, 0, 36, 36, 19, 1, NULL, NULL, 1, '2024-06-27 10:29:50', '2024-06-27 10:30:51'),
(88, 7, 0, 1, 0, 12, 12, 20, 1, NULL, NULL, 1, '2024-06-27 10:30:59', '2024-06-27 10:31:53'),
(89, 7, 0, 2, 0, 24, 24, 21, 1, NULL, NULL, 1, '2024-06-27 10:32:03', '2024-06-27 10:32:27'),
(90, 7, 0, 1, 0, 12, 12, 22, 1, NULL, NULL, 1, '2024-06-27 10:32:32', '2024-06-27 10:32:52'),
(91, 7, 0, 1, 0, 12, 12, 23, 1, NULL, NULL, 1, '2024-06-27 10:32:59', '2024-06-27 10:33:15'),
(92, 7, 0, 1, 0, 12, 12, 24, 1, NULL, NULL, 1, '2024-06-27 10:34:43', '2024-06-27 10:35:52'),
(93, 7, 0, 1, 0, 12, 12, 25, 1, NULL, NULL, 1, '2024-06-27 10:35:58', '2024-06-27 10:36:30'),
(94, 7, 0, 1, 0, 12, 12, 26, 1, NULL, NULL, 1, '2024-06-27 10:36:47', '2024-06-27 10:37:13'),
(95, 6, 1, 0, 1100, 0, 1100, 26, 1, NULL, NULL, 1, '2024-06-27 10:36:54', '2024-06-27 10:37:13'),
(96, 7, 1, 1, 120, 12, 132, 27, 1, NULL, NULL, 1, '2024-06-27 10:37:20', '2024-06-27 10:37:31'),
(98, 6, 0, 1, 0, 110, 110, 29, 1, NULL, NULL, 1, '2024-06-27 10:50:19', '2024-06-27 10:50:32'),
(99, 7, 0, 1, 0, 12, 12, 30, 1, NULL, NULL, 1, '2024-06-27 10:51:22', '2024-06-27 10:51:25'),
(100, 7, 0, 1, 0, 12, 12, 31, 1, NULL, NULL, 1, '2024-06-27 10:56:31', '2024-06-27 10:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kirim`
--

CREATE TABLE `kirim` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tovar_id` int(11) NOT NULL,
  `olcham_id` int(11) DEFAULT NULL,
  `miqdori` int(11) NOT NULL,
  `dona` varchar(255) DEFAULT NULL,
  `muddati` date DEFAULT NULL,
  `isExpired` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kirim`
--

INSERT INTO `kirim` (`id`, `tovar_id`, `olcham_id`, `miqdori`, `dona`, `muddati`, `isExpired`, `created_at`, `updated_at`) VALUES
(27, 4, NULL, 2, '1', '2024-06-05', 0, '2024-06-05 07:31:20', '2024-06-05 07:31:20'),
(28, 4, NULL, 2, '1', '2024-06-05', 0, '2024-06-05 07:31:31', '2024-06-05 07:31:31'),
(38, 4, NULL, 1, '2', '2024-06-04', 0, '2024-06-05 07:36:34', '2024-06-05 07:36:34'),
(39, 5, NULL, 1, '2', '2024-06-04', 0, '2024-06-05 07:37:10', '2024-06-05 07:37:10'),
(40, 4, NULL, 3, '2', '2024-06-03', 0, '2024-06-05 07:37:52', '2024-06-05 07:37:52'),
(41, 5, NULL, 2, '3', '2024-06-04', 0, '2024-06-05 07:38:11', '2024-06-05 07:38:11'),
(42, 4, NULL, 1, '2', '2024-06-04', 0, '2024-06-05 07:38:37', '2024-06-05 07:38:37'),
(54, 6, NULL, 0, '21', '2024-06-21', 0, '2024-06-07 12:25:45', '2024-06-17 00:16:39'),
(55, 7, NULL, 0, '20', '2024-06-10', 0, '2024-06-07 14:55:41', '2024-06-07 14:55:41'),
(56, 4, NULL, -4, '0', '2024-06-25', 0, '2024-06-07 15:38:52', '2024-06-22 08:19:13'),
(58, 4, NULL, 5, '0', '2024-06-30', 0, '2024-06-13 06:29:37', '2024-06-27 15:18:46'),
(59, 4, NULL, 1, '0', '2024-06-24', 0, '2024-06-17 13:54:16', '2024-06-17 13:54:16'),
(60, 4, NULL, 1, '0', '2024-06-25', 0, '2024-06-17 14:48:42', '2024-06-17 14:48:42'),
(61, 5, NULL, 1, '1', '2024-07-01', 0, '2024-06-17 14:50:31', '2024-06-22 07:36:41'),
(62, 6, NULL, 2, '29', '2024-06-30', 0, '2024-06-22 07:14:36', '2024-06-27 10:50:19'),
(63, 7, NULL, 1, '14', '2024-06-30', 0, '2024-06-22 07:39:45', '2024-06-27 10:56:31'),
(64, 4, NULL, 0, '0', '2024-06-25', 0, '2024-06-23 12:12:51', '2024-06-23 12:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_03_062046_create_olchamlar_table', 2),
(6, '2024_06_03_095117_create_tovar_table', 3),
(7, '2024_06_03_100210_create_tovar_table', 4),
(8, '2024_06_04_153707_create_kirim_table', 5),
(9, '2024_06_06_115908_create_chiqimsavdo_table', 6),
(10, '2024_06_27_065006_create_title_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `olchamlar`
--

CREATE TABLE `olchamlar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `olcham_nomi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `olchamlar`
--

INSERT INTO `olchamlar` (`id`, `olcham_nomi`, `created_at`, `updated_at`) VALUES
(7, 'dona', '2024-06-10 14:39:49', '2024-06-10 14:39:49'),
(8, 'kg', '2024-06-10 14:39:53', '2024-06-10 14:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alisherismailov1991@gmail.com', '$2y$10$VU.KLuQrlM281PvYChk5g..ztnKQIwX2yTjQ2RyUjHCZ42.ijxA1W', '2024-06-02 00:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`, `created_at`, `updated_at`) VALUES
(10, 'Apteka', '2024-06-27 16:09:03', '2024-06-27 16:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `tovar`
--

CREATE TABLE `tovar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomi` varchar(255) NOT NULL,
  `olingannarx` int(11) NOT NULL,
  `sotilgannarx` int(11) NOT NULL,
  `olchovid` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `donasoni` int(11) NOT NULL,
  `dolingannarx` int(11) NOT NULL,
  `dsotilgannarx` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tovar`
--

INSERT INTO `tovar` (`id`, `nomi`, `olingannarx`, `sotilgannarx`, `olchovid`, `barcode`, `donasoni`, `dolingannarx`, `dsotilgannarx`, `created_at`, `updated_at`) VALUES
(4, 'telefon', 100, 110, 7, '12', 0, 0, 0, '2024-06-04 09:40:41', '2024-06-04 09:40:41'),
(5, 'pc', 2, 3, 7, '13', 1, 0, 0, '2024-06-04 16:27:09', '2024-06-04 16:27:09'),
(6, 'askarbinka', 1000, 1100, 7, '14', 10, 100, 110, '2024-06-05 00:41:10', '2024-06-05 00:41:10'),
(7, 'asperin', 100, 120, 7, '11', 10, 10, 12, '2024-06-07 14:55:17', '2024-06-07 14:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alisher', 'alisherismailov1991@gmail.com', '$2y$10$.yuLSuhzItoI1wmiKvHoseL3PCQuCQHdq7PISAkgjnG9qx7Xp7IdS', 'admin', NULL, '2024-04-19 10:55:12', '2024-06-27 08:36:46'),
(10, 'ulugbek', 'ulugbek@gmail.com', '$2y$10$t6NOqc.MpE0Qj2QufJ6YHOtDQ/muT6khJrmrgj/kLpCTCchA6hcem', 'sotuvchi', NULL, '2024-06-02 13:51:22', '2024-06-17 13:40:16'),
(12, 'test', 'testte2@gm.comt', '$2y$10$WaAec6TWhdM4B7xLKNX6WO8M673x6uXFjHlTJ3BhVEVZ8dMqHJc.a', 'sotuvchi', NULL, '2024-06-27 06:54:53', '2024-06-27 06:54:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chiqimsavdo`
--
ALTER TABLE `chiqimsavdo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kirim`
--
ALTER TABLE `kirim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olchamlar`
--
ALTER TABLE `olchamlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chiqimsavdo`
--
ALTER TABLE `chiqimsavdo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kirim`
--
ALTER TABLE `kirim`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `olchamlar`
--
ALTER TABLE `olchamlar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
