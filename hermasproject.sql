-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 01:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hermasproject2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id`, `nama`, `username`, `password`, `email`, `no_hp`, `alamat`, `catatan`, `image`, `role`) VALUES
(1, 'Hermas Bintang', 'admin', '$2y$10$I2gQA7/0MUSM527ZBFyNnuMYZ2HOzKQUBzOnPf98./GNftzZk6rme', 'hermasbintang@gmail.com', '085852484937', 'Krembung', 'Pemiliki', '144Screenshot_3.png', 'Admin'),
(4, 'Mbak Santi', 'santi', '$2y$10$HmFKgBHLg7Z1mdfqu3Jmd.Vl3MjGRQSHOQqlLAl8dm2v7F.4U0/Xy', 'santi@gmail.com', '081283830619', 'Krembung', 'Setrika', '875Screenshot_3.png', 'Karyawan'),
(5, 'Mbak Sumiati', 'sumiati', '$2y$10$nWonKXwo4rwU1/H8aYNTk.wZ46EfDfdUQxluXKRBhDyatdCaSjvG2', 'sumiati@gmail.com', '085852484937', 'Lemujut', 'Setrika', '979Screenshot_3.png', 'Karyawan'),
(9, 'Fajar', 'fajar1', '$2y$10$dhhAh2KBZ8dRPn.4gTC0tOZJZlOIlxBXTgipH5wIxCT9urUF.BjeK', 'h@gmail.com', '081283830611', 'OKe', 'Karyawan', '883Screenshot_3.png', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id` varchar(10) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga_kilo` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id`, `paket`, `harga_kilo`, `deskripsi`) VALUES
('PKT001', 'Cuci Kering', 4000, 'Cuci, Kering, Selesai\r\n'),
('PKT002', 'Cuci Basah', 3000, 'Cuci, Selesai'),
('PKT003', 'Cuci Setrika', 6000, 'Cuci, Kering, Setrika, Selesai'),
('PKT004', 'Setrika', 4000, 'Kalau malas setrika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id` int(11) NOT NULL,
  `karyawan` int(11) NOT NULL,
  `transaksi` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id`, `karyawan`, `transaksi`, `status`) VALUES
(9, 4, 'TRS002', 1),
(10, 5, 'TRS003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id`, `nama`, `alamat`, `no_hp`) VALUES
('PLG001', 'Hermas', 'Krembung', ''),
('PLG002', 'Hermas', 'Sidotopo', ''),
('PLG003', 'Kizuna', 'Krembung', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `nama_status`) VALUES
(4, 'Proses Pencucian'),
(1, 'Selesai'),
(3, 'Selesai Satu Kantong'),
(2, 'Selesai Separuh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `kd_paket` varchar(10) NOT NULL,
  `qty` decimal(5,2) NOT NULL,
  `biaya` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `tanggal`, `id_pelanggan`, `kd_paket`, `qty`, `biaya`, `bayar`, `kembalian`) VALUES
('TRS001', '05 Jun 2023', 'PLG001', 'PKT003', '12.90', 77400, 0, -77400),
('TRS002', '21 Jun 2023', 'PLG002', 'PKT002', '45.30', 135900, 0, -135900),
('TRS003', '06 Jul 2023', 'PLG003', 'PKT001', '53.20', 212800, 225000, 12200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pegawai` (`karyawan`),
  ADD KEY `FK__pekerjaan` (`transaksi`),
  ADD KEY `Fk_status` (`status`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `nama_status` (`nama_status`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `kd_paket` (`kd_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD CONSTRAINT `FK__pekerjaan` FOREIGN KEY (`transaksi`) REFERENCES `tbl_transaksi` (`id`),
  ADD CONSTRAINT `FK_pegawai` FOREIGN KEY (`karyawan`) REFERENCES `tbl_karyawan` (`id`),
  ADD CONSTRAINT `Fk_status` FOREIGN KEY (`status`) REFERENCES `tbl_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
