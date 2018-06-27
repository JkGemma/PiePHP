-- Host: localhost
--
-- Base de données :  `PiePHP`
-- Catégorie : PHP_Avancé
--
-- --------------------------------------------------------

DROP DATABASE IF EXISTS PiePHP;
CREATE DATABASE PiePHP;

USE PiePHP;

-- --------------------------------------------------------
--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`email`  varchar(255) NOT NULL,
	`password` varchar(128) NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` int(11) NOT NULL,
`title` varchar(255) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` int(11) NOT NULL,
`content` varchar(255) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- ADD USERS
TRUNCATE TABLE users;
INSERT INTO users ( `email`, `password`)
VALUES
('quentin.flayac@epitech.eu', 'password');

-- ADD ARTICLES
TRUNCATE TABLE articles;
INSERT INTO articles (`id_user`, `title`)
VALUES
('1', 'Article 1'),
('1', 'Article 2'),
('1', 'Article 3');

-- ADD COMMENTS
TRUNCATE TABLE comments;
INSERT INTO comments (`id_user`, `content`)
VALUES
('1', 'Comment 1');
