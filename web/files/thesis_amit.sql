-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 08:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
  `root_project_id` int(11) DEFAULT NULL COMMENT 'โครงการ',
  `activity_name` varchar(255) DEFAULT NULL COMMENT 'ชือกิจกรรม',
  `activity_rationale` text COMMENT 'หลักการและเหตุผล',
  `activity_type` text COMMENT 'ลักษณะกิจกรรม',
  `objective` text COMMENT 'วัตถุประสงค์',
  `evaluation` text COMMENT 'การประเมินผล',
  `benefit` text COMMENT 'ประโยช์ที่คาดว่าจะได้รับ',
  `organization_organization_id` int(11) DEFAULT NULL COMMENT 'หน่วยงาน',
  `responsible_by` int(11) DEFAULT NULL COMMENT 'ผู้รับผิดชอบ',
  `activity_consistency_id` int(11) DEFAULT NULL COMMENT 'ความสอดคล่อง',
  `element_element_id` int(11) DEFAULT NULL COMMENT 'องค์ประกอบ',
  `product_product_id` int(11) DEFAULT NULL COMMENT 'ผลผลิต',
  `project_laksana_id` int(11) DEFAULT NULL COMMENT 'ลักษณะโครงการ',
  `project_paomai_id` int(11) DEFAULT NULL COMMENT 'เป้าหมายผลผลิต',
  `project_plan_id` int(11) DEFAULT NULL COMMENT 'กิจกรรมการดำเนินงาน',
  `budget_type_id` int(11) DEFAULT NULL COMMENT 'แหล่งที่มาของงบประมาณ',
  `activity_money` int(11) DEFAULT NULL COMMENT 'งบประมาณ',
  `related_subject` varchar(255) DEFAULT NULL,
  `budget_details_id` int(11) DEFAULT NULL COMMENT 'รายละเอียดของงบประมาณ',
  `activity_status` int(11) DEFAULT NULL COMMENT 'สถานะ',
  `activity_key` varchar(255) DEFAULT NULL COMMENT 'Activity Key',
  `lastpage_id` int(11) DEFAULT NULL COMMENT 'หน้าสุดท้าย',
  `created_by` int(11) DEFAULT NULL,
  `suggestion` text COMMENT 'ข้อเสนอแนะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity_files`
--

