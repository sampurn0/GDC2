-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2015 at 11:22 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Fitria', 'admin', 'e2fc714c4727ee9395f324cd2e7f331f');

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE IF NOT EXISTS `cluster` (
  `id_cluster` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cluster` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cluster`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id_cluster`, `nama_cluster`, `keterangan`, `gambar`) VALUES
(1, 'Acacia', 'Baru', ''),
(2, 'Alamanda', 'Baguus', '10_HZPK.jpg'),
(3, 'fsfgerg', 'bdgbfgn', ''),
(4, 'wef', 'fsgerh', ''),
(5, 'vfethry', 'nghkik Â ertge egergÂ ', ''),
(6, 'gweger', 'erherhh46u', '2x.jpg'),
(7, 'asdasdas', 'asdasd', 'balom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(20) NOT NULL,
  `sub` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `sub`) VALUES
(1, 'Harga', '4'),
(5, 'Lokasi', '4'),
(6, 'Fasum', '4'),
(7, 'Akses Jalan', '2'),
(8, 'Luas Bangunan', '4');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE IF NOT EXISTS `log_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  `username` varchar(100) NOT NULL,
  `sessionid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `login`, `last_login`, `username`, `sessionid`) VALUES
(1, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'QlY2uc0KR57aUDde\n'),
(2, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'tlEYUESXjAYXSX8G\n'),
(3, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', '4eTraTo43GNau8PI\n'),
(4, '2015-05-14 05:10:33', '2015-05-14 07:10:33', '', '0dbWDvB88YsQHctI\n'),
(5, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'hjx3pxHXeva8di6d\n'),
(6, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', '4plg6eXnCvVHyMyc\n'),
(7, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'juWPQb6IfPVewO1J\n'),
(8, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'DAJcypcP0yf2EfeK\n'),
(9, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'VCpkN9NAhPUq4iVE\n'),
(10, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'dx1W9BsaMFeEXzI3\n'),
(11, '2015-05-14 05:10:33', '2015-05-14 07:10:33', '', 'OkH69NZ1TDere7TF\n'),
(12, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'MOWGqvkVo2c5TZ9X\n'),
(13, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'BXJfUfrq7d2FUX1h\n'),
(14, '2015-05-14 05:10:33', '2015-05-14 07:10:33', '', 'czXYy6pdVOcJh16P\n'),
(15, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'WYzHQ6WmOEPDt5tT\n'),
(16, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'tCerrhvFkBRy4jPs\n'),
(17, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'jwXIFt45ZDgZBydc\n'),
(18, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'ef0HoHkYKrsWQEUl\n'),
(19, '2015-05-14 05:10:33', '2015-05-14 07:10:33', 'admin', 'c2YRoNnPQCmEwaii\n'),
(20, '2015-05-14 05:10:49', '0000-00-00 00:00:00', '', 'd7t0jLplfULJIV2X\n'),
(21, '2015-05-14 05:11:11', '0000-00-00 00:00:00', '', 'vrxeQXkN0zTvuBj2\n'),
(22, '2015-05-14 05:11:17', '0000-00-00 00:00:00', 'admin', '5bdsTCkDSSBFsLXi\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
