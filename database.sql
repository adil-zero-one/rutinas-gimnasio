-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2026 at 09:26 PM
-- Server version: 8.4.3
-- PHP Version: 8.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rutinas_gimnas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-adil.chainakh@insbaixdwedcamp.cat|127.0.0.1', 'i:1;', 1777978175),
('laravel-cache-adil.chainakh@insbaixdwedcamp.cat|127.0.0.1:timer', 'i:1777978175;', 1777978175),
('laravel-cache-adil.chainakh@wsswinsbaixcamp.cat|127.0.0.1', 'i:1;', 1777978149),
('laravel-cache-adil.chainakh@wsswinsbaixcamp.cat|127.0.0.1:timer', 'i:1777978149;', 1777978149),
('laravel-cache-adil.chainakhde@insbaixcamp.cat|127.0.0.1', 'i:1;', 1777978189),
('laravel-cache-adil.chainakhde@insbaixcamp.cat|127.0.0.1:timer', 'i:1777978189;', 1777978189),
('laravel-cache-tweakedits@gmail.com|127.0.0.1', 'i:1;', 1777978132),
('laravel-cache-tweakedits@gmail.com|127.0.0.1:timer', 'i:1777978132;', 1777978132);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nom`, `descripcio`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Braços', 'Exercicis per treballar músculs dels braços i espatlla', 'categorias/1zZ2Bwbl3ZCKIKXuikeGHCC7RNog73o6NK8XhQlN.webp', '2026-05-04 16:38:43', '2026-05-04 20:55:00'),
(2, 'Cames', 'Exercicis tren inferior', 'categorias/hRp1rmPPGohYkqxAsLQgwtAo6pEIZu9EeCw8o6AG.jpg', '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(3, 'Pit', 'Exercicis de pit', 'categorias/Qf6CJHgu1KXjB5hzdlKKaQvWiT6tJWPnxTLREsGr.jpg', '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(4, 'Esquena', 'Exercicis d\'esquena', 'categorias/LGd7UZFgt3hVH0UY2sgDkabrneQl9BqYe4FCSoyL.jpg', '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(5, 'Core', 'Abdomen i zona lumbar', 'categorias/ZgzVnYfKvKiVHv8Ir5k1dYnzdI4YeUAQbyv5r16n.webp', '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(6, 'Ratas Fuertes', 'Categoria para ratas fuertes (gym-rat)', 'categorias/c9a9c973200c1034c5e3475317259c6c.jpg', '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(8, 'Hello world', 'everrerve', 'categorias/aGoN1Cbj9m5E43BhzW9oK5vcB0koNJ91ezz6xDhx.jpg', '2026-05-04 20:53:53', '2026-05-04 20:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_naixement` date NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `dni`, `data_naixement`, `telefon`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '00101010', '1010-01-01', '010101010', 4, '2026-05-04 19:06:36', '2026-05-04 19:06:36'),
(2, '441414', '1444-11-14', '414', 5, '2026-05-04 22:37:08', '2026-05-04 22:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `exercicis`
--

CREATE TABLE `exercicis` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imatge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercicis`
--

INSERT INTO `exercicis` (`id`, `nom`, `descripcio`, `imatge`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'Cleta Lueilwitz DVM', 'Eligendi consectetur ea a. Libero aliquid optio repellat et quisquam enim cupiditate.', 'https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg', 1, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(2, 'Jan Luettgen Jr.', 'Ut impedit at voluptas ab. Autem libero labore necessitatibus est. Non deleniti est odio.', 'https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg', 1, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(3, 'Hipolito Emard', 'Qui voluptatem ab ex ut. Fugit atque quidem recusandae minus. x6', 'https://images.pexels.com/photos/2261485/pexels-photo-2261485.jpeg', 4, '2026-05-04 16:38:43', '2026-05-04 20:34:30'),
(4, 'Mrs. Daniella Raynor', 'Quasi omnis ullam sed nobis nihil a distinctio. Et minus ratione autem nobis.', 'https://images.pexels.com/photos/1552249/pexels-photo-1552249.jpeg', 4, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(5, 'Prof. Ebba West', 'Soluta iste unde nam aspernatur totam. Possimus alias quo mollitia minima perspiciatis.', 'https://images.pexels.com/photos/1552249/pexels-photo-1552249.jpeg', 1, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(6, 'Candice Hudson', 'Consequuntur debitis exercitationem in nulla minus. Aperiam iste ad sed labore.', 'https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg', 3, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(7, 'Christa Upton', 'Ut incidunt et quidem ut quasi laudantium. Ipsam culpa ducimus voluptate.', 'https://images.pexels.com/photos/1552249/pexels-photo-1552249.jpeg', 2, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(8, 'Dr. Pablo Fay', 'Et praesentium eos porro voluptatem ipsam. Tempore laborum et sit distinctio quidem unde quia.', 'https://images.pexels.com/photos/2261485/pexels-photo-2261485.jpeg', 4, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(10, 'Mr. Demetrius Schaden', 'Molestiae sunt cum voluptas eos id. Quae perspiciatis qui sunt. Quia sint nobis iste reprehenderit.', 'https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg', 4, '2026-05-04 16:38:43', '2026-05-04 16:38:43'),
(19, 'wsss', '<link rel=\"stylesheet\" href=\"{{ asset(\'staticBg.css\') }}\">', 'exercicis/S2eD1UI5s2mSNO10M4oSgUSMeR3Aq72mawabJjrH.jpg', 1, '2026-05-04 20:37:01', '2026-05-04 20:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `exercici_rutina`
--

CREATE TABLE `exercici_rutina` (
  `id` bigint UNSIGNED NOT NULL,
  `rutina_id` bigint UNSIGNED NOT NULL,
  `exercici_id` bigint UNSIGNED NOT NULL,
  `series` int NOT NULL,
  `repeticions` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercici_rutina`
--

INSERT INTO `exercici_rutina` (`id`, `rutina_id`, `exercici_id`, `series`, `repeticions`, `created_at`, `updated_at`) VALUES
(1, 12, 3, 51, 4815, NULL, NULL),
(2, 5, 10, 15, 11, NULL, NULL),
(4, 10, 7, 141, 44, NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_12_210417_create_clients_table', 1),
(5, '2026_04_12_210434_create_categorias_table', 1),
(6, '2026_04_12_210452_create_exercicis_table', 1),
(7, '2026_04_12_210517_create_rutinas_table', 1),
(8, '2026_04_12_210606_create_exercici_rutina_table', 1);

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
-- Table structure for table `rutinas`
--

CREATE TABLE `rutinas` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracio` double NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rutinas`
--

INSERT INTO `rutinas` (`id`, `nom`, `resum`, `duracio`, `client_id`, `created_at`, `updated_at`) VALUES
(4, 'Pitfrefr', 'ferr', 15, 1, '2026-05-04 19:12:27', '2026-05-04 19:12:27'),
(5, 'swws', 'sw', 10, 1, '2026-05-04 19:26:01', '2026-05-04 19:26:01'),
(7, 'Esquena', 'wswsw', 154, 1, '2026-05-04 21:23:56', '2026-05-04 21:23:56'),
(8, 'Pitrf', 'rferr', 14, 1, '2026-05-04 21:25:51', '2026-05-04 21:25:51'),
(9, 'Esquena', 'ffe    @if ($errors->any())\r\n        <div class=\"alert alert-danger text-center\">', 55, 2, '2026-05-05 08:49:31', '2026-05-05 08:49:31'),
(10, 'Hipolito Emard', 'swwswswswswswws', 19, 1, '2026-05-05 13:36:48', '2026-05-05 13:36:48'),
(12, 'wde2', '1515', 15151, 1, '2026-05-05 18:29:07', '2026-05-05 18:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dIWjRDle7LPZ8OjzS4RLe5gwtZ7WpHbJrL12uaNJ', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJWUUdRdTk5QXd1NmdFbXdFZWJMeEZFUDQxdUE4UDNZV3c1SUhwU3lIIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvcnV0aW5hc19naW1uYXMudGVzdFwvcnV0aW5hc1wvOSIsInJvdXRlIjoicnV0aW5hcy5zaG93In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjo1fQ==', 1778015969);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-05-04 16:38:42', '$2y$12$AiLyisbSZMMHHYILCSnSLunztFB78xGLM9UiYwU/2rTfIljQBHFgu', 'FKt5kHOQF7', '2026-05-04 16:38:42', '2026-05-04 16:38:42'),
(2, 'Admin', 'admin@admin.cat', NULL, '$2y$12$oOAF6a2JMZKC3wpIx91LA.H8wXlvU56iTPoVgSlMpW2zm5fqx6gdm', NULL, NULL, NULL),
(4, 'Adil Chainakh', 'adil.chainakh@insbaixcamp.cat', NULL, '$2y$12$hMjpvF64gX9QazavP7aZiuRj7Ac5Kr1eyCXh6gi2yg8rSNMIHqVQS', NULL, '2026-05-04 19:06:36', '2026-05-04 19:06:36'),
(5, 'Tweak edits', 'editstweak@gmail.com', NULL, '$2y$12$eT6lM13VmEnc3JhVMupWsOPBrKjhtN4QVp/nPoTqp10Rm9ECETvR6', NULL, '2026-05-04 22:37:08', '2026-05-04 22:37:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_user_id_unique` (`user_id`);

--
-- Indexes for table `exercicis`
--
ALTER TABLE `exercicis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercicis_categoria_id_foreign` (`categoria_id`);

--
-- Indexes for table `exercici_rutina`
--
ALTER TABLE `exercici_rutina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercici_rutina_rutina_id_foreign` (`rutina_id`),
  ADD KEY `exercici_rutina_exercici_id_foreign` (`exercici_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutinas_client_id_foreign` (`client_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercicis`
--
ALTER TABLE `exercicis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exercici_rutina`
--
ALTER TABLE `exercici_rutina`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exercicis`
--
ALTER TABLE `exercicis`
  ADD CONSTRAINT `exercicis_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exercici_rutina`
--
ALTER TABLE `exercici_rutina`
  ADD CONSTRAINT `exercici_rutina_exercici_id_foreign` FOREIGN KEY (`exercici_id`) REFERENCES `exercicis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exercici_rutina_rutina_id_foreign` FOREIGN KEY (`rutina_id`) REFERENCES `rutinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rutinas`
--
ALTER TABLE `rutinas`
  ADD CONSTRAINT `rutinas_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
