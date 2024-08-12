-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2024 pada 14.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand_pakaian`
--

CREATE TABLE `brand_pakaian` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(25) NOT NULL,
  `negara_brand` varchar(25) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `foto_brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `brand_pakaian`
--

INSERT INTO `brand_pakaian` (`id_brand`, `nama_brand`, `negara_brand`, `tanggal_berdiri`, `foto_brand`) VALUES
(3, 'NIKE', 'amerika', '1928-05-18', 'NIKE.png'),
(6, 'CONVERSE', 'amerika', '1980-12-18', 'CONVERSE.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakaian`
--

CREATE TABLE `pakaian` (
  `id_pakaian` int(11) NOT NULL,
  `jenis_pakaian` varchar(50) NOT NULL,
  `nama_pakaian` varchar(100) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `deskripsi_pakaian` text NOT NULL,
  `gender_pakaian` varchar(10) NOT NULL,
  `foto_pakaian` varchar(100) NOT NULL,
  `id_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pakaian`
--

INSERT INTO `pakaian` (`id_pakaian`, `jenis_pakaian`, `nama_pakaian`, `tanggal_rilis`, `deskripsi_pakaian`, `gender_pakaian`, `foto_pakaian`, `id_brand`) VALUES
(2, 'Sepatu', 'Converse Chuck Taylor All Star Lift Hi Shoes Wmn', '2017-08-18', '           Shoes\r\nMaterial: canvas\r\nCut: high-tops\r\nColor: black\r\nAdditional warming : no', 'Unisex', 'Converse Chuck Taylor All Star Lift Hi Shoes Wmn.png', 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `brand_pakaian`
--
ALTER TABLE `brand_pakaian`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indeks untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id_pakaian`),
  ADD KEY `id_brand` (`id_brand`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `brand_pakaian`
--
ALTER TABLE `brand_pakaian`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id_pakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  ADD CONSTRAINT `pakaian_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand_pakaian` (`id_brand`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
