-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2025 at 06:37 PM
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
-- Database: `hr1-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(20, 'Myca', 'olaliamyca394@gmail.com', '$2y$10$p/cZN3fXTuXcCQzmysfLdO54JlaAZxfRJxqshvhCW6SdwE2ugG/Uu', 'admin', '2025-05-10 23:46:26'),
(62, 'Pelisya Sy', 'pelisyasy6@gmail.com', '$2y$10$9GM9t3q.I0MqJNJo1A6.UOej/sOhxHsHX0rT5H71ZG1T/vBwOeyDq', 'student', '2025-05-12 01:37:26'),
(65, 'Danilo', 'danilovergarajr610@gmail.com', '$2y$10$.w8TltTws9QOMJPE6D7feOmYYa.2ijMomTlX2UeVJUEPLerwr5gyy', 'admin', '2025-05-12 12:32:03'),
(67, 'Dan Vergara', 'danv66215@gmail.com', '$2y$10$HlU1C9mmgPj/82ZnzZIDW.x2/BNyCNFf7zV9oKoU20B/Ph7tCJOCK', 'student', '2025-05-12 13:00:39'),
(68, 'Jonathan Ranoco dionson', 'dionsonjonathan8@gmail.com', '$2y$10$SncAYURCwdB/ARBA6mf/T.3503A0i3yPM6ZbOaxnQA9rTb2iEb2Sq', 'student', '2025-05-12 13:33:51'),
(69, 'admin', 'dmssndmn@gmail.com', '$2y$10$9hZT3E85ScYMyWyCztOlXO8opFPvekAkQPtgnVr/rZ6l2ObcKAEPy', 'admin', '2025-05-12 14:00:51'),
(70, 'Lance Sanchez', 'sanchezlando333@gmail.com', '$2y$10$gsiTXppe5SrXsTFaFf8b6.UELui8/YBFcMrFugXVEnnxhTOFoFOF2', 'student', '2025-05-18 14:09:44');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
