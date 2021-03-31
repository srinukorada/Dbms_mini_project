-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: cricket
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matches` (
  `match_id` int NOT NULL AUTO_INCREMENT,
  `match_date` date NOT NULL,
  `team_1` int NOT NULL,
  `team_2` int NOT NULL,
  `ven_id` int DEFAULT NULL,
  `toss_id` int DEFAULT NULL,
  `toss_decision` varchar(5) DEFAULT NULL,
  `win_type` varchar(12) DEFAULT NULL,
  `won_by` int DEFAULT NULL,
  `result` int DEFAULT NULL,
  `MoM` int DEFAULT NULL,
  PRIMARY KEY (`match_id`),
  UNIQUE KEY `match_date` (`match_date`,`ven_id`),
  KEY `Team_Name_Id_index` (`team_1`),
  KEY `Venue_Name_index` (`ven_id`),
  KEY `Toss_Winner_Id_index` (`toss_id`),
  KEY `Won_By_index` (`won_by`),
  KEY `Result_index` (`result`),
  KEY `MoM_index` (`MoM`),
  KEY `matches_ibfk_8` (`team_2`),
  CONSTRAINT `matches_ibfk_10` FOREIGN KEY (`toss_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `matches_ibfk_6` FOREIGN KEY (`ven_id`) REFERENCES `venue` (`venue_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `matches_ibfk_7` FOREIGN KEY (`team_1`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `matches_ibfk_8` FOREIGN KEY (`team_2`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `matches_ibfk_9` FOREIGN KEY (`result`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `player_MoM` FOREIGN KEY (`MoM`) REFERENCES `player` (`player_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1011118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (335987,'2020-09-19',2,1,1011,2,'field','runs',140,1,2),(335988,'2020-09-20',4,3,1012,3,'bat','runs',33,3,19),(335989,'2020-09-21',6,5,1013,5,'bat','wickets',9,6,90),(335990,'2020-09-22',7,2,1014,7,'bat','wickets',5,2,11),(335991,'2020-09-23',1,8,1015,8,'bat','wickets',5,1,4),(335992,'2020-09-24',5,4,1016,4,'bat','wickets',6,5,32),(335993,'2020-09-25',8,6,1017,8,'bat','wickets',9,6,41),(335994,'2020-09-26',3,7,1018,7,'field','runs',6,3,18),(335995,'2020-09-27',8,5,1017,5,'field','wickets',3,5,31),(335996,'2020-09-28',4,7,1012,7,'field','runs',66,4,26),(335997,'2020-09-29',2,5,1011,5,'field','wickets',7,5,32),(335998,'2020-09-30',3,1,1018,1,'bat','wickets',9,3,22),(335999,'2020-10-01',7,8,1019,8,'field','wickets',10,8,53),(336000,'2020-10-02',4,6,1012,6,'bat','wickets',4,4,28),(336001,'2020-10-03',2,3,1011,3,'bat','runs',13,3,20),(336002,'2020-10-03',1,7,1015,1,'bat','wickets',7,7,44),(336003,'2020-10-04',6,2,1013,2,'field','runs',10,6,118),(336004,'2020-10-04',8,4,1017,4,'field','wickets',7,4,100),(336005,'2020-10-05',5,1,1016,5,'bat','runs',45,5,101),(336006,'2020-10-06',3,6,1018,3,'bat','wickets',8,6,41),(336007,'2020-10-07',8,2,1017,8,'bat','wickets',5,2,81),(336008,'2020-10-08',4,1,1012,4,'bat','runs',9,4,29),(336009,'2020-10-09',7,6,1019,6,'field','runs',29,7,49),(336010,'2020-10-10',5,3,1016,3,'bat','wickets',8,5,102),(336011,'2020-10-10',2,4,1011,4,'field','wickets',6,4,77),(336012,'2020-10-11',3,8,1018,8,'field','wickets',7,8,53),(336013,'2020-10-11',7,5,1019,7,'field','wickets',7,7,73),(336014,'2020-10-12',6,3,1013,3,'field','wickets',4,3,20),(336015,'2020-10-13',1,2,1015,1,'bat','runs',5,1,1),(336016,'2020-10-14',5,8,1016,5,'field','wickets',8,5,31),(336017,'2020-10-15',2,7,1011,7,'field','wickets',9,7,149),(336018,'2020-10-16',3,4,1018,4,'field','runs',18,3,151),(336019,'2020-10-17',8,1,1017,1,'bat','runs',23,1,1),(336020,'2020-10-17',5,6,1016,5,'field','wickets',3,5,32),(336021,'2020-10-18',4,2,1012,2,'bat','wickets',9,4,100),(336022,'2020-10-18',1,6,1015,1,'bat','runs',23,1,144),(336023,'2020-10-19',7,3,1014,7,'field','wickets',9,7,44),(336024,'2020-10-20',4,5,1012,5,'field','runs',41,4,100),(336025,'2020-10-21',6,8,1013,8,'field','runs',12,6,136),(336026,'2020-10-22',7,1,1014,7,'field','wickets',8,7,49),(336027,'2020-10-23',6,4,1013,6,'bat','runs',6,4,64),(336028,'2020-10-24',5,2,1016,2,'field','runs',65,5,74),(336029,'2020-10-24',8,7,1017,8,'field','runs',25,7,71),(336030,'2020-10-25',1,3,1015,1,'bat','runs',3,3,122),(336031,'2020-10-25',2,6,1011,6,'field','wickets',5,6,132),(336032,'2020-10-26',1,5,1015,5,'field','wickets',6,5,31),(336033,'2020-10-27',7,4,1014,7,'field','runs',1,4,100),(336034,'2020-10-28',3,2,1018,2,'bat','runs',14,2,124),(336036,'2020-10-30',4,8,1012,4,'field','wickets',6,4,100),(336037,'2020-10-31',6,7,1013,6,'field','wickets',5,6,88),(336038,'2020-10-31',3,5,1018,5,'bat','runs',10,5,109),(336039,'2020-11-01',2,8,1011,8,'field','runs',3,2,14),(336040,'2020-11-01',1,4,1015,4,'bat','wickets',3,1,105),(336041,'2020-11-02',5,7,1016,5,'field','wickets',5,5,102),(336042,'2020-11-03',8,3,1017,8,'bat','wickets',7,3,21),(336043,'2020-11-05',6,5,1014,6,'field','runs',105,5,32),(336044,'2020-11-06',3,4,1014,4,'bat','wickets',9,3,122),(336045,'2020-11-08',3,5,1019,5,'field','wickets',3,5,31);
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-31 11:27:18
