-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 11:25 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lou-geh-university`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_code` varchar(40) NOT NULL,
  `Course_name` varchar(40) NOT NULL,
  `Course_begin` varchar(40) NOT NULL,
  `Total_Credit_Points` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finished_subject`
--

CREATE TABLE `finished_subject` (
  `subject_id` varchar(60) NOT NULL,
  `course_id` varchar(60) NOT NULL,
  `student_id` varchar(60) NOT NULL,
  `student_year` varchar(60) NOT NULL,
  `student_level` varchar(60) NOT NULL,
  `subject_name` varchar(60) NOT NULL,
  `Date_finished` varchar(60) NOT NULL,
  `subject_status` varchar(60) NOT NULL,
  `teacher_id` varchar(60) NOT NULL,
  `subject_grade` varchar(60) NOT NULL,
  `subject_sem` varchar(60) NOT NULL,
  `subject_year` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `graduated`
--

CREATE TABLE `graduated` (
  `student_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `date_start` varchar(50) NOT NULL,
  `date_finished` varchar(50) NOT NULL,
  `student_firstname` varchar(40) NOT NULL,
  `student_lastname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(60) NOT NULL,
  `teacher_id` varchar(60) NOT NULL,
  `course_id` varchar(60) NOT NULL,
  `subject_year_level` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `student_firstname` varchar(60) NOT NULL,
  `student_lastname` varchar(60) NOT NULL,
  `student_username` varchar(60) NOT NULL,
  `student_birthdate` varchar(60) NOT NULL,
  `student_year_enroll` varchar(60) NOT NULL,
  `student_sem_level` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `Student_Name` varchar(60) NOT NULL,
  `Course_ID` varchar(60) NOT NULL,
  `Std_Year_LVL` varchar(60) NOT NULL,
  `Std_Sem_LVL` varchar(60) NOT NULL,
  `Sub_Name` varchar(60) NOT NULL,
  `Sub_Year` varchar(60) NOT NULL,
  `Sub_Sem_LVL` varchar(60) NOT NULL,
  `Letter_Grade` varchar(60) NOT NULL,
  `Letter_Mark` varchar(60) NOT NULL,
  `Sub_ID` varchar(60) NOT NULL,
  `Teacher_ID` varchar(60) NOT NULL,
  `Student_id` varchar(60) NOT NULL,
  `Progress` varchar(60) NOT NULL,
  `FinishCourse` varchar(60) NOT NULL,
  `PendingCheckStatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `student_id` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `taken_course_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`student_id`, `subject_id`, `status`, `taken_course_id`) VALUES
('SI-5db552c5', 'SI-c4a2093c', '0', 'TI-63ce6794'),
('SI-2ff57f11', 'SI-c4a2093c', '1', 'TI-8c7fee84'),
('SI-2ff57f11', 'SI-6b948b19', '1', 'TI-8c7fee84');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_year` varchar(50) NOT NULL,
  `subject_grade` varchar(50) NOT NULL,
  `year_add` varchar(50) NOT NULL,
  `subject_semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(30) NOT NULL,
  `User_ID` varchar(50) NOT NULL,
  `teacher_course_teach` varchar(30) NOT NULL,
  `teacher_name` varchar(30) NOT NULL,
  `teacher_username` varchar(30) NOT NULL,
  `teacher_contact_number` varchar(30) NOT NULL,
  `teacher_teach_year` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `User_ID`, `teacher_course_teach`, `teacher_name`, `teacher_username`, `teacher_contact_number`, `teacher_teach_year`) VALUES
('TI-a92d5092', 'UI-2e32411d', 'asda', 'weq', 'w', '123213', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` varchar(50) NOT NULL,
  `User_level` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `contactnumber` int(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_level`, `username`, `password`, `gender`, `firstname`, `lastname`, `birthdate`, `contactnumber`, `email`) VALUES
('UI-d31ebce4', '', 'a', 'qweqwe', 'Female', ' qweqwe', 'qweqwe', 'February/3/2018', 12323, 'qx@gmail.com'),
('UI-2e32411d', 'TEACHER', 'w', 'qweqwe', 'UNKNOWN', 'weq', 'weq', 'UNKNOWN', 123213, 'UNKNOWN'),
('UI-f9afd49d', 'STUDENT', 'e', 'qweqwe', 'UNKNOWN', 'qwe', 'ewq', '2233-03-21', 0, 'UNKNOWN'),
('UI-fb1217ad', 'STUDENT', 'qw', 'qweqwe', 'UNKNOWN', 'eq', 'qwe', '0212-12-31', 0, 'UNKNOWN'),
('UI-ce8a1ffd', 'STUDENT', 'rr', 'qweqwe', 'UNKNOWN', 'asdas', 'qweqwe', '2123-12-31', 0, 'UNKNOWN');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
