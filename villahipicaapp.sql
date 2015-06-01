-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jun-2015 às 05:39
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `villahipicaapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(255) NOT NULL,
  `standard_resolution` varchar(255) NOT NULL,
  `low_resolution` varchar(255) NOT NULL,
  `id_foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `slide`
--

INSERT INTO `slide` (`id`, `thumbnail`, `standard_resolution`, `low_resolution`, `id_foto`) VALUES
(1, 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/s150x150/e15/11208409_712484562207090_2055767948_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11208409_712484562207090_2055767948_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/s320x320/e15/11208409_712484562207090_2055767948_n.jpg', '986962415570876695_401199317'),
(2, 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/s150x150/e15/10953197_1545288985744614_1289465303_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/e15/10953197_1545288985744614_1289465303_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/s320x320/e15/10953197_1545288985744614_1289465303_n.jpg', '923443199184007162_1696616850'),
(3, 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/s150x150/e15/10899176_1582213011993690_2006978329_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/e15/10899176_1582213011993690_2006978329_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/s320x320/e15/10899176_1582213011993690_2006978329_n.jpg', '905906479657966566_9783893'),
(4, 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/s150x150/e15/10899129_1385873925054104_354179295_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/e15/10899129_1385873925054104_354179295_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/s320x320/e15/10899129_1385873925054104_354179295_n.jpg', '905711258597855045_440919866');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags_slide`
--

CREATE TABLE IF NOT EXISTS `tags_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_slide` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `tags_slide`
--

INSERT INTO `tags_slide` (`id`, `id_slide`, `tag`) VALUES
(1, 1, 'resortvillahipica'),
(2, 1, 'deagora'),
(3, 2, 'resortvillahipica'),
(4, 2, 'gravatÃ¡'),
(5, 3, 'summer'),
(6, 3, 'villahipica'),
(7, 3, 'brasil'),
(8, 3, 'verÃ£o'),
(9, 3, 'acverÃ£o2015'),
(10, 3, 'rosset'),
(11, 3, 'gravatÃ¡'),
(12, 3, 'pernambuco'),
(13, 3, 'nordeste'),
(14, 3, 'resortvillahipica'),
(15, 3, 'meuverÃ£ocomÃ¡guadecoco'),
(16, 4, 'comeÃ§odedia'),
(17, 4, 'amei'),
(18, 4, 'mar'),
(19, 4, 'kiss'),
(20, 4, 'instrabest'),
(21, 4, 'instralike'),
(22, 4, 'sol'),
(23, 4, 'comafamilia'),
(24, 4, 'resortvillahipica'),
(25, 4, 'gravata'),
(26, 4, 'instralove'),
(27, 4, 'alegria'),
(28, 4, 'amomuito'),
(29, 4, 'cute'),
(30, 4, 'umpoucodeferias'),
(31, 4, 'ilove'),
(32, 4, 'instraphotos'),
(33, 4, 'adoro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `email`, `pass`, `status`) VALUES
(1, 'Admin', 'admin@admin.com', '123456', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
