-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2023 at 09:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dns`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dns`
--

CREATE TABLE `tb_dns` (
  `id_dns` int NOT NULL,
  `npm` int NOT NULL,
  `kode_mk` int NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_mk` int NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_mk`, `nama_mk`, `sks`) VALUES
(40002744, 'Pengantar Teknik Sipil', 3),
(59001277, 'Pengantar Arsitektur', 3),
(283900133, 'Praktikum Pemrograman Berorientasi Objek', 1),
(345002302, 'Pemrograman Berorientasi Objek', 3),
(410002389, 'Aljabar Linear', 3),
(500013601, 'Pengantar Administrasi Publik', 3),
(900012889, 'Pengantar Akuntansi', 3),
(900283893, 'Pengantar Ilmu Hukum', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `npm` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` enum('Informatika','Sistem Informasi','Manajemen','Akuntansi','Hukum','PGSD','Pendidikan Agama Islam','Administrasi Publik','Ilmu Pemerintahan','Teknik Sipil','Arsitektur') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`npm`, `nama`, `jurusan`) VALUES
(22024011, 'Cyntha Alma', 'Akuntansi'),
(22611045, 'Andini Putri', 'Hukum'),
(22621023, 'Azzahra Nurul Syafirah', 'Sistem Informasi'),
(22631007, 'Galaksi Aldebaran', 'Teknik Sipil'),
(22641001, 'Shariful Zaidin', 'Informatika'),
(22650038, 'Vino G Bastian', 'Arsitektur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dns`
--
ALTER TABLE `tb_dns`
  ADD PRIMARY KEY (`id_dns`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`npm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dns`
--
ALTER TABLE `tb_dns`
  MODIFY `id_dns` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `kode_mk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900283894;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `npm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226310079;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dns`
--
ALTER TABLE `tb_dns`
  ADD CONSTRAINT `tb_dns_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `tb_matkul` (`kode_mk`),
  ADD CONSTRAINT `tb_dns_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `tb_mhs` (`npm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;