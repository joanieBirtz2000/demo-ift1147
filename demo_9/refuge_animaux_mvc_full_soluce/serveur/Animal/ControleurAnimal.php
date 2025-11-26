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
        header('Content-Type: application/json; charset=utf-8');
        $dao = new AnimalDAO();
        $animaux = $dao->listerTous();
        echo json_encode(['succes' => true, 'animaux' => $animaux]);
    }

    /**
     * CREATE : ajouter un animal (avec upload éventuel d'image)
     */
    private static function ajouter(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        $nom         = trim($_POST['nom'] ?? '');
        $espece      = trim($_POST['espece'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $statut      = $_POST['statut'] ?? 'ADOPTABLE';
        $dateArrivee = $_POST['date_arrivee'] ?? date('Y-m-d');

        if ($nom === '' || $espece === '') {
            echo json_encode(['succes' => false, 'message' => 'Nom et espèce requis']);
            return;
        }

        // Gestion de la photo
        $nomPhoto = null;
        if (!empty($_FILES['photo']['name'])) {
            $tmpName  = $_FILES['photo']['tmp_name'];
            $fileName = basename($_FILES['photo']['name']);
            $ext      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowed  = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($ext, $allowed, true)) {
                echo json_encode(['succes' => false, 'message' => 'Format de photo invalide']);
                return;
            }

            $nomPhoto = uniqid('animal_', true) . '.' . $ext;
            $dossier  = __DIR__ . '/photos/';

            if (!is_dir($dossier)) {
                mkdir($dossier, 0777, true);
            }

            if (!move_uploaded_file($tmpName, $dossier . $nomPhoto)) {
                echo json_encode(['succes' => false, 'message' => "Erreur lors de l'upload de l'image"]);
                return;
            }
        }

        $animal = new ModelAnimal(
            null,
            $nom,
            $espece,
            $description,
            $statut,
            $dateArrivee,
            $nomPhoto
        );

        $dao = new AnimalDAO();
        $ok = $dao->inserer($animal);

        echo json_encode(['succes' => $ok]);
    }

    /**
     * UPDATE : modifier un animal
     */
    private static function modifier(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        $id          = (int)($_POST['id'] ?? 0);
        $nom         = trim($_POST['nom'] ?? '');
        $espece      = trim($_POST['espece'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $statut      = $_POST['statut'] ?? 'ADOPTABLE';
        $dateArrivee = $_POST['date_arrivee'] ?? date('Y-m-d');

        if ($id <= 0 || $nom === '' || $espece === '') {
            echo json_encode(['succes' => false, 'message' => 'Données invalides']);
            return;
        }

        $dao = new AnimalDAO();
        $existant = $dao->trouverParId($id);

        if (!$existant) {
            echo json_encode(['succes' => false, 'message' => 'Animal introuvable']);
            return;
        }

        // Photo : si une nouvelle est uploadée, on remplace, sinon on garde l'ancienne
        $nomPhoto = $existant['photo'];

        if (!empty($_FILES['photo']['name'])) {
            $tmpName  = $_FILES['photo']['tmp_name'];
            $fileName = basename($_FILES['photo']['name']);
            $ext      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowed  = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($ext, $allowed, true)) {
                echo json_encode(['succes' => false, 'message' => 'Format de photo invalide']);
                return;
            }

            $nomPhoto = uniqid('animal_', true) . '.' . $ext;
            $dossier  = __DIR__ . '/photos/';

            if (!is_dir($dossier)) {
                mkdir($dossier, 0777, true);
            }

            if (!move_uploaded_file($tmpName, $dossier . $nomPhoto)) {
                echo json_encode(['succes' => false, 'message' => "Erreur lors de l'upload de l'image"]);
                return;
            }
        }

        $animal = new ModelAnimal(
            $id,
            $nom,
            $espece,
            $description,
            $statut,
            $dateArrivee,
            $nomPhoto
        );

        $ok = $dao->modifier($animal);

        echo json_encode(['succes' => $ok]);
    }

    /**
     * DELETE : supprimer un animal
     */
    private static function supprimer(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        $id = (int)($_POST['id'] ?? 0);

        if ($id <= 0) {
            echo json_encode(['succes' => false, 'message' => 'ID invalide']);
            return;
        }

        $dao = new AnimalDAO();
        $ok = $dao->supprimer($id);

        echo json_encode(['succes' => $ok]);
    }
}
