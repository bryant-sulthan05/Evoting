-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 11:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `plaintext` varchar(50) NOT NULL,
  `tlp` bigint(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `email`, `password`, `plaintext`, `tlp`, `address`) VALUES
(1, 'Dzakwan', 'Arip', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 8638768678, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidates_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `until` date DEFAULT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidates_id`, `member_id`, `visi`, `misi`, `status`, `date`, `updated_at`, `until`, `year`) VALUES
(22, 2, '<div style=\"font-size: medium;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div><div style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</div>', '<ol><li style=\"font-size: medium;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li><li style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?<span style=\"color: var(--bs-card-color);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span></li><li style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</li></ol>', 'approved', '2023-02-07', '2023-02-07 00:35:42', '2023-02-09', 2023),
(23, 15, '<div style=\"font-size: medium;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div><div style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</div>', '<ol><li style=\"font-size: medium;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li><li style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?<span style=\"color: var(--bs-card-color);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span></li><li style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</li></ol>', 'approved', '2023-02-07', '2023-02-07 00:37:13', '2023-02-09', 2023),
(24, 4, '<div style=\"font-size: medium;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div><div style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</div>', '<div style=\"font-size: medium;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div><div style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?<span style=\"color: var(--bs-card-color);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span></div><div style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</div>', 'approved', '2023-02-07', '2023-02-07 00:41:33', '2023-02-09', 2023),
(25, 16, '<p>qjevjqe</p>', '<p>asc,ejchvew</p>', 'pending', '2023-02-07', NULL, NULL, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `classroom_id` int(11) NOT NULL,
  `classroom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classroom_id`, `classroom`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `expertise_id` int(11) NOT NULL,
  `expertise` varchar(30) NOT NULL,
  `slug` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`expertise_id`, `expertise`, `slug`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'RPL'),
(2, 'Multimedia', 'MM'),
(3, 'Teknik Komputer dan Jaringan', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `register_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `students_id`, `reason`, `status`, `register_at`, `updated_at`) VALUES
(1, 1, 'Pengen nambah temen', 'approved', '2022-12-03', '2022-12-06'),
(2, 3, 'Biar gk dikira pengacara (pengangguran banyak acara)', 'approved', '2022-12-06', '2022-12-06'),
(4, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, ab! Earum aperiam quas quasi', 'approved', '2022-12-09', '2022-12-09'),
(7, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt consectetur enim optio, iste ipsa laboriosam placeat, voluptates quisquam officiis et alias natu', 'approved', '2022-12-15', '2022-12-15'),
(12, 11, '<p>Ingin menambah pertemanan</p>', 'approved', '2023-01-09', '2023-01-09'),
(13, 8, '<p>fgzfg</p>', 'approved', '2023-02-01', '2023-02-01'),
(14, 9, '<p>svh</p>', 'approved', '2023-02-07', '2023-02-07'),
(15, 2, '<div style=\"font-size: medium;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div><div style=\"font-size: medium;\">Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</div><div style=\"font-size: medium;\"><div>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div><div>Quo deserunt praesentium optio aperiam magnam enim recusandae cumque sequi consequatur vero?</div></div>', 'approved', '2023-02-07', '2023-02-07'),
(16, 13, '<p>wefwef</p><p><br></p>', 'approved', '2023-02-07', '2023-02-07');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`students_id`, `classroom_id`, `expertise_id`, `firstname`, `lastname`, `email`, `password`, `pass`, `tlp`, `address`, `photo`, `role`) VALUES
(1, 3, 1, 'Bryant', 'Sulthan Nugroho', 'bryant@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 89213418028, 'Situsari Permai', 'logo.png', 'member'),
(2, 3, 2, 'Doni', 'Irawan', 'doni@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 83792073808, 'Gandoang', 'IMG_20221105_211625.jpg', 'candidate'),
(3, 3, 3, 'Firenze', 'Higa', 'higa@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 82836817921, 'Venezia', 'IMG_20221105_211716.jpg', 'candidate'),
(4, 3, 1, 'Angger', 'Cakra', 'angger@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 81298371298, 'Grand Kahuripan Cluster Sindoro', 'IMG_20221105_211734.jpg', 'candidate'),
(6, 2, 1, 'Fardan', 'Septian', 'fardan@gmail.com', 'a91f9372d1761b817f35d77747791b39', 'fardan1234', 81298368199, 'Cileungsi', 'IMG_20221105_211757.jpg', 'student'),
(7, 3, 1, 'Adi', 'Saputra', 'adis@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 89862876231, NULL, 'profile.svg', 'member'),
(8, 3, 1, 'Aufa', 'Ramadhan', 'aufa9122@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 86753146807, 'Griya Bukit Jaya', 'profile.svg', 'member'),
(9, 3, 1, 'Albert', 'Einstein', 'albert7390@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 89843942398, 'Griya Bukit Jaya', 'profile.svg', 'member'),
(10, 3, 1, 'Refansa', 'Ali', 'refansa10260@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 82384692378, 'Vila Cileungsi', 'profile.svg', 'student'),
(11, 1, 2, 'Haikal', 'Prasetya', 'haikal@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 89826781268, 'Grand Kahuripan Cluster Bromo', 'diskusi.jpg', 'member'),
(13, 3, 1, 'Farid', 'Mardan', 'farid12@gmail.com', '25d55ad283aa400af464c76d713c07ad', '12345678', 8293729293722, 'Klapanunggal', 'b.jpg', 'member'),
(14, 3, 2, 'Satria', 'Rangga', 'satria1709@gmail.com', '0c7c81e7015c71428190302804d85f4c', 'rangga1234', 8229123231232, NULL, 'profile.svg', 'student'),
(15, 3, 2, 'Fauzan', 'Guzdani', 'fauzan465@gmail.com', '25d55ad283aa400af464c76d713c07ad', '12345678', 82471287421, NULL, 'profile.svg', 'student'),
(16, 3, 1, 'Dimas', 'Abidin', 'dimas4814@gmail.com', 'f41083cfb57aa0b592adaaa7f94563e2', 'dims1234', 812937982163, NULL, 'profile.svg', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `candidates_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `candidates_id`, `students_id`, `date`) VALUES
(23, 22, 8, '2023-02-07'),
(24, 22, 11, '2023-02-07'),
(25, 23, 14, '2023-02-07'),
(26, 24, 10, '2023-02-07'),
(27, 24, 9, '2023-02-07'),
(28, 24, 16, '2023-02-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`,`tlp`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidates_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`expertise_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `students_id` (`students_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`students_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tlp` (`tlp`),
  ADD KEY `classroom_id` (`classroom_id`,`expertise_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `candidates_id` (`candidates_id`),
  ADD KEY `students_id` (`students_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `expertise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `students_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
