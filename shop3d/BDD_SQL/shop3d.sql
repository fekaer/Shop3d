-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 13 Avril 2016 à 16:20
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shop3d`
--
CREATE DATABASE IF NOT EXISTS `shop3d` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop3d`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `username`, `nom`, `prenom`, `adresse`, `email`, `password`,`admin`) VALUES
(1, 'test', 'wqada', 'awdawd', 'awdawda', 'awdwdaw@awdwa.ok', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220',0),
(2, 'marti', 'adjhbwj', 'hbfewjbdewj', 'dekbwjb', 'awdawd@er.dcefd', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `produitId` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float(10,2) NOT NULL,
  `posX` int(11) NOT NULL,
  `posY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`produitId`, `nom`, `description`, `quantite`, `prix`, `posX`, `posY`) VALUES
(1, 'Ananas', 'Ananas de Madagascar', 50, 2.30, 5, 4),
(2, 'Kiwi', 'Kiwi du Chine', 40, 0.40, 6, 4),
(3, 'Banane', 'banane Bio Haiti', 150, 1.70, 7, 4),
(4, 'Poire', 'Poire Bio Suisse Williams', 100, 1.00, 8, 4),
(5, 'Orange', 'Orange Bio Sanguine du Kosovo', 80, 1.40, 15, 4),
(6, 'Pomme', 'Pomme Bio Golden Suisse', 100, 0.80, 16, 4);

-- --------------------------------------------------------

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`produitId`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `produitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
