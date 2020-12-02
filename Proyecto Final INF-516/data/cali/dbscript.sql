create database labpro3db;

CREATE TABLE `calificacion` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tarea` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rango` varchar(45) NOT NULL DEFAULT '0-100',
  `estado` enum('pendiente','finalizado','cancelado') NOT NULL DEFAULT 'pendiente',
  `calificacion` decimal(4,2) DEFAULT NULL,
  `comentario` text,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;