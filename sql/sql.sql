-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_blog` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo_blog` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `configuracion` (`id`, `titulo_blog`, `subtitulo_blog`) VALUES
(1,	'Mi Super Blog con PHP',	'');

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` tinytext COLLATE utf8_unicode_ci,
  `contenido` longtext COLLATE utf8_unicode_ci,
  `id_autor` int(11) DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `contenido`, `id_autor`, `fecha`) VALUES
(1,	'Ooh, you think darkness is your ally?',	'You merely adopted the dark, I was born in it. Molded by it. I didn\'t see the light until I was already a man. By then there was nothing to be but blinded.',	'Every man who has lotted here over the centuries, has looked up to the light and imagined climbing to freedom. So easy, so simple! And like shipwrecked men turning to seawater foregoing uncontrollable thirst, many have died trying. And then here there can be no true despair without hope. So as I terrorize Gotham, I will feed its people hope to poison their souls. I will let them believe that they can survive so that you can watch them climbing over each other to stay in the sun. You can watch me torture an entire city. And then when you\'ve truly understood the depth of your failure, we will fulfill Ra\'s Al Ghul\'s destiny. We will destroy Gotham. And then, when that is done, and Gotham is... ashes Then you have my permission to die.\r\n',	1,	1438900842);


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `password`, `nivel`) VALUES
(0,	'usuario',	'e10adc3949ba59abbe56e057f20f883e',	1);

-- 2015-08-06 23:38:55
