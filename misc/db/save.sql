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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.category : ~0 rows (environ)
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'smartphones'),
	(2, 'accessories'),
	(3, 'smartwatches'),
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
  `id_category` int NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table fone.product : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
