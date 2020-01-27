-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 09:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja_praktik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bpjs_kesehatan` varchar(255) NOT NULL,
  `bpjs_ketenagakerjaan` varchar(255) NOT NULL,
  `skbs` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id_berkas`, `id_user`, `bpjs_kesehatan`, `bpjs_ketenagakerjaan`, `skbs`, `foto`) VALUES
(1, 4, '29_LAPORAN_7_1729042029_MUH_RIFKY_FAUZIH1.pdf', '29_1790420291.pdf', '29_LAPORAN_9_1729042029_MUH_RIFKY_FAUZIH1.pdf', '05-05-24-images1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengelompokan`
--

CREATE TABLE `tb_pengelompokan` (
  `id_kelompok` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengelompokan`
--

INSERT INTO `tb_pengelompokan` (`id_kelompok`, `id_user`, `no_surat`, `nama_peserta`, `gender`, `telepon`, `jurusan`, `status`, `tanggal_mulai`, `tanggal_akhir`) VALUES
(6, 3, '', 'Rifky Fauzih', 'Laki-laki', '082296200367', 'Pendidikan Teknik Elektro', 'Kerja Praktik', '2020-01-16', '2020-02-29'),
(7, 3, '', 'Devita Asthary', 'Perempuan', '08567867676', 'Pendidikan Teknik Elektro', 'Kerja Praktik', '2020-01-16', '2020-02-29'),
(8, 1, '', 'Asthary', 'Perempuan', '09393939393', 'Pendidikan Teknik Elektro', 'Kerja Praktik', '2020-01-16', '2020-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_permohonan`
--

CREATE TABLE `tb_surat_permohonan` (
  `id_surat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `date_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_permohonan`
--

INSERT INTO `tb_surat_permohonan` (`id_surat`, `id_user`, `filename`, `date_input`) VALUES
(3, 1, 'Permohonan_Izin_Praktik_Industri.pdf', '2020-01-20 00:29:01'),
(4, 3, 'Permohonan_Izin_Praktik_Industri1.pdf', '2020-01-20 00:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `email_institusi` varchar(128) NOT NULL,
  `telepon_institusi` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `profil_kampus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_institusi`, `email_institusi`, `telepon_institusi`, `status`, `password`, `level`, `is_active`, `alamat`, `pic`, `telepon`, `profil_kampus`) VALUES
(4, 'Universitas Negeri Makassar', 'rifkyfauzih1406@gmail.com', '0854233984', 'universitas', '25d55ad283aa400af464c76d713c07ad', 2, 1, 'jl.pendidikan', 'Rifky', '082296200367', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_tmp`
--

CREATE TABLE `user_tmp` (
  `id` int(11) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `email_institusi` varchar(128) NOT NULL,
  `telepon_institusi` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tb_pengelompokan`
--
ALTER TABLE `tb_pengelompokan`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `tb_surat_permohonan`
--
ALTER TABLE `tb_surat_permohonan`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_tmp`
--
ALTER TABLE `user_tmp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengelompokan`
--
ALTER TABLE `tb_pengelompokan`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_surat_permohonan`
--
ALTER TABLE `tb_surat_permohonan`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tmp`
--
ALTER TABLE `user_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
