CREATE TABLE `carolina_jewerly_db`.`orden` (
  `cod_orden` VARCHAR(70) NOT NULL,
  `num_orden` VARCHAR(60) NOT NULL,
  `codigo_cliente` INT NOT NULL,
  `fecha_emision` DATE NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`num_orden`, `cod_orden`),
  INDEX `codigo_cliente_idx` (`codigo_cliente` ASC),
  CONSTRAINT `codigo_cliente`
    FOREIGN KEY (`codigo_cliente`)
    REFERENCES `carolina_jewerly_db`.`clientes` (`codigo_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);