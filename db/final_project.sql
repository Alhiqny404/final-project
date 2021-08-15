-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Agu 2021 pada 16.31
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
(6, 4, 'coba coba', 'coba_coba_1629017567.xlsx', '2021-08-15 15:52:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `role`) VALUES
(1, 'Mas Admin', 'admin', '$2y$10$rkgsEAivitanNqCPlHtMw.d89Buus/GrfUnbFx8MeFx58nfmGkAjW', 'admin'),
(3, 'Mas Supervisor', 'supervisor', '$2y$10$F1D2rtsHR6zHeekXccKreuepP0mQ2LG53dXNwqUSh.PBAXebFrYXO', 'supervisor'),
(4, 'Mas Pegawai', 'pegawai', '$2y$10$WK2ezcydMuwNJPYsZ7XSVeKGu2hEl4kcPFWGnL/FGfnkJLIkCLfWe', 'pegawai'),
(5, 'Adam', 'pgw1', '$2y$10$WK2ezcydMuwNJPYsZ7XSVeKGu2hEl4kcPFWGnL/FGfnkJLIkCLfWe', 'pegawai'),
(6, 'Hawa', 'pgw2', '$2y$10$WK2ezcydMuwNJPYsZ7XSVeKGu2hEl4kcPFWGnL/FGfnkJLIkCLfWe', 'pegawai'),
(7, 'Idris', 'pgw3', '$2y$10$WK2ezcydMuwNJPYsZ7XSVeKGu2hEl4kcPFWGnL/FGfnkJLIkCLfWe', 'pegawai'),
(8, 'Nuh', 'pgw4', '$2y$10$WK2ezcydMuwNJPYsZ7XSVeKGu2hEl4kcPFWGnL/FGfnkJLIkCLfWe', 'pegawai'),
(9, 'Hud', 'pgw5', '$2y$10$WK2ezcydMuwNJPYsZ7XSVeKGu2hEl4kcPFWGnL/FGfnkJLIkCLfWe', 'pegawai');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
