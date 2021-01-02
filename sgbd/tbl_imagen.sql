-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2020 a las 06:59:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vendedor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen`
--

CREATE TABLE `tbl_imagen` (
  `id_imagen` int(11) NOT NULL,
  `ruta` varchar(300) NOT NULL,
  `color` varchar(130) NOT NULL,
  `id_detalle_kardex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_imagen`
--

INSERT INTO `tbl_imagen` (`id_imagen`, `ruta`, `color`, `id_detalle_kardex`) VALUES
(1, 'http://localhost/vendedor_electronico/assets/imagen/producto/1508922565_891772_1508943274_noticia_normal.jpg', 'negro', 1),
(2, 'http://localhost/vendedor_electronico/assets/imagen/producto/descarga.jpg', 'negro', 1),
(3, 'http://localhost/vendedor_electronico/assets/imagen/producto/plato-3-300x300.jpg', 'azul', 2),
(4, 'http://localhost/vendedor_electronico/assets/imagen/producto/unnamed.png', 'rosa', 2),
(5, 'http://localhost/vendedor_electronico/assets/imagen/producto/descarga (1).jpg', 'negro', 3),
(6, 'https://tottoecuador.vteximg.com.br/arquivos/ids/222772-1000-1000/AC51IND792-1920C-N01-PRINCIPAL.jpg?v=637078753859770000', 'linea azul', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_imagen`
--
ALTER TABLE `tbl_imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_imagen`
--
ALTER TABLE `tbl_imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
