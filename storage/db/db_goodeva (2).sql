-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 10:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_goodeva`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CIT', 'Divisi CIT', NULL, NULL),
(2, 'CBD', 'Divisi CBD', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_19_081045_create_divisis_table', 1),
(5, '2020_01_19_092821_create_pesan_kirims_table', 1),
(6, '2020_01_19_092915_create_pesan_masuks_table', 1),
(7, '2020_01_22_090412_create_tasks_table', 2);

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
-- Table structure for table `pesan_kirims`
--

CREATE TABLE `pesan_kirims` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anonim` int(11) NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arsip` int(11) DEFAULT NULL,
  `bintang` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan_kirims`
--

INSERT INTO `pesan_kirims` (`id`, `pengirim`, `penerima`, `anonim`, `subject`, `isi`, `status`, `arsip`, `bintang`, `tanggal`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$zx8r4/fF2HOPsDf/fyh5LOO28YynDNlp3TaMjvnsGrjE5zgNgeaxK', '1', 2, 'eyJpdiI6IlBNS1JWTW9vczVjaVNNdXBkOU01bnc9PSIsInZhbHVlIjoiWFJWaXp0RFlBUmhLTDFSYXhxUzVPZz09IiwibWFjIjoiNGIwMGU5ZThhZGI2YTQ1MGNjOWIwZWIyNGEzNjUxYmE5MDYyMDYxMWVmOWRiZGJkYjUyMDQ0YjEyNTJiYWI3OSJ9', 'eyJpdiI6IlwvY1ozbmI2dTUyNzhMd1RSbXNhQjF3PT0iLCJ2YWx1ZSI6ImVycXhITk4rQUZwXC9obG5aQTJGZ3RYUzlQNklkWjh5bUJ3b0xaZmVETE5qQkRQSEZHQklcL0FjNmJkQklsR2lSbzd2MWR3a1grXC9FMFVVM01PeG43c1o1S0VTOEhpbEtOZ0xieWFQb1Jrb1VMeitKOGtrYkhkT2NxNEJDSGxcL1NaOWtraldqRUkxeU9FeCs3VkMxVEo5SkJiekYzZUhGSXFJUWsra25xU1ZseTFpbHE2WkVVblNMdTBQUjdyV3NcL1ViVlFIaEFKUXZMZ1ZobGxLbEdkV3ozYTZhTGV6STMzaXlDU3BXZFwvVVMzT3JwYVZcL0JrZzVXY1ZLTFFEcTI4U0dhVCtiSG5NNDJkMFNUaXJMaXp6TytpaHNZQVh3S0RYcnpkaEs5V3lKN29zTEhOMXFJaGh0ZW9NS3R0bFVZaUhlQyIsIm1hYyI6ImZkNDlkNDBhZDJjYzQ2ZmIyZDI1MTY2YTkzNGJkNmJmOTE2Mzg1NTgxYzRmOTU1ZmYzMWVjYmU3ZjA2OWNiMDUifQ==', 'berhasil_kirim', NULL, NULL, '2020-01-21 00:58:24', NULL, '2020-01-21 00:58:24', '2020-01-21 00:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_masuks`
--

CREATE TABLE `pesan_masuks` (
  `id` int(10) UNSIGNED NOT NULL,
  `pesan_kirim_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anonim` int(11) NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arsip` int(11) DEFAULT NULL,
  `bintang` int(11) DEFAULT NULL,
  `baca` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan_masuks`
--

INSERT INTO `pesan_masuks` (`id`, `pesan_kirim_id`, `penerima`, `pengirim`, `anonim`, `subject`, `isi`, `status`, `arsip`, `bintang`, `baca`, `tanggal`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$WBcep2w39vtizGftvfq14em4yjaP9147Vht.noZXTwOy3DBXcrv66', '$2y$10$CPBRLi3Akh5UgiuGMf8DfO7uf5YMPHxC7lE/biBWgqg0S26dYp5xa', '2', 2, 'eyJpdiI6Ik82Z0Y1M1Z3Q045V2NoWlNMdHNYOVE9PSIsInZhbHVlIjoiUVFka0pZNlYyaDI3dTZkU3gzTTVTdz09IiwibWFjIjoiNGUzOWJhZmE1ZTM2MWVlZGJlMzNiYWQwY2Y5NmJlMTEyNjk5NTE0M2E3ZWE0ZTU0YTVkNTUwZDJjNDVhNDc5ZSJ9', 'eyJpdiI6IlU0NUZaa295Nm05UzBLR1RaaVpTR0E9PSIsInZhbHVlIjoid2FIZGw0U2xXeVVnNlNTZEwxbVpoRG9oY2x0R0dvZks2ZDN3dlRjNHhEaktUbWlYNVJSXC96NXNwNnRnSVwvWnltXC95RjZZZDBjb1hwTFM0bE9OaEU1bWxrMTJqZVZ2NmhTTVRNUGw1N05YRjY3RTNqWUhIYzhqb3AwclB2RnMyN3Axb2lESVBcL1FvXC9xSkY0XC9RU1wvZkNIWUtpVlZvVnUwUWlFSDAycjFpZEpjVTlPbVwvaHIzZjBNYkl4bWR5OE05blA0TXdzeUl1Vmdwb0ROWDdwWk5XTk5TNDZMalwvaG93RStPNmRvd29KbHB6aWhRNWN2UEJRN1ZLWmd3SWhodDZ6eFNONVl3MjlTVTBoaVFhckthTG9cLzk3WEVFb0t5d3NTNGJQZkZaaEpsUzRpWXlXNGlTZVNhUnVvMjlRZjhsU1NsIiwibWFjIjoiOWI4ZDdhMWJlOGVkYjNlMDFkMzQ2MTRjZGYzNTQ2OGIzNDZhNGVmNmNhNWYyNjcyYTc1YmE5MzAyZWM5OGEyMCJ9', 'baru', NULL, NULL, NULL, '2020-01-21 00:58:24', NULL, '2020-01-21 00:58:24', '2020-01-21 00:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=on proses 2=waiting check 3=finish 4=delay',
  `status_check` int(11) DEFAULT 0 COMMENT '0=belum cek 1=selesai 2=belum sesuai',
  `delay` int(11) DEFAULT 0 COMMENT '0 = tidak ,1 = iya',
  `problem` int(11) DEFAULT NULL COMMENT '1= problem',
  `counter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `id_user`, `tanggal`, `task`, `jam_mulai`, `jam_selesai`, `status`, `status_check`, `delay`, `problem`, `counter`, `measer`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-22', 'membuat layout', '08:15', '12:00', 2, 0, 1, NULL, NULL, NULL, '2020-01-22 02:19:21', '2020-01-23 00:25:13'),
(2, 1, '2020-01-22', 'membuat crud asset', '13:00', '17:00', 4, 0, 1, NULL, NULL, NULL, '2020-01-22 02:19:21', '2020-01-23 02:50:24'),
(3, 1, '2020-01-23', 'tes task 1', '08:15', '12:00', 2, 0, 0, NULL, NULL, NULL, '2020-01-22 20:26:47', '2020-01-23 00:20:54'),
(4, 1, '2020-01-23', 'tes task 2', '13:00', '15:00', 2, 0, 0, 1, 'tes', '<p>tes</p>', '2020-01-22 20:26:48', '2020-01-23 02:50:24'),
(5, 1, '2020-01-23', 'tes task 3', '15:00', '17:00', 1, 0, 0, NULL, NULL, NULL, '2020-01-23 00:24:48', '2020-01-23 00:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` int(11) DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `divisi`, `jabatan`, `bio`, `image`, `background`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'Anonim', 'anonim@mail.com', 'anonim', NULL, '$2y$10$YpJQQfv.eoAnowMjvWt75u1z2Ru0ruRYSmhBISDXMwUC217n8cm9.', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-21 00:50:16', '2020-01-21 00:50:16'),
(1, 'zaidan riski', 'zdnrsk@gmail.com', 'zaidanriski', NULL, '$2y$10$fajVnRVs7yAD2Y28Lc6c5O1DrqE6yvBLuAzPkpdhpe.sEmBG75Xbe', 1, 'Staff IT', 'tes', NULL, NULL, NULL, '2020-01-21 00:49:41', '2020-01-21 21:20:41'),
(2, 'tes user', 'tes@gmail.com', NULL, NULL, '$2y$10$YpJQQfv.eoAnowMjvWt75u1z2Ru0ruRYSmhBISDXMwUC217n8cm9.', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-21 00:50:16', '2020-01-21 00:50:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesan_kirims`
--
ALTER TABLE `pesan_kirims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_masuks`
--
ALTER TABLE `pesan_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesan_kirims`
--
ALTER TABLE `pesan_kirims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan_masuks`
--
ALTER TABLE `pesan_masuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
