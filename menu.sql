-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 17 mars 2020 à 15:38
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `entree` varchar(50) NOT NULL,
  `plat` varchar(50) NOT NULL,
  `dessert` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `entree`, `plat`, `dessert`, `date`) VALUES
(6, 'rrrrrr', 'rrrrr', 'rrrrr', '2020-03-28'),
(4, 'sdfdfs', 'sfdfs', 'sdfsdfs', '2020-03-04'),
(16, 'dfghjkl', 'rtdfgyuhj', 'rdttfghjk', '2020-03-20'),
(7, 'jiojoijo', 'iojiojio', 'jiojio', '2020-03-11'),
(8, 'ouhuohoiuh', 'huhiuhiuhui', 'hoihiuhjiu', '2020-03-14'),
(23, 'Romain Boidron', 'La bite a Boidron', 'La sauce a Romain', '2020-03-17'),
(13, 'dff', 'dfd', 'dfdf', '2020-03-13'),
(14, 'Soupe de légumes', 'Spaghetti Bolognaise', 'Fondant au chocolat', '2020-03-16'),
(17, 'rdthj', 'ftyguhjk', 'ftghjk', '2020-03-23'),
(18, 'rdthj', 'ftyguhjk', 'ftghjk', '2020-03-24'),
(19, 'rdthj', 'ftyguhjk', 'ftghjk', '2020-03-25'),
(20, 'rdthj', 'ftyguhjk', 'ftghjk', '2020-03-26'),
(21, 'rdthj', 'ftyguhjk', 'ftghjk', '2020-03-27'),
(22, 'rdthj', 'ftyguhjk', 'ftghjk', '2020-03-28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
