-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 31 Agu 2021 pada 14.11
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
  `status` enum('pending','approve','reject') NOT NULL,
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
(14, 'laporanku', 'laporan-pegawai6-1629906690.xlsx', 'reject', '2021-08-25 22:51:30', '2021-08-25 22:57:08', 'ulangi lagi cok', 20, 0),
(10, 'judul ini tuh', 'laporan-pegawai1-1629709745.xlsx', 'reject', '2021-08-23 16:09:05', '2021-08-25 09:34:24', 'UUULANGGGIII', 14, 0),
(9, 'laporan mei', 'laporan-pegawai1-1629706154.xlsx', '', '2021-05-01 15:40:49', '2021-08-25 22:44:47', '', 14, 0),
(8, 'laporan bulan juli', 'laporan-pegawai1-1629706113.xlsx', '', '2021-07-14 15:10:02', '2021-08-25 22:45:11', '', 14, 0),
(7, 'laporan bulan juni', 'laporan-pegawai1-1629706091.pdf', 'reject', '2021-06-10 15:08:11', '2021-08-25 22:45:03', 'Mohon untuk diulangi lagi\r\n', 14, 0),
(11, 'laporan agustus', 'laporan-pegawai2-1629713661.pdf', '', '2021-08-23 17:14:21', '2021-08-25 09:34:12', '', 16, 0),
(12, 'slider Baru ggg', 'laporan-pegawai3-1629858952.jpeg', '', '2021-08-25 09:35:52', '2021-08-25 22:53:09', '', 17, 0),
(13, 'Contols', 'laporan-pegawai4-1629866550.jpg', 'pending', '2021-08-25 11:42:30', '0000-00-00 00:00:00', '', 18, 0),
(15, 'Idus', 'laporan-pegawai_baru-1629972316.xls', 'reject', '2021-08-26 17:05:16', '2021-08-26 17:06:09', 'Jdjskdls', 21, 0),
(16, 'Juful', 'laporan-vv-1629973458.xls', '', '2021-08-26 17:24:18', '2021-08-26 17:27:01', '', 22, 0),
(17, 'Laporan ini', 'laporan-ilham_hafidzzz-1630049350.xls', '', '2021-08-27 14:29:10', '2021-08-27 14:30:29', '', 23, 0),
(18, 'slider Baru', 'laporan-bil_abror-1630328434.xlsx', 'approve', '2021-08-30 20:00:34', '2021-08-30 21:52:42', '', 24, 2),
(19, 'slider Baru', 'laporan-bil_abror-1630333635.xls', 'reject', '2021-08-30 21:27:15', '2021-08-30 21:53:06', 'mohon untuk diulang kembali', 24, 5),
(20, 'slider Baru', 'laporan-bil_abror-1630333669.xlsx', 'pending', '2021-08-30 21:27:49', '0000-00-00 00:00:00', '', 24, 3),
(21, 'slider Baru', 'laporan-bil_abror-1630333684.xls', 'approve', '2021-08-30 21:28:04', '2021-08-30 21:53:42', 'mantap', 24, 4),
(22, 'slider Baru', 'laporan-ilham_hafidzzz-1630334253.xlsx', 'approve', '2021-08-30 21:37:33', '2021-08-30 21:53:24', 'Mantap sekali', 23, 2),
(23, 's', 'laporan-ilham_hafidzzz-1630334272.xlsx', 'pending', '2021-08-30 21:37:52', '0000-00-00 00:00:00', '', 23, 4);

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
  `jenis_kelamin` varchar(20) NOT NULL,
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

INSERT INTO `user` (`id`, `nip`, `nama_lengkap`, `jenis_kelamin`, `email`, `no_hp`, `alamat`, `foto_profile`, `username`, `password`, `jabatan_id`, `pangkat_id`, `role`) VALUES
(1, 1, 'Mas Admin', '', '', '', '', '', 'admin', '$2y$10$rkgsEAivitanNqCPlHtMw.d89Buus/GrfUnbFx8MeFx58nfmGkAjW', 12, 1, 'admin'),
(13, 2, 'kang super admin', 'l', 'superadmin@gmail.com', '083107396037', 'dimana mana', '', 'superadmin', '$2y$10$ezz2NunZ2Kc3QTOPfBYZf.8dbWE6vXWeqMvsjC81mxFjVQnDMncXG', 12, 1, 'superadmin'),
(14, 11, 'pegawai1', '', '', '', '', '', 'pgw1', '$2y$10$zrjHEOYkWnt5dbtnDhEex.tjbZ7Hn/ginZeFNpbMyO6LEcPGcz2mO', 18, 2, 'user'),
(15, 3, 'kang supervisor', '', '', '', '', '', 'supervisor', '$2y$10$2JSTy1Ukrsq4HrRHkb9PyONSFfnaZfr3tNVJ6cng0OVJUgSoO9BTu', 13, 1, 'supervisor'),
(16, 12, 'pegawai2', '', '', '', '', '', 'pgw2', '$2y$10$yAZ.Wh1G2jg9MNCQOAiwieVn3YEVAd15FI.kJXNy0xUVgGY5VPLPu', 13, 2, 'user'),
(17, 13, 'pegawai3', '', '', '', '', '', 'pgw3', '$2y$10$bU0GixKHMYXLe/aFPEQlvOFDTcPR/MUXR8gzH4fUkiaY.qtURh0tm', 16, 3, 'user'),
(18, 167, 'Pegawai4', '', '', '', '', '', 'pgw4', '$2y$10$5529QnJttz/mIKQPZbdnbOHnWWdOQgu0TzQEwLjWbBTHUIcklaPZq', 13, 2, 'user'),
(19, 123, 'pegawai5', '', '', '', '', '', 'pgw5', '$2y$10$BFCEsAzniaFL9Ve4kxJH9OA8q42FcGJw54EOo4czj95SKLtsGFsXy', 14, 3, 'user'),
(20, 1234, 'pegawai6', '', '', '', '', '', 'pgw6', '$2y$10$fMhuWNjT2HpoNaFzTFh5J.aBYxJYhkuudBxlQK5QWzI0JUC/Nk2n.', 13, 3, 'user'),
(21, 987, 'pegawai baru', '', '', '', '', '', 'pgwbr', '$2y$10$9ZUUu1K6NEewbHCgmyYNxuO3dY3UkJWEdBsY/Che86hUXctDHENAi', 12, 1, 'user'),
(22, 132109, 'Vv', '', '', '', '', '', 'vv', '$2y$10$3SkeAabf5hS84SZTc/8sVe4qonMrs2i78pwR2rur9Rb9dix8iB5Um', 15, 2, 'user'),
(23, 233456, 'ilham hafidzzz', 'l', 'ilham@gmail.com', '083107396037', 'Desct', '', 'ilham51', '$2y$10$GDyj7TOD38rc0ZmJ/RDPZ.eIxRiaRFgchS7zyx00h9di3JiGm6cUu', 15, 3, 'user'),
(24, 123123, 'Bil Abror', 'l', 'admin@exe.com', '083107396037', 'Yyyggg', '', 'abror404', '$2y$10$EGRu3QrUdO6GQRJfVoe0ceXxcUoO7jYoDncY7sn4Z7O4ik0XaTKja', 17, 1, 'user'),
(34, 123325, 'USER 5', 'l', 'user5@bps.com', '84325440', 'Desa CIkaso', '', 'user1186', '$2y$10$I0GKi4jW6FtDCPBTH3qDjuDNm6Flh0dzY7k3/du86iS6k.zxAmWf2', 13, 2, 'user');

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
-- AUTO_INCREMENT untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
