-- MySQL dump 10.16  Distrib 10.1.30-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: web_rizal
-- ------------------------------------------------------
-- Server version	10.1.30-MariaDB

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
-- Table structure for table `identitas_kendaraan`
--

DROP TABLE IF EXISTS `identitas_kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `identitas_kendaraan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_kendaraan` int(3) NOT NULL,
  `no_rangka` varchar(30) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `seri` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identitas_kendaraan`
--

LOCK TABLES `identitas_kendaraan` WRITE;
/*!40000 ALTER TABLE `identitas_kendaraan` DISABLE KEYS */;
INSERT INTO `identitas_kendaraan` VALUES (2,1,'00113456234','Honda','Blade','Gold','R2','2018-06-04 01:41:44');
/*!40000 ALTER TABLE `identitas_kendaraan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_kendaraan`
--

DROP TABLE IF EXISTS `m_kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_kendaraan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nik` varchar(40) NOT NULL,
  `nopol` varchar(15) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `last_update` datetime NOT NULL,
  `old_nopol` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_kendaraan`
--

LOCK TABLES `m_kendaraan` WRITE;
/*!40000 ALTER TABLE `m_kendaraan` DISABLE KEYS */;
INSERT INTO `m_kendaraan` VALUES (1,'357001110001','L 6125 QZ','bayusaputra','2018-06-03 23:59:16',NULL),(2,'357001110023','W 6634 PO','1234','2018-06-04 00:20:59',NULL);
/*!40000 ALTER TABLE `m_kendaraan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pajak_kendaraan`
--

DROP TABLE IF EXISTS `pajak_kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pajak_kendaraan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_kendaraan` int(3) NOT NULL,
  `no_skhum` varchar(25) NOT NULL,
  `masa_berlaku` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pajak_kendaraan`
--

LOCK TABLES `pajak_kendaraan` WRITE;
/*!40000 ALTER TABLE `pajak_kendaraan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pajak_kendaraan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-04  1:43:27
