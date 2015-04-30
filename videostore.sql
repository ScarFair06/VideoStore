-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Avril 2015 à 09:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `videostore`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL DEFAULT '0',
  `mail` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `mail`, `last_name`, `first_name`, `adresse`, `cp`, `city`, `phone`, `username`, `password`, `token`) VALUES
(1, 'VerrillDuplessis@jourrapide.com ', 'Duplessis', 'Verrill', '90, Rue Frédéric Chopin', 27200, 'VERNON ', '02.33.88.84.19', 'test', 'test', '');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `magasin` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  UNIQUE KEY `token_2` (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `employee`
--

INSERT INTO `employee` (`id`, `mail`, `last_name`, `first_name`, `adresse`, `cp`, `city`, `phone`, `username`, `password`, `magasin`, `token`) VALUES
(1, 'admin@videostore.fr', 'Dupéré', 'Robert', '27, Rue de Strasbourg', 63100, 'CLERMONT-FERRAND', '04.06.05.23.12', 'admin', 'admin', 'VideoStore', '');

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE IF NOT EXISTS `magasin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `magasin`
--

INSERT INTO `magasin` (`id`, `name`, `adresse`, `cp`, `city`, `phone`) VALUES
(1, 'VideoStore', '34, boulevard de Prague', 30000, 'Nimes', '04.26.01.56.89');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `reservation` date NOT NULL,
  `return` date NOT NULL,
  `magasin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `studio` varchar(255) NOT NULL,
  `parution` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `jaquette` varchar(255) NOT NULL,
  `synopsis` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id`, `title`, `realisateur`, `studio`, `parution`, `genre`, `stock`, `price`, `jaquette`, `synopsis`) VALUES
(1, 'Interstellar', 'Christopher Nolan', 'Warner Bros', '2014-11-05', 'Science fiction', 5, 12, 'J_interstellar.jpg', 'Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille récemment découverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire.'),
(2, 'Taken 3', 'Olivier Megaton', 'EuropaCorp Distribution', '2015-01-15', 'Action', 20, 20, 'J_taken3.jpg', 'L?ex-agent sp?cial Bryan Mills voit son retour ? une vie tranquille boulevers? lorsqu?il est accus? ? tort du meurtre de son ex-femme, chez lui, ? Los Angeles. En fuite et traqu? par l?inspecteur Dotzler, Mills va devoir employer ses comp?tences particuli?res une derni?re fois pour trouver le v?ritable coupable, prouver son innocence et prot?ger la seule personne qui compte d?sormais pour lui ? sa fille.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
