-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2013 at 02:23 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: ``
--

-- --------------------------------------------------------

--
-- Table structure for table `autentikasi`
--

CREATE TABLE IF NOT EXISTS `autentikasi` (
  `idautentikasi` int(6) NOT NULL,
  `keyautentikasi` varchar(18) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idautentikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `keyautentikasi`
--

CREATE TABLE IF NOT EXISTS `keyautentikasi` (
  `idkey` int(3) NOT NULL,
  `key1` varchar(50) NOT NULL DEFAULT '100001',
  `key2` varchar(50) NOT NULL DEFAULT '200002',
  `key3` varchar(50) NOT NULL DEFAULT '300003',
  UNIQUE KEY `idkey` (`idkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Dumping data for table `keyautentikasi`
--

INSERT INTO `keyautentikasi` (`idkey`, `key1`, `key2`, `key3`) VALUES
(1, '4d71a4f293f4dfdc8d76a49e2682f065d33e6497', '42ff26142df0e79e4838372c11d3ba9dfd663902', '4c29c82ed15d9c6a120641c841473fdbf721ac38');

-- --------------------------------------------------------

--
-- Table structure for table `autentikasilogdetail`
--

CREATE TABLE IF NOT EXISTS `autentikasilogdetail` (
  `idautentikasilog` int(6) NOT NULL AUTO_INCREMENT,
  `ipaddresss` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idautentikasilog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `autentikasilogdetail`
--

INSERT INTO `autentikasilogdetail` (`idautentikasilog`, `ipaddresss`, `date`) VALUES
(9, '127.0.0.1', '2013-02-15 18:53:46'),
(10, '127.0.0.1', '2013-02-16 08:18:43');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
