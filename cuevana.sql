-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2024 a las 09:14:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuevana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `tipo` varchar(8) NOT NULL,
  `descripcion` longtext NOT NULL,
  `actores` longtext NOT NULL,
  `anio` int(4) NOT NULL,
  `valoracion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `genero`, `tipo`, `descripcion`, `actores`, `anio`, `valoracion`) VALUES
(1, 'Five Nights at Freddy\'s', 'Terror, Suspenso', 'Película', 'Un guardia de seguridad con problemas comienza a trabajar en Freddy Fazbear\'s Pizza. Mientras pasa su primera noche en el trabajo, se da cuenta de que el turno de noche en Freddy\'s no será tan fácil de superar.', 'Josh Hutcherson,Elizabeth Lail,Piper Rubio,Mary Stuart Masterson', 2023, 0),
(2, 'The Christmas Project 2', 'Comedia,Romance', 'Película', 'An awkward high school boy is forced to break out of his shell, when his elementary school nemesis moves back into town and tries to steal his girlfriend.\r\n', 'Corbin Bernsen,Jacob Buster,Daniel Baldwin,Brian Bosworth', 2020, 0),
(3, 'The Christmas Project', 'Familia', 'Película', 'Un escritor recuerda cuando él y sus tres hermanos unieron fuerzas para vengarse de los Hagbarts, los matones más malos de su escuela.', 'Anson Bagley,Jacob Buster,Josh Reid,Cooper Daniel Johnson', 2016, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(70) NOT NULL,
  `correo_usuario` varchar(200) NOT NULL,
  `contrasena_usuario` longtext NOT NULL,
  `favoritos` longtext NOT NULL,
  `vistos` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo_usuario` (`correo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
