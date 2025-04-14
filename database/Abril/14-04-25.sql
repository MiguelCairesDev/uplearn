-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Abr-2025 às 15:07
-- Versão do servidor: 8.3.0
-- versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `uplearn`
--
CREATE DATABASE IF NOT EXISTS `uplearn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `uplearn`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `alu_id` int NOT NULL AUTO_INCREMENT,
  `alu_nome` varchar(50) NOT NULL,
  `alu_turma` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alu_note` varchar(2) DEFAULT NULL,
  `alu_note_car` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`alu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notebooks`
--

DROP TABLE IF EXISTS `notebooks`;
CREATE TABLE IF NOT EXISTS `notebooks` (
  `note_id` int NOT NULL AUTO_INCREMENT,
  `note_num` varchar(3) NOT NULL,
  `note_car` int NOT NULL,
  `note_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `notebooks`
--

INSERT INTO `notebooks` (`note_id`, `note_num`, `note_car`, `note_status`) VALUES
(1, '00', 1, 1),
(2, '01', 1, 1),
(3, '02', 1, 1),
(4, '03', 1, 1),
(5, '04', 1, 1),
(6, '05', 1, 1),
(7, '06', 1, 1),
(8, '07', 1, 1),
(9, '08', 1, 1),
(10, '09', 1, 1),
(11, '10', 1, 1),
(12, '11', 1, 1),
(13, '12', 1, 1),
(14, '13', 1, 1),
(15, '14', 1, 1),
(16, '15', 1, 1),
(17, '16', 1, 1),
(18, '17', 1, 1),
(19, '18', 1, 1),
(20, '19', 1, 1),
(21, '20', 1, 1),
(22, '00', 2, 1),
(23, '01', 2, 1),
(24, '02', 2, 1),
(25, '03', 2, 1),
(26, '04', 2, 1),
(27, '05', 2, 1),
(28, '06', 2, 1),
(29, '07', 2, 1),
(30, '08', 2, 1),
(31, '09', 2, 1),
(32, '10', 2, 1),
(33, '11', 2, 1),
(34, '12', 2, 1),
(35, '13', 2, 1),
(36, '14', 2, 1),
(37, '15', 2, 1),
(38, '16', 2, 1),
(39, '17', 2, 1),
(40, '18', 2, 1),
(41, '19', 2, 1),
(42, '20', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `pro_nome` varchar(50) NOT NULL,
  `pro_senha` varchar(20) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`pro_id`, `pro_nome`, `pro_senha`) VALUES
(1, 'Alexandre', '0000'),
(2, 'Marco', '0000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessoes`
--

DROP TABLE IF EXISTS `sessoes`;
CREATE TABLE IF NOT EXISTS `sessoes` (
  `ses_id` int NOT NULL AUTO_INCREMENT,
  `ses_aluno` varchar(50) NOT NULL,
  `ses_notebook` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ses_note_car` varchar(2) NOT NULL,
  `ses_turma` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ses_prof` varchar(50) NOT NULL,
  `ses_retirada` timestamp NOT NULL,
  `ses_devolucao` timestamp NULL DEFAULT NULL,
  `ses_status` varchar(20) NOT NULL,
  PRIMARY KEY (`ses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `tur_id` int NOT NULL AUTO_INCREMENT,
  `tur_nome` varchar(20) NOT NULL,
  `tur_prof` json NOT NULL,
  PRIMARY KEY (`tur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
