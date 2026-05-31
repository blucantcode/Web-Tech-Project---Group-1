-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2026 at 10:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apply`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `jobRef` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` char(4) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `availDesc` text DEFAULT NULL,
  `skills` varchar(100) NOT NULL,
  `skillsDesc` text DEFAULT NULL,
  `interviewDate` date NOT NULL,
  `interviewTime` time NOT NULL,
  `status` enum('New','Current','Final') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `jobRef`, `firstName`, `lastName`, `birthday`, `gender`, `email`, `phone`, `street`, `city`, `state`, `postcode`, `experience`, `availability`, `availDesc`, `skills`, `skillsDesc`, `interviewDate`, `interviewTime`, `status`) VALUES
(1, '03023', 'krisha', 'upadhyay', '2026-05-29', 'Male', 'krisha.upadhyay1204@gmail.com', '0490482157', '5 langside grove', 'cranbourne', 'Victoria', '3977', '1-2 years', 'Tuesday', 'd', 'Communication', 'd', '2026-05-29', '21:34:00', 'New'),
(2, '03023', 'krisha', 'upadhyay', '2026-05-29', 'Male', 'krisha.upadhyay1204@gmail.com', '0490482157', '5 langside grove', 'cranbourne', 'Victoria', '3977', '3-5 years', 'Tuesday, Wednesday', 'd', 'Communication', 'd', '2026-05-29', '16:54:00', 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
