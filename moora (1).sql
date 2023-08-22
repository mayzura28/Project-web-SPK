-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 08.21
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moora`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penggunaan` int(11) DEFAULT NULL,
  `apply` int(11) DEFAULT NULL,
  `informasi` int(11) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL,
  `keamanan` int(11) DEFAULT NULL,
  `situs` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `nama_alt`, `kode`, `penggunaan`, `apply`, `informasi`, `akses`, `keamanan`, `situs`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'JobStreet', 'A1', 4, 4, 4, 4, 4, 5, 1, NULL, NULL),
(2, 'LinkedIn', 'A2', 5, 4, 4, 4, 4, 5, 2, NULL, NULL),
(3, 'Karir.com', 'A3', 4, 4, 4, 4, 4, 3, 1, NULL, NULL),
(4, 'Glints', 'A4', 5, 4, 4, 4, 4, 2, 1, NULL, NULL),
(5, 'Kalibrr', 'A5', 5, 4, 4, 4, 4, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobots`
--

CREATE TABLE `bobots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bobots`
--

INSERT INTO `bobots` (`id`, `user_id`, `kriteria_id`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.15, '2023-06-13 21:47:57', '2023-06-13 21:47:57'),
(2, 1, 2, 0.15, '2023-06-13 21:48:12', '2023-06-13 21:48:12'),
(3, 1, 3, 0.20, '2023-06-13 21:48:22', '2023-06-13 21:48:22'),
(4, 1, 4, 0.10, '2023-06-13 21:48:31', '2023-06-13 21:48:31'),
(5, 1, 5, 0.10, '2023-06-13 21:48:40', '2023-06-13 21:48:40'),
(6, 1, 6, 0.25, '2023-06-13 21:48:59', '2023-06-13 21:48:59'),
(7, 1, 7, 0.10, '2023-06-13 21:49:12', '2023-06-13 21:49:12'),
(8, 2, 1, 0.15, '2023-06-14 02:01:36', '2023-06-14 02:01:36'),
(9, 2, 2, 0.10, '2023-06-14 02:01:51', '2023-06-14 02:01:51'),
(10, 2, 3, 0.15, '2023-06-14 02:01:57', '2023-06-14 02:01:57'),
(11, 2, 4, 0.10, '2023-06-14 02:02:08', '2023-06-14 02:02:08'),
(12, 2, 5, 0.10, '2023-06-14 02:02:19', '2023-06-14 02:02:19'),
(13, 2, 6, 0.25, '2023-06-14 02:02:26', '2023-06-14 02:02:26'),
(14, 2, 7, 0.10, '2023-06-14 02:02:33', '2023-06-14 02:02:33'),
(15, 3, 1, 0.15, '2023-06-23 08:56:06', '2023-06-23 08:56:06'),
(16, 3, 3, 0.15, '2023-06-23 08:56:16', '2023-06-23 08:56:16'),
(17, 3, 2, 0.10, '2023-06-23 08:56:23', '2023-06-23 08:56:23'),
(18, 3, 4, 0.05, '2023-06-23 08:56:30', '2023-06-23 08:56:30'),
(19, 3, 5, 0.10, '2023-06-23 08:56:39', '2023-06-23 08:56:39'),
(20, 3, 6, 0.10, '2023-06-23 08:56:48', '2023-06-23 08:56:48'),
(21, 3, 7, 0.05, '2023-06-23 08:56:55', '2023-06-23 08:56:55');

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
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama_kriteria`, `kode`, `atribute`, `created_at`, `updated_at`) VALUES
(1, 'Kemudahan Penggunaan', 'A1', 'Benefit', '2023-06-12 21:17:18', '2023-06-12 21:17:18'),
(2, 'Kemudahan Apply', 'A2', 'Benefit', '2023-06-12 21:19:50', '2023-06-12 21:28:54'),
(3, 'Detail Informasi', 'A3', 'Benefit', '2023-06-12 21:20:22', '2023-06-12 21:20:22'),
(4, 'Kecepatan Akses', 'A4', 'Benefit', '2023-06-12 21:20:36', '2023-06-12 21:20:36'),
(5, 'Keamanan', 'A5', 'Benefit', '2023-06-12 21:21:11', '2023-06-12 21:29:03'),
(6, 'Jumlah Pengguna Situs', 'A6', 'Benefit', '2023-06-12 21:21:59', '2023-06-12 21:21:59'),
(7, 'Biaya', 'A7', 'Cost', '2023-06-12 21:22:26', '2023-06-12 21:22:26');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_03_27_005216_create_kriterias_table', 1),
(19, '2023_05_25_152541_create_addroleuser_table', 1),
(21, '2023_05_01_141220_create_nilais_table', 2),
(22, '2023_03_27_010946_create_alternatifs_table', 3),
(23, '2023_04_18_194920_create_sub_kriterias_table', 4),
(24, '2023_06_13_034339_create_bobots_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `alternatif_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4.00, NULL, NULL),
(2, 1, 2, 4.00, NULL, NULL),
(3, 1, 3, 4.00, NULL, NULL),
(4, 1, 4, 4.00, NULL, NULL),
(5, 1, 5, 4.00, NULL, NULL),
(6, 1, 6, 5.00, NULL, NULL),
(7, 1, 7, 1.00, NULL, NULL),
(8, 2, 1, 5.00, NULL, NULL),
(9, 2, 2, 4.00, NULL, NULL),
(10, 2, 3, 4.00, NULL, NULL),
(11, 2, 4, 4.00, NULL, NULL),
(12, 2, 5, 4.00, NULL, NULL),
(13, 2, 6, 5.00, NULL, NULL),
(14, 2, 7, 2.00, NULL, NULL),
(15, 3, 1, 4.00, NULL, NULL),
(16, 3, 2, 4.00, NULL, NULL),
(17, 3, 3, 4.00, NULL, NULL),
(18, 3, 4, 4.00, NULL, NULL),
(19, 3, 5, 4.00, NULL, NULL),
(20, 3, 6, 3.00, NULL, NULL),
(21, 3, 7, 1.00, NULL, NULL),
(22, 4, 1, 5.00, NULL, NULL),
(23, 4, 2, 4.00, NULL, NULL),
(24, 4, 3, 4.00, NULL, NULL),
(25, 4, 4, 4.00, NULL, NULL),
(26, 4, 5, 4.00, NULL, NULL),
(27, 4, 6, 2.00, NULL, NULL),
(28, 4, 7, 1.00, NULL, NULL),
(29, 5, 1, 5.00, NULL, NULL),
(30, 5, 2, 4.00, NULL, NULL),
(31, 5, 3, 4.00, NULL, NULL),
(32, 5, 4, 4.00, NULL, NULL),
(33, 5, 5, 4.00, NULL, NULL),
(34, 5, 6, 3.00, NULL, NULL),
(35, 5, 7, 1.00, NULL, NULL);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`id`, `kriteria_id`, `klasifikasi`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sangat Baik', 5.00, '2023-06-13 21:33:22', '2023-06-13 21:33:22'),
(2, 1, 'Baik', 4.00, '2023-06-13 21:33:37', '2023-06-13 21:33:37'),
(3, 1, 'Cukup', 3.00, '2023-06-13 21:33:52', '2023-06-13 21:33:52'),
(4, 1, 'Buruk', 2.00, '2023-06-13 21:34:06', '2023-06-13 21:34:06'),
(5, 1, 'Sangat Buruk', 1.00, '2023-06-13 21:34:19', '2023-06-13 21:34:19'),
(6, 2, 'Sangat Baik', 5.00, '2023-06-13 21:34:33', '2023-06-13 21:34:33'),
(7, 2, 'Baik', 4.00, '2023-06-13 21:35:26', '2023-06-13 21:35:26'),
(8, 2, 'Cukup', 3.00, '2023-06-13 21:35:40', '2023-06-13 21:35:40'),
(9, 2, 'Buruk', 2.00, '2023-06-13 21:35:54', '2023-06-13 21:35:54'),
(10, 2, 'Sangat Buruk', 1.00, '2023-06-13 21:36:11', '2023-06-13 21:36:11'),
(11, 3, 'Sangat Baik', 5.00, '2023-06-13 21:36:37', '2023-06-13 21:36:37'),
(12, 3, 'Baik', 4.00, '2023-06-13 21:36:49', '2023-06-13 21:36:49'),
(13, 3, 'Cukup', 3.00, '2023-06-13 21:37:05', '2023-06-13 21:37:05'),
(14, 3, 'Buruk', 2.00, '2023-06-13 21:37:23', '2023-06-13 21:37:23'),
(15, 3, 'Sangat Buruk', 1.00, '2023-06-13 21:37:35', '2023-06-13 21:37:35'),
(16, 4, 'Sangat Baik', 5.00, '2023-06-13 21:37:54', '2023-06-13 21:37:54'),
(17, 4, 'Baik', 4.00, '2023-06-13 21:38:07', '2023-06-13 21:38:07'),
(18, 4, 'Cukup', 3.00, '2023-06-13 21:38:20', '2023-06-13 21:38:20'),
(19, 4, 'Buruk', 2.00, '2023-06-13 21:38:33', '2023-06-13 21:38:33'),
(20, 4, 'Sangat Buruk', 1.00, '2023-06-13 21:38:43', '2023-06-13 21:38:43'),
(21, 5, 'Sangat Baik', 5.00, '2023-06-13 21:39:00', '2023-06-13 21:39:00'),
(22, 5, 'Baik', 4.00, '2023-06-13 21:39:12', '2023-06-13 21:39:12'),
(23, 5, 'Cukup', 3.00, '2023-06-13 21:39:33', '2023-06-13 21:39:33'),
(24, 5, 'Buruk', 2.00, '2023-06-13 21:39:43', '2023-06-13 21:39:43'),
(25, 5, 'Sangat Buruk', 1.00, '2023-06-13 21:39:56', '2023-06-13 21:39:56'),
(26, 6, '< 1 Juta Pengguna', 1.00, '2023-06-13 21:40:47', '2023-06-13 21:40:47'),
(27, 6, '1 - 5 Juta Pengguna', 2.00, '2023-06-13 21:41:09', '2023-06-13 21:41:09'),
(28, 6, '5 - 10 Juta Pengguna', 3.00, '2023-06-13 21:41:45', '2023-06-13 21:41:45'),
(29, 6, '10 - 15 Juta Pengguna', 4.00, '2023-06-13 21:42:09', '2023-06-13 21:42:09'),
(30, 6, '> 15 Juta Pengguna', 5.00, '2023-06-13 21:42:32', '2023-06-13 21:42:32');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` set('administrator','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'mayzura', 'mayzuraagustin280801@gmail.com', NULL, '$2y$10$TPVxWe3dSPqbnmJyyC03XuLPVXdsDFTSIGGrh4U9/nN6kNf01exbG', NULL, 'administrator', '2023-06-12 21:16:46', '2023-06-12 21:16:46'),
(2, 'may zura', 'may28@gmail.com', NULL, '$2y$10$5ryb4.y70yQ/BNcIf12PNu5PQ/Ev/6/RhGmlQ4Nomb5KJP0EEmMK2', NULL, 'user', '2023-06-12 23:26:03', '2023-06-12 23:26:03'),
(3, 'Fajriyah', 'may@gmail.com', NULL, '$2y$10$FCHFwwKTSOTXJ1wyxjIr2.VkxivAOprnn7Ih504KWwkmL/4.zMeOC', NULL, 'user', '2023-06-13 04:47:33', '2023-06-13 04:47:33'),
(4, 'pras', 'pras@gmail.com', NULL, '$2y$10$aX8KlM7HMxP2r3W2dobB6OqmRybxYWS5oGecrphwElo0QS6qNvakC', NULL, 'user', '2023-06-13 15:09:18', '2023-06-13 15:09:18'),
(5, 'admin', 'admin@gmail.com', NULL, '$2y$10$FWs5s4AK5WV4nACF4yhHcOrKS6jovhuqtXOUIlOR0hHyoY7.MJyRq', NULL, 'administrator', '2023-06-27 23:04:41', '2023-06-27 23:04:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_alt` (`nama_alt`);

--
-- Indeks untuk tabel `bobots`
--
ALTER TABLE `bobots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id` (`alternatif_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

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
-- Indeks untuk tabel `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

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
-- AUTO_INCREMENT untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bobots`
--
ALTER TABLE `bobots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bobots`
--
ALTER TABLE `bobots`
  ADD CONSTRAINT `bobots_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bobots_ibfk_2` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`),
  ADD CONSTRAINT `nilais_ibfk_2` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`);

--
-- Ketidakleluasaan untuk tabel `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD CONSTRAINT `sub_kriterias_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
