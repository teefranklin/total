-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 10:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `user_id` varchar(7) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`user_id`, `street`, `city`, `province`, `country`, `zip`) VALUES
('C115665', '15387 Unit O', 'Chitungwiza', 'mashonaland hameno', 'Zimbabwe', '00263'),
('C152347', '15387 unit o', 'chitungwiza', 'mashonaland hameno', 'Zimbabwe', '00263');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(40, 5, 7, 'hey bro this is a new slate', '2019-03-28 03:40:43', 0),
(41, 7, 5, 'yeah fam am happy', '2019-03-28 03:41:00', 0),
(42, 5, 7, 'u dig \n', '2019-03-28 03:41:16', 0),
(43, 1, 5, 'wassa', '2019-03-28 06:43:30', 0),
(44, 1, 5, 'teyeyeyeyeyey', '2019-03-28 07:24:21', 0),
(45, 5, 1, 'this is rubbish', '2019-03-28 07:25:06', 0),
(46, 1, 5, 'fat one go down', '2019-03-28 07:25:36', 0),
(47, 2, 7, 'ðŸ˜£ðŸ˜–ðŸ˜«ðŸ˜©ðŸ˜œðŸ˜”ðŸ˜ŸðŸ˜©ðŸ˜«ðŸ˜–ðŸ˜£ðŸ™ðŸ˜•ðŸ¤¨ðŸ¤¬ðŸ˜¡ðŸ˜²ðŸ˜µðŸ¤¯ðŸ˜³ðŸ˜¨ðŸ˜°ðŸ¤”ðŸ˜´ðŸ˜­ðŸ˜¥', '2019-04-02 06:45:23', 1),
(48, 1, 7, 'sei sei ðŸ¤¬\n', '2019-04-02 06:49:29', 1),
(49, 1, 7, 'sei seiðŸ˜³\n', '2019-04-02 06:49:54', 1),
(50, 1, 7, 'ðŸ˜', '2019-04-02 06:53:08', 1),
(51, 7, 5, 'wassa ðŸ™‚', '2019-04-02 07:05:52', 0),
(52, 7, 9, 'ðŸ˜mfana wa tino wadii\n\n', '2019-04-02 07:53:52', 0),
(53, 0, 5, 'hey guys this is test message number 1\n', '2019-04-02 08:18:40', 1),
(54, 0, 7, 'WOW IT WORKED ON FIRST TRY ......U MUST BE A WIZARD', '2019-04-02 08:19:08', 1),
(55, 0, 7, 'BUT U HAVE TO INCLUDE EMOJIES ON GROUP CHAT THO\n', '2019-04-02 08:19:34', 1),
(56, 0, 5, 'catch me in 10 minutes that will be done don worry .....', '2019-04-02 08:20:25', 1),
(57, 0, 5, 'now i included emojies ðŸ˜†ðŸ˜†ðŸ˜†ðŸ˜†ðŸ˜†ðŸ˜†', '2019-04-02 08:27:41', 1),
(58, 0, 5, 'this is not clearing the textfield lemme fix datðŸ˜†', '2019-04-02 08:28:53', 1),
(59, 0, 5, 'ðŸ˜œi hope its fixed', '2019-04-02 08:30:06', 1),
(60, 0, 5, 'failed to fix it ......u might need to do that on your own ðŸ˜ŒðŸ˜†ðŸ˜œðŸ˜ŒðŸ˜†ðŸ˜œðŸ˜ŒðŸ˜†ðŸ˜œ', '2019-04-02 08:32:48', 1),
(61, 0, 5, 'failed to fix it ......u might need to do that on your own ðŸ˜ŒðŸ˜†ðŸ˜œðŸ˜ŒðŸ˜†ðŸ˜œðŸ˜ŒðŸ˜†ðŸ˜œ', '2019-04-02 08:32:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `user_id` varchar(7) NOT NULL,
  `phones` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`user_id`, `phones`, `email`) VALUES
('C115665', '0717618238', 'ethanmwariwa@gmail.com'),
('C152347', '0717618238', 'ndaipa85@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `user_id` varchar(7) NOT NULL,
  `languages` varchar(500) NOT NULL,
  `applications` varchar(500) NOT NULL,
  `certificates` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`user_id`, `languages`, `applications`, `certificates`) VALUES
