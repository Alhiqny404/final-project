-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Sep 2021 pada 16.13
-- Versi server: 5.6.38
-- Versi PHP: 8.0.0

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
-- Struktur dari tabel `beban_kerja`
--

CREATE TABLE `beban_kerja` (
  `id` int(11) NOT NULL,
  `nama_pekerjaan` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seksi_id` int(11) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `bulan` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `beban_kerja`
--

INSERT INTO `beban_kerja` (`id`, `nama_pekerjaan`, `user_id`, `seksi_id`, `tgl_buat`, `tgl_akhir`, `bulan`, `catatan`) VALUES
(25, 'Hhhhhh', 103, 5, '0000-00-00', '0000-00-00 00:00:00', '[\"1\"]', 'Akwkw'),
(24, 'Pekerjaan1', 103, 5, '0000-00-00', '0000-00-00 00:00:00', '[\"1\"]', 'Awokawk'),
(23, 'awokawok', 100, 10, '0000-00-00', '0000-00-00 00:00:00', '[\"4\",\"5\"]', '1 maret - 23 april'),
(22, 'Ghjjj', 102, 6, '0000-00-00', '0000-00-00 00:00:00', '[\"1\",\"2\",\"3\"]', 'mulai 12 Jan -  13 mar'),
(21, 'awokawok', 100, 5, '0000-00-00', '0000-00-00 00:00:00', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]', 'Wyfyftrrr'),
(20, 'awokawok', 100, 8, '0000-00-00', '0000-00-00 00:00:00', '[\"2\",\"3\"]', 'Dee'),
(19, 'Ddf', 101, 6, '0000-00-00', '0000-00-00 00:00:00', '[\"2\",\"3\"]', 'Ewe'),
(18, 'awokawok', 100, 5, '0000-00-00', '0000-00-00 00:00:00', '[\"1\",\"2\"]', '1'),
(26, 'Pekerjaan3', 103, 5, '0000-00-00', '0000-00-00 00:00:00', '[\"1\",\"2\",\"3\"]', 'Wkwk'),
(27, 'Pekerjaan1', 103, 6, '0000-00-00', '0000-00-00 00:00:00', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '2idje');

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
-- Struktur dari tabel `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `id` int(11) NOT NULL,
  `nama_laporan` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`id`, `nama_laporan`) VALUES
(2, 'CKP'),
(3, 'SKP'),
(4, 'TREE'),
(5, 'FOUR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` enum('pending','approve','reject','koreksi') NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_respon` datetime NOT NULL,
  `catatan` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_laporan_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `judul`, `file`, `status`, `tgl_upload`, `tgl_respon`, `catatan`, `user_id`, `jenis_laporan_id`) VALUES
