-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2016 a las 03:09:12
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `agimerca_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta_gallerias`
--

CREATE TABLE IF NOT EXISTS `carpeta_gallerias` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta_videos`
--

CREATE TABLE IF NOT EXISTS `carpeta_videos` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_posts`
--

CREATE TABLE IF NOT EXISTS `categorias_posts` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE IF NOT EXISTS `galerias` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `perfil` int(1) DEFAULT NULL,
  `carpeta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_privados`
--

CREATE TABLE IF NOT EXISTS `mensajes_privados` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `mensaje` text,
  `para_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `me_gustas`
--

CREATE TABLE IF NOT EXISTS `me_gustas` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `si` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `post` text,
  `categoria_post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_mesajes_privados`
--

CREATE TABLE IF NOT EXISTS `respuestas_mesajes_privados` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `mensaje` text,
  `mensaje_privado` int(11) DEFAULT NULL,
  `para_usuario_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `clave` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `descripcion` text,
  `embed_video` text,
  `tipo_user` enum('admin','normal') DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `clave`, `fecha_creado`, `descripcion`, `embed_video`, `tipo_user`, `nombre`) VALUES
(1, 'eudy1990@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 'normal', 'eudy arias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `url_video` text,
  `carpeta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carpeta_gallerias`
--
ALTER TABLE `carpeta_gallerias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carpeta_videos`
--
ALTER TABLE `carpeta_videos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_posts`
--
ALTER TABLE `categorias_posts`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes_privados`
--
ALTER TABLE `mensajes_privados`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `me_gustas`
--
ALTER TABLE `me_gustas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas_mesajes_privados`
--
ALTER TABLE `respuestas_mesajes_privados`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carpeta_gallerias`
--
ALTER TABLE `carpeta_gallerias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `carpeta_videos`
--
ALTER TABLE `carpeta_videos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias_posts`
--
ALTER TABLE `categorias_posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes_privados`
--
ALTER TABLE `mensajes_privados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `me_gustas`
--
ALTER TABLE `me_gustas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuestas_mesajes_privados`
--
ALTER TABLE `respuestas_mesajes_privados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
