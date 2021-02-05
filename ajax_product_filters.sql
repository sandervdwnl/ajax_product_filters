-- --------------------------------------------------------
-- Host:                         localhost
-- Server versie:                5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Databasestructuur van ajax_product_filters wordt geschreven
CREATE DATABASE IF NOT EXISTS `ajax_product_filters` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ajax_product_filters`;

-- Structuur van  tabel ajax_product_filters.products wordt geschreven
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(25) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `product_color` varchar(25) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel ajax_product_filters.products: ~10 rows (ongeveer)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `product_type`, `product_brand`, `product_color`, `product_image`) VALUES
	(1, 'Bite ring', 'Maybe Baby', 'Multi', 'product-crop.jpg'),
	(2, 'Bite ring', 'Gaga', 'Blue/Green', 'product-crop_2.jpg'),
	(3, 'Bite ring', 'Maybe Baby', 'Multi', 'product-crop_3.jpg'),
	(4, 'Bite Bracelet', 'Drewly', 'White', 'product-crop_4.jpg'),
	(5, 'Bite Bracelet', 'Drewly', 'White', 'product-crop_5.jpg'),
	(6, 'Bite ring hanger', 'Oh Deer', 'Grey', 'product-crop_6.jpg'),
	(7, 'Bite ring hanger', 'Oh Deer', 'Pink', 'product-crop_7.jpg'),
	(8, 'Bite ring', 'Maybe Baby', 'Multi', 'product-crop_8.jpg'),
	(9, 'Bite ring', 'Drewly', 'Blue', 'product-crop_9.jpg'),
	(10, 'Bite ring', 'Drewly', 'Multi', 'product-crop_10.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
