-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 09:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsa_grievance`
--

-- --------------------------------------------------------

--
-- Table structure for table `cellmember`
--

CREATE TABLE `cellmember` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `memberImage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cellmember`
--

INSERT INTO `cellmember` (`id`, `name`, `designation`, `department`, `email`, `phoneno`, `password`, `memberImage`) VALUES
(10, 'Shyam Sunder', 'Director', 'director', 'director@bsacet.org', '8564321336', '1234', 'Shyam.jpg'),
(3, 'Ram Chandra Gupta', 'HOD', 'EE', 'hod.ee@bsacet.org', '9999912345', '9999', 'Ram.jpg'),
(14, 'Durga Puja', 'hod', 'CSE', 'hod.cs@bsacet.org', '1234567890', '1234', 'Durga.jpg'),
(5, 'Varun Chhabra', 'HOD', 'ME', 'hod.me@bsacet.org', '9999912348', '1234', 'HODME.jpg'),
(6, 'Vishal Lal Goswami', 'HOD', 'ECE', 'hod.ece@bsacet.org', '7428680188', '1234', 'Vishal.jpg'),
(7, 'Gajendra Garg', 'HOD', 'MBA', 'hod.mba@bsacet.org', '9087654321', '1234', 'Gajendra.jpg'),
(1, 'Ashok Kumar Sahu', 'HOD', 'CE', 'hod.ce@bsacet.org', '9087654321', '1234', 'Ashok.jpg'),
(15, 'Kishori Lal', '!st_yr coordinator', 'CSE', 'kishori.lal@bsacet.org', '1234567890', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `grievance`
--

CREATE TABLE `grievance` (
  `id` int(11) NOT NULL,
  `gid` varchar(50) NOT NULL,
  `gtype` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `complaint` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` varchar(500) NOT NULL,
  `reply_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `replier` varchar(200) NOT NULL,
  `fwdstatus` varchar(50) NOT NULL,
  `replystatus` varchar(50) NOT NULL,
  `fwdreply` varchar(500) NOT NULL,
  `fwdreplier` varchar(100) NOT NULL,
  `fwdreply_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grievance`
--

INSERT INTO `grievance` (`id`, `gid`, `gtype`, `subject`, `complaint`, `status`, `type`, `timestamp`, `reply`, `reply_timestamp`, `replier`, `fwdstatus`, `replystatus`, `fwdreply`, `fwdreplier`, `fwdreply_timestamp`) VALUES
(253, '25311', 'Issues about grades,Exam Procedures,Evaluation Process', 'asdfghj', 'ASEDFZX', 'open', 'staff', '2021-03-30 13:16:54', '', '2021-03-30 13:15:18', '', '0', 'close', 'REPLY BY DIRECTOR', 'Shyam Sunder', '2021-03-30 13:16:54'),
(253, '25312', 'Issues regarding Discrimination or Harrasment', 'CHECK FORWRD', 'ZDFXGCVBN', 'open', 'staff', '2021-03-30 13:31:12', '', '2021-03-30 13:31:12', '', '0', 'open', '', '', '2021-03-30 13:31:12'),
(255, '25511', 'Issues regarding Discrimination or Harrasment', 'HIGH AUTHORITY CHEQ', 'DSFCVJKBNM', 'close', 'student', '2021-03-30 13:26:08', 'MY REPLY', '2021-03-30 13:26:06', 'Durga Puja', 'fwd', 'open', '', '', '0000-00-00 00:00:00'),
(257, '25711', 'Issues about Fee related matter', 'not able to submit now', 'time require till next month', 'open', 'student', '2021-04-05 09:01:34', '', '0000-00-00 00:00:00', '', '', 'open', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grievant`
--

CREATE TABLE `grievant` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `position_held` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `admissionnum` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gtype` text NOT NULL,
  `userImage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grievant`
--

INSERT INTO `grievant` (`id`, `name`, `session`, `department`, `year`, `position_held`, `email`, `phone_no`, `admissionnum`, `password`, `gtype`, `userImage`) VALUES
(257, 'devyani agrawal', '2020-21', 'CSE', '3', '', 'devyaniagrawal18@bsacet.org', '9690600424', '1806510021', '1234', 'student', ''),
(253, 'staff', '', 'CSE', '', 'Associate Professor', 'staff@bsacet.com', '7874636646', '', '8888', 'staff', ''),
(255, 'NEW', '2020-21', 'CSE', '2', '', 'NEW@BSACET.ORG', '9690600424', '1806510030', '1234', 'student', ''),
(251, 'studentCse', '2020-21', 'CSE', '3', '', 'student@gmail.com', '7618500170', '777897', '1234', 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `memberImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `status`, `memberImage`) VALUES
(2, 'admin', '1234', '1', 'logo.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cellmember`
--
ALTER TABLE `cellmember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grievance`
--
ALTER TABLE `grievance`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `grievant`
--
ALTER TABLE `grievant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cellmember`
--
ALTER TABLE `cellmember`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `grievant`
--
ALTER TABLE `grievant`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
