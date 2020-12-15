-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2020 at 03:12 AM
-- Server version: 8.0.19
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_renting`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `identity_card` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`, `role`, `email`, `identity_card`, `phone_number`, `address`) VALUES
(1, 'tri', '202cb962ac59075b964b07152d234b70', 0, 'triluccong@gmail.com', '123456789', '0883346288', 'quan thanh xuan'),
(2, 'tuan', '202cb962ac59075b964b07152d234b70', 1, 'tuan123@yopmail.com', '123432654', '0982473659', 'My Dinh'),
(3, 'truong', '202cb962ac59075b964b07152d234b70', 2, 'truong123@yopmail.com', '123456309', '0284657384', 'Cau Giay'),
(4, 'hung', '202cb962ac59075b964b07152d234b70', 1, 'hung123@y.com', '123456789', '098765432', 'cau giay');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int NOT NULL AUTO_INCREMENT,
  `province_id` int NOT NULL,
  `district_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`district_id`),
  KEY `province_id` (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `province_id`, `district_name`) VALUES
(1, 1, 'Quận Ba Đình'),
(2, 1, 'Quận Bắc Từ Liêm'),
(3, 1, 'Quận Cầu Giấy'),
(4, 1, 'Quận Hà Đông'),
(5, 1, 'Quận Hai Bà Trưng'),
(6, 1, 'Quận Hoàn Kiếm'),
(7, 1, 'Quận Hoàng Mai'),
(8, 1, 'Quận Long Biên'),
(9, 1, 'Quận Nam Từ Liêm'),
(10, 2, 'Quận 1'),
(11, 2, 'Quận 2'),
(12, 2, 'Quận 3'),
(13, 2, 'Quận 4'),
(14, 2, 'Quận 5'),
(15, 2, 'Quận 6'),
(16, 2, 'Quận 7'),
(17, 2, 'Quận 8'),
(18, 2, 'Quận 9'),
(19, 2, 'Quận 10'),
(20, 2, 'Quận 11'),
(21, 2, 'Quận 12'),
(22, 3, 'Quận Liên Chiểu'),
(23, 3, 'Quận Thanh Khê'),
(24, 3, 'Quận Hải Châu'),
(25, 3, 'Quận Sơn Trà'),
(26, 4, 'Thị Xã Thủ Dầu Một'),
(27, 4, 'Huyện Dầu Tiếng'),
(28, 4, 'Huyện Bến Cát'),
(29, 4, 'Huyện Phú Giáo');

-- --------------------------------------------------------

--
-- Table structure for table `motel`
--

DROP TABLE IF EXISTS `motel`;
CREATE TABLE IF NOT EXISTS `motel` (
  `motel_id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `house_number` int NOT NULL,
  `street` varchar(255) NOT NULL,
  `province_id` int NOT NULL,
  `district_id` int NOT NULL,
  `close_place` varchar(255) NOT NULL,
  `number_of_rooms` int NOT NULL,
  `area` int NOT NULL,
  `price` int NOT NULL,
  `owner` tinyint(1) NOT NULL,
  `bath_type` tinyint(1) NOT NULL,
  `water_heater` tinyint(1) NOT NULL,
  `kitchen` int NOT NULL,
  `air_conditioner` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `style_id` int NOT NULL,
  PRIMARY KEY (`motel_id`),
  KEY `motel_ibfk_1` (`post_id`),
  KEY `province_id` (`province_id`),
  KEY `district_id` (`district_id`),
  KEY `style_id` (`style_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `post_tittle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `post_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `motel_id` int NOT NULL,
  `update_time` datetime NOT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `post_price` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time` int NOT NULL,
  `confirm_date` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_ibfk_1` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int NOT NULL AUTO_INCREMENT,
  `province_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Hà Nội'),
(2, 'Hồ Chí Minh'),
(3, 'Đà Nẵng'),
(4, 'Bình Dương'),
(5, 'Đồng Nai'),
(6, 'Bà Rịa - Vũng Tàu'),
(7, 'Cần Thơ'),
(8, 'Khánh Hòa'),
(9, 'Hải Phòng'),
(10, 'Hà Nội'),
(11, 'Hồ Chí Minh'),
(12, 'Đà Nẵng'),
(13, 'Bình Dương'),
(14, 'Đồng Nai'),
(15, 'Bà Rịa - Vũng Tàu'),
(16, 'Cần Thơ'),
(17, 'Khánh Hòa'),
(18, 'Hải Phòng');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `post_id` int NOT NULL,
  `account_id` int NOT NULL,
  `comment` text NOT NULL,
  `rating` int NOT NULL,
  KEY `post_id` (`post_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
CREATE TABLE IF NOT EXISTS `style` (
  `style_id` int NOT NULL AUTO_INCREMENT,
  `style_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`style_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`style_id`, `style_name`) VALUES
(1, 'Phòng trọ'),
(2, 'Chung cư mini'),
(3, 'Nhà nguyên căn'),
(4, 'Chung cư nguyên căn');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `motel`
--
ALTER TABLE `motel`
  ADD CONSTRAINT `motel_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `motel_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `motel_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `motel_ibfk_4` FOREIGN KEY (`style_id`) REFERENCES `style` (`style_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
