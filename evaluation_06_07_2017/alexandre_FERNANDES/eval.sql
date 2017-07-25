-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Juillet 2017 à 17:38
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--
CREATE DATABASE IF NOT EXISTS `exercice_3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `exercice_3`;

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_movie` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `year_of_prod` year(4) NOT NULL,
  `language` varchar(255) NOT NULL,
  `category` enum('fiction','documentaire','film sérieux','film de propagande') DEFAULT 'fiction',
  `storyline` text NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id_movie`, `title`, `actors`, `director`, `producer`, `year_of_prod`, `language`, `category`, `storyline`, `video`) VALUES
(1, 'La brute et le truand', 'Sidney Poitier', 'boris Vian', 'Mickey Mouse', 1979, 'vostfr', '', 'film sérieux', 'http://www.film.fr'),
(6, 'fzfsdggzegzeg', 'egagzegzeg', 'gzeezgzegze', 'geazgzegzeg', 1915, 'fr', '', 'fiction', 'http://www.ausecours.fr'),
(7, 'fzfsdggzegzeg', 'egagzegzeg', 'gzeezgzegze', 'geazgzegzeg', 1915, 'fr', '', 'fiction', 'http://www.ausecours.fr'),
(8, 'fzfsdggzegzeg', 'egagzegzeg', 'gzeezgzegze', 'geazgzegzeg', 1915, 'fr', '', 'fiction', 'http://www.ausecours.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
