-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 09:49 AM
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
-- Database: `attendance_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `adm_no` varchar(10) NOT NULL,
  `status` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`adm_no`, `status`, `date`) VALUES
('001', 'present', '2022-08-08'),
('1000', 'present', '2022-08-08'),
('465', 'absent', '2022-08-08'),
('767', 'absent', '2022-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(10) NOT NULL,
  `names` text NOT NULL,
  `type` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `names`, `type`, `phone`, `email`, `gender`) VALUES
('01', 'Joe Vortex', 'Teacher', '0711318428', 'fastjoevortex@gmail.com', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `adm_no` varchar(10) NOT NULL,
  `names` text NOT NULL,
  `form` int(1) NOT NULL,
  `stream` text NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`adm_no`, `names`, `form`, `stream`, `dob`, `gender`) VALUES
('001', 'Nancy Gathoni', 2, 'Champions', '2006-12-04', 'Female'),
('1000', 'Patrick Njuguna', 3, 'Gamma', '0012-12-12', 'Male'),
('465', 'James Njoroge', 2, 'Beta', '2008-02-02', 'Male'),
('767', 'Joseph Munyira', 4, 'Alpha', '2002-12-24', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`adm_no`,`date`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`adm_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
