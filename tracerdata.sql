-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 05:27 PM
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
  `comment_topicID` int(11) NOT NULL,
  `comment_userID` int(11) NOT NULL,
  `comment_content` varchar(500) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`comment_ID`, `comment_topicID`, `comment_userID`, `comment_content`, `comment_date`) VALUES
(1, 0, 0, '', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `forum_comment_reply`
--

INSERT INTO `forum_comment_reply` (`comment_reply_ID`, `comment_reply_parentID`, `comment_reply_userID`, `comment_reply_content`, `comment_reply_date`) VALUES
(1, 0, 0, '', '2017-08-24 02:33:04');

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
(1, 'asdasd', 1, '2017-09-09 12:03:53', '<p>asdasd</p>\r\n', 'UNPIN'),
(2, 'werwerewr', 1, '2017-09-09 12:04:01', '<p>wrwer</p>\r\n', 'UNPIN'),
(3, 'xcvxcvxcv', 1, '2017-09-09 12:04:08', '<p>xcvxv</p>\r\n', 'UNPIN'),
(4, 'xcxcv', 1, '2017-09-09 12:04:24', '<p>xcvrerwerwer</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n', 'UNPIN'),
(5, 'sadasdasd', 1, '2017-09-09 12:05:03', '<p>dsd</p>\r\n', 'PIN'),
(6, 'xczxczcxzcxz', 2, '2017-09-09 12:05:37', '<p>zxxczxcz</p>\r\n', 'UNPIN'),
(7, 'asdasd', 1, '2017-09-09 15:45:52', '<p>asdasdasd</p>\r\n', 'UNPIN'),
(8, 'xx', 3, '2017-09-09 16:11:28', '<p>xx</p>\r\n', 'UNPIN'),
(9, '89', 3, '2017-09-09 16:14:46', '<p>987</p>\r\n', 'UNPIN'),
(10, 'sdfsdfsdf', 3, '2017-09-09 16:17:24', '<p>fsdf</p>\r\n', 'UNPIN'),
(11, 'sdfsdfsdf', 3, '2017-09-09 16:17:32', '<p>fsdf</p>\r\n', 'UNPIN'),
(12, 'sdfsdfsdf', 3, '2017-09-09 16:18:28', '<p>fsdf</p>\r\n', 'UNPIN'),
(13, 'askjdhjkashdjkh', 2, '2017-09-12 03:29:14', '<p>aksjdhkjashd</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'UNPIN'),
(14, 'edit', 2, '2017-09-12 17:57:11', '<p>edit</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'UNPIN'),
(15, 'wazhin', 2, '2017-09-12 18:25:03', '<p>wazhing</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'UNPIN'),
(16, 'darren', 2, '2017-09-17 04:29:59', '<p>darren</p>\r\n', 'UNPIN');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic_likes`
--

CREATE TABLE `forum_topic_likes` (
  `topic_likes_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic_likes`
--

INSERT INTO `forum_topic_likes` (`topic_likes_ID`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `message_read`
--

CREATE TABLE `message_read` (
  `read_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_read`
--

INSERT INTO `message_read` (`read_ID`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `message_send`
--

CREATE TABLE `message_send` (
  `send_ID` int(11) NOT NULL,
  `send_mThread` int(11) NOT NULL,
  `send_content` varchar(1500) NOT NULL,
  `send_receiverID` int(11) NOT NULL,
  `send_userID` int(11) NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `send_status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_send`
--

INSERT INTO `message_send` (`send_ID`, `send_mThread`, `send_content`, `send_receiverID`, `send_userID`, `send_date`, `send_status`) VALUES
(0, 1, 'ASDHAGSJDKGHASDJGHASDAS', 5, 0, '2017-09-08 12:58:47', 'UNREAD');

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `thread_ID` int(11) NOT NULL,
  `thread_participant` varchar(250) NOT NULL,
  `thread_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_thread`
--

INSERT INTO `message_thread` (`thread_ID`, `thread_participant`, `thread_created`) VALUES
(1, '1,2', '2017-09-11 12:38:03');

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
(0, 0, 'unregister', 'unregister', '2017-09-06 10:18:39'),
(1, 1, '201310656', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2017-09-06 11:37:31'),
(2, 2, 'teacher', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2017-09-06 10:18:33'),
(3, 3, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', '2017-09-06 10:23:49'),
(11, 1, '555', 'cYJ67TqHIeZ2rC6+c635Ev22WdK4Nf6SMoSQMInVEoM=', '2017-09-09 16:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_detail`
--

CREATE TABLE `user_admin_detail` (
  `admin_ID` int(11) NOT NULL,
  `admin_userID` int(11) NOT NULL,
  `admin_img` varchar(50) NOT NULL DEFAULT 'temp.gif',
  `admin_fName` varchar(100) NOT NULL,
  `admin_mName` varchar(25) NOT NULL,
  `admin_lName` varchar(50) NOT NULL,
  `admin_address` varchar(250) NOT NULL,
  `admin_status` varchar(10) NOT NULL DEFAULT 'unregister'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin_detail`
--

INSERT INTO `user_admin_detail` (`admin_ID`, `admin_userID`, `admin_img`, `admin_fName`, `admin_mName`, `admin_lName`, `admin_address`, `admin_status`) VALUES
(1, 3, 'temp.gif', 'admin', 'admin', 'admin', 'Blk 38 Lot 11 Phase 2 b Southville 2 TMC', 'register'),
(2, 0, 'temp.gif', '', '', '', '', 'unregister');

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
  `notif_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notif_typeID` int(11) NOT NULL,
  `notif_userID` int(11) NOT NULL,
  `notif_receiverID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`notif_ID`, `notif_date`, `notif_typeID`, `notif_userID`, `notif_receiverID`) VALUES
(1, '2017-08-24 10:22:13', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_type`
--

CREATE TABLE `user_notif_type` (
  `type_ID` int(11) NOT NULL,
  `type_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notif_type`
--

INSERT INTO `user_notif_type` (`type_ID`, `type_Name`) VALUES
(1, 'Login'),
(2, 'Like'),
(3, 'Comment'),
(4, 'Post');

-- --------------------------------------------------------

--
-- Table structure for table `user_student_detail`
--

CREATE TABLE `user_student_detail` (
  `student_ID` int(11) NOT NULL,
  `student_userID` int(11) NOT NULL,
  `student_img` varchar(50) NOT NULL DEFAULT 'temp.gif',
  `student_IDNumber` int(11) NOT NULL,
  `student_fName` varchar(100) NOT NULL,
  `student_mName` varchar(25) NOT NULL,
  `student_lName` varchar(50) NOT NULL,
  `student_address` varchar(250) NOT NULL,
  `student_admission` date NOT NULL,
  `student_year_grad` date NOT NULL,
  `student_department` varchar(100) NOT NULL,
  `student_status` varchar(10) NOT NULL DEFAULT 'unregister'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_student_detail`
--

INSERT INTO `user_student_detail` (`student_ID`, `student_userID`, `student_img`, `student_IDNumber`, `student_fName`, `student_mName`, `student_lName`, `student_address`, `student_admission`, `student_year_grad`, `student_department`, `student_status`) VALUES
(1, 1, 'temp.gif', 201310656, 'Rhalp Darren ', 'R', 'Cabrera', 'Blk 38 Lot 11 Phase 2 b Southville 2 TMC', '2013-10-05', '2018-03-30', 'COMSCI', 'register'),
(2, 0, 'temp.gif', 201410209, 'Mardical', '', 'del Mundo', 'Indang', '0000-00-00', '2017-09-12', 'COMSCI', 'register'),
(13, 0, 'temp.gif', 201410259, 'Ria', '', 'Jimenez', 'Indang', '2017-09-30', '2017-09-02', 'IT', 'unregister'),
(14, 11, 'temp.gif', 201309888, 'John Ervin', 'N', 'Villadolid', 'Naic', '0000-00-00', '2016-00-00', 'COMSCI', 'register'),
(15, 0, 'temp.gif', 201088814, 'Raouf', 'R', 'Daud', 'Indang', '0000-00-00', '2016-00-00', 'IT', 'unregister'),
(16, 0, 'temp.gif', 200901201, 'Justine', '', 'De-guzman', 'Indang', '0000-00-00', '2014-00-00', 'IT', 'unregister'),
(17, 0, 'temp.gif', 201310253, 'Andrea', 'L', 'Labbres', '', '0000-00-00', '2017-00-00', 'OA', 'unregister');

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher_detail`
--

CREATE TABLE `user_teacher_detail` (
  `teacher_ID` int(11) NOT NULL,
  `teacher_userID` int(11) NOT NULL,
  `teacher_img` varchar(250) NOT NULL DEFAULT 'temp.gif',
  `teacher_facultyID` varchar(50) NOT NULL,
  `teacher_fName` varchar(100) NOT NULL,
  `teacher_mName` varchar(25) NOT NULL,
  `teacher_lName` varchar(50) NOT NULL,
  `teacher_address` varchar(250) NOT NULL,
  `teacher_department` int(11) NOT NULL,
  `teacher_status` varchar(10) NOT NULL DEFAULT 'unregister'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_teacher_detail`
--

INSERT INTO `user_teacher_detail` (`teacher_ID`, `teacher_userID`, `teacher_img`, `teacher_facultyID`, `teacher_fName`, `teacher_mName`, `teacher_lName`, `teacher_address`, `teacher_department`, `teacher_status`) VALUES
(1, 2, 'temp.gif', 'a12s3d', 'teacher', 't', 'teacher', 'Blk 38 Lot 11 Phase 2 b Southville 2 TMC', 2, 'register'),
(2, 0, 'temp.gif', '', '', '', '', '', 0, 'unregister');

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
(1, 1, 27),
(2, 2, 152),
(3, 3, 17),
(4, 4, 7),
(5, 5, 60),
(6, 6, 94),
(19, 22, 8),
(20, 23, 0),
(21, 24, 1),
(22, 25, 2),
(23, 26, 16),
(24, 27, 24),
(25, 0, 44),
(26, 0, 43),
(27, 0, 41),
(28, 1, 35),
(29, 0, 37),
(30, 0, 34),
(31, 0, 33),
(32, 0, 31),
(33, 0, 30),
(34, 29, 1),
(35, 0, 29),
(36, 1, 13),
(37, 2, 1),
(38, 3, 1),
(39, 4, 1),
(40, 5, 2),
(41, 6, 3),
(42, 0, 28),
(43, 0, 26),
(44, 0, 22),
(45, 0, 15),
(46, 0, 14),
(47, 12, 1),
(48, 13, 3),
(49, 14, 6),
(50, 15, 12),
(51, 16, 2);

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
-- Indexes for table `message_read`
--
ALTER TABLE `message_read`
  ADD PRIMARY KEY (`read_ID`);

--
-- Indexes for table `message_send`
--
ALTER TABLE `message_send`
  ADD PRIMARY KEY (`send_ID`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`thread_ID`);

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
  ADD PRIMARY KEY (`level_ID`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`notif_ID`);

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
  ADD KEY `student_userID` (`student_userID`);

--
-- Indexes for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD PRIMARY KEY (`teacher_ID`),
  ADD KEY `teacher_userID` (`teacher_userID`);

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
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  MODIFY `comment_reply_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `forum_topic_likes`
--
ALTER TABLE `forum_topic_likes`
  MODIFY `topic_likes_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `thread_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `notif_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_notif_type`
--
ALTER TABLE `user_notif_type`
  MODIFY `type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  MODIFY `student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  MODIFY `teacher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `view_counter`
--
ALTER TABLE `view_counter`
  MODIFY `view_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cvsu_course`
--
ALTER TABLE `cvsu_course`
  ADD CONSTRAINT `cvsu_course_ibfk_1` FOREIGN KEY (`course_departmentID`) REFERENCES `cvsu_department` (`department_ID`),
  ADD CONSTRAINT `cvsu_course_ibfk_2` FOREIGN KEY (`course_departmentID`) REFERENCES `cvsu_department` (`department_ID`);

--
-- Constraints for table `cvsu_department`
--
ALTER TABLE `cvsu_department`
  ADD CONSTRAINT `cvsu_department_ibfk_1` FOREIGN KEY (`department_collegeID`) REFERENCES `cvsu_college` (`colleges_ID`);

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
  ADD CONSTRAINT `user_student_detail_ibfk_1` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_student_detail_ibfk_2` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD CONSTRAINT `user_teacher_detail_ibfk_1` FOREIGN KEY (`teacher_userID`) REFERENCES `user_account` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
