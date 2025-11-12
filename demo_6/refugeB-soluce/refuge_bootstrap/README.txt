Refuge d'animaux — version Bootstrap + séparation PHP/HTML

Objectifs
- Séparer la logique PHP (lib/) de la présentation (public/).
- Affichage avec Bootstrap (table responsive).
- Formulaire d’ajout dans un **modal** Bootstrap.
- Barre de navigation avec **filtrage** (espèce + recherche par nom).

Arborescence
- db.sql
- config.php
- lib/db.php
- lib/animaux.php
- public/index.php
- public/ajouter.php
- README.txt

Installation rapide
1) phpMyAdmin → exécute `db.sql` (BD `refuge_demo`, table `animaux`).
2) Copie le dossier `refuge_bootstrap` dans `htdocs/`.
3) Vérifie `config.php` (user/pass).
4) Va sur http://localhost/refuge_bootstrap/public/index.php
5) Clique **+ Ajouter** pour ouvrir le modal, soumets → retour à la liste.
6) Utilise la **barre de filtre** (espèce et recherche).

Notes techniques
- Filtrage via paramètres GET `?espece=...&q=...` (requêtes préparées).
- `public/ajouter.php` gère l’INSERT et redirige vers `index.php?ok=1`.
- Bootstrap CDN 5.3 (CSS + JS bundle).
