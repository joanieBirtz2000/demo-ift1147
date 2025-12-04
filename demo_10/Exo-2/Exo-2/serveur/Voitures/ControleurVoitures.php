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
        
    }

    /**
     * CREATE / UPDATE : sauvegarder une voiture
     */
    private static function sauver(): void
    {
       
    }

    /**
     * DELETE : supprimer une voiture
     */
    private static function supprimer(): void
    {
        
    }
}
