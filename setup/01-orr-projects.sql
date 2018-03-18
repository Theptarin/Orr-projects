-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2017 at 06:22 PM
-- Server version: 5.7.17-0ubuntu1
-- PHP Version: 7.0.15-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orr-projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_activity`
--

CREATE TABLE `my_activity` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `my_can`
--

CREATE TABLE `my_can` (
  `sys_id` varchar(50) NOT NULL DEFAULT '',
  `user` varchar(20) NOT NULL DEFAULT '',
  `aut_to_group` tinyint(4) NOT NULL DEFAULT '0',
  `str_sql` varchar(255) NOT NULL DEFAULT '',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='สิทธิการใช้งาน';

-- --------------------------------------------------------

--
-- Table structure for table `my_datafield`
--

CREATE TABLE `my_datafield` (
  `field_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL COMMENT 'คำอธิบาย',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `my_group`
--

CREATE TABLE `my_group` (
  `group` varchar(20) NOT NULL DEFAULT '',
  `user` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(50) NOT NULL COMMENT 'คำอธิบาย',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `my_menu`
--

CREATE TABLE `my_menu` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'หมวดของเมนู',
  `name` varchar(100) NOT NULL,
  `sort_id` int(11) NOT NULL COMMENT 'เลขเรียงลำดับ',
  `href` varchar(100) NOT NULL COMMENT 'url ของเมนู',
  `href_type` int(11) NOT NULL COMMENT 'ประเภทเมนู',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `my_note`
--

CREATE TABLE `my_note` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ประกาศใหม่ๆ' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `my_registration`
--

CREATE TABLE `my_registration` (
  `id` int(11) NOT NULL,
  `open_access` datetime NOT NULL COMMENT 'ครั้งแรกที่เริ่มใช้งาน',
  `last_note_id` int(11) NOT NULL COMMENT 'โน๊ตที่อ่านล่าสุด',
  `accept_note` datetime NOT NULL COMMENT 'วันที่เวลาที่อ่านประกาศครั้งล่าสุด',
  `computer_name` varchar(50) NOT NULL COMMENT 'ชื่อเครื่องคอมพิวเตอร์',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='บันทึกการเข้าใช้งานระบบ' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `my_sys`
--

CREATE TABLE `my_sys` (
  `sys_id` varchar(50) NOT NULL DEFAULT '',
  `any_use` tinyint(4) NOT NULL DEFAULT '0',
  `aut_user` tinyint(4) NOT NULL DEFAULT '0',
  `aut_group` tinyint(4) NOT NULL DEFAULT '0',
  `aut_any` tinyint(4) NOT NULL DEFAULT '0',
  `aut_god` tinyint(4) NOT NULL DEFAULT '0',
  `aut_can_from` varchar(50) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='สิทธิการใช้งาน';

-- --------------------------------------------------------

--
-- Table structure for table `my_user`
--

CREATE TABLE `my_user` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL DEFAULT '',
  `val_pass` blob NOT NULL,
  `prefix` varchar(30) NOT NULL DEFAULT '',
  `fname` varchar(50) NOT NULL DEFAULT '',
  `lname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_activity`
--
ALTER TABLE `my_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sec_script` (`sec_script`);

--
-- Indexes for table `my_can`
--
ALTER TABLE `my_can`
  ADD PRIMARY KEY (`sys_id`,`user`);

--
-- Indexes for table `my_datafield`
--
ALTER TABLE `my_datafield`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `my_group`
--
ALTER TABLE `my_group`
  ADD PRIMARY KEY (`group`,`user`);

--
-- Indexes for table `my_menu`
--
ALTER TABLE `my_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_note`
--
ALTER TABLE `my_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sec_time` (`sec_time`);

--
-- Indexes for table `my_registration`
--
ALTER TABLE `my_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sec_ip` (`sec_ip`);

--
-- Indexes for table `my_sys`
--
ALTER TABLE `my_sys`
  ADD PRIMARY KEY (`sys_id`);

--
-- Indexes for table `my_user`
--
ALTER TABLE `my_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_activity`
--
ALTER TABLE `my_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338545;
--
-- AUTO_INCREMENT for table `my_menu`
--
ALTER TABLE `my_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `my_note`
--
ALTER TABLE `my_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `my_registration`
--
ALTER TABLE `my_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `my_user`
--
ALTER TABLE `my_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
