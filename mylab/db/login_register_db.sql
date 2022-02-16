-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: login_register_db
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `protocols`
--

DROP TABLE IF EXISTS `protocols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `protocols` (
  `id_exp` int NOT NULL AUTO_INCREMENT,
  `type` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `mastermix` int DEFAULT NULL,
  `oligos` int DEFAULT NULL,
  `miliQ` int DEFAULT NULL,
  `template` int DEFAULT NULL,
  PRIMARY KEY (`id_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protocols`
--

LOCK TABLES `protocols` WRITE;
/*!40000 ALTER TABLE `protocols` DISABLE KEYS */;
INSERT INTO `protocols` VALUES (3,'PCR',25,2,22,1);
/*!40000 ALTER TABLE `protocols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prueba`
--

DROP TABLE IF EXISTS `prueba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prueba` (
  `id_prueba` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  PRIMARY KEY (`id_prueba`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prueba`
--

LOCK TABLES `prueba` WRITE;
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
INSERT INTO `prueba` VALUES (32,'PCR',30),(34,'0',11),(39,'PCR',30),(40,'PCR',30),(41,'PCR',30),(42,'PCR',30),(43,'PCR',30),(44,'PCR',30),(50,'PCR',30),(51,'PCR',30),(52,'PCR',30),(53,'PCR',30),(54,'PCR',30),(55,'PCR',30),(56,'PCR',30),(57,'PCR',30),(58,'PCR',30),(59,'PCR',30),(60,'PCR',30),(61,'PCR',30),(62,'PCR',30),(63,'PCR',30),(64,'PCR',30),(65,'PCR',30),(66,'PCR',30),(67,'PCR',10),(68,'PCR',10),(69,'PCR',10),(70,'PCR',2),(71,'PCR',2),(72,'PCR',2);
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reactives`
--

DROP TABLE IF EXISTS `reactives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reactives` (
  `id_reactive` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `amount` int DEFAULT NULL,
  `threshold` int NOT NULL,
  PRIMARY KEY (`id_reactive`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reactives`
--

LOCK TABLES `reactives` WRITE;
/*!40000 ALTER TABLE `reactives` DISABLE KEYS */;
INSERT INTO `reactives` VALUES (1,'mastermix',78,50),(2,'oligos',20,10),(3,'miliQ',890,200),(4,'template',14,5);
/*!40000 ALTER TABLE `reactives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `complete_name` varchar(50) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `user` varchar(50) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (26,'Xavi Soler Sanchis','xavi.soler01@estudiant.upf.edu','xavi','4be9505dcf6a24de2d361a85327b13b7'),(27,'Alejandro Madrid Valiente','alejandro.madrid01@estudiant.upf.edu','Alaju','e052450f29b2e0e9a53fd4eb389e25a9'),(28,'Julia Vilalta Mor','julia.vilalta01@estudiant.upf.edu','aliuj','c2e285cb33cecdbeb83d2189e983a8c0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-16 13:51:44
