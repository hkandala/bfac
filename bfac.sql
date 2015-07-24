-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2015 at 03:34 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bfac`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE IF NOT EXISTS `challenges` (
  `Id` int(11) NOT NULL,
  `Statement` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
  `Id` int(11) NOT NULL,
  `IssueId` int(11) NOT NULL,
  `ChallengeId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
  `Id` int(11) NOT NULL,
  `PostId` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `UserId` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Summary` text NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`Id`, `Title`, `Summary`, `Image`) VALUES
(1, 'Development Disabilities', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illum ipsa labore minus mollitia neque nihil, nulla quae quasi qui repellat sunt, veniam veritatis. Architecto error inventore laboriosam provident recusandae', 'img/issues/one.png'),
(2, 'Hearing Impediments', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illum ipsa labore minus mollitia neque nihil, nulla quae quasi qui repellat sunt, veniam veritatis. Architecto error inventore laboriosam provident recusandae', 'img/issues/two.png'),
(3, 'Straight from the Children', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illum ipsa labore minus mollitia neque nihil, nulla quae quasi qui repellat sunt, veniam veritatis. Architecto error inventore laboriosam provident recusandae', 'img/issues/three.png'),
(4, 'Visual Impediments', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illum ipsa labore minus mollitia neque nihil, nulla quae quasi qui repellat sunt, veniam veritatis. Architecto error inventore laboriosam provident recusandae', 'img/issues/four.png'),
(5, 'Special Needs Schools', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illum ipsa labore minus mollitia neque nihil, nulla quae quasi qui repellat sunt, veniam veritatis. Architecto error inventore laboriosam provident recusandae', 'img/issues/five.png'),
(6, 'Common Problems', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illum ipsa labore minus mollitia neque nihil, nulla quae quasi qui repellat sunt, veniam veritatis. Architecto error inventore laboriosam provident recusandae', 'img/issues/six.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `desp` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `by` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `desp`, `date`, `by`) VALUES
(2, 'BFAC Website is Live!', 'Build For A Change website is now live. Our developers are working on the registration portal. Portal will be active very soon. Stay Tuned!', '2015-01-14 13:21:24', 'Admin'),
(3, 'Contact Information is updated.', 'All contact information is now updated in Contact Us page. Feel free to contact any of us, if you have any queries regarding our objectives and functionalities.', '2015-02-04 07:19:08', 'Admin'),
(4, 'Report us if there are any bugs.', 'The BFAC website is currently in beta version. We are constantly updating to make the website bug free. If you find any bugs in this website, please report the bug to our developers. It will be very helpful for our development.', '2015-04-08 03:07:27', 'Admin'),
(5, 'BFAC Registration is Online.', 'Build For A Change Registration Portal is Now Active. You can now register yourself on the site. However, the Login Portal will be Live soon. Stay Tuned! ', '2015-06-27 02:20:06', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ProjectId` varchar(255) NOT NULL,
  `Heading` text NOT NULL,
  `Date` datetime NOT NULL,
  `CommentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Requirement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectId`, `Title`, `ChallengeId`, `Abstract`, `Status`, `WhyMakeathon`, `Requirement`) VALUES
('jkt2dse39te3euv9t3jaivm054', 'Sample', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto eaque molestias officiis? Ab accusamus distinctio, doloremque doloribus dolorum explicabo hic illum ipsam molestias nostrum quisquam ratione rem repellat rerum?', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto eaque molestias officiis? Ab accusamus distinctio, doloremque doloribus dolorum explicabo hic illum ipsam molestias nostrum quisquam ratione rem repellat rerum?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto eaque molestias officiis? Ab accusamus distinctio, doloremque doloribus dolorum explicabo hic illum ipsam molestias nostrum quisquam ratione rem repellat rerum?');

-- --------------------------------------------------------

--
-- Table structure for table `project_thread`
--

CREATE TABLE IF NOT EXISTS `project_thread` (
  `ProjectId` varchar(255) NOT NULL,
  `ThreadId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `Id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Summary` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `Id` int(11) NOT NULL,
  `ProjectId` varchar(255) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `Id` int(11) NOT NULL,
  `ProjectId` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL COMMENT 'Proposed/Implemented'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `ThreadId` int(11) NOT NULL,
  `Label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL,
  `College` text NOT NULL,
  `Branch` text NOT NULL,
  `Name` text NOT NULL,
  `Pass` text NOT NULL,
  `Email` text NOT NULL,
  `Phoneno` bigint(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `College`, `Branch`, `Name`, `Pass`, `Email`, `Phoneno`) VALUES
(1, 'VIT Vellore', 'CSE 3rd Year', 'Harish Kandala', '$2y$10$IU1VAAMnUKQ0zicYNmw00uqJknyGNHuT/4W4nehnkBeJwiFXldgYG', 'kandalaharish95@gmail.com', 9790995811);

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE IF NOT EXISTS `user_project` (
  `UserId` int(11) NOT NULL,
  `ProjectId` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`UserId`, `ProjectId`, `Status`) VALUES
(1, 'jkt2dse39te3euv9t3jaivm054', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_thread`
--

CREATE TABLE IF NOT EXISTS `user_thread` (
  `UserId` int(11) NOT NULL,
  `ThreadId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `challenge_issue`
--
ALTER TABLE `challenge_issue`
  ADD PRIMARY KEY (`Id`), ADD KEY `IssueId` (`IssueId`), ADD KEY `ChallengeId` (`ChallengeId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`), ADD KEY `PostId` (`PostId`), ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`), ADD KEY `UserId` (`UserId`), ADD KEY `ProjectId` (`ProjectId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ProjectId`), ADD KEY `ChallengeId` (`ChallengeId`);

--
-- Indexes for table `project_thread`
--
ALTER TABLE `project_thread`
  ADD PRIMARY KEY (`ThreadId`,`ProjectId`), ADD KEY `ProjectId` (`ProjectId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`Id`), ADD KEY `ProjectId` (`ProjectId`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`Id`), ADD KEY `ProjectId` (`ProjectId`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`ThreadId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`UserId`,`ProjectId`), ADD KEY `Constr_UserProject_ProjectId_fk` (`ProjectId`);

--
-- Indexes for table `user_thread`
--
ALTER TABLE `user_thread`
  ADD PRIMARY KEY (`UserId`,`ThreadId`), ADD KEY `ThreadId` (`ThreadId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `challenge_issue`
--
ALTER TABLE `challenge_issue`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `ThreadId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
