-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema audiences
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema audiences
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `audiences` DEFAULT CHARACTER SET utf8 ;
USE `audiences` ;

-- -----------------------------------------------------
-- Table `audiences`.`admistrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `audiences`.`admistrations` (
  `nom_admistration` VARCHAR(255) NOT NULL,
  `id_admistration` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nom_admistration`),
  UNIQUE INDEX `admistrations_AK` (`id_admistration` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `audiences`.`admistrateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `audiences`.`admistrateur` (
  `id_admistrateur` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_admistrateur` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `pass_admi` VARCHAR(255) NOT NULL,
  `nom_admistration` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_admistrateur`),
  INDEX `admistrateur_admistrations_FK` (`nom_admistration` ASC),
  CONSTRAINT `admistrateur_admistrations_FK`
    FOREIGN KEY (`nom_admistration`)
    REFERENCES `audiences`.`admistrations` (`nom_admistration`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `audiences`.`demande_audiences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `audiences`.`demande_audiences` (
  `id_demande` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_demandeur` VARCHAR(255) NOT NULL,
  `prenom_demandeur` VARCHAR(255) NOT NULL,
  `statut_demandeur` VARCHAR(255) NOT NULL,
  `tel_perso` VARCHAR(255) NOT NULL,
  `tel_bureau` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `destinataire` VARCHAR(255) NOT NULL,
  `objet` VARCHAR(255) NOT NULL,
  `nom_fichier1` VARCHAR(255) NOT NULL,
  `nom_fichier2` VARCHAR(255) NULL DEFAULT NULL,
  `civilite` VARCHAR(255) NOT NULL,
  `type_audience` VARCHAR(255) NOT NULL,
  `message` LONGTEXT NOT NULL,
  `date_envoie` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `nom_admistration` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_demande`),
  INDEX `demande_audiences_admistrations_FK` (`nom_admistration` ASC),
  CONSTRAINT `demande_audiences_admistrations_FK`
    FOREIGN KEY (`nom_admistration`)
    REFERENCES `audiences`.`admistrations` (`nom_admistration`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `audiences`.`consulter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `audiences`.`consulter` (
  `id_consult` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_admistrateur` INT(11) NOT NULL,
  `id_demande` INT(11) NOT NULL,
  `date_consult` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `accepter` TINYINT NULL DEFAULT 0,
  `rejeter` TINYINT NULL DEFAULT 0,
  `important` TINYINT NULL DEFAULT 0,
  `archiver` TINYINT NULL DEFAULT 0,
  `attentes` TINYINT NULL DEFAULT 0,
  INDEX `consulter_demande_audiences0_FK` (`id_demande` ASC),
  PRIMARY KEY (`id_consult`),
  CONSTRAINT `consulter_admistrateur_FK`
    FOREIGN KEY (`id_admistrateur`)
    REFERENCES `audiences`.`admistrateur` (`id_admistrateur`),
  CONSTRAINT `consulter_demande_audiences0_FK`
    FOREIGN KEY (`id_demande`)
    REFERENCES `audiences`.`demande_audiences` (`id_demande`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
