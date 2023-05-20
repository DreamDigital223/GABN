-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 20 mai 2023 à 16:25
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abonnement`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

DROP TABLE IF EXISTS `abonnements`;
CREATE TABLE IF NOT EXISTS `abonnements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `decoder_id` bigint UNSIGNED DEFAULT NULL,
  `abonnement_type_id` bigint UNSIGNED DEFAULT NULL,
  `shop_id_abonnement` bigint UNSIGNED DEFAULT NULL,
  `user_id_abn` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_time` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abonnements_decoder_id_foreign` (`decoder_id`),
  KEY `abonnements_abonnement_type_id_foreign` (`abonnement_type_id`),
  KEY `fk_shopse` (`shop_id_abonnement`),
  KEY `fk_user` (`user_id_abn`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `StartDate`, `EndDate`, `decoder_id`, `abonnement_type_id`, `shop_id_abonnement`, `user_id_abn`, `created_at`, `updated_at`, `date_time`) VALUES
(67, '2023-05-11', '2023-06-11', NULL, 9, NULL, NULL, '2023-05-08 17:09:41', '2023-05-09 22:02:10', '2023-05-08'),
(69, '2023-05-09', '2023-06-09', NULL, 3, NULL, NULL, '2023-05-09 17:17:38', '2023-05-09 17:17:38', '2023-05-09'),
(74, '2023-05-09', '2023-06-09', NULL, 9, NULL, NULL, '2023-05-10 16:36:27', '2023-05-10 16:36:27', '2023-05-10'),
(75, '2023-04-19', '2023-05-20', NULL, 9, NULL, NULL, '2023-05-10 17:01:12', '2023-05-17 20:30:32', '2023-05-10'),
(76, '2023-04-18', '2023-05-19', NULL, 7, NULL, NULL, '2023-05-10 19:29:06', '2023-05-17 20:31:18', '2023-05-10'),
(77, '2023-05-11', '2023-06-11', NULL, 8, NULL, NULL, '2023-05-11 09:42:06', '2023-05-11 09:42:06', '2023-05-11'),
(82, '2023-05-12', '2023-06-12', NULL, 8, NULL, NULL, '2023-05-12 15:15:43', '2023-05-12 15:15:43', '2023-05-12'),
(83, '2023-05-19', '2023-06-19', NULL, 8, NULL, NULL, '2023-05-12 15:15:59', '2023-05-12 15:15:59', '2023-05-12'),
(84, '2023-05-13', '2023-06-13', NULL, 9, NULL, NULL, '2023-05-12 15:16:16', '2023-05-12 15:16:16', '2023-05-12'),
(86, '2023-05-18', '2023-06-18', NULL, 9, NULL, NULL, '2023-05-12 15:16:48', '2023-05-12 15:16:48', '2023-05-12'),
(87, '2023-04-13', '2023-05-14', NULL, 8, 2, 11, '2023-05-12 18:13:58', '2023-05-12 18:13:58', '2023-05-12'),
(88, '2023-04-16', '2023-05-17', NULL, 8, 2, 11, '2023-05-14 14:08:50', '2023-05-14 14:08:50', '2023-05-14'),
(89, '2023-05-16', '2023-06-16', NULL, 8, 2, 11, '2023-05-16 10:37:35', '2023-05-16 10:37:35', '2023-05-16'),
(91, '2023-05-17', '2023-06-17', NULL, 9, 2, 11, '2023-05-17 20:41:12', '2023-05-17 20:41:12', '2023-05-17'),
(92, '2023-04-20', '2023-05-21', NULL, 8, 2, 11, '2023-05-18 10:34:25', '2023-05-18 10:34:25', '2023-05-18'),
(93, '2023-05-17', '2023-06-17', NULL, 3, 2, 11, '2023-05-18 18:54:20', '2023-05-18 18:54:20', '2023-05-18'),
(94, '2023-04-20', '2023-05-21', 33, 9, 2, 11, '2023-05-19 11:16:47', '2023-05-19 11:16:47', '2023-05-19'),
(95, '2023-05-21', '2023-06-21', 33, 9, 2, 11, '2023-05-19 11:17:01', '2023-05-19 11:17:01', '2023-05-19');

-- --------------------------------------------------------

--
-- Structure de la table `abonnement_types`
--

