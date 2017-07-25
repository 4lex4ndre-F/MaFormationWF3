-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 02 Juillet 2017 à 21:48
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wf3_repertoire`
--
CREATE DATABASE IF NOT EXISTS `wf3_repertoire` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wf3_repertoire`;

-- --------------------------------------------------------

--
-- Structure de la table `annuaire`
--

CREATE TABLE `annuaire` (
  `id_annuaire` int(3) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `profession` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_postal` int(3) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` enum('m','f') NOT NULL DEFAULT 'm',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annuaire`
--

INSERT INTO `annuaire` (`id_annuaire`, `nom`, `prenom`, `telephone`, `profession`, `ville`, `code_postal`, `adresse`, `date_de_naissance`, `sexe`, `description`) VALUES
(9, 'FERNANDES', 'Alexandre', 0630869190, 'chômeur', 'Argenteuil', 95100, '4 place des Canuts', '1976-01-31', 'm', 'RAS');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annuaire`
--
ALTER TABLE `annuaire`
  ADD PRIMARY KEY (`id_annuaire`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annuaire`
--
ALTER TABLE `annuaire`
  MODIFY `id_annuaire` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
