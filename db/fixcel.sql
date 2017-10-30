-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 06:28:38
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fixcel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE IF NOT EXISTS `categoria_productos` (
`id_categoria` int(11) NOT NULL,
  `descripcion_categoria` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Se almacenarán las categorias de los productos por ejemplo: Telefonos, cargad.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_barras`
--

CREATE TABLE IF NOT EXISTS `codigos_barras` (
`id_codigos_barras` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL COMMENT 'FK IdProducto Tabla Productos',
  `codigo_barras` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE IF NOT EXISTS `detalle_ventas` (
`id_detalle_venta` int(20) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_act_venta` float NOT NULL COMMENT 'Costo de venta en ese momento',
  `costo_act_proveedor` float NOT NULL COMMENT 'Costo del proveedor en ese momento',
  `ganancia` float NOT NULL,
  `fecha_venta` date NOT NULL,
  `hora_venta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(15) NOT NULL,
  `id_subcategoria` int(11) NOT NULL COMMENT 'Fk subcategoria Tabla Subcategoria',
  `descripcion_producto` text COLLATE utf8_unicode_ci NOT NULL,
  `costo_unitario` float NOT NULL COMMENT 'Costo al púbíco',
  `costo_proveedor` float NOT NULL COMMENT 'Costo real del proveedor',
  `stock_seguridad` int(5) NOT NULL COMMENT 'Stock para lanzar notificacion para surtir',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`id_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `stock_disponible` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias_productos`
--

CREATE TABLE IF NOT EXISTS `subcategorias_productos` (
`id_subcategoria` int(11) NOT NULL,
  `descripcion_subcategoria` text COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) NOT NULL COMMENT 'fk Tabla:categoria_productos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_user` int(11) NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `tipo` int(1) NOT NULL,
  `fecha_alta_usuario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha_ticket` int(11) NOT NULL,
  `total_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
 ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `codigos_barras`
--
ALTER TABLE `codigos_barras`
 ADD PRIMARY KEY (`id_codigos_barras`), ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
 ADD PRIMARY KEY (`id_detalle_venta`), ADD KEY `id_ticket` (`id_ticket`,`id_producto`), ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`), ADD KEY `id_subcategoria` (`id_subcategoria`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`id_stock`), ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `subcategorias_productos`
--
ALTER TABLE `subcategorias_productos`
 ADD PRIMARY KEY (`id_subcategoria`), ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`id_ticket`), ADD KEY `id_user` (`id_user`), ADD KEY `id_user_2` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `codigos_barras`
--
ALTER TABLE `codigos_barras`
MODIFY `id_codigos_barras` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
MODIFY `id_detalle_venta` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subcategorias_productos`
--
ALTER TABLE `subcategorias_productos`
MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `codigos_barras`
--
ALTER TABLE `codigos_barras`
ADD CONSTRAINT `FK idProducto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
ADD CONSTRAINT `FK idProducto detalle ventas` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK idTicket` FOREIGN KEY (`id_ticket`) REFERENCES `ventas` (`id_ticket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `fk_idSubcategorias` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias_productos` (`id_subcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
ADD CONSTRAINT `FK idProducto stock` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategorias_productos`
--
ALTER TABLE `subcategorias_productos`
ADD CONSTRAINT `fk_idCategoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_productos` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `FK idUser ventas` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
