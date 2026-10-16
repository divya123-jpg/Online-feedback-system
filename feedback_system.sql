-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2026 at 07:53 PM
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
-- Database: `feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL,
  `q5` int(11) DEFAULT NULL,
  `q6` int(11) DEFAULT NULL,
  `q7` int(11) DEFAULT NULL,
  `q8` int(11) DEFAULT NULL,
  `q9` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_name`, `teacher_name`, `semester`, `subject`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `comment`) VALUES
(7, 'Divya', 'Ms. Tripti Singh', '4th', 'Computer networking', 4, 4, 4, 5, 4, 5, 5, 5, 5, ''),
(8, '', 'Mr. Anoop Rathore', '4th', 'Operating system', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(9, '', 'Ms. Pragati Gautam', '4th', 'DBMS', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(10, '', 'Ms. Pragati Gautam', '4th', 'DBMS', 2, 3, 2, 3, 2, 4, 3, 2, 3, 'notes '),
(11, '', 'Ms. Tripti Singh', '4th', 'Computer networking', 4, 4, 3, 2, 3, 2, 4, 5, 4, ''),
(12, 'shalini', 'Ms. Tripti Singh', '4th', 'Computer networking', 3, 4, 3, 4, 4, 4, 4, 4, 4, ''),
(13, 'shalini', 'Mr. Anoop Rathore', '4th', 'Operating system', 3, 4, 4, 4, 4, 4, 4, 4, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `userid`, `password`) VALUES
(5, 'Ms. Tripti Singh', 'tripti@123', '1234'),
(6, 'Mr. Anoop Rathore', 'anoop@123', '1234'),
(7, 'Ms. Pragati Gautam', 'pragati@123', '1234'),
(8, 'Mr. Amit sir', 'amit@123', '4567'),
(9, 'Mr. Ram singh', 'ram@123', '4433'),
(10, 'Ms. Kokila jaiswal', 'kokila@123', '6789'),
(11, 'Mr. Rakesh sir', 'rakesh@123', '4567'),
(12, 'Mr. Aashish chandelkar', 'aashish@123', '6789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
