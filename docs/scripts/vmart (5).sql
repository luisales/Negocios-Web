-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2019 a las 01:21:13
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vmart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `bitacoracod` int(11) NOT NULL,
  `bitacorafch` datetime DEFAULT NULL,
  `bitprograma` varchar(15) DEFAULT NULL,
  `bitdescripcion` varchar(255) DEFAULT NULL,
  `bitobservacion` mediumtext,
  `bitTipo` char(3) DEFAULT NULL,
  `bitusuario` bigint(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`bitacoracod`, `bitacorafch`, `bitprograma`, `bitdescripcion`, `bitobservacion`, `bitTipo`, `bitusuario`) VALUES
(1, '2019-04-06 03:26:35', 'SEC001', 'Update User', '{\"mode\":\"UPD\",\"modeDesc\":\"\",\"tocken\":\"b4bc19e9e2a21865bf53cbae18c94881\",\"errores\":[],\"haserrores\":false,\"readonly\":false,\"isinsert\":false,\"isRolEdit\":false,\"tipoUsuarios\":[{\"codigo\":\"ADM\",\"valor\":\"Administrador\"},{\"codigo\":\"USR\",\"valor\":\"Usuario\"},{\"codigo\":\"CNS\",\"valor\":\"Consultor\"},{\"codigo\":\"CLT\",\"valor\":\"Cliente\"}],\"estadoUsuarios\":[{\"codigo\":\"PND\",\"valor\":\"Sin Activar\"},{\"codigo\":\"ACT\",\"valor\":\"Activo\"},{\"codigo\":\"SPD\",\"valor\":\"Suspendido\"},{\"codigo\":\"INA\",\"valor\":\"Inactivo\"}],\"usrcod\":1,\"useremail\":\"admin@demo.com\",\"username\":\"Administrador\",\"usertipo\":\"ADM\",\"userest\":\"ACT\",\"userpswd\":\"CorpDemo%3\"}', 'INF', 1),
(2, '2019-04-06 03:27:03', 'SEC001', 'Insert User', '{\"mode\":\"INS\",\"modeDesc\":\"\",\"tocken\":\"06c94682de9d8bd72e26690d0faade07\",\"errores\":[],\"haserrores\":false,\"readonly\":false,\"isinsert\":true,\"isRolEdit\":false,\"tipoUsuarios\":[{\"codigo\":\"ADM\",\"valor\":\"Administrador\"},{\"codigo\":\"USR\",\"valor\":\"Usuario\"},{\"codigo\":\"CNS\",\"valor\":\"Consultor\"},{\"codigo\":\"CLT\",\"valor\":\"Cliente\"}],\"estadoUsuarios\":[{\"codigo\":\"PND\",\"valor\":\"Sin Activar\"},{\"codigo\":\"ACT\",\"valor\":\"Activo\"},{\"codigo\":\"SPD\",\"valor\":\"Suspendido\"},{\"codigo\":\"INA\",\"valor\":\"Inactivo\"}],\"usrcod\":0,\"useremail\":\"luis@demo.com\",\"username\":\"Luis\",\"usertipo\":\"ADM\",\"userest\":\"PND\",\"userpswd\":\"Luis123%\"}', 'INF', 1),
(3, '2019-04-08 06:13:03', 'SEC001', 'Insert User', '{\"mode\":\"INS\",\"modeDesc\":\"\",\"tocken\":\"fcd7cee7801c48aca461409ec683a755\",\"errores\":[],\"haserrores\":false,\"readonly\":false,\"isinsert\":true,\"isRolEdit\":false,\"tipoUsuarios\":[{\"codigo\":\"ADM\",\"valor\":\"Administrador\"},{\"codigo\":\"USR\",\"valor\":\"Usuario\"},{\"codigo\":\"CNS\",\"valor\":\"Consultor\"},{\"codigo\":\"CLT\",\"valor\":\"Cliente\"}],\"estadoUsuarios\":[{\"codigo\":\"PND\",\"valor\":\"Sin Activar\"},{\"codigo\":\"ACT\",\"valor\":\"Activo\"},{\"codigo\":\"SPD\",\"valor\":\"Suspendido\"},{\"codigo\":\"INA\",\"valor\":\"Inactivo\"}],\"usrcod\":0,\"useremail\":\"carlos@demo.com\",\"username\":\"Carlos\",\"usertipo\":\"USR\",\"userest\":\"ACT\",\"userpswd\":\"Carlos123%\"}', 'INF', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `codCombo` int(20) NOT NULL,
  `desCombo` longtext NOT NULL,
  `preCombo` decimal(20,0) NOT NULL,
  `catCombo` text NOT NULL,
  `urlCombo` text NOT NULL,
  `comCombo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `combos`
--

INSERT INTO `combos` (`codCombo`, `desCombo`, `preCombo`, `catCombo`, `urlCombo`, `comCombo`) VALUES
(2, 'Pollo Entero', '2020', 'IND', 'http://www.happyfoodstube.com/wp-content/uploads/2016/02/Calzone-Pizza-Slices-e1459845640761.jpg', 'Un pollo entero para disfrutar con tu familia'),
(3, 'Pollo y Arroz', '120', 'CMB', 'https://i.ytimg.com/vi/yprneRFOIKM/maxresdefault.jpg', 'Medio pollo y una orden de arroz'),
(4, '1/4 de pollo', '60', 'IND', 'https://pollosyparrilladascaporal.com/wp-content/uploads/2017/11/cuartopollo-compressor.png', 'Un cuarto de pollo'),
(5, 'Combo de papas y pollo', '2500', 'CMB', 'http://www.polloscarioca.com/images/seleccion-interno/combo3.jpg', 'Medio pollo y una orden de papas '),
(6, 'Medio Pollo', '70', 'IND', 'https://media-cdn.tripadvisor.com/media/photo-s/0a/7b/86/6e/medio-pollo.jpg', 'Rica orden de medio pollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `codFactura` int(20) NOT NULL,
  `detFactura` int(20) NOT NULL,
  `codCombo` int(20) NOT NULL,
  `cantidad` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`codFactura`, `detFactura`, `codCombo`, `cantidad`) VALUES
(8, 1, 2, 1),
(9, 2, 3, 1),
(10, 4, 4, 1),
(11, 6, 5, 1),
(12, 19, 2, 1),
(13, 21, 5, 1),
(14, 23, 2, 1),
(15, 25, 5, 1),
(16, 27, 2, 1),
(6, 29, 3, 2),
(2, 30, 5, 3),
(1, 32, 5, 3),
(17, 33, 2, 1),
(17, 34, 5, 1),
(18, 35, 2, 1),
(18, 36, 3, 1),
(19, 37, 5, 1),
(20, 38, 5, 1),
(21, 39, 5, 1),
(22, 40, 2, 1),
(23, 41, 5, 1),
(24, 42, 5, 1),
(25, 43, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `codFactura` int(20) NOT NULL,
  `fecFactura` date NOT NULL,
  `estFactura` text NOT NULL,
  `horFactura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`codFactura`, `fecFactura`, `estFactura`, `horFactura`) VALUES
