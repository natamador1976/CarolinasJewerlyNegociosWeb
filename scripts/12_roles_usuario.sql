CREATE TABLE `carolina_jewerly_db`.`roles_usuarios` (
  `codusuario` VARCHAR(10) NOT NULL,
  `codigo_rol` VARCHAR(15) NOT NULL,
  `rol_estado` CHAR(3) NOT NULL,
  `rol_fecha` DATETIME NOT NULL,
  `rol_fechaexp` DATETIME NOT NULL,
  PRIMARY KEY (`codusuario`, `codigo_rol`),
  INDEX `codigo_rol_idx` (`codigo_rol` ASC),
  CONSTRAINT `codusuario`
    FOREIGN KEY (`codusuario`)
    REFERENCES `carolina_jewerly_db`.`usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `codigo_rol`
    FOREIGN KEY (`codigo_rol`)
    REFERENCES `carolina_jewerly_db`.`roles` (`codigo_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);