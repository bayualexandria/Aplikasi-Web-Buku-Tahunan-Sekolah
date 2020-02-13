-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 04:41 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azharku-media`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `nama_company` varchar(50) NOT NULL,
  `no_telp_company` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `logo_company` varchar(50) NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `nama_company`, `no_telp_company`, `alamat`, `logo_company`, `date_updated`) VALUES
(1, 'CV. AZHARKU MEDIA', '0981-27246 (Wa:081316146399)', 'Semarang', 'azhar.png', 1570012952);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mess` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `date_send` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `images` varchar(100) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `name`, `alamat`, `no_hp`, `images`, `email_pelanggan`, `password`, `role_id`, `is_active`) VALUES
(5, 'Pandu Setiawan', 'Jl. Samuel No. 50, Dolog. Kel. Mandala. Kab. Biak Numfor. Biak-Papua', '082238166972', 'BD0CE3DE-07DE-43A9-B0ED-7092D8C7CE53.jpg', 'pandu@gmail.com', '$2y$10$2cHeMiW9PKb1yJFT8vNbEurDc0zSAF/np7W5tbCkvIe2/s2n0qCUG', 2, 1),
(7, 'Bayu Wardana', 'Jln. Samuel no.50, Dolog. Kel. Mandala. Kab. Biak Kota. Prov. Biak Numfor. Biak-Papua', '081316146399', 'IMG_20180122_160025_5322.jpg', 'wardanabayu455@gmail.com', '$2y$10$4BqbD2s.ju9kn1fgGg3YR.jVKoyQCdgOQpyAhSLE2KXrunx0AWtrK', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bahan`
--

CREATE TABLE `tbl_bahan` (
  `id` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `bahan_kertas` varchar(50) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `halaman` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `finishing` varchar(100) NOT NULL,
  `cetakan` varchar(100) NOT NULL,
  `dokFile` varchar(100) NOT NULL,
  `pemesanan` varchar(100) NOT NULL,
  `bonus` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `bg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bahan`
--

INSERT INTO `tbl_bahan` (`id`, `id_katalog`, `bahan_kertas`, `ukuran`, `halaman`, `cover`, `finishing`, `cetakan`, `dokFile`, `pemesanan`, `bonus`, `harga`, `bg`) VALUES
(1, 2, 'Ivony Art Carton 210 gr', '16 cm x 21.5 cm', '80 Halaman', 'Hard Cover Doff', 'Jahit Hot Bending', 'Full Color', 'CD', 'Sejumlah Siswa Akhir', '15 Katalog untuk sekolah', 150000, ''),
(2, 2, 'Ivony Art Carton 190 gr', '16 cm x 21.5 cm', '80 Halaman', 'Hard Cover Doff', 'Jahit Hot Bending', 'Full Color', 'CD', 'Sejumlah Siswa Akhir', '15 Katalog untuk sekolah', 140000, 'starred'),
(3, 2, 'CTS Art Paper 150 gr', '21.5 cm x30 cm', '80 Halaman', 'Hard Cover Doff', 'Jahit Hot Bending', 'Full Color', 'CD', 'Sejumlah Siswa Akhir', '15 Katalog untuk sekolah', 125000, 'prem'),
(4, 1, 'Ivony Art Carton 210 gr', '21.5 cm x 30 cm', '80 Halaman', 'Hard Cover Doff', 'Jahit Hot Bending', 'Full Color', 'CD', 'Sejumlah Siswa Akhir', '15 Katalog untuk sekolah', 180000, ''),
(5, 1, 'Ivony Art Carton 190 gr', '21.5 cm x30 cm', '80 Halaman', 'Hard Cover Doff', 'Jahit Hot Bending', 'Full Color', 'CD', 'Sejumlah Siswa Akhir', '15 Katalog untuk sekolah', 170000, 'starred'),
(6, 1, 'CTS Art Paper 150 gr', '21.5 cm x 30 cm', '80 Halaman', 'Hard Cover Doff', 'Jahit Hot Bending', 'Full Color', 'CD', 'Sejumlah Siswa Akhir', '15 Katalog untuk sekolah', 160000, 'prem'),
(8, 1, 'olinol', 'uiyiuy', '80 halaman', 'uiy', 'iuy', 'iu', 'yi', 'Sejumlah Siswa Akhir', '15 Katalog untuk sekolah', 120000, 'starred');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_katalog`
--

CREATE TABLE `tbl_katalog` (
  `id` int(11) NOT NULL,
  `jenis_katalog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_katalog`
--

INSERT INTO `tbl_katalog` (`id`, `jenis_katalog`) VALUES
(1, 'Katalog Besar'),
(2, 'Katalog Kecil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_katalog` int(5) DEFAULT NULL,
  `id_bahan` int(5) DEFAULT NULL,
  `jumlah_katalog` int(11) NOT NULL,
  `total` int(50) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id`, `nama_pelanggan`, `id_pelanggan`, `id_katalog`, `id_bahan`, `jumlah_katalog`, `total`, `id_status`, `date_created`, `date_updated`) VALUES
(29, 'Pandu Setiawan', 5, 2, 3, 2, 250000, 2, 1581590155, NULL),
(43, 'Bayu Wardana', 7, 2, 2, 1, 150000, 4, 1581576061, NULL),
(44, 'Bayu Wardana', 7, 2, 3, 2, 250000, 1, 1581576597, NULL),
(45, 'Bayu Wardana', 7, 2, 1, 1, 150000, 2, 1581577490, NULL),
(46, 'Pandu Setiawan', 5, 1, 5, 4, 680000, 2, 1581590116, NULL),
(47, 'Bayu Wardana', 7, 2, 3, 3, 375000, 5, 1581603116, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `konfirmasi` varchar(50) NOT NULL,
  `style` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `konfirmasi`, `style`) VALUES
(1, 'Batal', 'danger'),
(2, 'Selesai', 'success'),
(3, 'Tahap Penyelesaian 50 %', 'warning'),
(4, 'Proses', 'primary'),
(5, 'order', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `images` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `images`, `username`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(27, 'Bayu Wardana', 'IMG_20180122_160025_5321.jpg', 'Admin', 'wardanabayu55@gmail.com', '$2y$10$btkaQ673w5pVjsrwEblkmuGHP.VCbPZnfVuQy71VXwJiC6HOjfrpK', 1, 1, 1568073273);

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
