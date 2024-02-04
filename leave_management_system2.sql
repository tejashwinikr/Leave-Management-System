-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 03:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_management_system2`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(4, 'information science'),
(5, 'computer science'),
(7, 'E&C'),
(8, 'civil'),
(9, 'mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `mobile`, `password`, `department_id`, `address`, `birthday`, `role`, `image`) VALUES
(3, 'principal', 'principal@gmail.com', '', '123', 3, 'mandya', '2001-01-19', 1, ''),
(5, 'IS_HOD', 'ishod@gmail.com', '7090852094', '123', 4, 'mandya', '2001-01-19', 3, '35.jpg'),
(9, 'CS_HOD', 'cshod@gmail.com', '1234567890', '123', 5, 'mandya', '1990-02-02', 3, '1.jpg'),
(23, 'E&C_HOD', 'echod@gmail.com', '1234567890', '123', 7, 'mandya', '1990-12-19', 3, '3.jpg'),
(25, 'civil_hod', 'civilhod@gmail.com', '1234567890', '123', 8, 'mysore', '1990-12-19', 3, '23.jpg'),
(26, 'mech_HOD', 'mechhod@gmail.com', '1234567890', '123', 9, 'mandya', '1990-12-19', 3, '58.jpg'),
(32, 'suresh', 'suresh@gmail.com', '1234567890', '123', 4, 'mandya', '1980-12-29', 2, '2.jpg'),
(33, 'sanjay', 'sanjay@gmail.com', '1234567890', '123', 4, 'mandya', '1991-12-20', 2, '22.jpg'),
(34, 'Geethanjali', 'Geethanjali@gmail.com', '1234567890', '123', 4, 'mandya', '1989-02-02', 2, '11.jpg'),
(35, 'prabhakar', 'prabhakar@gmail.com', '1234567890', '123', 4, 'mandya', '1990-02-12', 2, '4.jpg'),
(36, 'bramesh', 'bramesh@gmail.com', '1234567890', '123', 4, 'mysore', '1989-02-12', 2, '12.jpg'),
(37, 'puttswamy', 'puttswamy@gmail.com', '1234567890', '123', 4, 'mandya', '1991-02-21', 2, '13.jpg'),
(38, 'rakshitha', 'rakshitha@gmail.com', '1234567890', '123', 4, 'mysore', '1991-02-02', 2, '8.jpg'),
(39, 'rakshith', 'rakshith@gmail.com', '1234567890', '123', 4, 'mysore', '1994-02-10', 2, '14.jpg'),
(40, 'S raghavendra', 'raghavendra@gmail.com', '1234567890', '123', 9, 'mandya', '1994-12-20', 2, 's raghavendra(mech).jpeg'),
(41, 'Ullas Nandan kumar s', 'ullasnandan@gmail.com', '1234567890', '123', 9, 'mandya', '1995-02-12', 2, 'ullas nandan(mech).jpeg'),
(42, 'HV Ravindra', 'hvravindra@gmail.com', '1234567890', '123', 9, 'mysore', '1988-12-19', 2, 'hv ravindra(mech).jpeg'),
(43, 'Guru pavan HR', 'gurupavan@gmail.com', '1234567890', '123', 9, 'mandya', '1990-02-12', 2, 'gurupavan(m).jpeg'),
(44, 'Abhishek GB', 'abhishekgb@gmail.com', '1234567890', '123', 8, 'mandya', '1989-02-21', 2, 'abhishek(mech).jpeg'),
(45, 'Ashwin CA', 'ashwinca@gmail.com', '1234567890', '123', 8, 'mysore', '1988-02-03', 2, 'ashwin(civil).jpeg'),
(46, 'Sumanth S', 'sumanth@gmail.com', '1234567890', '123', 8, 'mandya', '1995-02-19', 2, 'sumant(c).jpeg'),
(47, 'Avinash', 'Avinash@gmail.com', '1234567890', '123', 8, 'mandya', '1988-03-22', 2, 'avinash(c).jpeg'),
(48, 'R Girish', 'girish@gmail.com', '1234567890', '123', 5, 'mysore', '1987-02-22', 2, 'girish(cs).jpeg'),
(49, 'Shwetha MK', 'shweatha@gmail.com', '1234567890', '123', 5, 'mysore', '1987-02-22', 2, 'shweath(cs).jpeg'),
(50, 'TM Raghuvendra Babu', 'raghuvendra@gmail.com', '1234567890', '123', 5, 'mandya', '1988-01-19', 2, 'raghavendra(cs).jpeg'),
(51, 'Bhavya D', 'bhavya@gmail.com', '1234567890', '123', 5, 'mysore', '1988-05-19', 2, 'bhavya(cs).jpeg'),
(52, 'Sanjana BR', 'sanjana@gmail.co', '1234567890', '123', 7, 'mandya', '1996-09-20', 2, 'sahana(ec).jpeg'),
(53, 'Chethan L', 'chethan@gmail.com', '1234567890', '123', 7, 'mandya', '1994-04-12', 2, 'chethan(ec).jpeg'),
(54, 'Phalanetra HS', 'Phalanetra@gmail.com', '1234567890', '123', 7, 'mysore', '1990-06-21', 2, 'phalanetra(ec).jpeg'),
(55, 'Ullas P', 'ullasp@gmail.com', '1234567890', '123', 7, 'mysore', '1990-02-11', 2, 'ullas(ec).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_leave`
--

