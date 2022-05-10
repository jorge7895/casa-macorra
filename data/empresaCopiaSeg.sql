-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: cocina
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.40-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Ibéricos'),(2,'Fritos'),(3,'Raciones'),(4,'Hamburguesas'),(5,'Categorìa de prueba');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comandas`
--

DROP TABLE IF EXISTS `comandas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comandas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `precio_total` decimal(5,2) DEFAULT '0.00',
  `id_plato` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_comandas_plato` (`id_plato`),
  CONSTRAINT `fk_comandas_plato` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comandas`
--

LOCK TABLES `comandas` WRITE;
/*!40000 ALTER TABLE `comandas` DISABLE KEYS */;
INSERT INTO `comandas` VALUES (8,'2022-02-23',43.80,1,6),(10,'2022-03-23',146.00,1,20),(11,'2021-02-23',36.50,1,5),(39,'2022-04-27',72.00,1,10),(40,'2022-01-27',100.00,6,20),(41,'2022-04-27',72.00,1,10),(44,'2022-04-27',86.40,1,12),(50,'2021-12-10',72.00,1,10),(51,'2021-11-10',79.20,1,11),(52,'2021-10-10',86.40,1,12),(53,'2021-09-10',108.00,1,15),(54,'2021-08-10',28.80,1,4),(55,'2021-07-10',64.80,1,9),(56,'2021-06-10',237.60,1,10),(57,'2021-05-10',172.80,1,24),(58,'2021-04-10',100.80,1,14),(59,'2021-03-10',50.40,1,7),(60,'2021-02-10',72.00,1,10),(61,'2021-01-10',136.80,1,19);
/*!40000 ALTER TABLE `comandas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER act_comandas_au 
before insert ON comandas
FOR EACH ROW
begin
	
	set new.fecha = curdate(); 
	set new.precio_total = (select distinct (new.cantidad*(select precio_publico from platos where platos.id = new.id_plato)) from comandas);

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `guarniciones`
--

DROP TABLE IF EXISTS `guarniciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guarniciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `coste` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guarniciones`
--