CREATE TABLE `activity_files` (
  `file_id` int(11) NOT NULL,
  `file_source` text COMMENT 'ที่อยู่ไฟล์',
  `activity_id` int(11) NOT NULL COMMENT 'กิจกรรม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `budget_details`
--

CREATE TABLE `budget_details` (
  `detail_id` int(11) NOT NULL,
  `detail_name` varchar(255) NOT NULL COMMENT 'รายละเอียดของงบประมาณ',
  `detail_price` int(11) NOT NULL COMMENT 'งบประมาณ',
  `activity_key` varchar(255) NOT NULL COMMENT 'กิจกรรมที่อ้างอิง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budget_details`
--

INSERT INTO `budget_details` (`detail_id`, `detail_name`, `detail_price`, `activity_key`) VALUES
(1, 'ค่าขนม', 500, 'Hd6R66xlNTlFVeq'),
(2, 'ค่านิด', 699, 'Hd6R66xlNTlFVeq'),
(8, '99', 77, 'jJBP1EMjBHvBaE9'),
(9, 'rr', 55, 'jJBP1EMjBHvBaE9'),
(10, 'ค่าจ้างเหมาจัดทำป้าย', 1000, 'A3csxykH1uxBPlS'),
(11, 'ค่าจ้างเหมาอาหารมื้อเที่ยง', 6998, 'A3csxykH1uxBPlS'),
(16, 'sad', 444, 'Q5BTI8Vq8n78IAn'),
(17, '454', 55, 'Q5BTI8Vq8n78IAn'),
(18, 'Leo Porter', 588, 'UIK_Sd0EZ8UtUy3'),
(20, 'Hyacinth Brennan', 827, '6lWnte3QAZF4auA'),
(21, 'Micah Gilmore', 112, 'tBPoHuS5WHLK5Au'),
(23, 'Colt Cantrell', 982, 'Y4krjsBiZMNLkCI'),
(26, 'กดเดกเ', 5000, 'f8yDLVV8FRg1jYk'),
(29, 'กดเกดเ', 5000, 'BSC7QmMwzVkH2NE'),
(30, 'asdasd', 234234, 'QoJSLZTj-wpAFtE'),
(31, 'asd', 55555, '_-hUCQWChIvIeWC'),
(32, 'asd', 31345, 'hpeBAD8nI5hpHyw'),
(36, 'asd', 342, 'RpENWe1o-_Loy_O'),
(37, 'sdfs', 345, 'k7jX1LVAwmedtv5'),
(38, 'sdf', 324234, 'ePL2VF_9GGSEoZA'),
(117, 'sad', 5000, 'y7cCuv2K4rCd9D5');

-- --------------------------------------------------------

--
-- Table structure for table `budget_type`
--

CREATE TABLE `budget_type` (
  `budget_type_id` int(11) NOT NULL,
  `budget_type_name` varchar(100) DEFAULT NULL COMMENT 'ชืองบประมาณ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budget_type`
--

INSERT INTO `budget_type` (`budget_type_id`, `budget_type_name`) VALUES
(1, 'งบประมาณพิเศษ'),
(2, 'รายได้');

-- --------------------------------------------------------

--
-- Table structure for table `consistency`
--

CREATE TABLE `consistency` (
  `consistency_id` int(11) NOT NULL,
  `cons_strategic_id` int(11) DEFAULT NULL COMMENT 'ยุทธศาสตร์',
  `cons_goal_id` int(11) DEFAULT NULL COMMENT 'เป้าประสงค์',
  `cons_strategy_id` int(11) DEFAULT NULL COMMENT 'กลยุทธ์',
  `cons_indicator_id` int(11) DEFAULT NULL COMMENT 'ตัวชี้วัด',
  `project_act_key` varchar(255) DEFAULT NULL COMMENT 'อ้างอิง project รึ Act'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consistency`
--

INSERT INTO `consistency` (`consistency_id`, `cons_strategic_id`, `cons_goal_id`, `cons_strategy_id`, `cons_indicator_id`, `project_act_key`) VALUES
(11, 2, 3, 1, 1, 'RpENWe1o-_Loy_O'),
(12, 1, 2, 2, 2, 'RpENWe1o-_Loy_O'),
(13, 1, 2, 2, 2, 'k7jX1LVAwmedtv5'),
(14, 2, 1, 1, 1, '31Y7nvj-0kFrXn2'),
(21, 1, 1, 2, 1, 'VphFEx85HZ9lTja'),
(22, 2, 2, NULL, NULL, 'VphFEx85HZ9lTja'),
(23, 1, 2, 2, 1, 'ePL2VF_9GGSEoZA'),
(24, 1, 1, 1, 1, '99U_JXOO6PiALHb'),
(25, 1, 1, 1, 1, 'SNdcRZnXFl1VeAZ'),
(26, 2, 1, 1, 1, 'p68Hw7qsgGLyi6X'),
(27, NULL, NULL, NULL, NULL, 'RY2hwHPQDSuuVdt'),
(28, NULL, NULL, NULL, NULL, 'VxdcZESrrDSHG_M'),
(29, NULL, NULL, NULL, NULL, 'Fhc8mbRwG4pSQw4'),
(30, NULL, NULL, NULL, NULL, 'd6abgyuXKMwdQLC'),
(117, 1, 2, 1, 2, 'TILrut_QgeiiKYt'),
(120, 1, 1, 2, 1, 'sa2KNck9PCiIlqk'),
(121, 1, 1, 2, 2, 'y7cCuv2K4rCd9D5');

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
(1, 'องค์ประกอบ 1'),
(2, 'องค์ประกอบ 2');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `goal_id` int(11) NOT NULL,
  `goal_name` varchar(255) NOT NULL COMMENT 'เป้าประสงค์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`goal_id`, `goal_name`) VALUES
(1, 'เป้าประสงค์ 1'),
(2, 'เป้าประสงค์ 2'),
(3, 'เป้าประสงค์ 11');

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `indicator_id` int(11) NOT NULL,
  `indicator_name` varchar(255) NOT NULL COMMENT 'ตัวชี้วัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicator`
--

INSERT INTO `indicator` (`indicator_id`, `indicator_name`) VALUES
(1, 'ตัวชี้วัด 1'),
(2, 'ตัวชี้วัด 11');

-- --------------------------------------------------------

--
-- Table structure for table `lastpage`
--

CREATE TABLE `lastpage` (
  `last_id` int(11) NOT NULL,
  `last_role` int(11) NOT NULL COMMENT 'ชนิดของผู้ใช้งาน',
  `last_user` varchar(100) NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `last_position` varchar(100) NOT NULL COMMENT 'ตำแหน่งผู้ใช้งาน',
  `project_act_key` varchar(255) NOT NULL COMMENT 'อ้างอิง project'
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
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT 'Status',
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูป\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `created_at`, `updated_at`, `roles`, `status`, `picture`) VALUES
(1, 'amit', 'ZIJ-hJxg9mFNIbLR0xv7XCjtVEfU_P6N', '$2y$13$fMAwC9LVwGFW0VROj375derZg6LdYKA4.HxKyHPaegQeJ2TCsNoEa', NULL, 'amit@gmail.com', 1538491076, 1538491076, 20, 10, NULL),
(14, 'deshario', 'qAWiDIgIA3xpGLXj5CBg9AV3FmS_1Vo3', '$2y$13$hCu5gUT6fnJRP961kIzc3eA1NJhj54YhZVPLvkxdq1SA9MWnUsft2', NULL, 'deshario@admin.com', 1544287271, 1544287271, 20, 10, 'deshario.png');

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
  `project_consistency_id` int(11) DEFAULT NULL COMMENT 'ความสอดคล่อง',
  `responsibler_id` int(11) DEFAULT NULL COMMENT 'ผู้รับผิดชอบ',
  `project_laksana_id` int(11) DEFAULT NULL COMMENT 'ลักษณะโครงการ',
  `element_id` int(11) DEFAULT NULL COMMENT 'องค์ประกอบ',
  `product_id` int(11) DEFAULT NULL COMMENT 'ผลผลิต',
  `rationale` text COMMENT 'หลักการและเหตุผล',
  `objective` text COMMENT 'วัตถุประสงค์',
  `project_kpi_id` int(11) DEFAULT NULL COMMENT 'เป้าหมายตัวชีวัด',
  `projecti_paomai_id` int(11) DEFAULT NULL COMMENT 'เป้าหมาย',
  `lakshana_activity` text COMMENT 'ลักษณะกิจกรรม',
  `project_plan_id` int(11) DEFAULT NULL COMMENT 'แผนปฏิบัติการกิจกรรม',
  `project_start` varchar(50) DEFAULT NULL COMMENT 'วันที่เริ่มโครงการ',
  `related_subject` varchar(255) DEFAULT NULL,
  `project_end` varchar(50) DEFAULT NULL COMMENT 'วันที่สินสุดโครงการ',
  `project_location` varchar(255) DEFAULT NULL COMMENT 'สถานที่ดำเนินการ',
  `project_evaluation` text COMMENT 'การประเมินผล',
  `project_benefit` text COMMENT 'ประโยชน์ที่คาดว่าจะได้รับ',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `project_money` int(11) DEFAULT NULL COMMENT 'งบประมาณที่มี',
  `budget_budget_type` int(11) DEFAULT NULL COMMENT 'แหล่งที่มาของงบประมาณ',
  `project_year` varchar(4) DEFAULT NULL COMMENT 'ปีงบประมาณ',
  `project_status` int(11) DEFAULT '10' COMMENT 'สถานะโครงการ',
  `project_key` varchar(255) DEFAULT NULL COMMENT 'Project Key',
  `lastpage_id` int(11) DEFAULT NULL COMMENT 'หน้าสุดท้าย',
  `suggestion` text COMMENT 'ข้อเสนอแนะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `file_id` int(11) NOT NULL,
  `file_source` text COMMENT 'ที่อยู่ไฟล์',
  `project_id` int(11) DEFAULT NULL COMMENT 'โครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_kpi`
--

CREATE TABLE `project_kpi` (
  `kpi_id` int(11) NOT NULL,
  `kpi_name` varchar(255) NOT NULL COMMENT 'ตัวชี้วัด',
  `kpi_goal` varchar(100) NOT NULL COMMENT 'เป้าหมาย',
  `kpi_project_key` varchar(255) NOT NULL COMMENT 'อ้างอิง Project'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_kpi`
--

INSERT INTO `project_kpi` (`kpi_id`, `kpi_name`, `kpi_goal`, `kpi_project_key`) VALUES
(19, 't', 'tt', 'Z76hItJGk-Tbxii'),
(20, 'ii', 'ii', 'Z76hItJGk-Tbxii'),
(27, '333', '222', 'zGnwiFwRBpfvkAo'),
(28, 'ttt', '55', 'zGnwiFwRBpfvkAo'),
(29, 'ww', '11', 'VKdm6ovf3isfknf'),
(30, 'asad', 'asd', 'CmNhnpfyZbm3S_N'),
(38, 'asad', 'asd', 'MaxtpGf6_OYu_ix'),
(39, 'asd', 'asd', 'gyQZoIVe-ZhDJE2'),
(40, 'Paul Dale', 'Magni ipsam vel ipsum et eu in tempore', 'r_WLs3wFNx5UPzM'),
(42, 'asdasdasd', 'asdasdasdasdasd', 'gdBL-siug1yr7PI'),
(43, 'asd', 'asd', 'GE1YvMTqFT9gQx9'),
(44, 'uio', 'uio', 'ywQ_SMQH5PJD0rO'),
(46, 'kpi1', 'val1', 'fORB2bk73ajTJQr'),
(47, 'kpi2', 'val2', 'fORB2bk73ajTJQr'),
(63, 'kpi1', 'val1', 'VphFEx85HZ9lTja'),
(64, 'kpi2', 'val2', 'VphFEx85HZ9lTja'),
(73, 'asd', 'asd', 'TILrut_QgeiiKYt'),
(76, 'asd', '22', 'sa2KNck9PCiIlqk');

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
(1, 1, 1),
(6, 3, 1),
(7, 3, 1),
(8, 2, 1),
(9, 2, 1),
(10, 2, 1),
(11, 2, 1),
(12, 1, 1),
(13, 3, 1),
(14, 1, 1),
(15, 2, 1),
(16, 2, 2),
(17, 3, 1),
(18, 2, 1),
(19, 2, 2),
(20, 2, 2),
(21, 2, 2),
(22, 2, 2),
(23, 2, 1),
(24, 2, 1),
(25, 2, 1),
(26, 1, 1),
(27, 2, 1),
(28, 3, 2),
(29, 3, 1),
(30, 2, 1),
(31, 1, 1),
(32, 2, 1),
(33, 2, 2),
(34, 3, 1),
(35, 2, 1),
(36, 3, 1),
(37, 1, 1),
(38, 3, 1),
(39, 3, 1),
(40, 3, 1),
(41, 3, 1),
(42, 3, 1),
(43, 3, 1),
(44, 3, 1),
(45, 3, 1),
(46, 3, 1),
(47, 3, 1),
(48, 3, 1),
(49, 3, 1),
(50, 3, 1),
(51, 3, 1),
(52, 2, 1),
(53, 1, 2),
(54, 1, 2),
(55, 3, 1),
(56, 3, 1),
(57, 1, 2),
(58, 2, 2),
(59, 3, 2),
(60, 3, 1),
(61, 1, 1),
(62, 3, 1),
(63, 3, 1),
(64, 3, 1),
(65, 3, 1),
(66, 3, 1),
(67, 3, 1),
(68, 3, 1),
(69, 3, 1),
(70, 3, 1),
(71, 3, 2),
(72, 3, 1),
(73, 3, 1),
(74, 3, 1),
(75, 3, 1),
(76, 3, 1),
(77, 3, 1),
(78, 3, 1),
(79, 3, 1),
(80, 3, 1),
(81, 3, 1),
(82, 3, 1),
(83, 1, 1),
(84, 1, 1),
(85, 1, 1),
(86, 3, 1),
(87, 3, 1),
(88, 3, 1),
(89, 3, 1),
(90, 3, 1),
(91, 3, 1),
(92, 3, 1),
(93, 3, 1),
(94, 3, 1),
(95, 3, 2),
(96, 3, 2),
(97, 3, 1),
(98, 3, 1),
(99, 1, 1),
(100, 1, 2),
(101, 1, 2),
(102, 3, 1),
(103, 1, 2),
(104, 3, 2),
(105, 3, 2),
(106, 1, 1),
(107, 1, 1),
(108, 2, 1),
(109, 2, 1),
(110, 2, 1),
(111, 2, 1),
(112, 2, 1),
(113, 3, 1),
(114, 2, 1),
(115, 2, 1),
(116, 2, 1),
(117, 2, 2),
(118, 2, 1),
(119, 2, 2),
(120, 3, 1),
(121, 3, 1),
(122, 2, 1),
(123, 2, 1),
(124, 2, 1),
(125, 3, 1),
(126, 3, 1),
(127, 3, 1),
(128, 3, 1),
(129, 3, 1),
(130, 3, 1),
(131, 3, 1),
(132, 3, 1),
(133, 3, 1),
(134, 3, 1),
(135, 3, 1),
(136, 2, 1),
(137, 3, 1),
(138, 3, 1),
(139, 3, 1),
(140, 3, 1),
(141, 3, 1),
(142, 2, 2),
(143, 3, 2),
(144, 3, 2),
(145, 3, 1),
(146, 3, 1),
(147, 3, 1),
(148, 2, 2),
(149, 3, 1),
(150, 3, 1),
(151, 3, 1),
(152, 2, 1),
(153, 2, 1),
(154, 2, 1),
(155, 2, 1),
(156, 2, 1),
(157, 2, 1),
(158, 2, 1),
(159, 2, 1),
(160, 2, 1),
(161, 2, 1),
(162, 2, 1),
(163, 2, 1),
(164, 2, 1),
(165, 2, 1),
(166, 2, 1),
(167, 3, 1),
(168, 2, 1),
(169, 2, 1),
(170, 2, 1),
(171, 2, 1),
(172, 2, 1),
(173, 2, 1),
(174, 2, 2),
(175, 2, 2),
(176, 2, 2),
(177, 2, 2),
(178, 2, 2),
(179, 2, 2),
(180, 2, 1),
(181, 2, 1),
(182, 2, 1),
(183, 2, 1),
(184, 2, 1),
(185, 2, 1),
(186, 2, 1),
(187, 2, 1),
(188, 2, 1),
(189, 2, 1),
(190, 2, 1),
(191, 2, 1),
(192, 2, 1),
(193, 2, 1),
(194, 2, 1),
(195, 2, 1),
(196, 2, 1),
(197, 2, 1),
(198, 2, 1),
(199, 2, 1),
(200, 2, 1),
(201, 2, 1),
(202, 2, 1),
(203, 2, 1),
(204, 2, 1),
(205, 2, 1),
(206, 2, 1),
(207, 2, 1),
(208, 2, 1),
(209, 2, 1),
(210, 2, 1),
(211, 2, 1),
(212, 2, 1),
(213, 2, 1),
(214, 2, 1),
(215, 2, 1),
(216, 2, 1),
(217, 2, 1),
(218, 3, 1),
(219, 3, 1),
(220, 3, 1),
(221, 3, 1),
(222, 2, 1),
(223, 2, 1),
(224, 2, 1),
(225, 2, 1),
(226, 2, 1),
(227, 2, 1),
(228, 2, 1),
(229, 2, 1),
(230, 2, 1),
(231, 2, 1),
(232, 2, 1),
(233, 2, 1),
(234, 2, 1),
(235, 3, 1),
(236, 3, 1),
(237, 3, 1),
(238, 3, 1),
(239, 3, 1),
(240, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_paomai`
--

CREATE TABLE `project_paomai` (
  `paomai_id` int(11) NOT NULL COMMENT 'เป้าหมาย',
  `project_quantity` text COMMENT 'เชิงปริมาณ',
  `project_quality` text COMMENT 'เชิงคูณภาพ',
  `project_time` text COMMENT 'เชิงเวลา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_paomai`
--

INSERT INTO `project_paomai` (`paomai_id`, `project_quantity`, `project_quality`, `project_time`) VALUES
(1, '111', '222', NULL),
(2, '333', '444', NULL),
(3, 'Et molestiae ullamco fuga Voluptate nulla voluptatem id magnam sit ad iste ea labore saepe cum quia qui', 'Laboris occaecat consequatur possimus quidem eum', NULL),
(4, 'Dolorum est vitae excepturi dolor autem culpa est qui labore in qui esse ad sed inventore tempora', 'Quibusdam perspiciatis ut consequatur et cupidatat eum ratione at elit consequatur id', NULL),
(5, 'Dolorum est vitae excepturi dolor autem culpa est qui labore in qui esse ad sed inventore tempora', 'Quibusdam perspiciatis ut consequatur et cupidatat eum ratione at elit consequatur id', NULL),
(6, 'Quis velit ex vero magna itaque ut veniam et ea rerum', 'Veniam voluptas ea maxime pariatur Est ut mollitia voluptate Nam quo unde quibusdam aute', NULL),
(7, 'Quis velit ex vero magna itaque ut veniam et ea rerum', 'Veniam voluptas ea maxime pariatur Est ut mollitia voluptate Nam quo unde quibusdam aute', NULL),
(8, 'Enim consectetur quis esse pariatur Ducimus iste laboris autem velit iusto eu quo iure rerum ut ullam mollitia voluptas', 'Deleniti nemo exercitationem quia accusantium nesciunt dolorum est distinctio Inventore rerum accusantium quam tempore totam eligendi cupiditate et', NULL),
(9, 'Velit aut fugit aliquip fugiat a aut provident placeat est', 'Odit enim quia in impedit ducimus', NULL),
(10, 'Laborum soluta sint excepturi veniam sit tempore eveniet aliqua Dolores', 'Consequatur harum ut aliquam officia corrupti ad aut nihil aliquip odit quaerat quis totam officiis', NULL),
(11, 'เชิงปริมาณเชิงปริมาณเชิงปริมาณ', 'เชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพ', NULL),
(12, 'หกด', 'หกด', NULL),
(13, 'asd', 'asd', NULL),
(14, 'asd', 'asd', NULL),
(15, 'asd', 'asd', NULL),
(16, 'asd', 'asd', NULL),
(17, 'asd', 'asd', NULL),
(18, 'asd', 'asd', NULL),
(19, 'asd', 'asd', NULL),
(20, 'asd', 'asd', NULL),
(21, 'asd', 'asd', NULL),
(22, 'asdsa', 'dsad', NULL),
(23, 'asd', 'asd', NULL),
(24, 'asd', 'asd', NULL),
(25, 'asd', 'asd', NULL),
(26, 'asd', 'asd', NULL),
(27, 'asd', 'asd', NULL),
(28, 'asd', 'asd', NULL),
(29, '111', '222', NULL),
(30, '111', '222', NULL),
(31, '111', '222', NULL),
(32, '111', '222', NULL),
(33, 'เชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณ', 'เชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพ', NULL),
(34, 'Recusandae Aute qui incididunt perferendis recusandae', 'Soluta ipsam ipsum est aperiam laboriosam aut magni lorem vitae aliquam animi pariatur Qui nostrud dolor voluptatem nemo expedita', NULL),
(35, 'Recusandae Aute qui incididunt perferendis recusandae', 'Soluta ipsam ipsum est aperiam laboriosam aut magni lorem vitae aliquam animi pariatur Qui nostrud dolor voluptatem nemo expedita', NULL),
(36, 'Recusandae Aute qui incididunt perferendis recusandae', 'Soluta ipsam ipsum est aperiam laboriosam aut magni lorem vitae aliquam animi pariatur Qui nostrud dolor voluptatem nemo expedita', NULL),
(37, 'asd', 'sad', NULL),
(38, 'asd', 'sad', NULL),
(39, 'asd', 'sad', NULL),
(40, 'asd', 'sad', NULL),
(41, 'asd', 'sad', NULL),
(42, 'asd', 'sad', NULL),
(43, 'asd', 'sad', NULL),
(44, 'asd', 'sad', NULL),
(45, 'asd', 'sad', NULL),
(46, 'asdsa', 'dsad', NULL),
(47, 'asdsa', 'dsad', NULL),
(48, 'dfg', 'dfg', NULL),
(49, 'dfg', 'dfg', NULL),
(50, 'Nisi recusandae Dignissimos nulla et qui veniam quia quaerat dolorem pariatur Numquam', 'Error do culpa aut iure eligendi autem numquam Nam omnis molestias', NULL),
(51, 'Eveniet distinctio Ut labore sunt fugiat expedita sed necessitatibus nulla sed', 'Quas neque dolor delectus dolore', NULL),
(52, 'Eveniet distinctio Ut labore sunt fugiat expedita sed necessitatibus nulla sed', 'Quas neque dolor delectus dolore', NULL),
(53, 'asd', 'sad', NULL),
(54, 'Provident tempore illum eos amet nesciunt', 'Porro nisi est veritatis quam', NULL),
(55, 'Quam quidem voluptatem sit doloremque sint enim beatae blanditiis cupidatat dolore libero accusantium aut ea laborum rerum ea magnam aliquip', 'Eum optio suscipit quasi veniam voluptatem sit id assumenda voluptatem neque dolor dolores consequat Eos', NULL),
(56, 'Lorem amet et autem explicabo Ea nulla aut ullam aperiam tenetur voluptas quia quia qui placeat', 'Culpa nihil voluptate architecto sit autem natus libero quasi accusamus', NULL),
(57, 'Molestiae maiores aut accusamus commodi qui quas ut sint culpa reprehenderit nostrum sint consequatur illum', 'Qui error proident ut impedit ullamco eius', NULL),
(58, 'Molestiae maiores aut accusamus commodi qui quas ut sint culpa reprehenderit nostrum sint consequatur illum', 'Qui error proident ut impedit ullamco eius', NULL),
(59, 'dasdasdasd', 'sadasdasdasdasdasd', NULL),
(60, 'กดกดเกดเ', 'กดเกดเ', NULL),
(61, 'dasdasdasd', 'sadasdasdasdasdasd', NULL),
(62, 'กดกดเกดเ', 'กดเกดเ', NULL),
(63, 'กหดหกด', 'กดเกดเดกเ', NULL),
(64, '', '', NULL),
(65, 'กดกดเกดเ', 'กดเกดเ', NULL),
(66, 'กดกดเกดเ', 'กดเกดเ', NULL),
(67, 'กดกดเกดเ', 'กดเกดเ', NULL),
(68, 'asdasd', 'asdasdasd', NULL),
(69, 'asd', 'asd', NULL),
(70, 'asd', 'asd', NULL),
(71, 'dfg', 'dfg', NULL),
(72, 'asd', 'asd', NULL),
(73, 'uio', 'uio', NULL),
(74, 'asd', 'asd', NULL),
(75, 'asd', 'asd', NULL),
(76, 'sad', 'asd', NULL),
(77, 'asdas', 'd', NULL),
(78, 'sad', 'asd', NULL),
(79, 'sad', 'asd', NULL),
(80, 'sad', 'asd', NULL),
(81, 'sad', 'asd', NULL),
(82, 'sad', 'asd', NULL),
(83, 'sad', 'asd', NULL),
(84, 'asdas', 'd', NULL),
(85, 'asdas', 'd', NULL),
(86, 'asdas', 'd', NULL),
(87, 'sdf', 'sdf', NULL),
(88, '', '', NULL),
(89, 'sad', 'asd', NULL),
(90, 'sad', 'asd', NULL),
(91, 'sad', 'asd', NULL),
(92, 'sad', 'asd', NULL),
(93, 'dsf', 'sdf', NULL),
(94, '', '', NULL),
(95, '', '', NULL),
(96, '', '', NULL),
(97, '', '', NULL),
(98, '', '', NULL),
(99, '', '', NULL),
(100, '', '', NULL),
(101, '11', '22', '33'),
(102, '11', '22', '334'),
(103, 'aa', 'bb', 'cc'),
(104, 'aa', 'bb', 'dd'),
(105, 'aa', 'bb', 'dd'),
(106, 'aa', 'bb', 'dd'),
(107, 'aa', 'bb', 'dd'),
(108, 'aa', 'bb', 'dd'),
(109, 'aa', 'bb', 'dd'),
(110, 'aa', 'bb', 'cc'),
(111, 'aa', 'bb', 'cc'),
(112, 'aa', 'bb', 'cc'),
(113, 'aa', 'bb', 'cc'),
(114, 'aa', 'bb', 'cc'),
(115, 'aa', 'bb', 'cc'),
(116, 'aa', 'bb', 'cc'),
(117, 'aa', 'bb', 'cc'),
(118, '11', '22', '334'),
(119, 'aa', 'bb', 'cc'),
(120, 'aa', 'bb', 'cc'),
(121, 'aa', 'bb', 'cc'),
(122, 'aa', 'bb', 'cc'),
(123, 'aa', 'bb', 'cc'),
(124, 'aa', 'bb', 'cc'),
(125, 'aa', 'bb', 'cc'),
(126, 'aa', 'bb', 'cc'),
(127, 'aa', 'bb', 'cc'),
(128, 'aa', 'bb', 'cc'),
(129, 'aa', 'bb', 'cc'),
(130, 'aa', 'bb', 'cc'),
(131, 'aa', 'bb', 'cc'),
(132, 'aa', 'bb', 'cc'),
(133, 'aa', 'bb', 'cc'),
(134, 'aa', 'bb', 'cc'),
(135, 'aa', 'bb', 'cc'),
(136, 'aa', 'bb', 'cc'),
(137, 'aa', 'bb', 'cc'),
(138, 'aa', 'bb', NULL),
(139, 'aa', 'bb', NULL),
(140, 'aa', 'bb', NULL),
(141, 'aa', 'bb', NULL),
(142, 'aa', 'bb', NULL),
(143, 'aa', 'bb', NULL),
(144, 'aa', 'bb', NULL),
(145, 'aa', 'bb', NULL),
(146, 'aa', 'bb', NULL),
(147, 'aa', 'bb', NULL),
(148, 'aa', 'bb', NULL),
(149, 'aa', 'bb', NULL),
(150, 'aa', 'bb', NULL),
(151, 'aa', 'bb', NULL),
(152, 'aa', 'bb', NULL),
(153, 'aa', 'bb', NULL),
(154, 'aa', 'bb', NULL),
(155, 'aa', 'bb', NULL),
(156, 'aa', 'bb', NULL),
(157, 'aa', 'bb', NULL),
(158, 'aa', 'bb', NULL),
(159, 'aa', 'bb', NULL),
(160, 'aa', 'bb', NULL),
(161, 'aa', 'bb', NULL),
(162, 'aa', 'bb', NULL),
(163, 'aa', 'bb', NULL),
(164, 'aa', 'bb', NULL),
(165, 'aa', 'bb', NULL),
(166, 'aa', 'bb', NULL),
(167, 'aa', 'bb', NULL),
(168, 'aa', 'bb', NULL),
(169, '11', '22', '334'),
(170, 'sad', 'asd', ''),
(171, '11', '22', '334'),
(172, '11', '22', '334'),
(173, 'aa', 'bb', NULL),
(174, 'aa', 'bb', NULL),
(175, 'aa', 'bb', NULL),
(176, 'aa', 'bb', NULL),
(177, 'aa', 'bb', NULL),
(178, 'aa', 'bb', NULL),
(179, 'aa', 'bb', NULL),
(180, 'aa', 'bb', NULL),
(181, 'aa', 'bb', NULL),
(182, 'aa', 'bb', NULL),
(183, 'aa', 'bbt', NULL),
(184, 'aa', 'bbt', NULL),
(185, 'aa', 'bbt', '111'),
(186, '11', '22', '334'),
(187, 'sad', 'asd', ''),
(188, '11', '22', '334'),
(189, '11', '22', '334'),
(190, '11', '22', '334'),
(191, 'aa', 'bbt', '111');

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
  `plan_project_key` varchar(255) NOT NULL COMMENT 'อ้างอิง project'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_plan`
--

INSERT INTO `project_plan` (`plan_id`, `plan_process`, `plan_detail`, `plan_date`, `plan_place`, `plan_project_key`) VALUES
(36, 1, 'sdf', '2018-10-22', 'sad', 'Z76hItJGk-Tbxii'),
(37, 3, 'Aspernatur eum sit est consequatur Accusantium et fugiat magnam officiis in aliquip beatae est aut iusto', '0000-00-00', 'Ab qui perspiciatis quis deleniti laboriosam id enim exercitationem quis', 'YlZf5jn6Vcr7npq'),
(38, 2, 'Excepteur voluptas dolor tempor distinctio Ut veniam ad ipsa quo quos est earum autem aut', '0000-00-00', 'Aute nisi cupiditate minima et sed sed occaecat proident deserunt perspiciatis sapiente non animi', 'FTdSxx98v7h03pS'),
(39, 2, 'Excepteur voluptas dolor tempor distinctio Ut veniam ad ipsa quo quos est earum autem aut', '0000-00-00', 'Aute nisi cupiditate minima et sed sed occaecat proident deserunt perspiciatis sapiente non animi', 'MCt3ljejyVTT9vW'),
(40, 3, 'Maxime omnis commodi in est quia non reprehenderit ad eum officia rerum quae fuga', '0000-00-00', 'Doloribus aliquam non quo deleniti qui reiciendis', 'aRzYmjTk5uhNETZ'),
(41, 3, 'Maxime omnis commodi in est quia non reprehenderit ad eum officia rerum quae fuga', '0000-00-00', 'Doloribus aliquam non quo deleniti qui reiciendis', 'Ea-hR-06CBPppeO'),
(42, 2, 'Eveniet vel quisquam in reprehenderit esse sed quis pariatur Distinctio Aliquid quia error deserunt', '0000-00-00', 'Quam voluptatem id suscipit assumenda ratione voluptatibus id quo omnis qui', 'd4s8FSBthZPVJ6j'),
(43, 3, 'Unde deleniti amet quis nihil commodo magna et similique sed elit qui sit', '2018-10-19', 'Temporibus non id quo possimus excepteur qui deserunt voluptates reprehenderit eveniet cupidatat sun', 'AuWyzcRlEANIvsK'),
(44, 2, 'Voluptatibus modi id quas qui aliquid voluptas sint corporis et ut nostrud consequuntur omnis dolore ut ea excepturi maxime placeat', '0000-00-00', 'Accusamus nulla quaerat consectetur exercitation dicta lorem autem saepe quibusdam unde sint', 'DNx4uYBeEBKA8nY'),
(45, 2, 'dsad', '2018-10-12', 'Maiores eo', 'ng5YGaP0PWhLsvu'),
(46, 2, 'กหฟก', '2018-10-25', 'กหฟก', 'Hd6R66xlNTlFVeq'),
(73, 1, '33', '2018-10-24', '66', 'jJBP1EMjBHvBaE9'),
(74, 1, 'rr', '2018-10-26', 'rr', 'jJBP1EMjBHvBaE9'),
(75, 1, 'bb', '2018-10-19', 'rr', 'jJBP1EMjBHvBaE9'),
(82, 1, 'ข้ออนุมัติโครงการ', '2018-10-25', 'nan', 'zGnwiFwRBpfvkAo'),
(83, 2, '546', '2018-10-27', '465', 'zGnwiFwRBpfvkAo'),
(84, 1, 'qqqqqqqqq', '2018-10-18', 'nan', 'A3csxykH1uxBPlS'),
(85, 1, 'แต่งตั้งคณะกรรมการดำเนินงาน', '2018-10-25', 'ห้องสังคมศาสตร์', 'zGnwiFwRBpfvkAo'),
(88, 2, 'Irure quos impedit nisi modi veritatis odio accusamus eos culpa minus nemo cupiditate', '2563-06-24', 'Quis numquam perspiciatis quis ut id hic eaque ratione in quasi rerum similique autem id eos necessi', 'VKdm6ovf3isfknf'),
(89, 2, 'dfg', '2561-10-18', 'dfg', 'CmNhnpfyZbm3S_N'),
(101, 2, 'dfg', '2561-10-18', 'dfg', 'MaxtpGf6_OYu_ix'),
(102, 1, 'plan', '2561-10-17', 'sadsad', 'MaxtpGf6_OYu_ix'),
(109, 1, '55', '2018-10-27', '55', 'Q5BTI8Vq8n78IAn'),
(110, 2, '6', '2018-10-19', '66', 'Q5BTI8Vq8n78IAn'),
(111, 1, '77', '2018-10-20', '77', 'Q5BTI8Vq8n78IAn'),
(113, 1, '222', '2018-10-25', '5646', 'tcBVbs1Id_TC0Z2'),
(114, 2, 'Voluptate ut amet lorem voluptatibus rerum tempore ipsum ex non consequatur veritatis aliquam fuga Et qui repellendus Dolor eum magni', '0000-00-00', 'Sint suscipit excepturi velit quasi debitis rerum non et esse qui dicta non sint veniam', 'UIK_Sd0EZ8UtUy3'),
(116, 2, 'Minim sit Nam dignissimos consequuntur aut et aut nostrum vel eiusmod exercitation assumenda ullam voluptatem suscipit sed', '0000-00-00', 'Laboriosam praesentium earum veritatis officia earum iusto est dolorum nulla pariatur Dolore mollit ', '6lWnte3QAZF4auA'),
(117, 1, 'sad', '2561-10-27', 'fjghj', 'gyQZoIVe-ZhDJE2'),
(118, 2, 'Non est aliqua Ut eum in aliquip optio sint dolor porro quasi cum voluptas ea delectus id qui ea', '2018-10-11', 'Commodi natus odit sit asperiores sequi error delectus et perferendis aut velit dolor qui', 'tBPoHuS5WHLK5Au'),
(119, 3, 'Quia vitae alias minim dolorem magna id voluptatem nobis obcaecati rerum minim officia', '0000-00-00', 'Officia officia ut voluptatem cum', 'r_WLs3wFNx5UPzM'),
(120, 3, 'Ex quia sunt quibusdam adipisicing molestiae optio autem itaque est quos in molestiae', '0000-00-00', 'A minima vero ad excepturi anim distinctio', 'Yjfe1aRgoi0bv0-'),
(122, 3, 'Placeat aut occaecat laudantium architecto assumenda aute enim dignissimos quaerat eveniet est sit sunt et', '2018-10-17', 'Aliquid quo laudantium corrupti magna praesentium hic minus eius id unde quam nulla', 'Y4krjsBiZMNLkCI'),
(125, 2, 'zdsfsdf', '2561-10-30', 'sdfsdfsdf', 'gdBL-siug1yr7PI'),
(127, 2, 'เดกปเดก', '2018-10-01', 'ัดเ้่ด่ัดีัแ', 'f8yDLVV8FRg1jYk'),
(130, 2, 'กดเด้ดเ้', '2018-10-12', 'jhgvbhjvhj', 'BSC7QmMwzVkH2NE'),
(131, 1, '3esfd', '2018-11-29', 'asd', 'BSC7QmMwzVkH2NE'),
(132, 1, 'asd', '2018-11-29', 'asdasd', 'BSC7QmMwzVkH2NE'),
(133, 1, 'asd', '2018-11-29', 'asd', 'BSC7QmMwzVkH2NE'),
(134, 1, 'asd', '2018-11-29', 'asd', 'BSC7QmMwzVkH2NE'),
(135, 1, 'asd', '2018-11-23', 'asd', 'BSC7QmMwzVkH2NE'),
(136, 2, '456', '2018-11-23', '456', 'BSC7QmMwzVkH2NE'),
(137, 1, '234', '2018-11-10', '234234', 'QoJSLZTj-wpAFtE'),
(138, 2, '234', '2018-11-29', '324234234', 'QoJSLZTj-wpAFtE'),
(139, 2, 'dsadasd', '2018-11-24', 'dsadasdasd', '_-hUCQWChIvIeWC'),
(140, 1, 'asd', '2561-12-14', 'asd', 'GE1YvMTqFT9gQx9'),
(141, 1, 'dfg', '2018-12-20', 'dfgdfg', 'UMDWzjbJI4bpamO'),
(142, 1, '33', '2018-12-21', 'ert', 'hpeBAD8nI5hpHyw'),
(143, 1, 'uio', '2561-12-19', 'uio', 'ywQ_SMQH5PJD0rO'),
(145, 2, 'sdf', '2018-12-08', 'sdf', 'UxNwR7IpzmkeNkP'),
(148, 2, 'asd', '2561-12-22', 'asd', 'fORB2bk73ajTJQr'),
(156, 1, 'dsf', '2018-12-19', 'sdf', 'RpENWe1o-_Loy_O'),
(157, 3, 'sdf', '2018-12-13', 'sdf', 'k7jX1LVAwmedtv5'),
(161, 2, 'asd', '2561-12-22', 'asd', 'VphFEx85HZ9lTja'),
(162, 1, '324', '2018-12-12', '324324', 'ePL2VF_9GGSEoZA'),
(249, 2, 'asd', '2561-12-12', 'asd', 'TILrut_QgeiiKYt'),
(252, 2, 'sad', '2562-01-19', 'asd', 'sa2KNck9PCiIlqk'),
(253, 1, 'dsad', '2019-01-18', 'asd', 'y7cCuv2K4rCd9D5');

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
(2, 'ยุทธศาสตร์ 2');

-- --------------------------------------------------------

--
-- Table structure for table `strategy`
--

CREATE TABLE `strategy` (
  `strategy_id` int(11) NOT NULL,
  `strategy_name` varchar(255) NOT NULL COMMENT 'กลยุทธ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strategy`
--

INSERT INTO `strategy` (`strategy_id`, `strategy_name`) VALUES
(1, 'กลยุทธ์ 1'),
(2, 'กลยุทธ์ 11');

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
  ADD KEY `fk_activity_element1_idx` (`element_element_id`),
  ADD KEY `fk_activity_product1_idx` (`product_product_id`),
  ADD KEY `fk_activity_project_responsible1_idx` (`responsible_by`),
  ADD KEY `fk_activity_project_laksana1_idx` (`project_laksana_id`),
  ADD KEY `fk_activity_project_paomai1_idx` (`project_paomai_id`),
  ADD KEY `fk_activity_project_plan1_idx` (`project_plan_id`),
  ADD KEY `fk_activity_budget_type1_idx` (`budget_type_id`),
  ADD KEY `fk_activity_budget_details1_idx` (`budget_details_id`),
  ADD KEY `fk_activity_lastpage1_idx` (`lastpage_id`),
  ADD KEY `fk_activity_managers1_idx` (`created_by`),
  ADD KEY `fk_activity_consistency1_idx` (`activity_consistency_id`);

--
-- Indexes for table `activity_files`
--
ALTER TABLE `activity_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `fk_activity_files_activity1_idx` (`activity_id`);

--
-- Indexes for table `budget_details`
--
ALTER TABLE `budget_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `budget_type`
--
ALTER TABLE `budget_type`
  ADD PRIMARY KEY (`budget_type_id`);

--
-- Indexes for table `consistency`
--
ALTER TABLE `consistency`
  ADD PRIMARY KEY (`consistency_id`),
  ADD KEY `fk_consistency_strategic1_idx` (`cons_strategic_id`),
  ADD KEY `fk_consistency_goal1_idx` (`cons_goal_id`),
  ADD KEY `fk_consistency_strategy1_idx` (`cons_strategy_id`),
  ADD KEY `fk_consistency_indicator1_idx` (`cons_indicator_id`);

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
-- Indexes for table `lastpage`
--
ALTER TABLE `lastpage`
  ADD PRIMARY KEY (`last_id`);

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
  ADD KEY `fk_project_element1_idx` (`element_id`),
  ADD KEY `fk_project_product1_idx` (`product_id`),
  ADD KEY `fk_project_project_kpi1_idx` (`project_kpi_id`),
  ADD KEY `fk_project_project_paomai1_idx` (`projecti_paomai_id`),
  ADD KEY `fk_project_project_plan1_idx` (`project_plan_id`),
  ADD KEY `fk_project_budget_type1_idx` (`budget_budget_type`),
  ADD KEY `fk_project_lastpage1_idx` (`lastpage_id`),
  ADD KEY `fk_project_consistency1_idx` (`project_consistency_id`);

--
-- Indexes for table `project_files`
--
ALTER TABLE `project_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `fk_project_files_project1_idx` (`project_id`);

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
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_files`
--
ALTER TABLE `activity_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_details`
--
ALTER TABLE `budget_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `budget_type`
--
ALTER TABLE `budget_type`
  MODIFY `budget_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consistency`
--
ALTER TABLE `consistency`
  MODIFY `consistency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `element`
--
ALTER TABLE `element`
  MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lastpage`
--
ALTER TABLE `lastpage`
  MODIFY `last_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_kpi`
--
ALTER TABLE `project_kpi`
  MODIFY `kpi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `project_laksana`
--
ALTER TABLE `project_laksana`
  MODIFY `laksana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `project_paomai`
--
ALTER TABLE `project_paomai`
  MODIFY `paomai_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เป้าหมาย', AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `project_plan`
--
ALTER TABLE `project_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

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
  MODIFY `strategic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `strategy`
--
ALTER TABLE `strategy`
  MODIFY `strategy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_activity_budget_details_new` FOREIGN KEY (`budget_details_id`) REFERENCES `budget_details` (`detail_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_budget_type1` FOREIGN KEY (`budget_type_id`) REFERENCES `budget_type` (`budget_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_consistency1` FOREIGN KEY (`activity_consistency_id`) REFERENCES `consistency` (`consistency_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_element1` FOREIGN KEY (`element_element_id`) REFERENCES `element` (`element_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_lastpage1` FOREIGN KEY (`lastpage_id`) REFERENCES `lastpage` (`last_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_managers1` FOREIGN KEY (`created_by`) REFERENCES `managers` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_organization1` FOREIGN KEY (`organization_organization_id`) REFERENCES `organization` (`organization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project1` FOREIGN KEY (`root_project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_laksana1` FOREIGN KEY (`project_laksana_id`) REFERENCES `project_laksana` (`laksana_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_paomai1` FOREIGN KEY (`project_paomai_id`) REFERENCES `project_paomai` (`paomai_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_plan1` FOREIGN KEY (`project_plan_id`) REFERENCES `project_plan` (`plan_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_responsible1` FOREIGN KEY (`responsible_by`) REFERENCES `responsibler` (`responsible_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activity_files`
--
ALTER TABLE `activity_files`
  ADD CONSTRAINT `fk_activity_files_activity1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `consistency`
--
ALTER TABLE `consistency`
  ADD CONSTRAINT `fk_consistency_goal1` FOREIGN KEY (`cons_goal_id`) REFERENCES `goal` (`goal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consistency_indicator1` FOREIGN KEY (`cons_indicator_id`) REFERENCES `indicator` (`indicator_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consistency_strategic1` FOREIGN KEY (`cons_strategic_id`) REFERENCES `strategic` (`strategic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consistency_strategy1` FOREIGN KEY (`cons_strategy_id`) REFERENCES `strategy` (`strategy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_budget_type1` FOREIGN KEY (`budget_budget_type`) REFERENCES `budget_type` (`budget_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_consistency1` FOREIGN KEY (`project_consistency_id`) REFERENCES `consistency` (`consistency_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_element1` FOREIGN KEY (`element_id`) REFERENCES `element` (`element_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_lastpage1` FOREIGN KEY (`lastpage_id`) REFERENCES `lastpage` (`last_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_managers` FOREIGN KEY (`created_by`) REFERENCES `managers` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_organization1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_kpi1` FOREIGN KEY (`project_kpi_id`) REFERENCES `project_kpi` (`kpi_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_laksana1` FOREIGN KEY (`project_laksana_id`) REFERENCES `project_laksana` (`laksana_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_paomai1` FOREIGN KEY (`projecti_paomai_id`) REFERENCES `project_paomai` (`paomai_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_plan1` FOREIGN KEY (`project_plan_id`) REFERENCES `project_plan` (`plan_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_responsibler1` FOREIGN KEY (`responsibler_id`) REFERENCES `responsibler` (`responsible_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project_files`
--
ALTER TABLE `project_files`
  ADD CONSTRAINT `fk_project_files_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

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
