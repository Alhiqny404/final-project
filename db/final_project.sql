-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Agu 2021 pada 22.32
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
(1, 'example document reject', 'example_document_reject_1628436259.xlsx', 'tolak', '2021-08-08 22:24:20', '0000-00-00 00:00:00'),
(2, 'example document approved', 'example_document_approved_1628436396_1628436521.xlsx', 'setuju', '2021-08-08 22:26:36', '2021-08-08 22:28:41'),
(3, 'example document pending', 'example_document_pending_1628436423.xlsx', 'pending', '2021-08-08 22:27:03', '0000-00-00 00:00:00');

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
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
