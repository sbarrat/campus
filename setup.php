<?php
phpinfo();
// require_once 'inc/Consulta.php';
//  $consulta = new Consulta('Mysql');
 
//  $sql = "DELETE FROM cuponescampus";
//  $consulta->consulta( $sql );
 
//  $sql = "INSERT INTO cuponescampus (cupon, valor, descripcion, campus, total ) 
// VALUES ('SANGREGORIO', '20', 'Cupon especial para los pertenecientes al club San gregorio', 'football', '35')";
//  $consulta->consulta( $sql );
//  $sql = "SELECT * from cuponescampus";
//  $consulta->consulta( $sql );
//  var_dump( $consulta->resultados() );
//  $sql = "ALTER TABLE `inscripcionesEnglish` CHANGE `cupon` `codigoDescuento` 
//  VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ";
//  $consulta->consulta( $sql );
//  $sql = "ALTER TABLE `inscripcionesEnglish` ADD `guarderia` SET( 'Si', 'No' ) NOT NULL ,
// ADD `nombreHermano` VARCHAR( 255 ) NULL ,
// ADD `apellidosHermano` VARCHAR( 255 ) NULL ,
// ADD `sexoHermano` SET( 'Masculino', 'Femenino' ) NULL ,
// ADD `fechanacimientoHermano` DATE NULL ,
// ADD `observacionesHermano` TEXT NULL ,
// ADD `amigos` TEXT NULL ";
//  $consulta->consulta( $sql );
//  $sql = "ALTER TABLE `inscripcionesEnglish` ADD `talla` VARCHAR( 255 ) NULL ";
//  $consulta->consulta( $sql );
//  $sql = "ALTER TABLE `inscripcionesEnglish` CHANGE `nombreParticipante` `nombreParticipante` 
//  VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre'";
//  $consulta->consulta( $sql );
//  $sql = "TRUNCATE `inscripcionesEnglish`";
//  $consulta->consulta( $sql );
 
//  $sql = "ALTER TABLE `inscripcionesEnglish` ADD `cupon` VARCHAR( 255 ) NOT NULL ,
// ADD INDEX ( `cupon` ) ";
//  $sql = "ALTER TABLE `cuponescampus` ADD `creador` VARCHAR( 255 ) NOT NULL ,
// ADD `destinatarios` TEXT NOT NULL";
//  $consulta->consulta($sql);
//  $sql = "INSERT INTO `cuponescampus` (
// `id` ,
// `cupon` ,
// `valor` ,
// `descripcion` ,
// `campus` ,
// `total` ,
// `fecha`
// )
// VALUES (
// NULL , 'SANGREGORIO', '30', 'Cupon especial para los pertenecientes al club San gregorio', 'football', '30', NULL
// );";
 
//  $sql = "Select * from inscripcionesEnglish";

 
//  $sql = "INSERT INTO `cuponescampus` 
//  (`id`, `cupon`, `valor`, `descripcion`, `campus`, `total`, `fecha`) 
//  VALUES (NULL, \'SANGREGORIO\', \'30\', 
//  \'Cupon especial para los pertenecientes al club San gregorio\', \'football\', \'30\', NULL);";
//  $consulta->consulta($sql);
//  $sql = "CREATE TABLE IF NOT EXISTS `cuponescampus` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `cupon` varchar(255) NOT NULL,
//   `descripcion` varchar(255) NOT NULL,
//   `campus` varchar(255) NOT NULL,
//   `total` int(11) DEFAULT NULL,
//   `fecha` date DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//  $consulta->consulta($sql);
//  $sql = "ALTER TABLE `cuponescampus` ADD `valor` INT NOT NULL AFTER `cupon` ";
//  $consulta->consulta($sql);
 echo "<pre>";
  var_dump($consulta->resultados());
  echo "</pre>";