DROP TABLE IF EXISTS `abonnement_types`;
CREATE TABLE IF NOT EXISTS `abonnement_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Designation_abn` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prix` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `decoder_type_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_decoder_type` (`decoder_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `abonnement_types`
--

INSERT INTO `abonnement_types` (`id`, `Designation_abn`, `prix`, `created_at`, `updated_at`, `decoder_type_id`) VALUES
(1, 'ACCESS', 5000, NULL, NULL, 1),
(2, 'EVASION', 10000, '2023-04-12 15:03:38', '2023-04-12 15:03:38', 1),
(3, 'ESSENTIEL +', 13000, '2023-04-12 15:04:08', '2023-04-12 15:04:08', 1),
(4, 'ACCESS +', 15000, '2023-04-12 15:04:31', '2023-04-12 15:04:31', 1),
(5, 'EVASION', 20000, '2023-04-12 15:04:52', '2023-04-12 15:04:52', 1),
(6, 'TOUT CANAL +', 40000, '2023-04-12 15:05:42', '2023-04-12 15:05:42', 1),
(7, 'Bouquet Découverte +', 5000, '2023-04-12 15:06:01', '2023-04-12 15:06:01', 2),
(8, 'Bouquet Malivision +', 12000, '2023-04-12 15:06:19', '2023-04-12 15:06:19', 2),
(9, 'Bouquet Horonya', 15000, '2023-04-14 00:15:49', '2023-04-14 00:15:49', 2);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `LastName` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quartier` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `shop_id_client` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shop` (`shop_id_client`),
  KEY `fk_usersss` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `FirstName`, `LastName`, `phone`, `quartier`, `user_id`, `shop_id_client`, `created_at`, `updated_at`) VALUES
(21, 'KONE', 'Siaka', '40406085', 'TOROKOROBOUGOU', NULL, NULL, '2023-05-09 11:52:30', '2023-05-11 18:21:49'),
(23, 'Kone', 'Amadou', '89898989', 'Faladie', NULL, NULL, '2023-05-10 20:27:57', '2023-05-10 20:27:57'),
(24, 'SIDIBE', 'AMI', '80965210', 'MAGNABOUGOU', NULL, NULL, '2023-05-11 11:20:12', '2023-05-11 11:21:05'),
(25, 'KOÏTA', 'Hatoumata', '56565652', 'Kalaban', NULL, NULL, '2023-05-11 18:21:25', '2023-05-18 10:38:29'),
(26, 'korokoss', 'Adama', '89898989', 'golf', NULL, NULL, '2023-05-12 11:11:05', '2023-05-12 11:11:05'),
(28, 'Cissé', 'Adama', '45654565', 'Hamdallaye', NULL, NULL, '2023-05-12 11:12:38', '2023-05-12 11:12:38'),
(30, 'SIDIBE', 'Aminata', '41414141', 'Yirimadjô', NULL, NULL, '2023-05-12 11:14:59', '2023-05-12 11:14:59'),
(31, 'KOUNTA', 'Mamadou', '96969696', 'KOROFINA', 11, 2, '2023-05-14 16:23:32', '2023-05-16 10:42:53'),
(32, 'KOUNTA', 'Amadou', '89898989', 'Golf', 11, 2, '2023-05-18 10:36:21', '2023-05-18 10:36:21');

-- --------------------------------------------------------

--
-- Structure de la table `decoders`
--

