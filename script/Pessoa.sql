-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: pessoa
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Data` date NOT NULL,
  `Contato` varchar(100) NOT NULL,
  `TipoPessoa` smallint(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (14,'Igor','1111-11-11','23 42342-3423',2),(19,'Tiago','1111-11-11','34 24242-3423',1),(20,'Tiago','1111-11-11','34 24242-3423',2),(22,'Igor','1111-11-11','42 34234-2342',2);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoafisica`
--

DROP TABLE IF EXISTS `pessoafisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoafisica` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sobrenome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `RG` varchar(13) NOT NULL,
  `PessoaId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UK_PessoaFisica_CPF` (`CPF`),
  UNIQUE KEY `UK_PessoaFisica_RG` (`RG`),
  KEY `IX_FK_PessoaFisica_Pessoa` (`PessoaId`),
  KEY `IX_UK_PessoaFisica_CPF` (`CPF`),
  KEY `IX_UK_PessoaFisica_RG` (`RG`),
  CONSTRAINT `FK_PessoaFisica_Pessoa` FOREIGN KEY (`PessoaId`) REFERENCES `pessoa` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoafisica`
--

LOCK TABLES `pessoafisica` WRITE;
/*!40000 ALTER TABLE `pessoafisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoafisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoajuridica`
--

DROP TABLE IF EXISTS `pessoajuridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoajuridica` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CNPJ` varchar(100) NOT NULL,
  `NomeFantasia` varchar(100) NOT NULL,
  `InscricaoEstadual` varchar(100) NOT NULL,
  `PessoaId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UK_PessoaJuridica_CNPJ` (`CNPJ`),
  UNIQUE KEY `UK_PessoaJuridica_InscricaoEstadual` (`InscricaoEstadual`),
  KEY `IX_FK_PessoaJuridica_Pessoa` (`PessoaId`),
  KEY `IX_UK_PessoaJuridica_CNPJ` (`CNPJ`),
  KEY `IX_UK_PessoaJuridica_InscricaoEstadual` (`InscricaoEstadual`),
  CONSTRAINT `FK_PessoaJuridica_Pessoa` FOREIGN KEY (`PessoaId`) REFERENCES `pessoa` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoajuridica`
--

LOCK TABLES `pessoajuridica` WRITE;
/*!40000 ALTER TABLE `pessoajuridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoajuridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_usuario_Login` (`login`),
  KEY `IX_UK_Usuario_Login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','1234'),(2,'igor','igor'),(3,'root','root'),(6,'administrator','igor'),(7,'adm','1234');
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

-- Dump completed on 2017-08-24 16:17:41
