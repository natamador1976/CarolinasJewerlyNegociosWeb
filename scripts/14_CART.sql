CREATE TABLE `carolina_jewerly_db`.`carrito` (
  `codigo_carrito` INT NOT NULL AUTO_INCREMENT,
  `codigo_usuario` VARCHAR(10) NULL,
  `fechaCreado` DATETIME NULL,
  `fechaExpira` DATETIME NULL,
  PRIMARY KEY (`codigo_carrito`));