CREATE TABLE `faculty_leave` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_description` varchar(25) NOT NULL,
  `leave_status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_leave`
--

INSERT INTO `faculty_leave` (`id`, `employee_id`, `leave_id`, `leave_from`, `leave_to`, `leave_description`, `leave_status`, `role`, `department_id`, `employee_name`) VALUES
(3, 6, 4, '2020-02-12', '2020-02-19', 'fever', 3, 2, 4, 'bramesh'),
(12, 10, 3, '2020-02-11', '2020-02-12', 'fever', 2, 2, 5, 'cs1'),
(13, 24, 3, '2020-11-22', '2020-11-23', 'fever', 2, 2, 7, 'ec1'),
(14, 27, 3, '2020-11-20', '2020-11-22', 'MARRIAGE', 2, 2, 9, 'mech1'),
(15, 36, 3, '2020-12-11', '2020-12-12', 'fever', 2, 2, 4, 'bramesh');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `images`) VALUES
(1, ''),
(2, '9f331b0b-dee5-4a33-beb8-aeccdeac53af.jpg'),
(3, '9f331b0b-dee5-4a33-beb8-aeccdeac53af.jpg'),
(4, '9f331b0b-dee5-4a33-beb8-aeccdeac53af.jpg'),
(5, '3a82f227-46b8-4d7a-8627-b4723f515956.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_description` text NOT NULL,
  `leave_status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `dapartment_id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `employee_id`, `leave_id`, `leave_from`, `leave_to`, `leave_description`, `leave_status`, `role`, `dapartment_id`, `employee_name`) VALUES
(5, 5, 4, '2020-11-20', '2020-11-22', 'fever', 3, 3, 5, ''),
(8, 5, 3, '2020-02-10', '2020-03-10', 'fever', 2, 3, 4, ''),
(9, 5, 4, '2002-02-20', '2002-02-23', 'fever', 2, 3, 0, ''),
(10, 5, 4, '2020-11-20', '2020-11-22', 'fever', 3, 3, 0, 'IS_HOD'),
(11, 9, 4, '2020-12-22', '2020-12-23', 'fever', 2, 3, 0, 'CS_HOD'),
(12, 5, 3, '2020-11-20', '2020-11-22', 'MARRIAGE', 3, 3, 0, 'IS_HOD'),
(13, 25, 3, '2020-11-29', '2020-11-30', 'fever', 3, 3, 0, 'civil_hod'),
(14, 25, 2, '2020-11-20', '2020-11-21', 'fever', 2, 3, 0, 'civil_hod'),
(15, 26, 2, '2020-11-22', '2020-11-29', 'MARRIAGE', 2, 3, 0, 'mech_hod');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `leave_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_type`) VALUES
(2, 'Casual'),
(3, 'Earned'),
(4, 'Sick');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_leave`
--
ALTER TABLE `faculty_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `faculty_leave`
--
ALTER TABLE `faculty_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