(1, '2019-04-10', 'ACT', ''),
(2, '2019-04-10', 'INC', ''),
(3, '2019-04-10', 'INC', ''),
(4, '2019-04-10', 'INC', ''),
(5, '2019-04-10', 'INC', ''),
(6, '2019-04-16', 'ACT', '12:30'),
(7, '0000-00-00', 'INC', '12:32'),
(8, '0000-00-00', 'ACT', '12:38'),
(9, '0000-00-00', 'ACT', '12:38'),
(10, '0000-00-00', 'ACT', '12:41'),
(11, '0000-00-00', 'ACT', '12:42'),
(12, '0000-00-00', 'ACT', '12:43'),
(13, '0000-00-00', 'ACT', '12:45'),
(14, '0000-00-00', 'INC', '12:45'),
(15, '0000-00-00', 'ACT', '12:45'),
(16, '2019-04-10', 'ACT', '12:46'),
(17, '2019-04-10', 'ACT', '12:50'),
(18, '2019-04-10', 'ACT', '12:59'),
(19, '2019-04-10', 'ACT', '03:02'),
(20, '2019-04-10', 'ACT', '03:02'),
(21, '2019-04-10', 'ACT', '03:02'),
(22, '2019-04-10', 'ACT', '03:04'),
(23, '2019-04-10', 'ACT', '03:05'),
(24, '2019-04-10', 'ACT', '03:05'),
(25, '2019-04-10', 'ACT', '03:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `fncod` varchar(15) NOT NULL,
  `fndsc` varchar(45) DEFAULT NULL,
  `fnest` char(3) DEFAULT NULL,
  `fntyp` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`fncod`, `fndsc`, `fnest`, `fntyp`) VALUES
