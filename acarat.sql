-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 02:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acarat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bu`
--

CREATE TABLE `bu` (
  `id` int(11) NOT NULL,
  `bu_name` varchar(100) NOT NULL,
  `bu_price` varchar(20) NOT NULL,
  `bu_rooms` int(11) NOT NULL,
  `bu_rent` tinyint(1) NOT NULL,
  `bu_square` varchar(10) NOT NULL,
  `bu_type` tinyint(1) NOT NULL,
  `bu_small_dis` varchar(160) NOT NULL,
  `bu_meta` varchar(200) NOT NULL,
  `bu_langitude` varchar(50) NOT NULL,
  `bu_latitude` varchar(50) NOT NULL,
  `bu_large_dis` longtext NOT NULL,
  `bu_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `bu_place` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bu`
--

INSERT INTO `bu` (`id`, `bu_name`, `bu_price`, `bu_rooms`, `bu_rent`, `bu_square`, `bu_type`, `bu_small_dis`, `bu_meta`, `bu_langitude`, `bu_latitude`, `bu_large_dis`, `bu_status`, `created_at`, `updated_at`, `user_id`, `bu_place`, `image`, `month`, `year`) VALUES
(4, 'عقار لزئر', '4000', 2, 1, '2212', 1, 'إختبار لوصف العقار القصير', 'sfsdfsd', '30.06263', '31.24967', 'هنا إختبارا للعقارات', 1, '2017-07-08 09:00:30', '2017-07-08 07:00:30', 0, 'mans', '1496438039.bedb209bf7cdf3a46a9c4d5b3dfbfcd7.jpg', '09', '2017'),
(6, 'فيلا الساحل الشمالى', '12000', 12, 1, '2212', 1, 'فيلا مطله على البحر الأحمر', '12.45', '31.24967', '30.06263', 'إختبار لوصف العقار', 1, '2017-07-08 08:58:27', '2017-07-08 06:14:15', 0, 'asw', '1499501655.image.jpg', '09', '2016'),
(8, 'العقار المثالى', '30000', 12, 1, '12221', 1, 'إختبار لوصف العقار القصير', 'فيلا', '31.24967', '30.06263', 'هذه الفيلا كأختبار للعميل', 1, '2017-07-08 08:58:36', '2017-07-08 06:27:02', 0, 'asw', '1499502422.image11.jpg', '08', '2017'),
(14, 'العقار الأول', '50,00000$', 22, 1, '23423', 1, 'إختبار لوصف العقار القصير', 'فيلا,عقار,مبنى', '31.24967', '30.06263', 'إختبار لوصف العقار', 1, '2017-07-08 09:01:13', '2017-07-08 07:01:13', 24, 'da', '1499504473.image.jpg', '09', '2017'),
(15, 'sfsdfsffs', '24234', 2, 1, '2423324', 0, 'إختبار لوصف العقار القصير', 'sdfsfsdfsfs', '41.90', '30.06263', 'إختبار لوصف العقار', 0, '2017-07-08 08:58:47', '2017-06-19 07:48:07', 0, 'da', '1495004075.0f5b4cf2619b6a8c0003c1dc78634b07.jpg', '09', '2017'),
(16, 'الشركه الدوليه', '20000', 4, 1, '2000', 1, 'إختبار لوصف العقار القصير', 'نشابينباسب', '31.24967', '30.06263', 'إختبار لوصف العقار', 0, '2017-07-08 08:58:39', '2017-06-19 07:48:18', 24, 'mans', '1496057330.bedb209bf7cdf3a46a9c4d5b3dfbfcd7.jpg', '10', '2017'),
(17, 'adel.com', '20000', 2, 1, '2000', 0, 'إختبار لوصف العقار القصير', 'fdafsdfs`', '31.24967', '30.06263', 'إختبار لوصف العقار', 0, '2017-07-08 08:58:51', '2017-06-19 07:48:22', 24, 'asw', '1496058882.marmoset-1490990534280.png', '09', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_subject` varchar(100) NOT NULL,
  `contact_message` text NOT NULL,
  `view` tinyint(1) NOT NULL,
  `contact_type` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `view`, `contact_type`, `created_at`, `updated_at`) VALUES
