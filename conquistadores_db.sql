-- MySQL dump 10.13  Distrib 5.5.14, for Linux (x86_64)
--
-- Host: localhost    Database: conquistadores
-- ------------------------------------------------------
-- Server version	5.5.14-log

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
-- Table structure for table `clubes`
--

DROP TABLE IF EXISTS `clubes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clubes` (
  `id_club` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `iglesia` int(11) DEFAULT NULL,
  `director` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_club`),
  KEY `iglesia` (`iglesia`),
  KEY `director` (`director`),
  CONSTRAINT `clubes_ibfk_1` FOREIGN KEY (`iglesia`) REFERENCES `iglesias` (`id_igleisa`),
  CONSTRAINT `clubes_ibfk_2` FOREIGN KEY (`director`) REFERENCES `miembros` (`id_miembro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubes`
--

LOCK TABLES `clubes` WRITE;
/*!40000 ALTER TABLE `clubes` DISABLE KEYS */;
INSERT INTO `clubes` VALUES (1,'Rejas Sur',1,2),(2,'Republica de Francia',2,NULL);
/*!40000 ALTER TABLE `clubes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iglesias`
--

DROP TABLE IF EXISTS `iglesias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iglesias` (
  `id_igleisa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_igleisa`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iglesias`
--

LOCK TABLES `iglesias` WRITE;
/*!40000 ALTER TABLE `iglesias` DISABLE KEYS */;
INSERT INTO `iglesias` VALUES (1,'Rejas Sur',NULL),(2,'Villa Francia',NULL),(3,'Rejas Norte',NULL),(4,'Central Santiago',NULL),(5,'Alameda',NULL),(6,'Las Condes',NULL),(7,'La marina',NULL),(8,'Villa Sur',NULL),(9,'Renacer',NULL),(10,'Pajaritos',NULL),(11,'Central Maipu',NULL),(12,'Villa Mexico',NULL),(13,'Pedro Donoso',NULL),(14,'Pudahuel',NULL),(15,'Fé y Esperanza',NULL),(16,'Corona Zueca',NULL),(17,'Plaza Garin',NULL),(18,'La Paz',NULL),(19,'Central La Cisterna',NULL),(20,'La Victoria',NULL);
/*!40000 ALTER TABLE `iglesias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miembros`
--

DROP TABLE IF EXISTS `miembros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miembros` (
  `id_miembro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `club` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_miembro`),
  KEY `club` (`club`),
  CONSTRAINT `miembros_ibfk_1` FOREIGN KEY (`club`) REFERENCES `clubes` (`id_club`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miembros`
--

LOCK TABLES `miembros` WRITE;
/*!40000 ALTER TABLE `miembros` DISABLE KEYS */;
INSERT INTO `miembros` VALUES (2,'Jonathan Ibarra',NULL,'jonatan@ibarra.cl',1);
/*!40000 ALTER TABLE `miembros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miembros_roles`
--

DROP TABLE IF EXISTS `miembros_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miembros_roles` (
  `id_miembro` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  KEY `id_miembro` (`id_miembro`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `miembros_roles_ibfk_1` FOREIGN KEY (`id_miembro`) REFERENCES `miembros` (`id_miembro`),
  CONSTRAINT `miembros_roles_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miembros_roles`
--

LOCK TABLES `miembros_roles` WRITE;
/*!40000 ALTER TABLE `miembros_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `miembros_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Director'),(2,'Sub Director'),(3,'Secretaria(o)'),(4,'Tesorero'),(5,'Capellán'),(6,'Lider / Consejero'),(7,'Capitán'),(8,'Conquistador');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `miembro` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario`),
  KEY `miembro` (`miembro`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`miembro`) REFERENCES `miembros` (`id_miembro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-02-20 16:31:33
