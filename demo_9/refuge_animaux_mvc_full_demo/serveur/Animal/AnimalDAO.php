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
        // TODO Étapes :
        // 1. Écrire une requête SQL SELECT qui récupère toutes les colonnes
        //    de la table `animal` (ORDER BY date_arrivee DESC, nom ASC par exemple).
        // 2. Exécuter la requête (query ou prepare/execute).
        // 3. Récupérer tous les résultats avec fetchAll(PDO::FETCH_ASSOC).
        // 4. Retourner ce tableau.
        return [];
    }

    /**
     * Trouver un animal par id
     */
    public function trouverParId(int $id): ?array
    {
        // TODO Étapes :
        // 1. Écrire une requête SQL SELECT avec une clause WHERE id_animal = :id.
        // 2. Préparer la requête avec $this->db->prepare().
        // 3. Exécuter la requête en liant le paramètre :id avec la valeur $id.
        // 4. Récupérer une seule ligne avec fetch(PDO::FETCH_ASSOC).
        // 5. Si aucun résultat, retourner null. Sinon retourner le tableau associatif.
        return [];
    }

    /**
     * Inserer un nouvel animal
     */
    public function inserer(ModelAnimal $a): bool
    {
        // TODO Étapes :
        // 1. Écrire une requête SQL INSERT INTO animal (nom, espece, description,
        //    statut, date_arrivee, photo) VALUES (:nom, :espece, :description,
        //    :statut, :date_arrivee, :photo).
        // 2. Préparer la requête avec $this->db->prepare($sql).
        // 3. Appeler execute([...]) en passant les valeurs à partir de l'objet $a :
        //    - 'nom'          => $a->nom
        //    - 'espece'       => $a->espece
        //    - 'description'  => $a->description
        //    - 'statut'       => $a->statut
        //    - 'date_arrivee' => $a->dateArrivee
        //    - 'photo'        => $a->photo
        // 4. Retourner le booléen retourné par execute().
        return true;
    }

    /**
     * Mettre à jour un animal existant
     */
    public function modifier(ModelAnimal $a): bool
    {
        // TODO Étapes :
        // 1. Écrire une requête SQL UPDATE animal SET ... WHERE id_animal = :id
        //    pour mettre à jour toutes les colonnes (nom, espece, description,
        //    statut, date_arrivee, photo).
        // 2. Préparer la requête.
        // 3. Exécuter la requête en passant les valeurs de l'objet $a,
        //    y compris l'id.
        // 4. Retourner le booléen retourné par execute().
        return true;
    }

    /**
     * Supprimer un animal
     */
    public function supprimer(int $id): bool
    {
        // TODO Étapes :
        // 1. Écrire une requête SQL DELETE FROM animal WHERE id_animal = :id.
        // 2. Préparer la requête avec $this->db->prepare().
        // 3. Exécuter la requête en liant le paramètre :id.
        // 4. Retourner le booléen retourné par execute().
        return true;
    }
}
