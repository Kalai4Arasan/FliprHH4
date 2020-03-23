-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2020 at 02:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13006371_root`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` text NOT NULL,
  `teamtype` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `visibility` varchar(10) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `bid`, `uid`, `title`, `teamtype`, `description`, `visibility`, `verified`) VALUES
(1, '5e7816a402c21', 1, 'Kalai & Team', 'Project Management', 'kalai team', 'Private', 1),
(2, '5e781af5c38c1', 1, 'Another Team', 'Education', 'Public Team', 'Public', 1),
(3, '5e781af5c38c1', 2, 'Another Team', 'Education', 'Public Team', 'Public', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `ctitle` varchar(30) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `attachment` longtext DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `tasks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`cid`, `lid`, `ctitle`, `duedate`, `attachment`, `comment`, `tasks`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'To Do'),
(2, 1, NULL, NULL, NULL, NULL, 'Doing'),
(3, 1, NULL, NULL, NULL, NULL, 'Done'),
(4, 1, 'firstTitle', '2020-03-21', 'bg1.png', 'Nothing', 'firstTitle');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `lid` int(11) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `listname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`lid`, `bid`, `listname`) VALUES
(1, '5e7816a402c21', 'Planning');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `phone`, `email`) VALUES
(1, 'kalai', '123456789', '6379014934', 'kalaisivagi@gmail.com'),
(2, 'Elango', '258258258', '1234567890', 'elangova58@gmail.com'),
(3, 'Kalaiyarasan S', '147147147', '8870385722', 'shopcokalai@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
