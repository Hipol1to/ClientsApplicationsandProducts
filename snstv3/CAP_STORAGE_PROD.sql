-- phpMyAdmin SQL Dump
-- version 5.2.1
-- http://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2024 at 01:54 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u639419078_cap_storage`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Cedula` varchar(20) DEFAULT NULL,
  `FechaConexion` date DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `FechaSalida` date DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Cedula` varchar(20) DEFAULT NULL,
  `CedulaPath` varchar(1020) DEFAULT NULL,
  `RNC` varchar(20) DEFAULT NULL,
  `NumeroCuentaBancaria` varchar(50) DEFAULT NULL,
  `EntidadBancaria` varchar(50) DEFAULT NULL,
  `TipoDeCuentaBancaria` varchar(50) DEFAULT NULL,
  `MontoTotalSolicitado` decimal(10,2) DEFAULT 0.00,
  `MontoTotalPrestado` decimal(10,2) DEFAULT NULL,
  `MontoTotalPagado` decimal(10,2) DEFAULT NULL,
  `Interes` decimal(5,2) DEFAULT NULL,
  `MontoDeuda` decimal(10,2) DEFAULT NULL,
  `Reenganchado` tinyint(1) DEFAULT NULL,
  `PerfilValidado` tinyint(1) DEFAULT 0,
  `Puntos` int(11) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `FechaSalida` date DEFAULT NULL,
  `MesesEnEmpresa` int(11) DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`Id`, `IdUsuario`, `Nombre`, `Apellido`, `Direccion`, `Cedula`, `CedulaPath`, `RNC`, `NumeroCuentaBancaria`, `EntidadBancaria`, `TipoDeCuentaBancaria`, `MontoTotalSolicitado`, `MontoTotalPrestado`, `MontoTotalPagado`, `Interes`, `MontoDeuda`, `Reenganchado`, `PerfilValidado`, `Puntos`, `FechaIngreso`, `FechaSalida`, `MesesEnEmpresa`, `FechaCreacion`, `FechaModificacion`) VALUES
(43, 10, 'pablo alberto', 'sanchez carrasco', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '0015553333456', 'C:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\6621f3714fd81_front_2024-04-18 18_28_10-cedula dominicana reverso - Google Search.png_.d1vis10n._C:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\6621f3714fd93_back_como.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-04-19 04:30:41', '2024-04-21 06:16:46'),
(44, 11, 'felipe', 'garibo', 'calle almanzar #1, el tamarindo, santo domingo este', '0015553333456', 'C:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\662444aa94a3b_front_2024-04-18 18_28_10-cedula dominicana reverso - Google Search.png_.d1vis10n._C:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\662444aa94a3f_back_como.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-04-20 22:41:46', '2024-04-20 22:57:51'),
(38, 6, 'FalinApart', 'Tan tan', 'tenchon, bitwin menchon for nao', '0015553333456', 'F:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\66039216e652f_front_scat (1).png_.d1vis10n._F:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\66039216e6532_back_Untitled Workspace.jpg', '644326222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-03-27 03:27:18', '2024-03-27 03:32:22'),
(40, 1, 'Hipolito', 'Perez Peña', 'Calle Pedro Barronte', '40229604604', 'F:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\6615951351096_front_ENTREGABLE 4- Scampi CMMI.docx_.d1vis10n._F:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\6615951351098_back_Curriculum Maria Elena Peña Reinoso.pdf', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2024-04-09 19:20:51', '2024-04-09 19:20:51'),
(46, 12, 'Alfredo', 'Pereira Guzman', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '0015553333456', 'C:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\66255ada4cd35_front_2024-04-18 18_28_10-cedula dominicana reverso - Google Search.png_.d1vis10n._C:\\wamp64\\www\\ClientsApplicationsandProducts\\clients\\uploads\\66255ada4cd3a_back_como.jpg', '', '38477753433', 'Asociación La Nacional de Ahorros y Préstamos', 'Cuenta de ahorros', 8000.00, 5000.00, 800.00, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-04-21 18:28:42', '2024-04-24 23:41:00'),
(1, 13, 'Admin', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-04-19 08:30:41', '2024-04-23 01:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `finanzas`
--

CREATE TABLE `finanzas` (
  `dineroencaja` decimal(10,2) DEFAULT NULL,
  `dineroinvertido` decimal(10,2) DEFAULT NULL,
  `dineroenprestamos` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `finanzas`
--

INSERT INTO `finanzas` (`dineroencaja`, `dineroinvertido`, `dineroenprestamos`) VALUES
(12500.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `inversiones`
--

CREATE TABLE `inversiones` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `TipoDeInversion` varchar(255) DEFAULT NULL,
  `MontoDividendoEsperado` decimal(10,2) DEFAULT NULL,
  `PeriodicidadDividendo` varchar(255) DEFAULT NULL,
  `FechaPagoDividendo` timestamp NULL DEFAULT NULL,
  `MontoBono` decimal(10,2) DEFAULT NULL,
  `TasaInteresBono` varchar(255) DEFAULT NULL,
  `PlazoBono` varchar(255) DEFAULT NULL,
  `PeriodicidadInteres` varchar(255) DEFAULT NULL,
  `FechaPagoInteres` timestamp NULL DEFAULT NULL,
  `MontoFondoInversion` decimal(10,2) DEFAULT NULL,
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
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inversiones`
--

