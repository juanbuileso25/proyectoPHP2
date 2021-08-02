-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2020 a las 04:58:13
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproyectoaulav1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `id_barrio` int(11) NOT NULL,
  `nom_barrio` varchar(50) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `comuna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`id_barrio`, `nom_barrio`, `id_comuna`, `comuna`) VALUES
(1, 'Aldea Pablo VI', 1, NULL),
(2, 'Carpinelo', 1, NULL),
(3, 'El Compromiso', 1, NULL),
(4, 'Granizal', 1, NULL),
(5, 'La Avanzada', 1, NULL),
(6, 'La Esperanza 2', 1, NULL),
(7, 'Moscú 2', 1, NULL),
(8, 'Popular 1', 1, NULL),
(9, 'Popular 2', 1, NULL),
(10, 'Santo Domingo Savio 1', 1, NULL),
(11, 'Santo Domingo Savio 2', 1, NULL),
(12, 'San Pablo', 1, NULL),
(13, 'Villa Guadalupe', 1, NULL),
(14, 'Santa Cruz', 2, NULL),
(15, 'La Isla', 2, NULL),
(16, 'El Playón de Los Comuneros', 2, NULL),
(17, 'Pablo VI', 2, NULL),
(18, 'La Frontera', 2, NULL),
(19, 'La Francia', 2, NULL),
(20, 'Andalucía', 2, NULL),
(21, 'Villa del Socorro', 2, NULL),
(22, 'Villa Niza', 2, NULL),
(23, 'Moscú 1', 2, NULL),
(24, 'La Rosa', 2, NULL),
(25, 'La Salle', 3, NULL),
(26, 'Las Granjas', 3, NULL),
(27, 'Campo Valdes 2', 3, NULL),
(28, 'Santa Inés', 3, NULL),
(29, 'El Raizal', 3, NULL),
(30, 'Manrique Central 2', 3, NULL),
(31, 'Manrique Oriental', 3, NULL),
(32, 'Versalles 1', 3, NULL),
(33, 'Versalles 2', 3, NULL),
(34, 'La Cruz', 3, NULL),
(35, 'La Honda', 3, NULL),
(36, 'Bello Oriente', 3, NULL),
(37, 'Maria Cano - Carambola', 3, NULL),
(38, 'San José La Cima 1', 3, NULL),
(39, 'San José La Cima 2', 3, NULL),
(79, 'Castilla', 5, NULL),
(80, 'Toscana', 5, NULL),
(81, 'Héctor Abad Gómez', 5, NULL),
(82, 'La Paralela', 5, NULL),
(83, 'Las brisas', 5, NULL),
(84, 'Florencia', 5, NULL),
(85, 'Tejelo', 5, NULL),
(86, 'Boyaca', 5, NULL),
(87, 'Belalcazar', 5, NULL),
(88, 'Girardot', 5, NULL),
(89, 'Tricentenario', 5, NULL),
(90, 'Francisco Antonio Zea', 5, NULL),
(91, 'Caribe', 5, NULL),
(128, 'Robledo', 7, NULL),
(129, 'El Volador', 7, NULL),
(130, 'San Germán', 7, NULL),
(131, 'Barrio Facultad de Minas', 7, NULL),
(132, 'La Pilarica', 7, NULL),
(133, 'Bosques de San Pablo ', 7, NULL),
(134, 'Altamira', 7, NULL),
(135, 'Córdoba ', 7, NULL),
(136, 'López de Mesa', 7, NULL),
(137, 'El Diamante', 7, NULL),
(138, 'Aures  1', 7, NULL),
(139, 'Aures  2', 7, NULL),
(140, 'Bello Horizonte', 7, NULL),
(141, 'Villa Flora', 7, NULL),
(142, 'Palenque', 7, NULL),
(143, 'Cucaracho', 7, NULL),
(144, 'Fuente Clara', 7, NULL),
(145, 'Santa Margarita', 7, NULL),
(146, 'Olaya Herrera', 7, NULL),
(147, 'Pajarito', 7, NULL),
(148, 'Monteclaro', 7, NULL),
(149, 'Villa de La Iguaná', 7, NULL),
(150, 'La Cuchilla', 7, NULL),
(151, 'La Aurora', 7, NULL),
(152, 'La Campiña', 7, NULL),
(153, 'Villa Hermosa', 8, NULL),
(154, 'La Mansión', 8, NULL),
(155, 'San Miguel', 8, NULL),
(156, 'La Ladera', 8, NULL),
(157, 'Golondrinas', 8, NULL),
(158, 'Batallón Girardot ', 8, NULL),
(159, 'Llanaditas', 8, NULL),
(160, 'Los Mangos ', 8, NULL),
(161, 'Tres esquinas', 8, NULL),
(162, 'Sucre', 8, NULL),
(163, 'El Pinal', 8, NULL),
(164, 'Trece de Noviembre', 8, NULL),
(165, 'La Libertad', 8, NULL),
(166, 'Villatina', 8, NULL),
(167, 'San Antonio', 8, NULL),
(168, 'Las Estancias', 8, NULL),
(169, 'Villa Turbay', 8, NULL),
(170, 'La Sierra', 8, NULL),
(171, 'Villa Lilliam', 8, NULL),
(172, 'Esfuerzos de Paz  1', 8, NULL),
(173, 'Esfuerzos de Paz  2', 8, NULL),
(174, 'Enciso', 8, NULL),
(175, 'Buenos aires', 9, NULL),
(176, 'Caicedo', 9, NULL),
(177, 'Juan Pablo II', 9, NULL),
(178, 'Ocho de Marzo', 9, NULL),
(179, 'Barrio de Jesus', 9, NULL),
(180, 'Bomboná 2 ', 9, NULL),
(181, 'Los Cerros - El Vergel', 9, NULL),
(182, 'Alejandro Echavarría ', 9, NULL),
(183, 'Miraflores', 9, NULL),
(184, 'Cataluña', 9, NULL),
(185, 'La Milagrosa', 9, NULL),
(186, 'Gerona', 9, NULL),
(187, 'El Salvador', 9, NULL),
(188, 'Loreto', 9, NULL),
(189, 'Asomadera  1', 9, NULL),
(190, 'Asomadera  2', 9, NULL),
(191, 'Asomadera  3', 9, NULL),
(192, 'Quinta Linda', 9, NULL),
(193, 'Barrio Pablo Escobar', 9, NULL),
(194, 'Carpinelo', 9, NULL),
(195, 'La Candelaria', 10, NULL),
(196, 'Prado', 10, NULL),
(197, 'Jesús Nazareno', 10, NULL),
(198, 'El Chagualo', 10, NULL),
(199, 'Estación Villa', 10, NULL),
(200, 'San Benito ', 10, NULL),
(201, 'Guayaquil', 10, NULL),
(202, 'Corazón de Jesús - Barrio Triste ', 10, NULL),
(203, 'Calle Nueva', 10, NULL),
(204, 'Perpetuo Socorro', 10, NULL),
(205, 'Barrio Colón', 10, NULL),
(206, 'Las Palmas', 10, NULL),
(207, 'Bomboná  1', 10, NULL),
(208, 'Boston', 10, NULL),
(209, 'Los Ángeles', 10, NULL),
(210, 'Villa Nueva', 10, NULL),
(211, 'San Diego', 10, NULL),
(212, 'Los Conquistadores', 11, NULL),
(213, 'Laureles', 11, NULL),
(214, 'Carlos E. Restrepo', 11, NULL),
(215, 'Suramericana', 11, NULL),
(216, 'Naranjal', 11, NULL),
(217, 'San Joaquín ', 11, NULL),
(218, 'Bolivariana', 11, NULL),
(219, 'Las Acacias ', 11, NULL),
(220, 'La Castellana', 11, NULL),
(221, 'Lorena', 11, NULL),
(222, 'El Velódromo', 11, NULL),
(223, 'Estadio', 11, NULL),
(224, 'Los Colores', 11, NULL),
(225, 'Cuarta Brigada', 11, NULL),
(226, 'Florida Nueva', 11, NULL),
(268, 'San Javier  1', 13, NULL),
(269, 'San Javier  2', 13, NULL),
(270, 'Blanquizal', 13, NULL),
(271, 'El Pesebre', 13, NULL),
(272, 'Santa Rosa de Lima', 13, NULL),
(273, 'Los Alcázares ', 13, NULL),
(274, 'Metropolitano', 13, NULL),
(275, 'La Pradera ', 13, NULL),
(276, 'Juan XXIII', 13, NULL),
(277, 'Barrio Cristóbal', 13, NULL),
(278, 'Veinte de Julio', 13, NULL),
(279, 'Belencito', 13, NULL),
(280, 'Betania', 13, NULL),
(281, 'El Corazón', 13, NULL),
(282, 'Las Independencias ', 13, NULL),
(283, 'Nuevos Conquistadores', 13, NULL),
(284, 'El Salado', 13, NULL),
(285, 'Eduardo Santos', 13, NULL),
(286, 'Peñitas', 13, NULL),
(287, 'Antonio Nariño', 13, NULL),
(288, 'El Socorro', 13, NULL),
(289, 'Calasania', 13, NULL),
(290, 'Castropol', 14, NULL),
(291, 'Barrio Colombia', 14, NULL),
(292, 'Villa Carlota', 14, NULL),
(293, 'Lalinde', 14, NULL),
(294, 'Manila', 14, NULL),
(295, 'Las Lomas 1 ', 14, NULL),
(296, 'Las Lomas 2', 14, NULL),
(297, 'Altos del Poblado ', 14, NULL),
(298, 'El Tesoro', 14, NULL),
(299, 'Los Naranjos', 14, NULL),
(300, 'Los Balsos 1', 14, NULL),
(301, 'Los Balsos 2', 14, NULL),
(302, 'San Lucas', 14, NULL),
(303, 'El Diamante', 14, NULL),
(304, 'El Castillo ', 14, NULL),
(305, 'Alejandría', 14, NULL),
(306, 'La Florida', 14, NULL),
(307, 'El Poblado', 14, NULL),
(308, 'Astorga', 14, NULL),
(309, 'Patio Bonito', 14, NULL),
(310, 'La Aguacatala', 14, NULL),
(311, 'Santa María de Los Ángeles', 14, NULL),
(312, 'Ciudad del Rio', 14, NULL),
(313, 'Tenche', 15, NULL),
(314, 'Trinidad', 15, NULL),
(315, 'Santa Fé', 15, NULL),
(316, 'Campo amor', 15, NULL),
(317, 'Manzanares', 15, NULL),
(318, 'Cristo Rey ', 15, NULL),
(319, 'Mallorca', 15, NULL),
(320, 'Guayabal ', 15, NULL),
(321, 'La colina', 15, NULL),
(322, 'Belen', 16, NULL),
(323, 'Rodeo Alto', 16, NULL),
(324, 'Aguas Frías', 16, NULL),
(325, 'Cerro Nutibara', 16, NULL),
(326, 'Fátima', 16, NULL),
(327, 'Rosales', 16, NULL),
(328, 'Granada', 16, NULL),
(329, 'San Bernardo ', 16, NULL),
(330, 'Las Playas', 16, NULL),
(331, 'Diego Echavarria', 16, NULL),
(332, 'La Mota', 16, NULL),
(333, 'El Rincón', 16, NULL),
(334, 'La Hondonada', 16, NULL),
(335, 'La Loma de Los Bernal', 16, NULL),
(336, 'La Gloria ', 16, NULL),
(337, 'Altavista', 16, NULL),
(338, 'La Palma', 16, NULL),
(339, 'Zafra', 16, NULL),
(340, 'Los Alpes', 16, NULL),
(341, 'Las Violetas', 16, NULL),
(342, 'Las Mercedes', 16, NULL),
(343, 'Nueva Villa de Aburrá', 16, NULL),
(344, 'Miravalle', 16, NULL),
(345, 'El nogal', 16, NULL),
(346, 'Los almendros', 16, NULL),
(347, 'La América', 12, NULL),
(348, 'Ferrini', 12, NULL),
(349, 'Calasanz', 12, NULL),
(350, 'Los Pinos', 12, NULL),
(351, 'La Floresta', 12, NULL),
(352, 'Santa Lucía ', 12, NULL),
(353, 'El Danubio', 12, NULL),
(354, 'Campo Alegre ', 12, NULL),
(355, 'Santa Mónica', 12, NULL),
(356, 'Barrio Cristóbal', 12, NULL),
(357, 'Simón Bolívar', 12, NULL),
(358, 'Santa Teresita', 12, NULL),
(359, 'Calasanz Parte Alta', 12, NULL),
(360, 'Aranjuez', 4, NULL),
(361, 'Belín', 4, NULL),
(362, 'San Isidro', 4, NULL),
(363, 'Palermo', 4, NULL),
(364, 'Moravia', 4, NULL),
(365, 'Sevilla', 4, NULL),
(366, 'San Pedro', 4, NULL),
(367, 'Manrique Central 1', 4, NULL),
(368, 'Campo Valdés  1', 4, NULL),
(369, 'Las Esmeraldas', 4, NULL),
(370, 'La Piñuela', 4, NULL),
(371, 'Brasilia', 4, NULL),
(372, 'Miranda', 4, NULL),
(373, 'Doce de Octubre  1', 6, NULL),
(374, 'Doce de Octubre  2', 6, NULL),
(375, 'Santander ', 6, NULL),
(376, 'Pedregal', 6, NULL),
(377, 'La Esperanza', 6, NULL),
(378, 'San Martín de Porres', 6, NULL),
(379, 'Kennedy', 6, NULL),
(380, 'Picacho', 6, NULL),
(381, 'Picachito', 6, NULL),
(382, 'Mirador del Doce', 6, NULL),
(383, 'El Progreso  2', 6, NULL),
(384, 'El Triunfo', 6, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_inactivo` date DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `cupo` double NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `barrio` varchar(100) DEFAULT NULL,
  `comuna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `codigo`, `documento`, `tipo`, `fecha_registro`, `fecha_inactivo`, `imagen`, `email`, `telefono`, `cupo`, `usuario`, `estado`, `barrio`, `comuna`) VALUES
('Lucero Andrea Serna Villa', '01234', '1035431247', 'Natural', '2020-05-03', '0000-00-00', 'client.png', 'luces3800@hotmail.com', 2147483647, 3000000, 'Lucero', 'inactivo', NULL, NULL),
('Juan David ', '0123412', '100320583', 'Natural', '2020-06-03', '0000-00-00', 'client.png', 'emanel12@gmail.com', 214748364, 3000000, 'juan', 'inactivo', 'Belalcazar', 'Castilla'),
('Carlos ', '12345', '1000454534', 'Natural', '2020-05-16', '0000-00-00', 'user.png', 'oscar71@gmail.com', 2147483647, 3000000, 'carlos', 'inactivo', NULL, NULL),
('Maria Isabel Ochoa Diaz', '17282', '42686691', 'Natural', '2020-05-02', NULL, 'client1.png', 'isaochoa73@gmail.com', 2147483647, 30000000, 'Isabel', 'inactivo', NULL, NULL),
('Rigo', '256', '7589', 'Natural', '2020-06-10', '0000-00-00', 'client1.png', 'sksks@hotmail.com', 2147483647, 30000000, 'Rigoberto', 'activo', 'Boyaca', 'Castilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id_comuna` int(11) NOT NULL,
  `nombre_comuna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id_comuna`, `nombre_comuna`) VALUES
