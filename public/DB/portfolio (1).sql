-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2024 at 10:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `image`, `description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'About me', 'uploads/image/about/1787797429612337-testimonial-2.jpg', '<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt.</p><p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. porttitor at sem.</p><p>Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>', 0, 1, '2024-01-11 06:28:34', '2024-01-11 06:50:12'),
(2, 'Shakaut Shraban', 'uploads/image/about/1787969816348249-avatar.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem.</p><p>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam.</p><p>Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur fugiat, temporibus enim commodi iusto libero magni deleniti quod quam consequuntur! Commodi minima excepturi repudiandae velit hic maxime</p>', 0, 2, '2024-01-13 03:59:09', '2024-01-13 04:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Shakuat Shraban', 'superadmin@gmail.com', 'okkk', 'vycfutodvtd75', 1, '2024-01-12 05:55:22', '2024-01-12 05:55:22'),
(4, 'Patricia Mcdowell', 'noryjipatu@mailinator.com', 'Aut facilis ad illo', 'Illum placeat alia', 2, '2024-01-13 04:26:28', '2024-01-13 04:26:28'),
(7, 'Wylie Miles', 'mofonevaha@mailinator.com', 'Qui excepturi fugit', 'Placeat aliquam aut', 2, '2024-01-13 04:38:09', '2024-01-13 04:38:09'),
(8, 'Kelly Bowers', 'wohidati@mailinator.com', 'Vero et nemo delenit', 'Porro consequat Exc', 2, '2024-01-13 04:40:22', '2024-01-13 04:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `title`, `image`, `count`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'WORKS COMPLETED', 'uploads/image/counter/1787799159457249-work-1.jpg', 450, 0, 1, '2024-01-11 07:02:21', '2024-01-11 07:02:21'),
(2, 'YEARS OF EXPERIENCE', 'uploads/image/counter/1787799179224427-work-2.jpg', 15, 0, 1, '2024-01-11 07:02:40', '2024-01-11 07:02:40'),
(3, 'TOTAL CLIENTS', 'uploads/image/counter/1787799214816399-work-3.jpg', 550, 0, 1, '2024-01-11 07:03:14', '2024-01-11 07:03:14'),
(4, 'AWARD WON', 'uploads/image/counter/1787799256193963-work-4.jpg', 36, 0, 1, '2024-01-11 07:03:53', '2024-01-11 07:03:53'),
(5, 'WORK COMPLETE', 'ion-checkmark-round', 93, 0, 2, '2024-01-13 04:09:50', '2024-01-13 04:09:50'),
(6, 'YEARS OF EXPERIENCE', 'ion-calendar', 4, 0, 2, '2024-01-13 04:11:03', '2024-01-13 04:11:03'),
(7, 'TOTAL CLIENTS', 'ion-ios-people', 550, 0, 2, '2024-01-13 04:14:11', '2024-01-13 04:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `title`, `image`, `sub_title1`, `sub_title2`, `sub_title3`, `sub_title4`, `sub_title5`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'uploads/image/hero/1787796898644232-intro-bg.jpg', 'Web developer', 'Frontend Developer', NULL, NULL, NULL, 0, 1, '2024-01-11 04:24:51', '2024-01-11 06:26:26'),
(2, 'Shraban', 'uploads/image/hero/1787968556394871-zac-durant-_6HzPU9Hyfg-unsplash.jpg', 'Web developer', 'Laravel developer', NULL, NULL, NULL, 0, 2, '2024-01-13 03:54:37', '2024-01-13 03:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(63, '2019_08_19_000000_create_failed_jobs_table', 1),
(64, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(66, '2024_01_08_103312_create_services_table', 1),
(67, '2024_01_09_065112_create_portfolios_table', 1),
(68, '2024_01_09_075024_create_heroes_table', 1),
(69, '2024_01_09_075034_create_abouts_table', 1),
(70, '2024_01_09_103116_create_counters_table', 1),
(71, '2024_01_09_112328_create_personal_infos_table', 1),
(72, '2024_01_09_112720_create_skills_table', 1),
(73, '2024_01_09_123119_create_testimonials_table', 1),
(74, '2024_01_09_131745_create_contacts_table', 1),
(75, '2024_01_10_043000_create_social_icons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_infos`
--