//  $sql = "
// INSERT INTO `paradasbus` (`ruta`, `sentido`, `numeroParada`, `nombreParada`, `campus`) VALUES
// ('1', 'Ida', 1, '08:15 - Avda. Cataluña ( Plaza Mozart)', 'football'),
// ('1', 'Ida', 2, '08:20 - Maria Zambrano / Leon Felipe ( Parada Bus )', 'football'),
// ('1', 'Ida', 3, '08:22 - Maria Zambrano / Pablo Ruiz Picasso ( Parada Bus )', 'football'),
// ('1', 'Ida', 4, '08:25 - Maria Zambrano ( Bar Orange )', 'football'),
// ('1', 'Ida', 5, '08:28 - Avda. Academia General Militar ( Parada San Juan )', 'football'),
// ('1', 'Ida', 6, '08:31 - Ciudad del Transporte ( Parada Bus Rotonda )', 'football'),
// ('1', 'Ida', 7, '08:45 - Zuera ( Escuelas Viejas )', 'football'),
// ('1', 'Ida', 8, '09:00 - Villanueva de Gállego ( Parada Bus Crta. Castejón )', 'football'),
// ('1', 'Ida', 9, '09:02 - Villanueva de Gállego ( Parada Bus Paseo )', 'football'),
// ('2', 'Ida', 1, '08:20 - Camino las Torres ( Polideportivo Alberto Maestro )', 'football'),
// ('2', 'Ida', 2, '08:23 - Camino las Torres ( Hotel Boston )', 'football'),
// ('2', 'Ida', 3, '08:25 - Camino las Torres / Tenor Fleta ( frente Colegio Agustinos )', 'football'),
// ('2', 'Ida', 4, '08:28 - Juan Pablo Bonet / L. Monzón ( Parada Bus )', 'football'),
// ('2', 'Ida', 5, '08:30 - Mariano Barbasán / Fernando el Católico ( Parada Bus )', 'football'),
// ('2', 'Ida', 6, '08:32 - Tomas Bretón / Avda. Valencia ( Parada Bus )', 'football'),
// ('2', 'Ida', 7, '08:36 - Avda. Navarra, 9 - 11', 'football'),
// ('2', 'Ida', 8, '08:40 - Plaza Europa ( Parada Bus )', 'football'),
// ('3', 'Ida', 1, '08:20 - Paseo Pamplona, 4 ( Parada Bus )', 'football'),
// ('3', 'Ida', 2, '08:23 - Avda. Gomez Laguna, 56', 'football'),
// ('3', 'Ida', 3, '08:25 - Avda. Gomez Laguna ( La Floresta )', 'football'),
// ('3', 'Ida', 4, '08:28 - Tomas Anzano ( Colegio La Salle )', 'football'),
// ('3', 'Ida', 5, '08:32 - Ronda Oliver ( Esq. Ibon Astun )', 'football'),
// ('3', 'Ida', 6, '08:35 - Torres de San Lamberto ( Parada Bus )', 'football'),
// ('1', 'Vuelta', 1, '18:49 - Avda. Cataluña ( Plaza Mozart)', 'football'),
// ('1', 'Vuelta', 2, '18:44 - Maria Zambrano / Leon Felipe ( Parada Bus )', 'football'),
// ('1', 'Vuelta', 3, '18:42 - Maria Zambrano / Pablo Ruiz Picasso ( Parada Bus )', 'football'),
// ('1', 'Vuelta', 4, '18:39 - Maria Zambrano ( Bar Orange )', 'football'),
// ('1', 'Vuelta', 5, '18:36 - Avda. Academia General Militar ( Parada San Juan )', 'football'),
// ('1', 'Vuelta', 6, '18:33 - Ciudad del Transporte ( Parada Bus Rotonda )', 'football'),
// ('1', 'Vuelta', 7, '18:19 - Zuera ( Escuelas Viejas )', 'football'),
// ('1', 'Vuelta', 8, '18:04 - Villanueva de Gállego ( Parada Bus Crta. Castejón )', 'football'),
// ('1', 'Vuelta', 9, '18:02 - Villanueva de Gállego ( Parada Bus Paseo )', 'football'),
// ('2', 'Vuelta', 1, '18:35 - Camino las Torres ( Polideportivo Alberto Maestro )', 'football'),
// ('2', 'Vuelta', 2, '18:38 - Camino las Torres ( Hotel Boston )', 'football'),
// ('2', 'Vuelta', 3, '18:40 - Camino las Torres / Tenor Fleta ( frente Colegio Agustinos )', 'football'),
// ('2', 'Vuelta', 4, '18:43 - Juan Pablo Bonet / L. Monzón ( Parada Bus )', 'football'),
// ('2', 'Vuelta', 5, '18:45 - Mariano Barbasán / Fernando el Católico ( Parada Bus )', 'football'),
// ('2', 'Vuelta', 6, '18:47 - Tomas Bretón / Avda. Valencia ( Parada Bus )', 'football'),
// ('2', 'Vuelta', 7, '18:51 - Avda. Navarra, 9 - 11', 'football'),
// ('2', 'Vuelta', 8, '18:55 - Plaza Europa ( Parada Bus )', 'football'),
// ('3', 'Vuelta', 1, '18:15 - Paseo Pamplona, 4 ( Parada Bus )', 'football'),
// ('3', 'Vuelta', 2, '18:18 - Avda. Gomez Laguna, 56', 'football'),
// ('3', 'Vuelta', 3, '18:20 - Avda. Gomez Laguna ( La Floresta )', 'football'),
// ('3', 'Vuelta', 4, '18:23 - Tomas Anzano ( Colegio La Salle )', 'football'),
// ('3', 'Vuelta', 5, '18:27 - Ronda Oliver ( Esq. Ibon Astun )', 'football'),
// ('3', 'Vuelta', 6, '18:30 - Torres de San Lamberto ( Parada Bus )', 'football');
//  ";
 //$sql = "ALTER TABLE  `paradasbus` CHANGE  `ruta`  `ruta` SET(  '1',  '2',  '3' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
 //$consulta->consulta($sql);
 //$sql = "Select * from paradasbus";
