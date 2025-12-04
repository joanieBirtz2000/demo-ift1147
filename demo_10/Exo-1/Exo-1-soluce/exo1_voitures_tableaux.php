<?php
// Révision tableaux + fonctions (Cours 3 - Tableaux en PHP 8+)

$voitures = [
    ['id' => 1, 'marque' => 'Toyota',  'modele' => 'Corolla', 'prix' => 22000, 'electrique' => false],
    ['id' => 2, 'marque' => 'Tesla',   'modele' => 'Model 3', 'prix' => 45000, 'electrique' => true],
    ['id' => 3, 'marque' => 'Hyundai', 'modele' => 'Ioniq 5', 'prix' => 43000, 'electrique' => true],
];

// 1) Ajouter une voiture au tableau et retourner le nouveau tableau
function ajouterVoiture(array $voitures, int $id, string $marque, string $modele, float $prix, bool $electrique): array
{
    // On construit un tableau associatif (tableau associatif = chapitre Tableaux associatifs)
    $voiture = [
        'id'         => $id,
        'marque'     => $marque,
        'modele'     => $modele,
        'prix'       => $prix,
        'electrique' => $electrique,
    ];

    // On ajoute au tableau existant (opérateur [] = ajouter à la fin)
    $voitures[] = $voiture;

    // On retourne le tableau mis à jour (fonction pure)
    return $voitures;
}

// 2) Trouver une voiture par id (retourne le tableau ou null)
function trouverVoitureParId(array $voitures, int $id): ?array
{
    // On parcourt le tableau (foreach = plus simple qu'un for ici)
    foreach ($voitures as $voiture) {
        if ($voiture['id'] === $id) {
            return $voiture;
        }
    }
    // Si rien trouvé, on retourne null (type nullable ?array)
    return null;
}

// 3) Filtrer les voitures électriques uniquement
function filtrerVoituresElectriques(array $voitures): array
{
    $resultat = [];
    foreach ($voitures as $voiture) {
        if ($voiture['electrique']) {
            $resultat[] = $voiture;
        }
    }
    return $resultat;
}

// 4) Trier les voitures par prix croissant (usort avec fonction anonyme - chapitre fonctions sur tableaux)
function trierVoituresParPrix(array $voitures): array
{
    usort($voitures, function (array $a, array $b) {
        // Opérateur <=> (spaceship) : -1, 0, 1
        return $a['prix'] <=> $b['prix'];
    });
    return $voitures;
}

function printVoiture(array $voitures): void
{   // Gestion du cas null
    if ($voitures === null) {
        echo "Voiture non trouvée.<br>";
        return;
    }
    // Affichage simple toutes les voitures
    foreach ($voitures as $v) {
        $type = $v['electrique'] ? 'Électrique' : 'Essence';
        echo "[{$v['id']}] {$v['marque']} {$v['modele']} - {$v['prix']} $ ({$type})<br>";
    }
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
