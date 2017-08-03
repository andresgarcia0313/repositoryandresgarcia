-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema 0fe_15924545_manual
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema 0fe_15924545_manual
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `0fe_15924545_manual` DEFAULT CHARACTER SET utf8 ;
USE `0fe_15924545_manual` ;

-- -----------------------------------------------------
-- Table `0fe_15924545_manual`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `0fe_15924545_manual`.`empresa` ;

CREATE TABLE IF NOT EXISTS `0fe_15924545_manual`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `razon_social` VARCHAR(50) NOT NULL,
  `imagen` BLOB NULL,
  `identificacion` VARCHAR(50) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `razon_social_UNIQUE` (`razon_social` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `0fe_15924545_manual`.`manual`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `0fe_15924545_manual`.`manual` ;

CREATE TABLE IF NOT EXISTS `0fe_15924545_manual`.`manual` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_manual` VARCHAR(50) NOT NULL,
  `empresa_id` INT NOT NULL,
  PRIMARY KEY (`id`, `empresa_id`),
  INDEX `fk_manual_empresa1_idx` (`empresa_id` ASC),
  CONSTRAINT `fk_manual_empresa1`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `0fe_15924545_manual`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `0fe_15924545_manual`.`capitulos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `0fe_15924545_manual`.`capitulos` ;

CREATE TABLE IF NOT EXISTS `0fe_15924545_manual`.`capitulos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_capitulo` VARCHAR(50) NOT NULL,
  `manual_id` INT NOT NULL,
  PRIMARY KEY (`id`, `manual_id`),
  INDEX `fk_Capitulos_manual_idx` (`manual_id` ASC),
  CONSTRAINT `fk_Capitulos_manual`
    FOREIGN KEY (`manual_id`)
    REFERENCES `0fe_15924545_manual`.`manual` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `0fe_15924545_manual`.`pagina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `0fe_15924545_manual`.`pagina` ;

CREATE TABLE IF NOT EXISTS `0fe_15924545_manual`.`pagina` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_pagina` VARCHAR(50) NULL,
  `capitulos_id` INT NOT NULL,
  `contenido` NVARCHAR(5000) NULL,
  PRIMARY KEY (`id`, `capitulos_id`),
  INDEX `fk_pagina_capitulos1_idx` (`capitulos_id` ASC),
  CONSTRAINT `fk_pagina_capitulos1`
    FOREIGN KEY (`capitulos_id`)
    REFERENCES `0fe_15924545_manual`.`capitulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