CREATE TABLE `personal_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_infos`
--

INSERT INTO `personal_infos` (`id`, `full_name`, `email`, `phone`, `address`, `profile`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Morgan Freeman', 'contact@example.com', '(617) 557-0089', '329 WASHINGTON ST BOSTON, MA 02108', 'full stack developer', 1, '2024-01-11 06:31:59', '2024-01-11 06:31:59'),
(2, 'Shakuat Shraban', 'shakuatshraban@gmail.com', '+8801632558049', 'Mymensingh,Bangladesh', 'Full-Stack Developer', 2, '2024-01-13 04:16:02', '2024-01-13 04:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `image`, `link`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Urielle Pena', 'uploads/image/portfolio/1787800136082992-work-1.jpg', 'https://www.bigurovy.com', 1, 1, '2024-01-11 07:15:00', '2024-01-11 07:22:48'),
(2, 'Debra Gilliam', 'uploads/image/portfolio/1787800050361843-work-2.jpg', 'https://www.vyv.info', 1, 1, '2024-01-11 07:16:31', '2024-01-11 07:22:53'),
(3, 'Veda Mcmillan', 'uploads/image/portfolio/1787800066716873-work-3.jpg', 'https://www.lecetovucynipo.org', 1, 1, '2024-01-11 07:16:46', '2024-01-11 07:23:05'),
(4, 'Regan Poole', 'uploads/image/portfolio/1787800079665740-work-4.jpg', 'https://www.viqunilug.ca', 1, 1, '2024-01-11 07:16:58', '2024-01-11 07:23:10'),
(5, 'Britanni Duffy', 'uploads/image/portfolio/1787800106425731-work-5.jpg', 'https://www.sutet.org', 1, 1, '2024-01-11 07:17:24', '2024-01-11 07:23:15'),
(6, 'Ebony Mueller', 'uploads/image/portfolio/1787800119862906-work-6.jpg', 'https://www.peviqoxa.me', 1, 1, '2024-01-11 07:17:37', '2024-01-11 07:23:20'),
(8, 'Keiko Odonnell', 'uploads/image/portfolio/1787961695680649-work-3.jpg', 'https://www.mafucuq.us', 1, 2, '2024-01-13 02:05:48', '2024-01-13 02:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `meta_title`, `meta_tag`, `meta_desc`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'WEB DESIGN', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.</p>', 'uploads/image/service/1787798607055724-work-1.jpg', NULL, NULL, NULL, 1, 1, '2024-01-11 06:53:34', '2024-01-11 06:53:34'),
(2, 'WEB DEVELOPMENT', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.</p>', 'uploads/image/service/1787798643756014-work-2.jpg', NULL, NULL, NULL, 1, 1, '2024-01-11 06:54:09', '2024-01-11 06:54:09'),
(3, 'PHOTOGRAPHY', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.</p>', 'uploads/image/service/1787798700484764-work-3.jpg', NULL, NULL, NULL, 1, 1, '2024-01-11 06:55:03', '2024-01-11 06:55:03'),
(4, 'RESPONSIVE DESIGN', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.</p>', 'uploads/image/service/1787798737689009-work-4.jpg', NULL, NULL, NULL, 1, 1, '2024-01-11 06:55:39', '2024-01-11 06:55:39'),
(5, 'GRAPHIC DESIGN', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.</p>', 'uploads/image/service/1787798778076023-work-5.jpg', NULL, NULL, NULL, 1, 1, '2024-01-11 06:56:17', '2024-01-11 06:56:17'),
(6, 'MARKETING SERVICES', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.</p>', 'uploads/image/service/1787798818875731-work-6.jpg', NULL, NULL, NULL, 1, 1, '2024-01-11 06:56:56', '2024-01-11 06:56:56'),
(7, 'Api Development', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam</p>', 'ion-code-download', 'ok', 'Jerry Singleton', '<p>okkkkkk</p>', 1, 2, '2024-01-13 01:24:28', '2024-01-13 01:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `percent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 85, 1, '2024-01-11 06:38:03', '2024-01-11 06:38:03'),
(2, 'CSS3', 75, 1, '2024-01-11 06:38:21', '2024-01-11 06:38:21'),
(3, 'PHP', 50, 1, '2024-01-11 06:38:36', '2024-01-11 06:38:36'),
(4, 'JAVASCRIPT', 90, 1, '2024-01-11 06:38:53', '2024-01-11 06:38:53'),
(5, 'Figma', 20, 2, '2024-01-13 03:49:11', '2024-01-13 03:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `title`, `icon`, `link`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'ion-social-facebook', 'https://www.facebook.com/', 1, 1, '2024-01-12 04:06:47', '2024-01-12 04:06:47'),
(2, 'Instragram', 'ion-social-instagram', 'https://www.facebook.com/', 1, 1, '2024-01-12 04:25:02', '2024-01-12 04:25:02'),
(3, 'Twitter', 'ion-social-twitter', 'https://www.twitter.com/', 1, 1, '2024-01-12 04:27:07', '2024-01-12 04:27:07'),
(4, 'Printerest', 'ion-social-pinterest', 'https://www.growupit', 1, 1, '2024-01-12 04:36:09', '2024-01-12 04:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `description`, `image`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Beck Odom', 'Web Developer', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>', 'uploads/image/testimonial/1787877118413024-testimonial-2.jpg', 1, 1, '2024-01-12 03:41:29', '2024-01-12 03:41:29'),
(2, 'Rama Landry', 'App Developer', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>', 'uploads/image/testimonial/1787877163807616-testimonial-4.jpg', 1, 1, '2024-01-12 03:42:12', '2024-01-12 03:42:12'),
(3, 'Unity Bruce', 'Designer', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,</p>', 'uploads/image/testimonial/1787968079170125-testimonial-2.jpg', 1, 2, '2024-01-13 03:47:15', '2024-01-13 03:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EGu4MSyBa0seZI5nahqrtCM9MFCLs5mjy43cXEMWfMKjZjtmT4L4TDrQ4ymn', '2024-01-11 03:38:27', '2024-01-11 03:38:27'),
(2, 'shraban', 'shakuatshraban@gmail.com', 'shraban', '$2y$10$v1Iu81VKi.J4UgWJ5vEbqeoH/jS.5Fs0tTddK8YhnVe0gljcWbzFC', 'qJi1z5VB2A1ALH9n24rv8VkbKCRMBLaBrWMC2Sk6g4KGwFgUxiF3vrx9gET5', '2024-01-11 04:20:43', '2024-01-14 02:58:30'),
(3, 'Shakuat Shraban', 'shakuatshraban935@gmail.com', 'shakuat', '$2y$10$N4UiPwOhsxA2eoJneycibOQQEGfTeX7OWh8pg9LfYpub7aD7hUXD2', NULL, '2024-01-13 07:43:02', '2024-01-13 07:43:02'),
(4, 'Kennedy Bonner', 'naqavyf@mailinator.com', 'citebylaw', '$2y$10$bf9fV5YqXoROrrN1XAwOlOG34ZHye4/92xiutSO/Cc98Mcq2pAMKu', NULL, '2024-01-13 10:42:14', '2024-01-13 10:42:14'),
(5, 'Vance Villarreal', 'picupaqi@mailinator.com', 'cisygex', '$2y$10$WqqqHVX3P6XRbCTD/7vyAuMnVKH.fOsEj9eadnBljW05VEts1VctG', NULL, '2024-01-14 04:29:44', '2024-01-14 04:29:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abouts_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counters_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heroes_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolios_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_icons_user_id_foreign` (`user_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_infos`
--
ALTER TABLE `personal_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `counters`
--
ALTER TABLE `counters`
  ADD CONSTRAINT `counters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `heroes`
--
ALTER TABLE `heroes`
  ADD CONSTRAINT `heroes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD CONSTRAINT `personal_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD CONSTRAINT `social_icons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
