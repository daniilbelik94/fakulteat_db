-- MySQL dump 10.13  Distrib 9.3.0, for macos15.2 (arm64)
--
-- Host: 127.0.0.1    Database: university_db
-- ------------------------------------------------------
-- Server version	9.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Dozenten`
--

DROP TABLE IF EXISTS `Dozenten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Dozenten` (
  `dozent_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`dozent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dozenten`
--

LOCK TABLES `Dozenten` WRITE;
/*!40000 ALTER TABLE `Dozenten` DISABLE KEYS */;
INSERT INTO `Dozenten` VALUES (1,'Dr. Klaus Byte'),(2,'Dr. Klaus Byte'),(3,'Prof. Dr. Alan Turing'),(4,'Dr. Grace Hopper'),(5,'Prof. Dr. Charles Babbage'),(6,'Dr. Adam Smith'),(7,'Prof. Dr. Eva Marketing');
/*!40000 ALTER TABLE `Dozenten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Fakultaeten`
--

DROP TABLE IF EXISTS `Fakultaeten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Fakultaeten` (
  `fakultaet_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dekanat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fakultaet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Fakultaeten`
--

LOCK TABLES `Fakultaeten` WRITE;
/*!40000 ALTER TABLE `Fakultaeten` DISABLE KEYS */;
INSERT INTO `Fakultaeten` VALUES (1,'Informatik','Prof. Dr. Ada Lovelace'),(2,'Informatik','Prof. Dr. Ada Lovelace'),(3,'Wirtschaftswissenschaften','Prof. Dr. Johanna Ökonom');
/*!40000 ALTER TABLE `Fakultaeten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Modul_Studenten`
--

DROP TABLE IF EXISTS `Modul_Studenten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Modul_Studenten` (
  `modul_id` int NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`modul_id`,`student_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `modul_studenten_ibfk_1` FOREIGN KEY (`modul_id`) REFERENCES `Module` (`modul_id`) ON DELETE CASCADE,
  CONSTRAINT `modul_studenten_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `Studenten` (`student_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Modul_Studenten`
--

LOCK TABLES `Modul_Studenten` WRITE;
/*!40000 ALTER TABLE `Modul_Studenten` DISABLE KEYS */;
INSERT INTO `Modul_Studenten` VALUES (1,1),(2,1),(1,2),(3,3),(4,3),(4,4),(5,5),(6,5),(6,6);
/*!40000 ALTER TABLE `Modul_Studenten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Module`
--

DROP TABLE IF EXISTS `Module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Module` (
  `modul_id` int NOT NULL AUTO_INCREMENT,
  `modul_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int DEFAULT NULL,
  `studiengang_id` int NOT NULL,
  `dozent_id` int DEFAULT NULL,
  PRIMARY KEY (`modul_id`),
  UNIQUE KEY `modul_code` (`modul_code`),
  KEY `studiengang_id` (`studiengang_id`),
  KEY `dozent_id` (`dozent_id`),
  CONSTRAINT `module_ibfk_1` FOREIGN KEY (`studiengang_id`) REFERENCES `Studiengaenge` (`studiengang_id`) ON DELETE CASCADE,
  CONSTRAINT `module_ibfk_2` FOREIGN KEY (`dozent_id`) REFERENCES `Dozenten` (`dozent_id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Module`
--

LOCK TABLES `Module` WRITE;
/*!40000 ALTER TABLE `Module` DISABLE KEYS */;
INSERT INTO `Module` VALUES (1,'AI101','Grundlagen der Programmierung',1,1,1),(2,'AI102','Algorithmen und Datenstrukturen',2,1,2),(3,'DS501','Machine Learning',1,2,3),(4,'DS502','Big Data Technologien',1,2,4),(5,'BWL101','Einführung in die BWL',1,3,5),(6,'BWL201','Marketing',3,3,6);
/*!40000 ALTER TABLE `Module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Studenten`
--

DROP TABLE IF EXISTS `Studenten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Studenten` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `matrikelnummer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vorname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nachname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `matrikelnummer` (`matrikelnummer`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Studenten`
--

LOCK TABLES `Studenten` WRITE;
/*!40000 ALTER TABLE `Studenten` DISABLE KEYS */;
INSERT INTO `Studenten` VALUES (1,'123456','Max','Mustermann'),(2,'654321','Erika','Musterfrau'),(3,'789012','Peter','Schmidt'),(4,'345678','Anna','Müller'),(5,'112233','Julia','Weber'),(6,'445566','Markus','Fischer');
/*!40000 ALTER TABLE `Studenten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Studiengaenge`
--

DROP TABLE IF EXISTS `Studiengaenge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Studiengaenge` (
  `studiengang_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typ` enum('Bachelor','Master') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultaet_id` int NOT NULL,
  PRIMARY KEY (`studiengang_id`),
  KEY `fakultaet_id` (`fakultaet_id`),
  CONSTRAINT `studiengaenge_ibfk_1` FOREIGN KEY (`fakultaet_id`) REFERENCES `Fakultaeten` (`fakultaet_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Studiengaenge`
--

LOCK TABLES `Studiengaenge` WRITE;
/*!40000 ALTER TABLE `Studiengaenge` DISABLE KEYS */;
INSERT INTO `Studiengaenge` VALUES (1,'Angewandte Informatik','Bachelor',1),(2,'Data Science','Master',1),(3,'Betriebswirtschaftslehre','Bachelor',2);
/*!40000 ALTER TABLE `Studiengaenge` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-24 10:19:02
