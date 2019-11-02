-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 03:01 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_falcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ceec725bf1f3ef955d21287d561af5190044d7a2', '127.0.0.1', 1530105663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303130353636333b5f5f63695f766172737c613a313a7b733a383a226d73675f6e6f7469223b733a333a226f6c64223b7d6d73675f6e6f74697c733a35303a22506c6561736520636865636b20796f757220656d61696c20746f2070726f636565642072657365742070617373776f72642e223b),
('8b6b50750570cfb2ebb4cb3d6e28964080478c6e', '127.0.0.1', 1530109025, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303130393032353b6d73675f6572726f727c733a303a22223b5f5f63695f766172737c613a313a7b733a393a226d73675f6572726f72223b733a333a226e6577223b7d),
('be21ccbc3df64202fafb7201f8b211cf46cd0b06', '127.0.0.1', 1530109577, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303130393537373b),
('1a1849f78af1c1701851fd504b665f2010fefe39', '127.0.0.1', 1530109886, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303130393838363b),
('57b06ab5b3fa6b97eb6e14b50ac89e627904321f', '127.0.0.1', 1530110200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303131303230303b6d73675f6572726f727c733a303a22223b5f5f63695f766172737c613a313a7b733a393a226d73675f6572726f72223b733a333a226e6577223b7d),
('bccc434fced4dfe8b7fb86a1d13436cdda41c0cc', '127.0.0.1', 1530110604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303131303630343b6d73675f6572726f727c733a303a22223b5f5f63695f766172737c613a313a7b733a393a226d73675f6572726f72223b733a333a226f6c64223b7d),
('a2a31cbe9efb638ee8adbdc25791a5db6da9dca5', '127.0.0.1', 1530110983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303131303938333b6c6f676765645f696e7c613a353a7b733a373a22757365725f6964223b733a313a2234223b733a383a22757365725f6c766c223b733a313a2231223b733a383a22757365726e616d65223b733a31313a226a6169726f6e6c616e6461223b733a353a22656d61696c223b733a32313a226a6169726f6e6c616e646140676d61696c2e636f6d223b733a31323a226c6f67696e5f737461747573223b623a313b7d6d73675f6e6f74697c733a31333a2257656c636f6d65206261636b2e223b5f5f63695f766172737c613a313a7b733a383a226d73675f6e6f7469223b733a333a226f6c64223b7d),
('8fccbc2c18c32515c250aa47de357c0f1d23129f', '127.0.0.1', 1530111308, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303131313330383b6d73675f6e6f74697c733a31383a225375636365737366756c79204c6f676f7574223b5f5f63695f766172737c613a313a7b733a383a226d73675f6e6f7469223b733a333a226f6c64223b7d),
('8202c06e5d5e50f8fe7b8e0efc3881fc53e3e17e', '127.0.0.1', 1530111804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303131313830343b6d73675f6572726f727c733a303a22223b5f5f63695f766172737c613a313a7b733a393a226d73675f6572726f72223b733a333a226f6c64223b7d),
('15b8fa14801be35d4a33ed4ddda27e7827e43416', '127.0.0.1', 1530112112, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303131323131323b6c6f676765645f696e7c613a353a7b733a373a22757365725f6964223b733a313a2234223b733a383a22757365725f6c766c223b733a313a2231223b733a383a22757365726e616d65223b733a31313a226a6169726f6e6c616e6461223b733a353a22656d61696c223b733a32313a226a6169726f6e6c616e646140676d61696c2e636f6d223b733a31323a226c6f67696e5f737461747573223b623a313b7d6d73675f6572726f727c733a33373a2250617373776f7264206e6f74206d617463682c20706c656173652074727920616761696e2e223b5f5f63695f766172737c613a313a7b733a393a226d73675f6572726f72223b733a333a226f6c64223b7d),
('3df6fc5cf5e21a768ddf2ca5d415e84010fb032c', '127.0.0.1', 1530112164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303131323131323b6d73675f6e6f74697c733a31383a225375636365737366756c79204c6f676f7574223b5f5f63695f766172737c613a313a7b733a383a226d73675f6e6f7469223b733a333a226f6c64223b7d),
('03e893f82ed671f0c1dab1ef3e2db44a9b13bce6', '127.0.0.1', 1530154268, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303135343231383b6d73675f6e6f74697c733a31383a225375636365737366756c79204c6f676f7574223b5f5f63695f766172737c613a313a7b733a383a226d73675f6e6f7469223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE IF NOT EXISTS `log_login` (
  `log_login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `os_type` varchar(355) NOT NULL,
  `browser_detail` varchar(355) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`log_login_id`, `user_id`, `os_type`, `browser_detail`, `ip_address`, `log_datetime`) VALUES
(1, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(2, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(3, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(4, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(5, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(6, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(7, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(8, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(9, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(10, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(11, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(12, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(13, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(14, 4, 'Linux', 'Chrome 67.0.3396.87', '127.0.0.1', '0000-00-00 00:00:00'),
(15, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(16, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(17, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(18, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(19, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '0000-00-00 00:00:00'),
(20, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-27 14:43:51'),
(21, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-27 14:44:40'),
(22, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-27 14:48:03'),
(23, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-27 14:53:56'),
(24, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-27 15:06:11'),
(25, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-27 15:08:03'),
(26, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-27 15:09:20'),
(27, 4, 'Linux', 'Firefox 60.0', '127.0.0.1', '2018-06-28 02:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `token_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_type_id` int(11) NOT NULL,
  `token_code` varchar(255) NOT NULL,
  `is_active_id` int(11) NOT NULL DEFAULT '1',
  `datetime_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`token_id`, `user_id`, `token_type_id`, `token_code`, `is_active_id`, `datetime_created`) VALUES
(1, 4, 1, 'c5667d005b8c683c188ce542ba7864', 2, '2018-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `token_type`
--

CREATE TABLE IF NOT EXISTS `token_type` (
  `token_type_id` int(11) NOT NULL,
  `token_tyoe_name` varchar(255) NOT NULL,
  `datetime_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_type`
--

INSERT INTO `token_type` (`token_type_id`, `token_tyoe_name`, `datetime_created`) VALUES
(1, 'Reset password', '2018-06-27 01:02:01'),
(2, 'more token type', '2018-06-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_lvl` int(2) NOT NULL DEFAULT '1',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_verify` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pswd` varchar(355) NOT NULL,
  `reg_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='user_lvl = 1 (user) 2 (high level user)';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_lvl`, `is_active`, `is_verify`, `username`, `email`, `pswd`, `reg_datetime`) VALUES
(4, 1, 1, 1, 'jaironlanda', 'jaironlanda@gmail.com', '$2y$10$fvFKmqm8CcG1m8wh8P08u.JgUbDzkCAh8BEvI30mDYzG8w6nL5QE2', '2018-06-13 03:32:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`log_login_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `token_type`
--
ALTER TABLE `token_type`
  ADD PRIMARY KEY (`token_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `log_login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `token_type`
--
ALTER TABLE `token_type`
  MODIFY `token_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
