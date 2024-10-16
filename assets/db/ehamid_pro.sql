-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql-5.7
-- Généré le : mer. 16 oct. 2024 à 10:07
-- Version du serveur : 5.7.28
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ehamid_pro`
--

-- --------------------------------------------------------

--
-- Structure de la table `songs-table`
--

CREATE TABLE `songs-table` (
  `song-id` int(3) NOT NULL,
  `title` varchar(25) NOT NULL,
  `author` varchar(30) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `price` int(3) NOT NULL,
  `icon_path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `songs-table`
--

INSERT INTO `songs-table` (`song-id`, `title`, `author`, `genre`, `price`, `icon_path`) VALUES
(1, 'Error', 'Tokoyami Towa', 'Alternative rock', 15, 'J:\\WWW\\songs-project\\assets\\img\\icons\\error-icon.png'),
(2, 'Palette', 'Tokoyami Towa', 'Alternative rock', 35, 'J:\\WWW\\songs-project\\assets\\img\\icons\\palette-icon.png'),
(3, 'Kaisou ressha', 'Minato Aqua', 'Acoustic', 20, 'J:\\WWW\\songs-project\\assets\\img\\icons\\kaisou-ressha-icon.png'),
(4, 'Hearts', 'Tokoyami Towa', 'Alternative rock', 25, 'J:\\WWW\\songs-project\\assets\\img\\icons\\hearts-icon.png'),
(5, 'Aqua iro palette', 'Minato Aqua', 'Ayaya', 50, 'J:\\WWW\\songs-project\\assets\\img\\icons\\aqua-iro-palette-icon.png'),
(6, 'Overdose', 'Murasaki Shion', 'Pop', 10, 'J:\\WWW\\songs-project\\assets\\img\\icons\\overdose-icon.png'),
(7, 'Stellar stellar', 'Hoshimachi Suisei', 'Pop', 20, 'J:\\WWW\\songs-project\\assets\\img\\icons\\stellar-stellar-icon.png');

-- --------------------------------------------------------

--
-- Structure de la table `yabontiap_categorie`
--

CREATE TABLE `yabontiap_categorie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `yabontiap_categorie`
--

INSERT INTO `yabontiap_categorie` (`id`, `nom`, `image`) VALUES
(1, 'Entrées', 'entree.jpg'),
(2, 'Plats Principaux', 'plat.jpg'),
(3, 'Desserts', 'dessert.jpg'),
(4, 'Desserts 2', 'dessert.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `yabontiap_ingredient`
--

CREATE TABLE `yabontiap_ingredient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `yabontiap_ingredient`
--

INSERT INTO `yabontiap_ingredient` (`id`, `nom`, `image`) VALUES
(1, 'Laitue', 'laitue.jpg'),
(2, 'Tomate', 'tomate.jpg'),
(3, 'Croûtons', 'croutons.jpg'),
(4, 'Poulet', 'poulet.jpg'),
(5, 'Pâte', 'pate.jpg'),
(6, 'Fromage', 'fromage.jpg'),
(7, 'Pomme', 'pomme.jpg'),
(8, 'Chocolat', 'chocolat.jpg'),
(9, 'Oeuf', 'oeuf.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `yabontiap_recette`
--

CREATE TABLE `yabontiap_recette` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `id_categorie` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `yabontiap_recette`
--

INSERT INTO `yabontiap_recette` (`id`, `nom`, `description`, `image`, `id_categorie`) VALUES
(1, 'Salade César', 'Mélangez les légumes frais, ajoutez les croûtons et le parmesan. Assaisonnez avec la sauce César.', 'salade_cesar.jpg', 1),
(2, 'Soupe à la tomate', 'Faites cuire les tomates avec des oignons, mixez et ajoutez des épices. Servez chaud.', 'soupe_tomate.jpg', 1),
(3, 'Bruschetta', 'Grillez du pain, frottez avec de l\'ail, ajoutez des tomates, basilic et huile d\'olive.', 'bruschetta.jpg', 1),
(4, 'Poulet rôti', 'Assaisonnez le poulet, enfournez à 200°C pendant 1h30. Servez avec des légumes rôtis.', 'poulet_roti.jpg', 2),
(5, 'Lasagnes', 'Alternez les couches de pâtes, viande et béchamel. Faites cuire 45 minutes à 180°C.', 'lasagnes.jpg', 2),
(6, 'Ratatouille', 'Cuisez les légumes en tranches avec de l\'huile d\'olive et des herbes de Provence.', 'ratatouille.jpg', 2),
(7, 'Tarte aux pommes', 'Disposez les pommes sur la pâte, saupoudrez de sucre et faites cuire 40 minutes à 180°C.', 'tarte_pommes.jpg', 3),
(8, 'Mousse au chocolat', 'Faites fondre le chocolat, ajoutez les œufs battus en neige et réfrigérez.', 'mousse_chocolat.jpg', 3),
(9, 'Crème brûlée', 'Mélangez les jaunes d\'œufs, la crème et le sucre. Faites cuire au bain-marie, caramélisez le dessus.', 'creme_brulee.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `yabontiap_recette_ingredient`
--

CREATE TABLE `yabontiap_recette_ingredient` (
  `id_recette` bigint(20) UNSIGNED NOT NULL,
  `id_ingredient` bigint(20) UNSIGNED NOT NULL,
  `quantite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `yabontiap_recette_ingredient`
--

INSERT INTO `yabontiap_recette_ingredient` (`id_recette`, `id_ingredient`, `quantite`) VALUES
(1, 1, '2 tasses'),
(1, 2, '1 tasse'),
(1, 3, '1/2 tasse'),
(2, 2, '4'),
(2, 6, '1/2 tasse'),
(2, 9, '1'),
(3, 2, '2'),
(3, 6, '1/4 tasse'),
(3, 9, '1'),
(4, 4, '1'),
(4, 5, '2 tasses'),
(4, 6, '1 tasse'),
(5, 4, '500g'),
(5, 5, '300g'),
(5, 6, '2 tasses'),
(6, 2, '3'),
(6, 5, '2 tasses'),
(6, 6, '1 tasse'),
(7, 6, '1/2 tasse'),
(7, 7, '3'),
(7, 9, '2'),
(8, 6, '1/4 tasse'),
(8, 8, '200g'),
(8, 9, '3'),
(9, 6, '1 tasse'),
(9, 8, '1/2 tasse'),
(9, 9, '4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `songs-table`
--
ALTER TABLE `songs-table`
  ADD PRIMARY KEY (`song-id`);

--
-- Index pour la table `yabontiap_categorie`
--
ALTER TABLE `yabontiap_categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `yabontiap_ingredient`
--
ALTER TABLE `yabontiap_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `yabontiap_recette`
--
ALTER TABLE `yabontiap_recette`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `yabontiap_recette_ingredient`
--
ALTER TABLE `yabontiap_recette_ingredient`
  ADD PRIMARY KEY (`id_recette`,`id_ingredient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `yabontiap_categorie`
--
ALTER TABLE `yabontiap_categorie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `yabontiap_ingredient`
--
ALTER TABLE `yabontiap_ingredient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `yabontiap_recette`
--
ALTER TABLE `yabontiap_recette`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
