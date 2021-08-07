-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Agu 2021 pada 10.40
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
  `document_name` varchar(227) NOT NULL,
  `document_file` varchar(227) NOT NULL,
  `document_status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `responsed_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `document`
--

INSERT INTO `document` (`document_id`, `document_name`, `document_file`, `document_status`, `created_at`, `responsed_at`) VALUES
(1, 'izin bacok', 'izin_bacok_1628262187_1628264519.xlsx', 'setuju', '2021-08-06 22:03:07', '2021-08-06 22:41:59'),
(2, 'izin bolos', 'izin_bolos_1628262205_1628296920.xlsx', 'tolak', '2021-08-06 22:03:25', '2021-08-07 07:42:00'),
(3, 'Coba aja', 'Coba_aja_1628262234.xlsx', 'tolak', '2021-08-06 22:03:54', '0000-00-00 00:00:00'),
(4, 'dokumen baru', 'dokumen_baru_1628300067.xlsx', 'pending', '2021-08-07 08:34:27', '0000-00-00 00:00:00'),
(5, 'izin mati', 'izin_mati_1628300095.xlsx', 'tolak', '2021-08-07 08:34:55', '0000-00-00 00:00:00'),
(6, 'Dokumen Dua', 'Dokumen_Dua_1628306565_1628306648.xlsx', 'setuju', '2021-08-07 10:22:45', '2021-08-07 10:24:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$rkgsEAivitanNqCPlHtMw.d89Buus/GrfUnbFx8MeFx58nfmGkAjW', 'admin'),
(2, 'staff', '$2y$10$ww0gJHk51oqgnjAtCXGbX.qJG6KmkUHfzAaPHh4htmGo6Rav48uHG', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
