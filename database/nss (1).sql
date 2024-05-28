-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2024 lúc 07:43 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nss`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `maBaiDang` int(11) NOT NULL,
  `tenBaiDang` varchar(100) NOT NULL,
  `moTa` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `QR` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang`
--

INSERT INTO `baidang` (`maBaiDang`, `tenBaiDang`, `moTa`, `images`, `QR`, `id`) VALUES
(1, 'kjhk', 'jhkjjh', 'Bai dang - 1716448146.jpeg', NULL, NULL),
(2, 'kjhk', 'jhkjjh', 'Bai dang - 1716448150.jpeg', NULL, NULL),
(3, 'kjhk', 'jhkjjh', 'agric-background.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qr_code`
--

CREATE TABLE `qr_code` (
  `QR_name` varchar(100) NOT NULL,
  `CreateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Đang Hoạt Động',
  `maVaiTro` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `email`, `phone`, `status`, `maVaiTro`) VALUES
(1, 'Jane', 'Doe', 'jane', 'Janedoe@nss.com', 123456789, 'Đang Hoạt Động', 1),
(2, 'Duc', 'Nguyen Dinh', 'duc', 'duc@nss.com', 123456798, 'Đang Hoạt Động', 1),
(3, 'Maria', 'DB', 'maria', 'maria@nss.com', 123456789, 'Đang Hoạt Động', 1),
(9, 'Duck', 'Nguyn', 'duck', 'duck@nss.com', 1679617479, 'Đang Hoạt Động', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `maVaiTro` int(2) NOT NULL,
  `tenVaiTro` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`maVaiTro`, `tenVaiTro`) VALUES
(1, 'Admin'),
(2, 'Vendor'),
(3, 'User');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`maBaiDang`),
  ADD KEY `id` (`id`),
  ADD KEY `QR` (`QR`);

--
-- Chỉ mục cho bảng `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`QR_name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maVaiTro` (`maVaiTro`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`maVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baidang`
--
ALTER TABLE `baidang`
  MODIFY `maBaiDang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD CONSTRAINT `baidang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `qr_code`
--
ALTER TABLE `qr_code`
  ADD CONSTRAINT `qr_code_ibfk_1` FOREIGN KEY (`QR_name`) REFERENCES `baidang` (`QR`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`maVaiTro`) REFERENCES `vaitro` (`maVaiTro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
