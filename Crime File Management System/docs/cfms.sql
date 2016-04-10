-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2013 at 10:44 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cfms`
--
CREATE DATABASE `cfms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cfms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `uname`, `pass`, `email`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'info@cfms.com');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `incident_dat` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `evidence` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `evidenceType` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`id`, `title`, `incident_dat`, `description`, `evidence`, `location`, `evidenceType`) VALUES
(1, 'Attempted Murder of Mrs. Sweet Brown', '12/03.2013 13:45', 'A very stupid human being was barbecueing while and he set the whole building on fire while Mrs. Sweet Brown was asleep', 'Sweet.flv', 'Brooklyn, New York', 'VIDEO'),
(2, 'Robberry', '13/03.2013 13:45', '...', 'placeholder.png', 'Welch Hall, Babcock University', 'NO EVIDENCE');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL auto_increment,
  `sender` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `sender`, `name`, `subject`, `message`, `date`, `status`) VALUES
(1, 'leke4shizzle@gmailcom', 'Ayofe Adeleke', 'Criminal Spotted', 'Mr. Ayodeji Ayo-Fasan was spotted leaving a junk yard in lagos.', 'Wed 13 Mar 22:45', 'Read'),
(2, 'seandabadest@yahoo.com', 'Seun Odebunmi', 'Missing Person Found', 'A 5 feet short guy matching the description of Mr. Odebunmi oluwaseun was spotted leaving a bar last night.', 'Wed 13 Mar 22:45', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `missing_persons`
--

CREATE TABLE `missing_persons` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `race` varchar(100) NOT NULL,
  `last_seen` varchar(100) NOT NULL,
  `last_spotted` text NOT NULL,
  `attributes` text NOT NULL,
  `address` text NOT NULL,
  `picture` varchar(100) NOT NULL,
  `reported_By_userID` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_missing_persons_1` (`reported_By_userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `missing_persons`
--

INSERT INTO `missing_persons` (`id`, `name`, `age`, `sex`, `race`, `last_seen`, `last_spotted`, `attributes`, `address`, `picture`, `reported_By_userID`, `status`) VALUES
(1, 'Odebunmi Oluwaseun', 58, 'Male', 'Caucasian', '12/03/2013 13:44', 'Gbagada, Lagos', '5 feet short', 'Gbagada, Lagos', 'IMG_1368.JPG', 1, 'MISSING');

-- --------------------------------------------------------

--
-- Table structure for table `most_wanted_list`
--

CREATE TABLE `most_wanted_list` (
  `id` int(11) NOT NULL auto_increment,
  `picture` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `offence` varchar(100) NOT NULL,
  `reward` decimal(10,0) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `most_wanted_list`
--

INSERT INTO `most_wanted_list` (`id`, `picture`, `name`, `age`, `sex`, `offence`, `reward`) VALUES
(1, 'IMG_1332.JPG', 'Ayodeji Ayo-Fasan', 34, 'Male', 'First Degree Murder', '100000'),
(3, 'IMG_0037.JPG', 'Ayofe Adeleke', 20, 'Male', 'Second Degree Murder', '1200000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `uname`, `sex`, `address`, `occupation`, `phone`, `email`, `pass`, `status`, `mode`) VALUES
(1, 'Ayofe Adeleke', 'nasir', 'Male', 'Ibadan', 'Software Developer', 2147483647, 'leke4shizzle@gmail.com', '40bbbdfb2835536975686ec710abcaaf0362f9f0', 'unblocked', 'online'),
(2, 'Odebunmi Seun', 'Sh0n_', 'Male', 'Gbagada', 'Network Administrator', 2147483647, 'seandabadest@yahoo.com', '33d50493a4051eac8497c8790c617be7d328139a', 'unblocked', 'online'),
(3, 'Tayo Shola', 'tayoteekay', 'Male', 'Surulere', 'Farmer', 3223436, 'shola.tayo@gmail.com', '12d4af7ad78351197d9cc19c89ed3932b89f929f', 'disapproved', 'offline'),
(4, 'Obidele Iyanu', 'iyanu', 'Male', 'Lagos', 'Software Developer', 805342845, 'iyanu.obidele@yahoo.com', '2ee93e91aeb7103d9d74c6a93db1f65a84e9316d', 'disapproved', 'offline'),
(5, 'Asiegbu Ugo', 'ugo', 'Male', 'Lagos', 'Chatered Accountant', 62773882, 'ugo.asiegbu@yahoo.com', '7a760284d4b78031ce5b4cad6ec3d327b201ec89', 'blocked', 'online');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `missing_persons`
--
ALTER TABLE `missing_persons`
  ADD CONSTRAINT `FK_missing_persons_1` FOREIGN KEY (`reported_By_userID`) REFERENCES `users` (`id`);
