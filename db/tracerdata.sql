-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 05:37 PM
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
  `colleges_ID` int(11) NOT NULL,
  `college_name` varchar(150) NOT NULL,
  `college_acronym` varchar(25) NOT NULL
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
  `course_ID` int(11) NOT NULL,
  `course_departmentID` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_acronym` varchar(10) NOT NULL
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
  `department_ID` int(11) NOT NULL,
  `department_collegeID` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_acronym` varchar(25) NOT NULL
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
  `comment_ID` int(11) NOT NULL,
  `comment_topicID` varchar(150) NOT NULL,
  `comment_userID` int(11) NOT NULL,
  `comment_content` varchar(500) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`comment_ID`, `comment_topicID`, `comment_userID`, `comment_content`, `comment_date`) VALUES
(4, '20', 1, 'aaaaaaaa', '2017-10-16 04:17:55'),
(5, '20', 1, 'zxczxcxc', '2017-10-16 04:23:38'),
(6, '20', 1, 'franz\r\n', '2017-10-16 04:24:18'),
(7, '12', 1, 'zxczxc', '2017-10-16 04:28:07'),
(8, '12', 1, 'zxczxczxczxc', '2017-10-16 04:28:30'),
(9, '6', 1, 'xxxxxxxxxxxxxxxxxxxxxxxxx', '2017-10-17 06:56:43'),
(10, '6', 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2017-10-17 07:11:21'),
(12, '6', 2, 'teacher', '2017-10-17 08:00:33'),
(13, '20', 2, 'zxczxczxc', '2017-10-17 08:03:24'),
(14, '4', 2, 'xcvxcv', '2017-10-25 04:15:10'),
(15, '20', 2, 'asdasd', '2017-10-27 10:57:18'),
(25, '20', 2, 'darrennnnnn', '2017-11-04 11:52:04'),
(26, '20', 2, 'aaaa', '2017-11-04 11:52:26'),
(27, '1', 2, 'my teacherrr', '2017-11-04 11:54:10'),
(28, '10', 2, 'my teacher\r\n', '2017-11-04 11:54:32'),
(29, '1', 1, 'xx', '2018-02-04 13:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment_reply`
--

CREATE TABLE `forum_comment_reply` (
  `comment_reply_ID` int(11) NOT NULL,
  `comment_reply_parentID` int(11) NOT NULL,
  `comment_reply_userID` int(50) NOT NULL,
  `comment_reply_content` varchar(500) NOT NULL,
  `comment_reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topic_ID` int(11) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_owner_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_content` varchar(50000) NOT NULL,
  `post_status` varchar(25) NOT NULL DEFAULT 'UNPIN'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_ID`, `post_title`, `post_owner_id`, `post_date`, `post_content`, `post_status`) VALUES
(1, 'first topic', 1, '2018-02-04 13:26:40', '<p>da reyt weeyy</p>\r\n', 'UNPIN');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic_likes`
--

CREATE TABLE `forum_topic_likes` (
  `topic_likes_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `ID` int(11) UNSIGNED NOT NULL,
  `marital_Name` varchar(50) NOT NULL
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
  `message_ID` int(11) NOT NULL,
  `message_threadID` int(11) NOT NULL,
  `message_sendDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_content` varchar(1500) NOT NULL,
  `message_receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_send`
--

INSERT INTO `message_send` (`message_ID`, `message_threadID`, `message_sendDate`, `message_content`, `message_receiver`) VALUES
(1, 1, '2017-10-06 10:19:33', 'waaaaaaaa', 2),
(2, 1, '2017-10-06 10:19:28', 'meeeeeeeeeeeee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `message_send_state`
--

CREATE TABLE `message_send_state` (
  `state_ID` int(11) NOT NULL,
  `state_msgID` int(11) NOT NULL,
  `state_readerID` int(11) NOT NULL,
  `state_dateRead` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `thread_ID` int(11) NOT NULL,
  `thread_name` varchar(150) NOT NULL,
  `thread_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread_participant`
--

CREATE TABLE `message_thread_participant` (
  `participant_ID` int(11) NOT NULL,
  `participant_threadID` int(11) NOT NULL,
  `participant_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `survey_forms`
--

CREATE TABLE `survey_forms` (
  `form_id` int(11) NOT NULL,
  `form_ownerID` int(11) NOT NULL,
  `form_taken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_forms`
--

INSERT INTO `survey_forms` (`form_id`, `form_ownerID`, `form_taken`) VALUES
(0, 0, '2018-02-04 12:23:39'),
(1, 1, '2018-02-04 13:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `survey_maxcount`
--

CREATE TABLE `survey_maxcount` (
  `survey_id` int(11) NOT NULL,
  `survey_ownerID` int(11) NOT NULL,
  `survey_maxattemp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_maxcount`
--

INSERT INTO `survey_maxcount` (`survey_id`, `survey_ownerID`, `survey_maxattemp`) VALUES
(0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question1`
--

CREATE TABLE `survey_question1` (
  `survey_qID` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `col1` varchar(50) NOT NULL,
  `col2` varchar(50) NOT NULL,
  `survey_formID` int(11) NOT NULL
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
(15, 15, 'other', 'zzzzzzzzzz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question2`
--

CREATE TABLE `survey_question2` (
  `survey_qID` int(11) NOT NULL,
  `survey_row1` int(11) NOT NULL,
  `survey_col1` varchar(50) DEFAULT 'no',
  `survey_formID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question2`
--

INSERT INTO `survey_question2` (`survey_qID`, `survey_row1`, `survey_col1`, `survey_formID`) VALUES
(1, 1, 'yes', 1),
(2, 2, 'no', 1),
(3, 3, 'yes', 1),
(4, 4, 'yes', 1),
(5, 5, 'cccccccccccccc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question3`
--

CREATE TABLE `survey_question3` (
  `survey_qID` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `col1` varchar(1) DEFAULT '0',
  `col2` varchar(1) NOT NULL DEFAULT '0',
  `survey_formID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question3`
--

INSERT INTO `survey_question3` (`survey_qID`, `row`, `col1`, `col2`, `survey_formID`) VALUES
(1, 1, '1', '', 1),
(2, 2, '', '1', 1),
(3, 3, '1', '', 1),
(4, 4, '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question4`
--

CREATE TABLE `survey_question4` (
  `survey_qID` int(11) NOT NULL,
  `row1` int(11) NOT NULL,
  `col1` varchar(1) NOT NULL DEFAULT '0',
  `survey_formID` int(11) NOT NULL
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
(6, 6, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question5`
--

CREATE TABLE `survey_question5` (
  `survey_qID` int(11) NOT NULL,
  `ans` varchar(5) NOT NULL,
  `survey_formID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question5`
--

INSERT INTO `survey_question5` (`survey_qID`, `ans`, `survey_formID`) VALUES
(1, 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question6`
--

CREATE TABLE `survey_question6` (
  `survey_qID` int(11) NOT NULL,
  `ans` varchar(10) NOT NULL,
  `survey_formID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question6`
--

INSERT INTO `survey_question6` (`survey_qID`, `ans`, `survey_formID`) VALUES
(1, 'temp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question7`
--

CREATE TABLE `survey_question7` (
  `survey_qID` int(11) NOT NULL,
  `survey_ans` varchar(1) NOT NULL DEFAULT '0',
  `survey_formID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_question7`
--

INSERT INTO `survey_question7` (`survey_qID`, `survey_ans`, `survey_formID`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_question8`
--

CREATE TABLE `survey_question8` (
  `survey_qID` int(11) NOT NULL,
  `row1` int(11) NOT NULL,
  `col1` varchar(50) NOT NULL,
  `survey_formID` int(11) NOT NULL
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
(6, 6, 'fff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_ID` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_ID`, `user_level`, `user_name`, `user_password`, `user_created`) VALUES
(0, 3, 'unregister', 'unregister', '2018-02-04 12:20:56'),
(1, 1, '201310656', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2017-10-24 22:08:39'),
(3, 3, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', '2017-09-06 02:23:49'),
(4, 2, '3', 'EubGHmBLzl/vo4QaEmMmq+4VBNihTeZ5V4ob1H/u0IY=', '2018-02-07 14:20:34'),
(5, 2, 'ssss', 'FDPMnFgSGvITJtp7Ojx8d8pIOPXe5nVr3Ar1fOvm7II=', '2018-02-07 15:25:38'),
(6, 2, 'daaa1', 'nmJlYI9M3qXXfMBP75rfDTf9c9s0Jq8ZiEdlRCxtmB4=', '2018-02-07 16:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_detail`
--

CREATE TABLE `user_admin_detail` (
  `admin_ID` int(11) NOT NULL,
  `admin_userID` int(11) NOT NULL,
  `admin_img` varchar(250) NOT NULL DEFAULT 'temp.gif',
  `admin_fName` varchar(100) NOT NULL,
  `admin_mName` varchar(25) NOT NULL,
  `admin_lName` varchar(50) NOT NULL,
  `admin_address` varchar(250) NOT NULL,
  `admin_status` varchar(10) NOT NULL DEFAULT 'unregister',
  `admin_gender` varchar(1) NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_contact` varchar(11) NOT NULL,
  `admin_civilStat` int(11) NOT NULL,
  `admin_secretquestion` varchar(250) NOT NULL,
  `admin_secretanswer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin_detail`
--

INSERT INTO `user_admin_detail` (`admin_ID`, `admin_userID`, `admin_img`, `admin_fName`, `admin_mName`, `admin_lName`, `admin_address`, `admin_status`, `admin_gender`, `admin_dob`, `admin_contact`, `admin_civilStat`, `admin_secretquestion`, `admin_secretanswer`) VALUES
(1, 3, 'temp.gif', '', '', '', '', 'register', '', '0000-00-00', '48949494984', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `level_ID` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL
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
  `notif_ID` int(11) NOT NULL,
  `notif_typeID` int(11) NOT NULL,
  `notif_topicID` int(11) NOT NULL,
  `notif_userID` int(11) NOT NULL,
  `notif_receiverID` int(11) NOT NULL,
  `notif_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notif_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_state`
--

CREATE TABLE `user_notif_state` (
  `status_ID` int(11) NOT NULL,
  `status_Desc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_type`
--

CREATE TABLE `user_notif_type` (
  `type_ID` int(11) NOT NULL,
  `type_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_student_detail`
--

CREATE TABLE `user_student_detail` (
  `student_ID` int(11) NOT NULL,
  `student_userID` int(11) NOT NULL,
  `student_img` varchar(250) NOT NULL DEFAULT 'temp.gif',
  `student_IDNumber` int(11) DEFAULT NULL,
  `student_fName` varchar(100) NOT NULL,
  `student_mName` varchar(25) NOT NULL,
  `student_lName` varchar(50) NOT NULL,
  `student_address` varchar(250) NOT NULL,
  `student_civilStat` int(11) NOT NULL,
  `student_dob` date NOT NULL,
  `student_gender` varchar(1) NOT NULL,
  `student_contact` varchar(11) NOT NULL,
  `student_admission` date NOT NULL,
  `student_year_grad` date NOT NULL,
  `student_department` varchar(100) NOT NULL,
  `student_status` varchar(10) NOT NULL DEFAULT 'unregister',
  `student_secretquestion` varchar(250) NOT NULL,
  `student_secretanswer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_student_detail`
--

INSERT INTO `user_student_detail` (`student_ID`, `student_userID`, `student_img`, `student_IDNumber`, `student_fName`, `student_mName`, `student_lName`, `student_address`, `student_civilStat`, `student_dob`, `student_gender`, `student_contact`, `student_admission`, `student_year_grad`, `student_department`, `student_status`, `student_secretquestion`, `student_secretanswer`) VALUES
(1, 1, '14963384_10157945054480556_5814871009565891544_n.png', 201310656, 'Rhalp Darren', 'R', 'Cabrera', 'Blk 38 Lot 11 Phase2b Southville2 Trece Martires City', 0, '0000-00-00', '', '11111111111', '2013-06-01', '2018-10-30', 'COMSCI', 'register', '', ''),
(2, 0, 'temp.gif', 321, 's', 's', 's', 's', 0, '2018-02-08', 'M', '11111111111', '2018-01-29', '2018-02-22', 'COMSCI', 'unregister', '', ''),
(4, 0, 'temp.gif', 132131321, 'sd', 'g', 'jhgjhg', '123123', 0, '2018-02-07', 'F', '123123', '2018-02-08', '2018-02-14', 'IT', 'unregister', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher_detail`
--

CREATE TABLE `user_teacher_detail` (
  `teacher_ID` int(11) NOT NULL,
  `teacher_userID` int(11) NOT NULL,
  `teacher_img` varchar(250) NOT NULL DEFAULT 'temp.gif',
  `teacher_facultyID` int(11) DEFAULT NULL,
  `teacher_fName` varchar(100) NOT NULL,
  `teacher_mName` varchar(25) NOT NULL,
  `teacher_lName` varchar(50) NOT NULL,
  `teacher_gender` varchar(1) NOT NULL,
  `teacher_dob` date NOT NULL,
  `teacher_contact` varchar(11) NOT NULL,
  `teacher_address` varchar(250) NOT NULL,
  `teacher_civilStat` int(11) NOT NULL,
  `teacher_department` int(11) NOT NULL,
  `teacher_status` varchar(10) NOT NULL DEFAULT 'unregister',
  `teacher_secretquestion` varchar(250) NOT NULL,
  `teacher_secretanswer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_teacher_detail`
--

INSERT INTO `user_teacher_detail` (`teacher_ID`, `teacher_userID`, `teacher_img`, `teacher_facultyID`, `teacher_fName`, `teacher_mName`, `teacher_lName`, `teacher_gender`, `teacher_dob`, `teacher_contact`, `teacher_address`, `teacher_civilStat`, `teacher_department`, `teacher_status`, `teacher_secretquestion`, `teacher_secretanswer`) VALUES
(125, 0, 'temp.gif', 12, 'Samples', 's', 's', 'M', '0000-00-00', '0', 'x', 3, 1, 'unregister', '', ''),
(128, 5, 'temp.gif', 123123, 'qwe', 'qwe', 'qwe', 'M', '0000-00-00', '09169158798', '12312', 0, 1, 'register', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `view_counter`
--

CREATE TABLE `view_counter` (
  `view_ID` int(11) NOT NULL,
  `view_topicID` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_counter`
--

INSERT INTO `view_counter` (`view_ID`, `view_topicID`, `view_count`) VALUES
(1, 1, 4);

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
  ADD PRIMARY KEY (`comment_ID`);

--
-- Indexes for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  ADD PRIMARY KEY (`comment_reply_ID`);

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topic_ID`);

--
-- Indexes for table `forum_topic_likes`
--
ALTER TABLE `forum_topic_likes`
  ADD PRIMARY KEY (`topic_likes_ID`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message_send`
--
ALTER TABLE `message_send`
  ADD PRIMARY KEY (`message_ID`);

--
-- Indexes for table `message_send_state`
--
ALTER TABLE `message_send_state`
  ADD PRIMARY KEY (`state_ID`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`thread_ID`);

--
-- Indexes for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  ADD PRIMARY KEY (`participant_ID`);

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
  ADD PRIMARY KEY (`survey_qID`);

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
  ADD KEY `admin_userID` (`admin_userID`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_ID`),
  ADD UNIQUE KEY `level_ID` (`level_ID`);

--
-- Indexes for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  ADD PRIMARY KEY (`student_ID`),
  ADD UNIQUE KEY `student_IDNumber` (`student_IDNumber`),
  ADD KEY `student_userID` (`student_userID`);

--
-- Indexes for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD PRIMARY KEY (`teacher_ID`),
  ADD UNIQUE KEY `teacher_facultyID` (`teacher_facultyID`),
  ADD KEY `teacher_userID` (`teacher_userID`),
  ADD KEY `teacher_department` (`teacher_department`);

--
-- Indexes for table `view_counter`
--
ALTER TABLE `view_counter`
  ADD PRIMARY KEY (`view_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvsu_college`
--
ALTER TABLE `cvsu_college`
  MODIFY `colleges_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cvsu_course`
--
ALTER TABLE `cvsu_course`
  MODIFY `course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cvsu_department`
--
ALTER TABLE `cvsu_department`
  MODIFY `department_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum_comment`
--
ALTER TABLE `forum_comment`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  MODIFY `comment_reply_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_topic_likes`
--
ALTER TABLE `forum_topic_likes`
  MODIFY `topic_likes_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_send`
--
ALTER TABLE `message_send`
  MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_send_state`
--
ALTER TABLE `message_send_state`
  MODIFY `state_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `thread_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  MODIFY `participant_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_forms`
--
ALTER TABLE `survey_forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_question1`
--
ALTER TABLE `survey_question1`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `survey_question2`
--
ALTER TABLE `survey_question2`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `survey_question3`
--
ALTER TABLE `survey_question3`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey_question4`
--
ALTER TABLE `survey_question4`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_question5`
--
ALTER TABLE `survey_question5`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_question6`
--
ALTER TABLE `survey_question6`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_question7`
--
ALTER TABLE `survey_question7`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_question8`
--
ALTER TABLE `survey_question8`
  MODIFY `survey_qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  MODIFY `student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  MODIFY `teacher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `view_counter`
--
ALTER TABLE `view_counter`
  MODIFY `view_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_level` (`level_ID`);

--
-- Constraints for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  ADD CONSTRAINT `user_admin_detail_ibfk_1` FOREIGN KEY (`admin_userID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  ADD CONSTRAINT `user_student_detail_ibfk_1` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD CONSTRAINT `user_teacher_detail_ibfk_1` FOREIGN KEY (`teacher_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_teacher_detail_ibfk_2` FOREIGN KEY (`teacher_department`) REFERENCES `cvsu_department` (`department_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
