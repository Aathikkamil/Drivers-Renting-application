-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 06:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `did` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `age` int(100) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `licence` varchar(100) NOT NULL,
  `vtype` varchar(100) NOT NULL,
  `experience` int(20) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `Pricing` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `Name`, `phone`, `age`, `nic`, `licence`, `vtype`, `experience`, `profile`, `address`, `password`, `Pricing`) VALUES
(35, 'aathik', '0772652273', 23, '200027903585', '12002564', 'car,van,truck,tucktuck', 18, '../profile_pictures/vector-users-icon.webp', 'Matale', 'aathik123', 0),
(36, 'samhan', '0767195907', 22, '203251002', '11111111555', 'car', 1, '../profile_pictures/1535791.png', 'Kandy', 'samhan123', 0),
(37, 'samhan', '01235546', 22, '202123654', '456758', 'van,truck', 4, '', 'nuwara Eliya', 'samhan123', 0),
(38, 'sabir', '07195907', 26, '5648468864', '787787879', 'van', 20, '', 'matale', 'baaba', 0),
(39, 'aathikkkk', '123123', 12, '2312312', '13213213', 'van', 10, '', 'matale', 'asdf', 0),
(40, 'kamil', '077456852', 23, '12365457', '54878445', 'car,tucktuck', 12, '', 'Gampola', 'kamil', 0),
(41, 'asd', '2312', 12, '2314312', '342342', 'car', 20, '../profile_pictures/1535791.png', 'Nawalapitiya', '1234', 0),
(42, 'sadasd', '34234', 324, '234234', '234234', 'van', 5, '../profile_pictures/png-transparent-taxi-driver-driver-driving-logo-product.png', 'Dambulla', 'pas23423sv', 0),
(43, 'asd', '132', 12, '1231232131', '12312312', 'car', 5, '1535791.png', 'Kandy', '1231231', 0),
(44, 'nuzla', '0771236587', 28, '1997456857', '456222000', 'van,truck', 0, '', 'Matale', '', 0),
(45, 'shakeel', '01234567', 35, '202354756', '123654568', 'car', 0, '', 'Nuwara Eliya', '', 0),
(46, 'asd', '12', 122, '213213', '12312', 'car', 0, '', 'Kandy', '', 0),
(47, 'fbsgk', '3923529345', 34, '324342243', '213313', 'van,truck', 0, '../profile_pictures/1535791.png', 'Kandy', '', 0),
(48, 'kamil', '0776109103', 65, '1119333444', '1111111', 'truck,tucktuck', 0, '../profile_pictures/licensed-image.jpeg', 'Dambulla', '', 0),
(49, 'zumar', '077123456', 17, '10123456', '111444777', 'car,van,truck', 0, '../profile_pictures/aaaa.jpg', 'Hatton', 'zumar123', 1500),
(50, 'aashiq', '071545685', 23, '111222333', '333222111', 'car,truck,tucktuck', 0, '../profile_pictures/asdm.jpg', 'Dambulla', 'aashiq123', 0),
(51, 'sandeepa', '071254759', 23, '123456789', '444555666', 'car,van,truck', 0, '../profile_pictures/depositphotos_41568413-stock-photo-free-range-whole-chicken-isolated.jpg', 'Dambulla', 'sandeepa', 0),
(53, 'samhan', '0767195907', 22, '203251002', '11111111555', 'car', 1, '../profile_pictures/1535791.png', 'Kandy', 'samhan123', 0),
(54, 'Mohamed Himaz', '0765640212', 31, '199326547', '1114578954', 'car,van,truck', 0, '../profile_pictures/WhatsApp Image 2021-11-07 at 9.47.34 PM.jpeg', 'Matale', 'himaz123', 0),
(55, 'Mohamed Himaz', '0765640212', 31, '199326547', '1114578954', 'car,van,truck', 0, '../profile_pictures/WhatsApp Image 2021-11-07 at 9.47.34 PM.jpeg', 'Matale', 'hmz', 0),
(56, 'samhan', '077123456', 22, '20111236', '2223335', 'car', 0, '../profile_pictures/depositphotos_41568413-stock-photo-free-range-whole-chicken-isolated.jpg', 'Dambulla', 'samhan', 0),
(57, 'samhan', '077123456', 22, '20111236', '2223335', 'car', 0, '../profile_pictures/depositphotos_41568413-stock-photo-free-range-whole-chicken-isolated.jpg', 'Dambulla', 'samhan111', 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver_user_intraction`
--

CREATE TABLE `driver_user_intraction` (
  `intractionID` int(150) NOT NULL,
  `did` int(255) NOT NULL,
  `user_review` varchar(500) NOT NULL,
  `id` int(255) NOT NULL,
  `rating` int(20) NOT NULL,
  `sentimentreview` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_user_intraction`
--

INSERT INTO `driver_user_intraction` (`intractionID`, `did`, `user_review`, `id`, `rating`, `sentimentreview`) VALUES
(7, 36, 'sdfgdfighih', 7, 3, 'posative'),
(9, 36, 'gtohgrtohgirtghtrpghortughgfiorgu', 3, 5, 'positive '),
(11, 50, 'ufghdpsfh', 4, 5, 'nagative'),
(30, 53, 'this driver is very good person', 1, 5, 'nagative'),
(34, 35, ' I had a terrible experience with this driver. They were constantly speeding, changing lanes without signaling, and seemed distracted. I felt unsafe the entire time, and I wouldn\'t recommend them to anyone. Safety should be a top priority for any driver.', 1, 1, 'Negative'),
(38, 35, 'this driver is awsom', 1, 5, 'Neutral'),
(41, 35, 'I was really impressed with this driver\'s knowledge of the city. They knew all the shortcuts and avoided traffic, which got me to my destination faster than I expected', 1, 5, 'Positive'),
(42, 35, 'this driver is very ', 1, 5, 'positive'),
(43, 35, 'The driver was rude and had no consideration for traffic rules. It was a terrible experience', 1, 1, 'positive');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(20) NOT NULL,
  `did` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(30) NOT NULL,
  `did` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `pickuplo` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `vtype` varchar(255) NOT NULL,
  `pickupDate` date NOT NULL,
  `pickupTime` time NOT NULL,
  `dropoffTime` time NOT NULL,
  `dppdate` date NOT NULL,
  `status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `did`, `id`, `pickuplo`, `phone`, `destination`, `vtype`, `pickupDate`, `pickupTime`, `dropoffTime`, `dppdate`, `status`) VALUES
(8, 49, 3, 'kandy', '07712345', 'matale', 'car', '2023-10-19', '17:05:23', '17:05:01', '2023-10-19', 'Rejected'),
(25, 37, 1, 'matale', '0772652273', 'Colombo', 'van', '2023-10-19', '10:45:00', '22:10:00', '2023-10-22', 'Accepted'),
(26, 49, 3, 'hattom', '0776109013', 'matale', 'van', '2023-10-11', '10:45:00', '12:05:00', '2023-10-21', 'Panding'),
(27, 49, 3, 'hatton', '0772123654', 'kandy', 'van', '2022-10-20', '00:05:00', '22:05:00', '2023-10-18', 'Accepted'),
(28, 49, 3, 'hatton', '014785555', 'kandy', 'car', '2023-10-18', '01:09:00', '10:10:00', '2023-10-19', 'Accepted'),
(29, 35, 1, 'kandy', '0771234555', 'Kurunagala', 'car', '2023-10-20', '15:45:00', '10:45:00', '2023-10-21', 'Rejected'),
(30, 35, 1, 'kandy', '700123555', 'matara', 'car', '2023-10-22', '10:45:00', '14:54:00', '2023-10-20', 'Rejected'),
(31, 49, 1, 'kandy', '0776109103', 'kandy', 'car', '2023-10-20', '10:45:00', '10:00:00', '2023-10-22', 'Accepted'),
(32, 36, 1, 'kandy', '077123456', 'kurunagala', 'car', '2023-10-04', '14:45:00', '10:00:00', '2023-10-23', 'pending'),
(33, 36, 1, 'kandy', '+9477 2652273', 'jafnna', 'car', '2023-10-19', '15:01:00', '14:01:00', '2023-10-20', 'pending'),
(34, 37, 1, 'nuware elliya', '0545664', 'kandy', 'car', '2023-10-19', '12:04:00', '12:04:00', '2023-10-20', 'Rejected'),
(35, 37, 1, 'jghrgu', 'dfgjp', 'fdhgis', 'car', '2023-10-19', '12:07:00', '12:08:00', '2023-10-20', 'Rejected'),
(36, 37, 1, 'sada', '34242', 'assad', 'car', '0234-03-04', '14:34:00', '12:27:00', '2023-10-20', 'Rejected'),
(37, 37, 1, 'ohdfs', '4507', 'fdjigopfdg', 'car', '2023-10-19', '00:31:00', '00:30:00', '2023-10-27', 'Rejected'),
(38, 37, 1, 'kandy', '0772652273', 'matare', 'car', '2023-10-19', '12:51:00', '12:49:00', '2023-10-21', 'Accepted'),
(39, 37, 1, 'matale', '0772354456', 'Colombo', 'car', '2023-10-19', '01:52:00', '02:52:00', '2023-10-20', 'Accepted'),
(40, 37, 1, 'matale', '0772354456', 'Colombo', 'car', '2023-10-19', '01:52:00', '02:52:00', '2023-10-20', 'Accepted'),
(41, 35, 1, 'kandy', '23847263948', 'jdsfho', 'car', '2023-03-04', '02:32:00', '03:43:00', '2023-10-12', 'Accepted'),
(42, 35, 1, 'matale', '405973450', 'odfhsdfofhs', 'car', '2023-10-19', '13:05:00', '13:04:00', '2023-10-20', 'Accepted'),
(43, 35, 1, 'asdas', 's34234', 'dsfsf', 'car', '2023-12-23', '01:04:00', '13:05:00', '2023-10-20', 'Accepted'),
(44, 35, 1, 'sad', 'sadas', 'sadasd', 'car', '2023-10-19', '13:06:00', '13:06:00', '2023-10-11', 'Accepted'),
(45, 35, 1, 'sad', 'sda', 'as', 'car', '2023-10-19', '13:07:00', '13:08:00', '2023-10-20', 'Accepted'),
(46, 35, 1, 'matale', '+94767195907', 'jafnna', 'car', '2023-10-19', '13:12:00', '13:12:00', '2023-10-21', 'Accepted'),
(47, 35, 1, 'kandy', '077123456', 'matale', 'car', '2023-10-19', '13:35:00', '13:35:00', '2023-10-20', 'Accepted'),
(48, 35, 1, 'fsdfsdf', 'sdfsf', 'sdfsdf', 'car', '2023-10-19', '13:55:00', '13:55:00', '2023-10-19', 'Accepted'),
(49, 35, 1, 'as', 'dfs', 'sdf', 'car', '2023-10-19', '14:05:00', '14:06:00', '2023-10-12', 'Accepted'),
(50, 35, 1, 'as', 'dfs', 'sdf', 'car', '2023-10-19', '14:05:00', '14:06:00', '2023-10-12', 'Accepted'),
(51, 35, 1, 'as', 'dfs', 'sdf', 'car', '2023-10-19', '14:05:00', '14:06:00', '2023-10-12', 'Accepted'),
(52, 35, 1, 'kandy', '0772652273', 'matara', 'car', '2023-10-20', '10:45:00', '10:25:00', '2023-10-22', 'Accepted'),
(53, 35, 1, 'dsae', 'werw', 'ewrw', 'car', '2023-10-19', '14:20:00', '02:18:00', '2023-10-20', 'Accepted'),
(54, 35, 1, 'matale', '123123', 'matara', 'car', '2023-10-19', '14:22:00', '02:20:00', '2023-10-21', 'Accepted'),
(55, 35, 1, 'jdfgh', 'fsghpi', 'isjpdfg', 'car', '2023-10-20', '22:12:00', '14:02:00', '2023-02-02', 'Accepted'),
(56, 35, 1, 'kandy', '+9477 2652273', 'jafnna', 'car', '2023-10-19', '16:12:00', '16:12:00', '2023-10-20', 'Accepted'),
(57, 35, 1, 'kandy', '+9477 2652273', 'jafnna', 'car', '2023-10-19', '16:12:00', '16:12:00', '2023-10-20', 'Accepted'),
(58, 35, 1, 'kandy', '+9477 2652273', 'jafnna', 'car', '2023-10-19', '16:12:00', '16:12:00', '2023-10-20', 'Accepted'),
(59, 35, 1, 'kandy', '+9477 2652273', 'jafnna', 'car', '2023-10-19', '16:12:00', '16:12:00', '2023-10-20', 'Rejected'),
(60, 35, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-19', '16:21:00', '16:20:00', '2023-10-20', 'Rejected'),
(61, 35, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-19', '16:21:00', '16:20:00', '2023-10-20', 'Accepted'),
(62, 35, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-19', '16:21:00', '16:20:00', '2023-10-20', 'Accepted'),
(63, 35, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-19', '16:23:00', '16:25:00', '2023-10-20', 'Accepted'),
(64, 35, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-19', '16:23:00', '16:25:00', '2023-10-20', 'Accepted'),
(65, 35, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-19', '16:23:00', '16:25:00', '2023-10-20', 'Accepted'),
(66, 35, 1, 'kandy', '07712354', 'kandas', 'car', '2023-10-19', '16:39:00', '04:36:00', '2023-10-20', 'Accepted'),
(67, 35, 1, 'djs', 'sjorjt', 'odfigh', 'car', '2023-10-25', '16:42:00', '16:42:00', '2023-10-20', 'Accepted'),
(68, 35, 1, 'djs', 'sjorjt', 'odfigh', 'car', '2023-10-25', '16:42:00', '16:42:00', '2023-10-20', 'Accepted'),
(69, 49, 1, 'kandy ', '0771234567', 'matara', 'truck', '2023-10-19', '16:52:00', '04:49:00', '2023-10-20', 'Accepted'),
(70, 49, 1, 'kandy', '077123455', 'jafnna', 'car', '2023-10-19', '07:55:00', '04:54:00', '2023-10-20', 'Accepted'),
(71, 49, 1, 'matale', '01477777', 'colobmo', 'car', '2023-10-19', '16:55:00', '16:56:00', '2023-10-21', 'Accepted'),
(72, 49, 1, 'dombawela', '077123455', 'matale', 'car', '2023-10-19', '20:58:00', '06:56:00', '2023-10-20', 'Rejected'),
(73, 49, 1, 'kandy', '0772652273', 'jafnna', 'car', '2023-10-19', '16:58:00', '16:57:00', '2023-10-20', 'Rejected'),
(74, 36, 1, 'kandy ', '07456888', 'colombo', 'car', '2023-10-20', '19:03:00', '08:04:00', '2023-10-21', 'pending'),
(75, 41, 1, 'Nawalapitiya', '0112544', 'matale', 'car', '2023-10-19', '17:06:00', '07:07:00', '2023-10-20', 'Accepted'),
(76, 41, 1, 'fdhgo', '3424', 'sdfsdf', 'car', '2023-10-19', '17:20:00', '17:20:00', '2023-10-20', 'Accepted'),
(77, 41, 1, 'fdhgo', '3424', 'sdfsdf', 'car', '2023-10-19', '17:20:00', '17:20:00', '2023-10-20', 'Accepted'),
(78, 35, 1, 'matale', '0771114447', 'Colombo', 'car', '2023-10-20', '22:26:00', '22:26:00', '2023-10-21', 'Accepted'),
(79, 35, 1, 'matale aathik', '0771114447', 'Colombo', 'car', '2023-10-20', '22:26:00', '22:26:00', '2023-10-21', 'Accepted'),
(80, 49, 1, 'kandy', '01111111111', 'japan', 'car', '2023-10-20', '10:45:00', '10:45:00', '2023-10-21', 'Accepted'),
(81, 49, 1, 'Kandy', '0124587896', 'Colombo', 'car', '2023-10-21', '22:37:00', '22:37:00', '2023-10-22', 'Accepted'),
(82, 49, 1, 'kandy', '0772652273', 'jafnna', 'car', '2023-10-21', '23:12:00', '23:12:00', '2023-10-22', 'Accepted'),
(83, 49, 1, 'hatton', '11122244', 'colombo', 'car', '2023-10-20', '09:20:00', '23:16:00', '2023-10-21', 'Accepted'),
(84, 49, 1, 'hatton', '457483569', 'japan', 'car', '2023-10-21', '10:45:00', '22:25:00', '2023-10-22', 'Accepted'),
(85, 49, 1, 'kandy', '340937402', 'dfjdsfijg', 'car', '2023-10-04', '10:45:00', '22:25:00', '2023-10-25', 'Accepted'),
(86, 49, 1, 'kandy', '077456', 'matale', 'car', '2023-10-20', '23:38:00', '21:38:00', '2023-10-27', 'Accepted'),
(87, 49, 1, 'kandy', '12345666', 'kandy', 'car', '2023-10-21', '11:32:00', '13:31:00', '2023-10-27', 'Accepted'),
(88, 35, 1, 'kandy', '+9477 2652273', 'matale', 'car', '2023-10-21', '04:01:00', '13:02:00', '2023-10-24', 'Accepted'),
(89, 49, 1, 'kandy', '+9477 2652273', 'jafnna', 'car', '2023-10-21', '07:43:00', '20:27:00', '2023-10-23', 'Accepted'),
(90, 49, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-21', '18:44:00', '13:15:00', '2023-10-22', 'Accepted'),
(91, 35, 1, 'kandy', '0772652273', 'jaffna', 'car', '2023-10-21', '22:00:00', '07:00:00', '2023-10-23', 'Accepted'),
(92, 35, 1, 'kandy', '+9477 2652273', 'matara', 'car', '2023-10-21', '19:57:00', '19:57:00', '2023-10-22', 'Accepted'),
(93, 35, 1, 'kandy', '0767195907', 'matale', 'car', '2023-10-21', '21:00:00', '17:15:00', '2023-10-22', 'Accepted'),
(94, 35, 1, 'kandy', '0772652273', 'matara', 'car', '2023-10-21', '20:35:00', '10:20:00', '2023-10-22', 'Accepted'),
(95, 35, 1, 'kandy', '01123654', 'matale', 'truck', '2023-10-21', '22:22:00', '22:24:00', '2023-10-22', 'Accepted'),
(96, 36, 1, 'Kandy', '0772652273', 'Matale', 'car', '2023-10-24', '17:01:00', '19:51:00', '2023-10-25', 'pending'),
(97, 36, 1, 'matale', '0772123654', 'colombo', 'car', '2023-10-24', '10:45:00', '19:45:00', '2023-10-26', 'pending'),
(98, 35, 1, 'Matale', '077235444', 'Colombo', 'car', '2023-10-04', '10:45:00', '22:24:00', '2023-10-24', 'Accepted'),
(99, 35, 1, 'kandy', '07723552245', 'matale', 'car', '2023-10-24', '10:45:00', '19:45:00', '2023-10-24', 'Accepted'),
(100, 35, 1, 'kandy', '077245685', 'matale', 'car', '2023-10-24', '22:45:00', '10:45:00', '2023-10-24', 'Accepted'),
(101, 35, 1, 'kandy', '0772652273', 'Matale', 'van', '2023-10-24', '10:45:00', '10:00:00', '2023-10-25', 'Accepted'),
(102, 35, 1, 'kandy', '0772356645', 'matale', 'car', '2023-10-24', '10:45:00', '22:24:00', '2023-10-24', 'Accepted'),
(103, 35, 1, 'kandy', '0772356645', 'matale', 'car', '2023-10-24', '10:45:00', '22:24:00', '2023-10-24', 'Accepted'),
(104, 35, 1, 'fgufog', 'sdfge', 'qiohpgh', 'car', '2023-10-31', '02:03:00', '00:21:00', '0123-12-23', 'Accepted'),
(105, 35, 1, 'kandy', '0772356654', 'matale', 'car', '2023-10-24', '10:45:00', '10:14:00', '2023-10-24', 'Accepted'),
(106, 35, 1, 'kandy', '0772356654', 'matale', 'car', '2023-10-24', '10:45:00', '10:14:00', '2023-10-24', 'Rejected'),
(107, 35, 1, 'kandy', '0772356654', 'matale', 'car', '2023-10-24', '10:45:00', '10:14:00', '2023-10-24', 'Rejected'),
(108, 35, 1, 'kandy', '0772356654', 'matale', 'car', '2023-10-24', '10:45:00', '10:14:00', '2023-10-24', 'Rejected'),
(109, 35, 1, 'kandy', '0772356654', 'matale', 'car', '2023-10-24', '10:45:00', '10:14:00', '2023-10-24', 'Rejected'),
(110, 35, 1, 'kandy', '0772356654', 'matale', 'car', '2023-10-24', '10:45:00', '10:14:00', '2023-10-24', 'Accepted'),
(111, 35, 1, 'matale', '0772652273', 'Colombo', 'van', '2023-10-25', '07:00:00', '21:00:00', '2023-10-25', 'Accepted'),
(112, 35, 1, 'kandy', '+9477 2652273', 'kandy', 'van', '2023-10-25', '07:00:00', '10:00:00', '2023-10-25', 'Rejected'),
(113, 36, 1, 'kandy', '0772652270', 'Matale', 'car', '2023-10-25', '10:45:00', '14:04:00', '2023-10-26', 'pending'),
(114, 35, 1, 'matale', '0772652273', 'Kandy', 'car', '2023-10-25', '10:45:00', '10:45:00', '2023-10-26', 'Accepted'),
(115, 35, 1, 'matale', '0772654427', 'Kandy', 'car', '2023-10-26', '10:45:00', '10:25:00', '2023-10-27', 'Accepted'),
(116, 35, 1, 'Kandy', '0772652273', 'Kandy', 'car', '2023-10-04', '10:45:00', '19:45:00', '2023-10-27', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'aathik', 'aathik@gmail.com', 'aathik123'),
(2, 'kamil', 'kamil@gmail.com', 'kamil111'),
(3, 'fazeela', 'fazeela@gmail.com', 'fazeela123'),
(4, 'nuzla', 'nuzla@gmail.com', 'nuzee'),
(5, 'aathik', 'aathik@gmail.com', '123456'),
(6, 'aathik', 'aathik@gmail.com', 'aaa'),
(7, 'aathik', 'aathik@gmail.com', 'aaa'),
(8, 'mohamed', 'mohamed@gmail.com', 'mohamed123'),
(9, 'ilma', 'ilma@gmail.com', 'ilma111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `driver_user_intraction`
--
ALTER TABLE `driver_user_intraction`
  ADD PRIMARY KEY (`intractionID`),
  ADD KEY `did` (`did`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD KEY `id` (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `did` (`did`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `did` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `driver_user_intraction`
--
ALTER TABLE `driver_user_intraction`
  MODIFY `intractionID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver_user_intraction`
--
ALTER TABLE `driver_user_intraction`
  ADD CONSTRAINT `driver_user_intraction_ibfk_1` FOREIGN KEY (`did`) REFERENCES `driver` (`did`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_user_intraction_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`did`) REFERENCES `driver` (`did`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
