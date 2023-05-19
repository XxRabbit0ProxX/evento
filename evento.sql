-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 02:59:45
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `id_visitante` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`id_visitante`, `nombre`, `apellidos`, `email`, `telefono`, `fecha_nacimiento`, `categoria`, `contrasena`) VALUES
(1, 'Bryan', 'Montoya Rodriguez', 'bryan@gmail.com', '4611111111', '2000-02-15', 'Administrador', '12ab34cd'),
(2, 'Corolina', 'Alfaro Rivera', 'carolina@gmail.com', '4612222222', '2000-05-10', 'General', '3456cdef'),
(3, 'Juan', 'Pérez Gómez', 'juanperez@gmail.com', '4611234567', '1990-01-15', 'Administrador', '12345678'),
(4, 'María', 'López Hernández', 'marialopez@gmail.com', '4612345678', '1995-05-22', 'General', 'abcdefgh'),
(5, 'Pedro', 'García Martínez', 'pedrogarcia@gmail.com', '4613456789', '1988-11-10', 'General', 'qwerty12'),
(6, 'Laura', 'Torres Sánchez', 'lauratorres@gmail.com', '4614567890', '1992-07-03', 'Administrador', 'password1'),
(7, 'Carlos', 'Ramírez Rodríguez', 'carlosramirez@gmail.com', '4615678901', '1998-03-28', 'General', 'abcd1234'),
(8, 'Ana', 'Hernández Gutiérrez', 'anahernandez@gmail.com', '4616789012', '1993-09-07', 'General', 'password123'),
(9, 'Miguel', 'Gómez López', 'miguelgomez@gmail.com', '4617890123', '1991-02-18', 'Administrador', 'abcd123456'),
(10, 'Sofía', 'Martínez Torres', 'sofiamartinez@gmail.com', '4618901234', '1997-06-14', 'General', 'qwertyui'),
(11, 'Javier', 'López Ramírez', 'javierlopez@gmail.com', '4619012345', '1994-12-09', 'General', 'password1234'),
(12, 'Paula', 'González Sánchez', 'paulagonzalez@gmail.com', '4610123456', '1999-08-25', 'Administrador', 'abcdefghi'),
(13, 'Andrés', 'Hernández Martínez', 'andreshernandez@gmail.com', '4611234567', '1996-04-17', 'General', 'qwerty123'),
(14, 'Gabriela', 'Gutiérrez Ramírez', 'gabrielagutierrez@gmail.com', '4612345678', '1992-10-12', 'General', '1234567890'),
(15, 'Carlos', 'Sánchez López', 'carlossanchez@gmail.com', '4619876543', '1995-07-25', 'General', '9876543210'),
(16, 'María', 'Torres González', 'mariatorres@gmail.com', '4618765432', '1988-12-02', 'General', '7654321098'),
(17, 'Juan', 'Hernández Méndez', 'juanhernandez@gmail.com', '4617654321', '1991-05-18', 'General', '5432109876'),
(18, 'Laura', 'Gómez Ramírez', 'lauragomez@gmail.com', '4616543210', '1994-03-07', 'General', '4321098765'),
(19, 'Pedro', 'López García', 'pedrolopez@gmail.com', '4615432109', '1997-09-14', 'General', '3210987654'),
(20, 'Ana', 'Fernández Rodríguez', 'anafernandez@gmail.com', '4614321098', '1990-11-30', 'General', '2109876543'),
(21, 'Sergio', 'Martínez Torres', 'sergiomartinez@gmail.com', '4613210987', '1993-08-16', 'General', '1098765432'),
(22, 'Carmen', 'Navarro López', 'carmennavarro@gmail.com', '4612109876', '1989-06-23', 'General', '0987654321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`id_visitante`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `visitante`
--
ALTER TABLE `visitante`
  MODIFY `id_visitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
