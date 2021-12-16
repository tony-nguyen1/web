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
-- Structure de la table `Lignescommandes`
--

CREATE TABLE `Lignescommandes` (
  `idLignecommande` int NOT NULL,
  `idCommande` int NOT NULL,
  `idProduit` int NOT NULL,
  `quantite` int NOT NULL,
  `montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Lignescommandes`
--

INSERT INTO `Lignescommandes` (`idLignecommande`, `idCommande`, `idProduit`, `quantite`, `montant`) VALUES
(1, 1, 1, 2, 20),
(2, 1, 2, 1, 9.99),
(28, 38, 1, 2, 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Lignescommandes`
--
ALTER TABLE `Lignescommandes`
  ADD PRIMARY KEY (`idLignecommande`),
  ADD KEY `ForeignKey_wCommandes` (`idCommande`),
  ADD KEY `ForeignKey_wProduits` (`idProduit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Lignescommandes`
--
ALTER TABLE `Lignescommandes`
  MODIFY `idLignecommande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Lignescommandes`
--
ALTER TABLE `Lignescommandes`
  ADD CONSTRAINT `ForeignKey_wCommandes` FOREIGN KEY (`idCommande`) REFERENCES `Commandes` (`idCommande`),
  ADD CONSTRAINT `ForeignKey_wProduits` FOREIGN KEY (`idProduit`) REFERENCES `Produits` (`idProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
