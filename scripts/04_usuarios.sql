CREATE TABLE `carolina_jewerly_db`.`usuarios` (
  `codigo_usuario` VARCHAR(10) NOT NULL,
  `nombre_usuario` VARCHAR(20) NOT NULL,
  `correo_electronico` VARCHAR(100) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `estado` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`codigo_usuario`));


  --Cambios
ALTER TABLE `carolina_jewerly_db`.`usuarios` 
ADD COLUMN `img_uri` VARCHAR(100) NULL AFTER `estado`;

