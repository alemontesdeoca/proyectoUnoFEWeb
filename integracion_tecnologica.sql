-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2021 a las 01:58:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `integracion_tecnologica`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_Encuesta` (IN `usuario` INT, IN `producto` INT, OUT `esta_encuesta` INT)  begin 
    	if(usuario is not null and producto is not null) then 
        	insert into encuesta_cabecera(id_producto,id_usuario,fecha)
            values (producto,usuario,now());
            select max(id_encuesta_cabecera) into esta_encuesta from encuesta_cabecera where id_usuario = usuario;
        else 
        	ROLLBACK;
            set esta_encuesta = 0;
        end if;
    end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_cabecera`
--

CREATE TABLE `encuesta_cabecera` (
  `id_encuesta_cabecera` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuesta_cabecera`
--

INSERT INTO `encuesta_cabecera` (`id_encuesta_cabecera`, `id_usuario`, `fecha`, `id_producto`, `id_estado`, `puntuacion`) VALUES
(1, 1, '2021-04-14', 1, 4, 3),
(2, 2, '2021-04-14', 1, 4, 5),
(3, 3, '2021-04-06', 1, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_detalles`
--

CREATE TABLE `encuesta_detalles` (
  `encuesta_detalles` int(11) NOT NULL,
  `id_pregunta` int(11) DEFAULT NULL,
  `id_respuesta` int(11) DEFAULT NULL,
  `id_encuesta_cabecera` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuesta_detalles`
--

INSERT INTO `encuesta_detalles` (`encuesta_detalles`, `id_pregunta`, `id_respuesta`, `id_encuesta_cabecera`, `id_estado`) VALUES
(1, 1, 3, 1, 4),
(2, 3, 2, 1, 4),
(3, 4, 3, 1, 4),
(4, 1, 2, 2, 4),
(5, 1, 3, 3, 4),
(6, 4, 3, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'respondida'),
(2, 'no respondida'),
(3, 'abierta'),
(4, 'cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(1, 'arcor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `descripcion_pregunta` varchar(255) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `descripcion_pregunta`, `id_estado`) VALUES
(1, 'Consumiste este producto alguna vez', NULL),
(2, 'Porque no lo consumiste', NULL),
(3, 'que pensas de al respecto', NULL),
(4, 'Se lo recomendarias a alguien', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion`, `imagen`, `id_marca`) VALUES
(1, 'bonobon leche', 'Bon o Bon Leche (relleno con crema de mani y banhado en chocolate con leche)', '/imagenes/bonobon.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `descripcion_respuesta` varchar(255) DEFAULT NULL,
  `id_pregunta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `descripcion_respuesta`, `id_pregunta`) VALUES
(1, 'Porque lo conozco', 2),
(2, 'No', 1),
(3, 'si', 1),
(4, 'Por problemas de salud', 2),
(5, 'otro', 2),
(6, 'Es el mas rico que probe', 3),
(7, 'No tiene buen sabor', 3),
(8, 'No me gusta', 3),
(9, 'si lo recomendaria', 4),
(10, 'no lo recomendaria', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `pass_word` varchar(255) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `usuario_activo` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `alias`, `pass_word`, `nombre`, `apellido`, `telefono`, `direccion`, `usuario_activo`) VALUES
(1, 'admin', '$2y$10$gf1eexrDxmz0woAjPMRgZOkZaWbYR/cKC8rTvjeQiK67W9F/jos0.', 'admin', 'admin', '123456789', 'calle123', 1),
(2, 'juan', '$2y$10$58iieVpxjmicL4XSobmltOln9CLAHNOzySDHdHKck4F13uA4RWviq', 'juan ', 'juan', '1234567', 'calle 204', 0),
(3, 'mario', '$2y$10$CwLYzWtlIvdxbC2tX3IzCOQh/VO/j7SZIQrPHqi3AnanOU9/sr3xe', 'mario', 'gonzales', '789456123', 'una calle', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuesta_cabecera`
--
ALTER TABLE `encuesta_cabecera`
  ADD PRIMARY KEY (`id_encuesta_cabecera`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `encuesta_detalles`
--
ALTER TABLE `encuesta_detalles`
  ADD PRIMARY KEY (`encuesta_detalles`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_respuesta` (`id_respuesta`),
  ADD KEY `id_encuesta_cabecera` (`id_encuesta_cabecera`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `pregunta_ibfk_1` (`id_estado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuesta_cabecera`
--
ALTER TABLE `encuesta_cabecera`
  MODIFY `id_encuesta_cabecera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `encuesta_detalles`
--
ALTER TABLE `encuesta_detalles`
  MODIFY `encuesta_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuesta_cabecera`
--
ALTER TABLE `encuesta_cabecera`
  ADD CONSTRAINT `encuesta_cabecera_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `encuesta_cabecera_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `encuesta_cabecera_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `encuesta_detalles`
--
ALTER TABLE `encuesta_detalles`
  ADD CONSTRAINT `encuesta_detalles_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`),
  ADD CONSTRAINT `encuesta_detalles_ibfk_2` FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta` (`id_respuesta`),
  ADD CONSTRAINT `encuesta_detalles_ibfk_3` FOREIGN KEY (`id_encuesta_cabecera`) REFERENCES `encuesta_cabecera` (`id_encuesta_cabecera`),
  ADD CONSTRAINT `encuesta_detalles_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
