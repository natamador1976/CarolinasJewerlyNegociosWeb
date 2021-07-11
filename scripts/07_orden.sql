CREATE TABLE `carolina_jewerly_db`.`orden` (
  `num_orden` INT NOT NULL AUTO_INCREMENT,
  `codigo_orden` INT NOT NULL,
  `codigo_cliente` INT NOT NULL,
  `fecha_emision` DATE NOT NULL,
  `estado` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`num_orden`, `codigo_orden`),
  INDEX `codigo_cliente_idx` (`codigo_cliente` ASC),
  CONSTRAINT `codigo_cliente`
    FOREIGN KEY (`codigo_cliente`)
    REFERENCES `carolina_jewerly_db`.`clientes` (`codigo_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);