INSERT INTO `inversiones` (`Id`, `IdCliente`, `Motivo`, `TipoDeInversion`, `MontoDividendoEsperado`, `PeriodicidadDividendo`, `FechaPagoDividendo`, `MontoBono`, `TasaInteresBono`, `PlazoBono`, `PeriodicidadInteres`, `FechaPagoInteres`, `MontoFondoInversion`, `TarifaAdministracion`, `PeriodicidadTarifaAdm`, `CantParticipacion`, `ParticipacionId`, `RendimientoTotal`, `Status`, `PagoId`, `FechaPagoInicialInversion`, `FechaFinalInversion`, `FechaDeAprobacion`, `FechaCreacion`, `FechaModificacion`) VALUES
(7, NULL, 'inversion comercial', 'Por acciones', 2424524.00, 'Trimestral', '2024-04-18 04:00:00', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 'En revision', NULL, '2024-06-21 04:00:00', '2024-04-26 04:00:00', NULL, '2024-04-17 22:22:22', '2024-04-24 23:59:26'),
(8, NULL, 'inversion', 'Por acciones', 233.00, 'Mensual', '2024-04-24 04:00:00', 0.00, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 512.00, 'En curso', NULL, '2024-04-26 04:00:00', '2024-05-29 04:00:00', NULL, '2024-04-24 23:55:26', '2024-04-24 23:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `Id` int(11) NOT NULL,
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
  `PagoValidado` tinyint(1) DEFAULT NULL,
  `InversionId` int(11) DEFAULT NULL,
  `PrestamoId` int(11) DEFAULT NULL,
  `ParticipacionId` int(11) DEFAULT NULL,
  `VoucherPath` varchar(256) DEFAULT NULL,
  `FechaDePago` datetime DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`Id`, `IdCliente`, `CuentaRemitente`, `TipoCuentaRemitente`, `EntidadBancariaRemitente`, `CuentaDestinatario`, `TipoCuentaDestinatario`, `EntidadBancariaDestinatario`, `Monto`, `Motivo`, `Tipo`, `PagoValidado`, `InversionId`, `PrestamoId`, `ParticipacionId`, `VoucherPath`, `FechaDePago`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, 1, 'Cuentaa1', '', 'Banco1', 'CuentaDest1', '', 'BancoDest1', 1000.00, 'Pago mensual', 'Transferencia', NULL, NULL, NULL, NULL, NULL, '2023-12-15 08:30:00', '2024-01-18 04:48:27', '2024-03-02 23:05:50'),
