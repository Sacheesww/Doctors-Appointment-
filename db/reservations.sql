-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 10:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `D_Name` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `P_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `D_Name`, `Time`, `Date`, `P_Name`) VALUES
(42, 'dr_smith', '7', '2023-09-22', 'awa'),
(43, 'dr_smith', '8', '2023-09-22', 'aaa'),
(44, 'dr_smith', '1', '2023-09-22', 'sss'),
(45, 'dr_smith', '5', '2023-09-22', 'awaw'),
(46, 'dr_smith', '2', '2023-09-22', 'abc'),
(47, 'dr_smith', '3', '2023-09-22', 'aaa'),
(48, 'dr_smith', '4', '2023-09-22', 'awaw'),
(49, 'dr_smith', '6', '2023-09-22', 'aaa'),
(50, 'dr_smith', '1', '2023-09-23', 'aaa'),
(51, 'dr_jones', '2', '2023-09-22', 'awaw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
