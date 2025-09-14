-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2025 at 01:44 AM
-- Server version: 10.11.14-MariaDB-ubu2204
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr1_hr1ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `openings` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `salary` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `posting_date` date NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `department`, `openings`, `status`, `description`, `salary`, `location`, `job_type`, `posting_date`, `deadline`, `created_at`) VALUES
(1, 'Software Engineer', 'IT Department', 3, 'Open', 'Develop and maintain software applications.', '₱60,000 - ₱80,000', 'Quezon City, PH', 'Full-Time', '2025-08-01', '2025-09-15', '2025-08-20 14:21:17'),
(5, 'lalala', 'safddsf', 3, 'Pending', 'dgsfdg', '13124', 'sfdds', 'Part-Time', '2025-08-28', '2025-08-28', '2025-08-20 14:33:51'),
(6, 'dvgfd', 'fdgfg', 45, 'Pending', 'gjhj', 'fgygfh', 'gfgh', 'Part-Time', '2025-09-06', '2025-08-16', '2025-08-21 04:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','applicant') NOT NULL DEFAULT 'applicant',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(5, 'Jonathan Ranoco dionson', 'dionsonjonathan8@gmail.com', '$2y$10$SncAYURCwdB/ARBA6mf/T.3503A0i3yPM6ZbOaxnQA9rTb2iEb2Sq', 'applicant', '2025-08-20 20:58:07'),
(8, 'New Applicant', 'new.applicant@example.com', '$2y$10$qaVJ70S08n4yQZNFJzXGT.DEs3A0DC4WQr5x9NrDnYjS74Yb2kmSG', 'applicant', '2025-08-20 20:58:07'),
(9, 'daddy', 'sanchezlando333@gmail.com', '$2y$10$WGzegPaZTAMBAcJ7Fai/ke.jIaHQRWMMEYm9DRWv6fUEUGkNWp5q2', 'admin', '2025-08-20 21:08:01'),
(10, 'lance', 'sanchezlando222@gmail.com', '$2y$10$02bSDSsf7IcE0KYqAW7oN.MBPV77CcSNJ1dO30.tDRzW6bzSjXeZK', 'applicant', '2025-08-20 21:28:52'),
(12, 'Myca Olalia', 'olaliamyca394@gmail.com', '$2y$10$4RKMjPHZgxSGvycbbtdp6OTAEZH.o1w9XWiejXq5mID3nmQqVAxQ.', 'applicant', '2025-08-21 04:40:45'),
(13, 'Mica Fernandez', 'micafernan0209@gmail.com', '$2y$10$U4gnwl82n2QYAKyQtVULQe1ZWpPhBbvsMVyMpv9f33ALYUUCFOgNK', 'admin', '2025-08-21 04:48:30'),
(15, 'Rorelie Patingo', 'rorelie18@gmail.com', '$2y$10$XvPYp8AXBlE0uOIncLVpuOPAopdLJn/ULGR4Iq1co74WNuKzUtxwG', 'applicant', '2025-09-02 07:03:38'),
(16, 'Janine Austria', 'austriajanine44@gmail.com', '$2y$10$LBJqJ4YIiy48LkdDC4kz9.BUOm1eT9Az6f5.arg5aQHRh2RM5hjF.', 'admin', '2025-09-03 12:30:52'),
(18, 'Carl Antonio De maala', 'antoniodemaala04@gmail.com', '$2y$10$59jmjgBsnkybuKsvrMVcP.S8ws7uFHOyzRym88pdkspiiqw16RF8i', 'applicant', '2025-09-04 11:36:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
