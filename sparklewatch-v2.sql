-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 04:34 AM
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
-- Database: `sparklewatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(250) NOT NULL,
  `ngay_bl` date NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_don` int(11) NOT NULL,
  `so_luong_sp` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `ma_ctgh` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  `ngay_them` date NOT NULL,
  `ma_gh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_dm` int(11) NOT NULL COMMENT 'mã danh mục',
  `ten_dm` varchar(50) NOT NULL COMMENT 'tên danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`ma_dm`, `ten_dm`) VALUES
(1, 'Đồng hồ nam'),
(2, 'Đồng hồ nữ'),
(3, 'Sản phẩm nổi bật'),
(4, 'Sản phẩm khuyến mãi');

-- --------------------------------------------------------

--
-- Table structure for table `dơn_hang`
--

CREATE TABLE `dơn_hang` (
  `ma_don` int(11) NOT NULL,
  `ngay_mua` date NOT NULL,
  `tong_tien` double NOT NULL,
  `trang_thai` set('phe-duyet','xac-nhan','dang-giao','da-giao') NOT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gh` int(11) NOT NULL,
  `so_luong_sp_tronggh` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `ten_sp` varchar(100) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `trang_thai` set('con-hang','het-hang','','') NOT NULL,
  `so_luot_xem` int(11) NOT NULL,
  `ma_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `hinh`, `gia`, `so_luong`, `ngay_nhap`, `mo_ta`, `trang_thai`, `so_luot_xem`, `ma_dm`) VALUES
(1, 'ĐỒNG HỒ DRESS', 'dh1', 14000000, 100, '2023-11-15', '', 'con-hang', 65, 1),
(2, 'ĐỒNG HỒ LEMANS', 'dh2', 5470000, 100, '0000-00-00', '', 'con-hang', 36, 1),
(3, 'ĐỒNG HỒ SOHNLE', 'dh3', 15750000, 100, '0000-00-00', '', 'con-hang', 164, 1),
(4, 'ĐỒNG HỒ EPOS E70', 'dh4', 12600000, 100, '0000-00-00', '', 'con-hang', 95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tk` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `tai_khoan` varchar(100) NOT NULL,
  `mat_khau` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `vai_tro` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_don`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Indexes for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`ma_ctgh`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_gh` (`ma_gh`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Indexes for table `dơn_hang`
--
ALTER TABLE `dơn_hang`
  ADD PRIMARY KEY (`ma_don`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gh`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_dm` (`ma_dm`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_don` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  MODIFY `ma_ctgh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ma_dm` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã danh mục', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dơn_hang`
--
ALTER TABLE `dơn_hang`
  MODIFY `ma_don` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ma_tk` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`);

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`ma_don`) REFERENCES `dơn_hang` (`ma_don`);

--
-- Constraints for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`),
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_2` FOREIGN KEY (`ma_gh`) REFERENCES `gio_hang` (`ma_gh`);

--
-- Constraints for table `dơn_hang`
--
ALTER TABLE `dơn_hang`
  ADD CONSTRAINT `dơn_hang_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`);

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_dm`) REFERENCES `danh_muc` (`ma_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
