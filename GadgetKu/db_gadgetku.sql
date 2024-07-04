-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2024 pada 06.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gadgetku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
(1, 'satriakusuma', '$2y$10$NQE0hWp2YIibWxS6BUIXHuXUEFMe6Ot4uvNFObsl2AtujFAdsHxWK', 'satriaksm.20@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id_merek` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id_merek`, `merek`, `image`) VALUES
('SM00001', 'Asus', 'assets/asus.jpg'),
('SM00002', 'Apple', 'assets/apple.jpg'),
('SM00003', 'Xiaomi', 'assets/xiaomi.jpg'),
('SM00004', 'Poco', 'assets/poco.jpg'),
('SM00005', 'Infinix', 'assets/infinix.jpg'),
('SM00006', 'Vivo', 'assets/vivo.jpg'),
('SM00007', 'Oppo', 'assets/oppo.jpg'),
('SM00008', 'Itel', 'assets/itel.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `smartphone`
--

CREATE TABLE `smartphone` (
  `id_smartphone` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_merek` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `smartphone`
--

INSERT INTO `smartphone` (`id_smartphone`, `nama`, `id_merek`, `deskripsi`, `stock`, `price`, `date`, `image`) VALUES
(5, 'Iphone 13 Pro', 'SM00002', '123', 1, 14999000, '2024-06-03 11:07:32', 'upload/4.jpg'),
(7, 'Poco X3 NFC', 'SM00004', '123', 123, 2000000, '2024-06-06 11:08:58', 'upload/xiaomi-poco-x3-nfc.jpg'),
(8, 'Poco X5 Pro', 'SM00004', '123', 123, 123, '2024-06-06 11:09:27', 'upload/xiaomi-poco-x5-pro-5g.jpg'),
(9, 'ROG Phone 8', 'SM00001', '123', 123, 123, '2024-06-06 11:10:15', 'upload/asus-rog-phone-8.jpg'),
(10, 'Iphone 14 Pro MAX', 'SM00002', '123', 123, 123, '2024-06-06 11:10:46', 'upload/apple-iphone-14-pro-max-.jpg'),
(11, 'Poco X6 Pro 5G', 'SM00004', '123', 123, 123, '2024-06-06 13:32:34', 'upload/3.jpg'),
(12, 'Poco F6', 'SM00004', '123', 123, 123, '2024-06-06 14:00:17', 'upload/xiaomi-poco-f6.jpg'),
(13, 'Poco M6 Pro', 'SM00004', '123', 123, 123, '2024-06-06 14:04:27', 'upload/xiaomi-poco-m6-pro-4g.jpg'),
(14, 'ROG Phone 5', 'SM00001', '123', 12, 123, '2024-06-07 13:48:12', 'upload/5.jpg'),
(15, 'Redmi Note 12 Pro', 'SM00003', '12312', 123, 123, '2024-06-13 09:10:20', 'upload/xiaomi-poco-f6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `smartphone`
--
ALTER TABLE `smartphone`
  ADD PRIMARY KEY (`id_smartphone`),
  ADD KEY `id_merek` (`id_merek`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `smartphone`
--
ALTER TABLE `smartphone`
  MODIFY `id_smartphone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `smartphone`
--
ALTER TABLE `smartphone`
  ADD CONSTRAINT `smartphone_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
