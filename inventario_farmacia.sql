-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2023 a las 23:46:49
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
-- Base de datos: `inventario_farmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_uniqid` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_citas`
--

CREATE TABLE `cat_citas` (
  `id` int(11) NOT NULL,
  `idpacinte` int(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `hora` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cat_citas`
--

INSERT INTO `cat_citas` (`id`, `idpacinte`, `fecha`, `telefono`, `motivo`, `nombre`, `hora`) VALUES
(24, 0, '2023-05-22', '7287-7875', 'Problemas de la piel', 'Alejandra', '10:00'),
(25, 0, '2023-05-26', '7265-4567', 'Dolor en el plexo solar', 'Romeo', '07:17'),
(28, 0, '2023-06-05', '7234-4567', 'Dolor de estomago', 'Emely', '14:30'),
(29, 0, '2023-06-12', '7656-8976', 'Consulta', 'Milagro', '13:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_clientes`
--

CREATE TABLE `cat_clientes` (
  `id` int(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  `edad` varchar(255) DEFAULT NULL,
  `num_expediente` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `consulta_por` varchar(255) DEFAULT NULL,
  `antecedestes` varchar(255) DEFAULT NULL,
  `ta` varchar(255) DEFAULT NULL,
  `fc` varchar(255) DEFAULT NULL,
  `t` varchar(255) DEFAULT NULL,
  `spo2` varchar(255) DEFAULT NULL,
  `hgt` varchar(255) DEFAULT NULL,
  `peso` varchar(255) DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `tratamiento` varchar(255) DEFAULT NULL,
  `hora` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cat_clientes`
--

INSERT INTO `cat_clientes` (`id`, `fecha`, `edad`, `num_expediente`, `nombre`, `direccion`, `telefono`, `responsable`, `consulta_por`, `antecedestes`, `ta`, `fc`, `t`, `spo2`, `hgt`, `peso`, `diagnostico`, `tratamiento`, `hora`) VALUES
(13, '2022-11-24', '1', '2', 'José José ', 'usulután', '265898847', 'Jose', 'Dolor en el corazón', 'hdolor', '45', '46', '25', '25', '654', '100', 'dolor', 'trataiento', ''),
(14, '2023-05-22', '5', '8', 'Romeo', 'Usulután', '2635-9665', 'jose', 'dolor', 'dsad', '5', '55', '5', '5', '5', '5', 'Problemas de la cabeza', 'Debe tomar 1 Valpakine cada 8 horas y 1 Somazina cada noche', '14:05'),
(15, '2023-05-24', '15', '15', 'Pedro Alonso', 'usulután', '2635-9635', 'maria gonzales', 'dolor de cabeza', 'migrañas', '15', '15', '15', '15', '15', '15', 'Paciente hipertenso', 'Tomar exforge cada día', '08:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expired`
--

CREATE TABLE `expired` (
  `exp_id` int(11) NOT NULL,
  `exp_itemName` varchar(50) NOT NULL,
  `exp_itemPrice` float NOT NULL,
  `exp_itemQty` int(11) NOT NULL,
  `exp_expiredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `expired`
--

INSERT INTO `expired` (`exp_id`, `exp_itemName`, `exp_itemPrice`, `exp_itemQty`, `exp_expiredDate`) VALUES
(1, 'Dolofin', 10, 11, '2023-01-01'),
(2, 'Dolofin', 10, 10, '2022-11-30'),
(3, 'Dolofin', 10, 10, '2022-11-30'),
(4, 'Dolofin', 10, 10, '2022-11-30'),
(5, 'Dolofin', 10, 10, '2022-11-30'),
(6, 'Dolofin', 10, 10, '2022-11-30'),
(7, 'Gabapentin', 60, 9, '2017-09-15'),
(8, 'Gabapentin', 60, 9, '2017-09-15'),
(9, 'Gabapentin', 60, 9, '2017-09-15'),
(10, 'Gabapentin', 60, 9, '2017-09-15'),
(11, 'Gabapentin', 60, 9, '2017-09-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` double NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_grams` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_type_id`, `item_code`, `item_brand`, `item_grams`) VALUES
(7, 'Gabapentin', 60, 1, '557-11', 'Actavis', '400'),
(8, 'Dolofin', 10, 1, 'Mp5', 'Laboratorios Suizos', '20'),
(9, 'Dolofin', 5.1, 2, 'Sdfsd', 'Sdfsd', 'Sdfsd'),
(10, '', 0, 2, '', 'Sd', ''),
(11, 'Panadol', 10, 1, 'Pana', 'Laboratorio Suizo', '500'),
(12, 'Alerfin', 10, 1, '555-12', 'Laboratorio Suizo', '500'),
(13, 'Amoxicilina', 10, 1, '555-15', 'Laboratorio Suizo', '500'),
(14, 'Salvadol', 10, 1, '555-16', 'Laboratorio Suizo', '500'),
(15, 'urofin', 10, 1, '555-16', 'Laboratorio Suizo', '500'),
(16, 'Ibuprofeno', 5, 1, '555-18', 'Laboratorio Radon', '500'),
(17, 'Loratadina', 4.1, 1, '555-19', 'Laboratorio Radon', '500'),
(18, 'Ganol', 3, 1, '555-24', 'Laboratorio Radon', '500'),
(19, 'Virogrid', 3, 1, '555-22', 'Laboratorio Radon', '500'),
(20, 'Palagrid', 3, 1, '555-23', 'Laboratorio Radon', '500'),
(21, 'Valpakine', 22, 1, '07322', 'Kine', '0.5 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL,
  `item_type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_desc`) VALUES
(1, 'Tabletas'),
(2, 'Jarabe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `generic_name` varchar(35) NOT NULL,
  `brand` varchar(35) NOT NULL,
  `gram` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_sold` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`sales_id`, `item_code`, `generic_name`, `brand`, `gram`, `type`, `qty`, `price`, `date_sold`) VALUES
(1, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 1, 60, '2023-02-06 19:19:53'),
(2, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 7, 60, '2023-02-07 18:31:27'),
(3, 'Mp5', 'Dolofin', 'Laboratorios Suizos', '20', 'Tabletas', 8, 10, '2023-02-07 18:31:27'),
(4, 'Pana', 'Panadol', 'Laboratorio Suizo', '500', 'Tabletas', 24, 10, '2023-02-07 18:31:27'),
(5, '555-12', 'Alerfin', 'Laboratorio Suizo', '500', 'Tabletas', 10, 10, '2023-02-07 18:31:27'),
(6, '555-15', 'Amoxicilina', 'Laboratorio Suizo', '500', 'Tabletas', 15, 10, '2023-02-07 18:31:27'),
(7, '555-16', 'Salvadol', 'Laboratorio Suizo', '500', 'Tabletas', 13, 10, '2023-02-07 18:31:27'),
(8, '555-16', 'urofin', 'Laboratorio Suizo', '500', 'Tabletas', 5, 10, '2023-02-07 18:31:27'),
(9, '555-18', 'Ibuprofeno', 'Laboratorio Radon', '500', 'Tabletas', 10, 5, '2023-02-07 18:31:27'),
(10, '555-19', 'Loratadina', 'Laboratorio Radon', '500', 'Tabletas', 36, 4.1, '2023-02-07 18:31:27'),
(11, '555-24', 'Ganol', 'Laboratorio Radon', '500', 'Tabletas', 9, 3, '2023-02-07 18:31:27'),
(12, '555-22', 'Virogrid', 'Laboratorio Radon', '500', 'Tabletas', 25, 3, '2023-02-07 18:31:27'),
(13, '555-23', 'Palagrid', 'Laboratorio Radon', '500', 'Tabletas', 2, 3, '2023-02-07 18:31:27'),
(14, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 17, 60, '2023-02-10 18:37:35'),
(15, 'Mp5', 'Dolofin', 'Laboratorios Suizos', '20', 'Tabletas', 17, 10, '2023-02-10 18:37:35'),
(16, 'Pana', 'Panadol', 'Laboratorio Suizo', '500', 'Tabletas', 23, 10, '2023-02-10 18:37:35'),
(17, '555-12', 'Alerfin', 'Laboratorio Suizo', '500', 'Tabletas', 12, 10, '2023-02-10 18:37:35'),
(18, '555-15', 'Amoxicilina', 'Laboratorio Suizo', '500', 'Tabletas', 14, 10, '2023-02-10 18:37:35'),
(19, '555-16', 'Salvadol', 'Laboratorio Suizo', '500', 'Tabletas', 17, 10, '2023-02-10 18:37:35'),
(20, '555-16', 'urofin', 'Laboratorio Suizo', '500', 'Tabletas', 12, 10, '2023-02-10 18:37:35'),
(21, '555-18', 'Ibuprofeno', 'Laboratorio Radon', '500', 'Tabletas', 13, 5, '2023-02-10 18:37:35'),
(22, '555-19', 'Loratadina', 'Laboratorio Radon', '500', 'Tabletas', 17, 4.1, '2023-02-10 18:37:35'),
(23, '555-24', 'Ganol', 'Laboratorio Radon', '500', 'Tabletas', 10, 3, '2023-02-10 18:37:35'),
(24, '555-22', 'Virogrid', 'Laboratorio Radon', '500', 'Tabletas', 19, 3, '2023-02-10 18:37:35'),
(25, '555-23', 'Palagrid', 'Laboratorio Radon', '500', 'Tabletas', 20, 3, '2023-02-10 18:37:35'),
(26, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 20, 60, '2023-02-26 18:39:27'),
(27, 'Mp5', 'Dolofin', 'Laboratorios Suizos', '20', 'Tabletas', 15, 10, '2023-02-26 18:39:27'),
(28, 'Pana', 'Panadol', 'Laboratorio Suizo', '500', 'Tabletas', 10, 10, '2023-02-26 18:39:27'),
(29, '555-12', 'Alerfin', 'Laboratorio Suizo', '500', 'Tabletas', 4, 10, '2023-02-26 18:39:27'),
(30, '555-15', 'Amoxicilina', 'Laboratorio Suizo', '500', 'Tabletas', 5, 10, '2023-02-26 18:39:27'),
(31, '555-16', 'Salvadol', 'Laboratorio Suizo', '500', 'Tabletas', 6, 10, '2023-02-26 18:39:27'),
(32, '555-16', 'urofin', 'Laboratorio Suizo', '500', 'Tabletas', 7, 10, '2023-02-26 18:39:27'),
(33, '555-18', 'Ibuprofeno', 'Laboratorio Radon', '500', 'Tabletas', 8, 5, '2023-02-26 18:39:27'),
(34, '555-19', 'Loratadina', 'Laboratorio Radon', '500', 'Tabletas', 9, 4.1, '2023-02-26 18:39:27'),
(35, '555-24', 'Ganol', 'Laboratorio Radon', '500', 'Tabletas', 17, 3, '2023-02-26 18:39:27'),
(36, '555-22', 'Virogrid', 'Laboratorio Radon', '500', 'Tabletas', 10, 3, '2023-02-26 18:39:27'),
(37, '555-23', 'Palagrid', 'Laboratorio Radon', '500', 'Tabletas', 11, 3, '2023-02-26 18:39:27'),
(38, '555-16', 'urofin', 'Laboratorio Suizo', '500', 'Tabletas', 20, 10, '2023-06-03 18:03:13'),
(39, '555-22', 'Virogrid', 'Laboratorio Radon', '500', 'Tabletas', 30, 3, '2023-06-07 16:12:35'),
(40, '555-19', 'Loratadina', 'Laboratorio Radon', '500', 'Tabletas', 30, 4.1, '2023-06-07 16:12:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_expiry` date NOT NULL,
  `stock_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock_manufactured` date NOT NULL,
  `stock_purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `stock_qty`, `stock_expiry`, `stock_added`, `stock_manufactured`, `stock_purchased`) VALUES
(5, 7, 456, '2023-06-06', '2023-05-30 22:15:59', '2023-01-01', '2023-06-06'),
(13, 8, 460, '2023-06-10', '2023-06-03 18:09:08', '2023-02-07', '2023-04-14'),
(14, 12, 474, '2024-01-01', '2023-02-26 18:38:32', '2023-02-07', '2023-02-07'),
(15, 13, 466, '2024-01-01', '2023-06-03 18:01:44', '2023-02-07', '2023-02-07'),
(16, 18, 464, '2023-01-01', '2023-02-09 20:22:52', '2023-02-28', '2023-02-28'),
(17, 16, 469, '2024-01-01', '2023-02-26 18:38:46', '2023-02-07', '2023-02-07'),
(18, 17, 408, '2023-01-01', '2023-06-07 16:12:26', '2023-07-01', '2024-02-01'),
(19, 20, 467, '2024-01-01', '2023-02-26 18:38:59', '2023-02-07', '2023-02-07'),
(20, 11, 443, '2024-01-01', '2023-02-26 18:39:24', '2023-02-07', '2023-02-07'),
(21, 14, 464, '2024-01-01', '2023-02-26 18:38:40', '2023-02-07', '2023-02-07'),
(22, 15, 456, '2024-01-01', '2023-06-03 18:02:42', '2023-02-07', '2023-02-07'),
(23, 19, 416, '2024-01-01', '2023-06-07 16:12:17', '2023-02-07', '2023-02-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_pass` varchar(35) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_pass`, `user_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'prueba', 'c893bad68927b457dbed39460e6afd62', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `cat_citas`
--
ALTER TABLE `cat_citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_clientes`
--
ALTER TABLE `cat_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_type_id` (`item_type_id`);

--
-- Indices de la tabla `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cat_citas`
--
ALTER TABLE `cat_citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `cat_clientes`
--
ALTER TABLE `cat_clientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `expired`
--
ALTER TABLE `expired`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
