-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 12:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `token_no` varchar(10) NOT NULL,
  `pass_id` varchar(10) NOT NULL,
  `metro_no` varchar(10) NOT NULL,
  `from_route` varchar(20) NOT NULL,
  `to_route` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`token_no`, `pass_id`, `metro_no`, `from_route`, `to_route`, `date`) VALUES
('CUS1', 'PASS1', 'M3132 (Lal', 'Lalbagh', 'Trinity', '2022-03-18'),
('CUS2', 'PASS2', 'M6352 (Lal', 'Lalbagh', 'Cubbon Park', '2022-03-19'),
('CUS3', 'PASS3', 'M2156 (Lal', 'Lalbagh', 'Chickpet', '2022-03-13'),
('CUS4', 'PASS4', 'M7362 (Lal', 'Lalbagh', 'Dasarahalli', '2022-03-19'),
('CUS7', 'PASS9', 'M6352 (Lal', 'Lalbagh', 'Cubbon Park', '2022-03-31'),
('CUS8', 'PASS09', 'M3132 (Lal', 'Lalbagh', 'Chickpet', '2022-06-21'),
('CUS9', 'PASS11', 'M7362 (Lal', 'Lalbagh', 'Chickpet', '2022-06-18'),
('CUS10', 'PASS10', 'M7362 (Lal', 'Lalbagh', 'Chickpet', '2022-10-01');


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`) VALUES
('9207', 'varu'),
('1234', 'kitta');
-- --------------------------------------------------------

--
-- Table structure for table `metro_details`
--

CREATE TABLE `metro_details` (
  `metro_no` varchar(50) NOT NULL,
  `arr_time` time NOT NULL,
  `dep_time` time NOT NULL,
  `lines` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metro_details`
--

INSERT INTO `metro_details` (`metro_no`, `arr_time`, `dep_time`, `lines`) VALUES
('M2156', '06:34:25', '06:39:25', 'Line 2'),
('M3132', '08:00:00', '08:10:00', 'Line 3'),
('M5432', '06:55:49', '07:01:35', 'Line 4'),
('M5555', '07:15:00', '07:25:00', 'Pink Line'),
('M5789', '07:35:10', '07:45:10', 'Yellow Line'),
('M6272', '14:33:00', '14:36:00', 'Line 2'),
('M6754', '15:15:00', '15:25:00', 'Yellow Line'),
('M7362', '12:30:00', '12:40:00', 'Line 1'),
('M8292', '15:10:00', '15:15:00', 'Line 4');

