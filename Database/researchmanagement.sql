-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2022 at 03:12 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `researchmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Account_ID` int(3) NOT NULL,
  `Account_Username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_Status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_Detail` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_RecentDate` datetime DEFAULT NULL,
  `Account_RegisterDate` datetime DEFAULT NULL,
  `Account_Level` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_FName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_LName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_TNum` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_Department` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_Sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Account_IDCard` varchar(13) NOT NULL,
  `Account_Age` int(3) NOT NULL,
  `Account_Birthdate` date NOT NULL,
  `Account_Avatar` varchar(100) NOT NULL,
  `Account_RecentUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `Account_Username`, `Account_Password`, `Account_Status`, `Account_Detail`, `Account_RecentDate`, `Account_RegisterDate`, `Account_Level`, `Account_FName`, `Account_LName`, `Account_TNum`, `Account_Email`, `Account_Department`, `Account_Sex`, `Account_IDCard`, `Account_Age`, `Account_Birthdate`, `Account_Avatar`, `Account_RecentUpdate`) VALUES
(1, 'pantakan21', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, '2022-01-15 21:01:17', NULL, 'Pantakan', 'Rungwannarat', '0921219001', 'pantakan-pp21@hotmail.com', 'เทคโนโลยีสารสนเทศ', 'ชาย', '1199900818188', 20, '2001-09-21', '202201151419955402.jpg', '2022-01-15 21:31:36'),
(2, 'pantakan219', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, '2022-01-15 21:28:40', NULL, 'พันธกาญจน์', 'รุ่งวรรณรัตน์', '0921219001', 'pantakan-pp219@hotmail.xn--com-qml', 'ไฟฟ้ากำลัง', 'หญิง', '1199900818188', 15, '2022-01-13', '20220115888451321.jpg', '2022-01-15 21:51:42'),
(3, 'pantakan2121', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, '2022-01-15 21:29:30', NULL, 'abc', 'def', '0921219001', 'pantakan-pp2121@hotmail.com', 'เทคโนโลยีคอมพิวเตอร์', 'ชาย', '1199900818188', 15, '2022-01-28', '202201157956046.jpg', '2022-01-15 21:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `Certificate_ID` int(3) NOT NULL,
  `Certificate_THName` varchar(50) DEFAULT NULL,
  `Certificate_ENGName` varchar(50) DEFAULT NULL,
  `Certificate_Detail` varchar(500) DEFAULT NULL,
  `Certificate_Date` datetime DEFAULT NULL,
  `Certificate_Image` varchar(100) DEFAULT NULL,
  `Certificate_File` varchar(100) DEFAULT NULL,
  `Certificate_Year` char(4) DEFAULT NULL,
  `Certificate_RecentUpdate` datetime NOT NULL,
  `Account_ID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`Certificate_ID`, `Certificate_THName`, `Certificate_ENGName`, `Certificate_Detail`, `Certificate_Date`, `Certificate_Image`, `Certificate_File`, `Certificate_Year`, `Certificate_RecentUpdate`, `Account_ID`) VALUES
