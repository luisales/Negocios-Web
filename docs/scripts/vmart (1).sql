-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2019 a las 23:14:07
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
(2, 'Pizza', '2020', 'COM', 'http://www.happyfoodstube.com/wp-content/uploads/2016/02/Calzone-Pizza-Slices-e1459845640761.jpg', 'Pizza individual'),
(3, 'Calzon', '2500', 'COM', '2', ''),
(4, 'pizza2', '2', 'IND', '', ''),
(5, 'luis', '20', 'CMB', '', 'sd');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `codFactura` int(20) NOT NULL,
  `codCliente` bigint(20) NOT NULL,
  `fecFactura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('combo', 'combo', 'ACT', 'PRG'),
('combomenu', 'combomenu', 'ACT', 'PRG'),
('combos', 'combos', 'ACT', 'PRG'),
('complementos', 'complementos', 'ACT', 'PRG'),
('dashboard', 'Menu Principal de Administración', 'ACT', 'PGR'),
('pais', 'pais', 'ACT', 'PRG'),
('paises', 'paises', 'ACT', 'PRG'),
('pollos', 'pollos', 'ACT', 'PRG'),
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
  ADD UNIQUE KEY `codFactura` (`codFactura`),
  ADD KEY `codCombo` (`codCombo`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`codFactura`),
  ADD KEY `codCliente` (`codCliente`) USING BTREE;

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
  MODIFY `codCombo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `detFactura` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `codFactura` int(20) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD CONSTRAINT `rol_usuario_key` FOREIGN KEY (`rolescod`) REFERENCES `roles` (`rolescod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_rol_key` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
