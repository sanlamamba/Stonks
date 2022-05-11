-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 mai 2022 à 16:18
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stonks`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `pwd`, `token`) VALUES
(17, 'Geraud', 'Ndoro', 'draxx@gmail.com', 'bfbaf89898edceb5546c41ec5ceffd576479f64c31f4bec6b6cf482c37ad7215', 'eb6d3861b4b421ae3766e9e255f6ffefc11603466db8c16d17998cbfa1adb71e'),
(16, 'Lamamba', 'San', 'lamamba@gmail.com', '85e08310e52251dd5b5e3d185c0ffbe74b418c469c2a08ef6d768e7a39c82cf7', 'fdae533886f58268a15d894e5caaa4ef9900d4d0e8afa70d46688b1c798b14f4');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `label`) VALUES
(1, 'Autres'),
(2, 'Boisson');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` varchar(255) NOT NULL,
  `date_livraison` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `panier_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date_commande`, `date_livraison`, `client_id`, `panier_id`, `status`) VALUES
(5, '03/05/2022', '01/06/2022', 9, 'Ph744z8WngPxT7LGQ4v1mGUN', 'En Attente'),
(6, '07/05/2022', '28/05/2022', 13, 'I9mnFR', 'En Attente'),
(7, '03/05/2022', '01/06/2022', 14, 'Ph744z8WngPxT7LGQ4v1mGUN', 'En Attente'),
(8, '09/05/2022', '17/05/2022', 9, 'ku7viw', 'En Attente'),
(9, '11/05/2022', '01/07/2022', 13, '2sEBZ4', 'En Attente'),
(10, '11/05/2022', '27/05/2022', 13, 'GBM6Yd', 'En Attente');

-- --------------------------------------------------------

--
-- Structure de la table `fournitures`
--

DROP TABLE IF EXISTS `fournitures`;
CREATE TABLE IF NOT EXISTS `fournitures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantite_avant` int(11) NOT NULL,
  `quantite_fournie` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournitures`
--

INSERT INTO `fournitures` (`id`, `quantite_avant`, `quantite_fournie`, `produit_id`, `date`) VALUES
(29, 1000, 1200, 3, '09/05/2022'),
(27, 500, 500, 2, '07/05/2022'),
(25, 200, 800, 3, '07/05/2022');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

DROP TABLE IF EXISTS `paniers`;
CREATE TABLE IF NOT EXISTS `paniers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `livrer` int(11) NOT NULL DEFAULT '0',
  `panier_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paniers`
--

INSERT INTO `paniers` (`id`, `produit_id`, `quantite`, `livrer`, `panier_id`) VALUES
(15, 2, 200, 0, 'ku7viw'),
(14, 6, 200, 15, 'ku7viw'),
(13, 3, 200, 200, 'I9mnFR'),
(12, 2, 100, 0, 'Ph744z8WngPxT7LGQ4v1mGUN'),
(11, 3, 500, 500, 'Ph744z8WngPxT7LGQ4v1mGUN'),
(16, 3, 500, 0, 'uoPQeI'),
(17, 2, 50, 0, '2sEBZ4'),
(18, 6, 200, 0, '2sEBZ4'),
(19, 9, 500, 0, 'GBM6Yd'),
(20, 6, 1000, 0, 'GBM6Yd'),
(21, 8, 50, 0, 'GBM6Yd'),
(22, 8, 50, 0, 'GBM6Yd');

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fournisseurs_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `designation`, `quantite`, `prix`, `categorie_id`, `type`, `fournisseurs_id`) VALUES
(3, 'Colgate', 0, 1500, 1, 'Produit, Cosmetique', 10),
(2, 'Presea', 1000, 1000, 1, 'Boisson, jus', 12),
(6, 'Mouchoir', 150, 1000, 1, '', 12),
(7, 'Fer a repasser', 500, 10000, 1, 'Eletronique', 12),
(8, 'Lampe', 600, 8500, 1, 'Eletronique', 10),
(9, 'Iphone 6 Plus ', 800, 150000, 1, 'Telephone', 12);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `adresse`, `telephone`, `type`) VALUES
(9, 'Landing', 'Diatta', 'diatta@gmail.com', 'Dakar', '789632541', 'client'),
(10, 'Wahab', 'Ly', 'wahab@gmail.com', 'Dakar', '789632541', 'fournisseur'),
(12, 'Ibrahima', 'Ly', 'ibou@gmail.com', 'Dakar', '789632541', 'fournisseur'),
(13, 'Hamza', 'Sougou', 'hamza@gmail.com', 'bel air', '+221768963254', 'client');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
