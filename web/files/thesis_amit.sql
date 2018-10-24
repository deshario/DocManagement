-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 09:41 PM
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
  `activity_status` int(11) DEFAULT NULL COMMENT 'สถานะ',
  `activity_key` varchar(255) DEFAULT NULL COMMENT 'Activity Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `root_project_id`, `activity_name`, `activity_rationale`, `activity_type`, `objective`, `evaluation`, `benefit`, `organization_organization_id`, `strategic_strategic_id`, `goal_goal_id`, `responsible_by`, `strategy_strategy_id`, `indicator_indicator_id`, `realted_subject_id`, `element_element_id`, `product_product_id`, `project_laksana_id`, `project_paomai_id`, `project_plan_id`, `budget_type_id`, `activity_money`, `budget_details_id`, `activity_status`, `activity_key`) VALUES
(2, 1, 'กิจกรรม 2', ' แนวคิดด้านการเรียนการสอนแบบก้าวหน้า หรืออีกนัยหนึ่งคือ การเรียนรู้สู่อนาคตนั้น มิได้ให้ความสำคัญกับการท่องจำ หรือการเรียนจากตำราเพียงอย่างเดียว แต่มุ่งให้ความสำคัญกับการเรียนรู้จากหลายแหล่ง มีทางเลือกที่หลากหลาย เน้นผู้เรียนเป็นศูนย์กลาง โดยผู้สอนเปลี่ยนบทบาทจากผู้ให้ เป็นผู้ส่งเสริมกระบวนการในการเรียนรู้ของผู้เรียน เพื่อกระตุ้นให้ผู้เรียนสามารถพัฒนากระบวนการคิดอย่างเป็นระบบ ส่งเสริมการเรียนรู้ด้วยตนเอง ตลอดจนการช่วยเหลือให้ผู้เรียนสามารถเข้าถึง และเลือกรับข้อมูลได้อย่างเหมาะสม เพื่อให้การพัฒนาการเรียนการสอนแบบก้าวหน้ามีประสิทธิภาพและประสิทธิผล ผู้สอนจึงต้องมีการทำวิจัยเกี่ยวกับการเรียนการสอนควบคู่กันไปด้วย เพื่อนำเอาองค์ความรู้ที่ได้ มาปรับปรุงรูปแบบการเรียนการสอนอย่างเหมาะสมกับลักษณะของผู้เรียน จากความสำคัญดังกล่าว มหาวิทยาลัยธุรกิจบัณฑิตย์ โดยศูนย์บริการวิจัย ศูนย์นวัตกรรมการเรียนการสอน ร่วมกับเครือข่ายวิจัยประชาชื่น จึงได้จัดประชุมวิชาการระดับชาติ ครั้งที่ 2 เรื่อง “การเรียนรู้สู่อนาคต : ทางเลือกที่หลากหลาย” เพื่อให้คณาจารย์ได้มีโอกาสเผยแพร่ผลการวิจัยในด้านการเรียนการสอน และเป็นเวทีแห่งการเรียนรู้และแลกเปลี่ยนความคิดเห็น ซึ่งจะเป็นประโยชน์ต่อการจัดการเรียนการสอนแบบก้าวหน้าของคณาจารย์ และนำไปสู่การเรียนรู้ในอนาคตของผู้เรียนในระดับอุดมศึกษาต่อไป', 'กิจกรรมวันสงกรานต์ปีใหม่เมือง', 'ในปัจจุบันจำนวนของผู้ป่วยที่มีความจำเป็นต้องใช้เลือดในการรักษาพยาบาล เช่น ผู้ที่ได้รับบาดเจ็บจากอุบัติเหตุ ผู้ป่วยที่ต้องเข้ารับการผ่าตัด และผู้ป่วยโรคเลือดเป็นต้น ซึ่งมีแนวโน้มเพิ่มขึ้นอย่างเห็นได้ชัด ทำให้เลือดที่มีอยู่ในคลังไม่เพียงพอต่อความต้องการ ทำให้บางครั้งมีผู้เสียชีวิตจากการขาดแคลนเลือดในการรักษาพยาบาล\r\nสาเหตุที่โลหิตขาดแคลน ที่ผ่านมามีการขาดแคลนโลหิตอย่างหนักในช่วงเดือนกุมภาพันธ์ 2558 ที่ผ่านมา แต่ทางสภากาชาดไทยได้มีการประกาศผ่านออกไปทางสื่อต่าง ๆ จนมีประชาชนให้ความสนใจเข้ามาร่วมบริจาคเป็นจำนวนมาก แต่หลังจากเดือนเมษายน 2560 ประชาชนให้ความสนใจน้อยลง ซึ่งจะส่งผลให้ปัญหาการขาดแคลนโลหิต อย่างไรก็ตามสาเหตุที่แท้จริงของการขาดแคลนเลือดในปัจจุบัน เนื่องจากการแพทย์ไทยเจริญมากขึ้น มีการใช้โลหิตมาก แต่มีประชาชนมาบริจาคน้อย จึงไม่สมดุลกันอย่างไรก็ตาม ในขณะนี้ โลหิตที่สภากาชาดได้รับจากการบริจาคในแต่ละวันว่า มีประชาชนมาบริจาคโลหิตทุกวัน วันละประมาณ  คน แต่ยังไม่เพียงพอ ซึ่งตามหลักแล้วใน 1 วันต้องการได้รับเลือดประมาณ 1,800  คน และอยากให้ประชาชนเข้ามาบริจาคโลหิต 3,000 คนต่อวัน หากประชาชนมาเพียงแค่ 1,500 คน ก็จะมีคนไข้อีกเป็นร้อยคนที่ต้องรอคิวที่ผ่านมาโรงพยาบาลแต่ละแห่งขอมา แต่สภากาชาดมีเลือดให้ไม่พอตามจำนวนที่ขอ ก็ต้องไกล่เกลี่ยกันไปให้ได้ทั่วถึง พอโรงพยาบาลกลับไป เขาก็ต้องมาดูว่าคนไข้คนไหนเจ็บหนัก คนไหนต้องผ่าตัดด่วน คนไข้เหล่านั้นต้องได้เลือดก่อน ส่วนคนที่เหลือก็ต้องรอคิว\r\n', NULL, 'sdf', 1, 2, 1, 1, 2, 1, 1, 2, 1, 77, 28, 75, 1, 500, 9, 10, 'jJBP1EMjBHvBaE9'),
(3, 1, 'กิจกกรม 3', ' แนวคิดด้านการเรียนการสอนแบบก้าวหน้า หรืออีกนัยหนึ่งคือ การเรียนรู้สู่อนาคตนั้น มิได้ให้ความสำคัญกับการท่องจำ หรือการเรียนจากตำราเพียงอย่างเดียว แต่มุ่งให้ความสำคัญกับการเรียนรู้จากหลายแหล่ง มีทางเลือกที่หลากหลาย เน้นผู้เรียนเป็นศูนย์กลาง โดยผู้สอนเปลี่ยนบทบาทจากผู้ให้ เป็นผู้ส่งเสริมกระบวนการในการเรียนรู้ของผู้เรียน เพื่อกระตุ้นให้ผู้เรียนสามารถพัฒนากระบวนการคิดอย่างเป็นระบบ ส่งเสริมการเรียนรู้ด้วยตนเอง ตลอดจนการช่วยเหลือให้ผู้เรียนสามารถเข้าถึง และเลือกรับข้อมูลได้อย่างเหมาะสม เพื่อให้การพัฒนาการเรียนการสอนแบบก้าวหน้ามีประสิทธิภาพและประสิทธิผล ผู้สอนจึงต้องมีการทำวิจัยเกี่ยวกับการเรียนการสอนควบคู่กันไปด้วย เพื่อนำเอาองค์ความรู้ที่ได้ มาปรับปรุงรูปแบบการเรียนการสอนอย่างเหมาะสมกับลักษณะของผู้เรียน จากความสำคัญดังกล่าว มหาวิทยาลัยธุรกิจบัณฑิตย์ โดยศูนย์บริการวิจัย ศูนย์นวัตกรรมการเรียนการสอน ร่วมกับเครือข่ายวิจัยประชาชื่น จึงได้จัดประชุมวิชาการระดับชาติ ครั้งที่ 2 เรื่อง “การเรียนรู้สู่อนาคต : ทางเลือกที่หลากหลาย” เพื่อให้คณาจารย์ได้มีโอกาสเผยแพร่ผลการวิจัยในด้านการเรียนการสอน และเป็นเวทีแห่งการเรียนรู้และแลกเปลี่ยนความคิดเห็น ซึ่งจะเป็นประโยชน์ต่อการจัดการเรียนการสอนแบบก้าวหน้าของคณาจารย์ และนำไปสู่การเรียนรู้ในอนาคตของผู้เรียนในระดับอุดมศึกษาต่อไป', 'กิจกรรมวันสงกรานต์ปีใหม่เมือง', 'ในปัจจุบันจำนวนของผู้ป่วยที่มีความจำเป็นต้องใช้เลือดในการรักษาพยาบาล เช่น ผู้ที่ได้รับบาดเจ็บจากอุบัติเหตุ ผู้ป่วยที่ต้องเข้ารับการผ่าตัด และผู้ป่วยโรคเลือดเป็นต้น ซึ่งมีแนวโน้มเพิ่มขึ้นอย่างเห็นได้ชัด ทำให้เลือดที่มีอยู่ในคลังไม่เพียงพอต่อความต้องการ ทำให้บางครั้งมีผู้เสียชีวิตจากการขาดแคลนเลือดในการรักษาพยาบาล\r\nสาเหตุที่โลหิตขาดแคลน ที่ผ่านมามีการขาดแคลนโลหิตอย่างหนักในช่วงเดือนกุมภาพันธ์ 2558 ที่ผ่านมา แต่ทางสภากาชาดไทยได้มีการประกาศผ่านออกไปทางสื่อต่าง ๆ จนมีประชาชนให้ความสนใจเข้ามาร่วมบริจาคเป็นจำนวนมาก แต่หลังจากเดือนเมษายน 2560 ประชาชนให้ความสนใจน้อยลง ซึ่งจะส่งผลให้ปัญหาการขาดแคลนโลหิต อย่างไรก็ตามสาเหตุที่แท้จริงของการขาดแคลนเลือดในปัจจุบัน เนื่องจากการแพทย์ไทยเจริญมากขึ้น มีการใช้โลหิตมาก แต่มีประชาชนมาบริจาคน้อย จึงไม่สมดุลกันอย่างไรก็ตาม ในขณะนี้ โลหิตที่สภากาชาดได้รับจากการบริจาคในแต่ละวันว่า มีประชาชนมาบริจาคโลหิตทุกวัน วันละประมาณ  คน แต่ยังไม่เพียงพอ ซึ่งตามหลักแล้วใน 1 วันต้องการได้รับเลือดประมาณ 1,800  คน และอยากให้ประชาชนเข้ามาบริจาคโลหิต 3,000 คนต่อวัน หากประชาชนมาเพียงแค่ 1,500 คน ก็จะมีคนไข้อีกเป็นร้อยคนที่ต้องรอคิวที่ผ่านมาโรงพยาบาลแต่ละแห่งขอมา แต่สภากาชาดมีเลือดให้ไม่พอตามจำนวนที่ขอ ก็ต้องไกล่เกลี่ยกันไปให้ได้ทั่วถึง พอโรงพยาบาลกลับไป เขาก็ต้องมาดูว่าคนไข้คนไหนเจ็บหนัก คนไหนต้องผ่าตัดด่วน คนไข้เหล่านั้นต้องได้เลือดก่อน ส่วนคนที่เหลือก็ต้องรอคิว\r\n', NULL, 'fdgdf', 1, 2, 1, 2, 2, 1, 1, 2, 2, 71, 22, 62, 1, 500, 6, 10, 'Q5BTI8Vq8n78IAn'),
(4, 1, 'กิจกรรมวันสงกรานต์ปีใหม่เมือง', 'สาเหตุที่โลหิตขาดแคลน ที่ผ่านมามีการขาดแคลนโลหิตอย่างหนักในช่วงเดือนกุมภาพันธ์ 2558 ที่ผ่านมา แต่ทางสภากาชาดไทยได้มีการประกาศผ่านออกไปทางสื่อต่าง ๆ จนมีประชาชนให้ความสนใจเข้ามาร่วมบริจาคเป็นจำนวนมาก แต่หลังจากเดือนเมษายน 2560 ประชาชนให้ความสนใจน้อยลง ซึ่งจะส่งผลให้ปัญหาการขาดแคลนโลหิต อย่างไรก็ตามสาเหตุที่แท้จริงของการขาดแคลนเลือดในปัจจุบัน เนื่องจากการแพทย์ไทยเจริญมากขึ้น มีการใช้โลหิตมาก แต่มีประชาชนมาบริจาคน้อย จึงไม่สมดุลกันอย่างไรก็ตาม ในขณะนี้ โลหิตที่สภากาชาดได้รับจากการบริจาคในแต่ละวันว่า มีประชาชนมาบริจาคโลหิตทุกวัน วันละประมาณ  คน แต่ยังไม่เพียงพอ ซึ่งตามหลักแล้วใน 1 วันต้องการได้รับเลือดประมาณ 1,800  คน และอยากให้ประชาชนเข้ามาบริจาคโลหิต 3,000 คนต่อวัน หากประชาชนมาเพียงแค่ 1,500 คน ก็จะมีคนไข้อีกเป็นร้อยคนที่ต้องรอคิวที่ผ่านมาโรงพยาบาลแต่ละแห่งขอมา แต่สภากาชาดมีเลือดให้ไม่พอตามจำนวนที่ขอ ก็ต้องไกล่เกลี่ยกันไปให้ได้ทั่วถึง พอโรงพยาบาลกลับไป เขาก็ต้องมาดูว่าคนไข้คนไหนเจ็บหนัก คนไหนต้องผ่าตัดด่วน คนไข้เหล่านั้นต้องได้เลือดก่อน ส่วนคนที่เหลือก็ต้องรอคิว', 'ในปัจจุบันจำนวนของผู้ป่วยที่มีความจำเป็นต้องใช้เลือดในการรักษาพยาบาล เช่น ผู้ที่ได้รับบาดเจ็บจากอุบัติเหตุ ผู้ป่วยที่ต้องเข้ารับการผ่าตัด และผู้ป่วยโรคเลือดเป็นต้น ซึ่งมีแนวโน้มเพิ่มขึ้นอย่างเห็นได้ชัด ทำให้เลือดที่มีอยู่ในคลังไม่เพียงพอต่อความต้องการ ทำให้บางครั้งมีผู้เสียชีวิตจากการขาดแคลนเลือดในการรักษาพยาบาล\r\nสาเหตุที่โลหิตขาดแคลน ที่ผ่านมามีการขาดแคลนโลหิตอย่างหนักในช่วงเดือนกุมภาพันธ์ 2558 ที่ผ่านมา แต่ทางสภากาชาดไทยได้มีการประกาศผ่านออกไปทางสื่อต่าง ๆ จนมีประชาชนให้ความสนใจเข้ามาร่วมบริจาคเป็นจำนวนมาก แต่หลังจากเดือนเมษายน 2560 ประชาชนให้ความสนใจน้อยลง ซึ่งจะส่งผลให้ปัญหาการขาดแคลนโลหิต อย่างไรก็ตามสาเหตุที่แท้จริงของการขาดแคลนเลือดในปัจจุบัน เนื่องจากการแพทย์ไทยเจริญมากขึ้น มีการใช้โลหิตมาก แต่มีประชาชนมาบริจาคน้อย จึงไม่สมดุลกันอย่างไรก็ตาม ในขณะนี้ โลหิตที่สภากาชาดได้รับจากการบริจาคในแต่ละวันว่า มีประชาชนมาบริจาคโลหิตทุกวัน วันละประมาณ  คน แต่ยังไม่เพียงพอ ซึ่งตามหลักแล้วใน 1 วันต้องการได้รับเลือดประมาณ 1,800  คน และอยากให้ประชาชนเข้ามาบริจาคโลหิต 3,000 คนต่อวัน หากประชาชนมาเพียงแค่ 1,500 คน ก็จะมีคนไข้อีกเป็นร้อยคนที่ต้องรอคิวที่ผ่านมาโรงพยาบาลแต่ละแห่งขอมา แต่สภากาชาดมีเลือดให้ไม่พอตามจำนวนที่ขอ ก็ต้องไกล่เกลี่ยกันไปให้ได้ทั่วถึง พอโรงพยาบาลกลับไป เขาก็ต้องมาดูว่าคนไข้คนไหนเจ็บหนัก คนไหนต้องผ่าตัดด่วน คนไข้เหล่านั้นต้องได้เลือดก่อน ส่วนคนที่เหลือก็ต้องรอคิว\r\n', 'ในปัจจุบันจำนวนของผู้ป่วยที่มีความจำเป็นต้องใช้เลือดในการรักษาพยาบาล เช่น ผู้ที่ได้รับบาดเจ็บจากอุบัติเหตุ ผู้ป่วยที่ต้องเข้ารับการผ่าตัด และผู้ป่วยโรคเลือดเป็นต้น ซึ่งมีแนวโน้มเพิ่มขึ้นอย่างเห็นได้ชัด ทำให้เลือดที่มีอยู่ในคลังไม่เพียงพอต่อความต้องการ ทำให้บางครั้งมีผู้เสียชีวิตจากการขาดแคลนเลือดในการรักษาพยาบาล\r\nสาเหตุที่โลหิตขาดแคลน ที่ผ่านมามีการขาดแคลนโลหิตอย่างหนักในช่วงเดือนกุมภาพันธ์ 2558 ที่ผ่านมา แต่ทางสภากาชาดไทยได้มีการประกาศผ่านออกไปทางสื่อต่าง ๆ จนมีประชาชนให้ความสนใจเข้ามาร่วมบริจาคเป็นจำนวนมาก แต่หลังจากเดือนเมษายน 2560 ประชาชนให้ความสนใจน้อยลง ซึ่งจะส่งผลให้ปัญหาการขาดแคลนโลหิต อย่างไรก็ตามสาเหตุที่แท้จริงของการขาดแคลนเลือดในปัจจุบัน เนื่องจากการแพทย์ไทยเจริญมากขึ้น มีการใช้โลหิตมาก แต่มีประชาชนมาบริจาคน้อย จึงไม่สมดุลกันอย่างไรก็ตาม ในขณะนี้ โลหิตที่สภากาชาดได้รับจากการบริจาคในแต่ละวันว่า มีประชาชนมาบริจาคโลหิตทุกวัน วันละประมาณ  คน แต่ยังไม่เพียงพอ ซึ่งตามหลักแล้วใน 1 วันต้องการได้รับเลือดประมาณ 1,800  คน และอยากให้ประชาชนเข้ามาบริจาคโลหิต 3,000 คนต่อวัน หากประชาชนมาเพียงแค่ 1,500 คน ก็จะมีคนไข้อีกเป็นร้อยคนที่ต้องรอคิวที่ผ่านมาโรงพยาบาลแต่ละแห่งขอมา แต่สภากาชาดมีเลือดให้ไม่พอตามจำนวนที่ขอ ก็ต้องไกล่เกลี่ยกันไปให้ได้ทั่วถึง พอโรงพยาบาลกลับไป เขาก็ต้องมาดูว่าคนไข้คนไหนเจ็บหนัก คนไหนต้องผ่าตัดด่วน คนไข้เหล่านั้นต้องได้เลือดก่อน ส่วนคนที่เหลือก็ต้องรอคิว\r\n', NULL, 'ประโยชน์ที่คาดว่าจะได้รับประโยชน์ที่คาดว่าจะได้รับประโยชน์ที่คาดว่าจะได้รับประโยชน์ที่คาดว่าจะได้รับ', 1, 3, 1, 1, 3, 1, 1, 1, 1, 82, 33, 84, 1, 50000, 11, 10, 'A3csxykH1uxBPlS');

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
(5, 'sad', 444, 'Q5BTI8Vq8n78IAn'),
(6, '454', 55, 'Q5BTI8Vq8n78IAn'),
(8, '99', 77, 'jJBP1EMjBHvBaE9'),
(9, 'rr', 55, 'jJBP1EMjBHvBaE9'),
(10, 'ค่าจ้างเหมาจัดทำป้าย', 1000, 'A3csxykH1uxBPlS'),
(11, 'ค่าจ้างเหมาอาหารมื้อเที่ยง', 6998, 'A3csxykH1uxBPlS');

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
  `project_year` varchar(4) DEFAULT NULL COMMENT 'ปีงบประมาณ',
  `project_status` int(11) DEFAULT '10' COMMENT 'สถานะโครงการ',
  `project_key` varchar(255) DEFAULT NULL COMMENT 'Project Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `organization_id`, `responsibler_id`, `project_laksana_id`, `strategic_id`, `goal_id`, `realted_subject_id`, `strategy_id`, `indicator_id`, `element_id`, `product_id`, `rationale`, `objective`, `project_kpi_id`, `projecti_paomai_id`, `lakshana_activity`, `project_plan_id`, `project_duration`, `project_location`, `project_evaluation`, `project_benefit`, `created_by`, `project_money`, `budget_budget_type`, `project_year`, `project_status`, `project_key`) VALUES
