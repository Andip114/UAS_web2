-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 08:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kependudukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'andi', 'andi123'),
(2, 'hera', 'hera123');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelahiran`
--

CREATE TABLE `data_kelahiran` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_kelahiran` varchar(12) NOT NULL,
  `hari_lahir` varchar(6) NOT NULL,
  `tempat_lahir` varchar(12) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `ayah` varchar(25) NOT NULL,
  `ibu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelahiran`
--

INSERT INTO `data_kelahiran` (`id`, `nama`, `tempat_kelahiran`, `hari_lahir`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `ayah`, `ibu`) VALUES
(2, 'Hera', 'Rumah Sakit', 'Sabtu', 'Tegal', '2019-09-23', 'LAKI-LAKI', 'Bambang', 'Sri');

-- --------------------------------------------------------

--
-- Table structure for table `data_kematian`
--

CREATE TABLE `data_kematian` (
  `id` int(11) NOT NULL,
  `NIK` char(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `dusun` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `hari_meninggal` varchar(6) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(10) NOT NULL,
  `sebab_meninggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kematian`
--

INSERT INTO `data_kematian` (`id`, `NIK`, `nama`, `umur`, `dusun`, `alamat`, `jenis_kelamin`, `hari_meninggal`, `tanggal_meninggal`, `tempat_meninggal`, `sebab_meninggal`) VALUES
(2, '3322399900', 'Hera', '80', 'Margana', 'Tegal', 'LAKI-LAKI', 'Rabu', '2012-12-02', 'Rumah', 'Bunuh Diri');

-- --------------------------------------------------------

--
-- Table structure for table `data_pendatang`
--

CREATE TABLE `data_pendatang` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pendatang`
--

INSERT INTO `data_pendatang` (`id`, `nama`, `tanggal_datang`, `alamat_asal`, `alamat_tujuan`, `keterangan`) VALUES
(3, 'Hera', '2019-09-23', 'Tegal', 'Bandung', 'Berkerja');

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int(11) NOT NULL,
  `NIK` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `dusun` varchar(15) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `status_perkawinan` varchar(11) NOT NULL,
  `pekerjaan` varchar(12) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(8) NOT NULL,
  `pendidikan` varchar(12) NOT NULL,
  `ibu` varchar(25) NOT NULL,
  `ayah` varchar(25) NOT NULL,
  `no_kk` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `NIK`, `nama`, `alamat`, `dusun`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_perkawinan`, `pekerjaan`, `gol_darah`, `agama`, `pendidikan`, `ibu`, `ayah`, `no_kk`) VALUES
(5, '3322399900', 'Hera', 'Tegal', 'Margana', 'Tegal', '2000-09-19', 'LAKI-LAKI', 'Belum Kawin', 'Mahasiswa', 'AB', 'Islam', 'SMA', 'Bae', 'Mbuh', '332121');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `Tempat Lahir` varchar(15) NOT NULL,
  `tanggal lahir` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ulang password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `alamat`, `Tempat Lahir`, `tanggal lahir`, `email`, `password`, `ulang password`) VALUES
(1, 'Andi Purwanto', 'andip', 'Desa Lembarawa RT 3 RW 1', 'Brebes', '1998-05-03', 'andi@gmail.com', 'andi123', 'andi123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kematian`
--
ALTER TABLE `data_kematian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pendatang`
--
ALTER TABLE `data_pendatang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kematian`
--
ALTER TABLE `data_kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_pendatang`
--
ALTER TABLE `data_pendatang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
