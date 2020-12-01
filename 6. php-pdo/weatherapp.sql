-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 01 déc. 2020 à 16:20
-- Version du serveur :  8.0.22-0ubuntu0.20.04.3
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
-- Base de données : `weatherapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `Météo`
--

CREATE TABLE `Météo` (
  `PK` int NOT NULL,
  `ville` varchar(9) DEFAULT NULL,
  `haut` int DEFAULT NULL,
  `bas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Météo`
--

INSERT INTO `Météo` (`PK`, `ville`, `haut`, `bas`) VALUES
(1, 'Bruxelles', 27, 13),
(2, 'Liège', 25, 15),
(3, 'Namur', 26, 15),
(4, 'Charleroi', 25, 12),
(5, 'Bruges', 28, 16),
(6, 'Nivelles', 1, 40);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Météo`
--
ALTER TABLE `Météo`
  ADD PRIMARY KEY (`PK`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Météo`
--
ALTER TABLE `Météo`
  MODIFY `PK` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
