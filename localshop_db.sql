-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 04:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `delivery_address` varchar(1024) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `delivery_address`, `phone`, `amount`, `user_id`, `date`, `paid`, `status`) VALUES
(1, 'Irene Kats', 'irene@example.com', 'Kasese', '07712345678', '620000.00', 1, '2023-07-14 17:04:11', 0, NULL),
(2, 'Irene Kats', 'irene@example.com', 'Kasese', '07712345678', '1520000.00', 1, '2023-07-15 16:04:13', 0, 'pending'),
(3, 'Irene Kats', 'irene@example.com', 'Kasese', '07712345678', '1520000.00', 1, '2023-07-15 16:05:35', 0, 'pending'),
(4, 'Irene Kats', 'irene@example.com', 'Kasese', '07712345678', '1520000.00', 1, '2023-07-15 16:19:07', 0, 'pending'),
(5, 'Irene Kats', 'irene@example.com', 'Kasese', '07712345678', '1520000.00', 1, '2023-07-15 16:19:48', 0, 'pending'),
(6, 'Irene Kats', 'lyn@example.com', 'Kasese', '07712345678', '1520000.00', 1, '2023-07-15 16:21:01', 0, 'pending'),
(7, 'Irene Kats', 'lyn@example.com', 'Kasese', '07712345678', '2190000.00', 1, '2023-07-15 16:23:00', 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `description`, `qty`, `total`, `amount`) VALUES
(1, 1, 'Converse shoes for women', 1, '450000.00', '450000.00'),
(2, 1, 'Headphones by beats by dre', 1, '120000.00', '120000.00'),
(3, 1, 'For men and women', 1, '50000.00', '50000.00'),
(4, 2, '', 1, '0.00', '1520000.00'),
(5, 2, '', 1, '0.00', '1520000.00'),
(6, 2, '', 1, '0.00', '1520000.00'),
(7, 3, '', 1, '0.00', '1520000.00'),
(8, 3, '', 1, '0.00', '1520000.00'),
(9, 3, '', 1, '0.00', '1520000.00'),
(10, 4, '', 1, '0.00', '1520000.00'),
(11, 4, '', 1, '0.00', '1520000.00'),
(12, 4, '', 1, '0.00', '1520000.00'),
(13, 5, '', 1, '0.00', '1520000.00'),
(14, 5, '', 1, '0.00', '1520000.00'),
(15, 5, '', 1, '0.00', '1520000.00'),
(16, 6, '', 1, '0.00', '1520000.00'),
(17, 6, '', 1, '0.00', '1520000.00'),
(18, 6, '', 1, '0.00', '1520000.00'),
(19, 7, '', 1, '0.00', '2190000.00'),
(20, 7, '', 1, '0.00', '2190000.00'),
(21, 7, '', 1, '0.00', '2190000.00'),
(22, 7, '', 1, '0.00', '2190000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(1024) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qty` int(11) DEFAULT 1,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `qty`, `user_id`) VALUES
(1, 'Men shoes', 'Cool shoes for evening walk', 'uploads/men shoes.jpg', '60000.00', 2, 0),
(2, 'Converse allstar', 'Converse shoes for women', 'uploads/converse allstar.jpg', '450000.00', 6, 0),
(3, 'Camera', 'Megapixel canon camera', 'uploads/camera.jpg', '500000.00', 10, 0),
(4, 'Headphones', 'Headphones by beats by dre', 'uploads/headphones.webp', '120000.00', 7, 0),
(5, 'Sports shoes', 'For men and women', 'uploads/men shoes.jpg', '50000.00', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `role`, `date`) VALUES
(1, 'irene', 'irene@example.com', '$2y$10$LQBl0kfa4rYEbAuhsAwmveKJ6W35yVUpiL/HAIz5vps1ZPWPX1gyi', NULL, 'admin', '2023-07-10 11:41:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `paid` (`paid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
