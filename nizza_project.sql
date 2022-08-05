-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2022 pada 16.08
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nizza_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluars`
--

CREATE TABLE `barang_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_keluars`
--

INSERT INTO `barang_keluars` (`id`, `nama_barang`, `nama_supplier`, `merk`, `harga_satuan`, `harga_beli`, `satuan`, `barang_id`, `tanggal_keluar`, `jumlah`, `size`, `created_at`, `updated_at`) VALUES
(4, 'Kursi', 'Pt. Omnimon', NULL, '200000', NULL, '35', 4, '2022-05-01', 100, NULL, '2022-07-30 15:31:15', '2022-07-30 15:31:15'),
(5, 'Rak Piring Longs', 'PT. Alphamon', 'Ah Long', '25000', NULL, NULL, NULL, '2022-05-20', 25, '20', '2022-08-03 21:12:34', '2022-08-03 21:12:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jumlah_stock` int(11) DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_masuks`
--

INSERT INTO `barang_masuks` (`id`, `id_supplier`, `nama_barang`, `barang_id`, `nama_supplier`, `merk`, `harga_satuan`, `harga_beli`, `satuan`, `tanggal_masuk`, `jumlah_stock`, `size`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Kursi', 4, 'PT. Alphamon', NULL, NULL, NULL, NULL, '2005-08-01', 100, NULL, '2022-07-09 02:56:45', '2022-07-09 02:56:45'),
(5, NULL, 'Rak Piring Longs', NULL, 'Pt. Omnimon', 'Omegamon', '25000', NULL, NULL, '2022-05-05', 20, '25 Meter Kuadrat', '2022-08-03 09:36:11', '2022-08-03 09:36:11'),
(6, NULL, 'Rak Piring Longs', NULL, 'PT. Alphamon', 'Omegamon', '25000', NULL, NULL, '2007-05-06', 24, 'XLL', '2022-08-03 18:14:00', '2022-08-03 18:14:00'),
(7, NULL, 'Rak Piring Longs', NULL, 'Pt. Omnimon', 'Ah Long', '25000', NULL, NULL, '2022-03-25', 24, '20', '2022-08-03 20:58:57', '2022-08-03 20:58:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barangs`
--

CREATE TABLE `data_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_barangs`
--

