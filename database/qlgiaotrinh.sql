-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 04:54 AM
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
-- Table structure for table `giaotrinh_tbl`
--

CREATE TABLE `giaotrinh_tbl` (
  `idGiaoTrinh` int(11) NOT NULL,
  `idHocPhan` int(11) NOT NULL,
  `idKhoa` int(11) NOT NULL,
  `tenGiaoTrinh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ky` int(11) NOT NULL,
  `tacGia` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moTa` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaotrinh_tbl`
--

INSERT INTO `giaotrinh_tbl` (`idGiaoTrinh`, `idHocPhan`, `idKhoa`, `tenGiaoTrinh`, `ky`, `tacGia`, `moTa`, `link`) VALUES
(1, 1, 1, 'Công nghệ phần mềm', 1, 'Lê Thị Mỹ Hạnh', 'Nhà xuất bản: Cần Thơ, Năm 2015', 'http://asdf.com');

-- --------------------------------------------------------

--
-- Table structure for table `hocphan_tbl`
--

CREATE TABLE `hocphan_tbl` (
  `idHocPhan` int(11) NOT NULL,
  `tenHocPhan` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocphan_tbl`
--

INSERT INTO `hocphan_tbl` (`idHocPhan`, `tenHocPhan`) VALUES
(1, 'Công nghệ phần mềm');

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
(2, 'Hóa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giaotrinh_tbl`
--
ALTER TABLE `giaotrinh_tbl`
  ADD PRIMARY KEY (`idGiaoTrinh`),
  ADD KEY `idHocPhan` (`idHocPhan`),
  ADD KEY `idKhoa` (`idKhoa`);

--
-- Indexes for table `hocphan_tbl`
--
ALTER TABLE `hocphan_tbl`
  ADD PRIMARY KEY (`idHocPhan`);

--
-- Indexes for table `khoa_tbl`
--
ALTER TABLE `khoa_tbl`
  ADD PRIMARY KEY (`idKhoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giaotrinh_tbl`
--
ALTER TABLE `giaotrinh_tbl`
  MODIFY `idGiaoTrinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hocphan_tbl`
--
ALTER TABLE `hocphan_tbl`
  MODIFY `idHocPhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `khoa_tbl`
--
ALTER TABLE `khoa_tbl`
  MODIFY `idKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `giaotrinh_tbl`
--
ALTER TABLE `giaotrinh_tbl`
  ADD CONSTRAINT `giaotrinh_tbl_ibfk_1` FOREIGN KEY (`idHocPhan`) REFERENCES `hocphan_tbl` (`idHocPhan`),
  ADD CONSTRAINT `giaotrinh_tbl_ibfk_2` FOREIGN KEY (`idKhoa`) REFERENCES `khoa_tbl` (`idKhoa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
