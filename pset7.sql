-- MySQL dump 10.13  Distrib 5.5.28, for Linux (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.28

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `symbol` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `shares` bigint(20) NOT NULL,
  `price` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,11,'GOOG','BUY',45,35545.9,'2016-12-25 06:37:06'),(2,11,'STAR','BUY',12,147.12,'2016-12-25 04:37:06'),(3,11,'GOOG','SELL',45,35545.9,'2016-12-26 09:37:06'),(4,11,'INR','BUY',230,8744.03,'2016-12-26 09:37:06'),(5,11,'INR','SELL',230,8744.03,'2016-12-26 09:37:06'),(6,11,'','DEPOSIT',0,10,'2016-12-25 19:28:57'),(7,11,'GOOG','BUY',49,38705.6,'2016-12-26 09:37:06'),(8,11,'GOOG','SELL',23,18167.9,'2016-12-26 09:37:06'),(9,11,'','WITHDRAW',0,9000,'2016-12-25 20:21:56'),(10,11,'','DEPOSIT',0,1000,'2016-12-26 06:09:04'),(11,11,'GOOG','BUY',200,157982,'2016-12-25 09:37:06'),(12,11,'','DEPOSIT',0,15000,'2016-12-25 17:59:44'),(13,11,'MSFT','BUY',678,42876.7,'2016-12-25 12:37:06'),(14,11,'MSFT','SELL',450,28458,'2016-12-25 15:37:06'),(15,11,'','WITHDRAW',0,9000,'2016-12-26 09:07:41'),(16,11,'','WITHDRAW',0,4000,'2016-12-26 09:08:02'),(17,14,'GOOG','BUY',10,7899.1,'2016-12-26 09:50:04'),(18,14,'','DEPOSIT',0,5000,'2016-12-26 09:50:36'),(19,14,'MSFT','BUY',60,3794.4,'2016-12-26 09:51:37'),(20,9,'MSFT','BUY',78,4932.72,'2016-12-26 10:03:04'),(21,9,'MSFT','BUY',80,5059.2,'2016-12-26 10:03:26'),(22,9,'','DEPOSIT',0,100000,'2016-12-26 10:04:05'),(23,9,'GOOG','BUY',45,35545.9,'2016-12-26 10:05:38'),(24,9,'MSFT','SELL',90,5691.6,'2016-12-26 10:06:04'),(25,9,'','WITHDRAW',0,5000,'2016-12-26 10:06:18'),(26,9,'GOOG','BUY',50,39495.5,'2016-12-26 10:07:07'),(27,14,'','DEPOSIT',0,5000,'2016-12-26 10:09:09'),(28,14,'INR','BUY',80,3041.4,'2016-12-26 10:09:26'),(29,14,'INR','SELL',40,1520.7,'2016-12-26 10:11:20'),(30,14,'','WITHDRAW',0,400,'2016-12-26 10:11:39'),(31,15,'STAR','BUY',23,281.98,'2016-12-26 10:12:59'),(32,15,'FLAG','BUY',100,3833,'2016-12-26 10:14:46'),(33,15,'','DEPOSIT',0,10000,'2016-12-26 10:14:54'),(34,15,'FLAG','BUY',20,766.6,'2016-12-26 10:15:24'),(35,15,'','WITHDRAW',0,1110.9,'2016-12-26 10:16:11');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `symbol` varchar(15) NOT NULL,
  `shares` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`,`symbol`),
  KEY `user_id` (`user_id`,`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,9,'FREE',500),(2,6,'MSFT',78),(3,2,'MSFT',80),(4,4,'AMZN',59),(6,8,'CATQ',88),(7,11,'AMD',90),(9,11,'STAR',24),(13,11,'GOOG',226),(15,11,'MSFT',228),(16,14,'GOOG',10),(17,14,'MSFT',60),(18,9,'MSFT',68),(20,9,'GOOG',95),(22,14,'INR',40),(23,15,'STAR',23),(24,15,'FLAG',120);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',10000.0000),(2,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000.0000),(3,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',10000.0000),(4,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',10000.0000),(5,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe',10000.0000),(6,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',10000.0000),(7,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',10000.0000),(8,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',10000.0000),(9,'skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK',25658.2300),(10,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',10000.0000),(11,'Priya','$1$ncpXnDO.$QCASfXiKz48ht8dw65Rfp1',433495.2700),(13,'&lt;?=Doraemon?&gt;','$1$TQGnl2wJ$Jfn/mUKp9QVa.jbTuxsVS0',10000.0000),(14,'Neha','$1$sFomO.YG$/2N1NKxg8BjoFjICcpq0R/',6385.8000),(15,'Divya','$1$qOJZ4u74$AGEYuGYy2mLzsVziym5FU/',14007.5200);
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

-- Dump completed on 2016-12-26 15:59:32
