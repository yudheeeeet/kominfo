-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 11:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `pengajuan_id`, `room`, `feedback`, `created_at`, `updated_at`) VALUES
(28, 1, 10, '3', 'sip', '2021-02-28 01:14:45', '2021-02-28 01:14:45'),
(29, 1, 11, '5', 'okee', '2021-02-28 01:17:31', '2021-02-28 01:17:31'),
(30, 1, 15, '6', 'nais', '2021-02-28 01:18:38', '2021-02-28 01:18:38'),
(31, 1, 9, '3', 'hhh', '2021-02-28 01:25:02', '2021-02-28 01:25:02'),
(33, 1, 12, '4', 'Oke sip', '2021-03-01 06:08:21', '2021-03-01 06:08:21'),
(34, 1, 19, '7', 'oke nais', '2021-03-01 07:01:52', '2021-03-01 07:01:52'),
(35, 1, 14, 'Tidak tersedia.', 'room tidak ada yang diberikan', '2021-03-01 07:02:50', '2021-03-01 07:02:50'),
(37, 1, 23, '3', 'oke bisa', '2021-03-01 08:04:13', '2021-03-01 08:04:13'),
(38, 1, 17, '6', 'oke', '2021-03-01 22:01:23', '2021-03-01 22:01:23');

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
(3, '2021_02_10_083532_create_roles_table', 2),
(4, '2021_02_10_084259_create_role_user_table', 2),
(7, '2021_02_15_083017_create_rooms_table', 3),
(8, '2021_02_18_145744_create_pengajuans_table', 4),
(9, '2021_02_23_174206_create_feedback_table', 5);

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
-- Table structure for table `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `acara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('diajukan','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuans`
--

INSERT INTO `pengajuans` (`id`, `user_id`, `acara`, `peserta`, `durasi`, `mulai`, `akhir`, `cp`, `lampiran`, `status`, `created_at`, `updated_at`) VALUES
(9, 43, 'Rapat Survei KB', '200 Orang', '3 Hari', '2021-02-24', '2021-02-25', '085223421231', 'file_lampiran/mjPvEmMFQ82I1spoeq9USC9xN7meaXR7JHLhPJj5.pdf', 'ditolak', '2021-02-26 01:13:50', '2021-02-28 00:59:51'),
(10, 23, 'Plotting dana kelas online', '250 orang', '1 hari', '2021-03-01', '2021-03-01', '087633244120', 'file_lampiran/XKK0xKj3jW1ElsbPmtcPdNUF1LKgGFp4YYVrRl8a.pdf', 'diterima', '2021-02-27 21:23:09', '2021-02-28 01:21:22'),
(11, 23, 'Pembagian pulsa untuk siswa', '90 Orang', '2 hari', '2021-03-05', '2021-03-06', '087654331246', 'file_lampiran/AgsGuZKaOdv2EeDiaz741qSuuOKNhkrKjbyfAz9y.pdf', 'diterima', '2021-02-27 21:24:24', '2021-02-28 01:17:11'),
(12, 23, 'Pembahasan mekanisme sekolah tatap muka luring', '400 orang', '4 hari', '2021-03-12', '2021-03-15', '08965432123', 'file_lampiran/HdnC7j9qiDc1LT1Csl6YFCa7UcqSp2WdRHJDq3LY.pdf', 'diterima', '2021-02-27 21:40:40', '2021-03-01 06:08:03'),
(13, 23, 'Mekanisme Pengajuan Acara sekolah-sekolah kabupaten malang', '50 orang', '2 hari', '2021-03-21', '2021-03-22', '085330827236', 'file_lampiran/jXyFm2Y1BwOYMgkBbnI0E6lGGVPpWjYoUgvmSBVJ.pdf', 'ditolak', '2021-02-27 21:50:00', '2021-02-28 00:59:55'),
(14, 23, 'evaluasi pengadaan tatap muka online sekolah-sekolah malang', '500 orang', '7 hari', '2021-07-01', '2021-07-07', '085330827236', 'file_lampiran/oGDO5k0uHPi99PenK1QJSclMFEhWVv2kfFOShx6u.pdf', 'diterima', '2021-02-27 21:51:43', '2021-03-01 07:03:17'),
(15, 49, 'Persiapan Pelaksanaan PKKM Mikro Kabupaten Malang', '150 Orang', '3 Hari', '2021-03-05', '2021-03-06', '087664522129', 'file_lampiran/QxVzw1HVxnK3AiqcPhGvDKJWAFPAcpM42IHcvcgv.pdf', 'diterima', '2021-02-27 22:01:08', '2021-02-28 01:18:23'),
(16, 49, 'Evaluasi pelaksanaan PKKM Kabupaten Malang', '150 Orang', '3 Hari', '2021-02-23', '2021-02-25', '087664522129', 'file_lampiran/O2F12Y92bDV9RePI0BcDoa6ySPtQ5NPCoECFAPkW.pdf', 'diterima', '2021-02-27 22:02:45', '2021-03-01 22:02:16'),
(17, 49, 'Monitoring Balap Liar', '150 Orang', '2 hari', '2021-04-12', '2021-04-13', '087664522129', 'file_lampiran/Rq2qa1PUCpYWAUzITRNM60S8dOwqa2W5kwdLbf3v.pdf', 'ditolak', '2021-02-27 22:04:12', '2021-03-01 22:01:44'),
(18, 49, 'Tertiban Malang', '150 Orang', '2 hari', '2021-04-24', '2021-04-25', '087664522129', 'file_lampiran/kFYuIB3nfDhHKXCKvMDWDZ1SM2CY1tydZAvv0xTP.pdf', 'diajukan', '2021-02-27 22:07:47', '2021-02-27 22:08:39'),
(19, 17, 'Rapat Usaha Mikro Kabupaten Malang', '100 Orang', '3 Hari', '2021-05-12', '2021-05-14', '081244356890', 'file_lampiran/kkOVrba8E9LeHBf3f8AQUml2AiCnRp4Xb4XR961I.pdf', 'diajukan', '2021-02-27 23:06:33', '2021-02-27 23:06:33'),
(20, 17, 'Event Tahunan CFD Malang', '75 orang', '2 hari', '2021-09-30', '2021-10-01', '085776543211', 'file_lampiran/6vpXTYGERmsWZWKcdoSQmqSXoH97UYXyxwRJhu48.pdf', 'diajukan', '2021-02-27 23:19:56', '2021-02-27 23:19:56'),
(21, 93, 'Pelaksanaan KKN Via Online Mahasiswa UMM', '120 Orang', '1 hari', '2021-02-27', '2021-02-27', '083123212432', 'file_lampiran/qSmbLk7BdAQYAAgh6RZ9O8bkbLBQ3IMNUzkWNH3D.pdf', 'diajukan', '2021-02-27 23:25:42', '2021-02-27 23:25:42'),
(22, 30, 'karep', '20 orang', '1 hari', '2020-09-25', '2020-09-25', '085776543211', 'file_lampiran/HWlKO0uGUsu7ln113F0GyA3HCzzLhlNDpmH7kmRO.pdf', 'diterima', '2021-03-01 02:01:35', '2021-03-01 07:02:08'),
(23, 30, 'Peresmian Cangar sebagai area wisata kota Batu', '75 orang', '1 Hari', '2021-03-01', '2021-03-01', '085776543211', 'file_lampiran/lRXU0tZg54a2bwUGaSoebHZMoAfbZVuFCBucQUqP.pdf', 'diterima', '2021-03-01 08:01:04', '2021-03-01 08:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-02-10 05:59:13', '2021-02-10 05:59:13'),
(2, 'user', '2021-02-10 05:59:13', '2021-02-10 05:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 1, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 2, 5, NULL, NULL),
(7, 2, 6, NULL, NULL),
(8, 2, 7, NULL, NULL),
(9, 2, 8, NULL, NULL),
(10, 2, 9, NULL, NULL),
(11, 2, 10, NULL, NULL),
(12, 2, 11, NULL, NULL),
(13, 2, 12, NULL, NULL),
(14, 2, 13, NULL, NULL),
(15, 2, 14, NULL, NULL),
(16, 2, 15, NULL, NULL),
(17, 2, 16, NULL, NULL),
(18, 2, 17, NULL, NULL),
(19, 2, 18, NULL, NULL),
(20, 2, 19, NULL, NULL),
(21, 2, 20, NULL, NULL),
(22, 2, 21, NULL, NULL),
(23, 2, 22, NULL, NULL),
(24, 2, 23, NULL, NULL),
(25, 2, 24, NULL, NULL),
(26, 2, 25, NULL, NULL),
(27, 2, 26, NULL, NULL),
(28, 2, 27, NULL, NULL),
(29, 2, 28, NULL, NULL),
(30, 2, 29, NULL, NULL),
(31, 2, 30, NULL, NULL),
(32, 2, 31, NULL, NULL),
(33, 2, 32, NULL, NULL),
(34, 2, 33, NULL, NULL),
(35, 2, 34, NULL, NULL),
(36, 2, 35, NULL, NULL),
(37, 2, 36, NULL, NULL),
(38, 2, 37, NULL, NULL),
(39, 2, 38, NULL, NULL),
(40, 2, 39, NULL, NULL),
(41, 2, 40, NULL, NULL),
(42, 2, 41, NULL, NULL),
(43, 2, 42, NULL, NULL),
(44, 2, 43, NULL, NULL),
(45, 2, 44, NULL, NULL),
(46, 2, 45, NULL, NULL),
(47, 2, 46, NULL, NULL),
(48, 2, 47, NULL, NULL),
(49, 2, 48, NULL, NULL),
(50, 2, 49, NULL, NULL),
(51, 2, 50, NULL, NULL),
(52, 2, 51, NULL, NULL),
(53, 2, 52, NULL, NULL),
(54, 2, 53, NULL, NULL),
(55, 2, 54, NULL, NULL),
(56, 2, 55, NULL, NULL),
(57, 2, 56, NULL, NULL),
(58, 2, 57, NULL, NULL),
(59, 2, 58, NULL, NULL),
(60, 2, 59, NULL, NULL),
(61, 2, 60, NULL, NULL),
(62, 2, 61, NULL, NULL),
(63, 2, 62, NULL, NULL),
(64, 2, 63, NULL, NULL),
(65, 2, 64, NULL, NULL),
(66, 2, 65, NULL, NULL),
(67, 2, 66, NULL, NULL),
(68, 2, 67, NULL, NULL),
(69, 2, 68, NULL, NULL),
(70, 2, 69, NULL, NULL),
(71, 2, 70, NULL, NULL),
(72, 2, 71, NULL, NULL),
(73, 2, 72, NULL, NULL),
(74, 2, 73, NULL, NULL),
(75, 2, 74, NULL, NULL),
(76, 2, 75, NULL, NULL),
(77, 2, 76, NULL, NULL),
(78, 2, 77, NULL, NULL),
(79, 2, 78, NULL, NULL),
(80, 2, 79, NULL, NULL),
(81, 2, 80, NULL, NULL),
(82, 2, 81, NULL, NULL),
(83, 2, 82, NULL, NULL),
(84, 2, 83, NULL, NULL),
(85, 2, 84, NULL, NULL),
(86, 2, 85, NULL, NULL),
(87, 2, 86, NULL, NULL),
(88, 2, 87, NULL, NULL),
(89, 2, 88, NULL, NULL),
(90, 2, 89, NULL, NULL),
(91, 2, 90, NULL, NULL),
(92, 2, 91, NULL, NULL),
(93, 2, 92, NULL, NULL),
(94, 2, 93, NULL, NULL),
(95, 2, 94, NULL, NULL),
(96, 2, 95, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Meeting_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Passcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akhir_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durasi_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai_penyewaan` date NOT NULL,
  `akhir_penyewaan` date NOT NULL,
  `status` enum('Tersedia','Dipinjam') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `link`, `Meeting_ID`, `Passcode`, `mulai_peminjaman`, `akhir_peminjaman`, `durasi_peminjaman`, `mulai_penyewaan`, `akhir_penyewaan`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Kominfo 1.1', 'https://zoom.us/j/95907931408?pwd=cmw0YzlFWERVK1FkeDhuN1FKYVpVQT09', '959 0793 1408', '3m856p', '2021-03-01', '2021-03-01', '1 Hari', '2020-11-29', '2022-12-29', 'Dipinjam', '2021-02-24 05:42:56', '2021-02-28 00:33:17'),
(4, 'Kominfo 1.2', 'https://us04web.zoom.us/j/77382544797?pwd=a05sRFZyV3dOZnNGcmFpeDM3M2xqdz09', '773 8254 4797', 'MJt8uV', '2021-03-12', '2021-03-15', '4 hari', '2020-06-06', '2021-06-07', 'Dipinjam', '2021-02-24 08:27:37', '2021-02-28 00:26:40'),
(5, 'Kominfo 1.3', 'https://us04web.zoom.us/j/77171942703?pwd=ZGxFSHE0Yk1WbUVaYjViUnRVNy9FZz09', '771 7194 2703', '76eFN8', '2021-03-05', '2021-03-06', '2 hari', '2020-04-04', '2021-04-05', 'Dipinjam', '2021-02-24 08:28:39', '2021-02-25 21:11:16'),
(6, 'Kominfo 2.1', 'https://us04web.zoom.us/j/78548668323?pwd=WG4zK0p0MEcwMHlLYm5ZcUhrSzVyZz09', '785 4866 8323', '5Rm8yP', '2021-04-12', '2021-04-13', '2 hari', '2020-09-24', '2021-09-25', 'Dipinjam', '2021-02-24 08:29:28', '2021-03-01 08:17:00'),
(7, 'Kominfo 2.2', 'https://us04web.zoom.us/j/72307320038?pwd=UVpxYlFPVVNnZnJDUWM1K1MwblRidz09', '723 0732 0038', 'gUZ3wV', NULL, NULL, NULL, '2020-08-16', '2021-08-18', 'Tersedia', '2021-02-24 08:30:19', '2021-03-01 08:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_login` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `user_login`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Komunikasi dan Informatika', 'kominfo@malangkab.go.id', NULL, 3507124, '$2y$10$tyDXv1POFU08BG0OzgfwjOS/iPC/Ty3yDhxy10x1S327PIwODh7HC', NULL, '2021-02-11 20:54:19', '2021-02-11 20:54:19'),
(8, 'Bagian Administrasi Tata Pemerintahan', '123@gmail.com', NULL, 3507011, '$2y$10$78UAYuIQmFgvVWa8vutNdugkag.B9Ju8KIw0rKys0w7s82zymc2dK', NULL, '2021-02-18 08:38:09', '2021-02-24 10:14:19'),
(10, 'Bagian Hukum  Kabupaten Malang', '3507013@gmail.com', NULL, 3507013, '$2y$10$wUgKwyY1iGPQyjLGOOVct.aqt5/W60/SthVP7xQerlwX64IJRUTeW', NULL, '2021-02-18 08:57:14', '2021-02-18 08:57:14'),
(11, 'Bagian Bagian Administrasi Kemasyarakatan dan Pembinaan Mental Kabupaten Malang', '3507014@gmail.com', NULL, 3507014, '$2y$10$p.yw3wG87AC.wqSUfH9LoOZSCrsPXl7A749fHYXLQNJR3VrW4oTr2', NULL, '2021-02-18 08:59:10', '2021-02-18 08:59:10'),
(12, 'Bagian Perekonomian Kabupaten Malang', 'bagekonom@gmail.com', NULL, 3507021, '$2y$10$cjGIWt6/uhEAvWz10sE1cun6lVrX3p0ApElb.Ms5.VfgP5GDV8QCm', NULL, '2021-02-18 08:59:38', '2021-02-24 10:46:03'),
(13, 'Bagian Kerjasama Kabupaten Malang', '3507022@gmail.com', NULL, 3507022, '$2y$10$vb2hPvbfOrGwVZjRMGs3rOvFC9TNrtGJeEm6V3q0bk/IiJ5/kSdK6', NULL, '2021-02-18 09:00:05', '2021-02-18 09:00:05'),
(14, 'Bagian Administrasi Pembangunan Kabupaten Malang', '3507023@gmail.com', NULL, 3507023, '$2y$10$gidbl5e6/JFAZIARvScnGeVWKUc/2S9oEe5SDL15t8VMy0AVY0xUu', NULL, '2021-02-18 09:00:26', '2021-02-18 09:00:26'),
(15, 'Bagian Administrasi Sumber Daya Alam Kabupaten Malang', '3507024@gmail.com', NULL, 3507024, '$2y$10$fa/5lNeWv2m0mkx4qN6xfe0eCjoHJs2AdiS6hxDpuvCr/6XTNibcu', NULL, '2021-02-18 09:00:51', '2021-02-18 09:00:51'),
(17, 'Bagian Tata Usaha Kabupaten Malang', '3507031@gmail.com', NULL, 3507031, '$2y$10$hClXmB1DGF2rtTtjZIGhK.EClgw7xhGRI7R8DYV.A/sckfi2OoGN6', NULL, '2021-02-18 09:03:35', '2021-02-18 09:03:35'),
(18, 'Bagian Umum Kabupaten Malang', '3507032@gmail.com', NULL, 3507032, '$2y$10$pScwyjCLzZF6wa8TWjM4I.3ucyIbxti.RCWe8htZtD0ZvTmHqk6zS', NULL, '2021-02-18 09:03:59', '2021-02-18 09:03:59'),
(19, 'Bagian Hubungan Masyarakat dan Protokol Kabupaten Malang', '3507033@gmail.com', NULL, 3507033, '$2y$10$shljVtwVSui9OFY/MzPDSu4Xl.uKUwd98T1ndNEiPHje1SFBgBxoO', NULL, '2021-02-18 09:04:24', '2021-02-18 09:04:24'),
(20, 'Bagian Bagian Organisasi Kabupaten Malang', '3507034@gmail.com', NULL, 3507034, '$2y$10$YJ.ccXq8.PRcAs9/NjBZu.MlZgiVcy7.Vj9hPDI3Iyq75LwCiKWii', NULL, '2021-02-18 09:04:45', '2021-02-18 09:04:45'),
(21, 'Bagian Sekretariat Dewan Kabupaten Malang', '3507041@gmail.com', NULL, 3507041, '$2y$10$dHBO2idsvUA3bKMxZ771I.O5fDiiy/PT7zV4z7aahS.O88sAHjoDK', NULL, '2021-02-18 09:06:00', '2021-02-18 09:06:00'),
(22, 'Bagian Inspektorat Daerah Kabupaten Malang', '3507050@gmail.com', NULL, 3507050, '$2y$10$4gVNnnmtSnNZf3IUaZWokOkmdJmx/hkRdEvkNVC3SddFvO5kVaILW', NULL, '2021-02-18 09:07:05', '2021-02-18 09:07:05'),
(23, 'Dinas Pendidikan Kabupaten Malang', '3507100@gmail.com', NULL, 3507100, '$2y$10$59P2P4Hu0T1IwuPBm1rji.YMtUz6k1UyampIbGmfC408aHXUbuYOW', NULL, '2021-02-18 09:08:04', '2021-02-18 09:08:04'),
(24, 'Dinas Pemuda dan olahraga Kabupaten Malang', '3507102@gmail.com', NULL, 3507102, '$2y$10$HnVNxipG2NbFIzfmxQpci.ksu7GunbWpgf3LrR3q2/f7rsG48K1yG', NULL, '2021-02-18 09:08:43', '2021-02-18 09:08:43'),
(25, 'Dinas Kesehatan Kabupaten Malang', '3507103@gmail.com', NULL, 3507103, '$2y$10$0Zh/bfcjtHuKRPzGQ575Ee4gcy6Ku6AEvnUhQ4SKKGDTB3NmgfSh2', NULL, '2021-02-18 09:09:07', '2021-02-18 09:09:07'),
(26, 'Dinas Sosial Kabupaten Malang', '3507104@gmail.com', NULL, 3507104, '$2y$10$HqW/XTK0QAbremWG6WCB6.uhvLViY5skS.aCHER6.DtimN0EEuq8C', NULL, '2021-02-18 09:09:26', '2021-02-18 09:09:26'),
(27, 'Dinas Tenaga Kerja Kabupaten Malang', '3507105@gmail.com', NULL, 3507105, '$2y$10$r1mwzbMEPXv6jBcQ3UuxruuiXqw.RJr6ZHI6nl.1g1Lw8swcbjZU6', NULL, '2021-02-18 09:09:42', '2021-02-18 09:09:42'),
(28, 'Dinas Perhubungan Kabupaten Malang', '3507106@gmail.com', NULL, 3507106, '$2y$10$3ajTZ9JrllBNVyHfVvnVj.9NET9q4KhilU2v/nztbJZDPSC9Sl4Mu', NULL, '2021-02-18 09:10:17', '2021-02-18 09:10:17'),
(29, 'Dinas Kependudukan dan Catatan Sipil Kabupaten Malang', '3507107@gmail.com', NULL, 3507107, '$2y$10$WhJGbyUzY4M0TbhTqMYFX./Y8lQ5kP7Ydl4tZvMz6NlCJglFq0GyK', NULL, '2021-02-18 09:10:43', '2021-02-18 09:10:43'),
(30, 'Dinas Kebudayaan dan Pariwisata Kabupaten Malang', '3507108@gmail.com', NULL, 3507108, '$2y$10$8D/r//67MO0nBd4shhoAYutgF/VgMfScLB5wYp37P6c7CWcM7ZJ2i', NULL, '2021-02-18 09:11:01', '2021-02-18 09:11:01'),
(31, 'Dinas Bina Marga Kabupaten Malang', '3507109@gmail.com', NULL, 3507109, '$2y$10$/NHvA5VkvPScPhv0P11th.oRLeMI3tfiPcS6nqarvxxRLbuWRDt2q', NULL, '2021-02-18 09:11:26', '2021-02-18 09:11:26'),
(32, 'Dinas Pekerjaan Umum Sumber Daya Air Kabupaten Malang', '3507110@gmail.com', NULL, 3507110, '$2y$10$/5uF6/KzaJEAfgIBrpk85umEv/1S.neZC/1bx7X7UZPTFsF7G3lQ2', NULL, '2021-02-18 09:11:49', '2021-02-18 09:11:49'),
(33, 'Dinas Perumahan, Kawasan Permukinan dan Cipta Karya Kabupaten Malang', '3507111@gmail.com', NULL, 3507111, '$2y$10$A7X7ZFc89zuwyU3xhGUQsOaCS.Qdsj8LWAbBudEpsfVENDbDk5dSi', NULL, '2021-02-18 09:13:25', '2021-02-18 09:13:25'),
(34, 'Dinas Koperasi dan Usaha Mikro Kabupaten Malang', '3507112@gmail.com', NULL, 3507112, '$2y$10$XtMNxqyVmlmrNoUIHxGHFOK8zuJ6tuXKGBayCCq553S5ICwxpGAPm', NULL, '2021-02-18 09:13:50', '2021-02-18 09:13:50'),
(35, 'Dinas Perindustrian, Perdagangan dan Pasar Kabupaten Malang', '3507113@gmail.com', NULL, 3507113, '$2y$10$9cVy9Xz7.p/EOklxg1dfRO0uIy3xYE94s2PP5WAfKqkBtmNdqKF3m', NULL, '2021-02-18 09:14:12', '2021-02-18 09:14:12'),
(36, 'Dinas Tanaman Pangan, Hortikultura dan Perkebunan Kabupaten Malang', '3507114@gmail.com', NULL, 3507114, '$2y$10$/kCA1FTsx9ZM.NmvIcuT1urWDBwULCPJQ.K1xoOQrarn1VPdOzGKK', NULL, '2021-02-18 09:14:38', '2021-02-18 09:14:38'),
(37, 'Dinas Perikanan Kabupaten Malang', '3507115@gmail.com', NULL, 3507115, '$2y$10$8VU0YCQo4qHQu.AnEEPo0u0.1.VIrKyFGFI46i7E7TwcEX3XMNUpy', NULL, '2021-02-18 09:15:01', '2021-02-18 09:15:01'),
(38, 'Dinas Ketahanan Pangan Kabupaten Malang', '3507116@gmail.com', NULL, 3507116, '$2y$10$H1xB9qTNA4T9gZL6X.x3gOimsgYDfIKJrCvxd7NtaUDtHMqMmK4uK', NULL, '2021-02-18 09:15:27', '2021-02-18 09:15:27'),
(39, 'Dinas Lingkungan Hidup Kabupaten Malang', '3507117@gmail.com', NULL, 3507117, '$2y$10$SbBhvf.brD3jkxicbh1gne58f9eD25Ct/4V/.wXigEQXA8DxtKdNG', NULL, '2021-02-18 09:15:57', '2021-02-18 09:15:57'),
(40, 'Dinas Peternakan dan Kesehatan Hewan Kabupaten Malang', '3507118@gmail.com', NULL, 3507118, '$2y$10$e3bPCIcvQtJSf8kTMmZYau7QMZRM.00qIOx9ERvhWPlL8fRDNMeBe', NULL, '2021-02-18 09:16:20', '2021-02-18 09:16:20'),
(42, 'Dinas Pemberdayaan Masyarakat dan Desa Kabupaten Malang', '3507119@gmail.com', NULL, 3507119, '$2y$10$tzybHMhrKvESIuSJvxXggOQdYetom568thSpkxDQaYnMAkF7Y0D8m', NULL, '2021-02-18 09:17:48', '2021-02-18 09:17:48'),
(43, 'Dinas Pengendalian Penduduk dan Keluarga Berencana Kabupaten Malang', '3507120@gmail.com', NULL, 3507120, '$2y$10$heb6nac0GfYCRk9jS7xKI.jOx6fcSoVEUGkzddvy5EpAr/GfegjGO', NULL, '2021-02-18 09:18:13', '2021-02-18 09:18:13'),
(44, 'Dinas Perpustakaan dan Kearsipan Kabupaten Malang', '3507121@gmail.com', NULL, 3507121, '$2y$10$pvhYJNEF4AJoILR8b101/ewpUykdPnvZf9ERHc0aCb567QKmAnJiG', NULL, '2021-02-18 09:18:35', '2021-02-18 09:18:35'),
(45, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Malang', '3507122@gmail.com', NULL, 3507122, '$2y$10$Ua.zttOactWX.TQ4Zj41DuiqM2hTOb/jbZ36SYRm2oy6yAWt5TqDK', NULL, '2021-02-18 09:18:57', '2021-02-18 09:18:57'),
(46, 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak Kabupaten Malang', '3507123@gmail.com', NULL, 3507123, '$2y$10$rJsoLmb8yRIz.Vl0fThpOOprljMeh67cEl4BlCYTIurnRwSghJ53m', NULL, '2021-02-18 09:19:15', '2021-02-18 09:19:15'),
(47, 'Dinas Komunikasi dan Informatika Kabupaten Malang', '3507124@gmail.com', NULL, 3507124, '$2y$10$pSRg6ILK364RE6jn9V2Jbu/YSPoi8YmlKIQzzLP5FMKztW2AoGUTi', NULL, '2021-02-18 09:19:32', '2021-02-18 09:19:32'),
(48, 'Dinas Pertanahan Kabupaten Malang', '3507125@gmail.com', NULL, 3507125, '$2y$10$5CEcv9T2H26EnuRPOvdUXOOfbcz6E9xUX8MUuo1j9xmQGvC94Q1Xq', NULL, '2021-02-18 09:19:50', '2021-02-18 09:19:50'),
(49, 'Satuan Polisi Pamong Praja dan Perlindungan Masyarakat', '3507126@gmail.com', NULL, 3507126, '$2y$10$VvwKoNUTBuxAftqsdLLYWOquXwr3Dm7v9WUvLzsaF53wVmhbZIHAy', NULL, '2021-02-18 09:20:19', '2021-02-18 09:20:19'),
(51, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kabupaten Malang', '3507201@gmail.com', NULL, 3507201, '$2y$10$/sZjJY1M/4AH9dMq.ZgRIOs/AIMoRBr.Qb01diBCt9E8mkHjO/8iq', NULL, '2021-02-18 09:23:15', '2021-02-18 09:23:15'),
(52, 'Badan Perencanaan Pembangunan Kabupaten Malang', '3507202@gmail.com', NULL, 3507202, '$2y$10$hKNJKMQN15d6HXJcnABd8O1c6NcX3zFiZ1FovK7Hbu7l2rgqPG7SG', NULL, '2021-02-18 09:23:43', '2021-02-18 09:23:43'),
(53, 'Badan Penelitian dan Pengembangan Kabupaten Malang', '3507203@gmail.com', NULL, 3507203, '$2y$10$rN7RGk8cu2wFI1h7d9n/q.d4mDHt8WdUVsAe8xkEnVQmKbLjxblSm', NULL, '2021-02-18 09:24:04', '2021-02-18 09:24:04'),
(54, 'Badan Keuangan dan Aset Daerah Kabupaten Malang', '3507204@gmail.com', NULL, 3507204, '$2y$10$gPcSUu.g7LWmDQNXo2eaZ.M4GsvLwIigW7MpN2bxWKzWtJ2dqu8Tm', NULL, '2021-02-18 09:24:59', '2021-02-18 09:24:59'),
(55, 'Badan Pendapatan Daerah Kabupaten Malang', '3507205@gmail.com', NULL, 3507205, '$2y$10$s.FaNh5lIbUycKWnBbJ0yeh5T33C4AeXFHoBt9ne0XHDkHWnJnhwu', NULL, '2021-02-18 09:25:23', '2021-02-18 09:25:23'),
(57, 'Badan Penanggulangan Bencana Daerah Kabupaten Malang', '3507206@gmail.com', NULL, 3507206, '$2y$10$D67pbWCBDnnHH7/zINvlA.SNzpbGQbBqMJBR4cPp0bg5sUaJKJbQm', NULL, '2021-02-18 09:27:31', '2021-02-18 09:27:31'),
(58, 'Badan Kesatuan Bangsa dan Politik Kabupaten Malang', '3507207@gmail.com', NULL, 3507207, '$2y$10$T4hcUatPsFCP60u67VtHlOraaq1gXk9faEPPM1GSlo7/TOSyFy5ZW', NULL, '2021-02-18 09:27:50', '2021-02-18 09:27:50'),
(59, 'Rumah Sakit Umum Daerah Kanjuruhan', '3507208@gmail.com', NULL, 3507208, '$2y$10$gcv3bMa4Zk.gVv.W3g4gMOEdwlSGDGJ.BBL/tDK5BcmPnVWwBfKPG', NULL, '2021-02-18 09:28:28', '2021-02-18 09:28:28'),
(60, 'Rumah Sakit Umum Daerah Lawang', '3507209@gmail.com', NULL, 3507209, '$2y$10$4Dqv6qjzPGhrYw1LYzPKWOm.VFNXc5xmfmiaR90gsKCjBX057gPiK', NULL, '2021-02-18 09:29:34', '2021-02-18 09:29:34'),
(62, 'Kecamatan Bantur Kabupaten Malang', '350701@gmail.com', NULL, 3507010, '$2y$10$nnMYEKeXMy0U6Ztgc3f5/OSbzUWmG3yoNguHYvQ32LMeU9iv40dFS', NULL, '2021-02-18 09:34:54', '2021-02-18 09:34:54'),
(63, 'Kecamatan Pagak Kabupaten Malang', '350702@gmail.com', NULL, 3507020, '$2y$10$9eKlFSobLQbtvw3YiNb3PusQPj.qb2Ve9viwRQkHL4ZtZPcTChYPG', NULL, '2021-02-18 09:35:46', '2021-02-18 09:35:46'),
(64, 'Kecamatan Bantur Kabupaten Malang', '350703@gmail.com', NULL, 3507030, '$2y$10$GH5WuJ2GNPo.5GHbsDdPNORoV11PDgUL2IZWsKqH2GYRftvu9USW6', NULL, '2021-02-18 09:36:09', '2021-02-18 09:36:09'),
(65, 'Kecamatan Sumber manjing Wetan Kabupaten Malang', '350704@gmail.com', NULL, 3507040, '$2y$10$.E57MrQqpbAO4QxTVVka9uwhYScRyox15raLQr9QwYOr/m/CjARA2', NULL, '2021-02-18 09:36:42', '2021-02-18 09:36:42'),
(66, 'Kecamatan Dampit Kabupaten Malang', '350705@gmail.com', NULL, 3507050, '$2y$10$qoOVLMiO0GiulbgoM/p77eTVneVBXMJFAmW2AzBmXQF40sAR/TNk6', NULL, '2021-02-18 09:37:04', '2021-02-18 09:37:04'),
(67, 'Kecamatan Ampelgading Kabupaten Malang', '350706@gmail.com', NULL, 3507060, '$2y$10$QpxxnGvc8/4oAtEOZwUeZu4IbKy.PC61kaF4U39.jAuUSbQ1.7J1G', NULL, '2021-02-18 09:37:22', '2021-02-18 09:37:22'),
(68, 'Kecamatan Poncokusumo Kabupaten Malang', '350707@gmail.com', NULL, 3507070, '$2y$10$.eaC5WlgyWgaJL.mw0PKxOTuL2fMVZwen3/.Thk.d78GF/LAXiH4G', NULL, '2021-02-18 09:37:42', '2021-02-18 09:37:42'),
(69, 'Kecamatan Wajak Kabupaten Malang', '350708@gmail.com', NULL, 3507080, '$2y$10$UINJDwn.hWDp3Ha2aPLFAekplCHpjSBnePNJp91TZ9eFyYFeMY97q', NULL, '2021-02-18 09:38:11', '2021-02-18 09:38:11'),
(70, 'Kecamatan Turen Kabupaten Malang', '350709@gmail.com', NULL, 3507090, '$2y$10$YYHg5ggxP10SgB5tU63c/eIN3K/K3GzaX7VfglHae9D86VXlf8kWC', NULL, '2021-02-18 09:38:31', '2021-02-18 09:38:31'),
(71, 'Kecamatan Gondanglegi Kabupaten Malang', '350710@gmail.com', NULL, 3507100, '$2y$10$ipQMh5oXzRhAGiuo.6mKW.1gOzl/LMHVRBs.npadFtomaQ3LYg7uW', NULL, '2021-02-18 09:39:13', '2021-02-18 09:39:13'),
(72, 'Kecamatan Kalipare Kabupaten Malang', '350711@gmail.com', NULL, 3507110, '$2y$10$GkrcYr4dCNa/m6BzOGFTvuO09i86xjYpt3qI4TSXTl6WDD7yyuxFW', NULL, '2021-02-18 09:39:32', '2021-02-18 09:39:32'),
(73, 'Kecamatan Sumberpucung Kabupaten Malang', '350712@gmail.com', NULL, 3507120, '$2y$10$uJ24NcstfUwXoO1YyQW3duE.gzrGUdoMR39riUhWP/Z22PdpAXX.e', NULL, '2021-02-18 09:39:54', '2021-02-18 09:39:54'),
(74, 'Kecamatan Kepanjen Kabupaten Malang', '350713@gmail.com', NULL, 3507130, '$2y$10$EmQIdmLxmh/bXFMjT3XECucTwnGmQPvmuZMPLtTupTSnxzrImLQpe', NULL, '2021-02-18 09:40:18', '2021-02-18 09:40:18'),
(75, 'Kecamatan Bululawang Kabupaten Malang', '350714@gmail.com', NULL, 3507140, '$2y$10$u0OjLV1KlCQnZst3llqqP.CnLzBYwr5fOjwYSNnKgVe6tIm0hbtHG', NULL, '2021-02-18 09:40:44', '2021-02-18 09:40:44'),
(76, 'Kecamatan Tajinan Kabupaten Malang', '350715@gmail.com', NULL, 3507150, '$2y$10$600NJXzWj.mJuXlhgBwzXu6T4nGEE0XXZD86/ciUy4Y5Z.8qluqpe', NULL, '2021-02-18 09:41:26', '2021-02-18 09:41:26'),
(77, 'Kecamatan Tumpang Kabupaten Malang', '350716@gmail.com', NULL, 3507160, '$2y$10$HD917MWOzxBgOdGUYfhIF.zlOn.yDO876PdDNUJija9AHsXjp2wHa', NULL, '2021-02-18 09:41:47', '2021-02-18 09:41:47'),
(78, 'Kecamatan Jabung Kabupaten Malang', '350717@gmail.com', NULL, 3507170, '$2y$10$0xHdN7TN7MPPJznvp8Ev8erPW1zRaBrPi44oAOR15vsLO2Z0nXrOe', NULL, '2021-02-18 09:42:08', '2021-02-18 09:42:08'),
(79, 'Kecamatan Pakis Kabupaten Malang', '350718@gmail.com', NULL, 3507180, '$2y$10$RZVSMdyQpme0a1L.7Hzs8ee.DlA0t8zt.oBZPdq1VLxnyLO8TUJZe', NULL, '2021-02-18 09:42:27', '2021-02-18 09:42:27'),
(80, 'Kecamatan Pakisaji Kabupaten Malang', '350719@gmail.com', NULL, 3507190, '$2y$10$TdFZaeSBJJL2WAJaj21LlenpAwiplPAbv410Mw/dBDj.XVa3CyE..', NULL, '2021-02-18 09:42:51', '2021-02-18 09:42:51'),
(81, 'Kecamatan Ngajum Kabupaten Malang', '350720@gmail.com', NULL, 3507200, '$2y$10$/SWX6b2XQIKFjvc770JHiObayiHIUMWP3kTJV9dspmUUr.yyQajje', NULL, '2021-02-18 09:43:17', '2021-02-18 09:43:17'),
(82, 'Kecamatan Wagir Kabupaten Malang', '350721@gmail.com', NULL, 3507210, '$2y$10$XpX2VZRd7OsqlwJmomswWeA8j9KUYxTjTsUWujEwSBU147iOvns1e', NULL, '2021-02-18 09:43:38', '2021-02-18 09:43:38'),
(83, 'Kecamatan Dau Kabupaten Malang', '350722@gmail.com', NULL, 3507220, '$2y$10$s68Y8Ri/G7vr7Nb8DUrVM.MTsDayHg1t7HK2x4A.9xggdOkb8MG/m', NULL, '2021-02-18 09:43:58', '2021-02-18 09:43:58'),
(84, 'Kecamatan Karangploso Kabupaten Malang', '350723@gmail.com', NULL, 3507230, '$2y$10$JwOykXl8FpA3ID0TYHVJ7e1QA9sjn8vQu2rgyLtBWNmFDF50ZWI42', NULL, '2021-02-18 09:45:08', '2021-02-18 09:45:08'),
(85, 'Kecamatan Singosari Kabupaten Malang', '350724@gmail.com', NULL, 3507240, '$2y$10$h75M5mP.0p9QeJPWfOL0JeWIWvNYReE.nsJo9nIWcO3/g8IpUhKFW', NULL, '2021-02-18 09:45:51', '2021-02-18 09:45:51'),
(86, 'Kecamatan Lawang Kabupaten Malang', '350725@gmail.com', NULL, 3507250, '$2y$10$Vt3Xwc7BECn4ZRghssQDieQ1HVn0Tfr74e5uRQPm4mqgQobfF8Idm', NULL, '2021-02-18 09:46:12', '2021-02-18 09:46:12'),
(87, 'Kecamatan Pujon Kabupaten Malang', '350726@gmail.com', NULL, 3507260, '$2y$10$oCkxM0RtItLXsfX9OXrtFue7EGbid4D6XmQAjgpEksbIAOkGmyNWa', NULL, '2021-02-18 09:46:34', '2021-02-18 09:46:34'),
(88, 'Kecamatan Ngantang Kabupaten Malang', '350727@gmail.com', NULL, 3507270, '$2y$10$Pv4IB9j7UbE4BhPTrWqmKuxPX6FbwliLf6YjyGJgBzchh1/lAdmbS', NULL, '2021-02-18 09:46:55', '2021-02-18 09:46:55'),
(89, 'Kecamatan Kasembon Kabupaten Malang', '350728@gmail.com', NULL, 3507280, '$2y$10$wk7LekHFBF6xUgcQaYonOOBqBuejYL5VIFadAxy4H.pdGK7F/oB0m', NULL, '2021-02-18 09:47:14', '2021-02-18 09:47:14'),
(90, 'Kecamatan Gedangan Kabupaten Malang', '350729@gmail.com', NULL, 3507290, '$2y$10$pdCpc10KEVaNk3UtSmnm5e2SdsX2nhqQPJdLuxcR3EGcWbm1D.Irm', NULL, '2021-02-18 09:47:34', '2021-02-18 09:47:34'),
(91, 'Kecamatan Tirtoyudo Kabupaten Malang', '350730@gmail.com', NULL, 3507300, '$2y$10$IVYYw/nh3swANR6BvGJj/Of1t3ZJ6QRWU0jAX4TNaiw1QWyO09Ale', NULL, '2021-02-18 09:48:02', '2021-02-18 09:48:02'),
(92, 'Kecamatan Kromengan Kabupaten Malang', '350731@gmail.com', NULL, 3507310, '$2y$10$974kux2FBH8b6LOA1FU0duDuTbpehHqVyxrtBhuE9F2D0utgS.8KC', NULL, '2021-02-18 09:48:25', '2021-02-18 09:48:25'),
(93, 'Kecamatan Wonosari Kabupaten Malang', '350732@gmail.com', NULL, 3507320, '$2y$10$m0TSoUd6ze/8DZPRfXkwROhunDWrZMBdFNFvpBTmE0Uwi6HtSWshy', NULL, '2021-02-18 09:48:42', '2021-02-18 09:48:42'),
(94, 'Kecamatan Pagelaran Kabupaten Malang', '350733@gmail.com', NULL, 3507330, '$2y$10$UCIA2RYVvB2wgK687g8xouvlf2whyqMV2CmyWEF7x6nbtVIMRlhoG', NULL, '2021-02-18 09:49:02', '2021-02-18 09:49:02'),
(95, 'Bagian Administrasi Kesejahteraan Masyarakat Kabupaten Malang', '3507012@gmail.com', NULL, 3507012, '$2y$10$cDIb/EEdFr5pLp2DdoKN4OoSgnbPoG8oqecUlgmmAe9krwSPxehoW', NULL, '2021-02-18 09:50:11', '2021-02-24 10:08:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
-- Indexes for table `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengajuans`
--
ALTER TABLE `pengajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
