-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2016 at 08:48 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weLearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseID` int(11) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(64) NOT NULL,
  `minimumpeople` int(11) NOT NULL,
  `maximumpeople` int(16) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `objective1` varchar(1024) NOT NULL,
  `objective2` varchar(1024) NOT NULL,
  `objective3` varchar(1024) NOT NULL,
  `objective4` varchar(1024) NOT NULL,
  `objective5` varchar(1024) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `completion` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `educatorinfo`
--

CREATE TABLE IF NOT EXISTS `educatorinfo` (
  `id` int(11) NOT NULL,
  `teacherfname` varchar(64) NOT NULL,
  `teacherlname` varchar(64) NOT NULL,
  `bio` varchar(2048) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educatorinfo`
--

INSERT INTO `educatorinfo` (`id`, `teacherfname`, `teacherlname`, `bio`, `location`) VALUES
(4, 'The', 'Crew', 'I AM COOL I AM CREW', 'Vancouver, BC'),
(6, 'Darya', 'Sh', 'Darya likes chicken and eating out with chickens', 'Vancouver, BC');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `salt` char(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `salt`, `email`, `usertype`) VALUES
(4, 'The', 'Crew', 'd953a4b80246bf81419220f04672eb1ce253162705d1b389b56d82388efcab69', '4919692d7678f409', 'crew@gmail.com', 1),
(5, 'Fake', 'Student', '9695db7fa807b0e530b32c021c1c28b398fc57450b649fa3cd0a72f3c52428d4', '2aa1db2b357583fe', 'student@gmail.com', 0),
(6, 'Darya', 'Sh', 'fc43507b540a1b54397003529cb2a3e45bd5a291aab342dfbc820892a50dfabd', '45cfbe2c782ce7bc', 'darya@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
