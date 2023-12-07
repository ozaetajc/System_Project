-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 01:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `course` enum('ABM','HUMSS','STEM') NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `sname` varchar(10) NOT NULL,
  `year` varchar(15) NOT NULL,
  `sy` varchar(15) NOT NULL,
  `admit` varchar(20) NOT NULL,
  `term` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `elementary` varchar(50) NOT NULL,
  `school_address1` varchar(255) NOT NULL,
  `year_graduated1` int(20) NOT NULL,
  `juniorhigh` varchar(50) NOT NULL,
  `school_address2` varchar(255) NOT NULL,
  `year_graduated2` int(20) NOT NULL,
  `photo` longblob NOT NULL,
  `form_137` longblob NOT NULL,
  `father_fname` varchar(50) NOT NULL,
  `father_lname` varchar(50) NOT NULL,
  `father_mname` varchar(50) NOT NULL,
  `father_sname` varchar(50) NOT NULL,
  `father_occupation` varchar(50) NOT NULL,
  `father_email` varchar(50) NOT NULL,
  `father_mobile` varchar(20) NOT NULL,
  `father_age` int(3) NOT NULL,
  `mother_fname` varchar(50) NOT NULL,
  `mother_lname` varchar(50) NOT NULL,
  `mother_mname` varchar(50) NOT NULL,
  `mother_sname` varchar(50) NOT NULL,
  `mother_occupation` varchar(50) NOT NULL,
  `mother_email` varchar(50) NOT NULL,
  `mother_mobile` varchar(20) NOT NULL,
  `mother_age` int(3) NOT NULL,
  `guardian_fname` varchar(50) NOT NULL,
  `guardian_lname` varchar(50) NOT NULL,
  `guardian_mname` varchar(50) NOT NULL,
  `guardian_sname` varchar(50) NOT NULL,
  `guardian_occupation` varchar(50) NOT NULL,
  `guardian_email` varchar(50) NOT NULL,
  `guardian_mobile` varchar(20) NOT NULL,
  `guardian_age` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logo_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
