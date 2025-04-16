-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pengajuan_database
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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel_cache_admin@example.com|127.0.0.1','i:1;',1744563249),('laravel_cache_admin@example.com|127.0.0.1:timer','i:1744563249;',1744563249),('laravel_cache_admin@gmail.com|127.0.0.1','i:1;',1744552798),('laravel_cache_admin@gmail.com|127.0.0.1:timer','i:1744552798;',1744552798),('laravel_cache_it@example.com|127.0.0.1','i:1;',1744651004),('laravel_cache_it@example.com|127.0.0.1:timer','i:1744651004;',1744651004),('laravel_cache_tu@gmail.com|127.0.0.1','i:1;',1744552769),('laravel_cache_tu@gmail.com|127.0.0.1:timer','i:1744552769;',1744552769);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_surat`
--

DROP TABLE IF EXISTS `jenis_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_surat` (
  `id_jenis_surat` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_surat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jenis_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_surat`
--

LOCK TABLES `jenis_surat` WRITE;
/*!40000 ALTER TABLE `jenis_surat` DISABLE KEYS */;
INSERT INTO `jenis_surat` VALUES ('1','Surat Keterangan Lulus','2025-04-07 10:41:37','2025-04-07 10:41:37'),('2','Surat Keterangan Mahasiswa Aktif','2025-04-07 10:41:37','2025-04-07 10:41:37'),('3','Surat Laporan Hasil Studi','2025-04-07 10:41:37','2025-04-07 10:41:37'),('4','Surat Pengantar Tugas','2025-04-07 10:41:37','2025-04-07 10:41:37');
/*!40000 ALTER TABLE `jenis_surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kaprodi`
--

DROP TABLE IF EXISTS `kaprodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kaprodi` (
  `id_kaprodi` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi_program_studi_id` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_user` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kaprodi`),
  KEY `kaprodi_program_studi_program_studi_id_foreign` (`program_studi_program_studi_id`),
  KEY `kaprodi_user_id_user_foreign` (`user_id_user`),
  CONSTRAINT `kaprodi_program_studi_program_studi_id_foreign` FOREIGN KEY (`program_studi_program_studi_id`) REFERENCES `program_studi` (`program_studi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kaprodi_user_id_user_foreign` FOREIGN KEY (`user_id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kaprodi`
--

LOCK TABLES `kaprodi` WRITE;
/*!40000 ALTER TABLE `kaprodi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kaprodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id_mahasiswa` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_user` bigint unsigned NOT NULL,
  `program_studi_program_studi_id` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `semester` int DEFAULT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  KEY `mahasiswa_user_id_user_foreign` (`user_id_user`),
  KEY `mahasiswa_program_studi_program_studi_id_foreign` (`program_studi_program_studi_id`),
  CONSTRAINT `mahasiswa_program_studi_program_studi_id_foreign` FOREIGN KEY (`program_studi_program_studi_id`) REFERENCES `program_studi` (`program_studi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mahasiswa_user_id_user_foreign` FOREIGN KEY (`user_id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES ('023',23,'2','2025-04-15 21:39:39','2025-04-15 21:39:39',NULL,NULL),('1231',1231,'1','2025-04-15 21:23:44','2025-04-15 21:23:44',NULL,NULL),('2272033',2272033,'1','2025-04-15 21:17:56','2025-04-15 21:17:56',NULL,NULL),('2272034',2272034,'3','2025-04-15 21:20:55','2025-04-15 21:20:55',NULL,NULL),('2372027',2372027,'1','2025-04-15 19:34:43','2025-04-15 19:34:43',NULL,NULL),('2372028',2372028,'1','2025-04-15 21:14:54','2025-04-15 21:14:54',NULL,NULL),('8347',8347,'3','2025-04-15 21:29:41','2025-04-15 21:29:41',NULL,NULL);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_surat`
--

DROP TABLE IF EXISTS `pengajuan_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengajuan_surat` (
  `pengajuan_id` int NOT NULL AUTO_INCREMENT,
  `status` enum('menunggu','disetujui','ditolak','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'menunggu',
  `tanggal_pengajuan` timestamp NULL DEFAULT NULL,
  `jenis_surat` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id_mahasiswa` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pengajuan_id`),
  KEY `pengajuan_surat_jenis_surat_foreign` (`jenis_surat`),
  KEY `pengajuan_surat_mahasiswa_id_mahasiswa_foreign` (`mahasiswa_id_mahasiswa`),
  CONSTRAINT `pengajuan_surat_jenis_surat_foreign` FOREIGN KEY (`jenis_surat`) REFERENCES `jenis_surat` (`id_jenis_surat`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `pengajuan_surat_mahasiswa_id_mahasiswa_foreign` FOREIGN KEY (`mahasiswa_id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_surat`
--

LOCK TABLES `pengajuan_surat` WRITE;
/*!40000 ALTER TABLE `pengajuan_surat` DISABLE KEYS */;
INSERT INTO `pengajuan_surat` VALUES (12,'disetujui','2025-04-15 19:35:42','1','2372027','2025-04-15 19:35:42','2025-04-15 19:39:08','surat_disetujui/IN241_A_PR04_2372027_Mary_Yekholya_Simbolon_2025_04_16_02_39.pdf'),(13,'ditolak','2025-04-15 21:42:06','3','023','2025-04-15 21:42:06','2025-04-15 21:44:04',NULL),(14,'disetujui','2025-04-15 21:42:54','2','023','2025-04-15 21:42:54','2025-04-15 21:45:36','surat_disetujui/DKBS_2372027_2025_04_16_04_45.pdf');
/*!40000 ALTER TABLE `pengajuan_surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_studi`
--

DROP TABLE IF EXISTS `program_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_studi` (
  `program_studi_id` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_program_studi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`program_studi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_studi`
--

LOCK TABLES `program_studi` WRITE;
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT INTO `program_studi` VALUES ('1','teknik informatika','2025-04-13 14:06:56','2025-04-13 14:06:56'),('2','sistem informatika','2025-04-13 14:06:56','2025-04-13 14:06:56'),('3','magister informatika','2025-04-13 14:06:56','2025-04-13 14:06:56');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('6MUVK5sYJZnXGdP9VBXnxrjbqX9FcjLp17jR3C7F',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1lzRG1lMm11U1o5WEQ3ajZ3NmYyaGdNOHc5dGVYdll3dG9IUUJneCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1744774348),('cQwMwElxecellp4nYLGzFuT5Wf9iMUbn2mwUwXap',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGJCbGRWcjZMQ0JnYkhDYmw5N1BHc3ZhZ2ljZnZFS2xXSmhHRXNaQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1744778893);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_keterangan_lulus`
--

DROP TABLE IF EXISTS `surat_keterangan_lulus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat_keterangan_lulus` (
  `pengajuan_id` int NOT NULL,
  `tanggal_kelulusan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pengajuan_id`),
  CONSTRAINT `fk_surat_lulus_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_surat` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_keterangan_lulus`
--

LOCK TABLES `surat_keterangan_lulus` WRITE;
/*!40000 ALTER TABLE `surat_keterangan_lulus` DISABLE KEYS */;
INSERT INTO `surat_keterangan_lulus` VALUES (12,'2025-04-16','2025-04-15 19:35:43','2025-04-15 19:35:43');
/*!40000 ALTER TABLE `surat_keterangan_lulus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_keterangan_mahasiswa_aktif`
--

DROP TABLE IF EXISTS `surat_keterangan_mahasiswa_aktif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat_keterangan_mahasiswa_aktif` (
  `pengajuan_id` int NOT NULL,
  `semester` int NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan_pengajuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pengajuan_id`),
  CONSTRAINT `fk_surat_aktif_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_surat` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_keterangan_mahasiswa_aktif`
--

LOCK TABLES `surat_keterangan_mahasiswa_aktif` WRITE;
/*!40000 ALTER TABLE `surat_keterangan_mahasiswa_aktif` DISABLE KEYS */;
INSERT INTO `surat_keterangan_mahasiswa_aktif` VALUES (14,2,'JL. Cihampelas','Surat beasiswa','2025-04-15 21:42:54','2025-04-15 21:42:54');
/*!40000 ALTER TABLE `surat_keterangan_mahasiswa_aktif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_laporan_hasil_studi`
--

DROP TABLE IF EXISTS `surat_laporan_hasil_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat_laporan_hasil_studi` (
  `pengajuan_id` int NOT NULL,
  `keperluan_pembuatan_lhs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pengajuan_id`),
  CONSTRAINT `fk_surat_lhs_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_surat` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_laporan_hasil_studi`
--

LOCK TABLES `surat_laporan_hasil_studi` WRITE;
/*!40000 ALTER TABLE `surat_laporan_hasil_studi` DISABLE KEYS */;
INSERT INTO `surat_laporan_hasil_studi` VALUES (13,'Untuk beasiswa','2025-04-15 21:42:06','2025-04-15 21:42:06');
/*!40000 ALTER TABLE `surat_laporan_hasil_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_pengantar_tugas`
--

DROP TABLE IF EXISTS `surat_pengantar_tugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat_pengantar_tugas` (
  `pengajuan_id` int NOT NULL,
  `nama_tujuan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan_tujuan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_perusahaan_tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mata_kuliah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_tahun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pengajuan_id`),
  KEY `idx_surat_pengantar_jenis` (`jenis_surat`),
  CONSTRAINT `fk_surat_pengantar_jenis` FOREIGN KEY (`jenis_surat`) REFERENCES `jenis_surat` (`id_jenis_surat`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_surat_pengantar_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_surat` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_pengantar_tugas`
--

LOCK TABLES `surat_pengantar_tugas` WRITE;
/*!40000 ALTER TABLE `surat_pengantar_tugas` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat_pengantar_tugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tata_usaha`
--

DROP TABLE IF EXISTS `tata_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tata_usaha` (
  `id_tata_usaha` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi_id` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_tata_usaha`),
  KEY `idx_tata_usaha_program_studi` (`program_studi_id`),
  KEY `idx_tata_usaha_user` (`user_id`),
  CONSTRAINT `fk_tata_usaha_program_studi` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`program_studi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tata_usaha_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tata_usaha`
--

LOCK TABLES `tata_usaha` WRITE;
/*!40000 ALTER TABLE `tata_usaha` DISABLE KEYS */;
/*!40000 ALTER TABLE `tata_usaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_user` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mahasiswa','kaprodi','tata_usaha') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2372048 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2025-04-07 03:03:40','$2y$12$pVkCxR4KCI/u6VMgEr90WeQTZxE73MttZ5oS0TA7ltcfajTS2aMhK','mahasiswa','zkchfq57HR','2025-04-07 03:03:40','2025-04-07 03:03:40'),(2,'Admin','admin@tes.com','2025-04-07 03:03:41','$2y$12$Sn24nW1IB5udtIDK53BZcOvYYnnNrMS1f8EAtR3UyCLVthTW2b8Tq','tata_usaha','Svt9NqJ00KusgpuTI8VjNJ9p2VeP21RTiDIQaqPEshXcCRhDf4aYvxmG1WKf','2025-04-07 03:03:41','2025-04-07 03:03:41'),(23,'Ucup','ucup@gmail.com',NULL,'$2y$12$fJlZ1nyInWmg4aJr5.W7vu9hy7OUC..9gJBeGSfthh8yYjAIogAom','mahasiswa',NULL,'2025-04-15 21:39:39','2025-04-15 21:39:39'),(99,'Kaprodi','kaprodi@gmail.com',NULL,'$2y$12$w041xHWqJeSR8xzP0ATZ6ugJx1mCKa2lyUY2BUdyOnxWR5VaJXbeq','kaprodi',NULL,'2025-04-14 05:56:55','2025-04-14 05:56:55'),(1231,'mer5','mer5@gmail.com',NULL,'$2y$12$z0hRjlxOipwqNT4lqHIJWeGAfgaHSZVrlQPOMkQG3VYEeT.tEKfeK','mahasiswa',NULL,'2025-04-15 21:23:44','2025-04-15 21:23:44'),(8347,'maer6','mer6@gmail.com',NULL,'$2y$12$.2LZdTzYqs/VDVd3otbiDeLRYyVj.WCIZTcVUa1Jvk6.IY7.Cxdqm','mahasiswa',NULL,'2025-04-15 21:29:40','2025-04-15 21:29:40'),(2272033,'mer3','mer3@gmail.com',NULL,'$2y$12$CbYGh5EyS0A93Pjs3QdEcOOY3JOFdCrGfRoxSDjFRBTk5nsqu9ubK','mahasiswa',NULL,'2025-04-15 21:17:56','2025-04-15 21:17:56'),(2272034,'mer4','mer4@gmail.com',NULL,'$2y$12$bCw6L5xp9eNJM0QHN.6pTe9k7nsJPPAOxuNqxMJb66f3UogwzYav6','mahasiswa',NULL,'2025-04-15 21:20:55','2025-04-15 21:20:55'),(2372027,'Mary Yekholya S','mary@gmail.com',NULL,'$2y$12$6hSUEmWUKRmZIqVh6H2npeUw8nsMjRh.PnqnHcL4RMeal9oxHIBzm','mahasiswa',NULL,'2025-04-15 19:34:43','2025-04-15 19:34:43'),(2372028,'Mer2','mer2@gmail.com',NULL,'$2y$12$/HYdWjU8dzdTB/Ztz5lhDuNguH7pxAYmqh3eJIyJbDj65xqRUY4de','mahasiswa',NULL,'2025-04-15 21:14:54','2025-04-15 21:14:54');
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

-- Dump completed on 2025-04-16 12:10:15
