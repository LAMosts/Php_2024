-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 mars 2024 à 23:13
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `image_url`) VALUES
(1, 'Électronique', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(2, 'Mode', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(3, 'Maison et jardin', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(4, 'Sport et loisirs', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(5, 'Beauté et santé', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(6, 'Alimentation et boissons', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(7, 'Automobile', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(8, 'Livres et magazines', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(9, 'Jouets et jeux', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(10, 'Équipement de bureau', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(11, 'Musique et films', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(12, 'Animaux de compagnie', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(13, 'Art et artisanat', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(14, 'Articles de fête', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(15, 'Articles de collection', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(16, 'Équipement de plein air', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(17, 'Éducation et fournitures scolaires', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(18, 'Informatique', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(19, 'Bébés et tout-petits', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(20, 'Accessoires pour animaux', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png'),
(30, 'Jeux Video', 'https://cdn.pixabay.com/photo/2017/05/26/20/23/wild-flowers-2346954_1280.png');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price_vat_free` decimal(8,2) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price_vat_free`, `cover`, `description`, `category_id`) VALUES
(1, 'Téléphone portable', '199.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.presse-citron.net%2Fapp%2Fuploads%2F2021%2F01%2Fgalaxy-s21-ultra-noir-design.jpg&f=1&nofb=1&ipt=5be711593c64b7f7895dce87a4d9a20698b4fd0a77a1a0589b86f35e185ee327&ipo=images', 'Un téléphone portable avec des fonctionnalités avancées.', 1),
(2, 'Ordinateur portable', '799.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.m10l1ftfGj_MenOyE6jbeAHaDt%26pid%3DApi&f=1&ipt=b6d608574b5492b975fbd0e784e1fee81fba62b26f9e5d9f36813e8ace5ed2cf&ipo=images', 'Un ordinateur portable puissant et léger pour une utilisation quotidienne.', 18),
(3, 'Casque audio sans fil', '99.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbrain-images-ssl.cdn.dixons.com%2F9%2F7%2F10193479%2Fu_10193479.jpg&f=1&nofb=1&ipt=6477a2984d2e4b570090cfd00adcbe5b3a262fb161062f98ac8ffe53d1e065db&ipo=images', 'Un casque audio sans fil avec une qualité sonore exceptionnelle.', 1),
(4, 'Caméra de sécurité', '49.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.tunisianet.com.tn%2F149094-large%2Fcamera-de-securite-mi-home-360-smart-wifi.jpg&f=1&nofb=1&ipt=cd1266f7ba1c3e0521dd538d8a728e25600eea846a43515e1642dd441b510677&ipo=images', 'Une caméra de sécurité pour surveiller votre maison ou votre bureau.', 1),
(5, 'Enceinte Bluetooth', '59.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fd1aeri3ty3izns.cloudfront.net%2Fmedia%2F24%2F244305%2F1200%2Fpreview.jpg&f=1&nofb=1&ipt=d8d77a35824a25e222f44ccab0732bd6d8049ea4485ac395efb87787040b90b2&ipo=images', 'Une enceinte Bluetooth portable avec une batterie longue durée.', 1),
(6, 'Lampe de bureau LED', '29.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.G7TRZ8VQ0juy0jW_yjVqNAHaHa%26pid%3DApi&f=1&ipt=e314c38077f4456e6c9cecbb7e518e8a819a057ea28d3b01bb457a49d3e2601a&ipo=images', 'Une lampe de bureau LED avec différentes intensités lumineuses.', 10),
(7, 'Sac à dos étanche', '39.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.fNBo4QqVUF7MTSEe3KBiywHaHa%26pid%3DApi&f=1&ipt=9ea80b621d615e818856f12d35668c65cf2fcb63cd3ba5b6afcec9f881193fc3&ipo=images', 'Un sac à dos étanche idéal pour les activités en plein air.', 16),
(8, 'Tapis de yoga', '24.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.cUN1b9Bg1XG638_ChF_hTQHaHa%26pid%3DApi&f=1&ipt=cde1afeba2e27e67a7aaef90380bdb75df3290baa9406875a9d7bee9361c31a3&ipo=images', 'Un tapis de yoga antidérapant et confortable pour vos séances.', 16),
(9, 'Batterie externe', '34.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.serialtesteur.fr%2Fwp-content%2Fuploads%2F2017%2F11%2Fbatterie-externe.jpg&f=1&nofb=1&ipt=6b659b33918c5fec5301d4fbda0fc966f1befd7a7a9f7b23f3a71b6a240f2841&ipo=images', 'Une batterie externe portable pour recharger vos appareils en déplacement.', 1),
(10, 'Cafetière programmable', '69.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.senya.fr%2Fwp-content%2Fuploads%2F2018%2F11%2Fcafetiere-electrique-tactile-e1544355612317-1536x1024.jpg&f=1&nofb=1&ipt=629428292cc131df66e1c18d606b686964f84ad4875bdd3901266db2b28b9d14&ipo=ima', 'Une cafetière programmable avec fonction d\'arrêt automatique.', 1),
(11, 'Aspirateur sans sac', '149.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftest-et-avis.com%2Fwp-content%2Fuploads%2F2019%2F06%2FRO3731EA-1024x785.jpg&f=1&nofb=1&ipt=fd0e354d47429f236ef84b2efa19afed0b63bdee54829b8bd781c004b89af738&ipo=images', 'Un aspirateur sans sac puissant et facile à utiliser.', 16),
(12, 'Grille-pain', '29.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.bcCzv-gznWLfSuFQtI-QHgHaHa%26pid%3DApi&f=1&ipt=2e3acd454a2e9275fd160aee31f37ebb80985d11e0048e2e7a6a0afe86eb1818&ipo=images', 'Un grille-pain avec plusieurs réglages de brunissage.', 6),
(13, 'Fer à repasser vapeur', '49.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.kC_Gc3AZPqDSS2CdVU253QHaGk%26pid%3DApi&f=1&ipt=a8cdf8b43e7f51e136b311d48e093678916c7879987d1af563a45683e43ce384&ipo=images', 'Un fer à repasser vapeur pour des vêtements sans plis.', 3),
(14, 'Pèse-personne numérique', '19.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.JiojeRWWV0wJIIYLMn9i-wHaHV%26pid%3DApi&f=1&ipt=7a60ff71c2bdb6e3be0136a821dd61bbf84e37b1e6108011e4996237adaa86b0&ipo=images', 'Un pèse-personne numérique avec écran LCD facile à lire.', 3),
(15, 'Appareil photo numérique', '299.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.oCi1ImKBMYUT0VfFSs2D8AHaGq%26pid%3DApi&f=1&ipt=4b03d76afc8c65d5ada3281aeb4b2eb3ee20a0decb5eb7faac47c00448089b0f&ipo=images', 'Un appareil photo numérique avec zoom optique et vidéo HD.', 1),
(16, 'Stylo à bille', '344.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.cx_ddMeO1hBhBaiGbFKimQHaHa%26pid%3DApi&f=1&ipt=d366b956d7190d12a99bbaa3e9fd5c820da3604bd97399c935bf4bffbc197302&ipo=images', 'Un stylo à bille élégant et confortable pour écrire.', 10),
(17, 'Câble USB-C', '9.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0392%2F5045%2Fproducts%2F1_25dc6811-6a62-4756-8c19-5240ea74dc69_2048x.png%3Fv%3D1604827206&f=1&nofb=1&ipt=2cc2a3cddad7365aa9274d2bf8d803696d60d230190e2ec5b314cf7', 'Un câble USB-C de haute qualité pour charger et transférer des données.', 1),
(18, 'Adaptateur secteur USB', '14.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.9VthPpAySuaY73BZmOoz7QHaFj%26pid%3DApi&f=1&ipt=303a91e054e5e2d29d9f34855c1694ec996f2b922d96376098c1c73cda11325d&ipo=images', 'Un adaptateur secteur USB compact pour charger vos appareils.', 18),
(19, 'Clavier sans fil', '49.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.pcgamesn.com%2Fwp-content%2Fuploads%2F2021%2F03%2FCorsair_K65_RGB_Mini_gaming_keyboard-2.jpg&f=1&nofb=1&ipt=257e55dc1ae3ed7ec582f724660493383ee4449ed06ce89204341ad10fec01f4&ipo=images', 'Un clavier sans fil avec touches rétroéclairées pour une utilisation de nuit.', 1),
(20, 'Tablette Tactile', '599.99', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.elIyOdthQXbMur0G90F-GwHaHa%26pid%3DApi&f=1&ipt=a77627fffa1a4c75200a87a9f77925f8f72cc540269433f34a6073df08862b2e&ipo=images', 'Une tablette tactile portable avec des fonctionnalités avancées.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `Password`) VALUES
(1, 'EnkloK', '$2y$10$kEdVSSJ4W61OfhK8rbdVy.5m.YnRA7CXpERD2wFzuLKU2/BEkV1ku');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
