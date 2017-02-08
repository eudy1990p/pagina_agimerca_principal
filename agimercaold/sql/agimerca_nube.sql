-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Servidor: 68.178.143.155
-- Tiempo de generación: 15-01-2017 a las 05:35:06
-- Versión del servidor: 5.5.43
-- Versión de PHP: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `agimercadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta_gallerias`
--

CREATE TABLE `carpeta_gallerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `estado` enum('activo','desactivado') NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`),
  KEY `user_id_creado` (`user_id_creado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `carpeta_gallerias`
--

INSERT INTO `carpeta_gallerias` VALUES(1, 18, NULL, NULL, '2017-01-01 07:32:46', 'Agimerca', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta_videos`
--

CREATE TABLE `carpeta_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `estado` enum('activo','desactivado') NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`),
  KEY `user_id_creado` (`user_id_creado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `carpeta_videos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_posts`
--

CREATE TABLE `categorias_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `categorias_posts`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `comentario` text,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` VALUES(1, 21, NULL, NULL, '2017-01-05 16:33:08', '<p>Megusta</p>', 3);
INSERT INTO `comentarios` VALUES(2, 21, NULL, NULL, '2017-01-07 07:35:35', '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `perfil` int(1) DEFAULT NULL,
  `carpeta_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `galerias`
--

INSERT INTO `galerias` VALUES(12, 1, NULL, '2016-12-28 12:34:20', NULL, '0_5_recurso.png', NULL, 5);
INSERT INTO `galerias` VALUES(13, 1, NULL, '2016-12-28 12:34:20', NULL, '1_5_recurso.png', NULL, 5);
INSERT INTO `galerias` VALUES(14, 1, NULL, '2016-12-28 12:40:47', NULL, '0_6_recurso.png', NULL, 6);
INSERT INTO `galerias` VALUES(15, 1, NULL, '2016-12-28 12:46:02', NULL, '0_7_recurso.png', NULL, 7);
INSERT INTO `galerias` VALUES(16, 1, NULL, '2016-12-28 12:46:02', NULL, '1_7_recurso.png', NULL, 7);
INSERT INTO `galerias` VALUES(17, 1, NULL, '2016-12-28 12:46:02', NULL, '2_7_recurso.png', NULL, 7);
INSERT INTO `galerias` VALUES(18, 1, NULL, '2016-12-28 12:48:31', NULL, '0_8_recurso.png', NULL, 8);
INSERT INTO `galerias` VALUES(19, 1, NULL, '2016-12-28 12:48:31', NULL, '1_8_recurso.png', NULL, 8);
INSERT INTO `galerias` VALUES(20, 1, NULL, '2016-12-28 12:48:32', NULL, '2_8_recurso.png', NULL, 8);
INSERT INTO `galerias` VALUES(21, 18, NULL, '2017-01-01 07:32:46', NULL, '0_1_recurso.png', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_privados`
--

CREATE TABLE `mensajes_privados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `mensaje` text,
  `para_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `mensajes_privados`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `me_gustas`
--

CREATE TABLE `me_gustas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `si` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `me_gustas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `post` text,
  `categoria_post` int(11) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `posts`
--

INSERT INTO `posts` VALUES(1, 18, NULL, NULL, '2017-01-01 07:30:32', '<p>Bienvenidos a nuestra red social, la red en donde convergen todos los sectores productivos de Republica Dominicana y el Mundo!</p>', 1, 'img_product/01012017073032.png');
INSERT INTO `posts` VALUES(2, 21, NULL, NULL, '2017-01-04 10:57:45', '<p>&nbsp;Agimerca, abre tu negocio al mundo y el mundo a tu negocio.</p>', 1, '');
INSERT INTO `posts` VALUES(3, 21, NULL, NULL, '2017-01-05 16:25:18', '<h3 style="text-align: justify;">Para publicar y conocer Ofertas y Demandas conectate a Agimerca, eventos y actividades Agimerca te publica, gratis.</h3>', 1, '');
INSERT INTO `posts` VALUES(4, 21, NULL, NULL, '2017-01-05 16:31:16', '<h3><em>Agimerca, abre tu negocio al mundo y el mundo a tu negocio.</em></h3>', 1, '');
INSERT INTO `posts` VALUES(5, 21, NULL, NULL, '2017-01-07 07:35:46', '', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_mesajes_privados`
--

CREATE TABLE `respuestas_mesajes_privados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `mensaje` text,
  `mensaje_privado` int(11) DEFAULT NULL,
  `para_usuario_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `respuestas_mesajes_privados`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `clave` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `descripcion` text,
  `embed_video` text,
  `tipo_user` enum('admin','normal') DEFAULT NULL,
  `estado` enum('activo','desactivado') NOT NULL,
  `img_perfil` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` VALUES(1, 'eudy', '202cb962ac59075b964b07152d234b70', '2016-12-25 21:02:50', 'prueba', 'no tengo', 'normal', 'activo', 'img_perfil/1_1_recurso.png');
INSERT INTO `usuarios` VALUES(2, 'alberto', '202cb962ac59075b964b07152d234b70', '2016-12-27 22:58:04', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016035804.jpg');
INSERT INTO `usuarios` VALUES(3, 'alberto', '202cb962ac59075b964b07152d234b70', '2016-12-28 16:12:20', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016161220.jpg');
INSERT INTO `usuarios` VALUES(4, 'alberto', '202cb962ac59075b964b07152d234b70', '2016-12-28 16:12:44', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016161244.jpg');
INSERT INTO `usuarios` VALUES(5, 'alberto', '202cb962ac59075b964b07152d234b70', '2016-12-28 16:21:05', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016162105.jpg');
INSERT INTO `usuarios` VALUES(6, 'alberto', '202cb962ac59075b964b07152d234b70', '2016-12-28 16:25:48', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016162548.jpg');
INSERT INTO `usuarios` VALUES(7, 'q', '7694f4a66316e53c8cdd9d9954bd611d', '2016-12-28 16:33:12', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(8, 'q', '7694f4a66316e53c8cdd9d9954bd611d', '2016-12-28 16:34:22', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016163422.jpg');
INSERT INTO `usuarios` VALUES(9, 'x', '9dd4e461268c8034f5c8564e155c67a6', '2016-12-28 16:34:42', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016163442.jpg');
INSERT INTO `usuarios` VALUES(10, 'Bigwell', 'f76514e2b1b678623408253b6dc7735c', '2016-12-29 05:32:38', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(11, 'manuel77@hotmail.com', '1397a3ee45cf6f66aeda70fcd493a154', '2016-12-29 06:37:20', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(12, 'elcomida@hotmail.com', '312b23c8e1bd461440ff1aadf3948df5', '2016-12-29 14:27:35', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(13, 'elcomida@hotmail.com', '312b23c8e1bd461440ff1aadf3948df5', '2016-12-29 14:31:20', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(14, 'agimerca12@hotmail.com', 'e88febd1ea904f224c3a79f5ddd8aa89', '2016-12-29 16:56:53', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(15, 'agimerca12@hotmail.com', 'e88febd1ea904f224c3a79f5ddd8aa89', '2016-12-29 17:04:13', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(16, 'elcomida@hotmail.com', 'e88febd1ea904f224c3a79f5ddd8aa89', '2016-12-29 17:17:12', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(17, 'elcomida@hotmail.com', 'e88febd1ea904f224c3a79f5ddd8aa89', '2016-12-30 17:29:45', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(18, 'bigwell', 'a5d0cfc693c880c08950774eb5533805', '2017-01-01 07:26:14', NULL, NULL, 'normal', 'activo', 'img_perfil/01012017072614.jpg');
INSERT INTO `usuarios` VALUES(19, 'elcomida@hotmail.com', 'e88febd1ea904f224c3a79f5ddd8aa89', '2017-01-02 17:15:57', NULL, NULL, 'normal', 'activo', 'img/Imagen_no_disponible.jpg');
INSERT INTO `usuarios` VALUES(20, 'm', '6f8f57715090da2632453988d9a1501b', '2017-01-03 09:53:13', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(21, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-04 10:50:06', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(22, 'manuel', 'ffda3ee9f688293c0aec7a754dd348f7', '2017-01-04 14:48:43', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(23, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-04 18:24:11', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(24, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-06 14:18:03', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(25, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-07 07:35:14', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(26, 'manuel', '87f52d218482d1b5f5de2ad68c597ee3', '2017-01-09 04:39:09', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(27, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-11 07:17:25', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(28, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-11 07:19:31', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(29, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-11 08:20:18', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(30, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-11 14:49:05', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(31, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-12 06:18:06', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(32, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-12 15:44:28', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');
INSERT INTO `usuarios` VALUES(33, 'manuel', 'cb7a1bd91544d08bddd602796edc31a6', '2017-01-13 18:33:17', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `url_video` text,
  `carpeta_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `videos`
--

INSERT INTO `videos` VALUES(1, 1, NULL, '2016-12-28 15:38:19', NULL, 'https://www.youtube.com/watch?v=ZbZSe6N_BXs', 0);
INSERT INTO `videos` VALUES(2, 1, NULL, '2016-12-28 16:04:49', NULL, 'kwR5_8w4YGE', 0);
INSERT INTO `videos` VALUES(3, 1, NULL, '2016-12-28 16:13:40', NULL, 'https://www.youtube.com/watch?v=7PCkvCPvDXk', 1);
INSERT INTO `videos` VALUES(4, 1, NULL, '2016-12-28 16:14:02', NULL, 'https://www.youtube.com/watch?v=nfWlot6h_JM', 2);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `carpeta_gallerias`
--
ALTER TABLE `carpeta_gallerias`
  ADD CONSTRAINT `carpeta_gallerias_ibfk_1` FOREIGN KEY (`user_id_creado`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carpeta_videos`
--
ALTER TABLE `carpeta_videos`
  ADD CONSTRAINT `carpeta_videos_ibfk_1` FOREIGN KEY (`user_id_creado`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
