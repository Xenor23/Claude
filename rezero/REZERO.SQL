-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : mar. 28 mai 2024 à 14:24
-- Version du serveur : 8.4.0
-- Version de PHP : 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rezero`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `min_players` int NOT NULL,
  `max_players` int NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int NOT NULL,
  `requirements` text NOT NULL,
  `type` varchar(15) NOT NULL,
  `image_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start_datetime`, `end_datetime`, `min_players`, `max_players`, `status`, `created_by`, `requirements`, `type`, `image_id`) VALUES
(12, 'TEST', 'oinhhnopml,ùp', '2024-05-27 15:17:00', '2024-05-27 17:17:00', 10, 50, 'Prochainement', 3, '2v2, uhc', 'mini-tournois', 6),
(13, 'ok fonctionne', 'j&#039;espère', '2024-05-27 15:20:00', '2024-05-27 17:20:00', 10, 50, 'Prochainement', 3, '2v2, uhc', 'mini-tournois', 7),
(14, 'test', 'jppp', '2024-05-27 14:36:00', '2024-05-27 17:35:00', 12, 36, 'Prochainement', 3, '2v2, uhc', 'mini-tournois', 8),
(15, 'ok', 'fonctionne', '2024-05-27 14:37:00', '2024-05-27 17:40:00', 12, 60, 'Prochainement', 3, '2v2, uhc', 'mini-tournois', 9),
(16, 'Xenor', 'biuugbohmkpl', '2024-05-27 16:22:00', '2024-05-27 18:22:00', 12, 26, 'Prochainement', 3, '2v2, uhc', 'tournois', 10),
(17, 'fuck', 'j yyukljmk', '2024-05-27 17:38:00', '2024-05-27 20:39:00', 12, 26, 'Prochainement', 3, '2v2, uhc', 'mini-tournois', 11),
(18, 'test', 'ok ?', '2024-05-27 19:48:00', '2024-05-27 21:48:00', 12, 60, 'Prochainement', 3, '2v2, uhc', 'tournois', 12),
(19, 'new test', 'neswwww', '2024-05-27 16:59:00', '2024-05-27 18:59:00', 12, 50, 'Prochainement', 3, 'uhc', 'mini-tournois', 13),
(20, 'Xenor', 'okdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqnsokdfniosndqns', '2024-05-27 18:05:00', '2024-05-27 20:05:00', 10, 20, 'Prochainement', 3, '2v2, uhc', 'tournois', 14),
(21, 'test', 'dsqiqshqfsosjqfp', '2024-05-28 11:33:00', '2024-05-28 12:34:00', 12, 50, 'Prochainement', 3, '2v2, uhc', 'tournois', 15),
(22, 'retest', 'asdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafasdsqfsafv', '2024-05-28 10:35:00', '2024-05-28 11:35:00', 12, 66, 'Prochainement', 3, 'bedwars', 'mini-tournois', 16),
(23, 'BONNNNNNNNN', 'QOSDFJPQJOQFP', '2024-05-28 10:55:00', '2024-05-28 11:55:00', 10, 20, 'Prochainement', 4, 'uhc', 'tournois', 17),
(24, 'BONNNNNNNNN', 'QOSDFJPQJOQFP', '2024-05-28 10:55:00', '2024-05-28 11:55:00', 10, 20, 'Prochainement', 4, 'uhc', 'tournois', 18),
(25, 'QSFQS', 'QSFQSFSQFSQFQSFQSSQF', '2024-05-28 10:56:00', '2024-05-28 12:56:00', 10, 20, 'Prochainement', 4, '2v2, uhc, bedwars, no_rod', 'mini-tournois', 19),
(26, 'TEST', 'EZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZEZ', '2024-05-28 14:47:00', '2024-05-28 17:47:00', 10, 50, 'Prochainement', 3, '2v2, uhc, no_rod', 'mini-tournois', 20),
(27, 'ALLER', 'AHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHAHHHHHHHHHHHV', '2024-05-28 16:09:00', '2024-05-28 18:09:00', 10, 60, 'Prochainement', 4, '2v2, uhc, bedwars', 'mini-tournois', 21);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `file_name`, `file_path`, `uploaded_at`) VALUES
(6, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/App/Controllers/Event/uploads/66547a0447614_Two-Gun Blue lock.jpeg', '2024-05-27 12:18:12'),
(7, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/App/Controllers/Event/uploads/66547aa251e83_Two-Gun Blue lock.jpeg', '2024-05-27 12:20:50'),
(8, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/App/Controllers/Event/uploads/66547e23df0b7_Two-Gun Blue lock.jpeg', '2024-05-27 12:35:47'),
(9, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/App/Controllers/Event/uploads/66547e8012ea8_Two-Gun Blue lock.jpeg', '2024-05-27 12:37:20'),
(10, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/public/assets/img/uploads/665489d27834a_Two-Gun Blue lock.jpeg', '2024-05-27 13:25:38'),
(11, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/public/assets/img/uploads/66548d04f021b_Two-Gun Blue lock.jpeg', '2024-05-27 13:39:17'),
(12, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/public/assets/img/uploads/66548f85594f2_Two-Gun Blue lock.jpeg', '2024-05-27 13:49:57'),
(13, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/public/assets/img/uploads/665491f714d50_Two-Gun Blue lock.jpeg', '2024-05-27 14:00:23'),
(14, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/public/assets/img/uploads/6654933b86011_Two-Gun Blue lock.jpeg', '2024-05-27 14:05:47'),
(15, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/public/assets/img/uploads/665589161daf3_Two-Gun Blue lock.jpeg', '2024-05-28 07:34:46'),
(16, 'Two-Gun Blue lock.jpeg', '/var/www/html/projet/public/assets/img/uploads/66558a563256d_Two-Gun Blue lock.jpeg', '2024-05-28 07:40:06'),
(17, 'Barou clipped.jpeg', '/var/www/html/projet/public/assets/img/uploads/66558e1acd07a_Barou clipped.jpeg', '2024-05-28 07:56:10'),
(18, 'Barou clipped.jpeg', '/var/www/html/projet/public/assets/img/uploads/66558e1adcfce_Barou clipped.jpeg', '2024-05-28 07:56:10'),
(19, 'Barou clipped.jpeg', '/var/www/html/projet/public/assets/img/uploads/66558e4914708_Barou clipped.jpeg', '2024-05-28 07:56:57'),
(20, 'sheesh black girl samourai.jpeg', '/var/www/html/projet/public/assets/img/uploads/6655c464156c9_sheesh black girl samourai.jpeg', '2024-05-28 11:47:48'),
(21, 'Fighting my way.jpeg', '/var/www/html/projet/public/assets/img/uploads/6655d7b79916f_Fighting my way.jpeg', '2024-05-28 13:10:15');

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `team_id` int NOT NULL,
  `position` int NOT NULL,
  `points` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `results`
--

CREATE TABLE `results` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `participant_id` int NOT NULL,
  `team_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `creator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `team_members`
--

CREATE TABLE `team_members` (
  `id` int NOT NULL,
  `team_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password_hash`, `country`, `age`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Duy Quang', 'TRAN', 'Xenor_23', 't.duyq23@gmail.com', '$2y$10$QJJOdIyT0tCaip6tEPFabueJhfOwh3/JaPapf9rxFDstKaPbOqhD.', 'fr', 18, '2024-05-27 12:11:33', '2024-05-27 12:11:33', 'user'),
(4, 'Saman', 'Herallal', 'Saman', 'saman@baobab-ingenierie.fr', '$2y$10$o..97/bCcb2y.ge4JJ7hju7Wmq8uI793WyC01122TUvD25c4cU3a.', 'fr', 28, '2024-05-27 14:35:25', '2024-05-27 14:35:25', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `team_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_events_created_by` (`created_by`),
  ADD KEY `idx_events_image_id` (`image_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_participants_event_id` (`event_id`),
  ADD KEY `idx_participants_user_id` (`user_id`),
  ADD KEY `idx_participants_team_id` (`team_id`);

--
-- Index pour la table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_results_event_id` (`event_id`),
  ADD KEY `idx_results_participant_id` (`participant_id`),
  ADD KEY `idx_results_team_id` (`team_id`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_teams_creator_id` (`creator_id`);

--
-- Index pour la table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_team_members_team_id` (`team_id`),
  ADD KEY `idx_team_members_user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_votes_event_id` (`event_id`),
  ADD KEY `idx_votes_user_id` (`user_id`),
  ADD KEY `idx_votes_team_id` (`team_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_events_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `fk_participants_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_participants_team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_participants_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_results_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_results_participant_id` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_results_team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk_teams_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `fk_team_members_team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_team_members_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `fk_votes_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votes_team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votes_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
