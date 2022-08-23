-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 06:30 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_username`, `password`, `email`) VALUES
('alok', '$2y$10$V2oy0nKu7JxDUe0nO4Ka7uDeH0DcG4G1wTLqz4TTcFQek1yQOAiyy', 'alok@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admission_title` varchar(100) NOT NULL,
  `req_qlf` varchar(500) DEFAULT NULL,
  `admission_type` varchar(500) DEFAULT NULL,
  `examd` varchar(500) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL,
  `jp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_title`, `req_qlf`, `admission_type`, `examd`, `ad`, `jp`) VALUES
('BRAC University', 'GPA 2.5 in HSC or minimum D in 3 subjects in A level\r\nGPA 2 in SSC or minimum C in 5 subjects in O level', 'Undergraduate\r\nAdmission Fees: 36,000 BDT\r\nPer Credit Fees: 3,500 BDT', 'Date: 21st October, 2021\r\nTime: 9:30 AM', NULL, 'bacu'),
('BUET', 'GPA 5 in HSC or minimum A in 3 subjects in A level\r\nGPA 5 in SSC or minimum A in 5 subjects in O level', 'Undergraduate\r\nAdmission Fees: 2,000 BDT\r\nExam form : 250 BDT', 'Date: 1st October, 2021\r\nTime: 10:00 AM', NULL, 'bacu'),
('East West University', 'GPA 2.5 in HSC or minimum D in 3 subjects in A level\r\nGPA 2 in SSC or minimum C in 5 subjects in O level', 'Undergraduate\r\nAdmission Fees: 35,000 BDT\r\nPer Credit Fees: 3,500 BDT', 'Date: 1st November, 2021\r\nTime: 9:45 AM', NULL, 'bacu'),
('North South University', 'GPA 2.5 in HSC or minimum D in 3 subjects in A level\r\nGPA 2 in SSC or minimum D in 5 subjects in O level', 'Undergraduate\r\nAdmission Fees: 40,000 BDT\r\nPer Credit Fees: 3,700 BDT', 'Date: 17 October, 2021\r\nTime: 10:00 AM', NULL, 'bacu');

-- --------------------------------------------------------

--
-- Table structure for table `applied_for`
--

CREATE TABLE `applied_for` (
  `js` varchar(20) NOT NULL,
  `jp` varchar(20) DEFAULT NULL,
  `jt` varchar(100) DEFAULT NULL,
  `application` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_for`
--

INSERT INTO `applied_for` (`js`, `jp`, `jt`, `application`) VALUES
('Huq', NULL, NULL, 'Accoutant'),
('shanto', NULL, NULL, 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_title` varchar(100) NOT NULL,
  `req_qlf` varchar(500) DEFAULT NULL,
  `req_exp` varchar(500) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL,
  `jp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_title`, `req_qlf`, `req_exp`, `company`, `ad`, `jp`) VALUES
('Accountant', 'Diploma or any sort of qualified certification in Accounting', 'Must be good with accounting and data management \r\nMust have knowledge in excel', 'Ascend Educare', NULL, 'mehedi'),
('hr', 'any', 'any', NULL, NULL, NULL),
('professor', 'phd in management', 'minimmum 5 years', 'NSU', NULL, 'mehedi'),
('Receptionist', 'HSC/A Level graduate', 'Good in public interaction and management', 'Augmenta', NULL, 'mehedi'),
('sales executive', 'Graduate in sales and marketing', 'Experienced in sales and good in customer interaction', 'Muslim Traders', NULL, 'mehedi'),
('Teacher in mathematics', 'Undergrad student must be from science background', 'Must have minimum two years experience in teaching higher mathematics', 'Pencils Education', NULL, 'mehedi');

-- --------------------------------------------------------

--
-- Table structure for table `jobprovider`
--

