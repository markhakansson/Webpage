-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net

--
-- Database `ecommerce_website``
--
CREATE DATABASE `ecommerce_website` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecommerce_wesbite`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `nin` varchar(12) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `order_specifics`
--

CREATE TABLE IF NOT EXISTS `order_specifics` (
  `amount` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `price` int(255) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `order_specifics_fk_2` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `shipping` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `date_stamp` date NOT NULL,
  `user_id` int(255) NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_fk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `stock` int(255) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `product_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `rating` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `comments` varchar(500) COLLATE utf8_swedish_ci DEFAULT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `product_fk` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `role` int(255) NOT NULL DEFAULT '1',
  `username` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_specifics`
--
ALTER TABLE `order_specifics`
  ADD CONSTRAINT `order_specifics_fk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_specifics_fk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `user_id_fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_id_fk1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`user_id`);

