-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-10-2020 a las 03:19:36
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliares`
--

DROP TABLE IF EXISTS `auxiliares`;
CREATE TABLE IF NOT EXISTS `auxiliares` (
  `idauxiliares` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idtabla` int(11) DEFAULT NULL COMMENT 'Numero de la tabla',
  `idsubtabla` int(11) DEFAULT NULL COMMENT 'Secuencia de la tabla',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre de la tabla',
  `descripcion` varchar(50) DEFAULT NULL COMMENT 'Contenido de cada tabla',
  `condicion` bit(1) DEFAULT NULL COMMENT 'Para realizar borrado lógico',
  PRIMARY KEY (`idauxiliares`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

DROP TABLE IF EXISTS `bodega`;
CREATE TABLE IF NOT EXISTS `bodega` (
  `idcatalogo` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idpresentacion` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idmedida` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idtienda` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `condicion` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idcatalogo`,`idproducto`,`idcategoria`,`idpresentacion`,`idmedida`,`idtienda`),
  KEY `fk_catalogo_producto_idx` (`idproducto`) USING BTREE,
  KEY `fk_bodega_tienda_idx` (`idtienda`) USING BTREE,
  KEY `producto_bodega_fk` (`idproducto`,`idcategoria`,`idpresentacion`,`idmedida`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `idcarrito` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idcarrito`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritodetalle`
--

DROP TABLE IF EXISTS `carritodetalle`;
CREATE TABLE IF NOT EXISTS `carritodetalle` (
  `idcarritoDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idpresentacion` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idmedida` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idcarrito` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idcarritoDetalle`,`idproducto`,`idcategoria`,`idpresentacion`,`idmedida`,`idcarrito`),
  KEY `fk_carritodetalle_carrito_idx` (`idcarrito`) USING BTREE,
  KEY `fk_carritodetalle_producto_idx` (`idproducto`) USING BTREE,
  KEY `producto_carritodetalle_fk` (`idproducto`,`idcategoria`,`idpresentacion`,`idmedida`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL COMMENT 'Clave Primaria',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre de la Categoria',
  `descripcion` varchar(256) DEFAULT NULL COMMENT 'Descripción de la categoria',
  `condicion` bit(1) DEFAULT NULL COMMENT 'Borrar lógico',
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `nombre_unique` (`nombre`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL COMMENT 'codigo producto',
  `idcategoria` int(11) NOT NULL,
  `idpresentacion` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idmedida` int(11) NOT NULL COMMENT 'Clave Primaria',
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) DEFAULT NULL COMMENT 'Descuento',
  PRIMARY KEY (`iddetalle_venta`,`idventa`,`idproducto`,`idcategoria`,`idpresentacion`,`idmedida`),
  KEY `fk_detalle_venta_venta_idx` (`idventa`) USING BTREE,
  KEY `fk_detalle_venta_producto` (`idproducto`) USING BTREE,
  KEY `producto_detalle_venta_fk` (`idcategoria`,`idpresentacion`,`idmedida`,`idproducto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

DROP TABLE IF EXISTS `modulos`;
CREATE TABLE IF NOT EXISTS `modulos` (
  `idmodulo` int(11) NOT NULL,
  `tilo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idrol` int(11) NOT NULL,
  `idmodulo` int(11) NOT NULL,
  PRIMARY KEY (`idpermiso`,`idrol`,`idmodulo`),
  KEY `modulos_permiso_fk` (`idmodulo`),
  KEY `rol_permiso_fk` (`idrol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) NOT NULL,
  `idpresentacion` int(11) NOT NULL COMMENT 'Clave Primaria',
  `idmedida` int(11) NOT NULL COMMENT 'Clave Primaria',
  `codigo` varchar(50) DEFAULT NULL COMMENT 'Código de barra de códigos',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Describe subcategorias del produto',
  `precio` double DEFAULT NULL COMMENT 'Precio venta',
  `stock` int(11) DEFAULT NULL COMMENT 'stock del producto',
  `descripcion` varchar(256) DEFAULT NULL COMMENT 'Características del producto',
  `imagen` varchar(45) DEFAULT NULL COMMENT 'Imagen del producto',
  `condicion` bit(1) DEFAULT NULL COMMENT 'Utilizado realizar borrado lógico',
  PRIMARY KEY (`idproducto`,`idcategoria`,`idpresentacion`,`idmedida`),
  KEY `fk_producto_categoria` (`idcategoria`) USING BTREE,
  KEY `auxiliares_producto_fk` (`idpresentacion`),
  KEY `auxiliares_producto_fk1` (`idmedida`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idrol`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`, `descripcion`, `status`) VALUES
(1, 'Repartidor', 'Reparte la ventas realizadas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

DROP TABLE IF EXISTS `tienda`;
CREATE TABLE IF NOT EXISTS `tienda` (
  `idtienda` int(11) NOT NULL COMMENT 'Clave primaria',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre de la tienda',
  `provincia` varchar(50) DEFAULT NULL COMMENT 'Provincia de la tienda',
  `ciudad` varchar(50) DEFAULT NULL COMMENT 'Ciudad de la tienda',
  `direccion` varchar(100) DEFAULT NULL COMMENT 'Dirección de la tienda',
  `latitud` double DEFAULT NULL COMMENT 'Latidud de la tienda',
  `longitud` double DEFAULT NULL COMMENT 'Longitud de la tienda',
  `condicion` bit(1) DEFAULT NULL COMMENT 'Borrado lógico',
  PRIMARY KEY (`idtienda`),
  UNIQUE KEY `constraint_nombre` (`nombre`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primeria',
  `idrol` int(11) NOT NULL DEFAULT 1,
  `nombre` varchar(69) NOT NULL COMMENT 'Nombre del usuario',
  `idtienda` int(11) DEFAULT 1 COMMENT 'Identificación Tienda',
  `cedula` varchar(10) NOT NULL COMMENT 'Cedula del cliente',
  `direccion` varchar(100) NOT NULL COMMENT 'Dirección usuario',
  `telefono` varchar(20) NOT NULL COMMENT 'Telefono del usuario',
  `email` varchar(50) NOT NULL COMMENT 'email del usurio',
  `cargo` varchar(20) DEFAULT NULL COMMENT 'Cargo del usuario',
  `login` varchar(20) NOT NULL COMMENT 'Login del usuario',
  `clave` varchar(150) NOT NULL COMMENT 'Clave del usuario',
  `codPostal` int(6) NOT NULL COMMENT 'Longitud del usuario',
  `tipoUsuario` varchar(45) NOT NULL COMMENT 'Tipo de usuario',
  `ciudad` varchar(50) NOT NULL COMMENT 'Ciudad de residencia',
  `imagen` varchar(50) DEFAULT NULL COMMENT 'Foto de usuario',
  `condicion` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Borrado Lógico',
  PRIMARY KEY (`idusuario`,`idrol`),
  UNIQUE KEY `login_unique` (`login`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  KEY `rol_usuario_fk` (`idrol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL COMMENT 'Clave primeria',
  `idtienda` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL COMMENT 'codigo cliente',
  `idrepartidor` int(11) DEFAULT NULL COMMENT 'Codigo repartidor',
  `tipo_comprobante` varchar(20) DEFAULT NULL COMMENT 'Tipocomprobante',
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) DEFAULT NULL COMMENT 'Número del comprobante',
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'hora de registro',
  `impuesto` decimal(4,2) DEFAULT NULL COMMENT 'Impuesto',
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fechaEntrega` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'fecha de entrega',
  `ruta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idventa`,`idusuario`),
  KEY `fk_vena_tienda_idx` (`idtienda`) USING BTREE,
  KEY `fk_venta_cliente` (`idcliente`) USING BTREE,
  KEY `usuario_venta_fk` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
