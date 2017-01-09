-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2017 at 12:43 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_detail_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `product_detail_id`, `count`, `user_id`) VALUES
(1, 1, 3, 1),
(8, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT '0',
  `content` varchar(1000) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `created_day` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `product_id`, `content`, `user_id`, `created_day`) VALUES
(1, 1, 'Khá đẹp', 1, '2017-01-07 01:34:47'),
(2, 1, 'Đẹp', 1, '2017-01-07 00:00:00'),
(3, 1, 'Đẹp', 1, '2017-01-08 08:57:18'),
(4, 1, 'Đẹp', 1, '2017-01-08 09:03:42'),
(5, 1, 'aaaaaaaaaaa', 1, '2017-01-08 10:19:53'),
(6, 1, 'aaaaaaaaaaaaaaaaaaaaaaa', 1, '2017-01-08 10:23:52'),
(7, 1, 'aaaaaaaaaaaaa', 1, '2017-01-08 10:24:41'),
(8, 1, 'aaaaaaaaa', 1, '2017-01-08 10:25:29'),
(9, 1, 'ccccccccccc', 1, '2017-01-08 10:26:02'),
(10, 1, 'dddddddddddddddd', 1, '2017-01-08 10:26:29'),
(11, 9, 'Maokai siêu gánh team', 2, '2017-01-08 00:00:00'),
(12, 9, 'Poppy siêu carry', 3, '2017-01-08 00:02:06'),
(13, 10, 'Sơn là người carry chủ lực', 4, '2017-01-08 00:00:00'),
(14, 11, 'Chương phế vật nhất team', 1, '2017-01-08 01:02:03'),
(15, 12, 'Tâm phế vật', 4, '2017-01-09 00:00:00'),
(16, 13, 'abcxyz', 2, '2017-01-08 02:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_day` datetime NOT NULL,
  `total_money` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` char(11) NOT NULL,
  `email` char(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `created_day` datetime NOT NULL,
  `image_name` varchar(50) NOT NULL COMMENT 'tên hình đại diện',
  `count` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `type`, `price`, `created_day`, `image_name`, `count`) VALUES
(1, 'giày sneaker nam', 'Giày thoải mái, đẹp , hợp thời trang', 'Nam', 1000000, '2017-01-06 15:42:52', 'upload/images/5.jpg', 100),
(2, 'giày sneaker nữ', 'Giày thoải mái, hợp thời trang', 'Nữ', 1000000, '2017-01-06 22:20:05', 'upload/images/5.jpg', 100),
(8, 'giày sneaker', 'đẹp, chất lượng tốt', 'nam', 100000, '2017-01-07 07:08:05', 'upload/images/5.jpg', 1010),
(9, 'Giày Nike', 'Giày bền đẹp', 'Nam', 150000, '2017-01-08 00:00:00', 'upload/images/nike.jpg', 100),
(10, 'Giày cao gót', 'Giày bền đẹp', 'Nữ', 100000, '2017-01-08 00:00:00', 'upload/images/giaycaogot.jpg', 12),
(11, 'Giày Converse', 'Giày bền đẹp', 'Nam', 200000, '2017-01-08 00:00:00', 'upload/images/converse.jpg', 10),
(12, 'Giày Boot', 'Giày bền đẹp', 'Nữ', 120000, '2017-01-08 00:00:00', 'upload/images/boot.jpg', 10),
(13, 'Giày Adidas', 'Giày bền đẹp', 'Nam', 160000, '2017-01-08 00:00:00', 'upload/images/adidas.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `size` char(5) DEFAULT NULL,
  `color` char(15) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_detail_id`, `product_id`, `size`, `color`, `count`) VALUES
(1, 1, '40', 'Xanh', 50),
(2, 2, '41', 'Đỏ', 100),
(5, 8, '41', 'xanh', 10),
(6, 8, '42', 'đỏ', 10),
(7, 1, '42', 'Đỏ', 50),
(8, 9, '42', 'Xanh', 50),
(9, 9, '41', 'Đỏ', 50),
(10, 10, '40', 'Xanh', 6),
(11, 10, '41', 'Đỏ', 6),
(12, 11, '41', 'Xanh', 5),
(13, 11, '41', 'Đỏ', 5),
(14, 12, '40', 'Xanh', 5),
(15, 12, '41', 'Đỏ', 5),
(16, 13, '41', 'Xanh', 15),
(17, 13, '42', 'Đỏ', 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_onsale`
--

DROP TABLE IF EXISTS `product_onsale`;
CREATE TABLE IF NOT EXISTS `product_onsale` (
  `product_id` int(11) NOT NULL,
  `percent` char(10) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `note` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` char(50) NOT NULL,
  `password` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_day` datetime NOT NULL,
  `admin` enum('Y','N') NOT NULL,
  PRIMARY KEY (`user_id`,`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `name`, `created_day`, `admin`) VALUES
(1, 'tamle', 123456, 'Tâm Lê', '2017-01-06 20:12:53', 'Y'),
(2, 'tamle123', 123456, 'Tâm Lê', '2017-01-07 19:09:12', 'N'),
(3, 'vulehoangson', 933640651, 'Hoàng Sơn', '2017-01-08 00:00:00', 'Y'),
(4, 'nguyenxuanchuong', 123456789, 'Xuân Chương', '2017-01-08 00:00:00', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
