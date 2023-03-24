CREATE DATABASE  IF NOT EXISTS `forum_ecf` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_ecf`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: forum_ecf
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id_c` int NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `id_discussions` int NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_c`),
  KEY `id_users_cFK_idx` (`id_users`),
  KEY `id_discussion_c_idx` (`id_discussions`),
  CONSTRAINT `id_discussion_c` FOREIGN KEY (`id_discussions`) REFERENCES `discussion` (`id_d`),
  CONSTRAINT `id_users_cFK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,2,1,'Je connais cette excuse, c\'est la faut de mon frère','2023-03-23 09:22:51'),(2,3,2,'On voit ça, pour parler toujours présent mais pour agir, toujours à l\'horizon','2023-03-23 09:22:51'),(3,4,3,'Ouah, quelle jeu de mots !','2023-03-23 09:22:51'),(4,5,4,'Et bah prends un doliprane','2023-03-23 09:22:51'),(5,6,5,'Top-achat! Muhahahaha','2023-03-23 09:22:51'),(6,7,6,'Sortez-les armes c\'est la guerre ! Révolution ! 49.3','2023-03-23 09:22:51'),(7,5,7,'Que avec la souris ... ?','2023-03-23 09:22:51'),(8,2,8,'Et ben cours !','2023-03-23 09:22:51'),(9,3,9,'Viens, j\'ai des bonbons pour toi','2023-03-23 09:22:51'),(10,6,10,'Ferme la !','2023-03-23 09:22:51'),(11,4,11,'Tu as pris 10 kg !','2023-03-23 09:22:51'),(12,2,12,'allo allo','2023-03-23 09:22:51'),(13,3,13,'Arrête de ronronner','2023-03-23 09:22:51'),(14,5,14,'Trop petit ! Faut grandir','2023-03-23 09:22:51'),(15,3,1,'Ralala, va falloir être original','2023-03-23 09:22:51'),(16,6,2,'Arrête de faire le philosophe ','2023-03-23 09:22:51'),(17,5,3,'Quelle niveau...','2023-03-23 09:22:51'),(18,4,4,'Cogne ta tête contre le mur','2023-03-23 09:22:51'),(19,2,5,'Chat fais pas rire','2023-03-23 09:22:51'),(20,3,1,'Bientôt ça sera la faute au pc','2023-03-23 09:22:51'),(21,2,2,'Calmez-vous ! Faîtes l\'amour pas la guerre','2023-03-23 09:22:51'),(22,3,3,'Faîtes les malins, mais allez-y les comiques','2023-03-23 09:22:51'),(23,6,1,'Et bientôt ça sera la faute à la souris...','2023-03-23 10:04:33'),(50,9,1,'Imaginez recevoir un message de votre chat ? C\'est impossible me direz-vous ? Et pourtant, grâce à la technologie, cela pourrait devenir réalité un jour. Mais quels messages nos chats auraient-ils à nous transmettre ? Des demandes de croquettes, des câlins, ou peut-être des confidences ? Une chose est sûre, recevoir un message de son chat serait une expérience inoubliable et renforcerait encore plus les liens qui nous unissent à nos compagnons félins.','2023-03-23 23:28:42'),(52,3,7,'Bientôt avec toi aussi, me cherche pas trop ','2023-03-24 01:04:35'),(53,9,4,'Un jour, j\'ai eu mal à la tête à cause d\'un jeu vidéo que j\'ai joué sans faire de pause. \"Ouf, chat fais mal au crâne\", ai-je dit en me massant les tempes. Depuis ce jour-là, j\'ai appris à prendre soin de moi en faisant des pauses régulières pour éviter de trop solliciter mon cerveau.','2023-03-24 01:11:54'),(54,9,44,'Je suis là, tranquillement assis lorsque soudain, tu te mets à te moquer de moi. Énervé, je me lève pour te chasser. Tu essaies de m\'échapper en courant en zigzag, mais je suis rapide et finis par t\'attraper. Ma vengeance est enfin accomplie.','2023-03-24 11:42:28'),(55,9,29,'À part manger des miettes de pain tu fais rien','2023-03-24 11:43:30');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion`
--

DROP TABLE IF EXISTS `discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discussion` (
  `id_d` int NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `id_messages` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_d`),
  KEY `id_users_d_idx` (`id_users`),
  KEY `id_messages_d_idx` (`id_messages`),
  CONSTRAINT `id_messages_d` FOREIGN KEY (`id_messages`) REFERENCES `messages` (`id_m`),
  CONSTRAINT `id_users_d` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion`
--

LOCK TABLES `discussion` WRITE;
/*!40000 ALTER TABLE `discussion` DISABLE KEYS */;
INSERT INTO `discussion` VALUES (1,5,45,'Message reçu de mon chat','2023-03-22 14:47:54'),(2,2,45,'Je suis un chat-teur','2023-03-22 14:47:54'),(3,3,45,'Chat-perlipopette','2023-03-22 14:47:54'),(4,4,45,'Ouf, chat fais mal au crâne','2023-03-22 14:47:54'),(5,2,45,'Top Chat','2023-03-22 14:47:54'),(6,4,45,'Chat nous attaque ','2023-03-22 14:47:54'),(7,3,45,'Je joue avec la souris','2023-03-22 14:47:54'),(8,5,45,'Cha marche pas ','2023-03-22 14:47:54'),(9,3,45,'j\'ai besoin d\'une pause miam','2023-03-22 14:47:54'),(10,2,45,'chat fait plaisir','2023-03-22 14:47:54'),(11,2,25,'J\'ai trop mangé','2023-03-22 14:52:31'),(12,5,9,'test','2023-03-22 17:04:13'),(13,5,3,'zZzzzZZ\r\n','2023-03-22 17:04:43'),(14,5,74,'Je fais 30 cm !!','2023-03-22 17:14:00'),(19,5,74,'Je vous prends de haut','2023-03-22 20:20:04'),(21,5,74,'Je fais un test','2023-03-22 20:20:29'),(29,5,10,'Je vais venir vous chasser','2023-03-22 20:26:44'),(30,6,11,'A part aboyer tu fais rien','2023-03-22 20:28:08'),(31,6,16,'Va voir ailleurs si j\'y suis','2023-03-22 20:28:39'),(32,6,3,'Tu fais faire que ça','2023-03-22 20:29:02'),(33,6,75,'Seulement si tu me donnes du fromage','2023-03-22 20:29:27'),(34,6,25,'Parfait je vais pouvoir te narguer','2023-03-22 20:29:50'),(35,6,7,'Espèce de carnivore','2023-03-22 20:30:25'),(36,6,8,'Si tu savais ce que je lui vole','2023-03-22 20:30:53'),(37,7,79,'Où sont les catins ?','2023-03-22 20:33:32'),(38,7,79,'Attention à ce que vous dîtes','2023-03-22 20:33:47'),(39,7,5,'Et ben va falloir te forcer','2023-03-22 20:34:18'),(40,7,7,'Toi, Souris si je te trouve je mange','2023-03-22 20:35:12'),(41,6,9,'T\'as vu Chien, ce site est hackable','2023-03-22 20:38:47'),(42,6,1,'Des souris stp. Tu es si faible','2023-03-22 20:39:15'),(43,6,1,'Et super lent !','2023-03-22 20:39:20'),(44,6,79,'Vous êtes si nul','2023-03-22 20:39:43'),(51,7,11,'Fais pas le malin','2023-03-23 21:05:37'),(52,7,77,'Moi aussi je veux voir le monde','2023-03-23 21:06:22'),(53,7,6,'Je te comprends, saleté d\'humains','2023-03-23 21:06:41'),(54,6,74,'Descends si t\'es un homme !','2023-03-23 21:27:23'),(55,6,79,'Je suis toujours un fugitif','2023-03-23 21:28:40'),(59,9,79,'Je m\'en occupe j\'en ai repérer un','2023-03-23 22:03:47'),(60,3,77,'Paye moi le voyage','2023-03-24 01:03:23'),(61,9,82,'Viens, dans la cuisine','2023-03-24 07:44:27');
/*!40000 ALTER TABLE `discussion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id_l` int NOT NULL AUTO_INCREMENT,
  `id_discussions` int NOT NULL,
  `id_users` int NOT NULL,
  `like` tinyint DEFAULT '0',
  PRIMARY KEY (`id_l`),
  KEY `id_users_l_idx` (`id_users`),
  KEY `id_discusion_l_idx` (`id_discussions`),
  CONSTRAINT `id_discusion_l` FOREIGN KEY (`id_discussions`) REFERENCES `discussion` (`id_d`),
  CONSTRAINT `id_users_l` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,1,9,1),(2,1,8,1),(250,43,9,0),(251,42,9,1),(252,21,9,1),(253,54,9,1),(254,19,9,1),(255,59,9,1),(256,59,5,1),(257,14,5,1),(258,59,6,1),(259,55,6,1);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id_m` int NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `id_topics` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_m`),
  KEY `id_topics` (`id_topics`),
  KEY `id_users_m_idx` (`id_users`),
  CONSTRAINT `id_topics` FOREIGN KEY (`id_topics`) REFERENCES `topics` (`id_t`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `id_users_m` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,2,1,'J\'ai vu des rats','2023-03-21 20:26:28'),(2,2,1,'À la chat-sse','2023-03-21 20:26:28'),(3,2,2,'Aujourdh\'ui j\'ai dormi','2023-03-21 20:26:28'),(4,2,2,'Mon maître m\'ennuie','2023-03-21 20:26:28'),(5,2,3,'Courir c\'est pas mon truc','2023-03-21 20:26:28'),(6,2,3,'C\'est fatiguant les calins','2023-03-21 20:26:28'),(7,2,4,'Du poissons ! Miam!','2023-03-21 20:26:28'),(8,2,4,'Mon maitre me nourris avec du caviar','2023-03-21 20:26:28'),(9,3,2,'Les chats je vais vous trouver','2023-03-21 22:21:02'),(10,3,3,'On vous fatigue','2023-03-21 22:21:02'),(11,3,1,'Le prochain que j\'attrape je le mords','2023-03-21 22:21:02'),(16,4,2,'Chalut cha va ?','2023-03-22 11:21:02'),(25,4,4,'Cha mange','2023-03-22 11:32:11'),(45,4,2,'Ché corriger l\'erreur meow','2023-03-22 11:42:31'),(74,5,1,'Vous êtes si petits','2023-03-22 14:29:50'),(75,5,4,'Donnez moi du pain','2023-03-22 19:55:03'),(77,5,3,'J\'ai fais le tour du monde','2023-03-22 20:18:14'),(79,7,1,'Il y a des intrus dans le forum chat-sser les','2023-03-22 20:33:17'),(82,6,4,'Donnez moi du fromage','2023-03-23 10:58:18');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topics` (
  `id_t` int NOT NULL AUTO_INCREMENT,
  `category` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alias` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_t`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'Chat Espionne','observation'),(2,'Raconte Chat Vie','blabla'),(3,'Chat Fatigue','sport'),(4,'Chat Mange','nourriture');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_u` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'default.png',
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'chat','chat@mail.com','$2y$10$Yw52sV1WDbhWw7RbGGGR..aEq9bXFTeauuwgHJkvhnGusshXyl66O','ba658103.jpg'),(3,'Chien','chien@mail.com','$2y$10$0CDfpWn0IGEC6tXwAVI8suMMeC/B0z8XmvfJYWrYTBf2ITLfSf4oW','221932b6.jpg'),(4,'chatlut','chatlut@mail.com','123456Rat','1283fbc0.jpg'),(5,'pigeon','pigeon@mail.com','$2y$10$k9kRgXiFl4dlIlj6gOhxsevgj2fWjQz4mumHVT0TkgWE1iAMV.fOu','d85bd2f8.jpg'),(6,'Souris','souris@mail.com','$2y$10$rz2mlzsG2FJeoWx8AjV48umDzLSEl7azO1Atb0Jv.oThiJ8etTrsS','8e0b9212.jpg'),(7,'chatsseur','chatsseur@mail.com','$2y$10$QBLwPKGaZCi/U5PUb/RoeeyCSwFIyhEWNb01fIJ1XRDvRvPVil64q','ece39aea.jpg'),(8,'chatpanze','chatpanze@mail.com','$2y$10$Yiu7zQzDop0UMLAuD8nJrOnZ2d/JF8USEf2UQW27bjgGBzBh5Tg6G','33f1600b.jpg'),(9,'chatnonyme','chatnonyme@mail.com','$2y$10$NQE.VExf/CYH0GXcSrZTZuR02tIU..mlG4DOfVVFITrsM/fpwvske','0d3ddff8.jpg');
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

-- Dump completed on 2023-03-24 14:43:31
