-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2024 a las 03:07:23
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
-- Base de datos: `realstate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idInmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesinmuebles`
--

CREATE TABLE `imagenesinmuebles` (
  `IdImagen` int(11) NOT NULL,
  `RutaImagen` varchar(255) NOT NULL,
  `IdInmueble` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenesinmuebles`
--

INSERT INTO `imagenesinmuebles` (`IdImagen`, `RutaImagen`, `IdInmueble`) VALUES
(5, 'imagenes/img_65ff2a52e5710_1711221330.png', 3),
(6, 'imagenes/img_65ff2a537fe25_1711221331.jpg', 3),
(7, 'imagenes/img_65ff2a54afadb_1711221332.jpg', 3),
(8, 'imagenes/img_65ff2a552dd52_1711221333.jpg', 3),
(13, 'imagenes/img_65ff2b0ba567b_1711221515.jpg', 5),
(14, 'imagenes/img_65ff2b0bcff97_1711221515.jpg', 5),
(15, 'imagenes/img_65ff2b0be094f_1711221515.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `IdCategoria` int(11) NOT NULL,
  `Nombres` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`IdCategoria`, `Nombres`) VALUES
(1, 'Casa'),
(2, 'Apartamento'),
(3, 'Lote'),
(4, 'Finca'),
(5, 'Bodega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcita`
--

CREATE TABLE `tblcita` (
  `IdCita` int(11) NOT NULL,
  `Dirección` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Telefono` varchar(12) DEFAULT NULL,
  `codigoc` int(11) NOT NULL,
  `infoinmueble` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinmueble`
--

CREATE TABLE `tblinmueble` (
  `IdInmueble` int(11) NOT NULL,
  `Precio` varchar(200) NOT NULL,
  `Localidad` varchar(15) NOT NULL,
  `Dirección` varchar(50) NOT NULL,
  `Estrato` int(11) NOT NULL,
  `Area_construida` varchar(20) NOT NULL,
  `NumeroPisos` int(11) DEFAULT NULL,
  `Habitaciones` int(11) DEFAULT NULL,
  `Baños` int(11) DEFAULT NULL,
  `Cocina` int(11) DEFAULT NULL,
  `Garaje` varchar(10) DEFAULT NULL,
  `Patio` varchar(10) DEFAULT NULL,
  `Estudio` varchar(10) DEFAULT NULL,
  `Contacto` varchar(50) NOT NULL,
  `codigoc` int(11) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblinmueble`
--

INSERT INTO `tblinmueble` (`IdInmueble`, `Precio`, `Localidad`, `Dirección`, `Estrato`, `Area_construida`, `NumeroPisos`, `Habitaciones`, `Baños`, `Cocina`, `Garaje`, `Patio`, `Estudio`, `Contacto`, `codigoc`, `descripcion`) VALUES
(3, '160000000', 'bosa', 'cra18num13', 4, '120', 2, 4, 4, 1, '5', '1', '5', '32245575671', 2, 'cam,vinga vkjmxc hn nikvcnmvjndsioncfisdiucbu9fdnou cbicxnvji sanm  zmvkondmivn smcdsnmodm9udsjfipjf psh´gñn mhgkphjmkomvjodsmcfkp ijbnm pam xvihjnldk g8uyhj iokdvnguomdkjlbnerkpnd puv otm gimlñb ojrtgnbmkh ghirfmbopgmpfñdtjgn0p{,mxcvkogmklñjmdpsg jodx ni km bkjozdmfgbko jkgfoigmhwtghjp kdopftmgoimgf0ihmvi´d'),
(5, '150000000', 'soacha', 'cra18num', 4, '1000m2', 5, 4, 1, 2, '1', '1', '1', '32228978', 1, 'ronal wrvha8 h4yuerhfa4iuw gweuar bfuobwuyw4ef8yierh  gbfjkfklszxniuwenduiovnosgnirons r jnbsdfkb 9uaeisrbn ewg eduhbf uoernf ond oewdjnvjols nsdf 9uew hehuvl y8ld hnrdhfjsd hfudahns o fmocxpmodi  ihjnoxljdsxzncd ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `id` int(11) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Contraseña` varchar(40) NOT NULL,
  `rol` enum('usuario','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`id`, `Nombres`, `Correo`, `Contraseña`, `rol`) VALUES
(1, 'isagi', 'solobluelock@gmail.com', '12345', 'administrador'),
(6, 'cloy', 'cloychillona@gmail.com', '1628', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idInmueble` (`idInmueble`);

--
-- Indices de la tabla `imagenesinmuebles`
--
ALTER TABLE `imagenesinmuebles`
  ADD PRIMARY KEY (`IdImagen`),
  ADD KEY `IdInmueble` (`IdInmueble`);

--
-- Indices de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `tblcita`
--
ALTER TABLE `tblcita`
  ADD PRIMARY KEY (`IdCita`);

--
-- Indices de la tabla `tblinmueble`
--
ALTER TABLE `tblinmueble`
  ADD PRIMARY KEY (`IdInmueble`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenesinmuebles`
--
ALTER TABLE `imagenesinmuebles`
  MODIFY `IdImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblcita`
--
ALTER TABLE `tblcita`
  MODIFY `IdCita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblinmueble`
--
ALTER TABLE `tblinmueble`
  MODIFY `IdInmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tblusuarios` (`id`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`idInmueble`) REFERENCES `tblinmueble` (`IdInmueble`);

--
-- Filtros para la tabla `imagenesinmuebles`
--
ALTER TABLE `imagenesinmuebles`
  ADD CONSTRAINT `imagenesinmuebles_ibfk_1` FOREIGN KEY (`IdInmueble`) REFERENCES `tblinmueble` (`IdInmueble`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
