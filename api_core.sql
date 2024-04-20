-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 08:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_core`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `delete`, `created_at`, `updated_at`) VALUES
(5, 'demo', '', 1, '2024-03-31 17:25:50', NULL),
(6, 'demo', '', 1, '2024-04-01 05:13:39', NULL),
(7, 'demo', '', 1, '2024-04-01 05:14:57', NULL),
(8, 'demo 2', '', 1, '2024-04-01 05:38:08', NULL),
(9, 'Iphone', '', 1, '2024-04-01 07:42:29', NULL),
(10, 'Demo 2', '', 1, '2024-04-01 11:28:38', NULL),
(11, 'Điện thoại', 'n-a', 1, '2024-04-01 11:34:01', NULL),
(12, 'iphone 1', 'iphone-1', 1, '2024-04-01 11:35:12', NULL),
(13, 'Iphone ', 'iphone', 0, '2024-04-01 11:35:51', NULL),
(14, 'Ipad mini', 'ipad-mini', 0, '2024-04-01 11:35:57', NULL),
(15, 'Ipad gen', 'ipad-gen', 0, '2024-04-01 11:36:12', NULL),
(16, 'Imac 2', 'imac-2', 0, '2024-04-01 11:36:25', '2024-04-01 11:43:36'),
(17, 'Mac mini', 'mac-mini', 0, '2024-04-01 11:36:30', NULL),
(18, 'Điện thoại', '-i-n-tho-i', 1, '2024-04-01 11:37:53', NULL),
(19, 'demo demo demo', 'demo-demo-demo', 1, '2024-04-01 11:58:42', '2024-04-01 12:00:20'),
(20, 'demo', 'demo', 1, '2024-04-02 14:03:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_receive` varchar(255) NOT NULL,
  `phone_receive` varchar(255) NOT NULL,
  `address_receive` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `total_money` decimal(10,0) NOT NULL,
  `status_order` tinyint(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name_receive`, `phone_receive`, `address_receive`, `note`, `total_money`, `status_order`, `user_id`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Bảo Khanh', '312321312', 'Kiên Giang', 'Giao Nhanh', 231231, 2, 2, 0, '2024-04-03 15:37:51', '2024-04-03 17:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 23000000.00, '2024-04-03 16:11:52', NULL),
(1, 1, 2, 23000000.00, '2024-04-03 16:12:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `sale_price` decimal(10,0) NOT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `brand` varchar(255) NOT NULL DEFAULT 'Apple',
  `img` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `content`, `price`, `sale_price`, `hot`, `view_count`, `brand`, `img`, `color`, `category_id`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 12 pro max 2', 'iphone-12-pro-max-2', 'demo 2\r\n', 'demo', 12000000, 11000000, 0, 0, 'Apple', '990fb55b94167b9c7683dbe96880fc0d.jpg', 'Đen', 13, 0, '2024-04-01 12:37:41', '2024-04-01 15:40:22'),
(2, 'iphone 11 pro', 'iphone-11-pro', 'demo', 'Demo', 10999000, 9900000, 1, 0, 'Apple', '418f9bc51058627937eaf375b131825e.jpg', 'Titan', 13, 0, '2024-04-01 12:43:30', NULL),
(3, 'Samsung demo', 'samsung-demo', 'Demo', 'Demo', 23000000, 23000000, 0, 0, 'Apple', '9a9dd60538ad32c71282c5f4b49d3dc4.png', 'Red', 15, 0, '2024-04-01 15:19:46', '2024-04-01 15:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `key`, `value`, `product_id`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'Ram', '8gb', 1, 1, '2024-04-02 15:09:06', NULL),
(2, 'demo', 'demo', 1, 1, '2024-04-02 15:50:12', NULL),
(4, 'CPU', 'Apple A12', 1, 1, '2024-04-02 15:50:54', NULL),
(5, 'demo 1 ', '1', 1, 1, '2024-04-02 16:01:48', NULL),
(8, 'demo 2', '2', 1, 0, '2024-04-02 16:02:43', NULL),
(11, 'ssd', '312312', 1, 0, '2024-04-02 16:03:47', NULL),
(13, 'demo', ' demo', 2, 0, '2024-04-02 16:08:48', NULL),
(15, 'demo', 'demo', 2, 0, '2024-04-02 16:09:11', NULL),
(17, 'demo', 'demo', 2, 0, '2024-04-02 16:09:36', NULL),
(18, 'demo', 'demo', 3, 0, '2024-04-02 16:11:06', NULL),
(19, 'demo2 ', 'demo2', 3, 0, '2024-04-02 16:11:10', NULL),
(20, 'demo3 ', 'demo3', 3, 1, '2024-04-02 16:11:14', NULL),
(21, 'demo 4', 'demo 4', 3, 1, '2024-04-02 16:11:19', NULL),
(22, 'demo', 'demo', 1, 0, '2024-04-02 16:18:29', NULL),
(23, 'demo', 'demo', 1, 1, '2024-04-02 16:18:34', NULL),
(24, 'demo', 'demo', 1, 0, '2024-04-02 16:28:41', NULL),
(25, 'demo', 'demo', 1, 0, '2024-04-02 16:28:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `gender`, `phone`, `delete`, `role`, `created_at`, `updated_at`) VALUES
(2, 'customer', 'customer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cần Thơ', 1, '3123123123', 0, 'customer', '2024-04-03 15:37:12', NULL),
(3, 'staff', 'staff@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Kiên Giang', 0, '312312323', 0, 'staff', '2024-04-03 17:20:28', NULL),
(4, 'Nguyễn Văn A 1', 'nguyenvana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cần Thơ', 1, '123456789', 0, 'staff', '2024-04-03 17:54:07', '2024-04-03 18:03:41'),
(5, 'Vũ Bảo Khanh', 'vubaokhanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Kiên Giang', 1, '1123123123', 0, 'staff', '2024-04-03 18:16:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specifications_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
