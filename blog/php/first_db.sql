-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2016 at 05:53 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `time` text NOT NULL,
  `team` text NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `github` text NOT NULL,
  `demo` text NOT NULL,
  `public` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `role`, `time`, `team`, `location`, `description`, `image`, `url`, `github`, `demo`, `public`) VALUES
(2, 'Software Developer Co-Op', 'Aug. 2015 – Dec. 2015, May 2016 – August 2016', 'ANSYS, Inc.', 'Canonsburg, PA', '<ul><li>Work with senior software engineers on developing ANSYS AIM® using Web and .NET technologies, such as JQuery, KnockoutJS and C#</li> <li>Redesign and construct the service and UI lawyer for AIM® in WPF.</li> <li>Develop multiple tools for other teams to improve efficiency, including a UI tool designed for the “Help” Team to visually manage XML files and a dashboard for managing defects and user stories.</li> </ul>', '', 'www.ansys.com', '', '', 1),
(7, 'Research Assistant', 'Since February 2015', 'Mobile Interfaces and Pedagogical Systems Group', 'CS Department, Pitt', '<ul><li>Develop CourseMirror, an iOS App intended to enhance interactions between instructors and students.</li> <li>Develop Attentive Learner, an iOS app based on Open Edx that monitoring the user’s heart rates while playing the course video.</li> <li>Analyze data and summarize the results with professor and two PhD coworkers in the group</li> </ul>', '', 'http://mips.lrdc.pitt.edu/', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `msg`) VALUES
(1, '$name', '$email', '$msg'),
(3, 'FDA', 'LALALA', 'AF'),
(4, 'ADF', 'LALALA', 'DFA'),
(5, 'afdfa', 'fadfaf', 'fdafdafa'),
(6, 'tong', 'haha@pitt.edu', ''),
(7, '', '', ''),
(8, '', '', 'df'),
(9, 'dfa', 'dfa', 'fdafa'),
(10, 'df', 'fd', 'sfa'),
(11, 'dfa', 'fadf@PITT.EDU', 's');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `subtitle` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `github` text NOT NULL,
  `appstore` text NOT NULL,
  `playstore` text,
  `demo` text NOT NULL,
  `description` text NOT NULL,
  `public` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `subtitle`, `image`, `url`, `github`, `appstore`, `playstore`, `demo`, `description`, `public`) VALUES
(3, 'CourseMirror', 'an iOS app for learning rereash', 'images/coursemirror.jpg', 'http://www.coursemirror.com', 'https://github.com/gztong/CourseMirror_iOS', 'https://itunes.apple.com/us/app/coursemirror-from-mips-research/id1039044798?mt=8', 'https://play.google.com/store/apps/details?id=edu.pitt.cs.mips.coursemirror', '', 'description": "<p>CourseMirror is a learning research project developed by <a href=\\"http://mips.lrdc.pitt.edu/\\">MIPS lab</a> at our Computer Science Department. I joined the team at 2015 and focused on developing CourseMirror in iOS platform. It''s used to collect the feedback from students after each lecture and provide the instructors with a summrized feedback to help them improve the class quality. The project is wriiten in Objective-C and the database is on <a href=\\"https://parse.com/\\">Parse</a>. This is my first iOS app and it''s available to download on the App store now, thanks to the help from Prof. Jingtao Wang and Xiangmin Fan.</p>', 0),
(4, 'Rally Dashboard', 'a Web app for managing defects and user stories', 'images/defectDashboard.png', 'http://www.coursemirror.com', 'https://github.com/gztong/Defect_Dashboard', '', '', '', '<p> This single page application uses  <a href=\\"https://help.rallydev.com/access-web-services-api-wsapi\\">Rally (now CA Agile) </a> Web Service API to retrive the defect and user stories data and displays them in a friendly way. It will track the most recently modified defects each day so as to bring the developers'' attention. It also groups the defects by different criterions, such as owner, priority etc.At first, this dashboard is developed at ANSYS for internal usage. With the powerful binding provided by <a href=\\"https://angularjs.org/\\">angularJS</a>, the filter and group functions are instant, and the data are up-to-date with the rally server.</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `display_name`) VALUES
(1, 'gangzheng', 'gangzheng', 'Gangzheng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
