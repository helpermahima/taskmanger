-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 11:04 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `username`, `password`, `last_login`, `created`) VALUES
(11, 'admin@admin.com', 'Admin', 'admin', '13b4405d3b054032be48b40dbf315059', '2022-05-09 06:55:09', 1449461291);

-- --------------------------------------------------------

--
-- Table structure for table `site_profile`
--

CREATE TABLE `site_profile` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `company_detail` longtext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL,
  `digg` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `map_address` varchar(255) NOT NULL,
  `last_access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_profile`
--

INSERT INTO `site_profile` (`id`, `company_name`, `address1`, `address2`, `company_detail`, `phone`, `phone1`, `email`, `fax`, `facebook`, `googleplus`, `linkedin`, `twitter`, `pinterest`, `digg`, `youtube`, `skype`, `instagram`, `lat`, `lang`, `map_address`, `last_access`) VALUES
(1, 'Taskmanager', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '', '', '', '', '', 'Irricana, AB T0M 1B0, Canada', '1499059661');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `offline` int(11) NOT NULL,
  `offline_message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `seotitle` varchar(255) NOT NULL,
  `seokeyword` longtext NOT NULL,
  `seodescription` longtext NOT NULL,
  `last_access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_title`, `site_email`, `offline`, `offline_message`, `image`, `seotitle`, `seokeyword`, `seodescription`, `last_access`) VALUES
(1, 'Taskmanager', '', 0, 'Now we are offline , thankx for visiting us', 'logo.png', 'Taskmanager', 'Taskmanager', 'Taskmanager', '1499059641');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `str_date` varchar(10) DEFAULT NULL,
  `deadline` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '"0" => incomplete, "1"=> complete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `user_id`, `title`, `description`, `created`, `priority`, `str_date`, `deadline`, `file`, `status`) VALUES
(13, 5, 'Mahima', 'das', '1651929055', 1, '07/05/2022', '2022-07-08', '', '0'),
(14, 5, 'Mahima', 'sravan', '1651929108', 2, '07/05/2022', '2022-06-18', '', '0'),
(15, 6, 'Sravan', 'Mahima ', '1651929184', 1, '07/05/2022', '2022-05-08', '', '0'),
(16, 5, 'Mahima KHaja khuwaune', 'SnowMan', '1651929227', 3, '07/05/2022', '2022-06-18', '', '0'),
(17, 2, 'Prakriti', 'sdjah', '1651929293', 2, '07/05/2022', '2022-06-18', '', '0'),
(18, 6, 'das', 'dasd', '1651930533', 3, '07/05/2022', '2022-08-10', '', '0'),
(19, 6, 'sda', 'sad', '1651930752', 1, '2022-07-05', '2022-06-18', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `username`, `password`, `last_login`, `created`) VALUES
(1, 'ram123@gmail.com', 'ram shrestha', 'ramey', '6a3f2633dc28437bdb28b8d33ef68ed8', '0000-00-00 00:00:00', 1650867358),
(2, 'pra@gmail.com', 'prakriti', 'pramila', '6a3f2633dc28437bdb28b8d33ef68ed8', '0000-00-00 00:00:00', 1650976923),
(3, 'abc@gmail.com', 'shyam', 'shyam', '6a3f2633dc28437bdb28b8d33ef68ed8', '2022-05-05 10:06:13', 1651459452),
(4, 'bhandarimahesh58@gmail.com', 'trilochan', 'trilochan', '6a3f2633dc28437bdb28b8d33ef68ed8', '0000-00-00 00:00:00', 1651475280),
(5, 'mahima@gmail.com', 'mahima', 'mahima', '68e400c9f40fd2d35be2c87e0e0c6ae6', NULL, 1651928617),
(6, 'sravn55ghimire@gmail.com', 'sravan', 'sra', '68e400c9f40fd2d35be2c87e0e0c6ae6', NULL, 1651928633),
(7, 'jay@gmail.com', 'Jay', 'jay', '68e400c9f40fd2d35be2c87e0e0c6ae6', NULL, 1651928661);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_profile`
--
ALTER TABLE `site_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `site_profile`
--
ALTER TABLE `site_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD CONSTRAINT `tbl_task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
