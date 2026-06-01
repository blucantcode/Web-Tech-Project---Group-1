-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2026 at 06:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `contribution-1` text NOT NULL,
  `contribution-2` text NOT NULL,
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `student_id`, `contribution-1`, `contribution-2`, `quote`) VALUES
(1, 'Emily Armstrong', '106505064', 'Worked on the About page and collaborated on CSS styling', 'Database settings\nCreate about table and update', 'Quote: \"Noli solliciti esse, omnia tandem bene eveniunt.\"\n(Don\'t worry, it all works out in the end) -Latin'),
(2, 'Lotus Allan', '105138731', 'Developed the index page and collaborated on CSS styling', '', 'Quote: \"Vita revera est valde simplex, non necesse est eam tam complicatam facere.\"\n(Life is really very simple, there\'s no need to make it so complicated.) - Latin'),
(3, 'Phoebe Anastasiou', '106509600', 'Created the Jobs page and collaborated on CSS styling', 'Created a functioning search feature', 'Quote: \"Carpe diem\"\n(Seize the day) - Latin'),
(4, 'Krisha Upadhyay', '106513368', 'Built the Apply page and collaborated on CSS styling', '', 'Quote: \"sicut ad eam\"\n(Just do it) - Latin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
