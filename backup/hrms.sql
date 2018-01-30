-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2014 at 08:20 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrms`
--
CREATE DATABASE IF NOT EXISTS `hrms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hrms`;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `appid` int(10) NOT NULL AUTO_INCREMENT,
  `vacid` int(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(25) NOT NULL,
  `DOB` date NOT NULL,
  `qualification` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `salexp` varchar(25) NOT NULL,
  `experience` varchar(25) NOT NULL,
  `comments` text NOT NULL,
  `uploads` text NOT NULL,
  `adate` date NOT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`appid`, `vacid`, `fname`, `lname`, `contactno`, `emailid`, `DOB`, `qualification`, `gender`, `salexp`, `experience`, `comments`, `uploads`, `adate`) VALUES
(1, 1, 'raj', 'kiran', '987456321011', 'raj@gmail.coma', '0000-00-00', 'BSc', 'male', '5000 to6000', '1-2', 'welcome', 'College Presentation - 2013 (1).xlsx', '2013-12-19'),
(2, 1, 'Mahesh', 'Kiran', '789651230', 'aravinda@gmail.com', '2013-12-17', 'MCA', 'male', '200000', '1-2 Years', 'abc', 'Hotel1.xlsx', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `applicantstatus`
--

CREATE TABLE IF NOT EXISTS `applicantstatus` (
  `stid` int(10) NOT NULL AUTO_INCREMENT,
  `appid` int(10) NOT NULL,
  `empid` int(10) NOT NULL,
  `aboutapp` text NOT NULL,
  `appstatus` varchar(25) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`stid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `applicantstatus`
--

