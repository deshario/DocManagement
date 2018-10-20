-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 12:28 PM
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
  `root_project_id` int(11) NOT NULL COMMENT 'โครงการ',
  `activity_name` varchar(45) DEFAULT NULL COMMENT 'ชือกิจกรรม',
  `activity_rationale` text COMMENT 'หลักการและเหตุผล',
  `activity_type` text COMMENT 'ลักษณะกิจกรรม',
  `objective` text COMMENT 'วัตถุประสงค์',
  `evaluation` text COMMENT 'การประเมินผล',
  `benefit` text COMMENT 'ประโยช์ที่คาดว่าจะได้รับ',
  `organization_organization_id` int(11) DEFAULT NULL COMMENT 'หน่วยงาน',
  `strategic_strategic_id` int(11) DEFAULT NULL COMMENT 'ยุทธศาสตร์',
  `goal_goal_id` int(11) DEFAULT NULL COMMENT 'เป้าประสงค์',
  `responsible_by` int(11) DEFAULT NULL COMMENT 'ผู้รับผิดชอบ',
  `strategy_strategy_id` int(11) DEFAULT NULL COMMENT 'กลยุทธ์',
  `indicator_indicator_id` int(11) DEFAULT NULL COMMENT 'ตัวชี้วัด',
  `realted_subject_id` int(11) DEFAULT NULL COMMENT 'รายวิชาที่สอดคล่อง',
  `element_element_id` int(11) DEFAULT NULL COMMENT 'องค์ประกอบ',
  `product_product_id` int(11) DEFAULT NULL COMMENT 'ผลผลิต',
  `project_laksana_id` int(11) DEFAULT NULL COMMENT 'ลักษณะโครงการ',
  `project_paomai_id` int(11) DEFAULT NULL COMMENT 'เป้าหมายผลผลิต',
  `project_plan_id` int(11) DEFAULT NULL COMMENT 'กิจกรรมการดำเนินงาน',
  `budget_type_id` int(11) DEFAULT NULL COMMENT 'แหล่งที่มาของงบประมาณ',
  `activity_money` int(11) DEFAULT NULL COMMENT 'งบประมาณ',
  `budget_details_id` int(11) DEFAULT NULL COMMENT 'รายละเอียดของงบประมาณ',
  `activity_status` int(11) DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `root_project_id`, `activity_name`, `activity_rationale`, `activity_type`, `objective`, `evaluation`, `benefit`, `organization_organization_id`, `strategic_strategic_id`, `goal_goal_id`, `responsible_by`, `strategy_strategy_id`, `indicator_indicator_id`, `realted_subject_id`, `element_element_id`, `product_product_id`, `project_laksana_id`, `project_paomai_id`, `project_plan_id`, `budget_type_id`, `activity_money`, `budget_details_id`, `activity_status`) VALUES
(1, 1, 'กิจกรรม 1', 'กหฟกฟหก', 'ฟหกฟห', 'ฟหกหฟก', NULL, 'fdgdfg', 1, 2, 2, 1, 4, 2, 1, 2, 1, 27, 32, 30, 1, 600, 28, 10);

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
  `activity_id` int(11) NOT NULL COMMENT 'กิจกรรมที่อ้างอิง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budget_details`
--

INSERT INTO `budget_details` (`detail_id`, `detail_name`, `detail_price`, `activity_id`) VALUES
(3, 'buy apple', 50, 1),
(4, 'buy', 60, 1),
(5, 'buy apple', 50, 1),
(6, 'buy', 60, 1),
(14, 'buy apple', 465, 1),
(15, '10', 10, 1),
(16, 'buy objects', 22, 1),
(17, 'buy objects', 22, 1),
(18, '13', 13, 1),
(19, '13', 13, 1),
(20, 'asdasd', 33, 1),
(21, 'tt', 33, 1),
(22, 'ค่าเบียร์', 600, 1),
(23, 'ค่ากับแก้ม', 400, 1),
(24, 'Necessitatibus ut eu et quo fugiat ab ut in commodo iusto blanditiis alias occaecat aliquid dolores quae atque atque', 98, 1),
(25, 'Necessitatibus ut eu et quo fugiat ab ut in commodo iusto blanditiis alias occaecat aliquid dolores quae atque atque', 98, 1),
(26, 'Qui accusamus sit totam magnam laborฟหกe', 933, 1),
(27, 'asdasd', 32423, 1),
(28, 'ฟหก', 4535, 1);

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
(1, 'งบประมาณพิเศษ');

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
  `goal_name` varchar(45) DEFAULT NULL COMMENT 'เป้าประสงค์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`goal_id`, `goal_name`) VALUES
