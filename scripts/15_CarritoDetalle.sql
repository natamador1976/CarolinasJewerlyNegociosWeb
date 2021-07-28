CREATE TABLE `carolina_jewerly_db`.`carrito_detalle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo_carrito` INT NULL,
  `codigo_producto_c` INT NULL,
  `cantidad` INT NULL,
  `precio` FLOAT NULL,
  PRIMARY KEY (`id`),
  INDEX `codigo_carrito_idx` (`codigo_carrito` ASC),
  INDEX `codigo_producto_c_idx` (`codigo_producto_c` ASC),
  CONSTRAINT `codigo_carrito`
    FOREIGN KEY (`codigo_carrito`)
    REFERENCES `carolina_jewerly_db`.`carrito` (`codigo_carrito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `codigo_producto_c`
    FOREIGN KEY (`codigo_producto_c`)
    REFERENCES `carolina_jewerly_db`.`productos` (`codigo_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
