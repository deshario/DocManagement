-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 09:09 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_amit`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `root_project_id` int(11) NOT NULL COMMENT 'โครงการ',
  `activity_name` varchar(45) DEFAULT NULL COMMENT 'ชือกิจกรรม',
  `activity_rationale` text COMMENT 'หลักการและเหตุผล',
  `activity_type` varchar(255) DEFAULT NULL COMMENT 'ลักษณะกิจกรรม',
  `activity_place` varchar(90) DEFAULT NULL COMMENT 'สถานที่ดำเนินการ',
  `objective` text COMMENT 'วัตถุประสงค์',
  `evaluation` text COMMENT 'การประเมินผล',
  `benefit` text COMMENT 'ประโยช์ที่คาดว่าจะได้รับ',
  `organization_organization_id` int(11) DEFAULT NULL COMMENT 'หน่วยงาน',
  `strategic_strategic_id` int(11) DEFAULT NULL COMMENT 'ยุทธศาสตร์',
  `goal_goal_id` int(11) DEFAULT NULL COMMENT 'เป้าประสงค์',
  `responsible_by` int(11) DEFAULT NULL COMMENT 'ผู้รับผิดชอบ',
  `strategy_strategy_id` int(11) DEFAULT NULL COMMENT 'กลยุทธ์',
  `indicator_indicator_id` int(11) DEFAULT NULL COMMENT 'ตัวชี้วัด',
  `element_element_id` int(11) DEFAULT NULL COMMENT 'องค์ประกอบ',
  `product_product_id` int(11) DEFAULT NULL COMMENT 'ผลผลิต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `root_project_id`, `activity_name`, `activity_rationale`, `activity_type`, `activity_place`, `objective`, `evaluation`, `benefit`, `organization_organization_id`, `strategic_strategic_id`, `goal_goal_id`, `responsible_by`, `strategy_strategy_id`, `indicator_indicator_id`, `element_element_id`, `product_product_id`) VALUES
(2, 1, 'กิจกรรม 1', '1. สนพำท รยหีท\r\n2. สนพำท รยหีท\r\n3. สนพำท รยหีท', 'lorem', 'location', '1.วัตถุประสงค์ 1\r\n2. วัตถุประสงค์ 2', 'ประเมินผล 1\r\nประเมินผล 2', 'ประโยชน์ 1', 1, 1, 1, 1, 3, 1, 1, 1),
(3, 1, 'กิจกรรม 2', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 'ลักษณะแปลกๆ', 'บนโลก', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 2, 2, 1, 2, 4, 1, 2, 1),
(5, 1, 'กิจกรรม 3', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 'ลักษณะแปลกๆ', 'บนโลก', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 2, 2, 1, 2, 4, 1, 2, 1),
(6, 1, 'กิจกรรม 4', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 'ลักษณะแปลกๆ', 'บนโลก', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 2, 2, 1, 2, 4, 1, 2, 1),
(7, 1, 'กิจกรรม 5', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 'ลักษณะแปลกๆ', 'บนโลก', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', '1. lorem ipsum\r\n2. lorem ipsum\r\n3. lorem ipsum', 2, 2, 1, 2, 4, 1, 2, 1),
(8, 1, 'asdsadsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 4, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 5, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 6, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 7, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 8, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 9, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 'กิจกรรมวันสงกรานต์ปีใหม่เมืองภายใต้โครงการสืบ', 'คนไทยทุกคนให้ความสำคัญในช่วงเทศการ .......', '1.กิจกรรมบายศรี..  ', 'วิทยาลัยสงค์นครน่าน', '1.เพื่อให้นิสิต ได้สืบสาน ..\r\n2.เพื่อให้นิสิตเกิดขวัญและกำลังใจในการทำงาน\r\n3.เพื่อส่งเสริมวัฒนธรรม\r\n\r\n\r\n\r\n', '', '1. นิสิตและเยาวชนทั่วไปเกิดความตระหนักและเข้ามามีส่วนร่วม\r\n2.เด็กและนิสิตมีจิตสำนึก..', 3, 3, 1, 3, 5, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `element`
--

CREATE TABLE `element` (
  `element_id` int(11) NOT NULL,
  `element_name` varchar(45) DEFAULT NULL COMMENT 'องค์ประกอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `element`
--

INSERT INTO `element` (`element_id`, `element_name`) VALUES
(1, 'องค์ประกอบที่ 1'),
(2, 'องค์ประกอบที่ 2'),
(3, 'องค์ประกอบที่ 3'),
(4, 'การทำนุบำรุงศิลปวัฒนธรรม');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `goal_id` int(11) NOT NULL,
  `goal_name` varchar(45) DEFAULT NULL COMMENT 'เป้าประสงค์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`goal_id`, `goal_name`) VALUES
(1, 'เปาประสงค์ 1');

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `indicator_id` int(11) NOT NULL,
  `indicator_name` varchar(45) DEFAULT NULL COMMENT 'ตัวชี้วัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicator`
