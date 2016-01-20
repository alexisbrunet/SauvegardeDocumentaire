-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 18 Janvier 2016 à 22:21
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `autorisation`
--

CREATE TABLE IF NOT EXISTS `autorisation` (
  `id_utilisateur` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  `valeur_autorisation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `autorisation2`
--

CREATE TABLE IF NOT EXISTS `autorisation2` (
  `id_equipe` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  `valeur_autorisation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE IF NOT EXISTS `contenir` (
  `id_dossier` int(11) NOT NULL,
  `id_dossier_contenu` int(11) NOT NULL,
  `id_fichier_contenu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `definir_mot_cle_fichier`
--

CREATE TABLE IF NOT EXISTS `definir_mot_cle_fichier` (
  `id_mot_cle` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
`id_dossier` int(11) NOT NULL,
  `nom_dossier` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
`id_equipe` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE IF NOT EXISTS `fichier` (
`id_fichier` int(11) NOT NULL,
  `auteur` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `resume` varchar(500) NOT NULL,
  `chemin_relatif` varchar(250) NOT NULL,
  `extention` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mot_cle`
--

CREATE TABLE IF NOT EXISTS `mot_cle` (
`id_mot_cle` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `id_utilisateur` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_fichier`
--

CREATE TABLE IF NOT EXISTS `type_fichier` (
`id_type_fichier` int(11) NOT NULL,
  `extention` varchar(50) NOT NULL,
  `logiciel` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
 ADD PRIMARY KEY (`id_utilisateur`,`id_equipe`);

--
-- Index pour la table `autorisation`
--
ALTER TABLE `autorisation`
 ADD PRIMARY KEY (`id_utilisateur`,`id_fichier`);

--
-- Index pour la table `autorisation2`
--
ALTER TABLE `autorisation2`
 ADD PRIMARY KEY (`id_equipe`,`id_fichier`);

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
MODIFY `id_fichier` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
