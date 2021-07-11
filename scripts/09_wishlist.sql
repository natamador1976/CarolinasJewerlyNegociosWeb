CREATE TABLE `carolina_jewerly_db`.`wishlists` (
  `codigo_wishlist` INT NOT NULL AUTO_INCREMENT,
  `codi_usuario` VARCHAR(10) NOT NULL,
  `cod_producto` INT NOT NULL,
  PRIMARY KEY (`codigo_wishlist`),
  INDEX `cod_producto_idx` (`cod_producto` ASC),
  INDEX `codigo_usuario_idx` (`codi_usuario` ASC),
  CONSTRAINT `cod_producto`
    FOREIGN KEY (`cod_producto`)
    REFERENCES `carolina_jewerly_db`.`productos` (`codigo_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `codi_usuario`
    FOREIGN KEY (`codi_usuario`)
    REFERENCES `carolina_jewerly_db`.`usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
