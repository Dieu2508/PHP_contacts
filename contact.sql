-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 04:02 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhba`
--

CREATE TABLE `danhba` (
  `maDB` int(11) NOT NULL,
  `maNhan` int(11) NOT NULL,
  `maUser` int(11) NOT NULL,
  `tenDB` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sdt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Congty` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhba`
--

INSERT INTO `danhba` (`maDB`, `maNhan`, `maUser`, `tenDB`, `email`, `Sdt`, `Congty`) VALUES
(1, 1, 1, 'Faker', 'fekar@gmail.com', '0412312231', 'SK Telecom'),
(2, 3, 1, 'Thầy Lân', 'levantuonglan@gmail.com', '0112353243', 'Khoa CNTT'),
(3, 4, 1, 'Ngọc Diệu Lê', 'DieuLe@gmail.com', '0412312231', 'ĐH Khoa Học'),
(4, 2, 1, 'G-Dragon', 'bigbang@gmail.com', '4123532432', 'YG Entertainment'),
(6, 7, 1, 'Lee Jong Suk', 'deptraiso1@gmail.com', '0123532432', 'YG Entertainment'),
(7, 1, 1, 'Bình Phương', 'banhbeo123@gmail.com', '0112312336', 'ĐH Khoa Học'),
(8, 1, 1, 'Quang xinh', 'quangle@vietprojectgroup.com', '8442645452', 'Cô đơn 123'),
(9, 3, 1, 'Dương Viết Thuận', 'ThuanDuong@gmail.com', '8412543534', 'Best sợ bồ'),
(10, 3, 1, 'Lương Ngọc Huy', 'huyluong@vietprojectgroup.com', '84124263453', 'ViTPR'),
(11, 3, 1, 'Mesult Ozil', 'dahayso1@gmail.com', '0184124124', 'Arsenal'),
(12, 4, 1, 'Cristiano Ronaldo', 'Cr7@gmail.com', '84125453452', 'Juventus'),
(13, 4, 1, 'Họa mi', 'hoami@gmail.com', '0823123120', 'ĐH Khoa học'),
(14, 1, 1, 'Park Seo  Joon', 'seo@gmail.com', '0412312231', 'Seoul Entertaiment'),
(15, 1, 1, 'Thoa xinh đẹp', 'thoanguyen@vietprojectgroup.com', '0192391239', 'ĐH Khoa Học'),
(16, 2, 1, 'Bi Lê', 'bikhaunghiep@gmail.com', '0213123134', 'Khoa CNTT'),
(21, 2, 1, 'Tony Stark', 'tonytonu@gmail.com', '2131233214', 'Marvel');

-- --------------------------------------------------------

--
-- Table structure for table `nhandan`
--

CREATE TABLE `nhandan` (
  `maNhan` int(11) NOT NULL,
  `maUser` int(11) NOT NULL,
  `tenNhan` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhandan`
--

INSERT INTO `nhandan` (`maNhan`, `maUser`, `tenNhan`) VALUES
(1, 1, 'Gia Đình'),
(2, 1, 'Xã hội'),
(3, 1, 'Công việc'),
(4, 1, 'Vui chơi'),
(5, 2, 'Nhậu'),
(30, 1, 'nhậu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `maUser` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`maUser`, `username`, `password`, `Ten`) VALUES
(1, 'Dieu', '123', 'Diệu Lê'),
(2, 'dieu2508', '123', 'Lê Ngọc Diệu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhba`
--
ALTER TABLE `danhba`
  ADD PRIMARY KEY (`maDB`),
  ADD KEY `maNhan` (`maNhan`),
  ADD KEY `maUser` (`maUser`);

--
-- Indexes for table `nhandan`
--
ALTER TABLE `nhandan`
  ADD PRIMARY KEY (`maNhan`),
  ADD KEY `maUser` (`maUser`),
  ADD KEY `maUser_2` (`maUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`maUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhba`
--
ALTER TABLE `danhba`
  MODIFY `maDB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nhandan`
--
ALTER TABLE `nhandan`
  MODIFY `maNhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `maUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhba`
--
ALTER TABLE `danhba`
  ADD CONSTRAINT `danhba_ibfk_1` FOREIGN KEY (`maUser`) REFERENCES `nhandan` (`maUser`);

--
-- Constraints for table `nhandan`
--
ALTER TABLE `nhandan`
  ADD CONSTRAINT `nhandan_ibfk_1` FOREIGN KEY (`maUser`) REFERENCES `user` (`maUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
