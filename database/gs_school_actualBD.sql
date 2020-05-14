-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2020 at 03:10 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherant`
--

DROP TABLE IF EXISTS `adherant`;
CREATE TABLE IF NOT EXISTS `adherant` (
  `adh_num` varchar(50) NOT NULL,
  `adh_nom` varchar(50) NOT NULL,
  `adh_prenom` varchar(50) NOT NULL,
  `adh_cp` varchar(50) NOT NULL,
  `adh_ville` varchar(50) NOT NULL,
  `adh_rue` varchar(50) NOT NULL,
  `line_img` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`adh_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adherant`
--

INSERT INTO `adherant` (`adh_num`, `adh_nom`, `adh_prenom`, `adh_cp`, `adh_ville`, `adh_rue`, `line_img`, `tel`) VALUES
('99Omar', 'Niang', 'Oumar', 'BPcam', 'camberene', 'CA22', 'upload/IMG_20171225_162224213.jpg', '771221709'),
('fat21', 'Fatyma', 'LY', 'BP21', 'Sacre Ceour', 'SC12', 'upload/IMG-20180729-WA0030.jpg', '772399832'),
('fraa', 'fatah', 'DIALLO', 'mariste', 'mariste123', 'MA12', 'upload/IMG-20190718-WA0011.jpg', '8837293723'),
('KD123', 'Khadiatou', 'Diallo', 'CMB21', 'reubeuss', 'RB21', 'upload/20180826_201133.jpg', '786283273'),
('kd2123', 'Khadiatou', 'Diallo', 'CMB21', 'reubeuss', 'RB21', 'upload/20180826_201133.jpg', '786283273'),
('khdoss', 'abodu', 'ndoaye', 'PA12', 'parcelles', 'PA12', 'upload/Screenshot_20180822-154620.jpg', '77283993'),
('Rane123', 'Gueye', 'Alassane', 'BP2020', 'camberene', 'CA13', 'upload/PhotoGrid_1480600597397.jpg', '773448745'),
('SaiD123', 'Said', 'DIOP', 'BP5005', 'Fadia', 'FA12', 'upload/WhatsApp Image 2020-05-07 at 02.00.12.jpeg', '770191323'),
('SAXO12', 'sakho', 'ndeye coumba', 'EN21', 'enseignant', 'EN12', 'upload/IMG-20190607-WA0002.jpg', '778822Y32');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `nom_aut` varchar(50) NOT NULL,
  `prenom_aut` varchar(50) NOT NULL,
  PRIMARY KEY (`nom_aut`,`prenom_aut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`nom_aut`, `prenom_aut`) VALUES
('Amadaou', 'Kourouma'),
('Camara', 'LAYE'),
('Camaraa', 'LAYE'),
('Ferdinard', 'OyoNO'),
('Gueye', 'Rane'),
('Mariama', 'Ba'),
('Naing', 'Oumar');

-- --------------------------------------------------------

--
-- Table structure for table `emprunter`
--

DROP TABLE IF EXISTS `emprunter`;
CREATE TABLE IF NOT EXISTS `emprunter` (
  `liv_num` int(11) NOT NULL,
  `adh_num` varchar(50) NOT NULL,
  `date_emprun` datetime NOT NULL,
  `date_rendu` datetime NOT NULL,
  `delai` datetime NOT NULL,
  `adh_nb_emp` int(11) DEFAULT '2',
  PRIMARY KEY (`liv_num`,`adh_num`),
  KEY `emprunter_Adherant0_FK` (`adh_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprunter`
--

INSERT INTO `emprunter` (`liv_num`, `adh_num`, `date_emprun`, `date_rendu`, `delai`, `adh_nb_emp`) VALUES
(1, 'fat21', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2),
(1, 'kd2123', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2),
(1, 'khdoss', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2),
(1, 'Rane123', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2),
(2, '99Omar', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2),
(3, 'fraa', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2),
(3, 'SaiD123', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2),
(3, 'SAXO12', '2020-05-14 00:00:00', '2020-05-14 00:00:00', '2020-06-03 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `livre`
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
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`liv_num`, `liv_titre`, `nom_aut`, `prenom_aut`, `lien_image`, `quantite`, `categorie`) VALUES
(1, 'Le soleil Des Independances', 'Amadaou', 'Kourouma', 'upload/soleil_indep-200x336.jpg', 12, 'ROMAN'),
(2, 'Une Si Longue Lettre', 'Mariama', 'Ba', 'upload/unesilonguelettre.jpg', 6, 'POESIE'),
(3, 'Une Vie De BOY', 'Ferdinard', 'OyoNO', 'upload/une-vie-de-boy.jpg', 4, 'HISTOIRE'),
(4, 'L\'enfant Noir', 'Camara', 'LAYE', 'upload/lenfantnoir.jpg', 2, 'GEOGRAPHIE'),
(6, 'Les Comptes D\'Amadou Koumba', 'Camaraa', 'LAYE', 'upload/lesnouveauxcompte.jpg', 9, 'CONTES'),
(7, 'Sous L\'orage', 'Naing', 'Oumar', 'upload/soslorage.jpg', 1, 'SCIENCE'),
(8, 'Maimouna', 'Gueye', 'Rane', 'upload/maimouna.jpg', 3, 'POESIE');

-- --------------------------------------------------------

--
-- Table structure for table `loginn`
--

DROP TABLE IF EXISTS `loginn`;
CREATE TABLE IF NOT EXISTS `loginn` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `passwordd` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginn`
--

INSERT INTO `loginn` (`id`, `username`, `passwordd`) VALUES
(1, 'admin', 'adminp');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_Adherant0_FK` FOREIGN KEY (`adh_num`) REFERENCES `adherant` (`adh_num`),
  ADD CONSTRAINT `emprunter_Livre_FK` FOREIGN KEY (`liv_num`) REFERENCES `livre` (`liv_num`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `Livre_Auteur_FK` FOREIGN KEY (`nom_aut`,`prenom_aut`) REFERENCES `auteur` (`nom_aut`, `prenom_aut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
