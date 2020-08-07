-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 09:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `group_id` bigint(20) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`group_id`, `group_name`) VALUES
(1, 'A+'),
(2, 'AB+'),
(3, 'A-'),
(4, 'B+'),
(5, 'O+'),
(6, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `donor_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `is_approved` int(3) NOT NULL DEFAULT 0 COMMENT '0-pending/1-accepted/2-rejected',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `qty`, `donor_id`, `group_id`, `is_approved`, `created_at`) VALUES
(1, 2, 1, 1, 1, 1, '2020-08-06 05:20:02'),
(2, 3, 1, 3, 4, 2, '2020-08-06 05:20:02'),
(3, 3, 1, 1, 1, 1, '2020-08-06 05:20:02'),
(4, 1, 1, 1, 1, 1, '2020-08-06 05:20:02'),
(7, 1, 1, 1, 1, 2, '2020-08-06 05:20:02'),
(8, 1, 1, 8, 6, 1, '2020-08-06 05:20:02'),
(9, 1, 1, 1, 1, 1, '2020-08-06 05:20:02'),
(10, 1, 1, 1, 1, 2, '2020-08-06 05:20:02'),
(11, 1, 1, 8, 6, 1, '2020-08-06 06:44:25'),
(12, 1, 1, 9, 2, 1, '2020-08-06 09:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `donor_reg_form`
--

CREATE TABLE `donor_reg_form` (
  `donor_id` bigint(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `group_id` int(11) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `aadhaar_no` bigint(12) NOT NULL,
  `is_approved` int(2) NOT NULL DEFAULT 0 COMMENT '0-pending / 1-Approved / 2- Rejected',
  `updated_at` date NOT NULL DEFAULT '1970-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_reg_form`
--

INSERT INTO `donor_reg_form` (`donor_id`, `user_name`, `email`, `password`, `address`, `city`, `group_id`, `mobile_no`, `aadhaar_no`, `is_approved`, `updated_at`) VALUES
(1, 'Pritam Das', 'pritam@gmail.com', 'password', 'GP Road, Dhaka', 'Dhaka', 1, 1711025848, 6545789502, 1, '2020-08-06'),
(3, 'Jannatul Ferdos', 'donor@g.com', 'donor', 'H S Road, Chittagong', 'Chittagong', 4, 1704498478, 121314151617, 2, '1970-01-01'),
(8, 'Aman', 'a@g.com', 'password', 'My Address has changed', 'hojh', 6, 6546468465, 554645, 1, '2020-08-06'),
(9, 'Malek Khan', 'malek@gmail.com', 'malek123', 'Peer Khan Street', 'Chittagong', 2, 16789875679, 56789067, 1, '2020-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `reg_form`
--

CREATE TABLE `reg_form` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `wallet_amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_form`
--

INSERT INTO `reg_form` (`user_id`, `user_name`, `email`, `password`, `address`, `city`, `mobile_no`, `wallet_amount`) VALUES
(1, 'Dilip Kumar Dey', 'dilip@gmail.com', 'password', '  Tandalja, Dhaka.', 'Dhaka', 1234567891, 0),
(2, 'Mohitul Islam', 'rm@gmail.com', '333', 'Mohammad House, Chittagong', 'Chittagong', 1672229600, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `donor_reg_form`
--
ALTER TABLE `donor_reg_form`
  ADD PRIMARY KEY (`donor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reg_form`
--
ALTER TABLE `reg_form`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donor_reg_form`
--
ALTER TABLE `donor_reg_form`
  MODIFY `donor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reg_form`
--
ALTER TABLE `reg_form`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
