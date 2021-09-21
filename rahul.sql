-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 06:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahul`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfer money`
--

CREATE TABLE `transfer money` (
  `Sr.No` int(9) NOT NULL,
  `sender` text NOT NULL,
  `reciever` text NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Sr.No` int(9) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Gender` varchar(2) NOT NULL,
  `Balance` int(255) NOT NULL,
  `Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Sr.No`, `Name`, `Email`, `Gender`, `Balance`, `Details`) VALUES
(1, '[Aman]', '[aman@gmail.com]', '[M', 4000, '[Transfer Money]'),
(2, '[Xyz]', '[xyz@gmail.com]', '[M', 5000, '[Transfer Money]'),
(4, '[Raj]', '[raj@gmail.com]', '[M', 1000, '[Transfer Money]'),
(5, '[Ram]', '[Ram@gmail.com]', '[M', 3000, '[Transfer Money]'),
(6, '[Srk]', '[srk@gmail.com]', '[M', 7000, '[Transfer Money]'),
(7, '[Kalua]', '[kalua@gmail.com]', '[M', 6000, '[Transfer Money]'),
(8, '[Vijya]', '[vijya@gmail.com]', '[M', 5000, '[Transfer Money]'),
(9, '[Modi]', '[modi@gmail.com]', '[M', 14000, '[Transfer Money]'),
(10, '[Sonia]', '[sonia@gmail.com]', '[F', 2000, '[Transfer Money]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