(1, 'โครงการ 1', 1, 1, 81, 2, 2, 1, 3, 2, 1, 1, ' แนวคิดด้านการเรียนการสอนแบบก้าวหน้า หรืออีกนัยหนึ่งคือ การเรียนรู้สู่อนาคตนั้น มิได้ให้ความสำคัญกับการท่องจำ หรือการเรียนจากตำราเพียงอย่างเดียว แต่มุ่งให้ความสำคัญกับการเรียนรู้จากหลายแหล่ง ', '  ตลาดการเงินมีหน้าที่สำคัญในการเป็นตัวกลางที่อำนวยความสะดวกให้ผู้ที่ต้องการเงิน (ผู้กู้/ผู้ระดมทุน) ได้พบกับผู้มีเงินเหลือ (ผู้ออม/นักลงทุน) เพื่อทำธุรกรรมกู้ยืมหรือซื้อขายแลกเปลี่ยนตราสารทางการเงินระหว่างกัน ซึ่งการระดมทุนและการลงทุนดังกล่าวเป็นกลไกสำคัญที่จะช่วยสนับสนุนการดำเนินกิจกรรมทางเศรษฐกิจและนำไปสู่การขยายตัวทางเศรษฐกิจในที่สุด​\r\n\r\n      ตลาดการเงิ​นที่มีประสิทธิภาพจะช่วยส่งเสริมภาครัฐและภาคเอกชนในการบริหารสภาพคล่อง ลดความเสี่ยงจาก maturity mismatch เพิ่มทางเลือกในการระดมทุนและการลงทุน ลดการพึ่งพาแหล่งเงินทุนภายนอกประเทศ ลดความเสี่ยงจากความผันผวนของเงินทุนเคลื่อนย้าย ซึ่งนำไปสู่เสถียรภาพของระบบการเงินด้วย​', 28, 32, 'ลักษณะกิจกรรม ลักษณะกิจกรรม ลักษณะกิจกรรม', 83, '2018-10-19 - 2018-11-13', 'nan', 'การประเมินผล การประเมินผล การประเมินผล การประเมินผล ', 'ประโยชน์ที่คาดว่าจะได้รับ ประโยชน์ที่คาดว่าจะได้รับ ประโยชน์ที่คาดว่าจะได้รับ ', 1, 20055, 1, '2563', 10, 'zGnwiFwRBpfvkAo'),
(3, 'โครงการ 2', 1, 1, 49, 2, 2, 1, 3, 2, 1, 1, ' แนวคิดด้านการเรียนการสอนแบบก้าวหน้า หรืออีกนัยหนึ่งคือ การเรียนรู้สู่อนาคตนั้น มิได้ให้ความสำคัญกับการท่องจำ หรือการเรียนจากตำราเพียงอย่างเดียว แต่มุ่งให้ความสำคัญกับการเรียนรู้จากหลายแหล่ง มีทางเลือกที่หลากหลาย เน้นผู้เรียนเป็นศูนย์กลาง โดยผู้สอนเปลี่ยนบทบาทจากผู้ให้ เป็นผู้ส่งเสริมกระบวนการในการเรียนรู้ของผู้เรียน เพื่อกระตุ้นให้ผู้เรียนสามารถพัฒนากระบวนการคิดอย่างเป็นระบบ ส่งเสริมการเรียนรู้ด้วยตนเอง ตลอดจนการช่วยเหลือให้ผู้เรียนสามารถเข้าถึง และเลือกรับข้อมูลได้อย่างเหมาะสม เพื่อให้การพัฒนาการเรียนการสอนแบบก้าวหน้ามีประสิทธิภาพและประสิทธิผล ผู้สอนจึงต้องมีการทำวิจัยเกี่ยวกับการเรียนการสอนควบคู่กันไปด้วย เพื่อนำเอาองค์ความรู้ที่ได้ มาปรับปรุงรูปแบบการเรียนการสอนอย่างเหมาะสมกับลักษณะของผู้เรียน จากความสำคัญดังกล่าว มหาวิทยาลัยธุรกิจบัณฑิตย์ โดยศูนย์บริการวิจัย ศูนย์นวัตกรรมการเรียนการสอน ร่วมกับเครือข่ายวิจัยประชาชื่น จึงได้จัดประชุมวิชาการระดับชาติ ครั้งที่ 2 เรื่อง “การเรียนรู้สู่อนาคต : ทางเลือกที่หลากหลาย” เพื่อให้คณาจารย์ได้มีโอกาสเผยแพร่ผลการวิจัยในด้านการเรียนการสอน และเป็นเวทีแห่งการเรียนรู้และแลกเปลี่ยนความคิดเห็น ซึ่งจะเป็นประโยชน์ต่อการจัดการเรียนการสอนแบบก้าวหน้าของคณาจารย์ และนำไปสู่การเรียนรู้ในอนาคตของผู้เรียนในระดับอุดมศึกษาต่อไป', '  ตลาดการเงินมีหน้าที่สำคัญในการเป็นตัวกลางที่อำนวยความสะดวกให้ผู้ที่ต้องการเงิน (ผู้กู้/ผู้ระดมทุน) ได้พบกับผู้มีเงินเหลือ (ผู้ออม/นักลงทุน) เพื่อทำธุรกรรมกู้ยืมหรือซื้อขายแลกเปลี่ยนตราสารทางการเงินระหว่างกัน ซึ่งการระดมทุนและการลงทุนดังกล่าวเป็นกลไกสำคัญที่จะช่วยสนับสนุนการดำเนินกิจกรรมทางเศรษฐกิจและนำไปสู่การขยายตัวทางเศรษฐกิจในที่สุด​\r\n\r\n      ตลาดการเงิ​นที่มีประสิทธิภาพจะช่วยส่งเสริมภาครัฐและภาคเอกชนในการบริหารสภาพคล่อง ลดความเสี่ยงจาก maturity mismatch เพิ่มทางเลือกในการระดมทุนและการลงทุน ลดการพึ่งพาแหล่งเงินทุนภายนอกประเทศ ลดความเสี่ยงจากความผันผวนของเงินทุนเคลื่อนย้าย ซึ่งนำไปสู่เสถียรภาพของระบบการเงินด้วย​', NULL, 1, 'ลักษณะกิจกรรม ลักษณะกิจกรรม ลักษณะกิจกรรม', NULL, '2018-10-19 - 2018-11-13', 'nan', 'การประเมินผล การประเมินผล การประเมินผล การประเมินผล ', 'ประโยชน์ที่คาดว่าจะได้รับ ประโยชน์ที่คาดว่าจะได้รับ ประโยชน์ที่คาดว่าจะได้รับ ', 1, 20055, 1, '2563', 10, 'zGnwiFwRBpfvkAo');

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `file_id` int(11) NOT NULL,
  `file_source` text COMMENT 'ที่อยู่ไฟล์',
  `project_id` int(11) NOT NULL COMMENT 'โครงการ'
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
(28, 'ttt', '55', 'zGnwiFwRBpfvkAo');

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
(82, 3, 1);

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
(1, '111', '222'),
(2, '333', '444'),
(3, 'Et molestiae ullamco fuga Voluptate nulla voluptatem id magnam sit ad iste ea labore saepe cum quia qui', 'Laboris occaecat consequatur possimus quidem eum'),
(4, 'Dolorum est vitae excepturi dolor autem culpa est qui labore in qui esse ad sed inventore tempora', 'Quibusdam perspiciatis ut consequatur et cupidatat eum ratione at elit consequatur id'),
(5, 'Dolorum est vitae excepturi dolor autem culpa est qui labore in qui esse ad sed inventore tempora', 'Quibusdam perspiciatis ut consequatur et cupidatat eum ratione at elit consequatur id'),
(6, 'Quis velit ex vero magna itaque ut veniam et ea rerum', 'Veniam voluptas ea maxime pariatur Est ut mollitia voluptate Nam quo unde quibusdam aute'),
(7, 'Quis velit ex vero magna itaque ut veniam et ea rerum', 'Veniam voluptas ea maxime pariatur Est ut mollitia voluptate Nam quo unde quibusdam aute'),
(8, 'Enim consectetur quis esse pariatur Ducimus iste laboris autem velit iusto eu quo iure rerum ut ullam mollitia voluptas', 'Deleniti nemo exercitationem quia accusantium nesciunt dolorum est distinctio Inventore rerum accusantium quam tempore totam eligendi cupiditate et'),
(9, 'Velit aut fugit aliquip fugiat a aut provident placeat est', 'Odit enim quia in impedit ducimus'),
(10, 'Laborum soluta sint excepturi veniam sit tempore eveniet aliqua Dolores', 'Consequatur harum ut aliquam officia corrupti ad aut nihil aliquip odit quaerat quis totam officiis'),
(11, 'เชิงปริมาณเชิงปริมาณเชิงปริมาณ', 'เชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพ'),
(12, 'หกด', 'หกด'),
(13, 'asd', 'asd'),
(14, 'asd', 'asd'),
(15, 'asd', 'asd'),
(16, 'asd', 'asd'),
(17, 'asd', 'asd'),
(18, 'asd', 'asd'),
(19, 'asd', 'asd'),
(20, 'asd', 'asd'),
(21, 'asd', 'asd'),
(22, 'asdsa', 'dsad'),
(23, 'asd', 'asd'),
(24, 'asd', 'asd'),
(25, 'asd', 'asd'),
(26, 'asd', 'asd'),
(27, 'asd', 'asd'),
(28, 'asd', 'asd'),
(29, '111', '222'),
(30, '111', '222'),
(31, '111', '222'),
(32, '111', '222'),
(33, 'เชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณเชิงปริมาณ', 'เชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพเชิงคุณภาพ');

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
(60, 1, '55', '2018-10-27', '55', 'Q5BTI8Vq8n78IAn'),
(61, 2, '6', '2018-10-19', '66', 'Q5BTI8Vq8n78IAn'),
(62, 1, '77', '2018-10-20', '77', 'Q5BTI8Vq8n78IAn'),
(73, 1, '33', '2018-10-24', '66', 'jJBP1EMjBHvBaE9'),
(74, 1, 'rr', '2018-10-26', 'rr', 'jJBP1EMjBHvBaE9'),
(75, 1, 'bb', '2018-10-19', 'rr', 'jJBP1EMjBHvBaE9'),
(82, 1, 'ข้ออนุมัติโครงการ', '2018-10-25', 'nan', 'zGnwiFwRBpfvkAo'),
(83, 2, '546', '2018-10-27', '465', 'zGnwiFwRBpfvkAo'),
(84, 1, 'qqqqqqqqq', '2018-10-18', 'nan', 'A3csxykH1uxBPlS'),
(85, 1, 'แต่งตั้งคณะกรรมการดำเนินงาน', '2018-10-25', 'ห้องสังคมศาสตร์', 'zGnwiFwRBpfvkAo');

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
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activity_files`
--
ALTER TABLE `activity_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `budget_details`
--
ALTER TABLE `budget_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_kpi`
--
ALTER TABLE `project_kpi`
  MODIFY `kpi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_laksana`
