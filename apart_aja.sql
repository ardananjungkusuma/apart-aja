-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 03:26 AM
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
-- Table structure for table `apartemen`
--

CREATE TABLE `apartemen` (
  `id_apartemen` int(11) NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `nama_apartemen` varchar(255) NOT NULL,
  `alamat_apartemen` varchar(255) NOT NULL,
  `kota_kabupaten` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `gambar_apartemen` text NOT NULL,
  `maps_link` text NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartemen`
--

INSERT INTO `apartemen` (`id_apartemen`, `id_pengelola`, `nama_apartemen`, `alamat_apartemen`, `kota_kabupaten`, `provinsi`, `gambar_apartemen`, `maps_link`) VALUES
(1, 1, 'McVinsque', 'Jl. Panglima Sudirman 21', 'Malang', 'Jawa Timur', 'assets/img/gambar_apartemen/04032020084525a.jpg', 'https://goo.gl/maps/oY8TDJzL5JcQvgu17'),
(2, 1, 'Playa De Seville', 'Jl. Panglima Sudirman 22', 'Tangerang', 'Banten', 'assets/img/gambar_apartemen/04032020095952playadeseville.jpg', 'https://goo.gl/maps/DDSjthwMd8h8KD3X6');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_tambahan`
--

CREATE TABLE `fasilitas_tambahan` (
  `id_fasilitas` int(11) NOT NULL,
  `id_apartemen` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `deskripsi_fasilitas` text NOT NULL,
  `harga` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_apartemen`
--

CREATE TABLE `gambar_apartemen` (
  `id_gambar` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi_singkat` varchar(50) NOT NULL DEFAULT 'Image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_apartemen`
--

INSERT INTO `gambar_apartemen` (`id_gambar`, `id_ruangan`, `gambar`, `deskripsi_singkat`) VALUES
(1, 1, 'assets/img/gambar_apartemen/04032020091229Screenshot_3.jpg', 'Ruang Tamu'),
(2, 1, 'assets/img/gambar_apartemen/04032020091250Screenshot_8.jpg', 'Kamar Mandi'),
(3, 1, 'assets/img/gambar_apartemen/04032020091301Screenshot_7.jpg', 'Kamar Mandi'),
(4, 1, 'assets/img/gambar_apartemen/04032020091321Screenshot_6.jpg', 'Dapur'),
(5, 3, 'assets/img/gambar_apartemen/04032020100246Screenshot_1.jpg', 'Ruang Tamu'),
(6, 3, 'assets/img/gambar_apartemen/04032020100302Screenshot_3.jpg', 'Ruang Tamu 2'),
(7, 3, 'assets/img/gambar_apartemen/04032020100317Screenshot_5.jpg', 'Kamar Tidur'),
(8, 3, 'assets/img/gambar_apartemen/04032020100326Screenshot_6.jpg', 'Kamar Tidur'),
(9, 3, 'assets/img/gambar_apartemen/04032020100339Screenshot_7.jpg', 'Toilet');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `id_apartemen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_kritik_saran` text NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_apartemen`
--

CREATE TABLE `pemilik_apartemen` (
  `id_pemilik_apartemen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `nama_nomer_ruangan` varchar(255) NOT NULL,
  `status_kepemilikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengelola_apartemen`
--

CREATE TABLE `pengelola_apartemen` (
  `id_pengelola` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telpon` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar_identitas` text NOT NULL,
  `status_pengelola` varchar(255) NOT NULL DEFAULT 'Belum Terverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelola_apartemen`
--

INSERT INTO `pengelola_apartemen` (`id_pengelola`, `nama`, `no_telpon`, `jenis_kelamin`, `email`, `username`, `password`, `gambar_identitas`, `status_pengelola`) VALUES
(1, 'Ardan Anjung Kusuma', '6285258967800', 'Pria', 'ardananjungkusuma@gmail.com', 'ardananjungkusuma', 'd2219d75098abd01493908d2f7f4d13d', 'assets/img/identitas/ktpardancontoh.jpg', 'Sudah Terverifikasi'),
(2, 'Agit Ari', '62851213512', 'Pria', 'agitari@gmail.com', 'agitari', '47efee1c35ca222d8a29c7eb8616e3b5', 'assets/img/identitas/ktpardancontoh.jpg', 'Sudah Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_apartemen`
--

CREATE TABLE `ruangan_apartemen` (
  `id_ruangan` int(11) NOT NULL,
  `id_apartemen` int(11) NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_ruangan` varchar(250) NOT NULL,
  `harga_sewa` int(80) NOT NULL,
  `harga_beli` int(80) NOT NULL,
  `detail_ruangan` text NOT NULL,
  `sisa_ruang_apartemen` int(10) NOT NULL,
  `gambar_utama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan_apartemen`
--

INSERT INTO `ruangan_apartemen` (`id_ruangan`, `id_apartemen`, `id_pengelola`, `nama`, `jenis_ruangan`, `harga_sewa`, `harga_beli`, `detail_ruangan`, `sisa_ruang_apartemen`, `gambar_utama`) VALUES
(1, 1, 1, 'Vertique', 'Mini Suite', 2500000, 325000000, 'Fasilitas :\r\n1. Kasur 2 Orang\r\n2. Ruang Tamu\r\n3. Kamar Mandi Dalam(Tidak Termasuk Air Panas)\r\n4. Televisi\r\n5. Dapur Kecil', 50, 'assets/img/gambar_apartemen/04032020091144Screenshot_5.jpg'),
(3, 2, 1, 'Seville Eksklusif', 'Luxury Suite', 5500000, 585000000, 'Fasilitas :\r\n1. Televisi\r\n2. Dapur\r\n3. 2 Toilet\r\n4. 2 Kasur (1 Double, 1 Single)\r\n5. Wifi 50Mbps', 10, 'assets/img/gambar_apartemen/04032020100157Screenshot_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_fasilitas`
--

CREATE TABLE `transaksi_fasilitas` (
  `id_transaksi_fasilitas` int(11) NOT NULL,
  `id_pemilik_apartemen` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `harga` int(20) NOT NULL,
  `kode_transaksi_fasilitas` int(11) NOT NULL,
  `gambar_bukti_transfer_fasilitas` text NOT NULL,
  `status_transaksi_fasilitas` varchar(255) NOT NULL DEFAULT 'Belum Berlangganan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_transaksi_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `status_pemesanan` varchar(255) NOT NULL,
  `gambar_bukti_transfer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penyewaan`
--

CREATE TABLE `transaksi_penyewaan` (
  `id_transaksi_penyewaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
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
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar_kartu_identitas` text NOT NULL,
  `gambar_verif_identitas` text NOT NULL,
  `status_user` varchar(255) NOT NULL DEFAULT 'Belum Terverifikasi',
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_telpon`, `jenis_kelamin`, `email`, `username`, `password`, `gambar_kartu_identitas`, `gambar_verif_identitas`, `status_user`, `level`) VALUES
(1, 'Martin Amanu Khusna', 'None', 'None', 'Male', 'martinamanu17@gmail.com', 'martin', '34f74c049edea51851c6924f4a386762', 'assets/img/etc/ava_default.jpg', '', 'Belum Terverifikasi', 1),
(2, 'Ardan Anjung Kusuma', 'None', 'None', 'None', 'admin_ardan@gmail.com', 'admin_ardan', 'd2219d75098abd01493908d2f7f4d13d', 'None', 'None', 'Sudah Terverifikasi', 2),
(3, 'Agit Ari Irawan', 'None', 'None', 'Male', 'agitari@gmail.com', 'agit', 'a505c964caa2a7a9f158378df55462f9', 'assets/img/etc/ava_default.jpg', 'assets/img/etc/ava_default.jpg', 'Belum Terverifikasi', 1),
(4, 'Hunayn Risatayn', 'None', 'None', 'Male', 'hunaynr@gmail.com', 'hunayn', '01e340317b4ea5bf03eae0912a2d4546', 'assets/img/etc/ava_default.jpg', 'assets/img/etc/ava_default.jpg', 'Belum Terverifikasi', 1),
(5, 'Nur Hanifah', 'None', 'None', 'Female', 'hanifah@gmail.com', 'hanifah', 'ac83ce3d55576ec2d15feaeca6715d01', 'assets/img/etc/ava_default.jpg', 'assets/img/etc/ava_default.jpg', 'Belum Terverifikasi', 1),
(6, 'Osa Mahanani', 'None', 'None', 'Female', 'osamahanani@gmail.com', 'osa', '374762714ec840404a3c2c4afc32cc22', 'assets/img/etc/ava_default.jpg', 'assets/img/etc/ava_default.jpg', 'Belum Terverifikasi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartemen`
--
ALTER TABLE `apartemen`
  ADD PRIMARY KEY (`id_apartemen`),
  ADD KEY `id_pengelola` (`id_pengelola`);

--
-- Indexes for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `fasilitas_tambahan_ibfk_1` (`id_apartemen`);

--
-- Indexes for table `gambar_apartemen`
--
ALTER TABLE `gambar_apartemen`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_apartemen` (`id_apartemen`);

--
-- Indexes for table `pemilik_apartemen`
--
ALTER TABLE `pemilik_apartemen`
  ADD PRIMARY KEY (`id_pemilik_apartemen`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_user` (`id_user`);

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
  ADD KEY `id_apartemen` (`id_apartemen`),
  ADD KEY `id_pengelola` (`id_pengelola`);

--
-- Indexes for table `transaksi_fasilitas`
--
ALTER TABLE `transaksi_fasilitas`
  ADD PRIMARY KEY (`id_transaksi_fasilitas`),
  ADD KEY `id_pemilik_apartemen` (`id_pemilik_apartemen`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_transaksi_pembelian`);

--
-- Indexes for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  ADD PRIMARY KEY (`id_transaksi_penyewaan`),
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
-- AUTO_INCREMENT for table `apartemen`
--
ALTER TABLE `apartemen`
  MODIFY `id_apartemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_apartemen`
--
ALTER TABLE `gambar_apartemen`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilik_apartemen`
--
ALTER TABLE `pemilik_apartemen`
  MODIFY `id_pemilik_apartemen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengelola_apartemen`
--
ALTER TABLE `pengelola_apartemen`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruangan_apartemen`
--
ALTER TABLE `ruangan_apartemen`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_fasilitas`
--
ALTER TABLE `transaksi_fasilitas`
  MODIFY `id_transaksi_fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_transaksi_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  MODIFY `id_transaksi_penyewaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartemen`
--
ALTER TABLE `apartemen`
  ADD CONSTRAINT `apartemen_ibfk_1` FOREIGN KEY (`id_pengelola`) REFERENCES `pengelola_apartemen` (`id_pengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  ADD CONSTRAINT `fasilitas_tambahan_ibfk_1` FOREIGN KEY (`id_apartemen`) REFERENCES `apartemen` (`id_apartemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar_apartemen`
--
ALTER TABLE `gambar_apartemen`
  ADD CONSTRAINT `gambar_apartemen_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan_apartemen` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `kritik_saran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kritik_saran_ibfk_2` FOREIGN KEY (`id_apartemen`) REFERENCES `apartemen` (`id_apartemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemilik_apartemen`
--
ALTER TABLE `pemilik_apartemen`
  ADD CONSTRAINT `pemilik_apartemen_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan_apartemen` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilik_apartemen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ruangan_apartemen`
--
ALTER TABLE `ruangan_apartemen`
  ADD CONSTRAINT `ruangan_apartemen_ibfk_1` FOREIGN KEY (`id_apartemen`) REFERENCES `apartemen` (`id_apartemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ruangan_apartemen_ibfk_2` FOREIGN KEY (`id_pengelola`) REFERENCES `pengelola_apartemen` (`id_pengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_fasilitas`
--
ALTER TABLE `transaksi_fasilitas`
  ADD CONSTRAINT `transaksi_fasilitas_ibfk_1` FOREIGN KEY (`id_pemilik_apartemen`) REFERENCES `pemilik_apartemen` (`id_pemilik_apartemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_fasilitas_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas_tambahan` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  ADD CONSTRAINT `transaksi_penyewaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_penyewaan_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan_apartemen` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
