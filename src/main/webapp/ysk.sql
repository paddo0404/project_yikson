-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 12:03 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ysk`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `userid`, `postid`, `type`, `timestamp`) VALUES
(1, 5, 21, 0, '2016-09-06 08:24:01'),
(2, 5, 19, 1, '2016-09-06 08:24:01'),
(3, 6, 21, 1, '2016-09-06 08:26:02'),
(4, 7, 19, 1, '2016-09-06 08:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `usr_pwd` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `forgot_password_key` varchar(255) NOT NULL,
  `utype` enum('Super Admin','Admin') NOT NULL DEFAULT 'Super Admin',
  `status` enum('Active','Inactive') NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user_id`, `user_name`, `usr_pwd`, `first_name`, `last_name`, `email`, `forgot_password_key`, `utype`, `status`, `createdon`) VALUES
(1, 'admin', 'WVdSdGFXND0=', 'Sridhar', 'Patel', 'vijayalakshmivulli@gmail.com', '', 'Super Admin', 'Active', '2016-07-29 05:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banners`
--

CREATE TABLE `tb_banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`cid`, `cname`, `status`, `createdon`) VALUES
(1, 'Funny', 'Active', '2016-07-31 03:59:41'),
(2, 'Food', 'Active', '2016-07-31 03:59:49'),
(3, 'Travel', 'Active', '2016-07-31 03:59:55'),
(4, 'Tech', 'Active', '2016-07-31 04:00:01'),
(5, 'TV & Movies', 'Active', '2016-07-31 04:00:08'),
(6, 'Geeky', 'Active', '2016-07-31 04:00:37'),
(7, 'Nature', 'Active', '2016-07-31 04:00:45'),
(8, 'Music', 'Active', '2016-07-31 04:00:55'),
(9, 'Cars', 'Active', '2016-07-31 04:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_friend_followings`
--

CREATE TABLE `tb_friend_followings` (
  `id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `requested_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_friend_followings`
--

INSERT INTO `tb_friend_followings` (`id`, `friend_id`, `user_id`, `status`, `requested_on`) VALUES
(1, 2, 1, 'Active', '2016-08-17 16:21:28'),
(2, 2, 5, 'Active', '2016-08-20 05:50:26'),
(3, 2, 6, 'Active', '2016-08-20 11:50:57'),
(4, 6, 5, 'Active', '2016-08-22 05:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_friend_requests`
--

CREATE TABLE `tb_friend_requests` (
  `id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Requested','Accepted','Declined') NOT NULL,
  `requested_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_friend_requests`
--

INSERT INTO `tb_friend_requests` (`id`, `friend_id`, `user_id`, `status`, `requested_on`, `accepted_on`) VALUES
(1, 2, 1, 'Requested', '2016-08-17 16:20:29', '0000-00-00 00:00:00'),
(2, 2, 5, 'Requested', '2016-08-20 05:50:22', '0000-00-00 00:00:00'),
(3, 2, 5, 'Requested', '2016-08-20 11:00:22', '0000-00-00 00:00:00'),
(4, 2, 6, 'Requested', '2016-08-20 11:51:05', '0000-00-00 00:00:00'),
(5, 5, 7, 'Requested', '2016-08-27 06:25:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_members`
--

CREATE TABLE `tb_members` (
  `mid` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `date_of_birth` varchar(15) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `member_photo` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_members`
--

INSERT INTO `tb_members` (`mid`, `full_name`, `email_id`, `date_of_birth`, `user_pwd`, `gender`, `member_photo`, `status`, `createdon`) VALUES
(1, 'Vijaya Lakshmi', 'vijayalakshmivulli@gmail.com', '06/04/1984', 'Y21GcVpYTm8=', 'Female', '', 'Active', '2016-08-17 06:44:27'),
(2, 'Rajesh', 'vrkumar60@gmail.com', '11/19/1975', 'Y21GcVpYTm8=', 'Male', '', 'Active', '2016-08-17 09:40:12'),
(3, 'Lakshmi', 'vijayalakshmivulli03@gmail.com', '10/25/1988', 'ZG1scVlYbGg=', 'Female', '', 'Active', '2016-08-17 09:42:21'),
(5, 'laxman', 'laxman.sholay@gmail.com', '08/23/1987', 'TVRJek5EVTI=', 'Male', '', 'Active', '2016-08-20 04:42:34'),
(6, 'Hari', 'ehvenga@gmail.com', '03/11/1995', 'VVZkRlVsUlo=', 'Male', '', 'Active', '2016-08-20 11:47:48'),
(7, 'mitukula', 'venkateshmitukula@gmail.com', '08/24/2016', 'TVRJek5EVTI=', 'Male', '', 'Active', '2016-08-27 06:14:29'),
(8, 'tryhrtg', 'rajyalakshmi_k@caramelit.com', '09/26/2016', 'YzJGcFFERXpOamsz', 'Female', '', 'Active', '2016-09-06 09:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `post_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `file_size` decimal(10,2) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post_type` enum('General','Image','Video','Article') NOT NULL DEFAULT 'General',
  `post_view` int(11) NOT NULL,
  `post_likes` int(11) NOT NULL,
  `post_unlikes` int(11) NOT NULL,
  `post_comments` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`post_id`, `message`, `file_name`, `extension`, `posted_by`, `file_size`, `categories`, `title`, `post_type`, `post_view`, `post_likes`, `post_unlikes`, `post_comments`, `status`, `posted_on`) VALUES
(1, 'this is sample message', 'f306d6edb74a65430315eb77a0d06a49.jpg', 'jpg', 1, '11.22', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-17 12:53:00'),
(2, 'this is sample', 'e4e4e25ac3ac422fae034ff60f92bfb4.jpg', 'jpg', 1, '51.90', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-17 12:53:24'),
(5, 'Happy Rakshabhandhan', '2670518f25459f18ee0163e9c9d02cb5.jpg', 'jpg', 1, '55.33', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-18 15:06:32'),
(6, 'This is sample test message', '2f7ed6ffea46ed0a5a5874e3a3acb26f.jpg', 'jpg', 1, '14.37', '', 'Sample test', 'Image', 0, 0, 0, 0, 'Active', '2016-08-18 16:13:26'),
(7, 'This is another test message', '7a43c842503fe1536a4ee234c6df9245.gif', 'gif', 1, '1395.80', '', 'new message', 'Image', 0, 0, 0, 0, 'Active', '2016-08-18 16:13:51'),
(8, 'Republican takes new tone in North Carolina after campaign team shake-up, while supporter’s photography of each journalist sparks complaints', 'c13f6427b8a75246c354096943e1070b.jpg', 'jpg', 5, '762.53', '', 'Donald Trump tries out a new campaign tactic: saying sorry', 'Image', 0, 0, 0, 0, 'Active', '2016-08-20 04:49:00'),
(9, 'hello world', '0067839187074d3e57d635b85c3fcf39.jpg', 'jpg', 5, '96.67', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-20 05:01:00'),
(10, 'hello world', '2a4e06ffa55b31c1636aeedc47e6b0f4.jpg', 'jpg', 5, '128.60', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-20 10:57:01'),
(11, 'qwerty y', 'addda9b1dc2a2a48b30ae86c38c2f70d.jpg', 'jpg', 6, '31.72', '', 'Text', 'Image', 0, 0, 0, 0, 'Active', '2016-08-20 11:50:09'),
(12, '', '1ed6d5042ec6ebad0b611730ade727f6.jpg', 'jpg', 5, '45.45', '', 'demo', 'Image', 0, 0, 0, 0, 'Active', '2016-08-22 07:15:29'),
(13, 'bike', 'ca0ccab9bfe62e06901766bfcfe9bde8.jpg', 'jpg', 7, '102.25', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-27 06:23:31'),
(14, 'Video', 'Noonoogu_Meesalodu.mp4\r\n', 'avi', 1, '200.00', '', '', 'Video', 0, 0, 0, 0, 'Active', '2016-08-30 10:13:14'),
(15, 'Video', 'Noonoogu_Meesalodu.mp4\r\n', 'avi', 1, '200.00', '', '', 'Video', 0, 0, 0, 0, 'Active', '2016-08-30 10:13:14'),
(16, '', 'aa0a94ccb7c957135619aefcb107e055.jpg', 'jpg', 5, '103.88', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-30 11:09:50'),
(17, 'This is another test message', '120430.gif', 'gif', 1, '1395.80', '', 'new message', 'Image', 0, 0, 0, 0, 'Active', '2016-08-18 16:13:51'),
(18, '', '589a24d338511d63786bd69783581fbd.gif', 'gif', 5, '10528.56', '', '', 'Image', 0, 0, 0, 0, 'Active', '2016-08-31 08:07:20'),
(19, '', 'c4465928d35c40d5ac1d9d84a6c33149.gif', 'gif', 5, '10528.56', '', '', 'Video', 0, 0, 0, 0, 'Active', '2016-08-31 08:36:26'),
(21, '', '5d3add1643594e2605d894960dfd3150.gif', 'gif', 5, '663.55', '', '', 'Video', 0, 0, 0, 0, 'Active', '2016-08-31 10:16:16'),
(28, '', '212612.mp4', 'mp4', 5, '71084153.00', '', '', 'Video', 0, 0, 0, 0, 'Active', '2016-09-07 05:29:21'),
(29, '', '331413.mp4', 'mp4', 5, '71084153.00', '', '', 'Video', 0, 0, 0, 0, 'Active', '2016-09-07 06:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sitesettings`
--

CREATE TABLE `tb_sitesettings` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `received_email` varchar(255) NOT NULL,
  `footer_txt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sitesettings`
--

INSERT INTO `tb_sitesettings` (`id`, `c_name`, `title`, `received_email`, `footer_txt`) VALUES
(1, 'Yikson Management', 'Yikson Admin Panel', 'vijayalakshmivulli@gmail.com', 'Welcome to Yikson');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_banners`
--
ALTER TABLE `tb_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tb_friend_followings`
--
ALTER TABLE `tb_friend_followings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_friend_requests`
--
ALTER TABLE `tb_friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tb_sitesettings`
--
ALTER TABLE `tb_sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_banners`
--
ALTER TABLE `tb_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_friend_followings`
--
ALTER TABLE `tb_friend_followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_friend_requests`
--
ALTER TABLE `tb_friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tb_sitesettings`
--
ALTER TABLE `tb_sitesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
