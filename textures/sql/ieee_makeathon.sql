-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2013 at 10:11 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ieee_makeathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE IF NOT EXISTS `challenges` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Statement` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`Id`, `Statement`) VALUES
(1, 'Data entry is very difficult for students that are visually impaired. They find communication quite tough. School expects a solution to this problem where the disabled are ready to communicate (use electronic gadgets) without much difficulty.'),
(2, '40% of the students at a school centre for development disabilities cannot utter a word, thus making it almost impossible for the teachers to communicate with the students.'),
(3, 'People with hearing impediments find it difficult to communicate with common people, as they do not understand sign language. A technical method to communicate with common people, without training them in sign language is needed.'),
(4, 'Students with hearing impediments are unable to react to the alarm systems installed in schools, such as the school bell, fire alarms etc..'),
(5, 'Students in such schools can learn the letters of the alphabet, but struggle when it comes to making words and forming sentences.'),
(6, 'The Audio Induction Loop installed in such schools is an extremely expensive device, and after sometime, it needs to be replaced due to wear and tear. A method to downsize the costs greatly is needed in this situation.'),
(7, 'Hearing aids are extremely expensive, and as they are being used by children, their durability is a major concern. Group hearing aids also fall under this category.');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_issue`
--

CREATE TABLE IF NOT EXISTS `challenge_issue` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IssueId` int(11) NOT NULL,
  `ChallengeId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IssueId` (`IssueId`),
  KEY `ChallengeId` (`ChallengeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `challenge_issue`
--

INSERT INTO `challenge_issue` (`Id`, `IssueId`, `ChallengeId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PostId` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `UserId` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `PostId` (`PostId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`count`) VALUES
(104);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Summary` text NOT NULL,
  `Image` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`Id`, `Title`, `Summary`, `Image`) VALUES
(1, 'Development Disabilities', 'lorem Ipsum', 'textures/1.jpg'),
(2, 'Hearing Impediments', 'Hearing lorem', 'textures/2.jpg'),
(3, 'Straight from the Children', 'straight from children lorem', 'textures/3.jpg'),
(4, 'Visual Impediments', 'Visual Impediments lorem', 'textures/4.jpg'),
(5, 'Special Needs Schools', 'Special Needs Schools lorem', 'textures/5.jpg'),
(6, 'Common Problems', 'Common Problems lorem', 'textures/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `desp` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `by` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `desp`, `date`, `by`) VALUES
(2, 'Make-a-thon Registration is Online.', 'The Makeathon Registration Portal is Now Active. You can now register yourself on the site. However, the Login Portal will be Live soon. Stay Tuned! ', '2013-08-02 13:21:24', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `ProjectId` varchar(255) NOT NULL,
  `Heading` text NOT NULL,
  `Date` datetime NOT NULL,
  `CommentCount` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  KEY `ProjectId` (`ProjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ProjectId` varchar(255) NOT NULL,
  `Title` text NOT NULL,
  `ChallengeId` int(11) NOT NULL,
  `Abstract` text NOT NULL,
  `Status` int(11) NOT NULL COMMENT 'Public/Private',
  `WhyMakeathon` text NOT NULL,
  `Requirement` text NOT NULL,
  PRIMARY KEY (`ProjectId`),
  KEY `ChallengeId` (`ChallengeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectId`, `Title`, `ChallengeId`, `Abstract`, `Status`, `WhyMakeathon`, `Requirement`) VALUES
('d2u1tskmuop0cd4opfhb0tm6t2', 'Vasu Mahesh', 1, 'This is the abstract for hello world project that is modified', 0, 'For Fun modified', 'No requirements modified');

-- --------------------------------------------------------

--
-- Table structure for table `project_thread`
--

CREATE TABLE IF NOT EXISTS `project_thread` (
  `ProjectId` varchar(255) NOT NULL,
  `ThreadId` int(11) NOT NULL,
  PRIMARY KEY (`ThreadId`,`ProjectId`),
  KEY `ProjectId` (`ProjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Summary` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Id`, `Title`, `Summary`) VALUES
(1, 'Hearing Impairment', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(2, 'Visual Impairment', 'Summary of visual impairment');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` varchar(255) NOT NULL,
  `Name` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProjectId` (`ProjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectId` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL COMMENT 'Proposed/Implemented',
  PRIMARY KEY (`Id`),
  KEY `ProjectId` (`ProjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `ThreadId` int(11) NOT NULL AUTO_INCREMENT,
  `Label` text NOT NULL,
  PRIMARY KEY (`ThreadId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`ThreadId`, `Label`) VALUES
(11, 'C++'),
(12, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `College` text NOT NULL,
  `Branch` text NOT NULL,
  `Name` text NOT NULL,
  `Pass` text NOT NULL,
  `Email` text NOT NULL,
  `Phoneno` bigint(10) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `College`, `Branch`, `Name`, `Pass`, `Email`, `Phoneno`) VALUES
(23, 'VIT Vellore', 'dasdad', 'asdasdsadsad', 'asdasdsadsad', 'vasu.mahesh@gmail.com', 0),
(24, 'bubu', 'bububu', 'bububu', 'bububu', 'bububu@bububu.com', 0),
(25, 'VIT Vellore', 'Computer Science And Engineering', 'Ishaan', 'college101', 'ishaan.shrivastava@gmail.com', 0),
(26, 'VIT Vellore', 'cse', 'Sai Sri Sathya', 'sodamm1234', 'saisrisathya@gmail.com', 0),
(27, 'VIT Vellore', 'BCH', 'Devansh Dabral', 'devddevd', 'devanshdabral@gmail.com', 9632587410);

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE IF NOT EXISTS `user_project` (
  `UserId` int(11) NOT NULL,
  `ProjectId` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`UserId`,`ProjectId`),
  KEY `Constr_UserProject_ProjectId_fk` (`ProjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`UserId`, `ProjectId`, `Status`) VALUES
(26, 'd2u1tskmuop0cd4opfhb0tm6t2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_thread`
--

CREATE TABLE IF NOT EXISTS `user_thread` (
  `UserId` int(11) NOT NULL,
  `ThreadId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`,`ThreadId`),
  KEY `ThreadId` (`ThreadId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge_issue`
--
ALTER TABLE `challenge_issue`
  ADD CONSTRAINT `challenge_issue_ibfk_1` FOREIGN KEY (`IssueId`) REFERENCES `issues` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `challenge_issue_ibfk_2` FOREIGN KEY (`ChallengeId`) REFERENCES `challenges` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `posts` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`ChallengeId`) REFERENCES `challenges` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_thread`
--
ALTER TABLE `project_thread`
  ADD CONSTRAINT `project_thread_ibfk_1` FOREIGN KEY (`ThreadId`) REFERENCES `threads` (`ThreadId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_thread_ibfk_2` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solutions`
--
ALTER TABLE `solutions`
  ADD CONSTRAINT `solutions_ibfk_1` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_project`
--
ALTER TABLE `user_project`
  ADD CONSTRAINT `Constr_UserProject_ProjectId_fk` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Constr_UserProject_UserId_fk` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_thread`
--
ALTER TABLE `user_thread`
  ADD CONSTRAINT `user_thread_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_thread_ibfk_2` FOREIGN KEY (`ThreadId`) REFERENCES `threads` (`ThreadId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