INSERT INTO `applicantstatus` (`stid`, `appid`, `empid`, `aboutapp`, `appstatus`, `date`) VALUES
(1, 121, 1, 'your r not selected', 'rejected', '0000-00-00'),
(2, 151, 1, 'JGFD', 'rejected', '0000-00-00'),
(3, 131, 1, 'JGHDJ', 'pending', '2013-12-12'),
(4, 456, 1, 'SFHGJ', 'On Process', '2013-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `dedid` int(10) NOT NULL AUTO_INCREMENT,
  `empid` int(10) NOT NULL,
  `smonth` date NOT NULL,
  `type` varchar(15) NOT NULL,
  `deductionamt` float(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`dedid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `designation` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`did`, `designation`, `description`, `status`) VALUES
(1, 'Administrator', 'Administrator', 'Enabled'),
(2, 'Interviewer', 'A formal meeting in person, especially one arranged for the assessment of the qualifications of an applicant. ', 'Enabled'),
(3, 'Manager', 'Manges the project', 'Enabled'),
(15, 'Software programmer', 'Programmer and developer of software', 'Enabled'),
(16, 'Tester', 'Tester', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `empid` int(10) NOT NULL AUTO_INCREMENT,
  `did` int(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `contactnumber` varchar(15) NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `joindate` date NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `basicpay` float(10,2) NOT NULL,
  `creatdate` date NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empid`, `did`, `fname`, `lname`, `address`, `contactnumber`, `mobilenumber`, `joindate`, `username`, `password`, `basicpay`, `creatdate`, `status`) VALUES
(1, 1, 'testadmin', 'adminln', 'adminadderss', '984555', '987456321', '2014-01-13', 'admin', '111', 0.00, '2013-12-12', 'Enabled'),
(2, 3, 'Peters', 'kirans', 'mangalore', '9874563210', '9998885559', '2013-12-02', 'peterking', '111', 1000.00, '2013-12-12', 'Enabled'),
(3, 15, 'ashf', 'jbfdsnfb', '5215', '2412', '2013-12-10', '0000-00-00', 'madhu', 'asd', 15000.00, '2013-12-12', 'Enabled'),
(4, 2, 'madhur', 'ashf', 'jbfdsnfb', '5215', '2412', '2013-12-10', 'a', '23423435', 15000.00, '2013-12-12', 'Enabled'),
(5, 0, 'king', 'england', '98746631210', '8529637410', '2014-12-31', '0000-00-00', 'peter', '123456', 10000.00, '2014-01-16', 'Enabled'),
(6, 0, 'kiran', 'udupi', '987456321', '7896541230', '2014-12-31', '0000-00-00', 'raja', '123', 50000.00, '2014-01-16', 'Enabled'),
(7, 3, 'heena', 'kirn', 'Bunts hostel', '7896541230', '9874563210', '2014-12-31', 'hn', '123456', 100000.00, '2014-01-16', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE IF NOT EXISTS `interview` (
  `interviewid` int(10) NOT NULL AUTO_INCREMENT,
  `selectionround` varchar(25) NOT NULL,
  `vacid` int(10) NOT NULL,
  `interviewfdate` datetime NOT NULL,
  `interviewtdate` datetime NOT NULL,
  `venue` text NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`interviewid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`interviewid`, `selectionround`, `vacid`, `interviewfdate`, `interviewtdate`, `venue`, `contactno`, `status`) VALUES
(1, '', 1, '2013-12-31 12:59:00', '2013-12-31 12:59:00', 'sdaf', '53453', 'disable');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `paymentid` int(10) NOT NULL AUTO_INCREMENT,
  `empid` int(10) NOT NULL,
  `smonth` date NOT NULL,
  `workingdays` int(3) NOT NULL,
  `leavestaken` int(3) NOT NULL,
  `basicpay` float(10,2) NOT NULL,
  `OTpay` float(10,2) NOT NULL,
  `allowances` float(10,2) NOT NULL,
  `otherallow` float(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`paymentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectid` int(10) NOT NULL AUTO_INCREMENT,
  `empid` int(10) NOT NULL,
  `projecttitle` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `document` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`projectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectid`, `empid`, `projecttitle`, `image`, `description`, `document`, `startdate`, `enddate`, `status`) VALUES
(1, 2, 'Android apps', 'commission.jpg', 'Android apps', '', '0000-00-00', '0000-00-00', 'Enabled'),
(2, 2, 'LodgeIN', 'custrecord.jpg', 'Android apps', '', '0000-00-00', '0000-00-00', 'Enabled'),
(3, 2, 'Dental Diary', 'emp rec.jpg', 'Android apps', '', '0000-00-00', '0000-00-00', 'Enabled'),
(4, 1, 'aaaa', '', 'ads', 'pitch1.jpg', '2013-12-12', '2013-12-19', 'Selected'),
(5, 0, '4', '12381', 'asdf', '6708', '2014-01-08', '2014-01-30', 'Enabled'),
(6, 3, 'qwerty', '30041', 'asdf', '9632', '2014-01-02', '2014-01-31', 'Enabled'),
(7, 2, 'asd', '3605Chrysanthemum.jpg', 'test', '31692fishmeal.docx', '2013-12-31', '2014-01-23', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `projectstatus`
--

CREATE TABLE IF NOT EXISTS `projectstatus` (
  `projectstid` int(10) NOT NULL AUTO_INCREMENT,
  `projectid` int(10) NOT NULL,
  `empid` int(10) NOT NULL,
  `projectelement` varchar(25) NOT NULL,
  `projectmodule` varchar(25) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `completedate` date NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`projectstid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE IF NOT EXISTS `vacancies` (
  `vacid` int(10) NOT NULL AUTO_INCREMENT,
  `empid` int(10) NOT NULL,
  `title` text NOT NULL,
  `vacancy` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `qualification` varchar(25) NOT NULL,
  `exprience` float(10,2) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `salary` varchar(25) NOT NULL,
  `ldate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`vacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`vacid`, `empid`, `title`, `vacancy`, `description`, `qualification`, `exprience`, `age`, `gender`, `salary`, `ldate`, `status`) VALUES
(1, 0, '50 VACANIES for Software tester', 'xuyz', 'pqr', '11', 32.00, '23', 'male', '10000', '2014-01-31', 'Enabled'),
(2, 0, 'sdf', 'sfs', 'safd', 'bca', 1.40, '23', 'male', '5000', '2013-12-17', 'Enabled'),
(3, 0, '50 VACANIES for Software tester', '', '1. Primarily acquiring new franchisee / sub broker.\n2. Identifying new channel partners & ensuring they are profitable\n3. Achieving targets as assigned by the organization on a monthly basis.\n4. Revenue generation through the channel\n5. Ensuring smooth induction of the franchisee\n6. Building and increasing depth in existing relationships & acquiring new franchisee / sub broker.\n7. Reporting in desired formats for due evaluation and strategy formulation\n8. Servicing of existing franchisees\n\ZShare your profiles at haris13@smcindiaonline.com    ', 'PUC', 6.80, '26 to 30', '', '', '0000-00-00', 'Enabled'),
(4, 0, 'Requirement For Software tester', 'Software tester', '1. Primarily acquiring new franchisee / sub broker.\n2. Identifying new channel partners & ensuring they are profitable\n3. Achieving targets as assigned by the organization on a monthly basis.\n4. Revenue generation through the channel\n5. Ensuring smooth induction of the franchisee\n6. Building and increasing depth in existing relationships & acquiring new franchisee / sub broker.\n7. Reporting in desired formats for due evaluation and strategy formulation\n8. Servicing of existing franchisees\n\ZShare your profiles at haris13@smcindiaonline.com    ', 'POST GRADUATE', 0.00, '10  to 20', '', '', '0000-00-00', 'Enabled'),
(5, 0, '1 VACANIES for Developer', 'Developer', '1. Primarily acquiring new franchisee / sub broker.\n2. Identifying new channel partners & ensuring they are profitable\n3. Achieving targets as assigned by the organization on a monthly basis.\n4. Revenue generation through the channel\n5. Ensuring smooth induction of the franchisee\n6. Building and increasing depth in existing relationships & acquiring new franchisee / sub broker.\n7. Reporting in desired formats for due evaluation and strategy formulation\n8. Servicing of existing franchisees\n\ZShare your profiles at haris13@smcindiaonline.com    ', 'DIPLOMA', 7.06, '15 to 30', '', '', '0000-00-00', 'Enabled'),
(6, 0, '50 VACANIES for Software Engineer', 'Software engineer', '1. Primarily acquiring new franchisee / sub broker.\n2. Identifying new channel partners & ensuring they are profitable\n3. Achieving targets as assigned by the organization on a monthly basis.\n4. Revenue generation through the channel\n5. Ensuring smooth induction of the franchisee\n6. Building and increasing depth in existing relationships & acquiring new franchisee / sub broker.\n7. Reporting in desired formats for due evaluation and strategy formulation\n8. Servicing of existing franchisees\n\ZShare your profiles at haris13@smcindiaonline.com    ', 'BCA', 0.00, '20 to 40', '', '', '0000-00-00', 'Enabled'),
(7, 0, '5 VACANIES for Software developer', 'Software developer', '1. Primarily acquiring new franchisee / sub broker.\n2. Identifying new channel partners & ensuring they are profitable\n3. Achieving targets as assigned by the organization on a monthly basis.\n4. Revenue generation through the channel\n5. Ensuring smooth induction of the franchisee\n6. Building and increasing depth in existing relationships & acquiring new franchisee / sub broker.\n7. Reporting in desired formats for due evaluation and strategy formulation\n8. Servicing of existing franchisees\n\ZShare your profiles at haris13@smcindiaonline.com    ', 'MCA', 0.00, '26 to 30', '', '', '0000-00-00', 'Enabled'),
(8, 0, '50 VACANIES for project developer', 'project developer', '1. Primarily acquiring new franchisee / sub broker.\n2. Identifying new channel partners & ensuring they are profitable\n3. Achieving targets as assigned by the organization on a monthly basis.\n4. Revenue generation through the channel\n5. Ensuring smooth induction of the franchisee\n6. Building and increasing depth in existing relationships & acquiring new franchisee / sub broker.\n7. Reporting in desired formats for due evaluation and strategy formulation\n8. Servicing of existing franchisees\n\ZShare your profiles at haris13@smcindiaonline.com    ', 'DEGREE', 0.00, '40 to 60', '', 'Rs. 11000 to Rs. 15000', '0000-00-00', 'Enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
