-- Script SQL minimal pour la table `animal`

CREATE TABLE animal (
  id_animal INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  espece VARCHAR(50) NOT NULL,
  description TEXT,
  statut ENUM('ADOPTABLE', 'ADOPTÉ', 'EN_SOINS') NOT NULL DEFAULT 'ADOPTABLE',
  date_arrivee DATE NOT NULL,
  photo VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
