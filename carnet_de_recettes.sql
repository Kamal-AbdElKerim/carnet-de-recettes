-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 fév. 2024 à 16:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carnet_de_recettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'Appetizers and Snacks', NULL, NULL),
(3, 'Soups and Salads', NULL, NULL),
(4, 'Main Courses', NULL, NULL),
(5, 'Side Dishes', NULL, NULL),
(6, 'Pasta and Noodles', NULL, NULL),
(7, 'Desserts', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commitments`
--

CREATE TABLE `commitments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commit` longtext NOT NULL,
  `start` int(11) DEFAULT NULL,
  `posts_id` bigint(20) UNSIGNED NOT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `has_reviewed` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commitments`
--

INSERT INTO `commitments` (`id`, `commit`, `start`, `posts_id`, `User_id`, `has_reviewed`, `created_at`, `updated_at`) VALUES
(222, 'cool', 5, 17, 4, 1, '2024-02-01 10:04:40', '2024-02-01 12:03:22'),
(223, 'sa', 4, 18, 4, 1, '2024-02-01 10:09:09', '2024-02-01 10:09:09'),
(230, 'islam col', 1, 19, 4, 1, '2024-02-01 12:40:08', '2024-02-01 12:40:18');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_29_133727_create_categories_table', 1),
(6, '2024_01_29_134131_create_posts_table', 1),
(7, '2024_01_29_210449_add_column_to_posts', 2),
(8, '2024_01_30_141257_create_commitments_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `bio` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `bio`, `image`, `category_id`, `User_id`, `created_at`, `updated_at`) VALUES
(17, 'Grilled Lemon Herb Chicken Skewers', 'Hi there! I\'m [Your Name], a passionate home cook who loves creating simple and flavorful recipes. My culinary journey began in my grandmother\'s kitchen, where I learned the art of combining fresh ingredients and traditional flavors. I believe that good food brings people together, and my recipes are a reflection of my love for sharing delicious meals with family and friends. Join me on this culinary adventure, and let\'s make cooking an enjoyable experience for everyone!', 'stock_images/1706785460_grilled-lemon-chicken-skewers_thecozyapron_05-23-16_1-Edit.jpg', 2, 4, '2024-02-01 10:04:21', '2024-02-01 10:04:21'),
(18, 'Quinoa Salad with Roasted Vegetables', 'Hello, food enthusiasts! I\'m [Your Name], a health-conscious home chef with a love for vibrant and nutritious dishes. My recipes are inspired by a desire to create wholesome meals that not only taste delicious but also nourish the body. Cooking is my creative outlet, and I\'m excited to share my favorite recipes with you. Join me on a journey to discover the joy of balanced and flavorful eating!', 'stock_images/1706785562_téléchargement (1).jpeg', 6, 4, '2024-02-01 10:06:02', '2024-02-01 10:06:02'),
(19, 'Spaghetti Carbonara', 'Hey, fellow foodies! I\'m [Your Name], a lover of all things pasta. My kitchen is my happy place, and I believe that a good plate of spaghetti can brighten any day. Join me in exploring the simple yet exquisite world of Italian cuisine, where every bite tells a story of tradition and flavor. From my kitchen to yours, let\'s savor the joy of a perfectly crafted Spaghetti Carbonara!', 'stock_images/1706795002_p1.jpg', 3, 4, '2024-02-01 10:01:55', '2024-02-01 12:43:22');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'islam', 'kamal.karim19988@gmail.com', NULL, '$2y$12$OwYgfEulIsDXMgjU1lJfNejChIQP71r86DnHhfgzEqWG2lNBG7Z5u', NULL, '2024-01-29 13:26:34', '2024-01-29 13:26:34'),
(5, 'sssssss', 'kamal.karim199s88@gmail.com', NULL, '$2y$12$6EiWATWMjKU.EWYXWE2/PeV6rZw/JcQva95M3XjcIXYYxxh/74/SS', NULL, '2024-01-29 13:30:05', '2024-01-29 13:30:05'),
(6, 'szs', 'kamal.karim199d88@gmail.com', NULL, '$2y$12$bHu/Ur.vVnom.g5eu3nIY.czw/1j1.aVifGpwA5Hh0WRTwG/iuwd6', NULL, '2024-01-29 13:31:14', '2024-01-29 13:31:14'),
(7, 'iiiiis', 'kamal.ksaarim19988@gmail.com', NULL, '$2y$12$iXdccevdMp8G6AYt9IYnC.JlhWyF2IQ3gM08/JfDNcSMydW2t1WLy', NULL, '2024-01-29 14:11:03', '2024-01-29 14:11:03'),
(8, 'qsdsqd', 'kamal.karimqsdsq19988@gmail.com', NULL, '$2y$12$lup5L.5jte7l5S08FkOWquuZ7rozCdsJuua.pSXuXhT0uykN8lw4q', NULL, '2024-01-29 14:11:32', '2024-01-29 14:11:32'),
(9, 'qsdqd', 'kamal.kadsrim19988@gmail.com', NULL, '$2y$12$1qyFYGpYN4cyeHtmZDaJ1.jshtuwuyRHyhFx30sbNYSCS2lTowhLC', NULL, '2024-01-29 14:12:23', '2024-01-29 14:12:23'),
(10, 'kdnjn', 'kamal.karijfnjm19988@gmail.com', NULL, '$2y$12$6z9d4xMl2z1.s3.wt8N7D.b.1vyklR4dry88B5fSlMh67c2cETOIW', NULL, '2024-01-29 14:13:20', '2024-01-29 14:13:20'),
(11, 'rejkgfbezbj', 'kamal.karimbjh19988@gmail.com', NULL, '$2y$12$v7mye.5B9q8ELFicysMdyu5L/xApuORWP/aLi6W2rvGgtZ2/wQDZG', NULL, '2024-01-29 14:18:58', '2024-01-29 14:18:58'),
(12, 'jvbdjbv', 'kamal.karim19jdv988@gmail.com', NULL, '$2y$12$iG9EAJoICm5hj3HU/CZdAuI4tDIxSN72BD0lmwbToZBksqBj3Y7tq', NULL, '2024-01-29 14:20:20', '2024-01-29 14:20:20'),
(13, 'sx', 'kamal.karimxqss19988@gmail.com', NULL, '$2y$12$B9xp/ppW7VA8k89jzIlhSeobXNXJA92jbO5fVhERQvbNj4ZeJPZr.', NULL, '2024-01-29 14:20:50', '2024-01-29 14:20:50'),
(14, 'jnejfe', 'kamal.karim19qsdqsd988@gmail.com', NULL, '$2y$12$YuUbR8KmectFmhMeFtZ22.DV9PMl9yGfKRvubmVGgH36hIhQo7ZTS', NULL, '2024-01-29 14:24:40', '2024-01-29 14:24:40'),
(15, 'zd', 'kamazdzl.karim19988@gmail.com', NULL, '$2y$12$bmo9WPKQyrob.dQNt64l6O7wTJooeJScF3fMdLONG5If9xSO0K3OK', NULL, '2024-01-29 14:27:11', '2024-01-29 14:27:11'),
(16, 'efez', 'kamal.kazdzadarim19988@gmail.com', NULL, '$2y$12$q4n6d9dCoEETJVg8QRtPM.iLDJL0tYOBXcWEQeR1O5uylG5Shpx52', NULL, '2024-01-29 14:29:08', '2024-01-29 14:29:08'),
(17, 'd,sfnjkez', 'kamal.karijhezuifm19988@gmail.com', NULL, '$2y$12$rtSQH0BYcYw0L7Hku.8qpudh9nvMtlgh18lKo8IfOYEQ5D4gC.HK.', NULL, '2024-01-29 14:29:57', '2024-01-29 14:29:57'),
(18, 'knjnj', 'kamal.karim1edf9988@gmail.com', NULL, '$2y$12$V.aq0J09KL91G1RHMtXXnuOX.rOXlr60pVx.a7Gr87rjA4ytPckoy', NULL, '2024-01-29 14:33:43', '2024-01-29 14:33:43'),
(19, 'esf', 'kamal.sefesfkarim19988@gmail.com', NULL, '$2y$12$a/cvfyI9uRHwiD/xZQKYteWj4AwEO1Qi1u7cFo6bEysZLL2b0O5q6', NULL, '2024-01-29 14:34:53', '2024-01-29 14:34:53'),
(20, 'ejkfjj', 'kamal.karim1sjnjshfk9988@gmail.com', NULL, '$2y$12$oS/5I01TtAoNtzB5EsSUx.db..46UOngtcbsqzra9.jmwRKXfZGN6', NULL, '2024-01-29 14:35:46', '2024-01-29 14:35:46'),
(21, 'islam', 'kamal.karim1jhuig9988@gmail.com', NULL, '$2y$12$y0GBjMuUv.eZw5DyZ8nyke4nVq/RnyCUBVbOiw9.Q8TAOXI1ajLsC', NULL, '2024-01-29 14:46:13', '2024-01-29 14:46:13'),
(22, 'islam', 'kamal.karimhjvfxer19988@gmail.com', NULL, '$2y$12$53grro9vE/bzsvmrveLi4.MtZ0.46CfjG5uqwYeOapkYgtmtxCPBW', NULL, '2024-01-29 14:50:33', '2024-01-29 14:50:33'),
(23, 'islam', 'kamal.kariiohiuym19988@gmail.com', NULL, '$2y$12$ZtkyKYBak45FuijV0d1cXekV3976NoyTUDGB85DHRrdX1rZs/dkka', NULL, '2024-01-29 14:51:06', '2024-01-29 14:51:06'),
(24, 'KARIM', 'islam22@gmail.com', NULL, '$2y$12$aDetA2dt8CvYr46LbVmmfu7wFwuDHvLbAt11EXAK6ldEBFR4cTOy.', NULL, '2024-01-30 12:45:49', '2024-01-30 12:45:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commitments`
--
ALTER TABLE `commitments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commitments_user_id_foreign` (`User_id`),
  ADD KEY `commitments_posts_id_foreign` (`posts_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`User_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commitments`
--
ALTER TABLE `commitments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commitments`
--
ALTER TABLE `commitments`
  ADD CONSTRAINT `commitments_posts_id_foreign` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commitments_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
