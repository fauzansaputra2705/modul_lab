-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2020 pada 01.38
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laboratorium`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accounts`
--

CREATE TABLE `accounts` (
  `acount_number` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `accounts`
--

INSERT INTO `accounts` (`acount_number`, `user_id`, `balance`, `created_at`, `update_at`) VALUES
('55AB123456', 1, -60, '2019-09-02', '2019-09-02'),
('55AC123456', 2, 180, '2019-09-02', '2019-09-02'),
('55AD123456', 3, 50, '2019-09-02', '2019-09-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cetak_lab`
--

CREATE TABLE `cetak_lab` (
  `id_cetak_lab` int(5) NOT NULL,
  `no_rkm_medis` int(15) NOT NULL,
  `nm_pasien` varchar(100) NOT NULL,
  `jk_umur` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_periksa` varchar(30) NOT NULL,
  `penggung_jwb` varchar(100) NOT NULL,
  `dokter_pengirim` varchar(100) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `jam_pemeriksaan` time NOT NULL,
  `poli` varchar(100) NOT NULL,
  `jenis_pemeriksaan` text NOT NULL,
  `hasil` text NOT NULL,
  `satuan` text NOT NULL,
  `nilai_rujukan` text NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_cetak` datetime NOT NULL,
  `petugas_lab` varchar(100) NOT NULL,
  `biaya` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `kd_dokter` varchar(20) NOT NULL,
  `nm_dokter` varchar(50) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tmp_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gol_drh` enum('A','B','O','AB','-') DEFAULT NULL,
  `agama` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jns_perawatan_lab`
--

CREATE TABLE `jns_perawatan_lab` (
  `id_jenis_perawat` int(5) NOT NULL,
  `kode_periksa` varchar(10) NOT NULL,
  `nama_pemeriksaan` varchar(20) DEFAULT NULL,
  `tarif` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` int(20) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `updatetomesstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` set('active','pending','not_active','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `email`, `nama`, `tgl_lahir`, `alamat`, `ip_address`, `updatetomesstamp`, `status`) VALUES
(1, 'fauzan', 'fauzan123', 'fauzansaputra2705@gmail.com', 'fauzan saputra', '2019-09-23', 'depok', '192.128.1.1', '2019-09-24 00:00:12', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `no_rawat` int(15) NOT NULL,
  `no_rkm_medis` int(15) NOT NULL,
  `nm_pasien` varchar(40) DEFAULT NULL,
  `jenis_kelamin` set('Laki Laki','Perempuan') NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `penaggung_jwb` varchar(50) DEFAULT NULL,
  `hbng_pj` varchar(50) DEFAULT NULL,
  `jenis_bayar` varchar(10) DEFAULT NULL,
  `kamar` varchar(15) DEFAULT NULL,
  `trf_kmr` double NOT NULL,
  `diagnosa_awal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tmp_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gol_drh` enum('A','B','O','AB','-') DEFAULT NULL,
  `agama` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `telepon`
--

CREATE TABLE `telepon` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `telepon`
--

INSERT INTO `telepon` (`id`, `nama`, `nomor`) VALUES
(1, 'Orion', '08576666762'),
(2, 'Mars', '08576666770'),
(3, 'Alpha', '08576666765'),
(4, 'Alpha', '08576666766'),
(5, 'Alpha', '08576666767'),
(6, 'Alpha', '08576666768'),
(7, 'Alpha', '08576666769'),
(8, 'Alpha', '08576666770'),
(9, 'Alpha', '08576666771'),
(10, 'Alpha', '085766667672');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Fauzan Saputra', 'fauzansaputra2705@gmail.com', '2019-07-31 21:19:26', 'fauzan', 'QwErTY', '2019-08-01 17:00:00', '2019-08-01 17:00:00'),
(2, 'Liana Heaney', 'ichamplin@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hqhNAUVYhD', '2019-01-19 01:48:41', '2019-08-19 01:48:41'),
(3, 'Iva Balistreri', 'tania.gutkowski@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OXG9Q29Jao', '2019-01-19 01:48:41', '2019-08-19 01:48:41'),
(4, 'Melody Mante', 'kweber@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hi0Tizoxo7', '2019-01-19 01:48:41', '2019-11-19 01:48:41'),
(5, 'Brennan Moore', 'reilly.lavonne@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L05JHdhGEc', '2019-01-19 01:48:41', '2019-08-19 01:48:41'),
(6, 'Meda Heller', 'lhamill@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8JwnjRoav8', '2019-01-19 01:48:42', '2019-08-19 01:48:42'),
(7, 'Prof. Minerva Shields III', 'fred.flatley@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'b28cJE36Em', '2019-01-19 01:48:42', '2019-08-19 01:48:42'),
(8, 'Prof. Linwood Mohr Jr.', 'wyman.brook@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5EvjEd6WRe', '2019-01-19 01:48:42', '2019-08-19 01:48:42'),
(9, 'Kayley Keebler', 'skihn@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TvVufe23Ms', '2019-01-19 01:48:42', '2019-08-19 01:48:42'),
(10, 'Chauncey Satterfield', 'lbotsford@example.org', '2019-01-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vCG15b9tNb', '2019-01-19 01:48:42', '2019-08-19 01:48:42'),
(11, 'Luigi Goyette Sr.', 'alene17@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2Op9T4A1An', '2019-02-19 01:48:42', '2019-08-19 01:48:42'),
(12, 'Juvenal Feeney', 'eddie54@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NXnwX2dwHm', '2019-02-19 01:48:42', '2019-08-19 01:48:42'),
(13, 'Bridie Jones', 'iwaelchi@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IGVSD0gcHO', '2019-02-19 01:48:42', '2019-08-19 01:48:42'),
(14, 'Jayme Robel', 'volkman.maryse@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'feKyxwEznM', '2019-02-19 01:48:42', '2019-08-19 01:48:42'),
(15, 'Thalia Murray', 'rhand@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QpAfQKl021', '2019-02-19 01:48:42', '2019-08-19 01:48:42'),
(16, 'Miss Esther Stanton Sr.', 'maxine.weimann@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Xlm2djLAyQ', '2019-02-19 01:48:42', '2019-08-19 01:48:42'),
(17, 'Prof. Peyton Jacobson', 'mwilderman@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1bKJd6nARd', '2019-03-19 01:48:42', '2019-08-19 01:48:42'),
(18, 'Alanna Hegmann', 'watson.huel@example.net', '2019-03-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nnjEIkCotD', '2019-03-19 01:48:42', '2019-08-19 01:48:42'),
(19, 'Lula Brekke', 'abbott.heidi@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wGiWAuHhod', '2019-03-19 01:48:42', '2019-08-19 01:48:42'),
(20, 'Chance Bradtke', 'dylan.batz@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '18AQxbC2d8', '2019-03-19 01:48:42', '2019-08-19 01:48:42'),
(21, 'Izabella DuBuque', 'jgleason@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Nj8MVmmVz4', '2019-03-19 01:48:42', '2019-08-19 01:48:42'),
(22, 'Jefferey Turner', 'jedediah.rogahn@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JK4DKjN8WA', '2019-03-19 01:48:42', '2019-08-19 01:48:42'),
(23, 'Wayne Lebsack', 'oberbrunner.cielo@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IPtfuduFi6', '2019-03-19 01:48:42', '2019-08-19 01:48:42'),
(24, 'Jackeline Quigley', 'xnikolaus@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YO1p3BtYPK', '2019-03-19 01:48:43', '2019-08-19 01:48:43'),
(25, 'Clementina King DDS', 'hhowe@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dhVtcWbIni', '2019-03-19 01:48:43', '2019-08-19 01:48:43'),
(26, 'Mrs. Henriette Farrell', 'gilda.gibson@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WSjeJppfjS', '2019-03-19 01:48:43', '2019-08-19 01:48:43'),
(27, 'Miss Shemar Bode', 'eichmann.alvena@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aqLczOtxBj', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(28, 'Zella Jacobson', 'orval.mayert@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WtNhlDZe9F', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(29, 'Prof. Pink Walsh', 'hartmann.wyman@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'H7zztIWLrU', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(30, 'Dr. Elaina Haley', 'koepp.floy@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1V7xj4bO8L', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(31, 'Brittany Huels', 'srolfson@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FecAem9S7o', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(32, 'Oswald Stiedemann', 'clemmie11@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2BrsGeKIIQ', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(33, 'Ewald Aufderhar', 'jimmie76@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bb202FsOb5', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(34, 'Erik Sporer I', 'scotty11@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fKcgUPJ3AB', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(35, 'Santiago Harvey', 'kreiger.jarod@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0A31JIJ0zN', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(36, 'Miss Crystel Langosh II', 'icie02@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CiDaxvRKJE', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(37, 'Camron Stoltenberg', 'dbecker@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F9xPzaiw2x', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(38, 'Edna Jones', 'parker.lang@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QyscwwxtKO', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(39, 'Meredith Buckridge', 'elda.hartmann@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UlyQZWdsS2', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(40, 'Deja Kertzmann', 'davonte46@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cooi2vz0m5', '2019-08-19 01:48:43', '2019-08-19 01:48:43'),
(41, 'Pasquale Cartwright', 'lhilpert@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'K77PeiMxXN', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(42, 'Matt Crona', 'parisian.chaya@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XwHats2Tu3', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(43, 'Mrs. Caitlyn Runte IV', 'hahn.kylee@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AEHTTa0Ad8', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(44, 'Buster Von', 'caden59@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3xCcgPdyi1', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(45, 'Fredrick Price', 'qhuel@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gNNq2n4PmX', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(46, 'Mr. Wilburn Johnston', 'sandrine81@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ib1zbUd6a2', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(47, 'Quincy Batz', 'germaine.torphy@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Xk4KCxiCcL', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(48, 'Assunta Green II', 'baumbach.rosa@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'atszebomKU', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(49, 'Dr. Major Jaskolski IV', 'egaylord@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xyYaZ733Dg', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(50, 'Emmitt Trantow IV', 'feil.kelly@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2mRQXoLUCc', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(51, 'Vernon Padberg', 'lauretta00@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '35Bsp38evT', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(52, 'Madelynn Spinka', 'nitzsche.gunnar@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BG5jhsN2mB', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(53, 'Kay Kutch', 'danny.wolff@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6YbfU9vtLJ', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(54, 'Flavie Swift', 'katharina41@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NlHp5N958q', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(55, 'Ali Dare', 'hardy57@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fSBIPVBluZ', '2019-08-19 01:48:44', '2019-08-19 01:48:44'),
(56, 'Jocelyn Padberg', 'felipe92@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'K1XUeDtHzG', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(57, 'Miss Shanelle O\'Hara', 'uparker@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WWSa5cMfQ8', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(58, 'Kaylee Nikolaus', 'kelsi.schuster@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xmAKsiWOm3', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(59, 'Fanny Daniel', 'pgreenholt@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F9DjlUt23n', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(60, 'Wyatt Mante', 'hdoyle@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'o12HOsRSfz', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(61, 'Jo Powlowski IV', 'kris.peter@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'M5AIEwQflS', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(62, 'Miss Myrna Stroman Sr.', 'augusta93@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Db8OPSZkC2', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(63, 'Juliana Doyle', 'trenton69@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZjqxUykITu', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(64, 'Chris Walker', 'wilkinson.felicity@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MIFv3O7l4H', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(65, 'Dejon Fay', 'damore.nicholas@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I8EQHAHuGm', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(66, 'Hailey Olson', 'turner.maggie@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XarSBcAfI1', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(67, 'Pablo Funk', 'mmann@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7rrrzWSHkb', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(68, 'Darren Breitenberg', 'vada.mccullough@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nzzClrADBf', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(69, 'Ruthe Bechtelar', 'fnikolaus@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'a1c0RfZegx', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(70, 'Simone Mraz', 'winona.stehr@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Yb86ajeeeL', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(71, 'Nicolette Lowe', 'alivia68@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tSVqJlGUyN', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(72, 'Anya Lockman', 'hagenes.robbie@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mt7TLVA4JP', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(73, 'Jessica Hodkiewicz', 'fisher.hillary@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1uTWBHKvFc', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(74, 'Ellen Grant', 'marisa88@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1KCy1fmMuq', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(75, 'Allan Howell', 'kennedy44@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hlnRd0A6SD', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(76, 'Mikel Beahan', 'taylor72@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i98Lg1tCLm', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(77, 'Luis Feest', 'houston70@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U5VNPC6JSW', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(78, 'Ms. Cassandre Considine PhD', 'barrows.murray@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gq4g5M9bfx', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(79, 'Darrell Marks', 'leann.marquardt@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '00tHkAaDq7', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(80, 'Xander Kunze', 'donny.huels@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GnsYjiSxGc', '2019-08-19 01:48:45', '2019-08-19 01:48:45'),
(81, 'Jefferey Lebsack', 'edwina.roberts@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HZocUfUsP6', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(82, 'Elroy Batz', 'tchamplin@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EGDya4ZRRt', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(83, 'Hassan Hintz', 'jeff90@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zyVxCx3JDr', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(84, 'Dr. Austen Wisozk DDS', 'shyanne.runolfsdottir@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fd3uZouAPh', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(85, 'Benedict Stokes', 'caden.mohr@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PGN6lwSikI', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(86, 'Dr. Priscilla Braun', 'hobart40@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's7k2Kr5it8', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(87, 'Terrell Gorczany', 'pagac.margret@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JuDsNsJaNc', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(88, 'Ms. Cassandra Hudson MD', 'david.johnston@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U6OtyA4BTY', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(89, 'Wilbert Dooley', 'udouglas@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kOJoeUpLEk', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(90, 'Eldora Lemke', 'hirthe.ellen@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Kg9PP600kW', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(91, 'Dr. Cara Kreiger MD', 'alf.okon@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uSmvSWWYBm', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(92, 'Miss Frieda Larkin', 'jadyn.connelly@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'miEJUUooaK', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(93, 'Jovan Walter V', 'asha55@example.org', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'H4QXChckW0', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(94, 'Mr. Zachariah Morar', 'lorn@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3Jt8WHMWBg', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(95, 'Jefferey Daugherty V', 'isabella.rutherford@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tBsSvOaRou', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(96, 'Lizzie Connelly', 'nikita.moore@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TTax70HWEl', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(97, 'Caleb Berge', 'bfarrell@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '25lmi8uFN2', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(98, 'Rosella Goyette', 'sconsidine@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mEC0LC4Z9L', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(99, 'Dr. Bertha Greenholt II', 'mervin.olson@example.net', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yWhiOXYNDF', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(100, 'Ms. Hassie Homenick', 'torrey21@example.com', '2019-08-19 01:48:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2wihYg0ezM', '2019-08-19 01:48:46', '2019-08-19 01:48:46'),
(101, 'Maxwell Reinger', 'walsh.estevan@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LHkTHFc493', '2019-09-16 18:14:34', '2019-09-16 18:14:34'),
(102, 'Jerome Kirlin', 'klein.ofelia@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'npw3ReW7L7', '2019-09-16 18:14:34', '2019-09-16 18:14:34'),
(103, 'Ramona Cole DDS', 'kylie61@example.com', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'E6VYfbH5l7', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(104, 'Cecile Dibbert', 'ciara26@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2dJq4w3SWt', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(105, 'Dave Hauck', 'libby09@example.net', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SPIpnubW30', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(106, 'Prof. Jameson Maggio', 'semard@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7bSJI6EowX', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(107, 'Amos Stokes', 'karlee81@example.com', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'COrlSFguU3', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(108, 'Kip Fahey', 'johnston.ottis@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MjldcfHvDC', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(109, 'Eunice Collier', 'louvenia.cruickshank@example.net', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JcQVT82LF4', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(110, 'Frederick Jaskolski', 'joey.armstrong@example.net', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZWeMM812y5', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(111, 'Prof. Duncan McLaughlin', 'unique86@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iM4DxZNxvn', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(112, 'Dr. Leo Sipes', 'pfannerstill.amber@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'B66es0iCGt', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(113, 'Jailyn Lubowitz', 'greenholt.rory@example.net', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 't7gnZ8zHV5', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(114, 'Gerald Feeney Jr.', 'cummings.herminia@example.com', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZHwHYnGhmt', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(115, 'Fannie Schoen', 'will.bethany@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'j4SJ7xb4za', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(116, 'Sidney Lowe', 'okoss@example.org', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5mkqCyPVNX', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(117, 'Freeman Rutherford', 'williamson.tyrese@example.net', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lY9Lm1bsdM', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(118, 'Prof. Walker Ullrich', 'willow09@example.com', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Gh3gT8LtS7', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(119, 'Dr. Wayne Williamson', 'joyce.kassulke@example.net', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lzItjS1Qr2', '2019-09-16 18:14:35', '2019-09-16 18:14:35'),
(120, 'Juliana Stroman', 'mittie78@example.com', '2019-09-16 18:14:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OgzkjHVdDo', '2019-09-16 18:14:35', '2019-09-16 18:14:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `cetak_lab`
--
ALTER TABLE `cetak_lab`
  ADD PRIMARY KEY (`id_cetak_lab`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `jns_perawatan_lab`
--
ALTER TABLE `jns_perawatan_lab`
  ADD PRIMARY KEY (`id_jenis_perawat`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `telepon`
--
ALTER TABLE `telepon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cetak_lab`
--
ALTER TABLE `cetak_lab`
  MODIFY `id_cetak_lab` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jns_perawatan_lab`
--
ALTER TABLE `jns_perawatan_lab`
  MODIFY `id_jenis_perawat` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `telepon`
--
ALTER TABLE `telepon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
