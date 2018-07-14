-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 02:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_car_models`
--

CREATE TABLE `ci_car_models` (
  `car_model_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `car_model_name` varchar(100) NOT NULL,
  `model_color` varchar(100) NOT NULL,
  `manufacturing_year` int(11) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `picture_1` varchar(255) NOT NULL,
  `picture_2` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_car_models`
--

INSERT INTO `ci_car_models` (`car_model_id`, `manufacturer_id`, `car_model_name`, `model_color`, `manufacturing_year`, `registration_number`, `note`, `picture_1`, `picture_2`, `created_on`, `status`) VALUES
(1, 3, '2011 Toyota Tundra', 'Black', 2008, 'T00000001', 'test', 'tundra.jpg', 'tundra1.jpg', '2018-07-11 20:13:39', 1),
(2, 3, '2011 Toyota Tundra', 'Red', 2010, 'T00000002', '2', 'camry.jpg', 'camry2.jpg', '2018-07-11 20:16:23', 0),
(3, 3, 'hhh', 'Black', 221, 'xss', 'dsd', 'camry21.jpg', 'camry1.jpg', '2018-07-14 09:49:38', 1),
(4, 3, 'ASA', 'Red', 2010, 'T00000005', 'dsds', 'camry22.jpg', 'tundra11.jpg', '2018-07-14 09:54:13', 1),
(5, 1, 'hhh', 'sasa', 221, 'xss', 'dsda', 'tundra2.jpg', 'tundra12.jpg', '2018-07-14 09:55:35', 1),
(6, 5, 'a', 'Black', 221, 'xss', 'fdsf', 'tundra3.jpg', 'tundra13.jpg', '2018-07-14 09:58:27', 1),
(7, 3, 'csc', 'Red', 221, 'T00000001', 'jhh', 'camry23.jpg', 'tundra14.jpg', '2018-07-14 09:59:41', 1),
(8, 3, 'csc', 'Red', 221, 'T00000001', 'jhh', 'camry24.jpg', 'tundra15.jpg', '2018-07-14 10:05:19', 1),
(9, 3, 'csc', 'Red', 221, 'T00000001', 'jhh', 'camry25.jpg', 'tundra16.jpg', '2018-07-14 10:05:26', 1),
(10, 1, 'hhh', 'sasa', 221, 'xss', 'ffewe', 'camry26.jpg', 'tundra17.jpg', '2018-07-14 10:06:18', 0),
(11, 1, 'hhh', 'sasa', 221, 'xss', 'ffewe', 'camry27.jpg', 'tundra18.jpg', '2018-07-14 10:06:26', 0),
(12, 3, 'hhh', 'sasa', 221, 'xss', 'sds', 'tundra4.jpg', 'tundra19.jpg', '2018-07-14 10:20:26', 1),
(13, 3, 'eeee', 'sasa', 221, 'T00000001', 'dsds', 'camry3.jpg', 'tundra110.jpg', '2018-07-14 10:23:11', 1),
(14, 6, 'hhhyu', 'sasa', 123, 'xss', 'cxzc', 'camry28.jpg', 'tundra111.jpg', '2018-07-14 10:32:49', 1),
(15, 2, 'dd', 'sasa', 221, 'xss', 'xccx', 'tundra5.jpg', 'tundra112.jpg', '2018-07-14 10:41:06', 1),
(16, 2, 'dd', 'sasaxa', 221, 'xss', 'xccx', 'tundra6.jpg', 'tundra113.jpg', '2018-07-14 10:41:22', 1),
(17, 2, 'dd', 'sasaxa', 221, 'xss', 'xccx', 'tundra7.jpg', 'tundra114.jpg', '2018-07-14 10:41:42', 1),
(18, 6, 'a6t', 'dd', 221, '12', 'fdsff', 'tundra8.jpg', 'camry29.jpg', '2018-07-14 10:44:26', 1),
(19, 3, 'p', 'sasa', 221, 'xss', 'cs', 'tundra115.jpg', 'tundra116.jpg', '2018-07-14 10:48:13', 1),
(20, 3, 'p', 'sasa', 221, 'xss', 'cs', 'tundra117.jpg', 'tundra118.jpg', '2018-07-14 10:48:27', 1),
(21, 3, 'ASA', 'dd', 221, '12', 'sds', 'tundra9.jpg', 'tundra119.jpg', '2018-07-14 10:52:51', 1),
(22, 3, 'ASAeee', 'sasaxa', 123, 'tere', 'vdfds', 'tundra10.jpg', 'tundra120.jpg', '2018-07-14 10:56:12', 1),
(23, 3, 'lklk', 'Black', 221, '222', 'dsa', 'camry210.jpg', 'tundra20.jpg', '2018-07-14 11:13:48', 1),
(24, 3, 'gtgt', 'dd', 123, 'xss', 'ghg', 'camry211.jpg', 'tundra121.jpg', '2018-07-14 11:21:22', 1),
(25, 2, 'hhhrfrf', 'dd', 123, '12', 'jhjh', 'camry212.jpg', 'tundra122.jpg', '2018-07-14 11:32:39', 1),
(26, 2, 'ikikik', 'Black', 3232, 'trtr', 'tyty', 'tundra21.jpg', 'tundra123.jpg', '2018-07-14 11:35:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_manufacturer`
--

CREATE TABLE `ci_manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_manufacturer`
--

INSERT INTO `ci_manufacturer` (`manufacturer_id`, `manufacturer_name`, `created_on`, `status`) VALUES
(1, 'Honda', '2018-07-11 20:04:09', 1),
(2, 'Ford', '2018-07-11 20:05:18', 1),
(3, 'Toyota', '2018-07-11 20:06:22', 1),
(4, '', '2018-07-14 09:39:26', 1),
(5, 'test', '2018-07-14 09:44:05', 1),
(6, 'aaaa', '2018-07-14 09:45:32', 1),
(7, 'rqwe', '2018-07-14 10:27:38', 1),
(8, 'r', '2018-07-14 10:30:23', 1),
(9, 'u', '2018-07-14 10:31:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_car_models`
--
ALTER TABLE `ci_car_models`
  ADD PRIMARY KEY (`car_model_id`);

--
-- Indexes for table `ci_manufacturer`
--
ALTER TABLE `ci_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_car_models`
--
ALTER TABLE `ci_car_models`
  MODIFY `car_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `ci_manufacturer`
--
ALTER TABLE `ci_manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
