-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2024 at 04:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvg`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Id` int NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Slug` text,
  `Kategori` varchar(100) DEFAULT NULL,
  `Img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Keterangan` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Id`, `Nama`, `Slug`, `Kategori`, `Img`, `Keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pesta Ulang Tahun', 'pesta-ulang-tahun', 'Pesta', 'foto_produk/4kOPsauTY3QNCN1gQ19QyE2842RL0zD2A9aN15zF.jpg', 'Pesta ulang tahun dengan venue dan spesifikasi terbaik, sangat cocok untuk buah hati tercinta.', '2023-12-02 21:49:49', '2023-12-31 11:03:56'),
(2, 'Pesta Pernikahan', 'pesta-pernikahan', 'Pesta', 'foto_produk/lmPcIHq2vOeoJQdQ1QB2vjdu6vmsNp1lY3p10kVr.jpg', 'Pesta pernikahan untuk merayakan moment sakral dan penuh kenangan dalam hidup.', '2023-12-02 21:49:49', '2023-12-31 11:03:47'),
(3, 'Konser', 'konser', 'Konser', 'foto_produk/V7WGxt5lAR6wvTlt4U3t3hNKVdc2tzPLwkgEX7q4.jpg', 'Konser spektakuler dengan berbagai pilihan bintang tamu yang akan memberikan pengalaman luar biasa.', '2023-12-02 21:49:49', '2024-01-07 13:24:08'),
(5, 'Konser Musik', 'konser-musik', 'Konser', 'foto_produk/DtOGFrnxTLdgteW4C01NfxyU03JaTgUdWy3dU5VM.jpg', 'Konser musik spektakuler dengan efek suara yang luar biasa. Cocok untuk kegiatan luar biasa yang akan dilakukan.', '2023-12-31 14:56:23', '2023-12-31 14:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `item_bak`
--

CREATE TABLE `item_bak` (
  `Id` int NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Slug` text,
  `Kategori` varchar(100) DEFAULT NULL,
  `Img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Keterangan` text,
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifyDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_bak`
--

INSERT INTO `item_bak` (`Id`, `Nama`, `Slug`, `Kategori`, `Img`, `Keterangan`, `CreateDate`, `ModifyDate`) VALUES
(1, 'Pesta Ulang Tahun', 'pesta-ulang-tahun', 'Pesta', 'assets/images/g-4.jpg', 'Pesta ulang tahun dengan venue dan spesifikasi terbaik, sangat cocok untuk buah hati tercinta.', '2023-12-02 21:49:49', NULL),
(2, 'Pesta Pernikahan', 'pesta-pernikahan', 'Pesta', 'assets/images/g-5.jpg', 'Pesta pernikahan untuk merayakan moment sakral dan penuh kenangan dalam hidup.', '2023-12-02 21:49:49', NULL),
(3, 'Konser', 'konser', 'Konser', 'assets/images/g-1.jpg', 'Konser spektakuler dengan berbagai pilihan bintang tamu yang akan memberikan pengalaman luar biasa.', '2023-12-02 21:49:49', NULL),
(4, 'Custom', 'custom', 'Kustom', 'assets/images/about-img.jpg', 'Buat event anda sendiri.', '2023-12-02 21:49:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi`
--

