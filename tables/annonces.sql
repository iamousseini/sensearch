-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 22 juil. 2020 à 18:39
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
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `boutique` int(11) NOT NULL,
  `titre_annonce` varchar(255) NOT NULL,
  `type_annonce` int(11) NOT NULL,
  `prix_annonce` int(11) NOT NULL,
  `terme` int(11) NOT NULL,
  `garantie` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `date_annonce` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `boutique`, `titre_annonce`, `type_annonce`, `prix_annonce`, `terme`, `garantie`, `description`, `img`, `date_annonce`) VALUES
(8, 2, 'Maillot Senegal 2020', 4, 10000, 2, 4, 'Nouvelle arrivage !!!', '../images_annonces/unnamed.jpg', '2020-07-19 16:31:16'),
(9, 2, 'T-Shirt One piece', 4, 18000, 2, 4, 'Nouvelle arrivage', '../images_annonces/image2.jpg', '2020-07-19 17:24:16'),
(10, 5, 'crampon adidas', 7, 10000, 2, 4, 'crampon addidas ', '../images_annonces/addidas.jpg', '2020-07-22 05:04:55'),
(11, 3, 'crampon nike mercurial', 7, 15000, 2, 4, 'nike mercurial', '../images_annonces/crampons.jpg', '2020-07-22 05:04:55'),
(12, 2, 'maillot bresil foot', 7, 7000, 2, 4, 'maillot bresil', '../images_annonces/maillot2.jpg', '2020-07-22 05:04:55'),
(13, 4, 'maillot usa football nike', 7, 7000, 2, 4, 'usa football maillot', '../images_annonces/maillot1.jpg', '2020-07-22 05:04:55'),
(14, 4, 'maillot lakers lebron james 2020', 7, 10000, 2, 4, 'lebron james 202 lakers maillot', '../images_annonces/maillot-lebron.jpg', '2020-07-22 05:04:55'),
(15, 2, 'dell latitude', 1, 150000, 1, 2, '500giga ssd 8ram ', '../images_annonces/dell.jpg', '2020-07-22 05:04:55'),
(16, 2, 'drone avec camera', 1, 200000, 1, 1, 'drone avec camera full HD 1080 p', '../images_annonces/drone.jpg', '2020-07-22 05:04:55'),
(17, 3, 'Ipad pro 2019', 1, 220000, 1, 2, 'ipad pro 64gb ram 4', '../images_annonces/ipad.jpg', '2020-07-22 05:04:55'),
(18, 3, 'Mac book pro retina', 1, 350000, 2, 1, 'Mac book pro retina 1000 gigas 16ram', '../images_annonces/mac.jpg', '2020-07-22 05:04:55'),
(19, 4, 'Ps4 pro', 1, 200000, 2, 2, 'ps4 avec 2 manettes et 3 jeux au choix', '../images_annonces/ps4.jpg', '2020-07-22 05:04:55'),
(20, 3, 'Xbox one', 1, 220000, 2, 2, 'Xbox one avec 2 manettes', '../images_annonces/xbox.jpg', '2020-07-22 05:04:55'),
(21, 4, 'G-shock 450-SS', 4, 80000, 2, 4, 'G-shock flexible et etanche', '../images_annonces/gs.jpg', '2020-07-22 05:04:55'),
(22, 5, 'Audemard-Piquet Gold', 4, 200000, 2, 4, 'Audemard-Piquet Gold etanche', '../images_annonces/aude.jpg', '2020-07-22 05:04:55'),
(23, 2, 'Ceinture ferragamo marron', 4, 18000, 2, 4, 'ceinute ferragamo ', '../images_annonces/fg.jpg', '2020-07-22 05:04:55'),
(24, 5, 'ceinture louis vouitton noire', 4, 20000, 2, 4, 'louis vouitton', '../images_annonces/lv.jpg', '2020-07-22 05:04:55'),
(25, 6, 'Sac louis vouitton pour femme', 4, 30000, 2, 4, 'sac pour femmes LV', '../images_annonces/sac.jpg', '2020-07-22 05:04:55'),
(26, 5, 'iphone x', 1, 450000, 1, 1, '250gb 4ram bleu', '../images_annonces/iph.jpg', '2020-07-22 05:04:55'),
(27, 3, 'immeuble à vendre', 3, 85000000, 1, 4, 'immeuble 3 appartement 4 chambre salon ', '../images_annonces/imm1.jpg', '2020-07-22 05:04:55'),
(28, 3, 'appartement à louer', 3, 200000, 2, 4, '3chambre 3 salle de bain salon cuisine', '../images_annonces/imm1.jpg', '2020-07-22 05:04:55'),
(29, 3, 'maison à vendre', 3, 30000000, 1, 4, '4chambres 5 sdb cuisine salon garage', '../images_annonces/m1.jpg', '2020-07-22 05:04:55'),
(30, 5, 'villa à louer', 3, 300000, 1, 4, '5 chambres 6 salles de bains ', '../images_annonces/m2.jpg', '2020-07-22 05:04:55'),
(31, 3, 'villa à vendre', 3, 130000000, 1, 4, '8 chambres 11 salles de bain piscine garages salle de gym', '../images_annonces/m3.jpg', '2020-07-22 05:04:55'),
(32, 4, 'veste nike', 7, 7000, 2, 4, 'veste nike', '../images_annonces/veste.jpg', '2020-07-22 05:04:55'),
(33, 5, 'Récrutement Air Sénégal', 5, 0, 2, 4, 'recrutement de chef de cabine', '../images_annonces/air.png', '2020-07-22 16:36:51'),
(34, 3, 'Récrutement développeur php', 5, 0, 2, 4, 'récrutement atos', '../images_annonces/Atos.png', '2020-07-22 16:36:51'),
(35, 5, 'Terrain de basket ', 6, 20000, 2, 4, 'terrain de basket à louer', '../images_annonces/bskette.jpg', '2020-07-22 16:36:51'),
(36, 5, 'Salle de cinéma', 6, 5000, 2, 4, 'Salle de cinéma proposant plusieurs films variés', '../images_annonces/cinema.jpg', '2020-07-22 16:36:51'),
(37, 6, 'Hyundai Tucson ', 2, 15000000, 2, 2, 'automatique essence 10000km', '../images_annonces/hyundai_tucson.jpg', '2020-07-22 16:36:51'),
(38, 2, 'Récrutement Free Sénégal', 5, 0, 2, 4, 'Free Sénégal recrute des agents de sécurité', '../images_annonces/free.jpg', '2020-07-22 16:36:51'),
(39, 2, 'Orange recrutement', 5, 0, 2, 4, 'nous cherchons des techniciens de surface', '../images_annonces/Orange.jpg', '2020-07-22 16:36:51'),
(40, 5, 'Peugeot-205', 2, 1000000, 2, 4, 'essence manuel', '../images_annonces/peugeot-205.jpg', '2020-07-22 16:36:51'),
(41, 2, 'Piscine', 6, 50000, 2, 4, 'Pisicine pour vos journée entre amis et proches', '../images_annonces/piscine.jpg', '2020-07-22 16:36:51'),
(42, 5, 'Sedima recrute', 5, 0, 2, 4, 'Sedima recrute des chauffeurs', '../images_annonces/sed.png', '2020-07-22 16:36:51'),
(43, 6, 'Terrain de foot', 6, 20000, 2, 4, 'dossards et consommation offerts ', '../images_annonces/terrain.jpg', '2020-07-22 16:36:51'),
(44, 2, 'Range Rover Velar', 2, 60000000, 2, 3, 'automatique essence 10000km', '../images_annonces/velar.jpg', '2020-07-22 16:36:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boutique` (`boutique`),
  ADD KEY `type_annonce` (`type_annonce`),
  ADD KEY `terme` (`terme`),
  ADD KEY `garantie` (`garantie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`boutique`) REFERENCES `inscription` (`id`),
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`type_annonce`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `annonces_ibfk_3` FOREIGN KEY (`terme`) REFERENCES `terme` (`id`),
  ADD CONSTRAINT `annonces_ibfk_4` FOREIGN KEY (`garantie`) REFERENCES `garantie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
