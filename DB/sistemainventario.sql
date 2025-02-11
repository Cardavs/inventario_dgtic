-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 22:25:29
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemainventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `Area_Id` int(11) NOT NULL,
  `AreaNombre` varchar(100) NOT NULL,
  `Seccion_Id` int(11) NOT NULL,
  `AreaEstado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`Area_Id`, `AreaNombre`, `Seccion_Id`, `AreaEstado`) VALUES
(1, 'Apoyo a la Actividad Matemática', 1, 1),
(2, 'Bases de Datos', 1, 1),
(3, 'Cómputo para niños y jóvenes', 1, 1),
(4, 'Desarrollo de aplicaciones para móviles', 1, 0),
(5, 'Desarrollo web', 1, 0),
(6, 'Diseño editorial y gráfico', 1, 1),
(7, 'Herramientas para la administración de proyectos', 1, 1),
(8, 'Introducción a las tecnologías de información', 1, 1),
(9, 'Lenguajes de programación', 1, 1),
(10, 'Ofimática', 1, 1),
(11, 'Seguridad informática', 1, 1),
(12, 'Sistemas operativos', 1, 1),
(13, 'Telecomunicaciones', 1, 1),
(14, 'Web social', 1, 1),
(15, 'Usos Educativos De TIC', 1, 1),
(17, 'Administración de base de datos', 2, 1),
(18, 'Desarrollo de aplicaciones para dispositivos móviles', 2, 1),
(19, 'Desarrollo de aplicaciones empresariales con JAVA', 2, 1),
(20, 'Dirección efectiva de proyectos', 2, 1),
(21, 'Ingeniería de software ágil', 2, 1),
(22, 'Integral de telecomunicaciones', 2, 1),
(23, 'Planeación y construcción de sitios WEB', 2, 1),
(24, 'Herramientas de cómputo para la educación a distancia', 2, 1),
(25, 'Area Ejemplo', 3, 1),
(26, 'Area Ejemplo 2', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE `descargas` (
  `Descarga_Id` int(11) NOT NULL,
  `Sede_Id` int(11) NOT NULL,
  `Usuario_Id` int(11) NOT NULL,
  `Material_Id` int(11) NOT NULL,
  `DescargaFecha` date NOT NULL,
  `DescargaCantidad` int(11) NOT NULL
) ;

--
-- Volcado de datos para la tabla `descargas`
--

INSERT INTO `descargas` (`Descarga_Id`, `Sede_Id`, `Usuario_Id`, `Material_Id`, `DescargaFecha`, `DescargaCantidad`) VALUES
(19, 1, 1, 1, '2023-01-01', 3),
(20, 1, 2, 2, '2023-02-02', 4),
(21, 1, 3, 3, '2023-03-03', 5),
(22, 2, 4, 1, '2023-04-04', 6),
(23, 2, 5, 2, '2023-05-05', 1),
(24, 2, 6, 3, '2023-06-06', 2),
(25, 3, 1, 1, '2023-07-07', 3),
(26, 3, 2, 2, '2023-08-08', 4),
(27, 3, 3, 3, '2023-09-09', 5),
(28, 1, 3, 1, '2023-10-10', 6),
(29, 1, 1, 2, '2023-11-11', 1),
(30, 1, 2, 3, '2023-12-12', 2),
(31, 2, 6, 1, '2023-01-01', 3),
(32, 2, 1, 2, '2023-02-02', 4),
(33, 2, 3, 3, '2023-03-03', 2),
(34, 3, 5, 1, '2023-04-04', 1),
(35, 3, 4, 2, '2023-05-05', 5),
(36, 3, 6, 3, '2023-06-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diplomado`
--

