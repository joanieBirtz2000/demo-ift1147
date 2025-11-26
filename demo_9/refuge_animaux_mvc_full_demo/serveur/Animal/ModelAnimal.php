<?php

declare(strict_types=1);

namespace Animal;

/**
 * Modèle Animal (Model)
 */
class ModelAnimal
{
    public ?int $id;
    public string $nom;
    public string $espece;
    public string $description;
    public string $statut;
    public string $dateArrivee;
    public ?string $photo;

    public function __construct(
        ?int $id,
        string $nom,
        string $espece,
        string $description,
        string $statut,
        string $dateArrivee,
        ?string $photo = null
    ) {
        $this->id          = $id;
        $this->nom         = $nom;
        $this->espece      = $espece;
        $this->description = $description;
        $this->statut      = $statut;
        $this->dateArrivee = $dateArrivee;
        $this->photo       = $photo;
    }
}