//  $sql = "UPDATE paradasbus SET campus =  'english'";
// $sql = 'ALTER TABLE  `inscripcionesEnglish` ADD  `webReferencia` VARCHAR( 255 ) NULL';
// $sql = 'ALTER TABLE  `inscripcionesEnglish` ADD  `conocido` VARCHAR( 255 ) NULL';
// $sql = 'ALTER TABLE  `inscripcionesEnglish` ADD  `localizador` VARCHAR( 255 ) NULL';
 
//  echo "<pre>";
//  var_dump($consulta->resultados());
//  echo "</pre>";
/**
 * Creamos la base de datos de paradasBus
 * @var unknown_type
 */
// $sql = "CREATE TABLE IF NOT EXISTS `paradasbus` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `ruta` set('1','2') NOT NULL,
//   `sentido` set('Ida','Vuelta') NOT NULL,
//   `numeroParada` int(11) NOT NULL,
//   `nombreParada` varchar(255) NOT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8";
// $sql = "INSERT INTO `paradasbus` (`id`, `ruta`, `sentido`, `numeroParada`, `nombreParada`) VALUES
// (1, '1', 'Ida', 1, 'Pº Sagasta, 53'),
// (2, '1', 'Ida', 2, 'Pº Sagasta, 3'),
// (3, '1', 'Ida', 3, 'Plz. Aragón (VIPS)'),
// (4, '1', 'Ida', 4, 'Coso, 56'),
// (5, '1', 'Ida', 5, 'C. Alierta, 12'),
// (6, '1', 'Ida', 6, 'C. Alierta / Cº Las Torres'),
// (7, '1', 'Ida', 7, 'C. Alierta, 44'),
// (8, '1', 'Ida', 8, 'Pº Colón / Ruiseñores'),
// (9, '1', 'Vuelta', 1, 'Pº Colón / Ruiseñores'),
// (10, '1', 'Vuelta', 2, 'Pº Sagasta, 53'),
// (11, '1', 'Vuelta', 3, 'Pº Sagasta, 3'),
// (12, '1', 'Vuelta', 4, 'Plz. Aragón (VIPS)'),
// (13, '1', 'Vuelta', 5, 'Coso, 56'),
// (14, '1', 'Vuelta', 6, 'C. Alierta, 12'),
// (15, '1', 'Vuelta', 7, 'C. Alierta / Cº Las Torres'),
// (16, '1', 'Vuelta', 8, 'C. Alierta, 44'),
// (17, '2', 'Ida', 1, 'Plz. Mozart'),
// (18, '2', 'Ida', 2, 'S. Allende / Avda. Academia Gral. Militar'),
// (19, '2', 'Ida', 3, 'Mª Zambrano (Bar Orange)'),
// (20, '2', 'Ida', 4, 'Gómez de Avellaneda, 55'),
// (21, '2', 'Ida', 5, 'Pº María Agustín, 7'),
// (22, '2', 'Ida', 6, 'Bingo Gran Vía'),
// (23, '2', 'Ida', 7, 'Plz. San Francisco'),
// (24, '2', 'Ida', 8, 'Condes de Aragón, 14'),
// (25, '2', 'Ida', 9, 'Gómez Laguna, 48'),
// (26, '2', 'Ida', 10, 'Avda. Ilustración, 12'),
// (27, '2', 'Vuelta', 1, 'Avda. Ilustración, 12'),
// (28, '2', 'Vuelta', 2, 'Gómez Laguna, 15'),
// (29, '2', 'Vuelta', 3, 'Condes de Aragón, 14'),
// (30, '2', 'Vuelta', 4, 'Plz. San Francisco'),
// (31, '2', 'Vuelta', 5, 'Fernando el Catolico, 5'),
// (32, '2', 'Vuelta', 6, 'Pº María Agustín (Edificio Ebrosa)'),
// (33, '2', 'Vuelta', 7, 'Mª Zambrano / Ildefonso M. Gil'),
// (34, '2', 'Vuelta', 8, 'Mª Zambrano (Bar Orange)'),
// (35, '2', 'Vuelta', 9, 'S. Allende / San Juan de la Peña'),
// (36, '2', 'Vuelta', 10, 'Plz. Mozart');";
// $sql = "CREATE TABLE IF NOT EXISTS `inscripcionesEnglish` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `nombreParticipante` varchar(255) NOT NULL,
//   `apellidosParticipante` varchar(255) NOT NULL,
//   `sexoParticipante` set('Masculino','Femenino') NOT NULL DEFAULT 'Masculino',
//   `fechaParticipante` date NOT NULL,
//   `direccionParticipante` varchar(255) NOT NULL,
//   `cpParticipante` varchar(10) NOT NULL,
//   `ciudadParticipante` varchar(255) NOT NULL,
//   `tel1Participante` varchar(45) NOT NULL,
//   `tel2Participante` varchar(45) DEFAULT NULL,
//   `emailParticipante` varchar(255) NOT NULL,
//   `colegioParticipante` varchar(255) NOT NULL,
//   `cursoParticipante` varchar(255) NOT NULL,
//   `hermanosParticipante` set('0','1','2','3','+3') NOT NULL DEFAULT '0',
//   `inglesParticipante` set('0','1','2','3','+3') NOT NULL DEFAULT '0',
//   `fotoParticipante` longblob,
//   `comentariosParticipante` text,
//   `nombreContacto` varchar(255) NOT NULL,
//   `apellidosContacto` varchar(255) NOT NULL,
//   `movilContacto` varchar(255) NOT NULL,
//   `alergiasMedicos` text,
//   `condicionesMedicos` text,
//   `tratamientoMedicos` text,
//   `DietaMedicos` text,
//   `nombrePadre` varchar(255) DEFAULT NULL,
//   `apellidosPadre` varchar(255) DEFAULT NULL,
//   `movilPadre` varchar(255) DEFAULT NULL,
//   `emailPadre` varchar(255) DEFAULT NULL,
//   `nombreMadre` varchar(255) DEFAULT NULL,
//   `apellidosMadre` varchar(255) DEFAULT NULL,
//   `movilMadre` varchar(255) DEFAULT NULL,
//   `emailMadre` varchar(255) DEFAULT NULL,
//   `semana1Campus` set('Si','No') NOT NULL DEFAULT 'No',
//   `semana2Campus` set('Si','No') NOT NULL DEFAULT 'No',
//   `semana3Campus` set('Si','No') NOT NULL DEFAULT 'No',
//   `semana4Campus` set('Si','No') NOT NULL DEFAULT 'No',
//   `servicioAutobus` set('Si','No') NOT NULL DEFAULT 'No',
//   `rutaIda` set('Ruta1','Ruta2') DEFAULT NULL,
//   `paradaIda` varchar(255) DEFAULT NULL,
//   `rutaVuelta` set('Ruta1','Ruta2') DEFAULT NULL,
//   `paradaVuelta` varchar(255) DEFAULT NULL,
//   `condicionesAceptadas` set('Si','No') DEFAULT 'No',
//   `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
// $sql = "Describe inscripcionesEnglish";
// $consulta->consulta($sql);
// var_dump( $consulta->resultados() );
// $sql = "ALTER TABLE  `inscripcionesEnglish` ADD  `tipoFotoParticipante` VARCHAR( 255 ) NULL AFTER  `fotoParticipante`";
// $consulta->consulta($sql);
// $sql = "ALTER TABLE  `inscripcionesEnglish` CHANGE  `rutaIda`  `rutaIda` SET(  'Ruta1',  'Ruta2',  'No' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
// CHANGE  `paradaIda`  `paradaIda` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
// CHANGE  `rutaVuelta`  `rutaVuelta` SET(  'Ruta1',  'Ruta2',  'No' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
// CHANGE  `paradaVuelta`  `paradaVuelta` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL'";
