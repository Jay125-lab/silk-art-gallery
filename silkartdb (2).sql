-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 10:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silkartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artistID` int(11) NOT NULL,
  `f_Name` varchar(20) NOT NULL,
  `l_Name` varchar(20) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pswd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artistID`, `f_Name`, `l_Name`, `phoneNo`, `email`, `pswd`) VALUES
(1, 'James', 'Ndungu', 716822498, 'jndungu@gmail.com', '5d7d386857c8823682992837f50fc2bcccf6ec528f3aaaef86e20598f6921586af9782d2a131fbb2cf14d6894e06683144080f397cd153d8fb36b39a8c95f8bd'),
(2, 'Mark', 'Johnson', 758899988, 'mj@gmail.com', '3b4f122b181aeef98042c4219b554f4d76934f125c0c183494e9fa909f5f249e0ccfbd626da5851e904d5b8f66e29dbe819d2ba4fd2439f53462caaed4eeee90'),
(3, 'Jake', 'Blue', 750303045, 'jblue@gmail.com', 'd6077a19f538d5331ba96f19a590cf0ee5f39ac2d742fbf3a871af5f254040bc0fe39b1e0599c0a73cafdd6696e47869a7f4de1e5c6d02ba13e77ff951962eef');

-- --------------------------------------------------------

--
-- Table structure for table `artprofpic`
--

CREATE TABLE `artprofpic` (
  `picID` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `imgsrc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `artID` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `artFileName` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`artID`, `artistID`, `artFileName`, `price`, `status`) VALUES
(2, 1, 'IMG-630cf3a92c47b3.05521945.jpg', 50000, 'available'),
(3, 1, 'IMG-630ce2e5bfb7a8.65786409.jpg', 502000, 'available'),
(4, 1, 'IMG-630ceeca9ef358.87642342.jpg', 5000, 'available'),
(5, 1, 'IMG-630ceed5cf5bc4.75330557.jpg', 10000, 'available'),
(6, 2, 'IMG-630cf3a92c47b3.05521945.jpg', 8000, 'available'),
(7, 1, 'IMG-630e62ebaf2519.27801349.jpg', 5000, 'available'),
(8, 3, 'IMG-630e64aa8d7c98.46037719.jpg', 2000, 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artistID`);

--
-- Indexes for table `artprofpic`
--
ALTER TABLE `artprofpic`
  ADD PRIMARY KEY (`picID`),
  ADD KEY `artistID` (`artistID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`artID`),
  ADD KEY `artistID` (`artistID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artprofpic`
--
ALTER TABLE `artprofpic`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `artID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artprofpic`
--
ALTER TABLE `artprofpic`
  ADD CONSTRAINT `artprofpic_ibfk_1` FOREIGN KEY (`artistID`) REFERENCES `artist` (`artistID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_ibfk_1` FOREIGN KEY (`artistID`) REFERENCES `artist` (`artistID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
