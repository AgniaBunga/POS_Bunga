-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pos_bunga
CREATE DATABASE IF NOT EXISTS `pos_bunga` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pos_bunga`;

-- Dumping structure for table pos_bunga.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.cache: ~0 rows (approximately)

-- Dumping structure for table pos_bunga.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos_bunga.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pos_bunga.item_penjualan
CREATE TABLE IF NOT EXISTS `item_penjualan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint(20) unsigned NOT NULL,
  `produk_id` bigint(20) unsigned NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_penjualan_penjualan_id_foreign` (`penjualan_id`),
  KEY `item_penjualan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.item_penjualan: ~23 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 4, 1, 21100, 21100, '2026-07-30 21:03:09', '2026-07-30 21:03:09'),
	(2, 1, 8, 1, 28000, 28000, '2026-07-30 21:03:12', '2026-07-30 21:03:12'),
	(3, 1, 9, 1, 24400, 24400, '2026-07-30 21:03:16', '2026-07-30 21:03:16'),
	(4, 2, 7, 1, 19900, 19900, '2026-07-30 21:03:52', '2026-07-30 21:03:52'),
	(5, 2, 5, 1, 31000, 31000, '2026-07-30 21:03:57', '2026-07-30 21:03:57'),
	(6, 2, 3, 1, 35000, 35000, '2026-07-30 21:04:01', '2026-07-30 21:04:01'),
	(7, 4, 11, 1, 37700, 37700, '2026-07-31 00:04:25', '2026-07-31 00:04:25'),
	(8, 4, 4, 2, 21100, 42200, '2026-07-31 00:04:27', '2026-07-31 00:04:35'),
	(9, 4, 6, 1, 24000, 24000, '2026-07-31 00:04:33', '2026-07-31 00:04:33'),
	(10, 4, 13, 1, 35000, 35000, '2026-07-31 00:04:39', '2026-07-31 00:04:39'),
	(11, 5, 11, 1, 37700, 37700, '2026-08-03 18:34:20', '2026-08-03 18:34:20'),
	(12, 5, 8, 1, 28000, 28000, '2026-08-03 18:34:23', '2026-08-03 18:34:23'),
	(13, 5, 7, 1, 19900, 19900, '2026-08-03 18:34:26', '2026-08-03 18:34:26'),
	(14, 6, 7, 1, 19900, 19900, '2026-08-04 00:11:13', '2026-08-04 00:11:13'),
	(15, 6, 13, 1, 35000, 35000, '2026-08-04 00:11:16', '2026-08-04 00:11:16'),
	(16, 6, 3, 1, 35000, 35000, '2026-08-04 00:11:21', '2026-08-04 00:11:21'),
	(17, 7, 1, 1, 25500, 25500, '2026-08-09 20:59:46', '2026-08-09 20:59:46'),
	(18, 8, 11, 1, 37700, 37700, '2026-08-09 21:34:41', '2026-08-09 21:34:41'),
	(19, 9, 8, 1, 28000, 28000, '2026-08-09 21:36:05', '2026-08-09 21:36:05'),
	(20, 10, 11, 1, 26000, 26000, '2026-08-09 23:31:50', '2026-08-09 23:31:50'),
	(23, 11, 11, 30, 26000, 780000, '2026-08-09 23:32:57', '2026-08-09 23:32:57'),
	(24, 12, 11, 1, 26000, 26000, '2026-08-11 23:28:16', '2026-08-11 23:28:16'),
	(26, 13, 8, 1, 28000, 28000, '2026-08-11 23:39:28', '2026-08-11 23:39:28'),
	(33, 24, 11, 1, 26000, 26000, '2026-08-18 21:26:05', '2026-08-18 21:26:05'),
	(34, 25, 11, 1, 26000, 26000, '2026-08-28 00:11:32', '2026-08-28 00:11:32'),
	(35, 26, 11, 1, 26000, 26000, '2026-08-28 00:12:51', '2026-08-28 00:12:51'),
	(37, 27, 11, 1, 26000, 26000, '2026-08-31 21:01:42', '2026-08-31 21:01:42'),
	(38, 28, 11, 1, 26000, 26000, '2026-09-03 19:48:19', '2026-09-03 19:48:19'),
	(39, 28, 4, 1, 21100, 21100, '2026-09-03 19:48:21', '2026-09-03 19:48:21');

-- Dumping structure for table pos_bunga.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.jobs: ~0 rows (approximately)

-- Dumping structure for table pos_bunga.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos_bunga.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.migrations: ~7 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_01_15_014002_create_penjualan_table', 1),
	(6, '2026_01_15_014640_create_produk_table', 1),
	(7, '2026_01_15_014645_create_item_penjualan_table', 1);

