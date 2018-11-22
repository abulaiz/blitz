-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2018 at 07:32 AM
-- Server version: 5.5.61-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blizt`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengiriman`
--

CREATE TABLE IF NOT EXISTS `detail_pengiriman` (
  `id_pengiriman` varchar(20) DEFAULT NULL,
  `deskripsi_barang` varchar(40) DEFAULT NULL,
  `berat_benda` decimal(5,2) DEFAULT NULL,
  `alamat_penerima` varchar(40) DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  UNIQUE KEY `id_pengiriman` (`id_pengiriman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jarak_kantor_cabang`
--

CREATE TABLE IF NOT EXISTS `jarak_kantor_cabang` (
  `kode_asal` char(6) DEFAULT NULL,
  `kode_tujuan` char(6) DEFAULT NULL,
  `jarak` int(11) DEFAULT NULL,
  KEY `kode_asal` (`kode_asal`),
  KEY `kode_tujuan` (`kode_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jarak_kantor_cabang`
--

INSERT INTO `jarak_kantor_cabang` (`kode_asal`, `kode_tujuan`, `jarak`) VALUES
('400101', '400102', 5),
('400101', '400103', 4),
('400101', '400201', 10),
('400101', '400202', 12),
('400101', '400203', 15),
('400101', '400301', 47),
('400101', '400302', 40),
('400101', '400303', 42),
('400102', '400101', 5),
('400102', '400103', 4),
('400102', '400201', 19),
('400102', '400202', 24),
('400102', '400203', 32),
('400102', '400301', 42),
('400102', '400302', 40),
('400102', '400303', 35),
('400103', '400101', 3),
('400103', '400102', 4),
('400103', '400201', 20),
('400103', '400202', 17),
('400103', '400203', 18),
('400103', '400301', 30),
('400103', '400302', 32),
('400103', '400303', 45),
('400201', '400101', 18),
('400201', '400102', 15),
('400201', '400103', 20),
('400201', '400202', 3),
('400201', '400203', 4),
('400201', '400301', 15),
('400201', '400302', 15),
('400201', '400303', 15),
('400202', '400101', 17),
('400202', '400102', 17),
('400202', '400103', 17),
('400202', '400201', 3),
('400202', '400203', 4),
('400202', '400301', 21),
('400202', '400302', 24),
('400202', '400303', 26),
('400203', '400101', 14),
('400203', '400102', 14),
('400203', '400103', 14),
('400203', '400201', 3),
('400203', '400202', 4),
('400203', '400301', 21),
('400203', '400302', 21),
('400203', '400303', 21),
('400301', '400101', 40),
('400301', '400102', 40),
('400301', '400103', 40),
('400301', '400201', 20),
('400301', '400202', 20),
('400301', '400203', 20),
('400301', '400302', 2),
('400301', '400303', 2),
('400302', '400101', 40),
('400302', '400102', 40),
('400302', '400103', 40),
('400302', '400201', 20),
('400302', '400202', 20),
('400302', '400203', 20),
('400302', '400301', 3),
('400302', '400303', 3),
('400303', '400101', 40),
('400303', '400102', 40),
('400303', '400103', 40),
('400303', '400201', 20),
('400303', '400202', 20),
('400303', '400203', 20),
('400303', '400301', 3),
('400303', '400302', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kantor_cabang`
--

CREATE TABLE IF NOT EXISTS `kantor_cabang` (
  `kode` char(6) NOT NULL,
  `nama_kecamatan` varchar(50) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode`),
  KEY `id_kota` (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kantor_cabang`
--

INSERT INTO `kantor_cabang` (`kode`, `nama_kecamatan`, `id_kota`) VALUES
('400101', 'Cibadak', 1),
('400102', 'Cipaganti', 1),
('400103', 'Pasteur', 1),
('400201', 'Tembalang', 2),
('400202', 'Gunung Pati', 2),
('400203', 'Mijen', 2),
('400301', 'Asemrowo', 3),
('400302', 'Benowo', 3),
('400303', 'Bubutan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(30) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_provinsi` (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `id_provinsi`) VALUES
(1, 'Bandung', 1),
(2, 'Semarang', 2),
(3, 'Surabaya', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE IF NOT EXISTS `pengirim` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `nama` varchar(30) DEFAULT NULL,
  `kontak` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`id`, `nama`, `kontak`) VALUES
('12123124', 'Jono', 'jono@jono'),
('16111067', 'Imron', 'ronabulaiz@gmail.com'),
('1749128408', 'Ahmad', 'ahmad@gmail.com'),
('79137791', 'Coba', 'lagilagi@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `id_pengirim` varchar(30) NOT NULL,
  `kode_asal` char(6) NOT NULL,
  `kode_tujuan` char(6) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `tanggal` varchar(131) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `kode_asal` (`kode_asal`),
  KEY `kode_tujuan` (`kode_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
(1, 'Jawa Barat'),
(2, 'Jawa Tengah'),
(3, 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `parameter`, `harga`) VALUES
(1, 'jarak', 6000),
(2, 'berat', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `token` char(3) DEFAULT NULL,
  `kode_kantor_cabang` char(6) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `kode_kantor_cabang` (`kode_kantor_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `token`, `kode_kantor_cabang`) VALUES
('user-400101', '9JDFNRa', '23u', '400101'),
('user-400102', 'q3b1ceBTW', '88I', '400102'),
('user-400103', 'qH27Qls', 'JJz', '400103'),
('user-400201', 'iyHzDVThn', 'AB0', '400201'),
('user-400202', '1eDiLgzdcfu', 'Lli', '400202'),
('user-400203', 'gbH0R', 'Xys', '400203'),
('user-400301', 'naQ9imDG', 'BCH', '400301'),
('user-400302', 'YwGKQW', 'bcl', '400302'),
('user-400303', '41Rmzw2', 'sk3', '400303');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD CONSTRAINT `detail_pengiriman_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jarak_kantor_cabang`
--
ALTER TABLE `jarak_kantor_cabang`
  ADD CONSTRAINT `jarak_kantor_cabang_ibfk_1` FOREIGN KEY (`kode_asal`) REFERENCES `kantor_cabang` (`kode`),
  ADD CONSTRAINT `jarak_kantor_cabang_ibfk_2` FOREIGN KEY (`kode_tujuan`) REFERENCES `kantor_cabang` (`kode`);

--
-- Constraints for table `kantor_cabang`
--
ALTER TABLE `kantor_cabang`
  ADD CONSTRAINT `kantor_cabang_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirim` (`id`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`kode_asal`) REFERENCES `kantor_cabang` (`kode`),
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`kode_tujuan`) REFERENCES `kantor_cabang` (`kode`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kode_kantor_cabang`) REFERENCES `kantor_cabang` (`kode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
