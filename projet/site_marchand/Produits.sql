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
-- Structure de la table `Produits`
--

CREATE TABLE `Produits` (
  `idProduit` int NOT NULL,
  `nom` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `marque` varchar(16) NOT NULL,
  `categorie` varchar(16) NOT NULL,
  `descriptif` text NOT NULL,
  `photo` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `prix` double NOT NULL,
  `stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Produits`
--

INSERT INTO `Produits` (`idProduit`, `nom`, `marque`, `categorie`, `descriptif`, `photo`, `prix`, `stock`) VALUES
(1, 'Kono subarashii sekai ni shukufuku o!', 'Kadokawa', 'Isekai', 'Kono subarashii sekai ni shukufuku o! (この素晴らしい世界に祝福を!?, litt. « Une bénédiction pour ce monde merveilleux ! ») est une série de light novel écrite par Natsume Akatsuki.\r\n\r\nCelle-ci suit l aventure d un garçon qui est envoyé dans un monde fantastique après sa mort, formant une équipe à problèmes avec une déesse, une magicienne, et une croisée pour lutter contre les monstres. ', 'konosuba.jpg', 10, 92),
(2, 'Kaguya-sama: Love is War', 'Shūeisha', 'Slice of life', '« Mme Kaguya veut qu\'il se déclare : La Guerre psychologique romantique de génies »\r\n\r\nL\'histoire suit le quotidien de Kaguya Shinomiya et Miyuki Shirogane, étudiants brillants dans un lycée élitiste, et de leur entourage. Les deux adolescents sont passionnément amoureux l un de l autre mais, tous deux trop orgueilleux pour faire le premier pas, ils se livrent une guerre psychologique sans merci pour faire en sorte que l\'autre avoue ses sentiments en premier.', 'kaguyasama.jpg', 9.99, 84),
(3, 'Jahy-sama wa Kujikenai!', 'Square Enix', 'Slice of life', 'Jahy, the feared and respected number-two ruler of the Dark Realm, suddenly finds herself powerless and shrunken in the human world after a magical girl destroys a powerful mana crystal, which also destroys her home realm. The manga follows Jahy and her daily life as she learns to live in her new surroundings while she works to restore her original form, the mana crystal, and the Dark Realm. ', 'jahysama.jpg', 9.38, 57);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`idProduit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `idProduit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
