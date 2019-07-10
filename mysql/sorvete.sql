-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Jul-2019 às 16:26
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sorvete`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `nascimento` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`email`,`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `email`, `cpf`, `nome`, `senha`, `telefone`, `cidade`, `nascimento`) VALUES
(1, 'adm', 0, 'adm', 'adm', 0, 'Brazil', 2000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_cliente` int(11) NOT NULL,
  `id_sorvete` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` enum('P','M','G') DEFAULT NULL,
  `qtde` int(11) NOT NULL DEFAULT '1',
  `preco` decimal(9,2) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Na fila',
  PRIMARY KEY (`id_pedido`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_sorvete` (`id_sorvete`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_cliente`, `id_sorvete`, `id_pedido`, `tamanho`, `qtde`, `preco`, `status`) VALUES
(4, 13, 18, 'G', 5, '150.00', 'Na fila'),
(4, 28, 17, 'M', 2, '40.00', 'Na fila');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sorvete`
--

DROP TABLE IF EXISTS `sorvete`;
CREATE TABLE IF NOT EXISTS `sorvete` (
  `id_sorvete` int(11) NOT NULL,
  `sabor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_sorvete`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sorvete`
--

INSERT INTO `sorvete` (`id_sorvete`, `sabor`) VALUES
(1, 'Flocos'),
(2, 'Chocolate'),
(3, 'Napolitano'),
(4, 'Limao'),
(5, 'Abacaxi'),
(6, 'Coco'),
(7, 'Milho-Verde'),
(8, 'Maracuja'),
(9, 'Passas ao rum'),
(10, 'Uva ao leite'),
(11, 'Abacaxi ao leite'),
(12, 'Creme'),
(13, 'Romeu e Julieta'),
(14, 'Nuttela'),
(15, 'Limao leite'),
(16, 'Acai'),
(17, 'Bombom'),
(18, 'Cookies\'n cream'),
(19, 'Chiclete'),
(20, 'Morango'),
(21, 'Manga'),
(22, 'Torta italiana'),
(23, 'Granola'),
(24, 'Queijo'),
(25, 'Cafe'),
(26, 'Blue Ice'),
(27, 'Jack Daniels'),
(28, 'Nata'),
(29, 'Danoninho'),
(30, 'Profiteroles');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
