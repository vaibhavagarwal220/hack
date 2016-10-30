-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2016 at 02:22 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oj1`
--
CREATE DATABASE IF NOT EXISTS `oj1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oj1`;

-- --------------------------------------------------------

--
-- Table structure for table `hotspot`
--

CREATE TABLE IF NOT EXISTS `hotspot` (
  `username` varchar(50) NOT NULL,
  `pword` varchar(200) NOT NULL,
  `hotnm` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotspot`
--

INSERT INTO `hotspot` (`username`, `pword`, `hotnm`) VALUES
('vaibhav', 'kush', 'kush');

-- --------------------------------------------------------

--
-- Table structure for table `user_in`
--

CREATE TABLE IF NOT EXISTS `user_in` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `srname` varchar(30) NOT NULL,
  `pword` varchar(32) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `score` double NOT NULL,
  `imgln` varchar(10000) NOT NULL,
  `dgive` int(11) NOT NULL DEFAULT '0',
  `dused` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_in`
--

INSERT INTO `user_in` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `phone`, `score`, `imgln`, `dgive`, `dused`, `points`) VALUES
(8, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav2', 'vaibhavagarwl220@s', '99856232', 1000, 'imgprof/IMG_20150615_134817.jpg', 0, 0, 100),
(9, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav22', 'vaibhavagarwl220@s', '959', 1000, 'imgprof/IMG_20150615_145345.jpg', 0, 0, 100),
(10, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav', 'vaibhavagarwl220@s', '979622232323', 1000, 'imgprof/IMG_20150615_134817.jpg', 43, 61, 82),
(11, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav220', 'vaibhavagarwal220@gmail.com', '9736260564', 1000, 'imgprof/IMG_20150615_111829.jpg', 281, 163, 67),
(12, 'deepanshu', 'tyagi', '71709241b5cb11e8ed8809b26a7d73d3', 'deepanshu', 'vaibhav@sjabs', '6889996595', 1000, 'imgprof/images.jpg', 0, 0, 100),
(13, 'Kushagra', 'Singhal', 'a152e841783914146e4bcd4f39100686', 'kushagra', 'vaibhavagarwal220@gmail.com', '988989', 1000, 'imgprof/IMG_20150615_110529.jpg', 0, 0, 100),
(14, 'Vaibav', 'agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'dadadadada', 'vaibhavagarwal220@gmail.com', '65556565', 1000, 'imgprof/14858607_983706325073415_87157165_o.png', 0, 0, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
