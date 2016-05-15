-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 04. apr 2016 ob 19.21
-- Različica strežnika: 5.6.25
-- Različica PHP: 5.6.11

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

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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
-- Struktura tabele `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `tasks`
--

INSERT INTO `tasks` (`id`, `team_id`, `user_id`, `group_id`, `title`, `description`, `date_add`, `date_end`, `deadline`, `priority`) VALUES
(1, NULL, 3, 1, 'Izdelaj logo332', '3d logo2323423', '2016-03-15 17:58:11', '2016-03-15 18:08:51', '2016-03-22 23:00:00', 4),
(3, NULL, 3, 1, 'sdfsdf', 'sdfsdf', '2016-03-15 18:09:01', '2016-04-04 14:27:38', '2016-03-23 23:00:00', 1),
(4, NULL, 3, 1, 'adasd', 'asdasd', '2016-03-15 18:09:50', '0000-00-00 00:00:00', '2016-03-08 23:00:00', 1),
(5, NULL, 6, 1, 'asdas', 'asdasd', '2016-03-29 16:06:34', '0000-00-00 00:00:00', '2016-03-24 23:00:00', 1),
(6, 1, 3, 3, 'sdfsdf', 'sdfsdfsf', '2016-04-04 16:36:09', '0000-00-00 00:00:00', '2016-04-13 22:00:00', 9);

-- --------------------------------------------------------

--
-- Struktura tabele `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `teams`
--

INSERT INTO `teams` (`id`, `title`, `description`) VALUES
(1, 'Programerji', 'Moji ROCKSTARS!!!!!!!!'),
(3, 'asfsdsff', 'sdfsdf');

-- --------------------------------------------------------

--
-- Struktura tabele `teams_users`
--

CREATE TABLE IF NOT EXISTS `teams_users` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `pass`, `avatar`, `admin`) VALUES
(1, 'Islam', 'Mušić', 'islam.music@scv.si', 'islam', NULL, 0),
(2, 'Robi', 'Pritržnik', 'robi.pritrznik@scv.si', 'robi', NULL, 0),
(3, 'Gorazd', 'Žižek', 'gorazd@scv.si', '44724174e707fe268328bc1dba8e64b3db806ca6', 'uploads/avatars/3-20160322191628000000-Koala.jpg', 1),
(4, '', '', '', '', NULL, 0),
(5, 'Uroš', 'Sonjak', 'uros.sonjak@scv.si', '42c307afa56045e46cefe9dcd45d01df29f8801f', NULL, 0),
(6, 'Robi', 'Pritržnik', 'robi@pritrznik.si', 'd992567841d2c92e7f15845d731e4ba35c525a2f', 'uploads/avatars/6-20160329172802000000-Chrysanthemum.jpg', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT tabele `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT tabele `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT tabele `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT tabele `teams_users`
--
ALTER TABLE `teams_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
