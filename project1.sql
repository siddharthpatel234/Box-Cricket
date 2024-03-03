-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 16, 2023 at 09:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `admin_fname` varchar(50) NOT NULL,
  `admin_lname` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_number` varchar(50) NOT NULL,
  `admin_gender` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_number`, `admin_gender`, `admin_password`) VALUES
(1, 'Jayesh', 'Shah', '456@gmail.com', '4564523', 'Male', '456');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `box_name` varchar(250) NOT NULL,
  `box_sports_selected` varchar(250) NOT NULL,
  `box_time_selected` varchar(250) NOT NULL,
  `box_location` varchar(250) NOT NULL,
  `box_date` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `Payment_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`id`, `customer_name`, `box_name`, `box_sports_selected`, `box_time_selected`, `box_location`, `box_date`, `date_time`, `Payment_Status`) VALUES
(108, 'Het', ' Star Box', ' Cricket', ' 8:30-10:30', 'Location : Narol,Ahmedabad', '2023-04-21', '2023-04-20 14:23:18', 'Incomplete'),
(109, 'Het', ' Star Box', ' Cricket', '10:30-12:30', 'Location : Narol,Ahmedabad', '2023-04-29', '2023-04-20 14:42:18', 'Incomplete'),
(130, 'krish', ' Star Box', ' Cricket', ' 8:30-10:30', 'Location : Narol,Ahmedabad', '2023-04-29', '2023-04-26 12:08:00', 'Completed'),
(131, 'pritesh', ' Star Box', ' Football', ' 10:30-12:30', 'Location : Narol,Ahmedabad', '2023-05-09', '2023-05-08 00:21:00', 'Completed'),
(135, 'Ramesh', 'Star Box', 'Cricket', ' 8:30-10:30', 'Location : Narol,Ahmedabad', '2023-05-12', '2023-05-11 00:27:00', 'Completed'),
(138, 'JENITH', 'Star Box', 'Footbaall', '15:00-17:00', 'Location : Narol,Ahmedabad', '2023-05-31', '2023-05-12 15:01:31', 'Completed'),
(139, 'JANAK', 'Turf', 'Cricket', ' 2:30-4:30', 'Location : Gurukul,Ahmedabad', '2023-05-31', '2023-05-12 15:05:23', 'Completed'),
(140, 'JENITH', 'Star Box', 'Footbaall', ' 8:30-10:30', 'Location : Narol,Ahmedabad', '2023-05-26', '2023-05-13 18:13:10', 'Completed'),
(141, 'JENITH', 'Star Box', 'Footbaall', '10:30-12:30', 'Location : Narol,Ahmedabad', '2023-05-27', '2023-05-13 19:05:49', 'Incomplete'),
(142, 'JENITH', 'Turf', 'Cricket', ' 2:30-4:30', 'Location : Gurukul,Ahmedabad', '2023-05-30', '2023-05-14 11:24:26', 'Incomplete'),
(143, 'JENITH', 'Palladium Box', 'Volleyball', '13:30-15:30', 'Location : Narol,Ahmedabad', '2023-05-29', '2023-05-14 11:28:20', 'Incomplete'),
(145, 'Het', 'Star Box', 'Cricket', '10:30-12:30', 'Location : Narol,Ahmedabad', '2023-05-11', '2023-05-14 11:57:00', 'Completed'),
(146, 'Het', 'Star Box', 'Cricket', '10:30-12:30', 'Location : Narol,Ahmedabad', '2023-05-14', '2023-05-14 11:57:00', 'Completed'),
(148, 'Het', 'Star Box', 'Cricket', '10:30-12:30', 'Location : Narol,Ahmedabad', '2023-05-30', '2023-05-14 11:57:00', 'Completed'),
(150, 'Het', 'Moon Box', 'Cricket', ' 8:30-10:30', 'Location : New Ranip,Ahmedabad', '2023-05-30', '2023-05-16 12:19:04', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `id` int(11) NOT NULL,
  `box_name` varchar(50) NOT NULL,
  `box_banner` varchar(50) NOT NULL,
  `box_location` varchar(50) NOT NULL,
  `box_sports` varchar(50) NOT NULL,
  `box_time` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `box_name`, `box_banner`, `box_location`, `box_sports`, `box_time`) VALUES
(1, 'Star Box', 'images/bgimg1.jpg', 'Narol,Ahmedabad', 'Cricket,Footbaall,Volleyball', '8:30-10:30,10:30-12:30,13:00-15:00,15:00-17:00'),
(2, 'Moon Box', 'images/bgimg8.jpg', 'New Ranip,Ahmedabad', 'Cricket,Football,Volleyball', '8:30-10:30,10:30-12:30,13:00-15:00,15:00-17:00'),
(3, 'Palladium Box', 'images/bgimg9.jpg', 'Narol,Ahmedabad', 'Cricket,Football,Volleyball', '10:30-12:30,13:30-15:30'),
(16, 'Turf', 'images/bgimg10.jpg', 'Gurukul,Ahmedabad', 'Cricket,Football', '2:30-4:30');

-- --------------------------------------------------------

--
-- Table structure for table `box_request`
--

CREATE TABLE `box_request` (
  `id` int(200) NOT NULL,
  `box_name` varchar(30) NOT NULL,
  `box_banner` varchar(50) NOT NULL,
  `box_location` varchar(100) NOT NULL,
  `box_sports` varchar(100) NOT NULL,
  `box_time` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telenumber` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `lastname`, `email`, `telenumber`, `message`, `time`) VALUES
