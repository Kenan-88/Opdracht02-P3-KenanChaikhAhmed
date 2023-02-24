-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2023 at 01:56 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaMaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `pizaaBestelling`
--

DROP TABLE IF EXISTS `pizaaBestelling`;
CREATE TABLE IF NOT EXISTS `pizaaBestelling` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `formaat` varchar(100) NOT NULL,
  `saus` varchar(100) NOT NULL,
  `topping` varchar(100) NOT NULL,
  `kruiden` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizaaBestelling`
--

INSERT INTO `pizaaBestelling` (`id`, `formaat`, `saus`, `topping`, `kruiden`) VALUES
(4, '20', 'spicy', 'vegetarisch', 'Chili flakes,zwarte peper'),
(5, '20', 'spicy', 'vegetarisch', 'Chili flakes,zwarte peper'),
(6, '30', 'spicy', 'vegetarisch', 'peterselie,oregano,Chili flakes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
