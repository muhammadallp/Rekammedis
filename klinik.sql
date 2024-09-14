-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2024 pada 14.27
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jns_obat` varchar(30) NOT NULL,
  `stok` varchar(30) NOT NULL,
  `harga_obat` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama`, `jns_obat`, `stok`, `harga_obat`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Tablet', '100', '10000', '2024-01-24 10:13:32', '2024-07-20 08:19:06'),
(2, 'Amoxicillin', 'Kapsul', '98', '100000', '2024-01-24 21:42:01', '2024-07-28 05:16:19'),
(3, 'Omeprazole', 'Cairan', '100', '15000', '2024-01-25 16:26:12', '2024-07-20 08:20:54'),
(4, 'Ibuprofen', 'Tablet', '100', '20000', '2024-01-25 16:26:35', '2024-07-20 08:21:02'),
(5, 'Ciprofloxacin', 'Tablet', '100', '35000', '2024-01-25 16:26:50', '2024-07-20 08:21:13'),
(6, 'Ambroxol', 'kapsul', '100', '25000', '2024-02-01 19:08:24', '2024-07-20 08:21:21'),
(7, 'vit-C', 'kapsul', '100', '75000', '2024-02-01 19:08:49', '2024-07-20 08:21:34'),
(8, 'Plantacid', 'kapsul', '100', '80000', '2024-02-01 19:09:11', '2024-07-20 08:21:40'),
(9, 'Metaflu', 'Tablet', '100', '90000', '2024-02-01 19:09:42', '2024-07-20 08:21:47'),
(10, 'Spasminal', 'Tablet', '100', '50000', '2024-02-01 20:54:09', '2024-07-20 08:21:57'),
(11, 'Dexamethason', 'Tablet', '98', '60000', '2024-02-01 20:54:48', '2024-07-20 11:37:58'),
(12, 'Neurobion', 'kapsul', '100', '65000', '2024-02-01 20:55:15', '2024-07-20 08:22:12'),
(13, 'obat cacing', 'kapsul', '99', '10000', '2024-07-20 08:23:33', '2024-07-20 11:37:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
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
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
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
  `poli` varchar(255) NOT NULL,
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
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `tindakan` varchar(100) DEFAULT NULL,
  `ttl_hrg_obt` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekammedis`
--

INSERT INTO `rekammedis` (`id`, `id_pasien`, `id_ruangan`, `id_dokter`, `keluhan`, `diagnosa`, `class`, `tindakan`, `ttl_hrg_obt`, `biaya`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 'sakit gigi', 'baru', 'Umum', 'ya berobat lah', 70000, 80000, 2, '2024-01-24', '2024-07-20 13:07:53'),
(2, 2, 1, 3, 'gigi berlubang', 'baru', 'Umum', 'ya berobat lah', NULL, 0, 1, '2023-12-27', '2024-07-28 05:16:19'),
(3, 3, 3, 3, 'sakit telingga', 'menggunakan alat yang menyala (otoskop) untuk memeriksa telinga, tenggorokan, dan saluran hidung.', 'BPJS', '', 20000, 50000, 2, '2024-01-24', '2024-01-31 16:17:35'),
(4, 4, 3, 3, 'ingin memasang KB', 'pengecekan pemasangan KB', 'BPJS', '', 50000, 20000, 2, '2024-01-26', '2024-01-31 16:19:14'),
(5, 5, 1, 3, 'muntaber', 'pemeriksaan sampel tinja, Tes darah, USG, CT scan', 'Umum', '', 20000, 10000, 2, '2024-01-26', '2024-01-31 16:15:37'),
(7, 4, 1, 3, 'pusing, dan sakit kepala', 'Demam', 'BPJS', '', 10000, 10000, 2, '2024-01-27', '2024-01-31 22:46:34'),
(8, 5, 1, 3, 'Demam,pilek', 'sdasd', 'BPJS', 'asdas', NULL, 0, 1, '2024-02-02', '2024-07-20 10:53:26'),
(9, 2, 1, 3, 'Magh tiba-tiba kambuh', 'baru', 'BPJS', 'ya berobat lah', NULL, 0, 1, '2024-02-02', '2024-07-20 11:17:56'),
(10, 6, 1, NULL, 'asd', NULL, 'sdsd', NULL, NULL, NULL, 0, '2024-07-20', '2024-07-20 12:12:11'),
(11, 6, 1, NULL, 'SAKIT', NULL, 'umum', NULL, NULL, NULL, 0, '2024-07-28', '2024-07-28 04:27:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedisdetail`
--

CREATE TABLE `rekammedisdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rekam` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `jml_obat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekammedisdetail`
--

INSERT INTO `rekammedisdetail` (`id`, `id_rekam`, `id_obat`, `jml_obat`, `keterangan`) VALUES
(1, 1, 13, 1, 'sakit'),
(2, 1, 11, 2, 'sakit'),
(3, 2, 2, 2, 'sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruangan` varchar(255) NOT NULL,
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
  `nik` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `jk`, `nohp`, `alamat`, `status_perkawinan`, `level`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, '18101152610501', 'admin', 'laki-laki', '082283327577', 'padang', 'belum kawin', 'admin', '$2y$10$PY88zdN2FFcX2xCIQCU4ceUTNrnuQPewWczyR4.d45Ddj3q1sAZGC', 'default.jpg', '2024-01-24 10:07:44', '2024-01-24 10:07:44'),
(3, '197607072009011011', 'Rovandri Rama', 'laki-laki', '081363011276', 'payakumbuh', 'sudah menikah', 'dokter', '$2y$10$TQfnlftnA8ja2Dj2GlSOzek/ncBDnMDWpSvvtvDP91887oo9lXrd6', 'default.jpg', '2024-01-25 16:12:45', '2024-01-31 22:35:54'),
(4, '199203202019022003', 'Rahmi FItri Usman', 'perempuan', '082283425527', 'Barulak', 'sudah menikah', 'dokter', '$2y$10$2bTBBNuhl2EItFMuAPY1U.8Ly.vaOdic0IDbB6UKr.V27TXEMagi2', 'default.jpg', '2024-01-25 16:13:51', '2024-01-25 16:13:51');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rekammedisdetail`
--
ALTER TABLE `rekammedisdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
