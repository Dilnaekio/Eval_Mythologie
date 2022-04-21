-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 avr. 2022 à 17:02
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eval_mythologie_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `name_article` varchar(100) NOT NULL,
  `sum_article` varchar(150) NOT NULL,
  `content_article` varchar(1000) NOT NULL,
  `creation_date_article` datetime DEFAULT current_timestamp(),
  `update_article` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `img_article` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `name_article`, `sum_article`, `content_article`, `creation_date_article`, `update_article`, `id_user`, `img_article`) VALUES
(5, 'Zeus le BG', 'Zeus est un Dieu Suprême de la mythologie grecque...', 'Zeus est, selon Hésiode, le dernier-né des six enfants du Titan Cronos et de sa sœur Rhéa4. Cette descendance est considérée comme la branche olympienne par opposition à celle des Titans. Cronos, craignant la prédiction de ses parents, Ouranos et Gaïa, qu’il engendrerait un rival qui régnerait à sa place, a avalé ses cinq premiers enfants dès leur naissance. Pour qu&#039;un de ses fils échappe à ce sort, Rhéa, sur le conseil de Gaïa, substitue au dernier-né une pierre emmaillotée. Emporté en Crète5, il est élevé par les nymphes (Hagno, Neda, Anthracia, Anchirhoe et Myrtoessa) du mont Idab, allaité grâce à la chèvre Amalthée dans une grotte secrète de Lyctos. Ses cris qui auraient pu trahir sa présence furent couverts par le fracas des armes que les Curètesc entrechoquaient dans leurs danses guerrières.\r\n\r\nLe culte d’un Zeus « Krêtagénês »d dans une grotte de cette montagne remonte à l’époque dite minoenne (-2000 - -2500).\r\n\r\nAvènement\r\n\r\nZeus recevant l&#039;hommage des dieux de l&#039', '2022-04-20 16:04:01', '2022-04-20 14:04:01', 1, 'Zeus le BG.jpg'),
(7, 'Kassandra', 'Encore un test super bien écrit et qui aura un contenu super intéressant', 'Oui, j&#039;ai adoré Assassin&#039;s Creed Odyssey, mais le jeu était beaucoup trop facile même en difficulté max u.u', '2022-04-21 09:58:37', '2022-04-21 08:03:10', 1, 'Kassandra.png'),
(9, 'Premier article de Guilhaume le conquérant', 'Un article test pour voir si mon inner join fonctionne correctement x)', 'Ha ha ha ha ha ha', '2022-04-21 12:06:20', '2022-04-21 10:06:20', 6, 'Premier article de Guilhaume le conquérant.jpeg'),
(11, 'Polar', 'Parce que Polar est le meilleur conducteur au monde, il mérite un article', 'Catégorie    ›› Maniable\r\nAlignement   ›› Bien\r\nDisponible   ›› Dès le départ\r\nCircuit      ›› Col Polar\r\nCouleur kart ›› Bleu ciel', '2022-04-21 16:52:08', '2022-04-21 14:52:08', 1, 'Polar.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `mail_user` varchar(50) NOT NULL,
  `img_user` varchar(50) NOT NULL,
  `mdp_user` varchar(120) NOT NULL,
  `rank` varchar(15) DEFAULT 'membre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `mail_user`, `img_user`, `mdp_user`, `rank`) VALUES
(1, 'Fabian', 'delcourtfabian@gmail.com', 'Fabian.jpg', '$2y$10$mdw0LNJRn1XuPlYBE3VrqeeBXsaKmnSxux/Jo0za6QnlKgkI3j2nG', 'admin'),
(6, 'Guilhaume', 'uneBonneEvalStp@NumberOne.com', 'Guilhaume.jpeg', '$2y$10$wAVhMnNc6qdNFpXwgWRVs.A8RthMZiJCOA3KpYuEFtwBMfJKmkiJS', 'admin'),
(7, 'Kebab', 'Miam@grec.monde', 'Kebab.jpg', '$2y$10$m5OrtHQi7C7nQ9BHWRvEc.UCb//nrpX/6CSCMknBbs4f/w1yKLK8K', 'membre');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `mail_user` (`mail_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
