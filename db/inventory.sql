-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2015 at 06:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(250) NOT NULL,
  `cAddedBy` varchar(4) NOT NULL,
  `cEntryDate` datetime NOT NULL,
  PRIMARY KEY (`cId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cId`, `cName`, `cAddedBy`, `cEntryDate`) VALUES
(1, 'Book', '1000', '2015-05-16 07:27:15'),
(2, 'Shoes', '1000', '2015-05-16 07:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `invId` varchar(50) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `cContactNumber` varchar(20) NOT NULL,
  `cAddress` text NOT NULL,
  `pId` int(11) NOT NULL,
  `pQuantity` int(4) NOT NULL,
  `bDate` datetime NOT NULL,
  PRIMARY KEY (`cId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cId`, `invId`, `cName`, `cContactNumber`, `cAddress`, `pId`, `pQuantity`, `bDate`) VALUES
(4, 'Ipm6fFK5', 'Test User', '93857348985', 'IIUM, Malaysia', 1, 3, '2015-05-21 18:11:16'),
(5, 'NZh9FVGY', 'Abc', '6943759385', 'hello world', 2, 4, '2015-05-21 18:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `logintime`
--

CREATE TABLE IF NOT EXISTS `logintime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(4) NOT NULL,
  `loginTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `logintime`
--

INSERT INTO `logintime` (`id`, `uId`, `loginTime`) VALUES
(45, 1001, '2015-05-16 10:34:17'),
(46, 1001, '2015-05-16 10:42:58'),
(47, 1000, '2015-05-16 10:54:18'),
(48, 1000, '2015-05-16 10:58:23'),
(49, 1000, '2015-05-16 11:42:10'),
(50, 1000, '2015-05-21 14:18:20'),
(51, 1000, '2015-05-21 15:44:28'),
(52, 1001, '2015-05-21 15:59:45'),
(53, 1000, '2015-05-21 16:13:50'),
(54, 1001, '2015-05-21 16:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `logouttime`
--

CREATE TABLE IF NOT EXISTS `logouttime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(4) NOT NULL,
  `logoutTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `logouttime`
--

INSERT INTO `logouttime` (`id`, `uId`, `logoutTime`) VALUES
(2, 1001, '2015-05-16 10:42:44'),
(3, 1001, '2015-05-16 10:54:10'),
(4, 1000, '2015-05-16 10:58:16'),
(5, 1000, '2015-05-16 11:03:59'),
(6, 1000, '2015-05-16 11:57:57'),
(7, 1000, '2015-05-21 15:59:36'),
(8, 1001, '2015-05-21 16:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `nId` int(11) NOT NULL AUTO_INCREMENT,
  `nToWhom` varchar(10) NOT NULL,
  `nFromWhom` int(4) NOT NULL,
  `newUserId` int(4) NOT NULL,
  `nMessage` varchar(255) NOT NULL,
  `nDate` datetime NOT NULL,
  `delete` int(1) NOT NULL,
  PRIMARY KEY (`nId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nId`, `nToWhom`, `nFromWhom`, `newUserId`, `nMessage`, `nDate`, `delete`) VALUES
(4, 'admin', 1001, 1004, 'Added a new user <b>mynewuser </b> (1004) has created. ', '2015-05-21 16:13:23', 0),
(7, 'admin', 1000, 1004, 'A user <b>mynewuser </b> (1004) has been deleted. Do you want to really delete? ', '2015-05-21 16:37:56', 1),
(8, 'admin', 1001, 1004, 'Added a new user <b>welcome </b> (1004) has created. ', '2015-05-21 17:02:08', 0),
(9, 'admin', 1001, 1004, 'A user <b>welcome </b> (1004) has been deleted. Do you want to really delete? ', '2015-05-21 17:03:23', 1),
(10, 'admin', 1000, 1003, 'A user <b>demo </b> (1003) has been deleted. Do you want to really delete? ', '2015-05-21 17:47:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pId` int(11) NOT NULL AUTO_INCREMENT,
  `cId` int(11) NOT NULL,
  `pBarCode` varchar(50) NOT NULL,
  `pName` varchar(250) NOT NULL,
  `pBuyingPrice` varchar(10) NOT NULL,
  `pSellingPrice` varchar(10) NOT NULL,
  `pQuantity` int(5) NOT NULL,
  `pAddedBy` int(4) NOT NULL,
  `pEntryDate` datetime NOT NULL,
  PRIMARY KEY (`pId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pId`, `cId`, `pBarCode`, `pName`, `pBuyingPrice`, `pSellingPrice`, `pQuantity`, `pAddedBy`, `pEntryDate`) VALUES
(1, 1, '395734943534', 'Learn PHP by Example', '30', '40', 10, 1000, '2015-05-16 08:14:26'),
(2, 2, '5793769348', 'Nike', '75', '100', 5, 1000, '2015-05-16 08:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(3) NOT NULL,
  `uName` varchar(50) NOT NULL,
  `uPassword` varchar(50) NOT NULL,
  `uType` varchar(10) NOT NULL,
  `uFlag` tinyint(1) NOT NULL,
  `softDelete` int(1) NOT NULL,
  `uAddedBy` int(4) NOT NULL,
  `uEntryDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uId`, `uName`, `uPassword`, `uType`, `uFlag`, `softDelete`, `uAddedBy`, `uEntryDate`) VALUES
(1, 1000, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 1, 0, 1000, '2015-05-14'),
(2, 1001, 'test', '5f4dcc3b5aa765d61d8327deb882cf99', 'manager', 1, 0, 1000, '2015-05-15'),
(3, 1002, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 0, 0, 1000, '2015-05-15'),
(4, 1003, 'demo', '5f4dcc3b5aa765d61d8327deb882cf99', 'clark', 1, 1, 1000, '2015-05-15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
