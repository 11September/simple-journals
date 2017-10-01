# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: localhost (MySQL 5.7.17)
# Схема: simple-journal
# Время создания: 2017-10-01 16:08:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы data_rows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_rows`;

CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`)
VALUES
	(14,2,'id','number','id',1,0,0,0,0,0,'',1),
	(15,2,'author_id','text','author_id',1,0,0,0,0,0,'',2),
	(16,2,'title','text','title',1,1,1,1,1,1,'',3),
	(17,2,'excerpt','text_area','excerpt',1,0,1,1,1,1,'',4),
	(18,2,'body','rich_text_box','body',1,0,1,1,1,1,'',5),
	(19,2,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"}}',6),
	(20,2,'meta_description','text','meta_description',1,0,1,1,1,1,'',7),
	(21,2,'meta_keywords','text','meta_keywords',1,0,1,1,1,1,'',8),
	(22,2,'status','select_dropdown','status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),
	(23,2,'created_at','timestamp','created_at',1,1,1,0,0,0,'',10),
	(24,2,'updated_at','timestamp','updated_at',1,0,0,0,0,0,'',11),
	(25,2,'image','image','image',0,1,1,1,1,1,'',12),
	(26,3,'id','number','id',1,0,0,0,0,0,'',1),
	(27,3,'name','text','name',1,1,1,1,1,1,'',2),
	(28,3,'email','text','email',1,1,1,1,1,1,'',3),
	(29,3,'password','password','password',0,0,0,1,1,0,'',4),
	(30,3,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}',10),
	(31,3,'remember_token','text','remember_token',0,0,0,0,0,0,'',5),
	(32,3,'created_at','timestamp','created_at',0,1,1,0,0,0,'',6),
	(33,3,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7),
	(34,3,'avatar','image','avatar',0,1,1,1,1,1,'',8),
	(35,5,'id','number','id',1,0,0,0,0,0,'',1),
	(36,5,'name','text','name',1,1,1,1,1,1,'',2),
	(37,5,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),
	(38,5,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),
	(46,6,'id','number','id',1,0,0,0,0,0,'',1),
	(47,6,'name','text','Name',1,1,1,1,1,1,'',2),
	(48,6,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),
	(49,6,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),
	(50,6,'display_name','text','Display Name',1,1,1,1,1,1,'',5),
	(53,3,'role_id','text','role_id',1,1,1,1,1,1,'',9),
	(54,7,'id','checkbox','Id',1,0,0,0,0,0,NULL,1),
	(55,7,'name','text','Name',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|min:4\",\"messages\":{\"required\":\"This :attribute field is a must.\",\"min\":\"This :attribute field minimum :max chars.\"}}}',2),
	(56,7,'image','image','Image',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"\"},\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"20%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',3),
	(57,7,'description','text_area','Description',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|min:4\",\"messages\":{\"required\":\"This :attribute field is a must.\",\"min\":\"This :attribute field minimum :max chars.\"}}}',4),
	(58,7,'link','text','Link',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|min:4\",\"messages\":{\"required\":\"This :attribute field is a must.\",\"min\":\"This :attribute field minimum :max chars.\"}}}',6),
	(60,7,'created_at','timestamp','Created At',0,1,1,1,0,1,NULL,8),
	(61,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,9),
	(62,7,'body','rich_text_box','Body',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"min:4\",\"messages\":{\"required\":\"This :attribute field is a must.\",\"min\":\"This :attribute field minimum :max chars.\"}}}',5),
	(63,7,'status','radio_btn','Status',0,1,1,1,1,1,'{\"default\":\"PUBLISHED\",\"options\":{\"PUBLISHED\":\"Published\",\"DRAFT\":\"Draft\"},\"validation\":{\"rule\":\"required\"}}',7);

/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы data_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_types`;

CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`)
VALUES
	(2,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,'2017-10-01 13:38:44','2017-10-01 13:38:44'),
	(3,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','','',1,0,'2017-10-01 13:38:44','2017-10-01 13:38:44'),
	(5,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,'2017-10-01 13:38:44','2017-10-01 13:38:44'),
	(6,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,'2017-10-01 13:38:44','2017-10-01 13:38:44'),
	(7,'journals','journals','Journal','Journals','voyager-book','App\\Journal',NULL,NULL,NULL,1,0,'2017-10-01 14:49:13','2017-10-01 14:49:13');

/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы journals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `journals`;

CREATE TABLE `journals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT') COLLATE utf8_unicode_ci DEFAULT 'PUBLISHED',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `journals` WRITE;
/*!40000 ALTER TABLE `journals` DISABLE KEYS */;

INSERT INTO `journals` (`id`, `name`, `image`, `description`, `body`, `link`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Simple Journal','journals/October2017/14.jpg','Simple Journal Description','<p>adadas</p>','http://www.lipsum.com/','PUBLISHED','2017-10-01 15:12:11','2017-10-01 15:12:11'),
	(2,'Simple Journal','journals/October2017/14.jpg','Simple Journal Description','<p>adadas</p>','http://www.lipsum.com/','PUBLISHED','2017-10-01 15:12:11','2017-10-01 15:12:11');

/*!40000 ALTER TABLE `journals` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`)
VALUES
	(1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2017-10-01 13:38:44','2017-10-01 13:38:44','voyager.dashboard',NULL),
	(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2017-10-01 13:38:44','2017-10-01 13:38:44','voyager.media.index',NULL),
	(3,1,'Posts','','_self','voyager-news',NULL,NULL,6,'2017-10-01 13:38:44','2017-10-01 13:38:44','voyager.posts.index',NULL),
	(4,1,'Users','','_self','voyager-person',NULL,NULL,3,'2017-10-01 13:38:44','2017-10-01 13:38:44','voyager.users.index',NULL),
	(5,1,'Categories','','_self','voyager-categories',NULL,NULL,8,'2017-10-01 13:38:44','2017-10-01 13:38:44','voyager.categories.index',NULL),
	(6,1,'Pages','','_self','voyager-file-text',NULL,NULL,7,'2017-10-01 13:38:44','2017-10-01 13:38:44','voyager.pages.index',NULL),
	(7,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2017-10-01 13:38:44','2017-10-01 13:38:44','voyager.roles.index',NULL),
	(8,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2017-10-01 13:38:45','2017-10-01 13:38:45',NULL,NULL),
	(9,1,'Menu Builder','','_self','voyager-list',NULL,8,10,'2017-10-01 13:38:45','2017-10-01 13:38:45','voyager.menus.index',NULL),
	(10,1,'Database','','_self','voyager-data',NULL,8,11,'2017-10-01 13:38:45','2017-10-01 13:38:45','voyager.database.index',NULL),
	(11,1,'Compass','/admin/compass','_self','voyager-compass',NULL,8,12,'2017-10-01 13:38:45','2017-10-01 13:38:45',NULL,NULL),
	(12,1,'Hooks','/admin/hooks','_self','voyager-hook',NULL,8,13,'2017-10-01 13:38:45','2017-10-01 13:38:45',NULL,NULL),
	(13,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2017-10-01 13:38:45','2017-10-01 13:38:45','voyager.settings.index',NULL),
	(14,1,'Journals','/admin/journals','_self','voyager-book','#000000',NULL,15,'2017-10-01 14:58:40','2017-10-01 14:58:40',NULL,'');

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2017-10-01 13:38:44','2017-10-01 13:38:44');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2016_01_01_000000_add_voyager_user_fields',1),
	(4,'2016_01_01_000000_create_data_types_table',1),
	(5,'2016_01_01_000000_create_pages_table',1),
	(6,'2016_01_01_000000_create_posts_table',1),
	(7,'2016_02_15_204651_create_categories_table',1),
	(8,'2016_05_19_173453_create_menu_table',1),
	(9,'2016_10_21_190000_create_roles_table',1),
	(10,'2016_10_21_190000_create_settings_table',1),
	(11,'2016_11_30_135954_create_permission_table',1),
	(12,'2016_11_30_141208_create_permission_role_table',1),
	(13,'2016_12_26_201236_data_types__add__server_side',1),
	(14,'2017_01_13_000000_add_route_to_menu_items_table',1),
	(15,'2017_01_14_005015_create_translations_table',1),
	(16,'2017_01_15_000000_add_permission_group_id_to_permissions_table',1),
	(17,'2017_01_15_000000_create_permission_groups_table',1),
	(18,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),
	(19,'2017_03_06_000000_add_controller_to_data_types_table',1),
	(20,'2017_04_11_000000_alter_post_nullable_fields_table',1),
	(21,'2017_04_21_000000_add_order_to_data_rows_table',1),
	(22,'2017_07_05_210000_add_policyname_to_data_types_table',1),
	(23,'2017_08_05_000000_add_group_to_settings_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы permission_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_groups`;

CREATE TABLE `permission_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(1,3),
	(2,1),
	(2,3),
	(3,1),
	(3,3),
	(4,1),
	(4,3),
	(5,1),
	(5,3),
	(6,1),
	(6,3),
	(7,1),
	(7,3),
	(8,1),
	(8,3),
	(9,1),
	(9,3),
	(10,1),
	(10,3),
	(11,1),
	(11,3),
	(12,1),
	(12,3),
	(13,1),
	(13,3),
	(14,1),
	(14,3),
	(15,1),
	(15,3),
	(16,1),
	(16,3),
	(17,1),
	(17,3),
	(18,1),
	(18,3),
	(19,1),
	(19,3),
	(20,1),
	(20,3),
	(21,1),
	(21,3),
	(22,1),
	(22,3),
	(23,1),
	(23,3),
	(24,1),
	(24,3),
	(35,1),
	(35,3),
	(36,1),
	(36,3),
	(37,1),
	(37,3),
	(38,1),
	(38,3),
	(39,1),
	(39,3),
	(40,1),
	(40,3),
	(41,1),
	(41,3),
	(42,1),
	(42,3),
	(43,1),
	(43,3),
	(44,1),
	(44,3);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`)
VALUES
	(1,'browse_admin',NULL,'2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(2,'browse_database',NULL,'2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(3,'browse_media',NULL,'2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(4,'browse_compass',NULL,'2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(5,'browse_menus','menus','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(6,'read_menus','menus','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(7,'edit_menus','menus','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(8,'add_menus','menus','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(9,'delete_menus','menus','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(10,'browse_pages','pages','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(11,'read_pages','pages','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(12,'edit_pages','pages','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(13,'add_pages','pages','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(14,'delete_pages','pages','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(15,'browse_roles','roles','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(16,'read_roles','roles','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(17,'edit_roles','roles','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(18,'add_roles','roles','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(19,'delete_roles','roles','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(20,'browse_users','users','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(21,'read_users','users','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(22,'edit_users','users','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(23,'add_users','users','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(24,'delete_users','users','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(35,'browse_settings','settings','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(36,'read_settings','settings','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(37,'edit_settings','settings','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(38,'add_settings','settings','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(39,'delete_settings','settings','2017-10-01 13:38:45','2017-10-01 13:38:45',NULL),
	(40,'browse_journals','journals','2017-10-01 14:49:14','2017-10-01 14:49:14',NULL),
	(41,'read_journals','journals','2017-10-01 14:49:14','2017-10-01 14:49:14',NULL),
	(42,'edit_journals','journals','2017-10-01 14:49:14','2017-10-01 14:49:14',NULL),
	(43,'add_journals','journals','2017-10-01 14:49:14','2017-10-01 14:49:14',NULL),
	(44,'delete_journals','journals','2017-10-01 14:49:14','2017-10-01 14:49:14',NULL);

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Administrator','2017-10-01 13:38:45','2017-10-01 13:38:45'),
	(2,'user','Normal User','2017-10-01 13:38:45','2017-10-01 13:38:45'),
	(3,'developers','Developers','2017-10-01 14:56:40','2017-10-01 14:57:09');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,1,'Admin','admin@admin.com','users/default.png','$2y$10$rJkwblprmSLpz1orz0d31..BPA/IFdMW.aCgRGM16ts1AXRREvtFa',NULL,'2017-10-01 13:40:23','2017-10-01 13:40:23');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
