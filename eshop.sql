-- MySQL dump 10.13  Distrib 5.6.25, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: eshop
-- ------------------------------------------------------
-- Server version	5.6.25-0ubuntu0.15.04.1

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
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrators_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'admin','$2y$10$vdkB2rWc.i.5H/2LKSyq3eWb81oy2J5hwTIVB.SUUPAxJEG9y2OeS','DNPAdministrator',NULL,'2015-12-09 11:25:28','2015-12-09 11:25:28');
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Root Category',0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Бытовая техника',1,1,'2015-12-10 23:22:59','2015-12-10 23:22:59'),(4,'Пылесосы',3,1,'2015-12-10 23:23:13','2015-12-10 23:23:13'),(5,'Холодильники',3,1,'2015-12-10 23:23:26','2015-12-10 23:23:26'),(8,'Стиральные машины',3,1,'2015-12-11 14:38:24','2015-12-11 14:38:24'),(9,'Мультиварки',3,1,'2015-12-11 14:38:58','2015-12-11 14:38:58'),(10,'Компьютерная техника',1,1,'2015-12-11 14:39:24','2015-12-11 14:39:24'),(11,'Ноутбуки и аксессуары',10,1,'2015-12-11 14:39:34','2015-12-15 14:35:21'),(12,'Планшеты',10,1,'2015-12-11 14:39:40','2015-12-11 14:39:40'),(13,'Моноблоки',10,1,'2015-12-11 14:40:00','2015-12-11 14:40:00'),(14,'Ноутбуки',11,1,'2015-12-11 14:40:11','2015-12-11 14:40:11'),(15,'Аккумуляторы для ноутбуков',11,1,'2015-12-11 14:40:19','2015-12-11 14:40:19'),(16,'Сумки, рюкзаки и чехлы для ноутбуков',11,1,'2015-12-11 14:40:27','2015-12-11 14:40:27'),(17,'Мобильные телефоны',1,0,'2015-12-11 14:41:07','2015-12-15 09:01:59'),(18,'Телефоны и смартфоны',17,1,'2015-12-11 14:41:30','2015-12-11 14:41:30'),(20,'Аксессуары для телефонов',17,1,'2015-12-13 14:59:09','2015-12-13 14:59:09');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2014_10_12_104748_create_administrators_table',1),('2015_11_18_141621_create_categories_table',2),('2015_11_23_152004_create_products_table',3),('2015_12_08_160401_create_order_statuses_table',4),('2015_11_27_003102_create_orders_table',5),('2015_12_08_155524_create_order_contents_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_contents`
--

DROP TABLE IF EXISTS `order_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `order_contents_product_id_foreign` (`product_id`),
  KEY `order_contents_order_id_foreign` (`order_id`),
  CONSTRAINT `order_contents_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_contents_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_contents`
--

