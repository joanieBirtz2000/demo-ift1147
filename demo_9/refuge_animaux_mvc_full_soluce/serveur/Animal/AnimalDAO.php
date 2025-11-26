<?php
declare(strict_types=1);

namespace Animal;

use PDO;

require_once(__DIR__ . '/../includes/bd/Connexion.php');
require_once(__DIR__ . '/ModelAnimal.php');

/**
 * DAO Animal : accès aux données via PDO + requêtes préparées
 */
class AnimalDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = \Connexion::getConnexion();
    }

    /**
     * Retourne tous les animaux
     */
    public function listerTous(): array
    {
        $sql = "SELECT * FROM animal ORDER BY date_arrivee DESC, nom ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Trouver un animal par id
     */
    public function trouverParId(int $id): ?array
    {
        $sql = "SELECT * FROM animal WHERE id_animal = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res ?: null;
    }

    /**
     * Inserer un nouvel animal
     */
    public function inserer(ModelAnimal $a): bool
    {
        $sql = "INSERT INTO animal (nom, espece, description, statut, date_arrivee, photo)
                VALUES (:nom, :espece, :description, :statut, :date_arrivee, :photo)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'nom'          => $a->nom,
            'espece'       => $a->espece,
            'description'  => $a->description,
            'statut'       => $a->statut,
            'date_arrivee' => $a->dateArrivee,
            'photo'        => $a->photo,
        ]);
    }

    /**
     * Mettre à jour un animal existant
     */
    public function modifier(ModelAnimal $a): bool
    {
        $sql = "UPDATE animal
                SET nom = :nom,
                    espece = :espece,
                    description = :description,
                    statut = :statut,
                    date_arrivee = :date_arrivee,
                    photo = :photo
                WHERE id_animal = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'nom'          => $a->nom,
            'espece'       => $a->espece,
            'description'  => $a->description,
            'statut'       => $a->statut,
            'date_arrivee' => $a->dateArrivee,
            'photo'        => $a->photo,
            'id'           => $a->id,
        ]);
    }

    /**
     * Supprimer un animal
     */
    public function supprimer(int $id): bool
    {
        $sql = "DELETE FROM animal WHERE id_animal = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
