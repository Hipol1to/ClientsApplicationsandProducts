-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2024 at 10:39 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cap_storage`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Cedula` varchar(20) DEFAULT NULL,
  `FechaConexion` date DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `FechaSalida` date DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`IdUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Cedula` varchar(20) DEFAULT NULL,
  `RNC` varchar(20) DEFAULT NULL,
  `MontoSolicitado` decimal(10,2) DEFAULT NULL,
  `Interes` decimal(5,2) DEFAULT NULL,
  `MontoDeuda` decimal(10,2) DEFAULT NULL,
  `Reenganchado` tinyint(1) DEFAULT NULL,
  `Puntos` int(11) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `FechaSalida` date DEFAULT NULL,
  `MesesEnEmpresa` int(11) DEFAULT NULL,
  `TotalPrestado` decimal(10,2) DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`IdUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`Id`, `IdUsuario`, `Nombre`, `Apellido`, `Direccion`, `Cedula`, `RNC`, `MontoSolicitado`, `Interes`, `MontoDeuda`, `Reenganchado`, `Puntos`, `FechaIngreso`, `FechaSalida`, `MesesEnEmpresa`, `TotalPrestado`, `FechaCreacion`, `FechaModificacion`) VALUES
(7, 2, 'Jane', 'Smithh', '456 Elm St', '0987654321', 'XYZ456', '7000.00', '8.00', '2000.00', 1, 150, '2022-12-15', NULL, 12, '9000.00', '2024-02-16 00:25:41', '2024-02-16 00:28:41'),
(5, NULL, 'yo mimo', 'po quien ma', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '40229604604', '430262617', '23455.00', '10.00', '435353.00', 0, 13, '2023-01-01', NULL, 43, '355532.00', '2024-02-16 00:18:13', '2024-02-16 00:18:13'),
(4, NULL, 'Hipolito', 'Peña', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '40229604604', '130424555', '23455.00', '10.00', '435353.00', 0, 13, '2023-01-01', '2023-01-01', 23, '44555.00', '2024-02-13 00:56:28', '2024-02-13 00:56:28'),
(10, 2, 'Jane', 'Smith', '456 Elm St', '0987654321', 'XYZ456', '7000.00', '8.00', '2000.00', 1, 150, '2022-12-15', NULL, 12, '9000.00', '2024-02-16 00:28:20', '2024-02-16 00:28:20'),
(11, 3, 'Alice', 'Johnson', '789 Oak St', '5432167890', 'DEF789', '10000.00', '12.00', '500.00', 0, 75, '2023-03-20', '2024-01-15', 10, '10500.00', '2024-02-16 00:28:20', '2024-02-16 00:28:20'),
(12, NULL, 'Hipolito', 'Peña', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '345234566', '', '0.00', '0.00', '0.00', 0, 0, '2023-01-01', NULL, 2, '13.00', '2024-03-05 18:22:28', '2024-03-05 18:22:28'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-14 06:53:31', '2024-03-14 06:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `finanzas`
--

DROP TABLE IF EXISTS `finanzas`;
CREATE TABLE IF NOT EXISTS `finanzas` (
  `dineroencaja` decimal(10,2) DEFAULT NULL,
  `dineroinvertido` decimal(10,2) DEFAULT NULL,
  `dineroenprestamos` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finanzas`
--

INSERT INTO `finanzas` (`dineroencaja`, `dineroinvertido`, `dineroenprestamos`) VALUES
('9763.25', '1287.03', '3137.25');

-- --------------------------------------------------------

--
-- Table structure for table `inversiones`
--

