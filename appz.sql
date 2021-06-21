/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - appz
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`appz` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `appz`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id_feedback` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feedback` */

insert  into `feedback`(`id_feedback`,`feedback`,`stars`,`created_at`,`updated_at`) values 
(92,'12345',4,'2020-12-15 01:48:27','2020-12-15 01:49:52'),
(93,'-',NULL,'2020-12-15 04:15:18','2020-12-15 04:15:18'),
(94,'Rasanya Anjieng Bangget',5,'2020-12-15 04:20:11','2020-12-15 04:22:58'),
(95,'-',NULL,'2020-12-15 04:23:59','2020-12-15 04:23:59'),
(96,'-',NULL,'2020-12-15 04:34:10','2020-12-15 04:34:10'),
(97,'-',NULL,'2020-12-15 08:34:46','2020-12-15 08:34:46'),
(98,'-',NULL,'2020-12-15 08:35:24','2020-12-15 08:35:24'),
(99,'-',NULL,'2020-12-15 08:37:12','2020-12-15 08:37:12'),
(100,'-',NULL,'2020-12-15 08:38:11','2020-12-15 08:38:11'),
(101,'-',NULL,'2020-12-15 08:40:03','2020-12-15 08:40:03'),
(102,'good',4,'2020-12-15 11:19:49','2020-12-15 11:32:57'),
(103,'123',4,'2020-12-15 11:33:24','2020-12-15 11:36:36'),
(104,'5476',4,'2020-12-15 11:36:44','2020-12-15 11:37:51'),
(105,'good',4,'2020-12-15 12:11:42','2020-12-15 12:13:48'),
(106,'mantab',5,'2020-12-15 12:15:44','2020-12-15 12:16:30');

/*Table structure for table `it` */

DROP TABLE IF EXISTS `it`;

