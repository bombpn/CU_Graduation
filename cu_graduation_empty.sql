-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 09:17 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `attend`
--

CREATE TABLE IF NOT EXISTS `attend` (
  `GROUP_group_id` int(11) NOT NULL,
  `SCHEDULE_schedule_id` int(11) NOT NULL,
  `attendance_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conduct`
--

CREATE TABLE IF NOT EXISTS `conduct` (
  `TEACHER_teacher_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SCHEDULE_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra_attend`
--

CREATE TABLE IF NOT EXISTS `extra_attend` (
  `STUDENT_student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SCHEDULE_schedule_id` int(11) NOT NULL,
  `TEACHER_teacher_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL,
  `th_faculty_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_faculty_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`group_id` int(11) NOT NULL,
  `th_group_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_group_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `international` tinyint(1) DEFAULT NULL,
  `degree` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `join`
--

CREATE TABLE IF NOT EXISTS `join` (
  `STUDENT_student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `GROUP_group_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `honors` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
`place_id` int(11) NOT NULL,
  `th_building` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_building` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor_plan_file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_seat` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`schedule_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `round` int(11) DEFAULT NULL,
  `PLACE_place_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `th_prefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `th_firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `th_lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_prefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_belong_to`
--

CREATE TABLE IF NOT EXISTS `student_belong_to` (
  `STUDENT_student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FACULTY_faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `th_prefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `th_firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `th_lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_prefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_belong_to`
--

CREATE TABLE IF NOT EXISTS `teacher_belong_to` (
  `TEACHER_teacher_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FACULTY_faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `STUDENT_student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SCHEDULE_schedule_id` int(11) NOT NULL,
  `seat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vip_seats`
--

CREATE TABLE IF NOT EXISTS `vip_seats` (
  `SCHEDULE_schedule_id` int(11) NOT NULL,
  `vip_seat` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
 ADD PRIMARY KEY (`GROUP_group_id`,`SCHEDULE_schedule_id`), ADD KEY `fk_GROUP_has_SCHEDULE_SCHEDULE1_idx` (`SCHEDULE_schedule_id`), ADD KEY `fk_GROUP_has_SCHEDULE_GROUP1_idx` (`GROUP_group_id`);

--
-- Indexes for table `conduct`
--
ALTER TABLE `conduct`
 ADD PRIMARY KEY (`TEACHER_teacher_id`,`SCHEDULE_schedule_id`), ADD KEY `fk_TEACHER_has_SCHEDULE_SCHEDULE1_idx` (`SCHEDULE_schedule_id`), ADD KEY `fk_TEACHER_has_SCHEDULE_TEACHER1_idx` (`TEACHER_teacher_id`);

--
-- Indexes for table `extra_attend`
--
ALTER TABLE `extra_attend`
 ADD PRIMARY KEY (`STUDENT_student_id`,`SCHEDULE_schedule_id`), ADD KEY `fk_STUDENT_has_SCHEDULE_SCHEDULE2_idx` (`SCHEDULE_schedule_id`), ADD KEY `fk_STUDENT_has_SCHEDULE_STUDENT2_idx` (`STUDENT_student_id`), ADD KEY `fk_EXTRA_EXTEND_TEACHER1_idx` (`TEACHER_teacher_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `join`
--
ALTER TABLE `join`
 ADD PRIMARY KEY (`STUDENT_student_id`,`GROUP_group_id`), ADD KEY `fk_STUDENT_has_GROUP_GROUP1_idx` (`GROUP_group_id`), ADD KEY `fk_STUDENT_has_GROUP_STUDENT1_idx` (`STUDENT_student_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
 ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`schedule_id`), ADD KEY `fk_SCHEDULE_PLACE1_idx` (`PLACE_place_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_belong_to`
--
ALTER TABLE `student_belong_to`
 ADD PRIMARY KEY (`STUDENT_student_id`,`FACULTY_faculty_id`), ADD KEY `fk_STUDENT_BELONG_TO_STUDENT1_idx` (`STUDENT_student_id`), ADD KEY `fk_STUDENT_BELONG_TO_FACULTY1_idx` (`FACULTY_faculty_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_belong_to`
--
ALTER TABLE `teacher_belong_to`
 ADD PRIMARY KEY (`TEACHER_teacher_id`,`FACULTY_faculty_id`), ADD KEY `fk_TEACHER_BELONG_TO_TEACHER1_idx` (`TEACHER_teacher_id`), ADD KEY `fk_TEACHER_BELONG_TO_FACULTY1_idx` (`FACULTY_faculty_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`STUDENT_student_id`,`SCHEDULE_schedule_id`), ADD KEY `fk_STUDENT_has_SCHEDULE_SCHEDULE1_idx` (`SCHEDULE_schedule_id`), ADD KEY `fk_STUDENT_has_SCHEDULE_STUDENT1_idx` (`STUDENT_student_id`);

--
-- Indexes for table `vip_seats`
--
ALTER TABLE `vip_seats`
 ADD PRIMARY KEY (`vip_seat`,`SCHEDULE_schedule_id`), ADD KEY `fk_VIP_SEATS_SCHEDULE_idx` (`SCHEDULE_schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
ADD CONSTRAINT `fk_GROUP_has_SCHEDULE_GROUP1` FOREIGN KEY (`GROUP_group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_GROUP_has_SCHEDULE_SCHEDULE1` FOREIGN KEY (`SCHEDULE_schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conduct`
--
ALTER TABLE `conduct`
ADD CONSTRAINT `fk_TEACHER_has_SCHEDULE_SCHEDULE1` FOREIGN KEY (`SCHEDULE_schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_TEACHER_has_SCHEDULE_TEACHER1` FOREIGN KEY (`TEACHER_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `extra_attend`
--
ALTER TABLE `extra_attend`
ADD CONSTRAINT `fk_EXTRA_EXTEND_TEACHER1` FOREIGN KEY (`TEACHER_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_STUDENT_has_SCHEDULE_SCHEDULE2` FOREIGN KEY (`SCHEDULE_schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_STUDENT_has_SCHEDULE_STUDENT2` FOREIGN KEY (`STUDENT_student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `join`
--
ALTER TABLE `join`
ADD CONSTRAINT `fk_STUDENT_has_GROUP_GROUP1` FOREIGN KEY (`GROUP_group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_STUDENT_has_GROUP_STUDENT1` FOREIGN KEY (`STUDENT_student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
ADD CONSTRAINT `fk_SCHEDULE_PLACE1` FOREIGN KEY (`PLACE_place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_belong_to`
--
ALTER TABLE `student_belong_to`
ADD CONSTRAINT `fk_STUDENT_BELONG_TO_FACULTY1` FOREIGN KEY (`FACULTY_faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_STUDENT_BELONG_TO_STUDENT1` FOREIGN KEY (`STUDENT_student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_belong_to`
--
ALTER TABLE `teacher_belong_to`
ADD CONSTRAINT `fk_TEACHER_BELONG_TO_FACULTY1` FOREIGN KEY (`FACULTY_faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_TEACHER_BELONG_TO_TEACHER1` FOREIGN KEY (`TEACHER_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
ADD CONSTRAINT `fk_STUDENT_has_SCHEDULE_SCHEDULE1` FOREIGN KEY (`SCHEDULE_schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_STUDENT_has_SCHEDULE_STUDENT1` FOREIGN KEY (`STUDENT_student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vip_seats`
--
ALTER TABLE `vip_seats`
ADD CONSTRAINT `fk_VIP_SEATS_SCHEDULE` FOREIGN KEY (`SCHEDULE_schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
