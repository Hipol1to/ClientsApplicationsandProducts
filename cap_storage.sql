-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2024 at 04:48 AM
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
  `IdPago` int(11) DEFAULT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(NULL, '1500.50', NULL);

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
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`Id`, `IdCliente`, `CuentaRemitente`, `EntidadBancariaRemitente`, `CuentaDestinatario`, `EntidadBancariaDestinatario`, `Monto`, `Motivo`, `Tipo`, `FechaDePago`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, 1, 'Cuenta1', 'Banco1', 'CuentaDest1', 'BancoDest1', '1000.00', 'Pago mensual', 'Transferencia', '2023-12-15 08:30:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27'),
(2, 2, 'Cuenta2', 'Banco2', 'CuentaDest2', 'BancoDest2', '1500.50', 'Pago de deuda', 'Depósito', '2023-12-20 10:45:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27'),
(3, 3, 'Cuenta3', 'Banco3', 'CuentaDest3', 'BancoDest3', '800.75', 'Pago parcial', 'Cheque', '2023-12-25 12:15:00', '2024-01-18 04:48:27', '2024-01-18 04:48:27');

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
  `PagoId` int(11) NOT NULL,
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `PagoId` (`PagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
