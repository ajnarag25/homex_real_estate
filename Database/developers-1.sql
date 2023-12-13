-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 02:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developers`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(1, 'Home Dreamers Realty and Development Corporation', '<p>Welcome to Home Dreamers Realty and Development Corporation</p>', '03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(255) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`, `fullname`) VALUES
(1, 'ajnarag25', 'ajnarag25@gmail.com', '$2y$10$2IiM7Dp.P0gnEYalIXD0A.ipTXewAfOXApQWyPlzsgrE1TvEHcDR.', '1999-08-25', '9089637505', 'AVOR JOHN');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `sid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cnum` varchar(255) DEFAULT NULL,
  `property_id` varchar(4) NOT NULL,
  `admin_agent_id` varchar(4) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `date_inquired` date NOT NULL DEFAULT current_timestamp(),
  `message` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `pstatus` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `balcony` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `hall` int(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `region` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `feature` longtext NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mapimage` varchar(300) NOT NULL,
  `topmapimage` varchar(300) NOT NULL,
  `groundmapimage` varchar(300) NOT NULL,
  `totalfloor` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `ptype` varchar(250) NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `is_approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `pstatus`, `stype`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `floor`, `size`, `price`, `region`, `province`, `city`, `barangay`, `feature`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `mapimage`, `topmapimage`, `groundmapimage`, `totalfloor`, `date`, `ptype`, `useragent`, `user_type`, `user_id`, `assign_to`, `is_approved`) VALUES
(1, 'Camella Homes', '<p>Brand New House</p>', 'land-property', 'new', 'sale', 3, 2, 2, 1, 1, '3', 25, 1000000, 'REGION IV-A (CALABARZON)', 'CAVITE', 'BACOOR CITY', 'Molino IV', 'yes', 'unnamed.jpg', 'unnamed.jpg', 'unnamed.jpg', 'unnamed.jpg', 'unnamed.jpg', 12345, 'available', '', 'unnamed.jpg', 'unnamed.jpg', '', '2023-12-09', '', 'AVOR JOHN', 'admin', '1', '', 1),
(2, 'Avida Homes', '<p>Brand New Avida Homes</p>', 'lot', 'new', 'sale', 3, 3, 2, 1, 1, '2', 255, 5000000, 'REGION V (BICOL REGION)', 'CAMARINES NORTE', 'CAPALONGA', 'Mataque', 'no', 'Screenshot 2023-12-03 230240.png', 'Screenshot 2023-12-03 230240.png', 'Screenshot 2023-12-03 230240.png', 'Screenshot 2023-12-03 230240.png', 'Screenshot 2023-12-03 230240.png', 123123, 'available', 'Screenshot 2023-12-03 230240.png', 'Screenshot 2023-12-03 230240.png', 'Screenshot 2023-12-03 230240.png', '', '2023-12-09', '', 'AVOR JOHN', 'admin', '1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `propertyimg`
--

CREATE TABLE `propertyimg` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `sid` int(50) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `admin_agent_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date_reserved` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `company_id` text NOT NULL,
  `payslip` text NOT NULL,
  `government_id_1` text NOT NULL,
  `government_id_2` text NOT NULL,
  `id_pics` text NOT NULL,
  `billing` text NOT NULL,
  `birth_marriage_cert` text NOT NULL,
  `employment_job_cert` text NOT NULL,
  `tin_passport` text NOT NULL,
  `spa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `phone`, `property_id`, `admin_agent_id`, `uid`, `date_reserved`, `payment_method`, `status`, `utype`, `message`, `company_id`, `payslip`, `government_id_1`, `government_id_2`, `id_pics`, `billing`, `birth_marriage_cert`, `employment_job_cert`, `tin_passport`, `spa`) VALUES
(3, 'Mark Zelon Naraga', 'ajnarag25@gmail.com', 2147483647, 2, 1, 1, '2023-12-09 15:44:05', 'cash', 'New', 'admin', 'send a tin number immediately - Homex trial message', 'uploads/403597842_278509914754987_1851583346126078041_n.jpg', 'uploads/Scanned-Documents.pdf', 'uploads/405493530_1037996934141553_7529391009594275096_n.jpg', 'uploads/405493530_1037996934141553_7529391009594275096_n.jpg', 'uploads/403597842_278509914754987_1851583346126078041_n.jpg', 'uploads/Scanned-Documents.pdf', 'uploads/403597842_278509914754987_1851583346126078041_n.jpg', 'uploads/405493530_1037996934141553_7529391009594275096_n.jpg', 'uploads/', 'uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL,
  `ustatus` varchar(50) NOT NULL,
  `idnum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`, `ustatus`, `idnum`) VALUES
(1, 'Mark Zelon Narag', 'marknarag25@gmail.com', '09089637505', '$2y$10$Y81aKcF6VnyhDiR00ZRoN.PuwW3JMmQ5OZ//MVEg8TiqZZJXNQqem', 'user', 'Screenshot 2023-12-03 230240.png', 'Verified', ''),
(2, 'AVOR JOHN', 'ajnarag25@gmail.com', '09089637505', '$2y$10$bvHV1vqk9uh2ZAchRUOQPeFskYnXBHSAALYFlKn9jirpToixQke5e', 'agent', '53-533519_arrow-png-arrow-png.png', 'Verified', '12312341');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
