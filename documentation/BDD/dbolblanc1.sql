-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 05 jan. 2021 à 21:41
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbolblanc1`
--

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `idTache` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DatePrevu` date NOT NULL,
  `DateInscrite` date NOT NULL,
  `isFait` int NOT NULL DEFAULT '0',
  `Username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idTache`),
  KEY `Username` (`Username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Username` varchar(20) NOT NULL,
  `passwd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Username`, `passwd`) VALUES
('', 'Patrick'),
('Babanou', '$2y$10$Iqe.GXsh4y9EVQT.LfeEXue2oOBW2Muj.JVkA/3uGG0BYtQnsx/lG'),
('dfkjhhgvoisudhfghsdl', 'mdp'),
('fagenin', 'mdp'),
('fgfsdgfd', 'mdp'),
('olblanc1', '$2y$10$d1XUXGubB7yByUr309HeHOw6zSQ4uT8SpebBfoPYazVJuaYq7YdOG'),
('Paulor', 'mdp'),
('Tchoupi', '$2y$10$sJnfn.phOYJYdjs14Ps6O.7PTrkPJChQLqLBUopA2RtsMSumJZ5De'),
('test', '$2y$10$LXIMDf1KMnp8VAZw/CCDyeXs03zb1qYLFbXEQgc9q40NDsdFUKUb2'),
('Wiwi', '$2y$10$njwtMIgvKX8mjORFXkL7UePBuSiYMRrf7DT6WTwrW0NkPPTIf39zC'),
('wiwi2', '$2y$10$ZeMs/Zv0IwZTfzKe95QQguKftMLDvk//MLJl2A5U/ifG7b59YwmNe');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `Username` FOREIGN KEY (`Username`) REFERENCES `utilisateur` (`Username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
