-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 12:55 PM
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
  `activity_type` text COMMENT 'ลักษณะกิจกรรม',
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
  `product_product_id` int(11) DEFAULT NULL COMMENT 'ผลผลิต',
  `project_laksana_id` int(11) DEFAULT NULL COMMENT 'ลักษณะโครงการ',
  `project_paomai_id` int(11) DEFAULT NULL COMMENT 'เป้าหมายผลผลิต',
  `project_plan_id` int(11) DEFAULT NULL COMMENT 'กิจกรรมการดำเนินงาน',
  `activity_status` int(11) DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `root_project_id`, `activity_name`, `activity_rationale`, `activity_type`, `activity_place`, `objective`, `evaluation`, `benefit`, `organization_organization_id`, `strategic_strategic_id`, `goal_goal_id`, `responsible_by`, `strategy_strategy_id`, `indicator_indicator_id`, `element_element_id`, `product_product_id`, `project_laksana_id`, `project_paomai_id`, `project_plan_id`, `activity_status`) VALUES
(1, 5, 'กิจกรรมเริมต้น', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `budget_type`
--

CREATE TABLE `budget_type` (
  `budget_type_id` int(11) NOT NULL,
  `budget_type_name` varchar(100) DEFAULT NULL COMMENT 'ชืองบประมาณ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `element`
--

CREATE TABLE `element` (
  `element_id` int(11) NOT NULL,
  `element_name` varchar(45) DEFAULT NULL COMMENT 'องค์ประกอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `goal_id` int(11) NOT NULL,
  `goal_name` varchar(45) DEFAULT NULL COMMENT 'เป้าประสงค์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `indicator_id` int(11) NOT NULL,
  `indicator_name` varchar(45) DEFAULT NULL COMMENT 'ตัวชี้วัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `procced`
--

CREATE TABLE `procced` (
  `procced_id` int(11) NOT NULL COMMENT 'วิธีดำเนินงาน',
  `procced_name` varchar(100) NOT NULL COMMENT 'วิธีการดำเนินงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `procced`
--

INSERT INTO `procced` (`procced_id`, `procced_name`) VALUES
(1, 'ดำเนินการเอง'),
(2, 'ร่วมมือกับหน่วยงานอื่น');

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
  `project_name` varchar(255) DEFAULT NULL COMMENT 'ชือโครงการ',
  `organization_id` int(11) DEFAULT NULL COMMENT 'ชื่อหน่วยงาน',
  `responsibler_id` int(11) DEFAULT NULL COMMENT 'ผู้รับผิดชอบ',
  `project_laksana_id` int(11) DEFAULT NULL COMMENT 'ลักษณะโครงการ',
  `strategic_id` int(11) DEFAULT NULL COMMENT 'ยุทธศาสตร์',
  `goal_id` int(11) DEFAULT NULL COMMENT 'เป้าประสงค์',
  `strategy_id` int(11) DEFAULT NULL COMMENT 'กลยุทธ์',
  `indicator_id` int(11) DEFAULT NULL COMMENT 'ตัวชีวัด',
  `element_id` int(11) DEFAULT NULL COMMENT 'องค์ประกอบ',
  `product_id` int(11) DEFAULT NULL COMMENT 'ผลผลิต',
  `rationale` text COMMENT 'หลักการและเหตุผล',
  `objective` text COMMENT 'วัตถุประสงค์',
  `project_kpi_id` int(11) DEFAULT NULL COMMENT 'เป้าหมายตัวชีวัด',
  `projecti_paomai_id` int(11) DEFAULT NULL COMMENT 'เป้าหมาย',
  `lakshana_activity` text COMMENT 'ลักษณะกิจกรรม',
  `project_plan_id` int(11) DEFAULT NULL COMMENT 'แผนปฏิบัติการกิจกรรม',
  `project_duration` datetime DEFAULT NULL COMMENT 'ระยะเวลาดำเนิการ',
  `project_location` varchar(255) DEFAULT NULL COMMENT 'สถานที่ดำเนินการ',
  `project_evaluation` text COMMENT 'การประเมินผล',
  `project_benefit` text COMMENT 'ประโยชน์ที่คาดว่าจะได้รับ',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `project_money` int(11) DEFAULT NULL COMMENT 'งบประมาณที่มี',
  `budget_budget_type` int(11) DEFAULT NULL COMMENT 'แหล่งที่มาของงบประมาณ',
  `project_status` int(11) NOT NULL DEFAULT '10' COMMENT 'สถานะโครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `organization_id`, `responsibler_id`, `project_laksana_id`, `strategic_id`, `goal_id`, `strategy_id`, `indicator_id`, `element_id`, `product_id`, `rationale`, `objective`, `project_kpi_id`, `projecti_paomai_id`, `lakshana_activity`, `project_plan_id`, `project_duration`, `project_location`, `project_evaluation`, `project_benefit`, `created_by`, `project_money`, `budget_budget_type`, `project_status`) VALUES
(1, 'โครงการบริจาคเงิน', 1, 2, 16, 1, 1, 2, 1, 1, 2, 'jknjknjk', 'sdfsdfsdf', 6, NULL, 'laksana', 2, '2018-10-17 00:00:00', 'nan', 'dsfsdf', 'sdf', 1, 555, 1, 20),
(3, 'myproject', 3, 3, 18, 3, 1, 5, 1, 4, 1, 'ฟหกฟหก', 'ฟหกฟหก', 9, NULL, 'ฟหกฟหก', 4, '2018-10-11 00:00:00', 'ฟหกฟหก', 'ฟหกฟหก', 'ฟหกฟหก', 1, 789565, 2, 20),
(5, 'my project 1', 3, 3, 1, 3, NULL, 5, NULL, NULL, 1, '', '', NULL, NULL, '', NULL, NULL, '', '', '', 1, 100000, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `project_budget`
--

CREATE TABLE `project_budget` (
  `budget_id` int(11) NOT NULL,
  `budget_year` date NOT NULL COMMENT 'ปีงบประมาณ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_budget`
--

INSERT INTO `project_budget` (`budget_id`, `budget_year`) VALUES
(1, '1982-07-09'),
(2, '2018-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `project_kpi`
--

CREATE TABLE `project_kpi` (
  `kpi_id` int(11) NOT NULL,
  `kpi_name` varchar(255) NOT NULL COMMENT 'ตัวชี้วัด',
  `kpi_goal` varchar(100) NOT NULL COMMENT 'เป้าหมาย',
  `kpi_owner` int(11) NOT NULL COMMENT 'เจ้าของ kpi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_laksana`
--

CREATE TABLE `project_laksana` (
  `laksana_id` int(11) NOT NULL,
  `project_type_id` int(11) NOT NULL COMMENT 'ประเภท',
  `procced_id` int(11) NOT NULL COMMENT 'วิธีดำเนินงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_laksana`
--

INSERT INTO `project_laksana` (`laksana_id`, `project_type_id`, `procced_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_paomai`
--

CREATE TABLE `project_paomai` (
  `paomai_id` int(11) NOT NULL COMMENT 'เป้าหมาย',
  `paomai_type` int(11) NOT NULL COMMENT 'ชนิดของเป้าหมาย',
  `paomai_value` text NOT NULL COMMENT 'เป้าหมาย',
  `paomai_owner` int(11) NOT NULL COMMENT 'เจ้าของเปาหมาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_plan`
--

CREATE TABLE `project_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_process` int(11) NOT NULL COMMENT 'ขั้นตอนการดำเนินงาน',
  `plan_detail` text NOT NULL COMMENT 'รายละเอียดการดำเนินงาน',
  `plan_date` date NOT NULL COMMENT 'วันเดือนปี',
  `plan_place` varchar(100) NOT NULL COMMENT 'สถานที่ดำเนินงาน',
  `plan_owner` int(11) NOT NULL COMMENT 'เจ้าของ plan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL COMMENT 'ประเภทโครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`type_id`, `type_name`) VALUES
(1, 'โครงการต่อเนื่อง'),
(2, 'โครงการพัฒนางานเดิม'),
(3, 'โครงการใหม่');

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
(2, 'Amit'),
(3, 'พระมหาอนันต์');

-- --------------------------------------------------------

--
-- Table structure for table `strategic`
--

CREATE TABLE `strategic` (
  `strategic_id` int(11) NOT NULL,
  `strategic_name` varchar(255) DEFAULT NULL COMMENT 'ยุทธศาสตร์'
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
  ADD KEY `fk_activity_project_responsible1_idx` (`responsible_by`),
  ADD KEY `fk_activity_project_laksana1_idx` (`project_laksana_id`),
  ADD KEY `fk_activity_project_paomai1_idx` (`project_paomai_id`),
  ADD KEY `fk_activity_project_plan1_idx` (`project_plan_id`);

--
-- Indexes for table `budget_type`
--
ALTER TABLE `budget_type`
  ADD PRIMARY KEY (`budget_type_id`);

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
-- Indexes for table `procced`
--
ALTER TABLE `procced`
  ADD PRIMARY KEY (`procced_id`);

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
  ADD KEY `fk_project_managers_idx` (`created_by`),
  ADD KEY `fk_project_organization1_idx` (`organization_id`),
  ADD KEY `fk_project_responsibler1_idx` (`responsibler_id`),
  ADD KEY `fk_project_project_laksana1_idx` (`project_laksana_id`),
  ADD KEY `fk_project_strategic1_idx` (`strategic_id`),
  ADD KEY `fk_project_goal1_idx` (`goal_id`),
  ADD KEY `fk_project_strategy1_idx` (`strategy_id`),
  ADD KEY `fk_project_indicator1_idx` (`indicator_id`),
  ADD KEY `fk_project_element1_idx` (`element_id`),
  ADD KEY `fk_project_product1_idx` (`product_id`),
  ADD KEY `fk_project_project_kpi1_idx` (`project_kpi_id`),
  ADD KEY `fk_project_project_paomai1_idx` (`projecti_paomai_id`),
  ADD KEY `fk_project_project_plan1_idx` (`project_plan_id`),
  ADD KEY `fk_project_budget_type1_idx` (`budget_budget_type`);

--
-- Indexes for table `project_budget`
--
ALTER TABLE `project_budget`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `project_kpi`
--
ALTER TABLE `project_kpi`
  ADD PRIMARY KEY (`kpi_id`);

--
-- Indexes for table `project_laksana`
--
ALTER TABLE `project_laksana`
  ADD PRIMARY KEY (`laksana_id`),
  ADD KEY `fk_project_laksana_project_type1_idx` (`project_type_id`),
  ADD KEY `fk_project_laksana_procced1_idx` (`procced_id`);

--
-- Indexes for table `project_paomai`
--
ALTER TABLE `project_paomai`
  ADD PRIMARY KEY (`paomai_id`);

--
-- Indexes for table `project_plan`
--
ALTER TABLE `project_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`type_id`);

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
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `budget_type`
--
ALTER TABLE `budget_type`
  MODIFY `budget_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `element`
--
ALTER TABLE `element`
  MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `procced`
--
ALTER TABLE `procced`
  MODIFY `procced_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'วิธีดำเนินงาน', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ผลผลติด', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_budget`
--
ALTER TABLE `project_budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_kpi`
--
ALTER TABLE `project_kpi`
  MODIFY `kpi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_laksana`
--
ALTER TABLE `project_laksana`
  MODIFY `laksana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project_paomai`
--
ALTER TABLE `project_paomai`
  MODIFY `paomai_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เป้าหมาย';
--
-- AUTO_INCREMENT for table `project_plan`
--
ALTER TABLE `project_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_type`
--
ALTER TABLE `project_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `fk_activity_project_laksana1` FOREIGN KEY (`project_laksana_id`) REFERENCES `project_laksana` (`laksana_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_paomai1` FOREIGN KEY (`project_paomai_id`) REFERENCES `project_paomai` (`paomai_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_plan1` FOREIGN KEY (`project_plan_id`) REFERENCES `project_plan` (`plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_responsible1` FOREIGN KEY (`responsible_by`) REFERENCES `responsibler` (`responsible_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_strategic1` FOREIGN KEY (`strategic_strategic_id`) REFERENCES `strategic` (`strategic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_strategy1` FOREIGN KEY (`strategy_strategy_id`) REFERENCES `strategy` (`strategy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_budget_type1` FOREIGN KEY (`budget_budget_type`) REFERENCES `budget_type` (`budget_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_element1` FOREIGN KEY (`element_id`) REFERENCES `element` (`element_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_goal1` FOREIGN KEY (`goal_id`) REFERENCES `goal` (`goal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_indicator1` FOREIGN KEY (`indicator_id`) REFERENCES `indicator` (`indicator_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_managers` FOREIGN KEY (`created_by`) REFERENCES `managers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_organization1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_kpi1` FOREIGN KEY (`project_kpi_id`) REFERENCES `project_kpi` (`kpi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_laksana1` FOREIGN KEY (`project_laksana_id`) REFERENCES `project_laksana` (`laksana_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_paomai1` FOREIGN KEY (`projecti_paomai_id`) REFERENCES `project_paomai` (`paomai_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_plan1` FOREIGN KEY (`project_plan_id`) REFERENCES `project_plan` (`plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_responsibler1` FOREIGN KEY (`responsibler_id`) REFERENCES `responsibler` (`responsible_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_strategic1` FOREIGN KEY (`strategic_id`) REFERENCES `strategic` (`strategic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_strategy1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`strategy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project_laksana`
--
ALTER TABLE `project_laksana`
  ADD CONSTRAINT `fk_project_laksana_procced1` FOREIGN KEY (`procced_id`) REFERENCES `procced` (`procced_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_laksana_project_type1` FOREIGN KEY (`project_type_id`) REFERENCES `project_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
