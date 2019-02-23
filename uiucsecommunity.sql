-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2018 at 01:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiucsecommunity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Md. Sirazul Munir', 'toxicboy574@gmail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `company` varchar(500) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `projects` varchar(500) NOT NULL,
  `hobby` varchar(100) NOT NULL,
  `fID` varchar(500) NOT NULL,
  `tID` varchar(100) NOT NULL,
  `inID` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alumniphoto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `name`, `email`, `designation`, `company`, `experience`, `projects`, `hobby`, `fID`, `tID`, `inID`, `address`, `password`, `alumniphoto`) VALUES
(1, 'Foysal Ahmed', 'foysal@gmail.com', 'Programmer', 'Tiger IT ', 'Programmer in Tiger IT since 2015', 'Smart Vehicle System', 'Coding, Travelling', 'http://www.facebook.com/foysal', 'http://www.twitter.com/foysal', 'http://www.linkedin.com/foysal', 'Mohakhali, Dhaka', '00111', 'foysal.jpg'),
(2, 'Khairul Mottakin', 'khairul@gmail.com', 'Lecturer ', 'United International University', 'Lecturer at United International University since 2016', 'Smart Vehicle System', 'Travelling, Music', 'http://www.facebook.com/khairul', 'https://twitter.com/khairul', 'http://www.linkedin.com/khairul', 'DHanmondi', '4321', 'khairul.jpg'),
(3, 'Monjur Morshed', 'bappy@uiu.ac.bd', '', 'UIU', '', '', '', 'http://www.facebook.com/bappy', '', '', 'Shamoly, Dhaka', '123456', 'bappy.jpg'),
(4, 'Sajid Rabbani	', 'sajid@nascania.com', '', 'Power Grid', '', '', '', 'http://www.facebook.com/sajid', '', '', 'Mirpur-1, Dhaka', '6532', 'Sajid.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(30000) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `author` varchar(50) NOT NULL,
  `author_type` varchar(10) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `category`, `description`, `thumbnail`, `author`, `author_type`, `time`) VALUES
