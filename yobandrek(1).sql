-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2021 at 08:58 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yobandrek`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_meja`
--

CREATE TABLE `data_meja` (
  `no_meja` int(11) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `no_pemesanan` int(6) DEFAULT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_meja`
--

INSERT INTO `data_meja` (`no_meja`, `jumlah_kursi`, `no_pemesanan`, `status`) VALUES
(1, 300, NULL, 'tersedia'),
(2, 2, NULL, 'tersedia'),
(3, 4, 14, 'tidak tersedia'),
(4, 4, 14, 'tidak tersedia'),
(5, 6, NULL, 'tersedia'),
(6, 8, 15, 'tidak tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `data_menu`
--

CREATE TABLE `data_menu` (
  `kode_menu` varchar(11) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `jenis` enum('panas','dingin') NOT NULL,
  `harga` double NOT NULL,
  `keterangan` enum('divalidasi','blm divalidasi') NOT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL DEFAULT 'tidak tersedia',
  `diskon` int(11) DEFAULT '0',
  `stok` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_menu`
--

INSERT INTO `data_menu` (`kode_menu`, `nama`, `jenis`, `harga`, `keterangan`, `status`, `diskon`, `stok`) VALUES
('01', 'Bandrek Panas', 'panas', 10000, 'divalidasi', 'tersedia', 2, 5),
('02', 'Bandrek Dingin', 'dingin', 30000, 'divalidasi', 'tersedia', 5, 3),
('03', 'Bandrek Jahe', 'panas', 14000, 'divalidasi', 'tersedia', 10, 1),
('04', 'Bandrek Mahal', 'panas', 100000, 'blm divalidasi', 'tidak tersedia', 0, 0),
('06', 'Bandrek 0', 'panas', 1, 'divalidasi', 'tidak tersedia', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_Pegawai` int(6) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('kasir','pelayan','owner','barista') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_Pegawai`, `username`, `password`, `nama`, `level`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'owner', 'owner'),
(4, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'barista', 'barista'),
(5, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'kasir', 'kasir'),
(7, 'admin4', 'fc1ebc848e31e0a68e868432225e3c82', 'pelayan', 'pelayan'),
(11, 'sidiq', '9c51d2a1fac7deab665b77ae1c5fc39c', 'sidiq', 'kasir'),
(14, 'admin10', '0192023a7bbd73250516f069df18b500', 'admin10', 'pelayan'),
(15, 'ownerdumm', 'b356698f91810763cb28889432f3dca8', 'dummyOwner', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `no_pemesanan` int(11) NOT NULL,
  `id_kasir` int(6) NOT NULL,
  `total_harga` double NOT NULL,
  `pajak` double NOT NULL,
  `uang_pembayaran` double NOT NULL,
  `uang_kembalian` double NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `validasi` enum('divalidasi','blm divalidasi') NOT NULL,
  `validator` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pembayaran`
--

INSERT INTO `data_pembayaran` (`id_pembayaran`, `no_pemesanan`, `id_kasir`, `total_harga`, `pajak`, `uang_pembayaran`, `uang_kembalian`, `tanggal_pembayaran`, `validasi`, `validator`) VALUES
(5, 13, 5, 40000, 3830, 80000, 3787, '2021-08-04 20:26:55', 'blm divalidasi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pemesanan`
--

CREATE TABLE `data_pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `id_pelayan` int(6) NOT NULL,
  `status_pesanan` enum('diproses','disajikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemesanan`
--

INSERT INTO `data_pemesanan` (`no_pemesanan`, `id_pelayan`, `status_pesanan`) VALUES
(13, 7, 'disajikan'),
(14, 7, 'diproses'),
(15, 7, 'disajikan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `kode_menu` varchar(11) NOT NULL,
  `keterangan` text,
  `jumlah` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`no_pemesanan`, `kode_menu`, `keterangan`, `jumlah`) VALUES
(13, '01', 'GPL', 1),
(13, '02', 'GPL', 1),
(14, '01', 'BOLEH GRATIS?', 4),
(14, '03', 'BOLEH GRATIS?', 4),
(15, '02', 'PALAK BAPAK KAU', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_meja`
--
ALTER TABLE `data_meja`
  ADD PRIMARY KEY (`no_meja`),
  ADD KEY `no_pemesanan` (`no_pemesanan`);

--
-- Indexes for table `data_menu`
--
ALTER TABLE `data_menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_Pegawai`),
  ADD UNIQUE KEY `NIK` (`username`);

--
-- Indexes for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pemesanan` (`no_pemesanan`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `validator` (`validator`);

--
-- Indexes for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD PRIMARY KEY (`no_pemesanan`),
  ADD KEY `id_koki` (`id_pelayan`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `id_pemesanan` (`no_pemesanan`),
  ADD KEY `id_menu` (`kode_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_Pegawai` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  MODIFY `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_meja`
--
ALTER TABLE `data_meja`
  ADD CONSTRAINT `data_meja_ibfk_1` FOREIGN KEY (`no_pemesanan`) REFERENCES `data_pemesanan` (`no_pemesanan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD CONSTRAINT `data_pembayaran_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `data_pegawai` (`id_Pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pembayaran_ibfk_2` FOREIGN KEY (`validator`) REFERENCES `data_pegawai` (`id_Pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pembayaran_ibfk_3` FOREIGN KEY (`no_pemesanan`) REFERENCES `data_pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD CONSTRAINT `data_pemesanan_ibfk_1` FOREIGN KEY (`id_pelayan`) REFERENCES `data_pegawai` (`id_Pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`no_pemesanan`) REFERENCES `data_pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_ibfk_4` FOREIGN KEY (`kode_menu`) REFERENCES `data_menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
