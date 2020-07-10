-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 06:14 PM
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

CREATE TABLE IF NOT EXISTS `control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`id`, `name`, `status`, `d_id`, `m_id`) VALUES
(1, 'h2', 33, 1, 1),
(2, 'h3', 0, 1, 1),
(3, 'h4', 1, 1, 1),
(4, 't2', 30, 1, 1),
(5, 't3', 1, 1, 1),
(6, 't4', 0, 1, 1),
(7, 'b', 0, 1, 1),
(8, 'd', 0, 1, 1),
(9, 'f', 0, 1, 1),
(10, 'l', 1, 1, 1),
(11, 'ss', 0, 1, 1),
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
(33, 'ss', 0, 2, 1),
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
(45, 'sc', 1, 1, 1),
(46, 'sc', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `measurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_id` int(11) NOT NULL COMMENT 'Device number ',
  `m_id` int(11) NOT NULL COMMENT 'machine 1 or 2',
  `t1` int(11) NOT NULL COMMENT 'temperature ',
  `h1` int(11) NOT NULL COMMENT 'Humidity',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=513 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `datetime`, `d_id`, `m_id`, `t1`, `h1`) VALUES
(448, '2019-04-03 07:23:18', 1, 1, 29, 28),
(449, '2019-04-03 07:23:38', 1, 1, 19, 28),
(450, '2019-04-03 07:25:05', 1, 1, 118, 25),
(451, '2019-04-03 07:25:06', 1, 1, 8, 38),
(452, '2019-04-03 07:25:07', 1, 1, 119, 76),
(453, '2019-04-03 07:25:08', 1, 1, 101, 87),
(454, '2019-04-03 07:25:09', 1, 1, 61, 16),
(455, '2019-04-03 07:25:10', 1, 1, 46, 81),
(456, '2019-04-03 07:25:11', 1, 1, 18, 14),
(457, '2019-04-03 07:25:12', 1, 1, 55, 42),
(458, '2019-04-03 07:25:13', 1, 1, 52, 49),
(459, '2019-04-03 07:25:14', 1, 1, 67, 7),
(460, '2019-04-03 07:25:15', 1, 1, 109, 51),
(461, '2019-04-03 07:25:16', 1, 1, 78, 60),
(462, '2019-04-03 07:25:17', 1, 1, 107, 49),
(463, '2019-04-03 07:25:18', 1, 1, 17, 59),
(464, '2019-04-03 07:25:19', 1, 1, 10, 15),
(465, '2019-04-03 07:25:20', 1, 1, 84, 74),
(466, '2019-04-03 07:25:21', 1, 1, 41, 0),
(467, '2019-04-03 07:25:22', 1, 1, 63, 49),
(468, '2019-04-03 07:25:23', 1, 1, 47, 88),
(469, '2019-04-03 07:25:24', 1, 1, 89, 68),
(470, '2019-04-03 07:25:25', 1, 1, 51, 80),
(471, '2019-04-03 07:25:26', 1, 1, 15, 100),
(472, '2019-04-03 07:25:27', 1, 1, 31, 92),
(473, '2019-04-03 07:25:28', 1, 1, 72, 30),
(474, '2019-04-03 07:25:29', 1, 1, 79, 81),
(475, '2019-04-03 07:25:30', 1, 1, 42, 17),
(476, '2019-04-03 07:25:31', 1, 1, 53, 34),
(477, '2019-04-03 07:25:32', 1, 1, 56, 56),
(478, '2019-04-03 07:25:33', 1, 1, 48, 12),
(479, '2019-04-03 07:25:34', 1, 1, 86, 91),
(480, '2019-04-03 07:25:35', 1, 1, 20, 0),
(481, '2019-04-03 07:25:36', 1, 1, 62, 75),
(482, '2019-04-03 07:25:37', 1, 1, 103, 85),
(483, '2019-04-03 07:25:38', 1, 1, 24, 5),
(484, '2019-04-03 07:25:39', 1, 1, 95, 29),
(485, '2019-04-03 07:25:40', 1, 1, 115, 37),
(486, '2019-04-03 07:25:41', 1, 1, 79, 16),
(487, '2019-04-03 07:25:42', 1, 1, 34, 92),
(488, '2019-04-03 07:25:43', 1, 1, 2, 1),
(489, '2019-04-03 07:25:44', 1, 1, 14, 89),
(490, '2019-04-03 07:25:45', 1, 1, 84, 94),
(491, '2019-04-03 07:25:46', 1, 1, 98, 59),
(492, '2019-04-03 07:25:47', 1, 1, 67, 54),
(493, '2019-04-03 07:25:48', 1, 1, 96, 14),
(494, '2019-04-03 07:25:49', 1, 1, 5, 83),
(495, '2019-04-03 07:25:50', 1, 1, 69, 67),
(496, '2019-04-03 07:25:51', 1, 1, 76, 74),
(497, '2019-04-03 07:25:52', 1, 1, 11, 98),
(498, '2019-04-03 07:25:53', 1, 1, 22, 41),
(499, '2019-04-03 07:25:54', 1, 1, 33, 50),
(500, '2019-04-03 07:25:55', 1, 1, 23, 92),
(501, '2019-04-03 07:25:56', 1, 1, 116, 89),
(502, '2019-04-03 07:25:57', 1, 1, 5, 25),
(503, '2019-04-03 07:25:58', 1, 1, 4, 42),
(504, '2019-04-03 07:25:59', 1, 1, 12, 93),
(505, '2019-04-03 07:26:00', 1, 1, 58, 39),
(506, '2019-04-03 07:26:01', 1, 1, 32, 1),
(507, '2019-04-03 07:26:02', 1, 1, 22, 16),
(508, '2019-04-03 07:26:03', 1, 1, 86, 12),
(509, '2019-04-03 07:26:04', 1, 1, 77, 8),
(510, '2019-04-03 07:26:05', 1, 1, 27, 46),
(511, '2019-04-03 07:26:06', 1, 1, 46, 94),
(512, '2019-04-03 07:26:07', 1, 1, 30, 82);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `periv` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `periv`) VALUES
(1, 'admin', 'admin@test.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(3, 'mhmd', 'mohammed.rbn4@yahoo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
