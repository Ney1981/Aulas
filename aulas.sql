-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2024 a las 21:52:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `id_seccion`, `archivo`) VALUES
(18, 'Bases de datos', 30, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `materia` text NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `materia`, `id_carrera`, `id_profesor`) VALUES
(42, 'Base de Datos', 27, 74),
(43, 'Sistemas Operativos', 27, 74);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(26, 'Ingeniería de Sistemas'),
(27, 'Tecnología en desarrollo de Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `tarea_alumno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id`, `id_seccion`, `id_alumno`, `id_tarea`, `tarea_alumno`) VALUES
(13, 30, 75, 41, ''),
(14, 30, 75, 41, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `manualProfesor` text NOT NULL,
  `manualEstudiante` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id`, `descripcion`, `manualProfesor`, `manualEstudiante`) VALUES
(1, '<h1><img alt=\"\" src=\"https://img.freepik.com/fotos-premium/estudiantes-que-trabajan-sala-informatica-universidad_13339-274594.jpg\" style=\"float:left; height:350px; width:1100px\" /></h1>\r\n\r\n<h1>Tecnolog&iacute;a y Aprendizaje: La Revoluci&oacute;n en la Educaci&oacute;n</h1>\r\n\r\n<p>La integraci&oacute;n de la tecnolog&iacute;a en el &aacute;mbito educativo ha desencadenado una verdadera revoluci&oacute;n en la forma en que aprendemos y ense&ntilde;amos. Desde la introducci&oacute;n de dispositivos m&oacute;viles hasta plataformas de aprendizaje en l&iacute;nea, la tecnolog&iacute;a ha abierto nuevas puertas para la adquisici&oacute;n de conocimientos. Ahora, los estudiantes tienen acceso a recursos ilimitados y experiencias de aprendizaje personalizadas, mientras que los educadores pueden aprovechar herramientas innovadoras para crear ambientes de ense&ntilde;anza m&aacute;s din&aacute;micos y colaborativos. La tecnolog&iacute;a y el aprendizaje van de la mano, marcando el comienzo de una era emocionante en la educaci&oacute;n.</p>\r\n\r\n<h2>&iquest;Qu&eacute; implica exactamente la tecnolog&iacute;a educativa?</h2>\r\n\r\n<p>Se refiere a un enfoque de interacci&oacute;n entre profesores y estudiantes que se apoya en aplicaciones, dispositivos y otras herramientas tecnol&oacute;gicas para enriquecer el proceso educativo. La integraci&oacute;n de las TIC en este enfoque busca optimizar el aprendizaje y fortalecer la autonom&iacute;a de los alumnos, proporcionando una serie de beneficios adicionales para su desarrollo acad&eacute;mico y personal.</p>\r\n', 'Vistas/Manuales/Manual-Profesor.pdf', 'Vistas/Manuales/Manual-Estudiante.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `id_alumno`, `id_aula`) VALUES
(35, 75, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `id_envia` int(11) NOT NULL,
  `asunto` text NOT NULL,
  `mensaje` text NOT NULL,
  `leido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `id_destinatario`, `id_envia`, `asunto`, `mensaje`, `leido`, `fecha`) VALUES
(20, 74, 75, 'Entrega de tarea', '<p>Profe la tarea fue entegasda a tiempo y aun no me la ha calificado.</p>\r\n', 'Si', '2024-05-03 08:05:33'),
(21, 75, 74, 'Calificación de Tarea', '<p>La tarea ya fue calificada consulte el estado de la nota.</p>\r\n', 'Si', '2024-05-03 08:26:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_entrega` int(11) NOT NULL,
  `nota` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_seccion`, `id_tarea`, `id_entrega`, `nota`, `estado`) VALUES
(13, 30, 41, 13, '2.8', 'Reprobado'),
(14, 30, 41, 14, '4.0', 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `id_aula`, `nombre`, `descripcion`) VALUES
(30, 42, 'Seccion 1', '<p>Introducci&oacute;n a las bases de Datos.</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `materia` text NOT NULL,
  `observaciones` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tarea` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `id_seccion`, `id_tarea`, `nombre`, `tarea`) VALUES
(15, 30, 41, 'Infografía', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_limite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `id_seccion`, `nombre`, `descripcion`, `fecha_limite`) VALUES
(41, 30, 'Tarea 1', '<p>Subir una Infograf&iacute;a de las Bases de Datos.</p>\r\n', '05/04/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `documento` text NOT NULL,
  `id_carrera` text NOT NULL,
  `foto` text NOT NULL,
  `rol` text NOT NULL,
  `salt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `documento`, `id_carrera`, `foto`, `rol`, `salt`) VALUES
(73, 'Sonia10', '$2y$10$QEHukoo/884JRo2aoT8KOuDdkrt8xLuotXjqc/qGxLvWgDWA33jGy', 'Sonia', 'Gomez',  '101040', '26', '', 'Estudiante', ''),
(74, 'Camila20', '$2y$10$YizX44RRtUdpZbApzRhEwunvXAVoTMzWSlFVSf0r/CyuBTFzwtkhq', 'Camila', 'Gomez','Aldana', '201020', '0', '', 'Profesor', ''),
(75, 'Kelly10', '$2y$10$2XpkKBEtGxUbOY1DMcAZ.OIaOqFPXSUydwo44Ei.fvCQ9VETieq6O', 'Kelly', 'Montes', '101020', '27', '', 'Estudiante', ''),
(76, 'Admin1', '$2y$10$2cn0Dj.PM/yyWfE7z8Dg5uasIcTX5jzxn/MbaIIEoJG8TRAAUX8hK', 'Ney', 'Martinez', '72264464', '0', '', 'Administrador', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
