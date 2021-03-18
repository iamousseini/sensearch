-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 22 juil. 2020 à 18:40
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sensearch`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nom_boutique` varchar(255) NOT NULL,
  `ville` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `info_boutique` text NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `prenom`, `email`, `telephone`, `password`, `nom_boutique`, `ville`, `adresse`, `statut`, `info_boutique`, `date_inscription`) VALUES
(2, 'Abdoulfatah', 'Houssein ', 'smrobla34@gmail.com', '781164595', 'malyoun123', 'OPstore', 1, 'FASS', 1, 'Boutique spécialiser sur tome de mangas , figurines et de t-shirt pour otaku', '2020-07-16 19:56:23'),
(3, 'Moustapha', 'Diop', 'diopMoustapha@gmail.com', '771168789', 'moustapha123', 'DiopStore', 1, 'Medina', 1, 'Boutique spécialiser dans la vente d\'appareil Electronique ', '2020-07-16 20:07:14'),
(4, 'Ousseini', 'Adamou', 'Adamou123@gmail.com', '781165895', 'adamou123', 'BeatStore', 1, 'Liberté 6', 2, 'Boutique spécialiser dans la vente d\'ordinateur ', '2020-07-16 20:12:46'),
(5, 'Adamou', 'Ousseini', 'adnanejiko@gmail.com', '770940113', 'jiko5214', 'oussebstore', 1, 'liberté 6 extension', 1, 'liberté 6 extension liberté 6 extension liberté 6 extension liberté 6 extension liberté 6 extension liberté 6 extension liberté 6 extension', '2020-07-19 18:54:29'),
(6, 'Adamou', 'Ousseini', 'ousseinijiko@gmail.com', '770940112', 'jiko5214', 'Ousseini Adamou', 1, 'Dakar, Sénégal lib66', 1, 'Dakar, Sénégal lib66 Dakar, Sénégal lib66 Dakar, Sénégal lib66', '2020-07-19 19:27:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ville` (`ville`),
  ADD KEY `statut` (`statut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`statut`) REFERENCES `statut` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
