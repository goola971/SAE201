-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 mai 2025 à 19:32
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae201`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`) VALUES
(3),
(6);

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id`) VALUES
(3),
(9);

-- --------------------------------------------------------

--
-- Structure de la table `concerne`
--

CREATE TABLE `concerne` (
  `idM` int(11) NOT NULL,
  `idR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `concerne`
--

INSERT INTO `concerne` (`idM`, `idR`) VALUES
(1, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `concerne_salle`
--

CREATE TABLE `concerne_salle` (
  `idS` int(11) NOT NULL,
  `idR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`) VALUES
(3),
(8);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `numeroEtudiant` varchar(50) DEFAULT NULL,
  `grpTP_TD_Promo` varchar(50) DEFAULT NULL,
  `promotion` varchar(50) NOT NULL,
  `td` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `numeroEtudiant`, `grpTP_TD_Promo`, `promotion`, `td`) VALUES
(1, NULL, NULL, 'MMI - 1', 'TD - 2'),
(2, 'E20251002', NULL, 'MMI - 1', 'TD - 1'),
(7, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `idM` int(11) NOT NULL,
  `refernceM` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `typeM` varchar(50) DEFAULT NULL,
  `dateAchat` date DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `quantité` int(11) DEFAULT NULL,
  `descriptif` varchar(200) DEFAULT NULL,
  `lien_demo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`idM`, `refernceM`, `designation`, `photo`, `typeM`, `dateAchat`, `etat`, `quantité`, `descriptif`, `lien_demo`) VALUES
(1, 'REF001', 'Caméra', 'canon.jpg', 'Vidéo', '2023-05-10', 'Bon état', 3, 'Caméra Full HD pour tournage', 'https://demo.cam/canon'),
(2, 'REF002', 'Trépied Manfrotto', 'manfrotto.jpg', 'Accessoire', '2022-11-02', 'Très bon état', 5, 'Trépied professionnel', 'https://demo.trp/manfrotto');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `idR` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `valide` int(11) DEFAULT NULL,
  `motif` varchar(100) DEFAULT NULL,
  `commentaires` varchar(50) DEFAULT NULL,
  `signatureElectronique` varchar(50) DEFAULT NULL,
  `documentAdministrateur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`idR`, `date_debut`, `date_fin`, `valide`, `motif`, `commentaires`, `signatureElectronique`, `documentAdministrateur`) VALUES
