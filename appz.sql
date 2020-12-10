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
  `stars` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feedback` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `it` */

insert  into `it`(`id_it`,`email`,`nama`,`username`,`password`,`level`,`created_at`,`updated_at`) values 
(2,'m.farisi@binus.edu','M. SALMAN AL-FARISI','salman','$2y$10$fjkqCj98U3wBQNPc1zc5lOIIIdkGI6adTZoHq52t8ns8wE6E4Nb86','superuser','2020-12-09 14:03:16','2020-12-09 14:03:16');

/*Table structure for table `kerusakan` */

DROP TABLE IF EXISTS `kerusakan`;

CREATE TABLE `kerusakan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kerusakan` */

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
  `status` enum('aktif','perbaikan','peminjaman') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_komp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `komputer` */

insert  into `komputer`(`id_komp`,`nama_komp`,`ip`,`mac`,`user`,`email`,`id_ruangan`,`id_spesifikasi`,`status`,`keterangan`,`created_at`,`updated_at`) values 
(2,'SALMAN','10.38.10.13','DF:46:S4','salman -ganteng banget','m.farisisi@binus.edu',1,7,'peminjaman','OK','2020-12-05 03:03:14','2020-12-09 08:40:53');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11,'2020_12_08_053842_create_feedback_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `resolution` */

DROP TABLE IF EXISTS `resolution`;

CREATE TABLE `resolution` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `status` enum('open','on progress','resolved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `resolution` */

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `id_ruangan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ruangan` */

insert  into `ruangan`(`id_ruangan`,`nama_ruangan`,`jenis_ruangan`,`created_at`,`updated_at`) values 
(1,'409','creative class',NULL,NULL),
(2,'408','creative class','2020-12-09 08:24:43','2020-12-09 08:24:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `spesifikasi` */

insert  into `spesifikasi`(`id_spesifikasi`,`procesor`,`ram`,`hardisk`,`ssd`,`keyboard`,`monitor`,`mouse`,`cpu`,`tahun`,`created_at`,`updated_at`) values 
(8,'intel core i3',4,500,0,'hp-12121s131','hp19-dqdq131ws','hp1231s131','hp 290 g1 MT','2015','2020-12-05 05:37:19','2020-12-05 05:37:19');

/*Table structure for table `ticket` */

DROP TABLE IF EXISTS `ticket`;

CREATE TABLE `ticket` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_komputer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_it` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ticket` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