--
-- Triggers `metro_details`
--
DELIMITER $$
CREATE TRIGGER `delete_log` BEFORE DELETE ON `metro_details` FOR EACH ROW INSERT INTO metro_logs VALUES(OLD.metro_no,OLD.arr_time,OLD.dep_time,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_log` BEFORE UPDATE ON `metro_details` FOR EACH ROW INSERT INTO metro_logs VALUES(OLD.metro_no,OLD.arr_time,OLD.dep_time,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `metro_logs`
--

CREATE TABLE `metro_logs` (
  `metro_no` varchar(30) NOT NULL,
  `arr_time` varchar(30) NOT NULL,
  `dep_time` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `date_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metro_logs`
--

INSERT INTO `metro_logs` (`metro_no`, `arr_time`, `dep_time`, `action`, `date_time`) VALUES
('7272', '05:00:00', '05:10:00', 'DELETED', '2022-03-21 15:01:12'),
('M5428', '10:15:00', '10:20:00', 'UPDATED', '2022-03-21 15:06:48'),
('M7200', '18:10:00', '18:20:00', 'UPDATED', '2022-03-21 15:06:57'),
('M7200', '18:10:00', '18:15:00', 'DELETED', '2022-03-21 15:07:02'),
('M2431', '08:20:00', '08:25:00', 'UPDATED', '2022-03-23 16:07:33'),
('M2431', '08:20:00', '08:30:00', 'DELETED', '2022-03-25 15:14:08'),
('M5428', '10:15:00', '10:20:00', 'DELETED', '2022-03-25 15:14:09'),
('M6297', '15:00:00', '15:10:00', 'DELETED', '2022-03-25 15:14:09'),
('M7530', '12:45:00', '12:55:00', 'DELETED', '2022-03-25 15:14:10'),
('M2156', '10:15:00', '10:20:00', 'UPDATED', '2022-03-29 21:31:28'),
('M2156', '10:15:00', '10:25:00', 'DELETED', '2022-03-29 21:32:13'),
('M3132', '08:00:00', '08:05:00', 'UPDATED', '2022-03-31 08:44:21'),
('m3145', '15:12:00', '15:20:00', 'UPDATED', '2022-12-27 21:13:56'),
('m3145', '15:12:00', '15:20:00', 'UPDATED', '2022-12-27 21:14:18'),
('m3145', '15:12:00', '15:20:00', 'DELETED', '2022-12-27 21:14:24'),
('M6272', '14:33:00', '14:36:00', 'UPDATED', '2023-01-02 19:18:14'),
('M9207', '10:45:00', '10:50:00', 'DELETED', '2023-01-10 15:14:22'),
('M3132', '08:00:00', '08:10:00', 'UPDATED', '2023-01-12 18:59:43'),
('M7362', '12:30:00', '12:40:00', 'UPDATED', '2023-01-12 19:00:27'),
('M5555', '07:15:00', '07:25:00', 'UPDATED', '2023-01-12 19:04:19'),
('M7654', '15:15:00', '15:25:00', 'UPDATED', '2023-01-12 19:07:14'),
('M6272', '14:33:00', '14:36:00', 'UPDATED', '2023-01-12 19:12:53'),
('M8292', '15:10:00', '15:15:00', 'UPDATED', '2023-01-12 19:16:25'),
('M2156', '06:34:25', '06:39:25', 'UPDATED', '2023-01-12 19:27:51'),
('M5432', '06:55:49', '07:01:35', 'UPDATED', '2023-01-12 19:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `pass_id` varchar(10) NOT NULL,
  `reg_id` varchar(10) NOT NULL,
  `passname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`pass_id`, `reg_id`, `passname`, `email`, `gender`, `age`, `phone`) VALUES
('PASS1', 'REGR1', 'Ajay Salian', 'ajay@gmail.com', 'Male', '19', '9035346538'),
('PASS10', 'REGR11', 'Madhav', 'madhav@gmail.com', 'Male', '25', '7760548932'),
('PASS6', 'REGR6', 'Niharika KV', 'niharika@gmail.com', 'Female', '20', '8272992283'),
('PASS4', 'REGR4', 'Darshan', 'darshan@gmail.com', 'Male', '28', '8972262532'),
('PASS5', 'REGR5', 'Aryan rao', 'aryan76@gmail.com', 'Male', '26', '9282918223'),
('PASS7', 'REGR7', 'Manohar', 'manohar69@gmai.com', 'Male', '20', '8943450743'),
('PASS9', 'REG9', 'Keerthan', 'keerthan66@gmail.com', 'Male', '20', '8372655242');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` varchar(10) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `passwordc` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `first`, `last`, `email`, `password`, `passwordc`) VALUES
('REGR10', 'keerthan', 'salian', 'keerthansalian@gmail.com', 'kitta', 'kitta'),
('REGR5', 'rakesh', 'rao', 'rakesh@gmail.com', '1234', '1234'),
('REGR6', 'varun', 'ballal', 'varunballal@gmai.com', 'varu', 'varu'),
('REGR7', 'rajesh', 'kumar', 'rajesh@gmail.com', 'rajesh@1', 'rajesh@1');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `metro_no` varchar(10) NOT NULL,
  `route_id` varchar(10) NOT NULL,
  `from_route` varchar(20) NOT NULL,
  `to_route` varchar(20) NOT NULL,
  `lines` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`metro_no`, `route_id`, `from_route`, `to_route`, `lines`) VALUES
('M3132', 'R6754', 'Lalbagh', 'Trinity', 'line 3'),
('M2156', 'R9278', 'Lalbagh', 'Chickpet', 'line 2'),
('M7362', 'R0292', 'Lalbagh', 'Dasarahalli', 'Line 1'),
('M5432', 'R5678', 'Lalbagh', 'Chickpet', 'Line 4'),
('M6754', 'R8945', 'KR Puram', 'Hebbal', 'Blue Line'),
('M5789', 'R4567', 'RV Road', 'Bommsandra', 'Yellow Line'),
('M5555', 'R5555', 'Central silk Board', 'Kr Puram', 'Pink Line'),
('M6272', 'R6734', 'Gottigere', 'Bangalore Airport', 'Pink Line'),
('M8292', 'R8723', 'Rv Road', 'Bommasandra', 'Line 4');

--
-- Triggers `routes`
--
DELIMITER $$
CREATE TRIGGER `routedel` BEFORE DELETE ON `routes` FOR EACH ROW INSERT INTO route_logs VALUES(OLD.metro_no,OLD.route_id,OLD.from_route,OLD.to_route,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `routeupdate` BEFORE UPDATE ON `routes` FOR EACH ROW INSERT INTO route_logs VALUES(OLD.metro_no,OLD.route_id,OLD.from_route,OLD.to_route,"OLD VALUES",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `route_logs`
--

CREATE TABLE `route_logs` (
  `metro_no` varchar(50) NOT NULL,
  `route_id` varchar(50) NOT NULL,
  `from_route` varchar(50) NOT NULL,
  `to_route` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_logs`
