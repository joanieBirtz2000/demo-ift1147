-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2025 at 12:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campusdb`
--
CREATE DATABASE IF NOT EXISTS `campusdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `campusdb`;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `code_cours` varchar(20) NOT NULL,
  `titre_cours` varchar(100) NOT NULL,
  `session_offerte` enum('Automne','Hiver','Ete','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `code_cours`, `titre_cours`, `session_offerte`) VALUES
(2, 'IFT1147', 'Programmation Web côté serveur', 'Automne'),
(3, 'IFT2001', 'Structures de données avancées', 'Automne'),
(4, 'IFT3000', 'Bases de données et SQL', 'Hiver'),
(5, 'IFT4000', 'Sécurité Web', 'Automne'),
(6, 'IFT5000', 'IA et Apprentissage', 'Automne');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  `date_naissance` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `courriel`, `date_naissance`) VALUES
(2, 'Dupont', 'Jean', 'jean.dupont@example.com', '1995-04-23 00:00:00'),
(3, 'Martin', 'Sophie', 'sophie.martin@example.com', '1994-10-15 00:00:00'),
(4, 'Durand', 'Léa', 'lea.durand@example.com', '2001-02-01 00:00:00'),
(5, 'Dubois', 'Jeanne', 'jeanne.dubois@example.com', '1999-03-12 00:00:00'),
(6, 'Dupont', 'Emma', 'emma.dupont@gmail.com', '2002-07-07 00:00:00'),
(7, 'Dion', 'Alex', 'alex.dion@yahoo.com', '1998-11-09 00:00:00'),
(8, 'Petit', 'Marc', 'marc.petit@gmail.com', '1997-05-01 00:00:00'),
(9, 'Zhao', 'Ming', 'ming.zhao@example.com', '1998-12-12 00:00:00'),
(10, 'Bernard', 'Théo', 'theo.bernard@example.com', '2004-06-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `note_finale` decimal(5,2) DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `etudiant_id`, `cours_id`, `note_finale`, `date_inscription`) VALUES
(6, 2, 2, 88.50, '2025-10-29 18:27:49'),
(7, 2, 3, 91.00, '2025-10-29 18:27:49'),
(8, 3, 2, 79.00, '2025-10-29 18:27:49'),
(9, 4, 4, 85.25, '2025-10-29 18:27:49'),
(10, 5, 2, 56.00, '2025-09-10 10:00:00'),
(11, 6, 2, 93.00, '2025-10-05 09:30:00'),
(12, 7, 2, 87.00, '2025-10-18 14:15:00'),
(14, 8, 3, 78.00, '2025-10-20 08:00:00'),
(15, 9, 4, 88.75, '2025-10-12 16:45:00'),
(16, 6, 6, 95.50, '2025-10-25 11:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Indexes for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`),
  ADD KEY `cours_id` (`cours_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `cours_id` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant_id` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
