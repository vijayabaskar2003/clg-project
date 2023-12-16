-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 11:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `aid` int(11) NOT NULL,
  `name` char(150) NOT NULL,
  `pfno` int(3) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`aid`, `name`, `pfno`, `password`) VALUES
(1, 'prakash', 123, 'prakash'),
(2, 'vijay', 456, 'vijay'),
(3, 'manikandan', 789, 'manikandan');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `sname` varchar(150) NOT NULL,
  `univregno` varchar(50) NOT NULL,
  `sage` int(11) NOT NULL,
  `sgender` varchar(5) NOT NULL,
  `scourse` varchar(150) NOT NULL,
  `slk` varchar(150) NOT NULL,
  `saddress` varchar(250) NOT NULL,
  `cname` varchar(150) NOT NULL,
  `cid` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `jobtitle` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `sid`, `sname`, `univregno`, `sage`, `sgender`, `scourse`, `slk`, `saddress`, `cname`, `cid`, `jid`, `jobtitle`, `location`, `salary`) VALUES
(18, 4, 'prakash', '10420U18028', 21, 'M', 'Computer Science', 'English ', ' 154/1, Neyveli, Prakash                   ', 'IBM', 4, 13, 'Graphics Designer', 'karnataka', 20000),
(21, 5, 'B. VIJAYABASKAR', '10420U18053', 20, 'M', 'Computer Science', 'Tamil ', '  neyveli      ', 'AMAZON', 1, 2, 'Full Stack Developer', 'Chennai', 17000),
(23, 5, 'B. VIJAYABASKAR', '10420U18053', 20, 'M', 'Computer Science', 'Tamil ', '  neyveli      ', 'prakash', 3, 12, 'Content Creator', 'Neyveli', 17000);

-- --------------------------------------------------------

--
-- Table structure for table `caccount`
--

