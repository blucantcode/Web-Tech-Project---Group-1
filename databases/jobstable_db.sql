-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2026 at 06:35 AM
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
-- Database: `jobstable_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE `Jobs` (
  `Job_ID` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Reference_Number` varchar(50) NOT NULL,
  `Salary` varchar(50) NOT NULL,
  `Reporting_To` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`Job_ID`, `Title`, `Description`, `Reference_Number`, `Salary`, `Reporting_To`) VALUES
(1, 'Telehealth Consultant', 'Provide remote healthcare consultations and support to patients', 'J0013', '$70,000 - $85,000', 'Director of Telehealth'),
(2, 'Mental Health Counsellor', 'Provide counselling and support to patients with mental health conditions.', 'J0014', '$80,000 - $95,000', 'Director of Mental Health'),
(3, 'Digital Health Product Manager', 'Coordinates between clinicians and IT teams to launch new digital tools or features', 'J0015', '$90,000 - $110,000', 'Director of Digital Health'),
(4, 'Registered Nurse', 'Provide direct patient care and support in a healthcare setting', 'J0017', '$80,000 - $100,000', 'Nurse Manager');

-- --------------------------------------------------------

--
-- Table structure for table `Jobs_requirements`
--

CREATE TABLE `Jobs_requirements` (
  `Job_ID` int(11) NOT NULL,
  `Responsibility_one` text NOT NULL,
  `Responsibility_two` text NOT NULL,
  `Responsibility_three` text NOT NULL,
  `Essential_Requirement_one` text NOT NULL,
  `Essential_Requirement_two` text NOT NULL,
  `Preferred_Requirements_one` text NOT NULL,
  `Preferred_Requirements_two` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Jobs_requirements`
--

INSERT INTO `Jobs_requirements` (`Job_ID`, `Responsibility_one`, `Responsibility_two`, `Responsibility_three`, `Essential_Requirement_one`, `Essential_Requirement_two`, `Preferred_Requirements_one`, `Preferred_Requirements_two`) VALUES
(1, 'Conduct virtual consultations\r\n                 ', 'Maintain patient records', 'Collaborate with healthcare providers', 'Bachelor\'s degree in Healthcare or related field', 'Relevant experience in working with patients', 'Experience with telehealth platforms', 'Strong communication skills'),
(2, 'Conduct individual and group therapy sessions', 'Maintain client records\r\n', 'Collaborate with other healthcare professionals', 'Master\'s degree in Counseling or related field', 'Licensed to practice', 'Experience with treating mental health disorders', 'Strong communication skills'),
(3, 'Lead product development with stakeholders', 'Ensure timely delivery of digital health solutions', 'Gather and prioritise product requirements', 'Bachelor\'s degree in Computer Science or related field', 'Experience in healthcare technology', 'Experience with digital health platforms', 'Strong project management skills'),
(4, 'Provide direct patient care\r\n', 'Monitor patient conditions\r\n', 'Collaborate with healthcare team', 'Bachelor\'s degree in Nursing or related field', 'Current RN license', 'Experience with patient care', 'Proactive approach to patient care');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `Jobs_requirements`
--
ALTER TABLE `Jobs_requirements`
  ADD PRIMARY KEY (`Job_ID`),
  ADD KEY `Job_ID` (`Job_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Jobs`
--
ALTER TABLE `Jobs`
  MODIFY `Job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Jobs_requirements`
--
ALTER TABLE `Jobs_requirements`
  MODIFY `Job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Jobs_requirements`
--
ALTER TABLE `Jobs_requirements`
  ADD CONSTRAINT `jobstable_id` FOREIGN KEY (`Job_ID`) REFERENCES `Jobs_requirements` (`Job_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
