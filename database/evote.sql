-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 05:38 PM
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
-- Database: `evote`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `students_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `expertise_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `tlp` bigint(20) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`students_id`, `classroom_id`, `expertise_id`, `firstname`, `lastname`, `email`, `password`, `pass`, `tlp`, `address`, `photo`, `role`) VALUES
(1, 3, 3, 'User', '1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'user1', 823476234, NULL, NULL, 'student'),
(2, 3, 3, 'user', '2', 'user2@gmail.com', '7e58d63b60197ceb55a1c487989a3720', 'user2', 823324554, NULL, NULL, 'candidate'),
(3, 3, 3, 'user', '3', 'user3@gmail.com', '92877af70a45fd6a2ed7fe81e1236b78', 'user3', 564564534, NULL, NULL, 'candidate'),
(4, 3, 3, 'user', '4', 'user4@gmail.com', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user4', 86576578768, NULL, NULL, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`students_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tlp` (`tlp`),
  ADD KEY `classroom_id` (`classroom_id`,`expertise_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `students_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
