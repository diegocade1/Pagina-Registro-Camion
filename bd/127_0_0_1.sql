-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 05, 2019 at 09:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controlcamion`
--
CREATE DATABASE IF NOT EXISTS `controlcamion` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `controlcamion`;

-- --------------------------------------------------------

--
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE IF NOT EXISTS `tbcliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbcliente`
--

INSERT INTO `tbcliente` (`ID`, `Nombre`) VALUES
(1, 'Cliente1'),
(2, 'Cliente2'),
(3, 'Cliente3'),
(4, 'Cliente4'),
(5, 'Cliente5'),
(6, 'Cliente6'),
(7, 'Cliente7'),
(8, 'Cliente8'),
(9, 'Cliente9'),
(10, 'Cliente10');

-- --------------------------------------------------------

--
-- Table structure for table `tbcontrolcamion`
--

DROP TABLE IF EXISTS `tbcontrolcamion`;
CREATE TABLE IF NOT EXISTS `tbcontrolcamion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente_id` int(11) NOT NULL,
  `Terminal_id` int(11) NOT NULL,
  `Anden` varchar(50) NOT NULL,
  `Patente` varchar(20) NOT NULL,
  `Chofer` varchar(50) NOT NULL,
  `Hora_llegada_camion` time NOT NULL,
  `Hora_ingreso_terminal` time NOT NULL,
  `Hora_apertura_camion` time NOT NULL,
  `fecha_creacion` date NOT NULL,
  `Imagen1` longblob NOT NULL,
  `Imagen2` longblob NOT NULL,
  `Imagen3` longblob NOT NULL,
  `Url1` varchar(100) NOT NULL,
  `Url2` varchar(100) NOT NULL,
  `Url3` int(100) NOT NULL,
  `Usuario_id_responsable` int(11) NOT NULL,
  `Terminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbdetallecontrolcamion`
--

DROP TABLE IF EXISTS `tbdetallecontrolcamion`;
CREATE TABLE IF NOT EXISTS `tbdetallecontrolcamion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Controlcamion_id` int(11) NOT NULL,
  `Guia_aerea` int(11) NOT NULL,
  `Hora_inicio_descarga` time NOT NULL,
  `Hora_termino_descarga` time NOT NULL,
  `Usuario_id_responsable` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbterminal`
--

DROP TABLE IF EXISTS `tbterminal`;
CREATE TABLE IF NOT EXISTS `tbterminal` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbterminal`
--

INSERT INTO `tbterminal` (`ID`, `Nombre`) VALUES
(1, 'Ander Sur'),
(2, 'Aerosan');

-- --------------------------------------------------------

--
-- Table structure for table `tbterminal_anden`
--

DROP TABLE IF EXISTS `tbterminal_anden`;
CREATE TABLE IF NOT EXISTS `tbterminal_anden` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Terminal_id` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbterminal_anden`
--

INSERT INTO `tbterminal_anden` (`ID`, `Terminal_id`, `Nombre`) VALUES
(1, 1, 'Anden 11'),
(2, 1, 'Anden 12'),
(3, 1, 'Anden 13'),
(4, 1, 'Anden 14'),
(5, 2, 'Anden 21'),
(6, 2, 'Anden 22'),
(7, 2, 'Anden 23'),
(8, 2, 'Anden 24'),
(9, 2, 'Anden 25'),
(10, 2, 'Anden 26');

-- --------------------------------------------------------

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `ID` varchar(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbusuario`
--

INSERT INTO `tbusuario` (`ID`, `Nombre`, `Apellido`) VALUES
('1', 'Nombre1', 'Apellido1'),
('2', 'Nombre2', 'Apellido2'),
('3', 'Nombre3', 'Apellido3'),
('4', 'Nombre4', 'Apellido4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