CREATE TABLE `jobprovider` (
  `jp_username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `companyd` varchar(1000) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pno` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobprovider`
--

INSERT INTO `jobprovider` (`jp_username`, `password`, `company`, `address`, `companyd`, `email`, `pno`, `country`, `ad`) VALUES
('fardin', '$2y$10$y4g6w7mqnRCxUdkIQ5O3jODR1mHyAnG828R..TERSf1ic9mYy/pHa', 'GP', 'gp house', 'tellecommunication company', 'fardin@gmail.com', 'bd', '', NULL),
('grameen_phone', '$2y$10$XJVmrLD5.srMl5DSj8nx6efFDqX8s1T2vXK8p2OxFSgFtSZVKp9Qa', 'GP', 'gp house', 'mobile network company', 'gp@gmail.com', 'bangladesh', '', NULL),
('mehedi', '$2y$10$QMZgr3QQLkJyH7tvZi2JXuaNDdq.x7uND9eHI3KAUGW./9NdQd6rG', 'BRACU', 'puran Dhaka', 'we are an NGO', 'mehedi.zawad@gmail.com', 'bangladesh', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `js_username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `js_ssn` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  `qlf` varchar(50) DEFAULT NULL,
  `exp` varchar(100) DEFAULT NULL,
  `proj` varchar(1000) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phno` varchar(20) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`js_username`, `password`, `js_ssn`, `fname`, `lname`, `age`, `Address`, `Country`, `skills`, `qlf`, `exp`, `proj`, `email`, `phno`, `ad`) VALUES
('Huq', '$2y$10$EolKnT6ivDr5jcTsC8DhRuvk9u/dadjSYyhpx2O24tJwV2Dhgt1N2', '5498751185741', 'Fardin', 'Huq', 23, 'Rajshahi', '', 'Marketing \r\nWeb Development\r\nProgramming', 'Undergrate CGPA 3.61', '2 Years experience in BUCC', 'Banking \r\nSoftware Developer', 'fardin@gmail.com', '01645879567', NULL),
('Salamat', '$2y$10$KUcuIRq8F.PekCL9OkZ.FuP/g5Vwh1zs/M85uWe5tL7FxOw7r/O.G', '854544546987', 'Salamat', 'Sajid', 23, 'Riaz Kazi lane Sutrapur, Bogra', '', 'Microsoft Office \r\nJava web development', 'Undergraduate CGPA 3.63', '2 years of experience in BULDF', 'Field work', 'salamat@gmail.com', '01456879987', NULL),
('shanto', '$2y$10$eATiHyAFB.YiZUEFfTU7RuSeV6g64bTCUopFw8cojYQO7ApPSuVG2', 'shanto', 'hassibul', 'sakib', 21, 'banani dhaka', '', 'microsoft word \r\nexl', 'completed BSC from BRACU', 'worked 5 years in NSU', 'BuX', 'shanto@gmail.com', '12121212121', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `student_ssn` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `groups` varchar(50) DEFAULT NULL,
  `registration_number` varchar(30) DEFAULT NULL,
  `results` varchar(1000) DEFAULT NULL,
  `interest` varchar(500) DEFAULT NULL,
  `board` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phno` varchar(20) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_username`, `password`, `student_ssn`, `fname`, `lname`, `age`, `Address`, `groups`, `registration_number`, `results`, `interest`, `board`, `email`, `phno`, `ad`) VALUES
('Hrivu', '$2y$10$y7kBsJv9DJoe4z33wTUoL.lNR6k3nn2rDEkzJeWfL.P9Oi53TNkau', 'Hrivu', 'Dipanjol', 'Karmaker', 13, 'narayanjong', '', '1515151515', 'PSC-GPA:5', 'reading books', 'dhaka', 'dipanjol@gmail.com', '78787878787', NULL),
('riya', '$2y$10$fXucbdb6Zi3PnFcR0M.GquEXBdbByOHFgXGPvW/bASUwS6hR2LFsO', 'riya', 'riya', 'ghosh', 21, '20 circular road dhanmondi', '', '19101327', 'SSC: GPA5(YWCA)\r\nHSC: GPA5(Ideal college)', 'reading books \r\nwatching movie', 'Dhaka', 'riya.ghosh@g.bracu.ac.bd', '01752920745', NULL),
('zawad', '$2y$10$kH5o6F9DjeNN0OqzhHWn7u2MqfnPwu9JNGJ0YiXVbglcDePEqMnaG', '1234', 'Mehedi Anower', 'Zawad', 23, '4/1, Ahsan  ullah road islampur, Dhaka', '', '8811881188', 'A\r\nA\r\nA\r\nB\r\nC\r\nC', 'Music', 'Edexcel', '5mzawad@gmail,com', '01718212470', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `uni_username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `uni_ssn` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `req` varchar(1000) DEFAULT NULL,
  `dep` varchar(50) DEFAULT NULL,
  `cost` varchar(100) DEFAULT NULL,
  `vission` varchar(1000) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phno` varchar(20) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uni_username`, `password`, `uni_ssn`, `fname`, `lname`, `rank`, `Address`, `Country`, `req`, `dep`, `cost`, `vission`, `email`, `phno`, `ad`) VALUES
