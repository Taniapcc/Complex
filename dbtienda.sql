-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-10-2020 a las 01:11:04
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
-- Base de datos: `dbtienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliares`
--

DROP TABLE IF EXISTS `auxiliares`;
CREATE TABLE IF NOT EXISTS `auxiliares` (
  `idauxiliares` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `idtabla` int(11) NOT NULL COMMENT 'Numero de la tabla',
  `idsubtabla` int(11) NOT NULL COMMENT 'Secuencia de la tabla',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'Contenido de cada tabla',
  `condicion` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Para realizar borrado lógico',
  PRIMARY KEY (`idauxiliares`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auxiliares`
--

INSERT INTO `auxiliares` (`idauxiliares`, `idtabla`, `idsubtabla`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 1, 0, 'Presentacion', 'Tabla que contiene las presentaciones', 1),
(2, 2, 0, 'Medida', 'Tabla que describe las unidades de medida', 1),
(3, 1, 1, 'FUNDAS', 'Funda para leche', 1),
(4, 1, 2, 'CARTON', 'Descripción del cartón', 1),
(14, 1, 3, 'TETRAPACK', 'Para todos los productos', 1),
(15, 1, 4, 'BOTELLA', 'Envase para dulces', 1),
(16, 2, 1, 'LTRS', 'Unidad de medida litro', 1),
(17, 2, 2, 'LBRS', 'Unidad de medida libras', 1),
(18, 3, 0, 'Rol', 'Define rol del usuario', 1),
(19, 1, 5, 'FRASCO', 'Frasco', 1),
(20, 3, 1, 'ADMIN', 'Administrador del sistema', 1),
(21, 3, 2, 'ADMINISTRADOR', 'Administradores de almacenes', 1),
(22, 3, 3, 'VENDEDOR', 'Rol que realiza ventas', 1),
(23, 3, 4, 'REPARTIDOR', 'Rol encargado de realizar la entrega de los produc', 1),
(24, 3, 5, 'ANONIMO', 'Rol que usan los clientes cuando se registras', 1),
(25, 2, 3, 'GRS', 'Gramos', 1),
(26, 1, 6, 'TARRINA', 'TARRINA', 1),
(27, 1, 7, 'XXXXX', 'xxxxx', 0),
(28, 2, 4, 'KLS', 'KILOGRAMOS', 1),
(29, 3, 6, 'VEN', 'VENDEDOR', 1),
(30, 3, 7, 'ROL', 'rol1', 1),
(31, 18, 1, 'ROLDOS', 'ROL 2', 1),
(32, 18, 2, 'ROLTRES', 'ROL 3', 1),
(33, 18, 3, 'FINAL', 'KKK', 1),
(34, 3, 8, 'KKK', 'LLL', 1),
(35, 2, 5, 'QTL', 'Quintal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

DROP TABLE IF EXISTS `bodega`;
CREATE TABLE IF NOT EXISTS `bodega` (
  `idcatalogo` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idcatalogo`),
  KEY `fk_catalogo_producto_idx` (`idproducto`),
  KEY `fk_bodega_tienda_idx` (`idtienda`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`idcatalogo`, `idproducto`, `idtienda`, `stock`, `condicion`) VALUES
(57, 16, 6, 10, 1),
(58, 17, 6, 10, 1),
(59, 18, 6, 10, 1),
(60, 19, 6, 10, 1),
(61, 20, 6, 10, 1),
(62, 21, 6, 10, 1),
(63, 22, 6, 10, 1),
(64, 23, 6, 13, 1),
(65, 24, 6, 13, 1),
(72, 16, 7, 10, 1),
(73, 17, 7, 10, 1),
(74, 18, 7, 10, 1),
(75, 19, 7, 10, 1),
(76, 20, 7, 10, 1),
(77, 21, 7, 10, 1),
(78, 22, 7, 10, 1),
(79, 23, 7, 13, 1),
(80, 24, 7, 5, 1),
(81, 25, 6, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `idcarrito` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idcarrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritodetalle`
--

DROP TABLE IF EXISTS `carritodetalle`;
CREATE TABLE IF NOT EXISTS `carritodetalle` (
  `idcarritoDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idcarrito` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idcarritoDetalle`),
  KEY `fk_carritoDetalle_carrito_idx` (`idcarrito`),
  KEY `fk_carritoDetalle_producto_idx` (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de la Categoria',
  `descripcion` varchar(256) NOT NULL COMMENT 'Descripción de la categoria',
  `condicion` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Borrar lógico',
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'LECHE', 'Producto natural sin qu&iacute;micos', 1),
(2, 'QUESO', 'Los quesos son fabricados con productos natural', 1),
(3, 'YOGURT', 'Este producto es hecho con frutas naturales', 1),
(4, 'MANJAR', 'Dulces', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL COMMENT 'codigo producto',
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) DEFAULT 0.00 COMMENT 'Descuento',
  PRIMARY KEY (`iddetalle_venta`),
  KEY `fk_detalle_venta_venta_idx` (`idventa`),
  KEY `fk_detalle_venta_producto` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idproducto`, `cantidad`, `precio_venta`, `descuento`) VALUES
(1, 6, 19, 1, '1.10', '0.00'),
(2, 6, 17, 2, '5.00', '0.00'),
(3, 9, 16, 1, '1.10', '0.00'),
(38, 13, 19, 1, '1.10', '0.00'),
(49, 22, 19, 1, '1.10', '0.00'),
(50, 22, 21, 2, '1.00', '0.00'),
(51, 23, 16, 3, '1.10', '0.00'),
(52, 23, 20, 3, '1.50', '0.00'),
(53, 24, 16, 3, '1.10', '0.00'),
(54, 24, 20, 2, '1.50', '0.00'),
(55, 25, 16, 1, '1.10', '0.00'),
(56, 26, 19, 2, '1.10', '0.00'),
(57, 27, 19, 2, '1.10', '0.00'),
(58, 28, 19, 1, '1.10', '0.00'),
(59, 29, 16, 3, '1.10', '0.00'),
(60, 30, 16, 2, '1.10', '0.00'),
(61, 31, 16, 2, '1.10', '0.00'),
(62, 35, 16, 2, '1.10', '0.00'),
(63, 38, 16, 3, '1.10', '0.00'),
(64, 39, 22, 4, '2.30', '0.00'),
(65, 41, 21, 4, '1.00', '0.00'),
(66, 42, 21, 2, '1.00', '0.00'),
(67, 43, 17, 3, '2.20', '0.00');

--
-- Disparadores `detalle_venta`
--
DROP TRIGGER IF EXISTS `tr_updStockVenta`;
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` BEFORE INSERT ON `detalle_venta` FOR EACH ROW BEGIN
	DECLARE v_stock_actual INT;

     select stock 
	into v_stock_actual  
	from producto 			
	where idproducto = new.idproducto;

 if v_stock_actual - new.cantidad > 0 then    
  UPDATE producto 
  SET stock = stock - NEW.cantidad 
  WHERE producto.idproducto = NEW.idproducto;
	else
	
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No hay suficiente stoctk';
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `nombre` varchar(45) NOT NULL COMMENT 'Rol del usuario',
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Admin'),
(3, 'Administrador'),
(4, 'Ventas'),
(5, 'Repartidor'),
(6, 'Pedidos'),
(7, 'consultap'),
(8, 'consultav');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `idbodega` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ciudadresidencia` varchar(45) DEFAULT NULL,
  `latidud` decimal(11,2) NOT NULL,
  `longitud` decimal(11,2) NOT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) NOT NULL,
  `idpresentacion` int(11) NOT NULL COMMENT 'Codigo presentacion',
  `idmedida` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL COMMENT 'Código de barra de códigos',
  `nombre` varchar(50) NOT NULL COMMENT 'Describe subcategorias del produto',
  `precio` double NOT NULL COMMENT 'Precio venta',
  `stock` int(11) NOT NULL COMMENT 'stock del producto',
  `descripcion` varchar(256) NOT NULL COMMENT 'Características del producto',
  `imagen` varchar(45) DEFAULT NULL COMMENT 'Imagen del producto',
  `condicion` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Utilizado realizar borrado lógico',
  PRIMARY KEY (`idproducto`),
  KEY `fk_producto_categoria` (`idcategoria`),
  KEY `fk_producto_auxiliares` (`idpresentacion`),
  KEY `fk_producto_medida` (`idmedida`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `idcategoria`, `idpresentacion`, `idmedida`, `codigo`, `nombre`, `precio`, `stock`, `descripcion`, `imagen`, `condicion`) VALUES
(16, 1, 4, 16, '13131', 'Entera', 1.1, 1, 'Leche 100% natural', '1596250701.JPG', 1),
(17, 2, 14, 17, '4242', 'MOZARELA', 2.2, 7, 'KKAKA', '1596250651.JPG', 1),
(18, 3, 4, 16, '12131', 'NARANJILLA', 0.3, 10, 'Naranjilla', '1596250850.jpg', 1),
(19, 1, 14, 16, '3242', 'Deslactosada', 1.1, 10, 'Leche deslactosada', '1596250801.JPG', 1),
(20, 4, 19, 25, '91001', 'Manjar', 1.5, 10, 'Manjar de leche', '1596250929.jpg', 1),
(21, 1, 4, 16, '765325', 'Leche Chocolatada', 1, 4, 'Leche chocolatada', '1596251014.JPG', 1),
(22, 2, 3, 25, '99292', 'NORMAL', 2.3, 6, 'Queso normal', '1596251140.JPG', 1),
(23, 2, 26, 25, '2353553', 'QUESO ESPECIAL', 2.1, 13, 'Queso de crema', '1596382068.JPG', 1),
(24, 2, 4, 17, 'SSSS', 'QUESO MANABA', 2.3, 13, 'FFFA', '1596377770.jpg', 1),
(25, 3, 4, 16, '322', 'YOGURT DE MANGO', 1.1, 4, 'rwrww', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

DROP TABLE IF EXISTS `tienda`;
CREATE TABLE IF NOT EXISTS `tienda` (
  `idtienda` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de la tienda',
  `provincia` varchar(50) NOT NULL COMMENT 'Provincia de la tienda',
  `ciudad` varchar(50) NOT NULL COMMENT 'Ciudad de la tienda',
  `direccion` varchar(100) NOT NULL COMMENT 'Dirección de la tienda',
  `latitud` double(12,8) DEFAULT NULL COMMENT 'Latidud de la tienda',
  `longitud` double(12,8) DEFAULT NULL COMMENT 'Longitud de la tienda',
  `condicion` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Borrado lógico',
  PRIMARY KEY (`idtienda`),
  UNIQUE KEY `constraint_nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`idtienda`, `nombre`, `provincia`, `ciudad`, `direccion`, `latitud`, `longitud`, `condicion`) VALUES
