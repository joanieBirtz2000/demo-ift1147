<?php
// Révision tableaux + fonctions (Cours 3 - Tableaux en PHP 8+)

// Tableau de voitures : id, marque, modele, prix, electrique
$voitures = [
    ['id' => 1, 'marque' => 'Toyota',  'modele' => 'Corolla', 'prix' => 22000, 'electrique' => false],
    ['id' => 2, 'marque' => 'Tesla',   'modele' => 'Model 3', 'prix' => 45000, 'electrique' => true],
    ['id' => 3, 'marque' => 'Hyundai', 'modele' => 'Ioniq 5', 'prix' => 43000, 'electrique' => true],
];

// 1) Ajouter une voiture au tableau et retourner le nouveau tableau
function ajouterVoiture(array $voitures, int $id, string $marque, string $modele, float $prix, bool $electrique): array {
    // TODO : construire un tableau associatif pour la voiture
    // TODO : ajouter la voiture dans $voitures
    // TODO : retourner le tableau
    return $voitures; // provisoire
}

// 2) Trouver une voiture par id (retourne le tableau ou null)
function trouverVoitureParId(array $voitures, int $id): ?array {
    // TODO : parcourir $voitures et retourner celle qui a l'id donné
    return null; // provisoire
}

// 3) Filtrer les voitures électriques uniquement
function filtrerVoituresElectriques(array $voitures): array {
    // TODO : construire un nouveau tableau avec seulement 'electrique' => true
    return []; // provisoire
}

// 4) Trier les voitures par prix croissant (utiliser usort)
function trierVoituresParPrix(array $voitures): array {
    // TODO : utiliser usort avec une fonction anonyme et retourner le tableau trié
    return $voitures; // provisoire
}

function printVoiture(array $voitures): void
{   //TODO : gérer le cas null

    //TODO : afficher les informations de la voitures
}

// ================== TESTS ==================
// a) On ajoute une voiture
$voitures = ajouterVoiture($voitures, 4, 'Honda', 'Civic', 24000, false);

// Affichage de toutes les voitures
echo "<h3>Toutes les voitures</h3>";
printVoiture($voitures);

// Voiture id=2
$voiture2 = trouverVoitureParId($voitures, 2);
echo "<h3>Voiture avec id=2</h3>";
printVoiture([$voiture2]);

// Voitures électriques
$elec = filtrerVoituresElectriques($voitures);
echo "<h3>Voitures électriques</h3>";
printVoiture($elec);

// Tri par prix
$tries = trierVoituresParPrix($voitures);
echo "<h3>Voitures triées par prix</h3>";
printVoiture($tries);
