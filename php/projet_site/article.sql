-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 04 Juillet 2017 à 21:55
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wf3_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `reference` int(15) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `taille` varchar(3) NOT NULL,
  `sexe` enum('m','f') NOT NULL DEFAULT 'm',
  `photo` varchar(255) NOT NULL,
  `prix` double(7,2) NOT NULL,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `sexe`, `photo`, `prix`, `stock`) VALUES
(36, 54358, 'pull', 'pull noir taille L', 'Ce pull d\'occasion est à peine élimé.', 'noir', 'l', 'm', '54358_TO122Q02H-Q12@10.jpg', 20.00, 10),
(37, 54359, 'chaussure', 'basket  verte', 'Camouflage garanti en forêt!', 'vert', 'l', 'm', '54359_N1242A137-M11@12.jpg', 30.00, 6),
(38, 54360, 'chaussure', 'stan smith', 'Reviennent à la mode. Elles sont 5 fois plus chères qu\'en 1990.', 'blanc', 'l', 'm', '54360_AD115B01K-A12@12.jpg', 75.00, 10),
(39, 54361, 'chaussure', 'basket bleues', 'Elles sont bleues !!! on peut faire du sport avec.', 'bleu', 'l', 'm', '54361_NE212B04F-K11@12.jpg', 47.00, 9),
(43, 54366, 'chemise', 'chemise saumon taille XXL', 'Couleur saumon, marqué comme orange.', 'orange', 'xxl', 'm', '54366_TO222D0D0-H11@14.jpg', 40.00, 10),
(44, 54367, 'chemise', 'chemise saumon taille L', 'Couleur saumon, marqué comme orange. Taille L.', 'orange', 'l', 'm', '54367_TO222D0D0-H11@14.jpg', 40.00, 10),
(45, 54368, 'chemise', 'chemise bleu ciel taille XXS', 'Chemise bleu comme le ciel.', 'bleu', 'xxs', 'm', '54368_TO222D0D0-K11@12.jpg', 30.00, 9),
(46, 54369, 'chemise', 'chemise bleu ciel taille L', 'Achetez la!', 'bleu', 'l', 'm', '54369_TO222D0D0-K11@12.jpg', 30.00, 10),
(48, 54371, 'chemise', 'chemise bleu ou mauve taille XXL', 'elle peut être bleue ou mauve, en fonction du niveau de daltonisme.', 'noir', 'xxl', 'm', '54371_TO222D0D0-K12@14.jpg', 44.00, 10),
(49, 54372, 'pantalon', 'pantalon noir taille XXL', '2 jambes pour les gens non estropiés.', 'noir', 'xxl', 'm', '54372_OS322E016-Q11@12.jpg', 39.00, 10),
(50, 54373, 'pantalon', 'pantalon noir taille L', 'Vous aurez fière allure avec ce pantalon pour toutes les occasions.', 'noir', 'l', 'm', '54373_OS322E016-Q11@12.jpg', 41.00, 10),
(51, 54374, 'pantalon', 'pantalon beige taille XL', 'Attention où vous vous asseyez.', 'blanc', 'xl', 'm', '54374_GS122E04L-B11@12.jpg', 37.00, 10),
(52, 54375, 'pantalon', 'pantalon beige taille L', 'Un des rares modèle féminin de notre catalogue. Pour les tests sur notre BDD.', 'blanc', 'l', 'f', '54375_GS122E04L-B11@12.jpg', 23.00, 10),
(53, 54376, 'pantalon', 'pantalon taille L', 'Pour les femmes qui portent des pantalons.', 'rouge', 'l', 'm', '54376_HU722A012-G13@12.1.jpg', 40.00, 10),
(54, 54377, 'pantalon', 'pantalon taille Xl', 'Pantalon rouge un peu moulant.', 'rouge', 'xl', 'm', '54377_HU722A012-G13@12.1.jpg', 35.00, 10),
(55, 54378, 'pantalon', 'pantalon', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'bleu', 'xl', 'm', '54378_HU722A012-K14@12.jpg', 40.00, 10),
(57, 54380, 'pantalon', 'pantalon', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'bleu', 's', 'm', '54380_HU722A012-K14@12.jpg', 40.00, 10),
(58, 54381, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'blanc', 's', 'm', '54381_TO122Q02H-A11@12.jpg', 40.00, 10),
(61, 54384, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'blanc', 'xl', 'm', '54384_TO122Q02H-A11@12.jpg', 40.00, 10),
(63, 54386, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'orange', 'xl', 'm', '54386_TO122Q02H-G12@12.jpg', 40.00, 10),
(64, 54387, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'orange', 'xxl', 'm', '54387_TO122Q02H-G12@12.jpg', 40.00, 10),
(65, 54388, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'vert', 'xs', 'm', '54388_TO122Q02H-M11@12.jpg', 40.00, 10),
(67, 54390, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'vert', 'xxl', 'm', '54390_TO122Q02H-M11@12.jpg', 40.00, 10),
(69, 54392, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'noir', 'xl', 'm', '54392_TO122Q02H-Q12@10.jpg', 40.00, 10),
(70, 54393, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'noir', 's', 'm', '54393_TO122Q02H-Q12@10.jpg', 40.00, 10),
(71, 54394, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'noir', 'l', 'm', '54394_TO122Q02H-Q12@10.jpg', 40.00, 10),
(74, 5438887, 'pull', 'pull', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'blanc', 'xxl', 'm', '5438887_TO122Q02H-Q12@10.jpg', 40.00, 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
