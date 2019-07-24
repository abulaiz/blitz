-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2019 at 10:30 AM
-- Server version: 8.0.16
-- PHP Version: 7.3.5-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blizt`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `id_pengiriman` varchar(20) DEFAULT NULL,
  `deskripsi_barang` varchar(40) DEFAULT NULL,
  `berat_benda` decimal(5,2) DEFAULT NULL,
  `alamat_penerima` varchar(40) DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`id_pengiriman`, `deskripsi_barang`, `berat_benda`, `alamat_penerima`, `nama_penerima`, `harga`) VALUES
('134159E2A495-61AE5', 'yCunkpc', '5.00', 'xZboh!joj', 'xLbmp', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `jarak_kantor_cabang`
--

CREATE TABLE `jarak_kantor_cabang` (
  `kode_asal` char(6) DEFAULT NULL,
  `kode_tujuan` char(6) DEFAULT NULL,
  `jarak` int(11) DEFAULT NULL
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

CREATE TABLE `kantor_cabang` (
  `kode` char(6) NOT NULL,
  `nama_kecamatan` varchar(50) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kantor_cabang`
--

INSERT INTO `kantor_cabang` (`kode`, `nama_kecamatan`, `id_kota`) VALUES
('400101', 'xDjcbebl', 1),
('400102', 'xDjqbhbouj', 1),
('400103', 'xQbtufvs', 1),
('400201', 'zWhpedodqj', 2),
('400202', 'zJxqxqj#Sdwl', 2),
('400203', 'zPlmhq', 2),
('400301', 'yCugotqyq', 3),
('400302', 'yDgpqyq', 3),
('400303', 'yDwdwvcp', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(30) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `id_provinsi`) VALUES
(1, 'yDcpfwpi', 1),
(2, 'xTfnbsboh', 2),
(3, 'zVxuded|d', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `nama` varchar(30) DEFAULT NULL,
  `kontak` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`id`, `nama`, `kontak`) VALUES
('12123124', 'Jono', 'jono@jono'),
('142112421', 'John Snow', '+32141212'),
('16111067', 'Imron', 'ronabulaiz@gmail.com'),
('1749128408', 'Ahmad', 'ahmad@gmail.com'),
('1753153', 'fHK', '923772'),
('5235797879', 'Dare Mo I', '8537092735'),
('70979807798', 'Udhin', '98908098'),
('758092780', 'Siapa', '8023950325'),
('79137791', 'Coba', 'lagilagi@example.com'),
('797987', 'Apa', '214214124'),
('7979879', 'yKotqp', 'zDex'),
('80988', 'zEdux', 'xJnspo'),
('877087097', 'Subaru', '70989709'),
('98797987', 'Satu Lagi', '9741987214124');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `id_pengirim` varchar(30) NOT NULL,
  `kode_asal` char(6) NOT NULL,
  `kode_tujuan` char(6) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `tanggal` varchar(131) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `id_pengirim`, `kode_asal`, `kode_tujuan`, `status`, `tanggal`) VALUES
('134159E2A495-61AE5', '80988', '400101', '400102', '1', '{"1":"2019-06-22 17:32:05","2":null,"3":null,"4":null,"5":null}');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
(1, 'xKbxb!Cbsbu'),
(2, 'yLcyc"Vgpicj'),
(3, 'xKbxb!Ujnvs');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `parameter` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password_key` smallint(6) NOT NULL,
  `kode_kantor_cabang` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `password_key`, `kode_kantor_cabang`) VALUES
('user-400101', '178x198x179x172x175x178x200x226', 3, '400101'),
('user-400102', '291x297x280x249x247x241x262x284x297x339', 4, '400102'),
('user-400103', '265x252x250x241x226x252x269x300', 5, '400103'),
('user-400201', '252x245x235x212x205x216x211x236x247x283', 3, '400201'),
('user-400202', '545x531x476x447x416x397x326x386x427x482x519x589', 6, '400202'),
('user-400203', '165x177x170x165x182x203', 4, '400203'),
('user-400301', '249x271x237x233x234x235x255x267x299', 4, '400301'),
('user-400302', '153x173x173x171x182x183x202', 3, '400302'),
('user-400303', '214x241x206x217x216x205x234x263', 4, '400303');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD UNIQUE KEY `id_pengiriman` (`id_pengiriman`);

--
-- Indexes for table `jarak_kantor_cabang`
--
ALTER TABLE `jarak_kantor_cabang`
  ADD KEY `kode_asal` (`kode_asal`),
  ADD KEY `kode_tujuan` (`kode_tujuan`);

--
-- Indexes for table `kantor_cabang`
--
ALTER TABLE `kantor_cabang`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `kode_asal` (`kode_asal`),
  ADD KEY `kode_tujuan` (`kode_tujuan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `kode_kantor_cabang` (`kode_kantor_cabang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
