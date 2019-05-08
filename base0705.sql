-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2019 a las 07:31:05
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
-- Estructura de tabla para la tabla `carrito_empresarial`
--

CREATE TABLE `carrito_empresarial` (
  `id_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `sku` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_personal`
--

CREATE TABLE `carrito_personal` (
  `id_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `sku` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carrito_personal`
--

INSERT INTO `carrito_personal` (`id_cliente`, `sku`, `cantidad`) VALUES
('30', 'caca', '1'),
(':CLiente', ':Producto', '1'),
('24', 'Productazo', '7');

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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(10000) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `correo`, `clave`, `fecha_registro`) VALUES
(1, 'a', 'a', 'shakamarquez2299@gmail.com', 'ekNDWm85ZVJZWGo4dEhxRVpHL2I0Zz09', '0000-00-00'),
(2, 'a', 'a', 'shakamarquez2299@gmail.com', 'ekNDWm85ZVJZWGo4dEhxRVpHL2I0Zz09', '22/04/2019'),
(3, 'a', 'a', 'shakamarquez2299@gmail.com', 'ekNDWm85ZVJZWGo4dEhxRVpHL2I0Zz09', '22/04/2019'),
(4, 'aasdf', 'MÃ¡rquez', 'shakamarquez2299@gmail.com', 'VHVmbENhNE5vNUN6N0Mxd2V0d1Q1dz09', '22/04/2019'),
(5, 'V', 'V', 'shakamarquez2299@gmail.com', 'ZzZqaklNdnQzalU4azFjdGtTWGJZUT09', '22/04/2019'),
(6, 'V', 'V', 'shakamarquez2299@gmail.com', 'ZzZqaklNdnQzalU4azFjdGtTWGJZUT09', '22/04/2019'),
(7, 'Shaka', 'Laka', 'ms@ms.com', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(8, 'Shaka', 'Laka', 'ms@mss.com', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(9, 'Shaka', 'Laka', 'ms@smss.com', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(10, 'Shaka', 'Laka', 'ms@smss.coma', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(11, 'Shaka', 'Laka', 'ms@smss.comas', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(12, 'Shaka', 'Laka', 'ms@smss.comass', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(13, 'Shaka', 'Laka', 'ms@smss.comasss', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(14, 'Shaka', 'Laka', 'mss@smss.comasss', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(15, 'Shaka', 'Laka', 'mss@smss.cos', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(16, 'Shaka', 'Laka', 'msasds@smss.cos', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(17, 'Shaka', 'Laka', 'prueba@prueba.com', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(18, 'Shaka', 'Laka', 'prueba@prueba.coms', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(19, 'Shaka', 'Laka', 'prueba@prueba.comss', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(20, 'Shaka', 'Laka', 'prueba@prueba.comssasdasd', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(21, 'Shaka', 'Laka', 'prueba@pru.c', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(22, 'Shaka', 'Laka', 'prueba@pru.cs', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(23, 'Shaka', 'Laka', 'prueba@pru.css', 'Q1IwdXBDcE0vZ2pOT2NXeStTYmx1UT09', '23/04/2019'),
(24, 'aaa', 'aaa', '1231232ss13@asd.com', 'eUY5cXYvSU1RRzlXbzRUV1NpZ090SVM5dWphRXFBcW1HNjR5TklSVytYTT0=', '23/04/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(20) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_descuento` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `regla_visitantes` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `regla_usuarios` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `regla_empresas` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `inicio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `vencimiento` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `nombre`, `descripcion`, `tipo_descuento`, `regla_visitantes`, `regla_usuarios`, `regla_empresas`, `inicio`, `vencimiento`) VALUES
(2, 'aasdf', '', 'porcentaje', '12', '13', '14', '2019-03-17', '2019-03-28'),
(3, 'Desca', '', 'porcentaje', '0', '0', '0', '2019-03-11', '2019-03-11'),
(4, 'Descuento para pruebas', 'Descuento para pruebas', 'porcentaje', '0', '50', '0', '2019-05-07', '2019-05-31'),
(5, 'id_descuento pruebas', 'id_descuento pruebas', 'fijo', '3', '6', '8', '2019-05-07', '2019-05-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos_relaciones`
--

CREATE TABLE `descuentos_relaciones` (
  `id_descuento` int(20) NOT NULL,
  `item` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `descuentos_relaciones`
--

INSERT INTO `descuentos_relaciones` (`id_descuento`, `item`, `tipo`) VALUES
(2, 'asdf', 'producto'),
(2, '7', 'categoria'),
(2, '12', 'etiqueta'),
(2, '14', 'categoria'),
(2, '3', 'marca'),
(3, 'dasfasdf', 'producto'),
(3, '13', 'categoria'),
(3, '12', 'etiqueta'),
(3, '24', 'marca'),
(4, 'Productazo', 'producto'),
(5, '52', 'categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `dpi` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `institucion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `ciudad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(10000) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `apellido`, `dpi`, `institucion`, `nit`, `direccion`, `departamento`, `ciudad`, `telefono`, `correo`, `clave`, `fecha_registro`) VALUES
(1, 'Jose', 'Marquez', '2989', 'JM SA', '123123', 'Ciudad Capital de Guatemala', 'Guatemala', 'Guatemala', '59543300', 'shakamarquezz2299@gmail.com', 'WXpLeXllUXM0T2tVbTZSQXNEejhCdENNZ1FienY0WWl5UXhBQnhGL1psND0=', '23/04/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `producto` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `medio` int(20) NOT NULL,
  `orden` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `galerias`
--

INSERT INTO `galerias` (`producto`, `medio`, `orden`) VALUES
('Prueba', 1, NULL),
('dasfasdf', 2, NULL),
('Prueba de especificaiones', 2, NULL),
('Prueba de especificaiones', 3, NULL),
('Prueba de especificaiones', 4, NULL),
('Prueba de especificaiones', 5, NULL),
('Productazo', 3, NULL),
('Productazo', 5, NULL),
('Productazo', 2, NULL),
('Calificacion2', 2, NULL);

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

--
-- Volcado de datos para la tabla `medios`
--

INSERT INTO `medios` (`id`, `titulo`, `url`, `fecha`) VALUES
(1, 'Medio', 'http://localhost/sosadmin/medios/5606.jpg', '15/02/2019'),
(2, 'Prueba 2', 'http://localhost/sosadmin/medios/pos.jpg', '18/02/2019'),
(3, 'Claro', 'http://localhost/sosadmin/medios/claro.jpg', '18/02/2019'),
(4, 'Oscuro', 'http://localhost/sosadmin/medios/oscuro.png', '18/02/2019'),
(5, 'Dell', 'http://localhost/sosadmin/medios/dell.png', '25/02/2019'),
(6, 'Banner', 'http://localhost/sosadmin/medios/banner.jpg', '25/02/2019'),
(7, 'Cool', 'http://localhost/sosadmin/productos/fondo-cool.jpg', '25/02/2019'),
(8, 'MSI', 'http://localhost/sosadmin/productos/msi.jpg', '03/04/2019'),
(9, 'Icono PC', 'http://localhost/sosadmin/medios/pc.png', '03/04/2019'),
(10, 'Para slider', 'http://localhost/sosadmin/medios/paraslide.jpg', '08/04/2019'),
(11, 'asdf', 'http://localhost/sosadmin/medios/BRG-SO-Template-Desktop-Footer.png', '28/04/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `sku` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `slug` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci,
  `especificaciones` longtext COLLATE utf8_spanish2_ci,
  `mpn` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fabricante` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nuevo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `oferta` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `calificacion` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `justificacion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`sku`, `nombre`, `slug`, `descripcion`, `especificaciones`, `mpn`, `fabricante`, `tipo`, `nuevo`, `precio`, `stock`, `oferta`, `calificacion`, `justificacion`, `fecha`) VALUES
('A Final', 'A Final', 'a-final', '<p>A Final</p>', '<p>A Final</p>', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:57:40'),
('AAAAAAAA', 'AAAAAAAAA', 'aaaaaaaaa', '', '', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:31:53'),
('ahora si', 'nombre de ahora si', 'nombre-de-ahora-si', '<p>descripcion de ahora si</p>', '<p><span style=\"color:#afafaf\">especificaciones de ahora si</span></p>\r\n\r\n<p><input alt=\"\" src=\"http://localhost/sosadmin/productos/banner.jpg\" style=\"width: 100%\" type=\"image\" /></p>', '', '', '', 'no', '18.35', '0', 'no', '3', '', '2019/04/03 15:58:16'),
('asdf', '213', '213', 'asdfsadf', '', '', '', '', 'no', '12', '0', 'no', '', '', '2019/02/15 23:22:16'),
('asdfasdf', 'asdfsadf2', 'asdfsadf2', 'asdfsadf', '<p>ASDASD</p>', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:43:54'),
('asdfasdfasdf', 'asdfsadf', 'asdfsadf', 'asdfsdf', '', '', '', '', 'no', '0', '0', 'no', '0', '', '2019/04/03 15:34:12'),
('asdffsadfas', 'asdffasdfasd', 'asdffasdfasd', '', '', '', '', '', 'no', '0', '0', 'no', '5', '<p>asdfasdf</p>', '2019/05/02 01:48:16'),
('Calificacion', 'Calificacion', 'calificacion', '', '', '', '', '', 'no', '0', '0', 'no', '3', '', '2019/05/02 01:49:11'),
('Calificacion2', 'Calificacion2', 'calificacion2', '<p><span style=\"font-size:20px\">asdfasdfasdf</span></p>', '', '', '', '', 'no', '0', '0', 'no', '3', '<p>Justificacion</p>', '2019/05/02 01:49:49'),
('dasfasdf', '213123', '213123', 'asdfas', '', '', '', '', 'no', '11', '0', 'no', '', '', '2019/02/18 22:25:46'),
('eva', 'eva', 'eva', '', '', '', '', '', 'no', '0', '0', 'no', '5', '', '2019/05/02 01:43:25'),
('Final', 'Final', 'final', '', '', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:56:26'),
('lola', 'lola', 'lola', '', '', '', '', '', 'no', '0', '0', 'no', '0', '', '2019/05/07 22:40:52'),
('PR', 'PR', 'pr', '', '', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/02 21:15:25'),
('Preuaba con script', 'Preuaba con script', 'preuaba-con-script', 'Preuaba con script', '<p>Preuaba con script</p>', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:52:51'),
('Productazo', 'Porductazo', 'porductazo', '<p style=\"text-align:center\">Es un producto descripcion</p>', '<p>Es un producto</p>', '123', '', '', 'no', '12', '0', 'no', '4', '<p>Es la verga</p>', '2019/04/15 21:45:24'),
('Prueba', 'adsf', 'adsf', 'asdf', '', '', '', '', 'no', '12', '0', 'no', '', '', '2019/02/15 22:54:38'),
('Prueba Con Especificaciones', 'Prueba Con Especificaciones', 'prueba-con-especificaciones', 'Prueba Con Especificaciones', '', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:44:43'),
('Prueba Con Especificaciones 2', 'Prueba Con Especificaciones 2', 'prueba-con-especificaciones-2', 'ASDF', '', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:46:47'),
('Prueba con guardado', 'Prueba con guardado', 'prueba-con-guardado', 'Prueba con guardado', '<p>Prueba con guardado</p>', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:47:46'),
('Prueba de especificaiones', 'Prueba de especificaiones', 'prueba-de-especificaiones', 'Prueba de especificaiones', 'Prueba de especificaiones edicion', '', '', '', 'no', '12', '0', 'no', '0', '', '2019/04/02 20:07:08'),
('Prueba Final', 'Prueba Final', 'prueba-final', '', '', '', '', '', 'no', '0', '0', 'no', '', '', '2019/04/03 15:55:10'),
('Sin', 'SIn', 'sin', '', '', '', '', '', 'no', '0', '0', 'no', '', '', '2019/02/15 22:56:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglas`
--

CREATE TABLE `reglas` (
  `id_categoria` int(20) NOT NULL,
  `regla_visitantes` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `regla_usuarios` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `regla_empresas` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `reglas`
--

INSERT INTO `reglas` (`id_categoria`, `regla_visitantes`, `regla_usuarios`, `regla_empresas`) VALUES
(7, '0', '0', '0'),
(10, '12', '13', '14'),
(13, '0', '0', '0'),
(14, '0', '0', '0'),
(15, '0', '0', '0'),
(16, '0', '0', '0'),
(17, '0', '0', '0'),
(18, '0', '0', '0'),
(19, '0', '0', '0'),
(20, '0', '0', '0'),
(33, '0', '0', '0'),
(39, '0', '0', '0'),
(40, '0', '0', '0'),
(41, '0', '0', '0'),
(42, '0', '0', '0'),
(43, '0', '0', '0'),
(44, '0', '0', '0'),
(45, '0', '0', '0'),
(46, '0', '0', '0'),
(47, '0', '0', '0'),
(49, '0', '0', '0'),
(50, '0', '0', '0'),
(51, '0', '0', '0'),
(52, '0.3', '0', '0.1'),
(53, '1', '2', '3'),
(57, '0', '0', '0'),
(58, '0', '0', '0'),
(59, '0', '100', '0'),
(60, '0,2', '100', '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones`
--

CREATE TABLE `relaciones` (
  `sku` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `id_taxonomia` int(20) NOT NULL,
  `orden` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `relaciones`
--

INSERT INTO `relaciones` (`sku`, `id_taxonomia`, `orden`) VALUES
('Prueba', 7, NULL),
('Prueba', 6, NULL),
('Sin', 7, NULL),
('asdf', 7, NULL),
('dasfasdf', 10, NULL),
('dasfasdf', 6, NULL),
('PR', 13, NULL),
('a', 13, NULL),
('03 04 19', 13, NULL),
('03 04 19 2', 13, NULL),
('', 13, NULL),
('AAAAAAAA', 13, NULL),
('Prueba Con Especificaciones', 13, NULL),
('Prueba con guardado', 13, NULL),
('Preuaba con script', 13, NULL),
('Prueba Final', 13, NULL),
('Final', 13, NULL),
('A Final', 13, NULL),
('Productazo', 52, NULL),
('Productazo', 29, NULL),
('ahora si', 29, NULL),
('ahora si', 52, NULL),
('Prueba Con Especificaciones 2', 7, NULL),
('Prueba Con Especificaciones 2', 29, NULL),
('asdfasdf', 16, NULL),
('asdfasdf', 29, NULL),
('asdfasdfasdf', 29, NULL),
('asdfasdfasdf', 41, NULL),
('eva', 13, NULL),
('asdffsadfas', 47, NULL),
('Calificacion', 41, NULL),
('Calificacion2', 13, NULL),
('Calificacion2', 3, NULL),
('asdfasdfasdf', 12, NULL),
('Productazo', 12, NULL),
('Prueba de especificaiones', 57, NULL),
('lola', 53, NULL);

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
  `icono` int(20) DEFAULT NULL,
  `icono2` int(20) NOT NULL,
  `color` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `taxonomias`
--

INSERT INTO `taxonomias` (`id`, `nombre`, `slug`, `taxonomia`, `descripcion`, `padre`, `icono`, `icono2`, `color`) VALUES
(3, 'HP', 'hp', 'marca', '', NULL, 5, 0, 'FFFFFF'),
(5, 'MSI', 'msi', 'marca', '', NULL, 2, 0, 'FFFFFF'),
(6, 'FULL', 'full', 'marca', 'Full', NULL, 1, 0, NULL),
(7, 'Cat', 'cat', 'categoria', 'Nueva descripcion 2', 0, 4, 4, NULL),
(8, 'Marca con dos iconos', 'marca-con-dos-iconos', 'marca', '', NULL, 1, 1, NULL),
(9, 'Prueba 2 imgs', 'prueba-2-imgs', 'marca', '', NULL, 2, 2, NULL),
(10, 'Prueba con imgs', 'prueba-con-imgs', 'categoria', '', 7, 4, 4, NULL),
(11, 'Marca con color', 'marca-con-color', 'marca', 'Desc', NULL, 1, 1, '1762D2'),
(12, 'a', 'a', 'etiqueta', '', NULL, NULL, 0, NULL),
(13, 'a', 'a', 'categoria', '', 0, 4, 4, NULL),
(14, 'av', 'av', 'categoria', '', 0, 4, 4, NULL),
(15, 'Prueba', 'prueba', 'categoria', '', 0, 4, 4, NULL),
(16, 'COca', 'coca', 'categoria', '', 0, 4, 4, NULL),
(17, 'Categoria con vista', 'categoria-con-vista', 'categoria', '', 0, 4, 4, NULL),
(18, 'Prueba2', 'prueba2', 'categoria', '', 0, 4, 4, NULL),
(19, 'Prueba2', 'prueba2a', 'categoria', '', 0, 4, 4, NULL),
(20, 'Prueba2asdf', 'prueba2asdf', 'categoria', '', 0, 4, 4, NULL),
(21, 'Marca con todo', 'marca-con-todo', 'marca', '', NULL, 0, 0, '834040'),
(22, 'Marca con todo 2', 'marca-con-todo-2', 'marca', '', NULL, 0, 0, '834040'),
(23, 'Pru', 'pru', 'marca', '', NULL, 0, 0, '2AFF63'),
(24, 'ASD', 'asd', 'marca', 'A', NULL, 0, 0, 'FFFFFF'),
(25, 'asdfasdfasdf', 'asdfasdfasdf', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(26, 'Nueva', 'nueva', 'marca', '', NULL, 0, 0, '3EFF0E'),
(27, 'Ultima', 'ultima', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(28, 'Pruebisima', 'pruebisima', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(29, 'Marca', 'marca', 'marca', 'Esta es la descripcion para la marca', NULL, 5, 3, '194FFF'),
(30, 'A', 'a', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(31, 'Facebook', 'facebook', 'marca', '', NULL, 1, 3, '6D23FF'),
(32, 'Banner', 'banner', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(33, 'CATO', 'cato', 'categoria', '', 0, 4, 4, NULL),
(36, 'Marcota', 'marcota', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(37, 'Marca con cabecera', 'marca-con-cabecera', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(38, 'Con cabecera', 'con-cabecera', 'marca', '', NULL, 0, 0, 'FFFFFF'),
(39, 'Cat con Cabecera', 'cat-con-cabecera', 'categoria', '', 0, 4, 4, NULL),
(40, 'Nueva categoria con cabecera', 'nueva-categoria-con-cabecera', 'categoria', '', 0, 4, 4, NULL),
(41, 'cabecera', 'cabecera', 'categoria', '', 7, 4, 4, NULL),
(42, 'Prueba2131', 'prueba2131', 'categoria', '', 0, 4, 4, NULL),
(43, 'Prueba213112', 'prueba213112', 'categoria', '', 0, 4, 4, NULL),
(44, 'Prueba213112', 'pruba213112', 'categoria', '', 0, 4, 4, NULL),
(45, 'Prueba213112', 'pruba2131asd12', 'categoria', '', 0, 4, 4, NULL),
(46, 'Prueba213112', 'pruba213asdf1asd12', 'categoria', '', 0, 4, 4, NULL),
(47, 'asdfasdfsadfsadf', 'asdfasdfsadfsadf', 'categoria', '', 0, 4, 4, NULL),
(48, 'Categ', 'categ', 'marca', 'Categoria', NULL, 5, 4, '5974FF'),
(49, 'C', 'c', 'categoria', '', 0, 4, 4, NULL),
(50, 'P', 'p', 'categoria', '', 0, 4, 4, NULL),
(51, 'v', 'v', 'categoria', '', 0, 4, 4, NULL),
(52, 'Oficina & ImpresiÃ³n', 'oficina-and-impresion', 'categoria', 'Lo que necesitas para hacer tu trabajo bien.', 41, 4, 4, NULL),
(53, 'Hijo', 'hijo', 'categoria', 'Este es el hijo', 52, 4, 4, NULL),
(54, 'Dell laptops', 'dell-laptops', 'marca', 'dell laptops', NULL, 5, 5, 'FFFFFF'),
(55, 'HP', 'hp', 'marca', '', NULL, 5, 0, 'FFFFFF'),
(56, 'Cat', 'cat', 'categoria', 'Nueva descripcion 2', 0, 4, 4, NULL),
(57, 'Me vio y se fue', 'me-vio-y-se-fue', 'categoria', 'asdfasdfsadfsdf', 0, 0, 0, NULL),
(58, 'Me vio y se fue jajaa', 'me-vio-y-se-fue-jajaa', 'categoria', 'asdfasdfsadfsdf', 0, 0, 0, NULL),
(59, 'Me visse fue jajaa', 'me-visse-fue-jajaa', 'categoria', 'asdfasdfsadfsdf', 0, 0, 0, NULL),
(60, 'Me visse fue jajaa12', 'me-visse-fue-jajaa12', 'categoria', 'asdfasdfsadfsdf', 0, 0, 0, NULL),
(61, 'lola', 'lola', 'marca', 'lola', NULL, 0, 0, 'FFFFFF');

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
(1, 'Super', 'Admin', 'admin', 'dDFaWHVLaFVxTFlUTEtKb2lreTdWQT09', 'jose@aplitic.com.gt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistas`
--

CREATE TABLE `vistas` (
  `vista` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `contenido` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vistas`
--

INSERT INTO `vistas` (`vista`, `contenido`) VALUES
('home', '[{\"slide1\":[\"https:\\/\\/www.google.com\\/aasdf\",\"10\"]},{\"slide2\":[\"https:\\/\\/www.google.com\\/\",\"10\"]},{\"slide3\":[\"https:\\/\\/www.google.com\\/\",\"10\"]},{\"slide4\":[\"https:\\/\\/www.google.com\\/\",\"10\"]},{\"slide5\":[\"\",\"\"]},{\"slide6\":[\"\",\"\"]},{\"slide7\":[\"\",\"\"]},{\"slide8\":[\"\",\"\"]},{\"slide9\":[\"\",\"\"]},{\"slide10\":[\"\",\"\"]},{\"banner1\":[\"https:\\/\\/www.google.com\\/nueva\\/\",\"6\"]},{\"banner2\":[\"https:\\/\\/www.google.com\\/\",\"6\"]}]'),
('header', '{\"marcas\":[\"3\",\"5\",\"6\",\"8\",\"9\",\"11\",\"22\",\"23\",\"25\",\"29\"],\"categorias\":[\"7\",\"10\",\"14\",\"15\",\"16\",\"33\",\"52\"]}'),
('categorias', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistas_personalizadas`
--

CREATE TABLE `vistas_personalizadas` (
  `id_taxonomia` int(20) NOT NULL,
  `slides` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `columnas` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `banner` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `marcas` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `cabecera` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vistas_personalizadas`
--

INSERT INTO `vistas_personalizadas` (`id_taxonomia`, `slides`, `columnas`, `banner`, `marcas`, `cabecera`) VALUES
(17, 'Array', 'Array', 'Array', 'Array', ''),
(18, 'Array', 'Array', 'Array', '6', ''),
(20, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"1\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"1\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"1\"}]', '[\"6\"]', ''),
(24, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"1\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"1\"}]', '[]', '', ''),
(25, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"2\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"2\"}]', '[]', '', ''),
(26, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"1\"}]', '[]', '[]', '', ''),
(29, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"3\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"3\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"2\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-marca\\/\",\"img\":\"6\"}]', '', '[{\"cabecera\":\"cabecera\",\"img\":\"7\"}]'),
(31, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"1\"}]', '[]', '[]', '', ''),
(32, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-marca\\/\",\"img\":\"1\"}]', '[]', 'true', '', ''),
(33, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"1\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"1\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"1\"}]', '[\"30\",\"24\"]', ''),
(37, '[]', '[]', '[]', '', ''),
(38, '[]', '[]', '[]', '', '[{\"cabecera\":\"cabecera\",\"img\":\"2\"}]'),
(47, '[]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"3\"}]', '[]', '[]', 'null'),
(51, '[]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/nueva-categoria\\/\",\"img\":\"1\"}]', '[]', '[]', 'null'),
(52, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"1\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"1\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"2\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-categoria\\/\",\"img\":\"6\"}]', '[\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\",\"54\"]', '[{\"cabecera\":\"cabecera\",\"img\":\"7\"}]'),
(48, '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-marca\\/\",\"img\":\"1\"},{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-marca\\/\",\"img\":\"2\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-marca\\/\",\"img\":\"1\"}]', '[{\"url\":\"http:\\/\\/localhost\\/sosadmin\\/editar-marca\\/\",\"img\":\"6\"}]', '', '[{\"cabecera\":\"cabecera\",\"img\":\"7\"}]'),
(53, '[]', '[]', '[]', '[]', '[{\"cabecera\":\"cabecera\",\"img\":\"1\"}]');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `reglas`
--
ALTER TABLE `reglas`
  ADD PRIMARY KEY (`id_categoria`);

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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `taxonomias`
--
ALTER TABLE `taxonomias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
