-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Agu 2021 pada 10.06
-- Versi server: 5.6.38
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(227) NOT NULL,
  `document_file` varchar(227) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `document`
--

INSERT INTO `document` (`document_id`, `user_id`, `document_name`, `document_file`, `created_at`) VALUES
(1, 5, 'laporan bulan agustus', 'laporan_bulan_agustus_1629014608.docx', '2021-08-15 15:03:28'),
(6, 4, 'coba coba', 'coba_coba_1629017567.xlsx', '2021-08-15 15:52:47'),
(7, 9, 'coba coba', 'coba_coba_1629106920.docx', '2021-08-16 16:42:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(15, 'Koordinator Statistik Produksi'),
(14, 'Koordinator Fungsi Neraca Wilayah'),
(12, 'Kepala BPS Kabupaten Kuningan'),
(13, 'Kepala Sub Bagian Umum'),
(16, 'Koordinator Statistik Produksi'),
(17, 'Koordinator Statistik Distribusi'),
(18, 'Koordinator Statistik IPDS'),
(19, 'Fungsional Umum'),
(20, 'Bendahara BPS Kabupaten Kuningan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` enum('pending','accept','reject') NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_respon` datetime NOT NULL,
  `catatan` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `judul`, `file`, `status`, `tgl_upload`, `tgl_respon`, `catatan`, `user_id`) VALUES
(10, 'judul ini tuh', 'laporan-pegawai1-1629709745.xlsx', 'reject', '2021-08-23 16:09:05', '0000-00-00 00:00:00', 'mohon untuk upload ulang y', 14),
(9, 'laporan mei', 'laporan-pegawai1-1629706154.xlsx', 'accept', '2021-05-01 15:40:49', '0000-00-00 00:00:00', '', 14),
(8, 'laporan bulan juli', 'laporan-pegawai1-1629706113.xlsx', 'accept', '2021-07-14 15:10:02', '0000-00-00 00:00:00', 'terimakasih y', 14),
(7, 'laporan bulan juni', 'laporan-pegawai1-1629706091.pdf', 'accept', '2021-06-10 15:08:11', '0000-00-00 00:00:00', '', 14),
(11, 'laporan agustus', 'laporan-pegawai2-1629713661.pdf', 'pending', '2021-08-23 17:14:21', '0000-00-00 00:00:00', '', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `id` int(11) NOT NULL,
  `nama_pangkat` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`id`, `nama_pangkat`) VALUES
(1, 'IV/b, Pembina Tk.l '),
(2, 'lll/d, Penata Tk.l'),
(3, 'lll/3b, Penata Muda Tk.l');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` bigint(15) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `foto_profile` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `pangkat_id` int(11) NOT NULL,
  `role` enum('superadmin','admin','supervisor','user') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `nama_lengkap`, `foto_profile`, `username`, `password`, `jabatan_id`, `pangkat_id`, `role`) VALUES
(1, 1, 'Mas Admin', '', 'admin', '$2y$10$rkgsEAivitanNqCPlHtMw.d89Buus/GrfUnbFx8MeFx58nfmGkAjW', 12, 1, 'admin'),
(13, 2, 'kang super admin', '', '', '$2y$10$g0PCx5NY9owkFeZpIBUJE.SOu4zFAFPi00fTUrs3nRxskdvhzRhiy', 12, 1, 'superadmin'),
(14, 11, 'pegawai1', '', '', '$2y$10$zrjHEOYkWnt5dbtnDhEex.tjbZ7Hn/ginZeFNpbMyO6LEcPGcz2mO', 18, 2, 'user'),
(15, 3, 'kang supervisor', '', '', '$2y$10$2JSTy1Ukrsq4HrRHkb9PyONSFfnaZfr3tNVJ6cng0OVJUgSoO9BTu', 13, 1, 'supervisor'),
(16, 12, 'pegawai2', '', '', '$2y$10$yAZ.Wh1G2jg9MNCQOAiwieVn3YEVAd15FI.kJXNy0xUVgGY5VPLPu', 13, 2, 'user'),
(17, 13, 'pegawai3', '', '', '$2y$10$bU0GixKHMYXLe/aFPEQlvOFDTcPR/MUXR8gzH4fUkiaY.qtURh0tm', 16, 3, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `pangkat_id` (`pangkat_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
