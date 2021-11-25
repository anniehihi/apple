-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 01:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(25, 'nguyễn toàn ', 'toan', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `featured` varchar(10) CHARACTER SET utf8 NOT NULL,
  `active` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(26, 'iPhone', 'Apple_Category_760.png', 'Yes', 'Yes'),
(27, 'iPad', 'Apple_Category_369.png', 'Yes', 'Yes'),
(29, 'Mac', 'Apple_Category_310.png', 'Yes', 'Yes'),
(30, 'Apple Watch', 'Apple_Category_98.png', 'Yes', 'Yes'),
(31, 'AirPods', 'Apple_Category_44.png', 'Yes', 'Yes'),
(38, 'Accessory', 'Apple_Category_253.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oder`
--

CREATE TABLE `tbl_oder` (
  `id` int(10) NOT NULL,
  `product` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `oder_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_concat` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) CHARACTER SET utf8 NOT NULL,
  `active` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(17, 'iphone 13 pro max', 'iphone 13', '1000.00', 'Product-Name-4113.png', 26, 'Yes', 'Yes'),
(18, 'iphone 13 pro', 'iphone', '899.00', 'Product-Name-7668.png', 26, 'Yes', 'Yes'),
(19, 'iphone 13', 'iphone ', '699.00', 'Product-Name-9591.png', 26, 'Yes', 'Yes'),
(20, 'iphone 13 mini', 'iphone', '699.00', 'Product-Name-712.png', 26, 'Yes', 'Yes'),
(21, 'iphone 12 pro max', 'iphone', '999.00', 'Product-Name-3433.png', 26, 'Yes', 'Yes'),
(23, 'iphone12', 'iphone', '699.00', 'Apple_Name_1949.png', 26, 'Yes', 'Yes'),
(24, 'iphone11', 'iphone', '599.00', 'Product-Name-4386.png', 26, 'Yes', 'Yes'),
(25, 'iphone xr', 'iphone', '499.00', 'Product-Name-4651.png', 26, 'Yes', 'Yes'),
(26, 'iphone se', 'iphone', '499.00', 'Product-Name-2889.png', 26, 'Yes', 'Yes'),
(27, 'iphone 12', 'dasdsa', '699.00', 'Product-Name-5134.png', 26, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `age` int(100) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` int(20) NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `name`, `age`, `address`, `email`, `phone`, `image_name`) VALUES
(3, 'toan', 20, 'bac ninh', 'toannn21@gmail.com', 32686868, 'Apple_Category_112.jpg'),
(4, 'anh', 20, 'bac ninh', 'toannguyennnn2@gmail.com', 2147483647, 'Apple_Category_769.jpg'),
(5, 'toan', 20, 'bac ninh', 'toannn21@gmail.com', 888888888, 'Apple_Category_900.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_oder`
--
ALTER TABLE `tbl_oder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_oder`
--
ALTER TABLE `tbl_oder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
