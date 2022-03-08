-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: protexbanco
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `contaspagar`
--

DROP TABLE IF EXISTS `contaspagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contaspagar` (
  `lancamento` date NOT NULL,
  `grupo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subgrupo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vencimento` date NOT NULL,
  `historico` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `historicolongo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `numparcelas` int(11) NOT NULL,
  `valorparcela` float NOT NULL,
  `idpagar` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idpagar`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contaspagar`
--

LOCK TABLES `contaspagar` WRITE;
/*!40000 ALTER TABLE `contaspagar` DISABLE KEYS */;
INSERT INTO `contaspagar` VALUES ('2021-11-10','Grupo 4','','2021-11-05','teste','asfa',24,2,12,1),('2021-11-10','Grupo 4','SubGrupo 4','2021-11-05','teste','asfa',24,2,12,2),('2021-11-03','Grupo 3','SubGrupo 2','2021-11-19','214','as',124,2,14,3),('2021-11-03','Grupo 3','SubGrupo 2','2021-11-19','214','as',124,2,14,4),('2021-11-30','Grupo 3','SubGrupo 3','2021-12-14','entrega','entrega do projeto',12,2,4,5);
/*!40000 ALTER TABLE `contaspagar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contasreceber`
--

DROP TABLE IF EXISTS `contasreceber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contasreceber` (
  `lancamento` date NOT NULL,
  `grupo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subgrupo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vencimento` date NOT NULL,
  `historico` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `historicolongo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `valorparcela` float NOT NULL,
  `idreceber` int(11) NOT NULL AUTO_INCREMENT,
  `numparcelas` int(11) NOT NULL,
  PRIMARY KEY (`idreceber`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contasreceber`
--

LOCK TABLES `contasreceber` WRITE;
/*!40000 ALTER TABLE `contasreceber` DISABLE KEYS */;
INSERT INTO `contasreceber` VALUES ('2021-11-10','Grupo 4','SubGrupo 3','2021-11-06','teste','teste entrega',10,10,1,1);
/*!40000 ALTER TABLE `contasreceber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despesa`
--

DROP TABLE IF EXISTS `despesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `despesa` (
  `fk_Subgrupo_id_subgrupo` int(11) DEFAULT NULL,
  `fk_Usuario_login` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `FK_Despesa_1` (`fk_Subgrupo_id_subgrupo`),
  KEY `FK_Despesa_2` (`fk_Usuario_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesa`
--

LOCK TABLES `despesa` WRITE;
/*!40000 ALTER TABLE `despesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `despesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo` (
  `nome` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Usuario_login` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `FK_Grupo_2` (`fk_Usuario_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subgrupo`
--

DROP TABLE IF EXISTS `subgrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subgrupo` (
  `nome` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Grupo_id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_subgrupo`),
  KEY `FK_Subgrupo_2` (`fk_Grupo_id_grupo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subgrupo`
--

LOCK TABLES `subgrupo` WRITE;
/*!40000 ALTER TABLE `subgrupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `subgrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('admin','admin');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-30  9:52:19
