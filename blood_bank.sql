-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2018 at 11:21 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31
create database blood_bank;
  use blood_bank;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
CREATE TABLE IF NOT EXISTS `donor` (
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `blood_group` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`first_name`, `last_name`, `username`, `password`, `email`, `phone`, `city`, `gender`, `blood_group`) VALUES
('anil', 'sharma', 'O+', 'indore', 'anil@demo', 'anil1234', 'sdf@sss.com', '70 0022 1871', 'male'),
('ankit', 'kumar', 'ankit123', 'ankit123', 'sdf@sss.com', '70 0022 1654', 'mumbai', 'male', 'AB+'),
('anuj', 'sharma', 'anuj123', 'anuj1234', 'sdf@sss.com', '70 0022 1871', 'mumbai', 'male', 'AB+');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `pname` varchar(200) NOT NULL,
  `blood_group` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pname`, `blood_group`, `city`, `gender`, `phone`, `email`, `date`) VALUES
('ankit', 'AB+', 'Mumbai', 'female', '1717171717', 'gg@ll.com', '2018-04-24'),
('arjun', 'O-', '01', 'male', '7161634343', 'aagg@kk.com', '2018-04-24'),
('rani', 'B-', 'Indore', 'female', '8181181118', 'rani@d.com', '2018-04-24'),
('anjali', 'O+', 'Kanpur', 'female', '70 0022 1871', 'ha@jj.com', '2018-04-24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
