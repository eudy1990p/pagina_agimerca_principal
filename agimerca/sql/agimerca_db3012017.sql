-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2017 a las 16:29:56
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
  `id` int(11) NOT NULL,
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
(10, 'sector', 1, NULL, NULL, '2017-01-12 13:22:56'),
(11, 'oferta', 0, NULL, NULL, '2017-01-16 11:42:48');

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
  `para_user_id` int(11) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes_privados`
--

INSERT INTO `mensajes_privados` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `mensaje`, `para_user_id`, `visto`) VALUES
(1, 1, NULL, NULL, '2017-01-29 18:36:18', 'hola como estas', 1, 1),
(2, 1, NULL, NULL, '2017-01-29 18:52:32', 'prueba de mensajeria privada ', 1, 1),
(3, 1, NULL, NULL, '2017-01-29 18:54:34', 'deberia ', 1, 1),
(4, 1, NULL, NULL, '2017-01-29 19:19:15', 'deberia ', 1, 1),
(5, 1, NULL, NULL, '2017-01-29 19:20:53', 'deberia ', 1, 1),
(6, 1, NULL, NULL, '2017-01-29 19:21:34', 'deberia ', 1, 1),
(7, 1, NULL, NULL, '2017-01-29 19:22:01', 'deberia ', 1, 1),
(8, 1, NULL, NULL, '2017-01-29 20:20:25', 'prueba', 1, 1),
(9, 1, NULL, NULL, '2017-01-29 20:23:20', 'prueba', 1, 1),
(10, 1, NULL, NULL, '2017-01-29 20:31:28', 'prueba', 1, 1),
(11, 1, NULL, NULL, '2017-01-29 20:32:06', 'prueba', 1, 1),
(12, 1, NULL, NULL, '2017-01-29 20:34:55', 'prueba', 1, 1),
(13, 1, NULL, NULL, '2017-01-29 20:37:47', 'prueba', 1, 1),
(14, 1, NULL, NULL, '2017-01-29 20:38:37', 'prueba', 1, 1),
(15, 1, NULL, NULL, '2017-01-29 21:59:25', 'prueba', 1, 1),
(16, 2, NULL, NULL, '2017-01-29 22:01:52', 'hola como estas', 1, 1),
(17, 1, NULL, NULL, '2017-01-29 22:02:18', 'prueba', 1, 1),
(18, 2, NULL, NULL, '2017-01-29 23:32:09', 'hola como estas', 1, 1),
(19, 2, NULL, NULL, '2017-01-30 01:49:38', 'hola como estas', 1, 1);

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
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `name1` varchar(150) DEFAULT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `iso2` varchar(50) DEFAULT NULL,
  `iso3` varchar(50) DEFAULT NULL,
  `phone_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `fecha_creado`, `nombre`, `name1`, `nom`, `iso2`, `iso3`, `phone_code`) VALUES
