-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema prueba_AW
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prueba_AW
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prueba_AW` DEFAULT CHARACTER SET utf8 ;
USE `prueba_AW` ;

-- -----------------------------------------------------
-- Table `prueba_AW`.`Talleres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba_AW`.`Talleres` (
  `Talleres_id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `Ubicacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Talleres_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prueba_AW`.`Participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba_AW`.`Participante` (
  `idParticipante` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Telefono` INT(10) NOT NULL,
  PRIMARY KEY (`idParticipante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prueba_AW`.`inscripciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba_AW`.`inscripciones` (
  `idinscripciones` INT NOT NULL AUTO_INCREMENT,
  `participante` VARCHAR(45) NOT NULL,
  `taller` VARCHAR(45) NOT NULL,
  `Talleres_Talleres_id` INT NOT NULL,
  `Participante_idParticipante` INT NOT NULL,
  `Fecha_matricula` DATE NOT NULL,
  PRIMARY KEY (`idinscripciones`),
  INDEX `fk_inscripciones_Talleres_idx` (`Talleres_Talleres_id` ASC) ,
  INDEX `fk_inscripciones_Participante1_idx` (`Participante_idParticipante` ASC),
  CONSTRAINT `fk_inscripciones_Talleres`
    FOREIGN KEY (`Talleres_Talleres_id`)
    REFERENCES `prueba_AW`.`Talleres` (`Talleres_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_Participante1`
    FOREIGN KEY (`Participante_idParticipante`)
    REFERENCES `prueba_AW`.`Participante` (`idParticipante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
