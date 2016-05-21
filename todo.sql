-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 21. maj 2016 ob 17.32
-- Različica strežnika: 10.1.9-MariaDB
-- Različica PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `todo`
--

-- --------------------------------------------------------

--
-- Struktura tabele `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `files`
--

INSERT INTO `files` (`id`, `task_id`, `url`, `title`) VALUES
(4, 4, 'uploads/3-20160404182845000000-bg.jpg', 'asdd'),
(3, 5, 'uploads/6-20160329180640000000-Jellyfish.jpg', 'asdasd');

-- --------------------------------------------------------

--
-- Struktura tabele `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `groups`
--

INSERT INTO `groups` (`id`, `title`, `description`) VALUES
(1, 'Družina', 'To je tisto, kar mi žena teži.'),
(2, 'Moje Podjetje', 'To kar rad delam.'),
(3, 'Hobij', 'To kar me v prostem času veseli.'),
(8, 'VSŠ', 'Vsi zaposeni na šoli.');

-- --------------------------------------------------------

--
-- Struktura tabele `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `task_id` int(11) NOT NULL,
  `date_z` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `history`
--

INSERT INTO `history` (`id`, `state`, `task_id`, `date_z`) VALUES
(25, 'V čakanju', 10, '0000-00-00'),
(26, 'V izdelavi', 10, '0000-00-00'),
(27, 'V čakanju', 10, '0000-00-00'),
(28, 'Končana', 10, '0000-00-00'),
(29, 'V čakanju', 11, '2016-05-21'),
(30, 'V čakanju', 11, '2016-05-21'),
(31, 'V izdelavi', 11, '2016-05-21'),
(32, 'Končana', 11, '2016-05-21'),
(33, 'V čakanju', 0, '2016-05-21'),
(34, 'V čakanju', 0, '2016-05-21'),
(35, 'V čakanju', 0, '2016-05-21'),
(36, 'V čakanju', 0, '2016-05-21'),
(37, 'V čakanju', 0, '2016-05-21'),
(38, 'V čakanju', 0, '2016-05-21'),
(39, 'V čakanju', 0, '2016-05-21'),
(40, 'V čakanju', 0, '2016-05-21'),
(41, 'V čakanju', 0, '2016-05-21'),
(42, 'V čakanju', 0, '2016-05-21'),
(43, 'V čakanju', 0, '2016-05-21');

-- --------------------------------------------------------

--
-- Struktura tabele `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `priority` int(11) NOT NULL DEFAULT '10'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `tasks`
--