LOCK TABLES `guarniciones` WRITE;
/*!40000 ALTER TABLE `guarniciones` DISABLE KEYS */;
INSERT INTO `guarniciones` VALUES (1,'Patatas fritas',0.00),(4,'Pruebas',0.00);
/*!40000 ALTER TABLE `guarniciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guarniciones_en_platos`
--

DROP TABLE IF EXISTS `guarniciones_en_platos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guarniciones_en_platos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plato` int(11) DEFAULT NULL,
  `id_guarnicion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plato_guarnicionesenplatos` (`id_plato`),
  KEY `fk_guarnicion_guarnicionesenplatos` (`id_guarnicion`),
  CONSTRAINT `fk_guarnicion_guarnicionesenplatos` FOREIGN KEY (`id_guarnicion`) REFERENCES `guarniciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_plato_guarnicionesenplatos` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guarniciones_en_platos`
--

LOCK TABLES `guarniciones_en_platos` WRITE;
/*!40000 ALTER TABLE `guarniciones_en_platos` DISABLE KEYS */;
/*!40000 ALTER TABLE `guarniciones_en_platos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT '0',
  `cantidad` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_producto_pedidos` (`id_producto`),
  KEY `fk_proveedor_pedidos` (`id_proveedor`),
  CONSTRAINT `fk_producto_pedidos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_proveedor_pedidos` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (5,'2021-05-07',1,3,0,50),(6,'2022-03-09',3,2,10,100),(7,'2022-03-24',2,1,20,100);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platos`
--

DROP TABLE IF EXISTS `platos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `platos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `precio_publico` decimal(5,2) DEFAULT '0.00',
  `coste` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_categoria_platos` (`categoria`),
  CONSTRAINT `fk_categoria_platos` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platos`
--

LOCK TABLES `platos` WRITE;
/*!40000 ALTER TABLE `platos` DISABLE KEYS */;
INSERT INTO `platos` VALUES (1,'Surtido de Ibéricos',1,7.20,0.00),(6,'Plato de prueba 2',1,5.00,0.00);
/*!40000 ALTER TABLE `platos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock` decimal(7,2) DEFAULT '0.00',
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_compra` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,100.00,'Huevos',11.50),(2,5000.00,'Patata Semipreparada',11.35),(3,2000.00,'Sal',33.50),(4,10000.00,'Aceite',23.00),(5,1000.00,'Mayonesa',15.30),(6,2100.00,'Atún',25.10),(7,1000.00,'Jamón cocido',11.99),(8,5000.00,'Queso fundido',25.50),(9,1000.00,'Bacon en lonchas',15.15),(10,1000.00,'Queso rulo de cabra',25.00),(11,1000.00,'Pan bimbo',25.50),(12,1000.00,'Margarina',9.99),(13,1000.00,'Tomate',25.60),(14,1000.00,'Lechuga',9.00),(15,10000.00,'Patata cortada tipo brava',3.50),(16,500.00,'Kikmchee',5.50),(17,1000.00,'Jamón Ibérico',9.20),(18,1000.00,'Lomo Ibérico',7.11),(19,2000.00,'Queso curado',4.30);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_de_proveedores`
--

DROP TABLE IF EXISTS `productos_de_proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_de_proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `precio_compra` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_producto_productosdeproveedores` (`id_producto`),
  KEY `fk_proveedor_productosdeproveedores` (`id_proveedor`),
  CONSTRAINT `fk_producto_productosdeproveedores` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_proveedor_productosdeproveedores` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_de_proveedores`
--

LOCK TABLES `productos_de_proveedores` WRITE;
/*!40000 ALTER TABLE `productos_de_proveedores` DISABLE KEYS */;
INSERT INTO `productos_de_proveedores` VALUES (1,17,1,3.50),(2,18,1,2.90),(3,1,3,1.50),(4,6,2,4.77);
/*!40000 ALTER TABLE `productos_de_proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_en_guarniciones`
--

DROP TABLE IF EXISTS `productos_en_guarniciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_en_guarniciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guarnicion` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `gramos_producto` decimal(7,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_guarnicion_productosenguarniciones` (`id_guarnicion`),
  KEY `fk_producto_productosenguarniciones` (`id_producto`),
  CONSTRAINT `fk_guarnicion_productosenguarniciones` FOREIGN KEY (`id_guarnicion`) REFERENCES `guarniciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_producto_productosenguarniciones` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_en_guarniciones`
--

LOCK TABLES `productos_en_guarniciones` WRITE;
/*!40000 ALTER TABLE `productos_en_guarniciones` DISABLE KEYS */;
INSERT INTO `productos_en_guarniciones` VALUES (1,1,2,100.00),(2,1,4,50.00),(3,1,3,5.00),(13,4,1,100.00),(14,4,7,200.00);
/*!40000 ALTER TABLE `productos_en_guarniciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_en_platos`
--

DROP TABLE IF EXISTS `productos_en_platos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_en_platos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plato` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `gramos_producto` decimal(7,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_plato_productosdeplatos` (`id_plato`),
  KEY `fk_producto_productosdeplatos` (`id_producto`),
  CONSTRAINT `fk_plato_productosdeplatos` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_producto_productosdeplatos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_en_platos`
--

LOCK TABLES `productos_en_platos` WRITE;
/*!40000 ALTER TABLE `productos_en_platos` DISABLE KEYS */;
INSERT INTO `productos_en_platos` VALUES (37,6,1,100.00),(38,6,2,20.00),(39,1,16,100.00),(40,1,2,50000.00),(44,1,3,50.00),(51,1,7,50.00),(52,1,4,120.00),(53,1,5,20.00),(54,6,3,200.00),(55,1,6,0.00);
/*!40000 ALTER TABLE `productos_en_platos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nif` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'72141414Z','Pedro'),(2,'72133314T','PescaMar'),(3,'72322414T','Luis Huevoos');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonos_proveedores`
--

DROP TABLE IF EXISTS `telefonos_proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonos_proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedor_telefonos` (`id_proveedor`),
  CONSTRAINT `fk_proveedor_telefonos` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonos_proveedores`
--

LOCK TABLES `telefonos_proveedores` WRITE;
/*!40000 ALTER TABLE `telefonos_proveedores` DISABLE KEYS */;
INSERT INTO `telefonos_proveedores` VALUES (1,1,628776322),(2,1,628776334),(3,2,678776311),(4,3,658776364);
/*!40000 ALTER TABLE `telefonos_proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cocina'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-10 21:44:35
