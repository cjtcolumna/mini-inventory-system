-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: inventory_db
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `tblbom`
--

DROP TABLE IF EXISTS `tblbom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblbom` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `lfinish_product_id` int DEFAULT NULL,
  `lmaterial_id` int DEFAULT NULL,
  `lunit_id` int DEFAULT NULL,
  `lqty_consumed` int DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbom`
--

LOCK TABLES `tblbom` WRITE;
/*!40000 ALTER TABLE `tblbom` DISABLE KEYS */;
INSERT INTO `tblbom` VALUES (1,6,1,1,2),(2,6,3,4,1),(3,6,2,5,180),(4,6,4,1,1),(5,6,5,1,1);
/*!40000 ALTER TABLE `tblbom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomer`
--

DROP TABLE IF EXISTS `tblcustomer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomer` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `lcode` varchar(255) DEFAULT NULL,
  `lfirstname` varchar(255) DEFAULT NULL,
  `llastname` varchar(255) DEFAULT NULL,
  `lcontact` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomer`
--

LOCK TABLES `tblcustomer` WRITE;
/*!40000 ALTER TABLE `tblcustomer` DISABLE KEYS */;
INSERT INTO `tblcustomer` VALUES (1,'CUST-001','John','Cruz','09111111111'),(2,'CUST-002','Jane','Mendoza','09222222222');
/*!40000 ALTER TABLE `tblcustomer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmaterial`
--

DROP TABLE IF EXISTS `tblmaterial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmaterial` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `lcode` varchar(255) DEFAULT NULL,
  `limage` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `lcategory` varchar(255) DEFAULT NULL,
  `lunit_id` int DEFAULT NULL,
  `lunit_set_id` int DEFAULT NULL,
  `lunit_set_default` tinyint(1) DEFAULT '0',
  `lcost` double DEFAULT NULL,
  `lprice` double DEFAULT NULL,
  `lqty` int DEFAULT NULL,
  `lis_finish_product` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmaterial`
--

LOCK TABLES `tblmaterial` WRITE;
/*!40000 ALTER TABLE `tblmaterial` DISABLE KEYS */;
INSERT INTO `tblmaterial` VALUES (1,'FOOD-001','food-001_67c00e7cd93b7.jpg','Egg','Ingredient',1,2,0,8,12,240,0),(2,'FOOD-002','food-002_67c00fb85504d.jpg','Flour','Ingredients',5,4,1,2,4,800,0),(3,'FOOD-003','food-003_67c010d1e7979.jpg','Sugar','Ingredients',5,4,0,3,6,3000,0),(4,'FOOD-004','food-004_67c01149cd8b5.jpg','Milk','Ingredients',1,3,0,50,75,175,0),(5,'FOOD-005','food-005_67c011f75078d.jpg','Butter','Ingredients',1,3,0,20,35,100,0),(6,'FOOD-006','food-006_67c012eb136eb.jpg','Cake','Dessert',1,1,0,1000,1500,4,1);
/*!40000 ALTER TABLE `tblmaterial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblunit`
--

DROP TABLE IF EXISTS `tblunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblunit` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) DEFAULT NULL,
  `ldisplay` varchar(255) DEFAULT NULL,
  `lqty` int DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblunit`
--

LOCK TABLES `tblunit` WRITE;
/*!40000 ALTER TABLE `tblunit` DISABLE KEYS */;
INSERT INTO `tblunit` VALUES (1,'Pcs','Pcs',1),(2,'Dozen','Dozen',12),(3,'Box','Box',24),(4,'Cup','Cup',200),(5,'Grams','g',1);
/*!40000 ALTER TABLE `tblunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluser` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `lfirstname` varchar(255) DEFAULT NULL,
  `llastname` varchar(255) DEFAULT NULL,
  `lemail` varchar(255) DEFAULT NULL,
  `lpassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` VALUES (1,'Cenard Jade','Columna','user@email.com','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-27 16:15:52
