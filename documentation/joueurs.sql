-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 nov. 2018 à 15:35
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tournoi`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`

--

INSERT INTO `joueurs` (`ID_JOUEUR`, `ID_TOURNOI`, `ID_POULE`, `NOM`, `PRENOM`, `PSEUDO`, `ETAT`, `SCORE_TOTAL`, `NB_VICTOIRES`) VALUES
(337, 1, NULL, 'gotaga', 'grfkdl', 'ffrzfefe', '1', 0, 0),
(338, 1, NULL, 'rezr', 'kj', 'jkjk', '1', 0, 0),
(339, 1, NULL, 'rezr', 'kj', 'jkjk', '1', 0, 0),
(340, 1, NULL, 'rezr', 'kj', 'jkjk', '1', 0, 0),
(341, 1, NULL, 'rezr', 'kj', 'jkjk', '1', 0, 0),
(342, 1, NULL, 'rezr', 'kj', 'jkjk', '1', 0, 0),
(343, 1, NULL, 'rezr', 'kj', 'jkjk', '1', 0, 0),
(344, 1, NULL, 'lesaintgraal', 'djezksj', 'lebossdu18', '1', 0, 0),
(345, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(346, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(347, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(348, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(349, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(350, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(351, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(352, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(353, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(354, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(355, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(356, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(357, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(358, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(359, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(360, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(361, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(362, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(363, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(364, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(365, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(366, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(367, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(368, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(369, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(370, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(371, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(372, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(373, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(374, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(375, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(376, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(377, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(378, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(379, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(380, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(381, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(382, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(383, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(384, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(385, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(386, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(387, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(388, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(389, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(390, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(391, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(392, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(393, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(394, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(395, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(396, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(397, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(398, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(399, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(400, 1, NULL, 'rtq', 'kj', 'kjj', '1', 0, 0),
(401, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(402, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(403, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(404, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(405, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(406, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(407, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(408, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(409, 1, NULL, 'rtq', 'kj', 'kjj', '0', 0, 0),
(410, 1, NULL, 'dsfd', 'dfdsf', 'fdfdsfdsdfsdfs', '0', 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD CONSTRAINT `joueurs_ibfk_1` FOREIGN KEY (`ID_TOURNOI`) REFERENCES `tournois` (`ID_TOURNOI`),
  ADD CONSTRAINT `joueurs_ibfk_2` FOREIGN KEY (`ID_POULE`) REFERENCES `poules` (`ID_POULE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
