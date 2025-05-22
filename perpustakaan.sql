-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 10:28 AM
-- Server version: 10.4.27-MariaDB-log
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori_id` char(36) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `user_id`, `judul`, `kategori_id`, `deskripsi`, `jumlah`, `file`, `cover`, `created_at`, `updated_at`) VALUES
('99b8c3bb-eb4e-4d80-b385-5bc49df5e9cf', '99b8c1d2-6473-4c00-b29a-9db3351d3243', 'Poderosa', '99b8c0da-8d6e-4de8-99cd-bc980a7ce277', 'Juana Rosalia sueña con ser escritora. No duda en convertir la ficción en realidad, el problema es que cada nota provoca situaciones imprevistas. Esta novela toca inquietudes de los adolescentes: el amor, la sexualidad, los tatuajes, a la vez que reflexio', 4, 'Poderosa.pdf', 'Poderosa.jpg', '2023-07-24 01:46:09', '2023-07-24 01:46:09'),
('99b8c4eb-df5c-4900-a9da-ca508fd993ad', '99b8c1d2-6473-4c00-b29a-9db3351d3243', 'WINNIE EN LA PLAYA', '99b46cb7-6c26-42b9-91a1-514dfbd1aece', 'Winnie decides she needs a seaside break, so she and Wilbur zoom off to the coast. Winnie makes a beeline for the sea to cool down. Wilbur makes a beeline for anywhere other than the sea-he hates water, and can\'t bear getting wet. Winnie is having so much', 3, 'WINNIE EN LA PLAYA.pdf', 'WINNIE EN LA PLAYA.jpg', '2023-07-24 01:49:28', '2023-08-01 00:48:11'),
('99b8e41c-1a60-4cb1-ae3f-65203b98f353', '99b46cb7-62c1-4ba9-8df1-3f6a26d5a833', 'The hand but not the heart', '99b8c0da-8d6e-4de8-99cd-bc980a7ce277', '\"\"PAUL!\" The young man started, and a delicate flush mantled his handsome face, as he turned to the lady who had pronounced his name in a tone slightly indicative of surprise.\"', 43, 'The hand but not the heart.pdf', 'The hand but not the heart.jpg', '2023-07-24 03:16:40', '2023-07-24 10:17:44'),
('99b8e521-c63c-4478-aede-06d765172178', '99b46cb7-62c1-4ba9-8df1-3f6a26d5a833', 'Wonder', '99b46cb7-6c26-42b9-91a1-514dfbd1aece', 'Wonder is a children\'s novel written by R. J. Palacio,[2] published on 14 February 2012.\r\n\r\nR. J. Palacio wrote Wonder after an incident where her son noticed a girl with a severe facial difference and started to cry. Fearing he would react badly, Palacio', 81, 'Wonder.pdf', 'Wonder.jpg', '2023-07-24 03:19:32', '2023-07-24 03:19:32'),
('99b8e606-5ba4-414a-ad4c-d9e111c15799', '99b46cb7-62c1-4ba9-8df1-3f6a26d5a833', 'The Highwayman', '99b8c0da-8d6e-4de8-99cd-bc980a7ce277', 'The Highwayman is a 2004 novel by R.A. Salvatore set in his world of Corona, as made famous in his DemonWars Saga. The Highwayman tells the story of a young crippled boy named Bransen Garibond. The orphaned son of the Jhesta Tu mystic Sen Wi and the Abell', 6, 'The Highwayman.pdf', 'The Highwayman.jpg', '2023-07-24 03:22:02', '2023-07-24 03:22:02'),
('99b8e6ad-d027-4ebb-9850-3c557687d679', '99b46cb7-62c1-4ba9-8df1-3f6a26d5a833', 'Lost to the Desert Warrior', '99b46cb7-7900-48fe-a08c-b93b458fc240', '\"Walking into the lion\'s den unprotected, Princess?\"\r\n\r\nFor Layla, princess of Tazkhan, her arranged marriage means one thing—a lifetime of cruelty and captivity. Such an unendurable prospect drives her to throw herself at the mercy of Sheikh Raz Al Zahki', 25, 'Lost to the Desert Warrior.pdf', 'Lost to the Desert Warrior.jpg', '2023-07-24 03:23:51', '2023-07-24 03:23:51'),
('99b8e7d1-f368-4cae-9a74-53aa6c4c8555', '99b46cb7-5ec9-4b56-bee7-7f8ba62ca27e', 'Simple Gifts', '99b46cb7-72d1-48a8-a8ab-931fd5186112', 'Bestselling authors Jude Deveraux and Judith McNaught present their most dazzling and wonderful Christmas tales -- the perfect treat for every romantic at heart...\r\nJude Deveraux In the snow-covered hills of Virginia, a young widow finds that miracles rea', 20, 'Simple Gifts.pdf', 'Simple Gifts.jpg', '2023-07-24 03:27:03', '2023-07-24 03:27:03'),
('99b8e850-d270-429c-ac85-3322924c38a8', '99b46cb7-5ec9-4b56-bee7-7f8ba62ca27e', 'Steve Jobs', '99b46cb7-7900-48fe-a08c-b93b458fc240', '\"From the author of the bestselling biographies of Benjamin Franklin and Albert Einstein, this is the exclusive biography of Steve Jobs. Based on more than forty interviews with Jobs conducted over two years--as well as interviews with more than a hundred', 320, 'Steve Jobs.pdf', 'Steve Jobs.jpg', '2023-07-24 03:28:26', '2023-07-24 03:28:26'),
('99b8e894-eff9-426b-b351-9374da5fa76d', '99b46cb7-5ec9-4b56-bee7-7f8ba62ca27e', 'Elon Musk', '99b46cb7-7900-48fe-a08c-b93b458fc240', 'In the spirit of Steve Jobs and Moneyball, Elon Musk is both an illuminating and authorized look at the extraordinary life of one of Silicon Valley\'s most exciting, unpredictable, and ambitious entrepreneurs -- a real-life Tony Stark -- and a fascinating ', 402, 'Elon Musk.pdf', 'Elon Musk.jpg', '2023-07-24 03:29:11', '2023-07-24 03:29:11'),
('99b8e96c-5fbd-46d3-bb25-04e67052a80d', '99b46cb7-5cde-4795-8471-bfc82632cdcf', 'From Barbie to Mortal Kombat', '99b46cb7-6ee6-4351-aa78-0b639101e71a', 'An edition of From Barbie to Mortal Kombat', 3, 'From Barbie to Mortal Kombat.pdf', 'From Barbie to Mortal Kombat.jpg', '2023-07-24 03:31:32', '2023-07-24 03:31:32'),
('99b8e9fb-fa27-48c5-a238-81fde91c3486', '99b46cb7-5cde-4795-8471-bfc82632cdcf', 'Peppa Pig', '99b46cb7-6ee6-4351-aa78-0b639101e71a', 'An edition of Peppa Pig and the Vegetable Garden (2014)', 12, 'Peppa Pig.pdf', 'Peppa Pig.jpg', '2023-07-24 03:33:06', '2023-07-26 06:23:49'),
('99b8ea8c-3e9d-4a68-ab94-079ec041bc0e', '99b46cb7-5cde-4795-8471-bfc82632cdcf', 'Let the Storm Break', '99b4eb12-246d-42ed-aa63-cdcc6ce7c7f7', 'While teenaged Vane discovers more of what it means to be a windwalker and his guardian sylph Audra struggles with her deepest desires, both must band together to face greater challenges than they have ever known.', 12, 'Let the Storm Break.pdf', 'Let the Storm Break.jpg', '2023-07-24 03:34:40', '2023-07-24 03:34:40'),
('99bd1b99-af5e-4477-a7d3-9a764df9501f', '99b46cb7-512f-43da-966f-c7160aa4ca35', 'Lovely Bones', '99b8c0da-8d6e-4de8-99cd-bc980a7ce277', 'After being tricked,raped and murdered 14 year old Susie Salmon watches from heaven how her friends are exchanging rumours about her disappearance, her grief stricken family is trying to move on and how her killer is trying to cover his tracks.', 124, 'Lovely Bones.pdf', 'Lovely Bones.jpg', '2023-07-26 05:35:09', '2023-07-26 05:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` char(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
('99b46cb7-6c26-42b9-91a1-514dfbd1aece', 'Novel', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-6ee6-4351-aa78-0b639101e71a', 'Majalah', '2023-07-21 21:59:31', '2023-07-26 06:24:01'),
('99b46cb7-72d1-48a8-a8ab-931fd5186112', 'Ensiklopedia', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-770c-4f93-8768-ede47fc6b568', 'Manga', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-7900-48fe-a08c-b93b458fc240', 'Biografi', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b4eb12-246d-42ed-aa63-cdcc6ce7c7f7', 'Light novel', '2023-07-22 03:52:49', '2023-07-22 03:52:49'),
('99b4eccd-f0ba-4df2-91d3-74aecd5e9c7b', 'Webtoon', '2023-07-22 03:57:40', '2023-07-22 03:57:40'),
('99b8c0da-8d6e-4de8-99cd-bc980a7ce277', 'Fiction', '2023-07-24 01:38:05', '2023-07-24 01:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_19_112336_create_kategoris_table', 1),
(6, '2023_07_20_085742_create_bukus_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('A','U') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
('99b46cb7-512f-43da-966f-c7160aa4ca35', 'Edwardo Mosciski', 'jpredovic@example.net', '2023-07-21 21:59:30', '$2y$10$UYKD4dbnH2O0gkrGzcrDI.NZVsvi07PX71KtUhx5bAihw7qzrHwai', 'A', 'C9mzZ0reVURvl9LKDTmGQfI9G48vz0K9qf7EnvseaRpTnAO6NtcP4MJsnz8u', '2023-07-21 21:59:31', '2023-07-23 21:29:27'),
('99b46cb7-58a5-4f62-815a-a018110c40c0', 'Jeff Hamill', 'bcormier@example.net', '2023-07-21 21:59:30', '$2y$10$yWBqLcSm/ghheaRrUO7JUOVjvb83YepJN2KzzBe12vSEeElqX8c4m', 'A', 'FiALI4KNAc', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-5acd-450c-b73b-9d1c7f0d016d', 'Ms. Jayne Rau', 'torp.torey@example.com', '2023-07-21 21:59:30', '$2y$10$hfxHEnIiARNQrPbpjKdLauN3F8vC0enUO7qMz7/KAJ51O21AJDbRO', 'A', 'x6IijCfcVI', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-5cde-4795-8471-bfc82632cdcf', 'Jarod Gaylord', 'portiz@example.net', '2023-07-21 21:59:30', '$2y$10$1TV7qsPHUubLxaA399hKSu4csSn4gV3rSKPsWq3PCeQBbeRj5axFC', 'U', 'bdkZLdrUhrVYt3Ow1YFBKnKHDyfx8VxPR3GWCxUBF7VfKDCsofYRBlKqfMw5', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-5ec9-4b56-bee7-7f8ba62ca27e', 'Lawrence Orn', 'liliane.gerhold@example.net', '2023-07-21 21:59:30', '$2y$10$nzit9kHCdsSdb2h6j.9hxe7ZnbARsJDimrJwATKoWb0s9ZPf1Xebi', 'U', 'vFzdWr9XZ02oAfXLDcy47nSWe03lrGQ9iyC7cz1qxrjo17j4eMy8YX6bkTw2', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-60d9-4122-9b52-ba3832b02a04', 'Quinton Lynch', 'michael92@example.org', '2023-07-21 21:59:30', '$2y$10$wgOwC.BEOLWVGachTz7An.sxsZHo/NI6KTAU8wOCXLSCMDt0CYA86', 'A', 'csRpyiYQQD', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-62c1-4ba9-8df1-3f6a26d5a833', 'Maxime Abernathy', 'dayton.donnelly@example.net', '2023-07-21 21:59:30', '$2y$10$rVfhVySyJIUdc64avXYtl.J71X/.NW7sgfJg0sbYs.kQpQJmwnKIi', 'U', 'gBjC52ZDthmsWRyaLFeFz6oKmCGgrYVFGCZDXoN6e3In2q2JQkJBaFQJUdoV', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-64dc-4a40-a909-d2d106c14903', 'Alphonso Walsh', 'mosciski.eusebio@example.net', '2023-07-21 21:59:30', '$2y$10$OQrkTPSgOQv2SvXxZd/2/u9el2Ptj1wOpXbRWFx2lIi25M85vSWzm', 'A', 'HW4jMzCGsH', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-6700-489b-9bb8-0df6e2771e45', 'Anahi Fahey', 'greenfelder.paxton@example.org', '2023-07-21 21:59:30', '$2y$10$yE1sYdFnd.9P/juKxG4xpukwObMw1NomrIQeKvIGNtIKNO1a7HuHS', 'A', '80qP5kG0oM', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b46cb7-695c-46eb-abd1-378a9f103f76', 'Bryon Nader I', 'ewisozk@example.org', '2023-07-21 21:59:30', '$2y$10$QdxTTfA0YIoUuVwqUyEY.ORwE5I9S9iIMVvgAbls9kijbaVUrcWOC', 'A', 'uFzSTXzgvo', '2023-07-21 21:59:31', '2023-07-21 21:59:31'),
('99b8c16d-9c4b-4cd7-baee-459b6030b943', 'Admin', 'admin@gmail.com', '2023-07-24 01:39:41', '$2y$10$97GHcJ3bZ/ehUXk9aCliXuLWb4pOjiSL5G8Ouo27tGDGVVO/pJpLi', 'A', 'SWi5zpXgonbHeyvn2JIB1YBQjJTOEWGkQggWYIt9OaSvPs7bahT4xe5dGsBd', '2023-07-24 01:39:42', '2023-07-24 01:39:42'),
('99b8c1d2-6473-4c00-b29a-9db3351d3243', 'User', 'user@gmail.com', '2023-07-24 01:40:47', '$2y$10$fDv.73uS89dmjAKZvmcyq.gwV6.hnVd9FvBLbj2b3Q01L67PiBHSW', 'U', 'hkO117nIlYGjBO6b9pXBfIJvb3Lbvg6HdzQCUF3p7aI7BIauP8V5ptDfxb3Q', '2023-07-24 01:40:48', '2023-07-24 01:41:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_user_id_foreign` (`user_id`),
  ADD KEY `buku_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
