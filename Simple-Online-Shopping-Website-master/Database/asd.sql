-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 02:50 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `catg` int(11) NOT NULL,
  `subcatg` int(11) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `catg` varchar(40) NOT NULL,
  `subcatg` varchar(40) NOT NULL,
  `img` varchar(30) NOT NULL,
  `itemno` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `catg`, `subcatg`, `img`, `itemno`, `price`) VALUES
(1, '1', '1', 'l1.jpg', '1', '2000'),
(2, '1', '1', 'l2.jpg', '2', '1800'),
(3, '1', '2', 'u1.jpg', '3', '800'),
(4, '1', '2', 'u2.jpg', '4', '1000'),
(5, '1', '3', 'al1.jpg', '5', '1200'),
(6, '1', '3', 'al2.jpg', '6', '2000'),
(7, '2', '1', 'nk1.jpg', '7', '3000'),
(8, '2', '1', 'nk2.jpg', '8', '4000'),
(9, '2', '2', 'ad1.jpg', '9', '3000'),
(10, '2', '2', 'ad2.jpg', '10', '2000'),
(11, '2', '3', 'w1.jpg', '11', '2000'),
(12, '2', '3', 'w2.jpg', '12', '900'),
(14, '3', '1', 'lv1.jpg', '14', '2000'),
(15, '3', '1', 'lv2.jpg', '15', '2500'),
(16, '3', '2', 'pp1.jpg', '16', '1800'),
(17, '3', '2', 'pp2.jpg', '17', '1200'),
(18, '3', '3', 'wg1.jpg', '18', '1400'),
(19, '3', '3', 'wg2.jpg', '19', '1700');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `catg` int(11) NOT NULL,
  `subcatg` int(11) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `address`) VALUES
(1, 'Jayaram', 'jayaram@gmail.com', 1327984650, 'jayaram123', 'Alappuzha'),
(2, 'GokulJK', 'gkjk@gmail.com', 7419638520, 'gkjk123', 'Trivandrum'),
(3, 'GokulB', 'gokulb@gmail.com', 9638527410, 'gokulb', 'Ernakulam');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
