CREATE TABLE `carolina_jewerly_db`.`empleados` (
  `codigo_empleado` INT NOT NULL,
  `num_identidad` VARCHAR(13) NOT NULL,
  `nombre_empleado` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `genero` VARCHAR(1) NOT NULL,
  `fecha_contrato` DATE NOT NULL,
  `foto_empleado` VARCHAR(100) NOT NULL,
  `puesto` VARCHAR(60) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `cod_usuario` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`codigo_empleado`),
  INDEX `cod_usuario_idx` (`cod_usuario` ASC),
  CONSTRAINT `cod_usuario`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `carolina_jewerly_db`.`usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    