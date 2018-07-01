-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: docapp.crymnahjq0cx.ap-south-1.rds.amazonaws.com    Database: docapp
-- ------------------------------------------------------
-- Server version	5.6.39-log

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
-- Table structure for table `clinic_images`
--

DROP TABLE IF EXISTS `clinic_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clinic_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinic_images`
--

LOCK TABLES `clinic_images` WRITE;
/*!40000 ALTER TABLE `clinic_images` DISABLE KEYS */;
INSERT INTO `clinic_images` VALUES (4,4,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1523453652.jpeg','2018-04-11 13:34:12','2018-04-11 13:34:12'),(5,4,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1523453652.jpeg','2018-04-11 13:34:12','2018-04-11 13:34:12'),(6,5,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1523454111.jpg','2018-04-11 13:41:51','2018-04-11 13:41:51'),(31,6,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15243287371827120972.jpeg','2018-04-21 16:38:57','2018-04-21 16:38:57'),(32,6,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1524328737912951871.jpeg','2018-04-21 16:38:57','2018-04-21 16:38:57'),(34,13,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15243991751542840438.PNG','2018-04-22 12:12:55','2018-04-22 12:12:55'),(35,13,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1524399175146675671.png','2018-04-22 12:12:55','2018-04-22 12:12:55'),(36,14,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15244698781851560163.jpg','2018-04-23 07:51:18','2018-04-23 07:51:18'),(37,14,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15244698781900951207.jpg','2018-04-23 07:51:18','2018-04-23 07:51:18'),(38,14,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15244698781387522569.jpg','2018-04-23 07:51:18','2018-04-23 07:51:18'),(39,14,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1524469878623967547.jpg','2018-04-23 07:51:18','2018-04-23 07:51:18'),(50,1,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15251459721804043775.jpg','2018-05-01 03:39:32','2018-05-01 03:39:32'),(51,1,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1525145972467448667.jpg','2018-05-01 03:39:32','2018-05-01 03:39:32'),(52,1,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/1525145972380938543.jpg','2018-05-01 03:39:32','2018-05-01 03:39:32'),(53,8,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15251708131460920509.jpg','2018-05-01 10:33:33','2018-05-01 10:33:33'),(55,8,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15251708131422313646.jpg','2018-05-01 10:33:33','2018-05-01 10:33:33'),(56,8,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15251709802017574888.jpg','2018-05-01 10:36:20','2018-05-01 10:36:20'),(57,10,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/clinic_images/15252693962052744504.jpg','2018-05-02 13:56:36','2018-05-02 13:56:36');
/*!40000 ALTER TABLE `clinic_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_clinics`
--

DROP TABLE IF EXISTS `doctor_clinics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_clinics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_clinics`
--

LOCK TABLES `doctor_clinics` WRITE;
/*!40000 ALTER TABLE `doctor_clinics` DISABLE KEYS */;
INSERT INTO `doctor_clinics` VALUES (1,1,'123456','0',NULL,'2018-04-25 15:35:17'),(2,13,NULL,NULL,'2018-04-08 03:11:23','2018-04-08 03:11:23'),(3,1,NULL,NULL,'2018-04-11 07:31:58','2018-04-11 07:31:58'),(4,3,NULL,NULL,'2018-04-11 13:32:35','2018-04-11 13:32:35'),(5,4,NULL,NULL,'2018-04-11 13:38:47','2018-04-11 13:38:47'),(6,6,'asdfg',NULL,'2018-04-11 14:38:31','2018-04-21 08:02:56'),(7,7,NULL,NULL,'2018-04-11 15:29:49','2018-04-11 15:29:49'),(8,11,'ABC1000',NULL,'2018-04-13 04:45:48','2018-04-26 15:39:29'),(9,13,NULL,NULL,'2018-04-14 19:15:21','2018-04-14 19:15:21'),(10,14,'4456',NULL,'2018-04-15 06:11:47','2018-05-02 13:56:36'),(11,15,NULL,NULL,'2018-04-15 15:38:54','2018-04-15 15:38:54'),(12,19,NULL,NULL,'2018-04-21 00:49:18','2018-04-21 00:49:18'),(13,20,NULL,NULL,'2018-04-22 11:48:34','2018-04-22 11:48:34'),(14,21,'CB100',NULL,'2018-04-23 07:46:14','2018-04-23 07:51:18'),(15,24,NULL,NULL,'2018-04-25 13:39:35','2018-04-25 13:39:35'),(16,25,NULL,NULL,'2018-05-02 12:31:28','2018-05-02 12:31:28'),(17,26,NULL,NULL,'2018-05-03 18:15:07','2018-05-03 18:15:07'),(18,28,NULL,NULL,'2018-05-05 14:56:54','2018-05-05 14:56:54'),(19,29,NULL,NULL,'2018-05-05 15:01:17','2018-05-05 15:01:17'),(20,31,NULL,NULL,'2018-05-07 19:43:56','2018-05-07 19:43:56'),(21,33,NULL,NULL,'2018-05-15 14:47:13','2018-05-15 14:47:13'),(22,37,NULL,NULL,'2018-05-23 13:08:11','2018-05-23 13:08:11'),(23,44,NULL,NULL,'2018-05-25 16:32:31','2018-05-25 16:32:31'),(24,45,NULL,NULL,'2018-05-25 16:37:31','2018-05-25 16:37:31'),(25,46,NULL,NULL,'2018-05-25 16:39:32','2018-05-25 16:39:32'),(26,47,NULL,NULL,'2018-05-25 16:42:18','2018-05-25 16:42:18'),(27,50,NULL,NULL,'2018-06-01 15:00:27','2018-06-01 15:00:27'),(28,51,NULL,NULL,'2018-06-02 18:01:08','2018-06-02 18:01:08'),(29,53,NULL,NULL,'2018-06-03 13:09:41','2018-06-03 13:09:41');
/*!40000 ALTER TABLE `doctor_clinics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_specializations`
--

DROP TABLE IF EXISTS `doctor_specializations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_specializations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_specializations`
--

LOCK TABLES `doctor_specializations` WRITE;
/*!40000 ALTER TABLE `doctor_specializations` DISABLE KEYS */;
INSERT INTO `doctor_specializations` VALUES (3,3,12,'2018-04-11 13:34:12','2018-04-11 13:34:12'),(4,3,22,'2018-04-11 13:34:12','2018-04-11 13:34:12'),(40,20,3,'2018-04-22 12:13:04','2018-04-22 12:13:04'),(44,21,2,'2018-04-23 07:53:37','2018-04-23 07:53:37'),(45,21,3,'2018-04-23 07:53:37','2018-04-23 07:53:37'),(46,21,5,'2018-04-23 07:53:37','2018-04-23 07:53:37'),(98,1,3,'2018-05-01 03:39:32','2018-05-01 03:39:32'),(99,1,4,'2018-05-01 03:39:32','2018-05-01 03:39:32'),(102,11,3,'2018-05-01 10:36:20','2018-05-01 10:36:20'),(105,14,55,'2018-05-03 12:52:52','2018-05-03 12:52:52'),(106,6,2,'2018-05-10 09:33:40','2018-05-10 09:33:40'),(107,6,3,'2018-05-10 09:33:40','2018-05-10 09:33:40'),(108,6,4,'2018-05-10 09:33:40','2018-05-10 09:33:40'),(117,4,3,'2018-06-12 18:17:14','2018-06-12 18:17:14'),(118,4,5,'2018-06-12 18:17:14','2018-06-12 18:17:14');
/*!40000 ALTER TABLE `doctor_specializations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operational_days1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operational_days2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1_timing` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2_timing` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consultation_fee` float(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,1,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1524245469.jpg','708162885','12345','MBBS','','','Vishal Khand 1, Gomti Nagar, Lucknow, Uttar Pradesh, India','Monday,Tuesday,Wednesday','Vishal Khand 2, Gomti Nagar, Lucknow, Uttar Pradesh, India','Thusrday,Friday,Saturday','9:30 PM','9:30 PM',NULL,'2018-04-11 07:31:58','2018-05-01 03:01:36'),(2,3,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1523453652.jpg','7524831604',NULL,NULL,'lucknow','','A4/32 Sulabh Awas , Gomti Nagar Extension','Tuesday,Thusrday','Gopal Nagar Street No. 2, Dhebar Road South, Gopal Nagar, Bhakti Nagar, Rajkot, Gujarat, India','Tuesday,Thusrday,Saturday',NULL,NULL,NULL,'2018-04-11 13:32:35','2018-04-11 13:34:12'),(3,4,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1523454111.jpg','123457890',NULL,'MBBS','gomati nagar','226010','Lucknow, Uttar Pradesh, India','Monday,Tuesday','Lucknow, Uttar Pradesh, India','Tuesday',NULL,NULL,12.00,'2018-04-11 13:38:47','2018-06-12 18:17:14'),(4,6,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1524328737.jpeg','9451661251',NULL,'MS','','','Telibagh Chauraha, Sainik Nagar, Telibagh, Lucknow, Uttar Pradesh',NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-11 14:38:31','2018-05-10 09:33:40'),(5,7,NULL,'8527080083',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-11 15:29:49','2018-04-11 15:29:49'),(6,11,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1523595286.jpg','7524831604',NULL,'MBBS','','','275 radhikapuri','Monday','Sulabh Awas Yojana, Sector 1, Gomti Nagar, Lucknow, Uttar Pradesh, India','Friday',NULL,NULL,NULL,'2018-04-13 04:45:48','2018-05-01 10:33:33'),(7,13,NULL,'8382095349',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-14 19:15:21','2018-04-14 19:15:21'),(8,14,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1525269396.jpg','1234456789',NULL,'10','','','Varanasi Cantt, Varanasi, Uttar Pradesh, India',NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-15 06:11:47','2018-05-02 13:56:36'),(9,15,NULL,'7080644154',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-15 15:38:54','2018-04-15 15:38:54'),(10,19,NULL,'9876543210',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-21 00:49:18','2018-04-21 00:49:18'),(11,20,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1524399175.png','1234567890',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-22 11:48:34','2018-04-22 12:12:55'),(12,21,'http://ec2-13-126-124-46.ap-south-1.compute.amazonaws.com/images/doctors_images/1524469878.jpg','8604553670',NULL,NULL,'','','Sulabh Awas Yojana, Sector 1, Gomti Nagar, Lucknow, Uttar Pradesh, India',NULL,'Jagriti Vihar, Kalyanpur, Lucknow, Uttar Pradesh, India',NULL,NULL,NULL,NULL,'2018-04-23 07:46:14','2018-04-23 07:51:18'),(13,24,NULL,'9451661251',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-25 13:39:35','2018-04-25 13:39:35'),(14,25,NULL,'7275088332',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-02 12:31:28','2018-05-02 12:31:28'),(15,26,NULL,'9451661251',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-03 18:15:07','2018-05-03 18:15:07'),(16,28,NULL,'7081628885',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-05 14:56:54','2018-05-05 14:56:54'),(17,29,NULL,'7081628885',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-05 15:01:17','2018-05-05 15:01:17'),(18,31,NULL,'9598984534',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-07 19:43:56','2018-05-07 19:43:56'),(19,33,NULL,'8090208003',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-15 14:47:13','2018-05-15 14:47:13'),(20,37,NULL,'8750107292',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-23 13:08:11','2018-05-23 13:08:11'),(21,44,NULL,'70816288856',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-25 16:32:31','2018-05-25 16:32:31'),(22,45,NULL,'7081628886',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-25 16:37:31','2018-05-25 16:37:31'),(23,46,NULL,'7081628886',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-25 16:39:32','2018-05-25 16:39:32'),(24,47,NULL,'7081628886',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-25 16:42:18','2018-05-25 16:42:18'),(25,50,NULL,'7418529631',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-01 15:00:27','2018-06-01 15:00:27'),(26,51,NULL,'8563654125',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-02 18:01:08','2018-06-02 18:01:08'),(27,53,NULL,'9940179687',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-03 13:09:41','2018-06-03 13:09:41');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_29_062053_create_pateints_table',1),(4,'2018_03_29_062109_create_doctors_table',1),(5,'2018_03_29_062948_create_clinic_images_table',1),(6,'2018_03_29_063009_create_doctor_addresses_table',1),(7,'2018_03_29_063136_create_specializations_table',1),(8,'2018_03_29_063331_create_doctor_specializations_table',1),(9,'2018_03_29_064812_create_doctor_clinics_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) unsigned NOT NULL,
  `receiver_id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_sender_id_foreign` (`sender_id`),
  KEY `notifications_receiver_id_foreign` (`receiver_id`),
  CONSTRAINT `notifications_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operational_days`
--

DROP TABLE IF EXISTS `operational_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operational_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `day_type` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `from_time` varchar(255) NOT NULL,
  `to_time` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operational_days`
--

LOCK TABLES `operational_days` WRITE;
/*!40000 ALTER TABLE `operational_days` DISABLE KEYS */;
INSERT INTO `operational_days` VALUES (36,20,1,'Monday','00:12','00:12','2018-04-22 12:13:04','2018-04-22 12:13:04'),(42,21,1,'Monday','10:01','14:00','2018-04-23 07:53:37','2018-04-23 07:53:37'),(43,21,1,'Tuesday','10:00','14:00','2018-04-23 07:53:37','2018-04-23 07:53:37'),(44,21,1,'Wednesday','10:00','14:00','2018-04-23 07:53:37','2018-04-23 07:53:37'),(45,21,2,'Thusrday','10:00','14:00','2018-04-23 07:53:37','2018-04-23 07:53:37'),(46,21,2,'Friday','10:00','22:00','2018-04-23 07:53:37','2018-04-23 07:53:37'),(150,1,1,'Tuesday','11:11','11:11','2018-05-01 03:39:32','2018-05-01 03:39:32'),(151,1,1,'Monday','11:11','11:11','2018-05-01 03:39:32','2018-05-01 03:39:32'),(152,1,1,'Tuesday','11:11','11:11','2018-05-01 03:39:32','2018-05-01 03:39:32'),(153,1,2,'Monday','00:12','00:12','2018-05-01 03:39:32','2018-05-01 03:39:32'),(154,1,2,'Monday','00:12','00:12','2018-05-01 03:39:32','2018-05-01 03:39:32'),(159,11,1,'Monday','15:00','17:00','2018-05-01 10:36:20','2018-05-01 10:36:20'),(160,11,2,'Tuesday','15:00','17:00','2018-05-01 10:36:20','2018-05-01 10:36:20'),(165,14,1,'Monday','13:02','08:09','2018-05-03 12:52:52','2018-05-03 12:52:52'),(166,14,2,'Tuesday','00:34','02:34','2018-05-03 12:52:53','2018-05-03 12:52:53'),(167,6,1,'Monday','09:13','21:13','2018-05-10 09:33:40','2018-05-10 09:33:40'),(168,6,1,'Monday','10:00','13:00','2018-05-10 09:33:40','2018-05-10 09:33:40'),(169,6,1,'Tuesday','02:05','16:09','2018-05-10 09:33:40','2018-05-10 09:33:40'),(170,6,1,'Monday','10:08','22:08','2018-05-10 09:33:40','2018-05-10 09:33:40'),(175,4,1,'Monday','00:12','00:12','2018-06-12 18:17:14','2018-06-12 18:17:14');
/*!40000 ALTER TABLE `operational_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('raghugkp10@gmail.com','2106730253','emailVerify',NULL),('raghugkp10@gmail.com','290694707','emailVerify',NULL),('raghugkp10@gmail.com','51963098','emailVerify',NULL);
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `profile_pic` int(11) DEFAULT NULL,
  `primary_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,2,NULL,'7985931095',NULL,'2018-04-11 07:42:41','2018-04-11 07:42:41'),(2,5,NULL,'9984942814',NULL,'2018-04-11 13:39:36','2018-04-11 13:39:36'),(3,8,NULL,'8604553670',NULL,'2018-04-12 08:21:25','2018-04-12 08:21:25'),(4,9,NULL,'8726050322',NULL,'2018-04-12 18:00:59','2018-04-12 18:00:59'),(5,10,NULL,'9005905799',NULL,'2018-04-13 04:40:08','2018-04-13 04:40:08'),(6,12,NULL,'9889009596',NULL,'2018-04-14 08:21:20','2018-04-14 08:21:20'),(7,16,NULL,'7080644154',NULL,'2018-04-15 15:41:57','2018-04-15 15:41:57'),(8,18,NULL,'8527080083',NULL,'2018-04-20 03:37:05','2018-04-20 03:37:05'),(9,22,NULL,'7524831604',NULL,'2018-04-23 08:00:37','2018-04-23 08:00:37'),(10,23,NULL,'9451661251',NULL,'2018-04-25 13:32:47','2018-04-25 13:32:47'),(11,27,NULL,'9451661251',NULL,'2018-05-04 12:44:33','2018-05-04 12:44:33'),(12,30,NULL,'7081628885',NULL,'2018-05-05 15:12:47','2018-05-05 15:12:47'),(13,32,NULL,'9598984534',NULL,'2018-05-07 19:45:12','2018-05-07 19:45:12'),(14,34,NULL,'8090208003',NULL,'2018-05-15 14:47:30','2018-05-15 14:47:30'),(15,35,NULL,'9876549876',NULL,'2018-05-15 14:49:01','2018-05-15 14:49:01'),(16,36,NULL,'7786907538',NULL,'2018-05-23 13:04:52','2018-05-23 13:04:52'),(17,38,NULL,'7905381377',NULL,'2018-05-23 13:22:11','2018-05-23 13:22:11'),(18,39,NULL,'79053813771',NULL,'2018-05-23 13:23:48','2018-05-23 13:23:48'),(19,40,NULL,'79053813772',NULL,'2018-05-23 13:26:51','2018-05-23 13:26:51'),(20,41,NULL,'79053813773',NULL,'2018-05-23 13:30:35','2018-05-23 13:30:35'),(21,42,NULL,'gtfrdeswaq',NULL,'2018-05-23 13:31:56','2018-05-23 13:31:56'),(22,43,NULL,'hbgvfcdxsz',NULL,'2018-05-23 14:11:39','2018-05-23 14:11:39'),(23,48,NULL,'Fgtdsddfgg',NULL,'2018-05-25 18:18:35','2018-05-25 18:18:35'),(24,49,NULL,'8787090152',NULL,'2018-05-31 13:16:05','2018-05-31 13:16:05'),(25,52,NULL,'9454412497',NULL,'2018-06-03 05:51:43','2018-06-03 05:51:43'),(26,54,NULL,'9884210039',NULL,'2018-06-03 13:14:44','2018-06-03 13:14:44'),(27,55,NULL,'9695436581',NULL,'2018-06-03 13:35:14','2018-06-03 13:35:14'),(28,56,NULL,'7418529632',NULL,'2018-06-03 13:41:43','2018-06-03 13:41:43'),(29,57,NULL,'7418529634',NULL,'2018-06-03 13:43:17','2018-06-03 13:43:17'),(30,58,NULL,'7418529635',NULL,'2018-06-03 13:44:05','2018-06-03 13:44:05'),(31,59,NULL,'8840340267',NULL,'2018-06-04 06:25:32','2018-06-04 06:25:32');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redeem_codes`
--

DROP TABLE IF EXISTS `redeem_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redeem_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `is_used` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redeem_codes`
--

LOCK TABLES `redeem_codes` WRITE;
/*!40000 ALTER TABLE `redeem_codes` DISABLE KEYS */;
INSERT INTO `redeem_codes` VALUES (1,'SATYAMEA03',NULL,0,NULL,0,'2018-04-11 16:46:14','2018-04-13 05:42:45'),(5,'AJAYAH0A',NULL,9,NULL,0,'2018-04-12 18:02:57','2018-04-12 18:02:57'),(6,'AJAYGZVN',NULL,9,NULL,0,'2018-04-12 18:02:57','2018-04-12 18:02:57'),(7,'AJAYPZ8T',NULL,9,NULL,0,'2018-04-12 18:02:57','2018-04-12 18:02:57'),(8,'AJAYITFT',NULL,9,NULL,0,'2018-04-12 18:02:57','2018-04-12 18:02:57'),(9,'SANDEEPLMMR',NULL,10,NULL,0,'2018-04-13 04:40:53','2018-04-13 04:40:53'),(10,'SANDEEPIB4T',NULL,10,11,1,'2018-04-13 04:40:53','2018-04-14 02:57:00'),(11,'SANDEEPJSCT',NULL,10,11,1,'2018-04-13 04:40:53','2018-04-13 04:56:55'),(12,'SANDEEPS0YL',NULL,10,11,1,'2018-04-13 04:40:53','2018-04-13 04:55:22'),(13,'SATYAM1FQI',NULL,2,NULL,0,'2018-04-13 05:44:04','2018-04-13 05:44:04'),(14,'SATYAMBZMB',NULL,2,NULL,0,'2018-04-13 05:44:04','2018-04-13 05:44:04'),(15,'SATYAMAIBO',NULL,2,NULL,0,'2018-04-13 05:44:04','2018-04-13 05:44:04'),(16,'SATYAMEVXL',NULL,2,1,1,'2018-04-13 05:44:04','2018-04-13 16:00:23'),(17,'ANSHZ6P',NULL,12,NULL,0,'2018-04-14 08:22:09','2018-04-14 08:22:09'),(18,'ANSHYDHA',NULL,12,NULL,0,'2018-04-14 08:22:09','2018-04-14 08:22:09'),(19,'ANSHW9IZ',NULL,12,NULL,0,'2018-04-14 08:22:09','2018-04-14 08:22:09'),(20,'ANSH8GBP',NULL,12,NULL,0,'2018-04-14 08:22:09','2018-04-14 08:22:09'),(21,'JONBACH',NULL,16,NULL,0,'2018-04-15 15:43:47','2018-04-15 15:43:47'),(22,'JONDZUE',NULL,16,NULL,0,'2018-04-15 15:43:47','2018-04-15 15:43:47'),(23,'JONBFXD',NULL,16,NULL,0,'2018-04-15 15:43:47','2018-04-15 15:43:47'),(24,'JONQEGA',NULL,16,NULL,0,'2018-04-15 15:43:47','2018-04-15 15:43:47'),(25,'RISHABHY65N',NULL,23,6,1,'2018-05-04 12:42:22','2018-05-10 09:34:52'),(26,'RISHABHYRTT',NULL,23,NULL,0,'2018-05-04 12:42:22','2018-05-04 12:42:22'),(27,'RISHABHG9JS',NULL,23,NULL,0,'2018-05-04 12:42:22','2018-05-04 12:42:22'),(28,'RISHABHB2LY',NULL,23,NULL,0,'2018-05-04 12:42:22','2018-05-04 12:42:22'),(29,'PANKAJ5NJE',NULL,49,NULL,0,'2018-05-31 13:21:01','2018-05-31 13:21:01'),(30,'PANKAJINM',NULL,49,NULL,0,'2018-05-31 13:21:01','2018-05-31 13:21:01'),(31,'PANKAJDHRI',NULL,49,NULL,0,'2018-05-31 13:21:01','2018-05-31 13:21:01'),(32,'PANKAJGYF1',NULL,49,NULL,0,'2018-05-31 13:21:01','2018-05-31 13:21:01');
/*!40000 ALTER TABLE `redeem_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specializations`
--

DROP TABLE IF EXISTS `specializations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specializations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specializations`
--

LOCK TABLES `specializations` WRITE;
/*!40000 ALTER TABLE `specializations` DISABLE KEYS */;
INSERT INTO `specializations` VALUES (2,'cardiologist',NULL,NULL),(3,'physician',NULL,NULL),(4,'obstetrics and gynecology infertility',NULL,NULL),(5,'pulmonologist and sleep specialist',NULL,NULL),(6,'cosmetic and plastic surgery',NULL,NULL),(7,'cosmetic dentist & endodontist',NULL,NULL),(8,'cosmetic plastic surgery',NULL,NULL),(9,'dental surgeon',NULL,NULL),(10,'dermatolight',NULL,NULL),(11,'dermatologist & cosmetologist',NULL,NULL),(12,'dematologist ',NULL,NULL),(13,'dermatology,cosmetic surgeon',NULL,NULL),(14,'dermatology',NULL,NULL),(15,'venerolog',NULL,NULL),(16,'leprosy',NULL,NULL),(17,'diabetologist',NULL,NULL),(18,'diabetologist and physician',NULL,NULL),(19,'ENT',NULL,NULL),(20,'endodontia(root canal)',NULL,NULL),(21,'endodontist & aesthetic dentistry',NULL,NULL),(22,'ENT & head neck surgery',NULL,NULL),(23,'ENT surgeon',NULL,NULL),(24,'eye surgeon',NULL,NULL),(25,'female urology',NULL,NULL),(26,'gastro intestinal surgery',NULL,NULL),(27,'gastroenterology',NULL,NULL),(28,'gastrophsician',NULL,NULL),(29,'general physician',NULL,NULL),(30,'general practioner',NULL,NULL),(31,'general surgery',NULL,NULL),(32,'genetics',NULL,NULL),(33,'gynaecology & infertility',NULL,NULL),(34,'gynaecologist',NULL,NULL),(35,'hear ailments',NULL,NULL),(36,'hematology',NULL,NULL),(37,'homeopathic consultant',NULL,NULL),(38,'homeo physician consultant',NULL,NULL),(39,'homeopthic paediatrician & yoga therapist',NULL,NULL),(40,'hormone problem ',NULL,NULL),(41,'implantalogist',NULL,NULL),(42,'infertility specialist',NULL,NULL),(43,'laparoscopic , general surgery',NULL,NULL),(44,'oncosurgery',NULL,NULL),(45,'endoscopy',NULL,NULL),(46,'laparoscopic urology',NULL,NULL),(47,'laparoscopic surgeon',NULL,NULL),(48,'maxiaaofacial surgeon ',NULL,NULL),(49,'nephrologist',NULL,NULL),(50,'neuro surgeon',NULL,NULL),(51,'neurological surgery',NULL,NULL),(52,'neuropsychiatry',NULL,NULL),(53,'obstetician',NULL,NULL),(54,'oncology',NULL,NULL),(55,'ophthalmology',NULL,NULL),(56,'oral & maxillofacial pathology',NULL,NULL),(57,'oral &maxillofacial surgeon',NULL,NULL),(58,'oral implantology ',NULL,NULL),(59,'orthpaedic surgeon',NULL,NULL),(60,'orthodontist',NULL,NULL),(61,'orthopedician',NULL,NULL),(62,'paediatrician ',NULL,NULL),(63,'pediatrics',NULL,NULL),(64,'pedodontics',NULL,NULL),(65,'periodontist',NULL,NULL),(66,'physiotherapist',NULL,NULL),(67,'plastic and cosmetic surgery',NULL,NULL),(68,'podiatric surgeon',NULL,NULL),(69,'prosthodontics',NULL,NULL),(70,'prosthodontics & implantologist',NULL,NULL),(71,'psychiatrist',NULL,NULL),(72,'psychiatry',NULL,NULL),(73,'psychotherapy',NULL,NULL),(74,'radiologist',NULL,NULL),(75,'radio therapy',NULL,NULL),(76,'senior consultant neurologist',NULL,NULL),(77,'sonology',NULL,NULL),(78,'speech and hearing',NULL,NULL),(79,'spondylitis',NULL,NULL),(80,'thoracic surgery',NULL,NULL),(81,'sonologist',NULL,NULL),(82,'ultrasonologist',NULL,NULL),(83,'accupressure',NULL,NULL),(84,'allergy',NULL,NULL),(85,'asthma',NULL,NULL),(86,'immunology',NULL,NULL),(87,'anaesthesiology',NULL,NULL),(88,'critical care & pain medicine',NULL,NULL),(89,'audiometry',NULL,NULL),(90,'cardio thoracic surgery',NULL,NULL),(91,'vascular surgery',NULL,NULL),(92,'cardiothoracic',NULL,NULL),(93,'clinical psychology',NULL,NULL),(94,'conservative dentistry',NULL,NULL),(95,'endodontist',NULL,NULL),(96,'cancer',NULL,NULL),(97,'consultant cosmetologist',NULL,NULL),(98,'consultant pediatrician',NULL,NULL),(99,'consultant radiologist',NULL,NULL),(100,'cosmetic dentist implantologist',NULL,NULL),(101,'diabetes',NULL,NULL),(102,'diabetologist  ',NULL,NULL),(103,'diabetelogy',NULL,NULL),(104,'endocrinologist',NULL,NULL),(105,'ENT',NULL,NULL),(106,'eye consultant',NULL,NULL),(107,'fertility specialist',NULL,NULL),(108,'gynaecologist',NULL,NULL),(109,'gastroentero ',NULL,NULL),(110,'endoscopy',NULL,NULL),(111,'hepatology',NULL,NULL),(112,'gen surgery',NULL,NULL),(113,'general denstistry',NULL,NULL),(114,'hand and micro vascular surgeon',NULL,NULL),(115,'heart',NULL,NULL),(116,'intensivist',NULL,NULL),(117,'interventional cardiologist',NULL,NULL),(118,'laparoscopic surgeon',NULL,NULL),(119,'laser dentistry',NULL,NULL),(120,'nephrology',NULL,NULL),(121,'neuro surgery',NULL,NULL),(122,'ophthalmologist',NULL,NULL),(123,'arthroscopy surgeon',NULL,NULL),(124,'prosthodontist',NULL,NULL),(125,'pulmonologist',NULL,NULL),(126,'RCT crowns ',NULL,NULL),(127,'bridges implants',NULL,NULL),(128,'sexologist',NULL,NULL),(129,'skin veneral diseases',NULL,NULL),(130,'transplant surgeon',NULL,NULL),(131,'urologist',NULL,NULL),(132,'veterinary',NULL,NULL),(133,'acute and chronic diseases',NULL,NULL),(134,'anaesthesiologist',NULL,NULL),(135,'andrology',NULL,NULL),(136,'brain and spine surgery',NULL,NULL),(137,'brain and spine neurosurgery',NULL,NULL),(138,'tuberculosis',NULL,NULL),(139,'consultant for women',NULL,NULL),(140,'consultant for child',NULL,NULL),(141,'hair  transplant',NULL,NULL),(142,'dermatologist',NULL,NULL),(143,'cosmetologist',NULL,NULL),(144,'dietician',NULL,NULL),(145,'fetal medicine specialist',NULL,NULL),(146,'gastroenterohepatologist',NULL,NULL),(147,'neonatologist',NULL,NULL),(148,'neuro psychiatrist',NULL,NULL),(149,'thyroid cancer',NULL,NULL),(150,'radioiodine therapy',NULL,NULL),(151,'hyperthyroidism therapy',NULL,NULL),(152,'joint replacement surgeon',NULL,NULL),(153,'trauma',NULL,NULL),(154,'otolaryngology',NULL,NULL),(155,'piles',NULL,NULL),(156,'fistula',NULL,NULL),(157,'prosthetics',NULL,NULL),(158,'qastroenterologist',NULL,NULL),(159,'rheumatologist',NULL,NULL),(160,'skin allergy',NULL,NULL),(161,'tympanometry',NULL,NULL),(162,'spine surgery',NULL,NULL),(163,'surgical oncology',NULL,NULL),(164,'andrologist',NULL,NULL),(165,'bariatric surgeon',NULL,NULL),(166,'breast surgeon',NULL,NULL),(167,'liver transplant specialist',NULL,NULL),(168,'neclear medicine specialist',NULL,NULL),(169,'robotic surgeon',NULL,NULL),(170,'vascular surgeon',NULL,NULL);
/*!40000 ALTER TABLE `specializations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `auth_token` int(11) DEFAULT NULL,
  `is_mobile_verified` int(11) NOT NULL DEFAULT '0',
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_profile_completed` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','$2y$10$7Xw3UnSDJZdYcKL5GqbXF.lGNkKT5WSG8.CrOtvfuJao41UOTLyY2',0,NULL,1,NULL,1,1,'vFaZ1DkTHaKP5xATWqNs3sHMKs2YFtR1fJzoxIVYQUErmKKBwQo52aD9idtU','2018-04-11 07:31:58','2018-04-11 07:41:31'),(2,'Satyam sri','satyam@gmail.com','$2y$10$SRdX3pVrRpxZUlmhdEHV/uLnqW054IXPsAcbNCDor0HnKZnGRVgYy',2,NULL,1,NULL,0,1,'GrrFJZrzvqbhZn5rrlbBPsXczfaS2fU9yuzLbSxb22hM0HyMgGA7tFuTOvH5','2018-04-11 07:42:41','2018-04-13 05:44:04'),(3,'Hugh Jackman','hugh@gmail.com','$2y$10$qN6.zU47Sjllx/9nK3Y1B.EvDFk527Bal9YKukxYc/Oj/V29JfaZG',1,NULL,0,NULL,0,1,'U60AfHwDQ3F9mqSepVbFTp99hT3gMDXpTxG9gvbllcA8FGiPL2ZTlSrY1GPM','2018-04-11 13:32:35','2018-05-21 14:30:12'),(4,'Ajay Kumar','ajay@gmail.com','$2y$10$1SMvdtF/3XABlI5jUs94ueG8m/hnIPsG5UCmOqmwYGMVvVKXeINfe',1,NULL,0,NULL,1,1,'68RV47mBTdB9UKFKqPujoSf1l0J3oIsUBDJwLGzTcl889EcjSRTfeIJLJ1w5','2018-04-11 13:38:47','2018-05-24 17:44:39'),(5,'Harvey','harvey@gmail.com','$2y$10$LRatojwfInu.luggAjgs3.pJ65Z9jJ8bLBPVf08HswI52N20iGaN.',2,NULL,0,NULL,0,1,'jTr3l3yoLMLbAz6lDrsRZqaJYtYDktzxAvqRBYHp0y2vZwDSJFykBZicBwSJ','2018-04-11 13:39:36','2018-04-11 13:39:50'),(6,'rishabh','abc@xyz.com','$2y$10$B5CcAvx78zO7.INfhjnWceCZykszC.aVws/LeYVVYh.Em3ABsvdZ.',1,NULL,0,NULL,1,1,'e6P4wWLBJDpbnr6bgTSyOuEndZjBMg8yqXpCWlwNjfebTxULNJhly1Nkzqvy','2018-04-11 14:38:31','2018-05-29 17:26:21'),(7,'Roushan','roushansam@gmail.com','$2y$10$Gs5Iy1vfvnn7.kHR72a7Q.dUx34a3hyyNRxjIXSUG6lSZo1sb2CUC',1,NULL,0,NULL,0,0,NULL,'2018-04-11 15:29:49','2018-04-11 15:29:49'),(8,'Diksha Singh','chandan.s2s@outlook.com','$2y$10$15eytOLFu9MlhxHhQegRm.3BZFZvJkGFpeCVO17jWTGdMJmpKLcFW',2,NULL,0,NULL,0,1,NULL,'2018-04-12 08:21:25','2018-04-12 08:22:13'),(9,'ajay','ajay1@gmail.com','$2y$10$4C6T96uj7unkv/PNrVUSUeZ0WgrCVUxdz0jnkB0c2VGJa1RccWtB6',2,NULL,1,NULL,0,1,'xLhQTmeL39wvmOYUubVlRPEalsV0K5BxqQIwedqQ0K47QKIYRwXXBn8l33qa','2018-04-12 18:00:59','2018-04-12 18:02:57'),(10,'Sandeep singh','sandysingh.9005@gmail.com','$2y$10$bGxQSMDRruFP2RO3rABEOud/aAfnIrMP3wEspdnP7r9kp/OtfTNfi',2,NULL,1,NULL,1,1,'EcbS8YiTaObMBF6nuilT6gCikGC2yyuK8uXJIxbb64ssybkTfOZKNnQ5kHVe','2018-04-13 04:40:08','2018-05-28 08:29:20'),(11,'Sandy singh','sandysingh.8765@outlook.com','$2y$10$6vCgaT5/wEFye2SibruqM./9ED8U/zUxmGR1HIT0Zbk9jP7hRc.Im',1,NULL,0,NULL,1,1,'tCvJ8YWNku9iIK8RP5bgm0f3PED0HO7iRjJI4DS5monvrQM6D0MutMi4s1pK','2018-04-13 04:45:48','2018-05-28 08:25:38'),(12,'ANSH','itzmeansh@gmail.com','$2y$10$2dNA/NdW7DwwX0sSX8C/n.SEd0ge.ZXJp0o59ImGeVdwon82VFvyO',2,NULL,1,NULL,0,1,'41jKH6d8iCazP5g0Sur1JKu6ji4S7Rxqcq1v2lmLy27wUBKgpKhTpBNqgEXP','2018-04-14 08:21:20','2018-04-14 08:22:09'),(13,'Diwaker','diwaker@gmail.com','$2y$10$q3nJUhugw.aizJ1c8dSM2OzbBld8JJk/MTvJwmkFuJZVM4aWqg0jK',1,NULL,0,NULL,0,0,NULL,'2018-04-14 19:15:21','2018-04-14 19:15:21'),(14,'admin','meher128@gmail.com','$2y$10$53JYxnEa.rJ4neIrxd.pIu1F89XXRTqmIZLbkGQYsHeuP5D6CVeqO',1,NULL,0,NULL,0,1,'0B9uLROVdvPtCVn80hJ3GlzG5sm6D0JEDyujVYuPvbY9UbSEdYamn0ItUuNZ','2018-04-15 06:11:47','2018-05-02 13:56:36'),(15,'kunwar deepankar','kdchandra406@GMAIL.COM','$2y$10$eCPyIFAIQr6QMsvRutnQaOIsv1wQQmio2M4W/OnKPVXRBVxia9YpC',1,NULL,0,NULL,0,0,'bUjjn1kgNkR55OuqBOZtMosGaxYRnoCr30rrPmFWCKePeM9QACbvlz8PiYfB','2018-04-15 15:38:54','2018-04-15 15:38:54'),(16,'jon snow','annumaniakzzz@gmail.com','$2y$10$rfiOJxVTTC/cGf4bUuQQEOtPAMzPm5oAVMDWlAJf6YuvWXuWSA6eW',2,NULL,1,NULL,0,1,'2BDshM0XvD6pBrSjiDSzxqsULBch2jQs73eT0YarJUVGWgdmVmmBfrEiF1D1','2018-04-15 15:41:57','2018-04-15 15:43:47'),(18,'Roushan','namita.ch099@gmail.com','$2y$10$a/RnmqiNCBXaun35C.6lp.3hmMGWiTPfs96sUuKoZL/1Mu11xsGQm',2,NULL,0,NULL,0,0,NULL,'2018-04-20 03:37:05','2018-04-20 03:37:05'),(19,'Parvez','parvez@hotmail.com','$2y$10$EHF9.ngtyFErNdPOrENhGOhEqQIhgv.u9a/fBcuYpjRp0yuE/b8fO',1,NULL,0,NULL,0,0,'dG2Y8cAzyoq6SZXW0Ea6FTUN2n9GXEG39VGdLjAYa8Iqwnb9Wrr9PH19BP2l','2018-04-21 00:49:18','2018-04-21 00:49:18'),(20,'Vikas','vikas@gmail.com','$2y$10$qssoKyro/vqfqlRNK0ZizO/R7xuBVcC1SZqB5Kh1h8S0wWeboqA22',1,NULL,0,NULL,0,1,'zABqEQiGYa4S5l6AYCoTcczjRLlYDAEOuT8TduqRU1F7pw2voJJfbCxBHcDn','2018-04-22 11:48:34','2018-04-22 12:12:55'),(21,'Chandan Singh','chandan@outlook.com','$2y$10$YrHz9lNfJqfJMAu13L5RqOOBfo5yWLYHK85.o9UeBV2JTzHae8.ii',1,NULL,0,NULL,0,1,'UeM7ivJEqgpzuRmDMRMi4JOq1S3T1FrjNzL5v00Bn4GStGWPTghlLXqLLh92','2018-04-23 07:46:14','2018-04-23 07:51:18'),(22,'CHANDAN','ted@himym.com','$2y$10$rKHe3oGOSqgV6VXXQ1yZhenb3I/VFIRn1I1sfI2fqoGiVYZXZfgWi',2,NULL,0,'7259',0,1,NULL,'2018-04-23 08:00:37','2018-04-23 08:01:13'),(23,'rishabh','asdf@qwer.com','$2y$10$FBoJN8lR9/ExSramBe.6k.LYyXFRvI4j4YnFbay4YlJ1jVaKiCTTm',2,NULL,1,NULL,0,1,'k6hIVKEANn9QSZuJOf1ImR10xBnBgNgGAQhx0qBM7KtBXM8fk9b9YfZoryGd','2018-04-25 13:32:47','2018-05-04 12:42:22'),(24,'raghav','asd@asd.com','$2y$10$G2PTT6KJF/4Fw6I8gS.OGOw2pRa7oRGWIVMvw0ja8Ar/Zj/JHN/Yi',1,NULL,0,NULL,0,0,NULL,'2018-04-25 13:39:35','2018-04-25 13:39:35'),(25,'Test','test@gmail.com','$2y$10$6KiG2yW66axbWMFRPlZD9ObJiEf8WYhxS1CMdhuHBDCvES3fbDSVu',1,NULL,0,NULL,1,0,NULL,'2018-05-02 12:31:28','2018-05-24 17:43:39'),(26,'shreyas','asdfgh@gmail.com','$2y$10$1WG/wG50Zuo/rjEfLVtF7uMG5GlyBTmMpS1ls62PKNdZIPKBVbQ0W',1,NULL,0,NULL,0,0,NULL,'2018-05-03 18:15:07','2018-05-03 18:15:07'),(27,'raghav','jpg@jkl.com','$2y$10$7xX1kvKCnN2cS7OqqXOivOhM1IswIR5PFrqjcM3dMZymrdpn10x.W',2,NULL,0,NULL,0,0,NULL,'2018-05-04 12:44:33','2018-05-04 12:44:33'),(28,'hi','root@xw.com','$2y$10$I8vdwccbsXpdvBqF0IOp/uLSZRBnNYmKHAH.qMypKe1WTLvwQj39a',1,NULL,0,NULL,0,0,NULL,'2018-05-05 14:56:54','2018-05-05 14:56:54'),(29,'bj','root@xw.com1','$2y$10$a67It.qH2Jn8FZoNOx9LA.SJ8UKo6jk/lPaYB0VRVJ0GLyU1tG6.u',1,NULL,0,NULL,0,0,'hxOna2J0ORiCx0HYmaXgyC177s6vuzQUWt1Qa7SB6pPWMYIKQrfYMXPSkuxE','2018-05-05 15:01:17','2018-05-05 15:01:17'),(30,'raghu','a@a.com','$2y$10$Z83bwGAXUpfb.Zg907Y00.Dh0PbenMRPH2IzAAWpMQEy0nx6mT/Wy',2,NULL,0,NULL,0,0,NULL,'2018-05-05 15:12:47','2018-05-05 15:12:47'),(31,'Parvez','parvez@gmail.com','$2y$10$T/CLE/ll61QioDU45l1nRePooMlw4yiriVoSGcMjM5dMGEqn2L9yO',1,NULL,0,NULL,0,0,NULL,'2018-05-07 19:43:56','2018-05-07 19:43:56'),(32,'Parvez','parvezq@gmail.com','$2y$10$Yi9FyTCdxf/ml.AWqnlxqeZES3SIp1E6HxPC95qvuAa07wt/n9fYi',2,NULL,0,NULL,0,0,NULL,'2018-05-07 19:45:12','2018-05-07 19:45:12'),(33,'Vinod','vinod@gmail.com','$2y$10$WMQERiIl3Orwj1O9fjxI6ezdso4AUzFZ9QSptrmvEJyq/E7CSwrNi',1,NULL,0,NULL,0,0,NULL,'2018-05-15 14:47:13','2018-05-15 14:47:13'),(34,'Vinod','vineod@gmail.com','$2y$10$NUhf0gECQ/NVNvXYfGRG2e0KkLZfqueAKbMgXh/dvzOvp/mt3wtOO',2,NULL,0,NULL,0,0,NULL,'2018-05-15 14:47:30','2018-05-15 14:47:30'),(35,'Sam','kkkavsv@gmail.com','$2y$10$dDCNGSg8RB7tQ3L22PGEVO2UZhudguBU1Q4tqPo0.gZEI7rO6Lmhe',2,NULL,0,NULL,0,0,NULL,'2018-05-15 14:49:01','2018-05-15 14:49:01'),(36,'ABHISHEK VERMA','avabhishek329@gmail.com','$2y$10$qEg2ljZPcwZM1gMKfYhGbueDvtlSRSpjKmtzWMxpWGKqzGvd7VJb6',2,NULL,0,NULL,0,0,'FqD1u1IrzLeHUurD55dc2sBGl4M9Gcv7bPUtOjjQLiCKO2ZMIAr1sjz8Vppc','2018-05-23 13:04:52','2018-05-23 13:04:52'),(37,'alkesh VERMA','alkeshvermaalkesh@gmail.com','$2y$10$WJDCvw./8HQFa/3Wmi5yeepAYW7tjsUaqtynzUMTJ2KMX3t3uU6hS',1,NULL,0,NULL,0,0,'dy32yUlw4nTcAJRc1FkAFH4Sb9hyQ3P6nyaeNvcbgxjVuSt9quP5C2y5a4GU','2018-05-23 13:08:11','2018-05-23 13:08:11'),(38,'roushan chandra','namita.ch099@gmail.com1','$2y$10$E5zaiAja/Uu32EyXr3pkau/5Qc3MRRAnllOH0XpNPujhKKu3LKR1q',2,NULL,0,NULL,0,0,'EK29HzBasH1dv5UwSyIYGaKmibpcWUFHvyRXY72oUpMV1mzi4VKXvwRnFbmT','2018-05-23 13:22:11','2018-05-23 13:22:11'),(39,'roushan chandra','namita.ch099@gmail.com2','$2y$10$nhFpdcU8zla3p6x6oZQwaeJ55P7JbehYcFQRNlkDVks5.NNXDSXNq',2,NULL,0,NULL,0,0,NULL,'2018-05-23 13:23:48','2018-05-23 13:23:48'),(40,'roushan chandra1','namita.ch0991@gmail.com','$2y$10$bgUFyMiCjyHiBcXagriiV.RMYD41UrAtu.7l3u0Kd/FvbmZR87Fn.',2,NULL,0,NULL,0,0,NULL,'2018-05-23 13:26:51','2018-05-23 13:26:51'),(41,'roushan chandra1','namita.ch0991@d','$2y$10$owkZ.1u8lTRxIL2Cu4JdVerLMfzt464SAVfdCFJTMDsqUhhDbq2pG',2,NULL,0,NULL,0,0,NULL,'2018-05-23 13:30:35','2018-05-23 13:30:35'),(42,'roushan chandra1','namita.ch0991@k','$2y$10$F5mnCxXoWbBA4YlrpnkKleKpBPGmQh/6qMOV6xrhufJpeo2Bfxstq',2,NULL,0,NULL,1,0,NULL,'2018-05-23 13:31:56','2018-05-25 16:26:51'),(47,'Raghvendra','raghugkp10@gmail.com','$2y$10$f9gMTQB0.1vkClQCNQR4J.FRMoOmS/6Jy/3RVXa/QApt6bM5ujTty',1,NULL,1,NULL,0,0,NULL,'2018-05-25 16:42:18','2018-05-25 16:42:18'),(48,'Ritisha','yfdder@guuhdd.hui','$2y$10$uv02BVgx3NPrbTNx9VScbug0AA0jJqnvwQKHm7vzthspnH7MTKd5K',2,NULL,1,NULL,1,0,NULL,'2018-05-25 18:18:35','2018-05-25 18:18:35'),(49,'Pankaj kumar','pankajcool8992@gmail.com','$2y$10$WY1.O/plO.zoOf165fTRtOvBhFqEwCMtZHRAadim10qRovqoA3ZS6',2,NULL,1,NULL,1,1,'oZP47Y7Fx3g14Rh925iuxJASRIJlbi83APg6W6PN46HB5Hc9ijkgBuE4LyJB','2018-05-31 13:16:05','2018-05-31 18:05:04'),(50,'raghu','itzraghu@yopmail.com','$2y$10$VWPkV7YptyFdjWkoDXx5cenvz8FfCRdqmZP9q1aBpDdwA5hAW7nZy',1,NULL,0,NULL,1,0,NULL,'2018-06-01 15:00:27','2018-06-01 15:00:27'),(51,'Rishabh Kumar','kumar.monster.rishabh@gmail.com','$2y$10$VXFryd1uysqk2fv5dcRVSu/A7nb6FNpqaUIXDkqn6ouUk4tef17I.',1,NULL,0,NULL,1,0,'rokrRUC1sJupJUCemkbgBWNQP29OeFWNXkuBPd7hBHQ23zE12sElNvs1sJEr','2018-06-02 18:01:08','2018-06-02 18:01:08'),(52,'Roushan','namitachandra7@gmail.com','$2y$10$BnBZQhi2ZcSE5f2e4otHPOYI8C3ZxLO2MBA.0jzwD84SMZsihxSIG',2,NULL,0,NULL,0,0,NULL,'2018-06-03 05:51:43','2018-06-03 05:51:43'),(53,'Sidd','siddhartha.singh912@gmail.com','$2y$10$P9Bwa2InHVIaJzx/fzLyQOjVcAG/YZQrTqvkWQJm4q5GkrG6EXgFS',1,NULL,0,NULL,1,0,'oMWDNlACP9DdPbXAV6QB4Ud2GbVdndZsIbRh61hESqv2puqp3UHfEeYbW3fP','2018-06-03 13:09:41','2018-06-03 13:12:16'),(54,'Sidd','sid.kid29@gmail.com','$2y$10$dn2LidJ73KPhZtoagkRDQeS4pnV6C/YLSsEyw69qVizZwtW3qQ4Gq',2,NULL,0,NULL,0,0,'CgbCYcJGnMKP21kCMQKyfxmBW1snl2DwnPCJYKYnDhRHM7d6Bg69JbutILqU','2018-06-03 13:14:44','2018-06-03 13:14:44'),(55,'sidd','sid14ghost@gmail.com','$2y$10$tq8tsmGBpR/8L4F3tdjxte6pFg6N7RMFzapeCp9b8Er6pWKpMV4uq',2,NULL,0,NULL,0,0,'SUCYs020lFOM7vlO7E8PV19weosoD7LJf5EKWrBPo2hqIcVYXCUdCQBpkPDA','2018-06-03 13:35:14','2018-06-03 13:35:14'),(56,'Raghvendra','itzraghu123@yopmail.com','$2y$10$EuIcjctUQt6P4wQqMG.suesn6rOjlELRZPKWKnPF918pA8KX9P9N.',2,NULL,0,NULL,0,0,NULL,'2018-06-03 13:41:43','2018-06-03 13:41:43'),(57,'Raghvendra','itzraghu1234@yopmail.com','$2y$10$67cDaUM5IMFq5D5w6MhYUOj4SbY8Eq8KjRbbDEx74pB7pK55cX2KW',2,NULL,0,NULL,0,0,NULL,'2018-06-03 13:43:17','2018-06-03 13:43:17'),(58,'Raghvendra','itzraghu12345@yopmail.com','$2y$10$Ts5aIxBi7zfmsVy9Jn5fAuBIqbXmBlua5XkZYCMm01lsjY7qRA5e.',2,NULL,0,NULL,1,0,NULL,'2018-06-03 13:44:05','2018-06-03 13:44:05'),(59,'Ram','rmnaresh59@gmail.com','$2y$10$JcZnSrRvvga8LefetoMDc.qKENB/zMoS5OVYAOHUjdk5xKVY9EOS2',2,NULL,0,NULL,1,1,'Sc4BweGlpjVD6pD7Zw0a3YI9yNHSFEg2k0pUYei5LVmR7wWfWYIOtYISNYY1','2018-06-04 06:25:32','2018-06-04 06:26:43');
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

-- Dump completed on 2018-06-29 23:53:50