CREATE TABLE `spesifikasi` (
  `Id` int NOT NULL,
  `IdItem` int NOT NULL,
  `Tag` int NOT NULL,
  `Detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Harga` bigint NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spesifikasi`
--

INSERT INTO `spesifikasi` (`Id`, `IdItem`, `Tag`, `Detail`, `Harga`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 'Paket Untuk 25 Orang', 5000000, '2023-12-02 21:53:50', NULL),
(2, 1, 50, 'Paket Untuk 50 Orang', 10000000, '2023-12-02 21:53:50', NULL),
(3, 1, 75, 'Paket Untuk 75 Orang', 15000000, '2023-12-02 21:53:50', NULL),
(4, 2, 50, 'Paket Untuk 50 Orang', 150000000, '2023-12-02 21:53:50', NULL),
(5, 2, 100, 'Paket Untuk 100 Orang', 200000000, '2023-12-02 21:53:50', NULL),
(6, 2, 150, 'Paket Untuk 150 Orang', 250000000, '2023-12-02 21:53:50', NULL),
(7, 3, 500, 'Paket Untuk 500 Orang', 500000000, '2023-12-02 21:53:50', '2024-01-07 13:24:23'),
(8, 3, 1000, 'Paket Untuk 1000 Orang', 700000000, '2023-12-02 21:53:50', NULL),
(9, 3, 1500, 'Paket Untuk 1500 Orang', 900000000, '2023-12-02 21:53:50', '2023-12-31 15:37:43'),
(13, 3, 2000, 'Paket Untuk 2000 Orang', 1000000000, '2024-01-07 13:24:39', '2024-01-07 13:24:39'),
(17, 5, 2000, 'Paket Untuk 2000 Orang', 1200000000, '2024-01-10 15:08:01', '2024-01-10 15:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi_bak`
--

CREATE TABLE `spesifikasi_bak` (
  `Id` int NOT NULL,
  `IdItem` int NOT NULL,
  `Tag` int NOT NULL,
  `Detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Harga` bigint NOT NULL,
  `CreateDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spesifikasi_bak`
--

INSERT INTO `spesifikasi_bak` (`Id`, `IdItem`, `Tag`, `Detail`, `Harga`, `CreateDate`, `ModifyDate`) VALUES
(1, 1, 25, 'Paket Untuk 25 Orang', 5000000, '2023-12-02 21:53:50', NULL),
(2, 1, 50, 'Paket Untuk 50 Orang', 10000000, '2023-12-02 21:53:50', NULL),
(3, 1, 75, 'Paket Untuk 75 Orang', 15000000, '2023-12-02 21:53:50', NULL),
(4, 2, 50, 'Paket Untuk 50 Orang', 150000000, '2023-12-02 21:53:50', NULL),
(5, 2, 100, 'Paket Untuk 100 Orang', 200000000, '2023-12-02 21:53:50', NULL),
(6, 2, 150, 'Paket Untuk 150 Orang', 250000000, '2023-12-02 21:53:50', NULL),
(7, 3, 500, 'Paket Untuk 500 Orang', 500000000, '2023-12-02 21:53:50', NULL),
(8, 3, 1000, 'Paket Untuk 1000 Orang', 700000000, '2023-12-02 21:53:50', NULL),
(9, 3, 150, 'Paket Untuk 1500 Orang', 900000000, '2023-12-02 21:53:50', NULL),
(10, 4, 25, 'Harga Awal', 3000000, '2023-12-02 21:53:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Id` int NOT NULL,
  `IdCustomer` int NOT NULL,
  `KuotaCustom` int DEFAULT NULL,
  `NamaPaket` varchar(200) DEFAULT NULL,
  `JumlahPax` varchar(100) DEFAULT NULL,
  `Harga` int DEFAULT NULL,
  `MetodePembayaran` text,
  `NoPembayaran` text,
  `Venue` varchar(255) DEFAULT NULL,
  `AlamatVenue` varchar(255) DEFAULT NULL,
  `WaktuMulai` datetime DEFAULT NULL,
  `WaktuSelesai` datetime DEFAULT NULL,
  `Status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Belum Bayar',
  `bank_pembayaran` varchar(30) DEFAULT NULL,
  `bukti_pembayaran` text,
  `IsVerify` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'N',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Id`, `IdCustomer`, `KuotaCustom`, `NamaPaket`, `JumlahPax`, `Harga`, `MetodePembayaran`, `NoPembayaran`, `Venue`, `AlamatVenue`, `WaktuMulai`, `WaktuSelesai`, `Status`, `bank_pembayaran`, `bukti_pembayaran`, `IsVerify`, `created_at`, `updated_at`) VALUES
(8, 1, NULL, 'Pesta Ulang Tahun', '50', 10000000, 'Transfer', NULL, 'Gedung Serbaguna Senayan', 'Jl. Pintu Satu Senayan Jl. New Delhi No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', '2023-12-29 00:00:00', '2023-12-29 00:00:00', 'Sudah Diverifikasi', 'Mandiri', 'bukti_bayar_1703998363.png', 'N', '2023-12-28 10:39:01', '2023-12-31 16:31:36'),
(9, 1, NULL, 'Pesta Pernikahan', '100', 200000000, 'Transfer', NULL, 'Gedung Serbaguna Senayan', 'Jl. Pintu Satu Senayan Jl. New Delhi No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', '2024-01-03 00:00:00', '2024-01-03 00:00:00', 'Sudah Diverifikasi', 'Mandiri', 'bukti_bayar_1704250828.jpg', 'N', '2024-01-03 02:59:30', '2024-01-07 13:23:23'),
(10, 3, NULL, 'Pesta Ulang Tahun', '50', 10000000, 'Transfer', NULL, 'Gedung Serbaguna Senayan', 'Jl. Pintu Satu Senayan Jl. New Delhi No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', '2024-01-07 00:00:00', '2024-01-07 00:00:00', 'Sudah Diverifikasi', 'Mandiri', 'bukti_bayar_1704633722.png', 'N', '2024-01-07 13:21:39', '2024-01-10 14:37:59'),
(11, 4, NULL, 'Pesta Ulang Tahun', '50', 10000000, 'Transfer', NULL, 'Gedung Serbaguna Senayan', 'Jl. Pintu Satu Senayan Jl. New Delhi No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', '2024-01-10 00:00:00', '2024-01-10 00:00:00', 'Sudah Diverifikasi', 'Mandiri', 'bukti_bayar_1704897085.PNG', 'N', '2024-01-10 14:29:36', '2024-01-10 15:02:34'),
(12, 4, NULL, 'Pesta Ulang Tahun', '50', 10000000, 'Transfer', NULL, 'Gedung Serbaguna Senayan', 'Jl. Pintu Satu Senayan Jl. New Delhi No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', '2024-01-11 00:00:00', '2024-01-11 00:00:00', 'Sudah Bayar', 'Mandiri', 'bukti_bayar_1704898476.PNG', 'N', '2024-01-10 14:53:27', '2024-01-10 14:54:36'),
(13, 4, NULL, 'Konser', '1000', 700000000, 'Transfer', NULL, 'Lantai 2 Cafe Z', 'Jl Raya Jakarta Bogor', '2024-01-10 00:00:00', '2024-01-10 00:00:00', 'Sudah Diverifikasi', 'Mandiri', 'bukti_bayar_1704901284.png', 'N', '2024-01-10 15:41:08', '2024-01-10 15:45:11'),
(14, 4, NULL, 'Pesta Pernikahan', '100', 200000000, 'Transfer', NULL, 'Gedung Serbaguna Senayan', 'Jl. Pintu Satu Senayan Jl. New Delhi No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', '2024-01-19 00:00:00', '2024-01-19 00:00:00', 'Sudah Diverifikasi', 'Mandiri', 'bukti_bayar_1704901778.jpg', 'N', '2024-01-10 15:48:41', '2024-01-10 15:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` text,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `level` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `foto`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Wildan Rasyidi A', 'foto_profil/lhUMcGdcVB9eF6cjMCfndLbAAP2f2OQ8FGN9LdjJ.jpg', 'L', 'Jl. Pekapuran RT001 RW05 NO XX Kelurahan Curug, Kecamatan Cimanggis, Kota Depok, Jawa Barat', '0896999999', 'wilras2003@gmail.com', NULL, '$2y$12$mgQqSm5hTA4tY7323CTa/Oul9QGYDl0g/gGhUFwEf5wKJTpjLtre2', NULL, 0, '2023-12-11 07:24:06', '2023-12-31 02:20:18'),
(2, 'Atmin', 'foto_profil/RKHdDP5G52hhVQ5fr7I1VrezqnWZ9SDp4XW1jJKX.png', 'L', 'Depok', '089699222', 'wilras2016@gmail.com', NULL, '$2y$12$YjdGvXV9RuRGcYcnwV6WK.h8lVPjfpOMxjUZYDk84/U/AB6dZdOfy', NULL, 1, '2023-12-31 02:25:22', '2024-01-10 08:45:44'),
(3, 'Wildan Rasyidi Asy S', NULL, 'L', 'Jl Pekapuran', '089649955199', 'wilras2017@gmail.com', NULL, '$2y$12$Vrf..xNkDsENQhyoqjJ/V.HUVsxdiFka3Ai22LnxEndljlZGPaEvy', NULL, 0, '2024-01-07 06:20:48', '2024-01-07 06:20:48'),
(4, 'Michael Keyva', 'foto_profil/3bjWS3W6XTfJgldQzC7gtSFVNA1GruotCriamaol.png', 'L', 'Depok', '089688494568', '4521210008@univpancasila.ac.id', NULL, '$2y$12$v7C6cYh/1OUdEEmcT28pd.dv7cUfe/y8g8kxXcJUboQjt72ziaPGy', NULL, 0, '2024-01-10 07:23:21', '2024-01-10 08:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `Id` int NOT NULL,
  `Nama` varchar(200) DEFAULT NULL,
  `Kota` varchar(255) DEFAULT NULL,
  `Alamat` text,
  `Url` text,
  `Kapasitas` int DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifyDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`Id`, `Nama`, `Kota`, `Alamat`, `Url`, `Kapasitas`, `CreateDate`, `ModifyDate`) VALUES
(1, 'Gedung Serbaguna Senayan', 'Jakarta', 'Jl. Pintu Satu Senayan Jl. New Delhi No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'https://maps.app.goo.gl/edkyhuKojkMUbqx6A', 2000, '2023-12-03 14:26:36', '2023-12-03 07:25:13'),
(2, 'Lantai 2 Cafe Z', 'Jakarta', 'Jl Raya Jakarta Bogor', NULL, 50, '2023-12-03 14:37:24', '2023-12-03 07:36:46');

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
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `item_bak`
--
ALTER TABLE `item_bak`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `spesifikasi`
--
ALTER TABLE `spesifikasi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdItem` (`IdItem`);

--
-- Indexes for table `spesifikasi_bak`
--
ALTER TABLE `spesifikasi_bak`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdItem` (`IdItem`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdUser` (`IdCustomer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item_bak`
--
ALTER TABLE `item_bak`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spesifikasi`
--
ALTER TABLE `spesifikasi`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `spesifikasi_bak`
--
ALTER TABLE `spesifikasi_bak`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
