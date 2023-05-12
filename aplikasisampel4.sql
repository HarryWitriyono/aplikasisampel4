-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 11:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasisampel4`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kodebarang` varchar(30) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `harga` double(12,0) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `tanggalbeli` date DEFAULT NULL,
  `kondisi` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `harga`, `satuan`, `tanggalbeli`, `kondisi`) VALUES
('b0001', 'Mobil Avanza Veloz 1.5 MT BD1163AR', 200000000, 'Unit', '2013-01-01', 'Sangat baik');

-- --------------------------------------------------------

--
-- Table structure for table `historylokasi`
--

CREATE TABLE `historylokasi` (
  `id` int(11) NOT NULL,
  `kodebarang` varchar(30) NOT NULL,
  `kodelokasi` varchar(3) NOT NULL,
  `tglmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `tglkeluar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `kodelokasi` varchar(3) NOT NULL,
  `namalokasi` varchar(20) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `historylokasi`
--
ALTER TABLE `historylokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodebarang` (`kodebarang`,`kodelokasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`kodelokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historylokasi`
--
ALTER TABLE `historylokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
