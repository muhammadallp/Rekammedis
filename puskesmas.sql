-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2024 pada 20.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

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
(5, '2023_12_30_172522_create_obat_table', 1),
(6, '2023_12_30_172628_create_pasien_table', 1),
(7, '2023_12_30_172759_create_rekammedis_table', 1),
(8, '2023_12_30_172922_create_ruangan_table', 1),
(9, '2023_12_30_173339_create_suster_table', 1),
(10, '2023_12_31_062445_create_rekammedisdetail_table', 1),
(11, '2024_01_07_181130_create_poli_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jns_obat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama`, `jns_obat`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Tablet', '100', '2024-01-24 10:13:32', '2024-01-25 16:25:28'),
(2, 'Amoxicillin', 'Kapsul', '100', '2024-01-24 21:42:01', '2024-01-25 16:25:50'),
(3, 'Omeprazole', 'Cairan', '100', '2024-01-25 16:26:12', '2024-01-25 16:26:12'),
(4, 'Ibuprofen', 'Tablet', '100', '2024-01-25 16:26:35', '2024-01-25 16:26:35'),
(5, 'Ciprofloxacin', 'Tablet', '100', '2024-01-25 16:26:50', '2024-01-25 16:26:57'),
(6, 'Ambroxol', 'kapsul', '100', '2024-02-01 19:08:24', '2024-02-01 19:08:24'),
(7, 'vit-C', 'kapsul', '100', '2024-02-01 19:08:49', '2024-02-01 19:08:49'),
(8, 'Plantacid', 'kapsul', '100', '2024-02-01 19:09:11', '2024-02-01 19:09:11'),
(9, 'Metaflu', 'Tablet', '100', '2024-02-01 19:09:42', '2024-02-01 20:53:32'),
(10, 'Spasminal', 'Tablet', '100', '2024-02-01 20:54:09', '2024-02-01 20:54:09'),
(11, 'Dexamethason', 'Tablet', '100', '2024-02-01 20:54:48', '2024-02-01 20:54:48'),
(12, 'Neurobion', 'kapsul', '100', '2024-02-01 20:55:15', '2024-02-01 20:55:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `id_poli`, `nip`, `nama_pasien`, `jk`, `nohp`, `alamat`, `tempat_lahir`, `tgl_lahir`, `status_perkawinan`, `created_at`, `updated_at`) VALUES
(1, 1, 'PSN-0001', 'Naldi', 'laki-laki', '082283327571', 'payakumbuh', 'payakumbuh', '1999-01-25', 'belum menikah', '2024-01-24 10:13:13', '2024-02-04 10:12:22'),
(2, 1, 'PSN-0002', 'Muhammad Bagas', 'laki-laki', '0823283289', 'Barulak', 'Barulak', '2000-12-30', 'belum menikah', '2024-01-25 08:45:34', '2024-01-25 16:56:12'),
(3, 3, 'PSN-0003', 'Fauziah Andita', 'perempuan', '081363011276', 'payakumbuh', 'payakumbuh', '1996-11-12', 'sudah menikah', '2024-01-25 16:58:32', '2024-01-25 16:58:32'),
(4, 4, 'PSN-0004', 'Fira Suryani', 'perempuan', '081234567890', 'payakumbuh', 'payakumbuh', '1999-02-20', 'sudah menikah', '2024-01-25 16:59:57', '2024-01-31 22:48:18'),
(5, 2, 'PSN-0005', 'Muhammad Arif', 'laki-laki', '081234567895', 'payakumbuh', 'payakumbuh', '2000-02-12', 'belum menikah', '2024-01-25 17:00:51', '2024-01-25 17:00:51'),
(6, 2, 'PSN-0006', 'Depa', 'perempuan', '082267753209', 'Koto Laweh', 'Tabek Patah', '2002-08-15', 'belum menikah', '2024-02-01 20:59:22', '2024-02-01 20:59:22');

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
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nik`, `nama`, `jk`, `nohp`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(6, '198710132010012012', 'Ns. Mira Oktavia,S.kep', 'perempuan', '085843376531', 'Barulak', 'default.jpg', '2024-01-31 23:19:11', '2024-01-31 23:19:11'),
(7, '197305061993022002', 'Mulfareni,Amd.Keb', 'laki-laki', '0822553327543', 'Sawah parik', 'default.jpg', '2024-02-01 20:38:09', '2024-02-01 20:38:09'),
(8, '197307141993022002', 'Laila Fauzi, S.Tr.Keb', 'perempuan', '081234567890', 'Salimpaung', 'default.jpg', '2024-02-01 20:40:41', '2024-02-01 20:40:41'),
(9, '198406252011012004', 'Ns. Rika Fitriani, S.kep', 'perempuan', '081234567891', 'Koto  Laweh', 'default.jpg', '2024-02-01 20:42:31', '2024-02-01 20:42:31'),
(10, '198101022005012006', 'Ns. Neli Apriyenti, S.kep', 'perempuan', '055266798733', 'Barulak', 'default.jpg', '2024-02-01 20:44:17', '2024-02-01 20:44:17'),
(11, '197410242006042010', 'Rusmelly, S.kep', 'perempuan', '085843376597', 'Tanjung alam', 'default.jpg', '2024-02-01 20:45:33', '2024-02-01 20:45:33'),
(12, '198604142009012005', 'Demi Roida N', 'laki-laki', '082146638741', 'Sawah parik', 'default.jpg', '2024-02-01 20:47:09', '2024-02-01 20:47:09'),
(13, '198205192011012006', 'Yenti Susanti, Amd.Ak', 'perempuan', '082283327577', 'Tabek Patah', 'default.jpg', '2024-02-01 20:49:13', '2024-02-01 20:49:13'),
(14, '198708302010012017', 'Lisya Gustiarini, AMKL', 'perempuan', '082267753209', 'Barulak', 'default.jpg', '2024-02-01 20:50:41', '2024-02-01 20:50:41'),
(15, '197206132006042003', 'Indrawati, Amd. Keb', 'perempuan', '082172638755', 'x koto', 'default.jpg', '2024-02-01 20:52:07', '2024-02-01 20:52:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `poli`, `created_at`, `updated_at`) VALUES
(1, 'poli gigi', '2024-01-24 10:12:23', '2024-01-24 10:12:23'),
(2, 'Poli Umum', '2024-01-25 16:19:24', '2024-01-25 16:19:24'),
(3, 'Poli KIA', '2024-01-25 16:19:37', '2024-01-25 16:19:37'),
(4, 'Poli KB', '2024-01-25 16:19:50', '2024-01-25 16:19:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `id_ruangan` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED DEFAULT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekammedis`
--

INSERT INTO `rekammedis` (`id`, `id_pasien`, `id_ruangan`, `id_dokter`, `keluhan`, `diagnosa`, `class`, `tindakan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 'sakit gigi', 'sakit gigi', 'Umum', 'operasi', 1, '2024-01-24 10:23:22', '2024-01-31 20:40:34'),
(2, 2, 1, 3, 'gigi berlubang', 'Oleskan Obat Antiseptik, Minum Obat Pereda Nyeri', 'Umum', '', 1, '2023-12-26 17:02:23', '2023-12-26 17:02:33'),
(3, 3, 3, 3, 'sakit telingga', 'menggunakan alat yang menyala (otoskop) untuk memeriksa telinga, tenggorokan, dan saluran hidung.', 'BPJS', '', 1, '2024-01-25 17:02:50', '2024-01-31 16:17:35'),
(4, 4, 3, 3, 'ingin memasang KB', 'pengecekan pemasangan KB', 'BPJS', '', 1, '2024-01-25 17:03:08', '2024-01-31 16:19:14'),
(5, 5, 1, 3, 'muntaber', 'pemeriksaan sampel tinja, Tes darah, USG, CT scan', 'Umum', '', 1, '2024-01-25 17:03:22', '2024-01-31 16:15:37'),
(6, 1, 1, 3, 'sakit gigi', 'sakit gigi', 'BPJS', '', 1, '2024-01-31 19:46:19', '2024-01-31 22:30:05'),
(7, 4, 1, 3, 'pusing, dan sakit kepala', 'Demam', 'BPJS', '', 1, '2024-01-31 22:45:21', '2024-01-31 22:46:34'),
(8, 5, 1, NULL, 'Demam,pilek', NULL, 'BPJS', '', 0, '2024-02-01 19:10:40', '2024-02-01 19:10:40'),
(9, 2, 1, NULL, 'Magh tiba-tiba kambuh', NULL, 'BPJS', '', 0, '2024-02-01 19:11:22', '2024-02-01 19:11:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedisdetail`
--

CREATE TABLE `rekammedisdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rekam` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekammedisdetail`
--

INSERT INTO `rekammedisdetail` (`id`, `id_rekam`, `id_obat`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'minum 2x sehari', NULL, NULL),
(2, 2, 1, 'minum 2x sehari', NULL, NULL),
(3, 2, 2, 'minum 3x sehari', NULL, NULL),
(4, 5, 1, 'minum 2x sehari', NULL, NULL),
(5, 5, 4, 'minum 3x sehari', NULL, NULL),
(6, 3, 1, 'minum 2x sehari', NULL, NULL),
(7, 4, 2, 'minum 2x sehari', NULL, NULL),
(8, 1, 2, '2x sehari setelah makan', NULL, NULL),
(9, 1, 3, '1x sehari setelah makan', NULL, NULL),
(10, 1, 4, '1x sehari setelah makan', NULL, NULL),
(11, 6, 2, '2x sehari setelah makan', NULL, NULL),
(12, 6, 3, '2x sehari setelah makan', NULL, NULL),
(13, 7, 1, '3x sehari setelah makan', NULL, NULL),
(14, 7, 5, '2x sehari setelah makan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `ruangan`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Pemeriksaan Umum', '2024-01-24 10:13:55', '2024-01-25 16:20:27'),
(2, 'Ruang Tindakan dan Gawat Darurat', '2024-01-25 16:20:46', '2024-01-25 16:20:46'),
(3, 'Ruang  KiA, KB dan Imunisasi', '2024-01-25 16:21:12', '2024-01-25 16:21:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rolle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `jk`, `nohp`, `alamat`, `status_perkawinan`, `rolle`, `level`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, '18101152610501', 'admin', 'laki-laki', '082283327577', 'padang', 'belum kawin', 'admin', 'admin', '$2y$10$PY88zdN2FFcX2xCIQCU4ceUTNrnuQPewWczyR4.d45Ddj3q1sAZGC', 'default.jpg', '2024-01-24 10:07:44', '2024-01-24 10:07:44'),
(3, '197607072009011011', 'Rovandri Rama', 'laki-laki', '081363011276', 'payakumbuh', 'sudah menikah', 'dokter', 'dokter', '$2y$10$TQfnlftnA8ja2Dj2GlSOzek/ncBDnMDWpSvvtvDP91887oo9lXrd6', 'default.jpg', '2024-01-25 16:12:45', '2024-01-31 22:35:54'),
(4, '199203202019022003', 'Rahmi FItri Usman', 'perempuan', '082283425527', 'Barulak', 'sudah menikah', 'dokter', 'dokter', '$2y$10$2bTBBNuhl2EItFMuAPY1U.8Ly.vaOdic0IDbB6UKr.V27TXEMagi2', 'default.jpg', '2024-01-25 16:13:51', '2024-01-25 16:13:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekammedisdetail`
--
ALTER TABLE `rekammedisdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rekammedisdetail`
--
ALTER TABLE `rekammedisdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
