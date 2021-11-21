-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2021 a las 21:15:04
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intelcost_bienes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes_generales`
--

CREATE TABLE `bienes_generales` (
  `id` int(11) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bienes_generales`
--

INSERT INTO `bienes_generales` (`id`, `direccion`, `ciudad`, `telefono`, `codigo_postal`, `tipo`, `precio`) VALUES
(1, 'Ap #549-7395 Ut Rd.', 'New York', '334-052-0954', '85328', 'Casa', 30.746),
(2, 'P.O. Box 657, 9831 Cursus St.', 'Orlando', '488-441-5521', '04436', 'Casa de Campo', 71.045),
(4, '347-866 Laoreet Road', 'Los Angeles', '997-640-8188', '94526-134', 'Casa de Campo', 16.048);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bienes_generales`
--
ALTER TABLE `bienes_generales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bienes_generales`
--
ALTER TABLE `bienes_generales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
