
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
(8, 'Mundial Rusia 2018', 2, '2', 'juve'),
(16, 'Mundial Rusia 2018', 69, '1', 'leo'),
(17, 'Copa Libertadores', 12, '3', 'juve'),
(18, 'Mundial Qatar 2022', 12, '3', 'juve'),
(19, 'Mundial Rusia 2018', 0, '1', 'juve'),
(20, 'Mundial Rusia 2018', 0, '3', 'juve'),
(21, 'Mundial Qatar 2022', 0, '1', 'juve'),
(22, 'Mundial Qatar 2022', 0, '2', 'juve'),
(23, 'Champion League', 0, '1', 'juve'),
(24, 'Champion League', 0, '2', 'juve'),
(25, 'Champion League', 0, '3', 'juve'),
(26, 'Copa Libertadores', 0, '1', 'juve'),
(27, 'Copa Libertadores', 0, '2', 'juve'),
(28, 'Copa Libertadores', 32, '3', 'boca'),
(29, 'Mundial Rusia 2018', 12, '1', 'boca'),
(30, 'Mundial Rusia 2018', 1, '1', 'riverplate'),
(31, 'Mundial Qatar 2022', 23, '1', 'juan'),
(32, 'Mundial Qatar 2022', 23, '2', 'juan'),
(33, 'Mundial Qatar 2022', 23, '3', 'juan'),
(34, 'Mundial Qatar 2022', 23, '1', 'maria'),
(35, 'Mundial Qatar 2022', 23, '2', 'maria'),
(36, 'Mundial Qatar 2022', 23, '3', 'maria'),
(37, 'Mundial Qatar 2022', 23, '1', 'jesus'),
(38, 'Mundial Qatar 2022', 23, '2', 'jesus'),
(39, 'Mundial Qatar 2022', 23, '3', 'jesus'),
(40, 'Mundial Qatar 2022', 23, '1', 'barry'),
(41, 'Mundial Qatar 2022', 23, '2', 'barry'),
(42, 'Mundial Qatar 2022', 23, '3', 'barry'),
(43, 'Mundial Qatar 2022', 23, '1', 'chico'),
(44, 'Mundial Qatar 2022', 23, '2', 'chico'),
(45, 'Mundial Qatar 2022', 23, '3', 'chico'),
(46, 'Mundial Qatar 2022', 23, '1', 'bad bunny'),
(47, 'Mundial Qatar 2022', 23, '2', 'bad bunny'),
(48, 'Mundial Qatar 2022', 23, '3', 'bad bunny'),
(49, 'Mundial Qatar 2022', 23, '1', 'carlos'),
(50, 'Mundial Qatar 2022', 23, '2', 'carlos'),
(51, 'Mundial Qatar 2022', 23, '3', 'carlos'),
(52, 'Mundial Qatar 2022', 23, '1', 'nautica'),
(53, 'Mundial Qatar 2022', 23, '2', 'nautica'),
(54, 'Mundial Qatar 2022', 23, '3', 'nautica'),
(55, 'Mundial Rusia 2018', 23, '1', 'juan'),
(56, 'Mundial Rusia 2018', 23, '2', 'juan'),
(57, 'Mundial Rusia 2018', 23, '3', 'juan'),
(58, 'Mundial Rusia 2018', 23, '1', 'maria'),
(59, 'Mundial Rusia 2018', 23, '2', 'maria'),
(60, 'Mundial Rusia 2018', 23, '3', 'maria'),
(61, 'Mundial Rusia 2018', 23, '1', 'jesus'),
(62, 'Mundial Rusia 2018', 23, '2', 'jesus'),
(63, 'Mundial Rusia 2018', 23, '3', 'jesus'),
(64, 'Mundial Rusia 2018', 23, '1', 'barry'),
(65, 'Mundial Rusia 2018', 23, '2', 'barry'),
(66, 'Mundial Rusia 2018', 23, '3', 'barry'),
(67, 'Mundial Rusia 2018', 23, '1', 'chico'),
(68, 'Mundial Rusia 2018', 23, '2', 'chico'),
(69, 'Mundial Rusia 2018', 23, '3', 'chico'),
(70, 'Mundial Rusia 2018', 23, '1', 'bad bunny'),
(71, 'Mundial Rusia 2018', 23, '2', 'bad bunny'),
(72, 'Mundial Rusia 2018', 23, '3', 'bad bunny');

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
(3, 'Champions League'),
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
(1, 'leo', 'leo', 'Leones Del Caracas', 'leo', '2017-10-01', '2017-10-01', 'c@c.com', 'sdsad', NULL),
(2, 'ccs', 'ccs', 'ccs', 'ccs', '2017-10-08', 'la urbina', 'cfc@cfc.com', 'www.cfc.com', 'admin'),
(3, 'juve', 'juve', 'juve', 'juv', '2017-10-08', 'italia', 'j@k.com', 'jwjw', NULL),
(4, 'boca', 'boca', 'Boca Jrs', 'boc', '2017-10-27', 'argentina', 'asda@sd.com', 'www.cfc.com', NULL),
(5, 'RiverPlate', 'river', 'River Plate', 'RIV', '2016-10-26', 'buenos aires', 'adrienymrivera@gmail.com', 'www.cfc.com', NULL),
(6, 'juan', '123', 'valle verde', 'vll', '0000-00-00', 'la castra', 'example@example.com', 'www.example.com', NULL),
(7, 'maria', '123', 'magallanes', 'mag', '2017-10-01', 'valencia', 'example@example.com', 'www.example.com', NULL),
(13, 'jesus', '123', 'yankees', 'nyy', '2017-10-01', 'new york', 'example@example.com', 'www.example.com', NULL),
(14, 'barry', '123', 'boston', 'bos', '2017-10-01', 'boston', 'example@example.com', 'www.example.com', NULL),
(15, 'chico', '123', 'chicago', 'chi', '2017-10-01', 'usa', 'example@example.com', 'www.example.com', NULL),
(16, 'bad bunny', '123', 'puerto rico', 'pr', '2017-10-01', 'puerto rico', 'example@example.com', 'www.example.com', NULL),
(17, 'carlos', '123', 'emelec', 'eme', '2017-10-01', 'ecuador', 'example@example.com', 'www.example.com', NULL),
(18, 'nautica', '123', 'nauticos', 'nau', '2017-10-01', 'el mar d plata en argentina su', 'example@example.com', 'www.example.com', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users_pass`
--
ALTER TABLE `users_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Base de datos: `prueba`
