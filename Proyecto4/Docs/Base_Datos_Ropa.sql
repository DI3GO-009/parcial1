-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 04:04:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sexto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ropa`
--

CREATE TABLE `ropa` (
  `Ropaid` int(11) NOT NULL,
  `Codigo` int(10) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Modelo` varchar(70) NOT NULL,
  `Precio` double NOT NULL,
  `Talla` int(11) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ropa`
--

INSERT INTO `ropa` (`Ropaid`, `Codigo`, `Cantidad`, `Tipo`, `Modelo`, `Precio`, `Talla`, `Color`, `Marca`) VALUES
(1, 1001, 10, 'Pantalon', 'Jean', 60, 32, 'Azul', 'Tommy'),
(3, 1002, 20, 'Camiseta', 'Cuello V', 35, 12, 'Rojo', 'Nautica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ropa`
--
ALTER TABLE `ropa`
  ADD PRIMARY KEY (`Ropaid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ropa`
--
ALTER TABLE `ropa`
  MODIFY `Ropaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla ropa
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
