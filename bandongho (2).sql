-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2023 lúc 04:46 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandongho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(250) NOT NULL,
  `ngay_bl` date NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ngay_bl`, `ma_sp`, `ma_tk`) VALUES
(2, 'sdsdsds', '2023-11-28', 16, 1),
(3, 'abc', '2023-11-29', 16, 58),
(4, 'asaasasa', '2023-11-29', 16, 58),
(5, 'thầy thơ đẹp trai\r\n', '2023-11-29', 16, 58),
(6, 'thày thơ đẹp trai', '2023-12-01', 16, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_ctdh` int(11) NOT NULL,
  `so_luong_sp` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `mau` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `ma_dh` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ma_ctdh`, `so_luong_sp`, `ma_sp`, `mau`, `size`, `ma_dh`) VALUES
(30, 5, 15, 'nau', '40MM', 42),
(31, 3, 16, 'nau', '40MM', 42),
(35, 1, 12, 'nau', '40MM', 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `ma_ctgh` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `kich_thuoc` varchar(10) NOT NULL,
  `sl` int(11) NOT NULL,
  `mau` varchar(10) NOT NULL,
  `ngay_them` date NOT NULL,
  `ma_gh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_dm` int(11) NOT NULL COMMENT 'mã danh mục',
  `ten_dm` varchar(50) NOT NULL COMMENT 'tên danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`ma_dm`, `ten_dm`) VALUES
(1, 'Đồng hồ nam'),
(2, 'Đồng hồ nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_don` int(11) NOT NULL,
  `ngay_mua` date NOT NULL,
  `tong_tien` double NOT NULL,
  `trang_thai` set('phe-duyet','xac-nhan','dang-giao','da-giao') NOT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_don`, `ngay_mua`, `tong_tien`, `trang_thai`, `ma_tk`) VALUES
(42, '2023-11-29', 42655000, 'dang-giao', 1),
(45, '2023-11-29', 492000, 'da-giao', 58);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gh` int(11) NOT NULL,
  `so_luong_sp_tronggh` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`ma_gh`, `so_luong_sp_tronggh`, `ma_tk`) VALUES
(8, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `ten_sp` varchar(100) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `trang_thai` set('Còn hàng','Hết hàng','','') NOT NULL,
  `so_luot_xem` int(11) NOT NULL,
  `ma_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `hinh`, `gia`, `so_luong`, `ngay_nhap`, `mo_ta`, `trang_thai`, `so_luot_xem`, `ma_dm`) VALUES
(1, 'ĐỒNG HỒ DRESS', 'pro-1.webp', 14000000, 100, '2023-11-15', ' Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 65, 1),
(2, 'ĐỒNG HỒ LEMANS', 'pro-2.webp', 5470000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 36, 1),
(3, 'ĐỒNG HỒ SOHNLE', 'pro-3.webp', 15750000, 100, '0000-00-00', '', 'Còn hàng', 164, 1),
(4, 'ĐỒNG HỒ EPOS E70', 'pro-4.webp', 12600000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 95, 2),
(5, 'ĐỒNG HỒ Q&Q-S345Y', 'pro-5.webp', 12600000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 96, 1),
(6, 'Đồng hồ JACQUES 567C', 'pro-6.webp', 12600000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 97, 1),
(7, 'ĐỒNG HỒ ALANTIC', 'pro-7.webp', 26350000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 978, 1),
(8, 'ĐỒNG HỒ ALANTIC 64', 'pro-8.webp', 15250000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 971, 2),
(9, 'ĐỒNG HỒ ATLANTIC 29', 'pro-9.webp', 9180000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 971, 1),
(10, 'Citizen BF2020-51E', 'pro-10.webp', 3685000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 971, 1),
(11, 'Casio EFR-526L-1AVUDF', 'pro-11.webp', 3356000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 97, 1),
(12, 'Casio F-91WG-9QHDF', 'pro-12.webp', 492000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 1021, 1),
(13, 'SR SL80071.1102CF', 'pro-13.webp', 2150000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 2111, 2),
(14, 'Saga Stella 71836', 'pro-14.webp', 3130000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 2112, 2),
(15, 'Daniel Wellington ', 'pro-15.webp', 4760000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 2112, 2),
(16, 'Citizen EM0509-10A', 'pro-16.webp', 6285000, 100, '0000-00-00', 'Đồng hồ đeo tay nam dần trở thành xu hướng cho phái mạnh. Thật sự cách biệt khi so sánh 1 người đeo đồng hồ và 1 người không đeo đồng hồ bởi sự sang trọng, lịch lãm, cuốn hút mà chúng mang lại. Tuy nhiên, để chọn được một chiếc đồng hồ phù hợp không hề dễ dàng. Việc đeo đồng hồ không phù hợp có thể làm anh em trông khá phản cảm thậm chí là chọn nhầm một chiếc đồng hồ fake, kém chất lượng. Bài viết sau đây là chia sẻ của ShopWatch về cách chọn đồng hồ đeo tay nam đẹp, phù hợp.', 'Còn hàng', 2113, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tk` int(11) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `taikhoan` varchar(100) NOT NULL,
  `mat_khau` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `vai_tro` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`ma_tk`, `ho_ten`, `taikhoan`, `mat_khau`, `email`, `dia_chi`, `phone`, `vai_tro`) VALUES
(1, 'leducanh', 'leducanh2111', 'leducanh12', 'anhldps30633@fpt.edu.vn', '123', 334481550, b'0'),
(2, NULL, 'leducanh21112', 'leducanh12', 'anhldps30633@fpt.edu.vn', NULL, NULL, b'0'),
(37, NULL, 'leducanh2111111', 'leducanh12', 'anhldps30633@fpt.edu.vn', NULL, NULL, b'0'),
(45, NULL, 'leducanh2111', '1', 'Anhn156922@gmail.com', NULL, NULL, b'0'),
(47, NULL, 'leducanh21113456789', 'leducanh12', 'anhldps30633@fpt.edu.vn', NULL, NULL, b'0'),
(48, NULL, 'leducanh2111789', 'leducanh12', 'anhldps30633@fpt.edu.vn', NULL, NULL, b'0'),
(50, NULL, 'nghia21', 'nghia', 'nghiatdps30799@gmail.com', NULL, NULL, b'0'),
(51, NULL, 'nghiasss', '2332323', 'nghiatdps30799@gmail.com', NULL, NULL, b'0'),
(53, NULL, 'leanh', '$2y$10$xK8', 'anhldps30633@fpt.edu.vn', NULL, NULL, b'0'),
(55, 'Trần Di Phong', 'phongngu123', '$2y$10$WSI', 'votronghuy1203@gmail.com', '123/456 1222121', 334481550, b'0'),
(57, NULL, 'admin', '1', '123.@gmail.com', NULL, NULL, b'1'),
(58, 'Thầy thơ 10đ', 'thaytho', '123', 'anhldps30633@fpt.edu.vn', '', 334481550, b'0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_ctdh`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `fk_ctdh_dh` (`ma_dh`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`ma_ctgh`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_gh` (`ma_gh`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_don`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gh`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_dm` (`ma_dm`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_ctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  MODIFY `ma_ctgh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ma_dm` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã danh mục', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ma_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`);

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`),
  ADD CONSTRAINT `fk_ctdh_dh` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_don`);

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`),
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_2` FOREIGN KEY (`ma_gh`) REFERENCES `gio_hang` (`ma_gh`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_dm`) REFERENCES `danh_muc` (`ma_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
