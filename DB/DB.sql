-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 08:34 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `name`) VALUES
(1, 'Intel Core i3-7100'),
(2, 'Intel Core i5-4690k'),
(50, 'i5-4770k');

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`id`, `name`) VALUES
(1, 'Integruota'),
(2, 'Dedikuota');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`id`, `name`) VALUES
(1, 'Windows XP'),
(2, 'Windows Vista'),
(3, 'Windows 7'),
(4, 'Windows 8.1'),
(5, 'Windows 10'),
(11, 'Windows 95');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` int(11) NOT NULL,
  `pc_id` varchar(6) NOT NULL,
  `pc_name` varchar(20) NOT NULL,
  `cpu_id` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `gpu_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `purpose_id` int(11) NOT NULL,
  `is_added` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`id`, `pc_id`, `pc_name`, `cpu_id`, `os_id`, `gpu_id`, `place_id`, `purpose_id`, `is_added`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'E001', 'E001', 1, 3, 1, 1, 2, 1, NULL, NULL, '2017-06-15 04:50:47'),
(5, 'E002', 'Jolanta', 2, 1, 2, 2, 1, 1, NULL, NULL, '2017-06-15 04:50:43'),
(6, 'qwe', 'qwe', 1, 1, 1, 3, 1, 1, 37, NULL, '2017-07-17 06:16:53'),
(8, 'E002', 'E002(Hello)', 1, 1, 1, 1, 1, 1, NULL, NULL, '2017-06-15 04:52:49'),
(9, 'E003', 'E00156546', 1, 1, 1, 1, 1, 1, NULL, NULL, '2017-06-19 02:10:50'),
(13, 'E008', 'E008(thom)qwe', 50, 3, 2, 2, 2, 1, NULL, NULL, '2017-06-19 03:31:24'),
(14, 'E111', 'qwe', 1, 1, 1, 1, 1, 1, 37, NULL, '2017-07-17 06:13:21'),
(16, 'wer', 'qwe', 1, 1, 1, 1, 1, 0, NULL, '2017-06-16 06:24:27', '2017-06-19 04:13:03'),
(17, 'E101', 'Kloun', 1, 11, 2, 3, 3, NULL, NULL, '2017-06-30 08:14:10', '2017-06-30 08:14:10'),
(18, 'E10X', 'Test', 2, 3, 2, 3, 2, NULL, NULL, '2017-06-30 10:07:20', '2017-06-30 10:07:20'),
(19, 'E006', '', 2, 1, 1, 3, 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pc_list`
--

CREATE TABLE `pc_list` (
  `id` int(11) NOT NULL,
  `pc_list_id` int(11) DEFAULT NULL,
  `pc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`) VALUES
(1, 'Montavimo baras'),
(2, 'APS'),
(3, 'Buhalterija');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'IT Admin'),
(2, 'Buhalteris'),
(3, 'Elektrikas');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`id`, `name`) VALUES
(1, 'KTS'),
(2, 'Ofisinis'),
(3, 'Nešiojams/Ofisinis');

-- --------------------------------------------------------

--
-- Stand-in structure for view `testview`
-- (See below for the actual view)
--
CREATE TABLE `testview` (
`id` int(11)
,`name` varchar(15)
,`last_name` varchar(20)
,`email` varchar(30)
,`phone_nr` varchar(15)
,`positon_id` int(11)
,`place_id` int(11)
,`pc_list_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_nr` varchar(15) NOT NULL,
  `positon_id` int(11) NOT NULL,
  `place_id` int(11) DEFAULT NULL,
  `pc_list_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `phone_nr`, `positon_id`, `place_id`, `pc_list_id`, `created_at`, `updated_at`) VALUES
(37, 'Antanas', 'W', 'R', 'Q', 1, 3, 37, '2017-06-27 07:05:21', '2017-07-17 06:01:08'),
(38, 'qwe', 'qwe', 'qwe', 'qwe', 1, 2, NULL, '2017-06-27 07:10:32', '2017-06-27 07:10:32'),
(39, 'gfhfg', 'hfgh', 'fgh', 'gfh', 1, 1, NULL, '2017-06-27 07:10:37', '2017-06-27 07:10:37'),
(40, 'Tomas', 'Gulbickas', 'qwe@gmail.com', 'wqe', 1, 2, NULL, '2017-07-17 05:06:59', '2017-07-17 05:06:59'),
(41, 'Jonas', 'Silkinis', 'a@elga.lt', 'qwe', 1, 3, NULL, '2017-07-17 05:07:10', '2017-07-17 05:07:10'),
(42, 'TEz', 'Pos', 'qew', 'qwe', 1, 1, NULL, '2017-07-17 05:07:20', '2017-07-17 05:07:20'),
(43, 'ZAZ', 'GAZ', 'qwe', 'r', 1, 3, NULL, '2017-07-17 05:07:27', '2017-07-17 05:07:27'),
(44, 'Jon', 'Knm', 'qwe', 'qwe', 1, 3, NULL, '2017-07-17 05:07:39', '2017-07-17 05:07:39'),
(45, 'Toms', 'Jons', 'Shetons', 'Batons', 2, 2, NULL, '2017-07-17 05:45:58', '2017-07-17 05:45:58'),
(46, 'Antanas', 'Smetona', 'Aqwe@delga.lt', '8425428', 2, 2, NULL, '2017-07-17 06:00:24', '2017-07-17 06:00:24');

-- --------------------------------------------------------

--
-- Structure for view `testview`
--
DROP TABLE IF EXISTS `testview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `testview`  AS  select `user`.`id` AS `id`,`user`.`name` AS `name`,`user`.`last_name` AS `last_name`,`user`.`email` AS `email`,`user`.`phone_nr` AS `phone_nr`,`user`.`positon_id` AS `positon_id`,`user`.`place_id` AS `place_id`,`user`.`pc_list_id` AS `pc_list_id`,`user`.`created_at` AS `created_at`,`user`.`updated_at` AS `updated_at` from `user` where (`user`.`name` <> 0) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpu_id` (`cpu_id`),
  ADD KEY `os_id` (`os_id`),
  ADD KEY `gpu_id` (`gpu_id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `purpose_id` (`purpose_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pc_list`
--
ALTER TABLE `pc_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`pc_list_id`),
  ADD KEY `pc_list_ibfk_1` (`pc_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`positon_id`),
  ADD KEY `user_ibfk_2` (`pc_list_id`),
  ADD KEY `place_id` (`place_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pc_list`
--
ALTER TABLE `pc_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pc_ibfk_1` FOREIGN KEY (`cpu_id`) REFERENCES `cpu` (`id`),
  ADD CONSTRAINT `pc_ibfk_2` FOREIGN KEY (`os_id`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `pc_ibfk_3` FOREIGN KEY (`gpu_id`) REFERENCES `gpu` (`id`),
  ADD CONSTRAINT `pc_ibfk_4` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `pc_ibfk_5` FOREIGN KEY (`purpose_id`) REFERENCES `purpose` (`id`),
  ADD CONSTRAINT `pc_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`positon_id`) REFERENCES `position` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
