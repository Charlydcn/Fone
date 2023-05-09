-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour fone
CREATE DATABASE IF NOT EXISTS `fone` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fone`;

-- Listage de la structure de table fone. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.category : ~4 rows (environ)
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'smartphones'),
	(2, 'smartwatches'),
	(3, 'accessories'),
	(4, 'watchAccessories');

-- Listage de la structure de table fone. commande
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.commande : ~0 rows (environ)

-- Listage de la structure de table fone. contenir
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_product` int NOT NULL,
  `id_commande` int NOT NULL,
  `qtt` int NOT NULL,
  PRIMARY KEY (`id_product`,`id_commande`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.contenir : ~0 rows (environ)

-- Listage de la structure de table fone. email
CREATE TABLE IF NOT EXISTS `email` (
  `id_email` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(75) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.email : ~0 rows (environ)

-- Listage de la structure de table fone. order
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.order : ~0 rows (environ)

-- Listage de la structure de table fone. product
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `sale` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.product : ~26 rows (environ)
INSERT INTO `product` (`id_product`, `name`, `price`, `sale`, `img`, `id_category`) VALUES
	(1, 'Apple iPhone 13', 1159.00, 20, 'iphone13.png', 1),
	(2, 'Huawei P40 Pro', 1059.00, NULL, 'iphone13.png', 1),
	(3, 'Samsung S22 Ultra', 1059.00, NULL, 'iphone13.png', 1),
	(4, 'OnePlus 8 Pro', 749.00, NULL, 'iphone13.png', 1),
	(5, 'Apple iPhone 13 Mini', 809.00, NULL, 'iphone13.png', 1),
	(6, 'Samsung Galaxy Z-Fold', 999.00, NULL, 'iphone13.png', 1),
	(7, 'Huawei P60 Pro', 859.00, NULL, 'iphone13.png', 1),
	(8, 'Samsung Galaxy Z-Flip', 1169.00, NULL, 'iphone13.png', 1),
	(9, 'Apple Watch Series 7', 650.00, NULL, 'apple_watch_series7.png', 2),
	(10, 'Samsung Galaxy Watch 4 Classic', 380.00, NULL, 'apple_watch_series7.png', 2),
	(11, 'Garmin Venu 2', 400.00, NULL, 'apple_watch_series7.png', 2),
	(12, 'USB-C Power Adapter', 24.90, NULL, 'usbC_power_adapter18.png', 3),
	(13, 'Dual USB Power Adapter', 29.00, NULL, 'usbC_power_adapter18.png', 3),
	(14, 'iPhone 13 Thin Case', 15.00, NULL, 'iphone13_thincase.png', 3),
	(15, 'S22 Ultra Silicone Case', 12.50, NULL, 'iphone13_thincase.png', 3),
	(16, 'Huawei P40 Pro Leather Case', 39.90, NULL, 'iphone13_thincase.png', 3),
	(17, 'Galaxy Z Fold Silicone Case', 29.90, NULL, 'iphone13_thincase.png', 3),
	(18, 'Huawei P60 Pro Stand Case', 39.90, NULL, 'iphone13_thincase.png', 3),
	(19, 'Galaxy Z Flip Transparent Case', 14.90, NULL, 'iphone13_thincase.png', 3),
	(20, 'External Battery', 59.90, NULL, 'extbattery.png', 3),
	(21, 'External Battery', 29.90, NULL, 'extbattery.png', 3),
	(22, 'Apple Watch Sport Loop', 29.00, NULL, 'applewatch_sportloop.png', 4),
	(23, 'Samsung Leather Band', 25.00, NULL, 'applewatch_sportloop.png', 4),
	(24, 'Garmin QuickFit Band', 15.00, NULL, 'applewatch_sportloop.png', 4),
	(25, 'Apple Watch Series 7 Protective Case', 49.00, NULL, 'applewatch_sportloop.png', 4),
	(26, 'Samsung Galaxy Watch 4 Black Case', 39.90, NULL, 'applewatch_sportloop.png', 4);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