DROP TABLE IF EXISTS `inversiones`;
CREATE TABLE IF NOT EXISTS `inversiones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `TipoDeInversion` varchar(255) DEFAULT NULL,
  `MontoDividendoEsperado` varchar(255) DEFAULT NULL,
  `PeriodicidadDividendo` varchar(255) DEFAULT NULL,
  `FechaPagoDividendo` timestamp NULL DEFAULT NULL,
  `MontoBono` varchar(255) DEFAULT NULL,
  `TasaInteresBono` varchar(255) DEFAULT NULL,
  `PlazoBono` varchar(255) DEFAULT NULL,
  `PeriodicidadInteres` varchar(255) DEFAULT NULL,
  `FechaPagoInteres` timestamp NULL DEFAULT NULL,
  `MontoFondoInversion` varchar(255) DEFAULT NULL,
  `TarifaAdministracion` varchar(255) DEFAULT NULL,
  `PeriodicidadTarifaAdm` varchar(255) DEFAULT NULL,
  `CantParticipacion` varchar(255) DEFAULT NULL,
  `ParticipacionId` int(11) DEFAULT NULL,
  `RendimientoTotal` decimal(10,2) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `PagoId` int(11) DEFAULT NULL,
  `FechaPagoInicialInversion` timestamp NULL DEFAULT NULL,
  `FechaFinalInversion` timestamp NULL DEFAULT NULL,
  `FechaDeAprobacion` timestamp NULL DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `PagoId` (`PagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inversiones`
--

INSERT INTO `inversiones` (`Id`, `IdCliente`, `Motivo`, `TipoDeInversion`, `MontoDividendoEsperado`, `PeriodicidadDividendo`, `FechaPagoDividendo`, `MontoBono`, `TasaInteresBono`, `PlazoBono`, `PeriodicidadInteres`, `FechaPagoInteres`, `MontoFondoInversion`, `TarifaAdministracion`, `PeriodicidadTarifaAdm`, `CantParticipacion`, `ParticipacionId`, `RendimientoTotal`, `Status`, `PagoId`, `FechaPagoInicialInversion`, `FechaFinalInversion`, `FechaDeAprobacion`, `FechaCreacion`, `FechaModificacion`) VALUES
(4, 1, 'Inversión en acciones', 'Por acciones', '100.00', 'Trimestral', '2024-03-15 04:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Activa', NULL, NULL, NULL, '2024-03-12 18:23:46', '2024-03-12 18:23:46', '2024-03-14 01:44:24'),
(5, 2, 'Inversión en bonos', 'Por bonos', NULL, NULL, NULL, '10000.00', '5%', '1 año', 'Mensual', '2024-04-01 04:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'Activa', 31, NULL, NULL, '2024-03-12 18:23:47', '2024-03-12 18:23:47', '2024-03-19 02:40:46'),
(6, 11, 'Inversión en fondos de inversión', 'Fondos de inversión', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20000.00', '2%', 'Trimestral', '1000', 5, '250.00', 'Activa', 29, NULL, NULL, '2024-03-12 18:23:47', '2024-03-12 18:23:47', '2024-03-19 00:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) DEFAULT NULL,
  `CuentaRemitente` varchar(255) DEFAULT NULL,
  `TipoCuentaRemitente` varchar(255) DEFAULT NULL,
  `EntidadBancariaRemitente` varchar(255) DEFAULT NULL,
  `CuentaDestinatario` varchar(255) DEFAULT NULL,
  `TipoCuentaDestinatario` varchar(255) DEFAULT NULL,
  `EntidadBancariaDestinatario` varchar(255) DEFAULT NULL,
  `Monto` decimal(10,2) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `InversionId` int(11) DEFAULT NULL,
  `PrestamoId` int(11) DEFAULT NULL,
  `ParticipacionId` int(11) DEFAULT NULL,
  `FechaDePago` datetime DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`Id`, `IdCliente`, `CuentaRemitente`, `TipoCuentaRemitente`, `EntidadBancariaRemitente`, `CuentaDestinatario`, `TipoCuentaDestinatario`, `EntidadBancariaDestinatario`, `Monto`, `Motivo`, `Tipo`, `InversionId`, `PrestamoId`, `ParticipacionId`, `FechaDePago`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, 1, 'Cuentaa1', '', 'Banco1', 'CuentaDest1', '', 'BancoDest1', '1000.00', 'Pago mensual', 'Transferencia', NULL, NULL, NULL, '2023-12-15 08:30:00', '2024-01-18 04:48:27', '2024-03-02 23:05:50'),
(2, 2, 'Cuenta2', NULL, 'Banco2', 'CuentaDest2', NULL, 'BancoDest2', '1500.50', 'Pago de deuda', 'Depósito', NULL, NULL, NULL, '2023-12-20 10:45:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27'),
(3, 3, 'Cuenta3', NULL, 'Banco3', 'CuentaDest3', NULL, 'BancoDest3', '800.75', 'Pago parcial', 'Cheque', NULL, 5, NULL, '2023-12-25 12:15:00', '2024-01-18 04:48:27', '2024-02-08 21:55:46'),
(5, 2, 'Cuenta3', NULL, 'Banco3', 'CuentaDest3', NULL, 'BancoDest3', '800.75', 'Pago parcial', 'Cheque', NULL, 5, NULL, '2023-12-25 12:15:00', '2024-01-22 12:15:48', '2024-03-19 03:40:48'),
(6, 1, 'Cuenta1', NULL, 'Banco1', 'CuentaDest1', NULL, 'BancoDest1', '1400.00', 'Pago adicional', 'Transferencia', NULL, 8, NULL, '2023-12-28 09:00:00', '2024-01-22 12:56:30', '2024-03-19 03:41:00'),
(7, 2, 'Cuenta2', NULL, 'Banco2', 'CuentaDest2', NULL, 'BancoDest2', '1800.75', 'Pago extra', 'Depósito', NULL, NULL, NULL, '2023-12-30 14:30:00', '2024-01-22 12:56:30', '2024-01-22 12:56:30'),
(26, 1, 'Cuenta1', NULL, 'Banco1', 'CuentaDest1', NULL, 'BancoDest1', '1000.00', 'Pago mensual', 'Transferencia', 2, NULL, NULL, '2023-12-15 08:30:00', '2024-01-28 19:41:34', '2024-02-08 21:58:43'),
(27, 7, '999777477', 'Cuenta de ahorros', 'Banco Popular Dominicano', '94999555', 'Cuenta de ahorros', 'Banco Vimenca', '99.99', 'Compra de acciones', 'Transferencia bancaria', 6, NULL, 4, '2024-03-26 00:00:00', '2024-03-18 03:35:28', '2024-03-18 03:35:28'),
(28, 7, '2344', 'Cuenta corriente', 'Bandex', '232443', 'Cuenta de ahorros', 'Citibank', '46.76', 'Compra de acciones', 'Transferencia bancaria', 6, NULL, 5, '2024-03-25 00:00:00', '2024-03-18 03:56:01', '2024-03-18 03:56:01'),
(29, 7, '2344', 'Cuenta de ahorros', 'Banco Popular Dominicano', '2324434', 'Cuenta de ahorros', 'Banco López de Haro', '46.76', 'Compra de acciones', 'Transferencia bancaria', 6, NULL, 1, '2024-03-27 00:00:00', '2024-03-19 00:44:03', '2024-03-19 00:44:03'),
(30, 7, '234', 'Cuenta corriente', 'Banreservas', '232443', 'Cuenta corriente', 'Banco Vimenca', '46.76', 'Compra de acciones', 'Transferencia bancaria', 5, NULL, NULL, '2024-04-23 00:00:00', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(31, 7, '234', 'Cuenta corriente', 'Banreservas', '232443', 'Cuenta corriente', 'Banco Vimenca', '46.76', 'Compra de acciones', 'Transferencia bancaria', 5, NULL, NULL, '2024-04-23 00:00:00', '2024-03-19 02:40:46', '2024-03-19 02:40:46'),
(32, 7, '234', 'Cuenta de ahorros', 'Banreservas', '232443', 'Cuenta de ahorros', 'Citibank', '35.76', 'Compra de acciones', '', NULL, NULL, NULL, '2024-03-29 00:00:00', '2024-03-19 04:16:02', '2024-03-19 04:16:02'),
(33, 7, '234', 'Cuenta de ahorros', 'Banreservas', '232443', 'Cuenta de ahorros', 'Citibank', '35.76', 'Compra de acciones', '', NULL, NULL, NULL, '2024-03-29 00:00:00', '2024-03-19 04:17:26', '2024-03-19 04:17:26'),
(34, 7, '2344', 'Cuenta de ahorros', 'Banco BHD', '2324434', 'Cuenta de ahorros', 'Bandex', '99.99', 'Compra de acciones', 'Transferencia bancaria', NULL, NULL, NULL, '2024-03-29 00:00:00', '2024-03-19 04:20:09', '2024-03-19 04:20:09'),
(35, 7, '2344', 'Cuenta de ahorros', 'Banco BHD', '232443', 'Cuenta de ahorros', 'Citibank', '35.76', 'Compra de acciones', 'Transferencia bancaria', NULL, 4, NULL, '2024-03-30 00:00:00', '2024-03-19 04:26:42', '2024-03-19 04:26:42'),
(36, 7, '999777477', 'Cuenta de ahorros', 'Banco Cofaci', '232443', 'Cuenta corriente', 'Banco Activo', '99.99', 'Compra de acciones', 'Transferencia bancaria', NULL, 4, NULL, '2024-07-18 00:00:00', '2024-03-19 04:27:14', '2024-03-19 04:27:14');

--
-- Triggers `pagos`
--
DROP TRIGGER IF EXISTS `looking_for_inversiones_after_delete_on_pagos`;
DELIMITER $$
CREATE TRIGGER `looking_for_inversiones_after_delete_on_pagos` AFTER DELETE ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(Monto), 0)
    FROM pagos
    WHERE InversionId IS NOT NULL
  );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `looking_for_inversiones_after_insert_on_pagos`;
DELIMITER $$
CREATE TRIGGER `looking_for_inversiones_after_insert_on_pagos` AFTER INSERT ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(Monto), 0)
    FROM pagos
    WHERE InversionId IS NOT NULL
  );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `looking_for_inversiones_after_update_on_pagos`;
DELIMITER $$
CREATE TRIGGER `looking_for_inversiones_after_update_on_pagos` AFTER UPDATE ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  SET @ViejoDineroInvertido = (SELECT dineroinvertido FROM finanzas);
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(Monto), 0)
    FROM pagos
    WHERE InversionId IS NOT NULL
  );
  SET @NuevoDineroInvertido = (SELECT dineroinvertido FROM finanzas);

  IF @ViejoDineroInvertido < @NuevoDineroInvertido THEN
    -- Calculate the difference between the old and new values
   SET @diff = @ViejoDineroInvertido - @NuevoDineroInvertido;
  SET @numero = (SELECT dineroencaja FROM finanzas);
  SET @resta =  @diff + @numero;
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
  
  IF @ViejoDineroInvertido > @NuevoDineroInvertido THEN
    -- Calculate the difference between the old and new values
    SET @diff = (SELECT ABS(@NuevoDineroInvertido)) - (SELECT ABS(@ViejoDineroInvertido));
    SET @numero = (SELECT dineroencaja FROM finanzas);
    SET @resta = @numero + (SELECT ABS(@diff));
  
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `looking_for_prestamos_after_delete_on_pagos`;
DELIMITER $$
CREATE TRIGGER `looking_for_prestamos_after_delete_on_pagos` AFTER DELETE ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroenprestamos" in "finanzas" with the new sum of "Monto" from "pagos"
SET @ViejoDineroEnPrestamos = (SELECT dineroenprestamos FROM finanzas);
  UPDATE finanzas
  SET dineroenprestamos = (
    SELECT COALESCE(SUM(Monto), 0)
    FROM pagos
    WHERE PrestamoId IS NOT NULL
  );
  SET @NuevoDineroEnPrestamos = (SELECT dineroenprestamos FROM finanzas);
  
  IF @ViejoDineroEnPrestamos < @NuevoDineroEnPrestamos THEN
    -- Calculate the difference between the old and new values
   SET @diff = @ViejoDineroEnPrestamos - @NuevoDineroEnPrestamos;
  SET @numero = (SELECT dineroencaja FROM finanzas);
  SET @resta =  @diff + @numero;
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
  
  IF @ViejoDineroEnPrestamos > @NuevoDineroEnPrestamos THEN
    -- Calculate the difference between the old and new values
    SET @diff = (SELECT ABS(@NuevoDineroEnPrestamos)) - (SELECT ABS(@ViejoDineroEnPrestamos));
    SET @numero = (SELECT dineroencaja FROM finanzas);
    SET @resta = @numero + (SELECT ABS(@diff));
  
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `looking_for_prestamos_after_insert_on_pagos`;
DELIMITER $$
CREATE TRIGGER `looking_for_prestamos_after_insert_on_pagos` AFTER INSERT ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroenprestamos" in "finanzas" with the new sum of "Monto" from "pagos"
SET @ViejoDineroEnPrestamos = (SELECT dineroenprestamos FROM finanzas);
  UPDATE finanzas
  SET dineroenprestamos = (
    SELECT COALESCE(SUM(Monto), 0)
    FROM pagos
    WHERE PrestamoId IS NOT NULL
  );
  SET @NuevoDineroEnPrestamos = (SELECT dineroenprestamos FROM finanzas);
  
  IF @ViejoDineroEnPrestamos < @NuevoDineroEnPrestamos THEN
    -- Calculate the difference between the old and new values
   SET @diff = @ViejoDineroEnPrestamos - @NuevoDineroEnPrestamos;
  SET @numero = (SELECT dineroencaja FROM finanzas);
  SET @resta =  @diff + @numero;
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
  
  IF @ViejoDineroEnPrestamos > @NuevoDineroEnPrestamos THEN
    -- Calculate the difference between the old and new values
    SET @diff = (SELECT ABS(@NuevoDineroEnPrestamos)) - (SELECT ABS(@ViejoDineroEnPrestamos));
    SET @numero = (SELECT dineroencaja FROM finanzas);
    SET @resta = @numero + (SELECT ABS(@diff));
  
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `looking_for_prestamos_after_update_on_pagos`;
DELIMITER $$
CREATE TRIGGER `looking_for_prestamos_after_update_on_pagos` AFTER UPDATE ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroenprestamos" in "finanzas" with the new sum of "Monto" from "pagos"
SET @ViejoDineroEnPrestamos = (SELECT dineroenprestamos FROM finanzas);
  UPDATE finanzas
  SET dineroenprestamos = (
    SELECT COALESCE(SUM(Monto), 0)
    FROM pagos
    WHERE PrestamoId IS NOT NULL
  );
  SET @NuevoDineroEnPrestamos = (SELECT dineroenprestamos FROM finanzas);
  
  IF @ViejoDineroEnPrestamos < @NuevoDineroEnPrestamos THEN
    -- Calculate the difference between the old and new values
   SET @diff = @ViejoDineroEnPrestamos - @NuevoDineroEnPrestamos;
  SET @numero = (SELECT dineroencaja FROM finanzas);
  SET @resta =  @diff + @numero;
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
  
  IF @ViejoDineroEnPrestamos > @NuevoDineroEnPrestamos THEN
    -- Calculate the difference between the old and new values
    SET @diff = (SELECT ABS(@NuevoDineroEnPrestamos)) - (SELECT ABS(@ViejoDineroEnPrestamos));
    SET @numero = (SELECT dineroencaja FROM finanzas);
    SET @resta = @numero + (SELECT ABS(@diff));
  
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `participaciones`
--

DROP TABLE IF EXISTS `participaciones`;
CREATE TABLE IF NOT EXISTS `participaciones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdInversion` int(11) DEFAULT NULL,
  `DescripcionParticipacion` varchar(255) DEFAULT NULL,
  `MontoInvertido` decimal(10,2) DEFAULT NULL,
  `RendimientoEsperado` decimal(10,2) DEFAULT NULL,
  `PagoId` int(11) DEFAULT NULL,
  `FechaInicioParticipacion` date DEFAULT NULL,
  `FechaFinParticipacion` date DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `IdInversion` (`IdInversion`),
  KEY `PagoId` (`PagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participaciones`
--

INSERT INTO `participaciones` (`Id`, `IdInversion`, `DescripcionParticipacion`, `MontoInvertido`, `RendimientoEsperado`, `PagoId`, `FechaInicioParticipacion`, `FechaFinParticipacion`, `FechaCreacion`, `FechaModificacion`) VALUES
(5, 6, 'compra de bono', '220.33', '300.99', 28, '2024-03-28', '2024-03-29', '2024-03-18 03:54:04', '2024-03-18 03:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `MontoSolicitado` decimal(10,2) DEFAULT NULL,
  `MontoAprobado` decimal(10,2) DEFAULT NULL,
  `MontoPagado` decimal(10,2) DEFAULT NULL,
  `TasaDeInteres` decimal(10,2) DEFAULT NULL,
  `MontoRecargo` decimal(10,2) DEFAULT NULL,
  `Remitente` varchar(255) DEFAULT NULL,
  `Beneficiario` varchar(255) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `PagoId` int(11) DEFAULT NULL,
  `FechaPagoMensual` timestamp NULL DEFAULT NULL,
  `FechaFinalPrestamo` timestamp NULL DEFAULT NULL,
  `CuotasTotales` int(3) DEFAULT NULL,
  `DiasDePagoDelMes` int(11) DEFAULT NULL,
  `CantPagosPorMes` varchar(255) DEFAULT NULL,
  `FechaDeAprobacion` timestamp NULL DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `PagoId` (`PagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`Id`, `IdCliente`, `Motivo`, `MontoSolicitado`, `MontoAprobado`, `MontoPagado`, `TasaDeInteres`, `MontoRecargo`, `Remitente`, `Beneficiario`, `Status`, `PagoId`, `FechaPagoMensual`, `FechaFinalPrestamo`, `CuotasTotales`, `DiasDePagoDelMes`, `CantPagosPorMes`, `FechaDeAprobacion`, `FechaCreacion`, `FechaModificacion`) VALUES
