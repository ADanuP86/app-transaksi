-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 06:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrean`
--

CREATE TABLE `antrean` (
  `id` int(11) NOT NULL,
  `cabang` varchar(20) NOT NULL,
  `teller` varchar(5) NOT NULL,
  `nasabah` varchar(25) NOT NULL,
  `no_antre` int(11) NOT NULL,
  `status` enum('Menunggu','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_channel`
--

CREATE TABLE `jenis_channel` (
  `id` int(3) NOT NULL,
  `channel` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_channel`
--

INSERT INTO `jenis_channel` (`id`, `channel`, `name`) VALUES
(1, 'ATM', 'ATM'),
(2, 'QRIS', 'Pembayaan Qris'),
(3, 'MB', 'Mobile Banking'),
(4, 'KD', 'Kartu Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `user_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `jenis_channel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`user_id`, `tgl`, `nominal`, `jenis_channel`) VALUES
(33, '2022-08-19', '100000', 'ATM'),
(34, '2022-08-19', '200000', 'KD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrean`
--
ALTER TABLE `antrean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_channel`
--
ALTER TABLE `jenis_channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrean`
--
ALTER TABLE `antrean`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jenis_channel`
--
ALTER TABLE `jenis_channel`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
