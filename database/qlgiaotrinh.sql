-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2016 at 04:37 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlgiaotrinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `idAdmin` int(11) NOT NULL,
  `tenAdmin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tenDangNhap` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`idAdmin`, `tenAdmin`, `tenDangNhap`, `matKhau`) VALUES
(1, 'Hồ Minh Huy', 'minhhuy', '123456'),
(2, 'Minh Kiệt', 'minhkiet', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `giaotrinh_tbl`
--

CREATE TABLE `giaotrinh_tbl` (
  `idGiaoTrinh` int(11) NOT NULL,
  `idHocPhan` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `ngayTao` date NOT NULL,
  `tenGiaoTrinh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tacGia` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moTa` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaotrinh_tbl`
--

INSERT INTO `giaotrinh_tbl` (`idGiaoTrinh`, `idHocPhan`, `idAdmin`, `ngayTao`, `tenGiaoTrinh`, `tacGia`, `moTa`, `link`) VALUES
(2, 1, 1, '2016-04-30', 'Ngôn ngữ hình thức khuya', 'Minh Hỷ', 'Nxb: Kim Đồng - 2016', 'http://aaaaa.com/nnhdn.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `hocphan_tbl`
--

CREATE TABLE `hocphan_tbl` (
  `idHocPhan` int(11) NOT NULL,
  `idKhoa` int(11) NOT NULL,
  `tenHocPhan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocphan_tbl`
--

INSERT INTO `hocphan_tbl` (`idHocPhan`, `idKhoa`, `tenHocPhan`, `ky`) VALUES
(1, 1, 'Ngôn ngữ hình thức', 6),
(2, 4, 'Công nghệ chế tạo tiền', 3),
(3, 2, 'Hóa sinh vật học', 8),
(4, 3, 'Khoa học bóng đá', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khoa_tbl`
--

CREATE TABLE `khoa_tbl` (
  `idKhoa` int(11) NOT NULL,
  `tenKhoa` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa_tbl`
--

INSERT INTO `khoa_tbl` (`idKhoa`, `tenKhoa`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Hóa'),
(3, 'Điện'),
(4, 'Môi trường'),
(5, 'Cơ khí'),
(6, 'Nhiệt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `giaotrinh_tbl`
--
ALTER TABLE `giaotrinh_tbl`
  ADD PRIMARY KEY (`idGiaoTrinh`),
  ADD KEY `idHocPhan` (`idHocPhan`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `hocphan_tbl`
--
ALTER TABLE `hocphan_tbl`
  ADD PRIMARY KEY (`idHocPhan`),
  ADD KEY `idKhoa` (`idKhoa`);

--
-- Indexes for table `khoa_tbl`
--
ALTER TABLE `khoa_tbl`
  ADD PRIMARY KEY (`idKhoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `giaotrinh_tbl`
--
ALTER TABLE `giaotrinh_tbl`
  MODIFY `idGiaoTrinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hocphan_tbl`
--
ALTER TABLE `hocphan_tbl`
  MODIFY `idHocPhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `khoa_tbl`
--
ALTER TABLE `khoa_tbl`
  MODIFY `idKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `giaotrinh_tbl`
--
ALTER TABLE `giaotrinh_tbl`
  ADD CONSTRAINT `giaotrinh_tbl_ibfk_1` FOREIGN KEY (`idHocPhan`) REFERENCES `hocphan_tbl` (`idHocPhan`),
  ADD CONSTRAINT `giaotrinh_tbl_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `admin_tbl` (`idAdmin`);

--
-- Constraints for table `hocphan_tbl`
--
ALTER TABLE `hocphan_tbl`
  ADD CONSTRAINT `hocphan_tbl_ibfk_1` FOREIGN KEY (`idKhoa`) REFERENCES `khoa_tbl` (`idKhoa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
