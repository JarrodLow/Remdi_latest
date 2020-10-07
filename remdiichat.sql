-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 09:41 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remdiichat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(52, 53, 52, 'hi\n', '2020-07-22 05:38:49', 0),
(53, 52, 53, 'hi\n', '2020-07-22 05:39:07', 0),
(54, 53, 52, '123', '2020-07-24 10:29:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `text`) VALUES
(1, 'image-analysis.png', 'u'),
(2, 'image-analysis.png', 'asd'),
(3, 'image-analysis.png', 'asd'),
(4, 'image-analysis.png', 'asd'),
(5, '2019.03.01-08.13-boundingintocomics-5c7992563a38c.png', 'test'),
(6, '1594558992-2019.03.01-08.13-boundingintocomics-5c7992563a38c.png', '465'),
(7, '1594559104-2019.03.01-08.13-boundingintocomics-5c7992563a38c.png', '465'),
(8, '1594559106-2019.03.01-08.13-boundingintocomics-5c7992563a38c.png', '465'),
(9, '1594562140-image-analysis.png', '413431');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('user','admin') NOT NULL,
  `profile_image` text NOT NULL,
  `verified` varchar(10) NOT NULL DEFAULT 'false',
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `email`, `password`, `user_type`, `profile_image`, `verified`, `otp`) VALUES
(52, 'jarrod', 'lowjar20@gmail.com', '$2y$10$1LdseJ8bhTpFeE2B3gI94O8FompIzlel6aFoR95o/iyzBXUa45pNa', 'user', 'computer-icons-user-profile-male-png-favpng-ZmC9dDrp9x27KFnnge0jKWKBs.jpg', 'true', 169015),
(54, '123', 'lowjar22@gmail.com', '$2y$10$VWBoa48RXnhHVtzlA72vCe7Vcr61wJESkbjW5cCHpQTjeMDlNi9SK', 'user', '2019.03.01-08.13-boundingintocomics-5c7992563a38c.png', 'true', 808717),
(55, 'admin', 'jarrodlwh-wm17@student.tarc.edu.my', '$2y$10$kapzYNMXAMak7VMDp0z8yuXKbVxLNpfzIsMyhL/cVLCiHj6wd1AwS', 'admin', '108005769_914807435654341_3578681756871105617_n.jpg', 'true', 183403);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(75, 52, '2020-07-22 05:56:43', 'no'),
(76, 53, '2020-07-22 05:56:44', 'no'),
(77, 52, '2020-07-24 10:05:03', 'no'),
(78, 52, '2020-07-24 10:07:12', 'no'),
(79, 52, '2020-07-24 10:10:58', 'no'),
(80, 52, '2020-07-24 10:19:12', 'no'),
(81, 52, '2020-07-24 10:28:52', 'no'),
(82, 52, '2020-07-24 10:29:04', 'no'),
(83, 52, '2020-07-24 10:36:25', 'no'),
(84, 52, '2020-07-24 10:37:34', 'no'),
(85, 52, '2020-07-24 10:38:24', 'no'),
(86, 52, '2020-07-24 10:39:15', 'no'),
(87, 52, '2020-07-24 10:39:33', 'no'),
(88, 52, '2020-07-24 10:42:09', 'no'),
(89, 52, '2020-07-24 22:26:06', 'no'),
(90, 52, '2020-07-24 22:27:45', 'no'),
(91, 52, '2020-07-26 17:46:01', 'no'),
(92, 52, '2020-07-26 17:57:07', 'no'),
(93, 53, '2020-07-26 19:37:18', 'no'),
(94, 54, '2020-07-26 19:39:10', 'no'),
(95, 55, '2020-07-26 19:38:04', 'no'),
(96, 55, '2020-07-26 19:39:16', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `questionnaire_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question1` varchar(200) NOT NULL,
  `question2` int(11) NOT NULL,
  `question3` enum('Male','Female') NOT NULL,
  `question4` varchar(500) NOT NULL,
  `question5` enum('Yes','No') NOT NULL,
  `question6` varchar(500) NOT NULL,
  `question7` varchar(500) NOT NULL,
  `question8` varchar(500) NOT NULL,
  `question9` enum('Yes','No') NOT NULL,
  `question10` enum('Yes','No') NOT NULL,
  `question11` enum('Yes','No') NOT NULL,
  `question12` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`questionnaire_id`, `user_id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `question11`, `question12`) VALUES
(13, 52, 'test', 21, 'Male', 'eczema', 'Yes', 'red spot', 'none', 'none', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_condition`
--

CREATE TABLE `user_condition` (
  `condition_id` int(11) NOT NULL,
  `questionnaire_id` int(11) DEFAULT NULL,
  `condition_image` text NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_condition`
--

INSERT INTO `user_condition` (`condition_id`, `questionnaire_id`, `condition_image`, `upload_time`, `type`) VALUES
(15, 0, 'computer-icons-user-profile-male-png-favpng-ZmC9dDrp9x27KFnnge0jKWKBs.jpg', '2020-07-22 05:39:55', ''),
(17, 13, '', '2020-07-26 17:57:16', 'LeftHand'),
(18, 13, 'man.png', '2020-07-26 17:57:20', 'LeftHand'),
(19, 13, '2019.03.01-08.13-boundingintocomics-5c7992563a38c.png', '2020-07-26 18:02:59', 'RightHand'),
(21, 13, 'image-analysis.png', '2020-07-26 18:03:28', 'Body'),
(22, 13, 'girl.png', '2020-07-26 18:03:37', 'LeftLeg'),
(23, 13, 'unknown.png', '2020-07-26 18:03:47', 'RightLeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`questionnaire_id`);

--
-- Indexes for table `user_condition`
--
ALTER TABLE `user_condition`
  ADD PRIMARY KEY (`condition_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `questionnaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_condition`
--
ALTER TABLE `user_condition`
  MODIFY `condition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
