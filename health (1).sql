-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 10:38 AM
-- Server version: 10.4.10-MariaDB
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
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `role`) VALUES
(1, 'Hasan', 'hasan@gmail.com', '$2a$07$ycdJ0rpBpLEipd3JCzpHMOCdTN9HURUIrmmcZvqDaddUstnDCQAVm', '07822816693', 0);

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `name`, `date`) VALUES
(1, 'Device 1', '2020-02-28 14:53:51'),
(2, 'Device 2', '2020-02-28 14:53:51'),
(3, 'Device 3', '2020-02-28 14:53:53'),
(4, 'Device 4', '2020-02-28 14:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `ecg`
--

CREATE TABLE `ecg` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `dev_id` int(11) NOT NULL,
  `ecg` double NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecg`
--

INSERT INTO `ecg` (`id`, `patient_id`, `dev_id`, `ecg`, `date`) VALUES
(17, 1, 1, 0.6, '2020-08-12 10:38:46'),
(18, 1, 1, 0.62, '2020-08-12 10:38:47'),
(19, 1, 1, 0.07, '2020-08-12 10:38:48'),
(20, 1, 1, 0.07, '2020-08-12 10:38:49'),
(21, 1, 1, 0.16, '2020-08-12 10:38:50'),
(22, 1, 1, 0.94, '2020-08-12 10:38:51'),
(23, 1, 1, 0.13, '2020-08-12 10:38:52'),
(24, 1, 1, 0.97, '2020-08-12 10:38:53'),
(25, 1, 1, 0.23, '2020-08-12 10:38:54'),
(26, 1, 1, 0.97, '2020-08-12 10:38:55'),
(27, 1, 1, 0.82, '2020-08-12 10:38:56'),
(28, 1, 1, 0.38, '2020-08-12 10:38:57'),
(29, 1, 1, 0.5, '2020-08-12 11:02:25'),
(30, 1, 1, 0.6, '2020-08-12 11:02:25'),
(31, 1, 1, 0.88, '2020-08-12 11:03:06'),
(32, 1, 1, 0.46, '2020-08-12 11:03:07'),
(33, 1, 1, 0.96, '2020-08-12 11:03:08'),
(34, 1, 1, 0.68, '2020-08-12 11:03:09'),
(35, 1, 1, 0.62, '2020-08-12 11:03:10'),
(36, 1, 1, 0.26, '2020-08-12 11:03:11'),
(37, 1, 1, 0.45, '2020-08-12 11:03:12'),
(38, 1, 1, 0.23, '2020-08-12 11:03:13'),
(39, 1, 1, 0.05, '2020-08-12 11:03:14'),
(40, 1, 1, 0.25, '2020-08-12 11:03:15'),
(41, 1, 1, 0.67, '2020-08-12 11:03:16'),
(42, 1, 1, 0.43, '2020-08-12 11:03:17'),
(43, 1, 1, 0.94, '2020-08-12 11:03:18'),
(44, 1, 1, 0.25, '2020-08-12 11:03:19'),
(45, 1, 1, 0.54, '2020-08-12 11:03:20'),
(46, 1, 1, 0.58, '2020-08-12 11:03:21'),
(47, 1, 1, 0.44, '2020-08-12 11:03:22'),
(48, 1, 1, 0.07, '2020-08-12 11:03:23'),
(49, 1, 1, 0.46, '2020-08-12 11:03:24'),
(50, 1, 1, 0.28, '2020-08-12 11:03:25'),
(51, 1, 1, 0.19, '2020-08-12 11:03:26'),
(52, 1, 1, 0.97, '2020-08-12 11:03:27'),
(53, 1, 1, 0.52, '2020-08-12 11:03:28'),
(54, 1, 1, 0.96, '2020-08-12 11:03:29'),
(55, 1, 1, 0.42, '2020-08-12 11:03:30'),
(56, 1, 1, 0.11, '2020-08-12 11:03:31'),
(57, 1, 1, 0.2, '2020-08-12 11:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `emg`
--

CREATE TABLE `emg` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `dev_id` int(11) NOT NULL,
  `emg` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emg`
--

INSERT INTO `emg` (`id`, `patient_id`, `dev_id`, `emg`, `date`) VALUES
(1, 1, 1, 1, '0000-00-00 00:00:00'),
(2, 1, 1, 0.3, '0000-00-00 00:00:00'),
(3, 1, 1, 0.9, '0000-00-00 00:00:00'),
(4, 1, 1, 0.98, '0000-00-00 00:00:00'),
(5, 1, 1, 0.5, '0000-00-00 00:00:00'),
(6, 1, 1, 0.5, '0000-00-00 00:00:00'),
(7, 1, 1, 0.5, '0000-00-00 00:00:00'),
(8, 1, 1, 0.6, '0000-00-00 00:00:00'),
(9, 1, 1, 0.5, '0000-00-00 00:00:00'),
(10, 1, 1, 0.6, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `birthdate` datetime NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `device_id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `age` int(11) NOT NULL,
  `id_card` varchar(250) NOT NULL,
  `dev_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `birthdate`, `date`, `device_id`, `phone`, `age`, `id_card`, `dev_id`) VALUES
(1, 'ALi', '2020-02-04 00:00:00', '2020-02-28 14:48:10', 1, '07810987665', 20, 'AS16576543', 1);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `dev_id` int(11) NOT NULL,
  `ecg` varchar(100) DEFAULT '0',
  `temp` double DEFAULT 0,
  `beat` int(11) DEFAULT 0,
  `oxygen` double DEFAULT 0,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `emg` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `patient_id`, `doctor_id`, `dev_id`, `ecg`, `temp`, `beat`, `oxygen`, `datetime`, `emg`) VALUES
