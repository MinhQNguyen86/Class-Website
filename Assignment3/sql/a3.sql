-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2018 at 03:22 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a3`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback`) VALUES
('You\'re the best!');

-- --------------------------------------------------------

--
-- Table structure for table `s_data`
--

CREATE TABLE `s_data` (
  `username` varchar(8) NOT NULL,
  `password` varchar(12) NOT NULL,
  `A1` int(11) NOT NULL,
  `A2` int(11) NOT NULL,
  `A3` int(11) NOT NULL,
  `Midterm` int(11) NOT NULL,
  `Final` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_data`
--

INSERT INTO `s_data` (`username`, `password`, `A1`, `A2`, `A3`, `Midterm`, `Final`, `ID`) VALUES
('Bob', '1234', 0, 0, 0, 0, 0, 2),
('Calico', '123456', 0, 0, 0, 0, 0, 0),
('Minh', '12345', 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s_data`
--
ALTER TABLE `s_data`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
