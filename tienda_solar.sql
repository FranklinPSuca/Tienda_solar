-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2025 a las 07:51:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_solar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Kit Solar'),
(2, 'Paneles'),
(3, 'Baterias'),
(4, 'Inversores'),
(5, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_info`
--

CREATE TABLE `clientes_info` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `tipo_instalacion` enum('residencial','comercial','industrial','agricola') DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id`, `orden_id`, `producto_id`, `cantidad`, `precio_unitario`) VALUES
(1, 1, 8, 1, 290.00),
(2, 2, 8, 1, 290.00),
(3, 3, 8, 5, 290.00),
(4, 4, 7, 1, 780.00),
(5, 4, 8, 1, 290.00),
(6, 4, 9, 1, 45.00),
(7, 5, 8, 1, 290.00),
(8, 6, 3, 1, 2100.00),
(9, 7, 7, 1, 780.00),
(10, 8, 7, 1, 780.00),
(11, 9, 7, 2, 780.00),
(12, 10, 1, 1, 850.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `fecha`, `total`) VALUES
(1, '2025-11-19 18:56:49', 290.00),
(2, '2025-11-19 20:46:39', 290.00),
(3, '2025-11-19 20:53:27', 1450.00),
(4, '2025-11-19 21:21:22', 1115.00),
(5, '2025-11-30 18:54:59', 290.00),
(6, '2025-11-30 19:06:24', 2100.00),
(7, '2025-11-30 20:20:36', 780.00),
(8, '2025-11-30 22:19:09', 780.00),
(9, '2025-11-30 23:10:03', 1560.00),
(10, '2025-12-01 00:10:36', 850.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` int(6) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `categoria_id`) VALUES
(1, 500002, 'Panel Solar Monocristalino 450W', 'Alta eficiencia para instalaciones residenciales y comerciales.', 850.00, 19, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSp0vGlzFnlAFD0Z8vhi8SnnQhPDQETIZAg5p3pyXafOujJ-4B5FcM-APII06vY_ePQkL4lhcFZtF6q8c6SA9hFJeqvdmoz3zPllslIV2Nu3EcVwmUx_XXG7n9BzbyjtmX5-gXdRHlV&usqp=CAc', 2),
(2, 500003, 'Panel Solar Policristalino 330W', 'Excelente rendimiento en climas cálidos y nubosos.', 620.00, 15, 'https://tiendasolarcolombia.com/wp-content/uploads/2022/02/POLI-330W.jpg', 2),
(3, 300001, 'Inversor Solar 5kW', 'Convierte energía solar en corriente alterna para uso doméstico.', 2100.00, 9, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRxFT8DjbbsmC7-bXkCLHb-IW_qQHHhITdH8xDdjxVpDG13lC77UOs7AHT9sbA_vTjBmjivXTZxxe_QhMfNzlyIAOi1CfJWwGF8s1-tlGasoAVibzskORwwVLJ-Izu-SIukwVicUihk2OY&usqp=CAc', 4),
(4, 100003, 'Controlador de Carga MPPT 60A', 'Optimiza la carga de baterías desde paneles solares.', 480.00, 25, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcR39OkgsrqQ9U-JpIvmUbwBkOqImfTNWAdy0lX5xlRW_EL5hT2Um_7X7J-kafb_x0TWFp92ib9o7ZLpWtXn9-HDd0DBJkWvJ3qPIsdA2SXEUL0wkdBwsIa1QejiROypnxw7skse1g&usqp=CAc', 5),
(5, 200001, 'Batería de Litio 48V 200Ah', 'Almacenamiento de energía con larga vida útil.', 3200.00, 15, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTLGu5JnbiKgQNuirHeJnbTjd9g6kFFmj_moQKPOFpVrxKgJLcfI6o7g0Tpx6v6jbxhNduzF500fIUVD0tSUCySGtJI_lLgkRT93RSFu7OjskUwNmW2dlPqCKfjHkLakcOBV2BRYZUZeto&usqp=CAc', 3),
(6, 100004, 'Estructura de Montaje para Techo', 'Soporte resistente para paneles solares en techos inclinados.', 350.00, 30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMbd74FRduwlnexdl1ais3Efo-DHCUcD_e7w&s', 5),
(7, 400001, 'Kit Solar Portátil 100W', 'Ideal para camping y zonas rurales sin acceso eléctrico.', 780.00, 7, 'https://cdn.autosolar.pe/images/kits-solares-aislada/kit-solar-aislado-5500w-48v-18300whdia-tensite-one_thumb_main.jpg', 1),
(8, 100001, 'Cable Solar 4mm Rojo 100m', 'Cable resistente a rayos UV para instalaciones solares.', 290.00, 28, 'https://cdn.autosolar.pe/images/5201002/cable-unifilar-solar-pv-6mm2-h1z2z2-k-15kv-1m-rojo-thumb.jpg', 5),
(9, 100002, 'Conector MC4 Par', 'Conectores estándar para paneles solares.', 45.00, 99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReGqStXAtQboXcxxx-VbJ2iPvFjDmJSuq7Zg&s', 5),
(10, 500001, 'Panel Solar Flexible 150W', 'Ligero y adaptable para superficies curvas.', 690.00, 18, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-2yFmIAoXmIwOXMilr5VowoP5BXPI34ZSTw&s', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','user') NOT NULL DEFAULT 'user',
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `creado_en`) VALUES
(1, 'Juan Pérez', 'juan@example.com', '$2y$10$abcdefghijklmnopqrstuv1234567890abcdefghiJKLmnopqrs', 'user', '2025-12-01 06:39:57'),
(3, 'Admin Principal', 'admin@tienda.com', '$2y$10$bg4KoD7VUI9Z0k5GZxD9dOtJadCkAYuucusgjKGkWiWZ4p9EjTS/.', 'admin', '2025-11-19 05:21:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes_info`
--
ALTER TABLE `clientes_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_id` (`orden_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes_info`
--
ALTER TABLE `clientes_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes_info`
--
ALTER TABLE `clientes_info`
  ADD CONSTRAINT `clientes_info_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`orden_id`) REFERENCES `ordenes` (`id`),
  ADD CONSTRAINT `detalle_orden_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