(2, NULL, 'Afganistán', 'Afghanistan', 'Afghanistan', 'AF', 'AFG', '93'),
(3, NULL, 'Albania', 'Albania', 'Albanie', 'AL', 'ALB', '355'),
(4, NULL, 'Alemania', 'Germany', 'Allemagne', 'DE', 'DEU', '49'),
(5, NULL, 'Algeria', 'Algeria', 'Algérie', 'DZ', 'DZA', '213'),
(6, NULL, 'Andorra', 'Andorra', 'Andorra', 'AD', 'AND', '376'),
(7, NULL, 'Angola', 'Angola', 'Angola', 'AO', 'AGO', '244'),
(8, NULL, 'Anguila', 'Anguilla', 'Anguilla', 'AI', 'AIA', '1 264'),
(9, NULL, 'Antártida', 'Antarctica', 'L''Antarctique', 'AQ', 'ATA', '672'),
(10, NULL, 'Antigua y Barbuda', 'Antigua and Barbuda', 'Antigua et Barbuda', 'AG', 'ATG', '1 268'),
(11, NULL, 'Antillas Neerlandesas', 'Netherlands Antilles', 'Antilles Néerlandaises', 'AN', 'ANT', '599'),
(12, NULL, 'Arabia Saudita', 'Saudi Arabia', 'Arabie Saoudite', 'SA', 'SAU', '966'),
(13, NULL, 'Argentina', 'Argentina', 'Argentine', 'AR', 'ARG', '54'),
(14, NULL, 'Armenia', 'Armenia', 'L''Arménie', 'AM', 'ARM', '374'),
(15, NULL, 'Aruba', 'Aruba', 'Aruba', 'AW', 'ABW', '297'),
(16, NULL, 'Australia', 'Australia', 'Australie', 'AU', 'AUS', '61'),
(17, NULL, 'Austria', 'Austria', 'Autriche', 'AT', 'AUT', '43'),
(18, NULL, 'Azerbayán', 'Azerbaijan', 'L''Azerbaïdjan', 'AZ', 'AZE', '994'),
(19, NULL, 'Bélgica', 'Belgium', 'Belgique', 'BE', 'BEL', '32'),
(20, NULL, 'Bahamas', 'Bahamas', 'Bahamas', 'BS', 'BHS', '1 242'),
(21, NULL, 'Bahrein', 'Bahrain', 'Bahreïn', 'BH', 'BHR', '973'),
(22, NULL, 'Bangladesh', 'Bangladesh', 'Bangladesh', 'BD', 'BGD', '880'),
(23, NULL, 'Barbados', 'Barbados', 'Barbade', 'BB', 'BRB', '1 246'),
(24, NULL, 'Belice', 'Belize', 'Belize', 'BZ', 'BLZ', '501'),
(25, NULL, 'Benín', 'Benin', 'Bénin', 'BJ', 'BEN', '229'),
(26, NULL, 'Bhután', 'Bhutan', 'Le Bhoutan', 'BT', 'BTN', '975'),
(27, NULL, 'Bielorrusia', 'Belarus', 'Biélorussie', 'BY', 'BLR', '375'),
(28, NULL, 'Birmania', 'Myanmar', 'Myanmar', 'MM', 'MMR', '95'),
(29, NULL, 'Bolivia', 'Bolivia', 'Bolivie', 'BO', 'BOL', '591'),
(30, NULL, 'Bosnia y Herzegovina', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine', 'BA', 'BIH', '387'),
(31, NULL, 'Botsuana', 'Botswana', 'Botswana', 'BW', 'BWA', '267'),
(32, NULL, 'Brasil', 'Brazil', 'Brésil', 'BR', 'BRA', '55'),
(33, NULL, 'Brunéi', 'Brunei', 'Brunei', 'BN', 'BRN', '673'),
(34, NULL, 'Bulgaria', 'Bulgaria', 'Bulgarie', 'BG', 'BGR', '359'),
(35, NULL, 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'BF', 'BFA', '226'),
(36, NULL, 'Burundi', 'Burundi', 'Burundi', 'BI', 'BDI', '257'),
(37, NULL, 'Cabo Verde', 'Cape Verde', 'Cap-Vert', 'CV', 'CPV', '238'),
(38, NULL, 'Camboya', 'Cambodia', 'Cambodge', 'KH', 'KHM', '855'),
(39, NULL, 'Camerún', 'Cameroon', 'Cameroun', 'CM', 'CMR', '237'),
(40, NULL, 'Canadá', 'Canada', 'Canada', 'CA', 'CAN', '1'),
(41, NULL, 'Chad', 'Chad', 'Tchad', 'TD', 'TCD', '235'),
(42, NULL, 'Chile', 'Chile', 'Chili', 'CL', 'CHL', '56'),
(43, NULL, 'China', 'China', 'Chine', 'CN', 'CHN', '86'),
(44, NULL, 'Chipre', 'Cyprus', 'Chypre', 'CY', 'CYP', '357'),
(45, NULL, 'Ciudad del Vaticano', 'Vatican City State', 'Cité du Vatican', 'VA', 'VAT', '39'),
(46, NULL, 'Colombia', 'Colombia', 'Colombie', 'CO', 'COL', '57'),
(47, NULL, 'Comoras', 'Comoros', 'Comores', 'KM', 'COM', '269'),
(48, NULL, 'Congo', 'Congo', 'Congo', 'CG', 'COG', '242'),
(49, NULL, 'Congo', 'Congo', 'Congo', 'CD', 'COD', '243'),
(50, NULL, 'Corea del Norte', 'North Korea', 'Corée du Nord', 'KP', 'PRK', '850'),
(51, NULL, 'Corea del Sur', 'South Korea', 'Corée du Sud', 'KR', 'KOR', '82'),
(52, NULL, 'Costa de Marfil', 'Ivory Coast', 'Côte-d''Ivoire', 'CI', 'CIV', '225'),
(53, NULL, 'Costa Rica', 'Costa Rica', 'Costa Rica', 'CR', 'CRI', '506'),
(54, NULL, 'Croacia', 'Croatia', 'Croatie', 'HR', 'HRV', '385'),
(55, NULL, 'Cuba', 'Cuba', 'Cuba', 'CU', 'CUB', '53'),
(56, NULL, 'Dinamarca', 'Denmark', 'Danemark', 'DK', 'DNK', '45'),
(57, NULL, 'Dominica', 'Dominica', 'Dominique', 'DM', 'DMA', '1 767'),
(58, NULL, 'Ecuador', 'Ecuador', 'Equateur', 'EC', 'ECU', '593'),
(59, NULL, 'Egipto', 'Egypt', 'Egypte', 'EG', 'EGY', '20'),
(60, NULL, 'El Salvador', 'El Salvador', 'El Salvador', 'SV', 'SLV', '503'),
(61, NULL, 'Emiratos Árabes Unidos', 'United Arab Emirates', 'Emirats Arabes Unis', 'AE', 'ARE', '971'),
(62, NULL, 'Eritrea', 'Eritrea', 'Erythrée', 'ER', 'ERI', '291'),
(63, NULL, 'Eslovaquia', 'Slovakia', 'Slovaquie', 'SK', 'SVK', '421'),
(64, NULL, 'Eslovenia', 'Slovenia', 'Slovénie', 'SI', 'SVN', '386'),
(65, NULL, 'España', 'Spain', 'Espagne', 'ES', 'ESP', '34'),
(66, NULL, 'Estados Unidos de América', 'United States of America', 'États-Unis d''Amérique', 'US', 'USA', '1'),
(67, NULL, 'Estonia', 'Estonia', 'L''Estonie', 'EE', 'EST', '372'),
(68, NULL, 'Etiopía', 'Ethiopia', 'Ethiopie', 'ET', 'ETH', '251'),
(69, NULL, 'Filipinas', 'Philippines', 'Philippines', 'PH', 'PHL', '63'),
(70, NULL, 'Finlandia', 'Finland', 'Finlande', 'FI', 'FIN', '358'),
(71, NULL, 'Fiyi', 'Fiji', 'Fidji', 'FJ', 'FJI', '679'),
(72, NULL, 'Francia', 'France', 'France', 'FR', 'FRA', '33'),
(73, NULL, 'Gabón', 'Gabon', 'Gabon', 'GA', 'GAB', '241'),
(74, NULL, 'Gambia', 'Gambia', 'Gambie', 'GM', 'GMB', '220'),
(75, NULL, 'Georgia', 'Georgia', 'Géorgie', 'GE', 'GEO', '995'),
(76, NULL, 'Ghana', 'Ghana', 'Ghana', 'GH', 'GHA', '233'),
(77, NULL, 'Gibraltar', 'Gibraltar', 'Gibraltar', 'GI', 'GIB', '350'),
(78, NULL, 'Granada', 'Grenada', 'Grenade', 'GD', 'GRD', '1 473'),
(79, NULL, 'Grecia', 'Greece', 'Grèce', 'GR', 'GRC', '30'),
(80, NULL, 'Groenlandia', 'Greenland', 'Groenland', 'GL', 'GRL', '299'),
(81, NULL, 'Guadalupe', 'Guadeloupe', 'Guadeloupe', 'GP', 'GLP', ''),
(82, NULL, 'Guam', 'Guam', 'Guam', 'GU', 'GUM', '1 671'),
(83, NULL, 'Guatemala', 'Guatemala', 'Guatemala', 'GT', 'GTM', '502'),
(84, NULL, 'Guayana Francesa', 'French Guiana', 'Guyane française', 'GF', 'GUF', ''),
(85, NULL, 'Guernsey', 'Guernsey', 'Guernesey', 'GG', 'GGY', ''),
(86, NULL, 'Guinea', 'Guinea', 'Guinée', 'GN', 'GIN', '224'),
(87, NULL, 'Guinea Ecuatorial', 'Equatorial Guinea', 'Guinée Equatoriale', 'GQ', 'GNQ', '240'),
(88, NULL, 'Guinea-Bissau', 'Guinea-Bissau', 'Guinée-Bissau', 'GW', 'GNB', '245'),
(89, NULL, 'Guyana', 'Guyana', 'Guyane', 'GY', 'GUY', '592'),
(90, NULL, 'Haití', 'Haiti', 'Haïti', 'HT', 'HTI', '509'),
(91, NULL, 'Honduras', 'Honduras', 'Honduras', 'HN', 'HND', '504'),
(92, NULL, 'Hong kong', 'Hong Kong', 'Hong Kong', 'HK', 'HKG', '852'),
(93, NULL, 'Hungría', 'Hungary', 'Hongrie', 'HU', 'HUN', '36'),
(94, NULL, 'India', 'India', 'Inde', 'IN', 'IND', '91'),
(95, NULL, 'Indonesia', 'Indonesia', 'Indonésie', 'ID', 'IDN', '62'),
(96, NULL, 'Irán', 'Iran', 'Iran', 'IR', 'IRN', '98'),
(97, NULL, 'Irak', 'Iraq', 'Irak', 'IQ', 'IRQ', '964'),
(98, NULL, 'Irlanda', 'Ireland', 'Irlande', 'IE', 'IRL', '353'),
(99, NULL, 'Isla Bouvet', 'Bouvet Island', 'Bouvet Island', 'BV', 'BVT', ''),
(100, NULL, 'Isla de Man', 'Isle of Man', 'Ile de Man', 'IM', 'IMN', '44'),
(101, NULL, 'Isla de Navidad', 'Christmas Island', 'Christmas Island', 'CX', 'CXR', '61'),
(102, NULL, 'Isla Norfolk', 'Norfolk Island', 'Île de Norfolk', 'NF', 'NFK', ''),
(103, NULL, 'Islandia', 'Iceland', 'Islande', 'IS', 'ISL', '354'),
(104, NULL, 'Islas Bermudas', 'Bermuda Islands', 'Bermudes', 'BM', 'BMU', '1 441'),
(105, NULL, 'Islas Caimán', 'Cayman Islands', 'Iles Caïmans', 'KY', 'CYM', '1 345'),
(106, NULL, 'Islas Cocos (Keeling)', 'Cocos (Keeling) Islands', 'Cocos (Keeling', 'CC', 'CCK', '61'),
(107, NULL, 'Islas Cook', 'Cook Islands', 'Iles Cook', 'CK', 'COK', '682'),
(108, NULL, 'Islas de Åland', 'Åland Islands', 'Îles Åland', 'AX', 'ALA', ''),
(109, NULL, 'Islas Feroe', 'Faroe Islands', 'Iles Féro', 'FO', 'FRO', '298'),
(110, NULL, 'Islas Georgias del Sur y Sandwich del Sur', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud', 'GS', 'SGS', ''),
(111, NULL, 'Islas Heard y McDonald', 'Heard Island and McDonald Islands', 'Les îles Heard et McDonald', 'HM', 'HMD', ''),
(112, NULL, 'Islas Maldivas', 'Maldives', 'Maldives', 'MV', 'MDV', '960'),
(113, NULL, 'Islas Malvinas', 'Falkland Islands (Malvinas)', 'Iles Falkland (Malvinas', 'FK', 'FLK', '500'),
(114, NULL, 'Islas Marianas del Norte', 'Northern Mariana Islands', 'Iles Mariannes du Nord', 'MP', 'MNP', '1 670'),
(115, NULL, 'Islas Marshall', 'Marshall Islands', 'Iles Marshall', 'MH', 'MHL', '692'),
(116, NULL, 'Islas Pitcairn', 'Pitcairn Islands', 'Iles Pitcairn', 'PN', 'PCN', '870'),
(117, NULL, 'Islas Salomón', 'Solomon Islands', 'Iles Salomon', 'SB', 'SLB', '677'),
(118, NULL, 'Islas Turcas y Caicos', 'Turks and Caicos Islands', 'Iles Turques et Caïques', 'TC', 'TCA', '1 649'),
(119, NULL, 'Islas Ultramarinas Menores de Estados Unidos', 'United States Minor Outlying Islands', 'États-Unis Îles mineures éloignées', 'UM', 'UMI', ''),
(120, NULL, 'Islas Vírgenes Británicas', 'Virgin Islands', 'Iles Vierges', 'VG', 'VG', '1 284'),
(121, NULL, 'Islas Vírgenes de los Estados Unidos', 'United States Virgin Islands', 'Îles Vierges américaines', 'VI', 'VIR', '1 340'),
(122, NULL, 'Israel', 'Israel', 'Israël', 'IL', 'ISR', '972'),
(123, NULL, 'Italia', 'Italy', 'Italie', 'IT', 'ITA', '39'),
(124, NULL, 'Jamaica', 'Jamaica', 'Jamaïque', 'JM', 'JAM', '1 876'),
(125, NULL, 'Japón', 'Japan', 'Japon', 'JP', 'JPN', '81'),
(126, NULL, 'Jersey', 'Jersey', 'Maillot', 'JE', 'JEY', ''),
(127, NULL, 'Jordania', 'Jordan', 'Jordan', 'JO', 'JOR', '962'),
(128, NULL, 'Kazajistán', 'Kazakhstan', 'Le Kazakhstan', 'KZ', 'KAZ', '7'),
(129, NULL, 'Kenia', 'Kenya', 'Kenya', 'KE', 'KEN', '254'),
(130, NULL, 'Kirgizstán', 'Kyrgyzstan', 'Kirghizstan', 'KG', 'KGZ', '996'),
(131, NULL, 'Kiribati', 'Kiribati', 'Kiribati', 'KI', 'KIR', '686'),
(132, NULL, 'Kuwait', 'Kuwait', 'Koweït', 'KW', 'KWT', '965'),
(133, NULL, 'Líbano', 'Lebanon', 'Liban', 'LB', 'LBN', '961'),
(134, NULL, 'Laos', 'Laos', 'Laos', 'LA', 'LAO', '856'),
(135, NULL, 'Lesoto', 'Lesotho', 'Lesotho', 'LS', 'LSO', '266'),
(136, NULL, 'Letonia', 'Latvia', 'La Lettonie', 'LV', 'LVA', '371'),
(137, NULL, 'Liberia', 'Liberia', 'Liberia', 'LR', 'LBR', '231'),
(138, NULL, 'Libia', 'Libya', 'Libye', 'LY', 'LBY', '218'),
(139, NULL, 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'LI', 'LIE', '423'),
(140, NULL, 'Lituania', 'Lithuania', 'La Lituanie', 'LT', 'LTU', '370'),
(141, NULL, 'Luxemburgo', 'Luxembourg', 'Luxembourg', 'LU', 'LUX', '352'),
(142, NULL, 'México', 'Mexico', 'Mexique', 'MX', 'MEX', '52'),
(143, NULL, 'Mónaco', 'Monaco', 'Monaco', 'MC', 'MCO', '377'),
(144, NULL, 'Macao', 'Macao', 'Macao', 'MO', 'MAC', '853'),
(145, NULL, 'Macedônia', 'Macedonia', 'Macédoine', 'MK', 'MKD', '389'),
(146, NULL, 'Madagascar', 'Madagascar', 'Madagascar', 'MG', 'MDG', '261'),
(147, NULL, 'Malasia', 'Malaysia', 'Malaisie', 'MY', 'MYS', '60'),
(148, NULL, 'Malawi', 'Malawi', 'Malawi', 'MW', 'MWI', '265'),
(149, NULL, 'Mali', 'Mali', 'Mali', 'ML', 'MLI', '223'),
(150, NULL, 'Malta', 'Malta', 'Malte', 'MT', 'MLT', '356'),
(151, NULL, 'Marruecos', 'Morocco', 'Maroc', 'MA', 'MAR', '212'),
(152, NULL, 'Martinica', 'Martinique', 'Martinique', 'MQ', 'MTQ', ''),
(153, NULL, 'Mauricio', 'Mauritius', 'Iles Maurice', 'MU', 'MUS', '230'),
(154, NULL, 'Mauritania', 'Mauritania', 'Mauritanie', 'MR', 'MRT', '222'),
(155, NULL, 'Mayotte', 'Mayotte', 'Mayotte', 'YT', 'MYT', '262'),
(156, NULL, 'Micronesia', 'Estados Federados de', 'Federados Estados de', 'FM', 'FSM', '691'),
(157, NULL, 'Moldavia', 'Moldova', 'Moldavie', 'MD', 'MDA', '373'),
(158, NULL, 'Mongolia', 'Mongolia', 'Mongolie', 'MN', 'MNG', '976'),
(159, NULL, 'Montenegro', 'Montenegro', 'Monténégro', 'ME', 'MNE', '382'),
(160, NULL, 'Montserrat', 'Montserrat', 'Montserrat', 'MS', 'MSR', '1 664'),
(161, NULL, 'Mozambique', 'Mozambique', 'Mozambique', 'MZ', 'MOZ', '258'),
(162, NULL, 'Namibia', 'Namibia', 'Namibie', 'NA', 'NAM', '264'),
(163, NULL, 'Nauru', 'Nauru', 'Nauru', 'NR', 'NRU', '674'),
(164, NULL, 'Nepal', 'Nepal', 'Népal', 'NP', 'NPL', '977'),
(165, NULL, 'Nicaragua', 'Nicaragua', 'Nicaragua', 'NI', 'NIC', '505'),
(166, NULL, 'Niger', 'Niger', 'Niger', 'NE', 'NER', '227'),
(167, NULL, 'Nigeria', 'Nigeria', 'Nigeria', 'NG', 'NGA', '234'),
(168, NULL, 'Niue', 'Niue', 'Niou', 'NU', 'NIU', '683'),
(169, NULL, 'Noruega', 'Norway', 'Norvège', 'NO', 'NOR', '47'),
(170, NULL, 'Nueva Caledonia', 'New Caledonia', 'Nouvelle-Calédonie', 'NC', 'NCL', '687'),
(171, NULL, 'Nueva Zelanda', 'New Zealand', 'Nouvelle-Zélande', 'NZ', 'NZL', '64'),
(172, NULL, 'Omán', 'Oman', 'Oman', 'OM', 'OMN', '968'),
(173, NULL, 'Países Bajos', 'Netherlands', 'Pays-Bas', 'NL', 'NLD', '31'),
(174, NULL, 'Pakistán', 'Pakistan', 'Pakistan', 'PK', 'PAK', '92'),
(175, NULL, 'Palau', 'Palau', 'Palau', 'PW', 'PLW', '680'),
(176, NULL, 'Palestina', 'Palestine', 'La Palestine', 'PS', 'PSE', ''),
(177, NULL, 'Panamá', 'Panama', 'Panama', 'PA', 'PAN', '507'),
(178, NULL, 'Papúa Nueva Guinea', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée', 'PG', 'PNG', '675'),
(179, NULL, 'Paraguay', 'Paraguay', 'Paraguay', 'PY', 'PRY', '595'),
(180, NULL, 'Perú', 'Peru', 'Pérou', 'PE', 'PER', '51'),
(181, NULL, 'Polinesia Francesa', 'French Polynesia', 'Polynésie française', 'PF', 'PYF', '689'),
(182, NULL, 'Polonia', 'Poland', 'Pologne', 'PL', 'POL', '48'),
(183, NULL, 'Portugal', 'Portugal', 'Portugal', 'PT', 'PRT', '351'),
(184, NULL, 'Puerto Rico', 'Puerto Rico', 'Porto Rico', 'PR', 'PRI', '1'),
(185, NULL, 'Qatar', 'Qatar', 'Qatar', 'QA', 'QAT', '974'),
(186, NULL, 'Reino Unido', 'United Kingdom', 'Royaume-Uni', 'GB', 'GBR', '44'),
(187, NULL, 'República Centroafricana', 'Central African Republic', 'République Centrafricaine', 'CF', 'CAF', '236'),
(188, NULL, 'República Checa', 'Czech Republic', 'République Tchèque', 'CZ', 'CZE', '420'),
(189, NULL, 'República Dominicana', 'Dominican Republic', 'République Dominicaine', 'DO', 'DOM', '1 809'),
(190, NULL, 'Reunión', 'Réunion', 'Réunion', 'RE', 'REU', ''),
(191, NULL, 'Ruanda', 'Rwanda', 'Rwanda', 'RW', 'RWA', '250'),
(192, NULL, 'Rumanía', 'Romania', 'Roumanie', 'RO', 'ROU', '40'),
(193, NULL, 'Rusia', 'Russia', 'La Russie', 'RU', 'RUS', '7'),
(194, NULL, 'Sahara Occidental', 'Western Sahara', 'Sahara Occidental', 'EH', 'ESH', ''),
(195, NULL, 'Samoa', 'Samoa', 'Samoa', 'WS', 'WSM', '685'),
(196, NULL, 'Samoa Americana', 'American Samoa', 'Les Samoa américaines', 'AS', 'ASM', '1 684'),
(197, NULL, 'San Bartolomé', 'Saint Barthélemy', 'Saint-Barthélemy', 'BL', 'BLM', '590'),
(198, NULL, 'San Cristóbal y Nieves', 'Saint Kitts and Nevis', 'Saint Kitts et Nevis', 'KN', 'KNA', '1 869'),
(199, NULL, 'San Marino', 'San Marino', 'San Marino', 'SM', 'SMR', '378'),
(200, NULL, 'San Martín (Francia)', 'Saint Martin (French part)', 'Saint-Martin (partie française)', 'MF', 'MAF', '1 599'),
(201, NULL, 'San Pedro y Miquelón', 'Saint Pierre and Miquelon', 'Saint-Pierre-et-Miquelon', 'PM', 'SPM', '508'),
(202, NULL, 'San Vicente y las Granadinas', 'Saint Vincent and the Grenadines', 'Saint-Vincent et Grenadines', 'VC', 'VCT', '1 784'),
(203, NULL, 'Santa Elena', 'Ascensión y Tristán de Acuña', 'Ascensión y Tristan de Acuña', 'SH', 'SHN', '290'),
(204, NULL, 'Santa Lucía', 'Saint Lucia', 'Sainte-Lucie', 'LC', 'LCA', '1 758'),
(205, NULL, 'Santo Tomé y Príncipe', 'Sao Tome and Principe', 'Sao Tomé et Principe', 'ST', 'STP', '239'),
(206, NULL, 'Senegal', 'Senegal', 'Sénégal', 'SN', 'SEN', '221'),
(207, NULL, 'Serbia', 'Serbia', 'Serbie', 'RS', 'SRB', '381'),
(208, NULL, 'Seychelles', 'Seychelles', 'Les Seychelles', 'SC', 'SYC', '248'),
(209, NULL, 'Sierra Leona', 'Sierra Leone', 'Sierra Leone', 'SL', 'SLE', '232'),
(210, NULL, 'Singapur', 'Singapore', 'Singapour', 'SG', 'SGP', '65'),
(211, NULL, 'Siria', 'Syria', 'Syrie', 'SY', 'SYR', '963'),
(212, NULL, 'Somalia', 'Somalia', 'Somalie', 'SO', 'SOM', '252'),
(213, NULL, 'Sri lanka', 'Sri Lanka', 'Sri Lanka', 'LK', 'LKA', '94'),
(214, NULL, 'Sudáfrica', 'South Africa', 'Afrique du Sud', 'ZA', 'ZAF', '27'),
(215, NULL, 'Sudán', 'Sudan', 'Soudan', 'SD', 'SDN', '249'),
(216, NULL, 'Suecia', 'Sweden', 'Suède', 'SE', 'SWE', '46'),
(217, NULL, 'Suiza', 'Switzerland', 'Suisse', 'CH', 'CHE', '41'),
(218, NULL, 'Surinám', 'Suriname', 'Surinam', 'SR', 'SUR', '597'),
(219, NULL, 'Svalbard y Jan Mayen', 'Svalbard and Jan Mayen', 'Svalbard et Jan Mayen', 'SJ', 'SJM', ''),
(220, NULL, 'Swazilandia', 'Swaziland', 'Swaziland', 'SZ', 'SWZ', '268'),
(221, NULL, 'Tadjikistán', 'Tajikistan', 'Le Tadjikistan', 'TJ', 'TJK', '992'),
(222, NULL, 'Tailandia', 'Thailand', 'Thaïlande', 'TH', 'THA', '66'),
(223, NULL, 'Taiwán', 'Taiwan', 'Taiwan', 'TW', 'TWN', '886'),
(224, NULL, 'Tanzania', 'Tanzania', 'Tanzanie', 'TZ', 'TZA', '255'),
(225, NULL, 'Territorio Británico del Océano Índico', 'British Indian Ocean Territory', 'Territoire britannique de l''océan Indien', 'IO', 'IOT', ''),
(226, NULL, 'Territorios Australes y Antárticas Franceses', 'French Southern Territories', 'Terres australes françaises', 'TF', 'ATF', ''),
(227, NULL, 'Timor Oriental', 'East Timor', 'Timor-Oriental', 'TL', 'TLS', '670'),
(228, NULL, 'Togo', 'Togo', 'Togo', 'TG', 'TGO', '228'),
(229, NULL, 'Tokelau', 'Tokelau', 'Tokélaou', 'TK', 'TKL', '690'),
(230, NULL, 'Tonga', 'Tonga', 'Tonga', 'TO', 'TON', '676'),
(231, NULL, 'Trinidad y Tobago', 'Trinidad and Tobago', 'Trinidad et Tobago', 'TT', 'TTO', '1 868'),
(232, NULL, 'Tunez', 'Tunisia', 'Tunisie', 'TN', 'TUN', '216'),
(233, NULL, 'Turkmenistán', 'Turkmenistan', 'Le Turkménistan', 'TM', 'TKM', '993'),
(234, NULL, 'Turquía', 'Turkey', 'Turquie', 'TR', 'TUR', '90'),
(235, NULL, 'Tuvalu', 'Tuvalu', 'Tuvalu', 'TV', 'TUV', '688'),
(236, NULL, 'Ucrania', 'Ukraine', 'L''Ukraine', 'UA', 'UKR', '380'),
(237, NULL, 'Uganda', 'Uganda', 'Ouganda', 'UG', 'UGA', '256'),
(238, NULL, 'Uruguay', 'Uruguay', 'Uruguay', 'UY', 'URY', '598'),
(239, NULL, 'Uzbekistán', 'Uzbekistan', 'L''Ouzbékistan', 'UZ', 'UZB', '998'),
(240, NULL, 'Vanuatu', 'Vanuatu', 'Vanuatu', 'VU', 'VUT', '678'),
(241, NULL, 'Venezuela', 'Venezuela', 'Venezuela', 'VE', 'VEN', '58'),
(242, NULL, 'Vietnam', 'Vietnam', 'Vietnam', 'VN', 'VNM', '84'),
(243, NULL, 'Wallis y Futuna', 'Wallis and Futuna', 'Wallis et Futuna', 'WF', 'WLF', '681'),
(244, NULL, 'Yemen', 'Yemen', 'Yémen', 'YE', 'YEM', '967'),
(245, NULL, 'Yibuti', 'Djibouti', 'Djibouti', 'DJ', 'DJI', '253'),
(246, NULL, 'Zambia', 'Zambia', 'Zambie', 'ZM', 'ZMB', '260'),
(247, NULL, 'Zimbabue', 'Zimbabwe', 'Zimbabwe', 'ZW', 'ZWE', '263');

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
  `img_url` varchar(100) DEFAULT NULL,
  `caracteristica` text,
  `pais_id` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `detalle_numero` enum('unidad','millar','metro','qg','yarda','zon','galones','barriles','litros','cajas','fulgones','otro') DEFAULT NULL,
  `esto_provincia` varchar(100) DEFAULT NULL,
  `localidad` text,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `post`, `categoria_post`, `img_url`, `caracteristica`, `pais_id`, `numero`, `detalle_numero`, `esto_provincia`, `localidad`, `fecha_entrega`, `observaciones`) VALUES
(1, 0, NULL, NULL, '2016-12-26 18:24:17', '<p>orueb</p>', 1, 'img_product/26122016232417.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, NULL, NULL, '2016-12-26 18:24:38', '<p>orueb</p>', 1, 'img_product/26122016232438.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, NULL, NULL, '2016-12-26 18:26:18', '<p>orueb</p>', 1, 'img_product/26122016232618.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, NULL, NULL, '2016-12-26 18:27:07', '<p>orueb</p>', 1, 'img_product/26122016232707.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0, NULL, NULL, '2016-12-26 18:27:23', '<p>orueb</p>', 1, 'img_product/26122016232723.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0, NULL, NULL, '2016-12-26 18:27:43', '<p>orueb</p>', 1, 'img_product/26122016232743.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 1, '2016-12-28 10:33:37', '2016-12-26 18:29:40', '<p>prueba eudy lo modifico</p>', 1, 'img_product/28122016145839.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, NULL, NULL, '2016-12-26 19:21:46', '<p>prueba</p>', 1, 'img_product/27122016002146.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, NULL, NULL, '2016-12-26 19:22:03', '<p>prueba</p>', 1, 'img_product/27122016002203.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, NULL, NULL, '2016-12-26 19:30:35', '<p>prueba</p>', 1, 'img_product/27122016003035.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, NULL, NULL, '2016-12-26 19:31:31', '<p>prueba</p>', 1, 'img_product/27122016003131.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, NULL, NULL, '2016-12-26 19:31:43', '<p>prueba</p>', 1, 'img_product/27122016003143.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 1, '2016-12-28 13:36:52', '2016-12-26 19:33:21', '<p>prueba asdasdf</p>', 1, 'img_product/28122016183652.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, NULL, NULL, '2016-12-26 19:33:52', '<p>prueba</p>', 1, 'img_product/27122016003351.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, NULL, NULL, '2017-01-13 13:50:37', '', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, NULL, NULL, '2017-01-13 13:53:01', '', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, NULL, NULL, '2017-01-13 14:04:53', '<p>prueba de relacion</p>', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, NULL, NULL, '2017-01-13 14:16:54', '<p>prueba de relacion</p>', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, NULL, NULL, '2017-01-13 14:20:37', '<p>prueba de relacion</p>', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, NULL, NULL, '2017-01-13 14:29:57', '<p>prueba de relacion</p>', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, NULL, NULL, '2017-01-13 15:06:05', '<p>prueba de post</p>', 1, 'img_product/13012017200604.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, NULL, NULL, '2017-01-13 17:31:37', '<p>prueba de eudy con los roll etc</p>', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, NULL, NULL, '2017-01-13 21:23:55', '<p>prueba de eudy con los roll etc</p>', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, NULL, NULL, '2017-01-29 14:18:46', '<p> <strong>Caracterisca del producto</strong>c </p><p> <strong>Provincia del producto</strong>p </p><p> <strong>Localidad del producto</strong>y </p><p> <strong>Numero del producto</strong>32 </p><p> <strong>Tipo de medida del producto</strong>unidad </p><p> <strong>Fecha entrega del producto</strong>2017-01-29 </p><p> <strong>Observacion del producto</strong>ok </p>', 1, 'img_product/29012017191846.jpg', 'c', 189, 32, 'unidad', 'p', 'y', '2017-01-29', 'ok'),
(25, 1, NULL, NULL, '2017-01-29 14:19:36', '<p> <strong>Caracterisca del producto</strong>c </p><p> <strong>Provincia del producto</strong>p </p><p> <strong>Localidad del producto</strong>y </p><p> <strong>Numero del producto</strong>32 </p><p> <strong>Tipo de medida del producto</strong>unidad </p><p> <strong>Fecha entrega del producto</strong>2017-01-29 </p><p> <strong>Observacion del producto</strong>ok </p>', 1, 'img_product/29012017191936.jpg', 'c', 189, 32, 'unidad', 'p', 'y', '2017-01-29', 'ok'),
(26, 1, NULL, NULL, '2017-01-29 14:21:09', '<p> <strong>Caracterisca del producto</strong> c </p><p> <strong>Provincia del producto</strong> p </p><p> <strong>Localidad del producto</strong> y </p><p> <strong>Numero del producto</strong> 32 </p><p> <strong>Tipo de medida del producto</strong> unidad </p><p> <strong>Fecha entrega del producto</strong> 2017-01-29 </p><p> <strong>Observacion del producto</strong> ok </p>', 1, 'img_product/29012017192109.jpg', 'c', 189, 32, 'unidad', 'p', 'y', '2017-01-29', 'ok'),
(27, 2, NULL, NULL, '2017-01-29 21:02:35', '<p>prueba</p><p> <strong>Tipo de medida del producto</strong> unidad </p>', 1, 'img_product/30012017020234.jpg', NULL, 0, NULL, 'unidad', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_categoria_subcategoria`
--

CREATE TABLE `relacion_categoria_subcategoria` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
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
(9, 1, '2017-01-13 21:23:55', 12, 23),
(10, 1, '2017-01-29 14:18:46', 12, 24),
(11, 1, '2017-01-29 14:19:36', 12, 25),
(12, 1, '2017-01-29 14:21:09', 12, 26),
(13, 2, '2017-01-29 21:02:36', 12, 27);

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
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(100) DEFAULT NULL,
  `user_id_creado` int(11) DEFAULT NULL,
  `user_id_editado` int(11) DEFAULT NULL,
  `fecha_editado` datetime DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `nombre_cientifico` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_of_sub_categorias`
--

INSERT INTO `sub_of_sub_categorias` (`id`, `nombre_categoria`, `user_id_creado`, `user_id_editado`, `fecha_editado`, `fecha_creado`, `nombre_cientifico`) VALUES
(1, 'producto', 1, NULL, NULL, '2017-01-12 13:40:11', NULL),
(3, 'producto1', 1, NULL, NULL, '2017-01-13 00:55:47', NULL),
(4, 'producto2', 1, NULL, NULL, '2017-01-13 00:56:08', NULL),
(5, 'producto3', 1, NULL, NULL, '2017-01-13 00:56:20', NULL),
(6, 'producto4', 1, NULL, NULL, '2017-01-13 00:56:33', NULL);

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
  `img_perfil` varchar(100) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `clave`, `fecha_creado`, `descripcion`, `embed_video`, `tipo_user`, `estado`, `img_perfil`, `telefono`, `correo`) VALUES
(1, 'eudy', '202cb962ac59075b964b07152d234b70', '2016-12-25 21:02:50', 'prueba', 'no tengo', 'admin', 'activo', 'img_perfil/1_1_recurso.png', NULL, NULL),
(2, 'alberto', '202cb962ac59075b964b07152d234b70', '2016-12-27 22:58:04', NULL, NULL, 'normal', 'activo', 'img_perfil/28122016035804.jpg', NULL, NULL),
(3, 'agimerca', '202cb962ac59075b964b07152d234b70', '2016-12-28 19:14:15', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001415.jpg', NULL, NULL),
(4, 'agimerca', '202cb962ac59075b964b07152d234b70', '2016-12-28 19:16:44', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001644.jpg', NULL, NULL),
(5, 'agimerca', '202cb962ac59075b964b07152d234b70', '2016-12-28 19:16:51', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001651.jpg', NULL, NULL),
(6, 'a', '0cc175b9c0f1b6a831c399e269772661', '2016-12-28 19:17:37', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001737.jpg', NULL, NULL),
(7, 'a', '0cc175b9c0f1b6a831c399e269772661', '2016-12-28 19:18:36', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016001836.jpg', NULL, NULL),
(8, 'a', '0cc175b9c0f1b6a831c399e269772661', '2016-12-28 19:21:28', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016002128.jpg', NULL, NULL),
(9, 'as', 'f970e2767d0cfe75876ea857f92e319b', '2016-12-28 19:21:39', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016002139.jpg', NULL, NULL),
(10, 'as', 'f970e2767d0cfe75876ea857f92e319b', '2016-12-28 19:25:05', NULL, NULL, 'normal', 'activo', 'img_perfil/29122016002505.jpg', NULL, NULL),
(11, 'z', 'fbade9e36a3f36d3d676c1b808451dd7', '2017-01-03 12:16:41', NULL, NULL, 'normal', 'activo', '', NULL, NULL),
(12, 'c', '4a8a08f09d37b73795649038408b5f33', '2017-01-03 12:29:54', NULL, NULL, 'normal', 'activo', 'img_perfil/03012017172954.jpg', NULL, NULL),
(13, 'v', '9e3669d19b675bd57058fd4664205d2a', '2017-01-03 12:30:05', NULL, NULL, 'normal', 'activo', '', NULL, NULL),
(14, 'v', '9e3669d19b675bd57058fd4664205d2a', '2017-01-03 12:44:05', NULL, NULL, 'normal', 'activo', '', NULL, NULL),
(15, 'm', '6f8f57715090da2632453988d9a1501b', '2017-01-03 12:44:37', NULL, NULL, 'normal', 'activo', '', NULL, NULL),
(16, 'e', 'e1671797c52e15f763380b45e841ec32', '2017-01-03 12:47:01', NULL, NULL, 'normal', 'activo', 'img_perfil/foto_perfil.jpg', NULL, NULL),
(17, 'p', '83878c91171338902e0fe0fb97a8c47a', '2017-01-03 12:48:43', NULL, NULL, 'normal', 'activo', 'img/foto_perfil.jpg', NULL, NULL);

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
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `me_gustas`
--
ALTER TABLE `me_gustas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
