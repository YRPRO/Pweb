-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Octobre 2015 à 09:34
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(300) NOT NULL,
  `dateCreation` date NOT NULL,
  `idTheme` int(11) NOT NULL,
  `idRestriction` int(11) NOT NULL,
  `login` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nbLike` int(11) DEFAULT '0',
  `nbUnlike` int(11) DEFAULT '0',
  PRIMARY KEY (`idCommentaire`),
  KEY `fk_commentaire_idtheme` (`idTheme`),
  KEY `fk_commentaire_restriction` (`idRestriction`),
  KEY `fk_commentaire_idutilisateur` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `commentaire`, `dateCreation`, `idTheme`, `idRestriction`, `login`, `nbLike`, `nbUnlike`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 1, 1, 'a', 0, 0),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 2, 2, 'a', 0, 0),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 3, 3, 'a', 0, 0),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 4, 1, 'b', 0, 0),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 5, 2, 'b', 0, 0),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 6, 3, 'b', 0, 0),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 7, 1, 'c', 0, 0),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 8, 2, 'c', 0, 0),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 9, 3, 'c', 0, 0),
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 10, 1, 'd', 0, 0),
(11, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 11, 2, 'd', 0, 0),
(12, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 12, 3, 'd', 0, 0),
(13, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 13, 1, 'e', 0, 0),
(14, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 14, 2, 'e', 0, 0),
(15, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 15, 3, 'e', 0, 0),
(16, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 1, 1, 'f', 0, 0),
(17, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 1, 2, 'f', 0, 0),
(18, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r', '2015-10-02', 1, 3, 'f', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `utilisateur` varchar(15) CHARACTER SET latin1 NOT NULL,
  `amis` varchar(15) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`utilisateur`,`amis`),
  KEY `fk_contact_idAmis` (`amis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`utilisateur`, `amis`) VALUES
('a', 'b'),
('a', 'c'),
('a', 'd'),
('f', 'd'),
('a', 'e'),
('b', 'e'),
('a', 'f');

-- --------------------------------------------------------

--
-- Structure de la table `restriction`
--

CREATE TABLE IF NOT EXISTS `restriction` (
  `idRestriction` int(11) NOT NULL AUTO_INCREMENT,
  `typeRestriction` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idRestriction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `restriction`
--

INSERT INTO `restriction` (`idRestriction`, `typeRestriction`) VALUES
(1, 'privé'),
(2, 'contact'),
(3, 'public');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `idTheme` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTheme` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dateCreation` date NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`idTheme`, `libelleTheme`, `dateCreation`) VALUES
(1, 'Sport', '2015-10-02'),
(2, 'Nature', '2015-10-02'),
(3, 'Science', '2015-10-02'),
(4, 'Economie', '2015-10-02'),
(5, 'TV', '2015-10-02'),
(6, 'Loisir', '2015-10-02'),
(7, 'Cinema', '2015-10-02'),
(8, 'Informatique', '2015-10-02'),
(9, 'Technologie', '2015-10-02'),
(10, 'Actualité', '2015-10-02'),
(11, 'News', '2015-10-02'),
(12, 'Voyage', '2015-10-02'),
(13, 'Musique', '2015-10-02'),
(14, 'Photo', '2015-10-02'),
(15, 'Voiture', '2015-10-02'),
(16, 'Jeux', '2015-10-02'),
(17, 'Politique', '2015-10-02'),
(18, 'Etude', '2015-10-02'),
(19, 'Argent', '2015-10-02');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sexe` varchar(1) CHARACTER SET latin1 NOT NULL,
  `dateN` date NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `dateInscription` date NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `nom`, `prenom`, `sexe`, `dateN`, `email`, `password`, `dateInscription`) VALUES
('a', 'a', 'a', 'f', '1995-10-11', 'a@a.fr', 'a', '2015-10-01'),
('b', 'b', 'b', 'f', '1995-10-11', 'b@b.fr', 'b', '2015-10-02'),
('c', 'c', 'c', 'M', '1995-12-21', 'c@c.fr', 'c', '2015-10-02'),
('d', 'd', 'd', 'M', '1995-12-21', 'd@d.fr', 'd', '2015-10-02'),
('e', 'e', 'e', 'M', '1995-12-21', 'e@e.fr', 'e', '2015-10-02'),
('f', 'f', 'f', 'f', '1995-12-21', 'f@f.fr', 'f', '2015-10-02'),
('fbx158355550', 'toto', 'hyhy', 'F', '0000-00-00', 'hyhyh@tktk.fr', 'toto', '2015-04-10'),
('fofo', 'kiki', 'tata', 'F', '0000-00-00', 'keke@gmail.fr', 'toto', '2015-06-10'),
('koko', 'toto', 'huuh', 'F', '0000-00-00', 'takner_75@hotmail.fr', 'toto', '2015-04-10'),
('kookok', 'mamamam', 'mamap', 'F', '0000-00-00', 'tatata@hr.fr', 'tatata', '2015-07-10'),
('meme', 'toto', 'hyhy', 'F', '0000-00-00', 'hyhyh@tktk.fr', 'tito', '2015-04-10'),
('MIMO', 'kiki', 'tata', 'F', '0000-00-00', 'keke@gmail.fr', 'HAHA', '2015-06-10'),
('ss', 'tata', 'jje', 'F', '0000-00-00', 'tat@gmail.fe', 'tata', '2015-04-10'),
('Tameur', 'TOTO', 'TAKNER', 'F', '0000-00-00', 'hyhyh@tktk.fr', 'TOTO', '2015-04-10');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_idtheme` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`),
  ADD CONSTRAINT `fk_commentaire_idutilisateur` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
  ADD CONSTRAINT `fk_commentaire_restriction` FOREIGN KEY (`idRestriction`) REFERENCES `restriction` (`idRestriction`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_idAmis` FOREIGN KEY (`amis`) REFERENCES `utilisateur` (`login`),
  ADD CONSTRAINT `fk_contact_idUtil` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