--

INSERT INTO `indicator` (`indicator_id`, `indicator_name`) VALUES
(1, 'ตัวชี้วัด 1');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Username',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Authentication Key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password Hash',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Password Reset Token',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email',
  `created_at` int(11) NOT NULL COMMENT 'Created At',
  `updated_at` int(11) NOT NULL COMMENT 'Updated At',
  `roles` int(11) NOT NULL COMMENT 'Roles',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `created_at`, `updated_at`, `roles`, `status`) VALUES
(1, 'amit', 'ZIJ-hJxg9mFNIbLR0xv7XCjtVEfU_P6N', '$2y$13$fMAwC9LVwGFW0VROj375derZg6LdYKA4.HxKyHPaegQeJ2TCsNoEa', NULL, 'amit@gmail.com', 1538491076, 1538491076, 20, 10),
(2, 'demo', 'N-39hgHZtPUhHH8bwIdRg0Sw-qZUhqS4', '$2y$13$JIdis6qyNfHY8FbnztUvre9Zb5WdyUw0c80g5YImxNoppePWOK4Pm', NULL, 'demo@gmail.com', 1538567377, 1538567377, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL,
  `organization_name` varchar(45) DEFAULT NULL COMMENT 'ชื่อหน่วยงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization_name`) VALUES
(1, 'Mahachulalongkorn University'),
(2, 'Rajamangala University of technology of lanna'),
(3, 'วิทยาลัยสงฆ์นครน่าน เฉลิมพระเกียรติ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL COMMENT 'ผลผลติด',
  `product_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`) VALUES
(1, 'ผลผลิต 1'),
(2, 'ผลการทำนุบำรุงศิลปวัฒนธรรม');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(45) DEFAULT NULL COMMENT 'ชือโครงการ',
  `created_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `project_status` int(11) NOT NULL DEFAULT '10' COMMENT 'สถานะโครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `created_by`, `project_status`) VALUES
(1, 'โครงการ 1', 1, 20),
(3, 'โครงการ 3', 1, 10),
(4, 'โครงการ 4', 1, 10),
(5, 'โครงการ 2', 1, 10),
(6, 'demo โครงการ', 1, 10),
(7, 'mero โครงการ', 2, 20),
(8, 'mero โครงการ II', 2, 10),
(9, 'mero โครงการ III', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `responsibler`
--

CREATE TABLE `responsibler` (
  `responsible_id` int(11) NOT NULL,
  `responsible_by` varchar(100) DEFAULT NULL COMMENT 'ชื่อผู้รับผิดชอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `responsibler`
--

INSERT INTO `responsibler` (`responsible_id`, `responsible_by`) VALUES
(1, 'watthanapong'),
(2, 'jacob'),
(3, 'พระมหาอนันต์');

-- --------------------------------------------------------

--
-- Table structure for table `strategic`
--

CREATE TABLE `strategic` (
  `strategic_id` int(11) NOT NULL,
  `strategic_name` varchar(90) DEFAULT NULL COMMENT 'ยุทธศาสตร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strategic`
--

INSERT INTO `strategic` (`strategic_id`, `strategic_name`) VALUES
(1, 'ยุทธศาสตร์ 1'),
(2, 'ยุทธศาสตร์ 2'),
(3, 'การทำนุบำรุงพระพุทธศาสนา ศิลปวัฒนธรรม');

-- --------------------------------------------------------

--
-- Table structure for table `strategy`
--

CREATE TABLE `strategy` (
  `strategy_id` int(11) NOT NULL,
  `strategy_name` varchar(90) DEFAULT NULL COMMENT 'กลยุทธ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strategy`
--

INSERT INTO `strategy` (`strategy_id`, `strategy_name`) VALUES
(1, 'กลยุทธ์ 1'),
(2, 'กลยุทธ์ 2'),
(3, 'กลยุทธ์ 3'),
(4, 'กลยุทธ์ 4'),
(5, 'รณรงค์ให้นิสิตและบุคลากรมีความตระหนักในเรื่องการทำนุบำรุงศิลปวัฒนธรรมและมีบทบาทในการส่งเสฟ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `fk_activity_project1_idx` (`root_project_id`),
  ADD KEY `fk_activity_organization1_idx` (`organization_organization_id`),
  ADD KEY `fk_activity_strategic1_idx` (`strategic_strategic_id`),
  ADD KEY `fk_activity_goal1_idx` (`goal_goal_id`),
  ADD KEY `fk_activity_strategy1_idx` (`strategy_strategy_id`),
  ADD KEY `fk_activity_indicator1_idx` (`indicator_indicator_id`),
  ADD KEY `fk_activity_element1_idx` (`element_element_id`),
  ADD KEY `fk_activity_product1_idx` (`product_product_id`),
  ADD KEY `fk_activity_project_responsible1_idx` (`responsible_by`);

--
-- Indexes for table `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`element_id`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `indicator`
--
ALTER TABLE `indicator`
  ADD PRIMARY KEY (`indicator_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `fk_project_managers_idx` (`created_by`);

--
-- Indexes for table `responsibler`
--
ALTER TABLE `responsibler`
  ADD PRIMARY KEY (`responsible_id`);

--
-- Indexes for table `strategic`
--
ALTER TABLE `strategic`
  ADD PRIMARY KEY (`strategic_id`);

--
-- Indexes for table `strategy`
--
ALTER TABLE `strategy`
  ADD PRIMARY KEY (`strategy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `element`
--
ALTER TABLE `element`
  MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ผลผลติด', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `responsibler`
--
ALTER TABLE `responsibler`
  MODIFY `responsible_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `strategic`
--
ALTER TABLE `strategic`
  MODIFY `strategic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `strategy`
--
ALTER TABLE `strategy`
  MODIFY `strategy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_activity_element1` FOREIGN KEY (`element_element_id`) REFERENCES `element` (`element_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_goal1` FOREIGN KEY (`goal_goal_id`) REFERENCES `goal` (`goal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_indicator` FOREIGN KEY (`indicator_indicator_id`) REFERENCES `indicator` (`indicator_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_organization1` FOREIGN KEY (`organization_organization_id`) REFERENCES `organization` (`organization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project1` FOREIGN KEY (`root_project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_responsible1` FOREIGN KEY (`responsible_by`) REFERENCES `responsibler` (`responsible_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_strategic1` FOREIGN KEY (`strategic_strategic_id`) REFERENCES `strategic` (`strategic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_strategy1` FOREIGN KEY (`strategy_strategy_id`) REFERENCES `strategy` (`strategy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_managers` FOREIGN KEY (`created_by`) REFERENCES `managers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
