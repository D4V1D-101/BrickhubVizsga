-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 03. 22:43
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gamelaucherdata`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `game_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `image`, `content`, `status`, `game_id`, `created_at`, `updated_at`) VALUES
(2, 'update0.3', 'asd', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<h2><strong>asdsadasd</strong></h2><p>dasdasdasd</p>', 1, 1, '2025-02-26 20:57:12', '2025-02-27 20:29:48'),
(3, 'ASD', 'ASD', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>ASD</p>', 1, 1, '2025-03-03 19:29:07', '2025-03-03 19:29:07'),
(4, 'ASDASD', 'SADSAD', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>ASDASD</p>', 1, 1, '2025-03-03 19:29:41', '2025-03-03 19:29:41'),
(5, 'we', 'asd', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>KGH</p>', 1, 1, '2025-03-03 19:29:58', '2025-03-03 19:29:58'),
(6, 'ASD', 'ASD', 'http://127.0.0.1:8000/admin/services/create', '<p>ASD</p>', 1, 1, '2025-03-03 19:30:15', '2025-03-03 19:30:15'),
(7, 'sadfsdaf', 'asdasd', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>ASDD</p>', 1, 1, '2025-03-03 19:30:33', '2025-03-03 19:30:33'),
(8, 'asd', 'hfjm', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>ASDASD</p>', 1, 1, '2025-03-03 19:31:05', '2025-03-03 19:31:05'),
(9, 'A', 'asdasd', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>ASD</p>', 1, 1, '2025-03-03 19:31:28', '2025-03-03 19:31:28'),
(10, 'asdasd', 'asdasd', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>ASDASD</p>', 1, 1, '2025-03-03 19:31:41', '2025-03-03 19:31:41'),
(11, 'ASD', 'asd', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>ASDASD</p>', 1, 1, '2025-03-03 19:31:58', '2025-03-03 19:31:58');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sad', '<p>asd</p>', 1, '2025-02-26 19:06:22', '2025-02-26 19:06:22');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `exe_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `release_date` datetime NOT NULL,
  `download_link` varchar(255) DEFAULT NULL,
  `short_desc` varchar(35) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `developer_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `games`
--

INSERT INTO `games` (`id`, `name`, `exe_name`, `description`, `image_path`, `release_date`, `download_link`, `short_desc`, `status`, `developer_id`, `publisher_id`, `created_at`, `updated_at`) VALUES
(1, 'Grand Theft Auto VI', 'Top Down Game', 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.', 'https://upload.wikimedia.org/wikipedia/en/a/a5/Grand_Theft_Auto_V.png', '2025-02-11 00:00:00', 'https://www.dropbox.com/scl/fi/ldw8hbhpknqjpvhby2oeq/Top-Down-Game.zip?rlkey=47x882ac6mc6i4lt4qofrcsdz&st=2vd07gh3&dl=1', 'This is the latest GTA game.', 1, 2, 1, '2025-02-11 04:37:37', '2025-02-28 21:19:15'),
(2, 'Game 1.0', 'Top Down Game', 'Test', NULL, '2025-02-18 09:16:00', 'https://www.dropbox.com/scl/fi/ldw8hbhpknqjpvhby2oeq/Top-Down-Game.zip?rlkey=47x882ac6mc6i4lt4qofrcsdz&st=2vd07gh3&dl=1', ':3', 1, 1, 1, '2025-02-18 08:17:01', '2025-02-18 08:17:01'),
(3, 'asd', 'asd', '<p>asd</p>', NULL, '2025-02-05 00:00:00', NULL, 'asd', 1, 2, 1, '2025-02-26 19:04:19', '2025-02-26 19:04:19');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `game_genres`
--

CREATE TABLE `game_genres` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `game_genres`
--

INSERT INTO `game_genres` (`game_id`, `genre_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Action', 'action', 1),
(2, 'FPS', 'fps', 1),
(3, 'Open World', 'open world', 1),
(4, 'Multiplayer', 'multiplayer', 1),
(5, 'dacika', 'dacika', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `git_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `members`
--

INSERT INTO `members` (`id`, `name`, `designation`, `git_url`, `linkedin_url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rockstar Games', 'Publisher', NULL, 'https://www.linkedin.com/company/rockstar-games', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Rockstar_Games_Logo.svg/1113px-Rockstar_Games_Logo.svg.png', 1, '2025-02-11 04:27:07', '2025-02-11 04:27:07'),
(2, 'Rockstar North', 'Developer', NULL, 'https://www.linkedin.com/company/rockstar-games', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Rockstar_Games_Logo.svg/1113px-Rockstar_Games_Logo.svg.png', 1, '2025-02-11 04:34:59', '2025-02-11 04:34:59'),
(3, 'asdsad', 'asdsad', 'http://127.0.0.1:8000/admin/services/create', 'http://127.0.0.1:8000/admin/services/create', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', 1, '2025-02-26 19:05:53', '2025-02-26 19:05:53');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `pages`
--

INSERT INTO `pages` (`id`, `title`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sad', 'http://127.0.0.1:8000/admin/services/create', '<p>asd</p>', 1, '2025-02-26 19:05:31', '2025-02-26 19:05:31'),
(2, 'teszt', 'https://i.postimg.cc/rFTXXRXs/K-perny-k-p-2025-02-16-105330.png', '<p>asd</p>', 1, '2025-03-03 20:15:43', '2025-03-03 20:15:43');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(11) NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `playtime`
--

CREATE TABLE `playtime` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `playtime_minutes` int(11) DEFAULT 0,
  `last_played` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `playtime`
--

INSERT INTO `playtime` (`id`, `user_id`, `game_id`, `playtime_minutes`, `last_played`) VALUES
(5, 4, 1, 1, '2025-02-18 09:44:03'),
(6, 4, 2, 2, '2025-02-18 09:46:08');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `reviews`
--

INSERT INTO `reviews` (`id`, `game_id`, `user_id`, `rating`, `review_title`, `review_text`, `created_at`) VALUES
(2, 1, 4, 5, 'My Review', 'Mid', '2025-02-18 09:42:48');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(4, 'admin', 'admin@gmail.com', '2025-02-18 09:42:00', '9E9B0X9xiNsHFlEsFKjQMeYT5Uo3VeawLbHd8/vVmTE=', NULL, '2025-02-18 09:42:00', '2025-02-27 20:24:29', 'ADMIN'),
(5, 'dacika', 'rigodavid100@gmail.com', '2025-02-26 20:00:52', '$2y$12$57u4Y2iFi34999ZOnErP0ePvjVc5Rrep7wQBaGqat70On.1wcD8sS', NULL, '2025-02-26 19:00:52', '2025-02-27 19:47:06', 'ADMIN'),
(6, 'asdsad', 'kuki@gmail.com', '2025-02-27 21:11:40', '$2y$12$uoLrdfR4hdJAr9N0PIGLZOncZzPOrArb1xndnRPSWXPrKhQCzJ44i', NULL, '2025-02-27 20:11:40', '2025-02-27 20:11:40', 'ADMIN'),
(7, 'teszt', 'teszt@gmail.com', '2025-02-27 22:19:10', '$2y$12$pJwy/zyXYebnlhWxgT8SN.pTY.ongBScy61vaVlLCMuGumVq/Pbji', NULL, '2025-02-27 21:19:10', '2025-02-27 21:19:10', 'USER'),
(8, 'admin', 'adminka@gmail.com', '2025-03-03 20:24:33', '$argon2id$v=19$m=65536,t=4,p=8$MmhvRUhKVm0zZUtLNDA1Qg$bTBElCdCYiHSKEPv7x2qIC3WpdJ7ofYR1fqqWmw40rs', NULL, '2025-03-03 19:24:33', '2025-03-03 19:24:33', 'USER');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `developer_id` (`developer_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- A tábla indexei `game_genres`
--
ALTER TABLE `game_genres`
  ADD PRIMARY KEY (`game_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- A tábla indexei `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `playtime`
--
ALTER TABLE `playtime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- A tábla indexei `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `playtime`
--
ALTER TABLE `playtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Megkötések a táblához `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`developer_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `members` (`id`);

--
-- Megkötések a táblához `game_genres`
--
ALTER TABLE `game_genres`
  ADD CONSTRAINT `game_genres_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `game_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Megkötések a táblához `playtime`
--
ALTER TABLE `playtime`
  ADD CONSTRAINT `playtime_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `playtime_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Megkötések a táblához `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
