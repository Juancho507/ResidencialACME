-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2025 a las 05:39:54
-- Versión del servidor: 9.2.0
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `residencialacme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `Nombre`, `Apellido`, `Correo`, `Clave`) VALUES
(1014738649, 'Dana Sofia', 'Macias Rojas', 'danamacias@gmail.com', '202cb962ac59075b964b07152d234b70'),
(1032798548, 'Juan David', 'Ortiz Gordillo', 'juanortiz@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamento`
--

CREATE TABLE `apartamento` (
  `idApartamento` int NOT NULL,
  `NombreTorre` varchar(45) NOT NULL,
  `Numero` varchar(45) NOT NULL,
  `Propietario_idPropietario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `apartamento`
--

INSERT INTO `apartamento` (`idApartamento`, `NombreTorre`, `Numero`, `Propietario_idPropietario`) VALUES
(1, 'Zanahoria', '101', 101),
(2, 'Zanahoria', '102', 101),
(3, 'Acme', '201', 102),
(4, 'Tasmania', '301', 103),
(5, 'Tasmania', '302', 103),
(6, 'Marciana', '401', 104),
(7, 'Velocidad', '501', 105),
(8, 'Gallinero', '601', 106),
(9, 'Gallinero', '602', 106),
(10, 'Gallinero', '603', 106),
(11, 'Zanahoria', '103', 107),
(12, 'Acme', '202', 108),
(13, 'Acme', '203', 108),
(14, 'Tasmania', '303', 109),
(15, 'Marciana', '402', 110),
(16, 'Marciana', '403', 110),
(17, 'Velocidad', '502', 111),
(18, 'Gallinero', '604', 112),
(19, 'Gallinero', '605', 112),
(20, 'Gallinero', '606', 112),
(21, 'Zanahoria', '104', 113),
(22, 'Acme', '204', 114),
(23, 'Tasmania', '304', 115),
(24, 'Tasmania', '305', 115),
(25, 'Marciana', '404', 107),
(26, 'Velocidad', '503', 109),
(27, 'Zanahoria', '105', 111),
(28, 'Acme', '205', 113);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentacobro`
--

CREATE TABLE `cuentacobro` (
  `idCuentaCobro` int NOT NULL,
  `FechaExpedicion` date NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `InteresMora` decimal(10,6) NOT NULL DEFAULT '0.000000',
  `Apartamento_idApartamento` int NOT NULL,
  `EstadoCuentaCobro_idEstadoCuentaCobros` int NOT NULL,
  `Administrador_idAdministrador` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `cuentacobro`
--

INSERT INTO `cuentacobro` (`idCuentaCobro`, `FechaExpedicion`, `FechaVencimiento`, `Valor`, `InteresMora`, `Apartamento_idApartamento`, `EstadoCuentaCobro_idEstadoCuentaCobros`, `Administrador_idAdministrador`) VALUES
(1, '2025-05-01', '2025-06-01', 150000.00, 0.000330, 1, 1, 1014738649),
(2, '2025-05-02', '2025-06-02', 150000.00, 0.000330, 2, 2, 1032798548),
(3, '2025-05-03', '2025-06-03', 150000.00, 0.000330, 3, 3, 1014738649),
(4, '2025-05-04', '2025-06-04', 150000.00, 0.000330, 4, 1, 1032798548),
(5, '2025-05-05', '2025-06-05', 150000.00, 0.000330, 5, 2, 1014738649),
(6, '2025-05-06', '2025-06-06', 150000.00, 0.000330, 6, 3, 1032798548),
(7, '2025-05-07', '2025-06-07', 150000.00, 0.000330, 7, 1, 1014738649),
(8, '2025-05-08', '2025-06-08', 150000.00, 0.000330, 8, 2, 1032798548),
(9, '2025-05-09', '2025-06-09', 150000.00, 0.000330, 9, 3, 1014738649),
(10, '2025-05-10', '2025-06-10', 150000.00, 0.000330, 10, 1, 1032798548),
(11, '2025-05-11', '2025-06-11', 150000.00, 0.000330, 11, 2, 1014738649),
(12, '2025-05-12', '2025-06-12', 150000.00, 0.000330, 12, 3, 1032798548),
(13, '2025-05-13', '2025-06-13', 150000.00, 0.000330, 13, 1, 1014738649),
(14, '2025-05-14', '2025-06-14', 150000.00, 0.000330, 14, 2, 1032798548),
(15, '2025-05-15', '2025-06-15', 150000.00, 0.000330, 15, 3, 1014738649),
(16, '2025-05-16', '2025-06-16', 150000.00, 0.000330, 16, 1, 1032798548),
(17, '2025-05-17', '2025-06-17', 150000.00, 0.000330, 17, 2, 1014738649),
(18, '2025-05-18', '2025-06-18', 150000.00, 0.000330, 18, 3, 1032798548),
(19, '2025-05-19', '2025-06-19', 150000.00, 0.000330, 19, 1, 1014738649),
(20, '2025-05-20', '2025-06-20', 150000.00, 0.000330, 20, 2, 1032798548),
(21, '2025-05-21', '2025-06-21', 150000.00, 0.000330, 21, 3, 1014738649),
(22, '2025-05-22', '2025-06-22', 150000.00, 0.000330, 22, 1, 1032798548),
(23, '2025-05-23', '2025-06-23', 150000.00, 0.000330, 23, 2, 1014738649),
(24, '2025-05-24', '2025-06-24', 150000.00, 0.000330, 24, 3, 1032798548),
(25, '2025-05-25', '2025-06-25', 150000.00, 0.000330, 25, 1, 1014738649),
(26, '2025-05-26', '2025-06-26', 150000.00, 0.000330, 26, 2, 1032798548),
(27, '2025-05-27', '2025-06-27', 150000.00, 0.000330, 27, 3, 1014738649),
(28, '2025-05-28', '2025-06-28', 150000.00, 0.000330, 28, 1, 1032798548);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocuentacobro`
--

CREATE TABLE `estadocuentacobro` (
  `idEstadoCuentaCobros` int NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `estadocuentacobro`
--

INSERT INTO `estadocuentacobro` (`idEstadoCuentaCobros`, `Nombre`) VALUES
(1, 'Pagada'),
(2, 'Pago Incompleto'),
(3, 'Vencida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idPago` int NOT NULL,
  `FechaPago` date NOT NULL,
  `ValorPagado` decimal(10,2) NOT NULL,
  `Propietario_idPropietario` int NOT NULL,
  `CuentaCobro_idCuentaCobro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idPago`, `FechaPago`, `ValorPagado`, `Propietario_idPropietario`, `CuentaCobro_idCuentaCobro`) VALUES
(1, '2025-05-01', 150000.00, 101, 1),
(2, '2025-05-02', 80000.00, 102, 2),
(3, '2025-06-03', 0.00, 103, 3),
(4, '2025-05-04', 150000.00, 104, 4),
(5, '2025-05-05', 100000.00, 105, 5),
(6, '2025-06-06', 0.00, 106, 6),
(7, '2025-05-07', 150000.00, 107, 7),
(8, '2025-05-08', 70000.00, 108, 8),
(9, '2025-06-09', 0.00, 109, 9),
(10, '2025-05-10', 150000.00, 110, 10),
(11, '2025-05-11', 120000.00, 111, 11),
(12, '2025-06-12', 0.00, 112, 12),
(13, '2025-05-13', 150000.00, 113, 13),
(14, '2025-05-14', 60000.00, 114, 14),
(15, '2025-06-15', 0.00, 115, 15),
(16, '2025-05-16', 150000.00, 101, 16),
(17, '2025-05-17', 90000.00, 102, 17),
(18, '2025-06-18', 0.00, 103, 18),
(19, '2025-05-19', 150000.00, 104, 19),
(20, '2025-05-20', 75000.00, 105, 20),
(21, '2025-06-21', 0.00, 106, 21),
(22, '2025-05-22', 150000.00, 107, 22),
(23, '2025-05-23', 110000.00, 108, 23),
(24, '2025-06-24', 0.00, 109, 24),
(25, '2025-05-25', 150000.00, 110, 25),
(26, '2025-05-26', 95000.00, 111, 26),
(27, '2025-06-27', 0.00, 112, 27),
(28, '2025-05-28', 150000.00, 113, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `idPropietario` int NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`idPropietario`, `Nombre`, `Apellido`, `Correo`, `Clave`) VALUES
(101, 'Bugs', 'Bunny', 'bugs@looney.com', 'a9ba12e9c6e121bbb4785fcb7b564393'),
(102, 'Lucas', 'Pato', 'lucas@looney.com', 'ea8e2f37f71e2284070036e4aedcd888'),
(103, 'Porky', 'Puerquito', 'porky@looney.com', '0c39d2977d1a019f95342b7862989699'),
(104, 'Elmer', 'Gruñón', 'elmer@looney.com', '065a735f824379983cdfdb6ca333a598'),
(105, 'Piolín', 'González', 'piolin@looney.com', '43bc38e61a687f4037303c3718d31658'),
(106, 'Silvestre', 'Gato', 'silvestre@looney.com', '1aa76019966ffbeb1e88ab769bb5ccab'),
(107, 'Marvin', 'Marciano', 'marvin@looney.com', '443f4324a6464b0413b540588190634b'),
(108, 'Taz', 'Tasmania', 'taz@looney.com', '7318781d2b47727c2370d60ad85112ee'),
(109, 'Lola', 'Bunny', 'lola@looney.com', '3094009e25033993144a42cd9052941e'),
(110, 'Sam', 'Bigotes', 'sam@looney.com', '6e1ed19f6e9afabd5c986a5439e00600'),
(111, 'Foghorn', 'Leghorn', 'foghorn@looney.com', '7232bf29a916f7b21cd95e65d94b5f78'),
(112, 'Speedy', 'Gonzales', 'speedy@looney.com', 'b405569a0370befaadefe95f8a27eab7'),
(113, 'Pepe', 'Le Pew', 'pepe@looney.com', '4f9de204cb0bfd3654bd92b97318ea15'),
(114, 'Correcaminos', 'Velocísimo', 'correcaminos@looney.com', '4d9c5205813bfd9f6cd9c0c04cc0a452'),
(115, 'Coyote', 'Wile', 'coyote@looney.com', '6bdbd99a9f2bf0137ade11d6a5fb7171');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD PRIMARY KEY (`idApartamento`),
  ADD KEY `fk_Apartamento_Propietario1_idx` (`Propietario_idPropietario`);

--
-- Indices de la tabla `cuentacobro`
--
ALTER TABLE `cuentacobro`
  ADD PRIMARY KEY (`idCuentaCobro`),
  ADD KEY `fk_CuentaCobro_EstadoCuentaCobro1_idx` (`EstadoCuentaCobro_idEstadoCuentaCobros`),
  ADD KEY `fk_CuentaCobro_Administrador1_idx` (`Administrador_idAdministrador`),
  ADD KEY `fk_CuentaCobro_Apartamento1_idx` (`Apartamento_idApartamento`);

--
-- Indices de la tabla `estadocuentacobro`
--
ALTER TABLE `estadocuentacobro`
  ADD PRIMARY KEY (`idEstadoCuentaCobros`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `fk_Pago_Propietario1_idx` (`Propietario_idPropietario`),
  ADD KEY `fk_Pago_CuentaCobro1_idx` (`CuentaCobro_idCuentaCobro`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`idPropietario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apartamento`
--
ALTER TABLE `apartamento`
  MODIFY `idApartamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `cuentacobro`
--
ALTER TABLE `cuentacobro`
  MODIFY `idCuentaCobro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `estadocuentacobro`
--
ALTER TABLE `estadocuentacobro`
  MODIFY `idEstadoCuentaCobros` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD CONSTRAINT `fk_Apartamento_Propietario1` FOREIGN KEY (`Propietario_idPropietario`) REFERENCES `propietario` (`idPropietario`);

--
-- Filtros para la tabla `cuentacobro`
--
ALTER TABLE `cuentacobro`
  ADD CONSTRAINT `fk_CuentaCobro_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`),
  ADD CONSTRAINT `fk_CuentaCobro_Apartamento1` FOREIGN KEY (`Apartamento_idApartamento`) REFERENCES `apartamento` (`idApartamento`),
  ADD CONSTRAINT `fk_CuentaCobro_EstadoCuentaCobro1` FOREIGN KEY (`EstadoCuentaCobro_idEstadoCuentaCobros`) REFERENCES `estadocuentacobro` (`idEstadoCuentaCobros`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_Pago_CuentaCobro1` FOREIGN KEY (`CuentaCobro_idCuentaCobro`) REFERENCES `cuentacobro` (`idCuentaCobro`),
  ADD CONSTRAINT `fk_Pago_Propietario1` FOREIGN KEY (`Propietario_idPropietario`) REFERENCES `propietario` (`idPropietario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
