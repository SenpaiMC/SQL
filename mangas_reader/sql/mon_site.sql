-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 mai 2025 à 19:15
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mon_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `mot_de_passe`) VALUES
(2, 'Jucien', '789456123'),
(3, 'Mat', '$2y$10$AnP0QRp47AAH1Qgsb9Q50eltFzjEmt/dUtFjzC8BtHOrQXKFDcpre');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `genre1` varchar(255) DEFAULT NULL,
  `genre2` varchar(255) DEFAULT NULL,
  `genre3` varchar(255) DEFAULT NULL,
  `synopsie` text,
  `cover` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `name`, `type`, `genre1`, `genre2`, `genre3`, `synopsie`, `cover`) VALUES
(3, 'solo', 'webtoon', 'action , fantasy , syst?me', NULL, NULL, 'histoire ....', 'series/webtoon/solo/coversl.jpeg'),
(11, 'solo leveling', 'Webtoon', 'Action', NULL, NULL, 'Il y a dix ans, des portails apparaissaient en ouvrant des passages vers des donjons et du monde parall?le, et parmi des gens normaux, certains ont ?veill? leurs pouvoirs et sont devenus des chasseurs. Sung Jin Woo, un chasseur faible, a beaucoup de mal ? survivre. Un jour, il se retrouve dans un double donjon et en ?chappant la mort ? la justesse, il obtient un ?trange pouvoir et devient le chasseur le plus fort.', 'series/Webtoon/solo leveling/coversl.jpeg'),
(9, 'solo n', 'Webtoon', 'Aventure', NULL, NULL, 'histoire ....', 'series/Webtoon/solo n/coversl.jpeg'),
(10, 'yozakura', 'Manga', 'Action', NULL, NULL, 'histoire ....', 'series/Manga/yozakura/coversl.jpeg'),
(12, 'MM', 'Manga', 'Aventure', 'Aventure', 'Comédie', 'SQDF', 'series/Manga/MM/cover003.jpg'),
(13, 's', 'Manga', 'Syst?me', 'Syst?me', 'Système', 's', 'series/Manga/s/cover003.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `date_inscription` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `mot_de_passe`, `photo_profil`, `date_inscription`) VALUES
(1, 'Mat', '$2y$10$GKc3gz5QZ8e.JILJp4559e5l//v44PCY4Hson3DjmjFiU19k/NAOW', 'uploads/statue.jpg', '2025-04-25 13:50:39'),
(2, 'pafe', '$2y$10$lT8jgwKUlZEE03JhpbAs1.xiyn0XCkks6dWX6tQ2CsdGOyuX81gwS', 'uploads/sl.jpeg', '2025-04-28 17:03:50'),
(3, 'pafe', '$2y$10$zYKwWnrxEMAG.hiGbBRmYuyh.TAhpsqMivK5OEuOgyYLvLjyxXUMm', 'uploads/sl.jpeg', '2025-04-28 17:06:23'),
(4, 'dada', '$2y$10$wvRo3nW7KUvxrJI6V4p7Z.Yhba4EzpstFH/Q3CI1RLtGhVG5ICF4K', 'uploads/001.jpg', '2025-05-02 19:46:08'),
(5, 'dada1', '$2y$10$sroAw8UXEUGp3tJvR4wBReM6lLk8/4qE/OkRe5MRwkex.pFe17n06', 'users/001.jpg', '2025-05-04 21:01:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
