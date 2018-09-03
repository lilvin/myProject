-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2018 at 02:19 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `idNumber` int(10) NOT NULL,
  `mobileNumber` int(10) NOT NULL,
  `hospitaID` int(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `bloodType` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `appointmentType` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`idNumber`, `mobileNumber`, `hospitaID`, `location`, `bloodType`, `date`, `appointmentType`) VALUES
(0, 0, 101, 'nairobi', '', '2018-09-10', 'recipient'),
(233133, 7123456, 101, 'nairobi', '', '2018-09-12', 'recipient'),
(23102356, 705895190, 101, 'NAIROBI', 'A', '2020-09-08', 'recipient'),
(29160543, 712940267, 101, 'nairobi', 'A+', '2018-09-10', 'recipient'),
(123456, 701236547, 123, 'location', 'blood', '2018-09-09', 'recipient'),
(29160543, 712365489, 101, 'Nairobi', 'A+', '2018-09-22', 'DONOR'),
(23313323, 712940267, 101, 'nairobi', 'B+', '2018-09-20', 'RECIPIENT'),
(29160543, 712940267, 101, 'Nairobi', 'A+', '2018-09-14', 'RECIPIENT');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `hospitalID` int(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`hospitalID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospitalID`, `location`, `name`, `mobileNo`, `email`) VALUES
(101, 'nairobi', 'Mbagathi hospital', 714562312, 'mbagathi@gmail.com'),
(103, 'nairobi', 'The nairobi hospital', 714562312, 'test1@tracom.co.ke'),
(108, 'nairobi', 'prikl ltd', 714562312, 'billy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `idNumber` int(10) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `idNumber`, `mobile`, `email`, `userType`, `password`) VALUES
('lilian', 'stacy', 31025957, 705895190, 'liliankirito@gmail.com', 'user', 'a0bbaaa6c8608db42d807d321845240d'),
('lil', 'fdff', 32012200, 705895190, 'liliankirito@gmail.com', 'admin', 'a0bbaaa6c8608db42d807d321845240d'),
('billy', 'liam', 233133, 705895190, 'billy@gmail.com', 'admin', 'admin'),
('linda', 'lal', 123456, 712365489, 'linda@gmail.com', 'user', 'linda'),
('ann', 'thiauru', 123654, 705895190, 'ken@gmail.com', 'user', '123456789'),
('ab', 'ba', 29160543, 712322125, 'lily@gmail.com', 'user', '123'),
('ROY', 'CHOGE', 29160543, 712365489, 'chogeroy@gmail.com', 'user', 'roy'),
('lilian', 'lily', 25152312, 711122235, 'ab@gmail.com', 'user', 'ba');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
