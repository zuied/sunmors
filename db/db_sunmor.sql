-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 02:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sunmor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akademi`
--

CREATE TABLE `tbl_akademi` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmplahir` varchar(125) NOT NULL,
  `tgllahir` date NOT NULL,
  `usia` int(10) NOT NULL,
  `jnskelamin` varchar(20) NOT NULL,
  `namaortu` varchar(125) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akademi`
--

INSERT INTO `tbl_akademi` (`nis`, `nama`, `tmplahir`, `tgllahir`, `usia`, `jnskelamin`, `namaortu`, `alamat`, `telpon`, `foto`) VALUES
('AKM001', 'Kayla Rigen', 'Banjarbaru Baru', '2011-02-08', 0, 'Perempuan', 'Bagas Saputra', 'Pramuka Banjarmasin', '089812213345', '872-Calista Destany.jpeg'),
('AKM004', 'Rudi', 'Banjarmasin', '2015-07-21', 0, 'Laki-Laki', 'Hendra', 'Kertak Baru', '087832134522', '648-1_20221105_120255_0000.png'),
('AKM005', 'Baddran', 'Barabai', '2016-10-15', 0, 'Laki-Laki', 'Anang', 'Pekauman', '0878990986675', 'default.png'),
('AKM006', 'Irham', 'Banjarmasin', '2019-02-27', 0, 'Laki-Laki', 'Danang', 'Teluk Dalam Banjarmsin', '0899717233455', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_capaian`
--

CREATE TABLE `tbl_capaian` (
  `id` int(10) NOT NULL,
  `namaevent` varchar(128) NOT NULL,
  `tmpevent` varchar(256) NOT NULL,
  `tglevent` date NOT NULL,
  `ikutserta` varchar(100) NOT NULL,
  `hasil` varchar(100) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_capaian`
--

INSERT INTO `tbl_capaian` (`id`, `namaevent`, `tmpevent`, `tglevent`, `ikutserta`, `hasil`, `foto`) VALUES
(7, 'Bergerak Cup 2023', 'Suria Arena ', '2023-01-31', 'Tim Utama', 'Runner Up', '947-1667293665178.png'),
(8, 'Kapolresta Cup 2023', 'Suria Hall', '2023-08-15', 'Tim Utama', 'Runner Up', '380-1639049360144.png'),
(9, 'Tapin  Cup 2021', 'Tapin Rantau', '2021-11-15', 'Tim KU40', 'JUARA', '73-866808f4-8312-4a26-a5c1-f740f0f4971e.jpg'),
(10, 'Banjarbaru Cup 2020', 'GOR Rudy Resnawan', '2020-07-22', 'Tim Utama', 'Runner Up', '295-WhatsApp Image 2022-11-12 at 12.14.26 PM.jpeg'),
(11, 'Gubernur CUP 2023', 'GOR Hasanuddin Banjarmasin', '2023-12-22', 'Tim Utama', 'Juara Pertama', 'default.png'),
(12, 'Borneo Youth Cup 2023', 'GOR Hasanuddin Banjarmasin', '2024-01-14', 'Tim KU10', 'Juara Ketiga', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelatih`
--

CREATE TABLE `tbl_pelatih` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `noktp` char(16) NOT NULL,
  `masaberlaku` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelatih`
--

INSERT INTO `tbl_pelatih` (`id`, `nip`, `nama`, `alamat`, `telpon`, `noktp`, `masaberlaku`, `foto`) VALUES
(1, '1020998887', 'Ozenk', 'Jalan Wanaraya', '087862617865', '6370001002001012', '2024-10-10', '15-ozenk.jpg'),
(2, '1020777887', 'Muh. Saduddin ', 'Jalan Dharma Praja', '087891927867', '6370109889000102', '2024-04-06', '823-dudin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemain`
--

CREATE TABLE `tbl_pemain` (
  `noa` char(6) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tglLahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `noktp` char(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pemain`
--

INSERT INTO `tbl_pemain` (`noa`, `nama`, `tglLahir`, `alamat`, `noktp`, `email`, `telpon`, `foto`) VALUES
('SMY001', 'Saddam Husien', '1981-03-05', 'Handil Bakti Alalak Utara', '370000100001020', 'saddamhusien@gmail.com', '0899877788889', '449-sadam.jpg'),
('SMY002', 'Ibrahim', '1985-06-04', 'Pelabuhan Trisakti', '370000000000000', 'ahim@gmail.com', '087788776665', '472-Ahim.jpg'),
('SMY009', 'Zulfauzan Lutfi', '1988-10-18', 'Manggis Raya', '6371010908770004', 'ozenk@gmail.com', '62812-7867-0098', '184-ozenk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sunmor`
--

CREATE TABLE `tbl_sunmor` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `visimisi` varchar(128) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sunmor`
--

INSERT INTO `tbl_sunmor` (`id`, `nama`, `alamat`, `telpon`, `email`, `status`, `visimisi`, `gambar`) VALUES
(1, 'Sunday Morning', 'Jl.Pangeran Hidayatullah', '087861627796', 'sunmor@gmail.com', 'Yayasan ', 'The Great Family', '50-bgLogin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `jabatan`, `alamat`, `foto`) VALUES
(3, 'admin', '$2y$10$VjFgiANvufdYpXaj2rLX6O8n8id7XHeE1Z6L0jY9izCVpBD0Jy5/C', 'Ibrahim', 'Kepsek', 'Teluk Dalam', '450-Ahim.jpg'),
(5, 'user', '$2y$10$f3GoRr5VMG/sZu7bZwgbzO/Qi1sbZ1QdjnZ408hEXgAgjlba..Jvu', 'Saddam husien', 'Pelatih', 'Handil Bakti', '507-sadam.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akademi`
--
ALTER TABLE `tbl_akademi`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_capaian`
--
ALTER TABLE `tbl_capaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelatih`
--
ALTER TABLE `tbl_pelatih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pemain`
--
ALTER TABLE `tbl_pemain`
  ADD PRIMARY KEY (`noa`);

--
-- Indexes for table `tbl_sunmor`
--
ALTER TABLE `tbl_sunmor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_capaian`
--
ALTER TABLE `tbl_capaian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pelatih`
--
ALTER TABLE `tbl_pelatih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sunmor`
--
ALTER TABLE `tbl_sunmor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
