-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2021 at 01:18 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `jumlah_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_menu`
--

CREATE TABLE `data_menu` (
  `kode_menu` varchar(11) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `jenis` enum('panas','dingin') NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` enum('divalidasi','blm divalidasi') NOT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `no_pemesanan` int(11) DEFAULT NULL,
  `id_kasir` int(6) DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `uang_pembayaran` int(11) NOT NULL,
  `uang_kembalian` int(11) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `validasi` enum('divalidasi','blm divalidasi') NOT NULL,
  `validator` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pemesanan`
--

CREATE TABLE `data_pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `id_pelayan` int(6) DEFAULT NULL,
  `status_barista` enum('dalam antrian','sedang dibuat','pesanan selesai') NOT NULL,
  `status_pelanggan` enum('menunggu minuman','sedang minum','selesai minum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_meja`
--

CREATE TABLE `detail_meja` (
  `no_meja` int(11) DEFAULT NULL,
  `no_pemesanan` int(6) DEFAULT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `data_meja`
--
ALTER TABLE `data_meja`
  ADD PRIMARY KEY (`no_meja`);

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
-- Indexes for table `detail_meja`
--
ALTER TABLE `detail_meja`
  ADD KEY `id_meja` (`no_meja`),
  ADD KEY `detail_meja_ibfk_2` (`no_pemesanan`);

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
  MODIFY `id_Pegawai` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  MODIFY `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD CONSTRAINT `data_pembayaran_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `data_pegawai` (`id_Pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pembayaran_ibfk_2` FOREIGN KEY (`validator`) REFERENCES `data_pegawai` (`id_Pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD CONSTRAINT `data_pemesanan_ibfk_1` FOREIGN KEY (`id_pelayan`) REFERENCES `data_pegawai` (`id_Pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_meja`
--
ALTER TABLE `detail_meja`
  ADD CONSTRAINT `detail_meja_ibfk_1` FOREIGN KEY (`no_meja`) REFERENCES `data_meja` (`no_meja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_meja_ibfk_2` FOREIGN KEY (`no_pemesanan`) REFERENCES `data_pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

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
