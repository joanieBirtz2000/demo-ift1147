INSERT INTO `cours` (`id`, `code_cours`, `titre_cours`, `session_offerte`) VALUES
(5, 'IFT4000', 'Sécurité Web', 'Automne'),
(6, 'IFT5000', 'IA et Apprentissage', 'Automne');

INSERT INTO `etudiants` (`id`,`nom`,`prenom`,`courriel`,`date_naissance`) VALUES
(5, 'Dubois',  'Jeanne', 'jeanne.dubois@example.com',  '1999-03-12 00:00:00'),
(6, 'Dupont',  'Emma',   'emma.dupont@gmail.com',      '2002-07-07 00:00:00'),
(7, 'Dion',    'Alex',   'alex.dion@yahoo.com',        '1998-11-09 00:00:00'),
(8, 'Petit',   'Marc',   'marc.petit@gmail.com',       '1997-05-01 00:00:00'),
(9, 'Zhao',    'Ming',   'ming.zhao@example.com',      '1998-12-12 00:00:00'),
(10,'Bernard', 'Théo',   'theo.bernard@example.com',   '2004-06-06 00:00:00');

-- IFT1147 (cours_id=2) : beaucoup d'inscriptions (compte > 1)
INSERT INTO `inscriptions` (`id`,`etudiant_id`,`cours_id`,`note_finale`,`date_inscription`) VALUES
(10, 5, 2, 56.00, '2025-09-10 10:00:00'),  -- < 60 pour DELETE démo
(11, 6, 2, 93.00, '2025-10-05 09:30:00'),  -- octobre
(12, 7, 2, 87.00, '2025-10-18 14:15:00');  -- octobre

-- IFT2001 (cours_id=3) : au moins 2 inscrits
INSERT INTO `inscriptions` (`id`,`etudiant_id`,`cours_id`,`note_finale`,`date_inscription`) VALUES
(14, 8, 3, 78.00, '2025-10-20 08:00:00');

-- IFT3000 (cours_id=4) : au moins 2 inscrits
INSERT INTO `inscriptions` (`id`,`etudiant_id`,`cours_id`,`note_finale`,`date_inscription`) VALUES
(15, 9, 4, 88.75, '2025-10-12 16:45:00');

-- IFT4000 (cours_id=5) : VOLONTAIREMENT sans inscription (LEFT JOIN -> NULL)

-- IFT5000 (cours_id=6) : au moins 1 inscrit
INSERT INTO `inscriptions` (`id`,`etudiant_id`,`cours_id`,`note_finale`,`date_inscription`) VALUES
(16, 6, 6, 95.50, '2025-10-25 11:11:00');

