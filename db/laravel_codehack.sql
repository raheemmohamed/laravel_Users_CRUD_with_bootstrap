-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 04:57 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_codehack`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_10_05_115452_create_posts_table', 1),
('2018_10_05_115656_create_roles_table', 1),
('2018_10_06_150257_add_photo_id_colum_user_table', 2),
('2018_10_06_152108_create_photos_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '15389092072.jpg', '2018-10-07 05:16:47', '2018-10-07 05:16:47'),
(2, '15389093222015_bmw_i8_47_1920x1080.jpg', '2018-10-07 05:18:42', '2018-10-07 05:18:42'),
(3, '15389099862.jpg', '2018-10-07 05:29:46', '2018-10-07 05:29:46'),
(4, '15389101012.jpg', '2018-10-07 05:31:41', '2018-10-07 05:31:41'),
(5, '15389103802015_bmw_i8_47_1920x1080.jpg', '2018-10-07 05:36:20', '2018-10-07 05:36:20'),
(6, '15389104252.jpg', '2018-10-07 05:37:05', '2018-10-07 05:37:05'),
(7, '15389105172.jpg', '2018-10-07 05:38:37', '2018-10-07 05:38:37'),
(8, '15389106092015_bmw_i8_47_1920x1080.jpg', '2018-10-07 05:40:09', '2018-10-07 05:40:09'),
(9, '15389106612015_bmw_i8_47_1920x1080.jpg', '2018-10-07 05:41:01', '2018-10-07 05:41:01'),
(10, '1538922793001 - jDOQ0tZ.jpg', '2018-10-07 09:03:13', '2018-10-07 09:03:13'),
(11, '1538922903001 - jDOQ0tZ.jpg', '2018-10-07 09:05:03', '2018-10-07 09:05:03'),
(12, '1538923666003 - TNYnS0h.jpg', '2018-10-07 09:17:46', '2018-10-07 09:17:46'),
(13, '15389300140c673fe06e0d5e112c92d90bba49a9e7a91e2dd32624c81fb96e0106b37a3558.jpg', '2018-10-07 11:03:34', '2018-10-07 11:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Subcriber', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  `active_id` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `active_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo_id`) VALUES
(1, 1, 1, 'Raheem', 'mohamedraheem0666@gmail.com', '$2y$10$Z1840t2hybk/oXjx9WndOeqSQJzH3FCgBAtY9ZqIgLAd8jsN9VB/S', 'U5xaQedm9tbiUn1F4RK1g0oU21JGFf4hEPtfQRBO4iKFjFqSn3sMqiB1bSb0', '2018-10-05 06:30:01', '2018-10-07 10:37:03', 2),
(3, 1, 1, 'Younus', 'younus@gmail.com', '$2y$10$GijYyhZVSgLl6TSUQkbTpuCP28KvwCwlWgC9pUApqUlTlMe4XF2qK', NULL, '2018-10-06 06:54:39', '2018-10-07 09:17:47', 12),
(4, 1, 1, 'dsasdasd', 'dasdas@gmail.com', '$2y$10$ISDsaMihb6QI2pnp2ctypOnmnxwVUckxfEFXj1gE5JCS2RARIgyXa', NULL, '2018-10-06 07:34:13', '2018-10-06 07:34:13', 3),
(6, 1, 1, 'test', 'test@gmail.com', '$2y$10$AUyZj7dqGNKqoqcuEjiG.u7wDmJ1N.RiA8xEvVlTu7oJuDnA9/qR2', 'LPyPdgDLQuFbrDfCohWTA5x9b2IBcm6i7YFrE8XTjBMVQra4I4SGo8TzTlGa', '2018-10-06 09:30:07', '2018-10-06 09:30:44', 4),
(7, 1, 1, 'test', 'dadas@dsadsa', '$2y$10$e5NIvvRgVVT0aE8eKofXT.YvYYGHCFe.CzqhJdk7SkwLvZOWF9a46', NULL, '2018-10-07 05:16:47', '2018-10-07 05:16:47', 5),
(8, 1, 1, 'saedasd', 'sadsdd@dasdasd', '$2y$10$T0D.I3JJ3gUJ6mx0AaacN.kpaSS39XozeQAfB0AhEpi5Xc8sDfCxa', NULL, '2018-10-07 05:29:46', '2018-10-07 05:29:46', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
