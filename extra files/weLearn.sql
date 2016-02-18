-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2016 at 12:28 AM
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
  `minimumpeople` int(11) NOT NULL,
  `maximumpeople` int(16) NOT NULL,
  `description` varchar(255) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `coursename`, `location`, `date`, `minimumpeople`, `maximumpeople`, `description`, `teacherID`) VALUES
(2, 'Mushrooming 101', 'The Bush', '12:00', 1, 15, 'Mushrooming is fantastic excercise for your imagination. ', 4),
(3, 'Hair Flipping 102', 'The Salon', '12:00', 1, 12, 'I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH I WHIP MY HAIR BACK AND FORTH', 4),
(4, 'Running 101', 'THe track', '2AM', 5, 10, 'RUN FOR DAYSSSSSSSSSSS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `educatorinfo`
--

CREATE TABLE IF NOT EXISTS `educatorinfo` (
  `id` int(11) NOT NULL,
  `teacherfname` varchar(64) NOT NULL,
  `teacherlname` varchar(64) NOT NULL,
  `bio` text NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educatorinfo`
--

INSERT INTO `educatorinfo` (`id`, `teacherfname`, `teacherlname`, `bio`, `location`) VALUES
(4, 'The', 'Crew', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et augue interdum, facilisis leo consequat, posuere sem. Ut sed leo vel tellus faucibus euismod. In et enim cursus, rhoncus libero sed, ornare elit. Sed nec quam rutrum, interdum augue vitae, porttitor purus. Aliquam et ipsum risus.', 'Vancouver, BC');

-- --------------------------------------------------------

--
-- Table structure for table `educators`
--

CREATE TABLE IF NOT EXISTS `educators` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `salt` char(16) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'Student', 'Person', 'd388e678e4c1924a8c3c647e3eb1d4fe84fe7b84b9fababcb2984cde412f1208', '31247311762a8034', 'student@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `educators`
--
ALTER TABLE `educators`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `educators`
--
ALTER TABLE `educators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
