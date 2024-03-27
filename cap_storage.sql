-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2024 at 01:57 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `CedulaPath` varchar(255) DEFAULT NULL,
  `RNC` varchar(20) DEFAULT NULL,
  `MontoSolicitado` decimal(10,2) DEFAULT NULL,
  `Interes` decimal(5,2) DEFAULT NULL,
  `MontoDeuda` decimal(10,2) DEFAULT NULL,
  `Reenganchado` tinyint(1) DEFAULT NULL,
  `PerfilValidado` tinyint(1) DEFAULT 0,
  `Puntos` int(11) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `FechaSalida` date DEFAULT NULL,
  `MesesEnEmpresa` int(11) DEFAULT NULL,
  `TotalPrestado` decimal(10,2) DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`),
  KEY `UserId` (`IdUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`Id`, `IdUsuario`, `Nombre`, `Apellido`, `Direccion`, `Cedula`, `CedulaPath`, `RNC`, `MontoSolicitado`, `Interes`, `MontoDeuda`, `Reenganchado`, `PerfilValidado`, `Puntos`, `FechaIngreso`, `FechaSalida`, `MesesEnEmpresa`, `TotalPrestado`, `FechaCreacion`, `FechaModificacion`) VALUES
(7, 2, 'Jane', 'Smithh', '456 Elm St', '0987654321', NULL, 'XYZ456', '7000.00', '8.00', '2000.00', 1, 1, 150, '2022-12-15', NULL, 12, '9000.00', '2024-02-16 00:25:41', '2024-03-26 02:32:43'),
(5, NULL, 'yo mimo', 'po quien ma', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '40229604604', NULL, '430262617', '23455.00', '10.00', '435353.00', 0, 0, 13, '2023-01-01', NULL, 43, '355532.00', '2024-02-16 00:18:13', '2024-02-16 00:18:13'),
(4, NULL, 'Hipolito', 'Peña', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '40229604604', NULL, '130424555', '23455.00', '10.00', '435353.00', 0, 0, 13, '2023-01-01', '2023-01-01', 23, '44555.00', '2024-02-13 00:56:28', '2024-02-13 00:56:28'),
(10, NULL, 'Jane', 'Smith', '456 Elm St', '0987654321', NULL, 'XYZ456', '7000.00', '8.00', '2000.00', 1, 1, 150, '2022-12-15', NULL, 12, '9000.00', '2024-02-16 00:28:20', '2024-03-26 02:26:39'),
(11, 3, 'Alice', 'Johnson', '789 Oak St', '5432167890', NULL, 'DEF789', '10000.00', '12.00', '500.00', 0, 0, 75, '2023-03-20', '2024-01-15', 10, '10500.00', '2024-02-16 00:28:20', '2024-02-16 00:28:20'),
(12, NULL, 'Hipolito', 'Peña', 'Santo Domingo Este, Invi Cea, Calle Pedro Barronte #8', '345234566', NULL, '', '0.00', '0.00', '0.00', 0, 0, 0, '2023-01-01', NULL, 2, '13.00', '2024-03-05 18:22:28', '2024-03-05 18:22:28'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-14 06:53:31', '2024-03-14 06:53:31'),
(14, NULL, 'ei nombre', 'ei apellido', 'Calle Pedro Barronte n.08', '40229604604', '_.d1vis10n._', '430262617', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-26 22:30:18', '2024-03-26 22:30:18'),
(15, NULL, 'ei nombre', 'ei apellido', 'Calle Pedro Barronte n.08', '40229604604', '_.d1vis10n._', '430262617', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-26 22:31:11', '2024-03-26 22:31:11'),
(16, NULL, 'ei nombre', 'ei apellido', 'Calle Pedro Barronte n.08', '40229604604', '_.d1vis10n._', '430262617', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-26 22:36:27', '2024-03-26 22:36:27'),
(17, NULL, 'ei nombre', 'ei apellido', 'Calle Pedro Barronte n.08', '40229604604', 'uploads/66034ead6ddf9_front_cal backend.png_.d1vis10n._uploads/66034ead6de04_back_cal C.png', '430262617', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-26 22:39:41', '2024-03-26 22:39:41'),
(18, NULL, 'ei nombre', 'ei apellido', 'Calle Pedro Barronte n.08', '40229604604', 'uploads/66034ee13167f_front_cal backend.png_.d1vis10n._uploads/66034ee13168e_back_cal C.png', '430262617', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-26 22:40:33', '2024-03-26 22:40:33'),
(19, NULL, 'ei nombre', 'ei apellido', 'Calle Pedro Barronte n.08', '40229604604', 'uploads/66034f3ac312c_front_cal A.png_.d1vis10n._uploads/66034f3ac3132_back_503.PNG', '430262617', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-26 22:42:02', '2024-03-26 22:42:02');

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
('13000.00', '1500.50', '12804.50');

-- --------------------------------------------------------

--
-- Table structure for table `inversiones`
--

DROP TABLE IF EXISTS `inversiones`;
CREATE TABLE IF NOT EXISTS `inversiones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `Remitente` varchar(255) DEFAULT NULL,
  `Beneficiario` varchar(255) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `PagoId` int(11) NOT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`),
  KEY `PagoId` (`PagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inversiones`
--

INSERT INTO `inversiones` (`Id`, `IdCliente`, `Motivo`, `Remitente`, `Beneficiario`, `Status`, `PagoId`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, 4, 'Short-term Investment', 'Sender4', 'Receiver4', 'En cola', 3, '2024-01-18 08:17:08', '2024-01-18 04:48:34'),
(2, 2, 'Investment Plan A', 'Sender2', 'Receiver2', 'Aprobada', 2, '2024-01-18 08:17:08', '2024-01-18 04:48:34'),
(3, 1, 'New Investment', 'Sender1', 'Receiver1', 'En cola', 1, '2024-01-18 08:17:08', '2024-01-18 04:48:34');

--
-- Triggers `inversiones`
--
DROP TRIGGER IF EXISTS `after_delete_on_inversiones`;
DELIMITER $$
CREATE TRIGGER `after_delete_on_inversiones` AFTER DELETE ON `inversiones` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM inversiones i
    LEFT JOIN pagos p ON i.PagoId = p.Id
    WHERE i.Status = 'Aprobada'
  );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_inversiones_insert`;
DELIMITER $$
CREATE TRIGGER `after_inversiones_insert` AFTER INSERT ON `inversiones` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM inversiones i
    LEFT JOIN pagos p ON i.PagoId = p.Id
    WHERE i.Status = 'Aprobado'
  );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_inversiones_insert_update`;
DELIMITER $$
CREATE TRIGGER `after_inversiones_insert_update` AFTER INSERT ON `inversiones` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM inversiones i
    LEFT JOIN pagos p ON i.PagoId = p.Id
    WHERE i.Status = 'Aprobada'
  );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_on_inversiones`;
DELIMITER $$
CREATE TRIGGER `after_update_on_inversiones` AFTER UPDATE ON `inversiones` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM inversiones i
    LEFT JOIN pagos p ON i.PagoId = p.Id
    WHERE i.Status = 'Aprobada'
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) DEFAULT NULL,
  `CuentaRemitente` varchar(255) DEFAULT NULL,
  `EntidadBancariaRemitente` varchar(255) DEFAULT NULL,
  `CuentaDestinatario` varchar(255) DEFAULT NULL,
  `EntidadBancariaDestinatario` varchar(255) DEFAULT NULL,
  `Monto` decimal(10,2) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `FechaDePago` datetime DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`Id`, `IdCliente`, `CuentaRemitente`, `EntidadBancariaRemitente`, `CuentaDestinatario`, `EntidadBancariaDestinatario`, `Monto`, `Motivo`, `Tipo`, `FechaDePago`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, 1, 'Cuenta1', 'Banco1', 'CuentaDest1', 'BancoDest1', '1000.00', 'Pago mensual', 'Transferencia', '2023-12-15 08:30:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27'),
(2, 2, 'Cuenta2', 'Banco2', 'CuentaDest2', 'BancoDest2', '1500.50', 'Pago de deuda', 'Depósito', '2023-12-20 10:45:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27'),
(3, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '800.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27'),
(4, 1, 'Cuenta1', 'Banco1', 'CuentaDest1', 'BancoDest1', '1000.00', 'Pago mensual', 'Transferencia', '2023-12-15 08:30:00', '2024-01-22 12:15:48', '2024-01-22 12:15:48'),
(5, 2, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '800.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-22 12:15:48', '2024-01-22 12:15:48'),
(6, 1, 'Cuenta1', 'Banco1', 'CuentaDest1', 'BancoDest1', '1400.00', 'Pago adicional', 'Transferencia', '2023-12-28 09:00:00', '2024-01-22 12:56:30', '2024-01-23 23:53:56'),
(7, 2, 'Cuenta2', 'Banco2', 'CuentaDest2', 'BancoDest2', '1800.75', 'Pago extra', 'Depósito', '2023-12-30 14:30:00', '2024-01-22 12:56:30', '2024-01-22 12:56:30'),
(9, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '1000.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 00:19:32', '2024-01-24 00:19:32'),
(10, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '1200.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 00:21:06', '2024-01-24 00:21:06'),
(11, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '1000.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 00:36:09', '2024-01-24 00:36:09'),
(12, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '1000.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 00:37:19', '2024-01-24 00:37:19'),
(13, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 00:49:38', '2024-01-24 00:49:38'),
(14, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '200.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 00:52:08', '2024-01-24 00:52:08'),
(15, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 00:57:10', '2024-01-24 00:57:10'),
(16, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:00:18', '2024-01-24 01:00:18'),
(17, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:04:42', '2024-01-24 01:04:42'),
(18, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:11:20', '2024-01-24 01:11:20'),
(19, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:13:19', '2024-01-24 01:13:19'),
(20, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:17:05', '2024-01-24 01:17:05'),
(21, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:19:29', '2024-01-24 01:19:29'),
(22, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:21:19', '2024-01-24 01:21:19'),
(23, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:26:18', '2024-01-24 01:26:18'),
(24, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:27:03', '2024-01-24 01:27:03'),
(25, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '500.00', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-24 01:27:42', '2024-01-24 01:27:42');

--
-- Triggers `pagos`
--
DROP TRIGGER IF EXISTS `after_delete_on_pagos`;
DELIMITER $$
CREATE TRIGGER `after_delete_on_pagos` AFTER DELETE ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM inversiones i
    LEFT JOIN pagos p ON i.PagoId = p.Id
    WHERE i.Status = 'Aprobada'
  );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_inversiones_insert_update_on_pagos`;
DELIMITER $$
CREATE TRIGGER `after_inversiones_insert_update_on_pagos` AFTER INSERT ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM inversiones i
    LEFT JOIN pagos p ON i.PagoId = p.Id
    WHERE i.Status = 'Aprobada'
  );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_on_pagos`;
DELIMITER $$
CREATE TRIGGER `after_update_on_pagos` AFTER UPDATE ON `pagos` FOR EACH ROW BEGIN
  -- Update "dineroinvertido" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroinvertido = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM inversiones i
    LEFT JOIN pagos p ON i.PagoId = p.Id
    WHERE i.Status = 'Aprobada'
  );
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
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `Remitente` varchar(255) DEFAULT NULL,
  `Beneficiario` varchar(255) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `PagoId` int(11) DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`),
  KEY `PagoId` (`PagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`Id`, `IdCliente`, `Motivo`, `Remitente`, `Beneficiario`, `Status`, `PagoId`, `FechaCreacion`, `FechaModificacion`) VALUES
(4, 3, 'Business Loan', 'Sender3', 'Receiver3', 'Aprobado', 4, '2024-01-18 08:28:00', '2024-01-22 12:16:18'),
(5, 1, 'Education Loan', 'Sender1', 'Receiver1', 'En proceso', 5, '2024-01-18 08:30:00', '2024-01-22 12:16:18'),
(6, 3, 'Business Loan', 'Sender3', 'Receiver3', 'En proceso', NULL, '2024-01-18 08:28:00', '2024-01-22 12:56:04'),
(7, 1, 'Education Loan', 'Sender1', 'Receiver1', 'En proceso', NULL, '2024-01-18 08:30:00', '2024-01-22 12:56:04'),
(8, 3, 'Business Loan', 'Sender3', 'Receiver3', 'Aprobado', 6, '2024-01-18 08:28:00', '2024-01-22 12:57:26'),
(9, 2, 'Home Mortgage', 'Sender2', 'Receiver2', 'Aprobado', 8, '2024-01-18 08:22:00', '2024-01-23 23:55:54'),
(10, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 9, '2024-01-18 08:25:00', '2024-01-24 00:20:00'),
(11, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 10, '2024-01-18 08:25:00', '2024-01-24 00:21:24'),
(12, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 11, '2024-01-18 08:25:00', '2024-01-24 00:36:29'),
(13, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 12, '2024-01-18 08:25:00', '2024-01-24 00:37:58'),
(14, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 13, '2024-01-18 08:25:00', '2024-01-24 00:50:03'),
(15, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 14, '2024-01-18 08:25:00', '2024-01-24 00:52:25'),
(16, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 15, '2024-01-18 08:25:00', '2024-01-24 00:57:35'),
(17, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 16, '2024-01-18 08:25:00', '2024-01-24 01:00:36'),
(18, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 17, '2024-01-18 08:25:00', '2024-01-24 01:05:01'),
(19, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 18, '2024-01-18 08:25:00', '2024-01-24 01:11:37'),
(20, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 19, '2024-01-18 08:25:00', '2024-01-24 01:13:49'),
(21, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 20, '2024-01-18 08:25:00', '2024-01-24 01:17:36'),
(22, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 21, '2024-01-18 08:25:00', '2024-01-24 01:19:55'),
(23, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 22, '2024-01-18 08:25:00', '2024-01-24 01:21:32'),
(24, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 23, '2024-01-18 08:25:00', '2024-01-24 01:26:43'),
(25, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 24, '2024-01-18 08:25:00', '2024-01-24 01:27:20'),
(26, 1, 'Auto Loan', 'Sender1', 'Receiver1', 'Aprobado', 25, '2024-01-18 08:25:00', '2024-01-24 01:27:54');

--
-- Triggers `prestamos`
--
DROP TRIGGER IF EXISTS `after_prestamos_insert_update`;
DELIMITER $$
CREATE TRIGGER `after_prestamos_insert_update` AFTER INSERT ON `prestamos` FOR EACH ROW BEGIN
  -- Update "dineroenprestamos" in "finanzas" with the new sum of "Monto" from "pagos"
  SET @ViejoDineroEnPrestamos = (SELECT dineroenprestamos FROM finanzas);
  UPDATE finanzas
  SET dineroenprestamos = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM prestamos pr
    LEFT JOIN pagos p ON pr.PagoId = p.Id
    WHERE pr.Status = 'Aprobado'
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
   SET @diff = @NuevoDineroEnPrestamos - @ViejoDineroEnPrestamos;
  SET @numero = (SELECT dineroencaja FROM finanzas);
  SET @resta =  @diff + @numero;
  UPDATE finanzas
    SET dineroencaja = @resta;
    -- Update dineroencaja by subtracting the difference
  END IF;
  


END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_prestamos_update`;
DELIMITER $$
CREATE TRIGGER `after_prestamos_update` AFTER UPDATE ON `prestamos` FOR EACH ROW BEGIN
  -- Update "dineroenprestamos" in "finanzas" with the new sum of "Monto" from "pagos"
  UPDATE finanzas
  SET dineroenprestamos = (
    SELECT COALESCE(SUM(p.Monto), 0)
    FROM prestamos pr
    LEFT JOIN pagos p ON pr.PagoId = p.Id
    WHERE pr.Status = 'Aprobado'
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Rol` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Active` varchar(255) NOT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Usuario`, `Contraseña`, `Rol`, `Email`, `Active`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, NULL, 'opal', '$2y$10$sPM10Zpplsqi95aUS4XhHel9D5jS975zFt07QYprMQiW5q5EUfGxq', 'Cliente', 'hipolitoprz2001@gmail.com', 'Yes', '2024-01-18 03:47:23', '2024-01-18 03:47:23'),
(2, NULL, 'opaopa', '$2y$10$9AgJyP.8jSKxssN93oZpYeJvTofR5MXQOI6wisxT.5RXeVVOkHabC', 'Cliente', 'thelegendstutorials@gmail.com', 'Yes', '2024-01-18 03:47:23', '2024-01-18 03:47:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
