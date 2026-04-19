-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 11:06 AM
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
-- Database: `house_price_prediction`
--

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

CREATE TABLE `predictions` (
  `id` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `area_sqft` int(11) NOT NULL,
  `stories` int(11) NOT NULL,
  `mainroad` varchar(10) NOT NULL,
  `guestroom` varchar(10) NOT NULL,
  `basement` varchar(10) NOT NULL,
  `hotwaterheating` varchar(10) NOT NULL,
  `airconditioning` varchar(10) NOT NULL,
  `parking` int(11) NOT NULL,
  `prefarea` varchar(10) NOT NULL,
  `furnishingstatus` varchar(20) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `predictions`
--

INSERT INTO `predictions` (`id`, `bedrooms`, `bathrooms`, `area_sqft`, `stories`, `mainroad`, `guestroom`, `basement`, `hotwaterheating`, `airconditioning`, `parking`, `prefarea`, `furnishingstatus`, `price`) VALUES
(1, 0, 0, 0, 0, 'mainroad', 'guestroom', 'basement', 'hotwaterhe', 'airconditi', 0, 'prefarea', 'furnishingstatus', 0),
(2, 0, 0, 0, 0, 'mainroad', 'guestroom', 'basement', 'hotwaterhe', 'airconditi', 0, 'prefarea', 'furnishingstatus', 0),
(3, 0, 0, 0, 0, 'mainroad', 'guestroom', 'basement', 'hotwaterhe', 'airconditi', 0, 'prefarea', 'furnishingstatus', 0),
(4, 0, 0, 0, 0, 'mainroad', 'guestroom', 'basement', 'hotwaterhe', 'airconditi', 0, 'prefarea', 'furnishingstatus', 0),
(5, 2, 1, 5000, 1, '', '', '', '', 'yes', 0, '', 'semi-furnished', 4400000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `predictions`
--
ALTER TABLE `predictions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
