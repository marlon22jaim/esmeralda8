/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.31 : Database - laesmeralda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laesmeralda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `laesmeralda`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`image`,`created_at`,`updated_at`) values 
(1,'ALIMENTOS','63c61af72d896_.png','2023-01-03 02:51:36','2023-01-17 03:50:15'),
(2,'BEBIDAS','63c61ba742fb9_.png','2023-01-03 02:51:36','2023-01-17 03:53:11'),
(3,'PRODUCTOS DE LIMPIEZA','63d340ac89578_.png','2023-01-03 02:51:36','2023-01-27 03:10:36'),
(4,'PRODUCTOS CUIDADO PERSONAL','63c61b4996207_.png','2023-01-03 02:51:36','2023-01-17 03:51:37'),
(5,'ABARROTES','63c61b246f496_.png','2023-01-03 02:51:36','2023-01-17 03:51:00'),
(6,'MASCOTAS edit','63c61abd02b05_.png','2023-01-03 02:51:36','2023-02-06 01:20:06'),
(7,'PAPELERIA','63c61a8c41351_.png','2023-01-03 02:51:36','2023-01-17 03:48:28'),
(12,'xbox','63c460c23f20f_.jpg','2023-01-15 20:23:30','2023-01-15 20:23:30'),
(16,'Nueva Categoría nouu','63c61ce63c129_.png','2023-01-17 03:58:18','2023-02-06 01:18:33'),
(18,'Otra nuevaaa 2','63d3446cb0fdb_.jpg','2023-01-27 03:13:02','2023-01-27 03:26:36'),
(21,'prueba category',NULL,'2023-02-06 01:20:25','2023-02-06 01:20:25'),
(22,'Regalos',NULL,'2023-06-15 21:52:41','2023-06-15 21:52:41');

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxpayer_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

insert  into `companies`(`id`,`name`,`address`,`phone`,`taxpayer_id`,`created_at`,`updated_at`) values 
(1,'La Esmeralda','Cra. 5, Toledo, Norte de Santander','3003883880','1094370772','2023-02-11 21:54:18','2023-02-11 21:54:21');

/*Table structure for table `denominations` */

DROP TABLE IF EXISTS `denominations`;

