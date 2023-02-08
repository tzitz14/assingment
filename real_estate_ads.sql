-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 07:56 PM
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
-- Database: `real_estate_ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `region` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `availability` enum('rental','sale') NOT NULL,
  `square` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `region`, `price`, `availability`, `square`, `username`) VALUES
(7, 'Thessaloniki', 450, 'rental', 70, 'Panagiwths'),
(8, 'Patras', 120000, 'sale', 250, 'Jonathan'),
(16, 'Thessaloniki', 750, 'rental', 110, 'Panagiwths'),
(17, 'Athens', 18000, 'sale', 120, 'Jonathan'),
(18, 'Athens', 400, 'rental', 80, 'Jonathan'),
(21, 'Thessaloniki', 340, 'rental', 40, 'John'),
(22, 'Patras', 500, 'rental', 90, 'Panagiwths'),
(23, 'Athens', 220, 'rental', 25, 'Panagiwths'),
(24, 'Heraklion', 100000, 'sale', 150, 'Panagiwths'),
(25, 'Athens', 490, 'rental', 110, 'John'),
(27, 'Athens', 50, 'sale', 55, 'John'),
(28, 'Athens', 550, 'rental', 55, 'John'),
(29, 'Athens', 550, 'sale', 329, 'Stella'),
(30, 'Athens', 50, 'sale', 600, 'Stella'),
(31, 'Heraklion', 700, 'sale', 80, 'Jonathan'),
(32, 'Thessaloniki', 670, 'rental', 90, 'Stella'),
(33, 'Thessaloniki', 900, 'rental', 220, 'Stella');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