(2, 2, 'Cuenta2', NULL, 'Banco2', 'CuentaDest2', NULL, 'BancoDest2', 1500.50, 'Pago de deuda', 'Depósito', NULL, NULL, NULL, NULL, NULL, '2023-12-20 10:45:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27'),
(3, 3, 'Cuenta3', NULL, 'Banco3', 'CuentaDest3', NULL, 'BancoDest3', 800.75, 'Pago parcial', 'Cheque', NULL, NULL, 5, NULL, NULL, '2023-12-25 12:15:00', '2024-01-18 04:48:27', '2024-02-08 21:55:46'),
(5, 2, 'Cuenta3', NULL, 'Banco3', 'CuentaDest3', NULL, 'BancoDest3', 800.75, 'Pago parcial', 'Cheque', NULL, NULL, 5, NULL, NULL, '2023-12-25 12:15:00', '2024-01-22 12:15:48', '2024-03-19 03:40:48'),
(6, 1, 'Cuenta1', NULL, 'Banco1', 'CuentaDest1', NULL, 'BancoDest1', 1400.00, 'Pago adicional', 'Transferencia', NULL, NULL, 8, NULL, NULL, '2023-12-28 09:00:00', '2024-01-22 12:56:30', '2024-03-19 03:41:00'),
(7, 2, 'Cuenta2', NULL, 'Banco2', 'CuentaDest2', NULL, 'BancoDest2', 1800.75, 'Pago extra', 'Depósito', NULL, NULL, NULL, NULL, NULL, '2023-12-30 14:30:00', '2024-01-22 12:56:30', '2024-01-22 12:56:30'),
(26, 1, 'Cuenta1', NULL, 'Banco1', 'CuentaDest1', NULL, 'BancoDest1', 1000.00, 'Pago mensual', 'Transferencia', NULL, 2, NULL, NULL, NULL, '2023-12-15 08:30:00', '2024-01-28 19:41:34', '2024-02-08 21:58:43'),
(27, 7, '999777477', 'Cuenta de ahorros', 'Banco Popular Dominicano', '94999555', 'Cuenta de ahorros', 'Banco Vimenca', 99.99, 'Compra de acciones', 'Transferencia bancaria', NULL, 6, NULL, 4, NULL, '2024-03-26 00:00:00', '2024-03-18 03:35:28', '2024-03-18 03:35:28'),
(28, 7, '2344', 'Cuenta corriente', 'Bandex', '232443', 'Cuenta de ahorros', 'Citibank', 46.76, 'Compra de acciones', 'Transferencia bancaria', NULL, 6, NULL, 5, NULL, '2024-03-25 00:00:00', '2024-03-18 03:56:01', '2024-03-18 03:56:01'),
(29, 7, '2344', 'Cuenta de ahorros', 'Banco Popular Dominicano', '2324434', 'Cuenta de ahorros', 'Banco López de Haro', 46.76, 'Compra de acciones', 'Transferencia bancaria', NULL, 6, NULL, 1, NULL, '2024-03-27 00:00:00', '2024-03-19 00:44:03', '2024-03-19 00:44:03'),
(30, 7, '234', 'Cuenta corriente', 'Banreservas', '232443', 'Cuenta corriente', 'Banco Vimenca', 46.76, 'Compra de acciones', 'Transferencia bancaria', NULL, 5, NULL, NULL, NULL, '2024-04-23 00:00:00', '2024-03-19 02:39:47', '2024-03-19 02:39:47'),
(31, 7, '234', 'Cuenta corriente', 'Banreservas', '232443', 'Cuenta corriente', 'Banco Vimenca', 46.76, 'Compra de acciones', 'Transferencia bancaria', NULL, 5, NULL, NULL, NULL, '2024-04-23 00:00:00', '2024-03-19 02:40:46', '2024-03-19 02:40:46'),
(32, 7, '234', 'Cuenta de ahorros', 'Banreservas', '232443', 'Cuenta de ahorros', 'Citibank', 35.76, 'Compra de acciones', '', NULL, NULL, NULL, NULL, NULL, '2024-03-29 00:00:00', '2024-03-19 04:16:02', '2024-03-19 04:16:02'),
(33, 7, '234', 'Cuenta de ahorros', 'Banreservas', '232443', 'Cuenta de ahorros', 'Citibank', 35.76, 'Compra de acciones', '', NULL, NULL, NULL, NULL, NULL, '2024-03-29 00:00:00', '2024-03-19 04:17:26', '2024-03-19 04:17:26'),
(34, 7, '2344', 'Cuenta de ahorros', 'Banco BHD', '2324434', 'Cuenta de ahorros', 'Bandex', 99.99, 'Compra de acciones', 'Transferencia bancaria', NULL, NULL, NULL, NULL, NULL, '2024-03-29 00:00:00', '2024-03-19 04:20:09', '2024-03-19 04:20:09'),
(35, 7, '2344', 'Cuenta de ahorros', 'Banco BHD', '232443', 'Cuenta de ahorros', 'Citibank', 35.76, 'Compra de acciones', 'Transferencia bancaria', NULL, NULL, 4, NULL, NULL, '2024-03-30 00:00:00', '2024-03-19 04:26:42', '2024-03-19 04:26:42'),
(36, 7, '999777477', 'Cuenta de ahorros', 'Banco Cofaci', '232443', 'Cuenta corriente', 'Banco Activo', 99.99, 'Compra de acciones', 'Transferencia bancaria', NULL, NULL, 4, NULL, NULL, '2024-07-18 00:00:00', '2024-03-19 04:27:14', '2024-03-19 04:27:14'),
(41, 38, '12345678900', 'Cuenta corriente', 'Bancotui', '2324434', 'Cuenta de ahorros', 'Banco Óptima de Ahorro y Crédito', 35.76, 'ei compa', 'Transferencia bancaria', NULL, NULL, 39, NULL, '\\uploads\\662440fae22d6_front_mqdefault.jpg', '2024-04-25 00:00:00', '2024-04-17 23:43:38', '2024-04-20 22:26:02'),
(42, 44, '2222222222', 'Cuenta de ahorros', 'Banco Popular Dominicano', '444444444444444', 'Cuenta corriente', 'Banreservas', 1000.00, 'pago prestamo', 'Transferencia bancaria', NULL, NULL, 40, NULL, '\\uploads\\66254ce2851d0_front_ad0967b583094395a083163f6465cfdb.jpg', '2024-04-21 00:00:00', '2024-04-21 17:29:06', '2024-04-21 17:29:06'),
(70, 46, '568658568568', 'Cuenta corriente', 'Asociación Popular de Ahorros y Préstamos', '38477753433', 'Cuenta de ahorros', 'Asociación La Nacional de Ahorros y Préstamos', 5000.00, 'desembolso de prestamo', 'Transferencia bancaria', NULL, NULL, 57, NULL, '\\uploads\\6629986cbd7cc_front_WhatsApp Image 2024-03-24 at 21.20.05_7038e933.jpg', '2024-04-24 00:00:00', '2024-04-24 23:40:28', '2024-04-24 23:40:28'),
(71, 46, '38477753433', 'Cuenta de ahorros', 'Asociación La Nacional de Ahorros y Préstamos', '66556654545', 'Cuenta corriente', 'Banco BDI', 800.00, 'Pago de préstamo del usuario userprueba2', 'Transferencia bancaria', NULL, NULL, 57, NULL, 'uploads\\6629988cec741_front_WhatsApp Image 2024-03-24 at 21.20.05_7038e933.jpg', '2024-04-24 00:00:00', '2024-04-24 23:41:00', '2024-04-24 23:41:00');

