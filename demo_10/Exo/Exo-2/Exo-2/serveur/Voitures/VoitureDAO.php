<?php

declare(strict_types=1);

namespace Voiture;

use PDO;

require_once(__DIR__ . '/../includes/Connexion.php');
require_once(__DIR__ . '/ModelVoitures.php');

/**
 * DAO Voiture : accès aux données via PDO + requêtes préparées
 */
class VoitureDAO
{
    private PDO $db;

    public function __construct()
    {
        // Connexion PDO (Singleton)
        $this->db = \Connexion::getConnexion();
    }

    /**
     * Lister toutes les voitures
     * @return ModelVoiture[]
     */
    public function lister(): array
    {
        return [];
    }

    /**
     * Trouver une voiture par son id
     */
    public function trouver(int $id): ?ModelVoiture
    {
        return null;
    }

    /**
     * Créer une nouvelle voiture
     */
    public function creer(ModelVoiture $v): bool
    {
        return false;
    }

    /**
     * Mettre à jour une voiture existante
     */
    public function mettreAJour(ModelVoiture $v): bool
    {
        return false;
    }

    /**
     * Supprimer une voiture
     */
    public function supprimer(int $id): bool
    {
        return false;
    }
}
