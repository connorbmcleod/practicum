-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 09:45 PM
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
  `minimumpeople` int(4) NOT NULL,
  `maximumpeople` int(16) NOT NULL,
  `description` varchar(255) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `coursename`, `location`, `date`, `minimumpeople`, `maximumpeople`, `description`, `teacherID`) VALUES
(2, 'Mushrooming 101', 'The Bush', '12:00', 2, 15, 'We love mushrooming, why don''t you come down and get high.', 4),
(3, 'Hair Flipping 102', 'The Salon', '2AM', 1, 500, 'I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH', 4);

-- --------------------------------------------------------

--
-- Table structure for table `educatorinfo`
--

CREATE TABLE IF NOT EXISTS `educatorinfo` (
  `id` int(11) NOT NULL,
  `bio` text NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educatorinfo`
--

INSERT INTO `educatorinfo` (`id`, `bio`, `location`) VALUES
(0, 'Vancouver, BC', '4'),
(4, 'This is the crew''s account yo, don''t mess with us. We killas', 'Vancouver, BC');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `salt`, `email`, `usertype`) VALUES
(4, 'The', 'Crew', 'd953a4b80246bf81419220f04672eb1ce253162705d1b389b56d82388efcab69', '4919692d7678f409', 'crew@gmail.com', 1),
(5, 'Student', 'Person', '65721a74a17f2c72436d8c9909154b028aa372640ec4a9d39aec8922a4a6a572', '1032758c68beda27', 'student@gmail.com', 0);

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
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
