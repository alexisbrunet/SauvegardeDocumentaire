-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 21 Février 2016 à 15:39
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `thotbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE IF NOT EXISTS `appartenir` (
  `id_utilisateur` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `autorisation_dossier`
--

CREATE TABLE IF NOT EXISTS `autorisation_dossier` (
  `id_utilisateur` int(11) NOT NULL,
  `id_dossier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `autorisation_equipe_dossier`
--

CREATE TABLE IF NOT EXISTS `autorisation_equipe_dossier` (
  `id_equipe` int(11) NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `valeur_autorisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `autorisation_equipe_fichier`
--

CREATE TABLE IF NOT EXISTS `autorisation_equipe_fichier` (
  `id_equipe` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  `valeur_autorisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `autorisation_fichier`
--

CREATE TABLE IF NOT EXISTS `autorisation_fichier` (
  `id_utilisateur` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  `valeur_autorisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `autorisation_fichier`
--

INSERT INTO `autorisation_fichier` (`id_utilisateur`, `id_fichier`, `valeur_autorisation`) VALUES
(2, 2, 3),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE IF NOT EXISTS `contenir` (
  `id_dossier` int(11) NOT NULL,
  `id_dossier_contenu` int(11) NOT NULL,
  `id_fichier_contenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `definir_mot_cle_fichier`
--

CREATE TABLE IF NOT EXISTS `definir_mot_cle_fichier` (
  `id_mot_cle` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
`id_dossier` int(11) NOT NULL,
  `nom_dossier` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
`id_equipe` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE IF NOT EXISTS `fichier` (
`id_fichier` int(11) NOT NULL,
  `auteur` int(11) NOT NULL,
  `titre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `resume` varchar(500) CHARACTER SET latin1 NOT NULL,
  `chemin_relatif` varchar(250) CHARACTER SET latin1 NOT NULL,
  `extention` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `fichier`
--

INSERT INTO `fichier` (`id_fichier`, `auteur`, `titre`, `resume`, `chemin_relatif`, `extention`) VALUES
(1, 3, 'testchoco', 'ceci est un fichier', 'fichiers/testchoco.txt', '.txt'),
(2, 2, 'blub', 'encore un petit test', 'fichiers/blub.txt', '.txt');

-- --------------------------------------------------------

--
-- Structure de la table `mot_cle`
--

CREATE TABLE IF NOT EXISTS `mot_cle` (
`id_mot_cle` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `id_utilisateur` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_fichier`
--

CREATE TABLE IF NOT EXISTS `type_fichier` (
`id_type_fichier` int(11) NOT NULL,
  `extention` varchar(50) CHARACTER SET latin1 NOT NULL,
  `logiciel` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pseudo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `adresse_mail` varchar(50) CHARACTER SET latin1 NOT NULL,
  `mot_de_passe` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `pseudo`, `adresse_mail`, `mot_de_passe`) VALUES
(2, 'testus', 'test', 'test', 'test@test.fr', 'test'),
(3, 'jo', 'jo', 'jo', 'jo@gmail.com', 'ducon');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
 ADD PRIMARY KEY (`id_utilisateur`,`id_equipe`);

--
-- Index pour la table `autorisation_dossier`
--
ALTER TABLE `autorisation_dossier`
 ADD PRIMARY KEY (`id_utilisateur`,`id_dossier`);

--
-- Index pour la table `autorisation_equipe_dossier`
--
ALTER TABLE `autorisation_equipe_dossier`
 ADD PRIMARY KEY (`id_equipe`,`id_dossier`);

--
-- Index pour la table `autorisation_equipe_fichier`
--
ALTER TABLE `autorisation_equipe_fichier`
 ADD PRIMARY KEY (`id_equipe`,`id_fichier`);

--
-- Index pour la table `autorisation_fichier`
--
ALTER TABLE `autorisation_fichier`
 ADD PRIMARY KEY (`id_utilisateur`,`id_fichier`);

--
-- Index pour la table `definir_mot_cle_fichier`
--
ALTER TABLE `definir_mot_cle_fichier`
 ADD PRIMARY KEY (`id_mot_cle`,`id_fichier`);

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
 ADD PRIMARY KEY (`id_dossier`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
 ADD PRIMARY KEY (`id_equipe`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
 ADD PRIMARY KEY (`id_fichier`);

--
-- Index pour la table `mot_cle`
--
ALTER TABLE `mot_cle`
 ADD PRIMARY KEY (`id_mot_cle`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
 ADD PRIMARY KEY (`id_utilisateur`,`id_equipe`);

--
-- Index pour la table `type_fichier`
--
ALTER TABLE `type_fichier`
 ADD PRIMARY KEY (`id_type_fichier`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dossier`
--
ALTER TABLE `dossier`
MODIFY `id_dossier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
MODIFY `id_fichier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mot_cle`
--
ALTER TABLE `mot_cle`
MODIFY `id_mot_cle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_fichier`
--
ALTER TABLE `type_fichier`
MODIFY `id_type_fichier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