(1, 'MARIANA DE JESUS', 'PICHINCHA', 'QUITO', '5 DE JUNIO', 0.00000000, 0.00000000, 1),
(6, 'LA CASCADA', 'GUAYAS', 'GUAYAQUIL', 'POR EL CENTRO', 0.00000000, 0.00000000, 1),
(7, 'LA MANZANA', 'PICHINCHA', 'CAYAMBE', 'POR LA IGLESIA', 0.00000000, 0.00000000, 1),
(8, 'IPIALES', 'PICHINCHA', 'QUITO', 'CHILE', NULL, NULL, 1),
(9, 'LA MARISCAL', 'SSS', 'SSS', 'AAA', NULL, NULL, 1),
(10, 'SW', 'SS', 'SSS', 'SS', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primeria',
  `idtienda` int(11) NOT NULL COMMENT 'Identificación Tienda',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del usuario',
  `tipo_documento` varchar(20) NOT NULL COMMENT 'Cédula o Ruc',
  `num_documento` varchar(20) NOT NULL COMMENT 'Número del documento',
  `direccion` varchar(70) DEFAULT NULL COMMENT 'Dirección usuario',
  `telefono` varchar(20) DEFAULT NULL COMMENT 'Telefono del usuario',
  `email` varchar(50) DEFAULT NULL COMMENT 'email del usurio',
  `cargo` varchar(20) DEFAULT NULL COMMENT 'Cargo del usuario',
  `login` varchar(20) NOT NULL COMMENT 'Login del usuario',
  `clave` varchar(150) NOT NULL COMMENT 'Clave del usuario',
  `latitud` decimal(12,8) DEFAULT NULL COMMENT 'Latitud del usuario',
  `longitud` decimal(12,8) DEFAULT NULL COMMENT 'Longitud del usuario',
  `tipo_usuario` varchar(45) NOT NULL COMMENT 'Tipo de usuario',
  `ciudadresidencia` varchar(45) DEFAULT NULL COMMENT 'Ciudad de residencia',
  `imagen` varchar(50) NOT NULL COMMENT 'Foto de usuario',
  `condicion` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Borrado Lógico',
  PRIMARY KEY (`idusuario`,`nombre`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idtienda`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `latitud`, `longitud`, `tipo_usuario`, `ciudadresidencia`, `imagen`, `condicion`) VALUES
(1, 6, 'TANIA CUEVA', 'CEDULA', '1791001999', 'Santa Ana', '123', 'tania@gmail.com', 'Administrador', 'tania', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', '0.01111000', '1.22322000', 'EMPLEADO', 'QUITO', '1594497535.png', 1),
(2, 7, 'JUANCHO CASTILLO', 'CEDULA', '17901013130', 'VILLAFLORA', '2424242', 'juancho@gmail.com', 'REPARTIDOR', 'juancho', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, '0.00000000', 'EMPLEADO', '', '1594501028.png', 1),
(3, 6, 'JENNY GARCIA', 'CEDULA', '171771', 'SANTA ANA', '424242', 'pelusa@gmail.com', 'Administrador', 'jenny', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'EMPLEADO', 'Quito', '$imagen', 1),
(4, 6, 'MARIA PEREZ', 'CEDULA', '1710285679', 'CHIMBACALLE', '002200200', 'correo@gmail.com', 'anonimo', 'maria', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'CLIENTE', NULL, '', 1),
(5, 6, 'prueba', 'CEDULA', '1710285667', 'KKFKS', '2222', 'ana@correo.com', 'fafa', 'prueba', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'EMPLEADO', NULL, '', 1),
(6, 6, 'Cliente 2', 'CEDULA', 'jlfsl', 'kfksfsl', '22', 'kkkkk@gmail.com', 'ss', 'kkkkk@gmail.com', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, '', NULL, '', 1),
(7, 6, 'Usuario', 'CEDULA', 'fskfsk', 'lsflsl', 'skfsk', 'sfsfks@mail', 'sksfks', 'usuario', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'EMPLEADO', NULL, '', 1),
(8, 7, 'USUARIO-2', 'CEDULA', 'FSF', 'GAG', 'SGD', 'correo@gmail.com', 'SFS', 'SFS', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'EMPLEADO', NULL, '', 1),
(9, 6, 'JAVIER SANCHEZ', 'CEDULA', '11313131', 'sfsf', 'ae2321', 'correo@gmail.com', 'fsfs', 'user1', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'CLIENTE', NULL, '', 1),
(10, 6, 'RICHAR BAEZ', 'CEDULA', '131313', 'KFKAFK', '052494929', 'ana@correo.com', 'kkafak', 'col', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'CLIENTE', NULL, '', 1),
(11, 6, 'CHELA CASTILLO', 'CEDULA', '12323', 'REAK', '022663462', 'correo@gmail.com', 'AAFA', 'chela', 'a1b47b755b6bcd5f4cf100c67443b79d82ad3a54ec26b97d5e2aa52ee455488c', NULL, NULL, 'CLIENTE', NULL, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `edad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `edad`) VALUES
(1, 'Roberto', 10),
(12, 'Carlos', 18),
(11, 'Carlos', 18),
(10, 'Carlos', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `idusuario` int(11) NOT NULL,
  `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `idpermiso` int(11) NOT NULL,
  PRIMARY KEY (`idusuario_permiso`),
  KEY `fk_usuario_permiso_usuario_idx` (`idusuario`),
  KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario`, `idusuario_permiso`, `idpermiso`) VALUES
(5, 92, 1),
(6, 107, 6),
(7, 108, 1),
(7, 109, 2),
(7, 110, 3),
(7, 111, 4),
(8, 112, 1),
(8, 113, 2),
(8, 114, 3),
(8, 115, 4),
(9, 126, 3),
(11, 173, 6),
(10, 174, 5),
(2, 180, 1),
(2, 181, 2),
(2, 182, 3),
(2, 183, 4),
(2, 184, 5),
(2, 185, 6),
(2, 186, 7),
(2, 187, 8),
(3, 188, 1),
(3, 189, 3),
(3, 190, 4),
(4, 207, 1),
(4, 208, 6),
(4, 209, 7),
(1, 226, 1),
(1, 227, 2),
(1, 228, 3),
(1, 229, 4),
(1, 230, 5),
(1, 231, 6),
(1, 232, 7),
(1, 233, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `idtienda` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL COMMENT 'codigo cliente',
  `idrepartidor` int(11) DEFAULT NULL COMMENT 'Codigo repartidor',
  `tipo_comprobante` varchar(20) NOT NULL COMMENT 'Tipocomprobante',
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL COMMENT 'Número del comprobante',
  `fecha_hora` datetime NOT NULL COMMENT 'hora de registro',
  `impuesto` decimal(4,2) NOT NULL COMMENT 'Impuesto',
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fechaEntrega` timestamp NULL DEFAULT NULL COMMENT 'fecha de entrega',
  `ruta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idventa`,`idusuario`),
  KEY `fk_venta_usuario_idx` (`idusuario`),
  KEY `fk_vena_tienda_idx` (`idtienda`),
  KEY `fk_venta_cliente` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idtienda`, `idusuario`, `idcliente`, `idrepartidor`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_venta`, `estado`, `fechaEntrega`, `ruta`) VALUES
(6, 6, 1, 4, 1, 'Factura', '42', '001', '2020-08-02 00:00:00', '12.00', '1.23', 'Aceptado', NULL, NULL),
(7, 6, 1, 4, 1, 'Factura', '1', '1', '2020-08-02 00:00:00', '12.00', '1.23', 'Entregado', '2020-08-08 11:28:17', NULL),
(8, 6, 1, 9, 1, 'Factura', '2', '1222', '2020-08-02 00:00:00', '12.00', '2.46', 'Aceptado', NULL, NULL),
(9, 6, 1, 4, 1, 'Factura', '22', '55', '2020-08-01 00:00:00', '12.00', '1.23', 'Entregado', '2020-08-04 01:35:48', NULL),
(13, 1, 1, 1, NULL, 'Factura', '444', '12233', '2020-08-08 17:24:40', '12.00', '10.00', 'Aceptado', NULL, NULL),
(22, 6, 1, 11, NULL, 'Factura', '666', '888', '2020-08-08 00:00:00', '12.00', '3.47', 'Aceptado', NULL, NULL),
(23, 6, 1, 4, 1, 'Factura', '7886', '9999', '2020-08-08 00:00:00', '12.00', '8.74', 'Entregado', '2020-08-24 23:26:42', NULL),
(24, 6, 1, 11, NULL, 'Factura', '6777', '777', '2020-08-08 00:00:00', '12.00', '5.38', 'Aceptado', NULL, NULL),
(25, 6, 1, 11, NULL, 'Factura', '333', '44', '2020-08-08 00:00:00', '12.00', '1.23', 'Aceptado', NULL, NULL),
(26, 6, 1, 11, NULL, 'Factura', '77777', '8888', '2020-08-08 00:00:00', '12.00', '2.46', 'Aceptado', NULL, NULL),
(27, 6, 1, 11, NULL, 'Factura', '13333', '1344', '2020-08-24 00:00:00', '12.00', '2.46', 'Aceptado', NULL, NULL),
(28, 6, 1, 9, NULL, 'Factura', '9291', '13131', '2020-08-24 00:00:00', '12.00', '1.23', 'Aceptado', NULL, NULL),
(29, 6, 1, 11, NULL, 'Factura', '8888', '1311', '2020-09-16 00:00:00', '12.00', '1.23', 'Aceptado', NULL, NULL),
(30, 6, 1, 11, NULL, 'Factura', '777', '7777', '2020-09-17 00:00:00', '12.00', '1.23', 'Aceptado', NULL, NULL),
(31, 6, 1, 4, NULL, 'Factura', '33', '333', '2020-09-18 00:00:00', '12.00', '2.46', 'Aceptado', NULL, NULL),
(32, 6, 1, 11, NULL, 'Factura', '8888', 'erwrw', '2020-09-18 00:00:00', '12.00', '3.70', 'Aceptado', NULL, NULL),
(33, 6, 1, 4, NULL, 'Factura', '121', '1111', '2020-09-18 00:00:00', '12.00', '27.10', 'Aceptado', NULL, NULL),
(34, 6, 1, 10, NULL, 'Factura', '8833', '2324', '2020-09-18 00:00:00', '12.00', '24.64', 'Aceptado', NULL, NULL),
(35, 6, 1, 11, NULL, 'Factura', '1331', 'adad', '2020-09-18 00:00:00', '12.00', '2.46', 'Aceptado', NULL, NULL),
(36, 6, 1, 10, NULL, 'Factura', '2424', '2424', '2020-09-18 00:00:00', '12.00', '2.24', 'Aceptado', NULL, NULL),
(37, 6, 1, 4, NULL, 'Factura', '', '8888', '2020-09-18 00:00:00', '12.00', '4.48', 'Aceptado', NULL, NULL),
(38, 6, 1, 9, NULL, 'Factura', '8888', '3333', '2020-09-03 00:00:00', '12.00', '3.70', 'Aceptado', NULL, NULL),
(39, 6, 1, 9, NULL, 'Factura', '8888', '55555', '2020-09-19 00:00:00', '12.00', '10.30', 'Aceptado', NULL, NULL),
(40, 6, 1, 11, NULL, 'Factura', '333', '8888', '2020-09-19 00:00:00', '12.00', '3.70', 'Aceptado', NULL, NULL),
(41, 6, 1, 9, NULL, 'Factura', '333', 'ewwe', '2020-09-19 00:00:00', '12.00', '4.48', 'Aceptado', NULL, NULL),
(42, 6, 1, 4, NULL, 'Factura', '3424', 'wwrw', '2020-09-19 00:00:00', '12.00', '2.24', 'Aceptado', NULL, NULL),
(43, 6, 1, 9, 1, 'Factura', '11313', '3244', '2020-09-18 00:00:00', '12.00', '7.39', 'Entregado', '2020-10-08 22:47:36', NULL),
(44, 6, 1, 9, 1, 'Factura', '333', '222', '2020-09-19 00:00:00', '12.00', '1.23', 'Entregado', '2020-10-08 22:47:24', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_usuario` FOREIGN KEY (`idcarrito`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carritodetalle`
--
ALTER TABLE `carritodetalle`
  ADD CONSTRAINT `fk_carritoDetalle_carrito` FOREIGN KEY (`idcarrito`) REFERENCES `carrito` (`idcarrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carritoDetalle_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permiso` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_vena_tienda` FOREIGN KEY (`idtienda`) REFERENCES `tienda` (`idtienda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`idcliente`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
