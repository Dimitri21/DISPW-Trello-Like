-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 fév. 2021 à 16:00
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sprinto`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) DEFAULT NULL,
  `task` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `task` (`task`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `created_at`, `user`, `task`) VALUES
(1, 'Je suis le commentaire', '2021-02-16 12:52:41', 3, 74),
(2, 'je vais commenter cette $tache', '2021-02-16 13:09:07', 3, 57),
(3, 'j\'ai de nouveau un commentaire à faire', '2021-02-16 13:15:40', 3, 57),
(4, 'j\'ai de nouveau un commentaire à faire', '2021-02-16 13:15:43', 3, 57),
(5, 'Il me faire faire tout le commenitare', '2021-02-16 13:16:02', 3, 57),
(6, 'erzertzert', '2021-02-16 13:16:46', 3, 57),
(7, 'message', '2021-02-16 13:22:55', 3, 57),
(8, 'bonjour', '2021-02-16 13:38:33', 3, 57),
(9, 'satt', '2021-02-16 13:39:11', 3, 57),
(10, 'je suis le commentaire', '2021-02-16 13:39:32', 3, 57),
(11, 'Salut le gens', '2021-02-16 13:42:11', 3, 57);

-- --------------------------------------------------------

--
-- Structure de la table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `project` int(11) DEFAULT NULL,
  `orders` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_LIST_PROJECT` (`project`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lists`
--

INSERT INTO `lists` (`id`, `name`, `description`, `created_at`, `modified_at`, `project`, `orders`) VALUES
(36, 'A Faire', 'La description qu\'il faut pour cette liste', '2021-02-13 01:15:24', '2021-02-16 15:00:07', 46, 1),
(37, 'Encours', 'à complèter', '2021-02-13 01:15:24', '2021-02-16 15:00:15', 46, 2),
(38, 'Terminé', 'à complèter', '2021-02-13 01:15:24', '2021-02-16 15:00:54', 46, 4),
(70, 'A faire', 'à complèter', '2021-02-15 12:30:09', '2021-02-15 12:30:09', 53, 0),
(71, 'En cours', 'à complèter', '2021-02-15 12:30:09', '2021-02-15 12:30:09', 53, 0),
(72, 'Terminé', 'à complèter', '2021-02-15 12:30:09', '2021-02-15 12:30:09', 53, 0),
(73, 'erazer', 'azeraze', '2021-02-15 12:30:23', '2021-02-15 12:30:23', 53, 3),
(74, 'tyty', 'tyty', '2021-02-15 12:34:38', '2021-02-15 12:34:38', 53, 3),
(75, 'A faire', 'à complèter', '2021-02-15 12:35:29', '2021-02-15 12:35:29', 54, 0),
(76, 'En cours', 'à complèter', '2021-02-15 12:35:29', '2021-02-15 12:35:29', 54, 0),
(77, 'Terminé', 'à complèter', '2021-02-15 12:35:29', '2021-02-15 12:35:29', 54, 0),
(78, 'erazera', 'rtzer', '2021-02-15 12:35:38', '2021-02-15 12:35:38', 54, 3),
(79, 'erazera', 'rtzert', '2021-02-15 12:37:34', '2021-02-15 12:37:34', 54, 3),
(112, 'A faire', 'A compléter', '2021-02-15 19:24:15', '2021-02-15 19:24:15', 58, 0),
(113, 'En cours', 'A compléter', '2021-02-15 19:24:15', '2021-02-15 19:24:15', 58, 0),
(114, 'Terminé', 'A compléter', '2021-02-15 19:24:15', '2021-02-15 19:24:15', 58, 0),
(115, 'reraze', 'dfqsdf', '2021-02-15 19:26:27', '2021-02-15 19:26:27', 58, 3),
(116, 'erazeradq', 'dfqsd', '2021-02-15 19:27:02', '2021-02-15 19:27:02', 58, 3),
(117, 'erazer', 'fgsdfgs', '2021-02-15 19:28:06', '2021-02-15 19:28:06', 58, 3),
(124, 'A faire', 'A compléter', '2021-02-15 19:39:45', '2021-02-15 19:39:45', 60, 0),
(125, 'En cours', 'A compléter', '2021-02-15 19:39:45', '2021-02-15 19:39:45', 60, 0),
(126, 'Terminé', 'A compléter', '2021-02-15 19:39:45', '2021-02-15 19:39:45', 60, 0),
(127, 'Client', 'dfqsdfqsd', '2021-02-15 19:39:57', '2021-02-15 19:39:57', 60, 3),
(128, 'Programmation Javasc', 'dfsdfqsd', '2021-02-15 19:40:14', '2021-02-15 19:40:14', 60, 3),
(129, 'Programmation Javasc', 'fqsdfqs', '2021-02-15 19:40:22', '2021-02-15 19:40:22', 60, 3),
(130, 'KALUMVUATI Duramana', 'dfqsdf', '2021-02-15 19:40:32', '2021-02-15 19:40:32', 60, 3),
(131, 'titi', 'dfqsd', '2021-02-15 19:40:36', '2021-02-15 19:40:36', 60, 3),
(132, 'A faire', 'A compléter', '2021-02-15 19:44:41', '2021-02-15 19:44:41', 61, 0),
(133, 'En cours', 'A compléter', '2021-02-15 19:44:41', '2021-02-15 19:44:41', 61, 0),
(134, 'Terminé', 'A compléter', '2021-02-15 19:44:41', '2021-02-15 19:44:41', 61, 0),
(135, 'Client', 'ssdsd', '2021-02-15 19:44:51', '2021-02-15 19:44:51', 61, 3),
(136, 'KALUMVUATI Duramana', 'sdqs', '2021-02-15 19:44:57', '2021-02-15 19:44:57', 61, 3),
(137, 'Teste', 'Liste à tester', '2021-02-16 15:56:57', '2021-02-16 15:00:49', 46, 3),
(138, 'Teste', 'yterty', '2021-02-16 16:36:07', '2021-02-16 16:36:07', 46, 2),
(142, 'A faire', 'A compléter', '2021-02-16 16:57:23', '2021-02-16 16:57:23', 63, 0),
(143, 'En cours', 'A compléter', '2021-02-16 16:57:23', '2021-02-16 16:57:23', 63, 0),
(144, 'Terminé', 'A compléter', '2021-02-16 16:57:23', '2021-02-16 16:57:23', 63, 0);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `invited_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `project` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `users` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_PROJECT_USER` (`users`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `create_at`, `users`, `picture`, `modified_at`) VALUES
(46, 'Création', 'Tableau modifié', '2021-02-16 15:57:44', 2, 'images/projects/ps.jpg', '2021-02-16 15:57:44'),
(53, 'Travaillé', 'il faut écrire quelque chose ici', '2021-02-15 12:30:09', 3, 'images/projects/ps.jpg', '2021-02-15 12:30:09'),
(54, 'Salut', 'il faut écrire quelque chose ici', '2021-02-15 12:35:29', 3, 'images/projects/ps.jpg', '2021-02-15 12:35:29'),
(58, 'Salut', 'Votre description du projet', '2021-02-15 19:24:15', 3, 'images/projects/ps.jpg', '2021-02-15 19:24:15'),
(60, 'Salut', 'Votre description du projet', '2021-02-15 19:39:45', 3, 'images/projects/ps.jpg', '2021-02-15 19:39:45'),
(61, 'Nouveau', 'Votre description du projet', '2021-02-15 19:44:41', 3, 'images/projects/ps.jpg', '2021-02-15 19:44:41'),
(63, 'Programmation Javascript', 'Tableau modifié', '2021-02-16 15:57:33', 2, 'images/projects/ps.jpg', '2021-02-16 15:57:33');

-- --------------------------------------------------------

--
-- Structure de la table `stickers`
--

DROP TABLE IF EXISTS `stickers`;
CREATE TABLE IF NOT EXISTS `stickers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stickers`
--

INSERT INTO `stickers` (`id`, `name`, `color`) VALUES
(1, 'proposed', 'default'),
(2, 'active', 'success'),
(3, 'standby', 'warning'),
(4, 'outdate', 'danger');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `lists` int(11) DEFAULT NULL,
  `sticker` int(11) DEFAULT NULL,
  `lead` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_TASKS_ID` (`lists`),
  KEY `lead` (`lead`),
  KEY `sticker` (`sticker`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `created_at`, `modified_at`, `start_at`, `end_at`, `created_by`, `lists`, `sticker`, `lead`) VALUES
(17, 'erazer', 'azeraze', '2021-02-13 00:22:25', '2021-02-13 00:22:25', '2021-02-13 00:22:25', '2021-02-13 00:22:25', 2, 36, 1, NULL),
(37, 'erazer', 'erazer', '2021-02-13 00:52:15', '2021-02-13 00:52:15', '2021-02-13 00:52:15', '2021-02-13 00:52:15', 2, 38, 1, NULL),
(55, 'tyerty', 'ertyert', '2021-02-15 11:31:05', '2021-02-15 11:31:05', '2021-02-15 11:31:05', '2021-02-15 11:31:05', 3, 73, 1, NULL),
(56, 'tyertytyer', 'ertyertyert', '2021-02-15 11:31:11', '2021-02-15 11:31:11', '2021-02-15 11:31:11', '2021-02-15 11:31:11', 3, 72, 1, NULL),
(57, 'Write sommthing undertandable', 'Write sommthing undertandable', '2021-02-15 11:31:25', '2021-02-16 12:32:53', '2021-02-15 00:00:00', '2021-02-17 00:00:00', 3, 70, 1, NULL),
(58, 'tyty', 'tyty', '2021-02-15 11:34:50', '2021-02-15 11:34:50', '2021-02-15 11:34:50', '2021-02-15 11:34:50', 3, 74, 1, NULL),
(59, 'erazera', 'rtzert', '2021-02-15 11:37:40', '2021-02-15 11:37:40', '2021-02-15 11:37:40', '2021-02-15 11:37:40', 3, 79, 1, NULL),
(60, 'erazeraze', 'rtzer', '2021-02-15 11:37:47', '2021-02-15 11:37:47', '2021-02-15 11:37:47', '2021-02-15 11:37:47', 3, 79, 1, NULL),
(61, 'rtzertzert', 'ertzer', '2021-02-15 11:37:52', '2021-02-15 11:37:52', '2021-02-15 11:37:52', '2021-02-15 11:37:52', 3, 75, 1, NULL),
(62, 'rtzert', 'tzertzer', '2021-02-15 11:37:57', '2021-02-15 11:37:57', '2021-02-15 11:37:57', '2021-02-15 11:37:57', 3, 76, 1, NULL),
(63, 'rtzert', 'trzertze', '2021-02-15 11:38:20', '2021-02-15 11:38:20', '2021-02-15 11:38:20', '2021-02-15 11:38:20', 3, 77, 1, NULL),
(64, 'dfgsdqfq', 'fqsdfqsd', '2021-02-15 11:38:54', '2021-02-15 11:38:54', '2021-02-15 11:38:54', '2021-02-15 11:38:54', 3, 78, 1, NULL),
(65, 'rtertzer', 'ezrtzer', '2021-02-15 11:46:25', '2021-02-15 11:46:25', '2021-02-15 11:46:25', '2021-02-15 11:46:25', 3, 78, 1, NULL),
(66, 'tyty', 'ytyty', '2021-02-15 11:47:12', '2021-02-15 11:47:12', '2021-02-15 11:47:12', '2021-02-15 11:47:12', 3, 76, 1, NULL),
(67, 'rtertzer', 'rtzertze', '2021-02-15 11:47:55', '2021-02-15 11:47:55', '2021-02-15 11:47:55', '2021-02-15 11:47:55', 3, 75, 1, NULL),
(68, 'rtzert', 'erazeraze', '2021-02-15 11:48:34', '2021-02-15 11:48:34', '2021-02-15 11:48:34', '2021-02-15 11:48:34', 3, 77, 1, NULL),
(69, 'eeeee', 'eeee', '2021-02-15 11:48:45', '2021-02-15 11:48:45', '2021-02-15 11:48:45', '2021-02-15 11:48:45', 3, 77, 1, NULL),
(70, 'title very shot', 'title very shot', '2021-02-15 13:56:34', '2021-02-16 12:33:09', '2021-02-15 13:56:34', '2021-02-25 00:00:00', 3, 70, 1, NULL),
(71, 'Installation de l\'environnement', 'Mise en place le données pour la mise en place de configuration de base de données, etc', '2021-02-15 14:48:19', '2021-02-15 14:48:19', '2021-02-15 14:48:19', '2021-02-15 14:48:19', 3, 70, 1, NULL),
(72, 'Installation de l\'environnement', '            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error soluta recusandae deserunt ullam sit ratione molestiae placeat dolorem beatae possimus, quae nam suscipit optio nesciunt sunt perspiciatis similique eos fugit.\n', '2021-02-15 14:49:07', '2021-02-15 14:49:07', '2021-02-15 14:49:07', '2021-02-15 14:49:07', 3, 70, 1, NULL),
(73, 'Developpement de tasks', 'Developpement de 3', '2021-02-15 14:49:41', '2021-02-16 11:26:02', '2021-02-15 14:49:41', '2021-02-15 00:00:00', 3, 71, 1, NULL),
(74, 'tyty', 'tyty', '2021-02-16 10:33:24', '2021-02-16 10:57:32', '2021-02-16 00:00:00', '2021-02-16 00:00:00', 3, 132, 3, NULL),
(75, 'tyty', 'tyty', '2021-02-16 10:33:25', '2021-02-16 10:53:46', '2021-02-16 00:00:00', '2021-02-16 00:00:00', 3, 134, 3, NULL),
(76, 'dfsdfqs', 'fqsdf', '2021-02-16 11:01:47', '2021-02-16 11:01:47', '2021-02-16 11:01:47', '2021-02-16 11:01:47', 3, 124, 1, NULL),
(77, 'tyty', 'dfsfqsd', '2021-02-16 11:09:24', '2021-02-16 11:09:24', '2021-02-16 11:09:24', '2021-02-16 11:09:24', 3, 124, 1, NULL),
(78, 'rtzert', 'dsdf', '2021-02-16 11:11:21', '2021-02-16 11:11:21', '2021-02-16 11:11:21', '2021-02-16 11:11:21', 3, 125, 1, NULL),
(79, 'Tache à faire', 'gefgsdfg', '2021-02-16 15:26:02', '2021-02-16 15:26:02', '2021-02-16 15:26:02', '2021-02-16 15:26:02', 2, 137, 1, NULL),
(81, 'Tache à faire', 'rertzer', '2021-02-16 15:31:27', '2021-02-16 15:31:27', '2021-02-16 15:31:27', '2021-02-16 15:31:27', 2, 37, 4, NULL),
(84, 'Tache à faire', 'rtzert', '2021-02-16 15:32:26', '2021-02-16 15:32:26', '2021-02-16 15:32:26', '2021-02-16 15:32:26', 2, 36, 3, NULL),
(85, 'Tache à faire', 'rtzert', '2021-02-16 15:33:49', '2021-02-16 15:33:49', '2021-02-16 15:33:49', '2021-02-16 15:33:49', 2, 36, 3, NULL),
(86, 'Tache à faire', 'rtzert', '2021-02-16 15:35:03', '2021-02-16 15:35:03', '2021-02-16 15:35:03', '2021-02-16 15:35:03', 2, 137, 4, NULL),
(89, 'Tache à faire', 'erazer', '2021-02-16 15:49:26', '2021-02-16 15:49:26', '2021-02-16 15:49:26', '2021-02-16 15:49:26', 2, 138, 2, NULL),
(90, 'Tache à faire', 'tyertye', '2021-02-16 15:51:42', '2021-02-16 15:51:42', '2021-02-16 15:51:42', '2021-02-16 15:51:42', 2, 37, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) DEFAULT NULL,
  `lastname` char(100) DEFAULT NULL,
  `email` char(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `subscriptionAt` datetime DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_USERS_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `subscriptionAt`, `picture`) VALUES
(1, 'DOE', 'John', 'doejohn@email.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-01-30 18:54:05', 'photo_passe.jpg'),
(2, 'kalumvuati', 'duramana', 'kal.dur@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-01-30 18:54:42', 'photo_passe.jpg'),
(3, 'jean', 'DOE', 'tyty@email.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-01-30 18:54:42', 'photo_passe.jpg'),
(7, 'filo', 'tyty', 'tyty_filo@gmail.com', 'c31f935ef8f2013a5caf52a9c61ddc4e782f016d', '2021-02-13 01:07:10', 'photo_passe.jpg'),
(8, 'jean', 'mario', 'pierre@toto.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-02-13 01:11:49', 'photo_passe.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`task`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`lead`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`lists`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`sticker`) REFERENCES `stickers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