('C115665', 'shona, english', 'games', 'grade 7'),
('C152347', 'shona, english, java, php, html, css, dart, flutter, javascript', 'C-One, Vs Code, Photoshop, Kodak Capture Pro, IntelliJ', 'Bachelors of Science and Honours Degree In Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `job_information`
--

CREATE TABLE `job_information` (
  `user_id` varchar(7) NOT NULL,
  `department` varchar(100) NOT NULL,
  `job_description` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_information`
--

INSERT INTO `job_information` (`user_id`, `department`, `job_description`, `position`) VALUES
('C115665', 'Business Development', '', 'country manager'),
('C152347', 'Technical', '', 'Support Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(7) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `status`, `role`) VALUES
('C115665', 'ethan_mwariwa', '$2y$10$zJgZRu2LOgA0Gazj3BO4h.PxojYceuX4AZU7U5C8F.066r5AFQH7e', 'active', 'participant'),
('C152347', 'Tinotenda_Ndaipa', '$2y$10$Xjd6u5fe/FhQTtrv.1MoxODKncBxrtG4v41SQn5kJNDHq.isEbCBW', 'active', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(16, 1, '2019-03-27 17:46:07', 'no'),
(17, 2, '2019-03-27 22:05:43', 'no'),
(18, 1, '2019-03-27 17:53:22', 'no'),
(19, 3, '2019-03-27 17:50:08', 'no'),
(20, 3, '2019-03-27 17:59:59', 'no'),
(21, 1, '2019-03-29 03:31:50', 'no'),
(22, 3, '2019-03-27 23:47:16', 'no'),
(23, 4, '2019-03-27 23:16:44', 'no'),
(24, 3, '2019-03-27 21:44:22', 'no'),
(25, 5, '2019-03-27 23:39:37', 'no'),
(26, 6, '2019-03-27 23:46:42', 'no'),
(27, 5, '2019-03-28 09:05:42', 'no'),
(28, 7, '2019-03-28 04:51:10', 'no'),
(29, 1, '2019-03-28 16:05:57', 'no'),
(30, 1, '2019-03-28 10:04:34', 'no'),
(31, 8, '2019-03-28 08:07:56', 'no'),
(32, 6, '2019-03-28 07:31:20', 'yes'),
(33, 6, '2019-03-28 07:39:46', 'no'),
(34, 5, '2019-03-28 09:33:37', 'no'),
(35, 7, '2019-04-02 08:43:39', 'no'),
(36, 5, '2019-04-02 08:43:53', 'no'),
(37, 3, '2019-04-02 07:51:58', 'no'),
(38, 3, '2019-04-02 07:52:21', 'no'),
(39, 9, '2019-04-02 07:54:15', 'no'),
(40, 10, '2019-04-19 19:07:06', 'no'),
(41, 10, '2019-04-19 19:21:46', 'no'),
(42, 10, '2019-04-19 19:22:40', 'no'),
(43, 10, '2019-04-19 19:25:18', 'no'),
(44, 0, '2019-04-20 00:41:22', 'no'),
(45, 0, '2019-04-20 00:43:34', 'no'),
(46, 0, '2019-04-20 00:44:15', 'no'),
(47, 0, '2019-04-20 00:45:40', 'no'),
(48, 0, '2019-04-20 00:46:08', 'no'),
(49, 0, '2019-04-20 00:48:05', 'no'),
(50, 0, '2019-04-20 00:49:07', 'no'),
(51, 0, '2019-04-20 00:49:54', 'no'),
(52, 0, '2019-04-20 00:50:48', 'no'),
(53, 0, '2019-04-20 00:56:22', 'no'),
(54, 0, '2019-04-20 01:06:59', 'no'),
(55, 0, '2019-04-20 01:07:38', 'no'),
(56, 0, '2019-04-20 01:09:21', 'no'),
(57, 0, '2019-04-20 01:12:39', 'no'),
(58, 0, '2019-04-20 01:15:27', 'no'),
(59, 0, '2019-04-20 01:16:23', 'no'),
(60, 0, '2019-04-20 01:18:31', 'no'),
(61, 0, '2019-04-20 01:22:47', 'no'),
(62, 0, '2019-04-20 01:29:17', 'no'),
(63, 0, '2019-04-20 01:34:07', 'no'),
(64, 0, '2019-04-20 14:51:05', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `user_id` varchar(7) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`user_id`, `firstname`, `middlename`, `lastname`, `nationality`, `gender`, `dob`, `marital_status`, `avatar`) VALUES
('C115665', 'Ethan', 'Tanya', 'Mwariwa', 'Zimbabwean', 'Male', '2001-02-28', 'Single', 'jeff.png'),
('C152347', 'Tinotenda', 'Denzel', 'Ndaipa', 'Zimbabwean', 'Male', '1996-08-25', 'Single', 'avatar1_small.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `job_information`
--
ALTER TABLE `job_information`
  ADD PRIMARY KEY (`user_id`,`department`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
