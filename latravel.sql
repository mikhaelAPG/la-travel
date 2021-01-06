-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 12:59 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`title`, `type`, `location`, `main_pic`, `desc`, `price`, `created_at`, `updated_at`) VALUES
('Nusa Penida', 'Destination', 'Bali', 'Information\\Destination\\Nusa Penida\\main picture Nusa Penida.jpg', 'Information\\Destination\\Nusa Penida\\desc_nusaPenida.txt', 'Information\\Destination\\Nusa Penida\\price.txt', '2020-04-25 10:23:25', '2020-04-25 10:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `files_contact`
--

CREATE TABLE `files_contact` (
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` mediumint(8) UNSIGNED NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files_contact`
--

INSERT INTO `files_contact` (`title`, `phone`, `instagram`, `facebook`, `twitter`, `google`, `linkedin`, `pinterest`, `created_at`, `updated_at`) VALUES
('Nusa Penida', 1234, 'nusa_penida_island', 'nusapenidaisland1', 'nusa_penida', NULL, NULL, NULL, '2020-04-25 10:24:19', '2020-04-25 10:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `files_gallery`
--

CREATE TABLE `files_gallery` (
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files_gallery`
--

INSERT INTO `files_gallery` (`title`, `name`, `gallery`, `created_at`, `updated_at`) VALUES
('Nusa Penida', 'Bg RPL.jpg', 'Information\\Destination\\Nusa Penida\\Gallery\\Bg RPL.jpg', '2020-04-25 10:26:52', '2020-04-25 10:26:52'),
('Nusa Penida', 'gallery image 1.jpg', 'Information\\Destination\\Nusa Penida\\Gallery\\gallery image 1.jpg', '2020-04-25 10:26:52', '2020-04-25 10:26:52'),
('Nusa Penida', 'gallery image 2.jpg', 'Information\\Destination\\Nusa Penida\\Gallery\\gallery image 2.jpg', '2020-04-25 10:26:52', '2020-04-25 10:26:52'),
('Nusa Penida', 'gallery image 3.jpg', 'Information\\Destination\\Nusa Penida\\Gallery\\gallery image 3.jpg', '2020-04-25 10:26:52', '2020-04-25 10:26:52'),
('Nusa Penida', 'gallery image 4.jpg', 'Information\\Destination\\Nusa Penida\\Gallery\\gallery image 4.jpg', '2020-04-25 10:26:52', '2020-04-25 10:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_10_123606_create_visitors_table', 1),
(4, '2020_04_25_082404_create_files_table', 1),
(5, '2020_04_25_082439_create_files_contact_table', 1),
(6, '2020_04_25_082506_create_files_gallery_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `email`, `password`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Albert', 'vinalbertus@gmail.com', '$2y$10$tfbUBn8o17y06HuaeADH4eQczx8sIWjUwEudQuZgEGwem8Eyh5kkm', 'M', '2020-04-25 01:43:39', '2020-04-25 01:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `files_contact`
--
ALTER TABLE `files_contact`
  ADD PRIMARY KEY (`title`,`phone`);

--
-- Indexes for table `files_gallery`
--
ALTER TABLE `files_gallery`
  ADD PRIMARY KEY (`title`,`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files_contact`
--
ALTER TABLE `files_contact`
  ADD CONSTRAINT `files_contact_title_foreign` FOREIGN KEY (`title`) REFERENCES `files` (`title`) ON DELETE CASCADE;

--
-- Constraints for table `files_gallery`
--
ALTER TABLE `files_gallery`
  ADD CONSTRAINT `files_gallery_title_foreign` FOREIGN KEY (`title`) REFERENCES `files` (`title`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
