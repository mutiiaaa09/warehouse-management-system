-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 05:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudangkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `KodeBarang` varchar(30) NOT NULL,
  `NamaBarang` varchar(50) NOT NULL,
  `JumlahStok` double(15,2) DEFAULT NULL,
  `Harga` double(15,2) DEFAULT NULL,
  `Satuan` varchar(15) NOT NULL,
  `TglAuditTerakhir` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`KodeBarang`, `NamaBarang`, `JumlahStok`, `Harga`, `Satuan`, `TglAuditTerakhir`) VALUES
('1', 'Samsung S23 Ultra', 110.00, 2000000.00, 'Rupiah', '2023-12-30 00:00:00'),
('2', 'Kemeja Flanel Pria', 102.00, 70000.00, 'Rupiah', '2023-12-24 00:00:00'),
('3', 'Honda Scoopy', 14.00, 22980000.00, 'Rupiah', '2023-12-25 00:00:00'),
('4', 'Hoody', 30.00, 80.00, 'Rupiah', '2023-12-28 00:00:00'),
('5', 'Jaket Parasut', 70.00, 100000.00, 'Rupiah', '2023-12-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `barangdigudang`
--

CREATE TABLE `barangdigudang` (
  `IdTransaksi` int(11) NOT NULL,
  `WaktuTransaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `StatusTransaksi` enum('Masuk','Keluar') NOT NULL,
  `Jumlah` double(15,2) DEFAULT NULL,
  `Keterangan` text DEFAULT NULL,
  `KodeGudang` int(11) NOT NULL,
  `KodeBarang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangdigudang`
--

INSERT INTO `barangdigudang` (`IdTransaksi`, `WaktuTransaksi`, `StatusTransaksi`, `Jumlah`, `Keterangan`, `KodeGudang`, `KodeBarang`) VALUES
(1, '2023-12-24 00:00:00', 'Masuk', 2.00, 'Untuk pakaian pergi kekampus', 1, '2'),
(2, '2023-12-27 00:00:00', 'Masuk', 12.00, 'Honda Cub Super Nyaman', 3, '3'),
(3, '2023-12-30 00:00:00', 'Keluar', 12.00, 'Dibeli Oleh Intan CELL', 1, '1'),
(4, '2023-12-30 00:00:00', 'Keluar', 80.00, 'Di Pesan Oleh Kurnia CELL', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `KodeGudang` int(11) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`KodeGudang`, `Alamat`) VALUES
(1, 'Kelurahan Kandang Mas, Rt. 021, Rw. 005 '),
(2, 'Simpang Skip, Kota Bengkulu'),
(3, 'Lingkar Barat'),
(4, 'Jl. Simpang Brimop kel. Kandang Mas Rt.70'),
(10, 'Jl. Simpang Skip');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_login` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Operator','Umum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_login`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(1, 'M_Fauzi', 'Muhammad Ikhwan Fauzi', 'e8c9face66978a1ae56f3b7380e5c8bf', 'Admin'),
(2, 'M_Iqbal', 'Muhammad Iqbal', 'b160f903928e387b5f017038d5246db8', 'Operator'),
(3, 'Kurnia', 'Kurnia Marga', 'ef965bf91d0f807317cf4e98f25b821d', 'Umum'),
(4, 'Bapak_Dosen', 'Bapak Harry Witriyono', '0bb44ea084d166dc194a6cd0e2ba24dd', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `barangdigudang`
--
ALTER TABLE `barangdigudang`
  ADD PRIMARY KEY (`IdTransaksi`),
  ADD KEY `KodeGudang` (`KodeGudang`),
  ADD KEY `KodeBarang` (`KodeBarang`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`KodeGudang`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangdigudang`
--
ALTER TABLE `barangdigudang`
  MODIFY `IdTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `KodeGudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangdigudang`
--
ALTER TABLE `barangdigudang`
  ADD CONSTRAINT `barangdigudang_ibfk_1` FOREIGN KEY (`KodeGudang`) REFERENCES `gudang` (`KodeGudang`),
  ADD CONSTRAINT `barangdigudang_ibfk_2` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
