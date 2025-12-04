<?php

declare(strict_types=1);

namespace Voiture;

/**
 * Modèle Voiture (Model)
 * Représente une ligne de la table "voiture".
 */
class ModelVoiture
{
    public ?int $id;
    public string $marque;
    public string $modele;
    public string $description;
    public string $typeCarburant;
    public float $prix;
    public string $dateArrivee;
    public ?string $photo;

    public function __construct(
        ?int $id,
        string $marque,
        string $modele,
        string $description,
        string $typeCarburant,
        float $prix,
        string $dateArrivee,
        ?string $photo = null
    ) {
        $this->id            = $id;
        $this->marque        = $marque;
        $this->modele        = $modele;
        $this->description   = $description;
        $this->typeCarburant = $typeCarburant;
        $this->prix          = $prix;
        $this->dateArrivee   = $dateArrivee;
        $this->photo         = $photo;
    }
}
