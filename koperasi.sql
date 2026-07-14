-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2026 at 06:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(255) NOT NULL,
  `id_pinjaman` varchar(255) DEFAULT NULL,
  `id_member` varchar(255) NOT NULL,
  `id_petugas` varchar(255) NOT NULL,
  `ke_angsuran` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_jatuh_tmp` date NOT NULL,
  `status_bayar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_pinjaman`, `id_member`, `id_petugas`, `ke_angsuran`, `nominal`, `tgl_bayar`, `tgl_jatuh_tmp`, `status_bayar`, `created_at`, `updated_at`) VALUES
('A001', 'L001', 'M001', 'P002', 1, 458333, '2026-07-10', '2026-07-10', 'lunas', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('A002', 'L001', 'M001', 'P002', 2, 458333, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 02:16:49', '2026-07-14 02:16:49'),
('A003', 'L004', 'M003', 'P002', 1, 500000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 07:37:27', '2026-07-14 07:37:27'),
('A004', 'L004', 'M003', 'P002', 2, 1000000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 08:12:00', '2026-07-14 08:12:00'),
('A005', 'L005', 'M007', 'P002', 1, 12000000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 08:14:47', '2026-07-14 08:14:47'),
('A006', 'L005', 'M007', 'P002', 2, 12000000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 08:14:47', '2026-07-14 08:14:47'),
('A007', 'L001', 'M001', 'P002', 3, 1000000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 08:15:03', '2026-07-14 08:15:03'),
('A008', 'L006', 'M006', 'P002', 1, 500000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 08:32:04', '2026-07-14 08:32:04'),
('A009', 'L006', 'M006', 'P002', 2, 500000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 08:36:02', '2026-07-14 08:36:02'),
('A010', 'L007', 'M006', 'P002', 1, 10000000, '2026-07-14', '2026-07-14', 'lunas', '2026-07-14 08:44:07', '2026-07-14 08:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` varchar(255) NOT NULL,
  `id_petugas` varchar(255) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nilai_perolehan` double NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `id_petugas`, `nama_aset`, `kategori`, `nilai_perolehan`, `tgl_perolehan`, `kondisi`, `created_at`, `updated_at`) VALUES
('AS001', 'P002', 'Laptop Asus Pro', 'Elektronik', 8000000, '2026-06-08', 'baik', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('AS002', 'P002', 'Meja Kantor Kayu', 'Furnitur', 1500000, '2026-06-10', 'cukup', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('AS003', 'P002', 'majalah', 'Furnitur', 900000, '2026-07-14', 'rusak', '2026-07-14 02:15:38', '2026-07-14 02:17:32');

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
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` varchar(255) NOT NULL,
  `id_petugas` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `deskripsi` text NOT NULL,
  `debit` double NOT NULL,
  `kredit` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_petugas`, `tgl_transaksi`, `deskripsi`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES
('J001', 'P002', '2026-06-01', 'Setoran Awal Simpanan Pokok Ahmad Fauzi', 500000, 0, '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('J002', 'P002', '2026-06-08', 'Pembelian Aset Laptop Asus Pro', 0, 8000000, '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('J003', 'P002', '2026-07-10', 'Pembayaran Angsuran ke-1 Ahmad Fauzi', 458333, 0, '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('J004', 'P002', '2026-07-14', 'Pembelian Aset: majalah', 0, 900000, '2026-07-14 02:15:38', '2026-07-14 02:15:38'),
('J005', 'P002', '2026-07-14', 'Setoran Simpanan Pokok - kapila', 100000, 0, '2026-07-14 02:16:29', '2026-07-14 02:16:29'),
('J006', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-2 - Ahmad Fauzi', 458333, 0, '2026-07-14 02:16:49', '2026-07-14 02:16:49'),
('J007', 'P003', '2026-07-14', 'Pencairan Pinjaman - kapila', 0, 7000000, '2026-07-14 02:24:59', '2026-07-14 02:24:59'),
('J008', 'P003', '2026-07-14', 'Pencairan Pinjaman - Siti Aminah', 0, 10000000, '2026-07-14 02:25:19', '2026-07-14 02:25:19'),
('J009', 'P002', '2026-07-14', 'Setoran Simpanan Pokok - maul', 12000000, 0, '2026-07-14 07:37:06', '2026-07-14 07:37:06'),
('J010', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-1 - kapila', 500000, 0, '2026-07-14 07:37:27', '2026-07-14 07:37:27'),
('J011', 'P003', '2026-07-14', 'Pencairan Pinjaman - maul', 0, 12000000, '2026-07-14 07:45:05', '2026-07-14 07:45:05'),
('J012', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-2 - kapila', 1000000, 0, '2026-07-14 08:12:00', '2026-07-14 08:12:00'),
('J013', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-1 - maul', 12000000, 0, '2026-07-14 08:14:47', '2026-07-14 08:14:47'),
('J014', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-2 - maul', 12000000, 0, '2026-07-14 08:14:47', '2026-07-14 08:14:47'),
('J015', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-3 - Ahmad Fauzi', 1000000, 0, '2026-07-14 08:15:03', '2026-07-14 08:15:03'),
('J016', 'P003', '2026-07-14', 'Pencairan Pinjaman - putracoba', 0, 1000000, '2026-07-14 08:31:29', '2026-07-14 08:31:29'),
('J017', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-1 - putracoba', 500000, 0, '2026-07-14 08:32:04', '2026-07-14 08:32:04'),
('J018', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-2 - putracoba', 500000, 0, '2026-07-14 08:36:02', '2026-07-14 08:36:02'),
('J019', 'P003', '2026-07-14', 'Pencairan Pinjaman - putracoba', 0, 5000000, '2026-07-14 08:43:19', '2026-07-14 08:43:19'),
('J020', 'P002', '2026-07-14', 'Pembayaran Angsuran ke-1 - putracoba', 10000000, 0, '2026-07-14 08:44:07', '2026-07-14 08:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `alamat`, `no_telepon`, `email`, `status`, `created_at`, `updated_at`) VALUES
('M001', 'Ahmad Fauzi', 'Bukit Cimanggu City Blok M2 No.5, Bogor', '081234567890', 'ahmad@gmail.com', 'aktif', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('M002', 'Siti Aminah', 'bogor', '081298765432', 'siti@gmail.com', 'aktif', '2026-07-14 00:53:59', '2026-07-14 02:06:47'),
('M003', 'kapila', 'bergas.kab semarang', '0818166151', 'kapila@Lokes.com', 'aktif', '2026-07-14 01:19:23', '2026-07-14 01:19:23'),
('M004', 'putra', 'salatiga', '081625344117', 'putra@gmail.com', 'aktif', '2026-07-14 06:06:49', '2026-07-14 06:06:49'),
('M005', 'putra', 'salatiga', '081625344117', 'putra@gmail.com', 'aktif', '2026-07-14 06:08:50', '2026-07-14 06:08:50'),
('M006', 'putracoba', 'salatiga', '0828675155421', 'cob@gmail.com', 'aktif', '2026-07-14 07:19:37', '2026-07-14 07:19:37'),
('M007', 'maul', 'salatiga', '08686755524', 'maul@gmail.com', 'aktif', '2026-07-14 07:28:44', '2026-07-14 07:28:44');

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
(5, '2026_07_14_051745_create_members_table', 1),
(6, '2026_07_14_051755_create_petugas_table', 1),
(7, '2026_07_14_051811_create_simpanans_table', 1),
(8, '2026_07_14_051820_create_pinjamen_table', 1),
(9, '2026_07_14_051832_create_angsurans_table', 1),
(10, '2026_07_14_051841_create_asets_table', 1),
(11, '2026_07_14_051848_create_jurnals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `username`, `password`, `hak_akses`, `created_at`, `updated_at`) VALUES
('P001', 'Budi Santoso', 'admin', '$2y$10$wmOyeZODHyzg2TpbpqTqPuD9gD3kSYqUyliXe1t789rKf38lXdmdC', 'admin', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('P002', 'Wahyu Ningsih', 'bendahara', '$2y$10$FbimNaEWh8lkhVrgG97b2.xAMsHB9bMBrei1Kuj2wx1SaWPb9nOAW', 'bendahara', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('P003', 'H. Rahmat', 'ketua', '$2y$10$E2IbvzPQjf0seAbwIqpDZ.HZG./Z2f3yb/B3NW28Ub4gR8IkYRy1G', 'ketua', '2026-07-14 00:53:59', '2026-07-14 00:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(255) NOT NULL,
  `id_member` varchar(255) NOT NULL,
  `id_petugas` varchar(255) NOT NULL,
  `tgl_ajuan` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `tenor` int(11) NOT NULL,
  `bunga` double(8,2) NOT NULL,
  `nominal` double NOT NULL,
  `sisa_pinjaman` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_member`, `id_petugas`, `tgl_ajuan`, `status`, `tenor`, `bunga`, `nominal`, `sisa_pinjaman`, `created_at`, `updated_at`) VALUES
