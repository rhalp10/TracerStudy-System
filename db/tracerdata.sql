-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 18, 2022 at 05:08 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `cvsu_college`;
CREATE TABLE IF NOT EXISTS `cvsu_college` (
  `colleges_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `college_name` varchar(150) DEFAULT NULL,
  `college_acronym` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`colleges_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `cvsu_course`;
CREATE TABLE IF NOT EXISTS `cvsu_course` (
  `course_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_departmentID` int(11) UNSIGNED DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `course_acronym` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`course_ID`),
  KEY `course_departmentID` (`course_departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `cvsu_department`;
CREATE TABLE IF NOT EXISTS `cvsu_department` (
  `department_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_collegeID` int(11) UNSIGNED DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `department_acronym` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`department_ID`),
  KEY `department_collegeID` (`department_collegeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `forum_comment`;
CREATE TABLE IF NOT EXISTS `forum_comment` (
  `comment_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_topicID` int(11) UNSIGNED DEFAULT NULL,
  `comment_userID` int(11) UNSIGNED DEFAULT NULL,
  `comment_content` varchar(500) DEFAULT NULL,
  `comment_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`comment_ID`),
  KEY `comment_topicID` (`comment_topicID`),
  KEY `comment_userID` (`comment_userID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`comment_ID`, `comment_topicID`, `comment_userID`, `comment_content`, `comment_date`) VALUES
(2, 15, 4, 'asdasdasd', '2018-03-03 15:35:39'),
(3, 17, 3, 'ytyutyu', '2018-03-12 08:04:12'),
(5, 17, 4, 'Hey', '2022-01-17 18:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment_reply`
--

DROP TABLE IF EXISTS `forum_comment_reply`;
CREATE TABLE IF NOT EXISTS `forum_comment_reply` (
  `comment_reply_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_reply_topicID` int(10) UNSIGNED DEFAULT NULL,
  `comment_reply_parentID` int(11) UNSIGNED DEFAULT NULL,
  `comment_reply_userID` int(11) UNSIGNED DEFAULT NULL,
  `comment_reply_content` varchar(500) DEFAULT NULL,
  `comment_reply_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`comment_reply_ID`),
  KEY `comment_reply_parentID` (`comment_reply_parentID`),
  KEY `comment_reply_userID` (`comment_reply_userID`),
  KEY `comment_reply_topicID` (`comment_reply_topicID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

DROP TABLE IF EXISTS `forum_topic`;
CREATE TABLE IF NOT EXISTS `forum_topic` (
  `topic_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_title` varchar(150) DEFAULT NULL,
  `post_owner_id` int(11) UNSIGNED DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_content` varchar(50000) DEFAULT NULL,
  `post_status` varchar(25) DEFAULT 'UNPIN',
  PRIMARY KEY (`topic_ID`),
  KEY `post_owner_id` (`post_owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_ID`, `post_title`, `post_owner_id`, `post_date`, `post_content`, `post_status`) VALUES
(15, 'Update Title', 1, '2022-01-16 22:02:21', '<p>edited</p>\r\n', 'UNPIN'),
(16, 'Sample Post', 4, '2022-01-17 18:40:19', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'UNPIN'),
(17, 'Pin: Post Test', 3, '2022-01-17 19:42:47', '<p>d213123123</p>\r\n', 'PIN');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

DROP TABLE IF EXISTS `marital_status`;
CREATE TABLE IF NOT EXISTS `marital_status` (
  `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marital_Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `message_send`;
CREATE TABLE IF NOT EXISTS `message_send` (
  `message_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message_threadID` int(11) UNSIGNED DEFAULT NULL,
  `message_sendDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message_content` varchar(1500) DEFAULT NULL,
  `message_receiver` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`message_ID`),
  KEY `message_threadID` (`message_threadID`),
  KEY `message_receiver` (`message_receiver`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `message_send_state`;
CREATE TABLE IF NOT EXISTS `message_send_state` (
  `state_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_msgID` int(11) UNSIGNED DEFAULT NULL,
  `state_readerID` int(11) UNSIGNED DEFAULT NULL,
  `state_dateRead` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`state_ID`),
  KEY `state_msgID` (`state_msgID`),
  KEY `state_readerID` (`state_readerID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_send_state`
--

INSERT INTO `message_send_state` (`state_ID`, `state_msgID`, `state_readerID`, `state_dateRead`) VALUES
(1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

DROP TABLE IF EXISTS `message_thread`;
CREATE TABLE IF NOT EXISTS `message_thread` (
  `thread_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thread_name` varchar(150) DEFAULT NULL,
  `thread_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`thread_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_thread`
--

INSERT INTO `message_thread` (`thread_ID`, `thread_name`, `thread_created`) VALUES
(1, '64564', '2018-02-22 15:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `message_thread_participant`
--

DROP TABLE IF EXISTS `message_thread_participant`;
CREATE TABLE IF NOT EXISTS `message_thread_participant` (
  `participant_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `participant_threadID` int(11) UNSIGNED DEFAULT NULL,
  `participant_userID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`participant_ID`),
  KEY `participant_threadID` (`participant_threadID`),
  KEY `participant_userID` (`participant_userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_thread_participant`
--

INSERT INTO `message_thread_participant` (`participant_ID`, `participant_threadID`, `participant_userID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suggested_job`
--

DROP TABLE IF EXISTS `suggested_job`;
CREATE TABLE IF NOT EXISTS `suggested_job` (
  `job_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_Title` varchar(250) DEFAULT NULL,
  `job_Course` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`job_ID`),
  KEY `job_Course` (`job_Course`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

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
(31, 'Administration Assistant', 1),
(33, 'Office Manager', 3),
(34, 'Personal Assistant', 3),
(35, 'Executive Assistant', 3),
(36, 'Virtual Assistant', 3);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
CREATE TABLE IF NOT EXISTS `survey` (
  `survey_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_name` varchar(255) DEFAULT NULL,
  `survey_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visibility` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`survey_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_ID`, `survey_name`, `survey_date`, `visibility`) VALUES
(1, 'HTML Quiz', '2022-01-18 16:51:03', 1),
(2, 'survey 2', '2018-05-04 17:25:50', 0),
(10, 'asdasdasd', '2018-05-01 09:11:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey_answer`
--

DROP TABLE IF EXISTS `survey_answer`;
CREATE TABLE IF NOT EXISTS `survey_answer` (
  `a_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_aID` int(11) UNSIGNED DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_answer`
--

INSERT INTO `survey_answer` (`a_ID`, `survey_aID`, `user_ID`, `form_id`) VALUES
(24, 4, 3, 18),
(25, 5, 3, 18),
(26, 6, 3, 18),
(27, 7, 3, 18),
(28, 17, 3, 18),
(29, 1, 3, 19),
(30, 3, 3, 19),
(31, 4, 3, 19),
(32, 5, 3, 19),
(33, 6, 3, 19),
(34, 7, 3, 19),
(35, 17, 3, 19),
(36, 1, 3, NULL),
(37, 3, 3, NULL),
(38, 4, 3, NULL),
(39, 5, 3, NULL),
(40, 6, 3, NULL),
(41, 7, 3, NULL),
(42, 17, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_answer_other`
--

DROP TABLE IF EXISTS `survey_answer_other`;
CREATE TABLE IF NOT EXISTS `survey_answer_other` (
  `ao_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) DEFAULT NULL,
  `survey_aID` int(11) NOT NULL,
  `survey_aString` varchar(250) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ao_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_answer_other`
--

INSERT INTO `survey_answer_other` (`ao_ID`, `user_ID`, `survey_aID`, `survey_aString`, `form_id`) VALUES
(10, 3, 2, '11111111111111', 18),
(11, 3, 8, '1111111111111111111', 18);

-- --------------------------------------------------------

--
-- Table structure for table `survey_anweroptions`
--

DROP TABLE IF EXISTS `survey_anweroptions`;
CREATE TABLE IF NOT EXISTS `survey_anweroptions` (
  `survey_aID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_qID` int(11) UNSIGNED DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`survey_aID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_anweroptions`
--

INSERT INTO `survey_anweroptions` (`survey_aID`, `survey_qID`, `answer`) VALUES
(1, 1, 'Home Tool Markup Language\r\n'),
(2, 1, 'Hyperlinks and Text Markup Language\r\n'),
(3, 2, 'Microsoft\r\n'),
(4, 3, '<head>\r\n'),
(5, 3, '<h6>'),
(6, 3, '<heading>'),
(7, 3, '<h1>'),
(8, 2, 'The World Wide Web Consortium\r\n'),
(10, 5, '<body style=\"background-color:yellow;\">\r\n'),
(11, 10, '<h1>'),
(12, 4, '<break>'),
(13, 4, '<br>'),
(15, 5, '<body bg=\"yellow\">\r\n'),
(16, 6, '<i>'),
(17, 4, '<lb>'),
(18, 6, '<important>'),
(19, 6, '<strong>'),
(20, 10, '<h6>'),
(21, 7, '<italic>'),
(22, 7, '<i>'),
(23, 7, '<emphasize>'),
(24, 8, '<a href=\"http://www.sample.com\">Sample</a>'),
(25, 9, '<br>'),
(26, 6, '<b>'),
(27, 7, '<em>');

-- --------------------------------------------------------

--
-- Table structure for table `survey_forms`
--

DROP TABLE IF EXISTS `survey_forms`;
CREATE TABLE IF NOT EXISTS `survey_forms` (
  `form_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_ownerID` int(11) UNSIGNED DEFAULT NULL,
  `form_taken` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `survey_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`form_id`),
  KEY `form_ownerID` (`form_ownerID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_forms`
--

INSERT INTO `survey_forms` (`form_id`, `form_ownerID`, `form_taken`, `survey_ID`) VALUES
(0, 0, '2018-02-04 12:23:39', NULL),
(1, 1, '2018-02-04 13:24:38', NULL),
(2, 1, '2018-02-07 16:41:32', NULL),
(3, 18, '2018-03-17 04:47:43', NULL),
(4, 18, '2018-03-17 04:57:57', NULL),
(5, 21, '2018-03-17 09:57:10', NULL),
(6, 22, '2018-03-17 10:00:10', NULL),
(7, 1, '2018-03-30 03:14:57', NULL),
(10, 3, '2018-05-04 15:30:07', NULL),
(11, 3, '2018-05-04 15:30:58', NULL),
(12, 3, '2018-05-04 16:12:47', 1),
(13, 3, '2018-05-04 17:09:01', 1),
(14, 3, '2018-05-04 17:18:32', 1),
(15, 3, '2018-05-04 17:21:25', 2),
(16, 3, '2018-05-04 17:26:24', 1),
(17, 3, '2018-05-04 17:26:43', 1),
(18, 3, '2018-05-04 17:42:26', 1),
(19, 3, '2018-05-04 17:42:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_maxcount`
--

DROP TABLE IF EXISTS `survey_maxcount`;
CREATE TABLE IF NOT EXISTS `survey_maxcount` (
  `survey_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_ownerID` int(11) UNSIGNED DEFAULT NULL,
  `survey_maxattemp` int(11) DEFAULT NULL,
  `survey_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`survey_id`),
  UNIQUE KEY `survey_ownerID_2` (`survey_ownerID`),
  KEY `survey_ownerID` (`survey_ownerID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_maxcount`
--

INSERT INTO `survey_maxcount` (`survey_id`, `survey_ownerID`, `survey_maxattemp`, `survey_date`) VALUES
(1, 1, 2, '2018-05-01 07:08:27'),
(2, 3, 2, '2022-01-18 16:53:41'),
(3, 6, 2, '2018-02-18 16:00:00'),
(4, 18, 0, '2018-03-17 04:57:57'),
(5, 19, 2, '2018-03-07 17:46:58'),
(6, 21, 1, '2018-03-17 09:57:10'),
(7, 22, 1, '2018-03-17 10:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question1`
--

DROP TABLE IF EXISTS `survey_question1`;
CREATE TABLE IF NOT EXISTS `survey_question1` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `row` int(11) DEFAULT NULL,
  `col1` varchar(50) DEFAULT NULL,
  `col2` varchar(50) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

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
(90, 15, 'other', '', 6),
(91, 1, '', '', 7),
(92, 2, '', '', 7),
(93, 3, '', '', 7),
(94, 4, '', '', 7),
(95, 5, '', '', 7),
(96, 6, '', '', 7),
(97, 7, '', '', 7),
(98, 8, '', '', 7),
(99, 9, '', '', 7),
(100, 10, '', '', 7),
(101, 11, '', '', 7),
(102, 12, '', '', 7),
(103, 13, '', '', 7),
(104, 14, '', '', 7),
(105, 15, 'other', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question2`
--

DROP TABLE IF EXISTS `survey_question2`;
CREATE TABLE IF NOT EXISTS `survey_question2` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_row1` int(11) DEFAULT NULL,
  `survey_col1` varchar(50) DEFAULT 'no',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

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
(30, 5, '', 6),
(31, 1, 'no', 7),
(32, 2, 'no', 7),
(33, 3, 'no', 7),
(34, 4, 'no', 7),
(35, 5, '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question3`
--

DROP TABLE IF EXISTS `survey_question3`;
CREATE TABLE IF NOT EXISTS `survey_question3` (
  `survey_qID` int(11) NOT NULL AUTO_INCREMENT,
  `row` int(11) DEFAULT NULL,
  `col1` varchar(1) DEFAULT '0',
  `col2` varchar(1) DEFAULT '0',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

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
(24, 4, '', '1', 6),
(25, 1, '', '', 7),
(26, 2, '', '', 7),
(27, 3, '', '', 7),
(28, 4, '', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question4`
--

DROP TABLE IF EXISTS `survey_question4`;
CREATE TABLE IF NOT EXISTS `survey_question4` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `row1` int(11) DEFAULT NULL,
  `col1` varchar(1) DEFAULT '0',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

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
(36, 6, '1', 6),
(37, 1, '', 7),
(38, 2, '', 7),
(39, 3, '1', 7),
(40, 4, '1', 7),
(41, 5, '1', 7),
(42, 6, '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question5`
--

DROP TABLE IF EXISTS `survey_question5`;
CREATE TABLE IF NOT EXISTS `survey_question5` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ans` varchar(5) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question5`
--

INSERT INTO `survey_question5` (`survey_qID`, `ans`, `survey_formID`) VALUES
(1, 'yes', 1),
(2, 'yes', 2),
(3, 'yes', 3),
(4, 'yes', 4),
(5, 'yes', 5),
(6, 'yes', 6),
(7, '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question6`
--

DROP TABLE IF EXISTS `survey_question6`;
CREATE TABLE IF NOT EXISTS `survey_question6` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ans` varchar(10) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  `job` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question6`
--

INSERT INTO `survey_question6` (`survey_qID`, `ans`, `survey_formID`, `job`) VALUES
(1, 'temp', 1, NULL),
(2, 'rop', 2, 'Web Developer'),
(3, 'temp', 3, 'Web Developer'),
(4, 'con', 4, 'Data Scientist'),
(5, 'rop', 5, 'Executive Assistant'),
(6, 'rop', 6, 'Web Developer'),
(7, '', 7, 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question7`
--

DROP TABLE IF EXISTS `survey_question7`;
CREATE TABLE IF NOT EXISTS `survey_question7` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_ans` varchar(1) DEFAULT '0',
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question7`
--

INSERT INTO `survey_question7` (`survey_qID`, `survey_ans`, `survey_formID`) VALUES
(1, '1', 1),
(2, '0', 2),
(3, '1', 3),
(4, '0', 4),
(5, '1', 5),
(6, '1', 6),
(7, '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question8`
--

DROP TABLE IF EXISTS `survey_question8`;
CREATE TABLE IF NOT EXISTS `survey_question8` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `row1` int(11) DEFAULT NULL,
  `col1` varchar(50) DEFAULT NULL,
  `survey_formID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`survey_qID`),
  KEY `survey_formID` (`survey_formID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
(24, 6, '', 6),
(25, 1, '', 7),
(26, 2, '', 7),
(27, 3, '', 7),
(28, 4, '', 7),
(29, 5, '1', 7),
(30, 6, '11', 7);

-- --------------------------------------------------------

--
-- Table structure for table `survey_questionnaire`
--

DROP TABLE IF EXISTS `survey_questionnaire`;
CREATE TABLE IF NOT EXISTS `survey_questionnaire` (
  `survey_qID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_ID` int(11) UNSIGNED DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`survey_qID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_questionnaire`
--

INSERT INTO `survey_questionnaire` (`survey_qID`, `survey_ID`, `question`) VALUES
(1, 1, 'What does HTML stand for?'),
(2, 1, 'Who is making the Web standards?'),
(3, 1, 'Choose the correct HTML element for the largest heading:'),
(4, 1, 'What is the correct HTML element for inserting a line break?'),
(5, 1, 'What is the correct HTML for adding a background color?'),
(6, 1, 'Choose the correct HTML element to define important text'),
(7, 1, 'Choose the correct HTML element to define emphasized text'),
(8, 2, 'What is the correct HTML for creating a hyperlink?'),
(9, 2, 'What is the correct HTML element for inserting a line break?'),
(10, 2, 'Choose the correct HTML element for the largest heading:');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `user_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_level` int(11) UNSIGNED DEFAULT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `user_password` mediumtext DEFAULT NULL,
  `user_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_ID`),
  KEY `user_level` (`user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_ID`, `user_level`, `user_name`, `user_password`, `user_created`) VALUES
(0, 3, 'unregister', 'unregister', '2018-02-04 12:20:56'),
(1, 1, '201310656', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2022-01-16 23:01:50'),
(3, 3, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', '2017-09-06 02:23:49'),
(4, 2, 'teacher', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2022-01-18 16:24:43'),
(6, 2, 'xching321', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2022-01-18 16:24:41'),
(7, 2, 'teacher1', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2022-01-18 16:24:47'),
(8, 2, 'wazhing', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2022-01-18 16:24:49'),
(17, 2, 'chen32', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2022-01-18 16:24:51'),
(18, 1, '201310655', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2022-01-18 16:24:10'),
(19, 1, '201478543', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2022-01-18 16:24:16'),
(20, 2, 'zxc123', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2022-01-18 16:24:53'),
(21, 1, '201478545', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2022-01-18 16:23:56'),
(22, 1, '201310184', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2022-01-18 16:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_detail`
--

DROP TABLE IF EXISTS `user_admin_detail`;
CREATE TABLE IF NOT EXISTS `user_admin_detail` (
  `admin_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `admin_secretanswer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_ID`),
  KEY `admin_userID` (`admin_userID`),
  KEY `admin_civilStat` (`admin_civilStat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin_detail`
--

INSERT INTO `user_admin_detail` (`admin_ID`, `admin_userID`, `admin_img`, `admin_fName`, `admin_mName`, `admin_lName`, `admin_address`, `admin_status`, `admin_gender`, `admin_dob`, `admin_contact`, `admin_civilStat`, `admin_secretquestion`, `admin_secretanswer`) VALUES
(1, 3, '14925321_10157945054465556_5238769171882821447_n.jpg', 'admin', 'admin', 'admin', 'my adress', 'register', 'M', '1997-01-17', '09169158798', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
CREATE TABLE IF NOT EXISTS `user_level` (
  `level_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`level_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `user_notification`;
CREATE TABLE IF NOT EXISTS `user_notification` (
  `notif_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notif_typeID` int(11) UNSIGNED DEFAULT NULL,
  `notif_topicID` int(11) UNSIGNED DEFAULT NULL,
  `notif_userID` int(11) UNSIGNED DEFAULT NULL,
  `notif_receiverID` int(11) UNSIGNED DEFAULT NULL,
  `notif_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notif_state` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`notif_ID`),
  KEY `notif_topicID` (`notif_topicID`),
  KEY `notif_userID` (`notif_userID`),
  KEY `notif_receiverID` (`notif_receiverID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`notif_ID`, `notif_typeID`, `notif_topicID`, `notif_userID`, `notif_receiverID`, `notif_date`, `notif_state`) VALUES
(3, NULL, NULL, NULL, NULL, '2018-02-23 16:49:20', NULL),
(4, 3, 15, 4, 1, '2018-03-03 15:35:39', 0),
(5, 3, 15, 3, 1, '2022-01-16 22:07:24', 0),
(6, 3, 17, 4, 3, '2022-01-17 18:41:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_state`
--

DROP TABLE IF EXISTS `user_notif_state`;
CREATE TABLE IF NOT EXISTS `user_notif_state` (
  `status_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_Desc` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`status_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_type`
--

DROP TABLE IF EXISTS `user_notif_type`;
CREATE TABLE IF NOT EXISTS `user_notif_type` (
  `type_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_student_detail`
--

DROP TABLE IF EXISTS `user_student_detail`;
CREATE TABLE IF NOT EXISTS `user_student_detail` (
  `student_ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `student_secretanswer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_ID`),
  KEY `student_department` (`student_department`),
  KEY `student_userID` (`student_userID`),
  KEY `student_civilStat` (`student_civilStat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_student_detail`
--

INSERT INTO `user_student_detail` (`student_ID`, `student_userID`, `student_img`, `student_IDNumber`, `student_fName`, `student_mName`, `student_lName`, `student_address`, `student_civilStat`, `student_dob`, `student_gender`, `student_contact`, `student_admission`, `student_year_grad`, `student_department`, `student_status`, `student_secretquestion`, `student_secretanswer`) VALUES
(1, 1, 'download.png', 201310656, 'Student', 'S', 'Student', 'address', 1, NULL, 'M', '9064125773', '2018-03-06', '2018-03-30', 1, 'unregister', NULL, NULL),
(2, 21, 'download.png', 201310656, 'Student', 'S', 'Student', 'address', 1, NULL, 'M', '9064125773', '2018-03-06', '2018-03-30', 1, 'unregister', NULL, NULL),
(3, 22, 'download.png', 201310656, 'Student', 'S', 'Student', 'address', 1, NULL, 'M', '9064125773', '2018-03-06', '2018-03-30', 1, 'unregister', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher_detail`
--

DROP TABLE IF EXISTS `user_teacher_detail`;
CREATE TABLE IF NOT EXISTS `user_teacher_detail` (
  `teacher_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `teacher_secretanswer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`teacher_ID`),
  UNIQUE KEY `teacher_facultyID` (`teacher_facultyID`),
  KEY `teacher_userID` (`teacher_userID`),
  KEY `teacher_department` (`teacher_department`),
  KEY `teacher_civilStat` (`teacher_civilStat`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_teacher_detail`
--

INSERT INTO `user_teacher_detail` (`teacher_ID`, `teacher_userID`, `teacher_img`, `teacher_facultyID`, `teacher_fName`, `teacher_mName`, `teacher_lName`, `teacher_gender`, `teacher_dob`, `teacher_contact`, `teacher_address`, `teacher_civilStat`, `teacher_department`, `teacher_status`, `teacher_secretquestion`, `teacher_secretanswer`) VALUES
(130, 8, 'temp.gif', 68, 'teacher 1', 't', 'teacher 1', 'F', '2018-01-28', '123123', '123123', 1, 2, 'register', '', ''),
(140, 17, 'temp.gif', 54, 'teacher 2', 't', 'teacher 2', 'M', '0004-08-05', '85', 'z', 1, 1, 'register', '', ''),
(142, 20, 'temp.gif', 654, 'teacher 3', 't', 'teacher 3', 'M', '1689-09-01', '654', 'asd', 1, 1, 'register', '', ''),
(144, 4, 'temp.gif', 67, 'teacher', 't', 'teacher', 'F', '2018-01-28', '123123', '123123', 1, 2, 'register', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `view_counter`
--

DROP TABLE IF EXISTS `view_counter`;
CREATE TABLE IF NOT EXISTS `view_counter` (
  `view_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `view_topicID` int(11) UNSIGNED DEFAULT NULL,
  `view_count` int(11) DEFAULT 0,
  PRIMARY KEY (`view_ID`),
  KEY `view_topicID` (`view_topicID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_counter`
--

INSERT INTO `view_counter` (`view_ID`, `view_topicID`, `view_count`) VALUES
(3, 15, 23),
(4, 16, 13),
(5, 17, 15);

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
  ADD CONSTRAINT `user_student_detail_ibfk_1` FOREIGN KEY (`student_department`) REFERENCES `cvsu_course` (`course_ID`),
  ADD CONSTRAINT `user_student_detail_ibfk_2` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_ID`),
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
