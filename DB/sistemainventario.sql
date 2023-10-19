-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2023 a las 04:08:46
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diplomado`
--

CREATE TABLE `diplomado` (
  `Diplomado_Id` int(11) NOT NULL,
  `DiplomadoNombre` varchar(100) NOT NULL,
  `DiplomadoEmision` varchar(50) NOT NULL,
  `DiplomadoEstado` tinyint(1) NOT NULL
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
  `MaterialISBN` varchar(100) DEFAULT NULL,
  `MaterialTiraje` int(11) DEFAULT NULL,
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
(1, 'MaterialEjemplo1', 1, '23213213213', 2132132132, 'Jon Doe', '1.0', 2015, 23, 1, '/inventario_dgtic/public/pdf/DocumentoPrueba.pdf\'', '/inventario_dgtic/public/pdf/DocumentoPrueba.pdf'),
(2, 'Material Ejemplo 2', 1, NULL, NULL, 'Jane Doe', '3.0', 2013, 30, 3, '/inventario_dgtic/public/pdf/DocumentoPrueba.pdf', '/inventario_dgtic/public/pdf/DocumentoPrueba.pdf'),
(3, 'Material Ejempo 3', 1, '231321651', 5, 'Jon Doe', '1.0', 2015, 15, 20, '/inventario_dgtic/public/pdf/Material_Ejempo_3.pdf', '/inventario_dgtic/public/indice/Material_Ejempo_3_Indice.pdf'),
(4, 'Material Ejempo 5', 1, NULL, NULL, 'Jane Doe', '5.0', 2015, 23, 20, '/inventario_dgtic/material/pdf/Material_Ejempo_5.pdf', '/inventario_dgtic/material/indice/Material_Ejempo_5_Indice.pdf'),
(5, 'Material Ejempo 10', 1, NULL, NULL, 'John Wick', '1.0', 2023, 15, 1, '/inventario_dgtic/material/pdf/Material_Ejempo_1.pdf', '/inventario_dgtic/material/indice/Material_Ejempo_1_Indice.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `Seccion_Id` int(11) NOT NULL,
  `SeccionNombre` varchar(100) NOT NULL,
  `EstadoSeccion` int(11) NOT NULL
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
  `SedeSiglas` varchar(50) NOT NULL,
  `SedeEstado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Sede_Id`, `SedeNombre`, `SedeSiglas`, `SedeEstado`) VALUES
(1, 'Centro Mascarones', 'CM', '1'),
(2, 'Ciudad Universitaria', 'CU', '1'),
(3, 'Centro Polanco', 'CP', '1');

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
  `UsuarioEstado` tinyint(1) NOT NULL,
  `UsuarioRol` enum('administrador','CE','Consultor','editor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usuario_Id`, `Sede_Id`, `UsuarioNombre`, `UsuarioApaterno`, `UsuarioAMaterno`, `UsuarioCorreo`, `UsuarioPassword`, `UsuarioEstado`, `UsuarioRol`) VALUES
(1, 1, 'Angel', 'Argonza', 'Roblero', 'correo1@correo.com', 'password1', 1, 'administrador'),
(2, 3, 'Rogelio', 'Sánchez', 'Gómez', 'correo2@correo.com', 'password2', 1, 'CE'),
(3, 3, 'Fernando', 'Robles', 'Pérez', 'correo3@correo.com', 'password3', 0, 'CE'),
(4, 2, 'Sandra', 'Mendez', 'Chavez', 'correo4@correo.com', 'password4', 0, 'Consultor'),
(5, 1, 'María', 'Rosal', 'Hernández', 'correo5@correo.com', 'password5', 1, 'editor'),
(6, 1, 'Felicia', 'Piña', 'Salgado', 'correo6@correo.com', 'password6', 1, 'Consultor');

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
  ADD UNIQUE KEY `MaterialISBN` (`MaterialISBN`),
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
  ADD CONSTRAINT `descargas_ibfk_1` FOREIGN KEY (`Sede_Id`) REFERENCES `sedes` (`Sede_Id`),
  ADD CONSTRAINT `descargas_ibfk_2` FOREIGN KEY (`Usuario_Id`) REFERENCES `usuario` (`Usuario_Id`),
  ADD CONSTRAINT `descargas_ibfk_3` FOREIGN KEY (`Material_Id`) REFERENCES `material` (`Material_Id`) ON DELETE CASCADE;

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
