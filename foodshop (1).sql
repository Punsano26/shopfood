-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2023 at 05:22 AM
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
-- Database: `foodshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `foodmenuID` char(6) NOT NULL,
  `foodmenuName` varchar(16) NOT NULL,
  `price` float NOT NULL,
  `foodtypeID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`foodmenuID`, `foodmenuName`, `price`, `foodtypeID`) VALUES
('f01', 'เตี๋ยวแห้ง', 45, '01'),
('f02', 'เตี๋ยวต้มส้ม', 45, '01'),
('f03', 'ผัดซีอิ๊วหมู', 50, '01'),
('f04', 'ตำซั่ว', 45, '01'),
('f05', 'มะนาวโซดา', 40, '02'),
('f06', 'นมชมพู', 40, '02');

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `foodtypeID` char(6) NOT NULL,
  `foodtypeName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`foodtypeID`, `foodtypeName`) VALUES
('01', 'อาหาร'),
('02', 'เครื่องดื่ม');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`foodmenuID`),
  ADD KEY `foodtypeID` (`foodtypeID`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`foodtypeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD CONSTRAINT `FK_type` FOREIGN KEY (`foodtypeID`) REFERENCES `food_type` (`foodtypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
