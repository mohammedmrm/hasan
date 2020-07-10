-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 02:24 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`id`, `name`, `status`, `d_id`, `m_id`) VALUES
(1, 'h2', 33, 1, 1),
(2, 'h3', 1, 1, 1),
(3, 'h4', 0, 1, 1),
(4, 't2', 30, 1, 1),
(5, 't3', 0, 1, 1),
(6, 't4', 0, 1, 1),
(7, 'b', 1, 1, 1),
(8, 'd', 1, 1, 1),
(9, 'f', 0, 1, 1),
(10, 'l', 1, 1, 1),
(11, 'ss', 1, 1, 1),
(12, 'h2', 20, 1, 2),
(13, 'h3', 0, 1, 2),
(14, 'h4', 0, 1, 2),
(15, 't2', 34, 1, 2),
(16, 't3', 0, 1, 2),
(17, 't4', 0, 1, 2),
(18, 'b', 0, 1, 2),
(19, 'd', 0, 1, 2),
(20, 'f', 0, 1, 2),
(21, 'l', 1, 1, 2),
(22, 'ss', 0, 1, 2),
(23, 'h2', 0, 2, 1),
(24, 'h3', 0, 2, 1),
(25, 'h4', 0, 2, 1),
(26, 't2', 0, 2, 1),
(27, 't3', 0, 2, 1),
(28, 't4', 0, 2, 1),
(29, 'b', 0, 2, 1),
(30, 'd', 0, 2, 1),
(31, 'f', 0, 2, 1),
(32, 'l', 0, 2, 1),
(33, 'ss', 1, 2, 1),
(34, 'h2', 0, 2, 2),
(35, 'h3', 0, 2, 2),
(36, 'h4', 0, 2, 2),
(37, 't2', 0, 2, 2),
(38, 't3', 0, 2, 2),
(39, 't4', 0, 2, 2),
(40, 'b', 0, 2, 2),
(41, 'd', 0, 2, 2),
(42, 'f', 0, 2, 2),
(43, 'l', 0, 2, 2),
(44, 'ss', 0, 2, 2),
(45, 'sc', 0, 1, 1),
(46, 'sc', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `d_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`d_id`, `user_id`, `name`) VALUES
(1, '1', 'My First Device'),
(2, '3', 'My Second Device');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_id` int(11) NOT NULL COMMENT 'Device number ',
  `m_id` int(11) NOT NULL COMMENT 'machine 1 or 2',
  `t1` int(11) NOT NULL COMMENT 'temperature ',
  `h1` int(11) NOT NULL COMMENT 'Humidity'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `datetime`, `d_id`, `m_id`, `t1`, `h1`) VALUES
(676, '2019-04-13 20:07:11', 1, 1, 33, 22),
(677, '2019-04-13 20:08:00', 1, 1, 33, 22),
(678, '2019-04-13 20:09:54', 1, 1, 33, 22),
(679, '2019-04-13 20:13:11', 1, 1, 33, 22),
(680, '2019-04-13 20:13:13', 1, 1, 33, 22),
(681, '2019-04-13 20:13:41', 1, 1, 33, 22),
(682, '2019-04-13 20:13:42', 1, 1, 33, 22),
(683, '2019-04-13 20:13:42', 1, 1, 33, 22),
(684, '2019-04-13 20:13:42', 1, 1, 33, 22),
(685, '2019-04-13 20:13:43', 1, 1, 33, 22),
(686, '2019-04-13 20:14:04', 1, 1, 33, 22),
(687, '2019-04-13 20:14:59', 1, 1, 33, 22),
(688, '2019-04-13 20:15:00', 1, 1, 33, 22),
(689, '2019-04-13 20:15:01', 1, 1, 33, 22),
(690, '2019-04-13 20:15:20', 1, 1, 33, 22),
(691, '2019-04-13 20:15:21', 1, 1, 33, 22),
(692, '2019-04-13 20:15:21', 1, 1, 33, 22),
(693, '2019-04-13 20:15:30', 1, 1, 33, 22),
(694, '2019-04-13 20:15:49', 1, 1, 33, 22),
(695, '2019-04-13 20:15:50', 1, 1, 33, 22),
(696, '2019-04-13 20:15:50', 1, 1, 33, 22),
(697, '2019-04-13 20:15:50', 1, 1, 33, 22),
(698, '2019-04-13 20:15:50', 1, 1, 33, 22),
(699, '2019-04-13 20:15:51', 1, 1, 33, 22),
(700, '2019-04-13 20:16:03', 1, 1, 33, 22),
(701, '2019-04-13 20:16:03', 1, 1, 33, 22),
(702, '2019-04-13 20:16:04', 1, 1, 33, 22),
(703, '2019-04-13 20:16:42', 1, 1, 33, 22),
(704, '2019-04-13 20:16:42', 1, 1, 33, 22),
(705, '2019-04-13 20:16:43', 1, 1, 33, 22),
(706, '2019-04-13 20:16:43', 1, 1, 33, 22),
(707, '2019-04-13 20:17:06', 1, 1, 33, 22),
(708, '2019-04-13 20:17:36', 1, 1, 33, 22),
(709, '2019-04-13 20:17:55', 1, 1, 33, 22),
(710, '2019-04-13 20:19:28', 1, 1, 33, 22),
(711, '2019-04-13 20:19:34', 1, 1, 33, 22),
(712, '2019-04-13 20:22:41', 1, 1, 33, 22),
(713, '2019-04-13 20:22:59', 1, 1, 33, 22),
(714, '2019-04-13 20:23:19', 1, 1, 33, 22),
(715, '2019-04-13 20:23:33', 1, 1, 33, 22),
(716, '2019-04-13 20:24:19', 1, 1, 33, 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `periv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `periv`) VALUES
(1, 'admin', 'admin@test.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(3, 'mhmd', 'mohammed.rbn4@yahoo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
