-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 03:37 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apart_aja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(249) NOT NULL,
  `email` varchar(249) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `username` varchar(249) NOT NULL,
  `password` varchar(249) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apartemen`
--

CREATE TABLE `apartemen` (
  `id_apartemen` int(11) NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `nama_apartemen` varchar(255) NOT NULL,
  `alamat_apartemen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_apartemen`
--

CREATE TABLE `gambar_apartemen` (
  `id_gambar` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengelola_apartemen`
--

CREATE TABLE `pengelola_apartemen` (
  `id_pengelola` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar_identitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_apartemen`
--

CREATE TABLE `ruangan_apartemen` (
  `id_ruangan` int(11) NOT NULL,
  `id_apartemen` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_ruangan` varchar(50) NOT NULL,
  `harga` int(80) NOT NULL,
  `detail_ruangan` text NOT NULL,
  `fasilitas_ruangan` text NOT NULL,
  `sisa_ruang_apartemen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal_tagihan` date NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `kategori_tagihan` varchar(255) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pemesanan`
--

CREATE TABLE `transaksi_pemesanan` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `kode_ruangan` varchar(255) DEFAULT NULL,
  `durasi_sewa` varchar(255) NOT NULL,
  `awal_sewa` date NOT NULL,
  `kode_transaksi` int(10) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `status_pemesanan` varchar(255) NOT NULL DEFAULT 'Belum Terverif',
  `gambar_bukti_transfer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar_identitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apartemen`
--
ALTER TABLE `apartemen`
  ADD PRIMARY KEY (`id_apartemen`),
  ADD KEY `id_pengelola` (`id_pengelola`);

--
-- Indexes for table `gambar_apartemen`
--
ALTER TABLE `gambar_apartemen`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `pengelola_apartemen`
--
ALTER TABLE `pengelola_apartemen`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indexes for table `ruangan_apartemen`
--
ALTER TABLE `ruangan_apartemen`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_apartemen` (`id_apartemen`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apartemen`
--
ALTER TABLE `apartemen`
  MODIFY `id_apartemen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_apartemen`
--
ALTER TABLE `gambar_apartemen`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengelola_apartemen`
--
ALTER TABLE `pengelola_apartemen`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan_apartemen`
--
ALTER TABLE `ruangan_apartemen`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartemen`
--
ALTER TABLE `apartemen`
  ADD CONSTRAINT `apartemen_ibfk_1` FOREIGN KEY (`id_pengelola`) REFERENCES `pengelola_apartemen` (`id_pengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar_apartemen`
--
ALTER TABLE `gambar_apartemen`
  ADD CONSTRAINT `gambar_apartemen_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan_apartemen` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ruangan_apartemen`
--
ALTER TABLE `ruangan_apartemen`
  ADD CONSTRAINT `ruangan_apartemen_ibfk_1` FOREIGN KEY (`id_apartemen`) REFERENCES `apartemen` (`id_apartemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_pemesanan` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  ADD CONSTRAINT `transaksi_pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pemesanan_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan_apartemen` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
