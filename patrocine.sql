-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2023 at 07:53 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patrocine`
--

-- --------------------------------------------------------

--
-- Table structure for table `anunciantes`
--

DROP TABLE IF EXISTS `anunciantes`;
CREATE TABLE IF NOT EXISTS `anunciantes` (
  `id` varchar(6) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `banner` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
CREATE TABLE IF NOT EXISTS `filmes` (
  `id` varchar(6) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `banner` varchar(64) NOT NULL,
  `trailer` varchar(64) NOT NULL,
  `dataDeCriacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tvs`
--

DROP TABLE IF EXISTS `tvs`;
CREATE TABLE IF NOT EXISTS `tvs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filme` varchar(6) NOT NULL,
  `anunciantes` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tvs`
--

INSERT INTO `tvs` (`id`, `filme`, `anunciantes`) VALUES
(1, 'SLIDER', '{\"principais\": [0, 0], \"secundarios\": [0, 0, 0, 0, 0, 0, 0, 0, 0]}'),
(2, 'SLIDER', '{\"principais\": [0, 0], \"secundarios\": [0, 0, 0, 0, 0, 0, 0, 0, 0]}'),
(3, 'SLIDER', '{\"principais\": [0, 0], \"secundarios\": [0, 0, 0, 0, 0, 0, 0, 0, 0]}'),
(4, 'SLIDER', '{\"principais\": [0, 0], \"secundarios\": [0, 0, 0, 0, 0, 0, 0, 0, 0]}'),
(5, 'SLIDER', '{\"principais\": [0, 0], \"secundarios\": [0, 0, 0, 0, 0, 0, 0, 0, 0]}');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
