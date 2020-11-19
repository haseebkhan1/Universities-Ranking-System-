-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2016 at 05:47 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `universityrankingsystem`
--
CREATE DATABASE IF NOT EXISTS `universityrankingsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `universityrankingsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Uni_id` int(11) NOT NULL AUTO_INCREMENT,
  `UniversityName` text NOT NULL,
  `username` text NOT NULL,
  `Password` varchar(50) NOT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`Uni_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Uni_id`, `UniversityName`, `username`, `Password`, `score`) VALUES
(1, 'Quaid-e-Azam University', 'qa@edu.pk', '1234', 100),
(2, 'National University of Science and Technology', 'nust@edu.pk', '1234', 64),
(3, 'Pakistan Institute of Engineering and Applied Sciences', 'pieas@edu.pk', '1234', 32),
(4, 'Bahria University Islamabad', 'bui@edu.pk', '1234', 61),
(5, 'Air University Islamabad', 'aui@edu.pk', '1234', 28),
(6, 'International Islamic University Islamabad', 'iiui@edu.pk', '1234', 49),
(7, 'Riphah International University', 'riu@edu.pk', '1234', NULL),
(8, 'Abasyn University Islamabad', 'abui@edu.pk', '1234', 44),
(9, 'Foundation University Rawalpindi Campus', 'fui@edu.pk', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `Uni_id` int(11) NOT NULL,
  `UniversityName` varchar(50) NOT NULL,
  `F1` double NOT NULL,
  `F2` double NOT NULL,
  `F3` double NOT NULL,
  `F4` double NOT NULL,
  `F5` double NOT NULL,
  `F6` double NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`Uni_id`, `UniversityName`, `F1`, `F2`, `F3`, `F4`, `F5`, `F6`, `score`) VALUES
(1, 'Quaid-e-Azam University', 87, 3545, 435486, 754, 687534, 354, 0),
(2, 'National University of Science and Technology', 878, 5435, 4854, 3235, 487, 54354, 0),
(3, 'Pakistan Institute of Engineering and Applied Scie', 37, 54, 24, 58, 985, 534, 0),
(4, 'Bahria University Islamabad', 6854, 32458, 5354, 86754, 3458, 354, 0),
(5, 'Air University Islamabad', 984, 65, 354, 984, 54, 35, 0),
(6, 'International Islamic University Islamabad', 867534, 5347, 3548, 54, 53, 5468, 0),
(9, 'Foundation University Rawalpindi Campus', 5657, 76765, 534637, 86586, 6336, 74786, 0),
(8, 'Abasyn University Islamabad', 68578, 3578, 358, 6878, 6867, 687, 0);

-- --------------------------------------------------------

--
-- Table structure for table `internationalization`
--

CREATE TABLE IF NOT EXISTS `internationalization` (
  `Uni_id` int(11) NOT NULL,
  `UniversityName` varchar(50) NOT NULL,
  `I1` double NOT NULL,
  `I2` double NOT NULL,
  `I3` double NOT NULL,
  `I4` double NOT NULL,
  `I5` double NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internationalization`
--

