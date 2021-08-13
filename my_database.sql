-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2021 at 07:35 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `customertable`
--

DROP TABLE IF EXISTS `customertable`;
CREATE TABLE IF NOT EXISTS `customertable` (
  `Sno` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `A/c No.` int NOT NULL,
  `Contact No.` int NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Current Balance` int NOT NULL,
  `Operation` varchar(50) NOT NULL,
  PRIMARY KEY (`Sno`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customertable`
--

INSERT INTO `customertable` (`Sno`, `Name`, `A/c No.`, `Contact No.`, `Email`, `Current Balance`, `Operation`) VALUES
(1, 'Ahana Roy', 1020300955, 880062403, 'ahana@gmail.com', 4800, 'Transfer'),
(2, 'Rhea Arora', 1020300955, 894647102, 'rhea@gmail.com', 25000, 'Transfer'),
(3, 'Candy', 2030789046, 809231542, 'candy@gmail.com', 6250, 'Transfer'),
(4, 'Harry Potter', 1500621944, 828263631, 'harry@gmail.com', 23500, 'Transfer'),
(5, 'Andrew Williams', 1378964002, 783015597, 'andrew@gmail.com', 21000, 'Transfer'),
(6, 'Aradhya', 1820309674, 798220345, 'aradhya@gmail.com', 28000, 'Transfer'),
(7, 'Jennifer ', 2065210031, 984657128, 'jennifer@gmail.com', 10500, 'Transfer'),
(8, 'Peter ', 1030456621, 984652140, 'peter@gmail.com', 9500, 'Transfer'),
(9, 'Ritvik Yadav', 1520309950, 782031564, 'ritvik@gmail.com', 40000, 'Transfer'),
(10, 'John Siemans', 1126400057, 786320198, 'john@gmail.com', 32500, 'Transfer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
