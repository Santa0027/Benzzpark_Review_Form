-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 01:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benzzark`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'benzzpark', '2024-10-28 02:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `guest_feedback`
--

CREATE TABLE `guest_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `room` int(11) DEFAULT NULL,
  `ambience` int(11) DEFAULT NULL,
  `checkinout` int(11) DEFAULT NULL,
  `reservation` int(11) DEFAULT NULL,
  `food` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `cleanliness` int(11) DEFAULT NULL,
  `decor` int(11) DEFAULT NULL,
  `air_condition` int(11) DEFAULT NULL,
  `supplies` int(11) DEFAULT NULL,
  `comfort` int(11) DEFAULT NULL,
  `fittings` int(11) DEFAULT NULL,
  `choice` varchar(11) DEFAULT NULL,
  `purpose` varchar(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_feedback`
--

INSERT INTO `guest_feedback` (`id`, `name`, `phone`, `email`, `room`, `ambience`, `checkinout`, `reservation`, `food`, `quality`, `service`, `cleanliness`, `decor`, `air_condition`, `supplies`, `comfort`, `fittings`, `choice`, `purpose`, `feedback`, `submission_date`) VALUES
(1, 'santha', 2147483647, 'vjsanthakumar@gmail.com', 243, 3, 3, 3, 3, 3, 3, 3, 2, 3, 3, 2, 3, '0', '0', 'dfxcv', '2024-10-28 02:04:58'),
(2, 'santha lumar', 4514, 'adfaf@ssf', 5443, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '0', '0', 'nice', '2024-10-28 08:26:23'),
(3, 'dsfsadf', 4653456, 'gcvfsdg@sfeg', 345, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '0', '0', 'tgfdg', '2024-10-28 08:29:09'),
(4, 'Santha kumar', 2147483647, 'jgjjkvkkhchiciy@ttg', 231, 2, 3, 1, 1, 2, 3, 2, 2, 1, 2, 3, 2, 'Recommended', 'Pleasure', 'Nice', '2024-10-28 09:35:35'),
(5, 'Santha', 2147483647, 'gjbfdtjbbdhj@dd', 306, 3, 3, 2, 3, 3, 2, 3, NULL, 2, 3, 1, 2, 'Recommended', 'Pleasure', '', '2024-10-28 13:40:15'),
(6, 'Santha kumar', 2147483647, 'jgjjkvkkhchiciy@ttg', 413, 3, 3, 3, 3, 3, 3, 3, NULL, 3, 3, 1, 3, 'Others', 'Pleasure', 'sdfg', '2024-12-16 05:25:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `guest_feedback`
--
ALTER TABLE `guest_feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_feedback`
--
ALTER TABLE `guest_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
