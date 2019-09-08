-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 11:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `dbirth` date NOT NULL,
  `uid` varchar(191) NOT NULL,
  `dchip` datetime NOT NULL,
  `chip_implanted` varchar(191) NOT NULL,
  `chip_price` int(50) NOT NULL,
  `purchase_price` int(100) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available',
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `dbirth`, `uid`, `dchip`, `chip_implanted`, `chip_price`, `purchase_price`, `price`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'chat', '2013-02-03', 'chat1567972875', '2015-02-04 00:00:00', '1', 56, 700, 800, 'soldout', 'hghgh Desct', '2019-09-08 20:04:42', '2019-09-09 03:04:42'),
(2, 'mn', '2013-03-31', 'mn1567973227', '2018-02-24 00:00:00', '1', 600, 500, 700, 'soldout', ' Desct', '2019-09-08 20:25:48', '2019-09-09 03:25:48'),
(3, 'dog', '0000-00-00', 'dog1567974717', '4201-01-31 00:00:00', '1', 600, 600, 7000, 'soldout', 'hjgj Desct', '2019-09-08 20:33:07', '2019-09-09 03:33:07'),
(4, 'Veg', '0238-02-23', 'Veg1567975285', '0201-02-03 00:00:00', '1', 700, 67, 800, 'available', 'nbbm', '2019-09-09 03:41:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `uid` varchar(191) NOT NULL,
  `pet_name` varchar(191) NOT NULL,
  `price` int(100) NOT NULL,
  `return_money` int(11) NOT NULL,
  `priceoption` int(11) NOT NULL DEFAULT '0',
  `unpaid_price` int(11) NOT NULL,
  `customer_name` varchar(191) NOT NULL,
  `customer_phone` varchar(191) NOT NULL,
  `insurance_name` varchar(191) NOT NULL,
  `insurance_price` int(50) NOT NULL,
  `returnpet_time` varchar(100) NOT NULL,
  `description` varchar(191) NOT NULL,
  `pet_option` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `uid`, `pet_name`, `price`, `return_money`, `priceoption`, `unpaid_price`, `customer_name`, `customer_phone`, `insurance_name`, `insurance_price`, `returnpet_time`, `description`, `pet_option`, `created_at`, `updated_at`) VALUES
(1, 'dog1567971120', 'dog', 500, 0, 0, 0, 'Kairanga', '98880809', 'none', 0, '0', 'Desct', '1', '2019-09-05 22:00:00', '0000-00-00 00:00:00'),
(2, 'dog1567971120', 'dog', 500, 0, 0, 0, 'Kairanga', '98880809', 'none', 0, '0', 'Desct', '1', '2019-09-05 22:00:00', '0000-00-00 00:00:00'),
(3, 'gh1567947099', 'dog', 600, 600, 200, 600, 'Eric', '0782389359', 'Discovery', 800, '2019-09-07 23:54:49', 'testing', '2', '2019-09-08 20:28:00', '2019-09-09 03:28:00'),
(4, 'dog1567971151', 'dog', 500, 0, 0, 0, 'Kev', '078238935', 'none', 0, '0', 'Desct', '1', '2019-09-09 02:54:52', '0000-00-00 00:00:00'),
(5, 'chat1567972875', 'chat', 800, 0, 0, 0, 'Kev', '078686867', 'none', 0, '0', 'Desct', '1', '2019-09-09 03:04:12', '0000-00-00 00:00:00'),
(6, 'chat1567972875', 'chat', 800, 0, 0, 0, 'Kev', '078686867', 'none', 0, '0', 'Desct', '1', '2019-09-09 03:04:16', '0000-00-00 00:00:00'),
(7, 'chat1567972875', 'chat', 800, 0, 0, 0, 'Kev', '078686867', 'none', 0, '0', 'Desct', '2', '2019-09-08 20:22:33', '2019-09-09 03:22:33'),
(8, 'chat1567972875', 'chat', 800, 0, 0, 0, 'Kev', '078686867', 'none', 0, '0', 'Desct', '2', '2019-09-08 20:22:26', '2019-09-09 03:22:26'),
(9, 'chat1567972875', 'chat', 800, 0, 0, 0, 'Kev', '078686867', 'none', 0, '0', 'Desct ghfgh', '2', '2019-09-08 20:22:21', '2019-09-09 03:22:21'),
(10, 'mn1567973227', 'mn', 140, 560, 0, 0, 'Fefe', '7787879789', 'MB', 5000, '3 Month', 'Desct', '2', '2019-09-08 20:28:10', '2019-09-09 03:28:10'),
(11, 'mn1567973227', 'mn', 140, 560, 0, 0, 'Fefe', '7787879789', 'MB', 5000, '3 Month', 'Desct', '2', '2019-09-08 20:28:17', '2019-09-09 03:28:17'),
(12, 'dog1567974717', 'dog', 7000, 0, 0, 0, 'kay', '078238935', 'none', 0, '0', 'Desct', '1', '2019-09-09 03:32:55', '0000-00-00 00:00:00'),
(13, 'dog1567974717', 'dog', 7000, 0, 0, 0, 'kay', '078238935', 'none', 0, '0', 'Desct', '1', '2019-09-09 03:33:07', '0000-00-00 00:00:00'),
(14, 'gh1567947099', 'dog', 600, 600, 200, 600, 'Eric', '0782389359', 'Discovery', 800, '2019-09-07 23:54:49', 'testing', '1', '2019-09-09 03:39:46', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
