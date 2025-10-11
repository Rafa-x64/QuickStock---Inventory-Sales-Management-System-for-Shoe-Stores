-- MySQL Script Corregido
-- Sat Oct 11 13:07:00 2025
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Rol`
-- -----------------------------------------------------
CREATE TABLE `Rol` (
  `id_rol` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(50) NOT NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE INDEX `nombre_rol_UNIQUE` (`nombre_rol` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE `Usuario` (
  `id_usuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usuario` VARCHAR(50) NOT NULL,
  `clave_hash` VARCHAR(255) NOT NULL,
  `id_rol` INT UNSIGNED NOT NULL,
  `estado` ENUM('activo', 'inactivo') NOT NULL DEFAULT 'activo',
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `nombre_usuario_UNIQUE` (`nombre_usuario` ASC),
  INDEX `fk_Usuario_Rol_idx` (`id_rol` ASC),
  CONSTRAINT `fk_Usuario_Rol`
    FOREIGN KEY (`id_rol`)
    REFERENCES `mydb`.`Rol` (`id_rol`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Sucursal`
-- -----------------------------------------------------
CREATE TABLE `Sucursal` (
  `id_sucursal` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(200) NOT NULL,
  `telefono` VARCHAR(30) NULL,
  PRIMARY KEY (`id_sucursal`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE `Empleado` (
  `id_empleado` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `cargo` VARCHAR(50) NOT NULL,
  `id_usuario` INT UNSIGNED NOT NULL,
  `id_sucursal` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE INDEX `id_usuario_UNIQUE` (`id_usuario` ASC),
  INDEX `fk_Empleado_Usuario_idx` (`id_usuario` ASC),
  INDEX `fk_Empleado_Sucursal_idx` (`id_sucursal` ASC),
  CONSTRAINT `fk_Empleado_Usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`Usuario` (`id_usuario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Empleado_Sucursal`
    FOREIGN KEY (`id_sucursal`)
    REFERENCES `mydb`.`Sucursal` (`id_sucursal`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE `Cliente` (
  `id_cliente` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `identificacion` VARCHAR(20) NOT NULL,
  `direccion` VARCHAR(255) NULL,
  `telefono` VARCHAR(20) NULL,
  `correo` VARCHAR(100) NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE INDEX `identificacion_UNIQUE` (`identificacion` ASC),
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Venta`
-- -----------------------------------------------------
CREATE TABLE `Venta` (
  `id_venta` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` DECIMAL(12,2) UNSIGNED NOT NULL,
  `id_cliente` INT UNSIGNED NOT NULL,
  `id_empleado` INT UNSIGNED NOT NULL,
  `id_sucursal` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_venta`),
  INDEX `fk_Venta_Cliente_idx` (`id_cliente` ASC),
  INDEX `fk_Venta_Empleado_idx` (`id_empleado` ASC),
  INDEX `fk_Venta_Sucursal_idx` (`id_sucursal` ASC),
  CONSTRAINT `fk_Venta_Cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `mydb`.`Cliente` (`id_cliente`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Venta_Empleado`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `mydb`.`Empleado` (`id_empleado`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Venta_Sucursal`
    FOREIGN KEY (`id_sucursal`)
    REFERENCES `mydb`.`Sucursal` (`id_sucursal`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`CategoriaProducto`
-- -----------------------------------------------------
CREATE TABLE `CategoriaProducto` (
  `id_categoria` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(50) NOT NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE INDEX `nombre_categoria_UNIQUE` (`nombre_categoria` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Impuesto`
-- -----------------------------------------------------
CREATE TABLE `Impuesto` (
  `id_impuesto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_impuesto` VARCHAR(50) NOT NULL,
  `porcentaje` DECIMAL(5,2) UNSIGNED NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`id_impuesto`),
  UNIQUE INDEX `nombre_impuesto_UNIQUE` (`nombre_impuesto` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Articulo`
-- -----------------------------------------------------
CREATE TABLE `Articulo` (
  `id_articulo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(150) NOT NULL,
  `costo_importacion` DECIMAL(12,2) UNSIGNED NOT NULL,
  `precio_base` DECIMAL(12,2) UNSIGNED NOT NULL,
  `estado` ENUM('activo', 'inactivo') NOT NULL DEFAULT 'activo',
  `id_categoria` INT UNSIGNED NOT NULL,
  `id_impuesto` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_articulo`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  INDEX `fk_Articulo_Categoria_idx` (`id_categoria` ASC),
  INDEX `fk_Articulo_Impuesto_idx` (`id_impuesto` ASC),
  CONSTRAINT `fk_Articulo_Categoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `mydb`.`CategoriaProducto` (`id_categoria`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Articulo_Impuesto`
    FOREIGN KEY (`id_impuesto`)
    REFERENCES `mydb`.`Impuesto` (`id_impuesto`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`DetalleVenta`
-- -----------------------------------------------------
CREATE TABLE `DetalleVenta` (
  `id_detalle_venta` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cantidad` INT UNSIGNED NOT NULL,
  `precio_unitario` DECIMAL(12,2) UNSIGNED NOT NULL,
  `descuento` DECIMAL(5,2) UNSIGNED NULL DEFAULT 0,
  `impuesto` DECIMAL(5,2) UNSIGNED NULL DEFAULT 0,
  `id_venta` BIGINT UNSIGNED NOT NULL,
  `id_articulo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_detalle_venta`),
  INDEX `fk_DetalleVenta_Venta_idx` (`id_venta` ASC),
  INDEX `fk_DetalleVenta_Articulo_idx` (`id_articulo` ASC),
  CONSTRAINT `fk_DetalleVenta_Venta`
    FOREIGN KEY (`id_venta`)
    REFERENCES `mydb`.`Venta` (`id_venta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_DetalleVenta_Articulo`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `mydb`.`Articulo` (`id_articulo`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`TasaCambio`
-- -----------------------------------------------------
CREATE TABLE `TasaCambio` (
  `id_tasa` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `valor` DECIMAL(12,2) UNSIGNED NOT NULL,
  `estado` ENUM('vigente', 'historica') NOT NULL DEFAULT 'vigente',
  `id_usuario_autorizado` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_tasa`),
  INDEX `fk_TasaCambio_Usuario_idx` (`id_usuario_autorizado` ASC),
  CONSTRAINT `fk_TasaCambio_Usuario`
    FOREIGN KEY (`id_usuario_autorizado`)
    REFERENCES `mydb`.`Usuario` (`id_usuario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`TipoPago`
-- -----------------------------------------------------
CREATE TABLE `TipoPago` (
  `id_tipo_pago` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_tipo` VARCHAR(50) NOT NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id_tipo_pago`),
  UNIQUE INDEX `nombre_tipo_UNIQUE` (`nombre_tipo` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Pago`
-- -----------------------------------------------------
CREATE TABLE `Pago` (
  `id_pago` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `monto` DECIMAL(12,2) UNSIGNED NOT NULL,
  `moneda` ENUM('Bs', 'USD', 'EUR') NOT NULL,
  `id_venta` BIGINT UNSIGNED NOT NULL,
  `id_tipo_pago` INT UNSIGNED NOT NULL,
  `id_tasa` INT UNSIGNED NULL, -- Puede ser NULO si el pago es en Bs
  PRIMARY KEY (`id_pago`),
  INDEX `fk_Pago_Venta_idx` (`id_venta` ASC),
  INDEX `fk_Pago_TipoPago_idx` (`id_tipo_pago` ASC),
  INDEX `fk_Pago_TasaCambio_idx` (`id_tasa` ASC),
  CONSTRAINT `fk_Pago_Venta`
    FOREIGN KEY (`id_venta`)
    REFERENCES `mydb`.`Venta` (`id_venta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Pago_TipoPago`
    FOREIGN KEY (`id_tipo_pago`)
    REFERENCES `mydb`.`TipoPago` (`id_tipo_pago`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Pago_TasaCambio`
    FOREIGN KEY (`id_tasa`)
    REFERENCES `mydb`.`TasaCambio` (`id_tasa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`AuditoriaUsuario`
-- -----------------------------------------------------
CREATE TABLE `AuditoriaUsuario` (
  `id_auditoria` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_hora` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accion` VARCHAR(100) NOT NULL,
  `maquina` VARCHAR(50) NOT NULL,
  `id_usuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_auditoria`),
  INDEX `fk_Auditoria_Usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_Auditoria_Usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Reporte`
-- -----------------------------------------------------
CREATE TABLE `Reporte` (
  `id_reporte` BIGINT NOT NULL AUTO_INCREMENT,
  `tipo_reporte` VARCHAR(50) NOT NULL,
  `fecha_generacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` TEXT NULL,
  `id_usuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_reporte`),
  INDEX `fk_Reporte_Usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_Reporte_Usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`Usuario` (`id_usuario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Proveedor`
-- -----------------------------------------------------
CREATE TABLE `Proveedor` (
  `id_proveedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `rif` VARCHAR(20) NOT NULL,
  `pais` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(200) NULL,
  `telefono` VARCHAR(30) NULL,
  `email` VARCHAR(100) NULL,
  PRIMARY KEY (`id_proveedor`),
  UNIQUE INDEX `rif_UNIQUE` (`rif` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Compra`
-- -----------------------------------------------------
CREATE TABLE `Compra` (
  `id_compra` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` DECIMAL(12,2) UNSIGNED NOT NULL,
  `id_proveedor` INT NOT NULL,
  `id_sucursal` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_compra`),
  INDEX `fk_Compra_Proveedor_idx` (`id_proveedor` ASC),
  INDEX `fk_Compra_Sucursal_idx` (`id_sucursal` ASC),
  CONSTRAINT `fk_Compra_Proveedor`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `mydb`.`Proveedor` (`id_proveedor`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Compra_Sucursal`
    FOREIGN KEY (`id_sucursal`)
    REFERENCES `mydb`.`Sucursal` (`id_sucursal`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`DetalleCompra`
-- -----------------------------------------------------
CREATE TABLE `DetalleCompra` (
  `id_detalle_compra` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cantidad` INT UNSIGNED NOT NULL,
  `costo_unitario` DECIMAL(12,2) UNSIGNED NOT NULL,
  `id_compra` BIGINT UNSIGNED NOT NULL,
  `id_articulo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_detalle_compra`),
  INDEX `fk_DetalleCompra_Compra_idx` (`id_compra` ASC),
  INDEX `fk_DetalleCompra_Articulo_idx` (`id_articulo` ASC),
  CONSTRAINT `fk_DetalleCompra_Compra`
    FOREIGN KEY (`id_compra`)
    REFERENCES `mydb`.`Compra` (`id_compra`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_DetalleCompra_Articulo`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `mydb`.`Articulo` (`id_articulo`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`InventarioSucursal`
-- -----------------------------------------------------
CREATE TABLE `InventarioSucursal` (
  `id_inventario` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `stock_actual` INT NOT NULL DEFAULT 0,
  `stock_minimo` INT UNSIGNED NOT NULL DEFAULT 0,
  `id_sucursal` INT UNSIGNED NOT NULL,
  `id_articulo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_inventario`),
  UNIQUE INDEX `uq_sucursal_articulo` (`id_sucursal` ASC, `id_articulo` ASC),
  INDEX `fk_Inventario_Sucursal_idx` (`id_sucursal` ASC),
  INDEX `fk_Inventario_Articulo_idx` (`id_articulo` ASC),
  CONSTRAINT `fk_Inventario_Sucursal`
    FOREIGN KEY (`id_sucursal`)
    REFERENCES `mydb`.`Sucursal` (`id_sucursal`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Inventario_Articulo`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `mydb`.`Articulo` (`id_articulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;