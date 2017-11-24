-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2017 a las 01:22:11
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
-- Estructura de tabla para la tabla `anulacion_ventas`
--

CREATE TABLE IF NOT EXISTS `anulacion_ventas` (
`id_anulacion` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_anulacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Registro de las ventas anuladas after  del status de ventas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE IF NOT EXISTS `categoria_productos` (
`id_categoria` int(11) NOT NULL,
  `descripcion_categoria` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Se almacenarán las categorias de los productos por ejemplo: Telefonos, cargad.';

--
-- Volcado de datos para la tabla `categoria_productos`
--

INSERT INTO `categoria_productos` (`id_categoria`, `descripcion_categoria`) VALUES
(1, 'Telefonía'),
(2, 'Micas'),
(3, 'Cargadores'),
(4, 'Fundas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_barras`
--

CREATE TABLE IF NOT EXISTS `codigos_barras` (
`id_codigos_barras` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL COMMENT 'FK IdProducto Tabla Productos',
  `codigo_barras` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `codigos_barras`
--

INSERT INTO `codigos_barras` (`id_codigos_barras`, `id_producto`, `codigo_barras`) VALUES
(1, 1, '00000000001'),
(2, 2, '00000000002'),
(3, 3, '00000000003'),
(4, 4, '00000000004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE IF NOT EXISTS `detalle_ventas` (
`id_detalle_venta` int(20) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_act_venta` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Costo de venta en ese momento',
  `costo_act_proveedor` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Costo del proveedor en ese momento',
  `ganancia` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_venta` date NOT NULL,
  `hora_venta` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id_detalle_venta`, `id_ticket`, `id_producto`, `cantidad`, `costo_act_venta`, `costo_act_proveedor`, `ganancia`, `fecha_venta`, `hora_venta`) VALUES
(1, 1, 1, 1, '9000', '8000', '1000', '2017-11-22', '13:48:08'),
(2, 1, 1, 1, '9000', '8000', '1000', '2017-11-22', '13:48:08'),
(3, 2, 1, 1, '9000', '8000', '1000', '2017-11-22', '13:48:20'),
(4, 2, 1, 1, '9000', '8000', '1000', '2017-11-22', '13:48:20'),
(5, 2, 1, 1, '9000', '8000', '1000', '2017-11-22', '13:48:20'),
(6, 2, 1, 1, '9000', '8000', '1000', '2017-11-22', '13:48:20'),
(7, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(8, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(9, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(10, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(11, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(12, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(13, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(14, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(15, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(16, 3, 4, 1, '22000', '20000', '2000', '2017-11-22', '13:50:40'),
(17, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(18, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(19, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(20, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(21, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(22, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(23, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(24, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(25, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(26, 4, 3, 1, '13500', '12000', '1500', '2017-11-22', '13:51:44'),
(27, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(28, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(29, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(30, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(31, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(32, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(33, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(34, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(35, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24'),
(36, 5, 2, 1, '30000', '25000', '5000', '2017-11-22', '13:52:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_subcategoria`, `descripcion_producto`, `costo_unitario`, `costo_proveedor`, `stock_seguridad`, `fecha_registro`) VALUES
(1, 1, 'Iphone 6 32GB', 9000, 8000, 3, '2017-11-10 03:48:10'),
(2, 1, 'Iphone X 128 GB', 30000, 25000, 3, '2017-11-22 18:03:53'),
(3, 2, 'G6 64 GB', 13500, 12000, 3, '2017-11-15 02:56:11'),
(4, 1, 'Iphone 8 Plus 128 GB', 22000, 20000, 3, '2017-11-22 18:03:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`id_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `stock_disponible` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_stock`, `id_producto`, `stock_disponible`) VALUES
(1, 1, 4),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias_productos`
--

CREATE TABLE IF NOT EXISTS `subcategorias_productos` (
`id_subcategoria` int(11) NOT NULL,
  `descripcion_subcategoria` text COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) NOT NULL COMMENT 'fk Tabla:categoria_productos'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias_productos`
--

INSERT INTO `subcategorias_productos` (`id_subcategoria`, `descripcion_subcategoria`, `id_categoria`) VALUES
(1, 'Apple', 1),
(2, 'LG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_user` int(11) NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varbinary(200) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 = Inactivo, 1= Activo',
  `tipo` int(1) NOT NULL COMMENT '0 = Empleado y 1 = Admin',
  `fecha_alta_usuario` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nickname`, `password`, `nombre`, `apellido_paterno`, `apellido_materno`, `direccion`, `telefono`, `correo`, `status`, `tipo`, `fecha_alta_usuario`) VALUES
(1, 'iespino', 0x646576, 'Ignacio', 'Espino', 'Rivera', 'Mariano', '8539911475', 'iespino69@gmail.com', 1, 1, '2017-11-03 00:20:05'),
(3, 'ecardenas', 0x656d6572, 'Emerson', 'Cardenas', 'Casas', 'Imparcial', '789547895', 'emerson@gmail.com', 1, 0, '2017-11-03 00:22:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha_ticket` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_venta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status_ticket` int(2) NOT NULL COMMENT '0= Anulado y 1= Activo'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ticket`, `id_user`, `fecha_ticket`, `total_venta`, `status_ticket`) VALUES
(1, 1, '2017-11-22 19:48:08', '18000', 1),
(2, 1, '2017-11-22 19:48:20', '36000', 1),
(3, 1, '2017-11-22 19:50:40', '220000', 1),
(4, 1, '2017-11-22 19:51:45', '135000', 1),
(5, 1, '2017-11-22 19:52:24', '300000', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anulacion_ventas`
--
ALTER TABLE `anulacion_ventas`
 ADD PRIMARY KEY (`id_anulacion`), ADD KEY `id_ticket` (`id_ticket`,`id_user`), ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT de la tabla `anulacion_ventas`
--
ALTER TABLE `anulacion_ventas`
MODIFY `id_anulacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `codigos_barras`
--
ALTER TABLE `codigos_barras`
MODIFY `id_codigos_barras` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
MODIFY `id_detalle_venta` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `subcategorias_productos`
--
ALTER TABLE `subcategorias_productos`
MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anulacion_ventas`
--
ALTER TABLE `anulacion_ventas`
ADD CONSTRAINT `FK idTicketAnulacion` FOREIGN KEY (`id_ticket`) REFERENCES `ventas` (`id_ticket`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK idUsertAnulacion` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
