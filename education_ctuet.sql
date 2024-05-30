-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 09:11 PM
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
-- Database: `education_ctuet`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `GiangVienID` varchar(11) DEFAULT NULL,
  `SinhVienID` varchar(11) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `LoaiTaiKhoan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `GiangVienID`, `SinhVienID`, `Username`, `Password`, `LoaiTaiKhoan`) VALUES
(4, NULL, NULL, 'MinhThien', '$2y$10$WsTcD/En0oGEir.EJU.O5uDdC2Ytj9Mvf3pctegnHM4qg0TU8UsYe', 'admin'),
(30, NULL, '21011743', '21011743', '$2y$10$chMbszUpnYXembSM9p6a7..OeenxOvRJ6/qjzYQDcpZPdqP/KBdXa', 'student'),
(31, 'GV05557', NULL, 'GV05557', '$2y$10$EcBlFrs13nK0FwD0CsbyY..//MT.hOXFjFBp2/FZxQoPdsCf0xjcK', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `chuongtrinhdaotao`
--

CREATE TABLE `chuongtrinhdaotao` (
  `CTDaoTaoID` varchar(11) NOT NULL,
  `KhoaID` varchar(11) DEFAULT NULL,
  `TenChuongTrinh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuongtrinhdaotao`
--

INSERT INTO `chuongtrinhdaotao` (`CTDaoTaoID`, `KhoaID`, `TenChuongTrinh`) VALUES
('KTPM0121', 'KTXD', 'Kỹ thuật phần mềm 2021'),
('KTXD2021', 'KTXD', 'Kỹ thuật xây dựng 2021'),
('NNA0121', 'NNA', 'Ngôn ngữ anh 2021');

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `GiangVienID` varchar(11) NOT NULL,
  `KhoaID` varchar(11) DEFAULT NULL,
  `TenGiangVien` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SoDienThoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`GiangVienID`, `KhoaID`, `TenGiangVien`, `Email`, `SoDienThoai`) VALUES
('GV05557', 'KTXD', 'Thiện phạm', 'GV05557@ctuet.edu.vn', 939204336);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `KhoaID` varchar(11) NOT NULL,
  `TenKhoa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`KhoaID`, `TenKhoa`) VALUES
('KTXD', 'Kỹ thuật xây dựng'),
('NNA', 'Ngôn ngữ anh');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `MonHocID` varchar(11) NOT NULL,
  `CTDaoTaoID` varchar(11) DEFAULT NULL,
  `TenMonHoc` varchar(255) DEFAULT NULL,
  `HocKy` int(11) DEFAULT NULL,
  `SoTinChi` int(11) DEFAULT NULL,
  `SoTietLyThuyet` int(11) DEFAULT NULL,
  `SoTietThucHanh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`MonHocID`, `CTDaoTaoID`, `TenMonHoc`, `HocKy`, `SoTinChi`, `SoTietLyThuyet`, `SoTietThucHanh`) VALUES
('CTUT5210', 'KTXD2021', 'hello', 1, 3, 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `SinhVienID` varchar(11) NOT NULL,
  `CTDaoTaoID` varchar(11) DEFAULT NULL,
  `TenSinhVien` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SoDienThoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`SinhVienID`, `CTDaoTaoID`, `TenSinhVien`, `Email`, `SoDienThoai`) VALUES
('21011743', 'KTPM0121', 'Tấn hưng ', '21011743@student.ctuet.edu.vn', 704834555);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `fk_ma_gv` (`GiangVienID`),
  ADD KEY `fk_ma_sv` (`SinhVienID`);

--
-- Indexes for table `chuongtrinhdaotao`
--
ALTER TABLE `chuongtrinhdaotao`
  ADD PRIMARY KEY (`CTDaoTaoID`),
  ADD KEY `fk_khoa_ctdt` (`KhoaID`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`GiangVienID`),
  ADD KEY `fk_khoa_gv` (`KhoaID`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`KhoaID`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MonHocID`),
  ADD KEY `fk_ctdt_monhoc` (`CTDaoTaoID`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`SinhVienID`),
  ADD KEY `fk_ctdt_sinhvien` (`CTDaoTaoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_ma_gv` FOREIGN KEY (`GiangVienID`) REFERENCES `giangvien` (`GiangVienID`),
  ADD CONSTRAINT `fk_ma_sv` FOREIGN KEY (`SinhVienID`) REFERENCES `sinhvien` (`SinhVienID`);

--
-- Constraints for table `chuongtrinhdaotao`
--
ALTER TABLE `chuongtrinhdaotao`
  ADD CONSTRAINT `fk_khoa_ctdt` FOREIGN KEY (`KhoaID`) REFERENCES `khoa` (`KhoaID`);

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `fk_khoa_gv` FOREIGN KEY (`KhoaID`) REFERENCES `khoa` (`KhoaID`);

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `fk_ctdt_monhoc` FOREIGN KEY (`CTDaoTaoID`) REFERENCES `chuongtrinhdaotao` (`CTDaoTaoID`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `fk_ctdt_sinhvien` FOREIGN KEY (`CTDaoTaoID`) REFERENCES `chuongtrinhdaotao` (`CTDaoTaoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
