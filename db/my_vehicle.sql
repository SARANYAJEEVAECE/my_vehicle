-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 10:13 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `due_details`
--

CREATE TABLE `due_details` (
  `id` int(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `due_date` date NOT NULL,
  `due_amount` int(255) NOT NULL,
  `total_dues` int(255) NOT NULL,
  `due_paid` int(255) NOT NULL,
  `dues_remaining` int(255) NOT NULL,
  `bank_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_details`
--

CREATE TABLE `fc_details` (
  `id` int(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `fc_no` varchar(255) NOT NULL,
  `fc_date` date NOT NULL,
  `fc_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_details`
--

INSERT INTO `fc_details` (`id`, `vehicle_id`, `fc_no`, `fc_date`, `fc_amount`) VALUES
(1, 1, '12345', '2017-03-03', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_details`
--

CREATE TABLE `insurance_details` (
  `id` int(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `insurance_no` varchar(255) NOT NULL,
  `insurance_date` date NOT NULL,
  `insurance_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_details`
--

INSERT INTO `insurance_details` (`id`, `vehicle_id`, `insurance_no`, `insurance_date`, `insurance_amount`) VALUES
(1, 1, '12345', '2017-03-04', '123');

-- --------------------------------------------------------

--
-- Table structure for table `rc_details`
--

CREATE TABLE `rc_details` (
  `id` int(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `rc_no` varchar(255) NOT NULL,
  `rc_date` date NOT NULL,
  `rc_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rc_details`
--

INSERT INTO `rc_details` (`id`, `vehicle_id`, `rc_no`, `rc_date`, `rc_amount`) VALUES
(1, 1, '12345', '2017-03-02', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `sms_db`
--

CREATE TABLE `sms_db` (
  `id` int(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `paid_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_db`
--

INSERT INTO `sms_db` (`id`, `vehicle_no`, `category`, `amount`, `phone_no`, `date`, `paid_status`) VALUES
(1, 'SF00A1234', 'due_details', 1234567, 8940698743, '2017-03-02', 1),
(2, 'SF00A1234', 'fc_details', 1234, 8940698743, '2017-03-01', 1),
(3, 'SF00A1234', 'insurance_details', 123, 8940698743, '2017-03-04', 1),
(4, 'SF00A1234', 'rc_details', 1234, 8940698743, '2017-03-03', 1),
(5, 'SF00A1234', 'tax_details', 1234, 8940698743, '2017-03-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tax_details`
--

CREATE TABLE `tax_details` (
  `id` int(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `tax_no` varchar(255) NOT NULL,
  `tax_amount` int(255) NOT NULL,
  `tax_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_details`
--

INSERT INTO `tax_details` (`id`, `vehicle_id`, `tax_no`, `tax_amount`, `tax_date`) VALUES
(1, 1, '12345', 1234, '2017-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone_number` bigint(10) NOT NULL,
  `vehicle_count` int(255) NOT NULL,
  `max_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `city`, `phone_number`, `vehicle_count`, `max_count`) VALUES
(1, 'rubak', 'testcity', 8940698743, 4, 99),
(2, 'saranya', 'salem', 9876543210, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `remind_before` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `user_id`, `vehicle_number`, `remind_before`) VALUES
(1, 1, 'SF00A1234', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `due_details`
--
ALTER TABLE `due_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_details`
--
ALTER TABLE `fc_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fc_number` (`fc_no`);

--
-- Indexes for table `insurance_details`
--
ALTER TABLE `insurance_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `insurance_no` (`insurance_no`);

--
-- Indexes for table `rc_details`
--
ALTER TABLE `rc_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rc_number` (`rc_no`);

--
-- Indexes for table `sms_db`
--
ALTER TABLE `sms_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_details`
--
ALTER TABLE `tax_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_number` (`vehicle_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `due_details`
--
ALTER TABLE `due_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fc_details`
--
ALTER TABLE `fc_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `insurance_details`
--
ALTER TABLE `insurance_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rc_details`
--
ALTER TABLE `rc_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sms_db`
--
ALTER TABLE `sms_db`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tax_details`
--
ALTER TABLE `tax_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
