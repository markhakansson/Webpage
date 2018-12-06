-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 05 dec 2018 kl 10:30
-- Serverversion: 5.7.18-log
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `db930807`
--
CREATE DATABASE IF NOT EXISTS `db930807` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `db930807`;

CREATE TABLE IF NOT EXISTS `customers` (
  `name` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `phone` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `nin` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


INSERT INTO `customers` (`name`, `address`, `phone`, `email`, `user_id`, `nin`) VALUES
('Tim Coull', 'abc123', '0709378135', 'timcou@hej.se', 1, ''),
('Tim Coull', 'abc123', '0709378135', 'timcou@hej.se', 2, '9308074914'),
('Tim Coull', 'abc123', '0709378135', 'timcou@hej.se', 3, '9308074914');


CREATE TABLE IF NOT EXISTS `order_specifics` (
  `amount` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `order_specifics_fk_2` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE IF NOT EXISTS `orders` (
  `shipping` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `date_stamp` date NOT NULL,
  `user_id` int(255) NOT NULL,
  `shipping_address` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `payment_method` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `status` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_fk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE IF NOT EXISTS `products` (
  `stock` int(255) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `product_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `picture` varchar(1000) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `products` (`stock`, `price`, `product_id`, `name`, `description`, `picture`) VALUES
(10, '199', 1, 'Super Fast Ferrari', 'This bad boy goes wroom wroom wroom like you wouldn\'t believe', 'images/wroom.jpg'),
(2, '599', 2, 'Destiny 2: Black Armory (PS4/Xbox/PC)', 'The next addition to the evergrowing story of destiny.', 'https://www.thewrap.com/wp-content/uploads/2018/11/destiny-2-black-armory-ada-1-how-the-story-will-be-told.jpg'),
(599, '599', 18, 'Just Cause 4 (PS4, Xbox)', 'Get crazy in the next installment of Just Cause', 'https://media.comicbook.com/2018/11/just-cause-4-1146250.jpeg'),
(5, '599', 19, 'Resident Evil 2 - REMAKE', 'The latest Resident evil is a remake of the critically acclaimed second installment', 'https://cdn.wccftech.com/wp-content/uploads/2018/08/Resident-Evil-2-Remake-Claire-740x382.jpg'),
(999, '5', 20, 'Red Pine Tree', 'You are walking through a red forest and the grass is tall. It’s just rained. Most of the blood has washed away. There’s a house in the distance, cedar and pine. You’ve been there before. You’re not alone. There’s a man. You see him, you go to him. You know him, like a memory of tomorrow.', 'images/bild.jpg'),
(999, '5', 21, 'Red Pine Tree', 'You are walking through a red forest and the grass is tall. It’s just rained. Most of the blood has washed away. There’s a house in the distance, cedar and pine. You’ve been there before. You’re not alone. There’s a man. You see him, you go to him. You know him, like a memory of tomorrow.', 'images/bild.jpg'),
(999, '5', 22, 'Red Pine Tree', 'You are walking through a red forest and the grass is tall. It’s just rained. Most of the blood has washed away. There’s a house in the distance, cedar and pine. You’ve been there before. You’re not alone. There’s a man. You see him, you go to him. You know him, like a memory of tomorrow.', 'images/bild.jpg'),
(1, '69', 23, 'Chris', 'Vi betalar dig för han', 'images/christopher-seander-n.jpg'),
(1, '69', 24, 'Chris', 'Vi betalar dig för han', 'images/christopher-seander-n.jpg'),
(1, '69', 25, 'Chris', 'Vi betalar dig för han', 'images/christopher-seander-n.jpg'),
(1, '69', 26, 'Chris', 'Vi betalar dig för han', 'images/christopher-seander-n.jpg'),
(1, '69', 27, 'Chris', 'Vi betalar dig för han', 'images/christopher-seander-n.jpg'),
(1, '69', 28, 'Chris', 'Vi betalar dig för han', 'images/christopher-seander-n.jpg');

CREATE TABLE IF NOT EXISTS `reviews` (
  `rating` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `comments` varchar(500) COLLATE utf8_swedish_ci DEFAULT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `product_fk` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `role` int(255) NOT NULL,
  `username` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `users` (`role`, `username`, `password`, `user_id`) VALUES
(1, 'Timcou', 'hej', 3);


ALTER TABLE `order_specifics`
  ADD CONSTRAINT `order_specifics_fk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_specifics_fk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `reviews`
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `user_id_fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `users`
  ADD CONSTRAINT `user_id_fk1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
