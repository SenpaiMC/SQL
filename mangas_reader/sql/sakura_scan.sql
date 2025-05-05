-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 mai 2025 à 19:17
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
-- Base de données : `sakura_scan`
--

-- --------------------------------------------------------

--
-- Structure de la table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
CREATE TABLE IF NOT EXISTS `mangas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mangas`
--

INSERT INTO `mangas` (`id`, `titre`, `genre`, `description`, `image`) VALUES
(1, 'mission: yozakura family', 'Action', 'Afin de protéger Mutsumi et de découvrir la véritable raison de la mort de ses parents, Taiyo Asano va devoir devenir membre de la famille Yozakura, une famille d\'espions de haut vol ! Plus facile à dire qu\'à faire avec les membres de cette famille légère', 'images/001.jpg'),
(2, 'mission: yozakura family', 'Action', 'sqdqsd', 'images/001.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `m_chapitres`
--

DROP TABLE IF EXISTS `m_chapitres`;
CREATE TABLE IF NOT EXISTS `m_chapitres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `manga_id` int NOT NULL,
  `numero` int NOT NULL,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manga_id` (`manga_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `m_chapitres`
--

INSERT INTO `m_chapitres` (`id`, `manga_id`, `numero`, `chemin`) VALUES
(1, 1, 1, 'mangas\\mission__yozakura_family'),
(2, 1, 2, 'mangas\\mission__yozakura_family\\chapitre 1'),
(3, 1, 3, 'mangas\\mission__yozakura_family\\chapitre 1'),
(4, 1, 4, 'mangas\\mission__yozakura_family\\chapitre 1');

-- --------------------------------------------------------

--
-- Structure de la table `webtoons`
--

DROP TABLE IF EXISTS `webtoons`;
CREATE TABLE IF NOT EXISTS `webtoons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `webtoons`
--

INSERT INTO `webtoons` (`id`, `titre`, `genre`, `description`, `image`) VALUES
(2, 'solo leveling', 'Action', 'Il y a dix ans, des portails apparaissaient en ouvrant des passages vers des donjons et du monde parallèle, et parmi des gens normaux, certains ont éveillé leurs pouvoirs et sont devenus des chasseurs. Sung Jin Woo, un chasseur faible, a beaucoup de mal à', 'images/sl.jpeg'),
(3, 'solo', 'Action', 'hhhhh', 'webtoons/soloava.png');

-- --------------------------------------------------------

--
-- Structure de la table `w_chapitres`
--

DROP TABLE IF EXISTS `w_chapitres`;
CREATE TABLE IF NOT EXISTS `w_chapitres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `webtoon_id` int NOT NULL,
  `numero` int NOT NULL,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `webtoon_id` (`webtoon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
