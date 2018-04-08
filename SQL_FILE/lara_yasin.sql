-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for lara_yasin
CREATE DATABASE IF NOT EXISTS `lara_yasin` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lara_yasin`;

-- Dumping structure for table lara_yasin.about
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `deskripsi` text NOT NULL,
  `maps` text,
  `alamat` text,
  `email` varchar(250) DEFAULT NULL,
  `notelp` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.about: ~0 rows (approximately)
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` (`id`, `name`, `deskripsi`, `maps`, `alamat`, `email`, `notelp`) VALUES
	(1, 'Tentang Kami', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consequat sed libero ac blandit. Nullam eleifend non tellus sed luctus. Pellentesque dictum libero dolor, dignissim semper augue bibendum at. Phasellus enim lacus, laoreet sit amet leo sit amet, ornare porttitor orci. Donec ultricies quis ipsum id dapibus. Phasellus in justo dui. Nulla posuere justo in erat ultrices consectetur. Aliquam in orci massa. Proin nec fermentum justo, vel posuere lorem.</p>\r\n\r\n<p>Nullam quis ultricies lectus. Maecenas et ex lacinia, cursus purus at, porttitor erat. Nulla lobortis tortor non tortor varius laoreet. Suspendisse rutrum leo a urna posuere pulvinar. Etiam lacus massa, tincidunt ut neque eget, placerat dictum nisl. Nulla accumsan eget orci in rhoncus. Phasellus scelerisque, odio id lobortis rutrum, tellus neque dapibus metus, at semper elit metus at dui. Fusce quis sagittis justo. Morbi eget luctus dui. Etiam auctor risus mauris, sit amet suscipit elit facilisis nec. Aenean placerat velit a accumsan porttitor.</p>\r\n\r\n<p>Nulla faucibus pellentesque iaculis. Sed ut feugiat tortor, placerat malesuada nibh. Curabitur augue mi, dictum sit amet lorem eu, dictum porttitor lectus. Phasellus nec ex felis. Fusce lobortis risus a eros dignissim, rutrum interdum ipsum sollicitudin. Sed dictum est et metus pretium tincidunt. Curabitur in leo lectus. Vivamus dapibus nisi sit amet ligula laoreet, nec congue odio porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc at arcu consectetur velit pellentesque ullamcorper. Vivamus hendrerit justo nisl, at luctus lorem eleifend ut. Phasellus dapibus urna ut euismod vulputate. Vivamus cursus tincidunt varius.</p>\r\n\r\n<p>Donec ut augue sollicitudin augue scelerisque aliquam. Nullam id sapien ac velit eleifend pretium. Duis dapibus libero in lobortis fringilla. Maecenas aliquam imperdiet justo at venenatis. Suspendisse tellus ipsum, sagittis et tincidunt a, porttitor iaculis ante. In dapibus et diam sed mattis. Aliquam quis pulvinar quam, gravida luctus lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lorem nunc, vestibulum sed tortor vitae, tincidunt tristique nisi. Nulla faucibus, nisl non sollicitudin egestas, sem sapien blandit libero, ut imperdiet ante nisi ut lectus. Duis gravida massa a luctus consectetur. Aliquam luctus neque semper, sollicitudin ante id, aliquam nulla. Suspendisse ac mi bibendum, congue felis vel, accumsan magna. Curabitur sed felis cursus, ullamcorper velit et, viverra velit.</p>\r\n\r\n<p>Maecenas euismod quam at vulputate interdum. Maecenas ut pulvinar turpis, vel ultricies augue. Maecenas tellus leo, blandit a bibendum at, dignissim ut libero. Suspendisse sit amet lacus tellus. Suspendisse ut semper ipsum, sed aliquet ante. Aenean ut tincidunt arcu, vitae maximus ipsum. Vestibulum turpis libero, accumsan id risus eu, malesuada bibendum augue. Suspendisse gravida lectus eget turpis tempus convallis.</p>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8907087216216!2d106.8939035144292!3d-6.145378995550567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f544d677b15b%3A0x3f3e3f8a77b37667!2sProgressTech!5e0!3m2!1sid!2sid!4v1520645307470', 'Sentra Bisnis Artha Gading Blok A6A No. 22-23, Jalan Boulevard Artha Gading, Kelapa Gading Barat, Kelapa Gading, Jakarta Utara', 'yasin@kangyasin.com', '081908327332');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.alamats
CREATE TABLE IF NOT EXISTS `alamats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kota` int(11) DEFAULT NULL COMMENT 'ID Kota to Raja Ongkir',
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kodepos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `customer_id` int(10) unsigned NOT NULL,
  `namalamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notelp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alamats_customer_id_foreign` (`customer_id`),
  CONSTRAINT `alamats_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.alamats: ~20 rows (approximately)
/*!40000 ALTER TABLE `alamats` DISABLE KEYS */;
INSERT INTO `alamats` (`id`, `id_kota`, `provinsi`, `kota`, `kodepos`, `customer_id`, `namalamat`, `notelp`, `alamat`, `main`, `created_at`, `updated_at`) VALUES
	(5, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Rumah', '05121325413', 'Jl. Lodan ipsum dolor sit amet no.15 Rt.08/09 Jakarta Barat.', 0, '2018-02-20 03:26:06', '2018-03-12 04:40:57'),
	(6, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 8, 'Rumah', '05121325413', 'Jalanan', 1, '2018-02-20 04:23:33', '2018-02-20 04:23:33'),
	(7, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 9, 'Rumah', '05121325413', 'Jalanan', 1, '2018-02-20 04:23:53', '2018-02-20 04:23:53'),
	(11, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Rumah 4', '081213654621', 'Jalanan', 0, '2018-02-22 07:18:15', '2018-02-22 07:18:15'),
	(16, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Rumah 9', '081213654621', 'Jalanan', 0, '2018-02-23 09:23:01', '2018-02-23 09:23:01'),
	(17, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Kantor 2', '081213654621', 'Jalanan', 1, '2018-02-23 09:26:09', '2018-03-12 04:40:57'),
	(18, 203, 'Kalimantan Selatan', 'Kotabaru', '72119', 7, 'Kotabaru', '08121212121', 'Jalanamnamnanaaaa', 0, '2018-03-07 09:40:00', '2018-03-07 09:40:00'),
	(19, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Jakarta Pusat', '08121212121', 'Jalan Teramat indah untuk dilalui sendiri no.5 k66a', 0, '2018-03-08 02:08:05', '2018-03-08 02:08:05'),
	(20, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Jakarta Pusat', '08121212121', 'Jl Sultan Iskandar Muda Kav 30 Wisma Sentosa 12240', 0, '2018-03-08 02:24:21', '2018-03-08 02:24:21'),
	(21, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Jakarta Pusat', '08121212121', 'Jl Sultan Iskandar Muda Kav 30 Wisma Sentosa 12240', 0, '2018-03-08 02:28:20', '2018-03-08 02:28:20'),
	(22, 151, 'DKI Jakarta', 'Jakarta Barat', '11220', 7, 'Jakarta Barat', '02151515151', 'Jl Sultan Iskandar Muda Kav 30 Wisma Sentosa 12240', 0, '2018-03-08 02:31:08', '2018-03-08 02:31:08'),
	(23, 153, 'DKI Jakarta', 'Jakarta Selatan', '12230', 7, 'Jakarta Selatan', '08121212121', 'Jl Sultan Iskandar Muda Kav 30 Wisma Sentosa 12240', 0, '2018-03-08 02:33:52', '2018-03-08 02:33:52'),
	(24, 151, 'DKI Jakarta', 'Jakarta Barat', '11220', 7, 'Jakarta Barat', '08121212121', 'Jl Sultan Iskandar Muda Kav 30 Wisma Sentosa 12240', 0, '2018-03-08 02:35:31', '2018-03-08 02:35:31'),
	(25, 151, 'DKI Jakarta', 'Jakarta Barat', '11220', 7, 'Jakarta Barat', '08121212121', 'Jl Sultan Iskandar Muda Kav 30 Wisma Sentosa 12240', 0, '2018-03-08 02:36:43', '2018-03-08 02:36:43'),
	(26, 88, 'Gorontalo', 'Bone Bolango', '96511', 7, 'Bone Bolango', '08121212121', 'Jl Sultan Iskandar Muda Kav 30 Wisma Sentosa 12240', 0, '2018-03-08 02:40:41', '2018-03-08 02:40:41'),
	(27, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Jakarta Pusat', '08121212121', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.', 0, '2018-03-08 03:35:35', '2018-03-08 03:35:35'),
	(28, 27, 'Bangka Belitung', 'Bangka', '33212', 46, 'Bangka', '0818718711111', 'Bangka itu keren sekali', 0, '2018-03-11 11:36:24', '2018-03-11 11:36:24'),
	(29, 152, 'DKI Jakarta', 'Jakarta Pusat', '10540', 7, 'Jakarta Pusat', '081817871811', 'Jalan terindah yang pernah ada', 0, '2018-03-12 02:15:30', '2018-03-12 02:15:30'),
	(30, 151, 'DKI Jakarta', 'Jakarta Barat', '11220', 47, 'Jakarta Barat', '08187181111', 'Jalanan terindah yang pernah ada', 0, '2018-03-12 03:59:50', '2018-03-12 03:59:50'),
	(31, 54, 'Jawa Barat', 'Bekasi', '17837', 47, 'Bekasi', '081817871811', 'Bekasi jalan raya indah nan asri', 0, '2018-03-12 04:07:44', '2018-03-12 04:07:44'),
	(32, 115, 'Jawa Barat', 'Depok', '16416', 48, 'Depok', '09802982222', 'fsdfdsfsd', 0, '2018-03-12 04:37:13', '2018-03-12 04:37:13');
/*!40000 ALTER TABLE `alamats` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `main` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.banners: ~6 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `name`, `link`, `image`, `main`) VALUES
	(1, 'New Product Collection', '/category_product/1', 'new-product-collection.jpg', 1),
	(2, 'Bags Sale up to 50% Discount', '/category_product/2', 'bags-sale-up-to-50-discount.jpg', 1),
	(6, 'Hot Deal up tp 50% off', '/category_product/3', 'hot-deal-up-tp-50-off.jpg', 1),
	(7, 'New Collection Satu', '/newcollection', 'new-collection-satu.jpg', 2),
	(9, 'Best Collection Dua', '/bestcollection', 'best-collection-dua.jpg', 2),
	(10, 'Hot Collection Tiga', '/hotcollection', 'hot-collection-tiga.jpg', 2);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.categoryproducts
CREATE TABLE IF NOT EXISTS `categoryproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namacategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL DEFAULT '0',
  `publish` tinyint(1) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.categoryproducts: ~6 rows (approximately)
/*!40000 ALTER TABLE `categoryproducts` DISABLE KEYS */;
INSERT INTO `categoryproducts` (`id`, `namacategory`, `feature`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
	(1, 'Atasan', 1, 1, 1, NULL, NULL),
	(2, 'Bawahan', 0, 1, 2, NULL, NULL),
	(3, 'Aksesoris', 0, 1, 3, NULL, NULL),
	(4, 'Sepatu', 1, 1, 4, NULL, NULL),
	(5, 'Jam', 1, 1, 5, NULL, NULL),
	(6, 'Topi', 0, 1, 6, NULL, NULL),
	(7, 'Testing', 0, 1, 0, NULL, NULL);
/*!40000 ALTER TABLE `categoryproducts` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.config_shops
CREATE TABLE IF NOT EXISTS `config_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `google` varchar(250) DEFAULT NULL,
  `webtitle` varchar(250) DEFAULT NULL,
  `webkeyword` varchar(250) DEFAULT NULL,
  `webdesc` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.config_shops: ~0 rows (approximately)
/*!40000 ALTER TABLE `config_shops` DISABLE KEYS */;
INSERT INTO `config_shops` (`id`, `logo`, `facebook`, `twitter`, `instagram`, `google`, `webtitle`, `webkeyword`, `webdesc`, `created_at`, `updated_at`) VALUES
	(1, 'public/logo/laracommerce-yasin.png', 'http://facebook.com/kangyasin', 'http://twitter.com/kangyasin', 'http://instagram.com/kangyasin', 'http://plus.google.com/kangyasin', 'LaraCommerce Yasin', 'Toko Online, Online Mall, Belanja Online, Online Shop Indonesia', 'LaraCommerce toko online dengan pengalaman belanja online yang fun & simple. Beli semua kebutuhan fashionmu dengan mudah dan murah.', '2018-03-09 11:09:43', '2018-03-09 08:14:45');
/*!40000 ALTER TABLE `config_shops` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0 = customer, 1 = member register, 2 = member verifikasi, 3 = member banned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL COMMENT 'Jika 0 hanya ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.customers: ~7 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `nama`, `email`, `password`, `notelp`, `remember_token`, `status`, `created_at`, `updated_at`, `flag`) VALUES
	(7, 'Kang Yasin', 'yasin@kangyasin.com', '$2y$10$BMvu.6xs8vgXly1LWrdxwOw9U/3Hn7z2kzKozEMhldVzNB5InnQr.', '05121325413', 'onQuoe0zIyzZ02WcZWbuWdpJ8k7IRjilKsXLpQnB9WT4kzlykjzLtoR0RZEP', 2, '2018-02-20 03:26:06', '2018-02-26 08:42:56', NULL),
	(8, 'Kang Yasin', 'yasin@kadngyasin.com', '$2y$10$m8Z/e3a/P8rnB3u5aOehLuVRYrPfggAJsU5lkRld.X.dSv2keI6.e', '05121325413', NULL, 2, '2018-02-20 04:23:33', '2018-02-26 08:32:34', NULL),
	(9, 'Kang Yasin', 'yasin@kangydasin.com', '$2y$10$3Td9yyW3kAunNyGjZrICw.ZZh1NQM6WaZRI181duMjjpjqRmlsioy', '05121325413', NULL, 2, '2018-02-20 04:23:53', '2018-02-26 07:25:34', NULL),
	(45, 'Kang Yasin', 'superuser@lavalite.org', '$2y$10$ZVBIWPUUNtc7eqexVLM0IuSSdVrNMZkrUwozPwVw0VV/zwvDUWvaC', NULL, NULL, 2, NULL, NULL, NULL),
	(46, 'Azis Mahfudin', 'azismahfudin@gmail.com', '', NULL, NULL, 0, NULL, NULL, NULL),
	(47, 'Herman Sitompul', 'herman@kangyasin.com', '', '08187181111', NULL, 0, NULL, NULL, NULL),
	(48, 'Testnama test', 'test@kangyasin.com', '', '09802982222', NULL, 0, NULL, NULL, NULL),
	(49, 'testjdgfhds', 'testoas@kangyasin.com', '$2y$10$Stpk1j/FEufjkKQvTG4dv.B.CR5FQpaCF4bQXbfc6keF89AXlYhQm', NULL, NULL, 2, NULL, NULL, NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.detailproducts
CREATE TABLE IF NOT EXISTS `detailproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryproducts_id` int(10) unsigned NOT NULL,
  `namaproducts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NOT NULL DEFAULT '0',
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `deals` tinyint(4) DEFAULT '0',
  `harga` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detailproducts_categoryproducts_id_foreign` (`categoryproducts_id`),
  CONSTRAINT `detailproducts_categoryproducts_id_foreign` FOREIGN KEY (`categoryproducts_id`) REFERENCES `categoryproducts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.detailproducts: ~9 rows (approximately)
/*!40000 ALTER TABLE `detailproducts` DISABLE KEYS */;
INSERT INTO `detailproducts` (`id`, `categoryproducts_id`, `namaproducts`, `berat`, `deskripsi`, `shortdesc`, `publish`, `deals`, `harga`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Product Pertama', 2000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 200000, NULL, NULL),
	(2, 1, 'Product Keduas', 1700, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 280000, NULL, NULL),
	(3, 4, 'Product Pertama', 1500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 260000, NULL, NULL),
	(4, 4, 'Product Kedua', 1000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 180000, NULL, NULL),
	(5, 4, 'Product Ketiga', 1250, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 199999, NULL, NULL),
	(6, 2, 'Product Dibuang Sayang', 1500, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 0, 250000, NULL, NULL),
	(7, 1, 'Sepatu Naiki Kaki', 1200, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, 1, 800000, NULL, NULL),
	(8, 3, 'Jam Lorem Ipsum Pria', 800, '<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis accumsan efficitur. Cras quis ex nec odio hendrerit consectetur. Vivamus a felis et ex blandit suscipit sed et turpis. Aliquam eget luctus tellus. Duis urna orci, maximus quis efficitur et, fermentum molestie nisl. Duis ipsum nisl, congue quis egestas nec, elementum vel elit. Maecenas maximus hendrerit vestibulum. Donec nec faucibus mauris. Quisque dapibus nisi purus. Mauris ac ultrices erat, et porttitor sem. Morbi suscipit posuere nisl, sed dignissim justo aliquam a. Praesent ultrices semper lobortis. Sed sem dolor, fermentum a auctor ac, iaculis eu lectus. Etiam lobortis metus eu augue blandit, eu rhoncus nunc luctus.</p>\r\n\r\n<p>Duis at lacus eget massa lacinia imperdiet. Nulla euismod dui ut velit pulvinar, et egestas mi porttitor. Nunc vel dolor nec risus iaculis consectetur. Integer quis sagittis ligula, quis auctor turpis. Nullam semper orci a velit volutpat, feugiat sodales ex fringilla. Cras posuere pellentesque risus eget tristique. Praesent quis arcu felis. Cras non mauris nec urna cursus porta. Aenean volutpat ex ut rhoncus feugiat. Donec quis malesuada odio.</p>\r\n\r\n<p>Vestibulum at lorem velit. Nunc malesuada sodales sapien sed pulvinar. Pellentesque venenatis odio sed auctor tristique. Cras quis ante congue, venenatis metus at, dapibus neque. Mauris posuere, dui a viverra dignissim, quam tellus faucibus elit, vel pharetra quam dolor vitae orci. Vestibulum posuere malesuada magna ac laoreet. Donec malesuada nunc tellus, quis venenatis elit tristique non. Integer eu tempor justo, vel fermentum felis.</p>\r\n\r\n<p>Proin id mattis urna. Nulla eu sapien vitae nisi hendrerit ornare at in est. Donec a maximus nulla. Donec vitae gravida lorem. Sed sem mi, dapibus sed venenatis at, hendrerit sed metus. Vivamus finibus nisi risus, quis dignissim quam vehicula eu. Mauris ac quam elit. Praesent aliquam sodales arcu at sodales. Nullam interdum rhoncus nisi id lacinia.</p>\r\n\r\n<p>Sed feugiat mauris turpis, placerat faucibus lacus mattis ac. Vestibulum iaculis, eros id ornare lacinia, nisl risus sodales ligula, at molestie ex metus vitae nibh. Quisque blandit nisi ut diam vestibulum, vitae rhoncus urna pretium. Fusce tincidunt urna ut lorem commodo elementum. Etiam tincidunt eleifend pulvinar. Suspendisse ut tellus ultricies, pellentesque diam gravida, viverra erat. Aliquam vulputate magna ullamcorper libero ultricies, sollicitudin dapibus mi scelerisque. Phasellus vestibulum, lorem nec venenatis pellentesque, tellus ex posuere eros, sed imperdiet justo enim et turpis. Mauris nibh magna, egestas ut iaculis ut, pellentesque scelerisque dui. Fusce nec libero eu velit viverra lobortis nec nec leo. Phasellus maximus blandit diam nec pellentesque. Nam consequat dolor quis nisl molestie, vitae commodo ligula accumsan. Pellentesque ac lacus vel dui luctus egestas. Etiam interdum cursus ante.</p>', 'Lorem ipsum dolor sit ametlah pokoknya.', 1, 0, 1500000, NULL, NULL),
	(9, 5, 'Jam Lorem Ipsum Wanita', 1000, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis accumsan efficitur. Cras quis ex nec odio hendrerit consectetur. Vivamus a felis et ex blandit suscipit sed et turpis. Aliquam eget luctus tellus. Duis urna orci, maximus quis efficitur et, fermentum molestie nisl. Duis ipsum nisl, congue quis egestas nec, elementum vel elit. Maecenas maximus hendrerit vestibulum. Donec nec faucibus mauris. Quisque dapibus nisi purus. Mauris ac ultrices erat, et porttitor sem. Morbi suscipit posuere nisl, sed dignissim justo aliquam a. Praesent ultrices semper lobortis. Sed sem dolor, fermentum a auctor ac, iaculis eu lectus. Etiam lobortis metus eu augue blandit, eu rhoncus nunc luctus.</p>\r\n\r\n<p>Duis at lacus eget massa lacinia imperdiet. Nulla euismod dui ut velit pulvinar, et egestas mi porttitor. Nunc vel dolor nec risus iaculis consectetur. Integer quis sagittis ligula, quis auctor turpis. Nullam semper orci a velit volutpat, feugiat sodales ex fringilla. Cras posuere pellentesque risus eget tristique. Praesent quis arcu felis. Cras non mauris nec urna cursus porta. Aenean volutpat ex ut rhoncus feugiat. Donec quis malesuada odio.</p>\r\n\r\n<p>Vestibulum at lorem velit. Nunc malesuada sodales sapien sed pulvinar. Pellentesque venenatis odio sed auctor tristique. Cras quis ante congue, venenatis metus at, dapibus neque. Mauris posuere, dui a viverra dignissim, quam tellus faucibus elit, vel pharetra quam dolor vitae orci. Vestibulum posuere malesuada magna ac laoreet. Donec malesuada nunc tellus, quis venenatis elit tristique non. Integer eu tempor justo, vel fermentum felis.</p>\r\n\r\n<p>Proin id mattis urna. Nulla eu sapien vitae nisi hendrerit ornare at in est. Donec a maximus nulla. Donec vitae gravida lorem. Sed sem mi, dapibus sed venenatis at, hendrerit sed metus. Vivamus finibus nisi risus, quis dignissim quam vehicula eu. Mauris ac quam elit. Praesent aliquam sodales arcu at sodales. Nullam interdum rhoncus nisi id lacinia.</p>\r\n\r\n<p>Sed feugiat mauris turpis, placerat faucibus lacus mattis ac. Vestibulum iaculis, eros id ornare lacinia, nisl risus sodales ligula, at molestie ex metus vitae nibh. Quisque blandit nisi ut diam vestibulum, vitae rhoncus urna pretium. Fusce tincidunt urna ut lorem commodo elementum. Etiam tincidunt eleifend pulvinar. Suspendisse ut tellus ultricies, pellentesque diam gravida, viverra erat. Aliquam vulputate magna ullamcorper libero ultricies, sollicitudin dapibus mi scelerisque. Phasellus vestibulum, lorem nec venenatis pellentesque, tellus ex posuere eros, sed imperdiet justo enim et turpis. Mauris nibh magna, egestas ut iaculis ut, pellentesque scelerisque dui. Fusce nec libero eu velit viverra lobortis nec nec leo. Phasellus maximus blandit diam nec pellentesque. Nam consequat dolor quis nisl molestie, vitae commodo ligula accumsan. Pellentesque ac lacus vel dui luctus egestas. Etiam interdum cursus ante.</p>', 'Lorem ipsum dolor sitamet pokoknya.', 1, 0, 1250000, NULL, NULL),
	(10, 7, 'Testnama', 1000, '<p>desc</p>', 'test short dech', 1, 0, 5000, NULL, NULL);
/*!40000 ALTER TABLE `detailproducts` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.faq: ~0 rows (approximately)
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` (`id`, `deskripsi`) VALUES
	(1, '<style>\r\n@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);\r\n.faqHeader {\r\n    font-size: 27px;\r\n    margin: 20px;\r\n}\r\n\r\n.panel-heading [data-toggle="collapse"]:after {\r\n    font-family: \'FontAwesome\';\r\n    content: "\\f078"; /* "play" icon */\r\n    float: right;\r\n    color: #F58723;\r\n    font-size: 18px;\r\n    line-height: 22px;\r\n    /* rotate "play" icon from > (right arrow) to down arrow */\r\n/*    -webkit-transform: rotate(-90deg);\r\n    -moz-transform: rotate(-90deg);\r\n    -ms-transform: rotate(-90deg);\r\n    -o-transform: rotate(-90deg);\r\n    transform: rotate(-90deg); */\r\n}\r\n\r\n.panel-heading [data-toggle="collapse"].collapsed:after {\r\n    /* rotate "play" icon from > (right arrow) to ^ (up arrow) */\r\n/*    -webkit-transform: rotate(90deg);\r\n    -moz-transform: rotate(90deg);\r\n    -ms-transform: rotate(90deg);\r\n    -o-transform: rotate(90deg);\r\n    transform: rotate(90deg); */\r\n    color: #454444;\r\n}\r\n</style>\r\n<div class="container">\r\n    <div class="panel-group" id="accordion">\r\n        <div class="faqHeader">General questions</div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Is account registration required?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseOne" class="panel-collapse collapse in">\r\n                <div class="panel-body">\r\n                    Account registration at <strong>PrepBootstrap</strong> is only required if you will be selling or buying themes. \r\n                    This ensures a valid communication channel for all parties involved in any transactions. \r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Can I submit my own Bootstrap templates or themes?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseTen" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    A lot of the content of the site has been submitted by the community. Whether it is a commercial element/template/theme \r\n                    or a free one, you are encouraged to contribute. All credits are published along with the resources. \r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">What is the currency used for all transactions?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseEleven" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    All prices for themes, templates and other items, including each seller\'s or buyer\'s account balance are in <strong>USD</strong>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <div class="faqHeader">Sellers</div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Who cen sell items?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseTwo" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    Any registed user, who presents a work, which is genuine and appealing, can post it on <strong>PrepBootstrap</strong>.\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">I want to sell my items - what are the steps?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseThree" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    The steps involved in this process are really simple. All you need to do is:\r\n                    <ul>\r\n                        <li>Register an account</li>\r\n                        <li>Activate your account</li>\r\n                        <li>Go to the <strong>Themes</strong> section and upload your theme</li>\r\n                        <li>The next step is the approval step, which usually takes about 72 hours.</li>\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How much do I get from each sale?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseFive" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    Here, at <strong>PrepBootstrap</strong>, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.\r\n                    <br />\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseSix" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    There are a number of reasons why you should join us:\r\n                    <ul>\r\n                        <li>A great 70% flat rate for your items.</li>\r\n                        <li>Fast response/approval times. Many sites take weeks to process a theme or template. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for a template/theme to get reviewed.</li>\r\n                        <li>We are not an exclusive marketplace. This means that you can sell your items on <strong>PrepBootstrap</strong>, as well as on any other marketplate, and thus increase your earning potential.</li>\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseEight" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment. \r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseNine" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account. \r\n                    The minimum amount of your balance should be at least 70 USD. \r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <div class="faqHeader">Buyers</div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">I want to buy a theme - what are the steps?</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseFour" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    Buying a theme on <strong>PrepBootstrap</strong> is really simple. Each theme has a live preview. \r\n                    Once you have selected a theme or template, which is to your liking, you can quickly and securely pay via Paypal.\r\n                    <br />\r\n                    Once the transaction is complete, you gain full access to the purchased product. \r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="panel panel-default">\r\n            <div class="panel-heading">\r\n                <h4 class="panel-title">\r\n                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Is this the latest version of an item</a>\r\n                </h4>\r\n            </div>\r\n            <div id="collapseSeven" class="panel-collapse collapse">\r\n                <div class="panel-body">\r\n                    Each item in <strong>PrepBootstrap</strong> is maintained to its latest version. This ensures its smooth operation.\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.groupdetails
CREATE TABLE IF NOT EXISTS `groupdetails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usergroups_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupdetails_usergroups_id_foreign` (`usergroups_id`),
  KEY `groupdetails_menu_id_foreign` (`menu_id`),
  CONSTRAINT `groupdetails_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  CONSTRAINT `groupdetails_usergroups_id_foreign` FOREIGN KEY (`usergroups_id`) REFERENCES `usergroups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.groupdetails: ~7 rows (approximately)
/*!40000 ALTER TABLE `groupdetails` DISABLE KEYS */;
INSERT INTO `groupdetails` (`id`, `usergroups_id`, `menu_id`, `flag`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 1),
	(3, 1, 3, 1),
	(4, 1, 4, 1),
	(5, 1, 5, 1),
	(6, 1, 6, 1),
	(7, 2, 1, 1);
/*!40000 ALTER TABLE `groupdetails` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.imageproducts
CREATE TABLE IF NOT EXISTS `imageproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `detailproducts_id` int(10) unsigned NOT NULL,
  `nameimage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainflag` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imageproducts_detailproducts_id_foreign` (`detailproducts_id`),
  CONSTRAINT `imageproducts_detailproducts_id_foreign` FOREIGN KEY (`detailproducts_id`) REFERENCES `detailproducts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.imageproducts: ~12 rows (approximately)
/*!40000 ALTER TABLE `imageproducts` DISABLE KEYS */;
INSERT INTO `imageproducts` (`id`, `detailproducts_id`, `nameimage`, `mainflag`, `created_at`, `updated_at`) VALUES
	(55, 1, 'public/product/product-pertama_1.jpg', '1', '2018-02-21 01:18:03', '2018-02-21 01:18:03'),
	(56, 2, 'public/product/product-keduas_56.jpg', '1', '2018-02-21 01:18:27', '2018-02-21 01:18:27'),
	(57, 3, 'public/product/product-pertama_57.jpg', '1', '2018-02-21 01:19:23', '2018-02-21 01:19:23'),
	(58, 4, 'public/product/product-kedua_58.jpg', '1', '2018-02-21 01:19:34', '2018-02-21 01:19:34'),
	(59, 5, 'public/product/product-ketiga_59.jpg', '1', '2018-02-21 01:19:54', '2018-02-21 01:19:54'),
	(60, 1, 'public/product/product-pertama_60.jpg', '0', '2018-02-21 01:29:28', '2018-02-21 01:29:28'),
	(61, 6, 'public/product/product-dibuang-sayang_61.jpg', '1', '2018-02-21 09:42:17', '2018-02-21 09:42:17'),
	(62, 8, 'public/product/jam-lorem-ipsum-pria_62.jpg', '1', '2018-03-08 07:38:32', '2018-03-08 07:38:32'),
	(63, 9, 'public/product/jam-lorem-ipsum-wanita_63.jpg', '1', '2018-03-08 07:42:01', '2018-03-08 07:42:01'),
	(64, 10, 'public/product/testnama_64.png', '0', '2018-03-12 04:28:58', '2018-03-12 04:28:58'),
	(65, 10, 'public/product/testnama_65.png', '1', '2018-03-12 04:28:58', '2018-03-12 04:28:58'),
	(66, 10, 'public/product/testnama_66.png', '0', '2018-03-12 04:28:58', '2018-03-12 04:28:58'),
	(67, 10, 'public/product/testnama_67.png', '0', '2018-03-12 04:28:58', '2018-03-12 04:28:58');
/*!40000 ALTER TABLE `imageproducts` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.jobs: ~1 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.karirs
CREATE TABLE IF NOT EXISTS `karirs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.karirs: ~0 rows (approximately)
/*!40000 ALTER TABLE `karirs` DISABLE KEYS */;
INSERT INTO `karirs` (`id`, `name`, `deskripsi`) VALUES
	(1, 'Karir', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consequat sed libero ac blandit. Nullam eleifend non tellus sed luctus. Pellentesque dictum libero dolor, dignissim semper augue bibendum at. Phasellus enim lacus, laoreet sit amet leo sit amet, ornare porttitor orci. Donec ultricies quis ipsum id dapibus. Phasellus in justo dui. Nulla posuere justo in erat ultrices consectetur. Aliquam in orci massa. Proin nec fermentum justo, vel posuere lorem.</p>\r\n\r\n<p>Nullam quis ultricies lectus. Maecenas et ex lacinia, cursus purus at, porttitor erat. Nulla lobortis tortor non tortor varius laoreet. Suspendisse rutrum leo a urna posuere pulvinar. Etiam lacus massa, tincidunt ut neque eget, placerat dictum nisl. Nulla accumsan eget orci in rhoncus. Phasellus scelerisque, odio id lobortis rutrum, tellus neque dapibus metus, at semper elit metus at dui. Fusce quis sagittis justo. Morbi eget luctus dui. Etiam auctor risus mauris, sit amet suscipit elit facilisis nec. Aenean placerat velit a accumsan porttitor.</p>\r\n\r\n<p>Nulla faucibus pellentesque iaculis. Sed ut feugiat tortor, placerat malesuada nibh. Curabitur augue mi, dictum sit amet lorem eu, dictum porttitor lectus. Phasellus nec ex felis. Fusce lobortis risus a eros dignissim, rutrum interdum ipsum sollicitudin. Sed dictum est et metus pretium tincidunt. Curabitur in leo lectus. Vivamus dapibus nisi sit amet ligula laoreet, nec congue odio porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc at arcu consectetur velit pellentesque ullamcorper. Vivamus hendrerit justo nisl, at luctus lorem eleifend ut. Phasellus dapibus urna ut euismod vulputate. Vivamus cursus tincidunt varius.</p>\r\n\r\n<p>Donec ut augue sollicitudin augue scelerisque aliquam. Nullam id sapien ac velit eleifend pretium. Duis dapibus libero in lobortis fringilla. Maecenas aliquam imperdiet justo at venenatis. Suspendisse tellus ipsum, sagittis et tincidunt a, porttitor iaculis ante. In dapibus et diam sed mattis. Aliquam quis pulvinar quam, gravida luctus lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lorem nunc, vestibulum sed tortor vitae, tincidunt tristique nisi. Nulla faucibus, nisl non sollicitudin egestas, sem sapien blandit libero, ut imperdiet ante nisi ut lectus. Duis gravida massa a luctus consectetur. Aliquam luctus neque semper, sollicitudin ante id, aliquam nulla. Suspendisse ac mi bibendum, congue felis vel, accumsan magna. Curabitur sed felis cursus, ullamcorper velit et, viverra velit.</p>\r\n\r\n<p>Maecenas euismod quam at vulputate interdum. Maecenas ut pulvinar turpis, vel ultricies augue. Maecenas tellus leo, blandit a bibendum at, dignissim ut libero. Suspendisse sit amet lacus tellus. Suspendisse ut semper ipsum, sed aliquet ante. Aenean ut tincidunt arcu, vitae maximus ipsum. Vestibulum turpis libero, accumsan id risus eu, malesuada bibendum augue. Suspendisse gravida lectus eget turpis tempus convallis.</p>');
/*!40000 ALTER TABLE `karirs` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.logstocks
CREATE TABLE IF NOT EXISTS `logstocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `detailproducts_id` int(10) unsigned NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `totalstok` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logstocks_detailproducts_id_foreign` (`detailproducts_id`),
  CONSTRAINT `logstocks_detailproducts_id_foreign` FOREIGN KEY (`detailproducts_id`) REFERENCES `detailproducts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.logstocks: ~13 rows (approximately)
/*!40000 ALTER TABLE `logstocks` DISABLE KEYS */;
INSERT INTO `logstocks` (`id`, `detailproducts_id`, `masuk`, `keluar`, `totalstok`, `tanggal`, `created_at`, `updated_at`) VALUES
	(1, 4, 20, 0, 20, '2018-02-12', NULL, NULL),
	(2, 4, 45, 0, 36, '2018-02-16', '2018-02-16 10:52:34', '2018-03-12 07:14:36'),
	(3, 1, 30, 0, 30, '2018-02-17', '2018-02-17 17:24:38', '2018-02-17 17:24:38'),
	(6, 1, 1, 0, 31, '2018-02-17', '2018-02-17 17:36:08', '2018-02-17 18:01:07'),
	(7, 1, 13, 0, 32, '2018-02-17', '2018-02-17 18:01:16', '2018-03-11 11:36:24'),
	(8, 2, 12, 0, 12, '2018-02-18', '2018-02-18 05:09:45', '2018-02-18 05:09:45'),
	(9, 2, 12, 0, 8, '2018-02-18', '2018-02-18 05:09:56', '2018-03-08 02:33:52'),
	(10, 6, 50, 0, 21, '2018-02-21', '2018-02-21 09:41:58', '2018-03-08 03:35:35'),
	(11, 3, 200, 0, 193, '2018-02-22', '2018-02-22 03:22:12', '2018-03-06 02:08:21'),
	(12, 5, 55, 0, 31, '2018-02-22', '2018-02-22 03:22:22', '2018-03-12 04:37:14'),
	(13, 7, 50, 0, 49, '2018-02-28', '2018-02-28 10:14:57', '2018-03-12 04:07:44'),
	(14, 8, 50, 0, 49, '2018-03-08', '2018-03-08 07:38:48', '2018-03-12 02:15:30'),
	(15, 9, 80, 0, 78, '2018-03-08', '2018-03-08 07:42:14', '2018-03-12 04:32:56');
/*!40000 ALTER TABLE `logstocks` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menulevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namamenu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `sort` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.menu: ~17 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `controller`, `parent_number`, `type`, `menulevel`, `icon`, `namamenu`, `publish`, `sort`) VALUES
	(1, '/administrator/dashboard', '0', 'B', '1', '<i class="fa fa-dashboard"></i>', 'Dashboard', 1, '1'),
	(2, '/administrator/categoryproduct', '0', 'B', '1', '<i class="fa fa-shopping-cart"></i>', 'Product', 1, '3'),
	(3, '/administrator/transaction', '0', 'B', '1', '<i class="fa fa-tags"></i>', 'Transaction', 1, '4'),
	(4, '/administrator/pesanan', '3', 'B', '2', '<i class="fa fa-cart-arrow-down"></i>', 'Pesanan', 1, '1'),
	(5, '/administrator/pembayaran', '3', 'B', '2', '<i class="fa fa-credit-card"></i>', 'Pembayaran', 1, '2'),
	(6, '/administrator/pengiriman', '3', 'B', '2', '<i class="fa fa-gift"></i>', 'Pengiriman', 1, '3'),
	(8, '/administrator/master', '0', 'B', '1', '<i class="fa fa-certificate"></i>', 'Master', 1, '2'),
	(9, '/administrator/banner', '8', 'B', '2', '', 'Banner', 1, '1'),
	(10, '/administrator/about', '8', 'B', '2', '', 'About', 1, '2'),
	(11, '/administrator/faq', '8', 'B', '2', '', 'Faq', 1, '3'),
	(12, '/administrator/configmenu', '7', 'SA', '2', '<i class="fa fa-cogs text-red"></i>', 'Config Menu', 1, '1'),
	(13, '/administrator/configuser', '7', 'SA', '2', '<i class="fa fa-users text-aqua"></i>', 'Config User Admin', 1, '2'),
	(14, '/administrator/bank', '8', 'B', '2', NULL, 'Bank', 1, '0'),
	(15, '/administrator/configshop', '0', 'B', '1', '<i class="fa fa-cog"></i>', 'Config', 1, '4'),
	(19, '/administrator/customer', '0', 'B', '1', '<i class="fa fa-users"></i>', 'Customer', 1, '2'),
	(20, '/administrator/member', '19', 'B', '2', NULL, 'Member', 1, '0'),
	(21, '/administrator/nonmember', '19', 'B', '2', NULL, 'Non Member', 1, '0');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.migrations: ~17 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2018_02_12_060550_stokproducts', 1),
	(67, '2014_10_12_000000_create_users_table', 2),
	(68, '2014_10_12_100000_create_password_resets_table', 2),
	(69, '2018_02_12_060454_customers', 2),
	(70, '2018_02_12_060505_alamats', 2),
	(71, '2018_02_12_060517_categoryproducts', 2),
	(72, '2018_02_12_060526_detailproducts', 2),
	(73, '2018_02_12_060538_imageproducts', 2),
	(74, '2018_02_12_060603_logstocks', 2),
	(75, '2018_02_12_060947_menu', 2),
	(76, '2018_02_12_061016_usergroups', 2),
	(77, '2018_02_12_061017_groupdetails', 2),
	(78, '2018_02_12_061036_ts_hdtransaksi', 2),
	(79, '2018_02_12_061038_ts_dttransaksi', 2),
	(80, '2018_02_12_061058_ts_hdpayment', 2),
	(81, '2018_02_12_061106_ts_dtpayment', 2),
	(82, '2018_02_12_061115_useradmin', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.ms_bank
CREATE TABLE IF NOT EXISTS `ms_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namabank` varchar(250) NOT NULL,
  `infobank` varchar(250) NOT NULL,
  `logobank` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.ms_bank: ~2 rows (approximately)
/*!40000 ALTER TABLE `ms_bank` DISABLE KEYS */;
INSERT INTO `ms_bank` (`id`, `namabank`, `infobank`, `logobank`) VALUES
	(1, 'BANK BCA', 'Kcp. Johar Baru - a/n Muhamad Yasin 7000.350.308', 'public/bank/bca.jpg'),
	(2, 'BANK MANDIRI', 'Kcp. Mardani Raya - a/n LaraCommerce 8947.1654.321', 'public/bank/mandiri.jpg');
/*!40000 ALTER TABLE `ms_bank` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `name`, `deskripsi`) VALUES
	(1, 'Payment', '<img src="https://image.ibb.co/ga3KXn/howtopayment.png" width="100%" />');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.privacies
CREATE TABLE IF NOT EXISTS `privacies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.privacies: ~0 rows (approximately)
/*!40000 ALTER TABLE `privacies` DISABLE KEYS */;
INSERT INTO `privacies` (`id`, `name`, `deskripsi`) VALUES
	(1, 'Kebijakan dan Privasi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consequat sed libero ac blandit. Nullam eleifend non tellus sed luctus. Pellentesque dictum libero dolor, dignissim semper augue bibendum at. Phasellus enim lacus, laoreet sit amet leo sit amet, ornare porttitor orci. Donec ultricies quis ipsum id dapibus. Phasellus in justo dui. Nulla posuere justo in erat ultrices consectetur. Aliquam in orci massa. Proin nec fermentum justo, vel posuere lorem.</p>\r\n\r\n<p>Nullam quis ultricies lectus. Maecenas et ex lacinia, cursus purus at, porttitor erat. Nulla lobortis tortor non tortor varius laoreet. Suspendisse rutrum leo a urna posuere pulvinar. Etiam lacus massa, tincidunt ut neque eget, placerat dictum nisl. Nulla accumsan eget orci in rhoncus. Phasellus scelerisque, odio id lobortis rutrum, tellus neque dapibus metus, at semper elit metus at dui. Fusce quis sagittis justo. Morbi eget luctus dui. Etiam auctor risus mauris, sit amet suscipit elit facilisis nec. Aenean placerat velit a accumsan porttitor.</p>\r\n\r\n<p>Nulla faucibus pellentesque iaculis. Sed ut feugiat tortor, placerat malesuada nibh. Curabitur augue mi, dictum sit amet lorem eu, dictum porttitor lectus. Phasellus nec ex felis. Fusce lobortis risus a eros dignissim, rutrum interdum ipsum sollicitudin. Sed dictum est et metus pretium tincidunt. Curabitur in leo lectus. Vivamus dapibus nisi sit amet ligula laoreet, nec congue odio porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc at arcu consectetur velit pellentesque ullamcorper. Vivamus hendrerit justo nisl, at luctus lorem eleifend ut. Phasellus dapibus urna ut euismod vulputate. Vivamus cursus tincidunt varius.</p>\r\n\r\n<p>Donec ut augue sollicitudin augue scelerisque aliquam. Nullam id sapien ac velit eleifend pretium. Duis dapibus libero in lobortis fringilla. Maecenas aliquam imperdiet justo at venenatis. Suspendisse tellus ipsum, sagittis et tincidunt a, porttitor iaculis ante. In dapibus et diam sed mattis. Aliquam quis pulvinar quam, gravida luctus lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lorem nunc, vestibulum sed tortor vitae, tincidunt tristique nisi. Nulla faucibus, nisl non sollicitudin egestas, sem sapien blandit libero, ut imperdiet ante nisi ut lectus. Duis gravida massa a luctus consectetur. Aliquam luctus neque semper, sollicitudin ante id, aliquam nulla. Suspendisse ac mi bibendum, congue felis vel, accumsan magna. Curabitur sed felis cursus, ullamcorper velit et, viverra velit.</p>\r\n\r\n<p>Maecenas euismod quam at vulputate interdum. Maecenas ut pulvinar turpis, vel ultricies augue. Maecenas tellus leo, blandit a bibendum at, dignissim ut libero. Suspendisse sit amet lacus tellus. Suspendisse ut semper ipsum, sed aliquet ante. Aenean ut tincidunt arcu, vitae maximus ipsum. Vestibulum turpis libero, accumsan id risus eu, malesuada bibendum augue. Suspendisse gravida lectus eget turpis tempus convallis.</p>');
/*!40000 ALTER TABLE `privacies` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.tocs
CREATE TABLE IF NOT EXISTS `tocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lara_yasin.tocs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tocs` DISABLE KEYS */;
INSERT INTO `tocs` (`id`, `name`, `deskripsi`) VALUES
	(1, 'Syarat dan Ketentuan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consequat sed libero ac blandit. Nullam eleifend non tellus sed luctus. Pellentesque dictum libero dolor, dignissim semper augue bibendum at. Phasellus enim lacus, laoreet sit amet leo sit amet, ornare porttitor orci. Donec ultricies quis ipsum id dapibus. Phasellus in justo dui. Nulla posuere justo in erat ultrices consectetur. Aliquam in orci massa. Proin nec fermentum justo, vel posuere lorem.</p>\r\n\r\n<p>Nullam quis ultricies lectus. Maecenas et ex lacinia, cursus purus at, porttitor erat. Nulla lobortis tortor non tortor varius laoreet. Suspendisse rutrum leo a urna posuere pulvinar. Etiam lacus massa, tincidunt ut neque eget, placerat dictum nisl. Nulla accumsan eget orci in rhoncus. Phasellus scelerisque, odio id lobortis rutrum, tellus neque dapibus metus, at semper elit metus at dui. Fusce quis sagittis justo. Morbi eget luctus dui. Etiam auctor risus mauris, sit amet suscipit elit facilisis nec. Aenean placerat velit a accumsan porttitor.</p>\r\n\r\n<p>Nulla faucibus pellentesque iaculis. Sed ut feugiat tortor, placerat malesuada nibh. Curabitur augue mi, dictum sit amet lorem eu, dictum porttitor lectus. Phasellus nec ex felis. Fusce lobortis risus a eros dignissim, rutrum interdum ipsum sollicitudin. Sed dictum est et metus pretium tincidunt. Curabitur in leo lectus. Vivamus dapibus nisi sit amet ligula laoreet, nec congue odio porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc at arcu consectetur velit pellentesque ullamcorper. Vivamus hendrerit justo nisl, at luctus lorem eleifend ut. Phasellus dapibus urna ut euismod vulputate. Vivamus cursus tincidunt varius.</p>\r\n\r\n<p>Donec ut augue sollicitudin augue scelerisque aliquam. Nullam id sapien ac velit eleifend pretium. Duis dapibus libero in lobortis fringilla. Maecenas aliquam imperdiet justo at venenatis. Suspendisse tellus ipsum, sagittis et tincidunt a, porttitor iaculis ante. In dapibus et diam sed mattis. Aliquam quis pulvinar quam, gravida luctus lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lorem nunc, vestibulum sed tortor vitae, tincidunt tristique nisi. Nulla faucibus, nisl non sollicitudin egestas, sem sapien blandit libero, ut imperdiet ante nisi ut lectus. Duis gravida massa a luctus consectetur. Aliquam luctus neque semper, sollicitudin ante id, aliquam nulla. Suspendisse ac mi bibendum, congue felis vel, accumsan magna. Curabitur sed felis cursus, ullamcorper velit et, viverra velit.</p>\r\n\r\n<p>Maecenas euismod quam at vulputate interdum. Maecenas ut pulvinar turpis, vel ultricies augue. Maecenas tellus leo, blandit a bibendum at, dignissim ut libero. Suspendisse sit amet lacus tellus. Suspendisse ut semper ipsum, sed aliquet ante. Aenean ut tincidunt arcu, vitae maximus ipsum. Vestibulum turpis libero, accumsan id risus eu, malesuada bibendum augue. Suspendisse gravida lectus eget turpis tempus convallis.</p>');
/*!40000 ALTER TABLE `tocs` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.ts_dtpayment
CREATE TABLE IF NOT EXISTS `ts_dtpayment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ts_hdpayment_id` int(10) unsigned NOT NULL,
  `ts_dttransaksi_id` int(10) unsigned NOT NULL,
  `hargabayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ts_dtpayment_ts_hdpayment_id_foreign` (`ts_hdpayment_id`),
  KEY `FK_ts_dtpayment_ts_dttransaksi` (`ts_dttransaksi_id`),
  CONSTRAINT `FK_ts_dtpayment_ts_dttransaksi` FOREIGN KEY (`ts_dttransaksi_id`) REFERENCES `ts_dttransaksi` (`id`),
  CONSTRAINT `ts_dtpayment_ts_hdpayment_id_foreign` FOREIGN KEY (`ts_hdpayment_id`) REFERENCES `ts_hdpayment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.ts_dtpayment: ~15 rows (approximately)
/*!40000 ALTER TABLE `ts_dtpayment` DISABLE KEYS */;
INSERT INTO `ts_dtpayment` (`id`, `ts_hdpayment_id`, `ts_dttransaksi_id`, `hargabayar`, `created_at`, `updated_at`) VALUES
	(9, 7, 6, 250000, '2018-03-06 02:44:15', '2018-03-06 02:44:15'),
	(10, 8, 7, 280000, '2018-03-06 03:00:01', '2018-03-06 03:00:01'),
	(11, 9, 8, 199999, '2018-03-06 03:03:03', '2018-03-06 03:03:03'),
	(12, 10, 17, 199999, '2018-03-08 02:51:25', '2018-03-08 02:51:25'),
	(13, 10, 18, 250000, '2018-03-08 02:51:25', '2018-03-08 02:51:25'),
	(14, 11, 19, 250000, '2018-03-08 03:35:49', '2018-03-08 03:35:49'),
	(15, 12, 20, 180000, '2018-03-08 04:26:13', '2018-03-08 04:26:13'),
	(16, 13, 21, 199999, '2018-03-11 11:36:41', '2018-03-11 11:36:41'),
	(17, 13, 22, 200000, '2018-03-11 11:36:41', '2018-03-11 11:36:41'),
	(18, 14, 15, 200000, '2018-03-12 03:28:41', '2018-03-12 03:28:41'),
	(19, 15, 24, 199999, '2018-03-12 04:00:03', '2018-03-12 04:00:03'),
	(20, 15, 25, 180000, '2018-03-12 04:00:03', '2018-03-12 04:00:03'),
	(21, 16, 28, 1250000, '2018-03-12 04:33:39', '2018-03-12 04:33:39'),
	(22, 16, 29, 199999, '2018-03-12 04:33:39', '2018-03-12 04:33:39'),
	(23, 17, 30, 199999, '2018-03-12 04:40:26', '2018-03-12 04:40:26');
/*!40000 ALTER TABLE `ts_dtpayment` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.ts_dttransaksi
CREATE TABLE IF NOT EXISTS `ts_dttransaksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ts_hdtransaksi_id` int(10) unsigned NOT NULL,
  `detailproducts_id` int(10) unsigned NOT NULL,
  `jumlahpembelian` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ts_dttransaksi_ts_hdtransaksi_id_foreign` (`ts_hdtransaksi_id`),
  KEY `ts_dttransaksi_detailproducts_id_foreign` (`detailproducts_id`),
  CONSTRAINT `ts_dttransaksi_detailproducts_id_foreign` FOREIGN KEY (`detailproducts_id`) REFERENCES `detailproducts` (`id`),
  CONSTRAINT `ts_dttransaksi_ts_hdtransaksi_id_foreign` FOREIGN KEY (`ts_hdtransaksi_id`) REFERENCES `ts_hdtransaksi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.ts_dttransaksi: ~24 rows (approximately)
/*!40000 ALTER TABLE `ts_dttransaksi` DISABLE KEYS */;
INSERT INTO `ts_dttransaksi` (`id`, `ts_hdtransaksi_id`, `detailproducts_id`, `jumlahpembelian`, `harga`, `created_at`, `updated_at`) VALUES
	(6, 5, 6, 1, 250000, '2018-03-06 02:44:07', '2018-03-06 02:44:07'),
	(7, 6, 2, 1, 280000, '2018-03-06 02:59:44', '2018-03-06 02:59:44'),
	(8, 7, 5, 1, 199999, '2018-03-06 03:02:55', '2018-03-06 03:02:55'),
	(9, 8, 6, 1, 250000, '2018-03-07 09:40:00', '2018-03-07 09:40:00'),
	(10, 9, 6, 1, 250000, '2018-03-08 02:08:05', '2018-03-08 02:08:05'),
	(11, 10, 6, 1, 250000, '2018-03-08 02:24:21', '2018-03-08 02:24:21'),
	(12, 11, 1, 1, 200000, '2018-03-08 02:28:20', '2018-03-08 02:28:20'),
	(13, 12, 1, 1, 200000, '2018-03-08 02:31:09', '2018-03-08 02:31:09'),
	(14, 13, 2, 1, 280000, '2018-03-08 02:33:52', '2018-03-08 02:33:52'),
	(15, 14, 1, 1, 200000, '2018-03-08 02:35:31', '2018-03-08 02:35:31'),
	(16, 15, 6, 1, 250000, '2018-03-08 02:36:43', '2018-03-08 02:36:43'),
	(17, 16, 5, 2, 199999, '2018-03-08 02:40:41', '2018-03-08 02:40:41'),
	(18, 16, 6, 1, 250000, '2018-03-08 02:40:41', '2018-03-08 02:40:41'),
	(19, 17, 6, 1, 250000, '2018-03-08 03:35:35', '2018-03-08 03:35:35'),
	(20, 18, 4, 1, 180000, '2018-03-08 04:25:37', '2018-03-08 04:25:37'),
	(21, 19, 5, 2, 199999, '2018-03-11 11:36:24', '2018-03-11 11:36:24'),
	(22, 19, 1, 1, 200000, '2018-03-11 11:36:24', '2018-03-11 11:36:24'),
	(23, 20, 8, 1, 1500000, '2018-03-12 02:15:30', '2018-03-12 02:15:30'),
	(24, 21, 5, 1, 199999, '2018-03-12 03:59:50', '2018-03-12 03:59:50'),
	(25, 21, 4, 1, 180000, '2018-03-12 03:59:50', '2018-03-12 03:59:50'),
	(26, 22, 7, 1, 800000, '2018-03-12 04:07:44', '2018-03-12 04:07:44'),
	(27, 22, 9, 1, 1250000, '2018-03-12 04:07:44', '2018-03-12 04:07:44'),
	(28, 23, 9, 1, 1250000, '2018-03-12 04:32:56', '2018-03-12 04:32:56'),
	(29, 23, 5, 1, 199999, '2018-03-12 04:32:56', '2018-03-12 04:32:56'),
	(30, 24, 5, 1, 199999, '2018-03-12 04:37:14', '2018-03-12 04:37:14'),
	(31, 25, 4, 1, 180000, '2018-03-12 07:14:36', '2018-03-12 07:14:36');
/*!40000 ALTER TABLE `ts_dttransaksi` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.ts_hdpayment
CREATE TABLE IF NOT EXISTS `ts_hdpayment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ts_hdtransaksi_id` int(10) unsigned NOT NULL,
  `id_bank` int(11) NOT NULL,
  `namapayment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankpayment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomorpayment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipepayment` tinyint(4) DEFAULT NULL COMMENT '1 = Transfer, 2 = Kartu Kredit',
  `statuspayment` int(11) NOT NULL COMMENT '0 = Konfirmasi, 1 = Dibayar, 2 = Proses Kirim, 3 = Kirim, 4 = Diterima, 5 = Ditolak',
  `totalpayment` int(11) NOT NULL,
  `totaldiskon` int(11) NOT NULL,
  `tanggalpayment` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ts_hdpayment_ts_hdtransaksi_id_foreign` (`ts_hdtransaksi_id`),
  KEY `FK_ts_hdpayment_ms_bank` (`id_bank`),
  CONSTRAINT `FK_ts_hdpayment_ms_bank` FOREIGN KEY (`id_bank`) REFERENCES `ms_bank` (`id`),
  CONSTRAINT `ts_hdpayment_ts_hdtransaksi_id_foreign` FOREIGN KEY (`ts_hdtransaksi_id`) REFERENCES `ts_hdtransaksi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.ts_hdpayment: ~9 rows (approximately)
/*!40000 ALTER TABLE `ts_hdpayment` DISABLE KEYS */;
INSERT INTO `ts_hdpayment` (`id`, `ts_hdtransaksi_id`, `id_bank`, `namapayment`, `bankpayment`, `nomorpayment`, `tipepayment`, `statuspayment`, `totalpayment`, `totaldiskon`, `tanggalpayment`) VALUES
	(7, 5, 1, 'yasin', 'BCA', '7000350308', 1, 4, 250000, 0, '2018-03-06'),
	(8, 6, 1, 'yasin', 'BCA', '7000350308', 1, 3, 280000, 0, '2018-03-06'),
	(9, 7, 2, 'yasin', 'BCA', '7000350308', 1, 4, 199999, 0, '2018-03-06'),
	(10, 16, 1, 'yasin', 'BCA', '7000350308', 1, 3, 798498, 0, '2018-03-08'),
	(11, 17, 2, 'yasin', 'BCA', '7000350308', 1, 3, 268000, 0, '2018-03-08'),
	(12, 18, 2, 'yasin', 'BCA', '7000350308', 1, 5, 189000, 0, '2018-03-08'),
	(13, 19, 1, 'azis', 'mahfudin', '989282222', 1, 3, 715998, 0, '2018-03-11'),
	(14, 14, 1, NULL, NULL, NULL, NULL, 2, 217000, 0, '2018-03-12'),
	(15, 21, 1, 'herman', 'sitompul', '8728222222', 1, 3, 406999, 0, '2018-03-12'),
	(16, 23, 1, 'yasin', 'bca', '089829822', 1, 0, 1476999, 0, '2018-03-12'),
	(17, 24, 1, 'test', 'bca', '9280944', 1, 0, 215999, 0, '2018-03-12');
/*!40000 ALTER TABLE `ts_hdpayment` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.ts_hdtransaksi
CREATE TABLE IF NOT EXISTS `ts_hdtransaksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `alamat` int(11) unsigned DEFAULT NULL,
  `totaldiskon` int(11) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `statuspembelian` tinyint(1) NOT NULL COMMENT '0 = Belum dibayar, 1 = Konfirmasi, 2 =Disetujui, 3 = Proses Kirim, 4 = Dikirim, 5 = Diterima, 6 = Ditolak',
  `tanggaltransaksi` date NOT NULL,
  `totalpembelian` int(11) NOT NULL,
  `totalongkir` int(11) NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `kurir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurirpaket` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noresi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ts_hdtransaksi_customer_id_foreign` (`customer_id`),
  KEY `FK_ts_hdtransaksi_alamats` (`alamat`),
  CONSTRAINT `FK_ts_hdtransaksi_alamats` FOREIGN KEY (`alamat`) REFERENCES `alamats` (`id`),
  CONSTRAINT `ts_hdtransaksi_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.ts_hdtransaksi: ~18 rows (approximately)
/*!40000 ALTER TABLE `ts_hdtransaksi` DISABLE KEYS */;
INSERT INTO `ts_hdtransaksi` (`id`, `customer_id`, `alamat`, `totaldiskon`, `totalberat`, `statuspembelian`, `tanggaltransaksi`, `totalpembelian`, `totalongkir`, `catatan`, `kurir`, `kurirpaket`, `noresi`, `created_at`, `updated_at`) VALUES
	(5, 7, 11, 0, 0, 3, '2018-03-06', 250000, 0, NULL, NULL, NULL, '123456789', '2018-03-06 02:44:07', '2018-03-06 03:54:33'),
	(6, 7, 11, 0, 0, 2, '2018-03-06', 280000, 0, NULL, NULL, NULL, '5451421213', '2018-03-06 02:59:44', '2018-03-06 03:54:45'),
	(7, 7, 11, 0, 0, 3, '2018-03-06', 199999, 0, NULL, NULL, NULL, '0', '2018-03-06 03:02:55', '2018-03-06 03:13:35'),
	(8, 7, 18, 0, 2, 0, '2018-03-07', 250000, 86000, NULL, 'pos', 'CTC', '0', '2018-03-07 09:40:00', '2018-03-07 09:40:00'),
	(9, 7, 19, 0, 2, 0, '2018-03-08', 286000, 36000, NULL, 'pos', 'CTC', '0', '2018-03-08 02:08:05', '2018-03-08 02:08:05'),
	(10, 7, 20, 0, 2, 0, '2018-03-08', 286000, 36000, NULL, 'jne', 'CTCYES', '0', '2018-03-08 02:24:21', '2018-03-08 02:24:21'),
	(11, 7, 21, 0, 2, 0, '2018-03-08', 236000, 36000, NULL, 'pos', 'Express Next Day Barang', '0', '2018-03-08 02:28:20', '2018-03-08 02:28:20'),
	(12, 7, 22, 0, 2, 0, '2018-03-08', 236000, 36000, NULL, 'pos', 'Paketpos Dangerous Goods', '0', '2018-03-08 02:31:09', '2018-03-08 02:31:09'),
	(13, 7, 23, 0, 2, 0, '2018-03-08', 297000, 17000, NULL, 'pos', 'Paket Kilat Khusus', '0', '2018-03-08 02:33:52', '2018-03-08 02:33:52'),
	(14, 7, 24, 0, 2, 3, '2018-03-08', 217000, 17000, NULL, 'pos', 'Paket Kilat Khusus', '0', '2018-03-08 02:35:31', '2018-03-12 04:20:46'),
	(15, 7, 25, 0, 2, 0, '2018-03-08', 267000, 17000, NULL, 'pos', 'Paket Kilat Khusus', '0', '2018-03-08 02:36:43', '2018-03-08 02:36:43'),
	(16, 7, 26, 0, 3, 2, '2018-03-08', 798498, 148500, NULL, 'pos', 'Paket Kilat Khusus', '1234567891', '2018-03-08 02:40:41', '2018-03-08 03:06:32'),
	(17, 7, 27, 0, 2, 2, '2018-03-08', 268000, 18000, NULL, 'jne', 'CTC', '516511323212', '2018-03-08 03:35:35', '2018-03-08 04:31:52'),
	(18, 7, 17, 0, 1, 6, '2018-03-08', 189000, 9000, 'Pembayaran tidak sesuai.', 'jne', 'CTC', '0', '2018-03-08 04:25:37', '2018-03-08 04:57:08'),
	(19, 46, 28, 0, 4, 2, '2018-03-11', 715998, 116000, NULL, 'jne', 'OKE', '875983474938', '2018-03-11 11:36:24', '2018-03-12 04:25:02'),
	(20, 7, 29, 0, 1, 0, '2018-03-12', 1509000, 9000, NULL, 'jne', 'CTC', '0', '2018-03-12 02:15:30', '2018-03-12 02:15:30'),
	(21, 47, 30, 0, 3, 4, '2018-03-12', 406999, 27000, NULL, 'jne', 'CTC', '873498237493', '2018-03-12 03:59:50', '2018-03-12 04:26:45'),
	(22, 47, 31, 0, 3, 0, '2018-03-12', 2074000, 24000, NULL, 'jne', 'OKE', '0', '2018-03-12 04:07:44', '2018-03-12 04:07:44'),
	(23, 7, 21, 0, 3, 1, '2018-03-12', 1476999, 27000, NULL, 'jne', 'CTC', '0', '2018-03-12 04:32:56', '2018-03-12 04:33:39'),
	(24, 48, 32, 0, 2, 1, '2018-03-12', 215999, 16000, NULL, 'jne', 'OKE', '0', '2018-03-12 04:37:14', '2018-03-12 04:40:26'),
	(25, 7, 25, 0, 1, 0, '2018-03-12', 189000, 9000, NULL, 'jne', 'CTC', '0', '2018-03-12 07:14:36', '2018-03-12 07:14:36');
/*!40000 ALTER TABLE `ts_hdtransaksi` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.useradmin
CREATE TABLE IF NOT EXISTS `useradmin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usergroups_id` int(10) unsigned NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useradmin_email_unique` (`email`),
  KEY `useradmin_usergroups_id_foreign` (`usergroups_id`),
  CONSTRAINT `useradmin_usergroups_id_foreign` FOREIGN KEY (`usergroups_id`) REFERENCES `usergroups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.useradmin: ~3 rows (approximately)
/*!40000 ALTER TABLE `useradmin` DISABLE KEYS */;
INSERT INTO `useradmin` (`id`, `usergroups_id`, `email`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'yasin@kangyasin.com', 'kangyasin', '$2y$10$5mprMm0nK7Y4kGr602T0jOQC4Czyp4o8aaLOOHSBIGYBJI2x/PIqG', 'BcqkxZA3PHyy82jsLUXyMIrA7LfZqwfbTnXaxdnYk9m01cI3O389iZVhNBjx', '2018-02-13 08:15:10', '2018-02-13 08:15:10'),
	(2, 2, 'admin@kangyasin.com', 'admin', '$2y$10$yXmbCRnew7TIyLtfGfEPwO2D5tgFSDF6IQKe9ta8C6oqCLeqla.sS', '6VqaT0sg4Omyr66d3o8zAoizEfKu5hicIqLscJEbJrSFtkjINHpGmdd2roiz', NULL, NULL),
	(3, 2, 'test@kangyasin.com', 'texst', '$2y$10$53yTGwHZ614k8.vduY/nSOS0CySSYXi/yeTYp31kFgvnzq5pXdjTO', NULL, NULL, NULL);
/*!40000 ALTER TABLE `useradmin` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.usergroups
CREATE TABLE IF NOT EXISTS `usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namagroup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.usergroups: ~2 rows (approximately)
/*!40000 ALTER TABLE `usergroups` DISABLE KEYS */;
INSERT INTO `usergroups` (`id`, `namagroup`) VALUES
	(1, 'super admin'),
	(2, 'admin sistem'),
	(3, 'Finance');
/*!40000 ALTER TABLE `usergroups` ENABLE KEYS */;

-- Dumping structure for table lara_yasin.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lara_yasin.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
