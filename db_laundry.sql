-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2016 at 05:03 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_ktgr` int(11) NOT NULL,
  `nm_ktgr` varchar(25) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_ktgr`, `nm_ktgr`, `tarif`) VALUES
(1, 'Expert', 8000),
(2, 'Normal', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laundry_keluar`
--

CREATE TABLE `tb_laundry_keluar` (
  `id_laundry` datetime NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `nm_konsumen` varchar(25) NOT NULL,
  `berat` int(11) NOT NULL,
  `nm_ktgr` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laundry_keluar`
--

INSERT INTO `tb_laundry_keluar` (`id_laundry`, `tgl`, `jam`, `nm_konsumen`, `berat`, `nm_ktgr`, `harga`, `total`) VALUES
('2016-12-23 08:58:23', '2016-12-23', '08:58:50', 'Bheta', 12, 'Normal', 4000, 48000),
('2016-12-23 08:58:34', '2016-12-23', '10:49:46', 'Tester', 10, 'Expert', 8000, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laundry_masuk`
--

CREATE TABLE `tb_laundry_masuk` (
  `id_laundry` datetime NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `nm_konsumen` varchar(25) NOT NULL,
  `berat` int(11) NOT NULL,
  `nm_ktgr` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laundry_masuk`
--

INSERT INTO `tb_laundry_masuk` (`id_laundry`, `tgl`, `jam`, `nm_konsumen`, `berat`, `nm_ktgr`, `harga`) VALUES
('2016-12-23 08:58:23', '2016-12-23', '08:58:23', 'Bheta', 12, 'Normal', 4000),
('2016-12-23 08:58:34', '2016-12-23', '08:58:34', 'Tester', 10, 'Expert', 8000),
('2016-12-23 10:36:00', '2016-12-23', '10:36:00', 'Test', 3, 'Expert', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`) VALUES
('admin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_ktgr`);

--
-- Indexes for table `tb_laundry_keluar`
--
ALTER TABLE `tb_laundry_keluar`
  ADD UNIQUE KEY `id_laundry` (`id_laundry`);

--
-- Indexes for table `tb_laundry_masuk`
--
ALTER TABLE `tb_laundry_masuk`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_ktgr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_laundry_keluar`
--
ALTER TABLE `tb_laundry_keluar`
  ADD CONSTRAINT `tb_laundry_keluar_ibfk_1` FOREIGN KEY (`id_laundry`) REFERENCES `tb_laundry_masuk` (`id_laundry`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
