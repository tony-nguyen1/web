-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 16 déc. 2021 à 23:38
-- Version du serveur :  8.0.27-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Structure de la table `Clients`
--

CREATE TABLE `Clients` (
  `email` varchar(32) NOT NULL,
  `motDePasse` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(16) NOT NULL,
  `ville` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `adresse` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telephone` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Clients`
--

INSERT INTO `Clients` (`email`, `motDePasse`, `nom`, `prenom`, `ville`, `adresse`, `telephone`) VALUES
('blablacar@gmail.com', 'dc6d23db6c90a6bce450318b9c54a6128e3774733d480df136ab671c5bcd5b76', 'hola', 'holahola', '', '', NULL),
('janedoe@gmail.com', 'password', 'Doe', 'Jane', 'Montpellier', NULL, NULL),
('johndoe@gmail.com', 'password', 'Doe', 'John', 'Montpellier', NULL, NULL),
('test', '57317e40d81b0716a66ab0012c479bd87f1fd1d70b7f98599cf9483763a1a0a7', '', '', '', '', NULL),
('testest@gmail.com', '99d89670a11cacb3242f12ba736bb649ca35273defa27dc9a7984810e181d760', '', '', '', '', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
