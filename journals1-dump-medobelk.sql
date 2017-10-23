-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица simple-journal.advertisements
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `journal_id` int(11) NOT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы simple-journal.advertisements: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
INSERT INTO `advertisements` (`id`, `journal_id`, `coupon`, `percent`, `link`, `title`, `created_at`, `updated_at`) VALUES
	(15, 8, 'da', 20, NULL, 'dad', '2017-10-20 10:38:03', '2017-10-20 10:38:03');
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.data_rows
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) unsigned NOT NULL,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.data_rows: ~89 rows (приблизительно)
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
	(14, 2, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(15, 2, 'author_id', 'text', 'author_id', 1, 0, 0, 0, 0, 0, NULL, 2),
	(16, 2, 'title', 'text', 'title', 1, 1, 1, 1, 1, 1, NULL, 3),
	(17, 2, 'excerpt', 'text_area', 'excerpt', 0, 0, 1, 1, 1, 1, NULL, 4),
	(18, 2, 'body', 'rich_text_box', 'body', 0, 0, 1, 1, 1, 1, NULL, 7),
	(19, 2, 'slug', 'hidden', 'slug', 1, 0, 1, 1, 1, 1, '{"slugify":{"origin":"title"}}', 6),
	(20, 2, 'meta_description', 'text', 'meta_description', 0, 0, 1, 1, 1, 1, NULL, 8),
	(21, 2, 'meta_keywords', 'text', 'meta_keywords', 0, 0, 1, 1, 1, 1, NULL, 9),
	(22, 2, 'status', 'hidden', 'status', 1, 0, 1, 1, 1, 1, '{"default":"INACTIVE","options":{"INACTIVE":"INACTIVE","ACTIVE":"ACTIVE"}}', 10),
	(23, 2, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, NULL, 11),
	(24, 2, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, NULL, 12),
	(25, 2, 'image', 'image', 'image', 0, 1, 1, 1, 1, 1, NULL, 5),
	(26, 3, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
	(27, 3, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
	(28, 3, 'email', 'text', 'email', 1, 1, 1, 1, 1, 1, '', 3),
	(29, 3, 'password', 'password', 'password', 0, 0, 0, 1, 1, 0, '', 4),
	(30, 3, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"name","pivot_table":"roles","pivot":"0"}', 10),
	(31, 3, 'remember_token', 'text', 'remember_token', 0, 0, 0, 0, 0, 0, '', 5),
	(32, 3, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 6),
	(33, 3, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
	(34, 3, 'avatar', 'image', 'avatar', 0, 1, 1, 1, 1, 1, '', 8),
	(35, 5, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
	(36, 5, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
	(37, 5, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
	(38, 5, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
	(46, 6, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
	(47, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
	(48, 6, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
	(49, 6, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
	(50, 6, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
	(53, 3, 'role_id', 'text', 'role_id', 1, 1, 1, 1, 1, 1, '', 9),
	(54, 7, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(55, 7, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{"validation":{"rule":"required","messages":{"required":"This :attribute field is a must."}}}', 2),
	(56, 7, 'description', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, NULL, 3),
	(57, 7, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, '{"resize":{"width":"1000","height":"null"},"quality":"70%","upsize":true,"thumbnails":[{"name":"medium","scale":"50%"},{"name":"small","scale":"25%"},{"name":"cropped","crop":{"width":"300","height":"250"}}]}', 4),
	(58, 7, 'url', 'text', 'Url', 0, 1, 1, 1, 1, 1, '{"validation":{"rule":"","messages":{"required":"This :attribute field is a must."}}}', 5),
	(59, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 6),
	(60, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
	(61, 7, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"PUBLISHED","options":{"PUBLISHED":"published","DRAFT":"draft","PENDING":"pending"}}', 6),
	(62, 8, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
	(63, 8, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '', 2),
	(64, 8, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, '', 3),
	(65, 8, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 4),
	(66, 8, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 5),
	(67, 8, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 6),
	(68, 8, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{"resize":{"width":"1000","height":"null"},"quality":"70%","upsize":true,"thumbnails":[{"name":"medium","scale":"50%"},{"name":"small","scale":"25%"},{"name":"cropped","crop":{"width":"300","height":"250"}}]}', 7),
	(69, 8, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{"slugify":{"origin":"title","forceUpdate":true}}', 8),
	(70, 8, 'meta_description', 'text_area', 'meta_description', 1, 0, 1, 1, 1, 1, '', 9),
	(71, 8, 'meta_keywords', 'text_area', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 10),
	(72, 8, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{"default":"DRAFT","options":{"PUBLISHED":"published","DRAFT":"draft","PENDING":"pending"}}', 11),
	(73, 8, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 12),
	(74, 8, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 13),
	(75, 9, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
	(76, 9, 'parent_id', 'select_dropdown', 'parent_id', 0, 0, 1, 1, 1, 1, '{"default":"","null":"","options":{"":"-- None --"},"relationship":{"key":"id","label":"name"}}', 2),
	(77, 9, 'order', 'text', 'order', 1, 1, 1, 1, 1, 1, '{"default":1}', 3),
	(78, 9, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 4),
	(79, 9, 'slug', 'text', 'slug', 1, 1, 1, 1, 1, 1, '{"slugify":{"origin":"name"}}', 5),
	(80, 9, 'created_at', 'timestamp', 'created_at', 0, 0, 1, 0, 0, 0, '', 6),
	(81, 9, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
	(82, 8, 'seo_title', 'text', 'seo_title', 0, 1, 1, 1, 1, 1, '', 14),
	(83, 8, 'featured', 'checkbox', 'featured', 1, 1, 1, 1, 1, 1, '', 15),
	(84, 10, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(85, 10, 'journal_id', 'select_dropdown', 'Journal', 1, 1, 1, 1, 1, 1, '{"validation":{"rule":"required","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max."}}}', 2),
	(86, 10, 'coupon', 'text', 'Coupon', 0, 1, 1, 1, 1, 1, NULL, 5),
	(87, 10, 'percent', 'select_dropdown', 'Percent', 0, 1, 1, 1, 1, 1, '{"default":"0","options":{"10":"10","20":"20","30":"30","40":"40","50":"50","60":"60","70":"70","80":"80","90":"90"}}', 6),
	(88, 10, 'link', 'hidden', 'Link', 0, 1, 1, 1, 1, 1, NULL, 7),
	(89, 10, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{"validation":{"rule":"","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max.","min":"This :attribute field maximum :min."}}}', 8),
	(90, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 9),
	(91, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 10),
	(92, 10, 'advertisement_belongsto_journal_relationship', 'relationship', 'Journal', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Journal","table":"journals","type":"belongsTo","column":"journal_id","key":"id","label":"name","pivot_table":"advertisements","pivot":"0"}', 3),
	(93, 10, 'advertisement_hasmany_position_relationship', 'relationship', 'Positions', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Position","table":"positions","type":"hasMany","column":"id","key":"name","label":"name","pivot_table":"advertisements","pivot":"0"}', 4),
	(94, 11, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(95, 11, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{"validation":{"rule":"required","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max."}}}', 2),
	(96, 11, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{"validation":{"rule":"","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max.","min":"This :attribute field maximum :min."}}}', 3),
	(97, 11, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{"validation":{"rule":"required","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max.","min":"This :attribute field maximum :min."}}}', 4),
	(98, 11, 'status', 'radio_btn', 'Status', 0, 1, 1, 1, 1, 1, '{"default":"PUBLISHED","options":{"PUBLISHED":"PUBLISHED","DRAFT":"DRAFT","PENDING":"PENDING"}}', 5),
	(99, 11, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{"validation":{"rule":"required|mimes:jpeg,bmp,png","messages":{"mimes":"Только загрузка картинки","size":"Картинка большого размера","size:max":"Картинка большого размера","required":"Данное поле обязательное к заполнению."}},"resize":{"width":"1000","height":"null"},"quality":"80%","upsize":true,"thumbnails":[{"name":"medium","scale":"50%"}]}', 6),
	(100, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 7),
	(101, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 8),
	(102, 12, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(103, 12, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, NULL, 3),
	(104, 12, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, NULL, 4),
	(105, 12, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, NULL, 5),
	(106, 12, 'journal_id', 'select_dropdown', 'Journal', 1, 1, 1, 1, 1, 1, '{"validation":{"rule":"required","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max."}}}', 6),
	(107, 12, 'total_price', 'number', 'Total Price', 1, 1, 1, 1, 1, 1, '{"validation":{"rule":"required","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max."}}}', 7),
	(108, 12, 'purchase_time', 'date', 'Purchase Time', 1, 1, 1, 1, 1, 1, '{"validation":{"rule":"required","messages":{"required":"This :attribute field is a must.","max":"This :attribute field maximum :max."}}}', 8),
	(109, 12, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 9),
	(110, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 10),
	(111, 12, 'sale_hasone_journal_relationship', 'relationship', 'Journal', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Journal","table":"journals","type":"belongsTo","column":"journal_id","key":"id","label":"name","pivot_table":"advertisements","pivot":"0"}', 2);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.data_types
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.data_types: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`) VALUES
	(2, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, NULL, NULL, 1, 0, '2017-10-06 12:57:30', '2017-10-20 08:06:24'),
	(3, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', 1, 0, '2017-10-06 12:57:30', '2017-10-06 12:57:30'),
	(5, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, '2017-10-06 12:57:30', '2017-10-06 12:57:30'),
	(6, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, '2017-10-06 12:57:30', '2017-10-06 12:57:30'),
	(7, 'journals', 'journals', 'Journal', 'Journals', NULL, 'App\\Journal', NULL, NULL, NULL, 1, 0, '2017-10-06 13:15:09', '2017-10-06 13:15:09'),
	(8, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, '2017-10-13 14:58:08', '2017-10-13 14:58:08'),
	(9, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, '2017-10-13 14:58:08', '2017-10-13 14:58:08'),
	(10, 'advertisements', 'advertisements', 'Advertisement', 'Advertisements', 'voyager-paypal', 'App\\Advertisement', NULL, 'VoyagerAdvertisementController', NULL, 1, 0, '2017-10-14 12:55:04', '2017-10-14 13:06:49'),
	(11, 'positions', 'positions', 'Position', 'Positions', NULL, 'App\\Position', NULL, NULL, NULL, 1, 0, '2017-10-14 13:49:11', '2017-10-14 13:49:11'),
	(12, 'sales', 'sales', 'Sale', 'Sales', 'voyager-basket', 'App\\Sale', NULL, NULL, NULL, 1, 0, '2017-10-19 15:02:29', '2017-10-19 15:02:29');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.journals
CREATE TABLE IF NOT EXISTS `journals` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING','') COLLATE utf8_unicode_ci DEFAULT 'PUBLISHED',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы simple-journal.journals: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `journals` DISABLE KEYS */;
INSERT INTO `journals` (`id`, `name`, `description`, `image`, `url`, `status`, `created_at`, `updated_at`) VALUES
	(7, 'Glamour', 'Glamour journal', 'journals/October2017/Group 167.png', NULL, 'PUBLISHED', '2017-10-19 09:02:34', '2017-10-19 09:02:34'),
	(8, 'Bon Voyage', '<p style="text-align: center;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'journals/October2017/NoPath - Copy (25)1.png', NULL, 'PUBLISHED', '2017-10-19 09:03:00', '2017-10-19 10:15:49'),
	(9, 'AnOther', 'Another Journal', 'journals/October2017/Group 1691.png', NULL, 'PUBLISHED', '2017-10-19 09:05:00', '2017-10-19 09:07:03'),
	(10, 'Prestige', 'Prestige journal', 'journals/October2017/NoPath - Copy (27).png', NULL, 'PUBLISHED', '2017-10-19 09:08:41', '2017-10-19 09:08:41'),
	(11, 'Elle', 'Elle journal', 'journals/October2017/NoPath - Copy (28).png', NULL, 'PUBLISHED', '2017-10-19 09:09:48', '2017-10-19 09:09:48'),
	(12, 'Vogue', 'vogue journal', 'journals/October2017/NoPath - Copy (29).png', NULL, 'PUBLISHED', '2017-10-19 09:10:55', '2017-10-19 09:10:55'),
	(13, 'Example', 'Example journal', 'journals/October2017/gallery-1499720797-elle-august-cover-emilia-clarke.png', NULL, 'PUBLISHED', '2017-10-19 09:12:06', '2017-10-19 09:12:06'),
	(14, 'Example 2', 'Example 2 journal', 'journals/October2017/NoPath - Copy (30)@2x.png', NULL, 'PUBLISHED', '2017-10-19 09:12:49', '2017-10-19 09:12:49'),
	(15, 'Example 3', 'Example 2 journal', 'journals/October2017/NoPath - Copy (31).png', NULL, 'PUBLISHED', '2017-10-19 09:13:16', '2017-10-19 09:13:16'),
	(16, 'Cosmopolitan', 'Cosmopolitan  journal', 'journals/October2017/44cad1db6c0ca37afdce9e6c1af0e1782.jpg', NULL, 'PUBLISHED', '2017-10-19 09:14:00', '2017-10-19 09:18:42');
/*!40000 ALTER TABLE `journals` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.menus: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2017-10-06 12:57:30', '2017-10-06 12:57:30');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) unsigned NOT NULL,
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
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.menu_items: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
	(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2017-10-06 12:57:30', '2017-10-06 12:57:30', 'voyager.dashboard', NULL),
	(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 4, '2017-10-06 12:57:30', '2017-10-13 14:37:13', 'voyager.media.index', NULL),
	(4, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2017-10-06 12:57:30', '2017-10-06 12:57:30', 'voyager.users.index', NULL),
	(6, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 5, '2017-10-06 12:57:30', '2017-10-14 12:55:54', 'voyager.pages.index', NULL),
	(7, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2017-10-06 12:57:30', '2017-10-06 12:57:30', 'voyager.roles.index', NULL),
	(9, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, NULL, 10, '2017-10-06 12:57:30', '2017-10-19 15:38:38', 'voyager.menus.index', NULL),
	(10, 1, 'Database', '', '_self', 'voyager-data', NULL, NULL, 11, '2017-10-06 12:57:30', '2017-10-19 15:38:38', 'voyager.database.index', NULL),
	(11, 1, 'Compass', '/admin/compass', '_self', 'voyager-compass', NULL, NULL, 12, '2017-10-06 12:57:30', '2017-10-19 15:38:38', NULL, NULL),
	(12, 1, 'Hooks', '/admin/hooks', '_self', 'voyager-hook', NULL, NULL, 13, '2017-10-06 12:57:30', '2017-10-19 15:38:38', NULL, NULL),
	(13, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2017-10-06 12:57:30', '2017-10-19 15:38:38', 'voyager.settings.index', NULL),
	(14, 1, 'Journals', '/admin/journals', '_self', 'voyager-book', '#000000', NULL, 6, '2017-10-06 13:18:49', '2017-10-14 14:06:03', NULL, ''),
	(18, 1, 'Advertisements', '/admin/advertisements', '_self', 'voyager-paypal', '#000000', NULL, 8, '2017-10-14 12:55:46', '2017-10-14 14:06:04', NULL, ''),
	(19, 1, 'Positions', '/admin/positions', '_self', 'voyager-list', '#000000', NULL, 7, '2017-10-14 13:50:35', '2017-10-14 14:06:04', NULL, ''),
	(20, 1, 'Sales', '/admin/sales', '_self', 'voyager-basket', '#000000', NULL, 9, '2017-10-19 15:04:13', '2017-10-19 15:38:31', NULL, '');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.migrations: ~23 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_01_01_000000_add_voyager_user_fields', 1),
	(4, '2016_01_01_000000_create_data_types_table', 1),
	(5, '2016_01_01_000000_create_pages_table', 1),
	(6, '2016_01_01_000000_create_posts_table', 1),
	(7, '2016_02_15_204651_create_categories_table', 1),
	(8, '2016_05_19_173453_create_menu_table', 1),
	(9, '2016_10_21_190000_create_roles_table', 1),
	(10, '2016_10_21_190000_create_settings_table', 1),
	(11, '2016_11_30_135954_create_permission_table', 1),
	(12, '2016_11_30_141208_create_permission_role_table', 1),
	(13, '2016_12_26_201236_data_types__add__server_side', 1),
	(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
	(15, '2017_01_14_005015_create_translations_table', 1),
	(16, '2017_01_15_000000_add_permission_group_id_to_permissions_table', 1),
	(17, '2017_01_15_000000_create_permission_groups_table', 1),
	(18, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
	(19, '2017_03_06_000000_add_controller_to_data_types_table', 1),
	(20, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
	(21, '2017_04_21_000000_add_order_to_data_rows_table', 1),
	(22, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
	(23, '2017_08_05_000000_add_group_to_settings_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.pages: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'about', 'about', '<p class="MsoNormal" style="margin: 0px; color: #222222; font-family: arial, sans-serif; font-size: 12.8px; white-space: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-origin: initial; background-clip: initial; text-align: center;"><span style="font-family: Georgia;">COSMO PRESS is a French Publishing house, sorting more than 10 international magazines in 20 countries, featuring celebrities, fashion trends, fitness &amp; health and in depth lifestyle stories complimented by extraordinary photographs shot by the best photographers from around the globe.</span></p>\r\n<p class="MsoNormal" style="margin: 0px; color: #222222; font-family: arial, sans-serif; font-size: 12.8px; white-space: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-origin: initial; background-clip: initial; text-align: center;"><span style="font-family: Georgia;">&nbsp;</span></p>\r\n<p class="MsoNormal" style="margin: 0px; color: #222222; font-family: arial, sans-serif; font-size: 12.8px; white-space: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-origin: initial; background-clip: initial; text-align: center;"><span style="font-family: Georgia;">We bring you exclusive interviews with celebrities, artists, designers, and other creative people in the industry and cover fashion trends, and inspirations. Our goal is to create content that inspires you. We hope to introduce and connect you with some of the finest artists and professionals within every industry.</span></p>', '', 'about', 'about', 'about', 'ACTIVE', '2017-10-12 14:59:46', '2017-10-20 08:02:26'),
	(2, 1, 'publication', 'publication', '<p style="text-align: center;">About publication</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://localhost:8000/storage/pages/October2017/coding-min.jpg" alt="" width="375" height="300" /></p>\r\n<p style="text-align: center;">This information has not any sens<br /><br /><strong style="margin: 0px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;">Lorem Ipsum</strong><span style="color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<p style="text-align: center;"><span style="color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;"><img src="http://localhost:8000/storage/pages/October2017/bug-min.jpg" alt="" width="375" height="300" /></span></p>', NULL, 'publication', 'publication', 'publication', 'ACTIVE', '2017-10-18 13:49:47', '2017-10-18 13:53:28'),
	(3, 1, 'advertisement', 'advertisement', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-weight: 400; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: #000000;">What is Lorem Ipsum?</h2>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: #000000; font-family: \'Open Sans\', Arial, sans-serif;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: #000000; font-family: \'Open Sans\', Arial, sans-serif;">&nbsp;</p>\r\n<h2 style="margin: 0px 0px 10px; padding: 0px; font-weight: 400; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: #000000;">What is Lorem Ipsum?</h2>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: #000000; font-family: \'Open Sans\', Arial, sans-serif;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: #000000; font-family: \'Open Sans\', Arial, sans-serif;">&nbsp;</p>\r\n<h2 style="margin: 0px 0px 10px; padding: 0px; font-weight: 400; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: #000000; text-align: right;">What is Lorem Ipsum?</h2>\r\n<p style="margin: 0px 0px 15px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: right;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: right;">&nbsp;</p>\r\n<h2 style="margin: 0px 0px 10px; padding: 0px; font-weight: 400; line-height: 24px; font-family: DauphinPlain; font-size: 24px; color: #000000; text-align: right;">What is Lorem Ipsum?</h2>\r\n<p style="margin: 0px 0px 15px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: right;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker i</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: right;">&nbsp;</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: center;"><img src="http://localhost:8000/storage/pages/October2017/bug-min1.jpg" alt="" width="375" height="300" /></p>', NULL, 'advertisement', 'advertisement', 'advertisement', 'ACTIVE', '2017-10-18 13:55:27', '2017-10-18 13:55:27');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.permissions: ~49 rows (приблизительно)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
	(1, 'browse_admin', NULL, '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(2, 'browse_database', NULL, '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(3, 'browse_media', NULL, '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(4, 'browse_compass', NULL, '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(5, 'browse_menus', 'menus', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(6, 'read_menus', 'menus', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(7, 'edit_menus', 'menus', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(8, 'add_menus', 'menus', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(9, 'delete_menus', 'menus', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(10, 'browse_pages', 'pages', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(11, 'read_pages', 'pages', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(12, 'edit_pages', 'pages', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(13, 'add_pages', 'pages', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(14, 'delete_pages', 'pages', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(15, 'browse_roles', 'roles', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(16, 'read_roles', 'roles', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(17, 'edit_roles', 'roles', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(18, 'add_roles', 'roles', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(19, 'delete_roles', 'roles', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(20, 'browse_users', 'users', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(21, 'read_users', 'users', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(22, 'edit_users', 'users', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(23, 'add_users', 'users', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(24, 'delete_users', 'users', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(35, 'browse_settings', 'settings', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(36, 'read_settings', 'settings', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(37, 'edit_settings', 'settings', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(38, 'add_settings', 'settings', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(39, 'delete_settings', 'settings', '2017-10-06 12:57:30', '2017-10-06 12:57:30', NULL),
	(40, 'browse_journals', 'journals', '2017-10-06 13:15:09', '2017-10-06 13:15:09', NULL),
	(41, 'read_journals', 'journals', '2017-10-06 13:15:09', '2017-10-06 13:15:09', NULL),
	(42, 'edit_journals', 'journals', '2017-10-06 13:15:09', '2017-10-06 13:15:09', NULL),
	(43, 'add_journals', 'journals', '2017-10-06 13:15:09', '2017-10-06 13:15:09', NULL),
	(44, 'delete_journals', 'journals', '2017-10-06 13:15:09', '2017-10-06 13:15:09', NULL),
	(55, 'browse_advertisements', 'advertisements', '2017-10-14 12:55:04', '2017-10-14 12:55:04', NULL),
	(56, 'read_advertisements', 'advertisements', '2017-10-14 12:55:04', '2017-10-14 12:55:04', NULL),
	(57, 'edit_advertisements', 'advertisements', '2017-10-14 12:55:04', '2017-10-14 12:55:04', NULL),
	(58, 'add_advertisements', 'advertisements', '2017-10-14 12:55:04', '2017-10-14 12:55:04', NULL),
	(59, 'delete_advertisements', 'advertisements', '2017-10-14 12:55:04', '2017-10-14 12:55:04', NULL),
	(60, 'browse_positions', 'positions', '2017-10-14 13:49:11', '2017-10-14 13:49:11', NULL),
	(61, 'read_positions', 'positions', '2017-10-14 13:49:11', '2017-10-14 13:49:11', NULL),
	(62, 'edit_positions', 'positions', '2017-10-14 13:49:11', '2017-10-14 13:49:11', NULL),
	(63, 'add_positions', 'positions', '2017-10-14 13:49:11', '2017-10-14 13:49:11', NULL),
	(64, 'delete_positions', 'positions', '2017-10-14 13:49:11', '2017-10-14 13:49:11', NULL),
	(65, 'browse_sales', 'sales', '2017-10-19 15:02:29', '2017-10-19 15:02:29', NULL),
	(66, 'read_sales', 'sales', '2017-10-19 15:02:29', '2017-10-19 15:02:29', NULL),
	(67, 'edit_sales', 'sales', '2017-10-19 15:02:29', '2017-10-19 15:02:29', NULL),
	(68, 'add_sales', 'sales', '2017-10-19 15:02:29', '2017-10-19 15:02:29', NULL),
	(69, 'delete_sales', 'sales', '2017-10-19 15:02:29', '2017-10-19 15:02:29', NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.permission_groups
CREATE TABLE IF NOT EXISTS `permission_groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.permission_groups: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_groups` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.permission_role: ~77 rows (приблизительно)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 3),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(10, 3),
	(11, 1),
	(11, 3),
	(12, 1),
	(12, 3),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(21, 3),
	(22, 1),
	(22, 3),
	(23, 1),
	(24, 1),
	(35, 1),
	(35, 3),
	(36, 1),
	(36, 3),
	(37, 1),
	(37, 3),
	(38, 1),
	(39, 1),
	(40, 1),
	(40, 3),
	(41, 1),
	(41, 3),
	(42, 1),
	(42, 3),
	(43, 1),
	(43, 3),
	(44, 1),
	(44, 3),
	(55, 1),
	(55, 3),
	(56, 1),
	(57, 1),
	(57, 3),
	(58, 1),
	(58, 3),
	(59, 1),
	(59, 3),
	(60, 1),
	(60, 3),
	(61, 1),
	(61, 3),
	(62, 1),
	(62, 3),
	(63, 1),
	(63, 3),
	(64, 1),
	(64, 3),
	(65, 1),
	(65, 3),
	(66, 1),
	(66, 3),
	(67, 1),
	(67, 3),
	(68, 1),
	(68, 3),
	(69, 1),
	(69, 3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `advertisement_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `status` enum('INSTOCK','SOLD','') COLLATE utf8_unicode_ci DEFAULT 'INSTOCK',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы simple-journal.positions: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` (`id`, `name`, `description`, `advertisement_id`, `price`, `status`, `image`, `created_at`, `updated_at`) VALUES
	(3, 'a', NULL, 15, 20, 'INSTOCK', 'Ads15Journal8/Position3.jpeg', '2017-10-20 10:38:03', '2017-10-20 10:38:03'),
	(17, 'a', NULL, 15, 14, 'INSTOCK', 'Ads15Journal8/Position17.jpeg', '2017-10-21 13:24:39', '2017-10-21 13:24:39'),
	(20, 'a', NULL, 15, 22, 'SOLD', 'Ads15Journal8/Position20.jpeg', '2017-10-21 13:39:08', '2017-10-21 13:39:08'),
	(21, 'a', NULL, 15, 24, 'INSTOCK', 'Ads15Journal8/Position3.jpeg', NULL, NULL),
	(22, 'b', NULL, 15, 25, 'INSTOCK', 'Ads15Journal8/Position3.jpeg', NULL, NULL);
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.roles: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Administrator', '2017-10-06 12:57:30', '2017-10-06 12:57:30'),
	(2, 'user', 'Normal User', '2017-10-06 12:57:30', '2017-10-06 12:57:30'),
	(3, 'moderator', 'Moderator', '2017-10-19 10:21:13', '2017-10-19 10:21:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `journal_id` int(11) NOT NULL,
  `total_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы simple-journal.sales: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.settings: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
	(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
	(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
	(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
	(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
	(5, 'admin.bg_image', 'Admin Background Image', 'settings/October2017/journal.jpg', '', 'image', 5, 'Admin'),
	(6, 'admin.title', 'Admin Title', 'Cosmo-press', '', 'text', 1, 'Admin'),
	(7, 'admin.description', 'Admin Description', 'Welcome to Cosmo-press', '', 'text', 2, 'Admin'),
	(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
	(9, 'admin.icon_image', 'Admin Icon Image', 'settings/October2017/Logo-Cosmo-Press.png', '', 'image', 4, 'Admin'),
	(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.translations
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) unsigned NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.translations: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;

-- Дамп структуры для таблица simple-journal.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы simple-journal.users: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '$2y$10$2JFGeUtKfLjy0mchgNXmeO3EW3D6rmFGy0ekzLLx14n/sLqruqOG2', 'x72OXWC8vt8Ar6ofeP7OMH7KON4kTA78lzSsZb0K5ZENWo6KDHKMrd9yGmuk', '2017-10-06 13:07:36', '2017-10-06 13:07:37'),
	(2, 3, 'cosmo-press', 'cosmo-press@admin.com', 'users/October2017/Logo-Cosmo-Press.png', '$2y$10$kN9ih7NXvOfFMkTAGmRZ9uk3pmW5knKGryqhSZQqfI/09.ZdPk5kK', 'jmGVGsrBMq8SwcNlssgW5H3Vx1W6F0Fx4j2Hslxi5l1HxGsUHp1TXfcnxQDw', '2017-10-19 10:24:07', '2017-10-19 10:24:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