CREATE TABLE `denominations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('BILLETE','MONEDA','OTRO') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BILLETE',
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `denominations` */

insert  into `denominations`(`id`,`type`,`value`,`image`,`created_at`,`updated_at`) values 
(1,'BILLETE','2000',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(2,'BILLETE','5000',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(3,'BILLETE','10000',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(4,'BILLETE','20000',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(5,'BILLETE','50000',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(6,'BILLETE','100000',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(7,'MONEDA','1000',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(8,'MONEDA','500',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(9,'MONEDA','200',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(10,'MONEDA','100',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(11,'MONEDA','50',NULL,'2023-01-03 02:51:36','2023-01-03 02:51:36'),
(12,'OTRO','0','63ccabad1c79f_.png','2023-01-03 02:51:36','2023-01-22 03:21:17');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_12_26_002812_create_companies_table',1),
(6,'2022_12_26_004123_create_denominations_table',1),
(7,'2022_12_26_004641_create_categories_table',1),
(8,'2022_12_26_020855_create_products_table',1),
(9,'2022_12_26_023923_create_sales_table',1),
(10,'2022_12_26_025438_create_sale_details_table',1),
(11,'2023_01_29_043612_create_permission_tables',2);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',1),
(1,'App\\Models\\User',2),
(3,'App\\Models\\User',3),
(3,'App\\Models\\User',8);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('andres_jr19@hotmail.com','$2y$10$wWjj5baIr1guafZyCipWiuwr0hg3BhY7mM7B7MWtCHyPN2LMLEmYi','2023-01-29 22:42:10');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Categoria_Crear','web','2023-01-29 16:24:08','2023-02-08 02:11:25'),
(4,'Categoria_Eliminar','web','2023-01-29 21:37:29','2023-02-08 02:22:41'),
(5,'Categoria_Ver','web','2023-02-08 02:06:11','2023-02-08 02:22:51'),
(6,'Categoria_Buscar','web','2023-02-08 02:06:22','2023-02-08 02:14:13'),
(7,'Categoria_Actualizar','web','2023-02-08 02:06:29','2023-02-08 02:23:00'),
(8,'Producto_Ver','web','2023-02-08 02:35:53','2023-02-08 02:35:53'),
(9,'Producto_Actualizar','web','2023-02-08 02:36:07','2023-02-08 02:36:07'),
(10,'Producto_Crear','web','2023-02-08 02:36:22','2023-02-08 02:36:22'),
(11,'Producto_Buscar','web','2023-02-08 02:36:33','2023-02-08 02:36:33'),
(12,'Producto_Eliminar','web','2023-02-08 02:39:00','2023-02-08 02:39:00'),
(13,'Monedas_Actualizar','web','2023-02-08 02:58:04','2023-02-08 02:58:04'),
(14,'Monedas_Crear','web','2023-02-08 03:14:02','2023-02-08 03:14:02'),
(15,'Monedas_Ver','web','2023-02-08 03:14:18','2023-02-08 03:14:18'),
(16,'Monedas_Buscar','web','2023-02-08 03:14:33','2023-02-08 03:14:33'),
(17,'Monedas_Eliminar','web','2023-02-08 03:14:42','2023-02-08 03:14:42'),
(18,'Reportes_Ver','web','2023-02-08 03:40:23','2023-02-08 03:40:23'),
(19,'Arqueos_Ver','web','2023-02-08 03:40:31','2023-02-08 03:40:31'),
(20,'Usuarios_Ver','web','2023-02-08 03:40:58','2023-02-08 03:40:58'),
(21,'Asignar_Ver','web','2023-02-08 03:41:07','2023-02-08 03:41:07'),
(22,'Permisos_Ver','web','2023-02-08 03:41:17','2023-02-08 03:41:17'),
(23,'Roles_Ver','web','2023-02-08 03:41:25','2023-02-08 03:41:25'),
(24,'Ventas_Ver','web','2023-02-08 03:42:43','2023-02-08 03:42:43');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int NOT NULL,
  `alerts` int NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`barcode`,`cost`,`price`,`stock`,`alerts`,`image`,`category_id`,`created_at`,`updated_at`) values 
(1,'LECHE','123456789',3000.00,3800.00,19,8,'63d3412126922_.jpg',1,'2023-01-03 02:51:36','2023-02-12 09:43:04'),
(2,'Chocolatina JET','12345678',1000.00,2500.00,16,8,'agua.png',22,'2023-01-03 02:51:36','2023-06-15 21:52:53'),
(3,'JABÓN PARA PLATOS','1234567',2500.00,3500.00,14,5,'jabon_platos.png',3,'2023-01-03 02:51:36','2023-02-12 05:23:37'),
(4,'BASSI CARNES ADOBO','7704269572829',1800.00,2500.00,21,5,'63d338a149653_.jpg',1,'2023-01-03 02:51:36','2023-02-12 05:23:37'),
(5,'Ancheta de regalo 3','7704269103276',30000.00,40000.00,1122,5,'arroz.png',22,'2023-01-03 02:51:36','2023-06-15 21:53:48'),
(6,'Desayuno sorpresa 1','123458',3000.00,50000.00,22,5,'azucar.png',22,'2023-01-03 02:51:36','2023-06-15 21:53:19'),
(7,'Globos Helio','13458',2000.00,4000.00,11,5,'comida_gatos.png',22,'2023-01-03 02:51:36','2023-06-15 21:54:28'),
(8,'LAPICERO MARCA BIC','134589',1000.00,1500.00,25,10,'lapicero.png',7,'2023-01-03 02:51:36','2023-02-12 05:23:37'),
(13,'Prueba ','123',500.00,700.00,99909,10,'63d3443c323a3_.jpg',18,'2023-01-27 03:25:20','2023-02-12 12:16:08'),
(14,'Pruebaa','7706569001917',1234.00,1234.00,9947,2,'63d4911f3b3fe_.png',18,'2023-01-28 03:00:17','2023-02-12 05:16:30'),
(15,'nuevo','321',3000.00,5000.00,21,10,'63e056024b35d_.png',21,'2023-02-06 01:21:06','2023-02-06 01:22:03');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(11,1),
(12,1),
(13,1),
(14,1),
(15,1),
(16,1),
(17,1),
(18,1),
(19,1),
(20,1),
(21,1),
(22,1),
(23,1),
(24,1),
(5,3),
(6,3),
(8,3),
(11,3),
(15,3),
(16,3),
(24,3),
(1,8),
(4,8),
(5,8),
(6,8),
(7,8),
(8,8),
(9,8),
(10,8),
(11,8),
(12,8),
(13,8),
(14,8),
(15,8),
(16,8),
(17,8),
(18,8),
(19,8),
(24,8);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Admin','web','2023-01-29 06:20:31','2023-01-29 06:20:31'),
(3,'Empleado','web','2023-01-29 06:25:00','2023-01-29 06:25:00'),
(8,'Empleado admin','web','2023-02-08 03:54:13','2023-02-08 03:54:13');

/*Table structure for table `sale_details` */

DROP TABLE IF EXISTS `sale_details`;

CREATE TABLE `sale_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `sale_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_details_product_id_foreign` (`product_id`),
  KEY `sale_details_sale_id_foreign` (`sale_id`),
  CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sale_details` */

insert  into `sale_details`(`id`,`price`,`quantity`,`product_id`,`sale_id`,`created_at`,`updated_at`) values 
(1,2500.00,1.00,4,1,'2023-01-28 04:12:47','2023-01-28 04:12:47'),
(2,1234.00,2.00,14,2,'2023-01-28 04:26:11','2023-01-28 04:26:11'),
(3,1234.00,5.00,14,3,'2023-01-28 04:26:53','2023-01-28 04:26:53'),
(4,4500.00,2.00,5,3,'2023-01-28 04:26:53','2023-01-28 04:26:53'),
(5,2500.00,1.00,4,4,'2023-01-28 04:27:51','2023-01-28 04:27:51'),
(6,1234.00,1.00,14,5,'2023-01-28 04:28:08','2023-01-28 04:28:08'),
(7,4500.00,26.00,5,6,'2023-01-28 04:28:34','2023-01-28 04:28:34'),
(8,2500.00,18.00,4,7,'2023-01-28 04:29:42','2023-01-28 04:29:42'),
(9,4500.00,2.00,5,8,'2023-01-28 04:30:08','2023-01-28 04:30:08'),
(10,1234.00,1.00,14,9,'2023-01-28 04:31:02','2023-01-28 04:31:02'),
(11,700.00,6.00,13,10,'2023-01-29 19:00:21','2023-01-29 19:00:21'),
(12,700.00,4.00,13,11,'2023-01-29 19:01:14','2023-01-29 19:01:14'),
(13,700.00,3.00,13,12,'2023-02-04 06:30:18','2023-02-04 06:30:18'),
(14,1234.00,2.00,14,12,'2023-02-04 06:30:18','2023-02-04 06:30:18'),
(15,700.00,2.00,13,13,'2023-02-05 06:41:13','2023-02-05 06:41:13'),
(16,700.00,1.00,13,14,'2023-02-05 06:41:21','2023-02-05 06:41:21'),
(17,700.00,1.00,13,15,'2023-02-05 07:13:47','2023-02-05 07:13:47'),
(18,700.00,1.00,13,16,'2023-02-05 07:15:12','2023-02-05 07:15:12'),
(19,700.00,3.00,13,17,'2023-02-05 07:15:38','2023-02-05 07:15:38'),
(20,700.00,1.00,13,18,'2023-02-05 07:15:46','2023-02-05 07:15:46'),
(21,700.00,2.00,13,19,'2023-02-05 07:16:09','2023-02-05 07:16:09'),
(22,700.00,2.00,13,20,'2023-02-05 07:25:15','2023-02-05 07:25:15'),
(23,1500.00,3.00,2,20,'2023-02-05 07:25:15','2023-02-05 07:25:15'),
(24,1234.00,2.00,14,21,'2023-02-05 23:07:01','2023-02-05 23:07:01'),
(25,1234.00,4.00,14,22,'2023-02-05 23:07:15','2023-02-05 23:07:15'),
(26,700.00,1.00,13,22,'2023-02-05 23:07:15','2023-02-05 23:07:15'),
(27,1234.00,3.00,14,23,'2023-02-06 01:22:03','2023-02-06 01:22:03'),
(28,5000.00,7.00,15,23,'2023-02-06 01:22:03','2023-02-06 01:22:03'),
(29,1234.00,12.00,14,24,'2023-02-06 02:09:58','2023-02-06 02:09:58'),
(30,700.00,2.00,13,25,'2023-02-06 02:10:18','2023-02-06 02:10:18'),
(31,700.00,2.00,13,26,'2023-02-08 03:59:48','2023-02-08 03:59:48'),
(32,1234.00,5.00,14,27,'2023-02-12 06:26:32','2023-02-12 06:26:32'),
(33,700.00,3.00,13,27,'2023-02-12 06:26:32','2023-02-12 06:26:32'),
(34,1234.00,2.00,14,28,'2023-02-12 06:30:21','2023-02-12 06:30:21'),
(35,700.00,2.00,13,28,'2023-02-12 06:30:21','2023-02-12 06:30:21'),
(36,700.00,1.00,13,29,'2023-02-12 06:31:33','2023-02-12 06:31:33'),
(37,700.00,1.00,13,30,'2023-02-12 06:31:50','2023-02-12 06:31:50'),
(38,700.00,2.00,13,31,'2023-02-12 06:32:50','2023-02-12 06:32:50'),
(39,700.00,1.00,13,32,'2023-02-12 06:40:13','2023-02-12 06:40:13'),
(40,700.00,2.00,13,33,'2023-02-12 06:49:59','2023-02-12 06:49:59'),
(41,700.00,4.00,13,34,'2023-02-12 07:07:36','2023-02-12 07:07:36'),
(42,700.00,3.00,13,35,'2023-02-12 07:09:25','2023-02-12 07:09:25'),
(43,1234.00,4.00,14,36,'2023-02-12 07:12:15','2023-02-12 07:12:15'),
(44,700.00,2.00,13,36,'2023-02-12 07:12:15','2023-02-12 07:12:15'),
(45,700.00,2.00,13,37,'2023-02-12 07:19:56','2023-02-12 07:19:56'),
(46,1234.00,8.00,14,37,'2023-02-12 07:19:56','2023-02-12 07:19:56'),
(47,700.00,2.00,13,38,'2023-02-12 07:23:28','2023-02-12 07:23:28'),
(48,700.00,1.00,13,39,'2023-02-12 07:24:36','2023-02-12 07:24:36'),
(49,700.00,1.00,13,40,'2023-02-12 07:25:24','2023-02-12 07:25:24'),
(50,700.00,1.00,13,41,'2023-02-12 07:26:58','2023-02-12 07:26:58'),
(51,700.00,4.00,13,43,'2023-02-12 07:33:49','2023-02-12 07:33:49'),
(52,1234.00,2.00,14,43,'2023-02-12 07:33:49','2023-02-12 07:33:49'),
(53,1234.00,2.00,14,44,'2023-02-12 07:39:15','2023-02-12 07:39:15'),
(54,700.00,5.00,13,44,'2023-02-12 07:39:15','2023-02-12 07:39:15'),
(55,700.00,3.00,13,46,'2023-02-12 07:43:02','2023-02-12 07:43:02'),
(56,700.00,2.00,13,47,'2023-02-12 07:52:24','2023-02-12 07:52:24'),
(57,700.00,2.00,13,48,'2023-02-12 07:53:24','2023-02-12 07:53:24'),
(58,1234.00,2.00,14,48,'2023-02-12 07:53:24','2023-02-12 07:53:24'),
(59,1234.00,2.00,14,49,'2023-02-12 07:55:37','2023-02-12 07:55:37'),
(60,700.00,3.00,13,49,'2023-02-12 07:55:37','2023-02-12 07:55:37'),
(61,700.00,3.00,13,51,'2023-02-12 08:05:04','2023-02-12 08:05:04'),
(62,700.00,3.00,13,52,'2023-02-12 08:05:36','2023-02-12 08:05:36'),
(63,1234.00,2.00,14,53,'2023-02-12 08:06:51','2023-02-12 08:06:51'),
(64,700.00,1.00,13,53,'2023-02-12 08:06:51','2023-02-12 08:06:51'),
(65,700.00,1.00,13,54,'2023-02-12 08:09:55','2023-02-12 08:09:55'),
(66,700.00,2.00,13,55,'2023-02-12 08:25:01','2023-02-12 08:25:01'),
(67,700.00,2.00,13,56,'2023-02-12 08:25:20','2023-02-12 08:25:20'),
(68,1234.00,1.00,14,57,'2023-02-12 08:26:01','2023-02-12 08:26:01'),
(69,700.00,11.00,13,57,'2023-02-12 08:26:01','2023-02-12 08:26:01'),
(70,700.00,1.00,13,58,'2023-02-12 08:26:29','2023-02-12 08:26:29'),
(71,1234.00,2.00,14,58,'2023-02-12 08:26:29','2023-02-12 08:26:29'),
(72,700.00,2.00,13,59,'2023-02-12 08:42:40','2023-02-12 08:42:40'),
(73,700.00,2.00,13,60,'2023-02-12 08:52:30','2023-02-12 08:52:30'),
(74,700.00,2.00,13,61,'2023-02-12 09:15:53','2023-02-12 09:15:53'),
(75,700.00,2.00,13,62,'2023-02-12 09:17:39','2023-02-12 09:17:39'),
(76,700.00,2.00,13,63,'2023-02-12 09:19:04','2023-02-12 09:19:04'),
(77,1234.00,2.00,14,64,'2023-02-12 09:23:32','2023-02-12 09:23:32'),
(78,700.00,2.00,13,64,'2023-02-12 09:23:32','2023-02-12 09:23:32'),
(79,700.00,2.00,13,65,'2023-02-12 09:28:17','2023-02-12 09:28:17'),
(80,1234.00,2.00,14,66,'2023-02-12 09:34:42','2023-02-12 09:34:42'),
(81,700.00,2.00,13,66,'2023-02-12 09:34:42','2023-02-12 09:34:42'),
(82,700.00,1.00,13,67,'2023-02-12 09:36:51','2023-02-12 09:36:51'),
(83,1234.00,2.00,14,67,'2023-02-12 09:36:51','2023-02-12 09:36:51'),
(84,700.00,3.00,13,68,'2023-02-12 09:37:15','2023-02-12 09:37:15'),
(85,1500.00,2.00,2,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(86,1500.00,2.00,8,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(87,3500.00,2.00,3,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(88,4500.00,2.00,5,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(89,4500.00,4.00,6,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(90,2500.00,4.00,4,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(91,15000.00,3.00,7,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(92,3800.00,1.00,1,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(93,1234.00,6.00,14,69,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(94,700.00,4.00,13,70,'2023-02-12 09:51:28','2023-02-12 09:51:28'),
(95,1234.00,6.00,14,70,'2023-02-12 09:51:28','2023-02-12 09:51:28'),
(96,1234.00,3.00,14,71,'2023-02-12 09:56:27','2023-02-12 09:56:27'),
(97,700.00,2.00,13,71,'2023-02-12 09:56:27','2023-02-12 09:56:27'),
(98,700.00,2.00,13,72,'2023-02-12 09:57:40','2023-02-12 09:57:40'),
(99,700.00,1.00,13,73,'2023-02-12 10:00:36','2023-02-12 10:00:36'),
(100,700.00,2.00,13,74,'2023-02-12 05:07:03','2023-02-12 05:07:03'),
(101,700.00,2.00,13,75,'2023-02-12 05:13:18','2023-02-12 05:13:18'),
(102,1234.00,3.00,14,75,'2023-02-12 05:13:19','2023-02-12 05:13:19'),
(103,700.00,1.00,13,76,'2023-02-12 05:16:30','2023-02-12 05:16:30'),
(104,1234.00,4.00,14,76,'2023-02-12 05:16:30','2023-02-12 05:16:30'),
(105,1500.00,1.00,2,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(106,4500.00,1.00,5,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(107,15000.00,1.00,7,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(108,3500.00,1.00,3,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(109,700.00,2.00,13,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(110,1500.00,3.00,8,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(111,4500.00,2.00,6,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(112,2500.00,3.00,4,77,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(113,1500.00,2.00,2,78,'2023-02-12 11:22:14','2023-02-12 11:22:14'),
(114,700.00,1.00,13,79,'2023-02-12 11:25:05','2023-02-12 11:25:05'),
(115,1500.00,1.00,2,80,'2023-02-12 11:26:16','2023-02-12 11:26:16'),
(116,700.00,1.00,13,81,'2023-02-12 12:15:59','2023-02-12 12:15:59'),
(117,700.00,1.00,13,82,'2023-02-12 12:16:08','2023-02-12 12:16:08');

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `total` decimal(10,2) NOT NULL,
  `items` int NOT NULL,
  `cash` decimal(10,2) NOT NULL,
  `change` decimal(10,2) NOT NULL,
  `status` enum('PAID','PENDING','CANCELLED') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PAID',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_user_id_foreign` (`user_id`),
  CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sales` */

insert  into `sales`(`id`,`total`,`items`,`cash`,`change`,`status`,`user_id`,`created_at`,`updated_at`) values 
(1,2500.00,0,2500.00,0.00,'PAID',1,'2023-01-28 04:12:47','2023-01-28 04:12:47'),
(2,2468.00,2,5000.00,2532.00,'PAID',1,'2023-01-28 04:26:11','2023-01-28 04:26:11'),
(3,15170.00,7,20000.00,4830.00,'PAID',1,'2023-01-28 04:26:53','2023-01-28 04:26:53'),
(4,2500.00,0,50000.00,47500.00,'PAID',1,'2023-01-28 04:27:51','2023-01-28 04:27:51'),
(5,1234.00,0,1234.00,0.00,'PAID',1,'2023-01-28 04:28:08','2023-01-28 04:28:08'),
(6,117000.00,26,202000.00,85000.00,'PAID',1,'2023-01-28 04:28:34','2023-01-28 04:28:34'),
(7,45000.00,18,45000.00,0.00,'PAID',1,'2023-01-28 04:29:42','2023-01-28 04:29:42'),
(8,9000.00,2,9000.00,0.00,'PAID',1,'2023-01-28 04:30:08','2023-01-28 04:30:08'),
(9,1234.00,0,1234.00,0.00,'PAID',1,'2023-01-28 04:31:02','2023-01-28 04:31:02'),
(10,4200.00,6,50000.00,45800.00,'PAID',1,'2023-01-29 19:00:21','2023-01-29 19:00:21'),
(11,2800.00,4,20000.00,17200.00,'PAID',1,'2023-01-29 19:01:14','2023-01-29 19:01:14'),
(12,4568.00,5,4568.00,0.00,'PAID',1,'2023-02-04 06:30:18','2023-02-04 06:30:18'),
(13,1400.00,2,2100.00,700.00,'PAID',1,'2023-02-05 06:41:13','2023-02-05 06:41:13'),
(14,700.00,0,700.00,0.00,'PAID',1,'2023-02-05 06:41:21','2023-02-05 06:41:21'),
(15,700.00,1,10000.00,9300.00,'PAID',1,'2023-02-05 07:13:47','2023-02-05 07:13:47'),
(16,700.00,0,1000.00,300.00,'PAID',1,'2023-02-05 07:15:12','2023-02-05 07:15:12'),
(17,2100.00,3,5000.00,2900.00,'PAID',1,'2023-02-05 07:15:38','2023-02-05 07:15:38'),
(18,700.00,0,2000.00,2000.00,'PAID',1,'2023-02-05 07:15:46','2023-02-05 07:15:46'),
(19,1400.00,2,5000.00,3600.00,'PAID',1,'2023-02-05 07:16:09','2023-02-05 07:16:09'),
(20,5900.00,5,5900.00,0.00,'PAID',1,'2023-02-05 07:25:15','2023-02-05 07:25:15'),
(21,2468.00,2,2468.00,0.00,'PAID',1,'2023-02-05 23:07:01','2023-02-05 23:07:01'),
(22,5636.00,4,5636.00,0.00,'PAID',1,'2023-02-05 23:07:15','2023-02-05 23:07:15'),
(23,38702.00,10,50000.00,11298.00,'PAID',1,'2023-02-06 01:22:03','2023-02-06 01:22:03'),
(24,14808.00,12,14808.00,0.00,'PAID',1,'2023-02-06 02:09:58','2023-02-06 02:09:58'),
(25,1400.00,2,34441.00,0.00,'PAID',1,'2023-02-06 02:10:18','2023-02-06 02:10:18'),
(26,1400.00,2,1400.00,0.00,'PAID',8,'2023-02-08 03:59:48','2023-02-08 03:59:48'),
(27,8270.00,8,100000.00,91730.00,'PAID',1,'2023-02-12 06:26:32','2023-02-12 06:26:32'),
(28,3868.00,4,20000.00,16132.00,'PAID',1,'2023-02-12 06:30:21','2023-02-12 06:30:21'),
(29,700.00,0,700.00,0.00,'PAID',1,'2023-02-12 06:31:33','2023-02-12 06:31:33'),
(30,700.00,0,20000.00,19300.00,'PAID',1,'2023-02-12 06:31:50','2023-02-12 06:31:50'),
(31,1400.00,2,20000.00,18600.00,'PAID',1,'2023-02-12 06:32:50','2023-02-12 06:32:50'),
(32,700.00,1,2000.00,1300.00,'PAID',1,'2023-02-12 06:40:13','2023-02-12 06:40:13'),
(33,1400.00,2,5000.00,4300.00,'PAID',1,'2023-02-12 06:49:59','2023-02-12 06:49:59'),
(34,2800.00,4,5000.00,2200.00,'PAID',1,'2023-02-12 07:07:36','2023-02-12 07:07:36'),
(35,2100.00,3,7100.00,5000.00,'PAID',1,'2023-02-12 07:09:25','2023-02-12 07:09:25'),
(36,6336.00,6,10000.00,3664.00,'PAID',1,'2023-02-12 07:12:15','2023-02-12 07:12:15'),
(37,11272.00,10,50000.00,38728.00,'PAID',1,'2023-02-12 07:19:56','2023-02-12 07:19:56'),
(38,1400.00,2,2000.00,1300.00,'PAID',1,'2023-02-12 07:23:28','2023-02-12 07:23:28'),
(39,700.00,0,1000.00,300.00,'PAID',1,'2023-02-12 07:24:36','2023-02-12 07:24:36'),
(40,700.00,0,1000.00,300.00,'PAID',1,'2023-02-12 07:25:24','2023-02-12 07:25:24'),
(41,700.00,0,1000.00,300.00,'PAID',1,'2023-02-12 07:26:58','2023-02-12 07:26:58'),
(42,700.00,0,1000.00,300.00,'PAID',1,'2023-02-12 07:29:49','2023-02-12 07:29:49'),
(43,5268.00,6,50000.00,44732.00,'PAID',1,'2023-02-12 07:33:49','2023-02-12 07:33:49'),
(44,5968.00,7,100000.00,94032.00,'PAID',1,'2023-02-12 07:39:15','2023-02-12 07:39:15'),
(45,5968.00,7,100000.00,94032.00,'PAID',1,'2023-02-12 07:42:41','2023-02-12 07:42:41'),
(46,2100.00,3,5050.00,2950.00,'PAID',1,'2023-02-12 07:43:02','2023-02-12 07:43:02'),
(47,1400.00,2,20000.00,18600.00,'PAID',1,'2023-02-12 07:52:24','2023-02-12 07:52:24'),
(48,3868.00,4,70000.00,66132.00,'PAID',1,'2023-02-12 07:53:24','2023-02-12 07:53:24'),
(49,4568.00,5,20000.00,15432.00,'PAID',1,'2023-02-12 07:55:37','2023-02-12 07:55:37'),
(50,4568.00,5,24568.00,20000.00,'PAID',1,'2023-02-12 08:04:49','2023-02-12 08:04:49'),
(51,2100.00,3,2100.00,0.00,'PAID',1,'2023-02-12 08:05:04','2023-02-12 08:05:04'),
(52,2100.00,3,10100.00,8000.00,'PAID',1,'2023-02-12 08:05:36','2023-02-12 08:05:36'),
(53,3168.00,2,4168.00,1000.00,'PAID',1,'2023-02-12 08:06:51','2023-02-12 08:06:51'),
(54,700.00,0,700.00,0.00,'PAID',1,'2023-02-12 08:09:55','2023-02-12 08:09:55'),
(55,1400.00,2,5000.00,4300.00,'PAID',1,'2023-02-12 08:25:01','2023-02-12 08:25:01'),
(56,1400.00,2,50000.00,48600.00,'PAID',1,'2023-02-12 08:25:20','2023-02-12 08:25:20'),
(57,8934.00,12,17868.00,8934.00,'PAID',1,'2023-02-12 08:26:01','2023-02-12 08:26:01'),
(58,3168.00,3,3168.00,0.00,'PAID',1,'2023-02-12 08:26:29','2023-02-12 08:26:29'),
(59,1400.00,2,2100.00,700.00,'PAID',1,'2023-02-12 08:42:40','2023-02-12 08:42:40'),
(60,1400.00,2,2100.00,700.00,'PAID',1,'2023-02-12 08:52:30','2023-02-12 08:52:30'),
(61,1400.00,2,2000.00,600.00,'PAID',1,'2023-02-12 09:15:53','2023-02-12 09:15:53'),
(62,1400.00,2,5000.00,4300.00,'PAID',1,'2023-02-12 09:17:39','2023-02-12 09:17:39'),
(63,1400.00,2,2000.00,1300.00,'PAID',1,'2023-02-12 09:19:04','2023-02-12 09:19:04'),
(64,3868.00,4,100000.00,96132.00,'PAID',1,'2023-02-12 09:23:32','2023-02-12 09:23:32'),
(65,1400.00,2,5000.00,4300.00,'PAID',1,'2023-02-12 09:28:17','2023-02-12 09:28:17'),
(66,3868.00,4,3868.00,0.00,'PAID',1,'2023-02-12 09:34:42','2023-02-12 09:34:42'),
(67,3168.00,3,6168.00,3000.00,'PAID',1,'2023-02-12 09:36:51','2023-02-12 09:36:51'),
(68,2100.00,3,2100.00,0.00,'PAID',1,'2023-02-12 09:37:15','2023-02-12 09:37:15'),
(69,106204.00,26,150000.00,43796.00,'PAID',1,'2023-02-12 09:43:04','2023-02-12 09:43:04'),
(70,10204.00,10,20000.00,9796.00,'PAID',1,'2023-02-12 09:51:28','2023-02-12 09:51:28'),
(71,5102.00,5,10000.00,4898.00,'PAID',1,'2023-02-12 09:56:27','2023-02-12 09:56:27'),
(72,1400.00,2,2000.00,600.00,'PAID',1,'2023-02-12 09:57:40','2023-02-12 09:57:40'),
(73,700.00,0,700.00,0.00,'PAID',1,'2023-02-12 10:00:36','2023-02-12 10:00:36'),
(74,1400.00,2,2000.00,600.00,'PAID',1,'2023-02-12 05:07:03','2023-02-12 05:07:03'),
(75,5102.00,5,10000.00,4898.00,'PAID',1,'2023-02-12 05:13:18','2023-02-12 05:13:18'),
(76,5636.00,5,50000.00,44364.00,'PAID',1,'2023-02-12 05:16:30','2023-02-12 05:16:30'),
(77,46900.00,14,50000.00,3100.00,'PAID',1,'2023-02-12 05:23:37','2023-02-12 05:23:37'),
(78,3000.00,2,3000.00,0.00,'PAID',1,'2023-02-12 11:22:14','2023-02-12 11:22:14'),
(79,700.00,1,700.00,0.00,'PAID',1,'2023-02-12 11:25:05','2023-02-12 11:25:05'),
(80,1500.00,1,1500.00,0.00,'PAID',1,'2023-02-12 11:26:16','2023-02-12 11:26:16'),
(81,700.00,1,700.00,0.00,'PAID',1,'2023-02-12 12:15:59','2023-02-12 12:15:59'),
(82,700.00,1,700.00,0.00,'PAID',1,'2023-02-12 12:16:08','2023-02-12 12:16:08');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` enum('Active','Locked') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `password` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`phone`,`email`,`email_verified_at`,`profile`,`status`,`password`,`image`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Marlon Jaimes','3003883880','andres_jr19@hotmail.com',NULL,'Admin','Active','$2y$10$uyJ6/FWoBmr3k1RvxH0bLOnsV5HdX04S7JHN7GpEIVebGd3Qt6qg6','63dc8015e653c_.jpg','FzTnfWV8rwy76EyHHRKrYSUoNcDcPPtRt6txOHZA2pc7a8d9VNiSBydkEbSR','2023-01-03 02:51:37','2023-02-08 02:20:36'),
(2,'Guillermo Jaimes','3200000000','guillermo@correo.com',NULL,'Admin','Active','$2y$10$Dl8.qNeyzE2jR2OUr7kMoeo7pNUG78YnFV76tDR6lSD5190shoCu2',NULL,NULL,'2023-01-03 02:51:37','2023-02-08 02:24:29'),
(3,'Carlos','3150000000','carlos@correo.com',NULL,'Empleado','Active','$2y$10$lr4cwqXlVJrSK7RArOl.rOKl7fK19r1PdEdaEpNaUoLNdEkvCvxka',NULL,'71bESgt4ourHxh7vMOg4YmxJNV96Rw664kG29Zy1PLYz8S2EnpgEhIFtKxh0','2023-01-03 02:51:37','2023-02-08 02:24:59'),
(8,'ejemplo','3534354','ejemplo@correo.com',NULL,'Empleado','Active','$2y$10$DUN18pt2mZQdXl001xMACOKIezS7jePLj8Gt4nGxm5rlRRRunETSe',NULL,NULL,'2023-02-08 03:56:47','2023-02-08 03:56:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
