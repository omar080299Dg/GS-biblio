-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 avr. 2020 à 21:23
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gs_school`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `nom_aut` varchar(50) NOT NULL,
  `prenom_aut` varchar(50) NOT NULL,
  PRIMARY KEY (`nom_aut`,`prenom_aut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`nom_aut`, `prenom_aut`) VALUES
('Amadou ', 'KOUROUMA'),
('Camara', 'LAYE'),
('DAVID', ' DIOP'),
('Ferdinard', 'Oyono'),
('Mariama', 'BA');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `liv_num` int(11) NOT NULL,
  `liv_titre` varchar(50) NOT NULL,
  `nom_aut` varchar(50) NOT NULL,
  `prenom_aut` varchar(50) NOT NULL,
  `lien_image` varchar(50) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `categorie` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`liv_num`),
  KEY `Livre_Auteur_FK` (`nom_aut`,`prenom_aut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`liv_num`, `liv_titre`, `nom_aut`, `prenom_aut`, `lien_image`, `quantite`, `categorie`) VALUES
(1, 'Une Si Longue Lettre', 'Mariama', 'BA', 'upload/unesilonguelettre.jpg', 10, 'ROMAN'),
(2, 'Une Vie De Boy', 'Ferdinard', 'Oyono', 'upload/une-vie-de-boy.jpg', 15, 'CONTES'),
(3, 'L\'enfant Noir', 'Camara', 'LAYE', 'upload/lenfantnoir.jpg', 4, 'THEATRE'),
(4, 'Les Contes D\'AMADOU KOUMBA', 'DAVID', ' DIOP', 'upload/lesnouveauxcompte.jpg', 20, 'CONTES'),
(5, 'Le Soleil Des Independances', 'Amadou ', 'KOUROUMA', 'upload/soleil_indep-200x336.jpg', 12, 'ROMAN');

-- --------------------------------------------------------

--
-- Structure de la table `loginn`
--

DROP TABLE IF EXISTS `loginn`;
CREATE TABLE IF NOT EXISTS `loginn` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `passwordd` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `loginn`
--

INSERT INTO `loginn` (`id`, `username`, `passwordd`) VALUES
(1, 'admin', 'adminp');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `Livre_Auteur_FK` FOREIGN KEY (`nom_aut`,`prenom_aut`) REFERENCES `auteur` (`nom_aut`, `prenom_aut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