CREATE TABLE `it` (
  `id_it` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_it`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `it` */

insert  into `it`(`id_it`,`email`,`nama`,`username`,`password`,`level`,`created_at`,`updated_at`) values 
(8,'yogi.trianto@binus.edu','YOGI TRIANTO','yogi.trianto','$2y$10$ePOw7gnondKVzohBk8OsyuCmllurIsoGFo4oIKHTx2wSWCatXnQiq','user','2020-12-14 05:17:12','2020-12-14 05:17:12'),
(9,'m.farisi@binus.edu','M. SALMAN AL-FARISI','m.farisi','$2y$10$7WBLDTD5mhkWPNhtjvBFTO24dH5vFMu60f2jnZEKuWa/L3YjNdNZ6','user','2020-12-14 05:19:52','2021-01-18 16:22:42'),
(12,'ifaahakhododo@binus.edu','Ikhtiar Faahakhododo','faahakhododo','$2y$10$iPIg1uX1wJWKtQz1wIkDbOySrPZNfBI13qZ.XlOkJwJt55WBMq7rW','Newbie','2020-12-15 03:36:44','2020-12-15 03:36:44');

/*Table structure for table `kerusakan` */

DROP TABLE IF EXISTS `kerusakan`;

CREATE TABLE `kerusakan` (
  `id_kerusakan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kerusakan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kerusakan` */

insert  into `kerusakan`(`id_kerusakan`,`jenis_kerusakan`,`created_at`,`updated_at`) values 
(1,'SOFTWARE BERMASALAH','2020-12-10 03:19:41','2020-12-10 03:20:01'),
(2,'MOUSE RUSAK','2020-12-10 03:23:07','2020-12-10 03:23:07'),
(3,'Internet terputus','2020-12-10 10:56:13','2020-12-10 10:56:13'),
(4,'Layar Tidak Tampil','2020-12-10 10:56:27','2020-12-10 10:56:27'),
(5,'Lainnya','2020-12-10 10:56:42','2020-12-10 10:56:42');

/*Table structure for table `komputer` */

DROP TABLE IF EXISTS `komputer`;

CREATE TABLE `komputer` (
  `id_komp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_komp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_spesifikasi` int(11) NOT NULL,
  `status_komp` enum('aktif','perbaikan','peminjaman') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_komp`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `komputer` */

insert  into `komputer`(`id_komp`,`nama_komp`,`ip`,`mac`,`user`,`email`,`id_ruangan`,`id_spesifikasi`,`status_komp`,`keterangan`,`created_at`,`updated_at`) values 
(4,'YOGI T','10.38.10.134','D4:4J:33:','YOGI TRI','yogi@binus.edu',2,9,'aktif','LANCAR','2020-12-10 02:02:01','2020-12-10 02:02:01'),
(5,'SALMAN-GANTENG','10.38.10.116','D4:33:F4','M. SALMAN AL-FARISI','m.farisi@binus.edu',2,10,'peminjaman','di pinjam acara','2020-12-10 02:38:21','2020-12-15 03:46:03'),
(7,'A0503','10.38.11.53','18-60-24-22-55-A1','','',5,0,'aktif','',NULL,NULL),
(8,'A0506','10.38.11.56','18-60-24-22-54-A8','','',6,0,'aktif','',NULL,NULL),
(9,'A0507','10.38.11.57','18-60-24-22-55-20','','',7,0,'aktif','',NULL,NULL),
(10,'A0508','10.38.11.58','18-60-24-22-55-90','','',8,0,'aktif','',NULL,NULL),
(11,'A05011','10.38.11.61','18-60-24-22-54-D1','','',9,0,'aktif','',NULL,NULL),
(12,'A05012','10.38.11.62','18-60-24-22-55-97','','',10,0,'aktif','',NULL,NULL),
(13,'A05016','10.38.11.66','18-60-24-22-54-AD','','',11,0,'aktif','',NULL,NULL),
(14,'A0408','10.38.11.8','18-60-24-22-54-52','','',2,0,'aktif','',NULL,NULL),
(15,'A0409','10.38.11.9','18-60-24-22-55-57','','',1,0,'aktif','',NULL,NULL),
(16,'A0411','10.38.11.11','18-60-24-22-55-58','','',12,0,'aktif','',NULL,NULL),
(17,'A0412','10.38.11.12','18-60-24-22-54-54','','',13,0,'aktif','',NULL,NULL),
(18,'A0413','10.38.11.13','18-60-24-22-54-4D','','',14,0,'aktif','',NULL,NULL),
(19,'A0314','10.38.22.131','10-E7-C6-0A-72-23','','',15,0,'aktif','',NULL,NULL),
(20,'A0315','10.38.25.131','10-E7-C6-07-26-45','','',16,0,'aktif','',NULL,NULL),
(21,'A0317','10.38.23.131','c4-65-16-9b-ac-c7','','',17,0,'aktif','',NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2020_11_30_035305_create_ruangan_table',1),
(2,'2020_11_30_035417_create_it_table',1),
(3,'2020_11_30_035458_create_komputer_table',1),
(4,'2020_11_30_035819_create_ticket_table',1),
(5,'2020_11_30_035833_create_resolution_table',1),
(6,'2020_11_30_070523_create_kerusakan_table',1),
(7,'2020_11_30_070544_create_spesifikasi_table',1),
(8,'2014_10_12_000000_create_users_table',2),
(9,'2014_10_12_100000_create_password_resets_table',2),
(10,'2019_08_19_000000_create_failed_jobs_table',2),
(11,'2020_12_08_053842_create_feedback_table',2),
(12,'2014_10_12_200000_add_two_factor_columns_to_users_table',3),
(13,'2019_12_14_000001_create_personal_access_tokens_table',3),
(14,'2021_01_18_101830_create_sessions_table',3);

/*Table structure for table `resolution` */

DROP TABLE IF EXISTS `resolution`;

CREATE TABLE `resolution` (
  `id_resolution` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kerusakan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_resolution`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `resolution` */

insert  into `resolution`(`id_resolution`,`resolution`,`id_kerusakan`,`created_at`,`updated_at`) values 
(93,'Okey',3,'2020-12-15 01:48:27','2020-12-15 01:49:58'),
(94,NULL,2,'2020-12-15 04:15:18','2020-12-15 04:15:18'),
(95,'Dosennya yang bermasalah bukan softwarenya',1,'2020-12-15 04:20:11','2020-12-15 04:22:32'),
(96,'Hello Indonesia',2,'2020-12-15 04:23:59','2020-12-15 04:33:13'),
(97,NULL,4,'2020-12-15 04:34:10','2020-12-15 04:34:10'),
(98,NULL,3,'2020-12-15 08:34:46','2020-12-15 08:34:46'),
(99,NULL,2,'2020-12-15 08:35:24','2020-12-15 08:35:24'),
(100,NULL,1,'2020-12-15 08:37:12','2020-12-15 08:37:12'),
(101,NULL,1,'2020-12-15 08:38:11','2020-12-15 08:38:11'),
(102,NULL,3,'2020-12-15 08:40:03','2020-12-15 08:40:03'),
(103,'Mantab',2,'2020-12-15 11:19:49','2020-12-15 11:33:14'),
(104,'Okey',1,'2020-12-15 11:33:24','2020-12-15 11:36:28'),
(105,'Okey',3,'2020-12-15 11:36:44','2020-12-15 11:37:45'),
(106,'Good',2,'2020-12-15 12:11:42','2020-12-15 12:13:40'),
(107,'Mantab',4,'2020-12-15 12:15:44','2020-12-15 12:16:20');

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `id_ruangan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ruangan` */

insert  into `ruangan`(`id_ruangan`,`nama_ruangan`,`jenis_ruangan`,`created_at`,`updated_at`) values 
(1,'A0409','creative class',NULL,NULL),
(2,'A0408','creative class','2020-12-09 08:24:43','2020-12-09 08:24:43'),
(5,'A0503','Reguler Class',NULL,NULL),
(6,'A0506','Reguler Class',NULL,NULL),
(7,'A0507','Reguler Class',NULL,NULL),
(8,'A0508','Reguler Class',NULL,NULL),
(9,'A05011','Reguler Class',NULL,NULL),
(10,'A05012','Reguler Class',NULL,NULL),
(11,'A05016','Reguler Class',NULL,NULL),
(12,'A0411','Tribune Class',NULL,NULL),
(13,'A0412','Tribune Class',NULL,NULL),
(14,'A0413','Tribune Class',NULL,NULL),
(15,'A0314','Lab Komp',NULL,NULL),
(16,'A0315','Lab Komp',NULL,NULL),
(17,'A0317','Lab Komp',NULL,NULL),
(18,'A0304','IDO','2021-01-19 14:27:03','2021-01-19 14:27:03');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('6G2w5BDMZDFSat28dG0N8aM5SjuQ48kGENd1ZrFQ',9,'127.0.0.1','PostmanRuntime/7.26.8','YTo3OntzOjY6Il90b2tlbiI7czo0MDoid2FuaXl5M1VhYzdhZlFBVTJVdkdSNGJaeFVJa0JwNGRNajRGZTFwbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjU6ImVtYWlsIjtzOjE4OiJtLmZhcmlzaUBiaW51cy5lZHUiO3M6ODoicGFzc3dvcmQiO3M6ODoiMDcxMjE5OTYiO3M6NToiaWRfaXQiO2k6OTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fX0=',1618470936),
('9Z5GyeboB8rXoWOlRcoFXB2UHeYcXOo6n0jxXdod',9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36','YTo3OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Fzc2V0cy91dGlscy5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJiRUtoTUJpc1hER1poenRDRDAzbUlQVDRNVDNVMmR4MHlyZmdVdDRpIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O3M6NToiZW1haWwiO3M6MTg6Im0uZmFyaXNpQGJpbnVzLmVkdSI7czo4OiJwYXNzd29yZCI7czo4OiIwNzEyMTk5NiI7czo1OiJpZF9pdCI7aTo5O30=',1618473911),
('meLYc6RMai0zF0oJ9o5dScumtmrWAKqXc2qGdoCh',NULL,'127.0.0.1','PostmanRuntime/7.26.8','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXU1YlVlYnBTVEFUS3VNRjR2Q3Q3d29ZRGw0R1pZUjZDQ0ozVzZDVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0X3RpY2tldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1618989224),
('NFGIqdLQmBgqwdzXgvso9P9HoDDMAr9SRhHbMoP8',NULL,'192.168.0.5','okhttp/3.12.12','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWthcGp1dXBCMEUweE9oYzh2OURqS05rMHJIU29MZ1BJaG9YbTZaSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xOTIuMTY4LjAuNTo4MDAwL2FwaS9hdXRoX2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1618493908),
('RVCLdYjw8G3dkki2sP9moY0O4r03qXEEucysoS6H',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36','YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IklQV2xQU0NtckJtbkxpWGlEeW84RXpLTEowSlgxVFhSTDRHeEwzZlUiO30=',1618491629);

/*Table structure for table `spesifikasi` */

DROP TABLE IF EXISTS `spesifikasi`;

CREATE TABLE `spesifikasi` (
  `id_spesifikasi` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `procesor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` int(11) NOT NULL,
  `hardisk` int(11) NOT NULL,
  `ssd` int(11) NOT NULL,
  `keyboard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monitor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_spesifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `spesifikasi` */

insert  into `spesifikasi`(`id_spesifikasi`,`procesor`,`ram`,`hardisk`,`ssd`,`keyboard`,`monitor`,`mouse`,`cpu`,`tahun`,`created_at`,`updated_at`) values 
(9,'intel core i3',4,500,0,'hp-sasjasQ83718J','HP19-ASNAHKS11','HP-121SQS1','HP 280 G1 MT','2013','2020-12-10 02:02:01','2020-12-10 02:02:01'),
(10,'core i3',4,500,0,'HP-1XQG1','HP19-QS1BJ12','HP-AQNSJ12313','HP 280 G1 MT','2013','2020-12-10 02:38:21','2020-12-10 02:38:21');

/*Table structure for table `ticket` */

DROP TABLE IF EXISTS `ticket`;

CREATE TABLE `ticket` (
  `id_ticket` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_komputer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_it` int(255) DEFAULT NULL,
  `id_resolution` int(255) DEFAULT NULL,
  `id_feedback` int(11) DEFAULT NULL,
  `status` enum('open','onprogres','close') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timer` time DEFAULT NULL,
  `notif` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ticket` */

insert  into `ticket`(`id_ticket`,`id_komputer`,`problem`,`id_it`,`id_resolution`,`id_feedback`,`status`,`timer`,`notif`,`created_at`,`updated_at`) values 
('201215-1284','4','Internet terputus',9,102,101,'close',NULL,NULL,'2020-12-15 08:40:03','2020-12-15 08:40:03'),
('201215-1741','4','Layar Tidak Tampil',9,107,106,'close','00:29:00',NULL,'2020-12-15 12:15:44','2020-12-15 12:16:19'),
('201215-3006','20','MOUSE RUSAK',12,96,95,'close','09:03:00',NULL,'2020-12-15 04:23:59','2020-12-15 04:33:09'),
('201215-3959','4','SOFTWARE BERMASALAH',9,104,103,'close','00:17:00',NULL,'2020-12-15 11:33:24','2020-12-15 11:36:25'),
('201215-4417','4','MOUSE RUSAK',9,106,105,'close','01:25:00',NULL,'2020-12-15 12:11:42','2020-12-15 12:13:37'),
('201215-4513','4','MOUSE RUSAK',9,103,102,'close','00:29:00',NULL,'2020-12-15 11:19:49','2020-12-15 11:32:49'),
('201215-5301','4','Internet terputus',9,105,104,'close','00:14:00',NULL,'2020-12-15 11:36:44','2020-12-15 11:37:45'),
('201215-5321','4','MOUSE RUSAK',8,94,93,'onprogres',NULL,NULL,'2020-12-15 04:15:18','2020-12-15 04:16:07'),
('201215-7366','20','SOFTWARE BERMASALAH',12,95,94,'close','02:02:00',NULL,'2020-12-15 04:20:11','2020-12-15 04:22:21'),
('201215-9917','4','Internet terputus',9,93,92,'close','01:10:00',NULL,'2020-12-15 01:48:27','2020-12-15 01:49:41');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
