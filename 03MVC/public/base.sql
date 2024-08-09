-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Sexto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Sexto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Sexto` DEFAULT CHARACTER SET utf8 ;
USE `Sexto` ;

-- -----------------------------------------------------
-- Table `Sexto`.`Proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Proveedores` (
  `idProveedores` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Empresa` VARCHAR(45) NOT NULL,
  `Direccion` TEXT NULL,
  `Telefono` VARCHAR(17) NOT NULL,
  `Contacto_Empresa` VARCHAR(45) NOT NULL,
  `Telefono_Contacto` VARCHAR(17) NOT NULL,
  PRIMARY KEY (`idProveedores`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Productos` (
  `idProductos` INT NOT NULL AUTO_INCREMENT,
  `Cod_Barras` TEXT NULL,
  `Nombre_Producto` TEXT NOT NULL,
  `Graba_IVA` INT NOT NULL COMMENT 'campo para almacenar si el producto graba iva o no\n1=graba IVA\n0= no posee IVA',
  PRIMARY KEY (`idProductos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`Unidad_Medida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Unidad_Medida` (
  `idUnidad_de_Medida` INT NOT NULL AUTO_INCREMENT,
  `Detalle` TEXT NULL,
  `Tipo` INT NOT NULL COMMENT '1=Unidad de Medida Ej:gramos,litros,Kilos\n0=Presentacion Ej:caja, Unidad,Docena,sixpack\n2=Factor de conversion Ej:Kilos  a Libras',
  PRIMARY KEY (`idUnidad_de_Medida`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`IVA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`IVA` (
  `idIVA` INT NOT NULL AUTO_INCREMENT,
  `Detalle` VARCHAR(45) NOT NULL COMMENT '12%\n15%',
  `Estado` INT NOT NULL COMMENT '1=activo\n0=inactivo',
  `valor` INT NULL,
  PRIMARY KEY (`idIVA`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`Kardex`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Kardex` (
  `idKardex` INT NOT NULL AUTO_INCREMENT,
  `Estado` INT NOT NULL COMMENT 'campo para almacenarel stock del kardex\n1= activo\n0=inactivo',
  `Fecha_Transaccion` DATETIME NOT NULL,
  `Cantidad` VARCHAR(45) NOT NULL,
  `Valor_Compra` DECIMAL NOT NULL,
  `Valor_Venta` DECIMAL NOT NULL,
  `Unidad_Medida_idUnidad_de_Medida` INT NOT NULL,
  `Unidad_Medida_idUnidad_de_Medida1` INT NOT NULL,
  `Unidad_Medida_idUnidad_de_Medida2` INT NOT NULL,
  `Valor_Ganancia` DECIMAL NULL,
  `IVA` INT NOT NULL,
  `IVA_idIVA` INT NOT NULL,
  `Proveedores_idProveedores` INT NOT NULL,
  `Productos_idProductos` INT NOT NULL,
  `Tipo_Transaccion` INT NOT NULL COMMENT '1=entrada\n0=Salida',
  PRIMARY KEY (`idKardex`),
  INDEX `fk_Kardex_Unidad_Medida_idx` (`Unidad_Medida_idUnidad_de_Medida` ASC) ,
  INDEX `fk_Kardex_Unidad_Medida1_idx` (`Unidad_Medida_idUnidad_de_Medida1` ASC) ,
  INDEX `fk_Kardex_Unidad_Medida2_idx` (`Unidad_Medida_idUnidad_de_Medida2` ASC) ,
  INDEX `fk_Kardex_IVA1_idx` (`IVA_idIVA` ASC) ,
  INDEX `fk_Kardex_Proveedores1_idx` (`Proveedores_idProveedores` ASC) ,
  INDEX `fk_Kardex_Productos1_idx` (`Productos_idProductos` ASC) ,
  CONSTRAINT `fk_Kardex_Unidad_Medida`
    FOREIGN KEY (`Unidad_Medida_idUnidad_de_Medida`)
    REFERENCES `Sexto`.`Unidad_Medida` (`idUnidad_de_Medida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kardex_Unidad_Medida1`
    FOREIGN KEY (`Unidad_Medida_idUnidad_de_Medida1`)
    REFERENCES `Sexto`.`Unidad_Medida` (`idUnidad_de_Medida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kardex_Unidad_Medida2`
    FOREIGN KEY (`Unidad_Medida_idUnidad_de_Medida2`)
    REFERENCES `Sexto`.`Unidad_Medida` (`idUnidad_de_Medida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kardex_IVA1`
    FOREIGN KEY (`IVA_idIVA`)
    REFERENCES `Sexto`.`IVA` (`idIVA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kardex_Proveedores1`
    FOREIGN KEY (`Proveedores_idProveedores`)
    REFERENCES `Sexto`.`Proveedores` (`idProveedores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kardex_Productos1`
    FOREIGN KEY (`Productos_idProductos`)
    REFERENCES `Sexto`.`Productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `Nombres` TEXT NOT NULL,
  `Direccion` TEXT NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Cedula` VARCHAR(13) NOT NULL,
  `Correo` TEXT NOT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`Factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Factura` (
  `idFactura` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATETIME NOT NULL,
  `Sub_total` DECIMAL NOT NULL,
  `Sub_total_iva` DECIMAL NOT NULL,
  `Valor_iva` DECIMAL NOT NULL,
  `Cliente_idCliente` INT NOT NULL,
  PRIMARY KEY (`idFactura`),
  INDEX `fk_Factura_Cliente1_idx` (`Cliente_idCliente` ASC) ,
  CONSTRAINT `fk_Factura_Cliente1`
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `Sexto`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`Detalle_Factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Detalle_Factura` (
  `idDetalle_Factura` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` VARCHAR(45) NOT NULL,
  `Factura_idFactura` INT NOT NULL,
  `Kardex_idKardex` INT NOT NULL,
  `Precio_Unitario` DECIMAL NOT NULL,
  `Sub_Total_item` DECIMAL NOT NULL,
  PRIMARY KEY (`idDetalle_Factura`),
  INDEX `fk_Detalle_Factura_Factura1_idx` (`Factura_idFactura` ASC) ,
  INDEX `fk_Detalle_Factura_Kardex1_idx` (`Kardex_idKardex` ASC) ,
  CONSTRAINT `fk_Detalle_Factura_Factura1`
    FOREIGN KEY (`Factura_idFactura`)
    REFERENCES `Sexto`.`Factura` (`idFactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Detalle_Factura_Kardex1`
    FOREIGN KEY (`Kardex_idKardex`)
    REFERENCES `Sexto`.`Kardex` (`idKardex`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