(1, '', '', '123@gmail.com', 0, 'helloworld', '2023-03-30 14:01:05'),
(2, '', '', '123@gmail.com', 4568899, 'helloworld', '2023-03-30 14:01:59'),
(3, '', '', '123@gmail.com', 4568899, 'helloworld', '2023-03-30 14:02:31'),
(4, '', '', '123@gmail.com', 4568899, 'helloworld', '2023-03-30 14:02:56'),
(5, '', '', '123@gmail.com', 4568899, 'helloworld', '2023-03-30 14:04:37'),
(6, '', '', '123@gmail.com', 4568899, 'helloworld', '2023-03-30 14:04:40'),
(7, '', '', '123@gmail.com', 4568899, 'helloworld', '2023-03-30 14:07:29'),
(8, 'J', 'P', '123@gmail.com', 4568899, 'hellow world', '2023-03-30 14:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `ownerdetails`
--

CREATE TABLE `ownerdetails` (
  `id` int(11) NOT NULL,
  `owner_box` varchar(50) NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `owner_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ownerdetails`
--

INSERT INTO `ownerdetails` (`id`, `owner_box`, `owner_email`, `owner_password`) VALUES
(1, 'Star Box', 'starbox@gmail.com', 'starbox'),
(2, 'Moon Box', 'moonbox@gmail.com', 'moonbox'),
(3, 'Palladium Box', 'palladiumbox@gmail.com', 'palladiumbox');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(15) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `email`, `number`, `gender`, `password`) VALUES
(1, 'JENITH', 'P', '123@gmail.com', 456789, 'female', '456'),
(2, 'Het', 'Patel', 'xyz@gmail.com', 12356, 'male', '789'),
(3, 'Mital', 'Panchal', '789@gmail.com', 2147483647, 'female', '123'),
(4, 'Karma', 'Patel', 'kp@gmail.com', 464645165, 'female', '5252'),
(6, 'krish', 'patel', 'krish@gmail.com', 1234567890, 'male', '12'),
(7, 'pritesh', 'patel', 'abc@gmail.com', 5467896, 'male', '789'),
(8, 'Ramesh', 'Shah', 'rs@gmail.com', 789456123, 'male', '456'),
(9, 'JANAK', 'THAKKAR', 'AJAKAJ@abc.com', 2147483647, 'male', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box_request`
--
ALTER TABLE `box_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownerdetails`
--
ALTER TABLE `ownerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `box_request`
--
ALTER TABLE `box_request`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ownerdetails`
--
ALTER TABLE `ownerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
