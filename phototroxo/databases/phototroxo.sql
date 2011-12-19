-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2011 a las 19:45:55
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `trabajoabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigo`
--

DROP TABLE IF EXISTS `amigo`;
CREATE TABLE IF NOT EXISTS `amigo` (
  `idA` int(10) NOT NULL,
  `idU` int(10) NOT NULL,
  `nombreA` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idA`,`idU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `amigo`
--

INSERT INTO `amigo` (`idA`, `idU`, `nombreA`) VALUES
(1, 1, 'María'),
(2, 1, 'Ramón'),
(2, 2, 'Pedro'),
(3, 1, 'Cristina'),
(3, 4, 'Clara'),
(4, 5, 'Andres'),
(5, 6, 'Tomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `idI` int(10) NOT NULL,
  `idA` int(10) NOT NULL,
  `idU` int(10) NOT NULL,
  `comentario` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idI`,`idA`,`idU`),
  KEY `idA` (`idA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idI`, `idA`, `idU`, `comentario`) VALUES
(1, 1, 1, 'Hola soy patri!!'),
(1, 4, 6, ''),
(2, 1, 1, ''),
(2, 2, 3, ''),
(3, 1, 1, ''),
(5, 2, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

DROP TABLE IF EXISTS `imagen`;
CREATE TABLE IF NOT EXISTS `imagen` (
  `idI` int(10) NOT NULL AUTO_INCREMENT,
  `idU` int(10) NOT NULL,
  `fechaSubida` date NOT NULL,
  `ruta` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idI`, `idU`, `fechaSubida`, `ruta`) VALUES
(1, 1, '2011-11-01', 'escritorio/fotosABD/informatica_1'),
(2, 1, '2011-11-07', 'escritorio/fotosABD/informatica-800'),
(3, 2, '2011-10-11', 'escritorio/fotosABD/informatica-800'),
(4, 3, '2011-11-09', 'escritorio/fotosABD/informatica_1'),
(5, 4, '2011-11-01', 'escritorio/fotosABD/logo-informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idU` int(10) NOT NULL AUTO_INCREMENT,
  `User` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `Pass` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `mail` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dni` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `sexo` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `calle` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `poblacion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `provincia` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idU`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idU`, `User`, `Pass`, `Nombre`, `Apellidos`, `FechaNacimiento`, `mail`, `dni`, `sexo`, `calle`, `poblacion`, `provincia`) VALUES
(1, 'Patrairom', 'patricia', 'Patricia', 'Raigada Romero', '1989-09-15', 'p.raigada@gmail.com', '628749272T', 'M', 'C/ Plaza Jose del Castillo Díaz', 'Isla Cristina', 'Huelva'),
(2, 'cristiss', 'pajaro', 'Cristina', 'Del Marco Martinez', '2011-11-14', 'ccristina@gmail.com', '372859034P', 'M', 'C/ Miguel de Cervantes', 'Écija', 'Sevilla'),
(3, 'velita7', 'margasevilla', 'Margarita', 'Vela Jimenez', '2001-11-05', 'margarivela@hotmail.com', '848924654L', 'M', 'C/ Isaac Newton', 'Castilleja de la Cuesta', 'Sevilla'),
(4, 'pulimento', 'pulido', 'Francisco Javier ', ' Pulido Espina', '2001-11-07', 'pullwifi@gmail.com', '739673214Y', 'H', 'C/ Delgado Hernandez', 'Bollullos del Condado', 'Sevilla'),
(5, 'parisete', 'joselito', 'Jose', 'Rodriguez Guerrero', '1987-11-10', 'joseRG@hotmail.com', '739567231R', 'H', 'C/ Real', 'Zalamea la Real', 'Sevilla'),
(6, 'claraOscura', 'clarota', 'Clara', 'Bermejo Calero', '1990-07-10', 'clara7@hotmail.com', '876578987K', 'M', 'C/ Castillo', 'Motril', 'Granada'),
(7, 'pepito55', 'sevilla', 'Pepe', 'Romero Bermejo', '1991-11-13', 'pepebj@hotmail.com', '656987896V', 'H', 'C/ Almería', 'Almonte', 'Huelva');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idI`) REFERENCES `imagen` (`idI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idA`) REFERENCES `amigo` (`idA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idI`) REFERENCES `usuario` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
