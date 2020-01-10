-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 09-01-2020 a les 12:12:22
-- Versió del servidor: 10.4.6-MariaDB
-- Versió de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `GuriZone`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `Categorias`
--

CREATE TABLE `Categorias` (
  `id_cat` int(11) NOT NULL,
  `tipo_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `Categorias`
--

INSERT INTO `Categorias` (`id_cat`, `tipo_cat`) VALUES
(1, 'Accesorios'),
(2, 'Ropa'),
(3, 'Zapatillas'),
(7, 'Todo');

-- --------------------------------------------------------

--
-- Estructura de la taula `Pedido`
--

CREATE TABLE `Pedido` (
  `id_prod` int(11) NOT NULL,
  `id_ped` int(11) NOT NULL,
  `num_ref` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` float NOT NULL,
  `precio` float NOT NULL,
  `talla` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `fecha_pedido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `Pedidos`
--

CREATE TABLE `Pedidos` (
  `id_ped` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `entregado` tinyint(1) NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `fecha_pagado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `Producto`
--

CREATE TABLE `Producto` (
  `id_prod` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL DEFAULT 2,
  `modelo_prod` varchar(255) NOT NULL,
  `marca_prod` varchar(255) NOT NULL,
  `categoria_prod` int(11) NOT NULL,
  `subcategoria_prod` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `color_disp` int(11) NOT NULL,
  `talla` varchar(255) NOT NULL,
  `talla_disp` int(11) NOT NULL,
  `stock_prod` int(11) NOT NULL,
  `num_ventas_prod` int(11) NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `precio_unidad` float NOT NULL,
  `foto_prod` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `descatalogado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `Producto`
--

INSERT INTO `Producto` (`id_prod`, `id_empleado`, `modelo_prod`, `marca_prod`, `categoria_prod`, `subcategoria_prod`, `color`, `color_disp`, `talla`, `talla_disp`, `stock_prod`, `num_ventas_prod`, `fecha_salida`, `precio_unidad`, `foto_prod`, `descripcion`, `descatalogado`) VALUES
(8, 2, 'Calcetines NBA', 'Nike', 1, 3, 'blanco', 10, '40-45', 10, 10, 56, '2019-11-07 00:00:00', 15, '/imgs/productos/accesorios/calcetines.jpg', 'Calcetines oficiales de la NBA', 0),
(9, 2, 'Gorra Blazers', 'NBA', 1, 3, 'negro', 10, 'universal', 10, 10, 45, '2019-10-09 00:00:00', 20, '/imgs/productos/accesorios/gorra_blazers.jpg', 'Gorra de los Portland Trail Blazers', 0),
(10, 2, 'Gorra Bulls', 'NBA', 1, 3, 'negro', 10, 'universal', 10, 10, 56, '2019-10-17 00:00:00', 20, '/imgs/productos/accesorios/gorra_bulls.jpg', 'Gorra de los Chicago Bulls', 0),
(11, 2, 'Sudadera Chicago Bulls', 'NBA', 2, 5, 'negro', 10, 'm', 10, 10, 23, '2019-11-05 09:00:00', 45, '/imgs/productos/ropa/calle/bulls_hoodie.jpg', 'Sudadera de los Chicago Bulls', 0),
(12, 2, 'Sudadera Dallas Mavericks', 'NBA', 2, 5, 'negro', 10, 'm', 10, 10, 45, '2019-10-15 10:03:00', 45, '/imgs/productos/ropa/calle/dallas_hoodie.jpg', 'Sudadera de los Dallas Mavericks', 0),
(13, 2, 'Sudadera Hoop Culture', 'Hoop Culture', 2, 5, 'blanco', 10, 'm', 10, 10, 34, '2019-10-09 11:00:00', 40, '/imgs/productos/ropa/calle/hc_hoodie_white.jpg', 'Sudadera de la marca Hoop Culture', 0),
(14, 2, 'Pantalones deportivos Hoop Culture', 'Hoop Culture', 2, 8, 'negro', 10, 'm', 10, 10, 20, '2019-11-05 00:00:00', 20, '/imgs/productos/ropa/calle/hc_joggers_black.jpg', 'Pantalones deportivos de la marca Hoop Culture.', 0),
(15, 2, 'Shors HC', 'Hoop Culture', 2, 8, 'verde', 10, 'm', 10, 10, 18, '2019-10-31 20:51:00', 18, '/imgs/productos/ropa/calle/hc_short_green.jpg', 'Shorts de la marca Hoop Culture', 0),
(16, 2, 'LB camiseta', 'Nike', 2, 6, 'rojo', 10, 'm', 10, 10, 45, '2019-11-07 00:00:00', 25, '/imgs/productos/ropa/calle/james_tshirt.jpg', 'Camiseta Nike de Lebron James', 0),
(17, 2, 'Jordan Wings Sherpa', 'Jordan', 2, 7, 'negro', 10, 'm', 10, 10, 56, '2019-11-04 00:00:00', 70, '/imgs/productos/ropa/calle/jordan_wings_sherpa.jpg', 'Chaqueta de la marca Jordan', 0),
(18, 2, 'Short Freesh', 'Hoop Culture', 2, 8, 'verde', 10, 'm', 10, 10, 45, '2019-10-24 20:00:00', 16, '/imgs/productos/ropa/calle/short_freesh.jpg', 'Shorts inspirados en la serie noventera \'El Principe de Bel-Air\' diseñados por Hoop Culture', 0),
(19, 2, 'Windbreaker Freesh', 'Hoop Culture', 2, 7, 'blanco', 10, 'm', 10, 10, 56, '2019-11-07 00:00:00', 45, '/imgs/productos/ropa/calle/windbreaker_freesh.png', 'Chaqueta inspirada en la serie noventera \'El principe de Bel-Air\' diseñada por Hoop Culture', 0),
(20, 2, 'Camiseta Drexler ', 'NBA', 2, 4, 'rojo', 10, 'm', 10, 10, 12, '2019-11-07 20:39:00', 90, '/imgs/productos/ropa/camisetas_nba/blazers/drexler_red.jpg', 'Camiseta retro de la leyenda que llevó a los Blazers a la final del 92, Clyde Drexler.', 0),
(21, 2, 'Camiseta Lillard', 'NBA', 2, 4, 'negro', 10, 's', 10, 10, 78, '2019-11-07 10:00:00', 75, '/imgs/productos/ropa/camisetas_nba/blazers/lillard_red.jpg', 'Camiseta de la estrella de los Portland Trail Blazers, Damian Lillard', 0),
(22, 2, 'Camiseta Giannis Antetokoumpo', 'NBA', 2, 4, 'negro', 10, 'xl', 10, 10, 44, '2019-11-07 04:00:00', 75, '/imgs/productos/ropa/camisetas_nba/bucks/antetokoumpo_black.jpg', 'Camiseta del actual MVP de la NBA, Giannis Antetokoumpo', 0),
(23, 2, 'Camiseta Eric Bledsoe', 'NBA', 2, 4, 'verde', 10, 'l', 10, 10, 4, '2019-11-07 05:00:00', 70, '/imgs/productos/ropa/camisetas_nba/bucks/bledsoe_green.jpg', 'Camiseta de la NBA del base de los Bucks Eric Bledsoe', 0),
(24, 2, 'Camiseta Michael Jordan', 'NBA', 2, 4, 'rojo', 10, 'm', 10, 10, 89, '2019-11-05 00:00:00', 120, '/imgs/productos/ropa/camisetas_nba/bulls/jordan_red.jpg', 'Camiseta de la leyenda de los Chicago Bulls, Michael Jordan', 0),
(25, 2, 'Camiseta Zach Lavine', 'NBA', 2, 4, 'negro', 10, 'm', 10, 10, 45, '2019-11-06 00:00:00', 70, '/imgs/productos/ropa/camisetas_nba/bulls/lavine_black.jpg', 'Camiseta del jugador de los Chicago Bulls, Zach Lavine', 0),
(26, 2, 'Camiseta Lebron James', 'NBA', 2, 4, 'blue', 10, 'm', 10, 10, 44, '2019-11-07 04:00:00', 75, '/imgs/productos/ropa/camisetas_nba/cavaliers/james_blue.jpg', 'Camiseta Throwback de Lebron James con los Cleveland Cavaliers', 0),
(27, 2, 'Camiseta Allen Iverson retro', 'NBA', 2, 4, 'blanco', 10, 'l', 10, 10, 78, '2019-11-07 05:00:00', 90, '/imgs/productos/ropa/camisetas_nba/sixers/iverson_white.jpg', 'Camiseta de la leyenda de los 76ers Allen Iverson', 0),
(28, 2, 'Camiseta James Harden', 'NBA', 2, 4, 'negro', 10, 'm', 10, 10, 56, '2019-11-01 00:00:00', 70, '/imgs/productos/ropa/camisetas_nba/rockets/harden_black.jpg', 'Camiseta de la estrella de los Houston Rockets James Harden', 0),
(29, 2, 'Camiseta RJ Barret', 'NBA', 2, 4, 'azul', 10, 'l', 10, 10, 65, '2019-11-04 00:00:00', 70, '/imgs/productos/ropa/camisetas_nba/knicks/barret_blue.jpg', 'Camiseta de la promesa de los New York Knicks, RJ Barret', 0),
(30, 2, 'Camiseta Tracy Mcgrady', 'NBA', 2, 4, 'azul', 10, 'm', 10, 10, 10, '2019-11-02 00:00:00', 90, '/imgs/productos/ropa/camisetas_nba/magic/mcgrady_black.jpg', 'Camiseta retro de Tracy McGrady con los Orlando Magic', 0),
(32, 2, 'DM Spider', 'Adidas', 2, 11, 'rojo', 19, 'm', 19, 19, 0, '2019-11-15 11:58:25', 90, '/imgs/productos/zapatillas/spider.jpg', 'Primeras zapatillas Donovan Mitchell', 0),
(33, 2, 'Camiseta Kyrie Irving', 'NBA', 2, 4, 'negro', 10, 's', 10, 10, 0, '2019-11-18 11:30:14', 90, '/imgs/productos/ropa/camisetas_nba/nets/irving_black.jpg', 'Camiseta de Kyrie Irving con los Brooklyn Nets', 0),
(34, 2, 'PG 2', 'Nike', 3, 10, 'negro', 10, '41', 10, 10, 0, '2019-11-21 09:52:32', 100, '/imgs/productos/zapatillas/pg_2.jpg', 'Zapatillas Paul George 2', 0),
(65, 2, 'Camiseta Stephen Curry', 'NBA', 2, 4, 'azul', 10, 's', 10, 10, 0, '2019-12-12 09:26:40', 95, '/imgs/productos/ropa/camisetas_nba/warriors/curry_blue.jpg', 'Camiseta de la estrella de los Golden State Warriors, Stephen Curry.', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `Roles`
--

CREATE TABLE `Roles` (
  `id_rod` int(11) NOT NULL,
  `tipo_rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `Roles`
--

INSERT INTO `Roles` (`id_rod`, `tipo_rol`) VALUES
(1, 'anonimo'),
(2, 'admin'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de la taula `Subcategoria`
--

CREATE TABLE `Subcategoria` (
  `id_sub` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `Subcategoria`
--

INSERT INTO `Subcategoria` (`id_sub`, `tipo`, `cat_id`) VALUES
(1, 'Balones', 1),
(2, 'Tableros', 1),
(3, 'Varios', 1),
(4, 'Camisetas NBA', 2),
(5, 'Sudaderas', 2),
(6, 'Camisetas', 2),
(7, 'Chaquetas', 2),
(8, 'Pantalones', 2),
(9, 'Jordan', 3),
(10, 'Nike', 3),
(11, 'Adidas', 3);

-- --------------------------------------------------------

--
-- Estructura de la taula `Usuario`
--

CREATE TABLE `Usuario` (
  `id_cli` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `Usuario`
--

INSERT INTO `Usuario` (`id_cli`, `rol`, `nombre`, `apellidos`, `email`, `password`, `foto_perfil`) VALUES
(1, 1, 'anonimo', '', '', '', ''),
(2, 2, 'admin', '', 'admin@admin.com', 'admin', ''),
(3, 3, 'usuario', '', 'usuario@usuario.com', 'usuario', ''),
(4, 3, 'Sergio', 'Gurillo Corral', 'empleado@gurizone.com', 'empleado', 'imgs/default_profile.jpg');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Índexs per a la taula `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`id_prod`,`id_ped`),
  ADD UNIQUE KEY `num_ref` (`num_ref`),
  ADD KEY `Pedido_ibfk_2` (`id_ped`);

--
-- Índexs per a la taula `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `cliente` (`cliente`);

--
-- Índexs per a la taula `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `categoria_prod` (`categoria_prod`),
  ADD KEY `subcategoria_prod` (`subcategoria_prod`),
  ADD KEY `Producto_ibfk_3` (`id_empleado`);

--
-- Índexs per a la taula `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id_rod`);

--
-- Índexs per a la taula `Subcategoria`
--
ALTER TABLE `Subcategoria`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Índexs per a la taula `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id_cli`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `Categorias`
--
ALTER TABLE `Categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la taula `Pedidos`
--
ALTER TABLE `Pedidos`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `Producto`
--
ALTER TABLE `Producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT per la taula `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id_rod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la taula `Subcategoria`
--
ALTER TABLE `Subcategoria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT per la taula `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `Pedido`
--
ALTER TABLE `Pedido`
  ADD CONSTRAINT `Pedido_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `Producto` (`id_prod`),
  ADD CONSTRAINT `Pedido_ibfk_2` FOREIGN KEY (`id_ped`) REFERENCES `Pedidos` (`id_ped`);

--
-- Restriccions per a la taula `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD CONSTRAINT `Pedidos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `Usuario` (`id_cli`);

--
-- Restriccions per a la taula `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`categoria_prod`) REFERENCES `Categorias` (`id_cat`),
  ADD CONSTRAINT `Producto_ibfk_2` FOREIGN KEY (`subcategoria_prod`) REFERENCES `Subcategoria` (`id_sub`),
  ADD CONSTRAINT `Producto_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `Usuario` (`id_cli`);

--
-- Restriccions per a la taula `Subcategoria`
--
ALTER TABLE `Subcategoria`
  ADD CONSTRAINT `Subcategoria_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `Categorias` (`id_cat`);

--
-- Restriccions per a la taula `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `Usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `Roles` (`id_rod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
