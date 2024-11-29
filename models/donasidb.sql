-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 09:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `model_pembayaran`
--

CREATE TABLE `model_pembayaran` (
  `id_model` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_pembayaran`
--

INSERT INTO `model_pembayaran` (`id_model`, `metode`, `keterangan`) VALUES
(26, 'Transfer Bank', 'asd'),
(27, 'bri', 'saxophones'),
(28, 'test', 'testambah'),
(29, 'test', 'testtambah2f');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `donatur` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id_model` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `pesan` text DEFAULT NULL,
  `bukti_transfer` text DEFAULT NULL,
  `status` enum('pending','finished') DEFAULT 'pending',
  `tanggal` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `donatur`, `email`, `id_model`, `jumlah`, `pesan`, `bukti_transfer`, `status`, `tanggal`) VALUES
(17, 'irfan', '', 26, 200000, 'test', NULL, 'pending', '2024-10-31 02:42:22'),
(22, 'fauzi2', 'ini@gmail.com', 27, 50000, 'asd', '/upload/1732908152-88523aee7d9fa79296199c7b97013891-6cdf509c0c97eb623174ca4e19177686.jpg', 'pending', '2024-11-29 17:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$ke.jhWIwu2/uZz6yiIs6WuM31k27mfuAL3RToheCgV2wtKGAX.l3W'),
(3, 'asdg', '$2y$10$Cyto0iHUt57EWGWQZ0Kt2.9gXSyoDmz5LElPJnAnUfVOEhHz1R.fC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model_pembayaran`
--
ALTER TABLE `model_pembayaran`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `id_model` (`id_model`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `model_pembayaran`
--
ALTER TABLE `model_pembayaran`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_model`) REFERENCES `model_pembayaran` (`id_model`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
