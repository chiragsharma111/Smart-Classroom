-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 05:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartclasses`
--

-- --------------------------------------------------------

--
-- Table structure for table `artcourse`
--

CREATE TABLE `artcourse` (
  `courseID` varchar(10) NOT NULL,
  `articleID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artcourse`
--

INSERT INTO `artcourse` (`courseID`, `articleID`) VALUES
('IWP101', 'ART101'),
('CSE2006', 'ART206'),
('APK102', 'ART1008'),
('APK203', 'ART1088');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `articleID` varchar(10) NOT NULL,
  `articleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleID`, `articleName`) VALUES
('ART101', 'Hello guys, this is the first article. Hope you be excited.'),
('ART101', 'This is the second article...cheers.'),
('ART201', 'Article Number 3'),
('ART202', 'Article Number 3'),
('ART1008', 'This is the first article to Basic Android Course...'),
('ART1088', 'Winners don''t bother to easy...Get ready for something Orio...dude...');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `email_id` varchar(100) NOT NULL,
  `image_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` varchar(10) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `teacherID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `courseID`, `teacherID`) VALUES
('CS101', 'IWP101', 'T101'),
('CS102', 'IWP102', 'T102');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(10) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `price`) VALUES
('IWP101', 'Internet and Web Programming', 1200),
('IWP102', 'Java web programming', 2100),
('CSE2002', 'Theory of Computation & Compile Design', 1500),
('CSE2004', 'Network and Communication', 3000),
('CSE2005', 'Operating Systems', 700),
('CSE2006', 'Microprocessor & Interfacing', 1400),
('CSE4015', 'Human Computer Interaction', 3500),
('CSE3020', 'Data Visualization', 2800),
('CSE4019', 'Image Processing', 4000),
('CSE3024', 'Web Mining', 2500),
('MAT3004', 'Applied Linear Algebra', 1000),
('APK102', 'Introduction to android', 9000),
('APK203', 'Advance Android application', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `studentID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`name`, `email`, `password`, `phone`, `dob`, `gender`, `studentID`) VALUES
('anb', 'admin@gmail.com', 'admin123', 9998887770, '2017-11-15', 'male', '16bce1000'),
('sachet', 'sachet123@gmail.com', 'aa', 9879879870, '2017-11-01', 'male', '16bce1002'),
('Kartik', 'ks123@gmail.com', 'k', 9887999900, '2017-11-02', 'male', '16e1125'),
('Aadarsh', 'aad123@gmail.com', 'jainil', 9887999900, '2017-11-22', 'male', '16e1290'),
('Chirag', 'cs123@gmail.com', 'cs123', 8768987890, '2017-11-15', 'Male', 'stud101');

-- --------------------------------------------------------

--
-- Table structure for table `registert`
--

CREATE TABLE `registert` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `teacherID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registert`
--

INSERT INTO `registert` (`name`, `email`, `password`, `phone`, `gender`, `dob`, `teacherID`) VALUES
('geetha', 'g1', 'g2', 9997770011, 'female', '2017-11-24', '12'),
('', '', '', 0, '', '0000-00-00', '0'),
('geetha1', 'g11', 'g22', 9997770022, 'female', '2017-11-24', '12'),
('', '', '', 0, '', '0000-00-00', '0'),
('usha', 'u1', 'u22', 9879879870, 'female', '2017-11-24', '0'),
('', '', '', 0, '', '0000-00-00', '0'),
('usha', 'u1', 'u11111', 9879879870, 'female', '2017-11-24', 'qw12'),
('', '', '', 0, '', '0000-00-00', ''),
('', 'admin', 'admin', 0, '', '0000-00-00', ''),
('', '', '', 0, '', '0000-00-00', ''),
('dash', 'dd', 'd2', 9878987890, 'male', '2017-02-09', '18uyeh11'),
('', '', '', 0, '', '0000-00-00', ''),
('bagga', 'hb@gmail.com', 'bh123', 8798798790, 'female', '2017-11-01', '16bce1098'),
('', '', '', 0, '', '0000-00-00', ''),
('malathi', 'mal', 'kjndk', 908239048, 'male', '2017-11-15', 'jdksfh94382'),
('', '', '', 0, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `stucourse`
--

CREATE TABLE `stucourse` (
  `studID` varchar(100) NOT NULL,
  `courseID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stucourse`
--

INSERT INTO `stucourse` (`studID`, `courseID`) VALUES
('16bce1002', 'APK102'),
('16bce1002', 'APK203'),
('16bce1002', 'CSE2002'),
('16bce1002', 'CSE2004'),
('16bce1002', 'CSE2005'),
('16bce1002', 'CSE2006'),
('16bce1002', 'CSE3020'),
('16bce1002', 'CSE3024'),
('16bce1002', 'CSE4015'),
('16bce1002', 'CSE4019'),
('16bce1002', 'MAT3004'),
('16e1125', 'IWP101'),
('16e1290', 'APK102'),
('16e1290', 'APK203'),
('16e1290', 'CSE2002'),
('16e1290', 'CSE2004'),
('16e1290', 'CSE2005'),
('16e1290', 'CSE2006'),
('16e1290', 'CSE3020'),
('16e1290', 'CSE3024'),
('16e1290', 'CSE4015'),
('16e1290', 'CSE4019'),
('16e1290', 'IWP101'),
('16e1290', 'IWP102'),
('stud101', 'APK102'),
('stud101', 'APK203'),
('stud101', 'CSE2002'),
('stud101', 'CSE2004'),
('stud101', 'CSE2005'),
('stud101', 'CSE2006'),
('stud101', 'CSE3020'),
('stud101', 'CSE3024'),
('stud101', 'CSE4015'),
('stud101', 'CSE4019'),
('stud101', 'Human'),
('stud101', 'Image'),
('stud101', 'IWP101'),
('stud101', 'IWP102'),
('stud101', 'MAT3004'),
('stud101', 'Microproce'),
('stud101', 'Operating');

-- --------------------------------------------------------

--
-- Table structure for table `teachcourse`
--

CREATE TABLE `teachcourse` (
  `teacherID` varchar(10) NOT NULL,
  `courseID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachcourse`
--

INSERT INTO `teachcourse` (`teacherID`, `courseID`) VALUES
('T101', 'CSE4019'),
('T102', 'CSE1004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `stucourse`
--
ALTER TABLE `stucourse`
  ADD PRIMARY KEY (`studID`,`courseID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
