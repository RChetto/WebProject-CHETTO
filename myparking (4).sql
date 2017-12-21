-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 06 Décembre 2017 à 16:58
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `myparking`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_com` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  UNIQUE KEY `id_com` (`id_com`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `id_place`, `id_user`, `contenu`, `date`) VALUES
(1, 0, 1, 'sddsfsddsfsd', '0000-00-00'),
(2, 0, 1, 'sddsfsddsfsd', '0000-00-00'),
(3, 0, 1, 'lol', '2017-11-22'),
(4, 0, 1, 'mdr', '2017-11-22'),
(5, 3, 1, 'gfdgd', '2017-11-22'),
(7, 1, 6, 'wech', '2017-11-22'),
(8, 1, 6, 'xwcvswc', '2017-11-22'),
(9, 1, 6, 'cxvxvxc', '2017-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `forum_signaler`
--

CREATE TABLE IF NOT EXISTS `forum_signaler` (
  `id_f_signal` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_sujet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `m_s_nombre` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_f_signal`),
  UNIQUE KEY `id_m_signal` (`id_f_signal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE IF NOT EXISTS `louer` (
  `id_place` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_place`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `louer`
--

INSERT INTO `louer` (`id_place`, `date_debut`, `date_fin`) VALUES
(8, '2017-12-17', '2017-12-18'),
(11, '2017-12-17', '2017-12-19');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_message` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login_expediteur` varchar(100) NOT NULL,
  `login_destinataire` varchar(100) NOT NULL,
  `objet` text NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_message`),
  UNIQUE KEY `id_message` (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `messagerie`
--

INSERT INTO `messagerie` (`id_message`, `login_expediteur`, `login_destinataire`, `objet`, `contenu`, `date`) VALUES
(17, '1', 'az', 'dsffsfsd', 'cgwfgdfsgf', '2017-11-28 13:31:58'),
(18, '1', 'az', 'wfgvdwf', 'dsvvcx', '2017-11-28 13:32:17'),
(19, '1', 'root', 'xvxcvxcvx', 'vxcvxcvxc', '2017-11-28 13:43:02'),
(20, 'root', 'root', 'scvx', 'cvcxvxc', '2017-11-28 13:52:31'),
(21, 'Service de location', 'test1', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par test1\n		 du 2017-12-04/ au 2017-12-05/ ( 1/ jour(s)) pour 500/ euro(s).', '2017-12-02 20:33:35'),
(22, 'Service de location', 'test1', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  test1\n		 du 2017-12-04/ au 2017-12-05/ ( 1/ jour(s)) pour 500/ euro(s).', '2017-12-02 20:33:35'),
(23, 'Service de location', 'root', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 12/11/2017 au 12/12/2017 ( 1 jour(s)) pour 1111 euro(s).', '2017-12-05 19:53:05'),
(24, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  root\n		 du 12/11/2017 au 12/12/2017 ( 1 jour(s)) pour 1111 euro(s).', '2017-12-05 19:53:05'),
(25, 'Service de location', 'root', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 2017-12-18 au 2017-12-19 ( 1 jour(s)) pour 150 euro(s).', '2017-12-05 19:56:34'),
(26, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  root\n		 du 2017-12-18 au 2017-12-19 ( 1 jour(s)) pour 150 euro(s).', '2017-12-05 19:56:34'),
(27, 'Service de location', 'yassine', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 12/17/2017 au 12/18/2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 19:58:07'),
(28, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  yassine\n		 du 12/17/2017 au 12/18/2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 19:58:07'),
(29, 'Service de location', 'yassine', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 12/01/2017 au 12/03/2017 ( 2 jour(s)) pour 20 euro(s).', '2017-12-05 19:58:53'),
(30, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  yassine\n		 du 12/01/2017 au 12/03/2017 ( 2 jour(s)) pour 20 euro(s).', '2017-12-05 19:58:53'),
(31, 'Service de location', 'yassine', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 17-12-2017 au 18-12-2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 20:02:13'),
(32, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  yassine\n		 du 17-12-2017 au 18-12-2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 20:02:13'),
(33, 'Service de location', 'yassine', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 23-12-2017 au 24-12-2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 20:03:23'),
(34, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  yassine\n		 du 23-12-2017 au 24-12-2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 20:03:23'),
(35, 'Service de location', 'yassine', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 23-12-2017 au 24-12-2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 20:03:52'),
(36, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  yassine\n		 du 23-12-2017 au 24-12-2017 ( 1 jour(s)) pour 10 euro(s).', '2017-12-05 20:03:52'),
(37, 'Service de location', 'root', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 2017-12-18 au 19-12-2017 ( 1 jour(s)) pour 150 euro(s).', '2017-12-05 20:05:09'),
(38, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  root\n		 du 2017-12-18 au 19-12-2017 ( 1 jour(s)) pour 150 euro(s).', '2017-12-05 20:05:09'),
(39, 'Service de location', 'root', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine\n		 du 17-12-2017 au 18-12-2017 ( 1 jour(s)) pour 150 euro(s).', '2017-12-05 20:08:54'),
(40, 'Service de location', 'yassine', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  root\n		 du 17-12-2017 au 18-12-2017 ( 1 jour(s)) pour 150 euro(s).', '2017-12-05 20:08:54'),
(43, 'yassine@myParking.good', 'root', 'waw', 'vxcvxcvxc', '2017-12-05 21:21:53'),
(44, 'yassine@myParking.good', 'root', 'vcbwvbwvc', 'dfdFSD', '2017-12-05 21:27:00'),
(45, 'Service de location', 'yassine', 'Location de Place', 'votre place de parking a Ã©tÃ© louer par yassine@myParking.good\n		 du 17-12-2017 au 19-12-2017 ( 2 jour(s)) pour 20 euro(s).', '2017-12-06 11:54:40'),
(46, 'Service de location', 'yassine@myParking.good', 'Location de Place', 'Vous avez louer une  place de parking du proprietaire  yassine\n		 du 17-12-2017 au 19-12-2017 ( 2 jour(s)) pour 20 euro(s).', '2017-12-06 11:54:40');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id_utilisateur` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id_utilisateur`, `id_place`, `note`) VALUES
(7, 9, 3),
(7, 7, 5),
(7, 11, 3),
(7, 8, 3),
(13, 12, 3),
(13, 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `profil_signaler`
--

CREATE TABLE IF NOT EXISTS `profil_signaler` (
  `id_c_signaler` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user_signaler` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nb_c_signaler` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_c_signaler`),
  UNIQUE KEY `id_c_signaler` (`id_c_signaler`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `p_signaler`
--

CREATE TABLE IF NOT EXISTS `p_signaler` (
  `id_p_signale` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `p_s_nombre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_p_signale`),
  UNIQUE KEY `id_p_signale` (`id_p_signale`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_annonceur`
--

CREATE TABLE IF NOT EXISTS `t_annonceur` (
  `id_user_an` int(11) NOT NULL,
  `nb_place` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user_an`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_avis`
--

CREATE TABLE IF NOT EXISTS `t_avis` (
  `id_place_av` int(11) NOT NULL,
  `id_user_av` int(11) NOT NULL,
  `date_avis` datetime NOT NULL,
  `contenu` text,
  PRIMARY KEY (`id_place_av`,`id_user_av`,`date_avis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_compte`
--

CREATE TABLE IF NOT EXISTS `t_compte` (
  `login` varchar(32) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `id_user_co` int(11) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_compte`
--

INSERT INTO `t_compte` (`login`, `password`, `id_user_co`) VALUES
('az', 'cc8c0a97c2dfcd73caff160b65aa39e2', 2),
('azakine@myParking.good', '5f4dcc3b5aa765d61d8327deb882cf99', 13),
('azertdsfsdgsdy', 'c4ca4238a0b923820dcc509a6f75849b', 8),
('nicols009', 'c4ca4238a0b923820dcc509a6f75849b', 9),
('reter', '2db313fabca57504d9dc776e46b304f6', 11),
('root', '63a9f0ea7bb98050796b649e85481845', 1),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 10),
('yassine', '5bfe0c405c67de32b1de9ea40d093666', 7),
('yassine@myParking.good', 'c4ca4238a0b923820dcc509a6f75849b', 12),
('zak', '735f33abd0d7909db1c7164370712266', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_message`
--

CREATE TABLE IF NOT EXISTS `t_message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_sujet_me` int(11) NOT NULL,
  `id_user_me` int(11) NOT NULL,
  `date_post` datetime DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `t_message`
--

INSERT INTO `t_message` (`id_message`, `id_sujet_me`, `id_user_me`, `date_post`, `message`) VALUES
(1, 7, 1, '2017-11-20 21:11:26', 'sdgsgs'),
(2, 8, 1, '2017-11-20 21:14:03', 'wdfgdf'),
(3, 15, 7, '2017-11-23 08:11:36', 'dfgdfgdsf'),
(4, 6, 7, '2017-11-25 13:58:36', 'xvwbwd'),
(5, 16, 1, '2017-11-25 16:00:20', 'OUI OIUI ET VS'),
(6, 10, 1, '2017-11-28 19:13:39', 'aze'),
(8, 17, 12, '2017-12-05 21:30:00', 'sdfsdgsg\r\n'),
(9, 17, 12, '2017-12-05 21:31:06', 'sfsdfs');

-- --------------------------------------------------------

--
-- Structure de la table `t_place`
--

CREATE TABLE IF NOT EXISTS `t_place` (
  `id_user_pl` int(11) NOT NULL,
  `id_place` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prix_jour` int(11) NOT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `pmr` tinyint(1) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `photo` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_user_pl`,`id_place`),
  UNIQUE KEY `id_place` (`id_place`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `t_place`
--

INSERT INTO `t_place` (`id_user_pl`, `id_place`, `prix_jour`, `adresse`, `code_postal`, `ville`, `type`, `description`, `pmr`, `note`, `photo`) VALUES
(1, 5, 10, 'cxvxc', 50420, 'xvxcw', 0, 'svcvxcw', 0, 5, 'images/photoEmplacement/5.jpg'),
(1, 7, 1111, '3 ter rue du val content', 92260, 'fontenay aux roses', 0, 'vvxcvxcvxc', 0, 5, 'images/photoEmplacement/7.jpg'),
(1, 8, 150, '10 rue guynemer', 94160, 'saint-mandÃ©', 0, 'petit', 1, 3, 'images/photoEmplacement/8.jpg'),
(1, 9, 300, '64 rue du general de gaulle', 75017, 'paris', 0, 'bien', 0, 3, 'images/photoEmplacement/9.jpg'),
(1, 10, 50, '56 rue de lalouette', 94160, 'saint-mandÃ©', 0, 'top', 0, 5, 'images/photoEmplacement/10.jpg'),
(7, 4, 10, 'sdsdfs', 95120, 'fsdfsd', 0, 'dsfsgdfsdvsvd', 0, 5, 'images/photoEmplacement/4.jpg'),
(7, 11, 10, '10 rue guynemer', 94160, 'saint-mandÃ©', 0, 'lool', 0, 3, 'images/photoEmplacement/11.jpg'),
(13, 12, 10, 'rue de vincennes', 94400, 'paris', 0, 'r', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_reservation`
--

CREATE TABLE IF NOT EXISTS `t_reservation` (
  `id_user_re` int(11) NOT NULL,
  `id_place_re` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  PRIMARY KEY (`id_user_re`,`id_place_re`,`date_debut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_sujet`
--

CREATE TABLE IF NOT EXISTS `t_sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `nom_sujet` varchar(40) DEFAULT NULL,
  `description_sujet` text NOT NULL,
  `date_sujet` datetime DEFAULT NULL,
  `id_user_su` int(11) NOT NULL,
  PRIMARY KEY (`id_sujet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `t_sujet`
--

INSERT INTO `t_sujet` (`id_sujet`, `nom_sujet`, `description_sujet`, `date_sujet`, `id_user_su`) VALUES
(10, 'vwxfsw', 'sdfsdfsdfgsf', '2017-11-22 17:30:46', 1),
(12, 'fdvc', 'sfgsgf', '2017-11-22 17:36:00', 1),
(14, 'xcvcxvx', 'cwvcvxc', '2017-11-22 17:37:13', 7),
(16, 'ca va', 'MFDGJHKFDJFGDKSGJFKDLHGDJHGKSDJ', '2017-11-25 16:00:08', 1),
(17, 'aze', 'ghch', '2017-11-29 11:57:42', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE IF NOT EXISTS `t_utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `adr_post` varchar(150) DEFAULT NULL,
  `adr_mail` varchar(100) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `role` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id_user`, `nom`, `prenom`, `adr_post`, `adr_mail`, `telephone`, `role`) VALUES
(1, 'root', 'root', 'root', 'root', '625154686', 'admin'),
(3, 'azk', 'zak', 'za', 'zak', '0613593616', 'user'),
(7, 'yassine', 'yassine', 'granal@gmail.com', 'yoy@gmail.com', '0665093018', 'user'),
(8, 'dggfd', 'jfkgmfdjksdj', 'sgsgs', 'root@gfxflkxmail.com', '0665093018', 'user'),
(9, 'nicols', 'granal', 'dsgfdhsfhsfd', 'granal@gmail.com', '0665093018', 'user'),
(10, 'user', 'user', 'user', 'uer1', '06222222222', 'user'),
(11, 'azettre', 'retrettre', 'erter', 'trert', 'erter', 'user'),
(12, 'yassine', 'yassine', 'rue', 'yassin1e@gmail.com', '0665093018', 'user'),
(13, 'anthony', 'zakine', 'rue de paris', 'anthony@gmail.com', '+33629441545', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
