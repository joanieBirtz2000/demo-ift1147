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
        $this->db = \Connexion::getConnexion();
    }

    /**
     * Lister toutes les voitures
     * @return ModelVoiture[]
     */
    public function lister(): array
    {
        $voitures = [];

        $sql = "SELECT * FROM voiture ORDER BY id_voiture";
        $stmt = $this->db->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $voitures[] = new ModelVoiture(
                (int)$row['id_voiture'],
                $row['marque'],
                $row['modele'],
                $row['description'] ?? '',
                $row['type_carburant'],
                (float)$row['prix'],
                $row['date_arrivee'],
                $row['photo'] ?? null
            );
        }

        return $voitures;
    }

    /**
     * Trouver une voiture par son id
     */
    public function trouver(int $id): ?ModelVoiture
    {
        $sql = "SELECT * FROM voiture WHERE id_voiture = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        return new ModelVoiture(
            (int)$row['id_voiture'],
            $row['marque'],
            $row['modele'],
            $row['description'] ?? '',
            $row['type_carburant'],
            (float)$row['prix'],
            $row['date_arrivee'],
            $row['photo'] ?? null
        );
    }

    /**
     * Créer une nouvelle voiture
     */
    public function creer(ModelVoiture $v): bool
    {
        $sql = "INSERT INTO voiture
                (marque, modele, description, type_carburant, prix, date_arrivee, photo)
                VALUES (:marque, :modele, :description, :type_carburant, :prix, :date_arrivee, :photo)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':marque',         $v->marque);
        $stmt->bindValue(':modele',         $v->modele);
        $stmt->bindValue(':description',    $v->description);
        $stmt->bindValue(':type_carburant', $v->typeCarburant);
        $stmt->bindValue(':prix',           $v->prix);
        $stmt->bindValue(':date_arrivee',   $v->dateArrivee);
        $stmt->bindValue(':photo',          $v->photo);

        return $stmt->execute();
    }

    /**
     * Mettre à jour une voiture existante
     */
    public function mettreAJour(ModelVoiture $v): bool
    {
        $sql = "UPDATE voiture
                SET marque = :marque,
                    modele = :modele,
                    description = :description,
                    type_carburant = :type_carburant,
                    prix = :prix,
                    date_arrivee = :date_arrivee,
                    photo = :photo
                WHERE id_voiture = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':marque',         $v->marque);
        $stmt->bindValue(':modele',         $v->modele);
        $stmt->bindValue(':description',    $v->description);
        $stmt->bindValue(':type_carburant', $v->typeCarburant);
        $stmt->bindValue(':prix',           $v->prix);
        $stmt->bindValue(':date_arrivee',   $v->dateArrivee);
        $stmt->bindValue(':photo',          $v->photo);
        $stmt->bindValue(':id',             $v->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Supprimer une voiture
     */
    public function supprimer(int $id): bool
    {
        $sql = "DELETE FROM voiture WHERE id_voiture = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
