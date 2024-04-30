-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 12:42 AM
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
(11, 'Điện thoại', 'phone', 1, '2024-04-01 11:34:01', NULL),
(13, 'Iphone ', 'iphone', 0, '2024-04-01 11:35:51', NULL),
(14, 'Ipad mini', 'ipad-mini', 0, '2024-04-01 11:35:57', NULL),
(15, 'Ipad gen', 'ipad-gen', 0, '2024-04-01 11:36:12', NULL),
(16, 'macbook', 'macbook', 0, '2024-04-01 11:36:25', '2024-04-01 11:43:36'),
(17, 'Mac mini', 'mac-mini', 0, '2024-04-01 11:36:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_receive` varchar(255) NOT NULL,
  `phone_receive` varchar(255) NOT NULL,
  `address_receive` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
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
(2, 'Nguyễn Văn An', '0685395869', 'Vĩnh Long', 'Giao lẹ bạn ơi', 25000000, 1, 8, 0, '2024-04-24 15:19:21', NULL),
(15, 'Trần Trọng Hiến', '0706802119', 'Sài gòn', '', 75000000, 1, 8, 0, '2024-04-26 08:47:29', NULL),
(16, 'Jony ', '0706802119', 'Disney, USA', '', 96998000, 1, 8, 0, '2024-04-26 08:53:19', NULL),
(17, 'mickey', '0706802119', 'Disney, USA', '', 10999000, 1, 8, 0, '2024-04-26 08:54:25', NULL),
(18, 'Augentern shop', '1827485728', '91B Jackson street Pizla', '', 37000000, 1, 10, 0, '2024-04-26 14:47:37', '2024-04-30 21:04:31'),
(19, 'Lưu Vũ Tuyển', '1111111111', 'Cần Thơ', 'Giao nhanh', 25000000, 1, 12, 0, '2024-04-26 16:03:40', NULL);

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
(4, 2, 1, 20000000.00, '2024-04-24 15:19:49', NULL),
(4, 15, 3, 25000000.00, '2024-04-26 08:47:29', NULL),
(4, 16, 3, 25000000.00, '2024-04-26 08:53:19', NULL),
(2, 16, 2, 10999000.00, '2024-04-26 08:53:19', NULL),
(2, 17, 1, 10999000.00, '2024-04-26 08:54:25', NULL),
(1, 18, 1, 12000000.00, '2024-04-26 14:47:37', NULL),
(4, 18, 1, 25000000.00, '2024-04-26 14:47:37', NULL),
(4, 19, 1, 25000000.00, '2024-04-26 16:03:40', NULL);

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
  `img` varchar(255) DEFAULT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `post_cat_id`, `user_id`, `title`, `content`, `views`, `img`, `delete`, `created_at`, `updated_at`) VALUES