--
-- Triggers `pagos`
--
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

CREATE TABLE `participaciones` (
  `Id` int(11) NOT NULL,
  `IdInversion` int(11) DEFAULT NULL,
  `DescripcionParticipacion` varchar(255) DEFAULT NULL,
  `MontoInvertido` decimal(10,2) DEFAULT NULL,
  `RendimientoEsperado` decimal(10,2) DEFAULT NULL,
  `PagoId` int(11) DEFAULT NULL,
  `FechaInicioParticipacion` date DEFAULT NULL,
  `FechaFinParticipacion` date DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `participaciones`
--

INSERT INTO `participaciones` (`Id`, `IdInversion`, `DescripcionParticipacion`, `MontoInvertido`, `RendimientoEsperado`, `PagoId`, `FechaInicioParticipacion`, `FechaFinParticipacion`, `FechaCreacion`, `FechaModificacion`) VALUES
(5, 6, 'compra de bono', 220.33, 300.99, 28, '2024-03-28', '2024-03-29', '2024-03-18 03:54:04', '2024-03-18 03:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `MontoSolicitado` decimal(10,2) DEFAULT NULL,
  `MontoAprobado` decimal(10,2) DEFAULT NULL,
  `MontoPagado` decimal(10,2) DEFAULT NULL,
  `MontoPendiente` decimal(10,2) DEFAULT NULL,
  `TasaDeInteres` decimal(10,2) DEFAULT NULL,
  `MontoRecargo` decimal(10,2) DEFAULT NULL,
  `MontoCuota1` decimal(10,2) DEFAULT NULL,
  `MontoCuota2` decimal(10,2) DEFAULT NULL,
  `MontoCuota3` decimal(10,2) DEFAULT NULL,
  `MontoCuota4` decimal(10,2) DEFAULT NULL,
  `MontoPagoMensual` decimal(10,2) DEFAULT NULL,
  `Remitente` varchar(255) DEFAULT NULL,
  `Beneficiario` varchar(255) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `PagoId` int(11) DEFAULT NULL,
  `FechaPagoMensual` timestamp NULL DEFAULT NULL,
  `FechaDesembolso` timestamp NULL DEFAULT NULL,
  `FechaFinalPrestamo` timestamp NULL DEFAULT NULL,
  `CuotasTotales` int(3) DEFAULT NULL,
  `DiasDePagoDelMes` varchar(255) DEFAULT NULL,
  `CantPagosPorMes` varchar(255) DEFAULT NULL,
  `CantMesesDuracionPrestamo` int(2) DEFAULT NULL,
  `FechaDeAprobacion` timestamp NULL DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`Id`, `IdCliente`, `Motivo`, `MontoSolicitado`, `MontoAprobado`, `MontoPagado`, `MontoPendiente`, `TasaDeInteres`, `MontoRecargo`, `MontoCuota1`, `MontoCuota2`, `MontoCuota3`, `MontoCuota4`, `MontoPagoMensual`, `Remitente`, `Beneficiario`, `Status`, `PagoId`, `FechaPagoMensual`, `FechaDesembolso`, `FechaFinalPrestamo`, `CuotasTotales`, `DiasDePagoDelMes`, `CantPagosPorMes`, `CantMesesDuracionPrestamo`, `FechaDeAprobacion`, `FechaCreacion`, `FechaModificacion`) VALUES
(39, 38, 'Prestamoss', 12300.00, 10000.00, 0.00, NULL, 5.35, 0.00, 2500.00, 2500.00, NULL, NULL, 5000.00, 'Inversiones Everest', 'FalinApart Tan tan', 'Aprobado', 41, NULL, NULL, '2025-01-17 04:00:00', 18, 'Dia# 6,  Dia# 16', '2', NULL, NULL, '2024-04-17 20:14:59', '2024-04-20 20:42:18'),
(40, 44, 'Prestamo', 10000.00, 6000.00, NULL, NULL, NULL, NULL, 1000.00, 100.00, 100.00, NULL, 1200.00, 'Inversiones Everest', 'felipe garibo', 'Aprobado', 42, NULL, NULL, '2024-09-20 04:00:00', 5, '   Dia# 6,  Dia# 16', '3', NULL, NULL, '2024-04-20 23:01:22', '2024-04-21 17:29:06'),
(57, 46, 'Prestamo', 8000.00, 5000.00, 800.00, 4550.00, 5.35, 0.00, 1000.00, NULL, NULL, NULL, 200.00, 'Inversiones Everest', 'Alfredo Pereira Guzman', 'Aprobado', 71, '2024-05-20 04:00:00', '2024-04-24 04:00:00', '2024-09-24 04:00:00', 5, ' Dia# 23', '1', 5, '2024-04-24 04:00:00', '2024-04-24 23:39:40', '2024-04-25 00:11:27');

--
-- Triggers `prestamos`
--
DELIMITER $$
CREATE TRIGGER `sum_MontoTotalPrestado_to_client_after_update_on_prestamos` AFTER UPDATE ON `prestamos` FOR EACH ROW BEGIN
    IF OLD.Status <> NEW.Status AND NEW.FechaDesembolso IS NOT NULL THEN
        UPDATE clientes AS c SET c.MontoTotalPrestado = c.MontoTotalPrestado + NEW.MontoAprobado, c.Interes = NEW.TasaDeInteres WHERE NEW.FechaDesembolso IS NOT NULL AND NEW.TasaDeInteres IS NOT NULL;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateStatusWhenMontoPendienteIsBelowZero` AFTER UPDATE ON `prestamos` FOR EACH ROW BEGIN
    IF OLD.MontoPendiente <> NEW.MontoPendiente AND NEW.MontoPendiente < 0.00 THEN
        UPDATE prestamos AS p SET p.Status = 'FINALIZADO CON ERRORES' WHERE NEW.FechaDesembolso IS NOT NULL AND NEW.TasaDeInteres IS NOT NULL AND NEW.MontoPendiente IS NOT NULL;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateStatusWhenMontoPendienteIsZero` AFTER UPDATE ON `prestamos` FOR EACH ROW BEGIN
    IF OLD.MontoPendiente <> NEW.MontoPendiente AND NEW.MontoPendiente = 0.00 THEN
        UPDATE prestamos AS p SET p.Status = 'FINALIZADO' WHERE NEW.FechaDesembolso IS NOT NULL AND NEW.TasaDeInteres IS NOT NULL AND NEW.MontoPendiente IS NOT NULL;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Rol` varchar(20) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 0,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id`, `IdCliente`, `Usuario`, `Contraseña`, `Rol`, `Email`, `Active`, `resetToken`, `resetComplete`, `FechaCreacion`, `FechaModificacion`) VALUES
