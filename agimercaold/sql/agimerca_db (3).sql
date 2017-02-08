-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2017 a las 22:20:06
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agimerca_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta_gallerias`
--

CREATE TABLE `carpeta_gallerias` (
  `id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `estado` enum('activo','desactivado') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carpeta_gallerias`
--

INSERT INTO `carpeta_gallerias` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `nombre`, `estado`) VALUES
(5, 1, NULL, NULL, '2016-12-28 12:34:20', 'album sin error', 'activo'),
(6, 1, NULL, NULL, '2016-12-28 12:40:47', 'eudy', 'desactivado'),
(7, 1, NULL, NULL, '2016-12-28 12:46:01', 'yo si', 'activo'),
(8, 1, NULL, NULL, '2016-12-28 12:48:31', 'yo si', 'activo'),
(9, 1, NULL, NULL, '2017-01-14 16:37:20', 'Eudy', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta_videos`
--

CREATE TABLE `carpeta_videos` (
  `id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `estado` enum('activo','desactivado') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carpeta_videos`
--

INSERT INTO `carpeta_videos` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `nombre`, `estado`) VALUES
(1, 1, NULL, NULL, '2016-12-28 16:13:40', 'kenlly', 'activo'),
(2, 1, NULL, NULL, '2016-12-28 16:14:02', 'prueba', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL auto_increment primary key,
  `nombre_categoria` varchar(100) DEFAULT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`) VALUES
(1, 'prueba', 1, NULL, NULL, '2017-01-12 12:10:21'),
(3, 'prueba2', 1, NULL, NULL, '2017-01-12 12:30:59'),
(4, 'prueba1', 1, NULL, NULL, '2017-01-12 12:39:53'),
(6, 'prueba11111', 1, NULL, NULL, '2017-01-12 12:45:22'),
(7, 'prueba333', 1, NULL, NULL, '2017-01-12 12:45:33'),
(8, 'prueba3', 1, NULL, NULL, '2017-01-12 12:47:11'),
(9, 'prueba3334', 1, NULL, NULL, '2017-01-12 12:50:27'),
(10, 'sector', 1, NULL, NULL, '2017-01-12 13:22:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `comentario` text,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `comentario`, `post_id`) VALUES
(1, 1, NULL, NULL, '2016-12-27 21:26:19', '<p>aaaa</p>', 1),
(2, 1, NULL, NULL, '2016-12-27 21:26:36', '<p>aaaa</p>', 1),
(3, 1, NULL, NULL, '2016-12-27 21:34:22', '<p>aaaa</p>', 1),
(4, 1, NULL, NULL, '2016-12-27 21:35:52', '<p>aaaa</p>', 1),
(5, 1, NULL, NULL, '2016-12-27 21:38:52', '<p>aaaa</p>', 1),
(6, 1, NULL, NULL, '2016-12-27 21:41:21', '<p>aaaa</p>', 1),
(7, 1, NULL, NULL, '2016-12-27 21:41:47', '<p>aaaa</p>', 1),
(8, 1, NULL, NULL, '2016-12-27 21:42:12', '<p>aaaa</p>', 1),
(9, 1, NULL, NULL, '2016-12-27 21:42:29', '<p>aaaa</p>', 1),
(10, 1, NULL, NULL, '2016-12-27 21:42:48', '<p>aaaa</p>', 1),
(11, 1, NULL, NULL, '2016-12-27 21:43:14', '<p>aaaa</p>', 1),
(12, 1, NULL, NULL, '2016-12-27 21:43:27', '<p>aaaa</p>', 1),
(13, 1, NULL, NULL, '2016-12-27 21:48:16', '<p>aaaa</p>', 1),
(14, 1, NULL, NULL, '2016-12-27 21:48:57', '<p>aaaa</p>', 1),
(15, 1, NULL, NULL, '2016-12-27 21:51:05', '<p>aaaa</p>', 1),
(16, 1, NULL, NULL, '2016-12-27 21:51:58', '<p>aaaa</p>', 1),
(17, 1, NULL, NULL, '2016-12-27 21:55:00', '<p>aaaa</p>', 1),
(18, 1, NULL, NULL, '2016-12-28 10:37:34', '<p>primer</p>', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `perfil` int(1) DEFAULT NULL,
  `carpeta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galerias`
--

INSERT INTO `galerias` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `url_img`, `perfil`, `carpeta_id`) VALUES
(12, 1, NULL, '2016-12-28 12:34:20', NULL, '0_5_recurso.png', NULL, 5),
(13, 1, NULL, '2016-12-28 12:34:20', NULL, '1_5_recurso.png', NULL, 5),
(14, 1, NULL, '2016-12-28 12:40:47', NULL, '0_6_recurso.png', NULL, 6),
(15, 1, NULL, '2016-12-28 12:46:02', NULL, '0_7_recurso.png', NULL, 7),
(16, 1, NULL, '2016-12-28 12:46:02', NULL, '1_7_recurso.png', NULL, 7),
(17, 1, NULL, '2016-12-28 12:46:02', NULL, '2_7_recurso.png', NULL, 7),
(18, 1, NULL, '2016-12-28 12:48:31', NULL, '0_8_recurso.png', NULL, 8),
(19, 1, NULL, '2016-12-28 12:48:31', NULL, '1_8_recurso.png', NULL, 8),
(20, 1, NULL, '2016-12-28 12:48:32', NULL, '2_8_recurso.png', NULL, 8),
(21, 1, NULL, '2017-01-14 16:37:20', NULL, '0_9_recurso.png', NULL, 9),
(22, 1, NULL, '2017-01-14 16:37:20', NULL, '1_9_recurso.png', NULL, 9),
(23, 1, NULL, '2017-01-14 16:37:20', NULL, '2_9_recurso.png', NULL, 9),
(24, 1, NULL, '2017-01-14 16:37:20', NULL, '3_9_recurso.png', NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_privados`
--

CREATE TABLE `mensajes_privados` (
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

CREATE TABLE `me_gustas` (
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

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `post` text,
  `categoria_post` int(11) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `post`, `categoria_post`, `img_url`) VALUES
(1, 0, NULL, NULL, '2016-12-26 18:24:17', '<p>orueb</p>', 1, 'img_product/26122016232417.jpg'),
(2, 0, NULL, NULL, '2016-12-26 18:24:38', '<p>orueb</p>', 1, 'img_product/26122016232438.jpg'),
(3, 0, NULL, NULL, '2016-12-26 18:26:18', '<p>orueb</p>', 1, 'img_product/26122016232618.jpg'),
(4, 0, NULL, NULL, '2016-12-26 18:27:07', '<p>orueb</p>', 1, 'img_product/26122016232707.jpg'),
(5, 0, NULL, NULL, '2016-12-26 18:27:23', '<p>orueb</p>', 1, 'img_product/26122016232723.jpg'),
(6, 0, NULL, NULL, '2016-12-26 18:27:43', '<p>orueb</p>', 1, 'img_product/26122016232743.jpg'),
(7, 1, 1, '2016-12-28 10:33:37', '2016-12-26 18:29:40', '<p>prueba eudy lo modifico</p>', 1, 'img_product/28122016145839.jpg'),
(8, 1, NULL, NULL, '2016-12-26 19:21:46', '<p>prueba</p>', 1, 'img_product/27122016002146.jpg'),
(9, 1, NULL, NULL, '2016-12-26 19:22:03', '<p>prueba</p>', 1, 'img_product/27122016002203.jpg'),
(10, 1, NULL, NULL, '2016-12-26 19:30:35', '<p>prueba</p>', 1, 'img_product/27122016003035.jpg'),
(11, 1, NULL, NULL, '2016-12-26 19:31:31', '<p>prueba</p>', 1, 'img_product/27122016003131.jpg'),
(12, 1, NULL, NULL, '2016-12-26 19:31:43', '<p>prueba</p>', 1, 'img_product/27122016003143.jpg'),
(13, 1, 1, '2016-12-28 13:36:52', '2016-12-26 19:33:21', '<p>prueba asdasdf</p>', 1, 'img_product/28122016183652.png'),
(14, 1, NULL, NULL, '2016-12-26 19:33:52', '<p>prueba</p>', 1, 'img_product/27122016003351.jpg'),
(15, 1, NULL, NULL, '2017-01-13 13:50:37', '', 1, ''),
(16, 1, NULL, NULL, '2017-01-13 13:53:01', '', 1, ''),
(17, 1, NULL, NULL, '2017-01-13 14:04:53', '<p>prueba de relacion</p>', 1, ''),
(18, 1, NULL, NULL, '2017-01-13 14:16:54', '<p>prueba de relacion</p>', 1, ''),
(19, 1, NULL, NULL, '2017-01-13 14:20:37', '<p>prueba de relacion</p>', 1, ''),
(20, 1, NULL, NULL, '2017-01-13 14:29:57', '<p>prueba de relacion</p>', 1, ''),
(21, 1, NULL, NULL, '2017-01-13 15:06:05', '<p>prueba de post</p>', 1, 'img_product/13012017200604.jpg'),
(22, 1, NULL, NULL, '2017-01-13 17:31:37', '<p>prueba de eudy con los roll etc</p>', 1, ''),
(23, 1, NULL, NULL, '2017-01-13 21:23:55', '<p>prueba de eudy con los roll etc</p>', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_categoria_subcategoria`
--

CREATE TABLE `relacion_categoria_subcategoria` (
  `id` int(11) NOT NULL auto_increment primary key,
  `user_id_creado` int(11) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `sub_categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relacion_categoria_subcategoria`
--

INSERT INTO `relacion_categoria_subcategoria` (`id`, `user_id_creado`, `fecha_creado`, `categoria_id`, `sub_categoria_id`) VALUES
(32, 1, '2017-01-12 19:05:18', 1, 10),
(33, 1, '2017-01-12 19:05:18', 1, 11),
(34, 1, '2017-01-12 19:05:39', 1, 2),
(35, 1, '2017-01-12 19:05:39', 1, 4),
(38, 1, '2017-01-12 19:31:19', 1, 2),
(39, 1, '2017-01-12 19:31:19', 1, 4),
(40, 1, '2017-01-12 19:31:19', 1, 5),
(42, 1, '2017-01-12 19:32:32', 1, 2),
(43, 1, '2017-01-12 19:32:32', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_subcategorias_subsubcategoria`
--

CREATE TABLE `relacion_subcategorias_subsubcategoria` (
  `id` int(11) NOT NULL auto_increment primary key,
  `user_id_creado` int(11) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `relacion_categoria_subcategoria_id` int(11) DEFAULT NULL,
  `sub_of_sub_categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relacion_subcategorias_subsubcategoria`
--

INSERT INTO `relacion_subcategorias_subsubcategoria` (`id`, `user_id_creado`, `fecha_creado`, `relacion_categoria_subcategoria_id`, `sub_of_sub_categoria_id`) VALUES
(9, 1, '2017-01-13 00:57:07', 32, 3),
(10, 1, '2017-01-13 00:57:07', 32, 5),
(12, 1, '2017-01-13 01:02:28', 32, 1),
(13, 1, '2017-01-13 01:02:28', 32, 4),
(14, 1, '2017-01-13 01:02:28', 32, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_sub_of_sub_categoria_posts`
--

CREATE TABLE `relacion_sub_of_sub_categoria_posts` (
  `id` int(11) NOT NULL auto_increment primary key,	
  `user_id_creado` int(11) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `relacion_subcategorias_subsubcategoria_id` int(11) DEFAULT NULL,
  `posts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relacion_sub_of_sub_categoria_posts`
--

INSERT INTO `relacion_sub_of_sub_categoria_posts` (`id`, `user_id_creado`, `fecha_creado`, `relacion_subcategorias_subsubcategoria_id`, `posts_id`) VALUES
(1, 1, '2017-01-13 13:50:38', 0, 15),
(2, 1, '2017-01-13 13:53:01', 0, 16),
(3, 1, '2017-01-13 14:04:53', 12, 17),
(4, 1, '2017-01-13 14:16:54', 12, 18),
(5, 1, '2017-01-13 14:20:37', 12, 19),
(6, 1, '2017-01-13 14:29:57', 12, 20),
(7, 1, '2017-01-13 15:06:05', 0, 21),
(8, 1, '2017-01-13 17:31:37', 12, 22),
(9, 1, '2017-01-13 21:23:55', 12, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_sub_of_sub_categoria_usuario`
--

CREATE TABLE `relacion_sub_of_sub_categoria_usuario` (
  `id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `relacion_subcategorias_subsubcategoria_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_mesajes_privados`
--

CREATE TABLE `respuestas_mesajes_privados` (
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
-- Estructura de tabla para la tabla `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id` int(11) NOT NULL auto_increment primary key,
  `nombre_categoria` varchar(100) DEFAULT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `nombre_categoria`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`) VALUES
(2, 'sector', 1, NULL, NULL, '2017-01-12 13:24:12'),
(3, 'sector1', 1, NULL, NULL, '2017-01-12 18:55:50'),
(4, 'sector2', NULL, NULL, NULL, NULL),
(5, 'sector3', NULL, NULL, NULL, NULL),
(6, 'sector4', NULL, NULL, NULL, NULL),
(7, 'sector5', NULL, NULL, NULL, NULL),
(8, 'sector6', NULL, NULL, NULL, NULL),
(9, 'sector7', NULL, NULL, NULL, NULL),
(10, 'sector8', NULL, NULL, NULL, NULL),
(11, 'sector9', NULL, NULL, NULL, NULL),
(12, 'sector2', NULL, NULL, NULL, NULL),
(13, 'sector3', NULL, NULL, NULL, NULL),
(14, 'sector4', NULL, NULL, NULL, NULL),
(15, 'sector5', NULL, NULL, NULL, NULL),
(16, 'sector6', NULL, NULL, NULL, NULL),
(17, 'sector7', NULL, NULL, NULL, NULL),
(18, 'sector8', NULL, NULL, NULL, NULL),
(19, 'sector9', NULL, NULL, NULL, NULL),
(20, 'sector2', NULL, NULL, NULL, NULL),
(21, 'sector3', NULL, NULL, NULL, NULL),
(22, 'sector4', NULL, NULL, NULL, NULL),
(23, 'sector5', NULL, NULL, NULL, NULL),
(24, 'sector6', NULL, NULL, NULL, NULL),
(25, 'sector7', NULL, NULL, NULL, NULL),
(26, 'sector8', NULL, NULL, NULL, NULL),
(27, 'sector9', NULL, NULL, NULL, NULL),
(28, 'sector2', NULL, NULL, NULL, NULL),
(29, 'sector3', NULL, NULL, NULL, NULL),
(30, 'sector4', NULL, NULL, NULL, NULL),
(31, 'sector5', NULL, NULL, NULL, NULL),
(32, 'sector6', NULL, NULL, NULL, NULL),
(33, 'sector7', NULL, NULL, NULL, NULL),
(34, 'sector8', NULL, NULL, NULL, NULL),
(35, 'sector9', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_of_sub_categorias`
--

CREATE TABLE `sub_of_sub_categorias` (
  `id` int(11) NOT NULL auto_increment primary key,
  `nombre_categoria` varchar(100) DEFAULT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_of_sub_categorias`
--

INSERT INTO `sub_of_sub_categorias` (`id`, `nombre_categoria`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`) VALUES
(1, 'producto', 1, NULL, NULL, '2017-01-12 13:40:11'),
(3, 'producto1', 1, NULL, NULL, '2017-01-13 00:55:47'),
(4, 'producto2', 1, NULL, NULL, '2017-01-13 00:56:08'),
(5, 'producto3', 1, NULL, NULL, '2017-01-13 00:56:20'),
(6, 'producto4', 1, NULL, NULL, '2017-01-13 00:56:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `clave` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `descripcion` text,
  `embed_video` text,
  `tipo_user` enum('admin','normal') DEFAULT NULL,
  `estado` enum('activo','desactivado') NOT NULL,
  `img_perfil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `clave`, `fecha_creado`, `descripcion`, `embed_video`, `tipo_user`, `estado`, `img_perfil`) VALUES
(1, 'eudy', '202cb962ac59075b964b07152d234b70', '2016-12-25 21:02:50', 'prueba', 'no tengo', 'admin', 'activo', 'img_perfil/1_1_recurso.png'),
(2, 'alberto', '202cb962ac59075b964b07152d234b70', '2016-12-27 22:58:04', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016035804.jpg'),
(3, 'agimerca', '202cb962ac59075b964b07152d234b70', '2016-12-28 19:14:15', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001415.jpg'),
(4, 'agimerca', '202cb962ac59075b964b07152d234b70', '2016-12-28 19:16:44', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001644.jpg'),
(5, 'agimerca', '202cb962ac59075b964b07152d234b70', '2016-12-28 19:16:51', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001651.jpg'),
(6, 'a', '0cc175b9c0f1b6a831c399e269772661', '2016-12-28 19:17:37', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001737.jpg'),
(7, 'a', '0cc175b9c0f1b6a831c399e269772661', '2016-12-28 19:18:36', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001836.jpg'),
(8, 'a', '0cc175b9c0f1b6a831c399e269772661', '2016-12-28 19:21:28', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016002128.jpg'),
(9, 'as', 'f970e2767d0cfe75876ea857f92e319b', '2016-12-28 19:21:39', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016002139.jpg'),
(10, 'as', 'f970e2767d0cfe75876ea857f92e319b', '2016-12-28 19:25:05', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016002505.jpg'),
(11, 'z', 'fbade9e36a3f36d3d676c1b808451dd7', '2017-01-03 12:16:41', NULL, NULL, 'normal', 'activo', ''),
(12, 'c', '4a8a08f09d37b73795649038408b5f33', '2017-01-03 12:29:54', NULL, NULL, 'normal', 'activo', 'img_perfil/03012017172954.jpg'),
(13, 'v', '9e3669d19b675bd57058fd4664205d2a', '2017-01-03 12:30:05', NULL, NULL, 'normal', 'activo', ''),
(14, 'v', '9e3669d19b675bd57058fd4664205d2a', '2017-01-03 12:44:05', NULL, NULL, 'normal', 'activo', ''),
(15, 'm', '6f8f57715090da2632453988d9a1501b', '2017-01-03 12:44:37', NULL, NULL, 'normal', 'activo', ''),
(16, 'e', 'e1671797c52e15f763380b45e841ec32', '2017-01-03 12:47:01', NULL, NULL, 'normal', 'activo', 'img_perfil/foto_perfil.jpg'),
(17, 'p', '83878c91171338902e0fe0fb97a8c47a', '2017-01-03 12:48:43', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `url_video` text,
  `carpeta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `url_video`, `carpeta_id`) VALUES
(1, 1, NULL, '2016-12-28 15:38:19', NULL, 'https://www.youtube.com/watch?v=ZbZSe6N_BXs', 0),
(2, 1, NULL, '2016-12-28 16:04:49', NULL, 'kwR5_8w4YGE', 0),
(3, 1, NULL, '2016-12-28 16:13:40', NULL, 'https://www.youtube.com/watch?v=7PCkvCPvDXk', 1),
(4, 1, NULL, '2016-12-28 16:14:02', NULL, 'https://www.youtube.com/watch?v=nfWlot6h_JM', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carpeta_gallerias`
--
ALTER TABLE `carpeta_gallerias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_creado` (`user_id_creado`);

--
-- Indices de la tabla `carpeta_videos`
--
ALTER TABLE `carpeta_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_creado` (`user_id_creado`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
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
-- Indices de la tabla `relacion_categoria_subcategoria`
--
ALTER TABLE `relacion_categoria_subcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relacion_subcategorias_subsubcategoria`
--
ALTER TABLE `relacion_subcategorias_subsubcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relacion_sub_of_sub_categoria_posts`
--
ALTER TABLE `relacion_sub_of_sub_categoria_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relacion_sub_of_sub_categoria_usuario`
--
ALTER TABLE `relacion_sub_of_sub_categoria_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas_mesajes_privados`
--
ALTER TABLE `respuestas_mesajes_privados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_of_sub_categorias`
--
ALTER TABLE `sub_of_sub_categorias`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `carpeta_videos`
--
ALTER TABLE `carpeta_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `relacion_categoria_subcategoria`
--
ALTER TABLE `relacion_categoria_subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `relacion_subcategorias_subsubcategoria`
--
ALTER TABLE `relacion_subcategorias_subsubcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `relacion_sub_of_sub_categoria_posts`
--
ALTER TABLE `relacion_sub_of_sub_categoria_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `relacion_sub_of_sub_categoria_usuario`
--
ALTER TABLE `relacion_sub_of_sub_categoria_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuestas_mesajes_privados`
--
ALTER TABLE `respuestas_mesajes_privados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `sub_of_sub_categorias`
--
ALTER TABLE `sub_of_sub_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
