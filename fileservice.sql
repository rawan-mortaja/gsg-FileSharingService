-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 06:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fileservice`
--

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(520) NOT NULL,
  `file_size` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `file_path`, `file_size`, `created_at`, `updated_at`) VALUES
(1, 'contact_icon01.png', 'uploads/mCZV3MgLDFcwFvyEHe9ZExcNu0sUMqllMAO2nic0.png', 5872.00, '2023-08-30 07:32:14', '2023-08-30 07:32:14'),
(2, 'view-source_https___classroom.google.com_u_1_h.html', 'uploads/o4TcV9WwocZqPMt7KFLCrQAPwOC870kF5EXN44EO.html', 801814.00, '2023-08-30 07:35:07', '2023-08-30 07:35:07'),
(3, 'ISSE.pdf', 'uploads/bCl9KwABZXGpKBIKDg1SvD4Z0cnMkD5AH8i5ruMs.pdf', 205620.00, '2023-08-30 07:46:14', '2023-08-30 07:46:14'),
(4, 'logo-classroom.png', 'uploads/qvJ72ZXIjFUbLE3i3xp8xn4ViCur9QKFUvHyz0OD.png', 63460.00, '2023-08-30 07:47:51', '2023-08-30 07:47:51'),
(5, 'classrooms-cover_image_path_2.html', 'uploads/3vIrOWstRwinPw3n1Rx7FcSiFlNnGCeqqGrTni4E.txt', 51.00, '2023-08-30 15:05:01', '2023-08-30 15:05:01'),
(6, 'LsLX1xUgbWHTNdz3PoDs18bhMJ0iVpP6CN9clhag (3).jpg', 'uploads/0VQxIHiSkwtB1rhZM47M9cmiZf9WjoyW5Et27Ga2.jpg', 167064.00, '2023-09-03 06:08:52', '2023-09-03 06:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `file_downloads`
--

CREATE TABLE `file_downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `user_agent` varchar(512) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_07_14_201022_create_files_table', 1),
(18, '2023_07_20_140243_create_file_links_table', 1),
(19, '2023_09_03_081123_create_file_downloads_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_downloads`
--
ALTER TABLE `file_downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_downloads_file_id_foreign` (`file_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `file_downloads`
--
ALTER TABLE `file_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_downloads`
--
ALTER TABLE `file_downloads`
  ADD CONSTRAINT `file_downloads_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
