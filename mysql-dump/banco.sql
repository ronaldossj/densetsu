-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: densetsu
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table struc

USE densetsu

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `dataComentario` datetime DEFAULT NULL,
  `idPostagem` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (8,1,'Novo Novo','2020-06-14 11:31:01','14'),(9,1,'Novo comentário elaborado','2020-06-14 11:37:47','14');
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postagens`
--

DROP TABLE IF EXISTS `postagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `texto` text,
  `dataPublicacao` datetime DEFAULT NULL,
  `autor` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagens`
--

LOCK TABLES `postagens` WRITE;
/*!40000 ALTER TABLE `postagens` DISABLE KEYS */;
INSERT INTO `postagens` VALUES (14,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis massa tincidunt dui ut ornare lectus sit amet est. Mauris in aliquam sem fringilla ut. Nibh mauris cursus mattis molestie a iaculis at. Dignissim sodales ut eu sem integer vitae justo eget. Non nisi est sit amet facilisis magna. Habitant morbi tristique senectus et netus et. Ullamcorper sit amet risus nullam. Lacus sed viverra tellus in hac habitasse platea dictumst. Feugiat vivamus at augue eget arcu dictum varius duis. Sit amet volutpat consequat mauris nunc congue nisi. Amet risus nullam eget felis eget nunc lobortis mattis. At elementum eu facilisis sed odio. Dis parturient montes nascetur ridiculus. Non diam phasellus vestibulum lorem sed. Lorem ipsum dolor sit amet consectetur adipiscing elit ut aliquam. Suscipit tellus mauris a diam maecenas. Faucibus pulvinar elementum integer enim neque volutpat ac. Suspendisse in est ante in nibh mauris cursus.\r\n\r\nMi in nulla posuere sollicitudin. Tristique et egestas quis ipsum suspendisse ultrices gravida. Massa massa ultricies mi quis hendrerit dolor. Aliquet enim tortor at auctor urna nunc id cursus. Venenatis cras sed felis eget velit aliquet sagittis. Viverra mauris in aliquam sem fringilla. Et ligula ullamcorper malesuada proin libero nunc consequat interdum varius. Montes nascetur ridiculus mus mauris vitae ultricies leo integer. Eros in cursus turpis massa tincidunt dui ut ornare. Eleifend donec pretium vulputate sapien. Sed tempus urna et pharetra pharetra massa massa ultricies. In pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Justo eget magna fermentum iaculis eu. Pellentesque elit eget gravida cum. Sed viverra tellus in hac habitasse platea dictumst. Nulla porttitor massa id neque aliquam. Urna nunc id cursus metus aliquam eleifend mi. Odio ut enim blandit volutpat. Commodo ullamcorper a lacus vestibulum sed. Turpis egestas integer eget aliquet nibh praesent.\r\n\r\nPellentesque pulvinar pellentesque habitant morbi. Consectetur purus ut faucibus pulvinar. In nibh mauris cursus mattis. Odio tempor orci dapibus ultrices in iaculis nunc. Fermentum iaculis eu non diam phasellus vestibulum. Magna etiam tempor orci eu. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum. Volutpat consequat mauris nunc congue nisi vitae. Feugiat in fermentum posuere urna nec tincidunt praesent semper feugiat. Leo duis ut diam quam nulla porttitor massa id. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Ultrices neque ornare aenean euismod elementum nisi. Tortor at auctor urna nunc id cursus metus. Ac tortor vitae purus faucibus ornare. Pulvinar mattis nunc sed blandit libero. Pellentesque elit eget gravida cum sociis natoque. Eu turpis egestas pretium aenean pharetra. Ac placerat vestibulum lectus mauris ultrices eros in cursus turpis.','2020-06-14 08:11:04',1);
/*!40000 ALTER TABLE `postagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `usuario` varchar(90) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Ronaldo','ronaldo.serafim@outlook.com.br','Ronaldo','12345678',1),(20,'Ronaldo','ronaldo.serafim@outlook.com.br','Ashiro','123',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-14 14:56:28
