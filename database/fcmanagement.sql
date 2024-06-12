-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 03:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `cedera`
--

CREATE TABLE `cedera` (
  `id_cedera` int(11) NOT NULL,
  `id_pemain` int(11) DEFAULT NULL,
  `tanggal_cedera` date NOT NULL,
  `jenis_cedera` varchar(100) DEFAULT NULL,
  `tindakan_medis` varchar(200) DEFAULT NULL,
  `status_pemulihan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cedera`
--

INSERT INTO `cedera` (`id_cedera`, `id_pemain`, `tanggal_cedera`, `jenis_cedera`, `tindakan_medis`, `status_pemulihan`) VALUES
(1, 19, '2024-06-10', 'Knee Injury', 'Knee Reduction', 'In Recovery'),
(2, 24, '2024-06-13', 'Patah lengan', 'Operasi tulang', 'Not-Recovering'),
(3, 27, '2024-06-21', 'Sakit kulit', 'Skin Treatment', 'Not-Recovery');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id_sesi` int(11) DEFAULT NULL,
  `id_pemain` int(11) DEFAULT NULL,
  `status_kehadiran` varchar(50) DEFAULT NULL,
  `catatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id_sesi`, `id_pemain`, `status_kehadiran`, `catatan`) VALUES
(1, 1, 19, 'Sickness/Injury', 'Hadir'),
(6, 1, 19, 'Sickness/Injury', 'Nafilah Ramadhani'),
(12, 1, 27, 'No-Information', 'asasd');

-- --------------------------------------------------------

--
-- Table structure for table `pemain`
--

CREATE TABLE `pemain` (
  `id_pemain` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `nomor_punggung` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemain`
--

INSERT INTO `pemain` (`id_pemain`, `nama`, `tanggal_lahir`, `kewarganegaraan`, `height`, `posisi`, `nomor_punggung`, `image`) VALUES
(19, 'Erling Haaland    ', '2000-07-21', 'Norway', 1.94, 'Forward', 9, 'Haaland.png'),
(20, 'Kevin De Bruyne    ', '1991-06-28', 'Belgium', 1.81, 'Midfielder', 17, 'KDB.png'),
(21, 'Jack Grealish', '1995-09-10', 'England', 1.75, 'Midfielder', 10, 'jackgrealish.png'),
(24, 'Julián Álvarez', '2000-01-31', 'Argentine', 1.7, 'Forward', 19, 'alvarez.png'),
(27, 'Jeremy Doku  ', '2002-05-27', 'Belgium', 1.71, 'Midfielder', 11, 'doku.png');

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `id_sesi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jenis_sesi` varchar(50) DEFAULT NULL,
  `lawan` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `tanggal`, `waktu`, `jenis_sesi`, `lawan`, `lokasi`) VALUES
(1, '2024-06-19', '09:00:00', 'Training', '-', 'Etihad Stadium'),
(18, '2024-06-05', '09:30:00', 'Match', 'Barcelona FC', 'Etihad Stadium'),
(20, '2024-06-02', '03:30:00', 'Match', 'Manchester United', 'Old Trafford');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `image`, `name`) VALUES
(1, 'admin', 'admin123', 'admin', 'admin.jpg', 'Yujin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cedera`
--
ALTER TABLE `cedera`
  ADD PRIMARY KEY (`id_cedera`),
  ADD KEY `id_pemain` (`id_pemain`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id_sesi` (`id_sesi`),
  ADD KEY `id_pemain` (`id_pemain`);

--
-- Indexes for table `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id_pemain`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cedera`
--
ALTER TABLE `cedera`
  MODIFY `id_cedera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id_pemain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cedera`
--
ALTER TABLE `cedera`
  ADD CONSTRAINT `cedera_ibfk_1` FOREIGN KEY (`id_pemain`) REFERENCES `pemain` (`id_pemain`);

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`id_sesi`) REFERENCES `sesi` (`id_sesi`),
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`id_pemain`) REFERENCES `pemain` (`id_pemain`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
