create database labpro3;
use labpro3;

CREATE TABLE `curso` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `calificacion` (
  `codigo` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `curso` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rango` varchar(45) NOT NULL DEFAULT '0-100',
  `estado` enum('pendiente','finalizado','cancelado') NOT NULL DEFAULT 'pendiente',
  `calificacion` decimal(4,2) DEFAULT NULL,
  `comentario` text,
  FOREIGN KEY (`curso`) REFERENCES `curso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

insert into curso value (1, 'Lab. Física Electricidad');
insert into curso value (2, 'Inteligencia Artificial');

insert into `calificacion` (`curso`, `nombre`, `calificacion`, `comentario`) values(1, 'EXP. #1', 86.97, 'Bien!');
insert into `calificacion` (`curso`, `nombre`, `calificacion`, `comentario`) values(1, 'EXP. #2', 78, 'Mejorar!');
insert into `calificacion` (`curso`, `nombre`, `calificacion`, `comentario`) values(1, 'EXP. #3', 98.56, 'Excelente');

insert into `calificacion` (`curso`, `nombre`, `calificacion`, `comentario`) values(2, 'Mineria de datos practica #1', 56, 'Debes mejorar y estudiar mas');
insert into `calificacion` (`curso`, `nombre`, `calificacion`, `comentario`) values(2, 'Machine Learning supervisado 1er. parcial', 80, 'Bien!');