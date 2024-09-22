-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2024 a las 06:04:24
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
-- Base de datos: `usuarios_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Estado_Civil` varchar(40) NOT NULL,
  `Nacimiento` date NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Residencia` varchar(250) NOT NULL,
  `Nacionalidad` varchar(30) NOT NULL,
  `Sangre` varchar(10) NOT NULL,
  `Genero` varchar(30) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `Cedula_pasaporte` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `Nombre`, `Apellido`, `Estado_Civil`, `Nacimiento`, `Telefono`, `Residencia`, `Nacionalidad`, `Sangre`, `Genero`, `correo`, `Cedula_pasaporte`) VALUES
(22, 'H', '$2y$10$u83Q1L3lvEhMsl.Me7kHVOK54xxKWIzu0YOZWLqBDA.ClAGe.0ANK', '', '', '', '0000-00-00', '', '', '', '', 'Masculino', '', ''),
(23, 'AAAAA', '$2y$10$zLGEByYR6gU/oO8xU8vNT.5y8UyraaDR5oFX9ebQtk4j44774mqGa', 'Doris', 'wwwww', 'Casado', '2024-09-19', '87878977', 'SI', 'Panameña', 'o+', 'Masculino', 'hola.10@hotmail.com', '9-1003-3456'),
(25, 'Hola89', '$2y$10$9vfGolZgl7rrU72mdg/Qeek2XQ9bokxOixl37XUVCw9doAkV0av8e', 'Doris', 'rrrrrr', 'Casado', '2024-09-04', '87878977', 'SI', 'Panameña', 'o+', 'Masculino', 'hola.10@hotmail.com', '9-1003-3456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
