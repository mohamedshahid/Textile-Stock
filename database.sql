-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2017 at 08:24 AM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 5.6.32-1+ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heena`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `sellername` varchar(50) DEFAULT NULL,
  `productname` varchar(50) DEFAULT NULL,
  `length` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `billno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `sellername`, `productname`, `length`, `price`, `total`, `date`, `billno`) VALUES
(1, 'zakir', 'fabric', 7, 4, 28, NULL, NULL),
(2, 'faiyaz', 'fabric', 5, 50, 250, NULL, NULL),
(3, 'faizan', 'mallai', 100, 20, 2000, NULL, NULL),
(4, 'khalid', 'makmal', 600, 40, 24000, NULL, NULL),
(5, 'azhar', 'fabric', 10, 5, 50, NULL, NULL),
(6, 'zaid', 'fabric', 33, 20, 660, NULL, NULL),
(7, 'zakir', 'net', 160, 18, 2880, NULL, NULL),
(8, 'zakir', 'net', 140, 15, 2100, NULL, NULL),
(9, 'azhar', 'black', 50, 17, 850, NULL, NULL),
(10, 'khalid', 'mallai', 50, 30, 1500, NULL, NULL),
(11, 'imran', 'hand', 450, 12, 5400, NULL, NULL),
(12, 'uzair', 'gold', 10, 10, 100, '2017-05-07', NULL),
(14, 'zakir', 'hood', 45, 45, 2025, '2017-10-25', NULL),
(15, 'khan', 'pool', 34, 43, 1462, '2017-10-27', NULL),
(16, 'uzair', 'gold', 10, 10, 100, '2017-05-07', 13),
(17, 'faizan', 'white', 22.3, 3.3, 73.59, '2017-10-10', 123),
(18, 'virinda fab tax', 'butter crap', 23, 15, 345, '2017-10-19', 12334),
(19, 'zaid', 'butter crap', 45, 15, 675, '2017-10-18', 456),
(20, 'vrinda creation', 'golden', 80, 42, 3360, '2017-10-25', 4645);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `buyername` varchar(50) DEFAULT NULL,
  `productname` varchar(50) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `buyername`, `productname`, `length`, `price`, `total`) VALUES
(1, 'shahid', 'fabric', 5, 5, 25),
(2, 'shahid', 'cotton', 200, 10, 2000),
(3, 'mallai', 'mallai', 50, 10, 500),
(4, 'shahid', 'makmal', 50, 20, 1000),
(5, 'shahid', 'net', 200, 22, 4400),
(6, 'shafi', 'cotton', 10, 30, 300),
(7, 'shahid', 'cotton', 100, 60, 6000),
(8, 'ziaul', 'makmal', 200, 13, 2600);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `productname` varchar(50) DEFAULT NULL,
  `length` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `productname`, `length`) VALUES
(2, 'fabric', 60),
(4, 'cotton', 200),
(5, 'mallai', 100),
(6, 'makmal', 350),
(7, 'net', 100),
(8, 'black', 50),
(9, 'hand', 450),
(10, 'golden', 125),
(11, 'hood', 45),
(12, 'pool', 34),
(13, 'white', 22),
(14, 'butter crap', 68);

-- --------------------------------------------------------

--
-- Table structure for table `user_buyer`
--

CREATE TABLE `user_buyer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_buyer`
--

INSERT INTO `user_buyer` (`id`, `name`) VALUES
(1, 'shahid'),
(2, 'shafi'),
(3, 'ziaul');

-- --------------------------------------------------------

--
-- Table structure for table `user_seller`
--

CREATE TABLE `user_seller` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_seller`
--

INSERT INTO `user_seller` (`id`, `name`) VALUES
(1, 'faiyaz'),
(3, 'zaid'),
(4, 'khalid'),
(5, 'azhar'),
(6, 'imran'),
(7, 'zakir'),
(23, 'faizan'),
(24, 'khan'),
(25, 'vrinda creation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_buyer`
--
ALTER TABLE `user_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_seller`
--
ALTER TABLE `user_seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_buyer`
--
ALTER TABLE `user_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_seller`
--
ALTER TABLE `user_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
