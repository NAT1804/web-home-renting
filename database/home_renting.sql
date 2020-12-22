-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2020 at 03:18 PM
-- Server version: 5.7.31
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
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `identity_card` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`, `role`, `email`, `identity_card`, `phone_number`, `address`, `code`, `status`) VALUES
(5, 'Admin', 'df545fd13c9bb84da071f79d27f39370', 0, 'michigo2802@gmail.com', '034200009001', '0966786958', 'Hà Nội', 0, 'verified'),
(6, 'Nguyen Anh Tuan', 'b48c78badd654b86420bf81e9ed62da8', 0, 'nguyenanhtuan1842000@gmail.com', '034112129865', '0965170498', 'Hưng Yên', 0, 'verified'),
(7, 'Nguyễn Anh Tuấn', 'df545fd13c9bb84da071f79d27f39370', 0, '18021376@vnu.edu.vn', '165489325789', '0375645219', 'Thái Bình', 0, 'verified');

-- --------------------------------------------------------

--
-- Stand-in structure for view `activepostslist`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `activepostslist`;
CREATE TABLE IF NOT EXISTS `activepostslist` (
`account_id` int(11)
,`post_title` varchar(255)
,`post_description` text
,`post_price` int(11)
,`update_time` datetime
,`expiry_date` datetime
,`time` int(11)
,`confirm_date` datetime
,`username` varchar(255)
,`motel_id` int(11)
,`post_id` int(11)
,`house_number` varchar(20)
,`street` varchar(255)
,`province_id` int(11)
,`district_id` int(11)
,`close_place` varchar(255)
,`number_of_rooms` int(11)
,`area` int(11)
,`price` int(11)
,`owner` tinyint(1)
,`bath_type` tinyint(1)
,`water_heater` tinyint(1)
,`kitchen` int(11)
,`air_conditioner` tinyint(1)
,`balcony` tinyint(1)
,`style_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `district_name` varchar(200) NOT NULL,
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
  `motel_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `house_number` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `close_place` varchar(255) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `owner` tinyint(1) NOT NULL,
  `bath_type` tinyint(1) NOT NULL,
  `water_heater` tinyint(1) NOT NULL,
  `kitchen` int(11) NOT NULL,
  `air_conditioner` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `electric_water` tinyint(4) NOT NULL,
  `electric_price` int(11) NOT NULL,
  `water_price` int(11) NOT NULL,
  `style_id` int(11) NOT NULL,
  `number_image` int(11) DEFAULT NULL,
  PRIMARY KEY (`motel_id`),
  KEY `motel_ibfk_1` (`post_id`),
  KEY `province_id` (`province_id`),
  KEY `district_id` (`district_id`),
  KEY `style_id` (`style_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motel`
--

INSERT INTO `motel` (`motel_id`, `post_id`, `house_number`, `street`, `province_id`, `district_id`, `close_place`, `number_of_rooms`, `area`, `price`, `owner`, `bath_type`, `water_heater`, `kitchen`, `air_conditioner`, `balcony`, `electric_water`, `electric_price`, `water_price`, `style_id`, `number_image`) VALUES
(14, 14, '39', 'Giang Văn Minh', 1, 1, 'không', 2, 25, 3899997, 0, 1, 1, 2, 1, 1, 0, 1864, 9442, 1, 5),
(15, 15, '28', 'đường Cầu Diễn, phường Phú Diễn', 1, 2, 'Gần chợ, ATM, cây xăng,nhà thuốc,ĐH Công Nghiệp(500m),ĐH Thương Mại(1,7km),Sân Khấu Điện Ảnh(1,7km),ĐH Ngoại Ngữ(2,5km),ĐH FPT Poly Technic (2km),Cao Đẳng Công Nghiệp In( 200m)', 1, 30, 3000000, 0, 1, 1, 2, 0, 1, 0, 1864, 9442, 1, 3),
(16, 16, '36', 'Phường Phúc La', 1, 4, 'Gần Linh Đàm,Nguyễn Trãi, nguyễn xiển, triều khúc, đại học thăng long, Học viện An Ninh...', 1, 25, 2500000, 1, 1, 1, 2, 0, 1, 0, 1864, 9442, 2, 6),
(17, 17, '28/28', 'Đường Đại Linh, Phường Trung Văn', 1, 9, 'Vị trí: Số 3, ngách 28/28, ngõ 28 đường Đại Linh, Trung Văn, Nam Từ Liêm, Hà Nội.', 1, 23, 2800000, 0, 1, 1, 2, 1, 1, 0, 1864, 9442, 1, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nonactivepostslist`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `nonactivepostslist`;
CREATE TABLE IF NOT EXISTS `nonactivepostslist` (
`account_id` int(11)
,`post_title` varchar(255)
,`post_description` text
,`post_price` int(11)
,`update_time` datetime
,`username` varchar(255)
,`motel_id` int(11)
,`post_id` int(11)
,`house_number` varchar(20)
,`street` varchar(255)
,`province_id` int(11)
,`district_id` int(11)
,`close_place` varchar(255)
,`number_of_rooms` int(11)
,`area` int(11)
,`price` int(11)
,`owner` tinyint(1)
,`bath_type` tinyint(1)
,`water_heater` tinyint(1)
,`kitchen` int(11)
,`air_conditioner` tinyint(1)
,`balcony` tinyint(1)
,`style_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `update_time` datetime NOT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `post_price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time` int(11) NOT NULL,
  `confirm_date` datetime DEFAULT NULL,
  `rental_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_ibfk_1` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `account_id`, `post_title`, `post_description`, `update_time`, `expiry_date`, `post_price`, `status`, `time`, `confirm_date`, `rental_status`) VALUES
(14, 5, 'CHO THUÊ PHÒNG KHÉP KÍN ĐỦ ĐỒ', 'Full nội thất đầy đủ tiện nghi.', '2020-12-20 22:34:40', '2020-12-27 23:12:59', 70000, 1, 7, '2020-12-20 23:12:59', 0),
(15, 5, 'Cho Thuê Phòng Trọ Khép Kín, Chính Chủ', '- Có sẵn internet cáp quang wifi tốc độ cao .\r\n- Chỗ để xe miễn phí ngay tầng 1.\r\n- Giặt miễn phí có sẵn máy giặt chung.', '2020-12-21 02:17:27', '2020-12-28 02:17:27', 70000, 2, 7, '2020-12-21 02:17:27', 0),
(16, 5, 'Cho thuê phòng trọ. ccmn ở Cầu Bươu, gần Nguyễn Trãi', '- Để xe tầng 1 rộng rãi free.\r\n- An ninh đảm bảo, có camera quan sát.\r\n- Yên tĩnh, phòng sạch đẹp, có cửa sổ to thoáng mát.', '2020-12-21 03:28:53', '2021-01-04 03:28:53', 140000, 1, 14, '2020-12-21 03:28:53', 0),
(17, 6, 'Cho thuê phòng trọ 25m2 khép kín, giá 2,8tr/th', '- Nội thất: Điều hòa, giường, Tủ, nóng lạnh, ....\r\n- Giờ giấc đi lại tự do, nhà có khóa vân tay nên chỉ người trong nhà mới ra vào được.\r\n- ƯU TIÊN NGƯỜI ĐI LÀM Ở TỬ TẾ, LÂU DÀI!', '2020-12-22 17:34:59', '2020-12-29 17:34:59', 70000, 1, 7, '2020-12-22 17:34:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `post_id` (`post_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `removedpostslist`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `removedpostslist`;
CREATE TABLE IF NOT EXISTS `removedpostslist` (
`account_id` int(11)
,`post_title` varchar(255)
,`post_description` text
,`post_price` int(11)
,`update_time` datetime
,`expiry_date` datetime
,`time` int(11)
,`confirm_date` datetime
,`username` varchar(255)
,`motel_id` int(11)
,`post_id` int(11)
,`house_number` varchar(20)
,`street` varchar(255)
,`province_id` int(11)
,`district_id` int(11)
,`close_place` varchar(255)
,`number_of_rooms` int(11)
,`area` int(11)
,`price` int(11)
,`owner` tinyint(1)
,`bath_type` tinyint(1)
,`water_heater` tinyint(1)
,`kitchen` int(11)
,`air_conditioner` tinyint(1)
,`balcony` tinyint(1)
,`style_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
CREATE TABLE IF NOT EXISTS `style` (
  `style_id` int(11) NOT NULL AUTO_INCREMENT,
  `style_name` varchar(200) NOT NULL,
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

-- --------------------------------------------------------

--
-- Structure for view `activepostslist`
--
DROP TABLE IF EXISTS `activepostslist`;

DROP VIEW IF EXISTS `activepostslist`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activepostslist`  AS  select `p`.`account_id` AS `account_id`,`p`.`post_title` AS `post_title`,`p`.`post_description` AS `post_description`,`p`.`post_price` AS `post_price`,`p`.`update_time` AS `update_time`,`p`.`expiry_date` AS `expiry_date`,`p`.`time` AS `time`,`p`.`confirm_date` AS `confirm_date`,`a`.`username` AS `username`,`m`.`motel_id` AS `motel_id`,`m`.`post_id` AS `post_id`,`m`.`house_number` AS `house_number`,`m`.`street` AS `street`,`m`.`province_id` AS `province_id`,`m`.`district_id` AS `district_id`,`m`.`close_place` AS `close_place`,`m`.`number_of_rooms` AS `number_of_rooms`,`m`.`area` AS `area`,`m`.`price` AS `price`,`m`.`owner` AS `owner`,`m`.`bath_type` AS `bath_type`,`m`.`water_heater` AS `water_heater`,`m`.`kitchen` AS `kitchen`,`m`.`air_conditioner` AS `air_conditioner`,`m`.`balcony` AS `balcony`,`m`.`style_id` AS `style_id` from ((`post` `p` join `account` `a` on((`a`.`account_id` = `p`.`account_id`))) join `motel` `m` on((`m`.`post_id` = `p`.`post_id`))) where (`p`.`status` = 1) order by `m`.`post_id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `nonactivepostslist`
--
DROP TABLE IF EXISTS `nonactivepostslist`;

DROP VIEW IF EXISTS `nonactivepostslist`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nonactivepostslist`  AS  select `p`.`account_id` AS `account_id`,`p`.`post_title` AS `post_title`,`p`.`post_description` AS `post_description`,`p`.`post_price` AS `post_price`,`p`.`update_time` AS `update_time`,`a`.`username` AS `username`,`m`.`motel_id` AS `motel_id`,`m`.`post_id` AS `post_id`,`m`.`house_number` AS `house_number`,`m`.`street` AS `street`,`m`.`province_id` AS `province_id`,`m`.`district_id` AS `district_id`,`m`.`close_place` AS `close_place`,`m`.`number_of_rooms` AS `number_of_rooms`,`m`.`area` AS `area`,`m`.`price` AS `price`,`m`.`owner` AS `owner`,`m`.`bath_type` AS `bath_type`,`m`.`water_heater` AS `water_heater`,`m`.`kitchen` AS `kitchen`,`m`.`air_conditioner` AS `air_conditioner`,`m`.`balcony` AS `balcony`,`m`.`style_id` AS `style_id` from ((`post` `p` join `account` `a` on((`a`.`account_id` = `p`.`account_id`))) join `motel` `m` on((`m`.`post_id` = `p`.`post_id`))) where (`p`.`status` = 0) order by `m`.`post_id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `removedpostslist`
--
DROP TABLE IF EXISTS `removedpostslist`;

DROP VIEW IF EXISTS `removedpostslist`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `removedpostslist`  AS  select `p`.`account_id` AS `account_id`,`p`.`post_title` AS `post_title`,`p`.`post_description` AS `post_description`,`p`.`post_price` AS `post_price`,`p`.`update_time` AS `update_time`,`p`.`expiry_date` AS `expiry_date`,`p`.`time` AS `time`,`p`.`confirm_date` AS `confirm_date`,`a`.`username` AS `username`,`m`.`motel_id` AS `motel_id`,`m`.`post_id` AS `post_id`,`m`.`house_number` AS `house_number`,`m`.`street` AS `street`,`m`.`province_id` AS `province_id`,`m`.`district_id` AS `district_id`,`m`.`close_place` AS `close_place`,`m`.`number_of_rooms` AS `number_of_rooms`,`m`.`area` AS `area`,`m`.`price` AS `price`,`m`.`owner` AS `owner`,`m`.`bath_type` AS `bath_type`,`m`.`water_heater` AS `water_heater`,`m`.`kitchen` AS `kitchen`,`m`.`air_conditioner` AS `air_conditioner`,`m`.`balcony` AS `balcony`,`m`.`style_id` AS `style_id` from ((`post` `p` join `account` `a` on((`a`.`account_id` = `p`.`account_id`))) join `motel` `m` on((`m`.`post_id` = `p`.`post_id`))) where (`p`.`status` = 2) order by `m`.`post_id` desc ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`);

--
-- Constraints for table `motel`
--
ALTER TABLE `motel`
  ADD CONSTRAINT `motel_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `motel_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`),
  ADD CONSTRAINT `motel_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`),
  ADD CONSTRAINT `motel_ibfk_4` FOREIGN KEY (`style_id`) REFERENCES `style` (`style_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
