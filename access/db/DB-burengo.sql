CREATE DATABASE  IF NOT EXISTS `bgo_database_site` 
USE `bgo_database_site`;
 
 
--
-- Table structure for table `bgo_active_years`
--

DROP TABLE IF EXISTS `bgo_active_years`;
 
CREATE TABLE `bgo_active_years` (
  `yr_id` int(11) NOT NULL AUTO_INCREMENT,
  `yr_str` int(11) NOT NULL,
  `yr_status` int(11) NOT NULL,
  PRIMARY KEY (`yr_id`),
  UNIQUE KEY `year_UNIQUE` (`yr_str`)
);
 
--
-- Dumping data for table `bgo_active_years`
--

LOCK TABLES `bgo_active_years` WRITE;
/*!40000 ALTER TABLE `bgo_active_years` DISABLE KEYS */;
INSERT INTO `bgo_active_years` VALUES (1,1975,0),(2,1976,0),(3,1977,0),(4,1978,0),(5,1979,0),(6,1980,0),(7,1981,0),(8,1982,0),(9,1983,0),(10,1984,0),(11,1985,0),(12,1986,0),(13,1987,0),(14,1988,0),(15,1989,0),(16,1990,0),(17,1991,0),(18,1992,0),(19,1993,0),(20,1994,0),(21,1995,1),(22,1996,1),(23,1997,1),(24,1998,1),(25,1999,1),(26,2000,1),(27,2001,1),(28,2002,1),(29,2003,1),(30,2004,1),(31,2005,1),(32,2006,1),(33,2007,1),(34,2008,1),(35,2009,1),(36,2010,1),(37,2011,1),(38,2012,1),(39,2013,1),(40,2014,1),(41,2015,1),(42,2016,1),(43,2017,1),(44,2018,1),(45,2019,1),(46,2020,1),(47,2021,1),(48,2022,0),(49,2023,0),(50,2024,0),(51,2025,0),(52,2026,0),(53,2027,0),(54,2028,0),(55,2029,0),(56,2030,0),(57,2031,0),(58,2032,0);
/*!40000 ALTER TABLE `bgo_active_years` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bgo_colores`
--

DROP TABLE IF EXISTS `bgo_colores`;
 
CREATE TABLE `bgo_colores` (
  `clrs_id` int(11) NOT NULL AUTO_INCREMENT,
  `clrs_name` varchar(45) NOT NULL,
  `clrs_status` int(11) NOT NULL,
  PRIMARY KEY (`clrs_id`),
  UNIQUE KEY `clrs_name_UNIQUE` (`clrs_name`)
);  
 

--
-- Dumping data for table `bgo_colores`
--
INSERT INTO `bgo_colores` VALUES (1,'Blanco',1);
 
--
-- Table structure for table `bgo_colores_int`
--

DROP TABLE IF EXISTS `bgo_colores_int`;
 
CREATE TABLE `bgo_colores_int` (
  `clrs_int_id` int(11) NOT NULL AUTO_INCREMENT,
  `clrs_int_name` varchar(45) NOT NULL,
  `clrs_int_status` int(11) NOT NULL,
  PRIMARY KEY (`clrs_int_id`),
  UNIQUE KEY `clrs_int_name_UNIQUE` (`clrs_int_name`)
);
 
--
-- Dumping data for table `bgo_colores_int`
-- 

INSERT INTO `bgo_colores_int` VALUES (1,'Negro',1),(2,'Gris',1);
 
--
-- Table structure for table `bgo_country`
--

DROP TABLE IF EXISTS `bgo_country`;

CREATE TABLE `bgo_country` (
  `cyid` varchar(2) NOT NULL,
  `cystr` varchar(100) NOT NULL,
  `cystatus` int(11) NOT NULL,
  PRIMARY KEY (`cyid`),
  UNIQUE KEY `cystr_UNIQUE` (`cystr`)
);
 

--
-- Dumping data for table `bgo_country`
--

LOCK TABLES `bgo_country` WRITE;
/*!40000 ALTER TABLE `bgo_country` DISABLE KEYS */;
INSERT INTO `bgo_country` VALUES ('ar','Argentina',1),('bo','Bolivia',1),('br','Brasil',1),('cl','Chile',1),('co','Colombia',1),('cr','Costa Rica',1),('cu','Cuba',1),('do','Dominicana',1),('ec','Ecuador',1),('gt','Guatemala',1),('hn','Honduras',1),('mx','Mexico',1),('ni','Nicaragua',1),('pa','Panama',1),('pe','Peru',1),('pr','Puerto Rico',1),('py','Paraguay',1),('sv','Salvador',1),('uy','Uruguay',1),('ve','Venezuela',1);
/*!40000 ALTER TABLE `bgo_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bgo_cpinfo`
--

DROP TABLE IF EXISTS `bgo_cpinfo`;
 
CREATE TABLE `bgo_cpinfo` (
  `cpcode` varchar(15) NOT NULL,
  `cpname` text,
  `cpemail` text,
  `cpaddr` text,
  `cpphone` text,
  `cpcountry` text,
  `paypal_code` text,
  PRIMARY KEY (`cpcode`)
);

--
-- Dumping data for table `bgo_cpinfo`
--
 
INSERT INTO `bgo_cpinfo` VALUES ('bgo','FRACA CI S.R.L.','infoburengo@gmail.com','Santiago de los Caballeros, República Domicana','(829) 268-0964','do','Ac87nE2RADPU10SpCPPzs7lsaHCwimpGPCETweXQ7tQ5owHaOasfaa21i8OwP7yQOh1PvZhp36axHUGE');
 
--
-- Table structure for table `bgo_currency`
--

DROP TABLE IF EXISTS `bgo_currency`;
 
CREATE TABLE `bgo_currency` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_code` varchar(45) NOT NULL,
  `cur_str` varchar(45) NOT NULL,
  `cur_sign` varchar(45) NOT NULL,
  `cur_cty` varchar(5) NOT NULL,
  `cur_status` int(11) NOT NULL,
  PRIMARY KEY (`cur_id`)
);
 
--
-- Dumping data for table `bgo_currency`
--

LOCK TABLES `bgo_currency` WRITE;
/*!40000 ALTER TABLE `bgo_currency` DISABLE KEYS */;
INSERT INTO `bgo_currency` VALUES (1,'DOP','Peso ','RD$','do',1),(2,'USD','Dolar ','US$','do',0),(3,'ARS','Peso','$','ar',1),(4,'BOB','Boliviano','Bs.','bo',1),(5,'BRL','Real Brasileño ','R$','br',1),(6,'CLP','Peso','$','cl',1),(7,'COP','Peso','$','co',1),(8,'CRC','Colon Costaricense','₡','cr',1),(9,'CUP','Peso Cubano','$','cu',1),(10,'CUC','Peso Cubano convertible','$','cu',1),(11,'ECS','Sucre','S/.','ec',1),(12,'GTQ','Quetzal','Q','gt',1),(13,'HNL','Lempira','L','hn',1),(14,'MXN','Peso ','$','mx',1),(15,'NIO','Cordoba Oro','C$','ni',1),(16,'PAB','Balboa','B/.','pa',1),(17,'PYG','Guarani','₲','py',1),(18,'PEN','Nuevo Sol','S/.','pe',1),(19,'USD','Dolar','US$','pr',1),(20,'USD','Dolar','US$','sv',1),(21,'UYU','Peso','$','uy',1),(22,'VEF','Bolivar Fuerte','Bs F','ve',1),(23,'USD','Dolar','$','ar',1),(24,'SOL','Soles','$','ar',1),(25,'USD','Dolar','$','uy',1);
/*!40000 ALTER TABLE `bgo_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bgo_fuel`
--

DROP TABLE IF EXISTS `bgo_fuel`;
 
CREATE TABLE `bgo_fuel` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fstr` varchar(45) NOT NULL,
  `fstatus` int(11) NOT NULL,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `fstr_UNIQUE` (`fstr`)
);
 
--
-- Dumping data for table `bgo_fuel`
--
INSERT INTO `bgo_fuel` VALUES (1,'Gasolina',1),(2,'GLP/Gas',1),(3,'Diessel / Gasoil ',1);
 

--
-- Table structure for table `bgo_innercategoires`
--

DROP TABLE IF EXISTS `bgo_innercategoires`;
 
CREATE TABLE `bgo_innercategoires` (
  `inncat` int(11) NOT NULL AUTO_INCREMENT,
  `inncat_name` varchar(45) NOT NULL,
  `inncat_type` int(11) NOT NULL,
  `inncat_status` int(11) NOT NULL,
  PRIMARY KEY (`inncat`),
  UNIQUE KEY `inncat_name_UNIQUE` (`inncat_name`)
);

--
-- Dumping data for table `bgo_innercategoires`
--

LOCK TABLES `bgo_innercategoires` WRITE;
 
INSERT INTO `bgo_innercategoires` VALUES (1,'Sedan',1,1),(2,'Jeepeta',1,1),(3,'Camioneta',1,1),(4,'Limosinas',1,1),(5,'Coupe/Sport',1,1),(6,'Motores',1,1),(7,'Autobuses',1,1),(8,'Barcos',1,1),(9,'Jetski',1,1),(10,'Camiones',1,1),(11,'V. Pesados',1,1),(12,'Otros',1,1),(13,'Casas',2,1),(14,'Apartamentos',2,1),(15,'Villas',2,1),(16,'Solares',2,1),(17,'Fincas',2,1),(18,'Naves',2,1),(19,'Oficinas',2,1),(20,'Edificios',2,1),(21,'Penthouse',2,1),(22,'Local Comercial',2,1),(23,'Salon Eventos',2,1),(24,'Otros Inmuebles',2,1);
 
--
-- Table structure for table `bgo_mail_server`
--

DROP TABLE IF EXISTS `bgo_mail_server`;
 
CREATE TABLE `bgo_mail_server` (
  `site_code` varchar(10) NOT NULL,
  `mail_host` text NOT NULL,
  `mail_port` text NOT NULL,
  `mail_user` text NOT NULL,
  `mail_pass` text NOT NULL,
  PRIMARY KEY (`site_code`)
);

--
-- Dumping data for table `bgo_mail_server`
--

INSERT INTO `bgo_mail_server` VALUES ('bgo','smtp.ionos.com','587','info@burengo.com','Burengo123321@');
 
--
-- Table structure for table `bgo_marcas_vehiculos`
--

DROP TABLE IF EXISTS `bgo_marcas_vehiculos`;

CREATE TABLE `bgo_marcas_vehiculos` (
  `mv_id` int(11) NOT NULL AUTO_INCREMENT,
  `mv_marca` varchar(45) NOT NULL,
  `mv_status` int(11) NOT NULL,
  PRIMARY KEY (`mv_id`),
  UNIQUE KEY `mv_marca_UNIQUE` (`mv_marca`)
);

--
-- Dumping data for table `bgo_marcas_vehiculos`
--
 
INSERT INTO `bgo_marcas_vehiculos` VALUES (1,'Acura',1),(2,'Nissan',1),(3,'Ford',1),(4,'Infiniti',1),(5,'Honda',1),(6,'Hyndai',1),(7,'Jeep',1),(8,'Kia',1),(9,'Mazda',1),(10,'Mitsubishi',1),(11,'Peugeot',1),(12,'Pontiac',1),(13,'Subaru',1),(14,'Toyota',1),(15,'Volkswagen ',1),(16,'Super Gato',1),(17,'CG',1),(18,'ZUSUKI',1),(19,'TESLA',1),(20,'BMW',1),(21,'SHANAIG',1);
 
--
-- Table structure for table `bgo_modelos_vehiculos`
--

DROP TABLE IF EXISTS `bgo_modelos_vehiculos`;
 
CREATE TABLE `bgo_modelos_vehiculos` (
  `mvd_id` int(11) NOT NULL AUTO_INCREMENT,
  `mvd_marca` int(11) NOT NULL,
  `mvd_modelo` varchar(45) NOT NULL,
  `mvd_status` int(11) NOT NULL,
  PRIMARY KEY (`mvd_id`),
  UNIQUE KEY `mvd_modelo_UNIQUE` (`mvd_modelo`)
);

--
-- Dumping data for table `bgo_modelos_vehiculos`
--

INSERT INTO `bgo_modelos_vehiculos` VALUES (1,8,'Civic',1),(2,5,'Accord',1),(3,14,'Corolla',1),(4,14,'Camry',1),(5,14,'Hilux',1),(6,16,'CG-3000',1),(7,6,'Sonata N20',1),(8,7,'Grand Cherokee',1),(9,7,'Liberty',1),(10,6,'Sonata SE',1),(11,3,'Focus ',1),(12,3,'Escape',1),(13,6,'Tucson',1),(14,2,'March',1),(17,19,'Noruego',1);
 
--
-- Table structure for table `bgo_msg`
--

DROP TABLE IF EXISTS `bgo_msg`;
 
CREATE TABLE `bgo_msg` (
  `msgid` varchar(45) NOT NULL,
  `replyto` text NOT NULL,
  `usrfrom` varchar(45) NOT NULL,
  `usrto` varchar(45) NOT NULL,
  `toemail` text NOT NULL,
  `msgtext` text NOT NULL,
  `msgpost` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`msgid`)
);
 
--
-- Table structure for table `bgo_places`
--

DROP TABLE IF EXISTS `bgo_places`;
 
CREATE TABLE `bgo_places` (
  `pcid` int(11) NOT NULL AUTO_INCREMENT,
  `pcstr` varchar(45) NOT NULL,
  `pcountry` varchar(2) NOT NULL,
  `pcstatus` int(11) NOT NULL,
  PRIMARY KEY (`pcid`)
);
 
--
-- Dumping data for table `bgo_places`
--

LOCK TABLES `bgo_places` WRITE;
 
INSERT INTO `bgo_places` VALUES (1,'Santo Domingo','do',1),(2,'Santiago','do',1),(3,'Azua','do',1),(4,'Bani','do',1),(5,'Barahona','do',1),(6,'Bonao','do',1),(7,'Dajabon','do',1),(8,'Distrito Nacional','do',1),(9,'Duarte','do',1),(10,'El Seibo','do',1),(11,'Espaillat','do',1),(12,'Hato Mayor','do',1),(13,'Hermanas Mirabal','do',1),(14,'Higuey','do',1),(15,'Jarabacoa','do',1),(16,'La Romana','do',1),(17,'La Vega','do',1),(18,'Maria Trinidad Sanchez','do',1),(19,'Monte Cristi','do',1),(20,'Monte Plata','do',1),(21,'Puerto Plata','do',1),(22,'Salcedo','do',1),(23,'Samana','do',1),(24,'San Cristobal','do',1),(25,'San Jose De Ocoa','do',1),(26,'San Juan de la Maguana','do',1),(27,'San Pedro de Macoris','do',1),(28,'Sanchez Ramirez','do',1),(29,'Santiago Rodriguez','do',1),(30,'Valverde Mao','do',1),(31,'Buenos Aires','ar',1),(32,'Catamarca','ar',1),(33,'Chaco','ar',1),(34,'Chubut','ar',1),(35,'Córdoba','ar',1),(36,'Corrientes','ar',1),(37,'Entre Ríos','ar',1),(38,'Formosa','ar',1),(39,'Jujuy','ar',1),(40,'La Pampa','ar',1),(41,'La Rioja','ar',1),(42,'Mendoza','ar',1),(43,'Misiones','ar',1),(44,'Neuquén','ar',1),(45,'Río Negro','ar',1),(46,'Salta','ar',1),(47,'San Juan','ar',1),(48,'San Luis','ar',1),(49,'Santa Cruz','ar',1),(50,'Santa Fe','ar',1),(51,'Santiago del Estero','ar',1),(52,'Tucumán','ar',1),(53,'Adjuntas','pr',1),(54,'Aguada','pr',1),(55,'Aguadilla','pr',1),(56,'Aguas Buenas','pr',1),(57,'Aibonito','pr',1),(58,'Añasco','pr',1),(59,'Arecibo','pr',1),(60,'Arroyo','pr',1),(61,'Barceloneta','pr',1),(62,'Barranquitas','pr',1),(63,'Bayamón','pr',1),(64,'Cabo Rojo','pr',1),(65,'Caguas','pr',1),(66,'Camuy','pr',1),(67,'Canóvanas','pr',1),(68,'Carolina','pr',1),(69,'Cataño','pr',1),(70,'Cayey','pr',1),(71,'Ceiba','pr',1),(72,'Ciales','pr',1),(73,'Cidra','pr',1),(74,'Coamo','pr',1),(75,'Comerío','pr',1),(76,'Corozal','pr',1),(77,'Culebra (Isla municipio)','pr',1),(78,'Dorado','pr',1),(79,'Fajardo','pr',1),(80,'Florida','pr',1),(81,'Guánica','pr',1),(82,'Guayama','pr',1),(83,'Guayanilla','pr',1),(84,'Guaynabo','pr',1),(85,'Gurabo','pr',1),(86,'Hatillo','pr',1),(87,'Hormigueros','pr',1),(88,'Humacao','pr',1),(89,'Isabela','pr',1),(90,'Jayuya','pr',1),(91,'Juana Díaz','pr',1),(92,'Juncos','pr',1),(93,'Lajas','pr',1),(94,'Lares','pr',1),(95,'Las Marías','pr',1),(96,'Las Piedras','pr',1),(97,'Loíza','pr',1),(98,'Luquillo','pr',1),(99,'Manatí','pr',1),(100,'Maricao','pr',1),(101,'Maunabo','pr',1),(102,'Mayagüez','pr',1),(103,'Moca','pr',1),(104,'Morovis','pr',1),(105,'Naguabo','pr',1),(106,'Naranjito','pr',1),(107,'Orocovis','pr',1),(108,'Patillas','pr',1),(109,'Peñuelas','pr',1),(110,'Ponce','pr',1),(111,'Quebradillas','pr',1),(112,'Rincón','pr',1),(113,'Río Grande','pr',1),(114,'Sabana Grande','pr',1),(115,'Salinas','pr',1),(116,'San Germán','pr',1),(117,'San Juan','pr',1),(118,'San Lorenzo','pr',1),(119,'San Sebastián','pr',1),(120,'Santa Isabel','pr',1),(121,'Toa Alta','pr',1),(122,'Toa Baja','pr',1),(123,'Trujillo Alto','pr',1),(124,'Utuado','pr',1),(125,'Vega Alta','pr',1),(126,'Vega Baja','pr',1),(127,'Vieques (Isla municipio)','pr',1),(128,'Villalba','pr',1),(129,'Yabucoa','pr',1),(130,'Yauco','pr',1),(131,'Departamento del Beni','bo',1),(132,'Provincia de Cercado (Beni)','bo',1),(133,'Provincia de Iténez','bo',1),(134,'Provincia del General José Ballivián Segurola','bo',1),(135,'Provincia de Mamoré','bo',1),(136,'Provincia de Marbán','bo',1),(137,'Provincia de Moxos','bo',1),(138,'Provincia de Vaca Díez','bo',1),(139,'Provincia de Yacuma','bo',1),(140,'Departamento de Chuquisaca','bo',1),(141,'Provincia de Belisario Boeto','bo',1),(142,'Provincia de Hernando Siles','bo',1),(143,'Provincia de Jaime Zudáñez','bo',1),(144,'Provincia de Juana Azurduy de Padilla','bo',1),(145,'Provincia de Luis Calvo','bo',1),(146,'Provincia de Nor Cinti','bo',1),(147,'Provincia de Oropeza','bo',1),(148,'Provincia de Sud Cinti','bo',1),(149,'Provincia de Tomina','bo',1),(150,'Provincia de Yamparáez','bo',1),(151,'Departamento de Cochabamba','bo',1),(152,'Provincia de Arani','bo',1),(153,'Provincia de Arque','bo',1),(154,'Provincia de Ayopaya','bo',1),(155,'Provincia de Bolívar (Bolivia)','bo',1),(156,'Provincia de Capinota','bo',1),(157,'Provincia de José Carrasco','bo',1),(158,'Provincia de Cercado (Cochabamba)','bo',1),(159,'Provincia del Chapare','bo',1),(160,'Provincia de Esteban Arze','bo',1),(161,'Provincia de Germán Jordán','bo',1),(162,'Provincia de Mizque','bo',1),(163,'Provincia de Campero','bo',1),(164,'Provincia de Punata','bo',1),(165,'Provincia de Quillacollo','bo',1),(166,'Provincia de Tapacarí','bo',1),(167,'Provincia de Tiraque','bo',1),(168,'Departamento de La Paz','bo',1),(169,'Provincia de Abel Iturralde','bo',1),(170,'Provincia de Aroma','bo',1),(171,'Provincia de Bautista Saavedra','bo',1),(172,'Provincia de Caranavi','bo',1),(173,'Provincia de Eliodoro Camacho','bo',1),(174,'Provincia de Franz Tamayo','bo',1),(175,'Provincia de Gualberto Villarroel','bo',1),(176,'Provincia de Ingavi','bo',1),(177,'Provincia de Inquisivi','bo',1),(178,'Provincia del General José Manuel Pando','bo',1),(179,'Provincia de José Ramón Loayza','bo',1),(180,'Provincia de Larecaja','bo',1),(181,'Provincia de Los Andes (Bolivia)','bo',1),(182,'Provincia de Manco Kapac','bo',1),(183,'Provincia de Muñecas','bo',1),(184,'Provincia de Nor Yungas','bo',1),(185,'Provincia de Omasuyos','bo',1),(186,'Provincia de Pacajes','bo',1),(187,'Provincia de Pedro Domingo Murillo','bo',1),(188,'Provincia de Sud Yungas','bo',1),(189,'Departamento de Oruro','bo',1),(190,'Provincia de Sabaya','bo',1),(191,'Provincia de Carangas','bo',1),(192,'Provincia de Cercado (Oruro)','bo',1),(193,'Provincia de Eduardo Abaroa','bo',1),(194,'Provincia de Ladislao Cabrera','bo',1),(195,'Provincia de Litoral de Atacama','bo',1),(196,'Provincia de Nor Carangas','bo',1),(197,'Provincia de Pantaleón Dalence','bo',1),(198,'Provincia de Poopó','bo',1),(199,'Provincia de Mejillones','bo',1),(200,'Provincia de Sajama','bo',1),(201,'Provincia de San Pedro de Totora','bo',1),(202,'Provincia de Saucarí','bo',1),(203,'Provincia de Sebastián Pagador','bo',1),(204,'Provincia de Sud Carangas','bo',1),(205,'Provincia de Tomás Barrón','bo',1),(206,'Departamento de Pando','bo',1),(207,'Provincia de Abuná','bo',1),(208,'Provincia del General Federico Román','bo',1),(209,'Provincia de Madre de Dios','bo',1),(210,'Provincia de Manuripi','bo',1),(211,'Provincia de Nicolás Suárez','bo',1),(212,'Departamento de Potosí','bo',1),(213,'Provincia de Alonso de Ibáñez','bo',1),(214,'Provincia de Antonio Quijarro','bo',1),(215,'Provincia de Bernardino Bilbao','bo',1),(216,'Provincia de Charcas (Potosí)','bo',1),(217,'Provincia de Chayanta','bo',1),(218,'Provincia de Cornelio Saavedra','bo',1),(219,'Provincia de Daniel Campos','bo',1),(220,'Provincia de Enrique Baldivieso','bo',1),(221,'Provincia de José María Linares','bo',1),(222,'Provincia de Modesto Omiste','bo',1),(223,'Provincia de Nor Chichas','bo',1),(224,'Provincia de Nor Lípez','bo',1),(225,'Provincia de Rafael Bustillo','bo',1),(226,'Provincia de Sud Chichas','bo',1),(227,'Provincia de Sud Lípez','bo',1),(228,'Provincia de Tomás Frías','bo',1),(229,'Departamento de Santa Cruz','bo',1),(230,'Provincia de Andrés Ibáñez','bo',1),(231,'Provincia de Ángel Sandóval','bo',1),(232,'Provincia de Chiquitos','bo',1),(233,'Provincia de Cordillera (Bolivia)','bo',1),(234,'Provincia de Florida','bo',1),(235,'Provincia de Germán Busch','bo',1),(236,'Provincia de Guarayos','bo',1),(237,'Provincia de Ichilo','bo',1),(238,'Provincia de Warnes','bo',1),(239,'Provincia de Velasco','bo',1),(240,'Provincia de Caballero','bo',1),(241,'Provincia de Ñuflo de Chaves','bo',1),(242,'Provincia de Obispo Santistevan','bo',1),(243,'Provincia de Sara','bo',1),(244,'Provincia de Vallegrande','bo',1),(245,'Departamento de Tarija','bo',1),(246,'Provincia de Aniceto Arce','bo',1),(247,'Provincia de Burdet O Connor','bo',1),(248,'Provincia de Cercado (Tarija)','bo',1),(249,'Provincia de Eustaquio Méndez','bo',1),(250,'Provincia del Gran Chaco','bo',1),(251,'Provincia de José María Avilés','bo',1),(252,'Lago Titicaca','bo',1),(253,'Provincia de Alagoas','br',1),(254,'Provincia de Amazonas','br',1),(255,'Provincia de Bahía','br',1),(256,'Provincia de Ceará','br',1),(257,'Provincia Cisplatina','br',1),(258,'Provincia de Espírito Santo','br',1),(259,'Provincia de Goiás','br',1),(260,'Provincia del Gran Pará','br',1),(261,'Provincia de Maranhão','br',1),(262,'Provincia de Mato Grosso','br',1),(263,'Provincia de Minas Gerais','br',1),(264,'Provincia de Paraná','br',1),(265,'Provincia de Paraíba','br',1),(266,'Provincia de Pernambuco','br',1),(267,'Provincia de Piauí','br',1),(268,'Provincia de Río de Janeiro','br',1),(269,'Provincia de Río Grande del Norte','br',1),(270,'Provincia de Río Grande del Sur','br',1),(271,'Provincia de Santa Catarina','br',1),(272,'Provincia de São Paulo','br',1),(273,'Provincia de Sergipe','br',1),(274,'Municipio Neutro','br',1),(275,'Provincia de Arica','cl',1),(276,'Provincia de Parinacota','cl',1),(277,'Provincia de Iquique','cl',1),(278,'Provincia del Tamarugal','cl',1),(279,'Provincia de Tocopilla','cl',1),(280,'Provincia de El Loa','cl',1),(281,'Provincia de Antofagasta','cl',1),(282,'Provincia de Chañaral','cl',1),(283,'Provincia de Copiapó','cl',1),(284,'Provincia de Huasco','cl',1),(285,'Provincia de Elqui','cl',1),(286,'Provincia de Limarí','cl',1),(287,'Provincia de Choapa','cl',1),(288,'Provincia de Petorca','cl',1),(289,'Provincia de Los Andes','cl',1),(290,'Provincia de San Felipe de Aconcagua','cl',1),(291,'Provincia de Quillota','cl',1),(292,'Provincia de Valparaíso','cl',1),(293,'Provincia de San Antonio','cl',1),(294,'Provincia de Isla de Pascua','cl',1),(295,'Provincia de Marga Marga','cl',1),(296,'Provincia de Chacabuco','cl',1),(297,'Provincia de Santiago','cl',1),(298,'Provincia de Cordillera','cl',1),(299,'Provincia de Maipo','cl',1),(300,'Provincia de Melipilla','cl',1),(301,'Provincia de Talagante','cl',1),(302,'Provincia de Cachapoal','cl',1),(303,'Provincia de Colchagua','cl',1),(304,'Provincia Cardenal Caro','cl',1),(305,'Provincia de Curicó','cl',1),(306,'Provincia de Talca','cl',1),(307,'Provincia de Linares','cl',1),(308,'Provincia de Cauquenes','cl',1),(309,'Provincia de Diguillín','cl',1),(310,'Provincia de Itata','cl',1),(311,'Provincia de Punilla','cl',1),(312,'Provincia de Biobío','cl',1),(313,'Provincia de Concepción','cl',1),(314,'Provincia de Arauco','cl',1),(315,'Provincia de Malleco','cl',1),(316,'Provincia de Cautín','cl',1),(317,'Provincia de Valdivia','cl',1),(318,'Provincia del Ranco','cl',1),(319,'Provincia de Osorno','cl',1),(320,'Provincia de Llanquihue','cl',1),(321,'Provincia de Chiloé','cl',1),(322,'Provincia de Palena','cl',1),(323,'Provincia de Coyhaique','cl',1),(324,'Provincia de Aysén','cl',1),(325,'Provincia General Carrera','cl',1),(326,'Provincia Capitán Prat','cl',1),(327,'Provincia de Última Esperanza','cl',1),(328,'Provincia de Magallanes','cl',1),(329,'Provincia de Tierra del Fuego','cl',1),(330,'Provincia de la Antártica Chilena','cl',1),(331,'Leticia','co',1),(332,'Caucasia','co',1),(333,'Puerto Berrío','co',1),(334,'Segovia','co',1),(335,'Santa Rosa de Osos','co',1),(336,'Santa Fe de Antioquia','co',1),(337,'Rionegro','co',1),(338,'Andes','co',1),(339,'Apartadó','co',1),(340,'Medellín','co',1),(341,'Arauca','co',1),(342,'Sabanalarga','co',1),(343,'Barranquilla','co',1),(344,'Luruaco','co',1),(345,'Suan','co',1),(346,'Bogotá','co',1),(347,'Santa Cruz de Mompox','co',1),(348,'Cartagena de Indias','co',1),(349,'Barranco de Loba','co',1),(350,'Santa Rosa del Sur','co',1),(351,'Magangué','co',1),(352,'El Carmen de Bolívar','co',1),(353,'Tunja','co',1),(354,'Cubará','co',1),(355,'El Cocuy','co',1),(356,'Labranzagrande','co',1),(357,'Miraflores','co',1),(358,'Puerto Boyacá','co',1),(359,'Ramiriquí','co',1),(360,'Garagoa','co',1),(361,'Soatá','co',1),(362,'Chiquinquirá','co',1),(363,'Guateque','co',1),(364,'Moniquirá','co',1),(365,'Sogamoso','co',1),(366,'Duitama','co',1),(367,'Socha','co',1),(368,'Riosucio','co',1),(369,'Pensilvania','co',1),(370,'Anserma','co',1),(371,'Manizales','co',1),(372,'La Dorada','co',1),(373,'Salamina','co',1),(374,'Florencia','co',1),(375,'Yopal','co',1),(376,'Popayán','co',1),(377,'Santander de Quilichao','co',1),(378,'Guapí','co',1),(379,'Páez','co',1),(380,'Sucre','co',1),(381,'Curumaní','co',1),(382,'Bosconia','co',1),(383,'Valledupar','co',1),(384,'Aguachica','co',1),(385,'Quibdó','co',1),(386,'Riosucio','co',1),(387,'Bahía Solano','co',1),(388,'Alto Baudó','co',1),(389,'Istmina','co',1),(390,'Tierralta','co',1),(391,'Santa Cruz de Lorica','co',1),(392,'Montería','co',1),(393,'San Antero','co',1),(394,'Cereté','co',1),(395,'Sahagún','co',1),(396,'Montelíbano','co',1),(397,'Chocontá','co',1),(398,'Girardot','co',1),(399,'Guaduas','co',1),(400,'Villeta','co',1),(401,'Gachetá','co',1),(402,'San Juan de Rioseco','co',1),(403,'Medina','co',1),(404,'Cáqueza','co',1),(405,'Pacho','co',1),(406,'Zipaquirá','co',1),(407,'Facatativá','co',1),(408,'Soacha','co',1),(409,'Fusagasugá','co',1),(410,'La Mesa','co',1),(411,'Ubaté','co',1),(412,'Inírida','co',1),(413,'San José del Guaviare','co',1),(414,'Garzón','co',1),(415,'Neiva','co',1),(416,'La Plata','co',1),(417,'Pitalito','co',1),(418,'Riohacha','co',1),(419,'San Juan del Cesar','co',1),(420,'Plato','co',1),(421,'Ciénaga','co',1),(422,'Pivijay','co',1),(423,'Santa Marta','co',1),(424,'El Banco','co',1),(425,'Granada','co',1),(426,'Villavicencio','co',1),(427,'Acacías','co',1),(428,'Puerto López','co',1),(429,'La Unión','co',1),(430,'Ipiales','co',1),(431,'Pasto','co',1),(432,'Tumaco','co',1),(433,'Túquerres','co',1),(434,'Salazar de Las Palmas','co',1),(435,'Tibú','co',1),(436,'Ocaña','co',1),(437,'Cúcuta','co',1),(438,'Pamplona','co',1),(439,'Chinácota','co',1),(440,'Mocoa','co',1),(441,'Armenia','co',1),(442,'Génova','co',1),(443,'Filandia','co',1),(444,'Circasia','co',1),(445,'La Tebaida','co',1),(446,'Belén de Umbría','co',1),(447,'Pereira','co',1),(448,'Mistrató','co',1),(449,'San Andrés','co',1),(450,'El Socorro','co',1),(451,'Málaga','co',1),(452,'San Gil','co',1),(453,'Barrancabermeja','co',1),(454,'Bucaramanga','co',1),(455,'Vélez','co',1),(456,'Majagual','co',1),(457,'Sincelejo','co',1),(458,'Tolú','co',1),(459,'Corozal','co',1),(460,'San Marcos','co',1),(461,'Ibagué','co',1),(462,'Líbano','co',1),(463,'Honda','co',1),(464,'Melgar','co',1),(465,'Chaparral','co',1),(466,'Purificación','co',1),(467,'Tuluá','co',1),(468,'Cartago','co',1),(469,'Buenaventura','co',1),(470,'Sevilla','co',1),(471,'Cali','co',1),(472,'Mitú','co',1),(473,'Puerto Carreño','co',1),(474,'San José','cr',1),(475,'Alajuela','cr',1),(476,'Cartago','cr',1),(477,'Heredia','cr',1),(478,'Guanacaste','cr',1),(479,'Puntarenas','cr',1),(480,'Limón','cr',1),(481,'Pinar del Río','cu',1),(482,'Artemisa','cu',1),(483,'La Habana','cu',1),(484,'Mayabeque','cu',1),(485,'Matanzas','cu',1),(486,'Cienfuegos','cu',1),(487,'Villa Clara','cu',1),(488,'Sancti Spíritus','cu',1),(489,'Ciego de Ávila','cu',1),(490,'Camagüey','cu',1),(491,'Las Tunas','cu',1),(492,'Holguín','cu',1),(493,'Granma','cu',1),(494,'Santiago de Cuba','cu',1),(495,'Guantánamo','cu',1),(496,'Isla de la Juventud','cu',1),(497,'Azuay','ec',1),(498,'Bolívar','ec',1),(499,'Cañar','ec',1),(500,'Carchi','ec',1),(501,'Chimborazo','ec',1),(502,'Cotopaxi','ec',1),(503,'El Oro','ec',1),(504,'Esmeraldas','ec',1),(505,'Galápagos','ec',1),(506,'Guayas','ec',1),(507,'Imbabura','ec',1),(508,'Loja','ec',1),(509,'Los Ríos','ec',1),(510,'Manabí','ec',1),(511,'Morona Santiago','ec',1),(512,'Napo','ec',1),(513,'Orellana','ec',1),(514,'Pastaza','ec',1),(515,'Pichincha','ec',1),(516,'Santa Elena','ec',1),(517,'Santo Domingo de los Tsáchilas','ec',1),(518,'Sucumbíos','ec',1),(519,'Tungurahua','ec',1),(520,'Zamora Chinchipe','ec',1),(521,'Alta Verapaz','gt',1),(522,'Baja Verapaz','gt',1),(523,'Chimaltenango','gt',1),(524,'Chiquimula','gt',1),(525,'El Progreso','gt',1),(526,'Escuintla','gt',1),(527,'Guatemala','gt',1),(528,'Huehuetenango','gt',1),(529,'Izabal','gt',1),(530,'Jalapa','gt',1),(531,'Jutiapa','gt',1),(532,'Petén','gt',1),(533,'Quetzaltenango','gt',1),(534,'Quiché','gt',1),(535,'Retalhuleu','gt',1),(536,'Sacatepéquez','gt',1),(537,'San Marcos','gt',1),(538,'Santa Rosa','gt',1),(539,'Sololá','gt',1),(540,'Suchitepéquez','gt',1),(541,'Totonicapán','gt',1),(542,'Zacapa','gt',1),(543,'Atlántida','hn',1),(544,'Colón','hn',1),(545,'Comayagua','hn',1),(546,'Copán','hn',1),(547,'Cortés','hn',1),(548,'Choluteca','hn',1),(549,'El Paraíso','hn',1),(550,'Francisco Morazán','hn',1),(551,'Gracias a Dios','hn',1),(552,'Intibucá','hn',1),(553,'Islas de la Bahía','hn',1),(554,'La Paz','hn',1),(555,'Lempira','hn',1),(556,'Ocotepeque','hn',1),(557,'Olancho','hn',1),(558,'Santa Bárbara','hn',1),(559,'Valle','hn',1),(560,'Yoro','hn',1),(561,'Aguascalientes','mx',1),(562,'Baja California','mx',1),(563,'Baja California Sur','mx',1),(564,'Campeche','mx',1),(565,'Coahuila de Zaragoza','mx',1),(566,'Colima','mx',1),(567,'Chiapas','mx',1),(568,'Chihuahua','mx',1),(569,'Distrito Federal','mx',1),(570,'Durango','mx',1),(571,'Guanajuato','mx',1),(572,'Guerrero','mx',1),(573,'Hidalgo','mx',1),(574,'Jalisco','mx',1),(575,'México','mx',1),(576,'Michoacán de Ocampo','mx',1),(577,'Morelos','mx',1),(578,'Nayarit','mx',1),(579,'Nuevo León','mx',1),(580,'Oaxaca','mx',1),(581,'Puebla','mx',1),(582,'Querétaro','mx',1),(583,'Quintana Roo','mx',1),(584,'San Luis Potosí','mx',1),(585,'Sinaloa','mx',1),(586,'Sonora','mx',1),(587,'Tabasco','mx',1),(588,'Tamaulipas','mx',1),(589,'Tlaxcala','mx',1),(590,'Veracruz de Ignacio de la Llave','mx',1),(591,'Yucatán','mx',1),(592,'Zacatecas','mx',1),(593,'Managua','ni',1),(594,'Masaya','ni',1),(595,'León','ni',1),(596,'Granada','ni',1),(597,'Carazo','ni',1),(598,'Estelí','ni',1),(599,'Rivas','ni',1),(600,'Chinandega','ni',1),(601,'Chontales','ni',1),(602,'Madriz','ni',1),(603,'Matagalpa','ni',1),(604,'Nueva Segovia','ni',1),(605,'Boaco','ni',1),(606,'Río San Juan','ni',1),(607,'Costa Caribe Sur','ni',1),(608,'Jinotega','ni',1),(609,'Costa Caribe Norte','ni',1);
 
--
-- Table structure for table `bgo_planes`
--

DROP TABLE IF EXISTS `bgo_planes`;

CREATE TABLE `bgo_planes` (
  `planid` int(11) NOT NULL AUTO_INCREMENT,
  `planname` varchar(45) NOT NULL,
  `planprice` float NOT NULL,
  `plancurrency` text NOT NULL,
  `planduration` int(11) NOT NULL,
  `planstatus` int(11) NOT NULL,
  `planmaxp` int(11) NOT NULL,
  `planmaxf` int(11) NOT NULL,
  `plantypo` int(11) NOT NULL,
  PRIMARY KEY (`planid`),
  UNIQUE KEY `plan-name_UNIQUE` (`planname`)
);

--
-- Dumping data for table `bgo_planes`
--

INSERT INTO `bgo_planes` VALUES (1,'Gratis',0,'USD',30,1,1,3,1),(2,'Premium #1',4.99,'USD',30,1,5,10,1),(3,'Premium #2',9.99,'USD',30,1,10,10,1),(4,'Premium Ilimitado',19.99,'USD',30,1,99999,10,1),(5,'1 Publicacion destacada',4.99,'USD',30,1,1,1,2),(6,'Destacadas Ilimitadas',14.99,'USD',30,1,99999,1,2),(7,'Expirado',0,'-',0,1,0,0,0);
 
--
-- Table structure for table `bgo_posts`
--

DROP TABLE IF EXISTS `bgo_posts`;

CREATE TABLE `bgo_posts` (
  `bgo_code` varchar(50) NOT NULL,
  `bgo_txdate` date NOT NULL,
  `bgo_txtime` time NOT NULL,
  `bgo_usercode` varchar(30) NOT NULL,
  `bgo_cat` int(11) NOT NULL,
  `bgo_subcat` int(11) NOT NULL,
  `bgo_title` text NOT NULL,
  `bgo_thumbnail` text,
  `bgo_comp_img` int(11) DEFAULT NULL,
  `bgo_price` decimal(10,0) NOT NULL,
  `bgo_lugar` text NOT NULL,
  `bgo_uom` text NOT NULL,
  `bgo_duedate` date DEFAULT NULL,
  `bgo_marca` text,
  `bgo_modelo` text,
  `bgo_year` int(11) DEFAULT NULL,
  `bgo_condicion` varchar(45) DEFAULT NULL,
  `bgo_currency` varchar(45) DEFAULT NULL,
  `bgo_fuel` varchar(45) DEFAULT NULL,
  `bgo_vtype` text,
  `bgo_transmision` text,
  `bgo_traccion` text,
  `bgo_color` text,
  `bgo_color_interior` text,
  `bgo_puertas_cantidad` int(11) DEFAULT NULL,
  `bgo_pasajeros_cantidad` int(11) DEFAULT NULL,
  `bgo_addr` text,
  `bgo_accesories` text,
  `bgo_notes` text,
  `bgo_construccion` varchar(45) DEFAULT NULL,
  `bgo_niveles` int(11) DEFAULT NULL,
  `bgo_rooms` int(11) DEFAULT NULL,
  `bgo_bath` float DEFAULT NULL,
  `bgo_parqueos` float DEFAULT NULL,
  `bgo_terreno` text,
  `bgo_tipolocal` text,
  `bgo_anio_construccion` int(11) DEFAULT NULL,
  `bgo_country_code` varchar(2) NOT NULL,
  `bgo_mapURL` text,
  `bgo_stdesc` int(11) NOT NULL,
  `bgo_status` int(11) NOT NULL,
  `bgo_extrapics` text,
  PRIMARY KEY (`bgo_code`)
);
 

DROP TABLE IF EXISTS `bgo_traccion_vehiculo`;

CREATE TABLE `bgo_traccion_vehiculo` (
  `tv_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_name` varchar(45) NOT NULL,
  `tv_shortcode` varchar(45) DEFAULT NULL,
  `tv_status` int(11) NOT NULL,
  PRIMARY KEY (`tv_id`),
  UNIQUE KEY `tv_name_UNIQUE` (`tv_name`)
);
 
--
-- Dumping data for table `bgo_traccion_vehiculo`
--
 
INSERT INTO `bgo_traccion_vehiculo` VALUES (1,'Delantera(FWD) ','FWD',1),(2,'Trasera(RWD)','RWD',1),(3,'Cuatro Gomas (AWD)','AWD',1),(4,'Cuatro Gomas  (4WD) ','4WD',1),(5,'4 X 4','4x4',1),(6,'8 X 8 MAX',NULL,0),(7,'Traccion sinc',NULL,0);
 
--
-- Table structure for table `bgo_transmision_vehiculo`
--

DROP TABLE IF EXISTS `bgo_transmision_vehiculo`;
 
CREATE TABLE `bgo_transmision_vehiculo` (
  `tsvid` int(11) NOT NULL AUTO_INCREMENT,
  `tsvstr` varchar(45) NOT NULL,
  `tsvstatus` int(11) NOT NULL,
  PRIMARY KEY (`tsvid`),
  UNIQUE KEY `tsvstr_UNIQUE` (`tsvstr`)
);

--
-- Dumping data for table `bgo_transmision_vehiculo`
--

LOCK TABLES `bgo_transmision_vehiculo` WRITE;
INSERT INTO `bgo_transmision_vehiculo` VALUES (1,'Automatica',1),(2,'Manual',1);

--
-- Table structure for table `bgo_user_plan`
--

DROP TABLE IF EXISTS `bgo_user_plan`;
 
CREATE TABLE `bgo_user_plan` (
  `up_uid` varchar(45) NOT NULL,
  `up_planid` int(11) NOT NULL,
  `up_planxtra` int(11) NOT NULL,
  `up_maxp` int(11) NOT NULL,
  `up_maxf` int(11) NOT NULL,
  `up_destacadas` int(11) DEFAULT NULL,
  `up_dest_expdate` date DEFAULT NULL,
  `up_expdate` date NOT NULL,
  `up_status` int(11) NOT NULL,
  PRIMARY KEY (`up_uid`)
);

--
-- Table structure for table `bgo_users`
--

DROP TABLE IF EXISTS `bgo_users`;
 
CREATE TABLE `bgo_users` (
  `uid` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `profile` int(11) NOT NULL,
  `img` text NOT NULL,
  `lastlogin` datetime NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addr` text NOT NULL,
  `provinvia` int(11) NOT NULL,
  `ced` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(85) NOT NULL,
  `bgo_whatsapp` text,
  `bgo_instagram` text,
  `bgo_facebook` text,
  `bgo_country` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `ced_UNIQUE` (`ced`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `user_UNIQUE` (`user`)
) ;

--
-- Dumping data for table `bgo_users`
--
 
INSERT INTO `bgo_users` VALUES ('U202002151837494884','administrator','admin','$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly',100,'user.png','2019-12-04 18:57:23','2020-04-17 17:28:57','N/A',2,'000-0000000-0','(000) 000-0000','admin@burengo.com','(000) 000-0000','-','-','all',1);

--
-- Table structure for table `bgo_visits`
--

DROP TABLE IF EXISTS `bgo_visits`;
 
CREATE TABLE `bgo_visits` (
  `vstid` int(11) NOT NULL AUTO_INCREMENT,
  `vstdate` date NOT NULL,
  `vst_post` text NOT NULL,
  PRIMARY KEY (`vstid`)
);

--
-- Table structure for table `bgo_whishlist`
--

DROP TABLE IF EXISTS `bgo_whishlist`;
 
CREATE TABLE `bgo_whishlist` (
  `FAVUID` varchar(45) NOT NULL,
  `FAVPID` varchar(45) NOT NULL,
  `FAVPN` text NOT NULL,
  `FAVPTH` text NOT NULL,
  `FAVDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`FAVUID`,`FAVPID`)
);