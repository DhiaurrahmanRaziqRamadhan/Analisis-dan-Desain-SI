-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2023 pada 20.41
-- Versi server: 10.4.24-MariaDB-log
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_express`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `email`, `pass`) VALUES
(1, 'laundry@unila.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_customer`
--

CREATE TABLE `akun_customer` (
  `id` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHandphone` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_customer`
--

INSERT INTO `akun_customer` (`id`, `email`, `username`, `alamat`, `noHandphone`, `pass`) VALUES
(1, 'adliif@gmail.com', 'adliif', 'Gedung meneng', '(+62) 82267854345', '123'),
(2, 'hanipjamil@gmail.com', 'hanip', 'natar', '081234567890', '1234'),
(3, 'zidan123@gmail.com', 'zidan', 'kampung baru', '(+62) 895704299495', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `member` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `nohp`, `member`) VALUES
(1, 'adliif', 'kampung baru', '081234567890', 'iya'),
(2, 'hanip', 'natar', '081928912334', 'iya'),
(3, 'zidan', 'kampung baru', '(+62) 895704299495', 'tidak'),
(4, 'raziq', 'kampung baru', '(+62) 82267854345', 'tidak');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_laporan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_laporan` (
`id` int(2)
,`username` varchar(100)
,`tanggal` varchar(100)
,`laporan` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id` int(2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `waktu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id`, `foto`, `tipe`, `harga`, `waktu`) VALUES
(1, 'laundryKiloan.png', 'Laundry Kiloan', '5000', '1 Day'),
(2, 'dryCleaning.png', 'Dry Cleaning', '10000', '4 Hours'),
(7, 'laundryOnDemond.png', 'Laundry On Demond', '8000', '16 Hours');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(2) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `laporan` varchar(100) NOT NULL,
  `id_customer` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `tanggal`, `laporan`, `id_customer`) VALUES
(13, '8 June 2023', 'lumayanlah', 1),
(14, '8 June 2023', 'tidak mengecewakan', 2),
(15, '8 June 2023', 'Semangat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_Pemesanan` varchar(255) NOT NULL,
  `tipe_paket` varchar(255) NOT NULL,
  `total` varchar(100) NOT NULL,
  `konfirmasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `alamat`, `tanggal_Pemesanan`, `tipe_paket`, `total`, `konfirmasi`) VALUES
(13, 'zidan', 'kampung baru', '6 August 2023', 'Dry Cleaning', '200000', 'iya');

-- --------------------------------------------------------

--
-- Struktur untuk view `data_laporan`
--
DROP TABLE IF EXISTS `data_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_laporan`  AS SELECT `laporan`.`id` AS `id`, `akun_customer`.`username` AS `username`, `laporan`.`tanggal` AS `tanggal`, `laporan`.`laporan` AS `laporan` FROM (`laporan` join `akun_customer` on(`laporan`.`id_customer` = `akun_customer`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun_customer`
--
ALTER TABLE `akun_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun_customer`
--
ALTER TABLE `akun_customer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `akun_customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