INSERT INTO `internationalization` (`Uni_id`, `UniversityName`, `I1`, `I2`, `I3`, `I4`, `I5`, `score`) VALUES
(1, 'Quaid-e-Azam University', 67, 3545, 46, 435487, 54, 0),
(2, 'National University of Science and Technology', 834, 54352, 4, 5445, 7, 0),
(3, 'Pakistan Institute of Engineering and Applied Scie', 785, 454, 54, 37, 75, 0),
(4, 'Bahria University Islamabad', 873, 545, 4867, 54, 876, 0),
(5, 'Air University Islamabad', 86754, 578, 354, 684, 324, 0),
(6, 'International Islamic University Islamabad', 68754, 586, 53487, 54, 54, 0),
(9, 'Foundation University Rawalpindi Campus', 4654665465, 45, 44, 4546, 48658, 0),
(8, 'Abasyn University Islamabad', 2345, 54534, 3543, 32354, 897987968, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
  `Uni_id` int(11) NOT NULL AUTO_INCREMENT,
  `UniversityName` varchar(50) NOT NULL,
  `R1` varchar(50) NOT NULL,
  `R2` varchar(50) NOT NULL,
  `R3` varchar(50) NOT NULL,
  `R4` varchar(50) NOT NULL,
  `R5` varchar(50) NOT NULL,
  `R6` varchar(50) NOT NULL,
  `R7` varchar(50) NOT NULL,
  `R8` varchar(50) NOT NULL,
  `R9` varchar(50) NOT NULL,
  `R10` varchar(50) NOT NULL,
  `R11` varchar(50) NOT NULL,
  `R12` varchar(50) NOT NULL,
  `R13` varchar(50) NOT NULL,
  `R14` varchar(50) NOT NULL,
  `I1` varchar(50) NOT NULL,
  `I2` varchar(50) NOT NULL,
  `I3` varchar(50) NOT NULL,
  `I4` varchar(50) NOT NULL,
  `I5` varchar(50) NOT NULL,
  `T1` varchar(50) NOT NULL,
  `T2` varchar(50) NOT NULL,
  `T3` varchar(50) NOT NULL,
  `T4` varchar(50) NOT NULL,
  `T5` varchar(50) NOT NULL,
  `S1` varchar(50) NOT NULL,
  `S2` varchar(50) NOT NULL,
  `S3` varchar(50) NOT NULL,
  `S4` varchar(50) NOT NULL,
  `S5` varchar(50) NOT NULL,
  `F1` varchar(50) NOT NULL,
  `F2` varchar(50) NOT NULL,
  `F3` varchar(50) NOT NULL,
  `F4` varchar(50) NOT NULL,
  `F5` varchar(50) NOT NULL,
  `F6` varchar(50) NOT NULL,
  `CL` varchar(50) NOT NULL,
  PRIMARY KEY (`Uni_id`),
  UNIQUE KEY `Uni_id` (`Uni_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`Uni_id`, `UniversityName`, `R1`, `R2`, `R3`, `R4`, `R5`, `R6`, `R7`, `R8`, `R9`, `R10`, `R11`, `R12`, `R13`, `R14`, `I1`, `I2`, `I3`, `I4`, `I5`, `T1`, `T2`, `T3`, `T4`, `T5`, `S1`, `S2`, `S3`, `S4`, `S5`, `F1`, `F2`, `F3`, `F4`, `F5`, `F6`, `CL`) VALUES
(1, 'Quaid-e-Azam University', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Good', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Good', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent'),
(2, 'National University of Science and Technology', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Good', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Good'),
(3, 'Pakistan Institute of Engineering and Applied Scie', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Good', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory'),
(4, 'Bahria University Islamabad', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Good'),
(5, 'Air University Islamabad', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Good', 'Satisfactory', 'Satisfactory'),
(6, 'International Islamic University Islamabad', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Good', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Good', 'Satisfactory', 'Satisfactory'),
(8, 'Abasyn University Islamabad', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory'),
(9, 'Foundation University Rawalpindi Campus', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Good', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Satisfactory', 'Satisfactory');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `Uni_id` int(11) NOT NULL AUTO_INCREMENT,
  `UniversityName` varchar(50) NOT NULL,
  `R1` double NOT NULL,
  `R2` double NOT NULL,
  `R3` double NOT NULL,
  `R4` double NOT NULL,
  `R5` double NOT NULL,
  `R6` double NOT NULL,
  `R7` double NOT NULL,
  `R8` double NOT NULL,
  `R9` double NOT NULL,
  `R10` double NOT NULL,
  `R11` double NOT NULL,
  `R12` double NOT NULL,
  `R13` double NOT NULL,
  `R14` double NOT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`Uni_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`Uni_id`, `UniversityName`, `R1`, `R2`, `R3`, `R4`, `R5`, `R6`, `R7`, `R8`, `R9`, `R10`, `R11`, `R12`, `R13`, `R14`, `score`) VALUES
(1, 'Quaid-e-Azam University', 68, 34, 54, 5468, 7354, 87, 354687, 54, 354, 863, 465, 45, 435, 486, 36),
(2, 'National University of Science and Technology', 786, 354, 6821, 54, 4534168, 454, 644, 4, 2454, 2135, 54, 865453, 454, 23, 22),
(3, 'Pakistan Institute of Engineering and Applied Scie', 878, 54534, 8745, 5454534, 5457, 5487, 5478, 5445, 878, 5487, 54, 54, 5487, 453, 22),
(4, 'Bahria University Islamabad', 875, 457, 537, 5435, 8735, 4534, 8754, 3548, 7534, 5348, 7865, 4867, 545, 853, 20),
(5, 'Air University Islamabad', 13254, 8675, 354, 687, 54, 6548, 658, 54, 3548, 657, 65, 867, 545, 687, 9),
(6, 'International Islamic University Islamabad', 645, 53457, 54354, 853, 45378, 5348, 7534, 8534, 534, 87, 548, 5486, 354, 8654, 13),
(8, 'Abasyn University Islamabad', 2432, 345, 543563, 32425, 324, 3245436, 245, 4523, 4352, 5424, 245, 465, 43456, 23523, 8),
(9, 'Foundation University Rawalpindi Campus', 2.2, 33, 44, 4.55, 33, 30888, 45778, 235555, 46.87, 12356, 77, 6356, 6546, 5465, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_integration`
--

CREATE TABLE IF NOT EXISTS `social_integration` (
  `Uni_id` int(11) NOT NULL,
  `UniversityName` varchar(50) NOT NULL,
  `S1` double NOT NULL,
  `S2` double NOT NULL,
  `S3` double NOT NULL,
  `S4` double NOT NULL,
  `S5` double NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_integration`
--

INSERT INTO `social_integration` (`Uni_id`, `UniversityName`, `S1`, `S2`, `S3`, `S4`, `S5`, `score`) VALUES
(1, 'Quaid-e-Azam University', 985, 435, 487, 5435, 54, 0),
(2, 'National University of Science and Technology', 687, 544, 354.21, 534, 354, 0),
(3, 'Pakistan Institute of Engineering and Applied Scie', 68, 54, 94, 24, 55, 0),
(4, 'Bahria University Islamabad', 6745, 323488, 68454, 548, 95468, 0),
(5, 'Air University Islamabad', 9754, 354, 86452, 54, 354, 0),
(6, 'International Islamic University Islamabad', 86745, 7875, 4538678, 4575, 548, 0),
(9, 'Foundation University Rawalpindi Campus', 45647, 74675, 76476, 67476, 76476, 0),
(8, 'Abasyn University Islamabad', 867676, 35468789, 3546878, 358789, 68789, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teaching`
--

CREATE TABLE IF NOT EXISTS `teaching` (
  `Uni_id` int(11) NOT NULL,
  `UniversityName` varchar(50) NOT NULL,
  `T1` double NOT NULL,
  `T2` double NOT NULL,
  `T3` double NOT NULL,
  `T4` double NOT NULL,
  `T5` double NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaching`
--

INSERT INTO `teaching` (`Uni_id`, `UniversityName`, `T1`, `T2`, `T3`, `T4`, `T5`, `score`) VALUES
(1, 'Quaid-e-Azam University', 6874, 35456, 4453, 534, 56, 0),
(2, 'National University of Science and Technology', 534, 54531, 215, 4545, 48, 0),
(3, 'Pakistan Institute of Engineering and Applied Scie', 867, 48, 54, 87, 35, 0),
(4, 'Bahria University Islamabad', 6543, 32154, 874, 658, 654, 0),
(5, 'Air University Islamabad', 534, 68786, 65432, 54, 53, 0),
(6, 'International Islamic University Islamabad', 8754, 5478, 545387, 5435487, 5353, 0),
(9, 'Foundation University Rawalpindi Campus', 47657, 4654, 76576, 76476, 76476, 0),
(8, 'Abasyn University Islamabad', 878756, 689798, 65465, 8958998, 5686798, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
