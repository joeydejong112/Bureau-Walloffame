-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 08:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bureau`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klassen`
--

CREATE TABLE `klassen` (
  `id` int(11) NOT NULL,
  `klas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klassen`
--

INSERT INTO `klassen` (`id`, `klas`) VALUES
(1, '2md1'),
(2, '2md2'),
(3, '2md3'),
(4, '2md4');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_18_100407_create_roles_table', 1),
(5, '2019_12_18_100632_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joeydejong1112@gmail.com', '$2y$10$xVbdF6uA9sSEqNiccdNo1ujl282DVDCRgzjyt6vMaSdz44pz0ciKG', '2020-01-22 08:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'A regular user', '2019-12-18 09:12:28', '2019-12-18 09:12:28'),
(2, 'admin', 'An admin user', '2019-12-18 09:12:28', '2019-12-18 09:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(16, 1, 17),
(17, 1, 18),
(18, 1, 19),
(19, 1, 20),
(20, 1, 21),
(21, 1, 22),
(22, 1, 23),
(23, 1, 24),
(24, 1, 25),
(25, 1, 26),
(26, 1, 27),
(27, 1, 30),
(28, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://media.giphy.com/media/l0MYtjhrNDLnlKf28/source.gif',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `opleiding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nog niet opgegeven',
  `github` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://github.com/',
  `gitlab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://about.gitlab.com/',
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://www.linkedin.com/',
  `klas` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nog niet opgegeven',
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nog niet opgegeven',
  `contactemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nog niet opgegeven',
  `rank` int(255) NOT NULL DEFAULT 0,
  `klas_vote` tinyint(1) NOT NULL DEFAULT 0,
  `global_vote` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `background`, `profile_image`, `opleiding`, `github`, `gitlab`, `linkedin`, `klas`, `about`, `website`, `contactemail`, `rank`, `klas_vote`, `global_vote`) VALUES
(22, 'Joey de Jong112', 'joeydejong1112@gmail.com', NULL, '$2y$10$w3ZnC5dvAxkIYmZvqBgRNeYS9fTIP7rcKpWGNBwJxi218eryd5KbW', 'i1KbyoraWINQ066I5WmazfWcS6MnTpSexZzlktcedhF9Ff53CBpinwPIPqMC', '2020-01-29 08:53:29', '2020-01-29 08:53:29', '#FF5732', 'aerial-view-of-seashore-near-large-grey-rocks-853199.jpg', 'Nog niet opgegeven', 'https://github.com/', 'https://about.gitlab.com/', 'https://github.com/', '2md1', 'lorsds', 'Nog niet opgegeven', 'Nog niet opgegeven', 39, 1, 1),
(23, 'Kees', '112@gmail.com', NULL, '$2y$10$nReHsYuJ32LoJ9mgqWqBNOOG.JZT9Df/9QWSzpJ2gpUkcfSQgcS7G', NULL, '2020-01-29 08:54:14', '2020-01-29 08:54:14', 'https://media.giphy.com/media/tJqyalvo9ahykfykAj/source.gif', 'KAPPA-HURTADO-AUTH-HOODIE-303WH20-903.jpg', 'Nog niet opgegeven', 'https://github.com/', 'https://about.gitlab.com/', 'https://github.com/', '2md2', 'Nog niet opgegeven', 'Nog niet opgegeven', 'Nog niet opgegeven', 74, 0, 0),
(24, 'henk', '22@gmail.com', NULL, '$2y$10$xvmRoFyc1T3vfIdJ7W54c.yfKZuPoIeL0a4pifhg7wC/2GeBJXvCq', NULL, '2020-01-29 08:56:45', '2020-01-29 08:56:45', 'https://media.giphy.com/media/l0MYtjhrNDLnlKf28/source.gif', 'c78.png', 'Nog niet opgegeven', 'https://github.com/', 'https://about.gitlab.com/', 'https://github.com/', '2md1', 'Nog niet opgegeven', 'Nog niet opgegeven', 'Nog niet opgegeven', 12, 0, 0),
(25, 'happyfeet', '44@gmail.com', NULL, '$2y$10$GfyZRmhiVWCdxgscBavGDeh.9m4HZ18GPSeLcO5bNFHV3d9HY262q', NULL, '2020-01-29 08:57:06', '2020-01-29 08:57:06', 'https://media.giphy.com/media/K4uXdqGyYGRLq/source.gif', '5e482f5c0ad53061641b612e3c2de.jpg', 'Media developer', 'https://github.com/', 'https://about.gitlab.com/', 'https://github.com/', '2md3', 'Mijn naam is bart test', 'www.twitch.tv/xqcow', '5435345@gmail.com', 26, 0, 0),
(26, 'halllo112', 'test@gmail.com', NULL, '$2y$10$xcOewctN0QfK2X5nVnTZb.fvTqZo8BpRg0uSM/5/hAcBcSf2Pwkby', NULL, '2020-02-03 10:50:01', '2020-02-03 10:50:01', 'https://media.giphy.com/media/l0MYtjhrNDLnlKf28/source.gif', 'maxresdefault.jpg', 'Nog niet opgegeven', 'https://github.com/', 'https://about.gitlab.com/', 'https://github.com/', '2md3', 'Nog niet opgegeven', 'Nog niet opgegeven', 'Nog niet opgegeven', 11, 0, 0),
(27, 'test', '334@gmail.com', NULL, '$2y$10$/hu5.SJhOTBppJfwVjYGB.tt.s5uBuwwQaizVafqZHYeDMXA2XqBO', NULL, '2020-02-04 08:55:11', '2020-02-04 08:55:11', 'https://media.giphy.com/media/l0MYtjhrNDLnlKf28/source.gif', '4470890_0.jpg', 'Nog niet opgegeven', 'https://github.com/', 'https://about.gitlab.com/', 'https://github.com/', '2md3', 'Nog niet opgegeven', 'Nog niet opgegeven', 'Nog niet opgegeven', 1, 0, 0),
(30, 'dsd', '11332@gmail.com', NULL, '$2y$10$z0/5nUvtd/1vb6lDlo.70uHGF8I3lCtmR/imb52NjroXl0okxq5ZS', NULL, '2020-02-24 23:16:48', '2020-02-24 23:16:48', 'https://media.giphy.com/media/l0MYtjhrNDLnlKf28/source.gif', 'download.jfif', 'Nog niet opgegeven', 'https://github.com/', 'https://about.gitlab.com/', 'https://github.com/', '2md2', 'Nog niet opgegeven', 'Nog niet opgegeven', 'Nog niet opgegeven', 0, 1, 0),
(31, 'joey', 'joeydejong11112@gmail.com', NULL, '$2y$10$mC./npDAXMB45AMUInrFdOwtN/Zs31pnHVt6BRdccz8d7VEVNcw5y', NULL, '2020-02-28 14:21:51', '2020-02-28 14:21:51', 'green', 'KAPPA-HURTADO-AUTH-HOODIE-303WH20-903.jpg', 'Nog niet opgegeven', 'https://gitlab.glu.nl/529521/bureau---walloffame', 'https://gitlab.glu.nl/529521/bureau---walloffame', 'https://gitlab.glu.nl/529521/bureau---walloffame', '2md2', 'Nog niet opgegeven', 'Nog niet opgegeven', 'Nog niet opgegeven', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersss`
--

CREATE TABLE `usersss` (
  `id` int(11) NOT NULL,
  `background` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `opleiding` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `gitlab` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersss`
--

INSERT INTO `usersss` (`id`, `background`, `profile_image`, `naam`, `opleiding`, `github`, `gitlab`, `linkedin`) VALUES
(1, 'https://media.giphy.com/media/da6Lbw6ONnz2u0Kbcr/source.mov', 'https://media.giphy.com/media/KFbOunmsNDc6azzOG2/source.gif', 'Kaas', 'webdev', 'test', 'test', 'test'),
(2, 'https://media0.giphy.com/media/Y0tXDoKgJyIx8Zot2t/giphy.gif?cid=790b76116f180afd2f094f97e3ad395b4afed608d4131086&rid=giphy.gif', 'https://media.giphy.com/media/l378BVyr0qsnDusJa/source.gif', 'Joey', 'Kaas opleiding', 'test', 'test', 'test'),
(3, 'https://media.giphy.com/media/48FhEMYGWji8/source.gif', 'https://media2.giphy.com/media/l0MYLePFMI1m69fpu/giphy.gif?cid=790b7611fd95fb48af8054157f59b1130e910892baefd306&rid=giphy.gif', 'denk', 'webdev', 'test', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klassen`
--
ALTER TABLE `klassen`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usersss`
--
ALTER TABLE `usersss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klassen`
--
ALTER TABLE `klassen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `usersss`
--
ALTER TABLE `usersss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
