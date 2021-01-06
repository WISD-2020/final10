-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_user_id_foreign` (`user_id`),
  CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_member_id_foreign` (`member_id`),
  CONSTRAINT `books_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `books` (`id`, `member_id`, `name`, `quantity`, `price`, `path`, `info`, `category`, `created_at`, `updated_at`) VALUES
(2,	1,	'怪物講師教學團隊的GEPT全民英檢初級初試10回模擬試題＋解析',	3,	360,	'1609940271.jpg',	'「全民英檢初級初試」是針對「聽力」和「閱讀」的英語能力檢定測驗，對英語學習者而言，也是一項公平、有效度的英語能力評量工具。',	'英檢',	'2021-01-03 23:42:40',	'2021-01-06 05:50:24'),
(3,	1,	'PHP、MySQL與JavaScript學習手冊(第五版)',	2,	500,	'1609940390.jpg',	'本書介紹好幾種重要的web開發語言，是一本很棒的入門書籍，節奏明快、容易閱讀、資訊豐富，讓你很快就能建立動態的網站，包括一個基本的社群網路網站',	'程式語言',	'2021-01-03 23:44:20',	'2021-01-06 05:45:36'),
(6,	3,	'新觀念 PHP7＋MySQL＋AJAX 網頁設計範例教本 第五版（附CD）',	7,	400,	'1609940890.jpg',	'本書設計有豐富的案例，就算沒有網頁程式的基礎也可順利入門，另外本書最後提供二個完整的專案實例，第一個是簡化版 CMS 內容管理系統，第二個是一套廉價航空公司的訂票系統，累積實務網站開發的經驗。',	'程式語言',	'2021-01-05 17:46:48',	'2021-01-06 05:54:42'),
(7,	2,	'大學國文選(第四版)',	2,	100,	'1609941194.jpg',	'無',	'國文',	'2021-01-05 17:48:35',	'2021-01-06 05:54:53'),
(8,	4,	'微積分(第11版)',	2,	200,	'1609940684.jpg',	'本書譯自Larson 和 Edwards  合著的 Calculus 一書，包括極限、微分、積分、微積分基本定理、微分方程式、羅必達規則、瑕積分、無窮級數、泰勒級數和常見的各類應用，內容相當完整。',	'數學',	'2021-01-06 05:44:15',	'2021-01-06 05:50:08'),
(9,	3,	'為你自己學Git',	1,	300,	'1609940972.jpg',	'本書內容：\r\n- 常用 Git 指令介紹。\r\n- 各種 Git 的常見問題及使用情境。\r\n- 如何修改 Git 的歷史紀錄。\r\n- 如何使用 GitHub 與其它人一起工作。\r\n- 一般平常工作用不到但對觀念建立有幫助的冷知識。',	'程式語言',	'2021-01-06 05:49:32',	'2021-01-06 05:53:37');

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_member_id_foreign` (`member_id`),
  KEY `carts_book_id_foreign` (`book_id`),
  CONSTRAINT `carts_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`id`, `member_id`, `book_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7,	3,	3,	1,	'2021-01-05 17:47:23',	'2021-01-05 17:47:23'),
(8,	3,	7,	5,	'2021-01-05 17:49:12',	'2021-01-05 17:49:12');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
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


DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `members_user_id_foreign` (`user_id`),
  CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `members` (`id`, `user_id`, `sex`, `email`, `address`, `tel`, `created_at`, `updated_at`) VALUES
(1,	1,	'女',	'r@gmail.com',	'台灣',	'00911111111',	'2021-01-03 23:37:31',	'2021-01-03 23:37:31'),
(2,	2,	'男',	'n@gmail.com',	'台灣',	'00922222222',	'2021-01-03 23:49:03',	'2021-01-03 23:49:03'),
(3,	3,	'男',	'A@gmail.com',	'台北',	'00912345678',	'2021-01-05 17:46:14',	'2021-01-05 17:46:14'),
(4,	4,	'男',	'k@gmail.com',	'台中',	'00988888888',	'2021-01-06 05:36:04',	'2021-01-06 05:36:04');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2020_12_07_113313_create_sessions_table',	1),
(7,	'2020_12_09_030511_create_admins_table',	1),
(8,	'2020_12_10_055934_create_members_table',	1),
(9,	'2020_12_10_060209_create_books_table',	1),
(10,	'2020_12_10_060448_create_carts_table',	1),
(11,	'2020_12_10_060644_create_orders_table',	1);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `way` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_seller_id_foreign` (`seller_id`),
  KEY `orders_member_id_foreign` (`member_id`),
  KEY `orders_book_id_foreign` (`book_id`),
  CONSTRAINT `orders_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `seller_id`, `member_id`, `book_id`, `name`, `quantity`, `money`, `time`, `status`, `address`, `way`, `created_at`, `updated_at`) VALUES
