-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 11:25 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracerdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvsu_college`
--

CREATE TABLE `cvsu_college` (
  `colleges_ID` int(11) UNSIGNED NOT NULL,
  `college_name` varchar(150) DEFAULT NULL,
  `college_acronym` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvsu_college`
--

INSERT INTO `cvsu_college` (`colleges_ID`, `college_name`, `college_acronym`) VALUES
(1, 'College of Engineering and Information Technology', 'CEIT'),
(2, 'College of Art and Sciences', 'CAS');

-- --------------------------------------------------------

--
-- Table structure for table `cvsu_course`
--

CREATE TABLE `cvsu_course` (
  `course_ID` int(11) UNSIGNED NOT NULL,
  `course_departmentID` int(11) UNSIGNED DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `course_acronym` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvsu_course`
--

INSERT INTO `cvsu_course` (`course_ID`, `course_departmentID`, `course_name`, `course_acronym`) VALUES
(1, 2, 'Bachelor of Science in Information Technology', 'BSIT'),
(2, 2, 'Bachelor of Science in Computer Science', 'BSCS'),
(3, 2, 'Bachelor of Science in Office Administration', 'BSOA');

-- --------------------------------------------------------

--
-- Table structure for table `cvsu_department`
--

CREATE TABLE `cvsu_department` (
  `department_ID` int(11) UNSIGNED NOT NULL,
  `department_collegeID` int(11) UNSIGNED DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `department_acronym` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvsu_department`
--

INSERT INTO `cvsu_department` (`department_ID`, `department_collegeID`, `department_name`, `department_acronym`) VALUES
(1, 1, 'Computer Science', 'COMSCI'),
(2, 1, 'Information Technology', 'IT'),
(3, 1, 'Office Administration', 'OA');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

CREATE TABLE `forum_comment` (
  `comment_ID` int(11) UNSIGNED NOT NULL,
  `comment_topicID` int(11) UNSIGNED DEFAULT NULL,
  `comment_userID` int(11) UNSIGNED DEFAULT NULL,
  `comment_content` varchar(500) DEFAULT NULL,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`comment_ID`, `comment_topicID`, `comment_userID`, `comment_content`, `comment_date`) VALUES
(2, 15, 4, 'asdasdasd', '2018-03-03 15:35:39'),
(3, 17, 3, 'ytyutyu', '2018-03-12 08:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment_reply`
--

CREATE TABLE `forum_comment_reply` (
  `comment_reply_ID` int(11) UNSIGNED NOT NULL,
  `comment_reply_topicID` int(10) UNSIGNED DEFAULT NULL,
  `comment_reply_parentID` int(11) UNSIGNED DEFAULT NULL,
  `comment_reply_userID` int(11) UNSIGNED DEFAULT NULL,
  `comment_reply_content` varchar(500) DEFAULT NULL,
  `comment_reply_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topic_ID` int(11) UNSIGNED NOT NULL,
  `post_title` varchar(150) DEFAULT NULL,
  `post_owner_id` int(11) UNSIGNED DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_content` varchar(50000) DEFAULT NULL,
  `post_status` varchar(25) DEFAULT 'UNPIN'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_ID`, `post_title`, `post_owner_id`, `post_date`, `post_content`, `post_status`) VALUES
(15, '1231231', 1, '2018-02-24 14:48:22', '<p>asda</p>\r\n', 'UNPIN'),
(16, 'asda', 4, '2018-02-24 15:09:46', '<p>asdasd</p>\r\n', 'UNPIN'),
(17, 'asdasdas', 3, '2018-03-12 08:03:57', '<p>d213123123</p>\r\n', 'UNPIN');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `ID` int(11) UNSIGNED NOT NULL,
  `marital_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`ID`, `marital_Name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `message_send`
--

CREATE TABLE `message_send` (
  `message_ID` int(11) UNSIGNED NOT NULL,
  `message_threadID` int(11) UNSIGNED DEFAULT NULL,
  `message_sendDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_content` varchar(1500) DEFAULT NULL,
  `message_receiver` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_send`
--

INSERT INTO `message_send` (`message_ID`, `message_threadID`, `message_sendDate`, `message_content`, `message_receiver`) VALUES
(1, 1, '2018-02-22 15:22:11', 'waaaaaaaa', 3),
(2, 1, '2018-02-22 15:22:13', 'meeeeeeeeeeeee', 3);

-- --------------------------------------------------------

--
-- Table structure for table `message_send_state`
--

CREATE TABLE `message_send_state` (
  `state_ID` int(11) UNSIGNED NOT NULL,
  `state_msgID` int(11) UNSIGNED DEFAULT NULL,
  `state_readerID` int(11) UNSIGNED DEFAULT NULL,
  `state_dateRead` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_send_state`
--

INSERT INTO `message_send_state` (`state_ID`, `state_msgID`, `state_readerID`, `state_dateRead`) VALUES
(1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `thread_ID` int(11) UNSIGNED NOT NULL,
  `thread_name` varchar(150) DEFAULT NULL,
  `thread_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_thread`
--

INSERT INTO `message_thread` (`thread_ID`, `thread_name`, `thread_created`) VALUES
(1, '64564', '2018-02-22 15:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `message_thread_participant`
--

CREATE TABLE `message_thread_participant` (
  `participant_ID` int(11) UNSIGNED NOT NULL,
  `participant_threadID` int(11) UNSIGNED DEFAULT NULL,
  `participant_userID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_thread_participant`
--

INSERT INTO `message_thread_participant` (`participant_ID`, `participant_threadID`, `participant_userID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suggested_job`
--

CREATE TABLE `suggested_job` (
  `job_ID` int(11) UNSIGNED NOT NULL,
  `job_Title` varchar(250) DEFAULT NULL,
  `job_Course` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggested_job`
--

INSERT INTO `suggested_job` (`job_ID`, `job_Title`, `job_Course`) VALUES
(1, 'Web Developer', 1),
(2, 'Data Analysis', 1),
(3, 'Database Administrator', 3),
(5, 'Computer Support Specialist', 1),
(6, 'Computer Network Architect', 1),
(7, 'Information Security Analyst', 1),
(8, 'Software Developer', 1),
(9, 'Application Developer', 1),
(10, 'Applications Engineer', 1),
(11, 'Associate Developer', 1),
(12, 'Computer Programmer', 1),
(13, 'Data Quality Manager', 1),
(14, 'Desktop Support Specialist', 1),
(15, 'Desktop Support Manager', 1),
(16, 'Computer Support Specialist', 2),
(17, 'Computer Network Architect', 2),
(18, 'Information Security Analyst', 2),
(19, 'Software Developer', 2),
(20, 'Application Developer', 2),
(21, 'Applications Engineer', 2),
(22, 'Associate Developer', 2),
(23, 'Computer Programmer', 2),
(24, 'Data Quality Manager', 2),
(25, 'Desktop Support Specialist', 2),
(26, 'Desktop Support Manager', 2),
(30, 'Receptionist', 3),
(31, 'Administration Assistant', 3),
(33, 'Office Manager', 3),
(34, 'Personal Assistant', 3),
(35, 'Executive Assistant', 3),
(36, 'Virtual Assistant', 3);

-- --------------------------------------------------------

--
-- Table structure for table `survey_forms`
--

CREATE TABLE `survey_forms` (
  `form_id` int(11) UNSIGNED NOT NULL,
  `form_ownerID` int(11) UNSIGNED DEFAULT NULL,
  `form_taken` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_forms`
--

INSERT INTO `survey_forms` (`form_id`, `form_ownerID`, `form_taken`) VALUES
(0, 0, '2018-02-04 12:23:39'),
(1, 1, '2018-02-04 13:24:38'),
(2, 1, '2018-02-07 16:41:32'),
(3, 18, '2018-03-17 04:47:43'),
(4, 18, '2018-03-17 04:57:57'),
(5, 21, '2018-03-17 09:57:10'),
(6, 22, '2018-03-17 10:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `survey_maxcount`
--

CREATE TABLE `survey_maxcount` (
  `survey_id` int(11) UNSIGNED NOT NULL,
  `survey_ownerID` int(11) UNSIGNED DEFAULT NULL,
  `survey_maxattemp` int(11) DEFAULT NULL,
  `survey_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_maxcount`
--

INSERT INTO `survey_maxcount` (`survey_id`, `survey_ownerID`, `survey_maxattemp`, `survey_date`) VALUES
(1, 1, 0, '2018-02-07 16:00:00'),
(2, 3, 2, '2018-02-19 16:00:00'),
(3, 6, 2, '2018-02-18 16:00:00'),
(4, 18, 0, '2018-03-17 04:57:57'),
(5, 19, 2, '2018-03-07 17:46:58'),
(6, 21, 1, '2018-03-17 09:57:10'),
(7, 22, 1, '2018-03-17 10:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question1`
--

CREATE TABLE `survey_question1` (
  `survey_qID` int(11) UNSIGNED NOT NULL,
  `row` int(11) DEFAULT NULL,
  `col1` varchar(50) DEFAULT NULL,
  `col2` varchar(50) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question1`
--

INSERT INTO `survey_question1` (`survey_qID`, `row`, `col1`, `col2`, `survey_formID`) VALUES
(1, 1, '', 'G_MS_MA_PHD1', 1),
(2, 2, '', 'G_MS_MA_PHD2', 1),
(3, 3, '', '', 1),
(4, 4, 'U_AB_BS4', '', 1),
(5, 5, 'U_AB_BS5', '', 1),
(6, 6, '', '', 1),
(7, 7, '', 'G_MS_MA_PHD7', 1),
(8, 8, '', 'G_MS_MA_PHD8', 1),
(9, 9, 'U_AB_BS9', '', 1),
(10, 10, 'U_AB_BS10', '', 1),
(11, 11, '', 'G_MS_MA_PHD11', 1),
(12, 12, '', 'G_MS_MA_PHD12', 1),
(13, 13, 'U_AB_BS13', '', 1),
(14, 14, 'U_AB_BS14', '', 1),
(15, 15, 'other', 'zzzzzzzzzz', 1),
(16, 1, 'U_AB_BS1', '', 2),
(17, 2, 'U_AB_BS2', '', 2),
(18, 3, 'U_AB_BS3', '', 2),
(19, 4, '', 'G_MS_MA_PHD4', 2),
(20, 5, '', '', 2),
(21, 6, '', '', 2),
(22, 7, '', '', 2),
(23, 8, '', '', 2),
(24, 9, '', '', 2),
(25, 10, '', '', 2),
(26, 11, '', '', 2),
(27, 12, '', '', 2),
(28, 13, '', '', 2),
(29, 14, '', '', 2),
(30, 15, 'other', '', 2),
(31, 1, 'U_AB_BS1', '', 3),
(32, 2, '', 'G_MS_MA_PHD2', 3),
(33, 3, 'U_AB_BS3', '', 3),
(34, 4, '', '', 3),
(35, 5, '', 'G_MS_MA_PHD5', 3),
(36, 6, '', '', 3),
(37, 7, '', '', 3),
(38, 8, '', '', 3),
(39, 9, '', '', 3),
(40, 10, '', 'G_MS_MA_PHD10', 3),
(41, 11, '', '', 3),
(42, 12, '', '', 3),
(43, 13, '', '', 3),
(44, 14, '', '', 3),
(45, 15, 'other', 'sdsdfsdfsdf', 3),
(46, 1, '', 'G_MS_MA_PHD1', 4),
(47, 2, '', 'G_MS_MA_PHD2', 4),
(48, 3, '', '', 4),
(49, 4, '', '', 4),
(50, 5, '', '', 4),
(51, 6, '', '', 4),
(52, 7, '', '', 4),
(53, 8, '', '', 4),
(54, 9, '', '', 4),
(55, 10, '', '', 4),
(56, 11, '', '', 4),
(57, 12, '', '', 4),
(58, 13, '', '', 4),
(59, 14, '', 'G_MS_MA_PHD14', 4),
(60, 15, 'other', 'zzzzzzzzzzzzzzzzzzzzz', 4),
(61, 1, 'U_AB_BS1', '', 5),
(62, 2, 'U_AB_BS2', '', 5),
(63, 3, 'U_AB_BS3', '', 5),
(64, 4, 'U_AB_BS4', '', 5),
(65, 5, 'U_AB_BS5', '', 5),
(66, 6, 'U_AB_BS6', '', 5),
(67, 7, 'U_AB_BS7', '', 5),
(68, 8, 'U_AB_BS8', '', 5),
(69, 9, 'U_AB_BS9', '', 5),
(70, 10, 'U_AB_BS10', '', 5),
(71, 11, 'U_AB_BS11', '', 5),
(72, 12, 'U_AB_BS12', '', 5),
(73, 13, 'U_AB_BS13', '', 5),
(74, 14, 'U_AB_BS14', '', 5),
(75, 15, 'other', '', 5),
(76, 1, '', 'G_MS_MA_PHD1', 6),
(77, 2, '', 'G_MS_MA_PHD2', 6),
(78, 3, '', 'G_MS_MA_PHD3', 6),
(79, 4, '', 'G_MS_MA_PHD4', 6),
(80, 5, 'U_AB_BS5', '', 6),
(81, 6, '', 'G_MS_MA_PHD6', 6),
(82, 7, '', 'G_MS_MA_PHD7', 6),
(83, 8, '', 'G_MS_MA_PHD8', 6),
(84, 9, '', 'G_MS_MA_PHD9', 6),
(85, 10, 'U_AB_BS10', '', 6),
(86, 11, '', 'G_MS_MA_PHD11', 6),
(87, 12, '', 'G_MS_MA_PHD12', 6),
(88, 13, '', 'G_MS_MA_PHD13', 6),
(89, 14, '', 'G_MS_MA_PHD14', 6),
(90, 15, 'other', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question2`
--

CREATE TABLE `survey_question2` (
  `survey_qID` int(11) UNSIGNED NOT NULL,
  `survey_row1` int(11) DEFAULT NULL,
  `survey_col1` varchar(50) DEFAULT 'no',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question2`
--

INSERT INTO `survey_question2` (`survey_qID`, `survey_row1`, `survey_col1`, `survey_formID`) VALUES
(1, 1, 'yes', 1),
(2, 2, 'no', 1),
(3, 3, 'yes', 1),
(4, 4, 'yes', 1),
(5, 5, 'cccccccccccccc', 1),
(6, 1, 'no', 2),
(7, 2, 'no', 2),
(8, 3, 'no', 2),
(9, 4, 'no', 2),
(10, 5, '', 2),
(11, 1, 'yes', 3),
(12, 2, 'yes', 3),
(13, 3, 'no', 3),
(14, 4, 'yes', 3),
(15, 5, 'ghjghjghjghj', 3),
(16, 1, 'yes', 4),
(17, 2, 'yes', 4),
(18, 3, 'yes', 4),
(19, 4, 'yes', 4),
(20, 5, 'zzzzzzzzzzzzzzzzzzzzzzz', 4),
(21, 1, 'no', 5),
(22, 2, 'yes', 5),
(23, 3, 'no', 5),
(24, 4, 'no', 5),
(25, 5, '', 5),
(26, 1, 'no', 6),
(27, 2, 'yes', 6),
(28, 3, 'no', 6),
(29, 4, 'no', 6),
(30, 5, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question3`
--

CREATE TABLE `survey_question3` (
  `survey_qID` int(11) NOT NULL,
  `row` int(11) DEFAULT NULL,
  `col1` varchar(1) DEFAULT '0',
  `col2` varchar(1) DEFAULT '0',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question3`
--

INSERT INTO `survey_question3` (`survey_qID`, `row`, `col1`, `col2`, `survey_formID`) VALUES
(1, 1, '1', '', 1),
(2, 2, '', '1', 1),
(3, 3, '1', '', 1),
(4, 4, '1', '1', 1),
(5, 1, '', '', 2),
(6, 2, '', '', 2),
(7, 3, '', '', 2),
(8, 4, '', '', 2),
(9, 1, '1', '', 3),
(10, 2, '', '1', 3),
(11, 3, '1', '', 3),
(12, 4, '', '1', 3),
(13, 1, '', '1', 4),
(14, 2, '1', '', 4),
(15, 3, '', '1', 4),
(16, 4, '1', '', 4),
(17, 1, '', '1', 5),
(18, 2, '', '1', 5),
(19, 3, '', '1', 5),
(20, 4, '', '1', 5),
(21, 1, '', '1', 6),
(22, 2, '', '1', 6),
(23, 3, '', '1', 6),
(24, 4, '', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question4`
--

CREATE TABLE `survey_question4` (
  `survey_qID` int(11) UNSIGNED NOT NULL,
  `row1` int(11) DEFAULT NULL,
  `col1` varchar(1) DEFAULT '0',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question4`
--

INSERT INTO `survey_question4` (`survey_qID`, `row1`, `col1`, `survey_formID`) VALUES
(1, 1, '1', 1),
(2, 2, '1', 1),
(3, 3, '1', 1),
(4, 4, '1', 1),
(5, 5, '1', 1),
(6, 6, '1', 1),
(7, 1, '', 2),
(8, 2, '', 2),
(9, 3, '', 2),
(10, 4, '', 2),
(11, 5, '', 2),
(12, 6, '', 2),
(13, 1, '1', 3),
(14, 2, '', 3),
(15, 3, '', 3),
(16, 4, '', 3),
(17, 5, '', 3),
(18, 6, '', 3),
(19, 1, '', 4),
(20, 2, '1', 4),
(21, 3, '', 4),
(22, 4, '1', 4),
(23, 5, '', 4),
(24, 6, '1', 4),
(25, 1, '', 5),
(26, 2, '', 5),
(27, 3, '', 5),
(28, 4, '', 5),
(29, 5, '1', 5),
(30, 6, '', 5),
(31, 1, '', 6),
(32, 2, '', 6),
(33, 3, '', 6),
(34, 4, '', 6),
(35, 5, '', 6),
(36, 6, '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question5`
--

CREATE TABLE `survey_question5` (
  `survey_qID` int(11) UNSIGNED NOT NULL,
  `ans` varchar(5) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question5`
--

INSERT INTO `survey_question5` (`survey_qID`, `ans`, `survey_formID`) VALUES
(1, 'yes', 1),
(2, 'yes', 2),
(3, 'yes', 3),
(4, 'yes', 4),
(5, 'yes', 5),
(6, 'yes', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question6`
--

CREATE TABLE `survey_question6` (
  `survey_qID` int(11) UNSIGNED NOT NULL,
  `ans` varchar(10) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  `job` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question6`
--

INSERT INTO `survey_question6` (`survey_qID`, `ans`, `survey_formID`, `job`) VALUES
(1, 'temp', 1, NULL),
(2, 'rop', 2, 'Web Developer'),
(3, 'temp', 3, 'Web Developer'),
(4, 'con', 4, 'Data Scientist'),
(5, 'rop', 5, 'Executive Assistant'),
(6, 'rop', 6, 'Web Developer');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question7`
--

CREATE TABLE `survey_question7` (
  `survey_qID` int(11) UNSIGNED NOT NULL,
  `survey_ans` varchar(1) DEFAULT '0',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question7`
--

INSERT INTO `survey_question7` (`survey_qID`, `survey_ans`, `survey_formID`) VALUES
(1, '1', 1),
(2, '0', 2),
(3, '1', 3),
(4, '0', 4),
(5, '1', 5),
(6, '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question8`
--

CREATE TABLE `survey_question8` (
  `survey_qID` int(11) UNSIGNED NOT NULL,
  `row1` int(11) DEFAULT NULL,
  `col1` varchar(50) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question8`
--

INSERT INTO `survey_question8` (`survey_qID`, `row1`, `col1`, `survey_formID`) VALUES
(1, 1, '1', 1),
(2, 2, '', 1),
(3, 3, '1', 1),
(4, 4, '1', 1),
(5, 5, '1', 1),
(6, 6, 'fff', 1),
(7, 1, '1', 3),
(8, 2, '', 3),
(9, 3, '1', 3),
(10, 4, '', 3),
(11, 5, '1', 3),
(12, 6, 'ghg', 3),
(13, 1, '', 5),
(14, 2, '', 5),
(15, 3, '', 5),
(16, 4, '', 5),
(17, 5, '1', 5),
(18, 6, '', 5),
(19, 1, '1', 6),
(20, 2, '', 6),
(21, 3, '', 6),
(22, 4, '', 6),
(23, 5, '', 6),
(24, 6, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_ID` int(11) UNSIGNED NOT NULL,
  `user_level` int(11) UNSIGNED DEFAULT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `user_password` mediumtext,
  `user_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_ID`, `user_level`, `user_name`, `user_password`, `user_created`) VALUES
(0, 3, 'unregister', 'unregister', '2018-02-04 12:20:56'),
(1, 1, '201310656', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2017-10-24 22:08:39'),
(3, 3, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', '2017-09-06 02:23:49'),
(4, 2, 'teacher', 'EubGHmBLzl/vo4QaEmMmq+4VBNihTeZ5V4ob1H/u0IY=', '2018-02-23 07:40:23'),
(6, 2, 'daaa1', 'nmJlYI9M3qXXfMBP75rfDTf9c9s0Jq8ZiEdlRCxtmB4=', '2018-02-07 16:04:01'),
(7, 2, 'teacher', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2018-02-23 12:03:49'),
(8, 2, 'wazhing', 'URjLyLIMsc9I0ZW7XvIK3mgelVSCKSw1n7HpVV9w1/s=', '2018-02-24 15:15:10'),
(17, 2, 'z1', 'nLe8cKSpGGeDLKRpMNgQUIYGtrDwaVOny7JFE7V8BK0=', '2018-03-03 16:27:06'),
(18, 1, '123', 'swHPJ7q+RfGnh4kp774FrzOW/hnKWeRhBNhK0xS/YtM=', '2018-03-05 14:22:21'),
(19, 1, '123456', 'swHPJ7q+RfGnh4kp774FrzOW/hnKWeRhBNhK0xS/YtM=', '2018-03-07 17:46:58'),
(20, 2, 'zxc123', 'swHPJ7q+RfGnh4kp774FrzOW/hnKWeRhBNhK0xS/YtM=', '2018-03-07 17:59:38'),
(21, 1, '201478545', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', '2018-03-17 09:55:10'),
(22, 1, '201310184', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', '2018-03-17 09:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_detail`
--

CREATE TABLE `user_admin_detail` (
  `admin_ID` int(11) UNSIGNED NOT NULL,
  `admin_userID` int(11) UNSIGNED DEFAULT NULL,
  `admin_img` varchar(250) DEFAULT 'temp.gif',
  `admin_fName` varchar(100) DEFAULT NULL,
  `admin_mName` varchar(25) DEFAULT NULL,
  `admin_lName` varchar(50) DEFAULT NULL,
  `admin_address` varchar(250) DEFAULT NULL,
  `admin_status` varchar(10) DEFAULT 'unregister',
  `admin_gender` varchar(1) DEFAULT NULL,
  `admin_dob` date DEFAULT NULL,
  `admin_contact` varchar(11) DEFAULT NULL,
  `admin_civilStat` int(11) UNSIGNED DEFAULT NULL,
  `admin_secretquestion` varchar(250) DEFAULT NULL,
  `admin_secretanswer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin_detail`
--

INSERT INTO `user_admin_detail` (`admin_ID`, `admin_userID`, `admin_img`, `admin_fName`, `admin_mName`, `admin_lName`, `admin_address`, `admin_status`, `admin_gender`, `admin_dob`, `admin_contact`, `admin_civilStat`, `admin_secretquestion`, `admin_secretanswer`) VALUES
(1, 3, '123123.jpg', 'admin', 'admin', 'admin', 'zxczxczxc', 'register', 'M', '0000-00-00', '09169158798', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `level_ID` int(11) UNSIGNED NOT NULL,
  `level_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`level_ID`, `level_name`) VALUES
(0, 'unregister'),
(1, 'student'),
(2, 'teacher'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `notif_ID` int(11) UNSIGNED NOT NULL,
  `notif_typeID` int(11) UNSIGNED DEFAULT NULL,
  `notif_topicID` int(11) UNSIGNED DEFAULT NULL,
  `notif_userID` int(11) UNSIGNED DEFAULT NULL,
  `notif_receiverID` int(11) UNSIGNED DEFAULT NULL,
  `notif_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notif_state` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`notif_ID`, `notif_typeID`, `notif_topicID`, `notif_userID`, `notif_receiverID`, `notif_date`, `notif_state`) VALUES
(3, NULL, NULL, NULL, NULL, '2018-02-23 16:49:20', NULL),
(4, 3, 15, 4, 1, '2018-03-03 15:35:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_state`
--

CREATE TABLE `user_notif_state` (
  `status_ID` int(11) UNSIGNED NOT NULL,
  `status_Desc` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_type`
--

CREATE TABLE `user_notif_type` (
  `type_ID` int(11) UNSIGNED NOT NULL,
  `type_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_student_detail`
--

CREATE TABLE `user_student_detail` (
  `student_ID` int(11) NOT NULL,
  `student_userID` int(11) UNSIGNED DEFAULT NULL,
  `student_img` varchar(250) DEFAULT 'temp.gif',
  `student_IDNumber` int(11) UNSIGNED DEFAULT NULL,
  `student_fName` varchar(100) DEFAULT NULL,
  `student_mName` varchar(25) DEFAULT NULL,
  `student_lName` varchar(50) DEFAULT NULL,
  `student_address` varchar(250) DEFAULT NULL,
  `student_civilStat` int(11) UNSIGNED DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `student_gender` varchar(1) DEFAULT NULL,
  `student_contact` varchar(11) DEFAULT NULL,
  `student_admission` date DEFAULT NULL,
  `student_year_grad` date DEFAULT NULL,
  `student_department` int(11) UNSIGNED DEFAULT NULL,
  `student_status` varchar(10) DEFAULT 'unregister',
  `student_secretquestion` varchar(250) DEFAULT NULL,
  `student_secretanswer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_student_detail`
--

INSERT INTO `user_student_detail` (`student_ID`, `student_userID`, `student_img`, `student_IDNumber`, `student_fName`, `student_mName`, `student_lName`, `student_address`, `student_civilStat`, `student_dob`, `student_gender`, `student_contact`, `student_admission`, `student_year_grad`, `student_department`, `student_status`, `student_secretquestion`, `student_secretanswer`) VALUES
(1, 1, 'captain.jpg', 201310656, 'Rhalp Darren', 'R', 'Cabrera', 'Blk 38 Lot 11 Phase2b Southville2 Trece Martires City', 1, '2018-03-29', 'M', '1947', '2013-06-01', '2018-10-30', 1, 'register', 'd', 'd'),
(9, 0, 'temp.gif', 99, 'ewq', 'e', 'eqw', 'asdasd', 1, '2018-03-07', 'M', '097', '1995-01-02', '1997-01-02', 3, 'unregister', NULL, NULL),
(10, 18, 'temp.gif', 123, 'asdasddasdasd', 'A', 'CABRERA', 'Blk 38 Lot 11 Phase2b Southville2 Trece Martires City', 2, '2018-03-15', 'M', '123123123', '2018-02-25', '2018-03-31', 1, 'register', 'asdasdasd', 'asdasdasda'),
(26, 19, 'temp.gif', 123456, 'dsa', 'D', 'Cabrera', 'Blk 38 Lot 11 Phase2b Southville2 Trece Martires City', 1, '2018-03-18', 'M', '3123123123', '2018-02-25', '2018-03-15', 1, 'register', 'dsa', 'asd'),
(107, NULL, 'temp.gif', 1321, 'h', 'z', 'z', 'czxczzxc', 1, '0000-00-00', 'M', '123123', '2013-06-01', '2013-06-01', 1, 'unregister', NULL, NULL),
(108, NULL, 'temp.gif', 1322, 'fgh', 'z', 'z', 'ret', 1, '0000-00-00', 'F', '123123', '2013-06-01', '2013-06-01', 2, 'unregister', NULL, NULL),
(109, NULL, 'temp.gif', 1323, 'ty', 'z', 'z', 'rt', 3, '0000-00-00', 'M', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(110, NULL, 'temp.gif', 1324, 'fgh', 'z', 'z', 'fg', 1, '0000-00-00', 'M', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(111, NULL, 'temp.gif', 1325, 'gfh', 'z', 'z', 'asdasdasd', 2, '0000-00-00', 'M', '123123', '2013-06-01', '2013-06-01', 2, 'unregister', NULL, NULL),
(112, NULL, 'temp.gif', 1326, 'fgh', 'z', 'z', 'vbc', 1, '0000-00-00', 'M', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(113, NULL, 'temp.gif', 1327, 'z', 'z', 'z', 'cxv', 1, '0000-00-00', 'M', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(114, NULL, 'temp.gif', 1328, 'fgh', 'z', 'z', 'fgh', 1, '0000-00-00', 'M', '123123', '2013-06-01', '2013-06-01', 2, 'unregister', NULL, NULL),
(115, NULL, 'temp.gif', 1329, 'fgh', 'z', 'z', 'asdasdasd', 1, '0000-00-00', 'F', '123123', '2013-06-01', '2013-06-01', 2, 'unregister', NULL, NULL),
(116, NULL, 'temp.gif', 1330, 'fgh', 'z', 'z', 'fgh', 1, '0000-00-00', 'F', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(117, NULL, 'temp.gif', 1331, 'vbnvb', 'z', 'z', 'zxcasd', 1, '0000-00-00', 'F', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(118, NULL, 'temp.gif', 1332, 'vbnvb', 'z', 'z', 'bvnfgh', 1, '0000-00-00', 'F', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(119, NULL, 'temp.gif', 1333, 'ertert', 'z', 'z', 'asdasdasd', 1, '0000-00-00', 'F', '123123', '2013-06-01', '2013-06-01', 3, 'unregister', NULL, NULL),
(120, 22, 'temp.gif', 201310184, 'John Ervin', 'N', 'Villadolid', 'Naic, Cavite', 1, '0000-00-00', 'M', '9994330337', '2009-01-01', '2013-01-01', 1, 'register', 'name', 'kimi no nawa'),
(121, NULL, 'temp.gif', 3213213, 'john ervin', 'n', 'villadolid', 'naic, cavite', 1, '0000-00-00', 'M', '9994330337', '2018-01-17', '2018-01-17', 2, 'unregister', NULL, NULL),
(122, NULL, 'temp.gif', 213213, 'John Ervin', 'n', 'Villadolid', 'Naic, Cavite', 1, '0000-00-00', 'F', '9994330337', '2009-01-01', '2013-01-01', 3, 'unregister', NULL, NULL),
(123, 21, 'temp.gif', 201478545, 'mae', 'y', 'young', 'mars', 1, '1991-01-01', 'F', '09987542178', '2005-01-01', '2011-01-01', 3, 'register', 'say my name?', 'delty');

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher_detail`
--

CREATE TABLE `user_teacher_detail` (
  `teacher_ID` int(11) UNSIGNED NOT NULL,
  `teacher_userID` int(11) UNSIGNED DEFAULT NULL,
  `teacher_img` varchar(250) DEFAULT 'temp.gif',
  `teacher_facultyID` int(11) UNSIGNED DEFAULT NULL,
  `teacher_fName` varchar(100) DEFAULT NULL,
  `teacher_mName` varchar(25) DEFAULT NULL,
  `teacher_lName` varchar(50) DEFAULT NULL,
  `teacher_gender` varchar(1) DEFAULT NULL,
  `teacher_dob` date DEFAULT NULL,
  `teacher_contact` varchar(11) DEFAULT NULL,
  `teacher_address` varchar(250) DEFAULT NULL,
  `teacher_civilStat` int(11) UNSIGNED DEFAULT NULL,
  `teacher_department` int(11) UNSIGNED DEFAULT NULL,
  `teacher_status` varchar(10) DEFAULT 'unregister',
  `teacher_secretquestion` varchar(250) DEFAULT NULL,
  `teacher_secretanswer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_teacher_detail`
--

INSERT INTO `user_teacher_detail` (`teacher_ID`, `teacher_userID`, `teacher_img`, `teacher_facultyID`, `teacher_fName`, `teacher_mName`, `teacher_lName`, `teacher_gender`, `teacher_dob`, `teacher_contact`, `teacher_address`, `teacher_civilStat`, `teacher_department`, `teacher_status`, `teacher_secretquestion`, `teacher_secretanswer`) VALUES
(130, 8, 'temp.gif', 68, 'sarada', '', 'uchiha', 'F', '2018-01-28', '123123', '123123', 1, 2, 'register', '', ''),
(140, 17, 'temp.gif', 54, 'z', 'z', 'z', 'M', '0004-08-05', '85', 'z', 1, 1, 'register', '', ''),
(141, NULL, 'temp.gif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unregister', NULL, NULL),
(142, 20, 'temp.gif', 654, 'asd', 'asd', 'asd', 'M', '1689-09-01', '654', 'asd', 1, 1, 'register', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `view_counter`
--

CREATE TABLE `view_counter` (
  `view_ID` int(11) UNSIGNED NOT NULL,
  `view_topicID` int(11) UNSIGNED DEFAULT NULL,
  `view_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_counter`
--

INSERT INTO `view_counter` (`view_ID`, `view_topicID`, `view_count`) VALUES
(3, 15, 16),
(4, 16, 6),
(5, 17, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvsu_college`
--
ALTER TABLE `cvsu_college`
  ADD PRIMARY KEY (`colleges_ID`);

--
-- Indexes for table `cvsu_course`
--
ALTER TABLE `cvsu_course`
  ADD PRIMARY KEY (`course_ID`),
  ADD KEY `course_departmentID` (`course_departmentID`);

--
-- Indexes for table `cvsu_department`
--
ALTER TABLE `cvsu_department`
  ADD PRIMARY KEY (`department_ID`),
  ADD KEY `department_collegeID` (`department_collegeID`);

--
-- Indexes for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_topicID` (`comment_topicID`),
  ADD KEY `comment_userID` (`comment_userID`);

--
-- Indexes for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  ADD PRIMARY KEY (`comment_reply_ID`),
  ADD KEY `comment_reply_parentID` (`comment_reply_parentID`),
  ADD KEY `comment_reply_userID` (`comment_reply_userID`),
  ADD KEY `comment_reply_topicID` (`comment_reply_topicID`);

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topic_ID`),
  ADD KEY `post_owner_id` (`post_owner_id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message_send`
--
ALTER TABLE `message_send`
  ADD PRIMARY KEY (`message_ID`),
  ADD KEY `message_threadID` (`message_threadID`),
  ADD KEY `message_receiver` (`message_receiver`);

--
-- Indexes for table `message_send_state`
--
ALTER TABLE `message_send_state`
  ADD PRIMARY KEY (`state_ID`),
  ADD KEY `state_msgID` (`state_msgID`),
  ADD KEY `state_readerID` (`state_readerID`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`thread_ID`);

--
-- Indexes for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  ADD PRIMARY KEY (`participant_ID`),
  ADD KEY `participant_threadID` (`participant_threadID`),
  ADD KEY `participant_userID` (`participant_userID`);

--
-- Indexes for table `suggested_job`
--
ALTER TABLE `suggested_job`
  ADD PRIMARY KEY (`job_ID`),
  ADD KEY `job_Course` (`job_Course`);

--
-- Indexes for table `survey_forms`
--
ALTER TABLE `survey_forms`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `form_ownerID` (`form_ownerID`);

--
-- Indexes for table `survey_maxcount`
--
ALTER TABLE `survey_maxcount`
  ADD PRIMARY KEY (`survey_id`),
  ADD UNIQUE KEY `survey_ownerID_2` (`survey_ownerID`),
  ADD KEY `survey_ownerID` (`survey_ownerID`);

--
-- Indexes for table `survey_question1`
--
ALTER TABLE `survey_question1`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `survey_question2`
--
ALTER TABLE `survey_question2`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `survey_question3`
--
ALTER TABLE `survey_question3`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `survey_question4`
--
ALTER TABLE `survey_question4`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `survey_question5`
--
ALTER TABLE `survey_question5`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `survey_question6`
--
ALTER TABLE `survey_question6`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `survey_question7`
--
ALTER TABLE `survey_question7`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `survey_question8`
--
ALTER TABLE `survey_question8`
  ADD PRIMARY KEY (`survey_qID`),
  ADD KEY `survey_formID` (`survey_formID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  ADD PRIMARY KEY (`admin_ID`),
  ADD KEY `admin_userID` (`admin_userID`),
  ADD KEY `admin_civilStat` (`admin_civilStat`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_ID`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`notif_ID`),
  ADD KEY `notif_topicID` (`notif_topicID`),
  ADD KEY `notif_userID` (`notif_userID`),
  ADD KEY `notif_receiverID` (`notif_receiverID`);

--
-- Indexes for table `user_notif_state`
--
ALTER TABLE `user_notif_state`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `user_notif_type`
--
ALTER TABLE `user_notif_type`
  ADD PRIMARY KEY (`type_ID`);

--
-- Indexes for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  ADD PRIMARY KEY (`student_ID`),
  ADD UNIQUE KEY `student_IDNumber` (`student_IDNumber`),
  ADD KEY `student_userID` (`student_userID`),
  ADD KEY `student_department` (`student_department`),
  ADD KEY `student_civilStat` (`student_civilStat`);

--
-- Indexes for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD PRIMARY KEY (`teacher_ID`),
  ADD UNIQUE KEY `teacher_facultyID` (`teacher_facultyID`),
  ADD KEY `teacher_userID` (`teacher_userID`),
  ADD KEY `teacher_department` (`teacher_department`),
  ADD KEY `teacher_civilStat` (`teacher_civilStat`);

--
-- Indexes for table `view_counter`
--
ALTER TABLE `view_counter`
  ADD PRIMARY KEY (`view_ID`),
  ADD KEY `view_topicID` (`view_topicID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvsu_college`
--
ALTER TABLE `cvsu_college`
  MODIFY `colleges_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cvsu_course`
--
ALTER TABLE `cvsu_course`
  MODIFY `course_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cvsu_department`
--
ALTER TABLE `cvsu_department`
  MODIFY `department_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum_comment`
--
ALTER TABLE `forum_comment`
  MODIFY `comment_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  MODIFY `comment_reply_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_send`
--
ALTER TABLE `message_send`
  MODIFY `message_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_send_state`
--
ALTER TABLE `message_send_state`
  MODIFY `state_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `thread_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  MODIFY `participant_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suggested_job`
--
ALTER TABLE `suggested_job`
  MODIFY `job_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `survey_forms`
--
ALTER TABLE `survey_forms`
  MODIFY `form_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_maxcount`
--
ALTER TABLE `survey_maxcount`
  MODIFY `survey_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `survey_question1`
--
ALTER TABLE `survey_question1`
  MODIFY `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `survey_question2`
--
ALTER TABLE `survey_question2`
  MODIFY `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `survey_question3`
--
ALTER TABLE `survey_question3`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `survey_question4`
--
ALTER TABLE `survey_question4`
  MODIFY `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `survey_question5`
--
ALTER TABLE `survey_question5`
  MODIFY `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_question6`
--
ALTER TABLE `survey_question6`
  MODIFY `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_question7`
--
ALTER TABLE `survey_question7`
  MODIFY `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_question8`
--
ALTER TABLE `survey_question8`
  MODIFY `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  MODIFY `admin_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `notif_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_notif_state`
--
ALTER TABLE `user_notif_state`
  MODIFY `status_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notif_type`
--
ALTER TABLE `user_notif_type`
  MODIFY `type_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  MODIFY `student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  MODIFY `teacher_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `view_counter`
--
ALTER TABLE `view_counter`
  MODIFY `view_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cvsu_course`
--
ALTER TABLE `cvsu_course`
  ADD CONSTRAINT `cvsu_course_ibfk_1` FOREIGN KEY (`course_departmentID`) REFERENCES `cvsu_department` (`department_ID`);

--
-- Constraints for table `cvsu_department`
--
ALTER TABLE `cvsu_department`
  ADD CONSTRAINT `cvsu_department_ibfk_1` FOREIGN KEY (`department_collegeID`) REFERENCES `cvsu_college` (`colleges_ID`);

--
-- Constraints for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD CONSTRAINT `forum_comment_ibfk_1` FOREIGN KEY (`comment_topicID`) REFERENCES `forum_topic` (`topic_ID`),
  ADD CONSTRAINT `forum_comment_ibfk_2` FOREIGN KEY (`comment_userID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  ADD CONSTRAINT `forum_comment_reply_ibfk_1` FOREIGN KEY (`comment_reply_parentID`) REFERENCES `forum_comment` (`comment_ID`),
  ADD CONSTRAINT `forum_comment_reply_ibfk_2` FOREIGN KEY (`comment_reply_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `forum_comment_reply_ibfk_3` FOREIGN KEY (`comment_reply_topicID`) REFERENCES `forum_topic` (`topic_ID`);

--
-- Constraints for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD CONSTRAINT `forum_topic_ibfk_1` FOREIGN KEY (`post_owner_id`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `message_send`
--
ALTER TABLE `message_send`
  ADD CONSTRAINT `message_send_ibfk_1` FOREIGN KEY (`message_threadID`) REFERENCES `message_thread` (`thread_ID`),
  ADD CONSTRAINT `message_send_ibfk_2` FOREIGN KEY (`message_receiver`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `message_send_state`
--
ALTER TABLE `message_send_state`
  ADD CONSTRAINT `message_send_state_ibfk_1` FOREIGN KEY (`state_msgID`) REFERENCES `message_send` (`message_ID`),
  ADD CONSTRAINT `message_send_state_ibfk_2` FOREIGN KEY (`state_readerID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  ADD CONSTRAINT `message_thread_participant_ibfk_1` FOREIGN KEY (`participant_threadID`) REFERENCES `message_thread` (`thread_ID`),
  ADD CONSTRAINT `message_thread_participant_ibfk_2` FOREIGN KEY (`participant_userID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `suggested_job`
--
ALTER TABLE `suggested_job`
  ADD CONSTRAINT `suggested_job_ibfk_1` FOREIGN KEY (`job_Course`) REFERENCES `cvsu_course` (`course_ID`);

--
-- Constraints for table `survey_forms`
--
ALTER TABLE `survey_forms`
  ADD CONSTRAINT `survey_forms_ibfk_1` FOREIGN KEY (`form_ownerID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `survey_maxcount`
--
ALTER TABLE `survey_maxcount`
  ADD CONSTRAINT `survey_maxcount_ibfk_1` FOREIGN KEY (`survey_ownerID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `survey_question1`
--
ALTER TABLE `survey_question1`
  ADD CONSTRAINT `survey_question1_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `survey_question2`
--
ALTER TABLE `survey_question2`
  ADD CONSTRAINT `survey_question2_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `survey_question3`
--
ALTER TABLE `survey_question3`
  ADD CONSTRAINT `survey_question3_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `survey_question4`
--
ALTER TABLE `survey_question4`
  ADD CONSTRAINT `survey_question4_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `survey_question5`
--
ALTER TABLE `survey_question5`
  ADD CONSTRAINT `survey_question5_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `survey_question6`
--
ALTER TABLE `survey_question6`
  ADD CONSTRAINT `survey_question6_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `survey_question7`
--
ALTER TABLE `survey_question7`
  ADD CONSTRAINT `survey_question7_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `survey_question8`
--
ALTER TABLE `survey_question8`
  ADD CONSTRAINT `survey_question8_ibfk_1` FOREIGN KEY (`survey_formID`) REFERENCES `survey_forms` (`form_id`);

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_level` (`level_ID`);

--
-- Constraints for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  ADD CONSTRAINT `user_admin_detail_ibfk_1` FOREIGN KEY (`admin_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_admin_detail_ibfk_2` FOREIGN KEY (`admin_civilStat`) REFERENCES `marital_status` (`ID`);

--
-- Constraints for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD CONSTRAINT `user_notification_ibfk_2` FOREIGN KEY (`notif_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_notification_ibfk_3` FOREIGN KEY (`notif_receiverID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  ADD CONSTRAINT `user_student_detail_ibfk_1` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_student_detail_ibfk_2` FOREIGN KEY (`student_department`) REFERENCES `cvsu_department` (`department_ID`),
  ADD CONSTRAINT `user_student_detail_ibfk_3` FOREIGN KEY (`student_civilStat`) REFERENCES `marital_status` (`ID`);

--
-- Constraints for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD CONSTRAINT `user_teacher_detail_ibfk_1` FOREIGN KEY (`teacher_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_teacher_detail_ibfk_2` FOREIGN KEY (`teacher_department`) REFERENCES `cvsu_department` (`department_ID`),
  ADD CONSTRAINT `user_teacher_detail_ibfk_3` FOREIGN KEY (`teacher_civilStat`) REFERENCES `marital_status` (`ID`);

--
-- Constraints for table `view_counter`
--
ALTER TABLE `view_counter`
  ADD CONSTRAINT `view_counter_ibfk_1` FOREIGN KEY (`view_topicID`) REFERENCES `forum_topic` (`topic_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
