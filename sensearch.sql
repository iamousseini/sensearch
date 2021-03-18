-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 28 août 2020 à 17:48
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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `mdp`) VALUES
(1, 'sensearch@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `alert` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `alert`
--

INSERT INTO `alert` (`id`, `alert`) VALUES
(1, 'Première avertissement'),
(2, 'Deuxième avertissement'),
(3, 'Troisième avertissement');

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
(8, 2, 'Maillot Sénégal 2020', 4, 12000, 2, 4, 'Nouvelle arrivage !!!', '../images_annonces/unnamed.jpg', '2020-07-19 16:31:16'),
(9, 2, 'T-Shirt One piece', 4, 18000, 2, 4, 'Nouvelle arrivage', '../images_annonces/image2.jpg', '2020-07-19 17:24:16'),
(10, 5, 'crampon adidas', 7, 10000, 2, 4, 'crampon addidas ', '../images_annonces/addidas.jpg', '2020-07-22 05:04:55'),
(11, 3, 'crampon nike mercurial', 7, 15000, 2, 4, 'nike mercurial', '../images_annonces/crampons.jpg', '2020-07-22 05:04:55'),
(12, 2, 'maillot bresil foot 2020', 7, 7000, 2, 4, 'maillot bresil', '../images_annonces/maillot2.jpg', '2020-07-22 05:04:55'),
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
(33, 5, 'Récrutement Air Sénégal', 5, 200000, 2, 4, 'recrutement de chef de cabine', '../images_annonces/air.png', '2020-07-22 16:36:51'),
(34, 3, 'Récrutement développeur php', 5, 95000, 2, 4, 'récrutement atos', '../images_annonces/Atos.png', '2020-07-22 16:36:51'),
(35, 5, 'Terrain de basket ', 6, 20000, 2, 4, 'terrain de basket à louer', '../images_annonces/bskette.jpg', '2020-07-22 16:36:51'),
(36, 5, 'Salle de cinéma', 6, 5000, 2, 4, 'Salle de cinéma proposant plusieurs films variés', '../images_annonces/cinema.jpg', '2020-07-22 16:36:51'),
(37, 6, 'Hyundai Tucson ', 2, 15000000, 2, 2, 'automatique essence 10000km', '../images_annonces/hyundai_tucsonjpg.jpg', '2020-07-22 16:36:51'),
(38, 2, 'Récrutement Free Sénégal', 5, 150000, 2, 4, 'Free Sénégal recrute des agents de sécurité', '../images_annonces/C_5nnHyc_400x400.jpg', '2020-07-22 16:36:51'),
(39, 2, 'Orange recrutement', 5, 150000, 2, 4, 'nous cherchons des techniciens de surface', '../images_annonces/raw.jpg', '2020-07-22 16:36:51'),
(40, 5, 'Peugeot-205', 2, 1000000, 2, 4, 'essence manuel', '../images_annonces/peugeot-205.jpg', '2020-07-22 16:36:51'),
(41, 2, 'Piscine', 6, 50000, 2, 4, 'Pisicine pour vos journée entre amis et proches', '../images_annonces/piscine.jpg', '2020-07-22 16:36:51'),
(42, 5, 'Sedima recrute', 5, 130000, 2, 4, 'Sedima recrute des chauffeurs', '../images_annonces/sed.png', '2020-07-22 16:36:51'),
(43, 6, 'Terrain de foot', 6, 20000, 2, 4, 'dossards et consommation offerts ', '../images_annonces/terrain.jpg', '2020-07-22 16:36:51'),
(44, 2, 'Range Rover ', 2, 60000000, 2, 3, 'automatique essence 10000km', '../images_annonces/velar.jpg', '2020-07-22 16:36:51'),
(45, 2, 'Téléphone Samsung A50', 1, 150000, 2, 2, 'Nouvelle arrivage !!! Tout neuve avec (écouteur+coque).', '../images_annonces/samsung-galaxy-a50-4g-lte-dual-sim-128-go-black.jpg', '2020-07-24 17:44:05'),
(46, 2, 'Ballon de football ', 7, 5000, 2, 4, 'Ballon de football (modèle équipe de France) . Spéciale coupe du monde avec les deux etoiles', '../images_annonces/71xp6+4Us2L._AC_SX466_.jpg', '2020-07-24 17:50:34'),
(47, 2, 'Vélo/bicyclette  ', 7, 30000, 2, 1, 'Vélo taille 20 tout neuf .', '../images_annonces/61GoKWOVfOL._AC_SX425_.jpg', '2020-07-26 01:14:46'),
(48, 7, 'Acer Aspire 3', 1, 350000, 2, 2, 'Ordinateur tout neuf en provenance de la France accompagner d\'un sac . ', '../images_annonces/PC-Portable-Acer-Aspire-3-A317-51-57LY-17-3-Intel-Core-i5-8-Go-RAM-128-Go-D-1-To-SATA-Noir.jpg', '2020-07-26 01:36:44'),
(49, 2, 'Huawei y9', 1, 120000, 2, 1, 'Téléphone très pratique , très ergonomique avec un écran de 6.5 pouce', '../images_annonces/huawei-y9-2019-64-go-ram-4-go-camera-1316-mp-.jpg', '2020-07-27 22:57:33'),
(50, 7, 'Chaussure homme', 4, 12000, 2, 4, 'Nouvelle arrivage !!! Chaussure marrons ', '../images_annonces/fergusonrouge.jpg', '2020-07-28 12:54:44'),
(51, 7, 'haltère de musculation 30-KG', 7, 9000, 2, 4, 'haltère de musculation pour travailler correctement vos bras et vos épaules .', '../images_annonces/61PahWIJlXL._AC_SX425_.jpg', '2020-07-28 12:57:55'),
(52, 2, 'Voiture BMV', 2, 15000000, 2, 3, 'Nouvelle arrivage dans notre garage!!!', '../images_annonces/bmw-serie-2-bmv-235-i-m_7007755951.jpg', '2020-07-28 22:22:10'),
(53, 2, 'Iphone 7', 1, 200000, 2, 1, 'Nouvelle arrivage !!!', '../images_annonces/10213085511710.png', '2020-08-03 19:50:09'),
(54, 2, 'PC-Portable HP-15Pouces', 1, 380000, 2, 2, 'Nouvelle arrivage en provenance de la france.', '../images_annonces/HP-15-dw0018nf-fg.jpg', '2020-08-04 03:31:03');

-- --------------------------------------------------------

--
-- Structure de la table `avertissement`
--

CREATE TABLE `avertissement` (
  `id` int(11) NOT NULL,
  `avertissement` int(11) NOT NULL,
  `boutique` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avertissement`
--

INSERT INTO `avertissement` (`id`, `avertissement`, `boutique`, `description`, `date`) VALUES
(21, 1, 5, 'attention !!!', '2020-08-07 02:48:50'),
(22, 1, 5, 'dsl', '2020-08-07 02:52:44');

-- --------------------------------------------------------

--
-- Structure de la table `black_liste`
--

CREATE TABLE `black_liste` (
  `id` int(11) NOT NULL,
  `boutique` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `garantie`
--

CREATE TABLE `garantie` (
  `id` int(11) NOT NULL,
  `garantie_annonce` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `garantie`
--

INSERT INTO `garantie` (`id`, `garantie_annonce`) VALUES
(1, '6 mois'),
(2, '12 mois'),
(3, '24 mois'),
(4, 'Aucune garantie');

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
(6, 'Adamou', 'Ousseini', 'ousseinijiko@gmail.com', '770940112', 'jiko5214', 'Ousseini Adamou', 1, 'Dakar, Sénégal lib66', 1, 'C\'est une boutique qui vend divers produits ...', '2020-07-19 19:27:45'),
(7, 'Med', 'Abdourahman', 'medbox@gmail.com', '781164845', 'medbox123', 'MedBox', 1, 'FASS', 1, 'Une boutique très diversifier . Vous pouvez tout trouver ici.', '2020-07-26 01:32:46'),
(8, 'Ismael', 'Omar', 'ismo123@gmail.com', '771169532', 'qwerty123', 'BawadiMall', 1, 'Fass', 3, 'C\'est une toute nouvelle boutique qui regorge de produit et de service de qualité. ', '2020-08-06 03:26:54'),
(9, 'Katakuri', 'Charlotte', 'katakuri123@gmail.com', '781165856', 'qwerty123', 'WholeCake', 1, 'Medina', 1, 'Boutique spécialiser dans la préparation de gâteaux d\'anniversaire et de mariage .', '2020-08-06 03:32:44'),
(10, 'Dzyuba', 'Artem', 'artemdz@gmail.com', '777832945', 'jiko5214', 'Numerika', 1, 'Hann Maristes', 3, 'Vends tout matériels multimédia', '2020-08-26 01:06:38');

-- --------------------------------------------------------

--
-- Structure de la table `message_client`
--

CREATE TABLE `message_client` (
  `id` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `nom_boutique` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message_client`
--

INSERT INTO `message_client` (`id`, `id_annonce`, `nom`, `adresse`, `email`, `sujet`, `message`, `nom_boutique`, `date`) VALUES
(1, 33, 'Med Abdou', 'DAKAR', 'medbox@gmail.com', 'Information supplementaire', 'Quels sont les compétences que vous rechercher ?', 'oussebstore', '2020-07-23 16:07:19'),
(2, 38, 'Saada', 'Dakar', 'saadafarah@gmail.com', 'Qualifications ', 'C\'est a partir de quand ?', 'OPstore', '2020-07-23 22:36:21'),
(4, 15, 'Abdoul', 'Dakar', 'adoulgani@gmail.com', 'Tailles', 'Quels sont les tailles disponible pour ce modele', 'OPstore', '2020-07-24 17:36:28'),
(9, 10, 'Yaya', 'Dakar', 'yayabaka34@gmail.com', 'Tailles', 'Quels sont les tailles disponibles ?', 'oussebstore', '2020-07-27 02:47:18'),
(11, 51, 'Houssein', 'Dakar', 'smrobla34@gmail.com', 'Poids', 'Avez-vous d\'autres poids ?', 'MedBox', '2020-07-28 13:01:32'),
(13, 54, 'Kader', 'Dakar', 'kader@gmail.com', 'Couleur', 'D\'autres couleurs sont-ils disponible ?', 'OPstore', '2020-08-06 03:22:42');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id` int(11) NOT NULL,
  `motif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id`, `motif`) VALUES
(1, 'Mauvaise qualité de service'),
(2, 'Mauvaise qualité du produit'),
(3, 'Aucune reponse de la boutique depuis deux semaines'),
(4, 'Non respect du client'),
(5, 'Non-respect des caractéristique qu\'on a énumérer dans la description de l\'annonce'),
(6, 'Autres ....');

-- --------------------------------------------------------

--
-- Structure de la table `signaler`
--

CREATE TABLE `signaler` (
  `id` int(11) NOT NULL,
  `boutique` int(11) NOT NULL,
  `motif` int(11) NOT NULL,
  `explication` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_signaler` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `signaler`
--

INSERT INTO `signaler` (`id`, `boutique`, `motif`, `explication`, `nom`, `email`, `date_signaler`) VALUES
(6, 2, 1, 'boutique mediocre produit defaillant wolladim c\'est de l\'arnaque cette boutique !!!!', 'dada', 'dada@hu.fr', '2020-08-28 15:10:08');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `statut`) VALUES
(1, 'Particulier'),
(2, 'Autres'),
(3, 'Professionnelle');

-- --------------------------------------------------------

--
-- Structure de la table `terme`
--

CREATE TABLE `terme` (
  `id` int(11) NOT NULL,
  `terme_annonce` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `terme`
--

INSERT INTO `terme` (`id`, `terme_annonce`) VALUES
(1, 'Prix negociable'),
(2, 'Prix non negociable');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type_annonce` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `type_annonce`) VALUES
(1, 'Technologie'),
(2, 'Vehicule'),
(3, 'Immobilier'),
(4, 'Mode'),
(5, 'Demande/offre d\'emploie'),
(6, 'Evenements/loisir'),
(7, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `ville`) VALUES
(1, 'Dakar'),
(2, 'Pikine'),
(3, 'Touba'),
(4, 'Guédiawaye'),
(5, 'Thiès'),
(6, 'Kaolack'),
(7, 'Autres');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `avertissement`
--
ALTER TABLE `avertissement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boutique` (`boutique`);

--
-- Index pour la table `black_liste`
--
ALTER TABLE `black_liste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boutique` (`boutique`);

--
-- Index pour la table `garantie`
--
ALTER TABLE `garantie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ville` (`ville`),
  ADD KEY `statut` (`statut`);

--
-- Index pour la table `message_client`
--
ALTER TABLE `message_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `signaler`
--
ALTER TABLE `signaler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boutique` (`boutique`),
  ADD KEY `motif` (`motif`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `terme`
--
ALTER TABLE `terme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `avertissement`
--
ALTER TABLE `avertissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `black_liste`
--
ALTER TABLE `black_liste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `garantie`
--
ALTER TABLE `garantie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `message_client`
--
ALTER TABLE `message_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `signaler`
--
ALTER TABLE `signaler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `terme`
--
ALTER TABLE `terme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

--
-- Contraintes pour la table `avertissement`
--
ALTER TABLE `avertissement`
  ADD CONSTRAINT `avertissement_ibfk_1` FOREIGN KEY (`boutique`) REFERENCES `inscription` (`id`);

--
-- Contraintes pour la table `black_liste`
--
ALTER TABLE `black_liste`
  ADD CONSTRAINT `black_liste_ibfk_1` FOREIGN KEY (`boutique`) REFERENCES `inscription` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`statut`) REFERENCES `statut` (`id`);

--
-- Contraintes pour la table `signaler`
--
ALTER TABLE `signaler`
  ADD CONSTRAINT `signaler_ibfk_1` FOREIGN KEY (`boutique`) REFERENCES `inscription` (`id`),
  ADD CONSTRAINT `signaler_ibfk_2` FOREIGN KEY (`motif`) REFERENCES `motif` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