(2,	1,	2,	3,	'PHP、MySQL與JavaScript學習手冊(第五版)',	2,	500,	'2021-01-04 07:53:57',	'已完成',	'台灣',	'面交',	'2021-01-03 23:53:57',	'2021-01-06 05:39:50'),
(3,	1,	2,	2,	'怪物講師教學團隊的GEPT全民英檢初級初試10回模擬試題＋解析',	1,	360,	'2021-01-06 01:40:36',	'已完成',	'台灣',	'面交',	'2021-01-05 17:40:36',	'2021-01-06 05:37:51'),
(4,	1,	2,	2,	'怪物講師教學團隊的GEPT全民英檢初級初試10回模擬試題＋解析',	1,	360,	'2021-01-06 01:42:08',	'未完成',	'台灣',	'面交',	'2021-01-05 17:42:08',	'2021-01-06 05:37:51'),
(5,	1,	3,	3,	'PHP、MySQL與JavaScript學習手冊(第五版)',	1,	500,	'2021-01-06 01:47:02',	'未完成',	'台北',	'面交',	'2021-01-05 17:47:02',	'2021-01-06 05:39:50'),
(6,	1,	4,	3,	'PHP、MySQL與JavaScript學習手冊(第五版)',	1,	500,	'2021-01-06 13:45:36',	'未完成',	'台中',	'面交',	'2021-01-06 05:45:36',	'2021-01-06 05:45:36'),
(7,	4,	3,	8,	'微積分(第11版)',	1,	200,	'2021-01-06 13:50:08',	'未完成',	'台北',	'面交',	'2021-01-06 05:50:08',	'2021-01-06 05:50:08'),
(8,	1,	3,	2,	'怪物講師教學團隊的GEPT全民英檢初級初試10回模擬試題＋解析',	2,	360,	'2021-01-06 13:50:24',	'未完成',	'台北',	'面交',	'2021-01-06 05:50:24',	'2021-01-06 05:50:24'),
(9,	3,	2,	9,	'為你自己學Git',	1,	300,	'2021-01-06 13:53:37',	'未完成',	'台灣',	'面交',	'2021-01-06 05:53:37',	'2021-01-06 05:53:37'),
(10,	3,	4,	6,	'新觀念 PHP7＋MySQL＋AJAX 網頁設計範例教本 第五版（附CD）',	3,	400,	'2021-01-06 13:54:42',	'未完成',	'台中',	'面交',	'2021-01-06 05:54:42',	'2021-01-06 05:54:42'),
(11,	2,	4,	7,	'大學國文選(第四版)',	1,	100,	'2021-01-06 13:54:53',	'未完成',	'台中',	'面交',	'2021-01-06 05:54:53',	'2021-01-06 05:54:53');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Us2Lph3r6c2lhEDSq2eaPG1W1zwlzrHxR9a1OSvJ',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36 Edg/87.0.664.66',	'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJXdzZHbThKTGNXUXd2U1FORnNXaGFSUTRrWUdIbGRzdDhVRWx2WGJDIjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG5odjR4QTg4WFhLbDdOMUdSd1FKU3Uzelh0ajA0eExBOGp2Q3JXMkZqaEtEQndwMWN0OHJHIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRuaHY0eEE4OFhYS2w3TjFHUndRSlN1M3pYdGowNHhMQThqdkNyVzJGamhLREJ3cDFjdDhyRyI7fQ==',	1609941308),
('V6LsyF92ekoGh0DQB7eYKevfuiyA8WLxcbb4Z292',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36',	'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJFc1IyZ0tSSmVHek9idE1jWlFaN0tLVWxlQzJYMXRwWG0zT3lLclQ4IjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGd6UU9adVZ4ODBnSC8ucktvUmhNQS5USXBwLkEyOER2L1VOR013bzBmWHJYRzF5WEJCV011IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRnelFPWnVWeDgwZ0gvLnJLb1JoTUEuVElwcC5BMjhEdi9VTkdNd28wZlhyWEcxeVhCQldNdSI7fQ==',	1609897969);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `sex`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `address`, `tel`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'Raven',	'女',	'r@gmail.com',	NULL,	'$2y$10$JWQA3Njk0j4UnpMQUDEvMOKimKP3fBze9wM31arQpP3xvTNHdDNv6',	NULL,	NULL,	'台灣',	'0911111111',	NULL,	NULL,	NULL,	'2021-01-03 23:36:48',	'2021-01-03 23:36:48'),
(2,	'Normal',	'男',	'n@gmail.com',	NULL,	'$2y$10$X3I5XBARsJ9INBmwuw/Rq.pI2zU7a/17Wk3TzzmlX9/0FZAaHEAgK',	NULL,	NULL,	'台灣',	'0922222222',	NULL,	NULL,	NULL,	'2021-01-03 23:47:47',	'2021-01-03 23:47:47'),
(3,	'A',	'男',	'A@gmail.com',	NULL,	'$2y$10$gzQOZuVx80gH/.rKoRhMA.TIpp.A28Dv/UNGMwo0fXrXG1yXBBWMu',	NULL,	NULL,	'台北',	'0912345678',	NULL,	NULL,	NULL,	'2021-01-05 17:45:52',	'2021-01-05 17:45:52'),
(4,	'Kevin',	'男',	'k@gmail.com',	NULL,	'$2y$10$nhv4xA88XXKl7N1GRwQJSu3zXtj04xLA8jvCrW2FjhKDBwp1ct8rG',	NULL,	NULL,	'台中',	'0988888888',	NULL,	NULL,	NULL,	'2021-01-06 05:35:28',	'2021-01-06 05:35:28');

-- 2021-01-06 13:59:02