('bacu', '$2y$10$VtR7Bl6LM/PSLPG..yjc6.b8pE9gE37F4lZVFQTP2IQyx9ejFEfj2', 'bracu', 'BRAC University', 'private', 1003, 'mohakhali', '', 'minnumum CGPA-3.00', 'CSE\r\nMNS\r\nBBS\r\nBIL', '7000BDT per credit', 'giving students quality education', 'bracu@gmail.com', '017256458', NULL),
('nsu', '$2y$10$sSt71tWxiZGIKyQEi6J4K.xFg4XuhCGA4H3kL8AFPC3v6Npxdvx2W', 'nsu', 'north south', 'university', 16, 'boshundhora', NULL, NULL, NULL, NULL, NULL, 'nsu@gmail.com', '0183232652', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_username`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_title`),
  ADD KEY `ad` (`ad`),
  ADD KEY `jp` (`jp`);

--
-- Indexes for table `applied_for`
--
ALTER TABLE `applied_for`
  ADD PRIMARY KEY (`js`),
  ADD KEY `jp` (`jp`),
  ADD KEY `jt` (`jt`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_title`),
  ADD KEY `ad` (`ad`),
  ADD KEY `jp` (`jp`);

--
-- Indexes for table `jobprovider`
--
ALTER TABLE `jobprovider`
  ADD PRIMARY KEY (`jp_username`),
  ADD KEY `ad` (`ad`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`js_username`),
  ADD UNIQUE KEY `js_ssn` (`js_ssn`),
  ADD KEY `ad` (`ad`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_username`),
  ADD UNIQUE KEY `student_ssn` (`student_ssn`),
  ADD KEY `ad` (`ad`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uni_username`),
  ADD UNIQUE KEY `uni_ssn` (`uni_ssn`),
  ADD KEY `ad` (`ad`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `admission_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `admin` (`ad_username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_ibfk_2` FOREIGN KEY (`jp`) REFERENCES `university` (`uni_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applied_for`
--
ALTER TABLE `applied_for`
  ADD CONSTRAINT `applied_for_ibfk_1` FOREIGN KEY (`js`) REFERENCES `jobseeker` (`js_username`),
  ADD CONSTRAINT `applied_for_ibfk_2` FOREIGN KEY (`jp`) REFERENCES `jobprovider` (`jp_username`),
  ADD CONSTRAINT `applied_for_ibfk_3` FOREIGN KEY (`jt`) REFERENCES `job` (`job_title`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `admin` (`ad_username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`jp`) REFERENCES `jobprovider` (`jp_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobprovider`
--
ALTER TABLE `jobprovider`
  ADD CONSTRAINT `jobprovider_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `admin` (`ad_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `jobseeker_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `admin` (`ad_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `admin` (`ad_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `university`
--
ALTER TABLE `university`
  ADD CONSTRAINT `university_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `admin` (`ad_username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
