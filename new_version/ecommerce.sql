-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : dim. 23 juin 2024 à 22:04
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `idf` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) DEFAULT NULL,
  `idp` int(11) DEFAULT NULL,
  PRIMARY KEY (`idf`),
  UNIQUE KEY `idu` (`idu`,`idp`),
  KEY `idp` (`idp`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`idf`, `idu`, `idp`) VALUES
(65, 4, 10),
(63, 4, 15),
(64, 4, 12),
(66, 4, 11),
(67, 4, 13),
(68, 4, 16),
(69, 6, 12),
(70, 6, 15);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) DEFAULT NULL,
  `idp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `idu` (`idu`),
  KEY `idp` (`idp`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `idu`, `idp`) VALUES
(8, 4, 16),
(9, 4, 13),
(10, 4, 12),
(11, 4, 10),
(12, 4, 15),
(13, 4, 11),
(14, 6, 13),
(15, 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(10) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idp`, `categorie`, `nom`, `couleur`, `stock`, `prix`, `description`, `photo`) VALUES
(16, 'Sony', 'Sony Xperia 1 IV 5G 12Go Dual-Sim 256Go', 'Noir', 30, 700, 'Venez ici', 'Sony.png'),
(13, 'iphone', 'Apple iPhone 12 128Go', 'noir', 12, 300, '', 'iphone 12.png'),
(12, 'iphone', 'Apple iPhone 14 128Go minuit', 'noir', 18, 600, 'Bonne prise en main', 'Iphone 14 (2).png'),
(10, 'iphone', 'Apple iPhone 13 128Go', 'noir', 23, 560, '    Bon iphone    ', 'iphone 13.png'),
(11, 'iphone', 'Apple iPhone 14 Pro 128Go', 'noir sidÃ©ral', 10, 800, 'Iphone noir trÃ¨s bien', 'iphone 14.png'),
(15, 'samsung', 'Samsung Galaxy S21 5G G991B/DS 128Go', 'gris', 78, 280, '', 'S21.png'),
(17, 'hauwei', 'Huawei P40 Pro Dual-Sim 5G 256Go', 'noir', 23, 380, 'Venez le prendre Ã  petit prix', 'Hawai.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `adresse` varchar(1000) DEFAULT NULL,
  `mdp` varchar(100) NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idu`, `nom`, `prenom`, `mail`, `adresse`, `mdp`, `admin`) VALUES
(1, 'Large', 'Laetitia', 'Manou422@icloud.com', NULL, 'Luchenzo', 1),
(2, 'ortiz', 'Manuela', 'Manou422@icloud.com', NULL, 'Test625', 0),
(3, 'Leroy', 'LoLa', 'Louise.leroy@gmail.com', NULL, 'Test', 0),
(4, 'Test', 'Test', 'Test@gmail.com', NULL, 'Test05', 0),
(6, 'Ortiz', 'Manuela', 'manou422@icloud.com', '170 rue nationale', 'Test', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
