-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2018 a las 01:07:10
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectodeportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `name_tourn` varchar(30) NOT NULL,
  `participants` int(11) NOT NULL,
  `category` varchar(15) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `name_tourn`, `participants`, `category`, `user`) VALUES
(6, 'Mundial Qatar 2022', 21, '1', 'leo'),
(7, 'Mundial Rusia 2018', 23, '3', 'juve'),
(8, 'Mundial Rusia 2018', 2, '2', 'juve'),
(15, 'Mundial Rusia 2018', 34, '1', 'juve');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `name_tourn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tournaments`
--

INSERT INTO `tournaments` (`id`, `name_tourn`) VALUES
(1, 'Mundial Rusia 2018'),
(2, 'Mundial Qatar 2022'),
(3, 'Champion League'),
(4, 'Copa Libertadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_pass`
--

CREATE TABLE `users_pass` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name_team` varchar(30) NOT NULL,
  `short_name` varchar(3) NOT NULL,
  `creation_date` date NOT NULL,
  `adress` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `type` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_pass`
--

INSERT INTO `users_pass` (`id`, `user`, `password`, `name_team`, `short_name`, `creation_date`, `adress`, `email`, `website`, `type`) VALUES
(1, 'leo', 'leo', 'Leones', 'leo', '2017-10-01', 'ccs', 'c@c.com', 'sdsad', NULL),
(2, 'ccs', 'ccs', 'ccs', 'ccs', '2017-10-08', 'la urbina', 'cfc@cfc.com', 'www.cfc.com', 'admin'),
(3, 'juve', 'juve', 'juve', 'juv', '2017-10-08', 'italia', 'j@k.com', 'jwjw', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_pass`
--
ALTER TABLE `users_pass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users_pass`
--
ALTER TABLE `users_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