(1, 'เป้าประสงค์ 1'),
(2, 'เป้าประสงค์ 2');

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
(1, 'ตัวชี้วัด 1'),
(2, 'ตัวชี้วัด 2');

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
  `realted_subject_id` int(11) DEFAULT NULL COMMENT 'รายวิชาที่สอดคล่อง',
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
  `project_duration` varchar(100) DEFAULT NULL COMMENT 'ระยะเวลาดำเนิการ',
  `project_location` varchar(255) DEFAULT NULL COMMENT 'สถานที่ดำเนินการ',
  `project_evaluation` text COMMENT 'การประเมินผล',
  `project_benefit` text COMMENT 'ประโยชน์ที่คาดว่าจะได้รับ',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `project_money` int(11) DEFAULT NULL COMMENT 'งบประมาณที่มี',
  `budget_budget_type` int(11) DEFAULT NULL COMMENT 'แหล่งที่มาของงบประมาณ',
  `project_year` year(4) DEFAULT NULL COMMENT 'ปีงบประมาณ',
  `project_status` int(11) DEFAULT '10' COMMENT 'สถานะโครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `organization_id`, `responsibler_id`, `project_laksana_id`, `strategic_id`, `goal_id`, `realted_subject_id`, `strategy_id`, `indicator_id`, `element_id`, `product_id`, `rationale`, `objective`, `project_kpi_id`, `projecti_paomai_id`, `lakshana_activity`, `project_plan_id`, `project_duration`, `project_location`, `project_evaluation`, `project_benefit`, `created_by`, `project_money`, `budget_budget_type`, `project_year`, `project_status`) VALUES
(1, 'โครงการ 1', 1, 1, 26, 1, 1, 1, 3, 1, 1, 1, 'sadsadsad', 'sdfdhfgjhhgkjhkhjk', 10, 31, '', 29, '2018-11-15 00:00:00', 'nan', 'prmonphol', 'benefit', 1, 50000, 1, 2018, 10),
(2, 'myine', 2, 1, 28, 2, 1, 1, 3, 1, NULL, NULL, 'fgh', 'gh', 11, 33, 'fgh', 31, '2018-10-10 - 2018-11-16', 'fgh', 'fgh', 'fgh', 1, 555, 1, 2015, 10),
(3, 'Lillian Nelson', 1, 2, 29, 3, 2, 1, 4, 2, 2, 2, 'Delectus fugit pariatur Aut dolores et', 'Rem qui fugit consequatur harum et vel mollitia iure excepturi', 12, 34, 'Omnis voluptas labore minim explicabo', 32, 'Id est laboris consectetur minus ad aliquid exercitationem ipsum ut', 'Velit eum quibusdam laudantium esse aliquam quasi laboris odio deleniti quam cumque mollit corporis nihil et', 'Ad totam nesciunt dolorsadum asperiores aut nulla fuga Quo itaque', 'asda debitis est ipsam', 1, 6500, 1, 1997, 10);

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `file_id` int(11) NOT NULL,
  `file_source` text COMMENT 'ที่อยู่ไฟล์',
  `project_id` int(11) NOT NULL COMMENT 'โครงการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_files`
--

INSERT INTO `project_files` (`file_id`, `file_source`, `project_id`) VALUES
(1, '{\"937f27afd393bb5d88e2be58e60b9ae8.pdf\":\"หน้าปรก.pdf\"}', 1),
(2, '{\"6cca1fd47b78b7699018fe4fec176f28.pdf\":\"บทคัดย่อ.pdf\"}', 1);

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

--
-- Dumping data for table `project_kpi`
--