LOCK TABLES `order_contents` WRITE;
/*!40000 ALTER TABLE `order_contents` DISABLE KEYS */;
INSERT INTO `order_contents` VALUES (1,1,4298,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,13599,6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,2,3699,9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,7777,7,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,4298,4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `order_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_statuses`
--

DROP TABLE IF EXISTS `order_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_statuses`
--

LOCK TABLES `order_statuses` WRITE;
/*!40000 ALTER TABLE `order_statuses` DISABLE KEYS */;
INSERT INTO `order_statuses` VALUES (1,'Ожидает обработку','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'В доставке','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Завершен успешно','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Отменен','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `order_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sum_order` int(11) NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `order_status_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `orders_order_status_id_foreign` (`order_status_id`),
  CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Вася Васечкин','123@mail.ru','050-123-45-67',25295,'Киев','Комментарий',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Petrov','12345@gmail.com','38-067-987-65-43',7777,'Сумская, 28','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Иванов Валерий','123@mail.ru','+38(077) 777-77-77',4298,'Харьков','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `product_rest` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Стиральная машина Zanussi ZWSE680V ','zanussi-zwse680v','<p>Тип загрузки: Фронтальная;</p>\r\n\r\n<p>Цвет: Белый;</p>\r\n\r\n<p>Загрузка белья, кг: 5;</p>\r\n\r\n<p>Класс стирки: A;</p>\r\n\r\n<p>Класс потребления энергии: A++;</p>\r\n\r\n<p>Глубина, см: 38;<br />\r\n&nbsp;</p>\r\n',4699,'images/uploads/7da8fe0757b4ab0f8c0fe48602330571.jpg',1,10,8,'2015-12-11 14:48:40','2015-12-15 09:32:43'),(4,'Стиральная машина Indesit WISN 821 UA','indesit-wisn-821-ua','<p>Тип загрузки: Фронтальная;</p>\r\n\r\n<p>Цвет: Белый;</p>\r\n\r\n<p>Загрузка белья, кг: 5;</p>\r\n\r\n<p>Класс стирки: A;</p>\r\n\r\n<p>Класс потребления энергии: A+;</p>\r\n\r\n<p>Материал бака: Пластик;<br />\r\n&nbsp;</p>\r\n',4298,'images/uploads/a0930315dcc963f47079ebf51316f114.jpeg',1,7,8,'2015-12-11 14:50:38','2015-12-15 14:36:54'),(5,'Стиральная машина Gorenje W 7202/S ','gorenje-w-7202-s','<p>Цвет: Белый;</p>\r\n\r\n<p>Загрузка белья, кг: 7;</p>\r\n\r\n<p>Класс стирки: A;</p>\r\n\r\n<p>Класс потребления энергии: A++;</p>\r\n\r\n<p>Материал бака: Пластик;<br />\r\n&nbsp;</p>\r\n',6399,'images/uploads/c037954f145a325c64b27572e023141f.jpg',0,0,8,'2015-12-11 14:52:50','2015-12-14 13:31:57'),(6,'Холодильник SAMSUNG RL 48 RLBSW','samsung-rl-48-rlbsw','<p>ип холодильника: Двухкамерный;</p>\r\n\r\n<p>Расположение морозилки: Нижнее;</p>\r\n\r\n<p>Общий объем, л: 346; Высота, см: 192;</p>\r\n\r\n<p>Система охлаждения: No Frost;</p>\r\n\r\n<p>Класс энергопотребления: A+;<br />\r\n&nbsp;</p>\r\n',13599,'images/uploads/933165a96116a4f1c27792a6efac5eb7.jpg',1,9,5,'2015-12-11 14:54:57','2015-12-15 09:32:23'),(7,'Холодильник Indesit BIAA 13 P SI ','indesit-biaa-13-p-si','<p>Тип холодильника: Двухкамерный;</p>\r\n\r\n<p>Расположение морозилки: Нижнее;</p>\r\n\r\n<p>Общий объем, л: 334; Высота, см: 187;</p>\r\n\r\n<p>Система охлаждения: Капельная;</p>\r\n\r\n<p>Класс энергопотребления: A+;<br />\r\n&nbsp;</p>\r\n',7777,'images/uploads/ac80ddb2628954d575f6a8ab3f615a5f.jpg',1,5,5,'2015-12-11 14:56:46','2015-12-15 09:32:31'),(8,'Холодильник LG GC-B379SVQW','lg-gc-b379svqw','',12099,'images/uploads/cfa474ea0c17dced6beef9a256b0f7b4.jpg',0,0,5,'2015-12-11 14:58:34','2015-12-11 14:58:34'),(9,'Пылесос Zelmer Aquawelt 919.0 ST ','zelmer-919-0-st_3','<p>Гарантийный срок: 12 месяцев;</p>\r\n\r\n<p>Тип пылесоса: Моющий;</p>\r\n\r\n<p>Регулировка мощности: На корпусе;</p>\r\n\r\n<p>Питание: От сети 220В; Труба всасывания:</p>\r\n\r\n<p>Телескопическая; Турбощетка: Есть;<br />\r\n&nbsp;</p>\r\n',3699,'images/uploads/80298d20ea4d949fae79509e426e1be7.jpg',1,15,4,'2015-12-11 15:00:21','2015-12-14 13:25:05'),(10,'Ноутбук Asus X553 (R515MA-SX688B) Black','asus-x553-r515ma-sx688b-black','<p>Диагональ дисплея: 15,6&quot;;</p>\r\n\r\n<p>Дисплей: Глянцевый экран;</p>\r\n\r\n<p>Тип процессора: Intel Celeron N2840 (2.16 ГГц);</p>\r\n\r\n<p>Оперативная память: 2 Гб;</p>\r\n\r\n<p>Жесткий диск HDD: 500 Гб;</p>\r\n\r\n<p>Графический адаптер: Intel HD Graphics;<br />\r\n&nbsp;</p>\r\n',6999,'images/uploads/cfc3a1175eda8071bba56416856bea93.jpg',1,15,14,'2015-12-11 15:03:04','2015-12-14 13:25:08'),(11,'Моноблок Lenovo C20-30 (F0B2003JUA) ','lenovo-c20-30-f0b2003jua','<p>Диагональ дисплея: 19.5&quot;;</p>\r\n\r\n<p>Тип процессора: Двухъядерный Intel Pentium 3558U (1.7 ГГц);</p>\r\n\r\n<p>Оперативная память: 4 Гб;</p>\r\n\r\n<p>Жесткий диск: 500 Gb;</p>\r\n\r\n<p>Графический адаптер: Intel HD Graphics;</p>\r\n\r\n<p>Оптический привод: DVD Super Multi;<br />\r\n&nbsp;</p>\r\n',13199,'images/uploads/4e36c7eb689f90192b414a6d97f3d7e9.jpg',1,12,13,'2015-12-11 15:06:19','2015-12-14 13:11:13');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2015-12-15 18:27:33