CREATE TABLE `caccount` (
  `cid` int(11) NOT NULL,
  `companyname` char(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caccount`
--

INSERT INTO `caccount` (`cid`, `companyname`, `email`, `password`) VALUES
(1, 'AMAZON', 'amazon@gmail.com', 'amazon'),
(2, 'GOOGLE', 'google@gmail.com', 'google'),
(3, 'prakash', 'prakash@gmail.com', 'prakash'),
(4, 'IBM', 'ibm@gmail.com', 'ibm'),
(5, 'TECH TAMIL PRAKASH', 'techtamilprakash@gmail.com', 'ttp'),
(6, 'YOUTUBE', 'youtube@gmail.com', 'youtube'),
(7, 'FACEBOOK', 'facebook@gmail.com', 'facebook'),
(8, 'Radhika & sons', 'radhika.neyveli@gmail.com', 'radhika'),
(9, 'kumar', 'kumar@gmail.com', 'kumar'),
(10, 'suriya', 'suriya@gmail.com', 'suriya');

-- --------------------------------------------------------

--
-- Table structure for table `cdetails`
--

CREATE TABLE `cdetails` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `companyname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gst` varchar(15) NOT NULL,
  `url` varchar(700) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `logo` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cdetails`
--

INSERT INTO `cdetails` (`id`, `cid`, `companyname`, `email`, `gst`, `url`, `phone`, `address`, `logo`) VALUES
(1, 1, 'AMAZON', 'amazon@gmail.com', '1234567891234am', 'amazon.com', 1234567899, 'amazon,chennai', 'logo/amazon.png'),
(3, 5, 'TECH TAMIL PRAKASH', 'techtamilprakash@gmail.com', '12345678998765T', 'youtube.com/c/TECHTAMILPRAKASH', 1234512345, '154/1,Mandarakuppam, Neyveli - 607802', 'logo/TRANSPRANT LOGO OF TECH TAMIL PRAKASH.png'),
(4, 7, 'FACEBOOK', 'facebook@gmail.com', '29AABCF5150G2ZQ', 'facebook.com', 2147483647, 'Facebook Headquarters 1 Hacker Way Menlo Park, CA 94025', 'logo/facebook.png'),
(5, 4, 'IBM', 'ibm@gmail.com', '07AAACI4403L1ZQ', 'ibm.com', 2147483647, 'No 1/124, DLF IT Park, Tower 1 A, Near L & T, Shivaji Garden, Nandambakkam Post, Ramapuram-600089.', 'logo/ibm.png'),
(6, 6, 'YOUTUBE', 'youtube@gmail.com', 'youtube12345678', 'youtube.com', 1234567893, 'youtube india, chennai', 'logo/yt.jpg'),
(7, 2, 'GOOGLE', 'google@gmail.com', 'google123456789', 'google.com', 2147483647, 'google', 'logo/google.png'),
(8, 8, 'Radhika & sons', 'radhika.neyveli@gmail.com', '1122334455', 'radhika.com', 2147483647, '12,Main road,Cuddalore.', 'logo/radhika.png'),
(9, 3, 'prakash', 'prakash@gmail.com', 'prakash12345678', 'prakash.com', 2147483647, '154/1,Mandarakuppam, Neyveli - 607802', 'logo/prakash.jpg'),
(10, 9, 'kumar', 'kumar@gmail.com', 'kumarkumarkuma1', 'kumar.com', 1122334455, 'kumar', 'logo/kumar.png'),
(11, 10, 'suriya', 'suriya@gmail.com', 'suriya12345', 'suriya.com', 1233211231, 'suriya', 'logo/suriya.png');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `companyname` varchar(150) NOT NULL,
  `jobtitle` varchar(150) NOT NULL,
  `skills` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `salary` int(11) NOT NULL,
  `cgpa` float NOT NULL,
  `jdesc` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `cid`, `companyname`, `jobtitle`, `skills`, `location`, `salary`, `cgpa`, `jdesc`, `date`) VALUES
(1, 2, 'GOOGLE', 'Full Stack Developer', 'HTML, CSS, Javascript, Jquery, DBMS', 'Bangalore', 20000, 60, 'We need Full Stack Web Developer', '2023-04-20'),
(2, 1, 'AMAZON', 'Full Stack Developer', 'HTML, CSS, Javascript, Jquery, DBMS', 'Chennai', 17000, 50, 'We need Full Stack Web Developer', '2023-04-19'),
(3, 4, 'IBM', 'java developer', 'java, java script', 'Neyveli', 13000, 55, 'game developer', '2023-04-20'),
(5, 2, 'GOOGLE', 'Full Stack Developer', 'HTML, CSS, Javascript, Jquery, DBMS', 'Chennai', 17000, 60, 'We need Full Stack Web Developer', '2023-04-05'),
(6, 2, 'GOOGLE', 'Company Management', 'manage company ', 'Neyveli', 12000, 50, 'company management', '2023-04-10'),
(7, 1, 'AMAZON', 'Sales Executive', 'Handle Customers', 'Chennai', 15000, 50, 'Checks the Sales Team and analysis ', '2023-04-24'),
(12, 3, 'prakash', 'Content Creator', 'Video Editing', 'Neyveli', 17000, 50, 'video editing skills, scripting writing', '2023-04-30'),
(13, 4, 'IBM', 'Graphics Designer', 'Adobe, Photoshop', 'karnataka', 20000, 55, 'Well experienced in Photoshop, Adobe', '2023-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `id` int(11) NOT NULL,
  `sname` varchar(150) NOT NULL,
  `sid` varchar(150) NOT NULL,
  `univregno` varchar(150) NOT NULL,
  `sem1` varchar(300) NOT NULL,
  `sem2` varchar(300) NOT NULL,
  `sem3` varchar(300) NOT NULL,
  `sem4` varchar(300) NOT NULL,
  `sem5` varchar(300) NOT NULL,
  `sem6` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`id`, `sname`, `sid`, `univregno`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`) VALUES
(5, 'prakash', '4', '10420U18028', 'marksheet/sem1.jpg', 'marksheet/sem2.jpg', 'marksheet/sem3.jpg', 'marksheet/sem4.jpg', 'marksheet/sem5.jpg', 'marksheet/sem6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `placed`
--

CREATE TABLE `placed` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `sname` varchar(150) NOT NULL,
  `sunivregno` varchar(150) NOT NULL,
  `sage` int(11) NOT NULL,
  `sgender` varchar(7) NOT NULL,
  `scourse` varchar(150) NOT NULL,
  `slk` varchar(150) NOT NULL,
  `saddress` varchar(250) NOT NULL,
  `cname` varchar(150) NOT NULL,
  `cid` int(11) NOT NULL,
  `jobtitle` varchar(150) NOT NULL,
  `jid` int(11) NOT NULL,
  `clocation` varchar(150) NOT NULL,
  `csalary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placed`
--

INSERT INTO `placed` (`id`, `sid`, `sname`, `sunivregno`, `sage`, `sgender`, `scourse`, `slk`, `saddress`, `cname`, `cid`, `jobtitle`, `jid`, `clocation`, `csalary`) VALUES
(13, 4, 'prakash', '10420U18028', 21, 'M', 'Computer Science', 'English ', ' 154/1, Neyveli, Prakash                   ', 'GOOGLE', 2, 'Full Stack Developer', 1, 'Bangalore', 20000),
(14, 4, 'prakash', '10420U18028', 21, 'M', 'Computer Science', 'English ', ' 154/1, Neyveli, Prakash                   ', 'GOOGLE', 2, 'Full Stack Developer', 5, 'Chennai', 17000),
(15, 5, 'B. VIJAYABASKAR', '10420U18053', 20, 'M', 'Computer Science', 'Tamil ', '  neyveli      ', 'GOOGLE', 2, 'Full Stack Developer', 1, 'Bangalore', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `staccount`
--

CREATE TABLE `staccount` (
  `sid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staccount`
--

INSERT INTO `staccount` (`sid`, `username`, `rollno`, `email`, `password`) VALUES
(3, 'kumar', '20cs23', 'kumar@gmail.com', 'kumar'),
(4, 'prakash', '20CS28', 'prakash@gmail.com', 'prakash'),
(5, 'vijay', '20CS53', 'vijay@gmail.com', 'vijay'),
(6, 'praveen', '20CS30', 'praveen@gmail.com', 'praveen'),
(7, 'ramu', '20cs50', 'ramu@gmail.com', 'ramu'),
(8, 'Radhika', '20csa25', 'radhika.neyveli@gmail.com', 'radhika');

-- --------------------------------------------------------

--
-- Table structure for table `stdetails`
--

CREATE TABLE `stdetails` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `universityregno` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `dateofbirth` date NOT NULL,
  `phoneno` int(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `languagesknown` varchar(50) NOT NULL,
  `selectyourcourse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stdetails`
--

INSERT INTO `stdetails` (`id`, `sid`, `universityregno`, `name`, `age`, `dateofbirth`, `phoneno`, `email`, `gender`, `address`, `languagesknown`, `selectyourcourse`) VALUES
(1, 5, '10420U18053', 'B. VIJAYABASKAR', 20, '2023-04-15', 1209876543, 'baskara@gmail.com', 'M', '  neyveli      ', 'Tamil ', 'Computer Science'),
(2, 4, '10420U18028', 'prakash', 21, '2002-06-05', 1234567891, 'prakash@gmail.com', 'M', ' 154/1, Neyveli, Prakash                   ', 'English ', 'Computer Science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caccount`
--
ALTER TABLE `caccount`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cdetails`
--
ALTER TABLE `cdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placed`
--
ALTER TABLE `placed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staccount`
--
ALTER TABLE `staccount`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `stdetails`
--
ALTER TABLE `stdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `caccount`
--
ALTER TABLE `caccount`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cdetails`
--
ALTER TABLE `cdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placed`
--
ALTER TABLE `placed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staccount`
--
ALTER TABLE `staccount`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stdetails`
--
ALTER TABLE `stdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
