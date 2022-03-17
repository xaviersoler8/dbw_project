CREATE DATABASE  IF NOT EXISTS `mylab` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mylab`;
-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mylab
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
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(225) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `color` varchar(7) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `protocols`
--

DROP TABLE IF EXISTS `protocols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `protocols` (
  `id_exp` int NOT NULL AUTO_INCREMENT,
  `type` varchar(30) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `user` varchar(30) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `mastermix` int DEFAULT NULL,
  `oligos` int DEFAULT NULL,
  `miliQ` int DEFAULT NULL,
  `template` int DEFAULT NULL,
  `lysisbuffer` int DEFAULT NULL,
  `neutrbuffer` int DEFAULT NULL,
  `washbuffer` int DEFAULT NULL,
  `resusbuffer` int DEFAULT NULL,
  `steps` longtext CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protocols`
--

LOCK TABLES `protocols` WRITE;
/*!40000 ALTER TABLE `protocols` DISABLE KEYS */;
INSERT INTO `protocols` VALUES (3,'PCR','iria',25,2,22,1,0,0,0,0,'1. Use PCR tubes to mix all the reactives\n2. Add to the tube {{miliQ}} of miliQ, {{oligos}} of oligos, {{template}} of template and the last reactive to be added is {{mastermix}} of MasterMix. Every reactive in μL\n3. Set the thermocycler to 20 cycles of:\n\n	-Denaturing: 95ºC for 30s\n	-Annealing: 52ºC for 1 min\n	-Elongation: 72ºC for 1 min'),(4,'PCR','xavi',25,1,23,1,0,0,0,0,'1. Use PCR tubes to mix all the reactives\n2. Add to the tube {{miliQ}} of miliQ, {{oligos}} of oligos, {{template}} of template and the last reactive to be added is {{mastermix}} of MasterMix. Every reactive in μL.\n3. Set the thermocycler to 24 cycles of:\n\n	-Denaturing: 95ºC for 30s\n	-Annealing: 54ºC for 1 min\n	-Elongation: 72ºC for 1 min'),(5,'PCR','alajuela',25,3,20,2,0,0,0,0,'1. Use PCR tubes to mix all the reactives\n2. Add to the tube {{miliQ}} of miliQ, {{oligos}} of oligos, {{template}} of template and the last reactive to be added is {{mastermix}} of MasterMix. Every reactive in μL.\n3. Set the thermocycler to 28 cycles of:\n\n	-Denaturing: 95ºC for 30s\n	-Annealing: 54ºC for 4 min\n	-Elongation: 72ºC for 1 min'),(6,'PCR','julia',25,2,21,1,0,0,0,0,'1. Use PCR tubes to mix all the reactives\n2. Add to the tube {{miliQ}} of miliQ, {{oligos}} of oligos, {{template}} of template and the last reactive to be added is {{mastermix}} of MasterMix. Every reactive in μL.\n3. Set the thermocycler to 25 cycles of:\n\n	-Denaturing: 95ºC for 30s\n	-Annealing: 53ºC for 1.5 min\n	-Elongation: 72ºC for 1 min'),(7,'miniprep','iria',0,0,50,0,250,350,1,250,'Note. All steps should be carried out at room temperature. All centrifugations should be carried\nout in a microcentrifuge at ≥ 12 000 x g (10 000-14 000 rpm, depending on the rotor type).\n\nHarvest bacteria. Harvest the bacterial culture by centrifugation at 8000 rpm (6800 x g) in\na microcentrifuge for 2 minutes at room temperature. Decant the supernatant and remove all\nremaining medium.\n\n1. Ressuspend cells with {{resusbuffer}} of Resuspension Solution and add to an Eppendorf tube\n2. Lyse cells with {{lysisbuffer}} μL of Lysis solution\n3. Neutralize with {{neutrbuffer}} μL of Neutralization Solution\n4. Centrifuge 5 min\n\n5. Bind DNA. Transfer the supernatant to the Column and centrifugate 1 minute\n6. Wash the column with {{washbuffer}} mL of Wash Buffer and centrifugate 1 minutes for 2 times and discard the flow-through\n7. Elute purified DNA. Transfer the column into a new Eppendorf tube and add {{miliQ}} μL of miliQ and centrifugate for 2 minutes. '),(8,'miniprep','xavi',0,0,100,0,250,350,1,300,'Note. All steps should be carried out at room temperature. All centrifugations should be carried\nout in a microcentrifuge at ≥ 12 000 x g (10 000-14 000 rpm, depending on the rotor type).\n\nHarvest bacteria. Harvest the bacterial culture by centrifugation at 8000 rpm (6800 x g) in\na microcentrifuge for 2 minutes at room temperature. Decant the supernatant and remove all\nremaining medium.\n\n1. Ressuspend cells with {{resusbuffer}} μL of Resuspension Buffer and add it to an Eppendorf tube\n2. Lyse cells with {{lysisbuffer}} μL of Lysis Solution\n3. Neutralize with {{neutrbuffer}} μL of Neutralization Solution\n4. Centrifuge 5 min\n\n5. Bind DNA. Transfer the supernatant to the Column and centrifugate 1 minute\n6. Wash the column with {{washbuffer}} mL of Wash Bufferand centrifugate 1 minutes for 2 times and discard the flow-through\n7. Elute purified DNA. Transfer the column into a new Eppendorf tube and add {{miliQ}} μL of miliQ and centrifugate for 2 minutes. '),(9,'miniprep','alajuela',0,0,40,0,250,350,1,200,'Note. All steps should be carried out at room temperature. All centrifugations should be carried\nout in a microcentrifuge at ≥ 12 000 x g (10 000-14 000 rpm, depending on the rotor type).\n\nHarvest bacteria. Harvest the bacterial culture by centrifugation at 8000 rpm (6800 x g) in\na microcentrifuge for 2 minutes at room temperature. Decant the supernatant and remove all\nremaining medium.\n\n1. Ressuspend cells with {{resusbuffer}} μL Resuspension Solution and add to an Eppendorf tube\n2. Lyse cells with {{lysisbuffer}} μL of Lysis Buffer\n3. Neutralize with {{neutrbuffer}} μL of Neutralization Solution\n4. Centrifuge 5 min\n\n5. Bind DNA. Transfer the supernatant to the Column and centrifugate 1 minute\n6. Wash the column with {{washbuffer}} mL of Wash Bufferand centrifugate 1 minutes for 2 times and discard the flow-through\n7. Elute purified DNA. Transfer the column into a new Eppendorf tube and add {{miliQ}} μL of miliQ and centrifugate for 2 minutes. '),(10,'miniprep','julia',0,0,50,0,250,350,1,250,'Note. All steps should be carried out at room temperature. All centrifugations should be carried\nout in a microcentrifuge at ≥ 12 000 x g (10 000-14 000 rpm, depending on the rotor type).\n\nHarvest bacteria. Harvest the bacterial culture by centrifugation at 8000 rpm (6800 x g) in\na microcentrifuge for 2 minutes at room temperature. Decant the supernatant and remove all\nremaining medium.\n\n1. Ressuspend cells with {{resusbuffer}} μL of Resuspension Buffer and add to an Eppendorf tube\n2. Lyse cells with {{lysisbuffer}} μL of Lysis Solution\n3. Neutralize with {{neutrbuffer}} μL of Neutralization Solution\n4. Centrifuge 5 min\n\n5. Bind DNA. Transfer the supernatant to the Column and centrifugate 1 minute\n6. Wash the column with {{washbuffer}} mL of Wash Buffer and centrifugate 1 minutes for 2 times and discard the flow-through\n7. Elute purified DNA. Transfer the column into a new Eppendorf tube and add {{miliQ}} μL of miliQ and centrifugate for 2 minutes. ');
/*!40000 ALTER TABLE `protocols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reactives`
--

DROP TABLE IF EXISTS `reactives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reactives` (
  `id_reactive` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `amount` int DEFAULT NULL,
  `units` varchar(45) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL,
  `threshold` int NOT NULL,
  PRIMARY KEY (`id_reactive`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reactives`
--

LOCK TABLES `reactives` WRITE;
/*!40000 ALTER TABLE `reactives` DISABLE KEYS */;
INSERT INTO `reactives` VALUES (1,'mastermix',6450,'μL',3000),(2,'oligos',20,'μL',10),(3,'miliQ',5996,'μL',2000),(4,'template',343,'μL',50),(5,'lysisbuffer',45250,'μL',10000),(6,'neutrbuffer',68350,'μL',15000),(7,'washbuffer',30,'mL',20),(8,'resusbuffer',97100,'μL',20000);
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (26,'Xavi Soler Sanchis','xavi.soler01@estudiant.upf.edu','xavi','4be9505dcf6a24de2d361a85327b13b7'),(27,'Alejandro Madrid Valiente','alejandro.madrid01@estudiant.upf.edu','alajuela','e052450f29b2e0e9a53fd4eb389e25a9'),(28,'Julia Vilalta Mor','julia.vilalta01@estudiant.upf.edu','julia','c2e285cb33cecdbeb83d2189e983a8c0'),(29,'Iria Pose Lagoa','iria.pose01@estudiant.upf.edu','iria','b24878685a28ca723ac807ac94664fcf'),(30,'Josep Lluis Gelpi Buchaca','mylab@estudiant.upf.edu','mylab','e3bbc170e0b8bae60930c9f877e50ecb');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xat`
--

DROP TABLE IF EXISTS `xat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xat` (
  `idxat` int NOT NULL AUTO_INCREMENT,
  `user` longtext,
  `message` longtext,
  PRIMARY KEY (`idxat`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xat`
--

LOCK TABLES `xat` WRITE;
/*!40000 ALTER TABLE `xat` DISABLE KEYS */;
/*!40000 ALTER TABLE `xat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-17 23:18:41
