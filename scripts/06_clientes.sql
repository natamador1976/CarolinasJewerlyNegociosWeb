CREATE TABLE `carolina_jewerly_db`.`clientes` (
  `codigo_cliente` INT NOT NULL AUTO_INCREMENT,
  `nombre_ciente` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(25) NOT NULL,
  `genero` VARCHAR(1) NOT NULL,
  `correo_electronico` VARCHAR(100) NOT NULL,
  `codigo_usuario` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`codigo_cliente`),
  INDEX `codigo_usuario_idx` (`codigo_usuario` ASC),
  CONSTRAINT `codigo_usuario`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `carolina_jewerly_db`.`usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);