-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 06 Juin 2021 à 16:07
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddm2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `NumReserv` int(11) NOT NULL,
  `NomSalle` varchar(255) NOT NULL,
  `NomFormateur` varchar(255) NOT NULL,
  `DateFormation` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`NumReserv`, `NomSalle`, `NomFormateur`, `DateFormation`) VALUES
(1, 'Genève', 'Toure', '2020-05-16'),
(25, 'Luxembourg', 'Laura', '2021-06-08'),
(24, 'Luxembourg', 'Antoine', '2021-06-08'),
(18, 'arthur', 'tchitombi', '2021-05-18'),
(19, 'arthur', 'tchitombi', '2021-05-18'),
(20, 'arthur', 'tchitombi', '2021-05-18'),
(21, 'arthur', 'tchitombi', '2021-05-18'),
(22, 'arthur', 'tchitombi', '2021-05-18');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(225) NOT NULL,
  `prenom` varchar(225) NOT NULL,
  `email` varchar(125) NOT NULL,
  `complement` varchar(125) NOT NULL,
  `mdp` varchar(55) NOT NULL,
  `adresse` varchar(225) NOT NULL,
  `ville` varchar(125) NOT NULL,
  `cpostal` int(5) NOT NULL,
  `pays` varchar(125) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `complement`, `mdp`, `adresse`, `ville`, `cpostal`, `pays`) VALUES
(1, 'TCHITOMBI', 'Laura ', 'laura@hotmail.com', 'studio', 'B0nnemaman', '21 galerie la fayette', 'Paris', 75087, 'FRANCE'),
(2, 'Nkoumoug', 'Antoine', 'ankoumoug@gmail.com', 'Appartement 1', 'Bonjour', '8 Paris', 'Paris', 75000, 'FRANCE'),
(3, 'Correcteur', 'Correcteur', 'ACorrecteur@gmail.com', 'Paris', 'Acorrecteur', 'Paris', 'Paris', 75000, 'France');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`NumReserv`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `NumReserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
