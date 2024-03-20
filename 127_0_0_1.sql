-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 05:15 PM
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
-- Database: `addemp`
--
CREATE DATABASE IF NOT EXISTS `addemp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `addemp`;

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `empname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `empid`, `empname`, `email`, `dept`, `gender`, `dob`, `age`, `address`, `phno`, `password`) VALUES
(0, 12, 'Sus', 'sus@gmail.com', 'Agricultural Department', 'Female', '2024-03-01', 21, 'Vizag', 9876543210, '123456');
--
-- Database: `additem`
--
CREATE DATABASE IF NOT EXISTS `additem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `additem`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `notification_id` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `biddingstart` date NOT NULL,
  `biddingclose` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `notification_id`, `item_id`, `itemname`, `description`, `quantity`, `district`, `biddingstart`, `biddingclose`) VALUES
(1, '            1', '            1', 'cars', 'have wheels', '', 'rims', '2024-03-02', '2024-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `addsupplier`
--
CREATE DATABASE IF NOT EXISTS `addsupplier` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `addsupplier`;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `username`, `companyname`, `email`, `password`, `gender`, `dob`, `address`, `phno`, `status`) VALUES
(1, 'tony', 'Stark ', 'tony@gmail.com', '123456', 'Male', '2024-03-01', 'america', 9898989898, 'Waiting'),
(2, 'tom', 'memta', 'tom@gmail.com', '123456', 'Male', '2024-03-02', 'here', 9090909090, 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `tender_applications`
--

CREATE TABLE `tender_applications` (
  `id` int(11) NOT NULL,
  `notification_id` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `bidding_amount` varchar(100) NOT NULL,
  `warranty_details` varchar(100) NOT NULL,
  `manufacturing_year` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tender_applications`
--

INSERT INTO `tender_applications` (`id`, `notification_id`, `item_id`, `itemname`, `bidding_amount`, `warranty_details`, `manufacturing_year`, `status`) VALUES
(1, '            1', '            1', 'cars', '50000', '3', '2024-03-28', 'Approved'),
(2, '            1', '            1', 'cars', '40000', '1', '2024-03-30', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_applications`
--
ALTER TABLE `tender_applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tender_applications`
--
ALTER TABLE `tender_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
