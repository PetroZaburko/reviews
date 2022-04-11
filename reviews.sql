-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: reviews
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `reviews_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_photos_reviews` (`reviews_id`),
  CONSTRAINT `c_fk_photos_reviews_id` FOREIGN KEY (`reviews_id`) REFERENCES `reviews` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'img8ca007c86636a47324f17c4aac8b0f97.jpg',1),(2,'img8ca007c86636a47324f17c4aac8b0f92.jpg',1),(3,'img8ca007c86636a47324f17c4aac8b0f93.jpg',1),(4,'img8ca007c86636a47324f17c4aac8b0f94.jpg',2),(5,'img8ca007c86636a47324f17c4aac8b0f95.jpg',2),(6,'img8ca007c86636a47324f17c4aac8b0f96.jpg',2),(7,'img8ca007c86636a47324f17c4aac8b0f98.jpg',12),(8,'img4143c116b1da1275dd8076019a27d5c4.jpg',12),(9,'imgbe27bbed0aae84bbd09ef32f9aa2c70b.jpg',12),(10,'imgfd2fd98c4616a51e5f63655adc594abc.jpg',12);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `nickname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `pros` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cons` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `recommended` tinyint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'Totally in love with this place!','gigabyte_tech','tect@gmail.com','October 06,2021','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n                        quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur\n                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna\n                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do\n                        eiusmod tempor incididunt ut labore et dolore magna','Lorem ipsum dolor sit amet, consectetur adipiscing elit',1),(2,'Totally in love with this place!','gigabyte_tech','tect@gmail.com','October 06,2021','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n                        quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur\n                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna\n                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do\n                        eiusmod tempor incididunt ut labore et dolore magna','Lorem ipsum dolor sit amet, consectetur adipiscing elit',0),(3,'test reiev for test','other man','giga_ye@fh.net','April 06,2021','This may seem a bit weird but it\'s actually quite logical. When accessing the parent bean, RedBeanPHP simply looks at the value of shop_id and loads the shop identified by that id.','Another way to update the shop is to simply set the new id, once again, shop_id and shop will be out-of-sync until the next R::store().','However if we change the id before we load the shop, the new shop will be loaded:',1),(4,'some other test text','other_user','masha@test.com','October 20,2021','Если необязательный параметр mode установлен в COUNT_RECURSIVE (или 1), count() будет рекурсивно подсчитывать количество элементов массива. Это особенно полезно для подсчёта всех элементов многомерных массивов.','Подсчитывает все элементы в массиве, если используется массив. Если используется объект, который реализует интерфейс Countable, функция возвращает результат выполнения метода Countable::count().','',1),(6,'Back to ternary operators: do you know which expression','other_user','masha@test.com','October 20,2021','How it works.\r\n\r\nFirst. PHP evaluates the condition. If it’s true, the right-hand expression returns the value1; otherwise, it returns the value2.\r\nSecond, PHP assigns the result of the right-hand expression to the $result variable.\r\nAs you can see, by using the ternary operator, you can make the code more concise.','','',0),(12,'Реализация загрузки нескольких файлов','test_petro_petrov','ohessel@example.net','October 21,2021','Во-первых, вам нужно создать HTML- форму с атрибутом enctype = ‘multiple / form-data’ . Фактически, атрибут enctype указывает, как данные формы должны быть закодированы при отправке их на сервер. Когда вы используете формы, которые имеют элемент управления загрузкой файлов, вам нужно указать enctype как множественные / form-data .\r\n\r\nЕсли вы используете ввод одного файла, вам нужно включить элемент file для выбора нескольких файлов. Чтобы сделать это, вам нужно назвать входной файл в виде массива, например. имя = “файлы []” . Кроме того, элемент «Файл ввода» должен иметь несколько = «несколько» или просто несколько.\r\n\r\nФорма HTML будет выглядеть следующим образом:\r\n\r\n','Вы пытаетесь загрузить несколько файлов одновременно? Вот как реализовать загрузку нескольких файлов с использованием HTML и PHP.','В этой статье я собираюсь показать, как использовать один HTML-файл для загрузки нескольких файлов. В дополнение к этому я продемонстрирую использование нескольких файловых входов с дополнительными полями ввода.',1);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'reviews'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-11 16:16:20
