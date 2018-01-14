-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 10:10 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_student_database`
--

CREATE TABLE `all_student_database` (
  `name` text NOT NULL,
  `class` varchar(20) NOT NULL,
  `roll` int(7) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gpa` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_student_database`
--

INSERT INTO `all_student_database` (`name`, `class`, `roll`, `password`, `gpa`) VALUES
('Mayur', 'te_it_sem_5', 1414084, 'mayur@123', NULL),
('Rohit Sharma', 'TE_IT_SEM_6', 1414120, 'Rohit@123', '8.86'),
('Bhagat Singh', 'se_it_sem_3', 1431432, 'bhagat@123', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_student_database`
--
ALTER TABLE `all_student_database`
  ADD PRIMARY KEY (`roll`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