(2, 'Experience', 'Struggle', 'Frustration comes easily. Very easily. If you want to remove the frustration  then work very hard. Always remember, "Hard work can beat talent". ', 'struggle icon.jpg', 'Khairul Mottakin', 'alumni', '2017-12-30 22:31:58'),
(3, 'Frustrated Engineer!', 'Career', 'à¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦¶à¦¿à¦–à¦¤à§‡ à¦—à¦¿à§Ÿà§‡ à¦à¦• à¦ªà¦°à§à¦¯à¦¾à§Ÿà§‡ à¦¹à¦¤à¦¾à¦¶ à¦¹à§Ÿà§‡ à¦¯à¦¾à§Ÿ à¦¨à¦¿ à¦à¦®à¦¨ à¦•à§‡à¦¾à¦¨à§‡à¦¾ à¦®à¦¾à¦¨à§à¦· à¦¸à¦®à§à¦­à¦¬à¦¤ à§§à¦Ÿà¦¾à¦“ à¦ªà¦¾à¦“à§Ÿà¦¾ à¦¯à¦¾à§Ÿ à¦¨à¦¾, à¦ªà¦¾à¦°à§à¦¥à¦•à§à¦¯ à¦¹à¦²à§‡à¦¾ à¦…à¦¨à§‡à¦•à§‡ à¦¹à¦¤à¦¾à¦¶ à¦¹à§Ÿà§‡ à¦¹à¦¾à¦² à¦›à§‡à§œà§‡ à¦¦à§‡à§Ÿ, à¦…à¦¨à§‡à¦•à§‡ à¦à¦•à¦—à§à§Ÿà§‡à¦° à¦®à¦¤ à¦²à§‡à¦—à§‡ à¦¥à¦¾à¦•à§‡à¥¤ à¦à¦‡ à¦²à§‡à¦–à¦¾à¦° à¦‰à¦¦à§à¦¦à§‡à¦¶à§à¦¯ à¦¤à§‡à¦¾à¦®à¦¾à¦•à§‡ à¦¬à§œ à¦¬à§œ à¦•à¦¥à¦¾ à¦¬à¦²à§‡ à¦®à§‡à¦¾à¦Ÿà¦¿à¦­à§‡à¦Ÿà§‡à¦¡ à¦•à¦°à¦¾ à¦¨à¦¾, à¦¬à¦°à¦‚ à¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦•à¦°à¦¤à§‡ à¦—à¦¿à§Ÿà§‡ à¦•à§‡à¦¨ à¦®à¦¾à¦¨à§à¦· à¦¹à¦¤à¦¾à¦¶ à¦¹à§Ÿ à¦¸à§‡à¦°à¦•à¦® à¦•à§Ÿà§‡à¦•à¦Ÿà¦¾ à¦•à¦¾à¦°à¦£ à¦–à§à¦œà§‡ à¦¬à§‡à¦° à¦•à¦°à¦¾, à¦…à¦¨à§‡à¦• à¦¸à¦®à§Ÿ à¦†à¦®à¦°à¦¾ à¦¹à¦¤à¦¾à¦¶ à¦¹à§Ÿà§‡ à¦—à§‡à¦²à§‡ à¦®à¦¾à¦¥à¦¾à¦ à¦¾à¦¨à§à¦¡à¦¾ à¦•à¦°à§‡ à¦šà¦¿à¦¨à§à¦¤à¦¾ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¿ à¦¨à¦¾ à¦•à§‡à¦¨ à¦¹à¦¤à¦¾à¦¶ à¦²à¦¾à¦—à¦›à§‡ à¦†à¦° à¦¤à¦¾à¦‡ à¦¹à¦¤à¦¾à¦¶à¦¾à¦Ÿà¦¾à¦“ à¦•à¦®à¦¤à§‡ à¦šà¦¾à§Ÿ à¦¨à¦¾à¥¤ à¦à¦‡ à¦²à§‡à¦–à¦¾à§Ÿ à¦†à¦®à¦°à¦¾ à¦¸à§‡à¦°à¦•à¦® à¦•à¦¿à¦›à§ à¦•à¦¾à¦°à¦£ à¦–à§à¦œà§‡ à¦¬à§‡à¦° à¦•à¦°à¦¾à¦° à¦šà§‡à¦·à§à¦Ÿà¦¾ à¦•à¦°à¦¬à§‡à¦¾à¥¤\r\n\r\nà¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¸à¦¬à¦¾à¦° à¦•à¦¾à¦›à§‡à¦‡ à¦à¦•à¦¦à¦® à¦¨à¦¤à§à¦¨ à¦§à¦°à¦¨à§‡à¦° à¦à¦•à¦Ÿà¦¾ à¦œà¦¿à¦¨à¦¿à¦¸, à¦†à¦®à¦°à¦¾ à¦¯à§‡à¦¹à§‡à¦¤à§ à¦°à¦¾à¦¶à¦¿à§Ÿà¦¾à¦¨ à¦¬à¦¾ à¦šà¦¾à¦‡à¦¨à¦¿à¦œ à¦¬à¦¾à¦šà§à¦šà¦¾à¦¦à§‡à¦° à¦®à¦¤ à§§à§¦à¦¬à¦›à¦° à¦¬à§Ÿà¦¸à§‡ à¦•à§‡à¦¾à¦¡à¦¿à¦‚ à¦¶à¦¿à¦–à¦¿à¦¨à¦¾ à¦¬à¦°à¦‚ à¦•à¦®-à¦¬à§‡à¦¶à¦¿ à¦®à§à¦–à¦¸à§à¦¥à¦¬à¦¿à¦¦à§à¦¯à¦¾ à¦¦à¦¿à§Ÿà§‡ à¦¸à§à¦•à§à¦²-à¦•à¦²à§‡à¦œ à¦ªà¦¾à¦° à¦•à¦°à§‡ à¦«à§‡à¦²à¦¿ à¦¤à¦¾à¦‡ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦ªà§à¦°à¦¥à¦® à¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦¶à¦¿à¦–à¦¤à§‡ à¦à¦•à¦Ÿà§ à¦•à¦·à§à¦Ÿ à¦¹à§Ÿà¥¤ â€œà¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦®à¦¾à¦¦à§‡à¦° à¦®à¦¤ à¦šà¦¿à¦¨à§à¦¤à¦¾ à¦•à¦°à¦¾â€ à¦¬à¦¾ à¦‡à¦‚à¦°à§‡à¦œà¦¿à¦¤à§‡ â€œthink like a programmerâ€ à¦¬à¦²à§‡ à¦à¦•à¦Ÿà¦¾ à¦•à¦¥à¦¾à¦‡ à¦†à¦›à§‡ à¦•à¦¾à¦°à¦£ à¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦•à¦°à¦¤à§‡ à¦¹à¦²à§‡ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¸à¦¾à¦§à¦¾à¦°à¦£ à¦®à¦¾à¦¨à§à¦·à§‡à¦° à¦¥à§‡à¦•à§‡ à¦à¦•à¦Ÿà§ à¦…à¦¨à§à¦¯à¦­à¦¾à¦¬à§‡ à¦šà¦¿à¦¨à§à¦¤à¦¾à¦­à¦¾à¦¬à¦¨à¦¾ à¦•à¦°à¦¤à§‡ à¦¹à§Ÿà¥¤ à¦ªà§à¦°à¦¥à¦®à¦¤ à¦†à¦®à¦°à¦¾ à¦¬à§‡à¦¶à¦¿à¦­à¦¾à¦— à¦¬à¦¿à¦·à§Ÿà¦‡ à¦–à§à¦¬ à¦¡à¦¿à¦Ÿà§‡à¦‡à¦²à¦¸ à¦ à¦­à§‡à¦¬à§‡ à¦…à¦­à§à¦¯à¦¸à§à¦¤ à¦¨à¦¾à¥¤ à¦¤à§‡à¦¾à¦®à¦¾à¦° à¦¯à¦¦à¦¿ à¦à¦•à¦Ÿà¦¾ à¦¨à¦¤à§à¦¨ à¦•à¦²à¦® à¦•à§‡à¦¨à¦¾à¦° à¦¦à¦°à¦•à¦¾à¦° à¦¹à§Ÿ à¦¤à§à¦®à¦¿ à¦¹à§Ÿà¦¤à§‡à¦¾ à¦›à§‡à¦¾à¦Ÿ à¦­à¦¾à¦‡à¦•à§‡ à¦¬à¦²à§‡à¦¾ â€œà¦¯à¦¾ à¦¦à§‡à¦¾à¦•à¦¾à¦¨ à¦¥à§‡à¦•à§‡ à¦à¦•à¦Ÿà¦¾ à¦•à¦²à¦® à¦•à¦¿à¦¨à§‡ à¦†à¦¨â€, à¦•à¦¿à¦¨à§à¦¤à§ à¦¤à§à¦®à¦¿ à¦¯à¦¦à¦¿ à¦à¦•à¦Ÿà¦¾ à¦°à§‡à¦¾à¦¬à¦Ÿà¦•à§‡ à¦¬à¦²à¦¤à§‡ à¦šà¦¾à¦“ à¦•à¦²à¦® à¦•à¦¿à¦¨à§‡ à¦†à¦¨à¦¤à§‡ à¦¤à¦–à¦¨ à¦…à¦¨à§‡à¦• à¦¡à¦¿à¦Ÿà§‡à¦‡à¦²à¦¸ à¦šà¦¿à¦¨à§à¦¤à¦¾ à¦•à¦°à¦¤à§‡ à¦¹à§Ÿà¥¤ à¦¯à§‡à¦®à¦¨ à¦°à§‡à¦¾à¦¬à¦Ÿ à¦•à§‡à¦¾à¦¨ à¦¦à§‡à¦¾à¦•à¦¾à¦¨à§‡ à¦¯à¦¾à¦¬à§‡? à¦¦à§‡à¦¾à¦•à¦¾à¦¨à§‡ à¦•à¦²à¦® à¦¨à¦¾ à¦¥à¦¾à¦•à¦²à§‡ à¦•à¦¿ à¦•à¦°à¦¬à§‡? à¦¦à§‡à¦¾à¦•à¦¾à¦¨ à¦¬à¦¨à§à¦§ à¦¥à¦¾à¦•à¦²à§‡ à¦•à¦¿ à¦•à¦°à¦¬à§‡? à¦…à¦¨à§à¦¯ à¦¦à§‡à¦¾à¦•à¦¾à¦¨à§‡ à¦–à§à¦œà¦¬à§‡ à¦¨à¦¾à¦•à¦¿ à¦«à¦¿à¦°à§‡ à¦†à¦¸à¦¬à§‡? à¦•à§Ÿà¦Ÿà¦¿ à¦¦à§‡à¦¾à¦•à¦¾à¦¨à§‡ à¦–à§à¦œà¦¬à§‡? à¦•à§‡à¦¾à¦¨ à¦•à§‡à¦¾à¦®à§à¦ªà¦¾à¦¨à¦¿à¦° à¦•à¦²à¦® à¦•à¦¿à¦¨à¦¬à§‡? à¦•à¦¤ à¦Ÿà¦¾à¦•à¦¾ à¦¬à¦¾à¦œà§‡à¦Ÿ? à¦•à¦²à¦®à§‡à¦° à¦¦à¦¾à¦® à¦¬à¦¾à¦œà§‡à¦Ÿà§‡à¦° à¦¥à§‡à¦•à§‡ à¦¬à§‡à¦¶à¦¿ à¦¹à¦²à§‡ à¦•à¦¿ à¦¹à¦¬à§‡? à¦à¦°à¦•à¦® à¦…à¦¨à§‡à¦• à¦‡à¦¨à§à¦¸à§à¦Ÿà§à¦°à¦¾à¦•à¦¶à¦¨ à¦°à§‡à¦¾à¦¬à¦Ÿà¦•à§‡ à¦¦à¦¿à§Ÿà§‡ à¦¦à¦¿à¦¤à§‡ à¦¹à¦¬à§‡, à¦¨à¦¾à¦¹à¦²à§‡ à¦¹à§Ÿà¦¤à§‡à¦¾ à¦¦à§‡à¦–à¦¾ à¦¯à¦¾à¦¬à§‡ à¦°à§‡à¦¾à¦¬à¦Ÿ à¦•à¦²à¦® à¦–à§à¦œà¦¤à§‡ à¦–à§à¦œà¦¤à§‡ à¦…à¦¨à§à¦¯ à¦¶à¦¹à¦°à§‡ à¦šà¦²à§‡ à¦—à§‡à¦›à§‡! à¦¤à§‡à¦¾ à¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦®à¦¾à¦° à¦¹à¦¤à§‡ à¦¹à¦²à§‡ à¦¤à§‡à¦¾à¦®à¦¾à¦° à¦à¦°à¦•à¦® à¦–à§à¦Ÿà¦¿à§Ÿà§‡ à¦–à§à¦Ÿà¦¿à§Ÿà§‡ à¦šà¦¿à¦¨à§à¦¤à¦¾ à¦•à¦°à¦¾à¦° à¦…à¦­à§à¦¯à¦¾à¦¸ à¦°à¦ªà§à¦¤ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡, à¦¨à¦¾à¦¹à¦²à§‡ à¦¦à§‡à¦–à¦¾ à¦¯à¦¾à¦¬à§‡ à¦•à§‡à¦¾à¦¡ à¦²à§‡à¦–à¦¾à¦° à¦¸à¦®à§Ÿ à¦¨à¦¾à¦¨à¦¾à¦¨ à¦°à¦•à¦®à§‡à¦° à¦•à§‡à¦¸ à¦®à¦¿à¦¸ à¦¯à¦¾à¦¬à§‡, à¦•à¦–à¦¨à§‡à¦¾ à¦¨à§‡à¦—à§‡à¦Ÿà¦¿à¦­ à¦‡à¦¨à¦ªà§à¦Ÿ à¦¹à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦² à¦•à¦°à¦¤à§‡ à¦­à§à¦²à§‡ à¦¯à¦¾à¦¬à§‡, à¦•à¦–à¦¨à§‡à¦¾ à¦°à¦¿à¦•à¦¾à¦°à§à¦¶à¦¨ à¦¥à¦¾à¦®à¦¾à¦¤à§‡ à¦­à§à¦²à§‡ à¦¯à¦¾à¦¬à§‡, à¦ªà§à¦°à§‡à¦¾à¦—à§à¦°à¦¾à¦® à¦•à§à¦°à§à¦¯à¦¾à¦¶ à¦•à¦°à¦¬à§‡ à¦à¦¬à¦‚ à¦¤à§à¦®à¦¿ à¦¹à¦¤à¦¾à¦¶ à¦¹à§Ÿà§‡ à¦¯à¦¾à¦¬à§‡à¥¤\r\n\r\n ', 'experience.png', 'Sumon Ahmed', 'faculty', '2017-12-31 02:47:58'),
(4, 'Functional Programming With JavaScript Object Arrays', 'Software', 'Data manipulation is a common task in any JavaScript application. Fortunately, new array handling operators map, filter, and reduce are widely supported. While the documentation for these features is sufficient, it often shows very basic use cases for implementation. In daily use, we often need to use these methods to deal with arrays of data objects, which is the scenario lacking from the documentation. In addition, these operators are often seen in functional languages and bring to JavaScript a new perspective on iterating through objects with a functional touch.', 'download.jpg', 'Chowdhury Mofizur Rahman', 'faculty', '2018-04-25 16:12:02'),
(13, 'Client Interaction Fundamentals', 'Freelancing', 'These previews will each feature an entire lesson from the training, including everything youâ€™ll get when you sign up. We hope this will give you a good idea of how the training can help you in starting and building your own web design business. Business is everything. Learn fundamentals of business.', 'Freelancer-No-credit.jpg', 'Foysal Ahmed', 'alumni', '2018-05-02 20:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `heading`, `description`, `time`) VALUES
(1, 'Workshop of CCNA.', 'A workshop on routing and networking will be held on 5th December.', '2017-12-26 23:57:16'),
(2, ' Workshop of CV writing. ', ' A workshop on CV writing will be held on 10th December. ', '2017-12-26 23:58:23'),
(3, 'Programming contest.', 'Inter university programming contest will be held on 10th December', '2017-12-27 00:18:08'),
(4, ' Cricket Tournament. ', ' Inter university cricket tournament will be held on 20th December. ', '2017-12-27 00:18:44'),
(5, 'iGrapics Workshop', 'A workshop on i Graphics will be held on 15th may. ', '2018-05-06 05:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `projects` varchar(500) NOT NULL,
  `hobby` varchar(100) NOT NULL,
  `fbID` varchar(500) NOT NULL,
  `twitterID` varchar(500) NOT NULL,
  `linkedInID` varchar(500) NOT NULL,
  `password` varchar(20) NOT NULL,
  `facultyPhoto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `email`, `qualification`, `company`, `experience`, `projects`, `hobby`, `fbID`, `twitterID`, `linkedInID`, `password`, `facultyPhoto`) VALUES
(4, 'Chowdhury Mofizur Rahman', 'Vice Chancellor ', 'cmr@uiu.ac.bd', 'PhD', 'United International University', 'Lecturer from 9.12.1989 ', 'Bengali Character Recognition using Genetic Algorithm. Database Characterization using Induction. Development of a Low Cost 16-bit Microprocessor Trainer.', 'Travelling', 'facebook.com/cmr', 'twitter.com/cmr', 'in.com/cmr', '1234', 'cmr.jpg'),
(6, 'Sumon Ahmed', 'Asst. Professor', 'suman@cse.uiu.ac.bd', 'PhD', 'United International University', 'Faculty since 2000(May). Director, Center for Engineering & Scientific Research (CESR).', 'Gender Factor Supression for Bangla ASR. Information and Communication Technology.', 'Travelling, Music', 'http://www.facebook.com/sumon', 'http://www.twitter.com/sumon', 'http://www.linkedin.com/sumon', '963', 'sah.jpg'),
(7, 'Hasan Sorowar', 'Professor', 'hsarwar@cse.uiu.ac.bd', 'PhD', 'Edu Soft. & United International University', '', '', '', '', '', '', '1212', 'hsarwar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `salary_range` varchar(500) NOT NULL,
  `location` varchar(3000) NOT NULL,
  `job_category` varchar(3000) NOT NULL,
  `job_description` varchar(9000) NOT NULL,
  `contact_details` varchar(9000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `salary_range`, `location`, `job_category`, `job_description`, `contact_details`, `author`, `time`) VALUES
(4, 'Web Developer', '12000-15000', 'Dhanmondi, Dhaka ', 'Part-time', 'Job Description / Responsibility\r\nVisit this link to view detail: https://iom.org.bd/wp-content/uploads/2017/12/SVN_Graphic-Designer_CXB_G6.pdf\r\nJob Nature\r\nContractual\r\n\r\nEducational Requirements\r\nUniversity degree graphic design, graphic arts or a related field, or a college diploma supplemented with additional years of experience;\r\nExperience Requirements\r\nNa\r\nJob Requirements\r\nVisit this link to view detail: https://iom.org.bd/wp-content/uploads/2017/12/SVN_Graphic-Designer_CXB_G6.pdf\r\nJob Location\r\nDhanmondi ', 'Kamrul Islam\r\nkamrulislamtushar@ieee.org', ' Chowdhury Mofizur Rahman', '2018-01-01 12:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `sms` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `sms`) VALUES
(1, 'Md. Sirazul Munir', '', 'jhhh'),
(2, 'Md. Sirazul Munir', '', 'hfytf'),
(3, 'Md. Sirazul Munir', 'Chowdhury Mofizur Rahman', 'abcdef12345');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `heading`, `description`, `time`) VALUES
(1, 'Class on permanent campus', 'Spring trimester 2018 will be held on campus.\r\n\r\n', '2017-12-26 23:30:51'),
(2, ' Make up class ', ' Regular Monday class will be held on 10th December. ', '2017-12-26 23:31:42'),
(3, 'HOLIDAY NOTICE', 'United International University will remain closed on December 16, 2017 (Saturday) on the occasion of â€˜VICTORY DAYâ€™.', '2017-12-27 02:09:51'),
(4, 'Make up class', 'A make up class will be taken on 9th May 2018', '2018-05-06 05:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sID` varchar(10) NOT NULL,
  `fID` varchar(100) NOT NULL,
  `tID` varchar(100) NOT NULL,
  `inID` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `hobby` varchar(500) NOT NULL,
  `blood` varchar(50) NOT NULL,
  `projects` varchar(500) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sPhoto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `designation`, `email`, `sID`, `fID`, `tID`, `inID`, `address`, `hobby`, `blood`, `projects`, `password`, `sPhoto`) VALUES
(6, 'Kamrul Islam Tushar', 'President,UIU CCL', 'tushar@gmail.com', '011141039', 'www.facebook.com/tushar', 'twitter.com/frankenstein', 'linkedin.com/kamrulislam', 'Dhanmondi,Dhaka 1209', 'Travelling', 'B+', 'CSE Community', '1234', 'tushar2.JPG'),
(7, 'Md. Sirazul Munir', 'Student, Web Developer, UX/UI Designer', 'toxicboy574@gmail.com', '011142064', 'https://www.facebook.com/sirazulmunir1', 'https://twitter.com/SirazulMunir1', 'https://www.linkedin.com/in/sirazulmunir/', 'Hatembag, West DHanmondi, Dhaka-1209', 'Programming, Travelling, Bike Ride, Long Drive', 'B(+ve)', 'UIU CSE COMMUNITY, Criminal Record, Rent A Car, DX-BAll', '12345', 'munir.JPG'),
(9, 'Shakhawat Hossain', '', 'shamim63@gmail.com', '011142056', 'https://www.facebook.com/shshamim63', '', '', 'Tikatuli, Motijeel, Dhaka', '', '', '', 'shamim', '11722182_10203283792695844_7703660218998245607_o.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
