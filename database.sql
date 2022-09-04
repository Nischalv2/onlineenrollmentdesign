-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table online_enrollment_design.enrollment
CREATE TABLE IF NOT EXISTS `enrollment` (
  `STID` int(10) NOT NULL,
  `MID` varchar(50) NOT NULL,
  `LID` int(10) DEFAULT NULL,
  `Block` int(10) NOT NULL,
  `Mark` int(10) DEFAULT NULL,
  `Averagemarks` int(25) DEFAULT NULL,
  PRIMARY KEY (`STID`,`MID`,`Block`),
  KEY `FK_enrollment_module` (`MID`),
  CONSTRAINT `FK_enrollment_module` FOREIGN KEY (`MID`) REFERENCES `module` (`MID`),
  CONSTRAINT `FK_enrollment_student` FOREIGN KEY (`STID`) REFERENCES `student` (`STID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table online_enrollment_design.enrollment: ~5 rows (approximately)
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
INSERT INTO `enrollment` (`STID`, `MID`, `LID`, `Block`, `Mark`, `Averagemarks`) VALUES
	(192221, 'IX606001', 100, 4, 50, 0),
	(192221, 'IX606001', 100, 7, 70, 25),
	(192221, 'IX607001', 100, 4, 50, NULL),
	(192833, 'IX607001', 200, 4, 87, 0),
	(192833, 'IX700000', 100, 6, 34, NULL);
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;

-- Dumping structure for table online_enrollment_design.enrollments_new
CREATE TABLE IF NOT EXISTS `enrollments_new` (
  `STID` int(11) NOT NULL,
  `MID` varchar(10) NOT NULL,
  `Block` int(11) DEFAULT NULL,
  PRIMARY KEY (`STID`,`MID`),
  KEY `MID` (`MID`),
  CONSTRAINT `enrollments_new_ibfk_1` FOREIGN KEY (`STID`) REFERENCES `student` (`STID`),
  CONSTRAINT `enrollments_new_ibfk_2` FOREIGN KEY (`MID`) REFERENCES `module` (`MID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table online_enrollment_design.enrollments_new: ~0 rows (approximately)
/*!40000 ALTER TABLE `enrollments_new` DISABLE KEYS */;
/*!40000 ALTER TABLE `enrollments_new` ENABLE KEYS */;

-- Dumping structure for table online_enrollment_design.lecturer
CREATE TABLE IF NOT EXISTS `lecturer` (
  `LID` int(10) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table online_enrollment_design.lecturer: ~3 rows (approximately)
/*!40000 ALTER TABLE `lecturer` DISABLE KEYS */;
INSERT INTO `lecturer` (`LID`, `Name`, `Lastname`, `email`, `address`, `salary`, `qualification`) VALUES
	(100, 'Reza', 'Rafeh', 'Reza.Rafeh@op.ac.nz', '343 Tristram Street', '50', 'pHD'),
	(200, 'Farhad', 'Mehdipour', 'Farhad.Mehdipour@op.ac.nz', 'nu', 'null', 'PhD'),
	(300, 'Mark', 'Nikora', 'mark@gmail.com', 'Hamilton', '40000', 'Master');
/*!40000 ALTER TABLE `lecturer` ENABLE KEYS */;

-- Dumping structure for table online_enrollment_design.module
CREATE TABLE IF NOT EXISTS `module` (
  `MID` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Credit` int(10) DEFAULT NULL,
  `Level` int(10) DEFAULT NULL,
  PRIMARY KEY (`MID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table online_enrollment_design.module: ~5 rows (approximately)
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` (`MID`, `Name`, `Credit`, `Level`) VALUES
	('123555555', 'car', 13, 2),
	('IX606001', 'Naresh', 25, 7),
	('IX607001', 'App Development', 15, 5),
	('IX700000', 'studio100', 15, 6);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;

-- Dumping structure for table online_enrollment_design.student
CREATE TABLE IF NOT EXISTS `student` (
  `STID` int(10) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table online_enrollment_design.student: ~2 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`STID`, `Name`, `LastName`, `email`, `Address`) VALUES
	(192221, 'James', 'Brown', 'james@yahoo.com', '32 Day Street'),
	(192833, 'John', 'snow', 'jenmith@gmail.com', '455 Queen Street');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
