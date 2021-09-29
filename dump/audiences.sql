-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 26 sep. 2021 à 16:25
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `audiences`
--

-- --------------------------------------------------------

--
-- Structure de la table `admistrateur`
--

DROP TABLE IF EXISTS `admistrateur`;
CREATE TABLE IF NOT EXISTS `admistrateur` (
  `id_admistrateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_admistrateur` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass_admi` varchar(255) NOT NULL,
  `nom_admistration` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admistrateur`),
  KEY `admistrateur_admistrations_FK` (`nom_admistration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admistrations`
--

DROP TABLE IF EXISTS `admistrations`;
CREATE TABLE IF NOT EXISTS `admistrations` (
  `nom_admistration` varchar(255) NOT NULL,
  `id_admistration` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nom_admistration`),
  UNIQUE KEY `admistrations_AK` (`id_admistration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `consulter`
--

DROP TABLE IF EXISTS `consulter`;
CREATE TABLE IF NOT EXISTS `consulter` (
  `id_admistrateur` int(11) NOT NULL,
  `id_demande` int(11) NOT NULL,
  PRIMARY KEY (`id_admistrateur`,`id_demande`),
  KEY `consulter_demande_audiences0_FK` (`id_demande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demande_audiences`
--

DROP TABLE IF EXISTS `demande_audiences`;
CREATE TABLE IF NOT EXISTS `demande_audiences` (
  `id_demande` int(11) NOT NULL AUTO_INCREMENT,
  `nom_demandeur` varchar(255) NOT NULL,
  `prenom_demandeur` varchar(255) NOT NULL,
  `statut_demandeur` varchar(255) NOT NULL,
  `tel_perso` varchar(255) NOT NULL,
  `tel_bureau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `nom_fichier1` varchar(255) NOT NULL,
  `nom_fichier2` varchar(255) DEFAULT NULL,
  `civilite` varchar(255) NOT NULL,
  `type_audience` varchar(255) NOT NULL,
  `date_envoie` datetime NOT NULL,
  `nom_admistration` varchar(255) NOT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `demande_audiences_admistrations_FK` (`nom_admistration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admistrateur`
--
ALTER TABLE `admistrateur`
  ADD CONSTRAINT `admistrateur_admistrations_FK` FOREIGN KEY (`nom_admistration`) REFERENCES `admistrations` (`nom_admistration`);

--
-- Contraintes pour la table `consulter`
--
ALTER TABLE `consulter`
  ADD CONSTRAINT `consulter_admistrateur_FK` FOREIGN KEY (`id_admistrateur`) REFERENCES `admistrateur` (`id_admistrateur`),
  ADD CONSTRAINT `consulter_demande_audiences0_FK` FOREIGN KEY (`id_demande`) REFERENCES `demande_audiences` (`id_demande`);

--
-- Contraintes pour la table `demande_audiences`
--
ALTER TABLE `demande_audiences`
  ADD CONSTRAINT `demande_audiences_admistrations_FK` FOREIGN KEY (`nom_admistration`) REFERENCES `admistrations` (`nom_admistration`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