(4, 3, 'Prestamo educativo', NULL, NULL, NULL, NULL, NULL, 'Sender3', 'Receiver3', 'Aprobado', 36, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-18 08:28:00', '2024-03-19 04:27:14'),
(5, 1, 'Education Loan', NULL, NULL, NULL, NULL, NULL, 'Sender1', 'Receiver1', 'En proceso', 5, NULL, '2024-12-18 04:00:00', NULL, NULL, NULL, NULL, '2024-01-18 08:30:00', '2024-02-08 22:45:47'),
(6, 3, 'Business Loan', NULL, NULL, NULL, NULL, NULL, 'Sender3', 'Receiver3', 'En proceso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-18 08:28:00', '2024-01-22 12:56:04'),
(7, 1, 'Education Loan', NULL, NULL, NULL, NULL, NULL, 'Sender1', 'Receiver1', 'En proceso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-18 08:30:00', '2024-01-22 12:56:04'),
(8, 3, 'Business Loan', NULL, NULL, NULL, NULL, NULL, 'Sender3', 'Receiver3', 'Aprobado', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-18 08:28:00', '2024-01-22 12:57:26'),
(27, 4, 'Short-term Loan', NULL, NULL, NULL, NULL, NULL, 'Sender4', 'Receiver4', 'En proceso', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-18 08:20:00', '2024-03-19 03:41:59'),
(28, 7, 'Préstamo para compra de automóvil', '15000.00', '15000.00', '0.00', '8.50', '0.00', 'Banco XYZ', 'John Doe', 'Aprobado', NULL, '2024-03-16 04:00:00', '2024-03-26 04:00:00', 12, 30, 'Mensual', '2024-03-12 18:31:08', '2024-03-12 18:31:08', '2024-03-12 18:36:31'),
(29, 7, 'Préstamo para remodelación de casa', '25000.00', '25000.00', '0.00', '7.00', '0.00', 'Banco XYZ', 'Jane Doe', 'Aprobado', NULL, '2024-03-26 04:00:00', '2024-03-26 04:00:00', 24, 15, 'Quincenal', '2024-03-12 18:31:08', '2024-03-12 18:31:08', '2024-03-12 18:36:36'),
(30, 7, 'Préstamo para gastos médicos', '10000.00', '10000.00', '0.00', '9.00', '0.00', 'Banco XYZ', 'Alice Smith', 'Aprobado', NULL, '2024-03-14 03:59:00', '2024-03-26 04:00:00', 6, 5, 'Mensual', '2024-03-12 18:31:08', '2024-03-12 18:31:08', '2024-03-12 20:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Rol` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Active` varchar(255) NOT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Usuario`, `Contraseña`, `Rol`, `Email`, `Active`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, 'opal', '$2y$10$sPM10Zpplsqi95aUS4XhHel9D5jS975zFt07QYprMQiW5q5EUfGxq', 'Cliente', 'hipolitoprz2001@gmail.com', 'Yes', '2024-01-18 03:47:23', '2024-02-08 23:34:13'),
(2, 'opaopa', '$2y$10$9AgJyP.8jSKxssN93oZpYeJvTofR5MXQOI6wisxT.5RXeVVOkHabC', 'Cliente', 'thelegendstutorials@gmail.com', 'Yes', '2024-01-18 03:47:23', '2024-03-20 23:29:24'),
(3, 'markDitamai', '$2y$10$9AgJyP.8jSKxssN93oZpYeJvTofR5MXQOI6wisxT.5RXeVVOkHabC', 'Administrador', 'cuentascompaltidas@gmail.com', 'Yes', '2024-02-10 17:16:56', '2024-03-23 22:59:32'),
(4, 'compainero', '$2y$10$Ul59.UV1GM05y2V2XKlwzuCpnsGQeHAShghQWLqDhnSCoi0SiBeZ6', 'Administrador', 'thelegendstutorials@hotmail.com', 'Yes', '2024-03-23 19:16:49', '2024-03-23 19:19:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