(1, '2025-04-22 10:00:00', '2025-04-22 12:00:00', 1, 'Projet vidéo', 'RAS', 'signAlice', 'docAdmin1.pdf'),
(2, '2025-04-26 09:00:00', '2025-04-26 11:00:00', 0, 'Tournage TP', 'Besoin urgent', 'signBob', 'docAdmin2.pdf'),
(3, '2025-04-21 16:08:58', '2025-04-21 18:08:58', 1, 'pour sae201', 'important ', 'jcp', 'jcp'),
(4, '2025-05-21 14:00:00', '2025-05-21 15:00:00', 0, 'PASKE JE VEUX', 'rien', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAnYA', 'rien'),
(5, '2025-05-21 14:00:00', '2025-05-21 15:00:00', 0, 'kgufkuyoyugf', 'rien', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAnYA', 'rien');

-- --------------------------------------------------------

--
-- Structure de la table `reservation_users`
--

CREATE TABLE `reservation_users` (
  `id` int(11) NOT NULL,
  `idR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation_users`
--

INSERT INTO `reservation_users` (`id`, `idR`) VALUES
(1, 4),
(1, 5),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idS` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idS`, `nom`, `type`, `capacite`, `photo`, `etat`, `description`) VALUES
(1, 'Salle A101', 'Amphi', 100, 'a101.jpg', 'Disponible', 'Grand amphithéâtre'),
(2, 'Salle B204', 'Réunion', 20, 'b204.jpg', 'Disponible', 'Salle de réunion équipée');

-- --------------------------------------------------------

--
-- Structure de la table `user_`
--

CREATE TABLE `user_` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `Date_de_naissance` date DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `date_inscription` date DEFAULT current_timestamp(),
  `valable` tinyint(1) DEFAULT 0,
  `telephone` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_`
--

INSERT INTO `user_` (`id`, `email`, `pseudo`, `nom`, `prenom`, `Date_de_naissance`, `adresse`, `mot_de_passe`, `avatar`, `date_inscription`, `valable`, `telephone`) VALUES
(1, 'alice@gmail.com', 'alice123', 'Durand', 'Alice', '2002-04-21', '10 rue des Lilas', 'alice123', '../uploads/avatars/1.png', '2025-04-26', 1, 123456789),
(2, 'bob@gmail.com', 'bobby', 'Martin', 'Bob', '2001-09-15', '25 avenue Victor Hugo', 'hashed_pwd2', '../uploads/avatars/2.jpg', '2025-04-26', 1, 123456789),
(3, 'clara@gmail.com', 'clarou', 'Lemoine', 'Clara', '2003-01-30', '3 place de la République', 'clarou', '../uploads/avatars/3.jpg', '2025-04-26', 1, 123456789),
(6, 'janviercharly@gmail.com', 'charly.janvier', 'janvier', 'charly', NULL, NULL, 'test', NULL, '2025-05-15', 1, NULL),
(7, 'emma.tesla@gmail.com', 'emmat', 'Tesla', 'Emma', '2000-07-10', '42 boulevard Voltaire', 'emma123', '../uploads/avatars/7.jpg', '2025-05-22', 1, 612345678),
(8, 'leo.dupont@yahoo.fr', 'leoleo', 'Dupont', 'Léo', '1999-02-20', '15 rue Lafayette', 'leodupont', '../uploads/avatars/8.png', '2025-05-22', 1, 698765432),
(9, 'jade.martin@outlook.fr', 'jadem', 'Martin', 'Jade', '2002-12-03', '8 chemin des Vignes', 'jadepass', '../uploads/avatars/9.png', '2025-05-22', 1, 678432198),
(10, 'samuel.khan@protonmail.com', 'samk', 'Khan', 'Samuel', '2001-05-17', '29 rue du Commerce', 'samuelkhan', '../uploads/avatars/10.png', '2025-05-22', 0, 654321897),
(11, 'lina.rossi@gmail.com', 'lina_r', 'Rossi', 'Lina', '2004-09-09', '77 rue des Écoles', 'linapwd', '../uploads/avatars/11.jpg', '2025-05-22', 1, 623456789);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `concerne`
--
ALTER TABLE `concerne`
  ADD PRIMARY KEY (`idM`,`idR`),
  ADD KEY `idR` (`idR`);

--
-- Index pour la table `concerne_salle`
--
ALTER TABLE `concerne_salle`
  ADD PRIMARY KEY (`idS`,`idR`),
  ADD KEY `idR` (`idR`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`idM`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`idR`);

--
-- Index pour la table `reservation_users`
--
ALTER TABLE `reservation_users`
  ADD PRIMARY KEY (`id`,`idR`),
  ADD KEY `idR` (`idR`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idS`);

--
-- Index pour la table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user_`
--
ALTER TABLE `user_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `concerne`
--
ALTER TABLE `concerne`
  ADD CONSTRAINT `concerne_ibfk_1` FOREIGN KEY (`idM`) REFERENCES `materiel` (`idM`) ON DELETE CASCADE,
  ADD CONSTRAINT `concerne_ibfk_2` FOREIGN KEY (`idR`) REFERENCES `reservations` (`idR`) ON DELETE CASCADE;

--
-- Contraintes pour la table `concerne_salle`
--
ALTER TABLE `concerne_salle`
  ADD CONSTRAINT `concerne_salle_ibfk_1` FOREIGN KEY (`idS`) REFERENCES `salle` (`idS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `concerne_salle_ibfk_2` FOREIGN KEY (`idR`) REFERENCES `reservations` (`idR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `enseignant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservation_users`
--
ALTER TABLE `reservation_users`
  ADD CONSTRAINT `reservation_users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_users_ibfk_2` FOREIGN KEY (`idR`) REFERENCES `reservations` (`idR`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
