-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 02:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `angka`
--

CREATE TABLE `angka` (
  `id` int(11) NOT NULL,
  `angka_kerja` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angka`
--

INSERT INTO `angka` (`id`, `angka_kerja`) VALUES
(1, '0'),
(2, '1'),
(3, '1.5'),
(4, '2.0'),
(5, '2.5'),
(6, '3.0'),
(7, '3.5'),
(8, '4.0'),
(9, '4.5'),
(10, '5.0'),
(11, '5.5'),
(12, '6.0'),
(13, '6.5'),
(14, '7.0'),
(15, '7.5');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_cor`
--

CREATE TABLE `gaji_cor` (
  `id_cor` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tonase` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `angsuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_cor`
--

INSERT INTO `gaji_cor` (`id_cor`, `id_karyawan`, `tonase`, `tanggal`, `angsuran`) VALUES
(4, 3, 21000, '2019-12-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pres`
--

CREATE TABLE `gaji_pres` (
  `id_pres` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jumlah_jadi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `biaya_cetak` int(11) NOT NULL,
  `upah` int(11) NOT NULL,
  `hari_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_pres`
--

INSERT INTO `gaji_pres` (`id_pres`, `id_karyawan`, `tanggal`, `id_barang`, `jumlah_jadi`, `berat`, `biaya_cetak`, `upah`, `hari_kerja`) VALUES
(18, 2, '2020-01-06', '2	', 5, 4, 4500, 90000, 12),
(19, 2, '2020-01-06', '1	', 7, 8, 40000, 2240000, 12),
(20, 1, '2020-01-23', '2	', 1, 2, 4500, 9000, 11),
(21, 1, '2020-01-23', '1	', 2, 1, 40000, 80000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `slip_gaji_harian`
--

CREATE TABLE `slip_gaji_harian` (
  `id_slip` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jk` varchar(11) NOT NULL,
  `l` varchar(11) NOT NULL,
  `absen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slip_gaji_harian`
--

INSERT INTO `slip_gaji_harian` (`id_slip`, `id_karyawan`, `tanggal`, `jk`, `l`, `absen`) VALUES
(231, 1, '2020-01-24', '3.0', '3.5', 'Hadir'),
(232, 2, '2020-01-24', '0', '7.5', 'Hadir'),
(233, 8, '2020-01-24', '0', '0', 'Tidak'),
(234, 1, '2020-01-23', '3.0', '1', 'Hadir'),
(235, 2, '2020-01-23', '7.5', '0', 'Hadir'),
(236, 8, '2020-01-23', '7.0', '6.0', 'Hadir'),
(237, 1, '2020-01-25', '6.5', '1.5', 'Hadir'),
(238, 2, '2020-01-25', '5.5', '4.5', 'Hadir'),
(239, 8, '2020-01-25', '7.0', '3.0', 'Hadir'),
(240, 1, '2020-01-26', '7.0', '1.5', 'Hadir'),
(241, 2, '2020-01-26', '6.0', '2.0', 'Hadir'),
(242, 8, '2020-01-26', '7.0', '3.0', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsur`
--

CREATE TABLE `tb_angsur` (
  `id_angsur` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jumlah_angsur` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_angsur`
--

INSERT INTO `tb_angsur` (`id_angsur`, `id_karyawan`, `jumlah_angsur`, `tanggal`) VALUES
(7, 1, 20000, '2019-12-03'),
(8, 3, 50000, '2019-12-09');

--
-- Triggers `tb_angsur`
--
DELIMITER $$
CREATE TRIGGER `update_hutang` AFTER INSERT ON `tb_angsur` FOR EACH ROW update tb_hutang set sisa_hutang=sisa_hutang-new.jumlah_angsur where id_karyawan=new.id_karyawan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` decimal(2,0) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `biaya_cetak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `berat`, `biaya_cetak`) VALUES
(1, '0', '50', 40000),
(2, '0', '1', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `gaji_perjam` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `gaji_perjam`, `uang_makan`, `lembur`, `id_karyawan`) VALUES
(1, 6850, 6000, 10270, 1),
(2, 5000, 5000, 6500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji_khusus`
--

CREATE TABLE `tb_gaji_khusus` (
  `id_khusus` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `besar_gaji` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji_khusus`
--

INSERT INTO `tb_gaji_khusus` (`id_khusus`, `id_karyawan`, `besar_gaji`, `tanggal`) VALUES
(1, 4, 500000, '2019-12-11'),
(2, 5, 650000, '2019-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hutang`
--

CREATE TABLE `tb_hutang` (
  `id_hutang` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jumlah_hutang` int(11) NOT NULL,
  `sisa_hutang` int(11) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hutang`
--

INSERT INTO `tb_hutang` (`id_hutang`, `id_karyawan`, `jumlah_hutang`, `sisa_hutang`, `angsuran`, `status`, `tanggal`) VALUES
(1, 1, 500000, 480000, 20000, 0, '2019-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(80) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `mulai_kerja` date NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `mulai_kerja`, `id_kategori`) VALUES
(1, 'Khoironi', 'Rembang', 'Rembang', '1996-05-01', '2019-11-30', 1),
(2, 'Aldi', 'Rembang', 'MALANG', '1996-10-01', '2019-12-05', 1),
(3, 'Gacor', 'Rembang', 'Rembang', '1991-12-03', '2018-12-01', 3),
(4, 'Dinda Bestaria', 'Jember', 'Jember', '1995-12-16', '2019-11-01', 4),
(5, 'Umar', 'Ngawi', 'Ngawi', '1991-02-12', '2019-12-04', 4),
(6, 'Pres', 'Jombang', 'rembang', '1997-12-04', '2019-09-11', 5),
(7, 'Pres2', 'Rembang', 'rembang', '1990-12-26', '2019-09-05', 5),
(8, 'Azalea Talitha Zahra Ariandi', 'Rembang', 'rembang', '2019-11-06', '2020-01-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Karyawan harian'),
(2, 'Karyawan Mingguan'),
(3, 'Karyawan Cor'),
(4, 'Karyawan Khusus'),
(5, 'Karyawan Pres/Cetak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_uangmakan`
--

CREATE TABLE `tb_uangmakan` (
  `id_makan` int(11) NOT NULL,
  `besar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uangmakan`
--

INSERT INTO `tb_uangmakan` (`id_makan`, `besar`) VALUES
(1, 6500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angka`
--
ALTER TABLE `angka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji_cor`
--
ALTER TABLE `gaji_cor`
  ADD PRIMARY KEY (`id_cor`);

--
-- Indexes for table `gaji_pres`
--
ALTER TABLE `gaji_pres`
  ADD PRIMARY KEY (`id_pres`);

--
-- Indexes for table `slip_gaji_harian`
--
ALTER TABLE `slip_gaji_harian`
  ADD PRIMARY KEY (`id_slip`);

--
-- Indexes for table `tb_angsur`
--
ALTER TABLE `tb_angsur`
  ADD PRIMARY KEY (`id_angsur`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_gaji_khusus`
--
ALTER TABLE `tb_gaji_khusus`
  ADD PRIMARY KEY (`id_khusus`);

--
-- Indexes for table `tb_hutang`
--
ALTER TABLE `tb_hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_uangmakan`
--
ALTER TABLE `tb_uangmakan`
  ADD PRIMARY KEY (`id_makan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angka`
--
ALTER TABLE `angka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gaji_cor`
--
ALTER TABLE `gaji_cor`
  MODIFY `id_cor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gaji_pres`
--
ALTER TABLE `gaji_pres`
  MODIFY `id_pres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slip_gaji_harian`
--
ALTER TABLE `slip_gaji_harian`
  MODIFY `id_slip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `tb_angsur`
--
ALTER TABLE `tb_angsur`
  MODIFY `id_angsur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_gaji_khusus`
--
ALTER TABLE `tb_gaji_khusus`
  MODIFY `id_khusus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_hutang`
--
ALTER TABLE `tb_hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_uangmakan`
--
ALTER TABLE `tb_uangmakan`
  MODIFY `id_makan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
