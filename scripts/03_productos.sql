CREATE TABLE `productos` (
  `codigo_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(45) NOT NULL,
  `descripcion_producto` varchar(45) NOT NULL,
  `precio` float NOT NULL,
  `cantidad_stock` int(11) NOT NULL,
  `codigo_tipo_producto` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `uri_img` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `codigo_categoria_idx` (`codigo_categoria`),
  KEY `codigo_tipo_producto_idx` (`codigo_tipo_producto`),
  CONSTRAINT `codigo_categoria` FOREIGN KEY (`codigo_categoria`) REFERENCES `categorias` (`codigo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `codigo_tipo_producto` FOREIGN KEY (`codigo_tipo_producto`) REFERENCES `tipo_producto` (`codigo_tipo_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

