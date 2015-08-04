CREATE DATABASE  IF NOT EXISTS `bsc_development` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bsc_development`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: bsc_development
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `actual_measures`
--

DROP TABLE IF EXISTS `actual_measures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actual_measures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `measure_id` int(10) unsigned NOT NULL,
  `month` int(11) NOT NULL,
  `actual_measure` double(15,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `actual_measures_measure_id_foreign` (`measure_id`),
  CONSTRAINT `actual_measures_measure_id_foreign` FOREIGN KEY (`measure_id`) REFERENCES `measures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actual_measures`
--

LOCK TABLES `actual_measures` WRITE;
/*!40000 ALTER TABLE `actual_measures` DISABLE KEYS */;
INSERT INTO `actual_measures` VALUES (2,2,1,34.00,0,'2015-08-03 13:47:48','2015-08-03 14:16:53'),(3,2,1,123333.00,0,'2015-08-03 13:48:13','2015-08-03 14:18:11'),(6,2,4,3434.00,0,'2015-08-03 14:15:42','2015-08-03 14:18:21'),(7,2,12,3434.00,0,'2015-08-03 14:16:46','2015-08-03 14:16:46'),(8,2,7,3434.00,0,'2015-08-03 15:01:24','2015-08-03 15:01:24');
/*!40000 ALTER TABLE `actual_measures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimensions`
--

DROP TABLE IF EXISTS `dimensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dimensions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `dimensions_user_id_foreign` (`user_id`),
  CONSTRAINT `dimensions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimensions`
--

LOCK TABLES `dimensions` WRITE;
/*!40000 ALTER TABLE `dimensions` DISABLE KEYS */;
INSERT INTO `dimensions` VALUES (1,1,'Financials','',0,'2015-08-01 14:18:40','2015-08-01 14:18:40'),(2,1,'Emaago Inc','',0,'2015-08-03 15:08:59','2015-08-03 15:08:59');
/*!40000 ALTER TABLE `dimensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `initiatives`
--

DROP TABLE IF EXISTS `initiatives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `initiatives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `objective_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `initiatives_objective_id_foreign` (`objective_id`),
  CONSTRAINT `initiatives_objective_id_foreign` FOREIGN KEY (`objective_id`) REFERENCES `objectives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `initiatives`
--

LOCK TABLES `initiatives` WRITE;
/*!40000 ALTER TABLE `initiatives` DISABLE KEYS */;
INSERT INTO `initiatives` VALUES (2,1,'Initiatives','Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives Initiatives ',0,'2015-08-01 15:09:16','2015-08-03 15:00:10'),(3,1,'Control Structures','',0,'2015-08-03 15:10:14','2015-08-03 15:10:14');
/*!40000 ALTER TABLE `initiatives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `measures`
--

DROP TABLE IF EXISTS `measures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `measures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `initiative_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `period` int(11) NOT NULL,
  `target` double(15,2) NOT NULL,
  `starting_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `measures_initiative_id_foreign` (`initiative_id`),
  CONSTRAINT `measures_initiative_id_foreign` FOREIGN KEY (`initiative_id`) REFERENCES `initiatives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `measures`
--

LOCK TABLES `measures` WRITE;
/*!40000 ALTER TABLE `measures` DISABLE KEYS */;
INSERT INTO `measures` VALUES (2,2,'Cost reducing factors','See the link I posted above. If i\'m not wrong, you should tell Laravel what fields needs to be converted. By default, just created_at and updated_at are converted.',2,34.00,'2014-10-01',0,'2015-08-01 16:07:58','2015-08-03 14:52:15'),(3,2,'Measure 2','',1,34.00,'2015-08-20',0,'2015-08-03 15:06:09','2015-08-03 15:06:09'),(4,2,'Measue 4','',3,76.00,'2015-08-14',0,'2015-08-03 15:06:37','2015-08-03 15:07:26');
/*!40000 ALTER TABLE `measures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_07_26_190638_create_dimensions_table',1),('2015_07_28_183647_create_objectives',1),('2015_08_01_183242_create_initiatives_table',1),('2015_08_01_194621_create_measures_table',2),('2015_08_01_194647_create_actual_measures_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objectives`
--

DROP TABLE IF EXISTS `objectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objectives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dimension_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `objectives_dimension_id_foreign` (`dimension_id`),
  CONSTRAINT `objectives_dimension_id_foreign` FOREIGN KEY (`dimension_id`) REFERENCES `dimensions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objectives`
--

LOCK TABLES `objectives` WRITE;
/*!40000 ALTER TABLE `objectives` DISABLE KEYS */;
INSERT INTO `objectives` VALUES (1,1,'Cost reduced ','Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost reduced Cost ',0,'2015-08-01 14:18:56','2015-08-03 15:00:58');
/*!40000 ALTER TABLE `objectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Emaago Inc','sheraz.ali342@gmail.com','$2y$10$zqel3Rb7xVQKlHnKHfINde90pS82YOI/jKpToiSrGU812BntV097G',NULL,2,'2015-08-01 14:05:01','2015-08-01 14:05:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bsc_development'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-04 22:43:58
