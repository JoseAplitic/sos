-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2019 a las 06:59:20
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soswebstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `usuario` int(20) NOT NULL,
  `tipo_usuario` int(20) NOT NULL,
  `sku` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `clasificacion` int(20) NOT NULL,
  `fecha` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `producto` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `medio` int(20) NOT NULL,
  `orden` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

CREATE TABLE `medios` (
  `id` int(20) NOT NULL,
  `titulo` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `url` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `sku` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `slug` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `mpn` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fabricante` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nuevo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(11,0) NOT NULL,
  `precio_visitantes` decimal(11,0) NOT NULL,
  `precio_usuarios` decimal(11,0) NOT NULL,
  `precio_empresas` decimal(11,0) NOT NULL,
  `stock` int(20) DEFAULT NULL,
  `oferta` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones`
--

CREATE TABLE `relaciones` (
  `sku` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `id_taxonomia` int(20) NOT NULL,
  `orden` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxonomias`
--

CREATE TABLE `taxonomias` (
  `id` int(20) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `taxonomia` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `padre` int(20) DEFAULT NULL,
  `icono` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(10000) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `clave`, `correo`) VALUES
(1, 'Super', 'Admin', 'user', 'dDFaWHVLaFVxTFlUTEtKb2lreTdWQT09', 'jose@aplitic.com.gt');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medios`
--
ALTER TABLE `medios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`sku`);

--
-- Indices de la tabla `taxonomias`
--
ALTER TABLE `taxonomias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `taxonomias`
--
ALTER TABLE `taxonomias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