--
ALTER TABLE `project_laksana`
  MODIFY `laksana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `project_paomai`
--
ALTER TABLE `project_paomai`
  MODIFY `paomai_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เป้าหมาย', AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project_plan`
--
ALTER TABLE `project_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
  ADD CONSTRAINT `fk_activity_budget_details_new` FOREIGN KEY (`budget_details_id`) REFERENCES `budget_details` (`detail_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_budget_type1` FOREIGN KEY (`budget_type_id`) REFERENCES `budget_type` (`budget_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_element1` FOREIGN KEY (`element_element_id`) REFERENCES `element` (`element_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_goal1` FOREIGN KEY (`goal_goal_id`) REFERENCES `goal` (`goal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_indicator` FOREIGN KEY (`indicator_indicator_id`) REFERENCES `indicator` (`indicator_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_organization1` FOREIGN KEY (`organization_organization_id`) REFERENCES `organization` (`organization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project1` FOREIGN KEY (`root_project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_laksana1` FOREIGN KEY (`project_laksana_id`) REFERENCES `project_laksana` (`laksana_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_paomai1` FOREIGN KEY (`project_paomai_id`) REFERENCES `project_paomai` (`paomai_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_project_plan1` FOREIGN KEY (`project_plan_id`) REFERENCES `project_plan` (`plan_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_project_project_kpi1` FOREIGN KEY (`project_kpi_id`) REFERENCES `project_kpi` (`kpi_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_laksana1` FOREIGN KEY (`project_laksana_id`) REFERENCES `project_laksana` (`laksana_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_paomai1` FOREIGN KEY (`projecti_paomai_id`) REFERENCES `project_paomai` (`paomai_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_project_plan1` FOREIGN KEY (`project_plan_id`) REFERENCES `project_plan` (`plan_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
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
