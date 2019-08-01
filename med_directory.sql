-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2018 at 05:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `med.directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `comp_data`
--

DROP TABLE IF EXISTS `comp_data`;
CREATE TABLE IF NOT EXISTS `comp_data` (
  `comp_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(255) NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comp_data`
--

INSERT INTO `comp_data` (`comp_id`, `comp_name`, `address`, `contact_no`) VALUES
(2, 'Square', 'Mohakhali', 181233221),
(3, 'Square', 'Mohakhali', 181233221);

-- --------------------------------------------------------

--
-- Table structure for table `med_data`
--

DROP TABLE IF EXISTS `med_data`;
CREATE TABLE IF NOT EXISTS `med_data` (
  `med_id` int(11) NOT NULL AUTO_INCREMENT,
  `med_name` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  PRIMARY KEY (`med_id`),
  KEY `comp_name` (`comp_name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_data`
--

INSERT INTO `med_data` (`med_id`, `med_name`, `comp_name`, `generic_name`, `price`) VALUES
(1, 'Napa', 'Square', 'Paracetemol', 5),
(2, 'piriton', 'Gsk', 'chlorophenamite', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `password`) VALUES
(1, 'abir', 'abir@gmail.com', '9ab209d66a9bf2250d7f56cc4b3b125d'),
(2, 'amir', 'amira@gmail.com', '63eefbd45d89e8c91f24b609f7539942'),
(3, 'nazmu', 'nazmu@gmail.com', '0abb761a0415c51c6772da8c1da5c90d5f141dc3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
