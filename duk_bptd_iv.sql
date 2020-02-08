-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2020 at 05:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duk_bptd_iv`
--

-- --------------------------------------------------------

--
-- Table structure for table `diklat_pegawai`
--

CREATE TABLE `diklat_pegawai` (
  `id_diklat` int(11) NOT NULL,
  `NIP` varchar(19) NOT NULL,
  `nama_diklat` varchar(250) NOT NULL,
  `tahun` year(4) NOT NULL,
  `durasi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(2) NOT NULL,
  `pangkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`, `pangkat`) VALUES
(1, '4b', 'Pembina Tingkat I'),
(2, '4a', 'Pembina'),
(3, '3d', 'Penata Tingkat I'),
(4, '3a', 'Penata Muda'),
(5, '3b', 'Penata Tua'),
(6, '3c', 'Penata Rambut'),
(7, '7a', 'Penata Rumah'),
(8, '8d', 'Pembantu'),
(9, '9A', 'Putih');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1552668272),
('m130524_201442_init', 1552668275);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(19) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `sk_jabatan` varchar(250) NOT NULL,
  `tgl_sk_jabatan` date NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `tmt_cpns` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `catatan_mutasi` varchar(250) NOT NULL,
  `keterangan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama`, `id_golongan`, `tmt_pangkat`, `jabatan`, `sk_jabatan`, `tgl_sk_jabatan`, `tmt_jabatan`, `tmt_cpns`, `tempat_lahir`, `tanggal_lahir`, `catatan_mutasi`, `keterangan`) VALUES
('11551102935', 'Mahardika Kharisma Adjie', 1, '2019-03-03', 'Kepala Balai', 'SK. Menteri Perhubungan No. 10', '2019-03-05', '2019-03-06', '2019-01-01', 'Bandung', '2018-08-16', 'Pindahan dari BPTD IX', 'E. 209FT1'),
('1551102935', 'Mahardika', 2, '2007-03-14', 'Kepala Bidang IT', 'SK. Menteri Perhubungan No.9', '2008-03-07', '2008-03-08', '2008-03-01', 'Bandung', '1997-08-16', 'Fresh Graduate', 'Competent');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(12) NOT NULL,
  `password` varchar(80) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `authority` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `auth_key`, `authority`) VALUES
('admin', '$2y$10$cyjxxJGcuFZ4zn7x3xF3aOdzzqY4r.qa3NPwnTbJnScczB4PQtiLK', '', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan_pegawai`
--

CREATE TABLE `riwayat_pendidikan_pegawai` (
  `id_riwayat_pendidikan` int(11) NOT NULL,
  `NIP` varchar(19) NOT NULL,
  `tingkat_pendidikan` varchar(8) NOT NULL,
  `tempat_pendidikan` varchar(120) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `kabupaten/kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diklat_pegawai`
--
ALTER TABLE `diklat_pegawai`
  ADD PRIMARY KEY (`id_diklat`),
  ADD KEY `fk2` (`NIP`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `fk1` (`id_golongan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `riwayat_pendidikan_pegawai`
--
ALTER TABLE `riwayat_pendidikan_pegawai`
  ADD PRIMARY KEY (`id_riwayat_pendidikan`),
  ADD KEY `fk3` (`NIP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diklat_pegawai`
--
ALTER TABLE `diklat_pegawai`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pendidikan_pegawai`
--
ALTER TABLE `riwayat_pendidikan_pegawai`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
