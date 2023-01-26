-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 11:05 AM
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
(7, '2020_01_22_090412_create_tasks_table', 2),
(8, '2020_01_27_022134_create_projects_table', 3),
(9, '2020_01_30_042948_create_notes_table', 4),
(10, '2020_01_31_141933_create_pre_projects_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0=open 1=done 2=overdue',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `id_user`, `tanggal`, `status`, `note`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-30', 1, '<p>tes reminder 5</p>', '2020-01-31 09:00:00', '2020-01-29 22:00:01', '2020-01-31 04:27:23'),
(3, 1, '2020-01-31', 0, '<p>tes reminder 2</p>', '2020-01-31 03:17:00', '2020-01-30 19:34:11', '2020-01-30 20:15:52');

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
-- Table structure for table `pre_projects`
--

CREATE TABLE `pre_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_projects`
--

INSERT INTO `pre_projects` (`id`, `id_project`, `tanggal`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-31', 'Tes 2', '<p style=\"color: rgb(87, 87, 87); font-family: Muli, -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p><p style=\"color: rgb(87, 87, 87); font-family: Muli, -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p><p style=\"color: rgb(87, 87, 87); font-family: Muli, -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><b>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</b><br></p>', '2020-01-31 08:04:22', '2020-01-31 09:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0=development 1=production',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `nama`, `status`, `description`, `leader`, `created_at`, `updated_at`) VALUES
(1, 'Kita Goodeva', 0, 'Aplikasi Web Kita Goodeva', NULL, '2020-01-26 20:25:39', '2020-01-26 20:59:18'),
(100, 'Other Project', 0, 'othe rproject for counter measure add', NULL, '2020-01-26 20:25:39', '2020-01-26 20:59:18'),
(101, 'Pama Gss', 0, 'Aplikasi Smart Safety Pama', NULL, '2020-01-31 09:42:51', '2020-01-31 09:42:51'),
(102, 'KPP GSS', 0, 'Aplikasi Smart Safety KPP', NULL, '2020-01-31 09:50:41', '2020-01-31 09:50:41');

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
  `project_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0=open 1=on proses 2=waiting check 3=on time 4=delay 5=ct 6=ot',
  `status_check` int(11) DEFAULT 0 COMMENT '0=not check 1=monitor 2=checked ontime 3=checked delay',
  `delay` int(11) DEFAULT 0 COMMENT '0 = tidak ,1 = iya',
  `problem` int(11) DEFAULT NULL COMMENT '1= problem',
  `status_problem` int(11) DEFAULT 0 COMMENT '0=not done 1=done',
  `counter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `id_user`, `tanggal`, `task`, `jam_mulai`, `jam_selesai`, `project_id`, `status`, `status_check`, `delay`, `problem`, `status_problem`, `counter`, `measer`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-26', 'upload kita goodeva to server', '08:15', '09:30', 1, 4, 0, 1, 1, 1, '<p>tes counter 1</p>', '<p>tes measure 2</p>', '2020-01-27 00:36:27', '2020-01-28 08:41:30'),
(2, 1, '2020-01-26', 'perbaikan tambah task ada master project', '09:30', '10:30', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:36:27', '2020-01-27 01:08:25'),
(3, 1, '2020-01-26', 'perbaikan tambah counter measer', '10:30', '11:30', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:36:28', '2020-01-27 01:08:25'),
(4, 1, '2020-01-26', 'perbaikan task delay tambah ke hari selanjutnya', '11:30', '15:30', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:36:28', '2020-01-27 01:08:25'),
(6, 1, '2020-01-27', 'upload kita goodeva to server', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:52:54', '2020-01-27 19:14:00'),
(7, 1, '2020-01-27', 'perbaikan tambah task ada master project', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:52:54', '2020-01-27 19:14:00'),
(8, 1, '2020-01-27', 'perbaikan tambah counter measer', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:52:54', '2020-01-27 19:14:00'),
(9, 1, '2020-01-27', 'perbaikan task delay tambah ke hari selanjutnya', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:52:54', '2020-01-27 19:14:00'),
(10, 1, '2020-01-27', 'perbaikan button ubah status,edit,dan finish task daily task', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 00:52:54', '2020-01-27 19:14:01'),
(11, 1, '2020-01-27', 'Other Task', '00:00', '00:00', 100, 4, 0, 1, 1, 1, '<p>tes add cm</p>', '<p>tes ad cm 2</p>', '2020-01-27 02:20:47', '2020-01-28 08:41:33'),
(12, 1, '2020-01-28', 'upload kita goodeva to server', '08:15', '08:15', 1, 3, 2, 0, NULL, 0, NULL, NULL, '2020-01-27 19:14:00', '2020-01-28 02:36:42'),
(13, 1, '2020-01-28', 'perbaikan tambah task ada master project', '08:15', '08:15', 1, 0, 1, 0, NULL, 0, NULL, NULL, '2020-01-27 19:14:00', '2020-01-28 02:41:03'),
(14, 1, '2020-01-28', 'perbaikan tambah counter measer', '08:15', '08:15', 1, 3, 2, 0, NULL, 0, NULL, NULL, '2020-01-27 19:14:00', '2020-01-28 02:41:06'),
(15, 1, '2020-01-28', 'perbaikan task delay tambah ke hari selanjutnya', '08:15', '08:15', 1, 4, 3, 1, 1, 0, '<p>tes 5</p>', '<p>tes 4</p>', '2020-01-27 19:14:00', '2020-01-28 02:56:38'),
(16, 1, '2020-01-28', 'perbaikan button ubah status,edit,dan finish task daily task', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 19:14:00', '2020-01-29 01:08:23'),
(17, 1, '2020-01-28', 'Other Task', '08:15', '08:15', 100, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-27 19:14:01', '2020-01-29 01:08:23'),
(18, 1, '2020-01-28', 'tes tambah admin', '12:00', '15:00', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-28 02:13:20', '2020-01-29 01:08:23'),
(19, 1, '2020-01-28', 'tes tambah admin 2', '15:00', '17:00', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-28 02:13:20', '2020-01-29 01:08:23'),
(20, 1, '2020-01-28', 'Other Task', '00:00', '00:00', 100, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-28 02:56:59', '2020-01-29 01:08:23'),
(21, 1, '2020-01-29', 'perbaikan button ubah status,edit,dan finish task daily task', '08:15', '08:15', 1, 0, 1, 0, NULL, 0, NULL, NULL, '2020-01-29 01:08:23', '2020-01-29 01:09:57'),
(22, 1, '2020-01-29', 'Other Task', '08:15', '08:15', 100, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 01:08:23', '2020-01-29 21:09:31'),
(23, 1, '2020-01-29', 'tes tambah admin', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 01:08:23', '2020-01-29 21:09:32'),
(24, 1, '2020-01-29', 'tes tambah admin 2', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 01:08:23', '2020-01-29 21:09:32'),
(25, 1, '2020-01-29', 'Other Task', '08:15', '08:15', 100, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 01:08:23', '2020-01-29 21:09:32'),
(26, 1, '2020-01-30', 'Other Task', '08:15', '08:15', 100, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 21:09:31', '2020-01-30 19:32:56'),
(27, 1, '2020-01-30', 'tes tambah admin', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 21:09:31', '2020-01-30 19:32:56'),
(28, 1, '2020-01-30', 'tes tambah admin 2', '08:15', '08:15', 1, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 21:09:32', '2020-01-30 19:32:56'),
(29, 1, '2020-01-30', 'Other Task', '08:15', '08:15', 100, 4, 0, 1, NULL, 0, NULL, NULL, '2020-01-29 21:09:32', '2020-01-30 19:32:57'),
(30, 1, '2020-01-31', 'Other Task', '08:15', '08:15', 100, 0, 0, 0, NULL, 0, NULL, NULL, '2020-01-30 19:32:56', '2020-01-30 19:32:56'),
(31, 1, '2020-01-31', 'tes tambah admin', '08:15', '08:15', 1, 0, 1, 0, NULL, 0, NULL, NULL, '2020-01-30 19:32:56', '2020-01-31 04:29:47'),
(32, 1, '2020-01-31', 'tes tambah admin 2', '08:15', '08:15', 1, 4, 3, 1, NULL, 0, NULL, NULL, '2020-01-30 19:32:56', '2020-01-31 04:29:29'),
(33, 1, '2020-01-31', 'Other Task', '08:15', '08:15', 100, 0, 0, 0, NULL, 0, NULL, NULL, '2020-01-30 19:32:56', '2020-01-30 19:32:56'),
(35, 1, '2020-01-31', 'tes demo 2 admin', '12:00', '15:00', 1, 0, 0, 0, NULL, 0, NULL, NULL, '2020-01-31 04:09:03', '2020-01-31 04:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT 1 COMMENT '1=user 2=admin cit 3=admin cbd 4=superadmin',
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

INSERT INTO `users` (`id`, `name`, `email`, `username`, `role`, `email_verified_at`, `password`, `divisi`, `jabatan`, `bio`, `image`, `background`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'Anonim', 'anonim@mail.com', 'anonim', 1, NULL, '$2y$10$YpJQQfv.eoAnowMjvWt75u1z2Ru0ruRYSmhBISDXMwUC217n8cm9.', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-21 00:50:16', '2020-01-21 00:50:16'),
(1, 'zaidan riski', 'zdnrsk@gmail.com', 'zaidanriski', 1, NULL, '$2y$10$fajVnRVs7yAD2Y28Lc6c5O1DrqE6yvBLuAzPkpdhpe.sEmBG75Xbe', 1, 'Staff IT', 'tes', NULL, NULL, NULL, '2020-01-21 00:49:41', '2020-01-21 21:20:41'),
(2, 'tes user', 'tes@gmail.com', NULL, 1, NULL, '$2y$10$YpJQQfv.eoAnowMjvWt75u1z2Ru0ruRYSmhBISDXMwUC217n8cm9.', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-21 00:50:16', '2020-01-21 00:50:16'),
(4, 'jehan', 'jehansangkakala@gmail.com', 'jehan@goodeva.co.id', 1, NULL, '$2y$10$p01lcVXOgZrTtRwvkY53.ODW0Khi2ft3drOIvtYoW1VYKH.3vqVEi', 2, 'Staff Creative', NULL, NULL, NULL, NULL, '2020-01-26 18:37:23', '2020-01-26 18:41:51'),
(5, 'Admin Goodeva', 'admin@goodeva.co.id', 'admingoodeva', 4, NULL, '$2y$10$YpJQQfv.eoAnowMjvWt75u1z2Ru0ruRYSmhBISDXMwUC217n8cm9.', 1, 'Superadmin', NULL, NULL, NULL, NULL, '2020-01-21 00:50:16', '2020-01-21 00:50:16');

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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- Indexes for table `pre_projects`
--
ALTER TABLE `pre_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `pre_projects`
--
ALTER TABLE `pre_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
