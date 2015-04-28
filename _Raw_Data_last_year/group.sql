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
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL,
  `th_group_name` varchar(50) DEFAULT NULL,
  `en_group_name` varchar(50) DEFAULT NULL,
  `international` tinyint(1) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `th_group_name`, `en_group_name`, `international`, `degree`) VALUES
(1, 'วิทยาลัยปิโตรเลียมและปิโตรเคมี ปริญญาโท-เอก', 'The Petroleum and Petrochemical College Graduate', 0, 'ปริญญาโท-เอก'),
(2, 'วิทยาลัยประชากรศาสตร์ ปริญญาโท-เอก', 'College of Population Studies', 0, 'ปริญญาโท-เอก'),
(3, 'วิทยาลัยวิทยาศาสตร์สาธารณสุข ปริญญาโท-เอก', 'College of Public Health Graduate', 0, 'ปริญญาโท-เอก'),
(4, 'สถาบันบัณฑิตบริหารธุรกิจ ศศินทร์ ปริญญาโท-เอก', 'Sasin Graduate Institute of Business Administratio', 0, 'ปริญญาโท-เอก'),
(5, 'สำนักวิชาทรัพยากรการเกษตร ปริญญาตรี', 'The School of Agricultural Resource Undergraduate', 0, 'ปริญญาตรี'),
(6, 'วิทยาลัยพยาบาลสภากาชาดไทย ปริญญาตรี', 'Red Cross College of Nursing Undergraduate', 0, 'ปริญญาตรี'),
(7, 'วิทยาลัยพยาบาลตำรวจ ปริญญาตรี', 'Nurse Police College Undergraduate', 0, 'ปริญญาตรี'),
(8, 'บัณฑิตวิทยาลัย(สหสาขา) ปริญญาโท-เอก', 'Graduate College', 0, 'ปริญญาโท-เอก'),
(9, 'คณะวิศวกรรมศาสตร์ ปริญญาตรี', 'Engineering Undergraduate', 0, 'ปริญญาตรี'),
(10, 'คณะวิศวกรรมศาสตร์ ปริญญาโท-เอก', 'Engineering Graduate', 0, 'ปริญญาโท-เอก'),
(11, 'คณะอักษรศาสตร์ ปริญญาตรี', 'Arts Undergraduate', 0, 'ปริญญาตรี'),
(12, 'คณะอักษรศาสตร์ ปริญญาโท-เอก', 'Arts Graduate', 0, 'ปริญญาโท-เอก'),
(13, 'คณะวิทยาศาสตร์ ปริญญาตรี', 'Science Undergraduate', 0, 'ปริญญาตรี'),
(14, 'คณะวิทยาศาสตร์ ปริญญาโท-เอก', 'Science Graduate', 0, 'ปริญญาโท-เอก'),
(15, 'คณะรัฐศาสตร์ ปริญญาตรี', 'Political Sciennce Undergraduate', 0, 'ปริญญาตรี'),
(16, 'คณะรัฐศาสตร์ ปริญญาโท-เอก', 'Political Sciennce Graduate', 0, 'ปริญญาโท-เอก'),
(17, 'คณะสถาปัตยกรรมศาสตร์ ปริญญาตรี', 'Architecture Undergraduate', 0, 'ปริญญาตรี'),
(18, 'คณะสถาปัตยกรรมศาสตร์ ปริญญาโท-เอก', 'Architecture Graduate', 0, 'ปริญญาโท-เอก'),
(19, 'คณะพาณิชยศาสตร์และการบัญชี ปริญญาตรี', 'Commerce and Accountancy Undergraduate', 0, 'ปริญญาตรี'),
(20, 'คณะพาณิชยศาสตร์และการบัญชี ปริญญาโท-เอก', 'Commerce and Accountancy Graduate', 0, 'ปริญญาโท-เอก'),
(21, 'คณะครุศาสตร์ ปริญญาตรี', 'Education Undergraduate', 0, 'ปริญญาตรี'),
(22, 'คณะครุศาสตร์ ปริญญาโท-เอก', 'Education Graduate', 0, 'ปริญญาโท-เอก'),
(23, 'คณะนิเทศศาสตร์ ปริญญาตรี', 'Communication Art Undergraduate', 0, 'ปริญญาตรี'),
(24, 'คณะนิเทศศาสตร์ ปริญญาโท-เอก', 'Communication Art Graduate', 0, 'ปริญญาโท-เอก'),
(25, 'คณะเศรษฐศาสตร์ ปริญญาตรี', 'Economy Undergraduate', 0, 'ปริญญาตรี'),
(26, 'คณะเศรษฐศาสตร์ ปริญญาโท-เอก', 'Economy Graduate', 0, 'ปริญญาโท-เอก'),
(27, 'คณะแพทยศาสตร์ ปริญญาตรี', 'Medicine Undergraduate', 0, 'ปริญญาตรี'),
(28, 'คณะแพทยศาสตร์ ปริญญาโท-เอก', 'Medicine Graduate', 0, 'ปริญญาโท-เอก'),
(29, 'คณะสัตวแพทยศาสตร์ ปริญญาตรี', 'Veterinary Medicine Undergraduate', 0, 'ปริญญาตรี'),
(30, 'คณะสัตวแพทยศาสตร์ ปริญญาโท-เอก', 'Veterinary Medicine Graduate', 0, 'ปริญญาโท-เอก'),
(31, 'คณะทันตแพทยศาสตร์ ปริญญาตรี', 'Dentistry Undergraduate', 0, 'ปริญญาตรี'),
(32, 'คณะทันตแพทยศาสตร์ ปริญญาโท-เอก', 'Dentistry Graduate', 0, 'ปริญญาโท-เอก'),
(33, 'คณะเภสัชศาสตร์ ปริญญาตรี', 'Pharmacy Undergraduate', 0, 'ปริญญาตรี'),
(34, 'คณะเภสัชศาสตร์ ปริญญาโท-เอก', 'Pharmacy Graduate', 0, 'ปริญญาโท-เอก'),
(35, 'คณะนิติศาสตร์ ปริญญาตรี', 'Laws Undergraduate', 0, 'ปริญญาตรี'),
(36, 'คณะนิติศาสตร์ ปริญญาโท-เอก', 'Laws Graduate', 0, 'ปริญญาโท-เอก'),
(37, 'คณะศิลปกรรมศาสตร์ ปริญญาตรี', 'Fine Arts Undergraduate', 0, 'ปริญญาตรี'),
(38, 'คณะศิลปกรรมศาสตร์ ปริญญาโท-เอก', 'Fine Arts Graduate', 0, 'ปริญญาโท-เอก'),
(39, 'คณะพยาบาลศาสตร์ ปริญญาโท-เอก', 'Nursing Graduate', 0, 'ปริญญาโท-เอก'),
(40, 'คณะสหเวชศาสตร์ ปริญญาตรี', 'Allied Health Science Undergraduate', 0, 'ปริญญาตรี'),
(41, 'คณะสหเวชศาสตร์ ปริญญาโท-เอก', 'Allied Health Science Graduate', 0, 'ปริญญาโท-เอก'),
(42, 'คณะจิตวิทยา ปริญญาตรี', 'Psychology Undergraduate', 0, 'ปริญญาตรี'),
(43, 'คณะจิตวิทยา ปริญญาโท-เอก', 'Psychology Graduate', 0, 'ปริญญาโท-เอก'),
(44, 'คณะวิทยาศาสตร์และการกีฬา ปริญญาตรี', 'Sport Science Undergraduate', 0, 'ปริญญาตรี'),
(45, 'คณะวิทยาศาสตร์และการกีฬา ปริญญาโท-เอก', 'Sport Science Graduate', 0, 'ปริญญาโท-เอก'),
(46, 'บริหารธุรกิจบัณฑิต', 'ฺBachelor of Business Administration', 1, 'ปริญญาตรี'),
(47, 'คณะวิศวกรรมศาสตร์ นานาชาติ ปริญญาตรี', 'International School of Engineering Undergraduate', 1, 'ปริญญาตรี'),
(48, 'อักษรศาสตร์ นานาชาติ ปริญญาตรี', 'Bachelor of Arts in Language and Culture Undergrad', 1, 'ปริญญาตรี');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
