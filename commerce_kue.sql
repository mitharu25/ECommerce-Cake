-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2025 at 12:47 PM
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
-- Database: `commerce_kue`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user_konsumen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `produk` text NOT NULL,
  `total_produk` varchar(20) NOT NULL,
  `total_harga` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_detail`, `id_order`, `id_user_konsumen`, `nama`, `phone`, `alamat`, `produk`, `total_produk`, `total_harga`, `created_at`, `updated_at`) VALUES
(13, 17, 3, 'Kevin DIks', '0895603459058', 'SOREANG INDAH JL. BOGENVILE BLOK C-34', 'Sagu Keju - x2 - Rp 200.000\r\nKeju - x3 - Rp 285.000', '5', '485000', '2024-06-20 16:24:33', '2024-06-20 16:24:33'),
(14, 18, 2, 'Tony Folk', '087821973750', 'Jakarta Barat', 'Chewy Soft Chocolate - x2 - Rp 140.000\r\nLapis Surabaya - x1 - Rp 40.000\r\nPutri Salju - x3 - Rp 270.000\r\nKue Nastar - x5 - Rp 450.000', '11', '900000', '2024-06-23 05:00:45', '2024-06-23 05:00:45'),
(17, 21, 2, 'Tony Folk', '087821973750', 'Jakarta', 'Putri Salju - x4 - Rp 360.000', '4', '360000', '2024-06-25 10:34:18', '2024-06-25 10:34:18'),
(18, 22, 5, 'Daniel Jurnior', '0876523155662', 'Banten ', 'Lapis Surabaya - x2 - Rp 80.000\r\nChoco Cheese - x1 - Rp 87.000\r\nMisol Dark Choco (JAR) - x1 - Rp 45.000', '4', '212000', '2024-06-26 09:07:13', '2024-06-26 09:07:13'),
(19, 23, 6, 'Sandy Wolf', '0895603482341', 'Jakarta Timur', 'Sagu Keju - x2 - Rp 200.000\r\nPutri Salju - x3 - Rp 270.000', '5', '470000', '2024-06-26 09:09:47', '2024-06-26 09:09:47'),
(20, 24, 7, 'Deli Vani', '087821978999232', 'Bandung Selatan', 'Keju (Kotak) - x2 - Rp 160.000\r\nKeju - x1 - Rp 95.000', '3', '255000', '2024-06-26 09:11:11', '2024-06-26 09:11:11'),
(21, 25, 7, 'Deli Vani', '087821978999232', 'Bandung Selatan', 'Sagu Keju - x2 - Rp 200.000', '2', '200000', '2024-06-26 09:11:45', '2024-06-26 09:11:45'),
(22, 26, 8, 'Brain Daniel', '0876523552780', 'Jln.Gedebage. Bandung', 'Putri Salju - x3 - Rp 270.000\r\nKue Nastar - x2 - Rp 180.000', '5', '450000', '2024-06-26 09:14:20', '2024-06-26 09:14:20'),
(23, 27, 9, 'Lasivo Dera', '08982176424', 'Subang, Jawa Barat', 'Chewy Soft Chocolate - x5 - Rp 350.000', '5', '350000', '2024-06-26 09:15:53', '2024-06-26 09:15:53'),
(24, 28, 9, 'Lasivo Dera', '08982176424', 'Subang, Jawa Barat', 'Lapis Surabaya - x2 - Rp 80.000', '2', '80000', '2024-06-26 09:16:19', '2024-06-26 09:16:19'),
(25, 29, 8, 'Brain Daniel', '0876523552780', 'Bandung, Gedebage', 'Sagu Keju - x2 - Rp 200.000\r\nChoco Cheese - x1 - Rp 87.000\r\nKeju (Kotak) - x5 - Rp 400.000', '8', '687000', '2024-07-04 06:35:37', '2024-07-04 06:35:37'),
(26, 30, 8, 'Brain Daniel', '0876523552780', 'Bandung, Gedebage', 'Putri Salju - x5 - Rp 450.000\r\nSagu Keju - x1 - Rp 100.000', '6', '550000', '2024-07-05 02:43:34', '2024-07-05 02:43:34'),
(27, 31, 8, 'Brain Daniel', '0876523552780', 'Bandung, Gedebage', 'Putri Salju - x1 - Rp 90.000', '1', '90000', '2024-07-05 03:10:53', '2024-07-05 03:10:53'),
(28, 32, 10, 'Fajar Maulana', '1', 'SOREANG INDAH JL. BOGENVILE BLOK C-34', 'Putri Salju - x2 - Rp 180.000\r\nKeju - x4 - Rp 380.000', '6', '560000', '2024-08-16 08:53:13', '2024-08-16 08:53:13'),
(29, 33, 8, 'Brain Daniel', '0076523552780 (example)', 'Bandung, Gedebage', 'Kue Nastar - x5 - Rp 450.000', '5', '450000', '2025-08-21 10:44:40', '2025-08-21 10:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `kue`
--

CREATE TABLE `kue` (
  `id_kue` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kue`
