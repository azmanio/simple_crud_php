-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2023 at 08:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenismobil`
--

CREATE TABLE `jenismobil` (
  `idMobil` char(5) NOT NULL,
  `platMobil` varchar(12) NOT NULL,
  `merkMobil` varchar(50) NOT NULL,
  `warnaMobil` varchar(15) NOT NULL,
  `tahunMobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenismobil`
--

INSERT INTO `jenismobil` (`idMobil`, `platMobil`, `merkMobil`, `warnaMobil`, `tahunMobil`) VALUES
('M01', 'E 4334 OK', 'Toyota Veloz', 'Putih', '2021'),
('M02', 'E 4347 JK', 'Mitsubishi Xpander', 'Hitam', '2021'),
('M03', 'E 575 QJ', 'Toyota Avanza', 'Silver', '2018'),
('M04', 'E 3894 KK', 'Daihatsu Xenia', 'Putih', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` char(50) NOT NULL,
  `namaPelanggan` varchar(50) NOT NULL,
  `alamatPelanggan` text NOT NULL,
  `jkPelanggan` varchar(10) NOT NULL,
  `noHpPelanggan` varchar(15) NOT NULL,
  `noKtpPelanggan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaPelanggan`, `alamatPelanggan`, `jkPelanggan`, `noHpPelanggan`, `noKtpPelanggan`) VALUES
('P0001', 'Molina Aurel', 'Watubelah, Cirebon', 'Perempuan', '081222375469', '3277182003980001'),
('P0002', 'Rahman', 'Kuningan', 'Laki-Laki', '081204148151', '235885239894324'),
('P0003', 'Surno', 'Majalengka', 'Laki-Laki', '085312348876', '3209151904530004'),
('P0023', 'Jono', 'Gunung Jati', 'Laki-Laki', '082320224745', '3209211008010001');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `idTarif` char(5) NOT NULL,
  `waktuSewa` varchar(50) NOT NULL,
  `tarifPerHari` float NOT NULL,
  `totalTarif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`idTarif`, `waktuSewa`, `tarifPerHari`, `totalTarif`) VALUES
('T01', '1  Hari', 250000, 250000),
('T02', '2 Hari', 250000, 500000),
('T03', '3 Hari', 250000, 750000),
('T04', '4 Hari', 200000, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` char(5) NOT NULL,
  `idPelanggan` char(5) NOT NULL,
  `idMobil` char(5) NOT NULL,
  `tglSewa` date NOT NULL,
  `tglKembali` date NOT NULL,
  `idTarif` char(5) NOT NULL,
  `totalTarif` float NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idPelanggan`, `idMobil`, `tglSewa`, `tglKembali`, `idTarif`, `totalTarif`, `keterangan`) VALUES
('TR001', 'P0001', 'M01', '2023-02-07', '2023-02-06', 'T01', 300000, 'Baru DP'),
('TR002', 'P0002', 'M02', '2023-02-09', '2023-02-10', 'T02', 200000, 'KTP Belum ada'),
('TR003', 'P0003', 'M01', '2023-02-14', '2023-02-16', 'T02', 500000, 'Baru DP'),
('TR004', 'P0023', 'M04', '2023-02-01', '2023-02-04', 'T03', 750000, 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenismobil`
--
ALTER TABLE `jenismobil`
  ADD PRIMARY KEY (`idMobil`),
  ADD UNIQUE KEY `platMobil` (`platMobil`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`),
  ADD UNIQUE KEY `noKtpPelanggan` (`noKtpPelanggan`),
  ADD UNIQUE KEY `noHpPelanggan` (`noHpPelanggan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`idTarif`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idPelanggan` (`idPelanggan`),
  ADD KEY `idMobil` (`idMobil`),
  ADD KEY `idTarif` (`idTarif`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `idMobil` FOREIGN KEY (`idMobil`) REFERENCES `jenismobil` (`idMobil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPelanggan` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idTarif` FOREIGN KEY (`idTarif`) REFERENCES `tarif` (`idTarif`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
