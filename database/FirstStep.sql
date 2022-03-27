-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: firststep
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `username` varchar(60) NOT NULL,
  `pass` text NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(256) NOT NULL,
  `reg_day` datetime NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES ('favefrong2003@gmail.com','TGVtaW5oa2hvaTE3','Long','Lê','favefrong2003@gmail.com','0334669176','E1/37A tổ 3, ấp 5, xã Vĩnh Lộc A, huyện Bình Chánh, TP. Hồ Chí Minh','2022-03-22 13:35:45'),('kittori','cGh1b25nYW4yMDEx','charlotte','isville','iloveyoulove57@gmail.com','0988749615','Ho Chi Minh city','2022-03-27 14:26:28'),('minhpcse172070@fpt.edu.vn','TWluaFBoYW0xMTM=',' Kelvin','List','minhpcse172070@fpt.edu.vn','0446825793','dưới gầm cầu thủ thiên','2022-03-22 13:59:23'),('Minhpham3446@gmail.com','bWluaDEyMw==','Minh','Công','Minhpham3446@gmail.com','0348485169','Minhpham112332','2022-03-22 14:00:45');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill` (
  `id` char(7) NOT NULL,
  `payment_method` enum('CASH','CREDIT') NOT NULL,
  `tax` decimal(2,1) unsigned zerofill NOT NULL,
  `address` varchar(256) NOT NULL,
  `discount` int(10) unsigned zerofill NOT NULL,
  `shipping_cost` int(10) unsigned zerofill NOT NULL,
  `total` int(10) unsigned zerofill NOT NULL,
  `account_username` varchar(60) NOT NULL,
  `order_day` datetime NOT NULL,
  `status` enum('DONE','WAITING') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bill_account1_idx` (`account_username`),
  CONSTRAINT `fk_bill_account1` FOREIGN KEY (`account_username`) REFERENCES `account` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES ('qdrnJqm','CASH',0.1,'Ho Chi Minh city',0000000000,0000000000,0001243000,'kittori','2022-03-27 14:33:15','DONE'),('WUzH02R','CREDIT',0.1,'Good Job',0000000000,0000000000,0021681000,'favefrong2003@gmail.com','2022-03-27 14:15:37','DONE'),('YwT4n6v','CREDIT',0.1,'E1/37A tổ 3, ấp 5, xã Vĩnh Lộc A, huyện Bình Chánh, TP. Hồ Chí Minh',0000000000,0000000000,0001188000,'favefrong2003@gmail.com','2022-03-27 14:16:03','WAITING');
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill_content`
--

DROP TABLE IF EXISTS `bill_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill_content` (
  `bill_id` char(7) NOT NULL,
  `product_id` char(10) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`bill_id`,`product_id`),
  KEY `fk_product_has_bill_bill1_idx` (`bill_id`),
  KEY `fk_product_has_bill_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_has_bill_bill1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_has_bill_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill_content`
--

LOCK TABLES `bill_content` WRITE;
/*!40000 ALTER TABLE `bill_content` DISABLE KEYS */;
INSERT INTO `bill_content` VALUES ('qdrnJqm','0fB4ybaU12',1),('qdrnJqm','6r3u9uKBvW',1),('qdrnJqm','9vj0rKtgJZ',1),('WUzH02R','6r3u9uKBvW',2),('WUzH02R','9vj0rKtgJZ',3),('WUzH02R','hqvChVASYL',1),('YwT4n6v','eVD4mqGvBL',4),('YwT4n6v','jWQ3wUN4p5',1);
/*!40000 ALTER TABLE `bill_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id` char(6) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES ('0Lu8X8','Sai Gon Xanh','/FirstStep/images/brand/0Lu8X8.jpg'),('0XNHBe','Louis Vuitton','/FirstStep/images/brand/0XNHBe.jpg'),('76oPlA','Asus','/FirstStep/images/brand/76oPlA.png'),('AqXZQS','Sprite','/FirstStep/images/brand/AqXZQS.jpg'),('BdFvQY','Akko','/FirstStep/images/brand/BdFvQY.jpg'),('cBTD5o','Nike','/FirstStep/images/brand/cBTD5o.jpg'),('CVERsJ','Lego','/FirstStep/images/brand/CVERsJ.png'),('mA7qhh','Coca Cola','/FirstStep/images/brand/mA7qhh.png'),('oDCB7z','Dell','/FirstStep/images/brand/oDCB7z.jpg'),('TSxrUv','Adidas','/FirstStep/images/brand/TSxrUv.png'),('ZnMLAN','Rolex','/FirstStep/images/brand/ZnMLAN.png');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` char(5) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('10K6Z','Lego Toy','','/FirstStep/images/category/10K6Z.jpg'),('4J8W3','Shirt','Chip Chip!!!','/FirstStep/images/category/4J8W3.jpg'),('5pqbu','Soft Drink','','/FirstStep/images/category/5pqbu.jpg'),('76NCW','Shoes','','/FirstStep/images/category/76NCW.webp'),('cQnYO','pet','make u out of money','/FirstStep/images/category/cQnYO.jpg'),('DGHze','Wallet','','/FirstStep/images/category/DGHze.jpg'),('dn2Nl','Bag','','/FirstStep/images/category/dn2Nl.jpg'),('E6eJf','T-Shirt','','/FirstStep/images/category/E6eJf.jpg'),('JPymf','beer','','/FirstStep/images/category/JPymf.jpg'),('LXh7f','Table','','/FirstStep/images/category/LXh7f.jpg'),('mCDgo','Watch','','/FirstStep/images/category/mCDgo.png'),('QUKXd','Laptop','','/FirstStep/images/category/QUKXd.jpg'),('WxPDs','Mechanical keyboard','typing is so kimochii','/FirstStep/images/category/WxPDs.png'),('yApZ1','Food','','/FirstStep/images/category/yApZ1.jpg');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_involve`
--

DROP TABLE IF EXISTS `category_involve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_involve` (
  `category_id` char(5) NOT NULL,
  `product_id` char(10) NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`),
  KEY `fk_category_has_product_product1_idx` (`product_id`),
  KEY `fk_category_has_product_category1_idx` (`category_id`),
  CONSTRAINT `fk_category_has_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_category_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_involve`