INSERT INTO `project_kpi` (`kpi_id`, `kpi_name`, `kpi_goal`, `kpi_owner`) VALUES
(1, 'kpi1', 'value', 1),
(2, 'fhj', 'fj', 1),
(3, 'fdgf', 'ff', 1),
(4, 'aa', 'bb', 2),
(5, 'cc', 'dd', 2),
(6, 'aa', 'bb', 1),
(7, 'cc', 'dd', 1),
(8, 'aa', 'bb', 1),
(9, 'cc', 'dd', 1),
(10, 'KPI1', 'VAL1', 1),
(11, 'fgh', 'fgh', 1),
(12, 'Rosalyn Tanner', 'Qui quo occaecat molestias aperiam ab molestiae nihil est', 1);

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
(29, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_paomai`
--

CREATE TABLE `project_paomai` (
  `paomai_id` int(11) NOT NULL COMMENT 'เป้าหมาย',
  `project_quantity` text COMMENT 'เชิงปริมาณ',
  `project_quality` text COMMENT 'เชิงคูณภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_paomai`
--

INSERT INTO `project_paomai` (`paomai_id`, `project_quantity`, `project_quality`) VALUES
(7, NULL, 'jh'),
(8, NULL, NULL),
(9, NULL, NULL),
(10, NULL, NULL),
(11, 'quanitty', NULL),
(12, 'quanitty', NULL),
(13, 'qqqqqqqqqqqq', NULL),
(14, 'qqqqqqqqqqqq', 'hah'),
(15, 'qqqqqqqqqqqq', 'qualoty546'),
(16, 'qqqqqqqqqqqq', 'qualoty546'),
(17, 'qqq', 'www'),
(18, 'rrr', 'ttt'),
(19, 'เป็นการสร้างโมเดลที่จะช่วยให้นักวิเคราะห์ระบบกับผู้ใช้สามารถสื่อสารกันเข้าใจ โดยได้บรรยายถึงลำดับของเหตุการณ์ที่ผู้ใช้ปฏิบัติการกระบวนการทำงานหนึ่งภายในระบบใดๆ โดยจริงๆแล้วตัวมันเองก็ไม่ได้บอกถึงความต้องการอย่างเป็นทางการของระบบจริงๆ หากแต่มีลักษณะที่บอกความต้องการอย่างไม่เป็นทางการโดย  ยูสเคสไดอะแกรมจะให้ภาพของการใช้งานระบบอย่างครบถ้วน ว่าระบบนั้นผู้ใช้จะสามารถใช้ทำอะไรได้บ้าง วัตถุประสงค์ของยูสเคสเพื่อใช้นำเสนอมุมมองการโต้ตอบกันระหว่างผู้ใช้กับระบบใดๆ ในการทำงานกระบวนการหนึ่งๆภายใต้ระบบใดๆ นอกจากนี้มันยังมีประโยชน์ในการใช้เป็นแนวทางในการสร้าง Test Case ของการทดสอบระบบอีกทางหนึ่งด้วย', 'ยูสเคส (Use Case) คือ ความสามารถหรือฟังก์ชันที่ระบบซอฟต์แวร์ที่จะพัฒนาโดยการเขียน Use Case สามารถเขียนได้โดยใช้วงรีและมีคำอธิบายอยู่ในวงรีนั้น ได้แก่ ยูสเคสการกำหนดสิทธิ์การเข้าใช้งาน ยูสเคสการเข้าสู่ระบบ ยูสเคสการเพิ่ม/ลบ/แก้ไขข้อมูลผู้ป่วยในและข้อมูลเจ้าหน้าที่พยาบาล ยูสเคสการบันทึกข้อมูลการบริหารยาผู้ป่วยใน ยูสเคสบันทึกข้อมูลการ'),
(20, 'sadsa', 'dasdad'),
(21, 'ghjghj', 'hfh'),
(22, 'fgdgdf', 'gfdsg'),
(23, 'dsad', 'asd'),
(24, 'Voluptatem molestiae a temporibus ipsum duis eum quis autem praesentium maxime excepturi', 'Et veniam dicta ipsam saepe'),
(25, 'Voluptatem molestiae a temporibus ipsum duis eum quis autem praesentium maxime excepturi', 'Et veniam dicta ipsam saepe'),
(26, 'pariman', 'qualioty'),
(27, 'pariman', 'qualioty'),
(28, 'Proident cumque molestiae nisi elit quam et accusamus eum vero qui autem sapienteฟหก', 'Nihil dicta ullamco ipsam bฟหกlanditiis inventore vero voluptas at beatae optio qui'),
(29, 'asd', 'sadsad'),
(30, 'asdasd', 'sadsadasd'),
(31, '', ''),
(32, 'กฟหกฟห', 'กฟหก'),
(33, 'fgh', 'fgh'),
(34, 'Optio fugiat error enim dolores eos quod accusamus labore qui irure quos aliquip ea rerum est culpa magna proident', 'Pariatur Molestiae beatae aut odio rem');

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

--
-- Dumping data for table `project_plan`
--

INSERT INTO `project_plan` (`plan_id`, `plan_process`, `plan_detail`, `plan_date`, `plan_place`, `plan_owner`) VALUES
(1, 1, 'ข้ออนุมัติโครงการ\r\n\r\n', '2018-10-10', 'nan', 1),
(2, 2, 'สรุป', '2018-10-11', 'phrae', 1),
(4, 1, 'sadsadsadsad', '2018-10-18', 'nan', 1),
(5, 1, 'sadsadsadsad', '2018-10-18', 'nan', 1),
(10, 2, 'dsad', '2018-11-02', 'nan', 1),
(11, 2, 'sadsadsadsad', '2018-10-26', '5646', 1),
(12, 1, '222', '2018-10-25', 'nan', 1),
(13, 1, '222', '2018-10-25', 'nan', 1),
(14, 2, 'esdfsdf', '2018-10-19', 'nan', 1),
(15, 2, 'sadsadsadsad', '2018-10-12', 'nan', 1),
(16, 1, 'รายแรก', '2018-10-25', 'nan', 1),
(17, 2, 'รายสอง', '2018-10-27', 'hello', 1),
(18, 3, 'dsad', '2018-10-20', 'dsadas', 1),
(19, 3, 'hgjfg', '2018-10-25', 'fjghj', 1),
(20, 3, 'dsad', '2018-10-18', 'dfgsdfg', 1),
(21, 1, 'asd', '2018-10-19', 'sad', 2),
(22, 2, 'Quidem et ut deserunt fugiat minim dolor est illum', '2018-10-26', 'Maiores eo', 2),
(23, 2, 'Quidem et ut deserunt fugiat minim dolor est illum', '2018-10-26', 'Maiores eo', 2),
(24, 2, 'ww', '2018-10-18', 'nan', 1),
(25, 2, 'ww', '2018-10-18', 'nan', 1),
(26, 2, 'Ex ipsa assumหฟenda natus aspernatur voluptatem voluptates quia pariatur Non velit', '2018-10-13', 'ปัว', 1),
(27, 1, 'asd', '2018-11-23', 'asdsa', 1),
(28, 1, 'asdas', '2018-10-25', 'asdsad', 1),
(29, 1, 'planning', '2018-10-18', 'nan', 1),
(30, 1, '435', '2018-10-18', 'nan', 1),
(31, 1, 'fgh', '2018-10-22', 'fgfgh', 1),
(32, 3, 'Qui veniam et pariatur Aliquid eos vel nihil in modi iure ipsa assumenda culpa consequuntur adipisci incidunt consequatur', '0000-00-00', 'Rem possimus officia adipisci sed optio odit cupiditate rerum tempore et excepturi', 1);

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
-- Table structure for table `realted_subject`
--

CREATE TABLE `realted_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(60) DEFAULT NULL COMMENT 'รายวิชา',
  `subject_teacher` varchar(60) DEFAULT NULL COMMENT 'อาจารย์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realted_subject`
--

INSERT INTO `realted_subject` (`subject_id`, `subject_name`, `subject_teacher`) VALUES
(1, 'วัฒนธรรมไทย', 'ฐิติพร');

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
  ADD KEY `fk_activity_project_plan1_idx` (`project_plan_id`),
  ADD KEY `fk_activity_budget_type1_idx` (`budget_type_id`),
  ADD KEY `fk_activity_budget_details1_idx` (`budget_details_id`),
  ADD KEY `fk_activity_realted_subject1_idx` (`realted_subject_id`);

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
  ADD KEY `fk_project_budget_type1_idx` (`budget_budget_type`),
  ADD KEY `fk_project_realted_subject1_idx` (`realted_subject_id`);

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
-- Indexes for table `realted_subject`
--
ALTER TABLE `realted_subject`
  ADD PRIMARY KEY (`subject_id`);

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
-- AUTO_INCREMENT for table `activity_files`
--
ALTER TABLE `activity_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_details`
--
ALTER TABLE `budget_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `budget_type`
--
ALTER TABLE `budget_type`
  MODIFY `budget_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `element`
--
ALTER TABLE `element`
  MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_kpi`
--
ALTER TABLE `project_kpi`
  MODIFY `kpi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_laksana`
--
ALTER TABLE `project_laksana`
  MODIFY `laksana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `project_paomai`
--
ALTER TABLE `project_paomai`
  MODIFY `paomai_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เป้าหมาย', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `project_plan`
--
ALTER TABLE `project_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_type`
--
ALTER TABLE `project_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `realted_subject`
--
ALTER TABLE `realted_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_activity_budget_details_new` FOREIGN KEY (`budget_details_id`) REFERENCES `budget_details` (`detail_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_budget_type1` FOREIGN KEY (`budget_type_id`) REFERENCES `budget_type` (`budget_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_activity_realted_subject1` FOREIGN KEY (`realted_subject_id`) REFERENCES `realted_subject` (`subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_strategic1` FOREIGN KEY (`strategic_strategic_id`) REFERENCES `strategic` (`strategic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_strategy1` FOREIGN KEY (`strategy_strategy_id`) REFERENCES `strategy` (`strategy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activity_files`
--
ALTER TABLE `activity_files`
  ADD CONSTRAINT `fk_activity_files_activity1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_project_realted_subject1` FOREIGN KEY (`realted_subject_id`) REFERENCES `realted_subject` (`subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_responsibler1` FOREIGN KEY (`responsibler_id`) REFERENCES `responsibler` (`responsible_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_strategic1` FOREIGN KEY (`strategic_id`) REFERENCES `strategic` (`strategic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_strategy1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`strategy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project_files`
--
ALTER TABLE `project_files`
  ADD CONSTRAINT `fk_project_files_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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