INSERT INTO `tasks` (`id`, `team_id`, `user_id`, `group_id`, `title`, `description`, `date_add`, `date_end`, `deadline`, `priority`) VALUES
(1, NULL, 3, 1, 'Izdelaj logo332', '3d logo2323423', '2016-03-15 17:58:11', '2016-03-15 18:08:51', '2016-03-22 23:00:00', 4),
(3, NULL, 3, 1, 'sdfsdf', 'sdfsdf', '2016-03-15 18:09:01', '2016-04-04 14:27:38', '2016-03-23 23:00:00', 1),
(4, NULL, 3, 1, 'adasd', 'asdasd', '2016-03-15 18:09:50', '0000-00-00 00:00:00', '2016-03-08 23:00:00', 1),
(5, NULL, 6, 1, 'asdas', 'asdasd', '2016-03-29 16:06:34', '0000-00-00 00:00:00', '2016-03-24 23:00:00', 1),
(6, 1, 3, 3, 'sdfsdf', 'sdfsdfsf', '2016-04-04 16:36:09', '0000-00-00 00:00:00', '2016-04-13 22:00:00', 9),
(7, 4, 7, 2, 'Testna naloga (urejen naslov)', 'Testiranje savinskega želodca.', '2016-05-20 12:40:01', '0000-00-00 00:00:00', '2016-05-30 22:00:00', 10),
(8, 4, 7, 3, 'Kolesarjenje', 'Ni to kaj', '2016-05-20 16:02:44', '0000-00-00 00:00:00', '2016-05-03 22:00:00', 4),
(9, 1, 7, 2, 'C# izobraževanje', 'Je treba mulce mal naučit ka je to bit kader.', '2016-05-20 16:03:31', '0000-00-00 00:00:00', '2016-05-02 22:00:00', 8),
(10, 1, 8, 2, 'Neki', 'test', '2016-05-21 13:26:49', '0000-00-00 00:00:00', '2016-05-02 22:00:00', 9),
(11, 4, 8, 1, 'Želodec', 'Še en test', '2016-05-21 14:35:27', '0000-00-00 00:00:00', '2016-05-25 22:00:00', 1),
(12, 1, 8, 3, 'Untiy projekt', 'Ka si ti nor miljon $ bom zaslužu.', '2016-05-21 14:41:26', '0000-00-00 00:00:00', '2016-05-30 22:00:00', 4),
(13, 4, 8, 8, 'Še en test', 'Ni to kaj', '2016-05-21 14:46:44', '0000-00-00 00:00:00', '2016-08-16 22:00:00', 10),
(14, 4, 8, 8, 'testerima testovni test testov v1.0', 'testestestestestestestest', '2016-05-21 14:59:48', '0000-00-00 00:00:00', '2016-05-26 22:00:00', 8),
(15, 1, 8, 2, 'c shark', 'morski pes', '2016-05-21 15:02:04', '0000-00-00 00:00:00', '2016-05-16 22:00:00', 6),
(16, 1, 8, 2, 'c shark', 'morski pes', '2016-05-21 15:03:25', '0000-00-00 00:00:00', '2016-05-16 22:00:00', 6),
(17, 4, 8, 1, 'a', 'a', '2016-05-21 15:03:42', '0000-00-00 00:00:00', '2016-05-11 22:00:00', 1),
(18, 3, 8, 1, 'c', 'c', '2016-05-21 15:06:26', '0000-00-00 00:00:00', '2016-05-03 22:00:00', 8),
(19, 3, 8, 1, 'c', 'c', '2016-05-21 15:06:56', '0000-00-00 00:00:00', '2016-05-03 22:00:00', 8),
(20, 3, 8, 1, 'c', 'c', '2016-05-21 15:07:01', '0000-00-00 00:00:00', '2016-05-03 22:00:00', 8),
(21, 3, 8, 1, 'c', 'c', '2016-05-21 15:10:48', '0000-00-00 00:00:00', '2016-05-03 22:00:00', 8),
(22, 4, 8, 3, 'TEST!!!', 'test', '2016-05-21 15:11:18', '0000-00-00 00:00:00', '2016-05-30 22:00:00', 10),
(23, 1, 8, 1, 'D', 'D', '2016-05-21 15:13:45', '0000-00-00 00:00:00', '2016-06-04 22:00:00', 10),
(24, 3, 8, 1, 'as', 'as', '2016-05-21 15:14:16', '0000-00-00 00:00:00', '2016-04-24 22:00:00', 10),
(25, 3, 8, 1, 'as', 'as', '2016-05-21 15:14:59', '0000-00-00 00:00:00', '2016-04-24 22:00:00', 10),
(26, 3, 8, 1, 'as', 'as', '2016-05-21 15:15:55', '0000-00-00 00:00:00', '2016-04-24 22:00:00', 10),
(27, 3, 8, 1, 'as', 'as', '2016-05-21 15:17:27', '0000-00-00 00:00:00', '2016-04-24 22:00:00', 10),
(28, 0, 8, 1, 'še več upravuk', 'a', '2016-05-21 15:23:28', '0000-00-00 00:00:00', '2016-05-02 22:00:00', 10),
(29, 4, 8, 1, 'še več upravuk', 'a', '2016-05-21 15:24:11', '0000-00-00 00:00:00', '2016-05-02 22:00:00', 10),
(30, 4, 7, 1, 'TEST!!!', 'test', '2016-05-21 15:27:26', '0000-00-00 00:00:00', '2016-06-04 22:00:00', 10),
(31, 1, 7, 1, 'a', 'a', '2016-05-21 15:29:09', '0000-00-00 00:00:00', '2016-05-24 22:00:00', 9);

-- --------------------------------------------------------

--
-- Struktura tabele `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `teams`
--

INSERT INTO `teams` (`id`, `title`, `description`) VALUES
(1, 'Programerji', 'Moji ROCKSTARS!!!!!!!!'),
(3, 'asfsdsff', 'sdfsdf'),
(4, 'Savinski pobi', 'To je testna skupina');

-- --------------------------------------------------------

--
-- Struktura tabele `teams_users`
--

CREATE TABLE `teams_users` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `pass`, `avatar`, `admin`) VALUES
(1, 'Islam', 'Mušić', 'islam.music@scv.si', 'islam', NULL, 0),
(2, 'Robi', 'Pritržnik', 'robi.pritrznik@scv.si', 'robi', NULL, 0),
(3, 'Gorazd', 'Žižek', 'gorazd@scv.si', '44724174e707fe268328bc1dba8e64b3db806ca6', 'uploads/avatars/3-20160322191628000000-Koala.jpg', 1),
(4, '', '', '', '', NULL, 0),
(5, 'Uroš', 'Sonjak', 'uros.sonjak@scv.si', '42c307afa56045e46cefe9dcd45d01df29f8801f', NULL, 0),
(6, 'Robi', 'Pritržnik', 'robi@pritrznik.si', 'd992567841d2c92e7f15845d731e4ba35c525a2f', 'uploads/avatars/6-20160329172802000000-Chrysanthemum.jpg', 0),
(7, 'Jan', 'Žagar', 'jan.zagar98@gmail.com', 'f14bfc9b57fd9f3159e527f2444c8584d1849b79', NULL, 0),
(8, 'Janez', 'Žagarič', 'zombie.behind.me@gmail.com', 'f14bfc9b57fd9f3159e527f2444c8584d1849b79', NULL, 0);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indeksi tabele `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indeksi tabele `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `teams_users`
--
ALTER TABLE `teams_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT tabele `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT tabele `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT tabele `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT tabele `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT tabele `teams_users`
--
ALTER TABLE `teams_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
