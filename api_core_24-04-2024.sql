-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 05:35 PM
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
(11, 'Điện thoại', 'phone', 1, '2024-04-01 11:34:01', NULL),
(13, 'Iphone ', 'iphone', 0, '2024-04-01 11:35:51', NULL),
(14, 'Ipad mini', 'ipad-mini', 0, '2024-04-01 11:35:57', NULL),
(15, 'Ipad gen', 'ipad-gen', 0, '2024-04-01 11:36:12', NULL),
(16, 'macbook', 'macbook', 0, '2024-04-01 11:36:25', '2024-04-01 11:43:36'),
(17, 'Mac mini', 'mac-mini', 0, '2024-04-01 11:36:30', NULL);

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

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path_name`, `title`, `product_id`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'f19b5c895f400152d56bb7169c22e3f6.jpg', 'iphone-13-promax', 4, 0, '2024-04-23 09:18:53', NULL),
(3, '9a9dd60538ad32c71282c5f4b49d3dc4.png', 'iphone-13-promax-2', 4, 0, '2024-04-23 09:19:56', NULL),
(4, '418f9bc51058627937eaf375b131825e.jpg', 'iphoen-13-pm-3', 4, 0, '2024-04-23 09:20:14', NULL),
(7, '418f9bc51058627937eaf375b131825e.jpg', 'samsung', 3, 0, '2024-04-24 13:32:58', NULL),
(8, '9a9dd60538ad32c71282c5f4b49d3dc4.png', 'samsung', 3, 0, '2024-04-24 13:33:11', NULL),
(9, 'f19b5c895f400152d56bb7169c22e3f6.jpg', 'samsung', 3, 0, '2024-04-24 13:33:26', NULL),
(10, 'f19b5c895f400152d56bb7169c22e3f6.jpg', 'ip-11', 2, 0, '2024-04-24 13:33:41', NULL),
(13, '9a9dd60538ad32c71282c5f4b49d3dc4.png', 'ip-11', 2, 0, '2024-04-24 13:33:53', NULL),
(14, '418f9bc51058627937eaf375b131825e.jpg', 'ip-11', 2, 0, '2024-04-24 13:34:06', NULL);

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
(1, 'Vũ Bảo Khanh', '312321312', 'Kiên Giang', 'Giao Nhanh', 231231, 2, 2, 0, '2024-04-03 15:37:51', '2024-04-03 17:09:07'),
(2, 'Nguyễn Văn An', '0685395869', 'Vĩnh Long', 'Giao lẹ bạn ơi', 25000000, 1, 8, 0, '2024-04-24 15:19:21', NULL);

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
(1, 1, 2, 23000000.00, '2024-04-03 16:12:18', NULL),
(4, 2, 1, 20000000.00, '2024-04-24 15:19:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `post_cat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `post_cat_id`, `user_id`, `title`, `content`, `views`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'how-to-use-dynamic-island-in-iphone-14', 1, 3, 'How to use dynamic island in iphone 14', '<p>\r\nWhen the iPhone 14 Pro models were announced in 2022, Apple surprised many with its innovative integration of software functions with the pill-shaped cutout at the top of the screen. Apple calls this area of the display the \"Dynamic Island,\" and has since extended the feature to all iPhone 15 models. This article explains what ‌Dynamic Island‌ does, how it works, and how you can interact with it to perform actions.\r\n</p>\r\n<h3>What Is Dynamic Island and How Does It Work?</h3>\r\n<p>Prior to Apple\'s ‌iPhone 14‌ Pro launch, we learned that Apple was working on an alternative to the notch that incorporated a pill-shaped cutout and a hole punch cutout to house the TrueDepth camera hardware. We also exclusively reported that these cutouts would appear as one contiguous, longer pill shape when the ‌iPhone 14‌ Pro was in use, and that Apple also planned to integrate software functions around the pill.</p>\r\n<p>As we know now, on the ‌iPhone 14‌ Pro and all ‌iPhone 15‌ models, display pixels around what Apple calls the \"‌Dynamic Island‌\" merge it into one pill-shaped area that changes size and shape to accommodate various types of alerts, notifications, and interactions, turning it into a kind of front-and-center information hub.</p>\r\n', 7, '990fb55b94167b9c7683dbe96880fc0d.jpg', 1, '2024-04-21 07:57:21', '2024-04-21 07:57:21'),
(4, 'help-with-the-app-store', 2, 3, 'Help to fix app store issue', '<p>\r\nWhen the iPhone 14 Pro models were announced in 2022, Apple surprised many with its innovative integration of software functions with the pill-shaped cutout at the top of the screen. Apple calls this area of the display the \"Dynamic Island,\" and has since extended the feature to all iPhone 15 models. This article explains what ‌Dynamic Island‌ does, how it works, and how you can interact with it to perform actions.\r\n</p>\r\n<h3>What Is Dynamic Island and How Does It Work?</h3>\r\n<p>Prior to Apple\'s ‌iPhone 14‌ Pro launch, we learned that Apple was working on an alternative to the notch that incorporated a pill-shaped cutout and a hole punch cutout to house the TrueDepth camera hardware. We also exclusively reported that these cutouts would appear as one contiguous, longer pill shape when the ‌iPhone 14‌ Pro was in use, and that Apple also planned to integrate software functions around the pill.</p>\r\n<p>As we know now, on the ‌iPhone 14‌ Pro and all ‌iPhone 15‌ models, display pixels around what Apple calls the \"‌Dynamic Island‌\" merge it into one pill-shaped area that changes size and shape to accommodate various types of alerts, notifications, and interactions, turning it into a kind of front-and-center information hub.</p>\r\n', 7, '418f9bc51058627937eaf375b131825e.jpg', 1, '2024-04-21 07:57:21', '2024-04-21 07:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `slug`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'technologies', 'Technologies', '', 1, '2024-04-21 03:34:01', '2024-04-21 03:34:01'),
(2, 'help-center', 'Help center', '', 1, '2024-04-21 03:34:01', '2024-04-21 03:34:01');

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
(1, 'Iphone 12 pro max 2', 'iphone-12-pro-max-2', 'demo 2\r\n', 'demo', 12000000, 11000000, 0, 0, 'Apple', '990fb55b94167b9c7683dbe96880fc0d.jpg', 'Black', 13, 0, '2024-04-01 12:37:41', '2024-04-01 15:40:22'),
(2, 'iphone 11 pro', 'iphone-11-pro', 'demo', 'Demo', 10999000, 9900000, 1, 0, 'Apple', '418f9bc51058627937eaf375b131825e.jpg', 'Titan', 13, 0, '2024-04-01 12:43:30', NULL),
(3, 'Samsung demo', 'samsung-demo', 'Demo', 'Demo', 23000000, 23000000, 0, 0, 'Apple', '9a9dd60538ad32c71282c5f4b49d3dc4.png', 'Red', 15, 0, '2024-04-01 15:19:46', '2024-04-01 15:33:56'),
(4, 'Iphone 13 Promax', 'iphone-13-promax', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo pharetras loremos.\r\n\r\nProducts Infomation\r\n', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. \r\n\r\n', 25000000, 20000000, 1, 0, 'Apple', 'f19b5c895f400152d56bb7169c22e3f6.jpg', 'Black', 13, 0, '2024-04-23 09:17:56', NULL);

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
(11, 'ssd', '312312', 1, 0, '2024-04-02 16:03:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
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
(5, 'Vũ Bảo Khanh', 'vubaokhanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Kiên Giang', 1, '1123123123', 0, 'staff', '2024-04-03 18:16:34', NULL),
(8, 'Jony Nguyen', 'abc@gmail.com', '$2y$10$JhjBdfDCjBvsUajreGP2bugC5dAVxiVH/l0vCVydyAHSDcj73obty', 'Can Tho Sai Gon Cai Rang', 0, '0758395394', 0, 'customer', '2024-04-23 02:44:58', '2024-04-24 15:03:20'),
(9, NULL, 'annv@gmail.com', '$2y$10$q8Sq.LY7Olqqlr39Ionx/.CcZtSgqwMbV6V6AIL2Sd5omat62onRa', NULL, NULL, NULL, 0, 'customer', '2024-04-23 02:47:32', NULL);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `post.post-categories` (`post_cat_id`),
  ADD KEY `post.user` (`user_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post.post-categories` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post.user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
