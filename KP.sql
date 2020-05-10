-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2020 at 06:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KP`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `rombel_id` bigint(20) UNSIGNED NOT NULL,
  `rayon_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_absen` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `siswa_id`, `rombel_id`, `rayon_id`, `keterangan`, `tanggal_absen`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 11, 3, 2, 'masuk', '2020-05-10', 1, '2020-05-10 00:18:12', '2020-05-10 00:18:12'),
(2, 14, 13, 2, 'masuk', '2020-05-10', 1, '2020-05-10 00:21:43', '2020-05-10 00:21:43'),
(3, 24, 13, 3, 'masuk', '2020-05-10', 1, '2020-05-10 00:21:43', '2020-05-10 00:21:43'),
(4, 26, 13, 3, 'masuk', '2020-05-10', 1, '2020-05-10 00:21:44', '2020-05-10 00:21:44'),
(5, 1, 1, 3, 'sakit', '2020-05-10', 1, '2020-05-10 01:05:52', '2020-05-10 01:05:52'),
(6, 18, 15, 4, 'masuk', '2020-05-10', 1, '2020-05-10 02:11:28', '2020-05-10 02:11:28'),
(7, 23, 15, 2, 'alfa', '2020-05-10', 1, '2020-05-10 02:11:29', '2020-05-10 02:11:29'),
(8, 4, 25, 4, 'masuk', '2020-05-10', 3, '2020-05-10 03:20:29', '2020-05-10 04:02:24'),
(9, 5, 5, 4, NULL, '2020-05-10', 3, '2020-05-10 03:20:30', '2020-05-10 03:20:30'),
(10, 16, 25, 4, NULL, '2020-05-10', 3, '2020-05-10 03:20:30', '2020-05-10 03:20:30'),
(11, 19, 12, 4, NULL, '2020-05-10', 3, '2020-05-10 03:20:30', '2020-05-10 03:20:30'),
(12, 22, 24, 4, NULL, '2020-05-10', 3, '2020-05-10 03:20:30', '2020-05-10 03:20:30'),
(13, 25, 6, 4, NULL, '2020-05-10', 3, '2020-05-10 03:20:30', '2020-05-10 03:20:30'),
(14, 30, 28, 4, NULL, '2020-05-10', 3, '2020-05-10 03:20:30', '2020-05-10 03:20:30');

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
-- Table structure for table `jenis_kesalahans`
--

CREATE TABLE `jenis_kesalahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kesalahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `short`, `created_at`, `updated_at`) VALUES
(1, 'Rekayasa Perangkatan Lunak', 'RPL', '2020-04-08 02:40:34', '2020-04-08 02:40:34'),
(2, 'Teknik Komputer Jaringan', 'TKJ', '2020-04-08 02:40:34', '2020-04-08 02:40:34'),
(3, 'Multimedia', 'MMD', '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(4, 'Otomatisasi Tata Kelola Perkantoran', 'OTKP', '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(5, 'Bisnis Daring dan Pemasaran', 'BDP', '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(6, 'Perhotelan', 'HTL', '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(7, 'Tataboga', 'TBG', '2020-04-08 02:40:35', '2020-04-08 02:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `laporkan_kesalahans`
--

CREATE TABLE `laporkan_kesalahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kesalahan_id` bigint(20) UNSIGNED NOT NULL,
  `device_digunakan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tangkapan_layar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporkan_siswas`
--

CREATE TABLE `laporkan_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_absen` date NOT NULL,
  `rayon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporkan_siswas`
--

INSERT INTO `laporkan_siswas` (`id`, `siswa_id`, `user_id`, `tanggal_absen`, `rayon_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-05-10', 3, '2020-05-10 01:05:32', '2020-05-10 01:05:32'),
(2, 23, 1, '2020-05-10', 2, '2020-05-10 02:11:25', '2020-05-10 02:11:25'),
(3, 4, 3, '2020-05-10', 4, '2020-05-10 03:02:55', '2020-05-10 03:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `laporkan_siswa_readeds`
--

CREATE TABLE `laporkan_siswa_readeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `laporkan_siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporkan_siswa_readeds`
--

INSERT INTO `laporkan_siswa_readeds` (`id`, `user_id`, `laporkan_siswa_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-05-10 01:05:52', '2020-05-10 01:05:52'),
(2, 3, 3, '2020-05-10 04:02:25', '2020-05-10 04:02:25');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_08_053511_create_roles_table', 1),
(5, '2019_12_08_053629_create_jurusans_table', 1),
(6, '2019_12_08_053659_create_rayons_table', 1),
(7, '2019_12_08_053744_create_rombels_table', 1),
(8, '2019_12_08_053803_create_siswas_table', 1),
(9, '2019_12_08_055400_create_role_user_table', 1),
(10, '2020_04_02_233148_create_absens_table', 1),
(11, '2020_04_03_152945_create_pengumumen_table', 1),
(12, '2020_04_04_113327_create_pengumuman_readeds_table', 1),
(13, '2020_04_04_161232_create_jenis_kesalahans_table', 1),
(14, '2020_04_04_161233_create_laporkan_kesalahans_table', 1),
(15, '2020_04_05_103626_create_laporkan_siswas_table', 1),
(16, '2020_04_05_160837_create_laporkan_siswa_readeds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman_readeds`
--

CREATE TABLE `pengumuman_readeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pengumuman_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman_readeds`
--

INSERT INTO `pengumuman_readeds` (`id`, `user_id`, `pengumuman_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-05-10 00:55:14', '2020-05-10 00:55:14'),
(2, 1, 2, 1, '2020-05-10 01:04:52', '2020-05-10 01:04:52'),
(3, 20, 2, 4, '2020-05-10 01:08:30', '2020-05-10 01:08:30'),
(4, 1, 2, 2, '2020-05-10 01:29:45', '2020-05-10 01:29:45'),
(5, 1, 1, 2, '2020-05-10 01:29:51', '2020-05-10 01:29:51'),
(6, 1, 2, 3, '2020-05-10 02:11:54', '2020-05-10 02:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengumuman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumen`
--

INSERT INTO `pengumumen` (`id`, `subject`, `pengumuman`, `kepada`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Pengetesan', '<p>Seluruhnya mohon dibaca pesan ini karena ini penting!</p><p><span style=\"background-color: rgb(255, 255, 0);\">Dan mohon disebar kepada seluruh orang tua siswa bahwa :</span></p><p>Ini merupakan&nbsp;<span style=\"font-family: Arial; white-space: pre;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span></p><p><span style=\"font-family: Arial; white-space: pre;\">Labore reprehenderit quibusdam vero est exercitationem ut nesciunt, ullam aut, </span></p><p><span style=\"font-family: Arial; white-space: pre;\">possimus ipsam eaque nobis aperiam architecto minus, quis placeat porro deleniti. Odio.</span></p>', '1, 2, 3', 1, '2020-05-10 00:55:13', '2020-05-10 00:55:13'),
(2, 'Pengumuman Pagi', '<p>Hallo bapak ibu!</p>', '4', 1, '2020-05-10 01:04:52', '2020-05-10 01:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `rayons`
--

CREATE TABLE `rayons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rayon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembimbing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rayons`
--

INSERT INTO `rayons` (`id`, `rayon`, `short`, `pembimbing_id`, `created_at`, `updated_at`) VALUES
(1, 'Cicurug 1', 'Cic 1', 1, '2020-04-08 02:40:38', '2020-04-08 02:40:38'),
(2, 'Cicurug 2', 'Cic 2', 1, '2020-04-08 02:40:38', '2020-04-08 02:40:38'),
(3, 'Cicurug 3', 'Cic 3', 1, '2020-04-08 02:40:38', '2020-04-08 02:40:38'),
(4, 'Cicurug 4', 'Cic 4', 3, '2020-04-08 02:40:38', '2020-04-08 02:40:38'),
(5, 'Cicurug 5', 'Cic 5', 1, '2020-04-08 02:40:38', '2020-04-08 02:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Piket dan Kurikulum', '2020-04-08 02:40:33', '2020-04-08 02:40:33'),
(2, 'Guru', '2020-04-08 02:40:34', '2020-04-08 02:40:34'),
(3, 'Pembimbing Rayon', '2020-04-08 02:40:34', '2020-04-08 02:40:34'),
(4, 'Orangtua', '2020-04-08 02:40:34', '2020-04-08 02:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 4, 4, NULL, NULL),
(8, 4, 5, NULL, NULL),
(9, 4, 6, NULL, NULL),
(10, 4, 7, NULL, NULL),
(11, 4, 8, NULL, NULL),
(12, 4, 9, NULL, NULL),
(13, 4, 10, NULL, NULL),
(14, 4, 11, NULL, NULL),
(15, 4, 12, NULL, NULL),
(16, 4, 13, NULL, NULL),
(17, 4, 14, NULL, NULL),
(18, 4, 15, NULL, NULL),
(19, 4, 16, NULL, NULL),
(20, 4, 17, NULL, NULL),
(21, 4, 18, NULL, NULL),
(22, 4, 19, NULL, NULL),
(23, 4, 20, NULL, NULL),
(24, 4, 21, NULL, NULL),
(25, 4, 22, NULL, NULL),
(26, 4, 23, NULL, NULL),
(27, 4, 24, NULL, NULL),
(28, 4, 25, NULL, NULL),
(29, 4, 26, NULL, NULL),
(30, 4, 27, NULL, NULL),
(31, 4, 28, NULL, NULL),
(32, 4, 29, NULL, NULL),
(33, 4, 30, NULL, NULL),
(34, 4, 31, NULL, NULL),
(35, 4, 32, NULL, NULL),
(36, 4, 33, NULL, NULL),
(37, 4, 34, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rombels`
--

CREATE TABLE `rombels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rombel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombels`
--

INSERT INTO `rombels` (`id`, `rombel`, `angkatan`, `kelas`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, 'RPL X-1', '10', 'X-1', 1, '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(2, 'RPL X-2', '10', 'X-2', 1, '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(3, 'RPL X-3', '10', 'X-3', 1, '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(4, 'RPL X-4', '10', 'X-4', 1, '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(5, 'TKJ X-1', '10', 'X-1', 2, '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(6, 'TKJ X-2', '10', 'X-2', 2, '2020-04-08 02:40:35', '2020-04-08 02:40:35'),
(7, 'TKJ X-3', '10', 'X-3', 2, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(8, 'TKJ X-4', '10', 'X-4', 2, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(9, 'MMD X-1', '10', 'X-1', 3, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(10, 'MMD X-2', '10', 'X-2', 3, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(11, 'OTKP X-1', '10', 'X-1', 4, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(12, 'OTKP X-2', '10', 'X-2', 4, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(13, 'RPL XI-1', '11', 'XI-1', 1, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(14, 'RPL XI-2', '11', 'XI-2', 1, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(15, 'RPL XI-3', '11', 'XI-3', 1, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(16, 'RPL XI-4', '11', 'XI-4', 1, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(17, 'TKJ XI-1', '11', 'XI-1', 2, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(18, 'TKJ XI-2', '11', 'XI-2', 2, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(19, 'TKJ XI-3', '11', 'XI-3', 2, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(20, 'TKJ XI-4', '11', 'XI-4', 2, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(21, 'MMD XI-1', '11', 'XI-1', 3, '2020-04-08 02:40:36', '2020-04-08 02:40:36'),
(22, 'MMD XI-2', '11', 'XI-2', 3, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(23, 'OTKP XI-1', '11', 'XI-1', 4, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(24, 'OTKP XI-2', '11', 'XI-2', 4, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(25, 'RPL XII-1', '12', 'XII-1', 1, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(26, 'RPL XII-2', '12', 'XII-2', 1, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(27, 'RPL XII-3', '12', 'XII-3', 1, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(28, 'RPL XII-4', '12', 'XII-4', 1, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(29, 'TKJ XII-1', '12', 'XII-1', 2, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(30, 'TKJ XII-2', '12', 'XII-2', 2, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(31, 'TKJ XII-3', '12', 'XII-3', 2, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(32, 'TKJ XII-4', '12', 'XII-4', 2, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(33, 'MMD XII-1', '12', 'XII-1', 3, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(34, 'MMD XII-2', '12', 'XII-2', 3, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(35, 'OTKP XII-1', '12', 'XII-1', 4, '2020-04-08 02:40:37', '2020-04-08 02:40:37'),
(36, 'OTKP XII-2', '12', 'XII-2', 4, '2020-04-08 02:40:38', '2020-04-08 02:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rombel_id` bigint(20) UNSIGNED NOT NULL,
  `rayon_id` bigint(20) UNSIGNED NOT NULL,
  `orangtua_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nis`, `nama`, `jenis_kelamin`, `rombel_id`, `rayon_id`, `orangtua_id`, `created_at`, `updated_at`) VALUES
(1, '11744775', 'Zalindra Hariyah', 'L', 1, 3, 5, '2020-04-08 02:40:38', '2020-04-08 02:53:16'),
(2, '11759840', 'Fathonah Farida', 'P', 9, 1, 6, '2020-04-08 02:40:38', '2020-04-08 02:53:16'),
(3, '11756296', 'Himawan Ibrani Pradana S.I.Kom', 'L', 25, 2, 7, '2020-04-08 02:40:38', '2020-04-08 02:53:16'),
(4, '11832194', 'Zamira Prastuti', 'P', 25, 4, 8, '2020-04-08 02:40:38', '2020-04-08 02:53:17'),
(5, '11758627', 'Almira Purwanti', 'P', 5, 4, 9, '2020-04-08 02:40:38', '2020-04-08 02:53:17'),
(6, '11728305', 'Yulia Suryatmi M.Farm', 'L', 23, 5, 10, '2020-04-08 02:40:39', '2020-04-08 02:53:17'),
(7, '11701295', 'Balamantri Sihotang', 'P', 20, 1, 11, '2020-04-08 02:40:39', '2020-04-08 02:53:17'),
(8, '11819353', 'Arsipatra Irnanto Maryadi M.Kom.', 'P', 25, 5, 12, '2020-04-08 02:40:39', '2020-04-08 02:53:18'),
(9, '11851306', 'Jarwadi Cakrabuana Ardianto', 'L', 9, 5, 13, '2020-04-08 02:40:39', '2020-04-08 02:53:18'),
(10, '11715091', 'Hesti Pratiwi', 'P', 8, 1, 14, '2020-04-08 02:40:39', '2020-04-08 02:53:18'),
(11, '11839322', 'Jamil Mandala S.Psi', 'L', 3, 2, 15, '2020-04-08 02:40:39', '2020-04-08 02:53:19'),
(12, '11856459', 'Vanya Faizah Hartati', 'L', 10, 1, 16, '2020-04-08 02:40:39', '2020-04-08 02:53:19'),
(13, '11835350', 'Ratna Pratiwi', 'P', 26, 1, 17, '2020-04-08 02:40:39', '2020-04-08 02:53:19'),
(14, '11808761', 'Hasna Puspasari', 'P', 13, 2, 18, '2020-04-08 02:40:39', '2020-04-08 02:53:20'),
(15, '11894615', 'Asirwanda Maulana S.Sos', 'P', 26, 3, 19, '2020-04-08 02:40:39', '2020-04-08 02:53:20'),
(16, '11711533', 'Ghani Kusumo', 'L', 25, 4, 20, '2020-04-08 02:40:39', '2020-04-08 02:53:20'),
(17, '11891991', 'Ivan Haryanto S.Gz', 'L', 26, 3, 21, '2020-04-08 02:40:39', '2020-04-08 02:53:20'),
(18, '11895922', 'Laras Farhunnisa Riyanti S.Farm', 'L', 15, 4, 22, '2020-04-08 02:40:39', '2020-04-08 02:53:21'),
(19, '11848482', 'Pranata Mandala', 'P', 12, 4, 23, '2020-04-08 02:40:40', '2020-04-08 02:53:21'),
(20, '11781469', 'Yoga Bakianto Hakim', 'P', 17, 5, 24, '2020-04-08 02:40:40', '2020-04-08 02:53:21'),
(21, '11825101', 'Silvia Mayasari', 'L', 28, 2, 25, '2020-04-08 02:40:40', '2020-04-08 02:53:22'),
(22, '11747138', 'Jefri Zulkarnain', 'P', 24, 4, 26, '2020-04-08 02:40:40', '2020-04-08 02:53:22'),
(23, '11730222', 'Cemeti Karma Manullang', 'P', 15, 2, 27, '2020-04-08 02:40:40', '2020-04-08 02:53:22'),
(24, '11828019', 'Ivan Situmorang', 'P', 13, 3, 28, '2020-04-08 02:40:40', '2020-04-08 02:53:23'),
(25, '11852504', 'Unjani Suartini', 'L', 6, 4, 29, '2020-04-08 02:40:40', '2020-04-08 02:53:23'),
(26, '11705820', 'Alambana Martana Saefullah M.M.', 'P', 13, 3, 30, '2020-04-08 02:40:40', '2020-04-08 02:53:23'),
(27, '11755218', 'Endra Kuswoyo', 'P', 23, 1, 31, '2020-04-08 02:40:40', '2020-04-08 02:53:23'),
(28, '11825591', 'Gantar Sitorus', 'L', 25, 2, 32, '2020-04-08 02:40:40', '2020-04-08 02:53:24'),
(29, '11839149', 'Rina Maimunah Puspita', 'P', 23, 2, 33, '2020-04-08 02:40:40', '2020-04-08 02:53:24'),
(30, '11802253', 'Nasrullah Gunawan', 'L', 28, 4, 34, '2020-04-08 02:40:40', '2020-04-08 02:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `jenis_kelamin`, `username`, `password`, `email`, `email_verified_at`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Usyi Agnes Wijayanti', 'L', 'humaira51', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pwibisono@example.net', '2020-04-08 02:40:33', '0743 1408 4499', NULL, '2020-04-08 02:40:33', '2020-04-08 02:40:33'),
(2, 'Talia Patricia Purwanti S.Ked', 'L', 'murti34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'marbun.baktiadi@example.com', '2020-04-08 02:40:33', '0696 8352 564', NULL, '2020-04-08 02:40:33', '2020-04-08 02:40:33'),
(3, 'Jelita Nasyiah', 'L', 'jpalastri', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gada.mangunsong@example.org', '2020-04-08 02:40:33', '(+62) 823 443 523', NULL, '2020-04-08 02:40:33', '2020-04-08 02:40:33'),
(4, 'Vicky Putri Halimah', 'L', 'intan79', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'phalim@example.com', '2020-04-08 02:40:33', '0815 4583 3029', NULL, '2020-04-08 02:40:33', '2020-04-08 02:40:33'),
(5, '11744775', NULL, '11744775', '$2y$10$guP.Zs9vSwhIWgohLemVLOkgq4HQLtLfjNN83W1i.qfcH3ebVOg.i', NULL, NULL, NULL, NULL, '2020-04-08 02:53:15', '2020-04-08 02:53:15'),
(6, '11759840', NULL, '11759840', '$2y$10$xGuu7mI7ZOzUMMEZdxG1Fu1FBqd91LvXEXHW0iA8aLa9cEQzAOKtu', NULL, NULL, NULL, NULL, '2020-04-08 02:53:16', '2020-04-08 02:53:16'),
(7, '11756296', NULL, '11756296', '$2y$10$e5DkKs1OsW0NGEpYK8RK0O2WQ10xSGr.APEErIdaRgnwOHoK9d.I2', NULL, NULL, NULL, NULL, '2020-04-08 02:53:16', '2020-04-08 02:53:16'),
(8, '11832194', NULL, '11832194', '$2y$10$95hxVVC56MuhukhfKEVhne0tqb5uxkE9agSiyM6Hd/CLyKdmnw9DO', NULL, NULL, NULL, NULL, '2020-04-08 02:53:16', '2020-04-08 02:53:16'),
(9, '11758627', NULL, '11758627', '$2y$10$QshlHytHD5DvHk7qLo9yeuctVuj8jnbC1iRPWVguU4eeO54uUesY.', NULL, NULL, NULL, NULL, '2020-04-08 02:53:17', '2020-04-08 02:53:17'),
(10, '11728305', NULL, '11728305', '$2y$10$yNhdJPuLFegb6mRDMTuihuHkC8pzCeEqbM09PChYN5VETpnbSXMHG', NULL, NULL, NULL, NULL, '2020-04-08 02:53:17', '2020-04-08 02:53:17'),
(11, '11701295', NULL, '11701295', '$2y$10$tmJLaIF32nSE64IZlFjKaeWe6/emL0LS6flouoBibzkfBIjb49mQC', NULL, NULL, NULL, NULL, '2020-04-08 02:53:17', '2020-04-08 02:53:17'),
(12, '11819353', NULL, '11819353', '$2y$10$IFS29rzhxxG2Oc.IWfbucOVBuRrpOO3xE1bS9i4bCAz565rY6oD8a', NULL, NULL, NULL, NULL, '2020-04-08 02:53:18', '2020-04-08 02:53:18'),
(13, '11851306', NULL, '11851306', '$2y$10$IR3ig65x7wG2v784I.PoI.gzRzK9ON9vCKejSBATCGxWlwMCM9uSe', NULL, NULL, NULL, NULL, '2020-04-08 02:53:18', '2020-04-08 02:53:18'),
(14, '11715091', NULL, '11715091', '$2y$10$yoXIlqPxlyB7wfPhYhbMkuKl.jY.Fyy299B/.8cDekIvdjzYtXtSu', NULL, NULL, NULL, NULL, '2020-04-08 02:53:18', '2020-04-08 02:53:18'),
(15, '11839322', NULL, '11839322', '$2y$10$XUODWIXj9vyeAtcVyNoPe.854oB.DslnjadcgIMh6deuoinkGt0WK', NULL, NULL, NULL, NULL, '2020-04-08 02:53:18', '2020-04-08 02:53:18'),
(16, '11856459', NULL, '11856459', '$2y$10$dHiBqYaNmjbUT/AEg.lmj.H8HcMbwl3g4rK0hp./BfzrIBJZUBXd.', NULL, NULL, NULL, NULL, '2020-04-08 02:53:19', '2020-04-08 02:53:19'),
(17, '11835350', NULL, '11835350', '$2y$10$gOZ60P9nJOWTmAn04ZH4YuaAFPdDF0rNOvYXeTJBaIcqqEgekK5Tu', NULL, NULL, NULL, NULL, '2020-04-08 02:53:19', '2020-04-08 02:53:19'),
(18, '11808761', NULL, '11808761', '$2y$10$RNZ4ntDsxFQwAOGA7zVlXODfZ8SCV5nmLMQvQ3WSlxfNi7nGs/Ewi', NULL, NULL, NULL, NULL, '2020-04-08 02:53:19', '2020-04-08 02:53:19'),
(19, '11894615', NULL, '11894615', '$2y$10$PV.IJFau9Rky/BKYGGUTC.idFmMjDioeu7.swdjsc4lDNERuLDqQK', NULL, NULL, NULL, NULL, '2020-04-08 02:53:20', '2020-04-08 02:53:20'),
(20, '11711533', NULL, '11711533', '$2y$10$PFkAAqmX2zsCteVpq3frdeSAHtv1M.ztaJTjFcMf.UM9MGHNBUnlW', NULL, NULL, NULL, NULL, '2020-04-08 02:53:20', '2020-04-08 02:53:20'),
(21, '11891991', NULL, '11891991', '$2y$10$FKJ1QpWWhys43l1r0GyCWuTTuQwc9m1zD83.X5odTE4cLOzDb6XSK', NULL, NULL, NULL, NULL, '2020-04-08 02:53:20', '2020-04-08 02:53:20'),
(22, '11895922', NULL, '11895922', '$2y$10$wwwF8qJlZJALZkjpdGSQeO7Kdd0ow6PzLyw0Zu0yrQt5s8VTt0MHC', NULL, NULL, NULL, NULL, '2020-04-08 02:53:21', '2020-04-08 02:53:21'),
(23, '11848482', NULL, '11848482', '$2y$10$pKodj7oErl9qv0/.vKQAxO62P9Wxnd/Mu7KapRhDkO9pzXD7nzbiK', NULL, NULL, NULL, NULL, '2020-04-08 02:53:21', '2020-04-08 02:53:21'),
(24, '11781469', NULL, '11781469', '$2y$10$vOclhpNo2Ncjb4LIKOiHqehPMJaGhhxHvW93KSQP9lmK3/Shey30S', NULL, NULL, NULL, NULL, '2020-04-08 02:53:21', '2020-04-08 02:53:21'),
(25, '11825101', NULL, '11825101', '$2y$10$9fCiE9VMnc4Ott.v2K07MOOGNM2TxswrbE0YgT7aemXXqCIuzUbNa', NULL, NULL, NULL, NULL, '2020-04-08 02:53:21', '2020-04-08 02:53:21'),
(26, '11747138', NULL, '11747138', '$2y$10$inUT9W7cm8LXtumATZ6Y2uA0PzMHtIU2nfaNzvbhcqApXEPCSK272', NULL, NULL, NULL, NULL, '2020-04-08 02:53:22', '2020-04-08 02:53:22'),
(27, '11730222', NULL, '11730222', '$2y$10$5PiKr6/rUilM9WhmDDLMP.aA75M7cihhdr93FYsUGGEpnNlh8jr/i', NULL, NULL, NULL, NULL, '2020-04-08 02:53:22', '2020-04-08 02:53:22'),
(28, '11828019', NULL, '11828019', '$2y$10$NMpTjNwkT1Cek5Y5wGE34.aFcLorh71TPGSO.dJs2mV.RoY846xeu', NULL, NULL, NULL, NULL, '2020-04-08 02:53:22', '2020-04-08 02:53:22'),
(29, '11852504', NULL, '11852504', '$2y$10$ZTlTN/3zCdRu7t9cUX57BORJSyKGKq.jeTnOhjv5jXpxtCPGeyKBq', NULL, NULL, NULL, NULL, '2020-04-08 02:53:23', '2020-04-08 02:53:23'),
(30, '11705820', NULL, '11705820', '$2y$10$hW4idWhPwydFBaiF3YTD.O3ucnYf1FlAl/nmGXVPFNeGNsvJosKTS', NULL, NULL, NULL, NULL, '2020-04-08 02:53:23', '2020-04-08 02:53:23'),
(31, '11755218', NULL, '11755218', '$2y$10$fuTLYnKINEMdek9zsfnH3OL/FvA/ObLmOUUEPkpi8QKR9YglpSWEi', NULL, NULL, NULL, NULL, '2020-04-08 02:53:23', '2020-04-08 02:53:23'),
(32, '11825591', NULL, '11825591', '$2y$10$DBUNk8iJa5qLtzIScieFnuJg2cSsXAd9xCFE6LCq6d6JMbvwVVoDC', NULL, NULL, NULL, NULL, '2020-04-08 02:53:24', '2020-04-08 02:53:24'),
(33, '11839149', NULL, '11839149', '$2y$10$GSlcfrPtbBnj4Kr/LaF4L.SLSIlRYhzCJ9nKSubPAFgduB117ufRC', NULL, NULL, NULL, NULL, '2020-04-08 02:53:24', '2020-04-08 02:53:24'),
(34, '11802253', NULL, '11802253', '$2y$10$ZKqLREhkDstUoJ.LuZU80ub4tZmRXNTs97twPcjeu.DEYhMQ0sMLO', NULL, NULL, NULL, NULL, '2020-04-08 02:53:24', '2020-04-08 02:53:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absens_siswa_id_foreign` (`siswa_id`),
  ADD KEY `absens_rombel_id_foreign` (`rombel_id`),
  ADD KEY `absens_rayon_id_foreign` (`rayon_id`),
  ADD KEY `absens_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kesalahans`
--
ALTER TABLE `jenis_kesalahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporkan_kesalahans`
--
ALTER TABLE `laporkan_kesalahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporkan_kesalahans_jenis_kesalahan_id_foreign` (`jenis_kesalahan_id`),
  ADD KEY `laporkan_kesalahans_user_id_foreign` (`user_id`);

--
-- Indexes for table `laporkan_siswas`
--
ALTER TABLE `laporkan_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporkan_siswas_user_id_foreign` (`user_id`),
  ADD KEY `laporkan_siswas_siswa_id_foreign` (`siswa_id`),
  ADD KEY `laporkan_siswas_rayon_id_foreign` (`rayon_id`);

--
-- Indexes for table `laporkan_siswa_readeds`
--
ALTER TABLE `laporkan_siswa_readeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporkan_siswa_readeds_user_id_foreign` (`user_id`),
  ADD KEY `laporkan_siswa_readeds_laporkan_siswa_id_foreign` (`laporkan_siswa_id`);

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
-- Indexes for table `pengumuman_readeds`
--
ALTER TABLE `pengumuman_readeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_readeds_user_id_foreign` (`user_id`),
  ADD KEY `pengumuman_readeds_pengumuman_id_foreign` (`pengumuman_id`),
  ADD KEY `pengumuman_readeds_role_id_foreign` (`role_id`);

--
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumumen_user_id_foreign` (`user_id`);

--
-- Indexes for table `rayons`
--
ALTER TABLE `rayons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rayons_pembimbing_id_foreign` (`pembimbing_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `rombels`
--
ALTER TABLE `rombels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rombels_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_rombel_id_foreign` (`rombel_id`),
  ADD KEY `siswas_rayon_id_foreign` (`rayon_id`),
  ADD KEY `siswas_orangtua_id_foreign` (`orangtua_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kesalahans`
--
ALTER TABLE `jenis_kesalahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporkan_kesalahans`
--
ALTER TABLE `laporkan_kesalahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporkan_siswas`
--
ALTER TABLE `laporkan_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporkan_siswa_readeds`
--
ALTER TABLE `laporkan_siswa_readeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengumuman_readeds`
--
ALTER TABLE `pengumuman_readeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rayons`
--
ALTER TABLE `rayons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rombels`
--
ALTER TABLE `rombels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absens`
--
ALTER TABLE `absens`
  ADD CONSTRAINT `absens_rayon_id_foreign` FOREIGN KEY (`rayon_id`) REFERENCES `rayons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absens_rombel_id_foreign` FOREIGN KEY (`rombel_id`) REFERENCES `rombels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absens_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laporkan_kesalahans`
--
ALTER TABLE `laporkan_kesalahans`
  ADD CONSTRAINT `laporkan_kesalahans_jenis_kesalahan_id_foreign` FOREIGN KEY (`jenis_kesalahan_id`) REFERENCES `jenis_kesalahans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporkan_kesalahans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laporkan_siswas`
--
ALTER TABLE `laporkan_siswas`
  ADD CONSTRAINT `laporkan_siswas_rayon_id_foreign` FOREIGN KEY (`rayon_id`) REFERENCES `rayons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporkan_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporkan_siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laporkan_siswa_readeds`
--
ALTER TABLE `laporkan_siswa_readeds`
  ADD CONSTRAINT `laporkan_siswa_readeds_laporkan_siswa_id_foreign` FOREIGN KEY (`laporkan_siswa_id`) REFERENCES `laporkan_siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporkan_siswa_readeds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengumuman_readeds`
--
ALTER TABLE `pengumuman_readeds`
  ADD CONSTRAINT `pengumuman_readeds_pengumuman_id_foreign` FOREIGN KEY (`pengumuman_id`) REFERENCES `pengumumen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengumuman_readeds_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengumuman_readeds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD CONSTRAINT `pengumumen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rayons`
--
ALTER TABLE `rayons`
  ADD CONSTRAINT `rayons_pembimbing_id_foreign` FOREIGN KEY (`pembimbing_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rombels`
--
ALTER TABLE `rombels`
  ADD CONSTRAINT `rombels_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_orangtua_id_foreign` FOREIGN KEY (`orangtua_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswas_rayon_id_foreign` FOREIGN KEY (`rayon_id`) REFERENCES `rayons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswas_rombel_id_foreign` FOREIGN KEY (`rombel_id`) REFERENCES `rombels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
