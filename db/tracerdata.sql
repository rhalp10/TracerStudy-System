-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 06:34 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracerdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvsu_college`
--

CREATE TABLE IF NOT EXISTS `cvsu_college` (
  `colleges_ID` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(150) NOT NULL,
  `college_acronym` varchar(25) NOT NULL,
  PRIMARY KEY (`colleges_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `cvsu_course` (
  `course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `course_departmentID` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_acronym` varchar(10) NOT NULL,
  PRIMARY KEY (`course_ID`),
  KEY `course_departmentID` (`course_departmentID`)
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

CREATE TABLE IF NOT EXISTS `cvsu_department` (
  `department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `department_collegeID` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_acronym` varchar(25) NOT NULL,
  PRIMARY KEY (`department_ID`),
  KEY `department_collegeID` (`department_collegeID`)
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

CREATE TABLE IF NOT EXISTS `forum_comment` (
  `comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `comment_topicID` int(11) NOT NULL,
  `comment_userID` int(11) NOT NULL,
  `comment_content` varchar(500) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`comment_ID`, `comment_topicID`, `comment_userID`, `comment_content`, `comment_date`) VALUES
(1, 0, 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment_reply`
--

CREATE TABLE IF NOT EXISTS `forum_comment_reply` (
  `comment_reply_ID` int(11) NOT NULL AUTO_INCREMENT,
  `comment_reply_parentID` int(11) NOT NULL,
  `comment_reply_userID` int(50) NOT NULL,
  `comment_reply_content` varchar(500) NOT NULL,
  `comment_reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_reply_ID`)
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

CREATE TABLE IF NOT EXISTS `forum_topic` (
  `topic_ID` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(150) NOT NULL,
  `post_owner_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_content` varchar(50000) NOT NULL,
  `post_status` varchar(25) NOT NULL,
  PRIMARY KEY (`topic_ID`),
  KEY `post_owner_id` (`post_owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_ID`, `post_title`, `post_owner_id`, `post_date`, `post_content`, `post_status`) VALUES
(1, 'Sample', 1, '2017-08-24 07:52:18', 'asdasdasdsad', 'PIN'),
(2, 'asdasd', 1, '2017-08-24 07:59:24', '<blockquote>\r\n<p>asdasd</p>\r\n</blockquote>\r\n', 'UNPIN'),
(3, 'dsada', 1, '2017-08-24 07:59:26', '<p style="text-align:center"><span style="font-size:36px"><span style="color:#ffffff"><span style="background-color:#3498db">asdasdasd</span></span></span></p>\n\n<blockquote>\n<ul>\n	<li style="text-align: center;"><span style="font-size:36px"><span style="color:#ffffff"><span style="background-color:#3498db">asdasdasdasdasd</span></span></span></li>\n	<li style="text-align: center;"><span style="font-size:36px"><span style="color:#ffffff"><span style="background-color:#3498db">asdasd</span></span></span></li>\n	<li style="text-align: center;"><span style="font-size:36px"><span style="color:#ffffff"><span style="background-color:#3498db">asd</span></span></span></li>\n	<li style="text-align: center;"><br />\n	&nbsp;</li>\n</ul>\n</blockquote>\n', 'UNPIN'),
(4, 'asdasd', 1, '2017-08-24 07:59:28', '<blockquote>\r\n<p>asdasd</p>\r\n\r\n<p>daarren</p>\r\n</blockquote>\r\n\r\n<p>asdasdasdasd</p>\r\n\r\n<p>asdasdsad</p>\r\n\r\n<p>asd</p>\r\n\r\n<blockquote>\r\n<p>adawd</p>\r\n\r\n<p>awdawd</p>\r\n\r\n<p>awdawd</p>\r\n\r\n<p>awd</p>\r\n\r\n<p>&nbsp;</p>\r\n</blockquote>\r\n', 'UNPIN'),
(5, 'try', 1, '2017-08-24 07:52:29', '<blockquote>\n<p>asdasd</p>\n\n<p>daarren</p>\n</blockquote>\n\n<p>asdasdasdasd</p>\n\n<p>asdasdsad</p>\n\n<p>asd</p>\n\n<blockquote>\n<p>adawd</p>\n\n<p>awdawd</p>\n\n<p>awdawd</p>\n\n<p>awd</p>\n\n<p>&nbsp;</p>\n</blockquote>\n', 'PIN'),
(6, 'Lorem Ipsum', 1, '2017-08-24 07:52:31', '<p style="text-align:center"><span style="font-size:22px"><strong>SAMPLE</strong></span></p>\r\n\r\n<hr />\r\n<p><img alt="" src="https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/free-bootstrap-blog-templates.jpg" style="float:left; height:192px; width:275px" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper, dui eu interdum volutpat, lectus justo placerat neque, quis vulputate tellus lorem ac mauris. Phasellus quis nibh quis magna porta tempor varius ut velit. Donec ipsum lorem, tincidunt sit amet pellentesque eu, porttitor a sapien. Aliquam eu mauris nulla. Duis efficitur eros sed sapien convallis, nec vulputate mauris congue. In viverra enim dolor, sit amet consectetur mauris pharetra ac. Praesent id est sodales dui viverra tempus at sed quam. Duis eget rutrum nibh. Nam vel facilisis nunc, vel molestie felis. Ut sit amet sodales nunc, quis aliquet nisl.</p>\r\n\r\n<p>Etiam pharetra arcu eget tincidunt placerat. Cras commodo nulla dolor, in pharetra sapien maximus vel. Nullam egestas, urna non fermentum accumsan, turpis tellus blandit nulla, eu convallis tortor erat vel sapien. Maecenas non pretium risus. Ut placerat nunc vitae pharetra condimentum. Vestibulum dolor orci, malesuada eget laoreet a, congue quis velit. Aenean sit amet volutpat nisl, vel luctus nibh. Vivamus non magna non felis malesuada ornare eleifend eu velit. Pellentesque tempus tristique est in cursus. Fusce a sagittis nulla, id suscipit arcu. Morbi condimentum id sem vitae maximus. Mauris ultricies nunc a nulla lacinia, eu convallis risus aliquet. Phasellus efficitur auctor nibh vel tempus. Fusce semper neque a nisi malesuada laoreet.</p>\r\n\r\n<p>Vivamus finibus aliquet lacus. Curabitur viverra maximus nisl sed tempor. Morbi vel neque at metus laoreet lacinia. Donec id massa commodo, auctor sapien sit amet, fermentum magna. Phasellus ultrices, nunc vel luctus vestibulum, leo lorem vulputate lorem, nec dictum nisi ex in ipsum. Nulla lobortis dolor a blandit dapibus. Sed fringilla ut nisl efficitur tincidunt. In a nunc elit.</p>\r\n\r\n<p>Vivamus convallis justo vitae libero finibus, eu venenatis est egestas. Etiam pretium nibh augue, accumsan porttitor purus tincidunt ut. Ut quis egestas lorem, ut vulputate nisi. Donec rhoncus sem velit. Nulla imperdiet pulvinar erat, sit amet tristique orci dignissim nec. Curabitur eleifend nunc nec metus molestie, ac imperdiet tellus feugiat. Nullam consequat felis sit amet ligula ullamcorper, vitae accumsan augue commodo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce rutrum quis eros at lobortis.</p>\r\n\r\n<p>Nulla facilisi. In nec consectetur dui, blandit venenatis mauris. Nullam lacus erat, porttitor ac tempor sit amet, euismod et libero. In tempus interdum lectus eu tincidunt. Nulla in magna a massa commodo congue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque gravida ante orci. In laoreet interdum urna, ac imperdiet ligula lacinia sed. Etiam felis sem, mattis ac lacus id, feugiat vestibulum nisi. Phasellus malesuada nunc eget nunc facilisis ultrices. Praesent placerat cursus venenatis.</p>\r\n', 'UNPIN');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic_likes`
--

CREATE TABLE IF NOT EXISTS `forum_topic_likes` (
  `topic_likes_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`topic_likes_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_topic_likes`
--

INSERT INTO `forum_topic_likes` (`topic_likes_ID`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_ID`, `user_level`, `user_name`, `user_password`, `user_created`) VALUES
(0, 0, 'unregister', 'unregister', '2017-08-24 08:58:17'),
(1, 1, 'student', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', '2017-08-24 08:01:18'),
(2, 2, 'teacher', '6Bgzqn4mnCPjx432mpfOVbU87Mi3sy29KRe8A1l+2X0=', '2017-08-24 08:00:49'),
(3, 3, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', '2017-08-24 08:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_detail`
--

CREATE TABLE IF NOT EXISTS `user_admin_detail` (
  `admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_userID` int(11) NOT NULL,
  `admin_img` varchar(50) NOT NULL,
  `admin_fName` varchar(150) NOT NULL,
  `admin_mName` varchar(25) NOT NULL,
  `admin_lName` varchar(50) NOT NULL,
  `admin_address` varchar(250) NOT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_admin_detail`
--

INSERT INTO `user_admin_detail` (`admin_ID`, `admin_userID`, `admin_img`, `admin_fName`, `admin_mName`, `admin_lName`, `admin_address`) VALUES
(1, 0, 'temp.gif', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE IF NOT EXISTS `user_notification` (
  `notif_ID` int(11) NOT NULL AUTO_INCREMENT,
  `notif_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notif_typeID` int(11) NOT NULL,
  `notif_userID` int(11) NOT NULL,
  `notif_receiverID` int(11) NOT NULL,
  PRIMARY KEY (`notif_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`notif_ID`, `notif_date`, `notif_typeID`, `notif_userID`, `notif_receiverID`) VALUES
(1, '2017-08-24 10:22:13', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_type`
--

CREATE TABLE IF NOT EXISTS `user_notif_type` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `user_student_detail` (
  `student_ID` int(11) NOT NULL AUTO_INCREMENT,
  `student_userID` int(11) NOT NULL,
  `student_img` varchar(250) NOT NULL,
  `student_IDNumber` int(11) NOT NULL,
  `student_fName` varchar(100) NOT NULL,
  `student_lName` varchar(100) NOT NULL,
  `student_address` varchar(250) NOT NULL,
  `student_acc_stat` varchar(50) NOT NULL,
  `student_admission` date NOT NULL,
  `student_year_grad` date NOT NULL,
  PRIMARY KEY (`student_ID`),
  KEY `student_userID` (`student_userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_student_detail`
--

INSERT INTO `user_student_detail` (`student_ID`, `student_userID`, `student_img`, `student_IDNumber`, `student_fName`, `student_lName`, `student_address`, `student_acc_stat`, `student_admission`, `student_year_grad`) VALUES
(1, 1, 'temp.gif', 201310656, 'Rhalp Darren', 'Cabrera', 'Blk 38 Lot 11 Phase 2 b Southville 2 TMC', 'Register', '0000-00-00', '0000-00-00'),
(2, 0, 'temp.gif', 201410209, 'Mardical', 'del Mundo', 'Indang', 'Unregister', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher_detail`
--

CREATE TABLE IF NOT EXISTS `user_teacher_detail` (
  `teacher_ID` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_userID` int(11) NOT NULL,
  `teacher_img` varchar(250) NOT NULL,
  `teacher_facultyID` varchar(50) NOT NULL,
  `teacher_fName` varchar(100) NOT NULL,
  `teacher_lName` varchar(100) NOT NULL,
  `teacher_address` varchar(250) NOT NULL,
  `teacher_department` int(11) NOT NULL,
  `teacher_acc_stat` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_ID`),
  KEY `teacher_userID` (`teacher_userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_teacher_detail`
--

INSERT INTO `user_teacher_detail` (`teacher_ID`, `teacher_userID`, `teacher_img`, `teacher_facultyID`, `teacher_fName`, `teacher_lName`, `teacher_address`, `teacher_department`, `teacher_acc_stat`) VALUES
(1, 2, 'temp.gif', 'a12s3d', 'Rhalp Darren', 'Cabrera', 'Blk 38 Lot 11 Phase 2 b Southville 2 TMC', 2, 'Register');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cvsu_course`
--
ALTER TABLE `cvsu_course`
  ADD CONSTRAINT `cvsu_course_ibfk_1` FOREIGN KEY (`course_departmentID`) REFERENCES `cvsu_department` (`department_id`),
  ADD CONSTRAINT `cvsu_course_ibfk_2` FOREIGN KEY (`course_departmentID`) REFERENCES `cvsu_department` (`department_id`);

--
-- Constraints for table `cvsu_department`
--
ALTER TABLE `cvsu_department`
  ADD CONSTRAINT `cvsu_department_ibfk_1` FOREIGN KEY (`department_collegeID`) REFERENCES `cvsu_college` (`colleges_ID`);

--
-- Constraints for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD CONSTRAINT `forum_topic_ibfk_1` FOREIGN KEY (`post_owner_id`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  ADD CONSTRAINT `user_student_detail_ibfk_1` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_id`),
  ADD CONSTRAINT `user_student_detail_ibfk_2` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD CONSTRAINT `user_teacher_detail_ibfk_1` FOREIGN KEY (`teacher_userID`) REFERENCES `user_account` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
