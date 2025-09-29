-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 01:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'Sourav Jha', 'sjha@gmail.com', '1234', 'active', '2022-07-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `thumbnail` blob NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `thumbnail`, `status`, `created_at`) VALUES
(1, 'abc 123', 0x38313632313637313753637265656e73686f7420283132292e706e67, 'Active', '2022-07-12 13:06:22'),
(2, 'new ', 0x3231313837323734353053637265656e73686f74202835292e706e67, 'Active', '2022-07-12 13:25:25'),
(3, 'next', 0x3139343339393733383753637265656e73686f74202836292e706e67, 'Active', '2022-07-12 13:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `category` varchar(30) NOT NULL,
  `product` varchar(30) NOT NULL,
  `order_date` varchar(30) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `payment_mode` varchar(25) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `category`, `product`, `order_date`, `amount`, `payment_mode`, `order_status`, `user_email`, `created_at`, `quantity`) VALUES
(10, '1897742', 'new', 'car 2', '15-07-2022', '1200', 'Cash on Delivery', 'Approved', 'daman@gmail.com', '2022-07-15 15:12:31', 1),
(11, '1116117', 'next', 'sunset 2', '15-07-2022', '1200', 'Cash on Delivery', 'Approved', 'daman@gmail.com', '2022-07-15 15:20:28', 2),
(12, '1163101', 'new', 'car 3', '15-07-2022', '1400', 'Cash on Delivery', 'Declined', 'daman@gmail.com', '2022-07-15 15:37:21', 2),
(13, '1163101', 'new', 'car 3', '15-07-2022', '1400', 'Cash on Delivery', 'Declined', 'daman@gmail.com', '2022-07-15 15:37:22', 1),
(14, '1659619', 'next', 'sunset 2', '16-07-2022', '600', 'Cash on Delivery', 'Declined', '', '2022-07-16 14:05:50', 1),
(15, '1156032', 'next', 'sunset 2', '16-07-2022', '600', 'Cash on Delivery', 'Approved', '', '2022-07-16 14:07:03', 1),
(16, '1476497', 'next', 'sunset 2', '16-07-2022', '600', 'Cash on Delivery', 'pending', 'daman@gmail.com', '2022-07-16 14:07:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `product_name` varchar(35) NOT NULL,
  `image` blob NOT NULL,
  `description` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `product_name`, `image`, `description`, `quantity`, `cost`, `status`, `created_at`) VALUES
(2, 'abc 123', 'landscape', 0x36323339383031333853637265656e73686f74202832292e706e67, 'new material', 5, '150', 'Active', '2022-07-12 10:42:28'),
(3, 'abc 123', 'land 1', 0x313939323638363935366c616e64312e6a7067, 'this is new material in sale.', 2, '800', 'Active', '2022-07-13 08:22:25'),
(4, 'abc 123', 'land 2', 0x3138303234353237306c616e64322e6a7067, 'This will look nice on your wall.', 5, '600', 'Active', '2022-07-13 08:26:24'),
(5, 'abc 123', 'land 3', 0x313732383438323030366c616e64332e6a7067, 'we are happy to sell you this', 4, '400', 'Active', '2022-07-13 08:28:19'),
(6, 'new', 'cars', 0x31373033373238383039636172312e6a7067, 'this poster of car is nice.', 1, '800', 'Active', '2022-07-13 08:29:18'),
(7, 'new', 'car 2', 0x313636363034373233636172322e6a7067, 'take a look at this.', 3, '600', 'Active', '2022-07-13 08:30:01'),
(8, 'new', 'car 3', 0x353033393434323030636172332e6a7067, 'nice picture in car.', 1, '200', 'Active', '2022-07-13 08:30:37'),
(9, 'next', 'sunset', 0x373634303238373138736574312e6a7067, 'this is sunset.', 4, '600', 'Active', '2022-07-13 08:31:17'),
(10, 'next', 'sunset 2', 0x32313233343631353734736574332e6a7067, 'nice picture .', 2, '600', 'Active', '2022-07-13 08:34:51'),
(11, 'abc 123', 'land 4', 0x383337373931303435736574322e6a7067, 'this is my new clip', 1, '150', 'Active', '2022-07-13 10:38:37'),
(12, 'abc 123', 'land 4', 0x39383938313731323353637265656e73686f74202833292e706e67, 'this is my newly added file. It will be good for users.', 5, '100', 'Active', '2022-07-13 13:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `password` varchar(8) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(8) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_email`, `password`, `contact`, `address`, `city`, `state`, `pincode`, `status`, `created_at`) VALUES
(1, 'daman', 'daman@gmail.com', '123456', 2147483647, 'Model Town', 'Jalandhar', 'Punjab', 144001, 'Active', '2022-07-11 14:06:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
