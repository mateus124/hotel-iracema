CREATE DATABASE  IF NOT EXISTS `heroku_8d2ca47a17d393c` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `heroku_8d2ca47a17d393c`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: us-cdbr-east-06.cleardb.net    Database: heroku_8d2ca47a17d393c
-- ------------------------------------------------------
-- Server version	5.6.50-log

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
-- Table structure for table `conta`
--

DROP TABLE IF EXISTS `conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conta` (
  `nome` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta`
--

LOCK TABLES `conta` WRITE;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` VALUES ('Admin','admin','admin'),('Betina','betina@gmail.com','1234'),('Dracule','icreamcaker@gmai.com','azul');
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens`
--

DROP TABLE IF EXISTS `imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagens` (
  `urlimg` varchar(45) NOT NULL,
  PRIMARY KEY (`urlimg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacotes`
--

DROP TABLE IF EXISTS `pacotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacotes` (
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `id` int(45) NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacotes`
--

LOCK TABLES `pacotes` WRITE;
/*!40000 ALTER TABLE `pacotes` DISABLE KEYS */;
INSERT INTO `pacotes` VALUES ('Pacote de Férias','Se você está sonhando com umas férias relaxantes e inesquecíveis, nosso pacote de férias é a escolha ideal para você. No Hotel Iracema, estamos empenhados em proporcionar uma experiência única e encan','ferias.jpg',2),('Pacote de Festas','Se você está em busca de um local encantador para celebrar momentos especiais, nosso pacote de festas é a escolha perfeita para você. No Hotel Iracema, combinamos serviços de alta qualidade, instalaçõ','festa.jpg',1),('Pacote de Fidelidade','Agradecemos sua lealdade e valorizamos sua preferência como nosso hóspede frequente. Com o nosso pacote de fidelidade, queremos retribuir sua confiança e oferecer benefícios exclusivos para tornar sua','fielp.jpg',4),('Pacote de Luxo','Se você está em busca de uma experiência verdadeiramente sofisticada e luxuosa, nosso pacote de luxo é feito sob medida para você. No Hotel Iracema, nos dedicamos a proporcionar o mais alto nível de c','luxop.jpg',5),('Pacote Familiar','Sabemos o quanto é importante passar momentos de qualidade em família, e nosso pacote de férias é projetado para atender às necessidades e desejos de toda a sua família. No Hotel Iracema, estamos comp','familiap.jpg',6),('Pacote Lua de Mel','Se você está procurando o destino perfeito para celebrar o amor e criar memórias românticas inesquecíveis, nosso pacote de lua de mel é exatamente o que você precisa. No Hotel Iracema, dedicamo-nos a ','luedemel.jpg',3);
/*!40000 ALTER TABLE `pacotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quartos`
--

DROP TABLE IF EXISTS `quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quartos` (
  `numquarto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(300) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `preco` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`numquarto`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quartos`
--

LOCK TABLES `quartos` WRITE;
/*!40000 ALTER TABLE `quartos` DISABLE KEYS */;
INSERT INTO `quartos` VALUES (64,'Lorem Ipsum is simply dummy text of the printing and typesetting industry.','1403152.jpg',209,'Quarto de Teste'),(74,'Este quarto deslumbrante foi projetado para transportar os hÃ³spedes para as profundezas do oceano. Com uma decoraÃ§Ã£o inspirada no mar, tons de azul e elementos nÃ¡uticos, este quarto oferece uma atmosfera relaxante e refrescante. Os hÃ³spedes podem desfrutar de uma vista panorÃ¢mica para o mar a ','quarto1.jpg',209,'Quarto Oceano Azul'),(84,'Para aqueles que desejam se sentir em sintonia com a natureza exuberante de um ambiente tropical, o Quarto Selva Encantada Ã© a escolha perfeita. A decoraÃ§Ã£o Ã© inspirada na selva, com paredes verdes, plantas exÃ³ticas e detalhes naturais. Os hÃ³spedes podem relaxar em uma rede na varanda privativ','quarto2.jpg',209,'Quarto Selva Encantada'),(94,'Esta suÃ­te exclusiva Ã© perfeita para aqueles que desejam uma experiÃªncia de praia verdadeiramente luxuosa. Com acesso privativo Ã  praia, os hÃ³spedes podem desfrutar de um refÃºgio tranquilo com areias brancas e Ã¡guas cristalinas.','quarto3.jpg',209,'SuÃ­te Praia Privativa');
/*!40000 ALTER TABLE `quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `nome` varchar(45) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date NOT NULL,
  `quarto` int(45) NOT NULL,
  `pessoas` int(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `id` int(45) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES ('Betina','2023-06-23','2023-06-26',74,4,'',14),('Mateus','2023-08-23','2023-08-29',64,4,'admin',44);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'heroku_8d2ca47a17d393c'
--

--
-- Dumping routines for database 'heroku_8d2ca47a17d393c'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-14 21:09:23
