-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2020 pada 17.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kereta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` varchar(255) NOT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `asal`, `tujuan`, `kelas`, `harga`, `tanggal`, `waktu`) VALUES
('cc1d74a5e7', 'karawang', 'surakarta', 'vip', '450000', '2020-06-12', '22:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_tujuan`
--

CREATE TABLE `k_tujuan` (
  `id` int(11) NOT NULL,
  `id_jadwal` varchar(255) NOT NULL,
  `jml_penumpang` varchar(255) NOT NULL,
  `limit_penumpang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `k_tujuan`
--

INSERT INTO `k_tujuan` (`id`, `id_jadwal`, `jml_penumpang`, `limit_penumpang`) VALUES
(5, 'cc1d74a5e7', '244', '250');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_order`
--

CREATE TABLE `log_order` (
  `id` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tgl_order` date NOT NULL,
  `jml_penumpang` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_order`
--

INSERT INTO `log_order` (`id`, `id_user`, `id_jadwal`, `nama`, `usia`, `no_kk`, `no_hp`, `tgl_order`, `jml_penumpang`, `date_created`) VALUES
('83308c8c37cfa3f6b380', 6, 0, 'Mochamad Yudi Sobari', '25', '3216818613208531', '085695190268', '2020-06-12', 100, '2020-06-11 16:31:43'),
('95a6c5061c16badaf546', 6, 0, 'Mochamad Yudi Sobari', '25', '3216818613208531', '085695190268', '2020-06-12', 5, '2020-06-11 16:24:51'),
('a4c4fb279f69f4f7a649', 6, 0, 'Mochamad', '22', '3216818613208531', '085695190268', '2020-06-13', 4, '2020-06-11 16:13:46'),
('afc755fbb0c6014427ad', 6, 0, 'Mochamad Yudi Sobari', '25', '326816513513546841351', '085695190268', '2020-06-12', 4, '2020-06-11 16:52:28'),
('b4cc27df7631405d78fc', 6, 0, 'Mochamad Yudi Sobari', '25', '3216818613208531', '085695190268', '2020-06-12', 100, '2020-06-11 16:29:02'),
('b776597a97e34c14556f', 6, 0, 'Mochamad Yudi Sobari', '25', '326816513513546841351', '085695190268', '2020-06-14', 20, '2020-06-11 16:14:06'),
('e1dc024642cfe1324461', 6, 11, 'Mochamad', '22', '326816513513546841351', '085695190268', '2020-06-12', 2, '2020-06-11 15:44:54'),
('f6e8f066ff48ab6c89f1', 6, 0, 'Mochamad Yudi Sobari', '25', '326816513513546841351', '085695190268', '2020-06-18', 100, '2020-06-11 16:50:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` varchar(255) NOT NULL,
  `id_order` varchar(255) NOT NULL,
  `payment_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `id_order`, `payment_code`, `status`, `date_created`) VALUES
('09b753bbd2', 'b4cc27df7631405d78fc', 'KAI-eedebf7969fb6930236c3c06e387ab47d6a8216e', 'sudah', '2020-06-11 16:29:02'),
('184913e0d1', 'dbe27bab614819f4937b', 'KAI-71b771f7b172ba5a6abcdd99f925195d7a9ac9b5', 'sudah', '2020-06-04 13:54:24'),
('649afd4a2c', '69c71b00284aa45f4bcb', 'KAI-9ce70913b385bdf37b32c4435e8f4aeb068c474d', 'sudah', '2020-06-03 20:54:44'),
('6cab1f37f6', '684a1079060c7cf9934b', 'KAI-2116e383fdbd2c1c1ee113c7b7a32cb373af378a', 'sudah', '2020-06-11 15:30:32'),
('7bb430f113', 'b776597a97e34c14556f', 'KAI-2eeacf164c081a3b91afac92133939121eb079ff', 'sudah', '2020-06-11 16:14:06'),
('84db3f8dc8', 'e1dc024642cfe1324461', 'KAI-2e5fe0b3aac6ba98cb18899c0f365303a3376f60', 'sudah', '2020-06-11 15:44:54'),
('8c504aaad8', 'cd32a06024aa465d53d8', 'KAI-1c0787ef0e774990ce001adbfe3016af6e135169', 'sudah', '2020-06-03 21:02:16'),
('9aaec98e58', '51a185d67af38d37b085', 'KAI-5960b1581eea78d25f3577d20e63d794ae555d69', 'sudah', '2020-06-03 20:54:00'),
('aa91afd81c', 'c546ae25e28a887a8829', 'KAI-c5c5ae65e531dcfdaf2d1178d054a278122ec5a1', 'sudah', '2020-06-03 21:02:13'),
('bccc65726d', 'cbcdc26602d10028be18', 'KAI-17f9ab292a7620f3554797c927a74bd35c742ce0', 'sudah', '2020-06-03 21:02:10'),
('c3f124e7a0', '83308c8c37cfa3f6b380', 'KAI-4dd252f7b0b767f2d0e68d737ca0db5880a914f8', 'sudah', '2020-06-11 16:31:43'),
('c7f8d73a57', 'afc755fbb0c6014427ad', 'KAI-a6baffa73618d63c8ea67b2758e92567993183aa', 'belum', '2020-06-11 16:52:28'),
('cfabb835d2', 'f6e8f066ff48ab6c89f1', 'KAI-6152c09769e83ee59f94a12b9c1dae40a3b08b9a', 'belum', '2020-06-11 16:50:29'),
('d2d6b2a163', 'a4c4fb279f69f4f7a649', 'KAI-1a64bc5d4a172721de782c8fb4bc4d9b19c02dfd', 'sudah', '2020-06-11 16:13:46'),
('d955dde4a3', '40bfd88d6ca584527563', 'KAI-b67fc0068944efad13899f25757510877ad5ed14', 'sudah', '2020-06-11 15:23:07'),
('dd831b358c', '98f7c1f97e9a28ef2fb8', 'KAI-9f01d99b363d18bfdf54868103c16587073d499c', 'sudah', '2020-06-03 21:02:08'),
('ea8b0a8294', '5d52f4b02277ec893377', 'KAI-fc11d3da014874c3a3b813617eedb95ff7aec090', 'sudah', '2020-06-04 13:30:57'),
('f0b0980ec7', '1fb3dae8ec8b56061bd2', 'KAI-7bf6112f402cde68c7892084d139cdb00381cf5a', 'sudah', '2020-06-04 13:54:03'),
('f8e7e187fa', '471d9c5740fa0cd31f3d', 'KAI-b81dbcf8c99bf1a9d32ae8a66e7c8bd2674c2103', 'sudah', '2020-06-11 15:32:30'),
('fd3938e4b6', '95a6c5061c16badaf546', 'KAI-779e3b0dbf6762c525fad16fbde3ae7c2dba294f', 'sudah', '2020-06-11 16:24:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `id` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tgl_order` date NOT NULL,
  `jml_penumpang` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_order`
--

INSERT INTO `t_order` (`id`, `id_user`, `id_jadwal`, `nama`, `usia`, `no_kk`, `no_hp`, `tgl_order`, `jml_penumpang`, `date_created`) VALUES
('afc755fbb0c6014427ad', 6, 0, 'Mochamad Yudi Sobari', '25', '326816513513546841351', '085695190268', '2020-06-12', 4, '2020-06-11 16:52:28'),
('f6e8f066ff48ab6c89f1', 6, 0, 'Mochamad Yudi Sobari', '25', '326816513513546841351', '085695190268', '2020-06-18', 100, '2020-06-11 16:50:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `level`, `date_created`) VALUES
(4, 'user2', '21232f297a57a5a743894a0e4a801fc3', 'user', '2020-05-30 18:41:40'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2020-05-30 20:21:34'),
(6, 'vodonesia@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'user', '2020-05-30 22:38:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_tujuan`
--
ALTER TABLE `k_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_order`
--
ALTER TABLE `log_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `k_tujuan`
--
ALTER TABLE `k_tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