(3, 'how-to-use-dynamic-island-in-iphone-14', 1, 3, 'How to use dynamic island in iphone 14', '<p>\r\nWhen the iPhone 14 Pro models were announced in 2022, Apple surprised many with its innovative integration of software functions with the pill-shaped cutout at the top of the screen. Apple calls this area of the display the \"Dynamic Island,\" and has since extended the feature to all iPhone 15 models. This article explains what ‌Dynamic Island‌ does, how it works, and how you can interact with it to perform actions.\r\n</p>\r\n<h3>What Is Dynamic Island and How Does It Work?</h3>\r\n<p>Prior to Apple\'s ‌iPhone 14‌ Pro launch, we learned that Apple was working on an alternative to the notch that incorporated a pill-shaped cutout and a hole punch cutout to house the TrueDepth camera hardware. We also exclusively reported that these cutouts would appear as one contiguous, longer pill shape when the ‌iPhone 14‌ Pro was in use, and that Apple also planned to integrate software functions around the pill.</p>\r\n<p>As we know now, on the ‌iPhone 14‌ Pro and all ‌iPhone 15‌ models, display pixels around what Apple calls the \"‌Dynamic Island‌\" merge it into one pill-shaped area that changes size and shape to accommodate various types of alerts, notifications, and interactions, turning it into a kind of front-and-center information hub.</p>\r\n', 9, '990fb55b94167b9c7683dbe96880fc0d.jpg', 0, '2024-04-21 07:57:21', '2024-04-21 07:57:21'),
(4, 'help-with-the-app-store', 2, 3, 'Help to fix app store issue', '<p>\nWhen the iPhone 14 Pro models were announced in 2022, Apple surprised many with its innovative integration of software functions with the pill-shaped cutout at the top of the screen. Apple calls this area of the display the \"Dynamic Island,\" and has since extended the feature to all iPhone 15 models. This article explains what ‌Dynamic Island‌ does, how it works, and how you can interact with it to perform actions.\n</p>\n<h3>What Is Dynamic Island and How Does It Work?</h3>\n<p>Prior to Apple\'s ‌iPhone 14‌ Pro launch, we learned that Apple was working on an alternative to the notch that incorporated a pill-shaped cutout and a hole punch cutout to house the TrueDepth camera hardware. We also exclusively reported that these cutouts would appear as one contiguous, longer pill shape when the ‌iPhone 14‌ Pro was in use, and that Apple also planned to integrate software functions around the pill.</p>\n<p>As we know now, on the ‌iPhone 14‌ Pro and all ‌iPhone 15‌ models, display pixels around what Apple calls the \"‌Dynamic Island‌\" merge it into one pill-shaped area that changes size and shape to accommodate various types of alerts, notifications, and interactions, turning it into a kind of front-and-center information hub.</p>\n                                                         ', 10, '418f9bc51058627937eaf375b131825e.jpg', 0, '2024-04-21 07:57:21', '2024-04-21 07:57:21'),
(5, 'help-center', 2, 3, 'Help center', 'demo', 0, 'fe3cfe74b1f0de178bb3a0513222207f.png', 0, '2024-04-26 17:25:57', '2024-04-26 17:25:57'),
(6, 'demo-1', 1, 3, 'demo 1', 'demo 1', 1, 'c73aac9802dbd43854afe8a148c26dc0.jpg', 1, '2024-04-30 21:33:03', '2024-04-30 21:47:12'),
(7, 'iphone-ipad', 1, 3, 'Iphone & ipad', '<h2>Tổng quan về iPhone và iPad</h2><p>iPad là máy tính bảng được Apple sản xuất và chạy bởi hệ điều hành iOS. Có thể nói, đây là sự kết hợp tối ưu giữa laptop và điện thoại thông minh. Apple đưa ra rất nhiều dòng iPad để có thể đáp ứng nhu cầu sử dụng khác nhau của người dùng chẳng hạn như iPad 10, iPad Pro 11, …&nbsp;</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/news/di-dong/nen-mua-iphone-hay-ipad-dau-la-su-lua-chon-phu-hop-voi-ban.jpg\" alt=\"Nên mua iPhone hay iPad? Đâu là sự lựa chọn phù hợp với bạn\"></figure><p>iPhone là điện thoại thông minh của nhà Táo khuyết và không còn quá xa lạ gì với người dùng. Đây là một chiếc di động được yêu thích và săn đón trên toàn thế giới. Trong những năm qua, Apple luôn mang đến cho người dùng nhiều sự cải tiến mới mẻ và hiện đại trên những dòng sản phẩm iPhone mới. Dòng iPhone mới và cao cấp vừa được ra mắt thị trường là <a href=\"https://dienmaycholon.vn/dien-thoai-di-dong-apple?t=iphone-14-series\">iPhone 14 Series</a>&nbsp;như iPhone 14, 14 Pro, 14 Pro Max,...</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/news/di-dong/ipad-la-gi.jpg\" alt=\"iPad là gì?\"></figure><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', 2, '285f2774735ede7132f753ee93930d20.png', 0, '2024-04-30 22:11:14', '2024-04-30 22:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `slug`, `title`, `image`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'technologies', 'Technologies', '', 0, '2024-04-21 03:34:01', '2024-04-21 03:34:01'),
(2, 'help-center', 'Help center', '', 0, '2024-04-21 03:34:01', '2024-04-21 03:34:01'),
(3, 'demo-1', 'demo 1', NULL, 1, '2024-04-26 16:32:51', '2024-04-26 16:32:51');

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
(1, 'Iphone 12 pro max 2', 'iphone-12-pro-max-2', 'demo 2\r\n', 'demo', 12000000, 11000000, 0, 1, 'Apple', '990fb55b94167b9c7683dbe96880fc0d.jpg', 'Black', 13, 0, '2024-04-01 12:37:41', '2024-04-01 15:40:22'),
(2, 'iphone 11 pro', 'iphone-11-pro', 'demo', 'Demo', 10999000, 9900000, 1, 5, 'Apple', '418f9bc51058627937eaf375b131825e.jpg', 'Titan', 13, 0, '2024-04-01 12:43:30', NULL),
(3, 'Samsung demo', 'samsung-demo', 'Demo', 'Demo', 23000000, 23000000, 0, 1, 'Apple', '9a9dd60538ad32c71282c5f4b49d3dc4.png', 'Red', 15, 0, '2024-04-01 15:19:46', '2024-04-01 15:33:56'),
(4, 'Iphone 13 Promax', 'iphone-13-promax', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo pharetras loremos.\r\n\r\nProducts Infomation\r\n', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. \r\n\r\n', 25000000, 20000000, 1, 13, 'Apple', 'f19b5c895f400152d56bb7169c22e3f6.jpg', 'Black', 13, 0, '2024-04-23 09:17:56', NULL),
(5, 'Apple 13 pro max', 'apple-13-pro-max', 'demo', 'demo 12\r\n', 12000000, 11890000, 0, 1, 'Apple', '8cf5347adade85a1b94c9adb0156e87e.png', 'đen', 15, 0, '2024-04-26 17:19:01', '2024-04-26 17:21:02');

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
(26, 'APU', 'Apple a13', 2, 0, '2024-04-26 16:24:23', NULL);

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
(8, 'Jony Nguyen', 'abc@gmail.com', '$2y$10$d5jy3chJfJHAAXuAbRTYkuJmiLFb/IzsG5yuJktQK1xixU8Mq6wWW', 'Can Tho Sai Gon Cai Rang', 0, '0758395394', 0, 'customer', '2024-04-23 02:44:58', '2024-04-26 14:37:26'),
(10, NULL, 'tranhien@gmail.com', '$2y$10$WELa5GKYuk6J2BAGI7qjnunMEogRi6L4PmbQGo.i/4IeT6yu3dPVm', NULL, NULL, NULL, 0, 'customer', '2024-04-26 14:38:14', NULL),
(12, 'Vũ Đức Tiến', 'vdtien@gmail.com', '$2y$10$RZHuyLdMy8feBU2v94yPs.ObvKoelCdGImH3EiS4in/A9HHEDwRVq', 'Cần Thơ', 0, '0333669832', 0, 'customer', '2024-04-26 16:01:36', '2024-04-26 16:02:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

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