--

INSERT INTO `route_logs` (`metro_no`, `route_id`, `from_route`, `to_route`, `action`, `date`) VALUES
('M213', 'R7372', 'Lalbagh', 'Chickpet', 'DELETED', '2022-02-08 19:00:49'),
('M3622', 'R8383', 'Lalbagh', 'Trinity', 'OLD VALUES', '2022-02-08 19:05:13'),
('M3132', 'R6754', 'Lalbagh', 'Madikeri', 'OLD VALUES', '2022-02-09 18:45:01'),
('M3132', 'R6754', 'Lalbagh', 'kasaragod', 'OLD VALUES', '2022-03-25 13:33:49'),
('M3622', 'R8383', 'Majestic', 'Trinity', 'DELETED', '2022-03-25 13:37:07'),
('M8764', 'R01927', 'Lalbagh', 'Cubbon Park', 'DELETED', '2022-03-25 13:57:12'),
('M7282', 'R8329', 'Lalbagh', 'Halasuru', 'DELETED', '2022-03-25 14:44:25'),
('M8292', 'R9383', 'Lalbagh', 'Dasarahalli', 'OLD VALUES', '2022-03-25 14:57:32'),
('M9207', 'R8282', 'Lalbagh', 'Chickpet', 'OLD VALUES', '2022-03-31 08:45:30'),
('M9207', 'R8282', 'Lalbagh', 'Chickpet', 'DELETED', '2022-03-31 08:45:34'),
('M2156', 'R9278', 'Lalbagh', 'Chickpet', 'OLD VALUES', '2022-03-31 14:33:56'),
('M8292', 'R9383', 'Lalbagh', 'Kuvempu road', 'DELETED', '2022-06-11 20:49:13'),
('m420', 'r3133', 'benjanapadav', 'bantwal', 'DELETED', '2022-12-27 21:20:33'),
('m3143', 'r3133', 'benjanapadav', 'bantwal', 'DELETED', '2022-12-28 12:46:13'),
('M5432', 'R5678', 'Lalbagh', 'Chickpet', 'OLD VALUES', '2022-12-29 18:41:20'),
('M5432', 'R5678', 'Lalbagh', 'Chickpet', 'OLD VALUES', '2023-01-02 19:20:02'),
('M5432', 'R5678', 'Lalbagh', 'Chickpet', 'OLD VALUES', '2023-01-02 19:20:24'),
('M5555', 'R5555', 'Central Silk Board', 'KR_Puram', 'OLD VALUES', '2023-01-12 18:56:12'),
('M5555', 'R5555', 'Central Silk Board', 'KR_Puram', 'DELETED', '2023-01-12 18:56:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `metro_details`
--
ALTER TABLE `metro_details`
  ADD PRIMARY KEY (`metro_no`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
