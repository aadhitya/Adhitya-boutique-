-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2017 at 11:31 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Ralph Lauren'),
(2, 'Calvin Klein');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Men', 0),
(2, 'Women', 0),
(3, 'Boys', 0),
(4, 'Girls', 0),
(5, 'Suits', 1),
(6, 'Shirts', 1),
(7, 'Jeans', 1),
(8, 'Accessories ', 1),
(9, 'Dress', 2),
(10, 'Jeans', 2),
(11, 'Shoes', 2),
(12, 'Handbags', 2),
(13, 'Shirts', 3),
(14, 'Jeans', 3),
(15, 'Dress', 4),
(16, 'Jeans', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `brand` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `sizes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `list_price`, `brand`, `categories`, `image`, `description`, `featured`, `sizes`) VALUES
(1, 'Ralph Lauren Class-Fit', '399.00', '449.99', 1, '5', '/boutique/images/suit1.png', '', 1, ''),
(2, 'Armani Suit', '549.00', '599.99', 1, '6', '/boutique/images/Men1.jpg', 'xyzxyz', 1, 'xyz'),
(3, 'Tommy shirt', '59.99', '79.99', 1, '6', '/boutique/images/men2.jpg', 'xyz', 1, 'xyz'),
(4, 'Buffalo Shirt', '39.99', '59.99', 1, '6', '/boutique/images/men3.jpg', 'xyz', 1, 'xyz'),
(5, 'Calvin Klein Dress', '99.99', '129.99', 2, '9', '/boutique/images/women11.jpg', 'xyz', 1, 'xyz'),
(6, 'Levis Jeans', '49.99', '99.99', 1, '10', '/boutique/images/women31.jpg', 'xyz', 1, 'xyz'),
(7, 'COACH Handbag', '199.99', '259.99', 1, '12', '/boutique/images/women4.jpg', 'xyz', 1, 'xyz'),
(8, 'Calvin klein heels', '129.99', '159.99', 2, '11', '/boutique/images/shoe1.jpg', 'xyz', 1, 'xyz');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