DROP TABLE IF EXISTS `decoders`;
CREATE TABLE IF NOT EXISTS `decoders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `decoder_type_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `shop_id_decoder` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client` (`client_id`),
  KEY `fk_shops` (`shop_id_decoder`),
  KEY `fk_uers` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `decoders`
--

INSERT INTO `decoders` (`id`, `Number`, `decoder_type_id`, `client_id`, `user_id`, `shop_id_decoder`, `created_at`, `updated_at`) VALUES
(31, '05484954959656', 2, 24, 11, 2, '2023-05-19 11:15:24', '2023-05-19 11:15:24'),
(32, '741025896304455', 2, 25, 11, 2, '2023-05-19 11:15:53', '2023-05-19 11:15:53'),
(33, '741258963258855', 2, 23, 11, 2, '2023-05-19 11:16:25', '2023-05-19 11:16:25');

-- --------------------------------------------------------

--
-- Structure de la table `decoder_types`
--

DROP TABLE IF EXISTS `decoder_types`;
CREATE TABLE IF NOT EXISTS `decoder_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Designation_deco` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `decoder_types`
--

INSERT INTO `decoder_types` (`id`, `Designation_deco`, `created_at`, `updated_at`) VALUES
(1, 'Canal plus', NULL, NULL),
(2, 'Malivision', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(64, '2014_10_12_000000_create_users_table', 1),
(65, '2014_10_12_100000_create_password_resets_table', 1),
(66, '2019_08_19_000000_create_failed_jobs_table', 1),
(67, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(68, '2023_03_19_210256_create_clients_table', 1),
(69, '2023_03_20_091127_create_shops_table', 1),
(70, '2023_03_20_092459_create_decoder_types_table', 1),
(71, '2023_03_20_092631_create_abonnement_types_table', 1),
(72, '2023_03_20_101711_create_decoders_table', 1),
(73, '2023_03_20_103046_create_abonnements_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `designation`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur'),
(3, 'Pas de role');

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mail` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`id`, `libelle`, `adresse`, `mail`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'Non Reconnu', 'iconnu', 'inconnu@gmail.com', '00000000', NULL, NULL),
(5, 'Djiguiba', 'Golf', 'seyd@gmail.com', '20589347', '2023-04-28 19:13:57', '2023-04-28 19:13:57'),
(6, 'Etablissement Fati', 'FALADIE', 'etabliss@gmail.com', '20202020', '2023-05-09 15:42:18', '2023-05-09 15:45:55');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `role_id` int DEFAULT '3',
  `shops_id_user` bigint UNSIGNED DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `user_id_user` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_shopss` (`shops_id_user`),
  KEY `fk_role` (`role_id`),
  KEY `fk_users_id` (`user_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `shops_id_user`, `created_at`, `updated_at`, `phone`, `user_id_user`) VALUES
(2, 'Mohamed M TRAORE', 'mohamed@gmail.com', NULL, '$2y$10$QkPyUK/DJ5hEfWvfM2/pGODnEsFRt6KmvPKRiUbPT3aIhZ6Ulglr6', 'jGdeItQGwHSqpsEaggQvy0yTL2Wg45E6HjVR73sYbhK31DGsQlec1FDxAzpH', 2, 5, '2023-04-26 10:25:13', '2023-05-06 18:01:36', 89898989, NULL),
(11, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$WhaH2357GEJHFftmyuV7Vu3T29wXul0434zRjFJKx4X6/MuISoVAK', 'ApfmO2heodFOjC0O0aMAWNvIbFcxdqJZXApsYIbYldHY6L2ZPcCMX5kVdCBE', 1, 2, '2023-05-12 15:45:00', '2023-05-12 15:45:00', 89898989, NULL),
(12, 'po', 'po@gmail.com', NULL, '$2y$10$If6yIpK1ce.iv7iqBj0XN.qqjcCuU5VtfN8bDO13l3f9t5UwRQe1e', NULL, 2, 6, '2023-05-14 16:16:46', '2023-05-14 16:32:59', 89897575, 11),
(13, 'admkk', 'mo@gmail.com', NULL, '$2y$10$hSOmlq1YHVIA3o6hFERTTejIqDjuxX8qgBUZRjEiDrjuVq6H0O5Ny', NULL, 2, 6, '2023-05-18 18:47:41', '2023-05-18 18:52:12', 54558201, 11);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `fk_abanaba` FOREIGN KEY (`abonnement_type_id`) REFERENCES `abonnement_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_decodeco` FOREIGN KEY (`decoder_id`) REFERENCES `decoders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shopse` FOREIGN KEY (`shop_id_abonnement`) REFERENCES `shops` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id_abn`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `abonnement_types`
--
ALTER TABLE `abonnement_types`
  ADD CONSTRAINT `fk_decoder_type` FOREIGN KEY (`decoder_type_id`) REFERENCES `decoder_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_shop` FOREIGN KEY (`shop_id_client`) REFERENCES `shops` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usersss` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `decoders`
--
ALTER TABLE `decoders`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shops` FOREIGN KEY (`shop_id_decoder`) REFERENCES `shops` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shopssses` FOREIGN KEY (`shops_id_user`) REFERENCES `shops` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`user_id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
