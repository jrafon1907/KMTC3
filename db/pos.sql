-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 07:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `userid` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `userid`, `productid`, `qty`) VALUES
(89, 117, 112, 1),
(126, 137, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category_name`) VALUES
(1, 'Litters'),
(2, 'Dog Food'),
(3, 'Cat Food'),
(4, 'Dog Accesories'),
(7, 'Cat Accesories'),
(11, 'Supplements'),
(13, 'Dog Shampoo'),
(14, 'Cat Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userid` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`userid`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(137, 'Javee R. Rafon', '09948019153', 'jrafon19@gmail.com', 'Mayamot Antipolo City');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_data`) VALUES
(1, 'upload/ac4_1709743984.jpg'),
(2, 'upload/c18_1702629996_1709744009.jpg'),
(3, 'upload/c18_1704115451_1709746696.jpg'),
(4, 'upload/360_F_585864419_kgIYUcDQ0yiLOCo1aRjeu7kRxndcoitz_1711436956.jpg'),
(5, 'upload/433204566_1138498423858103_8925683753151053926_n_1711440168.jpg'),
(6, 'upload/360_F_585864419_kgIYUcDQ0yiLOCo1aRjeu7kRxndcoitz_1711440337.jpg'),
(7, 'upload/360_F_585864419_kgIYUcDQ0yiLOCo1aRjeu7kRxndcoitz_1711440418.jpg'),
(8, 'upload/360_F_585864419_kgIYUcDQ0yiLOCo1aRjeu7kRxndcoitz_1711440425.jpg'),
(9, 'upload/360_F_585864419_kgIYUcDQ0yiLOCo1aRjeu7kRxndcoitz_1711440466.jpg'),
(10, 'upload/360_F_585864419_kgIYUcDQ0yiLOCo1aRjeu7kRxndcoitz_1711440476.jpg'),
(11, 'upload/360_F_585864419_kgIYUcDQ0yiLOCo1aRjeu7kRxndcoitz_1711440869.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `inventory_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `userid`, `action`, `productid`, `quantity`, `inventory_date`) VALUES
(128, 1, 'Add Product', 109, 100, '2023-12-29 10:33:20'),
(129, 91, 'Purchase', 109, 1, '2024-01-01 15:34:11'),
(130, 1, 'Add Product', 110, 100, '2024-01-01 21:20:26'),
(131, 1, 'Add Product', 111, 100, '2024-01-01 21:24:11'),
(132, 1, 'Add Product', 112, 60, '2024-01-01 21:27:40'),
(133, 1, 'Add Product', 113, 30, '2024-01-27 09:02:01'),
(134, 1, 'Add Product', 114, 10, '2024-01-27 09:04:18'),
(135, 1, 'Add Product', 115, 50, '2024-01-27 20:53:04'),
(136, 91, 'Add Product', 116, 100, '2024-02-05 14:37:50'),
(137, 91, 'Purchase', 109, 1, '2024-02-09 14:17:45'),
(138, 1, 'Add Product', 117, 10, '2024-02-15 14:25:51'),
(139, 1, 'Add Product', 118, 20, '2024-02-15 14:28:57'),
(140, 1, 'Update Quantity', 118, 10, '2024-02-19 17:46:15'),
(141, 91, 'Purchase', 118, 1, '2024-02-19 17:47:01'),
(142, 91, 'Update Quantity', 118, 11, '2024-02-19 18:14:26'),
(143, 91, 'Purchase', 118, 1, '2024-02-19 18:43:39'),
(144, 91, 'Purchase', 118, 2, '2024-02-19 18:52:45'),
(145, 1, 'Purchase', 118, 3, '2024-02-19 19:17:24'),
(146, 1, 'Add Product', 119, 10, '2024-02-20 22:34:13'),
(147, 134, 'Purchase', 119, 1, '2024-02-20 22:41:35'),
(148, 134, 'Purchase', 119, 1, '2024-02-20 22:42:18'),
(149, 134, 'Purchase', 119, 3, '2024-02-26 14:21:27'),
(150, 134, 'Purchase', 113, 10, '2024-02-26 14:25:27'),
(151, 1, 'Add Product', 120, 40, '2024-02-26 22:24:13'),
(152, 135, 'Purchase', 120, 1, '2024-02-28 18:49:25'),
(153, 135, 'Purchase', 120, 1, '2024-02-28 19:28:18'),
(154, 135, 'Purchase', 119, 1, '2024-02-28 20:08:41'),
(155, 135, 'Purchase', 116, 1, '2024-02-28 20:08:41'),
(156, 135, 'Purchase', 116, 1, '2024-02-28 20:10:09'),
(157, 135, 'Purchase', 112, 1, '2024-02-28 20:15:19'),
(158, 135, 'Purchase', 113, 1, '2024-02-28 20:16:45'),
(159, 135, 'Purchase', 120, 1, '2024-02-28 20:18:11'),
(160, 135, 'Purchase', 118, 1, '2024-02-28 20:20:30'),
(161, 135, 'Purchase', 120, 1, '2024-02-28 21:08:22'),
(162, 135, 'Purchase', 111, 1, '2024-02-28 21:10:16'),
(163, 135, 'Purchase', 110, 1, '2024-02-28 21:10:16'),
(164, 135, 'Purchase', 120, 1, '2024-02-28 21:11:21'),
(165, 135, 'Purchase', 119, 1, '2024-02-28 21:14:46'),
(166, 135, 'Purchase', 120, 1, '2024-02-28 21:17:26'),
(167, 135, 'Purchase', 120, 1, '2024-02-28 21:39:36'),
(168, 135, 'Purchase', 119, 1, '2024-02-28 21:39:36'),
(169, 135, 'Purchase', 120, 1, '2024-02-28 21:45:53'),
(170, 135, 'Purchase', 120, 1, '2024-02-28 21:46:41'),
(171, 135, 'Purchase', 120, 1, '2024-02-28 21:57:23'),
(172, 137, 'Purchase', 120, 1, '2024-03-01 02:55:36'),
(173, 137, 'Purchase', 120, 1, '2024-03-26 16:14:05'),
(174, 137, 'Purchase', 119, 1, '2024-03-26 16:14:05'),
(175, 1, 'Update Quantity', 119, 130, '2024-03-26 18:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `created_at`) VALUES
(1, 'gcash', '2024-02-28 12:08:41'),
(2, 'cash_on_delivery', '2024-02-28 12:10:09'),
(3, 'cash_on_delivery', '2024-02-28 12:18:11'),
(4, 'cash_on_delivery', '2024-02-28 13:17:26'),
(5, 'cash_on_delivery', '2024-02-28 13:45:53'),
(6, 'cash_on_delivery', '2024-02-28 13:46:41'),
(7, 'cash_on_delivery', '2024-02-28 13:57:23'),
(8, 'gcash', '2024-02-29 18:55:36'),
(9, 'cash_on_delivery', '2024-03-26 08:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_des` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unit_of_measure` varchar(50) DEFAULT NULL,
  `product_exp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `product_name`, `product_des`, `product_price`, `product_qty`, `photo`, `created_at`, `unit_of_measure`, `product_exp`) VALUES
(110, 2, 'Pedigree', 'For Dogs only', 25, 99, 'upload/c9_1704115226.jpg', '2024-01-01 13:20:26', '1 pocket', '2024-04-18'),
(111, 4, 'Goodest Tuna Chomp', 'For Cats only', 35, 99, 'upload/c18_1704115451.jpg', '2024-01-01 13:24:11', '1 pocket', '2024-04-10'),
(112, 0, 'Leash for dogs', 'For dogs only', 100, 59, 'upload/leash dog_1704115660.jpg', '2024-01-01 13:27:40', '2 meters', '2026-06-20'),
(113, 1, 'feline fresh cat litter', '10L Lemongrass', 150, 19, 'upload/cn2_1706317321.jpg', '2024-01-27 01:02:01', '10L', '2025-05-26'),
(114, 3, 'cindy recipe whole mackerel', 'Grane Free rich in omega 3', 250, 10, 'upload/c14_1706317458.jpg', '2024-01-27 01:04:18', '1/2 kg', '2024-04-08'),
(116, 13, 'Royal Tail Essential ', 'Anti - Bacterial', 200, 98, 'upload/dn1_1707115070.jpg', '2024-02-05 06:37:50', '1 bottle', '2025-07-20'),
(118, 2, 'Royal canin', '2- 12 months', 300, 4, 'upload/d12_1707978537.jpg', '2024-02-15 06:28:57', '1.5kg', '2024-04-20'),
(119, 13, 'Royal armor soap', 'Tick and Flea Control Soap', 80, 130, 'upload/dn8_1708439653.jpg', '2024-02-20 14:34:13', '1pc 1 box', '2024-03-30'),
(120, 1, 'Feline Fresh Cat Litter', 'For Cats only Lemon Flavor', 200, 28, 'upload/cn3_1708957453.jpg', '2024-02-26 14:24:13', '10L', '2025-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sales_total` double NOT NULL,
  `sales_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `userid`, `sales_total`, `sales_date`) VALUES
(64, 135, 200, '2024-02-28 21:46:41'),
(65, 135, 200, '2024-02-28 21:57:23'),
(66, 137, 200, '2024-03-01 02:55:36'),
(67, 137, 280, '2024-03-26 16:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `sales_detailid` int(11) NOT NULL,
  `salesid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sales_qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`sales_detailid`, `salesid`, `productid`, `sales_qty`) VALUES
(56, 33, 109, 1),
(57, 35, 109, 1),
(58, 36, 118, 1),
(59, 37, 118, 1),
(60, 38, 118, 2),
(61, 39, 118, 3),
(62, 40, 119, 1),
(63, 41, 119, 1),
(64, 42, 119, 3),
(65, 43, 113, 10),
(66, 44, 120, 1),
(67, 45, 120, 1),
(68, 46, 119, 1),
(69, 46, 116, 1),
(70, 47, 116, 1),
(71, 48, 112, 1),
(72, 49, 113, 1),
(73, 50, 120, 1),
(74, 51, 118, 1),
(75, 53, 120, 1),
(76, 55, 111, 1),
(77, 55, 110, 1),
(78, 57, 120, 1),
(79, 59, 119, 1),
(80, 60, 120, 1),
(81, 62, 120, 1),
(82, 62, 119, 1),
(83, 63, 120, 1),
(84, 64, 120, 1),
(85, 65, 120, 1),
(86, 66, 120, 1),
(87, 67, 120, 1),
(88, 67, 119, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `userid` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`userid`, `company_name`, `full_name`, `company_address`, `contact`) VALUES
(32, 'Marikina PetSupplies.Corp', 'Kurt Angel Ho ', 'Mac Admas Road Mayamot Antipolo City', '09329267853'),
(33, 'Furry things Pet Supplies.Corp', 'Joana Marie Ramirez', 'Sampaloc Manila', '09072881366'),
(35, 'pet supplies .Corp', 'Juvy Rafon', 'Tanay Rizal', '09329267853');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(1) NOT NULL,
  `is_verified` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `access`, `is_verified`) VALUES
(1, 'admin', 'admin', 1, 0),
(137, 'javee', 'javee', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`sales_detailid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sales_detail`
--
ALTER TABLE `sales_detail`
  MODIFY `sales_detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