('admin', 'admin', 'ACT', 'PRG'),
('combo', 'combo', 'ACT', 'PRG'),
('combomenu', 'combomenu', 'ACT', 'PRG'),
('combos', 'combos', 'ACT', 'PRG'),
('complementos', 'complementos', 'ACT', 'PRG'),
('dashboard', 'Menu Principal de Administración', 'ACT', 'PGR'),
('factura', 'factura', 'ACT', 'PRG'),
('facturas', 'facturas', 'ACT', 'PRG'),
('intermedio', 'intermedio', 'ACT', 'PRG'),
('intermedios', 'intermedios', 'ACT', 'PRG'),
('inventario', 'inventario', 'ACT', 'PRG'),
('inventarios', 'inventarios', 'ACT', 'PRG'),
('invermedios', 'invermedios', 'ACT', 'PRG'),
('pais', 'pais', 'ACT', 'PRG'),
('paises', 'paises', 'ACT', 'PRG'),
('pollos', 'pollos', 'ACT', 'PRG'),
('producto', 'producto', 'ACT', 'PRG'),
('productos', 'productos', 'ACT', 'PRG'),
('programa', 'Función', 'ACT', 'PGR'),
('programas', 'Trabajar con Funciones', 'ACT', 'PGR'),
('rol', 'Rol', 'ACT', 'PGR'),
('roles', 'Trabajar con Roles', 'ACT', 'PGR'),
('user', 'Usuario', 'ACT', 'PGR'),
('users', 'Trabajar con Usuarios', 'ACT', 'PGR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones_roles`
--

CREATE TABLE `funciones_roles` (
  `rolescod` varchar(15) NOT NULL,
  `fncod` varchar(15) NOT NULL,
  `fnrolest` char(3) DEFAULT NULL,
  `fnexp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intermedia`
--

CREATE TABLE `intermedia` (
  `codInventario` int(11) NOT NULL,
  `codCombo` int(11) NOT NULL,
  `canIntermedia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `intermedia`
--

INSERT INTO `intermedia` (`codInventario`, `codCombo`, `canIntermedia`) VALUES
(3, 3, 2),
(2, 2, 1),
(2, 5, 1),
(1, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `codInventario` int(11) NOT NULL,
  `nomInventario` text NOT NULL,
  `canInventario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`codInventario`, `nomInventario`, `canInventario`) VALUES
(1, 'Papas', 194),
(2, 'Pollos', 797.5),
(3, 'Arroz', 136);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rolescod` varchar(15) NOT NULL,
  `rolesdsc` varchar(45) DEFAULT NULL,
  `rolesest` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuarios`
--

CREATE TABLE `roles_usuarios` (
  `usercod` bigint(10) NOT NULL,
  `rolescod` varchar(15) NOT NULL,
  `roleuserest` char(3) DEFAULT NULL,
  `roleuserfch` datetime DEFAULT NULL,
  `roleuserexp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usercod` bigint(10) NOT NULL,
  `useremail` varchar(80) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `userpswd` varchar(128) DEFAULT NULL,
  `userfching` datetime DEFAULT NULL,
  `userpswdest` char(3) DEFAULT NULL,
  `userpswdexp` datetime DEFAULT NULL,
  `userest` char(3) DEFAULT NULL,
  `useractcod` varchar(128) DEFAULT NULL,
  `userpswdchg` varchar(128) DEFAULT NULL,
  `usertipo` char(3) DEFAULT NULL COMMENT 'Tipo de Usuario, Normal, Consultor o Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usercod`, `useremail`, `username`, `userpswd`, `userfching`, `userpswdest`, `userpswdexp`, `userest`, `useractcod`, `userpswdchg`, `usertipo`) VALUES
(1, 'admin@demo.com', 'Administrador', 'effa99e3276eac377de710f6f6013858', '2019-03-29 13:52:45', 'VGT', NULL, 'ACT', '', NULL, 'ADM'),
(2, 'luis@demo.com', 'Luis', '82cea392c4e1202b96984de406d25102', '2019-04-06 15:27:03', 'VGT', NULL, 'PND', '', NULL, 'ADM'),
(3, 'carlos@demo.com', 'Carlos', '7a5b07820f0a46650282642a4bb252a4', '2019-04-08 06:13:03', 'VGT', NULL, 'ACT', '', NULL, 'USR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`bitacoracod`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`codCombo`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`detFactura`),
  ADD KEY `codCombo` (`codCombo`),
  ADD KEY `codFactura` (`codFactura`) USING BTREE;

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`codFactura`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`fncod`);

--
-- Indices de la tabla `funciones_roles`
--
ALTER TABLE `funciones_roles`
  ADD PRIMARY KEY (`rolescod`,`fncod`),
  ADD KEY `rol_funcion_key_idx` (`fncod`);

--
-- Indices de la tabla `intermedia`
--
ALTER TABLE `intermedia`
  ADD KEY `codInventario` (`codInventario`),
  ADD KEY `codCombo` (`codCombo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`codInventario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolescod`);

--
-- Indices de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD PRIMARY KEY (`usercod`,`rolescod`),
  ADD KEY `rol_usuario_key_idx` (`rolescod`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usercod`),
  ADD UNIQUE KEY `useremail_UNIQUE` (`useremail`),
  ADD KEY `usertipo` (`usertipo`,`useremail`,`usercod`,`userest`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `bitacoracod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `codCombo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `detFactura` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `codFactura` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `codInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usercod` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`codFactura`) REFERENCES `factura` (`codFactura`),
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`codCombo`) REFERENCES `combos` (`codCombo`);

--
-- Filtros para la tabla `funciones_roles`
--
ALTER TABLE `funciones_roles`
  ADD CONSTRAINT `funcion_rol_key` FOREIGN KEY (`rolescod`) REFERENCES `roles` (`rolescod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rol_funcion_key` FOREIGN KEY (`fncod`) REFERENCES `funciones` (`fncod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `intermedia`
--
ALTER TABLE `intermedia`
  ADD CONSTRAINT `intermedia_ibfk_1` FOREIGN KEY (`codCombo`) REFERENCES `combos` (`codCombo`),
  ADD CONSTRAINT `intermedia_ibfk_2` FOREIGN KEY (`codInventario`) REFERENCES `inventario` (`codInventario`);

--
-- Filtros para la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD CONSTRAINT `rol_usuario_key` FOREIGN KEY (`rolescod`) REFERENCES `roles` (`rolescod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_rol_key` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