('L001', 'M001', 'P001', '2026-06-01', 'approved', 12, 1.50, 5000000, 3083334, '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('L002', 'M002', 'P001', '2026-07-14', 'approved', 24, 1.50, 10000000, 10000000, '2026-07-14 00:53:59', '2026-07-14 02:25:19'),
('L003', 'M001', 'P001', '2026-07-14', 'rejected', 6, 1.50, 5000000, NULL, '2026-07-14 01:29:20', '2026-07-14 02:25:03'),
('L004', 'M003', 'P001', '2026-07-14', 'approved', 6, 1.50, 7000000, 5500000, '2026-07-14 01:38:00', '2026-07-14 02:24:59'),
('L006', 'M006', 'P001', '2026-07-14', 'lunas', 6, 1.50, 1000000, 0, '2026-07-14 08:31:07', '2026-07-14 08:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_arsip`
--

CREATE TABLE `pinjaman_arsip` (
  `id_pinjaman` varchar(255) NOT NULL,
  `id_member` varchar(255) NOT NULL,
  `id_petugas` varchar(255) NOT NULL,
  `tgl_ajuan` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `tenor` int(11) NOT NULL,
  `bunga` double(8,2) NOT NULL,
  `nominal` double NOT NULL,
  `sisa_pinjaman` double DEFAULT NULL,
  `tgl_lunas` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjaman_arsip`
--

INSERT INTO `pinjaman_arsip` (`id_pinjaman`, `id_member`, `id_petugas`, `tgl_ajuan`, `status`, `tenor`, `bunga`, `nominal`, `sisa_pinjaman`, `tgl_lunas`, `created_at`, `updated_at`) VALUES
('L007', 'M006', 'P001', '2026-07-14', 'lunas', 6, 1.50, 5000000, 0, '2026-07-14', '2026-07-14 08:41:29', '2026-07-14 08:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` varchar(255) NOT NULL,
  `id_member` varchar(255) NOT NULL,
  `id_petugas` varchar(255) NOT NULL,
  `jenis_simp` varchar(255) NOT NULL,
  `nominal` double NOT NULL,
  `tgl_simpan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `id_member`, `id_petugas`, `jenis_simp`, `nominal`, `tgl_simpan`, `created_at`, `updated_at`) VALUES
('S001', 'M001', 'P002', 'pokok', 500000, '2026-06-01', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('S002', 'M001', 'P002', 'wajib', 2400000, '2026-06-15', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('S003', 'M001', 'P002', 'sukarela', 1500000, '2026-07-01', '2026-07-14 00:53:59', '2026-07-14 00:53:59'),
('S004', 'M003', 'P002', 'pokok', 100000, '2026-07-14', '2026-07-14 02:16:29', '2026-07-14 02:16:29'),
('S005', 'M007', 'P002', 'pokok', 12000000, '2026-07-14', '2026-07-14 07:37:06', '2026-07-14 07:37:06');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nkl', 'kapila@Lokes.com', NULL, '$2y$10$SzlHLWn1CP2YXCpCUtvfxu.4eQZl9Oc4AUhjDoEUqPvrDk2LlUrPy', NULL, '2026-07-14 01:19:23', '2026-07-14 01:19:23'),
(2, 'kono', 'kupa@122.com', NULL, '$2y$10$CB7BgjjE3ocuRj46.8cmF.58amTV3vdPf2HnKgUmcW2dbWruLGnqe', NULL, '2026-07-14 01:31:55', '2026-07-14 01:31:55'),
(3, 'put', 'putra@gmail.com', NULL, '$2y$10$hG6fOJEUOtFzEEXLI5KcP.5r4bruubJDbv7KILiBgP98IMpD6VeaG', NULL, '2026-07-14 06:08:50', '2026-07-14 06:08:50'),
(4, 'tra', 'cob@gmail.com', NULL, '$2y$10$27Poxv4Uv57ZzPIc.ZGereBJCl6E2ygYVvVAoVn8D3SN5Pw3WHefG', NULL, '2026-07-14 07:19:37', '2026-07-14 07:19:37'),
(5, 'mau', 'maul@gmail.com', NULL, '$2y$10$SckWU12zQJuYPgJO3DxYm.9OC4Ra5xfzu/4M2PoLdA.a03RGXQLOy', NULL, '2026-07-14 07:28:44', '2026-07-14 07:28:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `angsurans_id_member_foreign` (`id_member`),
  ADD KEY `angsurans_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `asets_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `jurnals_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `pinjamans_id_member_foreign` (`id_member`),
  ADD KEY `pinjamans_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `pinjaman_arsip`
--
ALTER TABLE `pinjaman_arsip`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `pinjamans_id_member_foreign` (`id_member`),
  ADD KEY `pinjamans_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `simpanans_id_member_foreign` (`id_member`),
  ADD KEY `simpanans_id_petugas_foreign` (`id_petugas`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