(1, 'Laporsn1', 'laporan-pegawai_1-1631644084.xlsx', 'pending', '2021-09-15 01:28:04', '0000-00-00 00:00:00', '', 100, 2),
(2, 'Laporan2', 'laporan-pegawai_1-1631644105.xls', 'reject', '2021-09-15 01:28:25', '2021-09-15 01:36:27', 'Ulangi', 100, 4),
(3, 'Laporan3', 'laporan-pegawai1-1632206576.xls', 'koreksi', '2021-09-21 13:42:56', '2021-09-19 20:56:54', '', 100, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `items` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_at` datetime NOT NULL,
  `processed_at` datetime NOT NULL,
  `returned_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Struktur dari tabel `seksi`
--

CREATE TABLE `seksi` (
  `id` int(11) NOT NULL,
  `nama_seksi` varchar(100) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `seksi`
--

INSERT INTO `seksi` (`id`, `nama_seksi`, `warna`) VALUES
(5, 'Umum', '#cfcfc4'),
(6, 'Sosial', '#00AEEF'),
(7, 'Distribusi', '#F7931E'),
(8, 'Produksi', '#8CC63E'),
(9, 'Nerwilis', '#9B9BEE'),
(10, 'IPDS', '#F8BE2D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` bigint(15) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
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

INSERT INTO `user` (`id`, `nip`, `nama_lengkap`, `jenis_kelamin`, `tgl_lahir`, `email`, `no_hp`, `alamat`, `foto_profile`, `username`, `password`, `jabatan_id`, `pangkat_id`, `role`) VALUES
(1, 1, 'Mas Admin', 'l', '0000-00-00', 'admin@example.com', '0834256454', 'admin bebas', '', 'admin', '$2y$10$rkgsEAivitanNqCPlHtMw.d89Buus/GrfUnbFx8MeFx58nfmGkAjW', 12, 1, 'admin'),
(13, 2, 'kang super admin', 'l', '0000-00-00', 'superadmin@gmail.com', '083107396037', 'dimana mana', '', 'superadmin', '$2y$10$ezz2NunZ2Kc3QTOPfBYZf.8dbWE6vXWeqMvsjC81mxFjVQnDMncXG', 12, 1, 'superadmin'),
(15, 3, 'kang supervisor', 'p', '0000-00-00', 'supervisor@gmail.com', '7675765', '', '', 'supervisor', '$2y$10$2JSTy1Ukrsq4HrRHkb9PyONSFfnaZfr3tNVJ6cng0OVJUgSoO9BTu', 13, 1, 'supervisor'),
(100, 104030421, 'Pegawai1', 'l', '2004-01-03', 'user1@bps.com', '62812345678', 'Desa Ghoib', 'profilepict-pegawai1-1632211894.jpg', 'user123', '$2y$10$VDIHUvXFQfw5fQe9ODnex.5Yu/GwWScjOU6/03dH1nYBQbZJCqJLS', 13, 2, 'user'),
(101, 104030422, 'Pegawai 2', 'l', '2004-02-03', 'user2@bps.com', '62812345679', 'Desa Durajaya', 'profilepict-pegawai_2-1632097270.jpg', 'user124', '$2y$10$VhgTJmyK6DPSyup47ggDsuXz2yKVhbEtmvhQYr5RpW/hCW0hxunVu', 13, 2, 'user'),
(102, 104030423, 'Pegawai 3', 'p', '2004-03-03', 'user3@bps.com', '62812345680', 'Desa Durajaya', '', 'user125', '$2y$10$yyKyYbEF8D.VtXxKB/9Z7.Huj4zG3y9sC0sTPki2wwsaHsYb09aua', 13, 2, 'user'),
(103, 104030424, 'Pegawai 4', 'l', '2004-04-03', 'user4@bps.com', '62812345681', 'Desa Durajaya', '', 'user126', '$2y$10$bwqew.6n12VIjWVO6VrIIeZPh7cJN13QhuYDfqgzS2K8f./TiB/B6', 13, 2, 'user'),
(109, 104030430, 'Pegawai 10', 'p', '2004-10-03', 'user3@bps.com', '62812345687', 'Desa Durajaya', '', 'user132', '$2y$10$OM9WKKqOUSmDnEsbn5wBke6XBM.EqqjIyV65ONaC.j.FwF2nfXcH6', 13, 2, 'user'),
(108, 104030429, 'Pegawai 9', 'p', '2004-09-03', 'user4@bps.com', '62812345686', 'Desa Durajaya', '', 'user131', '$2y$10$wQqgzMmMcxm3YBpLI6YT9.thGQWMKIEPJeJWdA38DXjAQTAvVhnJq', 13, 2, 'user'),
(107, 104030428, 'Pegawai 8', 'p', '2004-08-03', 'user3@bps.com', '62812345685', 'Desa Durajaya', '', 'user130', '$2y$10$rfVPpuFEsp794FRrEtmnCO6Xv/yZtUaPwi3F6gcEHpjyUVmybUq1C', 13, 2, 'user'),
(106, 104030427, 'Pegawai 7u', 'l', '2004-07-03', 'user2@bps.com', '62812345684', 'Desa Durajaya', '', 'user129', '$2y$10$ch6jiXv7joPXKStyHNH2/e/W4dEpq0eYWrPEuthPQgt4qHPZfGBmi', 13, 2, 'user'),
(105, 104030426, 'Pegawai 6', 'l', '2004-06-03', 'user1@bps.com', '62812345683', 'Desa Durajaya', '', 'user128', '$2y$10$z3FuQ4vvD2B7r0nhhN0WXO/Vqc8TPCeS6klxXf69ilQNGT3esyNtm', 13, 2, 'user'),
(104, 104030425, 'Pegawai 5', 'l', '2004-05-03', 'user5@bps.com', '62812345682', 'Desa Durajaya', '', 'user127', '$2y$10$VHnHkmpwXfkln2sWP1C5Hul7yb39XJg8L2J82KeQdpmRysVbLGiCS', 13, 2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beban_kerja`
--
ALTER TABLE `beban_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `pangkat_id` (`pangkat_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beban_kerja`
--
ALTER TABLE `beban_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
