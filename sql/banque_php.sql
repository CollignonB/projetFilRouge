-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 oct. 2020 à 15:55
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `banque_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `account_type_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  `montant` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `date_crea`, `user_id`, `account_type_id`, `bank_id`, `montant`) VALUES
(1, '2020-10-07 10:12:01', 1, 2, 1, 3521.00),
(2, '2020-10-07 12:48:54', 2, 1, 2, 3756.00),
(3, '2020-10-07 10:09:44', 2, 4, 1, 1254.00),
(4, '2020-10-07 12:25:26', 2, 1, NULL, 250.00),
(5, '2020-10-07 12:45:40', 1, 2, NULL, 500.00),
(6, '2020-10-07 12:49:48', 2, 1, NULL, 0.00),
(7, '2020-10-07 12:50:29', 2, 1, NULL, 4567.00);

-- --------------------------------------------------------

--
-- Structure de la table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `account_types`
--

INSERT INTO `account_types` (`id`, `name`) VALUES
(1, 'PEL'),
(2, 'Livret A'),
(3, 'PER'),
(4, 'Compte Courant');

-- --------------------------------------------------------

--
-- Structure de la table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `national_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `banks`
--

INSERT INTO `banks` (`id`, `name`, `address`, `national_id`) VALUES
(1, 'Rouen', '2 rue du poney qui tousse', '123456789A'),
(2, 'Rouen', '14 avenue de Naheulbeuk', '123456789B');

-- --------------------------------------------------------

--
-- Structure de la table `transferts`
--

CREATE TABLE `transferts` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(8) NOT NULL,
  `amount` double(7,2) NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `date_transfert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transferts`
--

INSERT INTO `transferts` (`id`, `type`, `amount`, `account_id`, `date_transfert`) VALUES
(1, 'dépôt', 521.36, 1, '2020-10-07 09:35:55'),
(2, 'retrait', 521.36, 2, '2020-10-07 09:35:55'),
(3, 'dépôt', 333.20, 1, '2020-10-07 09:35:55'),
(4, 'retrait', 666.40, 1, '2020-10-07 09:35:55'),
(5, 'retrait', 452.10, 1, '2020-10-07 09:35:55'),
(6, 'dépôt', 788.50, 2, '2020-10-07 09:35:55'),
(7, 'dépôt', 333.00, 2, '2020-10-07 09:59:10'),
(8, 'dépôt', 333.00, 1, '2020-10-07 10:07:40'),
(9, 'retrait', 352.00, 3, '2020-10-07 11:46:18'),
(10, 'dépôt', 350.00, 2, '2020-10-07 11:51:27'),
(11, 'dépôt', 0.00, 2, '2020-10-07 12:01:17'),
(12, 'dépôt', 22.00, 2, '2020-10-07 12:01:24'),
(13, 'dépôt', 200.00, 2, '2020-10-07 12:48:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `date_creation`, `login`, `password`) VALUES
(1, 'Jackie LaFrite', '2020-01-21 23:00:00', 'JL1234@exemple.com', '$2y$10$uOpFWJCpoS4y4Plo5vZwy.9KCmuOWMS4GcszHoJPvYzono6etgggy'),
(2, 'Miguel SanChez', '2018-05-11 22:00:00', 'MS9876@jesaispas.com', '$2y$10$juX6dunoVJNwFfcIMn0hEuV42OT9vlY5hqEqtNL/vuZo4YIhnhsny'),
(3, 'Baltazar Octavius', '2020-10-07 07:48:48', 'BoB@exemple.com', '$2y$10$Dd9PkoXygJBFYQBD7iylkeT5Bl0u57y25V.D80kAaBVwpgwLADXQy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_account_type_id` (`account_type_id`),
  ADD KEY `fk_bank_id` (`bank_id`);

--
-- Index pour la table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transferts`
--
ALTER TABLE `transferts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_account_id` (`account_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transferts`
--
ALTER TABLE `transferts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk_account_type_id` FOREIGN KEY (`account_type_id`) REFERENCES `account_types` (`id`),
  ADD CONSTRAINT `fk_bank_id` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `transferts`
--
ALTER TABLE `transferts`
  ADD CONSTRAINT `fk_account_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
