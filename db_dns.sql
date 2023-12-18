-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2023 at 02:11 PM
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
  `kode_mk` varchar(5) NOT NULL DEFAULT '',
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_dns`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `kode_jurusan` int NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
(15201, 'Pendidikan Agama Islam'),
(15202, 'Pendidikan Guru Sekolah Dasar'),
(24001, 'Teknik Sipil'),
(24002, 'Arsitektur'),
(32101, 'Manajemen'),
(32102, 'Akuntansi'),
(41001, 'Hukum'),
(59011, 'Sistem Informasi'),
(59012, 'Informatika'),
(62101, 'Administrasi Publik'),
(62102, 'Ilmu Pemerintahan'),
(62103, 'Ilmu Perikanan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_mk` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_jurusan` int NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_mk`, `kode_jurusan`, `nama_mk`, `sks`) VALUES
('AD204', 62101, 'Manajemen Publik', 3),
('AD272', 62101, 'Administrasi Pembangunan', 2),
('AD349', 62101, 'Kebijakan Publik', 2),
('AD466', 62101, 'Pengembangan Sumber Daya Manusia di Sektor Publik', 3),
('AD729', 62101, 'Teori Organisasi', 3),
('AD736', 62101, 'Etika Administrasi Publik', 3),
('AK405', 32102, 'Akuntansi Keuangan', 3),
('AK407', 32102, 'Dasar Perpajakan', 2),
('AR055', 24002, 'Arsitektur Lansekap', 3),
('AR294', 24002, 'Desain Arsitektur', 2),
('AR305', 24002, 'Teknologi Konstruksi', 3),
('AR367', 24002, 'Arsitektur Perkotaan', 2),
('AR609', 24002, 'Arsitektur Lingkungan', 3),
('AR678', 24002, 'Tata Ruang', 2),
('HK809', 41001, 'Pengantar Hukum', 3),
('HK810', 41001, 'Hukum Perdata', 3),
('IF001', 59012, 'Pemrograman Berorientasi Objek', 3),
('IF002', 59012, 'Praktikum Pemrograman Berorientasi Objek', 1),
('IF042', 59012, 'Aljabar Linear', 3),
('IF203', 59012, 'Desain Grafis dan Multimedia', 3),
('IF283', 59012, 'Praktikum Pemrograman Berorientasi Objek', 1),
('IF890', 59012, 'Statistika dan Probabilitas', 3),
('IF934', 59012, 'Teori Bahasa dan Automata', 3),
('IK142', 62103, 'Biologi Perikanan', 3),
('IK394', 62103, 'Oseanografi Perikanan', 2),
('IK900', 62103, 'Ekonomi Perikanan', 3),
('IP001', 62102, 'Statistik Sosial', 3),
('IP028', 62102, 'Sistem Hukum Indonesia', 2),
('IP239', 62102, 'Kebijakan Publik', 3),
('IP274', 62102, 'Politik Indonesia', 2),
('IP835', 62102, 'Ekonomi Politik', 2),
('IP949', 62102, 'Teori Pemerintahan', 3),
('MJ101', 32101, 'Pengantar Manajemen', 3),
('MJ102', 32101, 'Manajemen Operasional', 2),
('MJ103', 32101, 'Pemasaran', 2),
('MJ283', 32101, 'Manajemen Sumber Daya Manusia', 3),
('MJ294', 32101, 'Pemasaran', 2),
('MJ920', 32101, 'Manajemen Strategis', 2),
('PA038', 15201, 'Aqidah dan Akhlak', 3),
('PA893', 15201, 'Pendidikan Islam Kontemporer', 3),
('PG049', 15202, 'Metode Pembelajaran SD', 2),
('PG289', 15202, 'Teori Belajar', 2),
('PG495', 15202, 'Pengembangan Kurikulum SD', 3),
('PG729', 15202, 'Psikologi Pendidikan', 3),
('PG930', 15202, 'Evaluasi Pendidikan Anak', 3),
('PI629', 15201, 'Sejarah Pendidikan Agama Islam', 3),
('PI719', 15201, 'Masail Fiqhiyah', 2),
('PK273', 62103, 'Ekologi Perairan', 2),
('PK283', 62103, 'Teknologi Hasil Perikanan', 3),
('SI201', 59011, 'Pemrograman Visual', 3),
('SI202', 59011, 'Matematika Diskrit', 2),
('SI245', 59011, 'Manajemen Basis Data', 3),
('SI293', 59011, 'Analisis Sistem Informasi', 2),
('SI294', 59011, 'Keamanan Sistem Informasi', 3),
('SI308', 59011, 'Pengembangan Aplikasi Berbasis Web', 2),
('TS317', 24001, 'Geoteknik', 2),
('TS390', 24001, 'Struktur Bangunan', 3),
('TS837', 24001, 'Teknik Struktur', 3),
('TS839', 24001, 'Manajemen Proyek Konstruksi', 3),
('TS848', 24001, 'Teknik Transportasi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `npm` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_jurusan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`npm`, `nama`, `kode_jurusan`) VALUES
(17890986, 'Zayn Malik', 41001),
(20031154, 'Almaira', 32102),
(22024011, 'Cyntha Alma', 15201),
(22611045, 'Andini Putri', 32101),
(22621023, 'Azzahra Nurul Syafirah', 24001),
(22631007, 'Galaksi Aldebaran', 59011),
(22641001, 'Shariful Zaidin', 59012),
(22650038, 'Vino G Bastian', 62102),
(23896987, 'Fatur Putra', 62101),
(28059176, 'Rizkina Aulia', 24002);

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
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dns`
--
ALTER TABLE `tb_dns`
  MODIFY `id_dns` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `npm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280591768;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dns`
--
ALTER TABLE `tb_dns`
  ADD CONSTRAINT `tb_dns_ibfk1` FOREIGN KEY (`kode_mk`) REFERENCES `tb_matkul` (`kode_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_dns_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `tb_mhs` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD CONSTRAINT `tb_matkul_ibfk_1` FOREIGN KEY (`kode_jurusan`) REFERENCES `tb_jurusan` (`kode_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD CONSTRAINT `tb_mhs_ibfk_1` FOREIGN KEY (`kode_jurusan`) REFERENCES `tb_jurusan` (`kode_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
