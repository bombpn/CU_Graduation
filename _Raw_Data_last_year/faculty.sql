-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 02:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cu_graduation`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL,
  `th_faculty_name` varchar(50) DEFAULT NULL,
  `en_faculty_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `th_faculty_name`, `en_faculty_name`) VALUES
(1, 'วิทยาลัยปิโตรเลียมและปิโตรเคมี', 'The Petroleum and Petrochemical College '),
(2, 'วิทยาลัยประชากรศาสตร์', 'College of Population Studies'),
(3, 'วิทยาลัยวิทยาศาสตร์สาธารณสุข', 'College of Public Health'),
(4, 'สถาบันบัณฑิตบริหารธุรกิจ ศศินทร์', 'Sasin Graduate Institute of Business Administratio'),
(5, 'สำนักวิชาทรัพยากรการเกษตร', 'The School of Agricultural Resource'),
(6, 'วิทยาลัยพยาบาลสภากาชาดไทย', 'Red Cross College of Nursing'),
(7, 'วิทยาลัยพยาบาลตำรวจ', 'Nurse Police College '),
(8, 'บัณฑิตวิทยาลัย(สหสาขา)', 'Faculty Name Eng'),
(21, 'คณะวิศวกรรมศาสตร์', 'Engineering'),
(22, 'คณะอักษรศาสตร์', 'Arts'),
(23, 'คณะวิทยาศาสตร์', 'Science'),
(24, 'คณะรัฐศาสตร์', 'Political Science '),
(25, 'คณะสถาปัตยกรรมศาสตร์', 'Architecture '),
(26, 'คณะพาณิชยศาสตร์และการบัญชี', 'Commerce and Accountancy '),
(27, 'คณะครุศาสตร์', 'Education'),
(28, 'คณะนิเทศศาสตร์', 'Communication Art '),
(29, 'คณะเศรษฐศาสตร์', 'Economy'),
(30, 'คณะแพทยศาสตร์', 'Medicine'),
(31, 'คณะสัตวแพทยศาสตร์', 'Veterinary Medicine'),
(32, 'คณะทันตแพทยศาสตร์', 'Dentistry '),
(33, 'คณะเภสัชศาสตร์', 'Pharmacy '),
(34, 'คณะนิติศาสตร์', 'Laws'),
(35, 'คณะศิลปกรรมศาสตร์', 'Fine Arts'),
(36, 'คณะพยาบาลศาสตร์', 'Nursing'),
(37, 'คณะสหเวชศาสตร์', 'Allied Health Science'),
(38, 'คณะจิตวิทยา', 'Psychology '),
(39, 'คณะวิทยาศาสตร์และการกีฬา', 'Sport Science');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