--

INSERT INTO `kue` (`id_kue`, `nama`, `slug`, `jenis`, `kategori`, `deskripsi`, `harga`, `berat`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Kue Nastar', 'nastar', 'Kering', 'Reguler', 'Nastar adalah kue kering', 90000, '700 gram', 'nastar.jpg', '2024-05-01 12:29:51', '2024-05-01 12:29:51'),
(2, 'Keju', 'keju', 'Kering', 'Reguler', 'Kue keju adalah adonan dari keju', 95000, '680 gram', 'keju.jpg', '2024-05-01 14:36:50', '2024-05-01 14:36:50'),
(3, 'Putri Salju', 'putri-salju', 'Kering', 'Reguler', 'Putri salju adalah kue dari tepung manis', 90000, '600 gram', 'putri salju.jpg', '2024-05-01 14:36:50', '2024-05-01 14:36:50'),
(4, 'Sagu Keju', 'sagu-keju', 'Kering', 'Reguler', 'Sagu keju adalah kue dari bahan dasar keju', 100000, '700 gram', 'sagu keju.jpg', '2024-05-01 14:36:50', '2024-05-01 14:36:50'),
(5, 'Choco Cheese', 'choco-cheese', 'Kering', 'Reguler', 'Choco Cheese adalah kue perpaduan kacang dan keju', 87000, '720 gram', 'choco cheese.jpg', '2024-05-01 14:36:50', '2024-05-01 14:36:50'),
(6, 'Lapis Surabaya', 'lapis-surabaya', 'Basah', 'Mini', 'Lapis Suarabaya adalah kue ciri khas surabaya dan kue tradisional nusantara', 40000, '600 gram', 'lapis_surabaya.jpg', '2024-05-10 10:05:18', '2024-05-10 10:05:18'),
(7, 'Misol Dark Choco (JAR)', 'misol-dark-choco-jar', 'Kering', 'JAR', 'Misol Dark Choco adalah kue kering yang berbahan cokelat choco ', 45000, '650 gram', 'misol_dark_choco.jpg', '2024-05-10 10:57:08', '2024-06-19 17:04:16'),
(8, 'Keju (Kotak)', 'keju-kotak', 'Kering', 'Kotak', 'Kue keju adalah kue yang berbahan keju dalam kemasan kotak', 80000, '760 gram', 'keju_kotak.jpg', '2024-05-10 11:02:18', '2024-06-19 17:04:02'),
(9, 'Bolu Kukus', 'bolu-kukus', 'Basah', 'BoxPlastik', 'Bolu Kukus adalah kue basah yang disajikan dalam tempat plastik/kertas foam, 1 pembelian reguler terdapat 16 pcs', 40000, '500 gram', 'bolu kukus.jpg', '2024-05-10 11:39:51', '2024-06-17 07:35:02'),
(13, 'Chewy Soft Chocolate', 'chewy-soft-chocolate', 'Kering', 'JAR', 'Chewy Soft Chocolate adalah kue kering chips rasa cokelat.', 70000, '700 gram', 'chewy-soft-chocolate.jpg', '2024-06-17 02:24:44', '2024-06-17 02:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_order` int(11) NOT NULL,
  `id_user_konsumen` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `total_harga` varchar(30) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL DEFAULT '-',
  `tanggal_bayar` varchar(30) NOT NULL DEFAULT '-',
  `file_bukti` varchar(255) NOT NULL DEFAULT '-',
  `status` varchar(25) NOT NULL DEFAULT 'Menunggu Transaksi',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_order`, `id_user_konsumen`, `tanggal`, `total_harga`, `metode_pembayaran`, `tanggal_bayar`, `file_bukti`, `status`, `created_at`, `updated_at`) VALUES
(17, 3, '2024-06-20', '485000', '-', '-', '-', 'Menunggu Transaksi', '2024-06-20 16:24:33', '2024-06-20 16:24:33'),
(18, 2, '2024-05-25', '900000', '-', '-', '-', 'Arrived', '2024-06-23 05:00:45', '2024-06-23 05:00:45'),
(21, 2, '2024-04-25', '360000', 'GoPay', '2024-06-26', '1719383521_194efb385f17de3cc731.jpeg', 'Menunggu Konfirmasi', '2024-06-25 10:34:18', '2024-06-26 06:32:01'),
(22, 5, '2024-06-26', '212000', 'Bank Mandiri', '2024-06-26', '1719392887_0e8f237c23c5073aead6.png', 'Dibatalkan', '2024-06-26 09:07:13', '2024-06-26 09:08:07'),
(23, 6, '2024-06-26', '470000', 'Bank Mandiri', '2024-04-26', '1719392995_0513a64e94d6fc09f2e6.png', 'Arrived', '2024-06-26 09:09:47', '2024-06-26 09:09:55'),
(24, 7, '2024-06-26', '255000', 'GoPay', '2024-03-20', '1719393077_ebb85b3d3d807b6dcbe9.png', 'Dikonfirmasi & Dikirim', '2024-06-26 09:11:11', '2024-06-26 09:11:17'),
(25, 7, '2024-03-21', '200000', '-', '-', '-', 'Menunggu Transaksi', '2024-06-26 09:11:45', '2024-06-26 09:11:45'),
(26, 8, '2024-02-19', '450000', 'Bank Mandiri', '2024-06-26', '1719383521_194efb385f17de3cc731.jpeg', 'Dikonfirmasi & Dikirim', '2024-06-26 09:14:20', '2024-06-26 09:14:26'),
(27, 9, '2024-06-26', '350000', 'GoPay', '2024-05-10', '1719393360_87a367c1822d21cb9bb0.png', 'Menunggu Konfirmasi', '2024-06-26 09:15:53', '2024-06-26 09:16:00'),
(28, 9, '2024-04-11', '80000', '-', '-', '-', 'Menunggu Transaksi', '2024-06-26 09:16:19', '2024-06-26 09:16:19'),
(29, 8, '2024-07-04', '687000', '-', '-', '-', 'Menunggu Transaksi', '2024-07-04 06:35:37', '2024-07-04 06:35:37'),
(30, 8, '2024-07-05', '550000', 'Bank Mandiri', '2024-07-05', '1720147454_d3fbdc9d4594993f33a9.jpg', 'Arrived', '2024-07-05 02:43:34', '2024-07-05 02:44:14'),
(31, 8, '2024-07-05', '90000', '-', '-', '-', 'Menunggu Transaksi', '2024-07-05 03:10:53', '2024-07-05 03:10:53'),
(32, 10, '2024-08-16', '560000', '-', '-', '-', 'Menunggu Transaksi', '2024-08-16 08:53:13', '2024-08-16 08:53:13'),
(33, 8, '2025-08-21', '450000', '-', '-', '-', 'Menunggu Transaksi', '2025-08-21 10:44:40', '2025-08-21 10:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id_pict` int(11) NOT NULL,
  `id_kue` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id_pict`, `id_kue`, `file`) VALUES
(1, 1, 'nastar1.jpg'),
(2, 1, 'nastar2.jpeg'),
(3, 3, 'putri1.jpeg'),
(4, 3, 'putri2.jpeg'),
(5, 3, 'putri3.jpg'),
(6, 3, 'putri4.jpg'),
(12, 1, 'nastar_254.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `kode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `metode`, `kode`) VALUES
(1, 'Bank Mandiri', '0225482541'),
(2, 'GoPay', '70594322');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `jenkel` varchar(12) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_admin`, `nama`, `nik`, `jenkel`, `tgl_lahir`, `alamat`, `phone`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'M.Fajar Maulana', '25122001', 'Laki - Laki', '2001-12-25', 'SOREANG INDAH JL. BOGENVILE BLOK C-34. Bandung', '0895603459060', 'fajamaulana1010@gmail.com', 'Fajar', '$2y$10$athq1m8OxqFN1e3Nv0K.uOI8p/TdkUnNWa0Syq16lxvtmgPCJ087u', '2024-06-22 13:45:11', '2024-06-22 15:55:21'),
(3, 'Admin', '1234556789', 'Laki - Laki', '2024-07-01', 'Bandung, Jawa Barat', '1234556789', 'admin@admin.com', 'Admin', '$2y$10$55XYlh2TVj7KHwAX0nyij.oOfON2fGLsUUxAWEu9hG/bSx7gpoz72', '2024-07-17 14:57:37', '2024-07-17 14:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_konsumen`
--

CREATE TABLE `user_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT '-',
  `alamat` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_konsumen`
--

INSERT INTO `user_konsumen` (`id_konsumen`, `fullname`, `phone`, `email`, `alamat`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Tony Folkar', '087821978999', 'fajamaulana1010@gmail.com', 'Kabupaten Bandung Selatan', 'tony', '$2y$10$.iOWHDPs.ooZoqaKya2FPOh4MdRZnqIz0x5t.GJonIMg8fkCE5/S6', '2024-05-21 12:16:09', '2024-06-27 17:12:05'),
(5, 'Daniel Jurnior', '0876523155662', 'Dane@gmail.com', 'Banten ', 'dan', '$2y$10$Omi4Ciqhs92eBGswkkGFIuTTiVkgZyMjDs7kzGWqoA6Yo5PWYZ17e', '2024-06-26 09:06:00', '2024-06-26 09:06:00'),
(6, 'Sandy Wolf', '0895603482341', 'sand@gmail.com', 'Jakarta Timur', 'san', '$2y$10$GkLumut02iuMMMoKedQkKe0aRdpzlqQrlXe.o9QCxyaSSFNqTzfgi', '2024-06-26 09:08:49', '2024-06-26 09:08:49'),
(7, 'Deli Vani', '087821978999232', 'Deli@gmail.com', 'Bandung Selatan', 'Deva', '$2y$10$Z4Lq.KD3CD.afL2.zWBypObKBq8qBW5/1QrjROBjSmrlJSUtMpPcG', '2024-06-26 09:10:42', '2024-06-26 09:10:42'),
(8, 'Brain Daniel', '0876523552780', 'Brain10@gmail.com', 'Bandung, Gedebage', 'brain', '$2y$10$vgIvpRzCpy1GZ3eGysT8Le15zifOmlbz4sgON8ZIEwN4KWa9Sqmbm', '2024-06-26 09:12:50', '2024-07-04 06:31:38'),
(9, 'Lasivo Dera', '08982176424', 'Lasiv@gmail.com', 'Subang, Jawa Barat', 'las', '$2y$10$Us/F8TAou5PhwqVoH7zVUOiA4diPy1oFt1zX.grOFOcfo7ttgly0.', '2024-06-26 09:15:33', '2024-06-26 09:15:33'),
(10, 'Fajar Maulana', '1', 'fajarmaulana1010@yahoo.com', 'SOREANG INDAH JL. BOGENVILE BLOK C-34', '1', '$2y$10$xHjdiBk/MxPZkpK/GtQFSeocrnkIFRspMoCYW6BZlO4BH/y1mDz0C', '2024-08-16 08:52:04', '2024-08-16 08:52:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_id_order` (`id_order`),
  ADD KEY `id_user_konsumen` (`id_user_konsumen`);

--
-- Indexes for table `kue`
--
ALTER TABLE `kue`
  ADD PRIMARY KEY (`id_kue`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user_konsumen` (`id_user_konsumen`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id_pict`),
  ADD KEY `fk_kue` (`id_kue`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `user_konsumen`
--
ALTER TABLE `user_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kue`
--
ALTER TABLE `kue`
  MODIFY `id_kue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id_pict` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_konsumen`
--
ALTER TABLE `user_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD CONSTRAINT `fk_id_order` FOREIGN KEY (`id_order`) REFERENCES `pesan` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `pesan` (`id_order`) ON DELETE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `fk_kue` FOREIGN KEY (`id_kue`) REFERENCES `kue` (`id_kue`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
