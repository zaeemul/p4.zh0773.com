-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 10:14 PM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zhcom_student_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE IF NOT EXISTS `attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `status`, `created`, `modified`) VALUES
(3, 1, 'Present', '2013-12-22 09:45:22', '2013-12-22 09:45:22'),
(4, 3, 'Absent', '2013-12-22 09:45:22', '2013-12-22 09:45:22'),
(5, 1, 'Absent', '2013-12-22 15:52:37', '2013-12-22 15:52:37'),
(6, 3, 'Present', '2013-12-22 15:52:37', '2013-12-22 15:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Nursery ', '2013-12-21 20:43:59', '2013-12-21 16:09:10'),
(2, 'Prep', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(3, 'One', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(4, 'Two', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(5, 'Three', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(6, 'Four', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(7, 'Fifth', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(8, 'Six', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(9, 'Seven', '2013-12-21 20:43:59', '2013-12-21 20:44:06'),
(10, 'Eight', '2013-12-21 20:43:59', '2013-12-21 20:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `classes_courses`
--

CREATE TABLE IF NOT EXISTS `classes_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `classes_courses`
--

INSERT INTO `classes_courses` (`id`, `course_id`, `class_id`, `created`, `modified`) VALUES
(3, 1, 7, '2013-12-22 08:44:45', '2013-12-22 08:44:45'),
(4, 3, 2, '2013-12-22 08:46:40', '2013-12-22 08:46:40'),
(5, 1, 2, '2013-12-22 08:46:55', '2013-12-22 08:46:55'),
(6, 1, 1, '2013-12-22 17:52:40', '2013-12-22 17:52:40'),
(7, 3, 1, '2013-12-22 17:53:05', '2013-12-22 17:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `created`, `modified`) VALUES
(1, 'Web Engineering', 'Introductory course for beginners.', '2013-12-21 16:22:09', '2013-12-22 15:55:30'),
(3, 'English', 'Basic English Learning', '2013-12-22 08:46:23', '2013-12-22 08:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `classes_course_id` int(11) NOT NULL,
  `marks` double NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `total_marks` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `classes_course_id`, `marks`, `created`, `modified`, `total_marks`) VALUES
(4, 1, 4, 100, '2013-12-22 10:18:33', '2013-12-22 10:18:33', 100),
(5, 3, 4, 56, '2013-12-22 10:18:33', '2013-12-22 10:18:33', 100);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `date_of_birth`, `phone`, `email`, `address`, `enabled`, `created`, `modified`, `class_id`) VALUES
(1, 'Jason', 'Dobbins', '1989-08-02', '3174087815', 'jason@yahoo.com', 'New Hempshire', 1, '2013-12-22 06:14:55', '2013-12-22 20:20:12', 2),
(3, 'James', 'Jewhurst', '1995-12-22', '3174087815', 'james@gmail.com', 'Temp, Florida', 1, '2013-12-22 08:48:37', '2013-12-22 20:20:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `enabled`, `created`, `modified`) VALUES
(1, 'myadmin', '12345678', 1, '2013-12-21 20:07:48', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