CREATE TABLE `diplomado` (
  `Diplomado_Id` int(11) NOT NULL,
  `DiplomadoNombre` varchar(100) NOT NULL,
  `DiplomadoEmision` varchar(50) NOT NULL,
  `DiplomadoEstado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diplomado`
--

INSERT INTO `diplomado` (`Diplomado_Id`, `DiplomadoNombre`, `DiplomadoEmision`, `DiplomadoEstado`) VALUES
(1, 'Diplomado1', '8', 1),
(2, 'Diplomado2', '5', 0),
(3, 'Diplomado3', '7', 1),
(4, 'Diplomado4', '9', 0),
(5, 'Diplomado5', '10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentoslogin`
--

CREATE TABLE `intentoslogin` (
  `Usuario_Id` int(11) NOT NULL,
  `UsuarioCorreo` varchar(100) NOT NULL,
  `IntentosLoginFecha` date NOT NULL,
  `IntentosLoginNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `Material_Id` int(11) NOT NULL,
  `MaterialNombre` varchar(255) NOT NULL,
  `MaterialEstado` tinyint(1) NOT NULL DEFAULT 1,
  `MaterialISBN` char(13) NOT NULL DEFAULT 'N/A',
  `MaterialTiraje` int(11) NOT NULL DEFAULT 0,
  `MaterialAutor` varchar(100) NOT NULL,
  `MaterialVersion` varchar(50) NOT NULL,
  `MaterialEdicion` int(11) DEFAULT NULL,
  `MaterialPaginas` int(11) DEFAULT NULL,
  `Area_Id` int(11) NOT NULL,
  `MaterialPDF` varchar(255) NOT NULL,
  `MaterialIndice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`Material_Id`, `MaterialNombre`, `MaterialEstado`, `MaterialISBN`, `MaterialTiraje`, `MaterialAutor`, `MaterialVersion`, `MaterialEdicion`, `MaterialPaginas`, `Area_Id`, `MaterialPDF`, `MaterialIndice`) VALUES
(1, 'MaterialEjemplo1', 1, '23213213213', 2132132132, 'Jon Doe', '1.0', 2015, 23, 1, '/inventario_dgtic/material/pdf/Material_Ejemplo_1_1.pdf', '/inventario_dgtic/material/indice/Material_Ejemplo_1_Indice_1.pdf'),
(2, 'Material Ejemplo 2', 1, 'N/A', 0, 'Jane Doe', '3.0', 2013, 30, 3, '/inventario_dgtic/material/pdf/Material_Ejemplo_2_2.pdf', '/inventario_dgtic/material/indice/Material_Ejemplo_2_Indice_2.pdf'),
(3, 'Material Ejempo 3', 1, '231321651', 5, 'Jon Doe', '1.0', 2015, 15, 20, '/inventario_dgtic/material/pdf/Material_Ejemplo_3_3.pdf', '/inventario_dgtic/material/indice/Material_Ejemplo_3_Indice.pdf'),
(4, 'Material Ejemplo 5', 1, 'N/A', 0, 'Jane Doe', '5.0', 2015, 23, 20, '/inventario_dgtic/material/pdf/Material_Ejemplo_5_4.pdf', '/inventario_dgtic/material/indice/Material_Ejemplo_4.pdf'),
(5, 'Material Ejempo 10', 1, 'N/A', 0, 'John Wick', '1.0', 2023, 15, 1, '/inventario_dgtic/material/pdf/Material_Ejempo_50_4.pdf', '/inventario_dgtic/material/indice/Material_Ejempo_5_Indice_4.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `Seccion_Id` int(11) NOT NULL,
  `SeccionNombre` varchar(100) NOT NULL,
  `EstadoSeccion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`Seccion_Id`, `SeccionNombre`, `EstadoSeccion`) VALUES
(1, 'Cursos de Actualización', 1),
(2, 'Diplomados', 1),
(3, 'Cursos Institucionales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `Sede_Id` int(11) NOT NULL,
  `SedeNombre` varchar(100) NOT NULL,
  `SedeSiglas` char(10) NOT NULL,
  `SedeEstado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Sede_Id`, `SedeNombre`, `SedeSiglas`, `SedeEstado`) VALUES
(1, 'Centro Mascarones', 'CM', 1),
(2, 'Ciudad Universitaria', 'CU', 1),
(3, 'Centro Polanco', 'CP', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usuario_Id` int(11) NOT NULL,
  `Sede_Id` int(11) NOT NULL,
  `UsuarioNombre` varchar(100) NOT NULL,
  `UsuarioApaterno` varchar(100) NOT NULL,
  `UsuarioAMaterno` varchar(100) NOT NULL,
  `UsuarioCorreo` varchar(100) NOT NULL,
  `UsuarioPassword` varchar(100) NOT NULL,
  `UsuarioEstado` tinyint(1) NOT NULL DEFAULT 1,
  `UsuarioRol` enum('administrador','CE','editor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usuario_Id`, `Sede_Id`, `UsuarioNombre`, `UsuarioApaterno`, `UsuarioAMaterno`, `UsuarioCorreo`, `UsuarioPassword`, `UsuarioEstado`, `UsuarioRol`) VALUES
(1, 1, 'Angel', 'Argonza', 'Roblero', 'correo1@correo.com', '$2y$10$9Nagdb5FdYbEPmXHmtCJXOSPMFsfDxkf4Mdghf.JxnxJciD.OZ2/W', 1, 'administrador'),
(2, 3, 'Rogelio', 'Sánchez', 'Gómez', 'correo2@correo.com', '$2y$10$4eHd6VpW00OdtVXVYxNrO.4W7qKDqzJmsdxoAjRalBTsgsQRfifDO', 1, 'CE'),
(3, 3, 'Fernando', 'Robles', 'Pérez', 'correo3@correo.com', '$2y$10$dUTYQK5AYKyUnGja2H.pEOh1uFicPiLnph4Y6UrxFCRAEtWVsFwpi', 0, 'CE'),
(4, 2, 'Sandra', 'Mendez', 'Chavez', 'correo4@correo.com', '$2y$10$WQvo4Pd2U1PRtXDKLnIXV.2PpxuRTriJZPOlOwE4XlKnnH8yxhpSO', 0, 'editor'),
(5, 1, 'María', 'Rosal', 'Hernández', 'correo5@correo.com', '$2y$10$i6s.mekI1tXgbuMZJ.auSumHCnJvRRaTXv/jE8iVgE.Gdwb6GsZGC', 1, 'editor'),
(6, 1, 'Felicia', 'Piña', 'Salgado', 'correo6@correo.com', '$2y$10$dQR8DtbqCLkqQR7idolHN.v1bx8ZhdfcKHhFw9B6P2mkQHVRqNeh2', 1, 'CE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area_Id`),
  ADD KEY `area_ibfk_1` (`Seccion_Id`);

--
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD PRIMARY KEY (`Descarga_Id`),
  ADD KEY `Sede_Id` (`Sede_Id`),
  ADD KEY `Usuario_Id` (`Usuario_Id`),
  ADD KEY `Material_Id` (`Material_Id`);

--
-- Indices de la tabla `diplomado`
--
ALTER TABLE `diplomado`
  ADD PRIMARY KEY (`Diplomado_Id`);

--
-- Indices de la tabla `intentoslogin`
--
ALTER TABLE `intentoslogin`
  ADD PRIMARY KEY (`Usuario_Id`),
  ADD KEY `UsuarioCorreo` (`UsuarioCorreo`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`Material_Id`),
  ADD KEY `Area_Id` (`Area_Id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`Seccion_Id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`Sede_Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usuario_Id`),
  ADD UNIQUE KEY `UsuarioCorreo` (`UsuarioCorreo`),
  ADD KEY `Sede_Id` (`Sede_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `Area_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `descargas`
--
ALTER TABLE `descargas`
  MODIFY `Descarga_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diplomado`
--
ALTER TABLE `diplomado`
  MODIFY `Diplomado_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `Material_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `Seccion_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `Sede_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Usuario_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`Seccion_Id`) REFERENCES `secciones` (`Seccion_Id`);

--
-- Filtros para la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD CONSTRAINT `descargas_ibfk_1` FOREIGN KEY (`Sede_Id`) REFERENCES `sedes` (`Sede_Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `descargas_ibfk_2` FOREIGN KEY (`Usuario_Id`) REFERENCES `usuario` (`Usuario_Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `descargas_ibfk_3` FOREIGN KEY (`Material_Id`) REFERENCES `material` (`Material_Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `intentoslogin`
--
ALTER TABLE `intentoslogin`
  ADD CONSTRAINT `intentoslogin_ibfk_1` FOREIGN KEY (`Usuario_Id`) REFERENCES `usuario` (`Usuario_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `intentoslogin_ibfk_2` FOREIGN KEY (`UsuarioCorreo`) REFERENCES `usuario` (`UsuarioCorreo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`Area_Id`) REFERENCES `area` (`Area_Id`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`Area_Id`) REFERENCES `area` (`Area_Id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Sede_Id`) REFERENCES `sedes` (`Sede_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
