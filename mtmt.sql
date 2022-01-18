-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 déc. 2021 à 10:33
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mtmt`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `Id_td` int(11) NOT NULL AUTO_INCREMENT,
  `taches` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_td`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`Id_td`, `taches`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, NULL),
(5, NULL),
(6, NULL),
(7, ''),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, NULL),
(22, NULL),
(23, NULL),
(24, NULL),
(25, NULL),
(26, NULL),
(27, NULL),
(28, NULL),
(29, NULL),
(30, NULL),
(31, NULL),
(32, NULL),
(33, NULL),
(34, NULL),
(35, NULL),
(36, NULL),
(37, NULL),
(38, NULL),
(39, NULL),
(40, NULL),
(41, NULL),
(42, NULL),
(43, NULL),
(44, NULL),
(45, NULL),
(46, NULL),
(47, NULL),
(48, NULL),
(49, NULL),
(50, NULL),
(51, NULL),
(52, NULL),
(53, NULL),
(54, NULL),
(55, NULL),
(56, NULL),
(57, NULL),
(58, NULL),
(59, NULL),
(60, NULL),
(61, NULL),
(62, NULL),
(63, NULL),
(64, NULL),
(65, NULL),
(66, NULL),
(67, NULL),
(68, NULL),
(69, NULL),
(70, NULL),
(71, 'Exemple');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `Id_article` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_article` varchar(255) NOT NULL,
  `Contenu_article` text NOT NULL,
  `Auteur_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Date_article` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`Id_article`, `Titre_article`, `Contenu_article`, `Auteur_id`, `Category_id`, `Date_article`, `Photo`) VALUES
(1, 'Bienvenue !!!', 'Bienvenue sur mon blog !\r\nJe poste ici mes actualités professionnelles et personnelles.\r\nVous pouvez chatter avec les autres utilisateurs si vous êtes enregistré et consulter le calendrier de streaming de la chaîne.\r\nBonne visite !\r\n', 8, 10, '2021-09-10 19:56:49', 'bienvenue.png');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `Id_auteur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_auteur` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`Id_auteur`, `Nom_auteur`) VALUES
(8, 'Maxime'),
(9, 'Salamazine');

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

DROP TABLE IF EXISTS `calendrier`;
CREATE TABLE IF NOT EXISTS `calendrier` (
  `Id_td` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_td`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `calendrier`
--

INSERT INTO `calendrier` (`Id_td`, `Contenu`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, 'Exemple');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id_categorie`, `Nom_categorie`) VALUES
(8, 'PHP'),
(9, 'JS'),
(10, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `Id_mess` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Texte` varchar(255) NOT NULL,
  `Date_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_mess`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`Id_mess`, `Pseudo`, `Texte`, `Date_chat`) VALUES
(4, 'Max', 'Bienvenue !', '2021-11-24 09:01:57');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `Id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Contenu` text NOT NULL,
  `Id_article` int(11) NOT NULL,
  `Date_commentaire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_commentaire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`Id_commentaire`, `Pseudo`, `Contenu`, `Id_article`, `Date_commentaire`) VALUES
(1, 'toto', 'tata', 1, '2020-06-10 12:21:46');

-- --------------------------------------------------------

--
-- Structure de la table `stockagenda`
--

DROP TABLE IF EXISTS `stockagenda`;
CREATE TABLE IF NOT EXISTS `stockagenda` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `tache` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tache`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stockphotos`
--

DROP TABLE IF EXISTS `stockphotos`;
CREATE TABLE IF NOT EXISTS `stockphotos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stockphotos`
--

INSERT INTO `stockphotos` (`id_photo`, `Photo`) VALUES
(3, 'new world.jpg'),
(4, 'wow.jpg'),
(5, 'MHRise.jpg'),
(6, 'lol.jpg'),
(7, 'off-design-china-name.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id_user` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Pseudo` varchar(255) NOT NULL,
  `Role` enum('Admin','User') NOT NULL DEFAULT 'User',
  PRIMARY KEY (`Id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id_user`, `Email`, `Password`, `Date_creation`, `Pseudo`, `Role`) VALUES
(8, 'maxime.titsaoui@hotmail.fr', '$2y$10$rUF7mz0/EGOeh56rmaDPeOS9q3h8IYNmB0YElyEThyyKnJlpHkV02', '2020-08-10 10:27:56', 'Max', 'Admin'),
(9, 'test@admin.fr', '$2y$10$drl4/qCGEV4N5sJKAcsVueiZYogrehpQeGl9Xkr2WeJLeMghxpzhG', '2021-10-18 12:57:09', 'testadmin', 'Admin'),
(10, 'test@user.fr', '$2y$10$z0IEH2gyCdu2VNu6tADRretd2Pi.4FBz2MHDcOMUTiU45z7qLeWhG', '2021-10-18 12:57:32', 'testuser', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
