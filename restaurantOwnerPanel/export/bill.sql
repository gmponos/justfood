-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2011 at 12:08 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_no` int(25) NOT NULL,
  `student_code` varchar(30) NOT NULL,
  `student_no` varchar(30) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `class_code` varchar(30) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `class_section` varchar(30) NOT NULL,
  `class_group` varchar(30) NOT NULL,
  `bill_type` varchar(35) NOT NULL,
  `term1` varchar(6) NOT NULL,
  `date1` varchar(15) NOT NULL,
  `term1paid` int(6) NOT NULL,
  `balance` int(15) NOT NULL,
  `term2` varchar(6) NOT NULL,
  `date2` varchar(40) NOT NULL,
  `term2paid` int(15) NOT NULL,
  `admission_fees` int(6) NOT NULL,
  `tution_fees` int(11) NOT NULL,
  `book_fees` int(11) NOT NULL,
  `monthly_fees` int(11) NOT NULL,
  `lab_fees` int(11) NOT NULL,
  `sports_fees` int(11) NOT NULL,
  `karate_fees` int(11) NOT NULL,
  `yoga_fees` int(11) NOT NULL,
  `hostel_fees` int(11) NOT NULL,
  `transport_fees` int(11) NOT NULL,
  `total_fees` int(15) NOT NULL,
  `total_balance` int(11) NOT NULL,
  `balance_status` varchar(15) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `admission_no`, `student_code`, `student_no`, `student_name`, `class_code`, `class_name`, `class_section`, `class_group`, `bill_type`, `term1`, `date1`, `term1paid`, `balance`, `term2`, `date2`, `term2paid`, `admission_fees`, `tution_fees`, `book_fees`, `monthly_fees`, `lab_fees`, `sports_fees`, `karate_fees`, `yoga_fees`, `hostel_fees`, `transport_fees`, `total_fees`, `total_balance`, `balance_status`) VALUES
(4, 2, 'STCNO2', 'REGST2', 'Balaji', 'CL01A', 'LKG', 'A', '1', 'B', 'term1', '05-AUG-2011', 26000, 30000, 'term2', '18-AUG-2011', 30000, 2000, 3000, 5000, 4000, 6000, 7000, 8000, 9000, 1000, 11000, 56000, 0, 'paid'),
(5, 3, 'STCNO3', 'REGST3', 'Chandru', 'CL01A', 'LKG', 'A', '1', 'C', 'term1', '01-AUG-2011', 32000, 30000, 'term2', '04-AUG-2011', 30000, 2200, 2300, 3400, 4500, 5600, 6700, 7800, 8900, 9000, 11600, 62000, 0, 'paid'),
(6, 7, 'STCNO7', 'REGST7', 'Durai', 'CL02A', 'UKG', 'A', '1', 'E', 'term1', '02-AUG-2011', 10000, 10000, 'term2', '04-AUG-2011', 10000, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2300, 2900, 20000, 0, 'paid'),
(7, 15, 'STCNO15', 'REGST15', 'Rajkiran', 'CL11A', 'XI', 'A', 'BIOLOGY', 'G', 'term1', '01-AUG-2011', 22000, 30000, 'term2', '04-AUG-2011', 30000, 6000, 6250, 6500, 6750, 7000, 4000, 4200, 4500, 5000, 1800, 52000, 0, 'paid');