--

LOCK TABLES `category_involve` WRITE;
/*!40000 ALTER TABLE `category_involve` DISABLE KEYS */;
INSERT INTO `category_involve` VALUES ('10K6Z','9vj0rKtgJZ'),('10K6Z','hqvChVASYL'),('10K6Z','kSUBUoMvQl'),('10K6Z','S0VEa1OuCn'),('4J8W3','hqvChVASYL'),('5pqbu','6r3u9uKBvW'),('5pqbu','eVD4mqGvBL'),('5pqbu','hqvChVASYL'),('5pqbu','ncDSNJUrE6'),('5pqbu','ylYY5tbOlJ'),('76NCW','0fB4ybaU12'),('76NCW','gORFCAKW8J'),('76NCW','hqvChVASYL'),('76NCW','itiQUKE0tf'),('76NCW','OaKySnzOFe'),('cQnYO','wfdPBjD2fJ'),('DGHze','hqvChVASYL'),('DGHze','kNmFtl3x4V'),('dn2Nl','iA6CarGd25'),('dn2Nl','ITEq6gBIOJ'),('dn2Nl','lXUPib8AD9'),('LXh7f','hqvChVASYL'),('mCDgo','jWQ3wUN4p5'),('mCDgo','PjQUwhfulX'),('QUKXd','ghksWkfX9M'),('QUKXd','hqvChVASYL'),('yApZ1','59Xkfx7LvO');
/*!40000 ALTER TABLE `category_involve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` char(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `main_img_link` text NOT NULL,
  `img_links` text NOT NULL,
  `price` int unsigned NOT NULL,
  `remain` int unsigned NOT NULL,
  `status` enum('SALE','NEW','NONE') NOT NULL,
  `brand_id` char(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_brand1_idx` (`brand_id`),
  CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('0fB4ybaU12','Black Shoes','Very quality shoes.','/FirstStep/images/product/0fB4ybaU12.webp','[\"\\/FirstStep\\/images\\/product\\/0fB4ybaU120.jpg\",\"\\/FirstStep\\/images\\/product\\/0fB4ybaU121.webp\"]',500000,0,'NONE','cBTD5o'),('59Xkfx7LvO','chicken nuggets','','/FirstStep/images/product/59Xkfx7LvO.jpg','[\"\\/FirstStep\\/images\\/product\\/59Xkfx7LvO0.jpg\"]',40000,0,'NEW',NULL),('6r3u9uKBvW','Thùng Soft Drink Sprite','1 Thùng 24 lon nước ngọt Sprite','/FirstStep/images/product/6r3u9uKBvW.jpg','[\"\\/FirstStep\\/images\\/product\\/6r3u9uKBvW0.png\"]',180000,0,'SALE','AqXZQS'),('9vj0rKtgJZ','Lego City','Arctic Mobile Exploration Base','/FirstStep/images/product/9vj0rKtgJZ.jpg','[\"\\/FirstStep\\/images\\/product\\/9vj0rKtgJZ0.jpg\"]',450000,0,'NEW','CVERsJ'),('eVD4mqGvBL','Trà sữa chân châu','','/FirstStep/images/product/eVD4mqGvBL.jpg','[\"\\/FirstStep\\/images\\/product\\/eVD4mqGvBL0.jpg\"]',20000,0,'NEW',NULL),('ghksWkfX9M','Laptop ROG','Best gaming laptop','/FirstStep/images/product/ghksWkfX9M.jpg','[\"\\/FirstStep\\/images\\/product\\/ghksWkfX9M0.jpg\"]',100000000,0,'NEW','76oPlA'),('gORFCAKW8J','Adidas shoes','Adidas Falcon Triple White 1:1','/FirstStep/images/product/gORFCAKW8J.jpg','[\"\\/FirstStep\\/images\\/product\\/gORFCAKW8J0.jpg\"]',1120000,0,'NEW','TSxrUv'),('hqvChVASYL','Laptop Dell','Laptop Dell Inspiron 3580 i7-8565U/8GB/2TB HDD/WIN10','/FirstStep/images/product/hqvChVASYL.jpg','[\"\\/FirstStep\\/images\\/product\\/hqvChVASYL0.jpg\"]',18000000,0,'NEW','oDCB7z'),('iA6CarGd25','Camelia bag','','/FirstStep/images/product/iA6CarGd25.jpg','[\"\\/FirstStep\\/images\\/product\\/iA6CarGd250.webp\"]',400000,0,'NEW',NULL),('ITEq6gBIOJ','Blue Bag','Good bag!','/FirstStep/images/product/ITEq6gBIOJ.jpg','[]',200000,0,'NEW','TSxrUv'),('itiQUKE0tf','Sneaker','','/FirstStep/images/product/itiQUKE0tf.jpeg','[\"\\/FirstStep\\/images\\/product\\/itiQUKE0tf0.jpg\"]',500000,0,'NEW',NULL),('jWQ3wUN4p5','Casio watch','','/FirstStep/images/product/jWQ3wUN4p5.png','[\"\\/FirstStep\\/images\\/product\\/jWQ3wUN4p50.jpg\"]',1000000,0,'NEW',NULL),('kNmFtl3x4V','Camelia wallet','','/FirstStep/images/product/kNmFtl3x4V.jpg','[\"\\/FirstStep\\/images\\/product\\/kNmFtl3x4V0.jpg\"]',250000,0,'NEW',NULL),('kSUBUoMvQl','Lego Minecraft','Lego Minecraft - The Creeper Mine','/FirstStep/images/product/kSUBUoMvQl.jpg','[\"\\/FirstStep\\/images\\/product\\/kSUBUoMvQl0.jpg\"]',500000,0,'NEW','CVERsJ'),('lXUPib8AD9','Red Bag','Beautiful scarlet bag.','/FirstStep/images/product/lXUPib8AD9.jpg','[]',250000,0,'NEW','0XNHBe'),('ncDSNJUrE6','Coca Zero','Sử dụng đường Sucralose','/FirstStep/images/product/ncDSNJUrE6.jpg','[\"\\/FirstStep\\/images\\/product\\/ncDSNJUrE60.jpg\"]',25000,0,'NEW','mA7qhh'),('OaKySnzOFe','Adidas sneaker','','/FirstStep/images/product/OaKySnzOFe.jpg','[\"\\/FirstStep\\/images\\/product\\/OaKySnzOFe0.webp\"]',2000000,0,'NEW','TSxrUv'),('PjQUwhfulX','Đồng hồ Rolex','Đồng Hồ Rolex Datejust 36 126233 Mặt Số Trắng Cọc Số Dạ Quang-Size 36mm','/FirstStep/images/product/PjQUwhfulX.jpg','[]',450000000,0,'NEW','ZnMLAN'),('S0VEa1OuCn','Lego City','','/FirstStep/images/product/S0VEa1OuCn.jpg','[\"\\/FirstStep\\/images\\/product\\/S0VEa1OuCn0.png\"]',600000,0,'NEW','CVERsJ'),('wfdPBjD2fJ','Chó Shiba','giống chó Shiba từ Nhật Bản','/FirstStep/images/product/wfdPBjD2fJ.jpg','[]',48000000,0,'NEW',NULL),('ylYY5tbOlJ','1 thùng coca cola zero','1 thùng coca cola zero không đường 24 lon','/FirstStep/images/product/ylYY5tbOlJ.jpg','[]',240000,0,'NEW',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `product_id` char(10) NOT NULL,
  `account_username` varchar(60) NOT NULL,
  PRIMARY KEY (`product_id`,`account_username`),
  KEY `fk_product_has_account_account1_idx` (`account_username`),
  KEY `fk_product_has_account_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_has_account_account1` FOREIGN KEY (`account_username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_has_account_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES ('0fB4ybaU12','kittori'),('59Xkfx7LvO','favefrong2003@gmail.com'),('6r3u9uKBvW','favefrong2003@gmail.com'),('9vj0rKtgJZ','favefrong2003@gmail.com'),('kSUBUoMvQl','favefrong2003@gmail.com');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-27 23:32:47
