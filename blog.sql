-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 08:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(26, 1, 3, '2024-07-06 20:19:42', '2024-07-06 20:19:42'),
(29, 1, 2, '2024-07-06 20:25:35', '2024-07-06 20:25:35'),
(31, 2, 6, '2024-07-06 20:48:34', '2024-07-06 20:48:34'),
(32, 2, 2, '2024-07-06 20:48:52', '2024-07-06 20:48:52'),
(44, 2, 8, '2024-07-06 21:32:28', '2024-07-06 21:32:28'),
(46, 3, 6, '2024-07-06 21:40:37', '2024-07-06 21:40:37'),
(48, 3, 8, '2024-07-06 22:00:42', '2024-07-06 22:00:42'),
(49, 3, 3, '2024-07-06 22:00:46', '2024-07-06 22:00:46'),
(50, 3, 2, '2024-07-06 22:09:15', '2024-07-06 22:09:15'),
(53, 2, 4, '2024-07-07 01:18:03', '2024-07-07 01:18:03'),
(54, 2, 10, '2024-07-07 01:21:04', '2024-07-07 01:21:04'),
(57, 2, 9, '2024-07-07 01:44:23', '2024-07-07 01:44:23'),
(59, 2, 3, '2024-07-07 01:48:05', '2024-07-07 01:48:05'),
(60, 2, 11, '2024-07-07 01:48:07', '2024-07-07 01:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2024_07_05_084900_create_posts_table', 1),
(22, '2024_07_05_224721_create_likes_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `image`, `title`, `description`, `is_public`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'storage/images/post/1720219916.jpg', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 0, 1, '2024-07-05 18:51:56', '2024-07-05 19:38:01'),
(2, 1, 'storage/images/post/1720219917.jpg', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 1, 1, '2024-07-05 18:51:57', '2024-07-06 17:32:35'),
(3, 1, 'storage/images/post/1720219952.jpg', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 1, 1, '2024-07-05 18:52:32', '2024-07-05 19:38:29'),
(4, 1, 'storage/images/post/1720222757.jpg', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 1, 1, '2024-07-05 19:39:17', '2024-07-06 17:33:07'),
(5, 1, 'storage/images/post/1720222840.jpg', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit', 'hello world', 0, 1, '2024-07-05 19:40:40', '2024-07-05 19:40:40'),
(6, 1, 'storage/images/post/1720223002.jpg', 'Nullam nibh mi, tincidunt sed sapien', 'Nullam nibh mi, tincidunt sed sapien', 1, 1, '2024-07-05 19:43:23', '2024-07-05 19:43:48'),
(8, 2, 'storage/images/post/1720314598.jpg', 'Hello world', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam nulla consequatur perspiciatis mollitia. <br /></p>', 1, 1, '2024-07-06 21:10:00', '2024-07-06 21:32:00'),
(9, 2, 'storage/images/post/1720329534.jpg', 'Vitae in et do eos', 'Magnam quae consecte', 1, 1, '2024-07-07 01:18:54', '2024-07-07 01:18:54'),
(10, 2, 'storage/images/post/1720329652.jpg', 'Eum voluptates id se', 'Libero itaque offici', 1, 1, '2024-07-07 01:20:52', '2024-07-07 01:20:52'),
(11, 2, 'storage/images/post/1720331058.jpg', 'Quod non ex commodo', 'Fugiat iusto blandi', 1, 1, '2024-07-07 01:44:18', '2024-07-07 01:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `image`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sybill Barrett', 'tikirijyz@mailinator.com', NULL, '', '1', '$2y$10$kLMrMN8Ca97TS0YlGZegl.Zk0AV1cqFb1Xwk2UMnP111ms9kv1YTO', NULL, '2024-07-05 18:49:34', '2024-07-05 18:49:34'),
(2, 'Ray Bradley', 'admin@admin.com', NULL, '', '1', '$2y$10$sWHUGxuRmILgY//2NcMJmuo5Y.fELNlt0L03dJq7NuWoaWV7Yy5Kq', NULL, '2024-07-06 20:47:21', '2024-07-06 20:47:21'),
(3, 'Jemima Harrell', 'zuqe@mailinator.com', NULL, '', '1', '$2y$10$KV99zB4G.m4ZpfVONky81.QWWoWoTQRwUQweXqgRdAB1yuPc159Vy', NULL, '2024-07-06 21:39:24', '2024-07-06 22:22:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