(43, 1, NULL, 1, '0', 51, 18, 46, '2020-08-12 10:38:46', 0),
(44, 1, NULL, 1, '0', 57, 45, 84, '2020-08-12 10:38:47', 0),
(45, 1, NULL, 1, '0', 37, 30, 77, '2020-08-12 10:38:48', 0),
(46, 1, NULL, 1, '0', 59, 72, 42, '2020-08-12 10:38:49', 0),
(47, 1, NULL, 1, '0', 64, 76, 73, '2020-08-12 10:38:50', 0),
(48, 1, NULL, 1, '0', 67, 32, 89, '2020-08-12 10:38:51', 0),
(49, 1, NULL, 1, '0', 70, 89, 38, '2020-08-12 10:38:52', 0),
(50, 1, NULL, 1, '0', 11, 55, 58, '2020-08-12 10:38:53', 0),
(51, 1, NULL, 1, '0', 56, 29, 78, '2020-08-12 10:38:54', 0),
(52, 1, NULL, 1, '0', 48, 13, 72, '2020-08-12 10:38:55', 0),
(53, 1, NULL, 1, '0', 20, 87, 23, '2020-08-12 10:38:56', 0),
(54, 1, NULL, 1, '0', 61, 68, 36, '2020-08-12 10:38:57', 0),
(55, 1, NULL, 1, '0', 35, 66, 88, '2020-08-12 10:39:32', 0),
(56, 1, NULL, 1, '0', 30, 66, 88, '2020-08-12 10:40:13', 0),
(57, 1, NULL, 1, '0', 33, 66, 88, '2020-08-12 10:56:28', 0),
(58, 1, NULL, 1, '0', 31, 34, 83, '2020-08-12 11:03:06', 0),
(59, 1, NULL, 1, '0', 37, 80, 91, '2020-08-12 11:03:07', 0),
(60, 1, NULL, 1, '0', 46, 21, 59, '2020-08-12 11:03:08', 0),
(61, 1, NULL, 1, '0', 34, 42, 90, '2020-08-12 11:03:09', 0),
(62, 1, NULL, 1, '0', 54, 92, 12, '2020-08-12 11:03:10', 0),
(63, 1, NULL, 1, '0', 25, 87, 93, '2020-08-12 11:03:11', 0),
(64, 1, NULL, 1, '0', 70, 38, 13, '2020-08-12 11:03:12', 0),
(65, 1, NULL, 1, '0', 50, 37, 98, '2020-08-12 11:03:13', 0),
(66, 1, NULL, 1, '0', 29, 98, 23, '2020-08-12 11:03:14', 0),
(67, 1, NULL, 1, '0', 13, 97, 79, '2020-08-12 11:03:15', 0),
(68, 1, NULL, 1, '0', 33, 94, 92, '2020-08-12 11:03:16', 0),
(69, 1, NULL, 1, '0', 57, 74, 12, '2020-08-12 11:03:17', 0),
(70, 1, NULL, 1, '0', 63, 82, 51, '2020-08-12 11:03:18', 0),
(71, 1, NULL, 1, '0', 48, 16, 77, '2020-08-12 11:03:19', 0),
(72, 1, NULL, 1, '0', 35, 62, 72, '2020-08-12 11:03:20', 0),
(73, 1, NULL, 1, '0', 48, 42, 40, '2020-08-12 11:03:21', 0),
(74, 1, NULL, 1, '0', 15, 71, 38, '2020-08-12 11:03:22', 0),
(75, 1, NULL, 1, '0', 37, 78, 31, '2020-08-12 11:03:23', 0),
(76, 1, NULL, 1, '0', 56, 70, 55, '2020-08-12 11:03:24', 0),
(77, 1, NULL, 1, '0', 53, 26, 76, '2020-08-12 11:03:25', 0),
(78, 1, NULL, 1, '0', 10, 95, 44, '2020-08-12 11:03:26', 0),
(79, 1, NULL, 1, '0', 20, 28, 51, '2020-08-12 11:03:27', 0),
(80, 1, NULL, 1, '0', 12, 37, 100, '2020-08-12 11:03:28', 0),
(81, 1, NULL, 1, '0', 35, 62, 73, '2020-08-12 11:03:29', 0),
(82, 1, NULL, 1, '0', 10, 88, 84, '2020-08-12 11:03:30', 0),
(83, 1, NULL, 1, '0', 49, 70, 39, '2020-08-12 11:03:31', 0),
(84, 1, NULL, 1, '0', 66, 12, 28, '2020-08-12 11:03:32', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecg`
--
ALTER TABLE `ecg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emg`
--
ALTER TABLE `emg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ecg`
--
ALTER TABLE `ecg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `emg`
--
ALTER TABLE `emg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
