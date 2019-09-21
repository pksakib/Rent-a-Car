-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 04:40 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_a_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `allvehicle`
--

CREATE TABLE `allvehicle` (
  `vehicle_id` int(50) NOT NULL,
  `brand_id` int(50) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `rent_price` int(50) NOT NULL,
  `image_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `booked_id` int(20) NOT NULL,
  `request_id` int(20) NOT NULL,
  `vehicles_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(50) NOT NULL,
  `city_id` int(20) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `city_id`, `brand_name`) VALUES
(6, 21, 'Toyota'),
(18, 22, 'Ferari'),
(20, 21, 'Ford'),
(21, 22, 'Corrola');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(20) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(21, 'Sylhet'),
(22, 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `nid` int(20) NOT NULL,
  `driver_licence` int(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `vehicle_id` int(100) NOT NULL,
  `start_hour` time(6) NOT NULL,
  `hour` int(100) NOT NULL,
  `arrival_date` date NOT NULL,
  `bkash_trx` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `user_id`, `vehicle_id`, `start_hour`, `hour`, `arrival_date`, `bkash_trx`, `address`, `status`) VALUES
(18, 1, 1, '00:00:00.000000', 10, '2018-12-01', '12345678', 'Mejortila', 'queue'),
(19, 1, 2, '11:11:00.000000', 11, '0111-11-11', '111', 'Bondor', 'queue');

-- --------------------------------------------------------

--
-- Table structure for table `subadmin`
--

CREATE TABLE `subadmin` (
  `user_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nid` int(20) NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subadmin`
--

INSERT INTO `subadmin` (`user_id`, `username`, `password`, `email`, `nid`, `phone`) VALUES
(2, 'polash', '12345', 'polashbaidya01@gmail.com', 222222, 111111);

-- --------------------------------------------------------

--
-- Table structure for table `total_rent_done`
--

CREATE TABLE `total_rent_done` (
  `total_rent_id` int(20) NOT NULL,
  `booked_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nid` int(20) NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `nid`, `phone`) VALUES
(1, 'polash', '12345', 'p', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(50) NOT NULL,
  `brand_id` int(50) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `rent_price` int(50) NOT NULL,
  `image_link` varchar(150) NOT NULL,
  `quantity` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `brand_id`, `vehicle_name`, `rent_price`, `image_link`, `quantity`) VALUES
(1, 20, 'Corola', 30000, 'car1.jpg', 10),
(2, 6, 'voxy', 10000, 'car001.png', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allvehicle`
--
ALTER TABLE `allvehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_fk_brand` (`brand_id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`booked_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `city_fk_id` (`city_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `vehicle_id_fk` (`vehicle_id`);

--
-- Indexes for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `total_rent_done`
--
ALTER TABLE `total_rent_done`
  ADD PRIMARY KEY (`total_rent_id`),
  ADD KEY `booked_id_fk` (`booked_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `brand_fk_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allvehicle`
--
ALTER TABLE `allvehicle`
  MODIFY `vehicle_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `booked_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subadmin`
--
ALTER TABLE `subadmin`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `total_rent_done`
--
ALTER TABLE `total_rent_done`
  MODIFY `total_rent_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allvehicle`
--
ALTER TABLE `allvehicle`
  ADD CONSTRAINT `vehicle_fk_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`);

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `city_fk_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicle_id_fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `total_rent_done`
--
ALTER TABLE `total_rent_done`
  ADD CONSTRAINT `booked_id_fk` FOREIGN KEY (`booked_id`) REFERENCES `booked` (`booked_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `brand_fk_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
