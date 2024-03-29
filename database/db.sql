-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.24 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица mobile-photography.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.categories: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `link`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'природа', 'priroda', 'active', '2020-05-07 08:05:12', '2020-05-07 08:05:12', NULL),
	(2, 'пластика', 'plastika', NULL, '2020-05-07 08:05:33', '2020-05-07 08:05:33', NULL),
	(3, 'объем', 'obem', NULL, '2020-05-07 08:05:48', '2020-05-07 08:05:48', NULL),
	(4, 'цветокоррекция', 'cvetokorrekciya', NULL, '2020-05-07 08:05:59', '2020-05-07 08:05:59', NULL),
	(5, 'светокоррекция', 'svetokorrekciya', NULL, '2020-05-07 08:06:20', '2020-05-07 08:06:20', NULL),
	(6, 'ретушь кожи', 'retush-kozhi', NULL, '2020-05-07 08:06:28', '2020-05-07 08:06:28', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.main_menus
CREATE TABLE IF NOT EXISTS `main_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `main_menus_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.main_menus: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `main_menus` DISABLE KEYS */;
INSERT INTO `main_menus` (`id`, `title`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Домой', 'domoy', '2020-05-07 05:12:38', '2020-05-07 05:12:38', NULL),
	(2, 'Портфолио', 'portfolio', '2020-05-07 05:13:02', '2020-05-07 05:13:02', NULL),
	(3, 'Программа', 'programma', '2020-05-07 05:13:11', '2020-05-07 05:13:11', NULL),
	(4, 'Оплатить', 'oplatit', '2020-05-07 05:13:26', '2020-05-07 05:13:26', NULL);
/*!40000 ALTER TABLE `main_menus` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.menu_socials
CREATE TABLE IF NOT EXISTS `menu_socials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_socials_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.menu_socials: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `menu_socials` DISABLE KEYS */;
INSERT INTO `menu_socials` (`id`, `title`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'facebook-f', 'facebook.com', '2020-05-07 05:15:36', '2020-05-07 05:15:36', NULL),
	(2, 'twitter', 'twitter.com', '2020-05-07 05:16:16', '2020-05-07 05:16:16', NULL),
	(3, 'instagram', 'instagram.com', '2020-05-07 05:17:00', '2020-05-07 05:17:00', NULL);
/*!40000 ALTER TABLE `menu_socials` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.migrations: ~18 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2020_04_29_140228_create_1588158148_roles_table', 1),
	(4, '2020_04_29_140236_create_1588158155_users_table', 1),
	(5, '2020_04_29_140237_add_5ea95ed782679_relationships_to_user_table', 1),
	(6, '2020_04_29_140829_create_1588158509_menus_table', 1),
	(7, '2020_04_29_141250_create_1588158770_menu_socials_table', 1),
	(8, '2020_04_29_142157_create_1588159317_portfolios_table', 1),
	(9, '2020_04_29_142352_create_1588159432_categories_table', 1),
	(10, '2020_04_29_142627_add_5ea96463b8ff0_relationships_to_portfolio_table', 1),
	(11, '2020_04_29_142849_drop_5ea964f15847e_menu_socials_table', 1),
	(12, '2020_04_29_143114_add_5ea965823de5a_relationships_to_portfolio_table', 1),
	(13, '2020_04_29_143330_drop_5ea9660aa605d_menus_table', 1),
	(14, '2020_04_29_143512_create_1588160112_programs_table', 1),
	(15, '2020_04_29_143749_add_5ea9670d4cb62_relationships_to_user_table', 1),
	(16, '2020_04_29_152541_create_1588163141_main_menus_table', 1),
	(17, '2020_04_29_152846_create_1588163326_menu_socials_table', 1),
	(18, '2020_04_29_153625_create_1588163785_prices_table', 1),
	(20, '2020_05_14_113521_create_subprogrammes_table', 2),
	(21, '2020_05_26_070248_create_photo_image_pages_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.photo_image_pages
CREATE TABLE IF NOT EXISTS `photo_image_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_image_pages_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.photo_image_pages: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `photo_image_pages` DISABLE KEYS */;
INSERT INTO `photo_image_pages` (`id`, `photo`, `section`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(12, '1590757791-1588251986707263.jpg', 'Главное изображение', '2020-05-29 13:09:51', '2020-05-29 13:09:51', NULL),
	(13, '1590757822-286980-nature-colorful-photography.jpg', 'Блок 1', '2020-05-29 13:10:22', '2020-05-29 13:10:22', NULL),
	(14, '1590757842-baa5aa7d57eaaac04d4f160c5dabdcc2.jpg', 'Блок 2', '2020-05-29 13:10:42', '2020-05-29 13:10:42', NULL);
/*!40000 ALTER TABLE `photo_image_pages` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.portfolios
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_after` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolios_deleted_at_index` (`deleted_at`),
  KEY `339557_5ea9645e9a322` (`category_id`),
  CONSTRAINT `339557_5ea9645e9a322` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.portfolios: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` (`id`, `photo`, `photo_after`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
	(8, '1589265128-1588252362327448.jpg', '1589265128-1588252362574602.jpg', '2020-05-12 06:32:08', '2020-05-12 06:32:08', NULL, 2),
	(9, '1589265187-1588252361757707.jpg', '1589265187-158825236252639.jpg', '2020-05-12 06:33:07', '2020-05-12 06:33:07', NULL, 3),
	(10, '1589265295-1588252362811293.jpg', '1589265295-1588252363144924.jpg', '2020-05-12 06:34:55', '2020-05-12 06:34:55', NULL, 4),
	(11, '1589265360-158825237655707.jpg', '1589265360-1588252390988615.jpg', '2020-05-12 06:36:00', '2020-05-12 06:36:00', NULL, 5),
	(12, '1589265397-1588252380865491.jpg', '1589265397-1588252390723248.jpg', '2020-05-12 06:36:37', '2020-05-12 06:36:37', NULL, 6),
	(13, '1591071563-1588252010172213.png', '1591071564-1588252010595789.png', '2020-06-02 04:19:24', '2020-06-11 04:35:46', NULL, NULL);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) unsigned DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prices_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.prices: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` (`id`, `flag`, `price`, `currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '1588829279-by.png', 30, 'BY', '2020-05-07 05:27:59', '2020-05-07 05:27:59', NULL),
	(2, '1588829309-ru.png', 900, 'RU', '2020-05-07 05:28:29', '2020-05-07 05:28:29', NULL),
	(3, '1588829336-ua.png', 330, 'UA', '2020-05-07 05:28:56', '2020-05-07 05:28:56', NULL);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessons` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.programs: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id`, `lessons`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Разбор приложений для обработки:', '2020-05-15 11:24:55', '2020-05-15 13:12:43', NULL),
	(2, 'Твое идеальное селфи', '2020-05-15 11:25:33', '2020-05-15 13:12:49', NULL),
	(3, 'Обработка фото во весь рост', '2020-05-15 11:25:46', '2020-05-15 13:12:53', NULL),
	(4, 'Обработка портретного фото', '2020-05-15 11:25:57', '2020-05-15 13:12:58', NULL);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.roles: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator (can create other users)', '2020-05-07 04:49:25', '2020-05-07 04:49:25'),
	(2, 'Simple user', '2020-05-07 04:49:25', '2020-05-07 04:49:25');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.subprogrammes
CREATE TABLE IF NOT EXISTS `subprogrammes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subprogrammes_program_id_foreign` (`program_id`),
  KEY `subprogrammes_deleted_at_index` (`deleted_at`),
  CONSTRAINT `subprogrammes_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.subprogrammes: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `subprogrammes` DISABLE KEYS */;
INSERT INTO `subprogrammes` (`id`, `title`, `program_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ретушь кожи', 1, '2020-05-15 11:47:35', '2020-05-15 11:47:35', NULL),
	(4, 'Удаление объектов', 1, '2020-05-18 08:27:39', '2020-05-18 08:27:39', NULL),
	(5, 'Свето и цветокоррекция', 1, '2020-05-18 08:27:56', '2020-05-18 08:27:56', NULL),
	(6, 'Пресеты Lightroom', 1, '2020-05-18 08:28:17', '2020-05-18 08:28:17', NULL),
	(7, 'Изменение фона', 1, '2020-05-18 08:28:33', '2020-05-18 08:28:33', NULL);
/*!40000 ALTER TABLE `subprogrammes` ENABLE KEYS */;

-- Дамп структуры для таблица mobile-photography.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `339554_5ea95ed107af7` (`role_id`),
  CONSTRAINT `339554_5ea95ed107af7` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы mobile-photography.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
	(1, 'Admin', 'admin@admin.com', NULL, NULL, NULL, '$2y$10$UjaWyL4rM0MAHTQD1xq.AeuN3QQNDq2UO9R26MEN4r1nxSG7Mvyji', '', '2020-05-07 04:49:26', '2020-05-07 04:49:26', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