(1, 'ระบบจัดการงานวิจัย', 'ResearchManagement', 'ระบบจัดการงานวิจัย', '2022-01-15 21:33:53', NULL, '202201151248643644.png', '2544', '2022-01-15 21:33:53', 1),
(2, 'test1', 'test1', '2544', '2022-01-15 21:42:28', NULL, '20220115635389446.pdf', '2544', '2022-01-15 21:42:28', 1),
(3, 'test2', 'test2', '12314123', '2022-01-15 21:46:46', NULL, '202201151367140615.pdf', '123', '2022-01-15 21:46:46', 1),
(4, 'test3', 'test3', '214', '2022-01-15 21:49:47', NULL, '202201151261138547.pdf', '2564', '2022-01-15 21:49:47', 1),
(5, 'test4', 'test4', '1241', '2022-01-15 21:49:59', NULL, '202201152005450436.pdf', '123', '2022-01-15 21:49:59', 1),
(6, 'test5', 'test5', '123', '2022-01-15 21:52:28', NULL, '202201151738794922.pdf', '51', '2022-01-15 21:52:28', 2),
(7, 'test6', 'test6', '241', '2022-01-15 21:52:40', NULL, '20220115978646792.pdf', '15', '2022-01-15 21:52:40', 2),
(8, 'test7', 'test7', '251', '2022-01-15 21:55:01', NULL, '202201151246393205.pdf', '152', '2022-01-15 21:55:01', 3),
(9, 'test8', 'test8', '123', '2022-01-15 21:55:13', NULL, '202201151082711333.pdf', '15', '2022-01-15 21:55:13', 3),
(10, 'test9', 'test9', '125', '2022-01-15 21:55:59', NULL, '202201151015370027.pdf', '1245', '2022-01-15 21:55:59', 3),
(11, 'test10', 'test10', '124', '2022-01-15 21:56:12', NULL, '202201151262798142.pdf', '123', '2022-01-15 21:56:12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `researchs`
--

CREATE TABLE `researchs` (
  `Research_ID` int(3) NOT NULL,
  `Research_THName` varchar(50) DEFAULT NULL,
  `Research_ENGName` varchar(50) DEFAULT NULL,
  `Research_StartDate` date DEFAULT NULL,
  `Research_Status` varchar(20) DEFAULT NULL,
  `Research_EndDate` date DEFAULT NULL,
  `Research_Budget` int(6) DEFAULT NULL,
  `Research_Detail` varchar(500) DEFAULT NULL,
  `Research_Image` varchar(100) DEFAULT NULL,
  `Research_File` varchar(100) DEFAULT NULL,
  `Research_Year` char(4) DEFAULT NULL,
  `Research_Date` datetime NOT NULL,
  `Research_RecentUpdate` datetime NOT NULL,
  `Account_ID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `researchs`
--

INSERT INTO `researchs` (`Research_ID`, `Research_THName`, `Research_ENGName`, `Research_StartDate`, `Research_Status`, `Research_EndDate`, `Research_Budget`, `Research_Detail`, `Research_Image`, `Research_File`, `Research_Year`, `Research_Date`, `Research_RecentUpdate`, `Account_ID`) VALUES
(1, 'โปรเจคจัดการงานวิจัย', 'ResearchManagerment', NULL, NULL, NULL, 0, 'โปรเจคจัดการงานวิจัย', NULL, '20220115524492093.png', '2564', '2022-01-15 21:33:15', '2022-01-15 21:33:15', 1),
(2, 'test1', 'test1', NULL, NULL, NULL, 123, '123', NULL, '20220115964763179.pdf', '123', '2022-01-15 21:46:06', '2022-01-15 21:46:06', 1),
(3, 'test2', 'test2', NULL, NULL, NULL, 123, '4512', NULL, '20220115510447096.pdf', '421', '2022-01-15 21:46:34', '2022-01-15 21:46:34', 1),
(4, 'test3', 'test3', NULL, NULL, NULL, 123, '1234', NULL, '20220115614579600.pdf', '123', '2022-01-15 21:50:18', '2022-01-15 21:50:18', 1),
(5, 'test4', 'test4', NULL, NULL, NULL, 123, '51', NULL, '20220115300260479.pdf', '124', '2022-01-15 21:50:29', '2022-01-15 21:50:29', 1),
(6, 'test5', 'test5', NULL, NULL, NULL, 555, '1', NULL, '20220115333349136.pdf', '555', '2022-01-15 21:50:38', '2022-01-15 21:50:38', 1),
(7, 'test6', 'test6', NULL, NULL, NULL, 124, '123', NULL, '202201151716265856.pdf', '152', '2022-01-15 21:51:58', '2022-01-15 21:51:58', 2),
(8, 'test7', 'test7', NULL, NULL, NULL, 515, '1522', NULL, '20220115273796985.pdf', '123', '2022-01-15 21:52:14', '2022-01-15 21:52:14', 2),
(9, 'test8', 'test8', NULL, NULL, NULL, 123, '12412', NULL, '202201151259071331.pdf', '1241', '2022-01-15 21:54:33', '2022-01-15 21:54:33', 3),
(10, 'test9', 'test9', NULL, NULL, NULL, 124, '124', NULL, '202201151237120926.pdf', '152', '2022-01-15 21:54:44', '2022-01-15 21:54:44', 3),
(11, 'test10', 'test10', NULL, NULL, NULL, 123, '1234', NULL, '202201151661244050.pdf', '124', '2022-01-15 21:55:35', '2022-01-15 21:55:35', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`Certificate_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `researchs`
--
ALTER TABLE `researchs`
  ADD PRIMARY KEY (`Research_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Account_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `Certificate_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `researchs`
--
ALTER TABLE `researchs`
  MODIFY `Research_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `researchs`
--
ALTER TABLE `researchs`
  ADD CONSTRAINT `researchs_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
