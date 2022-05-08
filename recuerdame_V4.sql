-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-05-2022 a las 19:05:19
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recuerdame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `start`, `title`, `description`, `id_paciente`, `color`) VALUES
(1, '2022-04-05', 'Recuerdo sobre montar en bicicleta', '', 1, '#d63838'),
(2, '2022-04-27', 'Actividad', '', 1, '#292da8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Familia'),
(2, 'Amistad'),
(3, 'Hobbies'),
(4, 'Trabajo'),
(5, 'Política'),
(6, 'Otros'),
(7, 'Estudios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emocion`
--

CREATE TABLE `emocion` (
  `id_emocion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `emocion`
--

INSERT INTO `emocion` (`id_emocion`, `nombre`) VALUES
(1, 'Alegría'),
(2, 'Nostalgia'),
(3, 'Ira'),
(4, 'Enfado'),
(5, 'Tristeza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`) VALUES
(1, 'Conservado'),
(2, 'En riesgo de perder'),
(3, 'Perdido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapa`
--

CREATE TABLE `etapa` (
  `id_etapa` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etapa`
--

INSERT INTO `etapa` (`id_etapa`, `nombre`) VALUES
(1, 'Infancia'),
(2, 'Adolescencia'),
(3, 'Adulto joven'),
(4, 'Adulto'),
(5, 'Adulto mayor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `id_etiqueta` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`id_etiqueta`, `nombre`) VALUES
(1, 'Positivo'),
(2, 'Neutro'),
(3, 'Negativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id_evaluacion` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `gds` int(1) NOT NULL,
  `gds_fecha` date NOT NULL,
  `mental` int(2) NOT NULL,
  `mental_fecha` date NOT NULL,
  `cdr` int(1) NOT NULL,
  `cdr_fecha` date NOT NULL,
  `diagnostico` int(11) NOT NULL,
  `observaciones` int(11) DEFAULT NULL,
  `nombre_escala` varchar(100) CHARACTER SET utf8 NOT NULL,
  `escala` int(11) NOT NULL,
  `fecha_escala` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id_evaluacion`, `id_paciente`, `fecha`, `gds`, `gds_fecha`, `mental`, `mental_fecha`, `cdr`, `cdr_fecha`, `diagnostico`, `observaciones`, `nombre_escala`, `escala`, `fecha_escala`) VALUES
(1, 1, '2022-01-01', 3, '2022-01-01', 3, '2022-01-01', 3, '2022-01-01', 3, NULL, 'Otra', 3, '2022-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `id_multimedia` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fichero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`id_multimedia`, `nombre`, `fichero`) VALUES
(5, 'Foto de la comunión', 'comunion.jpeg'),
(6, 'Hermanos', 'hermanos.jpeg'),
(7, 'Foto de la mili', 'mili.jpeg'),
(8, 'Foto de adolescente', 'adolescente.jpeg'),
(9, 'Boda', 'boda.png'),
(112, 'playa.jpeg', 'playa.jpeg'),
(114, 'bicicleta.jpeg', 'bicicleta.jpeg'),
(115, 'bicicleta.jpeg', 'bicicleta.jpeg'),
(116, 'bicicleta.jpeg', 'bicicleta.jpeg'),
(118, 'bicicleta.jpeg', 'bicicleta.jpeg'),
(119, 'bicicleta.jpeg', 'bicicleta.jpeg'),
(120, 'playa.jpeg', 'playa.jpeg'),
(121, 'bicicleta.jpeg', 'bicicleta.jpeg'),
(122, 'playa.jpeg', 'playa.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `lugar_nacimiento` varchar(80) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_residencia` varchar(255) NOT NULL,
  `residencia_actual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `apellidos`, `genero`, `lugar_nacimiento`, `nacionalidad`, `fecha_nacimiento`, `tipo_residencia`, `residencia_actual`) VALUES
(1, 'Ricardo', 'González Estévez', 'H', 'Madrid', 'Española', '1935-02-09', 'Residencia de ancianos', 'Los palominos'),
(2, 'Juana', 'Rodríguez Fernández', 'M', 'Madrid', 'España', '1943-05-15', 'Los palominos', 'Residencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_relacionada`
--

CREATE TABLE `persona_relacionada` (
  `id_persona_relacionada` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_tipo_relacion` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_relacionada`
--

INSERT INTO `persona_relacionada` (`id_persona_relacionada`, `nombre`, `apellidos`, `telefono`, `ocupacion`, `email`, `id_tipo_relacion`, `id_paciente`) VALUES
(1, 'Paula', 'González Estévez', '222222222', 'Profesora', 'ricardo@ejemplo.com', 7, 1),
(6, 'Rocío', 'Bletrán', '', 'Estudiante', 'rocio@ejemplo.com', 5, 1),
(8, 'Francisco', 'González', '', 'Camarero', 'francisco@ejemplo.com', 5, 1),
(24, 'Cristina', 'Cristina', '', 'Cristina', 'cristina', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuerdo`
--

CREATE TABLE `recuerdo` (
  `id_recuerdo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `localizacion` varchar(255) DEFAULT NULL,
  `id_etapa` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_emocion` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_etiqueta` int(11) DEFAULT NULL,
  `puntuacion` int(1) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recuerdo`
--

INSERT INTO `recuerdo` (`id_recuerdo`, `fecha`, `nombre`, `descripcion`, `localizacion`, `id_etapa`, `id_categoria`, `id_emocion`, `id_estado`, `id_etiqueta`, `puntuacion`, `id_paciente`) VALUES
(52, '1949-02-03', 'Emigración a Argentina', 'Vivió en Argentina porque tuvo que emigrar.', 'Argentina', 1, NULL, NULL, NULL, NULL, 3, 1),
(53, '1945-02-03', 'Casa', 'Descripción de su casa como una casa de campo rural (típica de la aldea) con el suelo de tierra y sin baño. Además, recuerda lavarse en cubos en la cuadra para aprovechar el calor de los animales.', 'Casa', 1, 1, NULL, NULL, NULL, NULL, 1),
(54, '1940-02-03', 'Padre', 'Su padre era labrador. Trabajaba en la marina mercante por lo que tenía una buena posición económica.\r\nAdemás de esto, tenían la taberna del pueblo y era dentista.\r\nTodo esto no lo recuerda porque falleció cuando era muy pequeña.', '', 1, 1, NULL, NULL, NULL, 3, 1),
(55, '1940-02-03', 'Familia numerosa', 'Tenía muchos hermanos (eran 14 hermanos). Él era el menor de 11 y tuvo que hacerse cargo de los hermanos pequeños por el alcoholismo de su padre.', NULL, 1, 1, NULL, NULL, NULL, NULL, 1),
(56, '1940-02-03', 'Adopción por sus tíos', 'Sus tíos, que no tenían hijos, le adoptaron con 5 años.', NULL, 1, 1, NULL, NULL, NULL, NULL, 1),
(57, '1940-02-03', 'Pobreza', 'Fue una época muy dura y pasó mucha hambre.\r\nMenciona las cartas de racionamiento.', NULL, 1, 1, NULL, NULL, NULL, NULL, 1),
(58, '1945-09-03', 'Campo', 'Por la tardes se dedicaba a cuidar de las vacas y ganado puesto que con 10 años hacía labores de cuidado de animales (Cabras, ovejas).\r\nAyudaba a plantar patatas, ajos y cebollas. Además, trabajaba en la tierras de otras personas y hacía pan.\r\nTenía que esconder el trigo para que no se lo robasen.\r\n', NULL, 1, 1, NULL, NULL, NULL, NULL, 1),
(59, '1950-05-03', 'Ferias y mercados', 'Iba a vender al mercadillo y a las ferias del pueblo con sus padres y caminaba durante 13 km para vender lo que cultivaba en la tierra.', NULL, 1, 4, NULL, NULL, NULL, NULL, 1),
(60, '1943-04-05', 'Guerra y política', 'Recuerda escuchar en la radio las noticias de la guerra.\r\nSu padre fue a la guerra y estuvo encarcelado.\r\nSu familia era republicana y presenciaron fusilamientos de la familia.\r\nSe mudaron de Madrid a un pueblo de la costa en Galicia al lado del mar donde el padre estuvo escondido por su orientación política.\r\nLos soldados requisaban los hórreos que guardaban la cosecha.', NULL, 1, 5, NULL, NULL, NULL, NULL, 1),
(61, '1946-06-21', 'Escuela', 'Estuvo en un colegio de curas hasta los 11 años que se puso a trabajar. Fue solo a aprender cálculo básico, leer y escribir y tenía que andar muchos km para llegar al colegio.\r\nRecuerda castigos frecuentes y que los profesores eran agresivos.', NULL, 1, 7, 5, NULL, 3, NULL, 1),
(62, '1945-07-03', 'Juegos', 'Jugaba con los primos, todos juntos en la fuente del pueblo. Le gustaba saltar a la comba, jugar a las chapas y el escondite.', NULL, 1, 3, NULL, NULL, NULL, NULL, 1),
(63, '1945-08-15', 'Verano', 'Le gustaba la piscina y también se bañaba en el río. Además le gustaba pescar y visitaban un pueblo llamado Foz.', NULL, 1, 6, NULL, NULL, NULL, NULL, 1),
(64, '1940-09-03', 'Religión y comunión', 'Iban caminado a misa todos los domingos.\r\nRecuerda la 1ª comunión pero no recuerda el traje. La recuerda porque el pensaba que se hacía mayor.', NULL, 1, 6, NULL, NULL, NULL, NULL, 1),
(65, '1944-01-20', 'Anécdotas', 'Encerrar a alguien en el campanario.\r\nIban a torear a la vaca y un día le dio una buena coz.\r\nRecuerda especialmente un gato.', NULL, 1, 6, NULL, NULL, NULL, NULL, 1),
(66, '1950-02-03', 'Estudios', 'Realizó formación como tornero y fresador y estudió fontanería.', NULL, 2, 7, NULL, NULL, NULL, NULL, 1),
(67, '1951-02-03', 'Economía', 'Recuerda las pesetas y que fue una época de pobreza.', NULL, 2, 6, NULL, NULL, NULL, NULL, 1),
(68, '1951-03-15', 'Trabajo', 'Trabajar en una fábrica y le pasaba el dinero que ganaba a su madre.', NULL, 2, 4, NULL, NULL, NULL, NULL, 1),
(69, '1953-09-01', 'Mili', 'No le gustaba la mili ya que la hizo en África y lo recuerda como una época dura y de abuso de poder. Además, le hizo reflexionar sobre la idea de que \"nunca dejaría que lo pisotearan\".', NULL, 2, 4, NULL, NULL, NULL, NULL, 1),
(70, '1953-02-03', 'Política', 'Tenía que cantar el Cara al Sol y lo odiaba porque su padre era republicano.', NULL, 2, 5, NULL, NULL, NULL, NULL, 1),
(71, '1955-05-10', 'Verbena y su primer amor', 'Lo pasaba muy bien. Iba a los bailes y la música era tradicional gallega.\r\nCon 16 años fue a su primer baile y conoció a su primer amor. Tenía que caminar largas distancias para llegar a la verbena. Y muchas veces al volver no dormía porque se ponía a trabajar.', NULL, 2, 2, NULL, NULL, NULL, NULL, 1),
(72, '1956-04-20', 'Amigos', 'Recuerda que tuvo pocos amigos pero eran de verdad. Tuvo dos amigos que no le fallaron en toda su vida.', NULL, 2, 2, NULL, NULL, NULL, NULL, 1),
(73, '1956-10-24', 'Ocio', 'Le gustaba jugar a las cartas e ir a pescar al río. Además, le gustaba dar paseos con la bici.', NULL, 2, 3, NULL, NULL, NULL, NULL, 1),
(74, '1952-02-03', 'Noviazgo', 'Se conocieron en una fiesta bailando.', NULL, 3, 1, NULL, NULL, NULL, NULL, 1),
(75, '1955-02-03', 'Matrimonio', 'Fue una boda con muy pocos recursos y no pudieron hacer viajes de bodas.', NULL, 3, 1, NULL, NULL, NULL, NULL, 1),
(76, '1954-03-04', 'Casa', 'La casa fue construida por el matrimonio con esfuerzo.', NULL, 4, 1, NULL, NULL, NULL, NULL, 1),
(77, '1960-02-03', 'Familia', 'Fue una alegría el nacimiento de los hijos y sus nietos.\r\nAdemás, tuvo que cuidar de sus padres.', NULL, 4, 1, NULL, NULL, NULL, NULL, 1),
(78, '1958-02-03', 'Trabajo', 'Se dedicaba a cuidar a los animales en el campo.\r\nTambién fue albañil y fontanero.', NULL, 4, 4, NULL, NULL, NULL, NULL, 1),
(79, '1954-02-03', 'Carnet de conducir', 'Estaba muy contento por la autonomía que le dio tener su coche.', NULL, 3, 6, NULL, NULL, NULL, NULL, 1),
(80, '1955-02-03', 'Relaciones sociales', 'Preparaban barbacoas e iban a la feria.', NULL, 3, 2, NULL, NULL, NULL, NULL, 1),
(205, '2022-04-27', 'Prueba', 'Descripción', '', 1, NULL, NULL, NULL, NULL, 3, 1),
(209, '2022-04-27', 'Recuerdo21', 'Descripción', '', 1, NULL, NULL, NULL, NULL, 3, 1),
(210, '2022-04-27', 'Recuerdo5', '', '', 1, NULL, NULL, NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuerdo_multimedia`
--

CREATE TABLE `recuerdo_multimedia` (
  `id_recuerdo` int(11) NOT NULL,
  `id_multimedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recuerdo_multimedia`
--

INSERT INTO `recuerdo_multimedia` (`id_recuerdo`, `id_multimedia`) VALUES
(54, 5),
(54, 6),
(54, 8),
(54, 116),
(54, 122),
(55, 6),
(64, 5),
(69, 7),
(71, 8),
(75, 9),
(205, 121),
(205, 122),
(209, 119),
(209, 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuerdo_persona_relacionada`
--

CREATE TABLE `recuerdo_persona_relacionada` (
  `id_recuerdo` int(11) NOT NULL,
  `id_persona_relacionada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recuerdo_persona_relacionada`
--

INSERT INTO `recuerdo_persona_relacionada` (`id_recuerdo`, `id_persona_relacionada`) VALUES
(52, 1),
(52, 6),
(54, 1),
(205, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id_sesion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_etapa` int(11) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `barreras` varchar(255) DEFAULT NULL,
  `facilitadores` varchar(255) DEFAULT NULL,
  `fecha_finalizada` date DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `respuesta` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id_sesion`, `fecha`, `id_etapa`, `objetivo`, `descripcion`, `barreras`, `facilitadores`, `fecha_finalizada`, `id_paciente`, `id_usuario`, `respuesta`, `observaciones`) VALUES
(1, '2022-01-15', 1, 'Conversar sobre el trabajo y la escuela.', 'Se van a mostrar una serie de recuerdos de la infancia con respecto al colegio y el trabajo.', 'Los maestros del colegio.', 'Hablar de las bicicletas.', '2022-01-15', 1, 1, '', ''),
(2, '2022-02-01', 3, 'Recordar a su mujer.', 'Hablar del noviazgo y el matrimonio.', 'Dificultades económicas.', 'La verbena donde la conoció y su primer baile.', NULL, 1, 1, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_multimedia`
--

CREATE TABLE `sesion_multimedia` (
  `id_sesion` int(11) NOT NULL,
  `id_multimedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesion_multimedia`
--

INSERT INTO `sesion_multimedia` (`id_sesion`, `id_multimedia`) VALUES
(1, 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_recuerdo`
--

CREATE TABLE `sesion_recuerdo` (
  `id_sesion` int(11) NOT NULL,
  `id_recuerdo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesion_recuerdo`
--

INSERT INTO `sesion_recuerdo` (`id_sesion`, `id_recuerdo`) VALUES
(1, 58),
(1, 61),
(2, 71),
(2, 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_relacion`
--

CREATE TABLE `tipo_relacion` (
  `id_tipo_relacion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_relacion`
--

INSERT INTO `tipo_relacion` (`id_tipo_relacion`, `nombre`) VALUES
(1, 'Padre/madre'),
(2, 'Hijo/a'),
(3, 'Primo/a'),
(4, 'Tío/a'),
(5, 'Amigo/a'),
(6, 'Otros'),
(7, 'Hermano/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `correo`, `contrasenia`, `nombre`, `apellidos`, `rol`) VALUES
(1, 'francisco', NULL, '$2y$10$UV/.BNdWYBvA9DcjfVv3ZuXnQ5gar5tNXqWY90RqLssCWddycOr5y', 'Francisco', 'Fernández Ochoa', 'TERAPEUTA'),
(2, 'valeria', NULL, '$2y$10$ZOzRIFQ.fr8ZzNavgK.jReskkS55Vxqwc8CbujKoldh4it2bwARy2', 'Valeria', 'González Calvo', 'CUIDADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `emocion`
--
ALTER TABLE `emocion`
  ADD PRIMARY KEY (`id_emocion`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`id_etiqueta`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `FK_EVALUACION_PACIENTE` (`id_paciente`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id_multimedia`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `persona_relacionada`
--
ALTER TABLE `persona_relacionada`
  ADD PRIMARY KEY (`id_persona_relacionada`),
  ADD KEY `FK_PERSONA_RELACIONADA_TIPO_RELACION` (`id_tipo_relacion`),
  ADD KEY `FK_PERSONA_RELACIONADA_PACIENTE` (`id_paciente`);

--
-- Indices de la tabla `recuerdo`
--
ALTER TABLE `recuerdo`
  ADD PRIMARY KEY (`id_recuerdo`),
  ADD KEY `FK_RECUERDO_CATEGORIA` (`id_categoria`),
  ADD KEY `FK_RECUERDO_EMOCION` (`id_emocion`),
  ADD KEY `FK_RECUERDO_ESTADO` (`id_estado`),
  ADD KEY `FK_RECUERDO_ETIQUETA` (`id_etiqueta`),
  ADD KEY `FK_RECUERDO_PACIENTE` (`id_paciente`),
  ADD KEY `FK_RECUERDO_ETAPA` (`id_etapa`);

--
-- Indices de la tabla `recuerdo_multimedia`
--
ALTER TABLE `recuerdo_multimedia`
  ADD PRIMARY KEY (`id_recuerdo`,`id_multimedia`),
  ADD KEY `FK_RECUERDO_MULTIMEDIA_MULTIMEDIA` (`id_multimedia`);

--
-- Indices de la tabla `recuerdo_persona_relacionada`
--
ALTER TABLE `recuerdo_persona_relacionada`
  ADD PRIMARY KEY (`id_recuerdo`,`id_persona_relacionada`),
  ADD KEY `FK_RECUERDO_PERSONA_RELACIONADA_PERSONA_RELACIONADA` (`id_persona_relacionada`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `FK_SESION_ETAPA` (`id_etapa`),
  ADD KEY `FK_SESION_PACIENTE` (`id_paciente`),
  ADD KEY `FK_SESION_USUARIO` (`id_usuario`);

--
-- Indices de la tabla `sesion_multimedia`
--
ALTER TABLE `sesion_multimedia`
  ADD PRIMARY KEY (`id_sesion`,`id_multimedia`),
  ADD KEY `FK_SESION_MULTIMEDIA_MULTIMEDIA` (`id_multimedia`);

--
-- Indices de la tabla `sesion_recuerdo`
--
ALTER TABLE `sesion_recuerdo`
  ADD PRIMARY KEY (`id_sesion`,`id_recuerdo`),
  ADD KEY `FK_RECUERDO` (`id_recuerdo`);

--
-- Indices de la tabla `tipo_relacion`
--
ALTER TABLE `tipo_relacion`
  ADD PRIMARY KEY (`id_tipo_relacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `UQ_NOMBRE_USUARIO` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `emocion`
--
ALTER TABLE `emocion`
  MODIFY `id_emocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `etapa`
--
ALTER TABLE `etapa`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `id_etiqueta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id_multimedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona_relacionada`
--
ALTER TABLE `persona_relacionada`
  MODIFY `id_persona_relacionada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `recuerdo`
--
ALTER TABLE `recuerdo`
  MODIFY `id_recuerdo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_relacion`
--
ALTER TABLE `tipo_relacion`
  MODIFY `id_tipo_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `FK_EVALUACION_PACIENTE` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `persona_relacionada`
--
ALTER TABLE `persona_relacionada`
  ADD CONSTRAINT `FK_PERSONA_RELACIONADA_PACIENTE` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `FK_PERSONA_RELACIONADA_TIPO_RELACION` FOREIGN KEY (`id_tipo_relacion`) REFERENCES `tipo_relacion` (`id_tipo_relacion`);

--
-- Filtros para la tabla `recuerdo`
--
ALTER TABLE `recuerdo`
  ADD CONSTRAINT `FK_RECUERDO_CATEGORIA` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `FK_RECUERDO_EMOCION` FOREIGN KEY (`id_emocion`) REFERENCES `emocion` (`id_emocion`),
  ADD CONSTRAINT `FK_RECUERDO_ESTADO` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `FK_RECUERDO_ETAPA` FOREIGN KEY (`id_etapa`) REFERENCES `etapa` (`id_etapa`),
  ADD CONSTRAINT `FK_RECUERDO_ETIQUETA` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiqueta` (`id_etiqueta`),
  ADD CONSTRAINT `FK_RECUERDO_PACIENTE` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `recuerdo_multimedia`
--
ALTER TABLE `recuerdo_multimedia`
  ADD CONSTRAINT `FK_RECUERDO_MULTIMEDIA_MULTIMEDIA` FOREIGN KEY (`id_multimedia`) REFERENCES `multimedia` (`id_multimedia`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RECUERDO_MULTIMEDIA_RECUERDO` FOREIGN KEY (`id_recuerdo`) REFERENCES `recuerdo` (`id_recuerdo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `recuerdo_persona_relacionada`
--
ALTER TABLE `recuerdo_persona_relacionada`
  ADD CONSTRAINT `FK_RECUERDO_PERSONA_RELACIONADA_PERSONA_RELACIONADA` FOREIGN KEY (`id_persona_relacionada`) REFERENCES `persona_relacionada` (`id_persona_relacionada`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RECUERDO_PERSONA_RELACIONADA_RECUERDO` FOREIGN KEY (`id_recuerdo`) REFERENCES `recuerdo` (`id_recuerdo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `FK_SESION_ETAPA` FOREIGN KEY (`id_etapa`) REFERENCES `etapa` (`id_etapa`),
  ADD CONSTRAINT `FK_SESION_PACIENTE` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `FK_SESION_USUARIO` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `sesion_multimedia`
--
ALTER TABLE `sesion_multimedia`
  ADD CONSTRAINT `FK_SESION_MULTIMEDIA_MULTIMEDIA` FOREIGN KEY (`id_multimedia`) REFERENCES `multimedia` (`id_multimedia`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_SESION_MULTIMEDIA_SESION` FOREIGN KEY (`id_sesion`) REFERENCES `sesion` (`id_sesion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sesion_recuerdo`
--
ALTER TABLE `sesion_recuerdo`
  ADD CONSTRAINT `FK_RECUERDO` FOREIGN KEY (`id_recuerdo`) REFERENCES `recuerdo` (`id_recuerdo`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_SESION` FOREIGN KEY (`id_sesion`) REFERENCES `sesion` (`id_sesion`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