(10, 43, 'compainero', '$2y$10$48TH3pRN3mu/t5seSRU6weq6Ox20MaGuEXncnhejMbK8jo/XVYvr6', 'Administrador', 'thelegendstutorials@gmail.com', 1, '44a7d07877a4aac32b7cb5ccfa886b20', 'No', '2024-04-19 08:29:50', '2024-05-04 04:20:40'),
(11, 44, 'userprueba', '$2y$10$rhx42GCW3FINqplAwS3kueh6YNWfHHPOYo1Ox0ctndBm3WlCsC5H2', 'Cliente', 'cuentacompaltidas@gmail.com', 1, 'ed15cfc3c1e25874516b6392547b30dd', 'Yes', '2024-04-20 22:37:19', '2024-05-04 04:29:16'),
(12, 46, 'userprueba2', '$2y$10$zxcUaTa25sOrYYeVmTS4PeEBzAli0uiR3bsiX639t/MRgp0u6t.ve', 'Cliente', 'thelegendstutorials@hotmail.com', 1, NULL, 'No', '2024-04-21 18:00:12', '2024-04-21 18:28:42'),
(6, 38, 'liluser', '$2y$10$hFX.BA3sjkISNzlcShOQuuivSFSVwFbVYXZUOVDnYuxLvAVxhxGrW', 'Cliente', 'thelegendstutorials@outlook.com', 1, NULL, 'No', '2024-03-26 02:59:52', '2024-04-19 04:32:21'),
(15, 1, 'carloss', '$2y$10$IO3xdyD5UfR9AQWukQYG/ec54IjVPFJn4LzNY1iAdI1sjnQ2FEjK6', 'Administrador', NULL, 1, NULL, 'No', '2024-04-24 23:42:28', '2024-05-05 05:28:55'),
(16, 1, 'LunalDrk', '$2y$10$s.jaQ/YDw0YtEv00O5RnOuh6lJCu13JQEfaqb6KmAEjYXs/GdUiBy', 'Administrador', 'juanen001@gmail.com', 1, NULL, 'No', '2024-05-05 05:22:16', '2024-05-05 05:32:00'),
(19, NULL, 'isom93', '$2y$10$hBSammkazdxWrPb48nSuxOV9Loi9bneL.Sn408eY/aNtMqs5sz.M6', 'Cliente', 'casey.swiftt@aol.com', 0, NULL, 'No', '2024-05-06 09:19:40', '2024-05-06 09:19:40'),
(18, NULL, 'otrousuario', '$2y$10$qvLlRRB5iSmVDQgF8HLRNeDj3WHHb7ogTIVDrbeJ4UEZ8pIFVwmCi', 'Cliente', 'hipolitoprz2001@gmail.com', 1, NULL, 'No', '2024-05-05 22:10:49', '2024-05-05 22:11:08'),
(20, NULL, 'Pablo', '$2y$10$wUUYCHYGSwXQICzB9mEQ1OIyxKQzWDrgJSy7x.V/7R1KmnP1Cy5d6', 'Cliente', 'bleyy92@gmail.com', 1, NULL, 'No', '2024-05-21 15:05:39', '2024-05-21 15:06:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`IdUsuario`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`IdUsuario`);

--
-- Indexes for table `inversiones`
--
ALTER TABLE `inversiones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PagoId` (`PagoId`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdInversion` (`IdInversion`),
  ADD KEY `PagoId` (`PagoId`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PagoId` (`PagoId`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `inversiones`
--
ALTER TABLE `inversiones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `participaciones`
--
ALTER TABLE `participaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`u639419078_soporte`@`127.0.0.1` EVENT `sumInteresToMontoPendiente` ON SCHEDULE EVERY 1 DAY STARTS '2024-05-03 18:31:12' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE prestamos as p
JOIN clientes as c
    SET p.MontoPendiente = ROUND(CONCAT(p.MontoPendiente + p.MontoPendiente * (p.TasaDeInteres*0.010)), 2),
    c.MontoDeuda = p.MontoPagoMensual
    WHERE p.Status IN ('Aprobado', 'Moroso', 'Atrasado') 
    AND p.MontoCuota1 IS NOT NULL 
    AND p.DiasDePagoDelMes IS NOT NULL 
    AND p.MontoPagoMensual IS NOT NULL 
    AND p.MontoPagoMensual > 0.00
    AND DAY(CURRENT_DATE()) = 1$$

CREATE DEFINER=`u639419078_soporte`@`127.0.0.1` EVENT `updatePrestamoStatus` ON SCHEDULE EVERY 1 DAY STARTS '2024-05-03 18:33:44' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE prestamos as p
JOIN clientes as c
    SET p.Status = "Moroso",
    c.MontoDeuda = p.MontoPagoMensual
    WHERE p.Status IN ('Aprobado', 'Moroso', 'Atrasado') 
    AND p.MontoCuota1 IS NOT NULL 
    AND p.DiasDePagoDelMes IS NOT NULL 
    AND p.MontoPagoMensual IS NOT NULL 
    AND p.MontoPagoMensual != 0.00
    AND DAY(CURRENT_DATE()) = 1$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