(2, 'czxczc', 'admin@gmail.com', '', 'zيبيلبczxczxczxczxczxzxc', 1, 2, '2017-05-16 09:10:54', '2017-05-16 07:04:53'),
(3, 'عثمان', 'admin@gmail.com', '', 'اود ان أخبرك ان لن تنجوا أبدا إلا بالثقة فى الله وحسن التوكل علية والتوبة من المعاصى ومجاهدة النفس لتركها والتوبة النصوح اللهم اهدنا واياكم إليها', 1, 3, '2017-05-16 09:14:24', '2017-05-16 07:14:24'),
(4, 'sfsfsfs', 'admin@gmail.com', '3', 'dsfsfsfd', 1, 0, '2017-05-16 16:05:30', '2017-05-16 14:05:30'),
(5, 'شسيشسيشسيشس', 'admin@gmail.com', '3', 'سلسبلسلس', 1, 0, '2017-05-16 16:05:52', '2017-05-16 14:05:52'),
(6, 'Ali', 'admin@gmail.com', '2', 'الحب يبقى والحياة تزول أكرم بأمل حقة التقبيل وتقر عينى بالحبيب كأنه طفل لما فى النفس من تعليل', 1, 0, '2017-05-22 21:55:58', '2017-05-22 19:55:58'),
(7, 'ابراهيم', 'doasda@gmail.com', '2', 'يسيبسيبسيبسيبسيب', 1, 0, '2017-05-24 22:34:06', '2017-05-24 20:34:06'),
(8, 'عادل', 'admin@gmail.com', '2', 'يجب عليك ان تتقى الله', 1, 0, '2017-05-29 12:00:53', '2017-05-29 10:00:53'),
(9, 'fafsdfsdf', 'admin@gmail.com', '1', 'xbxbcbcbcbv', 0, 0, '2017-06-22 08:18:21', '2017-06-22 08:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `namesetting` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `type` tinyint(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `slug`, `namesetting`, `value`, `type`, `created_at`, `updated_at`) VALUES
(3, 'إسم الموقع', 'sitename', 'بيتى', 0, '2017-07-08 08:11:56', '2017-07-08 06:11:56'),
(5, 'التليفون', 'phone', '+201067565716', 0, '2017-04-27 19:54:38', '2017-04-27 17:54:38'),
(6, 'فيس بوك', 'face', 'https://www.facebook.com/adel.abuelzz', 0, '2017-04-27 19:54:38', '2017-04-27 17:54:38'),
(8, 'لينكيد ان', 'linkedIn', 'https://www.linkedin.com/in/adel-ezz-838523b0/', 0, '2017-07-08 08:25:31', '2017-07-08 06:23:07'),
(9, 'جيتهب', 'github', 'https://github.com/adel-ezz', 0, '2017-07-08 08:24:39', '2017-07-08 06:23:07'),
(10, 'العنوان', 'title', 'دمياط /كفر سغد/كفر سليمان البحرى', 0, '2017-04-27 19:54:38', '2017-04-27 17:54:38'),
(11, 'الكلمات الدلالية', 'word', 'عقار / منشأه / محل إقامة', 1, '2017-04-27 19:54:38', '2017-04-27 17:54:38'),
(12, 'وصف الموقع', 'discrip', 'يعد موقع عقارات هو اول موقع على مستوى الوطن العربى المتخصص فى ريادة ..................................', 1, '2017-05-10 16:41:53', '2017-05-10 14:41:53'),
(13, 'صورة بديلة', 'noimage', 'http://www.asia-intl-auctioneers.com/nego/img/nopics.png', 0, '2017-05-11 17:16:08', '2017-05-10 14:36:57'),
(14, 'صورة السليدر الرئيسية فى الصفحة', 'main_slider', '1494768033.bedb209bf7cdf3a46a9c4d5b3dfbfcd7.jpg', 3, '2017-05-14 13:20:33', '2017-05-14 11:20:33'),
(15, 'الإيميل', 'email', 'admin@gmail.com', 0, '2017-05-15 07:25:23', '0000-00-00 00:00:00'),
(16, 'حقوق الموقع', 'footer', 'برمجة عادل أبو العز(01067567516)', 0, '2017-07-08 08:33:21', '2017-07-08 06:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(24, 'admin', 'admin@gmail.com', '$2y$10$Fu1LF/Pcd0CGb5VPXdHc9Ojwdi5rT1sjCAGiTACFf9sDQsJs7iSNO', 'oygoYsVWiE6jB6RlVTVX9H4a4PJ4ksNMFxbnWIb5kWmRZhaeDNTZw9VCTWpC', '2017-04-23 12:49:53', '2017-05-21 10:54:19', 1),
(25, 'user', 'user@gmail.com', '$2y$10$43BiuUALlcZxpHYclyYByOft13KFGp5p0q0K5QH5h2khLfbWmGlc6', NULL, '2017-05-19 14:36:40', '2017-05-19 14:36:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bu`
--
ALTER TABLE `bu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bu`
--
ALTER TABLE `bu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
