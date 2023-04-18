-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Mar-2022 às 17:26
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salario` double NOT NULL,
  `idade` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `salario`, `idade`) VALUES
(1, 'Marcos Silva', 32880, 45),
(2, 'Joao Silva', 27075, 36),
(3, 'Maria Silva', 96000, 56),
(4, 'Jose Silva', 33306, 21),
(5, 'Mauro Silva', 28270, 37),
(6, 'Andreia Silva', 68200, 36),
(7, 'Isabele Silva', 23750, 21),
(8, 'Lucas Silva', 22790, 22),
(9, 'Diane Silva', 50550, 39),
(10, 'Kelly Silva', 93600, 58),
(11, 'Gregorio Silva', 90560, 54),
(12, 'Nair Silva', 44200, 29),
(13, 'Nelson Silva', 43060, 36),
(14, 'Cesar Silva', 53500, 37),
(15, 'Anderson Silva', 38575, 20),
(16, 'Lurdes Silva', 98500, 59),
(17, 'Ana Silva', 82500, 58),
(18, 'Gloria Silva', 37750, 31),
(19, 'Luiz  Silva', 23200, 20),
(20, 'Daine Silva', 21750, 19),
(21, 'Veronica Silva', 45000, 30),
(22, 'Andre Silva', 75000, 45),
(23, 'Wallace Silva', 64500, 32),
(24, 'Luiza Silva', 85600, 23),
(25, 'Angelica Silva', 59721, 47),
(26, 'Romario Silva', 92575, 42),
(27, 'Antao Silva', 35765, 28),
(28, 'Wagner Silva', 20685, 28),
(29, 'Sanzio Silva', 85000, 48),
(30, 'Fabiana  Silva', 18800, 20),
(31, 'Helio Silva', 95400, 37),
(32, 'Orlei Silva', 71450, 53),
(33, 'Reanto Silva', 34500, 27),
(34, 'Sabino Silva', 22550, 22),
(35, 'Turlo Silva', 72405, 46),
(36, 'Viviane Silva', 95675, 57);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