INSERT INTO `data_barangs` (`id`, `id_kategori`, `nama_barang`, `kode_barang`, `nama_supplier`, `merk`, `harga_satuan`, `harga_beli`, `satuan`, `size`, `created_at`, `updated_at`, `nama_kategori`) VALUES
(4, NULL, 'Kursi', NULL, 'Pt. Omnimon', 'Hanif', '12000', '0', 'Meter', '25', '2022-07-09 02:56:22', '2022-08-01 19:51:47', NULL),
(6, NULL, 'Rak Piring Longs', 'Rak Piring', 'PT. Alphamon', 'Ah Long', '25000', NULL, NULL, '20', '2022-08-03 09:33:37', '2022-08-03 09:33:37', NULL),
(7, NULL, 'Kasur Spring Bed', 'Kasur', 'Pt. Omnimon', 'Ada Band', '200000', NULL, NULL, '100 meter kuadrat', '2022-08-03 16:48:21', '2022-08-03 16:48:21', NULL),
(9, NULL, 'Payung Teduh', NULL, 'PT. Alphamon', 'Flash', '25000', NULL, NULL, '23 cm', '2022-08-03 22:21:50', '2022-08-03 22:21:50', 'Jemuran'),
(10, NULL, 'Kursi Biru', NULL, 'PT. Alphamon', 'Snopen', '25000', NULL, NULL, 'XL', '2022-08-04 19:24:32', '2022-08-04 19:24:32', 'Lain-lain'),
(11, NULL, 'Lemari Warrior', NULL, 'Pt. Omnimon', 'Snopen', '250000', NULL, NULL, '1 meter kuadrat', '2022-08-04 19:34:56', '2022-08-04 19:34:56', 'Lemari'),
(12, NULL, 'Jemuran Plastik', NULL, 'Pt. Omnimon', 'Snopen', '200000', NULL, NULL, '23 x 23', '2022-08-05 07:01:18', '2022-08-05 07:01:18', 'Jemuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoribarangs`
--

CREATE TABLE `kategoribarangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoribarangs`
--

INSERT INTO `kategoribarangs` (`id`, `nama_kategori`, `kode_kategori`, `created_at`, `updated_at`) VALUES
(3, 'PUBG MOBILE', 'PU - 3', '2022-07-30 07:39:00', '2022-07-30 07:39:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merks`
--

CREATE TABLE `merks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merks`
--

INSERT INTO `merks` (`id`, `nama_merk`, `created_at`, `updated_at`) VALUES
(1, 'Omegamon', '2022-08-01 19:21:39', '2022-08-01 19:27:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_03_232313_create_data_barangs_table', 2),
(6, '2022_07_03_233346_create_suppliers_table', 2),
(7, '2022_07_03_233952_create_barang_masuks_table', 2),
(8, '2022_07_03_234525_create_barang_keluars_table', 2),
(9, '2022_07_03_234753_add_fk_to_barang_masuks', 2),
(10, '2022_07_08_120234_add_nama_barang_to_data_barangs', 3),
(11, '2022_07_08_122057_add_id_barang_to_barang_masuks', 4),
(12, '2022_07_08_122122_add_id_barang_to_barang_keluars', 4),
(13, '2022_07_15_023010_add_superadmin_to_users', 5),
(14, '2022_07_22_104645_add_alamat_to_suppliers', 6),
(15, '2022_07_30_015441_create_kategoribarangs_table', 7),
(16, '2022_07_30_130801_add_fk_dua_to_data_barangs', 8),
(17, '2022_07_30_223254_add_contact_to_suppliers', 9),
(18, '2022_07_30_223723_add_sizecost_to_data_barangs', 10),
(19, '2022_08_01_125238_create_merks_table', 10),
(20, '2022_08_01_125815_add_yangbelum_to_data_barangs', 11),
(21, '2022_08_01_132137_add_satuan_to_data_barangs', 12),
(22, '2022_08_01_234845_add_yangbelum_to_barang_masuks', 12),
(23, '2022_08_02_000553_add_yangbelum_to_barang_keluars', 13),
(24, '2022_08_04_044140_add_namakategori_to_data_barangs', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_supplier` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `contact`, `alamat_supplier`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(2, 'Pt. Omnimon', NULL, NULL, '1999-10-01', '2022-07-09 02:20:36', '2022-07-10 18:16:14'),
(3, 'PT. Alphamon', NULL, NULL, '1999-08-01', '2022-07-09 02:55:59', '2022-07-09 02:55:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_superadmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `is_superadmin`) VALUES
(1, 'Takuya Matsuda', 'fairuzfirjatullah3@gmail.com', NULL, '$2y$10$UFnz.gphyX3lvHRPQr7FPeK2QTGGOz.mqKAYG85DLWVcPrndd7Rwi', '1', NULL, '2022-06-20 06:12:50', '2022-06-20 06:12:50', NULL),
(2, 'Matoi', 'seiryuu80@yahoo.com', NULL, '$2y$10$qyrz/Pv4UWTaJNHzo9ls9.vXmBCe8wAA5bV0fv90JO1YOdL9p6KFa', NULL, NULL, '2022-07-03 19:22:39', '2022-07-03 19:22:39', 1),
(3, 'Rofi', 'kmtctasik@gmail.com', NULL, '$2y$10$j0AwhV6UAyBmiU804B9V/uxx8SakVaXtRkh74bkjMmmRcwCGJ2Dm6', NULL, NULL, '2022-07-22 17:38:57', '2022-07-22 17:38:57', NULL),
(4, 'Epac Itah', 'dpt07111840000121@gmail.com', NULL, '$2y$10$aXDYE7EIMrdXd7WXXxgxpucnYptbtjsb8FqWGtsIf1IsEqaBFSjnC', NULL, NULL, '2022-07-22 17:48:21', '2022-07-22 17:48:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_keluars_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuks_id_supplier_foreign` (`id_supplier`),
  ADD KEY `barang_masuks_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `data_barangs`
--
ALTER TABLE `data_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_barangs_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoribarangs`
--
ALTER TABLE `kategoribarangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merks`
--
ALTER TABLE `merks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_barangs`
--
ALTER TABLE `data_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoribarangs`
--
ALTER TABLE `kategoribarangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `merks`
--
ALTER TABLE `merks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD CONSTRAINT `barang_keluars_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `data_barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD CONSTRAINT `barang_masuks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `data_barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuks_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_barangs`
--
ALTER TABLE `data_barangs`
  ADD CONSTRAINT `data_barangs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoribarangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
