-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 02:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekul_legend`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` char(4) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kd_materi` char(4) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `tgl_materi` date NOT NULL,
  `file_materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kd_materi`, `judul_materi`, `tgl_materi`, `file_materi`) VALUES
('MTK1', 'Matriks', '2023-11-01', 'Matriks.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Admin','Guru','Siswa') NOT NULL DEFAULT 'Siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Luthfi Emillulfata', 'luthfi', 'd5cd72b7bcbf56bc503904f1ac7d9bc2', 'Guru'),
(2, 'Sabila Naila Zulfa', 'sabila', '3d364db17f6d532ae8c03dad6ecb273e', 'Siswa'),
(3, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(4, 'Alif Faturrohman', 'alif', '099a147c0c6bcd34009896b2cc88633c', 'Guru'),
(5, 'Satrio Utomo', 'satrio', 'eec470e2f66e97a2ff82bcb62897375a', 'Siswa'),
(13, 'Khadziq Alif', 'khadziq', 'f43bc4cfd6a867b48b47294c56f57ee5', 'Siswa'),
(16, 'Firda Salya Mutiara', 'alya', '11928ca22a60b25479e3f0799a0a3d5f', 'Admin'),
(18, 'Budiman', 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'Admin'),
(19, 'daniel arif', 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'Guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kd_materi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