(1, 'Popular'),
(2, 'Santa Cruz'),
(3, 'Manrique'),
(4, 'Aranjuez'),
(5, 'Castilla'),
(6, 'Doce de Octubre'),
(7, 'Robledo'),
(8, 'Villa Hermosa'),
(9, 'Buenos Aires'),
(10, 'La Candelaria'),
(11, 'Laureles'),
(12, 'La America'),
(13, 'San Javier'),
(14, 'El Poblado'),
(15, 'Guayabal'),
(16, 'Belén');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `nombre` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_retiro` varchar(45) DEFAULT NULL,
  `salario_basico` varchar(45) NOT NULL,
  `deducion` double NOT NULL,
  `foto` varchar(100) NOT NULL,
  `hoja_vida` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `barrio` varchar(100) DEFAULT NULL,
  `comuna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`nombre`, `documento`, `fecha_ingreso`, `fecha_retiro`, `salario_basico`, `deducion`, `foto`, `hoja_vida`, `email`, `telefono`, `celular`, `usuario`, `estado`, `barrio`, `comuna`) VALUES
('Santiago Medina ', '100320', '2020-06-03', '', '500000', 0, 'client1.png', 'proyecto de aula php.docx', 'emanuel@gmail.com', 2147483647, 1212123232, 'santiago', 'activo', 'Kennedy', 'Doce de Octubre'),
('Lucero Andrea Serna Villa', '1035431247', '2020-05-06', '', '200000033', 0, 'user.png', 'Hoja de vida (2).pdf', 'luces3800@hotmail.com', 655433, 1212123232, 'Lucero', 'inactivo', NULL, NULL),
('Juan David ', '10354312471', '2020-06-08', NULL, '950.000', 0, 'provider.png', 'Hoja de vida (2).pdf', 'emanuel@gmail.com', 2147483647, 1212123232, 'juan', 'inactivo', 'El Diamante', 'Robledo'),
('Juan David ', '123345', '2020-05-02', '', '1000000', 2000, 'employee1.png', 'Correos.txt', 'oscar71@gmail.com', 1234456, 1212123232, 'empleado', 'inactivo', NULL, NULL),
('Rolando', '4556778', '2020-06-02', '', '781247', 0, 'employee.png', 'Hoja de vida (2).pdf', 'luces3800@hotmail.com', 2147483647, 121212323, 'rolando', 'inactivo', 'El Salado', 'San Javier'),
('Andresss', '8965', '2020-06-10', NULL, '1000', 200, 'client.png', 'Hoja de vida (2).pdf', 'Andre@gmail.com', 2569835, 30014587, 'Andres', 'activo', 'Aranjuez', 'Aranjuez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_not` int(11) NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuarioN` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_not`, `descripcion`, `fecha`, `usuarioN`, `estado`) VALUES
(3, 'Solicito modificar contraseña ', '2020-05-21 02:32:07', 'cliente', 'inactivo'),
(4, 'Quiero modificar el correo por el siguiente: santiago@gmail.com', '2020-05-21 04:19:58', 'cliente ', 'inactivo'),
(5, 'Solicito cambiar contraseña', '2020-05-21 04:08:33', 'cliente', 'inactivo'),
(7, 'Solicito modificar la dirección por Cra 39 # 43 34                ', '2020-06-11 01:50:31', 'cliente', 'inactivo'),
(8, 'solicito modificar contraseña', '2020-05-23 16:42:14', 'cliente', 'inactivo'),
(9, '     Solicito modificar la contraseña', '2020-05-22 02:57:16', 'proveedor', 'inactivo'),
(10, 'Solicito modificar contraseña               ', '2020-05-23 16:37:54', 'empleado', 'inactivo'),
(11, 'Solicito modificar mi número de telefono por 3012195631             ', '2020-05-23 16:40:23', 'proveedor', 'inactivo'),
(12, 'Solicito modificar contraseña', '2020-05-23 22:27:55', 'proveedor', 'inactivo'),
(13, 'Solicito modificar contraseña', '2020-06-11 01:50:35', 'proveedor', 'inactivo'),
(14, 'Solicito modificar mi correo               ', '2020-06-11 01:50:38', 'proveedor', 'inactivo'),
(15, 'Hola', '2020-06-11 01:50:43', 'cliente', 'inactivo'),
(16, 'Solicito por favor el cambio de correo por este: familia1234@gmail.com             ', '2020-06-11 02:14:43', 'Familia', 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombreP` varchar(45) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `id_proveedor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombreP`, `imagen`, `estado`, `id_proveedor`) VALUES
(20, 'Media', 'medias.png', 'inactivo', '1035431247'),
(23, 'NuevaChaquetaMoto', 'chaqueta.jpg', 'activo', '1035431247'),
(24, '', '', 'inactivo', '1035431247');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `documento` varchar(50) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_inactivo` date DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `barrio` varchar(100) DEFAULT NULL,
  `comuna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`documento`, `nombre`, `tipo`, `fecha_registro`, `fecha_inactivo`, `imagen`, `email`, `telefono`, `usuario`, `estado`, `barrio`, `comuna`) VALUES
('1030405040', 'Andrea Serna Villa', 'Natural', '1219-04-02', '0000-00-00', 'client1.png', 'luces3800@hotmail.com', '3204455631', 'andrea', 'inactivo', '', 'Castilla'),
('1035431247', 'Emanuel', 'Natural', '2020-06-03', '0000-00-00', 'provider.png', 'emanuel@gmail.com', '3204455631', 'proveedor', 'activo', 'Calasanz', 'La America'),
('15509694', 'Oscar Hernando Builes restrepo', 'Natural', '2020-05-27', '0000-00-00', 'provider1.png', 'oscar71@gmail.com', '321345432', 'Oscar', 'inactivo', NULL, NULL),
('23232323', 'Romels ', 'Natural', '2020-06-02', '0000-00-00', 'employee.png', 'emanuel@gmail.com', '3204455631', 'romels', 'inactivo', 'Altos del Poblado', 'El Poblado'),
('23234353543', 'Rolando ', 'Juridica', '2020-06-03', '0000-00-00', 'client1.png', 'emanuel@gmail.com', '3204455631', 'rolando', 'activo', 'Astorga', 'El Poblado'),
('890432432', 'Productos Familia', 'Juridica', '2020-06-10', '0000-00-00', 'familia.jpg', 'familia1234@gmail.com', '3456576', 'Familia', 'activo', 'Las Palmas', 'La Candelaria'),
('890456433', 'Cueros Velez', 'Juridica', '2020-05-06', '0000-00-00', 'user1.png', 'velez@gmail.com', '3204455631', 'velez', 'inactivo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubi` int(50) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `perfil` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `nom_usu` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubi`, `latitud`, `longitud`, `usuario`, `perfil`, `nom_usu`) VALUES
(7, 6.2466421, -75.5746466, 'Isabel', 'cliente', 'Maria Isabel Ochoa Diaz'),
(8, 6.2296926, -75.5725287, 'Oscar', 'proveedor', 'Oscar Builes'),
(9, 6.2202706, -75.578084, 'Lucero', 'cliente', 'Lucero Andrea Serna Villa'),
(10, 6.2286165, -75.5811444, 'velez', 'proveedor', 'Cueros Velez'),
(12, 6.231586, -75.6120215, 'juan', 'empleado', 'Juan David '),
(13, 6.2524819, -75.5813565, 'Familia', 'proveedor', 'Productos Familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(45) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `contrasena`, `perfil`, `estado`) VALUES
('admin', '$2y$04$XigrvcwNNG325hRBFWQ7fONZld4BlqLYaA2Wg0VEWttQrsqrF8que', 'admin', 'activo'),
('andrea', '$2y$04$ki8mTIdYyPJ7snuizv00z.kKZQTLPh0cIzYfbyB2Dpqv8bcw1d0IW', 'admin', 'activo'),
('Andres', '$2y$04$h9l3BPUIUzQjAgi2ITP7RekfrzuwwpURTi8.QGG1RXVsZaUGttqkO', 'empleado', 'activo'),
('carlos', '$2y$04$oj4WdNiaDLnJgyfPFTkZg.kX8hI7Ogw2TTIM/4mj5VJG62XIqmzoa', 'admin', 'inactivo'),
('cliente', '$2y$04$OohRpPc43sx72RIxGtq/x.MEHAwO9YNj3Bu1jYPmup.KV209h0wgy', 'cliente', 'activo'),
('Danilo', '$2y$04$HqtPaipzkXX1ZsYgaw0vU.d3ZhRm65VDT2Ljl219pWQjt7hweU1p6', 'cliente', 'activo'),
('empleado', '$2y$04$goibu7GZ/vb8ilmVBvI.ku7c3iXYh4UyvF2X79ibatwW0CIy/142O', 'empleado', 'activo'),
('Familia', '$2y$04$RIDyfqY5LHUM/ITbzV4Ln.Jx6fbjq99o9NOIuwLqc1uVsOLcYuzWS', 'proveedor', 'activo'),
('Isabel', '$2y$04$b4uuzS2JAjGh9ON79KNwKeDvBwPoV0otV9.ITmRNPt63.onk00.HK', 'empleado', 'inactivo'),
('juan', '$2y$04$hczluuapgwnSKLiE8B4gLODdxBGQVpYlrJalDJLrhqLlIPNyCGpmC', 'cliente', 'activo'),
('Lucero', '$2y$04$UogUFjsuX9KSNbyPGSvUyeiaiBzT4p5.7htUQ4QBFgqRlefXA0e7S', 'cliente', 'inactivo'),
('Oscar', '$2y$04$Mf2NddBGw18k79.4FE8AUOrwPurxoKKynLZbEPlMZ1aTITf.15lPK', 'proveedor', 'inactivo'),
('proveedor', '$2y$04$MW/Exs2.HVqmdWec0UAwjeaRIf5ZwjU7PltlMPRpecZ16.KvsGMyy', 'proveedor', 'activo'),
('Rigoberto', '$2y$04$zxNXingvRVWr6Y9igJUiXeeUHH19VJ6xEAKPcwxn0/zKYnADfhEuW', 'cliente', 'activo'),
('Robinson', '$2y$04$SLUcVmZz/BkrhvMsTvYRjupzRyuXaLq8D87.6R', 'admin', 'inactivo'),
('rolando', '$2y$04$s0tXaPnoaidkwLeRgKwgruosiSDjbO1zUl5Tj/0h.GSoKG8G3UXCW', 'empleado', 'activo'),
('romels', '$2y$04$hTSxoOmLb4JqCdrOpvQVZuT8wNoUuqDcHzWVzF7JhTzql0kQxXhPK', 'empleado', 'inactivo'),
('santiago', '$2y$04$YoXkPWS5Uve7QKuq9rF8QuqrvhAc5BmUtLD2S949b3ZRq1vew85uK', 'admin', 'activo'),
('velez', '$2y$04$4aGQW20W0yZ8eoNkXEcXtezOLdYWrTYhALMDch', 'proveedor', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`id_barrio`),
  ADD KEY `id_comuna` (`id_comuna`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id_comuna`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_not`),
  ADD KEY `usuario` (`usuarioN`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubi`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `perfil` (`perfil`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `perfil` (`perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD CONSTRAINT `barrios_ibfk_2` FOREIGN KEY (`id_comuna`) REFERENCES `comunas` (`id_comuna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `usuario_cliente` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nombre`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `usuario_empleado` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nombre`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_notificaciones_usuario` FOREIGN KEY (`usuarioN`) REFERENCES `usuario` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `usuario_proveedor` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nombre`);

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
