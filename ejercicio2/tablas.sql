--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ROLID` int(1) NOT NULL,
  `DESCRIPCION` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ROLID`, `DESCRIPCION`) VALUES
(3, 'Director'),
(1, 'Alumno'),
(2, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EDAD` int(2) NOT NULL,
  `SEXO` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `ROLID` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `EDAD`, `SEXO`, `ROLID`) VALUES
(1, 'Jorge', 26, 'H', 1),
(2, 'Martin', 33, 'H', 2),
(3, 'Eduardo', 36, 'H', 3),
(4, 'Marcela', 23, 'M', 2),
(5, 'Analia', 22, 'M', 2),
(6, 'Laura', 45, 'M', 3),
(7, 'Adrian', 25, 'H', 2),
(8, 'Liliana', 34, 'M', 1),
(9, 'Horacio', 38, 'H', 2),
(10, 'Pablo', 26, 'H', 1),
(11, 'Mariana', 26, 'M', 0),
(12, 'Susana', 45, 'M', 2),
(13, 'Felipe', 27, 'H', 2),
(14, 'Gabriel', 25, 'H', 3),
(15, 'Ernesto', 22, 'H', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);