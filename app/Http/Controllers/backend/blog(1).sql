-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 04:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vacancy_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `job_description` text COLLATE utf8_unicode_ci NOT NULL,
  `qualifications` text COLLATE utf8_unicode_ci NOT NULL,
  `experiences` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(2, 1, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(3, 1, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(4, 1, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(5, 1, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(6, 2, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(7, 2, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(8, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(9, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(10, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `area_translations`
--

CREATE TABLE `area_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area_translations`
--

INSERT INTO `area_translations` (`id`, `title`, `slug`, `lang`, `area_id`) VALUES
(1, 'Zamalek', 'zamalek', 'en', 1),
(2, 'الزمالك', 'الزمالك', 'ar', 1),
(3, 'Maadi', 'maadi', 'en', 2),
(4, 'المعادي', 'المعادي', 'ar', 2),
(5, 'Heliopolis', 'heliopolis', 'en', 3),
(6, 'مصر الجديده', 'مصر-الجديده', 'ar', 3),
(7, 'Nasr City', 'nasr-city', 'en', 4),
(8, 'مدينة نصر', 'مدينة-نصر', 'ar', 4),
(9, 'New Cairo', 'New Cairo', 'en', 5),
(10, 'القاهرة الجديده', 'القاهرة-الجديده', 'ar', 5),
(11, 'Borg Al Arab', 'borg-al-arab', 'en', 6),
(12, 'برج العرب', 'برج-العرب', 'ar', 6),
(13, 'Smoha', 'smoha', 'en', 7),
(14, 'سموحه', 'سموحه', 'ar', 7),
(15, '6th of October City', '6th-of-october-city', 'en', 8),
(16, 'السادس من أكتوبر', 'السادس-من-أكتوبر', 'ar', 8),
(17, 'Sheikh Zayed', 'sheikh-zayed', 'en', 9),
(18, 'الشيخ زايد', 'الشيخ-زايد', 'ar', 9),
(19, 'Agouza', 'agouza', 'en', 10),
(20, 'العجوزة', 'العجوزة', 'ar', 10);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frontend_type` enum('select','radio','text','text_area') COLLATE utf8_unicode_ci NOT NULL,
  `is_filterable` tinyint(1) NOT NULL DEFAULT 0,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `published`, `created_at`, `updated_at`) VALUES
(1, 'uploads/banners/1.jpg', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, 'uploads/banners/2.jpg', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, 'uploads/banners/3.jpg', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, 'uploads/banners/4.jpg', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, 'uploads/banners/5.jpg', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `banner_translations`
--

CREATE TABLE `banner_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner_translations`
--

INSERT INTO `banner_translations` (`id`, `title`, `description`, `lang`, `banner_id`) VALUES
(1, 'Banner1', 'Lorem ipsum, or lipsum as it is sometimes known', 'en', 1),
(2, 'بنر 1', 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل', 'ar', 1),
(3, 'Banner2', 'Lorem ipsum, or lipsum as it is sometimes known', 'en', 2),
(4, 'بنر 2', 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل', 'ar', 2),
(5, 'Banner3', 'Lorem ipsum, or lipsum as it is sometimes known', 'en', 3),
(6, 'بنر 3', 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل', 'ar', 3),
(7, 'Banner4', 'Lorem ipsum, or lipsum as it is sometimes known', 'en', 4),
(8, 'بنر 4', 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل', 'ar', 4),
(9, 'Banner5', 'Lorem ipsum, or lipsum as it is sometimes known', 'en', 5),
(10, 'بنر 5', 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل', 'ar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `published`, `created_at`, `updated_at`) VALUES
(1, 'uploads/brands/adidas.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, 'uploads/brands/nike.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, 'uploads/brands/kappa.png', '0', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, 'uploads/brands/prada.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, 'uploads/brands/hermes.png', '0', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(6, NULL, '0', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(7, NULL, '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `title`, `slug`, `description`, `meta_title`, `meta_description`, `lang`, `brand_id`) VALUES
(1, 'Adidas', 'adidas', NULL, NULL, NULL, 'en', 1),
(2, 'أديداس', 'أديداس', NULL, NULL, NULL, 'ar', 1),
(3, 'Nike', 'nike', NULL, NULL, NULL, 'en', 2),
(4, 'نايك', 'نايك', NULL, NULL, NULL, 'ar', 2),
(5, 'Kappa', 'kappa', NULL, NULL, NULL, 'en', 3),
(6, 'كابا', 'كابا', NULL, NULL, NULL, 'ar', 3),
(7, 'Prada', 'prada', NULL, NULL, NULL, 'en', 4),
(8, 'برادا ', 'برادا ', NULL, NULL, NULL, 'ar', 4),
(9, 'Hermes', 'hermes', NULL, NULL, NULL, 'en', 5),
(10, 'هيرميس', 'هيرميس', NULL, NULL, NULL, 'ar', 5),
(11, 'H&M', 'h-m', NULL, NULL, NULL, 'en', 6),
(12, 'اتش اند ام', 'اتش-اند-ام', NULL, NULL, NULL, 'ar', 6),
(13, 'C&CO', 'c-co', NULL, NULL, NULL, 'en', 7),
(14, 'سى اند كو', 'سى-اند-كو', NULL, NULL, NULL, 'ar', 7);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(2, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(3, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(4, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(5, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(6, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(7, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(8, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(9, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(10, 62, '2022-10-26 14:38:35', '2022-10-26 14:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `title`, `slug`, `lang`, `city_id`) VALUES
(1, 'Cairo', 'cairo', 'en', 1),
(2, 'القاهرة', 'القاهرة', 'ar', 1),
(3, 'Alexandria', 'alexandria', 'en', 2),
(4, 'الإسكندرية', 'الإسكندرية', 'ar', 2),
(5, 'Gizeh', 'gizeh', 'en', 3),
(6, 'الجيزة', 'الجيزة', 'ar', 3),
(7, 'Port Said', 'port-said', 'en', 4),
(8, 'بور سعيد', 'بور سعيد', 'ar', 4),
(9, 'Suez', 'Suez', 'en', 5),
(10, 'السويس', 'السويس', 'ar', 5),
(11, 'Luxor', 'luxor', 'en', 6),
(12, 'الأقصر', 'الأقصر', 'ar', 6),
(13, 'Asyut', 'asyut', 'en', 7),
(14, 'أسيوط', 'أسيوط', 'ar', 7),
(15, 'Qena', 'qena', 'en', 8),
(16, 'قنا', 'قنا', 'ar', 8),
(17, 'Arish', 'arish', 'en', 9),
(18, 'العريش', 'العريش', 'ar', 9),
(19, 'Zagazig', 'zagazig', 'en', 10),
(20, 'الزقازيق', 'الزقازيق', 'ar', 10);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `published`, `created_at`, `updated_at`) VALUES
(1, 'uploads/clients/adidas.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, 'uploads/clients/nike.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, 'uploads/clients/kappa.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, 'uploads/clients/prada.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, 'uploads/clients/hermes.png', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `client_translations`
--

CREATE TABLE `client_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_translations`
--

INSERT INTO `client_translations` (`id`, `title`, `slug`, `description`, `lang`, `client_id`) VALUES
(1, 'Adidas', 'adidas', NULL, 'en', 1),
(2, 'أديداس', 'أديداس', NULL, 'ar', 1),
(3, 'Nike', 'nike', NULL, 'en', 2),
(4, 'نايك', 'نايك', NULL, 'ar', 2),
(5, 'Kappa', 'kappa', NULL, 'en', 3),
(6, 'كابا', 'كابا', NULL, 'ar', 3),
(7, 'Prada', 'prada', NULL, 'en', 4),
(8, 'برادا ', 'برادا ', NULL, 'ar', 4),
(9, 'Hermes', 'hermes', NULL, 'en', 5),
(10, 'هيرميس', 'هيرميس', NULL, 'ar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `comment_product`
--

CREATE TABLE `comment_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_recipe`
--

CREATE TABLE `comment_recipe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_recipe`
--

INSERT INTO `comment_recipe` (`id`, `comment`, `rate`, `user_id`, `recipe_id`, `created_at`, `updated_at`) VALUES
(1, 'Good recipe i like it much', 1, 1, 1, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, 'sorry i dont like it', 1, 1, 2, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, 'Not bad for me', 1, 2, 2, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, 'greate recipe i like', 1, 3, 3, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, 'very bad recipe', 1, 2, 4, '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_en`, `title_ar`, `code`, `flag`) VALUES
(1, 'Afghanistan', 'أفغانستان', 'AF', NULL),
(2, 'Albania', 'ألبانيا', 'AL', NULL),
(3, 'Algeria', 'الجزائر', 'DZ', NULL),
(4, 'American S', '', 'DS', NULL),
(5, 'Andorra', 'أندورا', 'AD', NULL),
(6, 'Angola', 'أنجولا', 'AO', NULL),
(7, 'Anguilla', 'أنجويلا', 'AI', NULL),
(8, 'Antarctica', 'القطب الجنوبي', 'AQ', NULL),
(9, 'Antigua an', 'أنتيجوا وبربودا', 'AG', NULL),
(10, 'Argentina', 'الأرجنتين', 'AR', NULL),
(11, 'Armenia', 'أرمينيا', 'AM', NULL),
(12, 'Aruba', 'آروبا', 'AW', NULL),
(13, 'Australia', 'أستراليا', 'AU', NULL),
(14, 'Austria', 'النمسا', 'AT', NULL),
(15, 'Azerbaijan', 'أذربيجان', 'AZ', NULL),
(16, 'Bahamas', 'الباهاما', 'BS', NULL),
(17, 'Bahrain', 'البحرين', 'BH', NULL),
(18, 'Bangladesh', 'بنجلاديش', 'BD', NULL),
(19, 'Barbados', 'بربادوس', 'BB', NULL),
(20, 'Belarus', 'روسيا البيضاء', 'BY', NULL),
(21, 'Belgium', 'بلجيكا', 'BE', NULL),
(22, 'Belize', 'بليز', 'BZ', NULL),
(23, 'Benin', 'بنين', 'BJ', NULL),
(24, 'Bermuda', 'برمودا', 'BM', NULL),
(25, 'Bhutan', 'بوتان', 'BT', NULL),
(26, 'Bolivia', 'بوليفيا', 'BO', NULL),
(27, 'Bosnia and', 'البوسنة والهرسك', 'BA', NULL),
(28, 'Botswana', 'بتسوانا', 'BW', NULL),
(29, 'Bouvet Isl', 'جزيرة بوفيه', 'BV', NULL),
(30, 'Brazil', 'البرازيل', 'BR', NULL),
(31, 'British In', 'المحيط الهندي البريطاني', 'IO', NULL),
(32, 'Brunei Dar', 'بروناي', 'BN', NULL),
(33, 'Bulgaria', 'بلغاريا', 'BG', NULL),
(34, 'Burkina Fa', 'بوركينا فاسو', 'BF', NULL),
(35, 'Burundi', 'بوروندي', 'BI', NULL),
(36, 'Cambodia', 'كمبوديا', 'KH', NULL),
(37, 'Cameroon', 'الكاميرون', 'CM', NULL),
(38, 'Canada', 'كندا', 'CA', NULL),
(39, 'Cape Verde', 'الرأس الأخضر', 'CV', NULL),
(40, 'Cayman Isl', 'جزر الكايمن', 'KY', NULL),
(41, 'Central Af', 'جمهورية افريقيا الوسطى', 'CF', NULL),
(42, 'Chad', 'تشاد', 'TD', NULL),
(43, 'Chile', 'شيلي', 'CL', NULL),
(44, 'China', 'الصين', 'CN', NULL),
(45, 'Christmas ', 'جزيرة الكريسماس', 'CX', NULL),
(46, 'Cocos (Kee', 'جزر كوكوس', 'CC', NULL),
(47, 'Colombia', 'كولومبيا', 'CO', NULL),
(48, 'Comoros', 'جزر القمر', 'KM', NULL),
(49, 'Congo', 'الكونغو - برازافيل', 'CG', NULL),
(50, 'Cook Islan', 'جزر كوك', 'CK', NULL),
(51, 'Costa Rica', 'كوستاريكا', 'CR', NULL),
(52, 'Croatia (H', 'كرواتيا', 'HR', NULL),
(53, 'Cuba', 'كوبا', 'CU', NULL),
(54, 'Cyprus', 'قبرص', 'CY', NULL),
(55, 'Czech Repu', 'جمهورية التشيك', 'CZ', NULL),
(56, 'Denmark', 'الدانمرك', 'DK', NULL),
(57, 'Djibouti', 'جيبوتي', 'DJ', NULL),
(58, 'Dominica', 'دومينيكا', 'DM', NULL),
(59, 'Dominican ', 'جمهورية الدومينيك', 'DO', NULL),
(60, 'East Timor', '', 'TP', NULL),
(61, 'Ecuador', 'الاكوادور', 'EC', NULL),
(62, 'Egypt', 'مصر', 'EG', 'uploads/flags/eg.svg'),
(63, 'El Salvado', 'السلفادور', 'SV', NULL),
(64, 'Equatorial', 'غينيا الاستوائية', 'GQ', NULL),
(65, 'Eritrea', 'اريتريا', 'ER', NULL),
(66, 'Estonia', 'استونيا', 'EE', NULL),
(67, 'Ethiopia', 'اثيوبيا', 'ET', NULL),
(68, 'Falkland I', 'جزر فوكلاند', 'FK', NULL),
(69, 'Faroe Isla', 'جزر فارو', 'FO', NULL),
(70, 'Fiji', 'فيجي', 'FJ', NULL),
(71, 'Finland', 'فنلندا', 'FI', NULL),
(72, 'France', 'فرنسا', 'FR', NULL),
(73, 'France, Me', '', 'FX', NULL),
(74, 'French Gui', 'غويانا', 'GF', NULL),
(75, 'French Pol', 'بولينيزيا الفرنسية', 'PF', NULL),
(76, 'French Sou', 'المقاطعات الجنوبية الفرنسية', 'TF', NULL),
(77, 'Gabon', 'الجابون', 'GA', NULL),
(78, 'Gambia', 'غامبيا', 'GM', NULL),
(79, 'Georgia', 'جورجيا', 'GE', NULL),
(80, 'Germany', 'ألمانيا', 'DE', NULL),
(81, 'Ghana', 'غانا', 'GH', NULL),
(82, 'Gibraltar', 'جبل طارق', 'GI', NULL),
(83, 'Guernsey', '', 'GK', NULL),
(84, 'Greece', 'اليونان', 'GR', NULL),
(85, 'Greenland', 'جرينلاند', 'GL', NULL),
(86, 'Grenada', 'جرينادا', 'GD', NULL),
(87, 'Guadeloupe', 'جوادلوب', 'GP', NULL),
(88, 'Guam', 'جوام', 'GU', NULL),
(89, 'Guatemala', 'جواتيمالا', 'GT', NULL),
(90, 'Guinea', 'غينيا', 'GN', NULL),
(91, 'Guinea-Bis', 'غينيا بيساو', 'GW', NULL),
(92, 'Guyana', 'غيانا', 'GY', NULL),
(93, 'Haiti', 'هايتي', 'HT', NULL),
(94, 'Heard and ', 'جزيرة هيرد وماكدونالد', 'HM', NULL),
(95, 'Honduras', 'هندوراس', 'HN', NULL),
(96, 'Hong Kong', 'هونج كونج الصينية', 'HK', NULL),
(97, 'Hungary', 'المجر', 'HU', NULL),
(98, 'Iceland', 'أيسلندا', 'IS', NULL),
(99, 'India', 'الهند', 'IN', NULL),
(100, 'Isle of Ma', 'جزيرة مان', 'IM', NULL),
(101, 'Indonesia', 'اندونيسيا', 'ID', NULL),
(102, 'Iran (Isla', 'ايران', 'IR', NULL),
(103, 'Iraq', 'العراق', 'IQ', NULL),
(104, 'Ireland', 'أيرلندا', 'IE', NULL),
(105, 'Italy', 'ايطاليا', 'IT', NULL),
(106, 'Ivory Coas', 'ساحل العاج', 'CI', NULL),
(107, 'Jersey', 'جيرسي', 'JE', NULL),
(108, 'Jamaica', 'جامايكا', 'JM', NULL),
(109, 'Japan', 'اليابان', 'JP', NULL),
(110, 'Jordan', 'الأردن', 'JO', NULL),
(111, 'Kazakhstan', 'كازاخستان', 'KZ', NULL),
(112, 'Kenya', 'كينيا', 'KE', NULL),
(113, 'Kiribati', 'كيريباتي', 'KI', NULL),
(114, 'Korea, Dem', 'كوريا الشمالية', 'KP', NULL),
(115, 'Korea, Rep', 'كوريا الجنوبية', 'KR', NULL),
(116, 'Kosovo', '', 'XK', NULL),
(117, 'Kuwait', 'الكويت', 'KW', NULL),
(118, 'Kyrgyzstan', 'قرغيزستان', 'KG', NULL),
(119, 'Lao People', 'لاوس', 'LA', NULL),
(120, 'Latvia', 'لاتفيا', 'LV', NULL),
(121, 'Lebanon', 'لبنان', 'LB', NULL),
(122, 'Lesotho', 'ليسوتو', 'LS', NULL),
(123, 'Liberia', 'ليبيريا', 'LR', NULL),
(124, 'Libyan Ara', 'ليبيا', 'LY', NULL),
(125, 'Liechtenst', 'ليختنشتاين', 'LI', NULL),
(126, 'Lithuania', 'ليتوانيا', 'LT', NULL),
(127, 'Luxembourg', 'لوكسمبورج', 'LU', NULL),
(128, 'Macau', 'ماكاو الصينية', 'MO', NULL),
(129, 'Macedonia', 'مقدونيا', 'MK', NULL),
(130, 'Madagascar', 'مدغشقر', 'MG', NULL),
(131, 'Malawi', 'ملاوي', 'MW', NULL),
(132, 'Malaysia', 'ماليزيا', 'MY', NULL),
(133, 'Maldives', 'جزر الملديف', 'MV', NULL),
(134, 'Mali', 'مالي', 'ML', NULL),
(135, 'Malta', 'مالطا', 'MT', NULL),
(136, 'Marshall I', 'جزر المارشال', 'MH', NULL),
(137, 'Martinique', 'مارتينيك', 'MQ', NULL),
(138, 'Mauritania', 'موريتانيا', 'MR', NULL),
(139, 'Mauritius', 'موريشيوس', 'MU', NULL),
(140, 'Mayotte', '', 'TY', NULL),
(141, 'Mexico', 'المكسيك', 'MX', NULL),
(142, 'Micronesia', 'ميكرونيزيا', 'FM', NULL),
(143, 'Moldova, R', 'مولدافيا', 'MD', NULL),
(144, 'Monaco', 'موناكو', 'MC', NULL),
(145, 'Mongolia', 'منغوليا', 'MN', NULL),
(146, 'Montenegro', 'الجبل الأسود', 'ME', NULL),
(147, 'Montserrat', 'مونتسرات', 'MS', NULL),
(148, 'Morocco', 'المغرب', 'MA', NULL),
(149, 'Mozambique', 'موزمبيق', 'MZ', NULL),
(150, 'Myanmar', 'ميانمار', 'MM', NULL),
(151, 'Namibia', 'ناميبيا', 'NA', NULL),
(152, 'Nauru', 'نورو', 'NR', NULL),
(153, 'Nepal', 'نيبال', 'NP', NULL),
(154, 'Netherland', 'هولندا', 'NL', NULL),
(155, 'Netherland', 'جزر الأنتيل الهولندية', 'AN', NULL),
(156, 'New Caledo', 'كاليدونيا الجديدة', 'NC', NULL),
(157, 'New Zealan', 'نيوزيلاندا', 'NZ', NULL),
(158, 'Nicaragua', 'نيكاراجوا', 'NI', NULL),
(159, 'Niger', 'النيجر', 'NE', NULL),
(160, 'Nigeria', 'نيجيريا', 'NG', NULL),
(161, 'Niue', 'نيوي', 'NU', NULL),
(162, 'Norfolk Is', 'جزيرة نورفوك', 'NF', NULL),
(163, 'Northern M', 'جزر ماريانا الشمالية', 'MP', NULL),
(164, 'Norway', 'النرويج', 'NO', NULL),
(165, 'Oman', 'عمان', 'OM', NULL),
(166, 'Pakistan', 'باكستان', 'PK', NULL),
(167, 'Palau', 'بالاو', 'PW', NULL),
(168, 'Palestine', 'فلسطين', 'PS', NULL),
(169, 'Panama', 'بنما', 'PA', NULL),
(170, 'Papua New ', 'بابوا غينيا الجديدة', 'PG', NULL),
(171, 'Paraguay', 'باراجواي', 'PY', NULL),
(172, 'Peru', 'بيرو', 'PE', NULL),
(173, 'Philippine', 'الفيلبين', 'PH', NULL),
(174, 'Pitcairn', 'بتكايرن', 'PN', NULL),
(175, 'Poland', 'بولندا', 'PL', NULL),
(176, 'Portugal', 'البرتغال', 'PT', NULL),
(177, 'Puerto Ric', 'بورتوريكو', 'PR', NULL),
(178, 'Qatar', 'قطر', 'QA', NULL),
(179, 'Reunion', 'روينيون', 'RE', NULL),
(180, 'Romania', 'رومانيا', 'RO', NULL),
(181, 'Russian Fe', 'روسيا', 'RU', NULL),
(182, 'Rwanda', 'رواندا', 'RW', NULL),
(183, 'Saint Kitt', 'سانت كيتس ونيفيس', 'KN', NULL),
(184, 'Saint Luci', 'سانت لوسيا', 'LC', NULL),
(185, 'Saint Vinc', 'سانت فنسنت وغرنادين', 'VC', NULL),
(186, 'Samoa', 'ساموا', 'WS', 'uploads/flags/sa.svg'),
(187, 'San Marino', 'سان مارينو', 'SM', NULL),
(188, 'Sao Tome a', 'ساو تومي وبرينسيبي', 'ST', NULL),
(189, 'Saudi Arab', 'المملكة العربية السعودية', 'SA', NULL),
(190, 'Senegal', 'السنغال', 'SN', NULL),
(191, 'Serbia', 'صربيا', 'RS', NULL),
(192, 'Seychelles', 'سيشل', 'SC', NULL),
(193, 'Sierra Leo', 'سيراليون', 'SL', NULL),
(194, 'Singapore', 'سنغافورة', 'SG', NULL),
(195, 'Slovakia', 'سلوفاكيا', 'SK', NULL),
(196, 'Slovenia', 'سلوفينيا', 'SI', NULL),
(197, 'Solomon Is', 'جزر سليمان', 'SB', NULL),
(198, 'Somalia', 'الصومال', 'SO', NULL),
(199, 'South Afri', 'جمهورية جنوب افريقيا', 'ZA', NULL),
(200, 'South Geor', 'جورجيا الجنوبية وجزر ساندويتش الجنوبية', 'GS', NULL),
(201, 'Spain', 'أسبانيا', 'ES', NULL),
(202, 'Sri Lanka', 'سريلانكا', 'LK', NULL),
(203, 'St. Helena', 'سانت هيلنا', 'SH', NULL),
(204, 'St. Pierre', 'سانت بيير وميكولون', 'PM', NULL),
(205, 'Sudan', 'السودان', 'SD', NULL),
(206, 'Suriname', 'سورينام', 'SR', NULL),
(207, 'Svalbard a', 'سفالبارد وجان مايان', 'SJ', NULL),
(208, 'Swaziland', 'سوازيلاند', 'SZ', NULL),
(209, 'Sweden', 'السويد', 'SE', NULL),
(210, 'Switzerlan', 'سويسرا', 'CH', NULL),
(211, 'Syrian Ara', 'سوريا', 'SY', NULL),
(212, 'Taiwan', 'تايوان', 'TW', NULL),
(213, 'Tajikistan', 'طاجكستان', 'TJ', NULL),
(214, 'Tanzania, ', 'تانزانيا', 'TZ', NULL),
(215, 'Thailand', 'تايلند', 'TH', NULL),
(216, 'Togo', 'توجو', 'TG', NULL),
(217, 'Tokelau', 'توكيلو', 'TK', NULL),
(218, 'Tonga', 'تونجا', 'TO', NULL),
(219, 'Trinidad a', 'ترينيداد وتوباغو', 'TT', NULL),
(220, 'Tunisia', 'تونس', 'TN', NULL),
(221, 'Turkey', 'تركيا', 'TR', NULL),
(222, 'Turkmenist', 'تركمانستان', 'TM', NULL),
(223, 'Turks and ', 'جزر الترك وجايكوس', 'TC', NULL),
(224, 'Tuvalu', 'توفالو', 'TV', NULL),
(225, 'Uganda', 'أوغندا', 'UG', NULL),
(226, 'Ukraine', 'أوكرانيا', 'UA', NULL),
(227, 'United Ara', 'الامارات العربية المتحدة', 'AE', NULL),
(228, 'United Kin', 'المملكة المتحدة', 'GB', NULL),
(229, 'United Sta', 'الولايات المتحدة الأمريكية', 'US', NULL),
(230, 'United Sta', 'جزر الولايات المتحدة البعيدة الصغيرة', 'UM', NULL),
(231, 'Uruguay', 'أورجواي', 'UY', NULL),
(232, 'Uzbekistan', 'أوزبكستان', 'UZ', NULL),
(233, 'Vanuatu', 'فانواتو', 'VU', NULL),
(234, 'Vatican Ci', 'الفاتيكان', 'VA', NULL),
(235, 'Venezuela', 'فنزويلا', 'VE', NULL),
(236, 'Vietnam', 'فيتنام', 'VN', NULL),
(237, 'Virgin Isl', 'جزر فرجين البريطانية', 'VG', NULL),
(238, 'Virgin Isl', 'جزر فرجين الأمريكية', 'VI', NULL),
(239, 'Wallis and', 'جزر والس وفوتونا', 'WF', NULL),
(240, 'Western Sa', 'الصحراء الغربية', 'EH', NULL),
(241, 'Yemen', 'اليمن', 'YE', NULL),
(242, 'Zaire', '', 'ZR', NULL),
(243, 'Zambia', 'زامبيا', 'ZM', NULL),
(244, 'Zimbabwe', 'زيمبابوي', 'ZW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fixed',
  `value` decimal(20,2) NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `published`, `created_at`, `updated_at`) VALUES
(1, 'abc123', 'fixed', '300.00', '1', NULL, NULL),
(2, '111111', 'percent', '10.00', '0', NULL, NULL),
(3, 'zhvb123', 'fixed', '650.00', '0', NULL, NULL),
(4, '26661', 'percent', '30.00', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(2, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(3, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(4, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(5, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(6, 3, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(7, 4, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(8, 4, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(9, 4, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(10, 4, '2022-10-26 14:38:35', '2022-10-26 14:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `district_translations`
--

CREATE TABLE `district_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district_translations`
--

INSERT INTO `district_translations` (`id`, `title`, `slug`, `lang`, `district_id`) VALUES
(1, 'Cairo Opera House', 'cairo-opera-house', 'en', 1),
(2, 'دار الأوبرا المصريه', 'دار-الأوبرا-المصريه', 'ar', 1),
(3, 'El Horreya Mall', 'el-horreya-mall', 'en', 2),
(4, 'حريه مول', 'حريه-مول', 'ar', 2),
(5, 'El Korba', 'el-korba', 'en', 3),
(6, 'الكوربة', 'الكوربه', 'ar', 3),
(7, 'El Oroba', 'el-oroba', 'en', 4),
(8, 'العروبة', 'العروبة', 'ar', 4),
(9, 'Ard El Golf', 'Ard El-Golf', 'en', 5),
(10, 'ارض الجولف', 'ارض-الجولف', 'ar', 5),
(11, 'Al-Ismailia Square', 'al-ismailia-square', 'en', 6),
(12, 'ميدان الإسماعيلية', 'ميدان-الإسماعيلية', 'ar', 6),
(13, 'Abbas al-Aqqad', 'abbas-al-aqqad', 'en', 7),
(14, 'عباس العقاد', 'عباس-العقاد', 'ar', 7),
(15, 'Makram Ebeid', 'makram-ebeid', 'en', 8),
(16, 'مكرم عبيد', 'مكرم-عبيد', 'ar', 8),
(17, 'Mostafa El-Nahas', 'mostafa-el-nahas', 'en', 9),
(18, 'مصطفي النحاس', 'مصطفي-النحاس', 'ar', 9),
(19, 'Salah Salem', 'salah-salem', 'en', 10),
(20, 'صلاح سالم', 'صلاح-سالم', 'ar', 10);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_translations`
--

CREATE TABLE `faq_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faq_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_recipe`
--

CREATE TABLE `media_recipe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_10_12_000000_create_users_table', 1),
(3, '2019_10_12_100000_create_password_resets_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_23_134529_create_countries_table', 1),
(6, '2022_05_23_140157_create_cities_table', 1),
(7, '2022_05_23_140204_create_areas_table', 1),
(8, '2022_05_23_140211_create_districts_table', 1),
(9, '2022_05_23_140218_create_pages_table', 1),
(10, '2022_05_23_140225_create_post_categories_table', 1),
(11, '2022_05_23_140236_create_posts_table', 1),
(12, '2022_05_23_140237_create_post_comments_table', 1),
(13, '2022_05_23_140243_create_tags_table', 1),
(14, '2022_05_23_140252_create_post_tag_table', 1),
(15, '2022_05_23_140301_create_faqs_table', 1),
(16, '2022_05_23_140307_create_slides_table', 1),
(17, '2022_05_23_140316_create_settings_table', 1),
(18, '2022_05_23_140324_create_banners_table', 1),
(19, '2022_05_23_140324_create_clients_table', 1),
(20, '2022_05_23_140331_create_brands_table', 1),
(21, '2022_05_23_140340_create_shippings_table', 1),
(22, '2022_05_23_140341_create_coupons_table', 1),
(23, '2022_05_23_140350_create_product_categories_table', 1),
(24, '2022_05_23_140351_create_products_table', 1),
(25, '2022_05_23_140412_create_product_category_item_table', 1),
(26, '2022_05_23_140421_create_product_tag_table', 1),
(27, '2022_05_23_140427_create_recipe_categories_table', 1),
(28, '2022_05_23_140428_create_recipes_table', 1),
(29, '2022_05_23_140435_create_nutritions_table', 1),
(30, '2022_05_23_140450_create_recipe_like_table', 1),
(31, '2022_05_23_140458_create_comment_product_table', 1),
(32, '2022_05_23_140458_create_comment_recipe_table', 1),
(33, '2022_05_23_140458_create_media_recipe_table', 1),
(34, '2022_05_23_140458_create_nutrition_recipe_table', 1),
(35, '2022_05_23_140507_create_recipe_tag_table', 1),
(36, '2022_05_23_140514_create_subscriptions_table', 1),
(37, '2022_05_23_150607_create_attributes_table', 1),
(38, '2022_05_23_150632_create_attribute_values_table', 1),
(39, '2022_05_29_105305_create_activity_log_table', 1),
(40, '2022_05_29_105306_add_event_column_to_activity_log_table', 1),
(41, '2022_05_29_105307_add_batch_uuid_column_to_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nutritions`
--

CREATE TABLE `nutritions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nutritions`
--

INSERT INTO `nutritions` (`id`, `published`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_recipe`
--

CREATE TABLE `nutrition_recipe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) DEFAULT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `nutrition_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nutrition_recipe`
--

INSERT INTO `nutrition_recipe` (`id`, `value`, `recipe_id`, `nutrition_id`, `created_at`, `updated_at`) VALUES
(1, 30, 1, 1, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, 45, 2, 1, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, 12, 2, 2, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, 23, 3, 3, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, 44, 4, 2, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(6, 150, 5, 1, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(7, 361, 2, 5, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(8, 166, 6, 4, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(9, 18, 7, 3, '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_translations`
--

CREATE TABLE `nutrition_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nutrition_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nutrition_translations`
--

INSERT INTO `nutrition_translations` (`id`, `title`, `lang`, `nutrition_id`) VALUES
(1, 'Calories', 'en', 1),
(2, 'سعر حراري', 'ar', 1),
(3, 'Fats', 'en', 2),
(4, 'الدهون', 'ar', 2),
(5, 'Calcium', 'en', 3),
(6, 'الكالسيوم', 'ar', 3),
(7, 'Carbs', 'en', 4),
(8, 'الكربوهيدرات', 'ar', 4),
(9, 'Sugars', 'en', 5),
(10, 'السكريات', 'ar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `published`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, '1', NULL, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, '0', NULL, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, '1', NULL, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, '0', NULL, '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(6, '0', NULL, '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `title`, `slug`, `description`, `meta_title`, `meta_description`, `lang`, `page_id`) VALUES
(1, 'About Us', 'about-us', NULL, NULL, NULL, 'en', 1),
(2, 'عن الشركه', 'عن-الشركه', NULL, NULL, NULL, 'ar', 1),
(3, 'Services', 'services', NULL, NULL, NULL, 'en', 2),
(4, 'الخدمات', 'الخدمات', NULL, NULL, NULL, 'ar', 2),
(5, 'Contact Us', 'contact-us', NULL, NULL, NULL, 'en', 3),
(6, 'أتصل بنا', 'أتصل-بنا', NULL, NULL, NULL, 'ar', 3),
(7, 'Blog', 'blog', NULL, NULL, NULL, 'en', 4),
(8, 'المدونه ', 'المدونه ', NULL, NULL, NULL, 'ar', 4),
(9, 'Clients', 'clients', NULL, NULL, NULL, 'en', 5),
(10, 'العملاء', 'العملاء', NULL, NULL, NULL, 'ar', 5),
(11, 'Products', 'products', NULL, NULL, NULL, 'en', 6),
(12, 'المنتجات', 'المنتجات', NULL, NULL, NULL, 'ar', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `post_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT 0,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories_translations`
--

CREATE TABLE `post_categories_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `replied_comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `price` decimal(18,4) UNSIGNED NOT NULL,
  `special_price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `special_price_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manage_stock` tinyint(1) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `viewed` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT 0,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_translations`
--

CREATE TABLE `product_categories_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category_item`
--

CREATE TABLE `product_category_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('published','unpublished','scheduled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'published',
  `cook` tinyint(4) DEFAULT NULL COMMENT 'preparation time by minutes',
  `servings` tinyint(4) DEFAULT NULL COMMENT 'by persons',
  `featured` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `image`, `status`, `cook`, `servings`, `featured`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/recipes/farmers_grilled_cheese.jpg', 'published', NULL, 3, '1', 1, '2022-10-10 14:38:36', '2022-12-04 13:51:28'),
(2, NULL, 'published', 15, 10, '0', 2, '2022-10-26 14:38:36', '2022-12-04 10:14:40'),
(3, 'uploads/recipes/baked_tilapia_in_lemon_butter_sauce.jpg', 'published', 22, 2, '1', 3, '2022-10-22 22:00:00', '2022-12-04 13:51:32'),
(4, 'uploads/recipes/spicy-beef-taco-2cd04fc.jpg', 'unpublished', 45, 4, '1', NULL, '2022-10-26 14:38:36', '2022-12-04 13:27:43'),
(5, 'uploads/recipes/healthy-chicken-pasta-bake-8c8fa07.jpg', 'scheduled', 33, 6, '1', 3, '2022-10-26 14:38:36', '2022-12-04 13:18:39'),
(6, 'uploads/recipes/creamy-mushroom-and-spinach-pasta-9b0582e.jpg', 'published', 44, 7, '1', 5, '0000-00-00 00:00:00', '2022-12-04 13:51:37'),
(7, 'uploads/recipes/smoked-brisket-a9a5c4e.jpg', 'unpublished', 13, 5, '0', 4, '2022-10-26 14:38:36', '2022-12-04 10:15:11'),
(8, NULL, 'unpublished', 35, 3, '0', 4, '2022-10-26 14:38:36', '2022-12-04 10:15:05'),
(9, NULL, 'scheduled', 43, 3, '1', 5, '2022-10-26 14:38:36', '2022-12-04 11:17:56'),
(10, 'uploads/recipes/chicken-mushroom-wellington.jpg', 'published', 20, 3, '1', 1, '2022-10-26 14:38:36', '2022-12-04 10:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_categories`
--

CREATE TABLE `recipe_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT 0,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe_categories`
--

INSERT INTO `recipe_categories` (`id`, `parent_id`, `image`, `published`, `created_at`, `updated_at`) VALUES
(1, 0, 'uploads/recipe_categories/snack.jpg', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(2, 0, 'uploads/recipe_categories/soup.jpg', '1', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(3, 0, 'uploads/recipe_categories/chicken.jpg', '0', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(4, 0, 'uploads/recipe_categories/beef.jpg', '0', '2022-10-26 14:38:36', '2022-10-26 14:38:36'),
(5, 0, 'uploads/recipe_categories/pasta.jpg', '0', '2022-10-26 14:38:36', '2022-10-26 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_categories_translations`
--

CREATE TABLE `recipe_categories_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe_categories_translations`
--

INSERT INTO `recipe_categories_translations` (`id`, `title`, `slug`, `description`, `meta_title`, `meta_description`, `lang`, `category_id`) VALUES
(1, 'Snacks', 'Snacks', 'Snacks', NULL, NULL, 'en', 1),
(2, 'وجبات خفيفة', 'وجبات-خفيفة', 'وجبات خفيفة', NULL, NULL, 'ar', 1),
(3, 'Soups', 'blt-pasta', 'Soups Soups ', NULL, NULL, 'en', 2),
(4, 'شوربه', 'شوربه', 'شوربه شوربه ', NULL, NULL, 'ar', 2),
(5, 'Chicken', 'Chicken', 'Chicken Chicken', NULL, NULL, 'en', 3),
(6, 'دجاج', 'دجاج', 'دجاج دجاج ', NULL, NULL, 'ar', 3),
(7, 'Beef', 'beef', 'Beef Beef ', NULL, NULL, 'en', 4),
(8, 'لحم بقري', 'لحم-بقري', 'لحم بقري لحم بقري', NULL, NULL, 'ar', 4),
(9, 'Pasta', 'pasta', 'Pasta Pasta ', NULL, NULL, 'en', 5),
(10, 'مكرونه', 'مكرونه', 'مكرونه مكرونه', NULL, NULL, 'ar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_like`
--

CREATE TABLE `recipe_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `likes` tinyint(1) NOT NULL COMMENT '1 for like , 0 for dislike'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe_like`
--

INSERT INTO `recipe_like` (`id`, `user_id`, `recipe_id`, `likes`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 1),
(4, 1, 4, 1),
(5, 3, 4, 0),
(6, 2, 3, 0),
(7, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_tag`
--

CREATE TABLE `recipe_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe_tag`
--

INSERT INTO `recipe_tag` (`id`, `recipe_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 3),
(7, 3, 2),
(8, 4, 3),
(9, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_translations`
--

CREATE TABLE `recipe_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe_translations`
--

INSERT INTO `recipe_translations` (`id`, `title`, `slug`, `description`, `meta_title`, `meta_description`, `lang`, `recipe_id`) VALUES
(1, 'abdo magdy saied', 'cheese-apple-and-walnut-toastie', 'Cheese, apple and walnut toastie Cheese, apple and walnut toastie', NULL, NULL, 'en', 1),
(2, 'توست الجبن والتفاح والجوز', 'جبنة-تفاح-جوز-توست', 'توست الجبن والتفاح والجوز توست الجبن والتفاح والجوز ', NULL, NULL, 'ar', 1),
(3, 'BLT Pasta', 'blt-pasta', 'BLT Pasta', NULL, NULL, 'en', 2),
(4, 'باستا تاكو لحم بقري حار', 'BLT- باستا', 'BLT- باستا ', NULL, NULL, 'ar', 2),
(5, 'Baked Tilapia in Lemon Butter Sauce', 'baked-tilapia-in-lemon-butter-sauce-recipe', 'Baked Tilapia in Lemon Butter Sauce', NULL, NULL, 'en', 3),
(6, 'سمك بلطي مطبوخ بصلصة الزبدة والليمون', 'سمك-بلطي-مطبوخ-بصلصة-الزبدة-والليمون', 'سمك بلطي مطبوخ بصلصة الزبدة والليمون سمك بلطي مطبوخ بصلصة الزبدة والليمون ', NULL, NULL, 'ar', 3),
(7, 'Spicy beef taco bowl', 'spicy-beef-taco-bowl', 'Get all five of your five-a-day in this Mexican-inspired spicy beef taco bowl. Full of textures and flavours, it can be partly prepped ahead', NULL, NULL, 'en', 4),
(8, 'صحن تاكو لحم بقري حار', 'صحن-تاكو-لحم-بقري-حار', 'صحن تاكو لحم بقري حار صحن تاكو لحم بقري حار', NULL, NULL, 'ar', 4),
(9, 'Healthy chicken pasta bake', 'healthy-chicken-pasta-bake', 'Try this healthy chicken pasta bake with peppers, courgette and ricotta for a nutritious midweek dinner. It’s sure to be a hit with everyone', NULL, NULL, 'en', 5),
(10, 'خبز باستا الدجاج الصحي', 'خبز-باستا-الدجاج-الصحي', 'جرب معكرونة الدجاج الصحية المخبوزة بالفلفل والكوسة والريكوتا لعشاء منتصف الأسبوع المغذي. من المؤكد أنها ستحقق نجاحًا كبيرًا مع الجميع', NULL, NULL, 'ar', 5),
(11, 'Creamy mushroom & spinach pasta', 'creamy-mushroom-spinach-pasta', 'Toss together tagliatelle, mushrooms and spinach in a parmesan and crème fraîche sauce to make a quick and low calorie dinner that takes just 25 minutes', NULL, NULL, 'en', 6),
(12, 'معكرونة بالسبانخ والفطر الكريمي', 'كريمة-فطر-سبانخ-باستا', 'اخلطي التاغلياتيل والفطر والسبانخ معًا في صلصة البارميزان والكريمة الطازجة لإعداد عشاء سريع ومنخفض السعرات الحرارية يستغرق 25 دقيقة فقط', NULL, NULL, 'ar', 6),
(13, 'Smoked brisket', 'smoked-brisket', 'Fire up the smoker for this flavourful slow-cooked brisket. Serve on a board with charred greens and salsa rossa so everyone can help themselves', NULL, NULL, 'en', 7),
(14, 'بريسكيت مدخن', 'بريسكيت-مدخن', 'أطلق النار على المدخن من أجل هذا لحم الصدر اللذيذ المطبوخ ببطء. تخدم على لوح به خضار متفحمة وصلصة الروسا حتى يتمكن الجميع من مساعدة أنفسهم', NULL, NULL, 'ar', 7),
(15, 'Beef & Boston baked beans', 'beef-boston-baked-beans', 'Enjoy these Boston baked beans with a jacket potato or crusty bread. Time works its magic on this dish, but there’s very little hands-on work to do', NULL, NULL, 'en', 8),
(16, 'لحم بقر بالفاصوليا المخبوزة', 'لحم-بقر-بالفاصوليا-المخبوزة', 'استمتع بهذه الفاصوليا المخبوزة في بوسطن مع سترة البطاطس أو الخبز المقرمش. يعمل الوقت بشكل ساحر على هذا الطبق ، ولكن هناك القليل جدًا من العمل العملي الذي يجب القيام به', NULL, NULL, 'ar', 8),
(17, 'Pasta alla norma', 'pasta-alla-norma', 'Try this easy version of an alla norma, which uses roast aubergine instead of fried. It’s then tossed with spaghetti and a rich tomato and basil sauce', NULL, NULL, 'en', 9),
(18, 'باستا ألا نورما', 'باستا-ألا-نورما', 'جرب هذه النسخة السهلة من آلا نورما ، والتي تستخدم الباذنجان المشوي بدلاً من المقلي. ثم يتم تقليبها مع السباغيتي وصلصة الطماطم الغنية والريحان', NULL, NULL, 'ar', 9),
(19, 'Chicken & mushroom wellington ', 'hicken-mushroom-wellington', 'Chicken & mushroom wellington Chicken & mushroom wellington Chicken & mushroom wellington ', NULL, NULL, 'en', 10),
(20, 'دجاج و مشروم ولينغتون', 'دجاج و مشروم ولينغتون', 'اصنع عشاء احتفالي لشخصين مع هذا الدجاج والفطر ويلينغتون. قطعيها إلى عجينة ذهبية لتحصلي على قوام كريمي بالثوم من الداخل - الكمال', NULL, NULL, 'ar', 10);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_translatable` tinyint(1) NOT NULL DEFAULT 0,
  `plain_value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_translations`
--

CREATE TABLE `shipping_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `featured` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `order`, `featured`, `published`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'uploads/slides/facebook.jpg', NULL, '1', '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(2, 'uploads/slides/twitter.jpg', NULL, '0', '0', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(3, 'uploads/slides/amazon.jpg', NULL, '1', '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(4, 'uploads/slides/google.jpg', NULL, '0', '0', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(5, 'uploads/slides/youtube.jpg', NULL, '1', '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `slide_translations`
--

CREATE TABLE `slide_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide_translations`
--

INSERT INTO `slide_translations` (`id`, `title`, `description`, `lang`, `slide_id`) VALUES
(1, 'Facebook', 'Connect with friends, family and other people you know. Share photos and videos, send messages and get updates', 'en', 1),
(2, 'فيسبوك', 'يمكنك إنشاء حساب أو تسجيل الدخول إلى فيسبوك والتواصل مع الأصدقاء وأفراد العائلة والأشخاص الآخرين الذين تعرفهم. استمتع بمشاركة الصور ومقاطع الفيديو وإرسال', 'ar', 1),
(3, 'Twitter', 'From breaking news and entertainment to sports and politics, get the full story with all the live commentary. ', 'en', 2),
(4, 'تويتر', 'تويتر أكثر آمانا هو تويتر أفضل للجميع انضموا للمساحة الخاص', 'ar', 2),
(5, 'Amazon', 'Amazon On Line Shop Stroe Amazon On Line Shop Stroe Amazon On Line Shop Stroe ', 'en', 3),
(6, 'أمازون', 'كل شيء تحبه في سوق.كوم الان اصبح على أمازون مصر. استكشف وتسوّق الالكترونيات، الكمبيوترات، الملابس، الاكسسوارات، الأحذية، الساعات، الأثاث، مستلزمات المنزل', 'ar', 3),
(7, 'Google', 'Search the world s information, including webpages, images, videos and more. Google has many special features to help you find exactly what you are looking', 'en', 4),
(8, 'جوجل', 'جوجل أقوي محرك بحث', 'ar', 4),
(9, 'YouTube', 'Enjoy the videos and music you love, upload original content, and share it all with friends, family, and the world on YouTube ', 'en', 5),
(10, 'يوتيوب', 'يمكنك الاستمتاع بالفيديوهات والموسيقى التي تحبها وتحميل المحتوى الأصلي ومشاركته بكامله مع أصدقائك وأفراد عائلتك والعالم أجمع على YouTube.', 'ar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `published` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `published`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(2, '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(3, '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(4, '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35'),
(5, '1', NULL, '2022-10-26 14:38:35', '2022-10-26 14:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `title`, `slug`, `lang`, `tag_id`) VALUES
(1, 'Healthy Food', 'healthy-food', 'en', 1),
(2, 'طعام صحي', 'طعام-صحي', 'ar', 1),
(3, 'Dessert', 'dessert', 'en', 2),
(4, 'حلوى', 'حلوى', 'ar', 2),
(5, 'Chicken Wings', 'chicken-wings', 'en', 3),
(6, 'أجنحه دجاج', 'أجنحه-دجاج', 'ar', 3),
(7, 'Rice', 'rice', 'en', 4),
(8, 'أرز', 'أرز', 'ar', 4),
(9, 'Beef', 'beef', 'en', 5),
(10, 'لحم بيف', 'لحم-بيف', 'ar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `provider_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `is_admin`, `provider_name`, `provider_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Life', 'admin', 'admin@domain.com', NULL, '1', NULL, NULL, '$2y$10$Dx6NfJqjMyMje4N6qkq7hOqKwYmrTfS9t56/32ZNDePgojCUop.9y', NULL, NULL, NULL),
(2, 'John Doe', 'johndoe', 'johndoe@domain.com', NULL, '1', NULL, NULL, '$2y$10$CsQVuzVKP/leDHbTKAPDEOlHf7Lx3ax1osAiceZcHrw5YUZ7o79li', NULL, NULL, NULL),
(3, 'vigo mavy', 'vigo', 'vigo@domain.com', NULL, '1', NULL, NULL, '$2y$10$AM66HuygYOaXf8B6v8QkD.8M2pItv7yISqoS6FF8NBjbpeZ/TlY8G', NULL, NULL, NULL),
(4, 'lary Mat', 'lary', 'lary@domain.com', NULL, '1', NULL, NULL, '$2y$10$RlvGM7aQZ/lxtV4uLqrYGen0DXHPzaFmITEwVvCYDn0Dn3Nm81t9G', NULL, NULL, NULL),
(5, 'Dany oliver', 'dany', 'dany@domain.com', NULL, '1', NULL, NULL, '$2y$10$YJJTuAu0UbUi9ZdfdWDlce4CmjcpLHNGSWXPAab7JCNOzBotPwFYO', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `area_translations`
--
ALTER TABLE `area_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area_translations_area_id_lang_unique` (`area_id`,`lang`),
  ADD UNIQUE KEY `area_translations_slug_unique` (`slug`),
  ADD KEY `area_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `area_translations_lang_index` (`lang`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_code_unique` (`code`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_translations_attribute_id_lang_unique` (`attribute_id`,`lang`),
  ADD UNIQUE KEY `attribute_translations_slug_unique` (`slug`),
  ADD KEY `attribute_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `attribute_translations_lang_index` (`lang`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_translations`
--
ALTER TABLE `banner_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banner_translations_banner_id_lang_unique` (`banner_id`,`lang`),
  ADD KEY `banner_translations_title_index` (`title`),
  ADD KEY `banner_translations_lang_index` (`lang`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_translations_brand_id_lang_unique` (`brand_id`,`lang`),
  ADD UNIQUE KEY `brand_translations_slug_unique` (`slug`),
  ADD KEY `brand_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `brand_translations_lang_index` (`lang`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_translations_city_id_lang_unique` (`city_id`,`lang`),
  ADD UNIQUE KEY `city_translations_slug_unique` (`slug`),
  ADD KEY `city_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `city_translations_lang_index` (`lang`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_translations`
--
ALTER TABLE `client_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_translations_client_id_lang_unique` (`client_id`,`lang`),
  ADD UNIQUE KEY `client_translations_slug_unique` (`slug`),
  ADD KEY `client_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `client_translations_lang_index` (`lang`);

--
-- Indexes for table `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_product_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `comment_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `comment_recipe`
--
ALTER TABLE `comment_recipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_recipe_user_id_recipe_id_unique` (`user_id`,`recipe_id`),
  ADD KEY `comment_recipe_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_area_id_foreign` (`area_id`);

--
-- Indexes for table `district_translations`
--
ALTER TABLE `district_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district_translations_district_id_lang_unique` (`district_id`,`lang`),
  ADD UNIQUE KEY `district_translations_slug_unique` (`slug`),
  ADD KEY `district_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `district_translations_lang_index` (`lang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_translations`
--
ALTER TABLE `faq_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faq_translations_faq_id_lang_unique` (`faq_id`,`lang`),
  ADD KEY `faq_translations_question_index` (`question`),
  ADD KEY `faq_translations_lang_index` (`lang`);

--
-- Indexes for table `media_recipe`
--
ALTER TABLE `media_recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_recipe_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutritions`
--
ALTER TABLE `nutritions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition_recipe`
--
ALTER TABLE `nutrition_recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nutrition_recipe_recipe_id_foreign` (`recipe_id`),
  ADD KEY `nutrition_recipe_nutrition_id_foreign` (`nutrition_id`);

--
-- Indexes for table `nutrition_translations`
--
ALTER TABLE `nutrition_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nutrition_translations_nutrition_id_lang_unique` (`nutrition_id`,`lang`),
  ADD KEY `nutrition_translations_title_index` (`title`),
  ADD KEY `nutrition_translations_lang_index` (`lang`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_translations_page_id_lang_unique` (`page_id`,`lang`),
  ADD UNIQUE KEY `page_translations_slug_unique` (`slug`),
  ADD KEY `page_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `page_translations_lang_index` (`lang`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_post_category_id_foreign` (`post_category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories_translations`
--
ALTER TABLE `post_categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_translations_post_category_id_lang_unique` (`post_category_id`,`lang`),
  ADD UNIQUE KEY `post_categories_translations_slug_unique` (`slug`),
  ADD KEY `post_categories_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `post_categories_translations_lang_index` (`lang`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tag_post_id_tag_id_unique` (`post_id`,`tag_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_lang_unique` (`post_id`,`lang`),
  ADD UNIQUE KEY `post_translations_slug_unique` (`slug`),
  ADD KEY `post_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `post_translations_lang_index` (`lang`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_sku_index` (`sku`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories_translations`
--
ALTER TABLE `product_categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_translations_product_category_id_lang_unique` (`product_category_id`,`lang`),
  ADD UNIQUE KEY `product_categories_translations_slug_unique` (`slug`),
  ADD KEY `product_categories_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `product_categories_translations_lang_index` (`lang`);

--
-- Indexes for table `product_category_item`
--
ALTER TABLE `product_category_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_category_item_product_id_product_category_id_unique` (`product_id`,`product_category_id`),
  ADD KEY `product_category_item_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_tag_product_id_tag_id_unique` (`product_id`,`tag_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_lang_unique` (`product_id`,`lang`),
  ADD UNIQUE KEY `product_translations_slug_unique` (`slug`),
  ADD KEY `product_translations_lang_index` (`lang`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_category_id_foreign` (`category_id`);

--
-- Indexes for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_categories_translations`
--
ALTER TABLE `recipe_categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_categories_translations_slug_unique` (`slug`),
  ADD UNIQUE KEY `recipe_categories_translations_category_id_lang_unique` (`category_id`,`lang`),
  ADD KEY `recipe_categories_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `recipe_categories_translations_lang_index` (`lang`);

--
-- Indexes for table `recipe_like`
--
ALTER TABLE `recipe_like`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_like_user_id_recipe_id_unique` (`user_id`,`recipe_id`),
  ADD KEY `recipe_like_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `recipe_tag`
--
ALTER TABLE `recipe_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_tag_recipe_id_foreign` (`recipe_id`),
  ADD KEY `recipe_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `recipe_translations`
--
ALTER TABLE `recipe_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_translations_recipe_id_lang_unique` (`recipe_id`,`lang`),
  ADD UNIQUE KEY `recipe_translations_slug_unique` (`slug`),
  ADD KEY `recipe_translations_lang_index` (`lang`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_lang_unique` (`setting_id`,`lang`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_translations`
--
ALTER TABLE `shipping_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipping_translations_shipping_id_lang_unique` (`shipping_id`,`lang`),
  ADD KEY `shipping_translations_title_index` (`title`),
  ADD KEY `shipping_translations_lang_index` (`lang`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_translations`
--
ALTER TABLE `slide_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slide_translations_slide_id_lang_unique` (`slide_id`,`lang`),
  ADD KEY `slide_translations_lang_index` (`lang`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_translations_slug_unique` (`slug`),
  ADD UNIQUE KEY `tag_translations_tag_id_lang_unique` (`tag_id`,`lang`),
  ADD KEY `tag_translations_title_slug_index` (`title`,`slug`),
  ADD KEY `tag_translations_lang_index` (`lang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_provider_id_unique` (`provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `area_translations`
--
ALTER TABLE `area_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner_translations`
--
ALTER TABLE `banner_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_translations`
--
ALTER TABLE `client_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_recipe`
--
ALTER TABLE `comment_recipe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `district_translations`
--
ALTER TABLE `district_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_translations`
--
ALTER TABLE `faq_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_recipe`
--
ALTER TABLE `media_recipe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `nutritions`
--
ALTER TABLE `nutritions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nutrition_recipe`
--
ALTER TABLE `nutrition_recipe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nutrition_translations`
--
ALTER TABLE `nutrition_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories_translations`
--
ALTER TABLE `post_categories_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories_translations`
--
ALTER TABLE `product_categories_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category_item`
--
ALTER TABLE `product_category_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipe_categories_translations`
--
ALTER TABLE `recipe_categories_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recipe_like`
--
ALTER TABLE `recipe_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recipe_tag`
--
ALTER TABLE `recipe_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recipe_translations`
--
ALTER TABLE `recipe_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_translations`
--
ALTER TABLE `shipping_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slide_translations`
--
ALTER TABLE `slide_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `area_translations`
--
ALTER TABLE `area_translations`
  ADD CONSTRAINT `area_translations_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `banner_translations`
--
ALTER TABLE `banner_translations`
  ADD CONSTRAINT `banner_translations_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD CONSTRAINT `brand_translations_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_translations`
--
ALTER TABLE `client_translations`
  ADD CONSTRAINT `client_translations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_product_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_recipe`
--
ALTER TABLE `comment_recipe`
  ADD CONSTRAINT `comment_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_recipe_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `district_translations`
--
ALTER TABLE `district_translations`
  ADD CONSTRAINT `district_translations_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faq_translations`
--
ALTER TABLE `faq_translations`
  ADD CONSTRAINT `faq_translations_faq_id_foreign` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media_recipe`
--
ALTER TABLE `media_recipe`
  ADD CONSTRAINT `media_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nutrition_recipe`
--
ALTER TABLE `nutrition_recipe`
  ADD CONSTRAINT `nutrition_recipe_nutrition_id_foreign` FOREIGN KEY (`nutrition_id`) REFERENCES `nutritions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nutrition_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nutrition_translations`
--
ALTER TABLE `nutrition_translations`
  ADD CONSTRAINT `nutrition_translations_nutrition_id_foreign` FOREIGN KEY (`nutrition_id`) REFERENCES `nutritions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_post_category_id_foreign` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_categories_translations`
--
ALTER TABLE `post_categories_translations`
  ADD CONSTRAINT `post_categories_translations_post_category_id_foreign` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `product_categories_translations`
--
ALTER TABLE `product_categories_translations`
  ADD CONSTRAINT `product_categories_translations_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_category_item`
--
ALTER TABLE `product_category_item`
  ADD CONSTRAINT `product_category_item_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_category_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `recipe_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_categories_translations`
--
ALTER TABLE `recipe_categories_translations`
  ADD CONSTRAINT `recipe_categories_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `recipe_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_like`
--
ALTER TABLE `recipe_like`
  ADD CONSTRAINT `recipe_like_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipe_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_tag`
--
ALTER TABLE `recipe_tag`
  ADD CONSTRAINT `recipe_tag_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipe_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_translations`
--
ALTER TABLE `recipe_translations`
  ADD CONSTRAINT `recipe_translations_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_translations`
--
ALTER TABLE `shipping_translations`
  ADD CONSTRAINT `shipping_translations_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slide_translations`
--
ALTER TABLE `slide_translations`
  ADD CONSTRAINT `slide_translations_slide_id_foreign` FOREIGN KEY (`slide_id`) REFERENCES `slides` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
