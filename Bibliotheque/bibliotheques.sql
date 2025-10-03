-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 oct. 2025 à 06:10
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheques`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id_livre` int NOT NULL,
  `nom_livre` varchar(50) NOT NULL,
  `nom_auteur` varchar(50) NOT NULL,
  `nombre_pages` int NOT NULL,
  `couverture` longtext NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `nom_livre`, `nom_auteur`, `nombre_pages`, `couverture`) VALUES
(2, 'Un palais de rose et d\'épine', 'Sarah J Mass', 550, 'https://cdn1.booknode.com/book_cover/1406/un_palais_depines_et_de_roses_tome_1-1406059-264-432.webp'),
(1, 'Fourth Wing', 'Rebecca Yarros', 400, 'https://cdn1.booknode.com/book_cover/5254/fourth_wing-5253815-264-432.webp'),
(0, 'Iron Flame', 'Rebecca Yarros', 500, 'https://cdn.cultura.com/cdn-cgi/image/width=830/media/pim/TITELIVE/77_9782755673142_1_75.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
