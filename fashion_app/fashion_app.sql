-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 01:35 AM
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
-- Database: `fashion_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(6, 1, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(2000) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`, `image`, `description`) VALUES
(21, 'Áo hoodie2', 0, 'product-8.png', 'Lorem ispem'),
(22, 'Áo khoác', 1, 'product-4.png', 'Lorem ispem'),
(23, 'Quần', 1, 'product-2.png', 'Lorem ispem'),
(24, 'Giày', 1, 'product-6.png', 'Lorem ispem'),
(25, 'Váy', 1, 'product-8.png', 'Lorem ispem'),
(26, 'Áo sơ mi', 1, 'product-3.png', 'Lorem ispem');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `code` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `states` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`states`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(45) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) NOT NULL,
  `country_code` varchar(45) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `total_price` decimal(20,2) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`) VALUES
(32, 1, 444000.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(45) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `first_name`, `last_name`, `phone`, `address1`, `address2`, `city`, `state`, `zipcode`, `country_code`, `order_id`) VALUES
(1, '', '', '', '', '', '', '', '', '', 32);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 32, 22, 1, 189000.00),
(2, 32, 24, 1, 255000.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(2000) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `status`, `image`, `description`, `price`, `category_id`) VALUES
(22, 'Áo len rộng hooded', 1, 'product-1.png', 'Lorem ispem', 189000, 21),
(23, 'Quần dệt kim', 1, 'product-2.png', 'Lorem ispem', 999000, 23),
(24, 'Áo sơ mi flannel', 1, 'product-3.png', 'Lorem ispem', 255000, 26),
(25, 'Áo khoác vải có kết cấu', 1, 'product-4.png', 'Lorem ispem', 234000, 22),
(26, 'Áo khoác sọc dọc', 1, 'product-5.png', 'Lorem ispem', 230000, 22),
(27, 'Giày thể thao vải Knit', 1, 'product-6.png', 'Lorem ispem', 200000, 24),
(28, 'Áo len lam không cổ', 1, 'product-7.png', 'Lorem ispem', 99900, 22),
(29, 'Váy tay bóng', 1, 'product-8.png', 'Lorem ispem', 90000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(2000) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(2000) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `image`, `password`, `google_id`, `remember_token`, `role_as`) VALUES
(1, 'admin', 'nguyendmim@gmail.com', NULL, NULL, '$2y$12$s9SppJtupiNkT37cWnHW/.jHpsuJe7FQpAXpFOiGK1Sx/9.PRru96', NULL, NULL, 0),
(2, 'df2', 'df@gmail.com', NULL, '1699521248.jpg', '$2y$12$XMTpzdtan9NWuX6gmySN1eTGfMtUrXrWgivS8Tj/pmyQgom6YAuMm', NULL, NULL, 2),
(3, 'test', 'test@gmail.com', NULL, '1699520248.jpg', '$2y$12$BWfMNsfIf0Ly6unZtimMS.LWtLFfQ6vlYQm8qIvhoC0GXxgiaMzaq', NULL, NULL, 1),
(4, 'peter', 'peter@gmail.com', NULL, '1699661602.jpg', '$2y$12$dvI6R5SAC4f30VOHJOljyuRIb.IaEPpNw.sNsKB.zQcO0vppxgUxG', NULL, NULL, 1),
(9, 'peter2', 'peter2@gmail.com', NULL, '1699663962.jpg', '$2y$12$o2Qmj1sC3lay.tCHsk1J7e292ER7ihYcICmv74pr1vrY9LTCooMPS', NULL, NULL, 1),
(11, 'Đắc Hải Nguyễn', 'haindbackend@gmail.com', NULL, NULL, NULL, '105789946804962348930', NULL, 0),
(14, 'Nguyen Dac Hai (FPL DN)', 'haindpd07304@fpt.edu.vn', NULL, NULL, NULL, '118257922499042145681', NULL, 0),
(32, 'admin4', 'test5@gmail.com', NULL, NULL, '$2y$10$I/cMkkMK/uPdiEZ4d/cr2.i7UF5J/Li77Lmkn2pCupa8rmDdIekga', NULL, NULL, 0),
(33, 'admin4', 'tuan2@gmail.com', NULL, NULL, '$2y$10$PNKMmFdPXdu28SrbGWnm9Ow5yH9hY/.3kd0kqy2i9AvLKvhXEPkCC', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_addresses_country_code_foreign` (`country_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_country_code_foreign` FOREIGN KEY (`country_code`) REFERENCES `countries` (`code`),
  ADD CONSTRAINT `customer_addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
