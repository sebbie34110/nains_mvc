-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 mai 2018 à 14:23
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nains`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_debuttravail` time NOT NULL,
  `g_fintravail` time NOT NULL,
  `g_taverne_fk` int(11) DEFAULT NULL,
  `g_tunnel_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`g_id`),
  KEY `g_taverne_fk` (`g_taverne_fk`),
  KEY `g_tunnel_fk` (`g_tunnel_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`g_id`, `g_debuttravail`, `g_fintravail`, `g_taverne_fk`, `g_tunnel_fk`) VALUES
(1, '09:00:00', '17:00:00', 8, 4),
(2, '09:00:00', '17:00:00', 7, 5),
(3, '09:00:00', '17:00:00', 5, 6),
(4, '21:00:00', '05:00:00', 2, 6),
(5, '04:00:01', '12:00:01', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `nain`
--

DROP TABLE IF EXISTS `nain`;
CREATE TABLE IF NOT EXISTS `nain` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_nom` varchar(255) NOT NULL,
  `n_barbe` float NOT NULL,
  `n_groupe_fk` int(11) DEFAULT NULL,
  `n_ville_fk` int(11) NOT NULL,
  PRIMARY KEY (`n_id`),
  KEY `n_groupe_fk` (`n_groupe_fk`),
  KEY `n_ville_fk` (`n_ville_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nain`
--

INSERT INTO `nain` (`n_id`, `n_nom`, `n_barbe`, `n_groupe_fk`, `n_ville_fk`) VALUES
(1, 'Therin', 25, 3, 1),
(2, 'Tarkin', 42, 2, 1),
(3, 'Gimly', 37, 3, 4),
(4, 'Gurdil', 50, 5, 3),
(5, 'Thorin', 12, 2, 1),
(6, 'Orrinn', 26, 1, 2),
(7, 'Bardan', 45, 3, 2),
(8, 'Nôrok', 36, 3, 3),
(9, 'Accident n°1', 0, 3, 4),
(10, 'Mulch', 16, 2, 4),
(11, 'Telligent', 100.001, 1, 2),
(12, 'Génieur', 18, 2, 2),
(13, 'Kapabl', 33, 1, 1),
(14, 'Guroth', 20, 3, 3),
(15, 'Damien', 0.5, NULL, 1),
(16, 'Zwerglein', 6, 4, 1),
(17, 'Kiesel', 10, 4, 4),
(18, 'Rhine', 1, 5, 2),
(19, 'Stan', 66.6, 3, 4),
(20, 'Pohssibl', 87, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `taverne`
--

DROP TABLE IF EXISTS `taverne`;
CREATE TABLE IF NOT EXISTS `taverne` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_nom` varchar(255) NOT NULL,
  `t_chambres` int(11) NOT NULL,
  `t_blonde` tinyint(1) NOT NULL,
  `t_brune` tinyint(1) NOT NULL,
  `t_rousse` tinyint(1) NOT NULL,
  `t_ville_fk` int(11) NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `t_ville_fk` (`t_ville_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taverne`
--

INSERT INTO `taverne` (`t_id`, `t_nom`, `t_chambres`, `t_blonde`, `t_brune`, `t_rousse`, `t_ville_fk`) VALUES
(1, 'Au gobelin piétiné', 15, 0, 1, 1, 3),
(2, 'La chope', 20, 1, 0, 1, 1),
(3, 'Au pire accueil', 1, 0, 0, 1, 4),
(4, 'La pioche en Houblon', 10, 0, 1, 1, 1),
(5, 'Euh j\'suis bourré', 42, 1, 1, 1, 2),
(6, 'La chope(filliale)', 17, 1, 0, 1, 2),
(7, 'La bonne pioche', 15, 1, 1, 0, 3),
(8, 'Objectif 3 Bières', 250, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tunnel`
--

DROP TABLE IF EXISTS `tunnel`;
CREATE TABLE IF NOT EXISTS `tunnel` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_progres` float NOT NULL,
  `t_villedepart_fk` int(11) NOT NULL,
  `t_villearrivee_fk` int(11) NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `t_villedepart_fk` (`t_villedepart_fk`),
  KEY `t_villearrivee_fk` (`t_villearrivee_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tunnel`
--

INSERT INTO `tunnel` (`t_id`, `t_progres`, `t_villedepart_fk`, `t_villearrivee_fk`) VALUES
(1, 100, 1, 2),
(2, 100, 2, 3),
(3, 100, 3, 4),
(4, 100, 4, 1),
(5, 99, 1, 3),
(6, 0, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_nom` varchar(255) NOT NULL,
  `v_superficie` int(11) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`v_id`, `v_nom`, `v_superficie`) VALUES
(1, 'Svarkungor ', 20),
(2, 'Urbaz', 10),
(3, 'Forgefer', 5),
(4, 'Moria', 50);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`g_taverne_fk`) REFERENCES `taverne` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`g_tunnel_fk`) REFERENCES `tunnel` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `nain`
--
ALTER TABLE `nain`
  ADD CONSTRAINT `nain_ibfk_1` FOREIGN KEY (`n_groupe_fk`) REFERENCES `groupe` (`g_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `nain_ibfk_2` FOREIGN KEY (`n_ville_fk`) REFERENCES `ville` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `taverne`
--
ALTER TABLE `taverne`
  ADD CONSTRAINT `taverne_ibfk_1` FOREIGN KEY (`t_ville_fk`) REFERENCES `ville` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tunnel`
--
ALTER TABLE `tunnel`
  ADD CONSTRAINT `tunnel_ibfk_1` FOREIGN KEY (`t_villedepart_fk`) REFERENCES `ville` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tunnel_ibfk_2` FOREIGN KEY (`t_villearrivee_fk`) REFERENCES `ville` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