-- Dumping structure for table pos_bunga.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pos_bunga.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('OPEN','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.penjualan: ~15 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(1, 3, 73500, 'QRIS', 'COMPLETED', '2026-07-30 21:03:04', '2026-07-30 21:03:23'),
	(2, 3, 85900, 'CASH', 'COMPLETED', '2026-07-30 21:03:45', '2026-07-30 21:04:15'),
	(4, 3, 138900, 'QRIS', 'COMPLETED', '2026-07-31 00:04:22', '2026-07-31 00:05:16'),
	(5, 3, 85600, 'QRIS', 'COMPLETED', '2026-08-03 18:34:14', '2026-08-03 18:34:35'),
	(6, 2, 89900, 'CASH', 'COMPLETED', '2026-08-04 00:11:08', '2026-08-04 00:11:33'),
	(7, 3, 25500, 'QRIS', 'COMPLETED', '2026-08-09 20:59:28', '2026-08-09 20:59:55'),
	(8, 3, 37700, 'CASH', 'COMPLETED', '2026-08-09 21:34:17', '2026-08-09 21:34:51'),
	(9, 3, 28000, 'QRIS', 'COMPLETED', '2026-08-09 21:35:54', '2026-08-09 21:36:11'),
	(10, 3, 26000, 'QRIS', 'COMPLETED', '2026-08-09 23:31:46', '2026-08-09 23:32:11'),
	(11, 3, 780000, 'QRIS', 'COMPLETED', '2026-08-09 23:32:32', '2026-08-09 23:33:19'),
	(12, 3, 26000, 'CASH', 'COMPLETED', '2026-08-11 23:28:13', '2026-08-11 23:28:37'),
	(13, 3, 28000, 'CASH', 'COMPLETED', '2026-08-11 23:38:28', '2026-08-11 23:39:59'),
	(24, 1, 26000, 'CASH', 'COMPLETED', '2026-08-18 21:21:13', '2026-08-18 21:26:12'),
	(25, 1, 26000, 'CASH', 'COMPLETED', '2026-08-28 00:10:50', '2026-08-28 00:12:13'),
	(26, 1, 26000, 'QRIS', 'COMPLETED', '2026-08-28 00:12:49', '2026-08-28 00:12:58'),
	(27, 2, 26000, 'CASH', 'COMPLETED', '2026-08-31 20:58:50', '2026-08-31 21:01:49'),
	(28, 3, 47100, 'CASH', 'COMPLETED', '2026-09-03 19:48:16', '2026-09-03 19:48:28');

-- Dumping structure for table pos_bunga.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `produk_nama_index` (`nama`),
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.produk: ~12 rows (approximately)
INSERT INTO `produk` (`id`, `user_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 3, 'products/KOJF52DHxWgJgrRhZjZZQfv1KA6HfkpfkX7OvfrA.jpg', 'Tiramisu Latte', 20000, 25500, 229, '2026-07-30 20:56:08', '2026-08-09 20:59:46'),
	(2, 3, 'products/WaNuNbJ9S0uKD4VURSfXhLQi69pbgFrZGmTW2iGJ.jpg', 'Matcha Latte', 21000, 23400, 321, '2026-07-30 20:57:12', '2026-07-30 20:57:12'),
	(3, 2, 'products/onOapMu4l6O6Nogmc9aHM9LcwjAFYZQAgOA0Zqls.jpg', 'Strawberry Milk', 31000, 31000, 868, '2026-07-30 20:57:47', '2026-08-18 19:47:59'),
	(4, 3, 'products/iOWrOUwwy1HOooh9zDBJ7I3bfbZokpysjjjRu7aT.jpg', 'Caramel Macchiato', 16500, 21100, 230, '2026-07-30 20:58:30', '2026-09-03 19:48:21'),
	(5, 3, 'products/aXAN2MhQzCE0oZ46t9cnE64giGWHtntKtkHrmwTm.jpg', 'Mocca Coffe', 26000, 31000, 353, '2026-07-30 20:59:13', '2026-08-11 23:39:42'),
	(6, 3, 'products/35Kr6mP7l23wqUX3yoRczbftmsl54fDdegXGyXgu.jpg', 'Vanilla Frappuccino', 22000, 24000, 264, '2026-07-30 20:59:55', '2026-07-31 00:04:33'),
	(7, 3, 'products/nKL59hDgEaeI3ah2gQVQfXBTqTpAAipdMKkn3gnt.jpg', 'Iced Ammericano', 17000, 19900, 330, '2026-07-30 21:01:07', '2026-08-04 00:11:13'),
	(8, 3, 'products/6ZpKAOcLLayHSYGNcQ9Idrr5in6n30wQ9x1rkwHV.jpg', 'Chocolatte Hazelnut', 26000, 28000, 761, '2026-07-30 21:01:52', '2026-08-11 23:39:28'),
	(9, 3, 'products/NYhs8Ov16yvgJvGqTowSgMUC5sxv4MUgKziGOm4d.jpg', 'Espresso Classic', 21100, 24400, 986, '2026-07-30 21:02:29', '2026-07-30 21:03:16'),
	(11, 3, 'products/LwMHBP1Nf6iqKru10NYpxwAsjjEhHRLkxhLZG8xz.jpg', 'Cappuccino', 0, 26000, 836, '2026-07-30 23:56:33', '2026-09-03 19:48:19'),
	(12, 3, 'products/bODUjcecRI8FNVl38hXaOfKWuAGiHEimINTvpPOS.jpg', 'Red Velvet Latte', 0, 19800, 987, '2026-07-31 00:01:17', '2026-08-11 23:31:21'),
	(13, 2, 'products/otHspRnzpUNTa9XfVgiiddY6Lv2UNKD7yNdHjfKh.jpg', 'Lychee Tea', 23000, 23000, 562, '2026-07-31 00:02:17', '2026-08-18 19:48:24');

-- Dumping structure for table pos_bunga.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-07-27 20:38:58', '2026-07-27 20:38:58'),
	(2, 'kasir', '2026-07-27 20:38:58', '2026-07-27 20:38:58');

-- Dumping structure for table pos_bunga.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('PL4rwnQrqLJKuObHJXlA3QzKCwRLsy9ZAjclyOwe', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaFFwVW9xWW5xTUdjY0VROFFZMTZmTlI4MWk5WkQ2dXRocnpVTHd3dCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWs/cGFnZT0yIjtzOjU6InJvdXRlIjtzOjEyOiJwcm9kdWsuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1788490358),
	('ZKGBxD0djLpC6kVhMkrWzg71JHLuVLU4lCxf3gwh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFhhaGRLWVRDaFhpeTVNVHZUYlRQcEM5QVkyTHFTcTdLTlNzeTgwQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1788489078),
	('ZNGuIXCy1h1hM6LncIefRL5PhsyoV5MZv2kGDTWB', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZVcxaGd5dUVGQUViZkdkT3RGUzRCM3BUYWpvcEpjellKZVhidG8zVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWs/cGFnZT0xIjtzOjU6InJvdXRlIjtzOjEyOiJwcm9kdWsuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1788331523);

-- Dumping structure for table pos_bunga.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_bunga.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Jo Kihn', 'bunga123@gmail.com', '2026-07-27 20:38:58', '$2y$12$gx4mVr7ouDyZ4tIdsueuu.8NKjglolYtCPgp9RqlXPbb2hamCxfcO', '9GNKLh1YveaB7Yo1GDD0qZGXUXKuZwOStV3LNcS7K4fHhuR0V5hcb0c53BP2', '2026-07-27 20:38:59', '2026-07-27 20:38:59'),
	(2, 1, 'Jazlyn Gislason', 'bungaarum980@gmail.com', '2026-07-27 20:38:59', '$2y$12$gx4mVr7ouDyZ4tIdsueuu.8NKjglolYtCPgp9RqlXPbb2hamCxfcO', '16E485dfcA2gtlGNo3LS8rPH0pZUPlOa9WWVIElnpz1nkggWWpGIK4wheAlS', '2026-07-27 20:38:59', '2026-07-27 20:38:59'),
	(3, 1, 'Wilbert Welch', 'elmo.kirlin@example.com', '2026-07-27 20:38:59', '$2y$12$gx4mVr7ouDyZ4tIdsueuu.8NKjglolYtCPgp9RqlXPbb2hamCxfcO', 'OJqgmBkhGE3epaksHTNsFcj1kAHiWhyz6VzaO7x9XrluzyoiLDz246MWfX5A', '2026-07-27 20:38:59', '2026-07-27 20:38:59'),
	(4, 2, 'Mary Ziemann', 'heather66@example.com', '2026-07-27 20:38:59', '$2y$12$gx4mVr7ouDyZ4tIdsueuu.8NKjglolYtCPgp9RqlXPbb2hamCxfcO', 'd2PxMOlbVjmmVw865ua3jyFHVQTFsum2316Y4JHpaY1VxkXb8eGeIJr4L71U', '2026-07-27 20:38:59', '2026-07-27 20:38:59'),
	(5, 2, 'Annette Kuphal', 'kstroman@example.net', '2026-07-27 20:38:59', '$2y$12$gx4mVr7ouDyZ4tIdsueuu.8NKjglolYtCPgp9RqlXPbb2hamCxfcO', 'p9j2eQjrqTRxOJOh9Ne9908EWLwIUKwTWqNEhFQPLiY2B018KbiFL3jjr0rf', '2026-07-27 20:38:59', '2026-07-27 20:38:59');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
