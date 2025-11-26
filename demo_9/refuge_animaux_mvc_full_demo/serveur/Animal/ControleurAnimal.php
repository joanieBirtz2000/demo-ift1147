<?php
declare(strict_types=1);

use Animal\AnimalDAO;
use Animal\ModelAnimal;

require_once __DIR__ . '/AnimalDAO.php';
require_once __DIR__ . '/ModelAnimal.php';

/**
 * Contrôleur Animal
 * Joue le rôle de "C" dans MVC côté serveur.
 */
class ControleurAnimal
{
    public static function traiter(string $action): void
    {
        // Valeur par défaut
        if ($action === '') {
            $action = 'liste';
        }

        switch ($action) {
            case 'liste':
                self::liste();
                break;
            case 'ajouter':
                self::ajouter();
                break;
            case 'modifier':
                self::modifier();
                break;
            case 'supprimer':
                self::supprimer();
                break;
            default:
                echo json_encode([
                    'succes'  => false,
                    'message' => 'Action animale invalide',
                ]);
        }
    }

    /**
     * READ : lister les animaux
     */
    private static function liste(): void
    {
        // TODO Étapes :
        // 1. Créer un nouvel objet AnimalDAO.
        // 2. Appeler la méthode listerTous() du DAO pour récupérer la liste d'animaux.
        // 3. Encoder la réponse en JSON, par exemple :
        //    - succes = true
        //    - animaux = liste récupérée
        // 4. Afficher le JSON (echo json_encode(...)).
    }

    /**
     * CREATE : ajouter un animal (avec upload éventuel d'image)
     */
    private static function ajouter(): void
    {
        // TODO Étapes :
        // 1. Récupérer les champs envoyés dans $_POST (nom, espece,
        //    description, statut, date_arrivee).
        // 2. Valider les champs obligatoires (par ex. nom et espece non vides).
        // 3. Gérer éventuellement l'upload de la photo dans $_FILES['photo'] :
        //    - vérifier qu'un fichier est bien envoyé;
        //    - vérifier l'extension (jpg, jpeg, png, gif);
        //    - générer un nom de fichier unique;
        //    - déplacer le fichier dans le dossier photos/ avec move_uploaded_file.
        // 4. Créer un objet ModelAnimal avec les données validées.
        // 5. Appeler AnimalDAO::inserer($animal).
        // 6. Retourner une réponse JSON avec succes true/false et un message.
    }

    /**
     * UPDATE : modifier un animal
     */
    private static function modifier(): void
    {
        // TODO Étapes :
        // 1. Récupérer l'id de l'animal à modifier dans $_POST['id'].
        // 2. Si l'id est invalide, retourner une réponse JSON d'erreur.
        // 3. Utiliser le DAO pour retrouver l'animal existant (trouverParId).
        // 4. Récupérer les nouveaux champs dans $_POST (nom, espece, etc.).
        // 5. Gérer éventuellement une nouvelle photo :
        //    - si une nouvelle photo est envoyée, la traiter et changer le nom de fichier;
        //    - sinon conserver l'ancienne valeur de la photo.
        // 6. Créer un nouvel objet ModelAnimal avec les nouvelles valeurs (incluant l'id).
        // 7. Appeler AnimalDAO::modifier($animal).
        // 8. Retourner une réponse JSON avec succes true/false et un message.
    }

    /**
     * DELETE : supprimer un animal
     */
    private static function supprimer(): void
    {
        // TODO Étapes :
        // 1. Récupérer l'id dans $_POST['id'].
        // 2. Vérifier que l'id est valide (> 0), sinon retourner une erreur JSON.
        // 3. Créer un AnimalDAO.
        // 4. Appeler la méthode supprimer($id) du DAO.
        // 5. Retourner une réponse JSON avec succes true/false et un message.
    }
}
