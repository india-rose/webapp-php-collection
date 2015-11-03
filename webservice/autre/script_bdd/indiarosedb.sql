-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.5.24-log - MySQL Community Server (GPL)
-- Serveur OS:                   Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour indiarosedb
CREATE DATABASE IF NOT EXISTS `indiarosedb` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `indiarosedb`;


-- Export de la structure de table indiarosedb. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcat` int(10) NOT NULL AUTO_INCREMENT,
  `texte` text,
  `image` text,
  `son` text,
  `idf` int(10) DEFAULT NULL,
  PRIMARY KEY (`idcat`),
  KEY `FK_categorie_categorie` (`idf`),
  CONSTRAINT `FK_categorie_categorie` FOREIGN KEY (`idf`) REFERENCES `categorie` (`idcat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Export de données de la table indiarosedb.categorie: ~1 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`idcat`, `texte`, `image`, `son`, `idf`) VALUES
	(13, 'home', NULL, NULL, NULL);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;


-- Export de la structure de table indiarosedb. imgs
CREATE TABLE IF NOT EXISTS `imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte` varchar(100) DEFAULT NULL,
  `image` text,
  `imageb` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Export de données de la table indiarosedb.imgs: ~5 rows (environ)
/*!40000 ALTER TABLE `imgs` DISABLE KEYS */;
INSERT INTO `imgs` (`id`, `texte`, `image`, `imageb`) VALUES
	(1, 'actions', 'imgs/actions.png', NULL),
	(2, 'Aliments', 'imgs/aliments.png', NULL),
	(3, 'Animaux', 'imgs/animaux.png', NULL),
	(4, 'Chiffres', 'imgs/chiffres.png', NULL),
	(5, 'Couleurs', 'imgs/couleurs.png', NULL);
/*!40000 ALTER TABLE `imgs` ENABLE KEYS */;


-- Export de la structure de table indiarosedb. indiagram
CREATE TABLE IF NOT EXISTS `indiagram` (
  `idind` int(10) NOT NULL AUTO_INCREMENT,
  `texte` text,
  `image` varchar(100) DEFAULT NULL,
  `son` varchar(100) DEFAULT NULL,
  `idcat` int(10) DEFAULT NULL,
  PRIMARY KEY (`idind`),
  KEY `FK_indiagram_categorie` (`idcat`),
  CONSTRAINT `FK_indiagram_categorie` FOREIGN KEY (`idcat`) REFERENCES `categorie` (`idcat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Export de données de la table indiarosedb.indiagram: ~0 rows (environ)
/*!40000 ALTER TABLE `indiagram` DISABLE KEYS */;
/*!40000 ALTER TABLE `indiagram` ENABLE KEYS */;


-- Export de la structure de table indiarosedb. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `iduser` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `settings` text,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table indiarosedb.utilisateur: ~0 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
