<?php
declare(strict_types=1);

use Voiture\VoitureDAO;
use Voiture\ModelVoiture;

require_once __DIR__ . '/VoitureDAO.php';
require_once __DIR__ . '/ModelVoitures.php';

/**
 * Contrôleur Voiture
 */
class ControleurVoiture
{
    public static function traiter(string $action): void
    {
        switch ($action) {
            case 'liste':
                self::liste();
                break;

            case 'sauver':
                self::sauver();
                break;

            case 'supprimer':
                self::supprimer();
                break;

            default:
                echo json_encode(['succes' => false, 'message' => 'Action inconnue']);
        }
    }

    /**
     * READ : lister toutes les voitures
     */
    private static function liste(): void
    {
        $dao = new VoitureDAO();
        $voitures = $dao->lister();

        $data = [];
        foreach ($voitures as $v) {
            $data[] = [
                'id'             => $v->id,
                'marque'         => $v->marque,
                'modele'         => $v->modele,
                'description'    => $v->description,
                'type_carburant' => $v->typeCarburant,
                'prix'           => $v->prix,
                'date_arrivee'   => $v->dateArrivee,
                'photo'          => $v->photo,
            ];
        }

        echo json_encode([
            'succes' => true,
            'data'   => $data
        ]);
    }

    /**
     * CREATE / UPDATE : sauvegarder une voiture
     */
    private static function sauver(): void
    {
        $id             = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;
        $marque         = trim($_POST['marque']        ?? '');
        $modele         = trim($_POST['modele']        ?? '');
        $description    = trim($_POST['description']   ?? '');
        $typeCarburant  = $_POST['type_carburant']     ?? 'ESSENCE';
        $prix           = (float)($_POST['prix']       ?? 0);
        $dateArrivee    = $_POST['date_arrivee']       ?? date('Y-m-d');
        $photo          = $_POST['photo']              ?? null; // à adapter si upload

        if ($marque === '' || $modele === '' || $prix <= 0) {
            echo json_encode([
                'succes'  => false,
                'message' => 'Données invalides (marque/modèle/prix).'
            ]);
            return;
        }

        $voiture = new ModelVoiture(
            $id,
            $marque,
            $modele,
            $description,
            $typeCarburant,
            $prix,
            $dateArrivee,
            $photo
        );

        $dao = new VoitureDAO();

        if ($id === null) {
            $ok  = $dao->creer($voiture);
            $msg = $ok ? 'Voiture ajoutée avec succès.' : 'Erreur lors de la création.';
        } else {
            $ok  = $dao->mettreAJour($voiture);
            $msg = $ok ? 'Voiture mise à jour.' : 'Erreur lors de la mise à jour.';
        }

        echo json_encode([
            'succes'  => $ok,
            'message' => $msg
        ]);
    }

    /**
     * DELETE : supprimer une voiture
     */
    private static function supprimer(): void
    {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

        if ($id <= 0) {
            echo json_encode([
                'succes'  => false,
                'message' => 'ID invalide.'
            ]);
            return;
        }

        $dao = new VoitureDAO();
        $ok  = $dao->supprimer($id);

        echo json_encode([
            'succes'  => $ok,
            'message' => $ok ? 'Voiture supprimée.' : 'Erreur lors de la suppression.'
        ]);
    }
}
