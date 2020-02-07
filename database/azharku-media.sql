-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 09:42 AM
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

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `mess`, `logo`, `date_send`) VALUES
(26, 'Pandu Setiawan', 'pandu@gmail.com', 'Hayyyy', 'BD0CE3DE-07DE-43A9-B0ED-7092D8C7CE53.jpg', 1568721575),
(27, 'Pandu Setiawan', 'pandu@gmail.com', 'Gmn', 'BD0CE3DE-07DE-43A9-B0ED-7092D8C7CE53.jpg', 1568721621),
(28, 'Bayu Wardana', 'wardanabayu455@gmail.com', 'Bye', 'IMG_20171119_200237_4411.jpg', 1568721645),
(29, 'Bayu Wardana', 'wardanabayu455@gmail.com', '', 'coding.png', 1581052479),
(30, 'Bayu Wardana', 'wardanabayu455@gmail.com', '', 'coding.png', 1581052707),
(31, 'Bayu Wardana', 'wardanabayu455@gmail.com', 'hayaaa', 'coding.png', 1581052899);

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
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `name`, `alamat`, `no_hp`, `images`, `email_pelanggan`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Pandu Setiawan', 'Jl. Samuel No. 50, Dolog. Kel. Mandala. Kab. Biak Numfor. Biak-Papua', '082238166972', 'BD0CE3DE-07DE-43A9-B0ED-7092D8C7CE53.jpg', 'pandu@gmail.com', '$2y$10$2cHeMiW9PKb1yJFT8vNbEurDc0zSAF/np7W5tbCkvIe2/s2n0qCUG', 2, 1, 1568210933),
(7, 'Bayu Wardana', 'Jln. Samuel no.50, Dolog. Kel. Mandala. Kab. Biak Kota. Prov. Biak Numfor. Biak-Papua', '081316146399', 'coding.png', 'wardanabayu455@gmail.com', '$2y$10$4BqbD2s.ju9kn1fgGg3YR.jVKoyQCdgOQpyAhSLE2KXrunx0AWtrK', 2, 1, 1580957398);

-- --------------------------------------------------------

--
-- Table structure for table `produck`
--

CREATE TABLE `produck` (
  `id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `pages` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `cetak` varchar(100) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `cover` varchar(256) NOT NULL,
  `bg_produck` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produck`
--

INSERT INTO `produck` (`id`, `price`, `pages`, `image`, `ukuran`, `cetak`, `bahan`, `cover`, `bg_produck`) VALUES
(1, '150000', 80, '', 'Ukuran A4 (21cm x 29.7cm)', 'Cetak 4/4 Full Color', 'Bahan kertas isi Art Paper 150 gsm', 'Hardcover Carton 30A + Art carton 190 gsm, laminasi doff/glossy', ''),
(2, '200000', 120, '', 'Ukuran B4 (25cm x 35.3cm)', 'Cetak 8/8 Full Color', 'Bahan kertas isi Art Paper 150 gsm', 'Hardcover Carton 30A + Art carton 190 gsm, laminasi doff/glossy', 'starred'),
(3, '300000', 210, '', 'Ukuran B5 (17.6cm x 25cm)', 'Cetak 4/4 Full Color', 'Bahan kertas isi Art Paper 150 gsm', 'Hardcover Carton 30A + Art carton 190 gsm, laminasi doff/glossy', 'prem');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bahan_kertas`
--

CREATE TABLE `tbl_bahan_kertas` (
  `id` int(11) NOT NULL,
  `id_jenis_ukuran` int(11) NOT NULL,
  `bahan_kertas` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bahan_kertas`
--

INSERT INTO `tbl_bahan_kertas` (`id`, `id_jenis_ukuran`, `bahan_kertas`, `harga`) VALUES
(1, 1, 'glossy', 250000),
(2, 2, 'doff', 50000),
(3, 2, 'B5 (17.6cm x 25cm)', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ukuran` int(5) DEFAULT NULL,
  `id_bahan` int(5) DEFAULT NULL,
  `id_produck` int(11) DEFAULT NULL,
  `jumlah_katalog` int(11) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id`, `nama_pelanggan`, `id_pelanggan`, `id_ukuran`, `id_bahan`, `id_produck`, `jumlah_katalog`, `total`, `id_status`, `date_created`, `date_updated`) VALUES
(9, 'Pandu Setiawan', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-11 14:52:10', NULL),
(10, 'Bayu Wardana', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-12 23:15:22', NULL),
(11, 'Bayu Wardana', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-06 02:49:58', NULL);

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
(1, 'Batal', 'red'),
(2, 'Selesai', 'green'),
(3, 'Tahap Penyelesaian 50 %', 'info'),
(4, 'Proses', 'primary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ukuran_kertas`
--

CREATE TABLE `tbl_ukuran_kertas` (
  `id` int(11) NOT NULL,
  `jenis_ukuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ukuran_kertas`
--

INSERT INTO `tbl_ukuran_kertas` (`id`, `jenis_ukuran`) VALUES
(1, 'Letter (8.5cm x 11cm)'),
(2, 'Tabloid (11cm x 17cm)'),
(3, 'Legal (8.5cm x 14cm)'),
(4, 'Statement (5.5cm x 8.5)'),
(5, 'Executive (7.25cm x 10.5cm)'),
(6, 'A3 (11.69cm x 16.53cm)'),
(8, 'A5 (5.83cm x 8.27cm)'),
(9, 'A4 (21cm x 29.7cm)'),
(10, 'B4 (25cm x 35.3cm)'),
(11, 'B5 (17.6cm x 25cm)');

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
-- Dumping data for table `users_token`
--

INSERT INTO `users_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 'wardanabayu55@gmail.com', 'jHH1woDhg1SVyy/GHXnGGvWcqBMA6nXyWz4E8yy+fSU=', 1568073273),
(3, 'wardanabayu55@gmail.com', 'HzIiJyvR5cC5L44vfbHGBKP4KKpSSrTaI1V0pXWXGcM=', 1568073405),
(5, 'wardanabayu55@gmail.com', 'So3QN2tS85mYq78QccYgiocB1L2PJU2YlrsU6L68SJY=', 1579677715),
(6, 'wardanabayu55@gmail.com', 'mToET+HXQ+EGdkemPeWuOrfj8JvhLf9Z+BawpzllYU4=', 1579678150),
(7, 'wardanabayu55@gmail.com', 'smwO3YSsvE4q2/hdPtl03590vEN4V8AAY7XYb4Jwtkk=', 1579678262),
(10, 'wardanabayu455@gmail.com', 'm3Lx3X3yPLZkXxWwWnfXt5h3IzU7ebUA8dLRDop4Qi4=', 1580958440);

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
-- Indexes for table `produck`
--
ALTER TABLE `produck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bahan_kertas`
--
ALTER TABLE `tbl_bahan_kertas`
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
-- Indexes for table `tbl_ukuran_kertas`
--
ALTER TABLE `tbl_ukuran_kertas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produck`
--
ALTER TABLE `produck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bahan_kertas`
--
ALTER TABLE `tbl_bahan_kertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ukuran_kertas`
--
ALTER TABLE `tbl_ukuran_kertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
