<?php
declare(strict_types=1);

/**
 * Classe Connexion
 * Singleton pour obtenir une instance PDO.
 * À ADAPTER avec vos propres paramètres de BD.
 */

class Connexion
{
    private static ?\PDO $pdo = null;

    public static function getConnexion(): \PDO
    {
        if (self::$pdo === null) {
            // À adapter selon votre environnement
            $host = 'localhost';
            $dbname = 'refuge_animaux';
            $user = 'root';
            $pass = '';

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$pdo = new \PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                http_response_code(500);
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode([
                    'succes'  => false,
                    'message' => 'Erreur de connexion à la base de données',
                ]);
                exit;
            }
        }

        return self::$pdo;
    }

    private function __construct() {}
    private function __clone() {}
}
