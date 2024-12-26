<?php

namespace App\Utils;

use PDO;
use PDOException;

class Database
{
    private static $pdo;

    /**
     * Obtenir une instance PDO pour PostgreSQL
     * 
     * @return PDO
     */
    public static function getPDO()
    {
        if (!self::$pdo) {
            try {
                // Charger les informations de configuration
                $config = parse_ini_file(__DIR__ . '/../config.ini');
                if (!$config) {
                    throw new \Exception('Impossible de lire le fichier config.ini');
                }

                // Création de l'instance PDO pour PostgreSQL
                self::$pdo = new PDO(
                    "pgsql:host={$config['DB_HOST']};port={$config['DB_PORT']};dbname={$config['DB_NAME']}",
                    $config['DB_USERNAME'],
                    $config['DB_PASSWORD'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die("Erreur de connexion à PostgreSQL : " . $e->getMessage());
            } catch (\Exception $e) {
                die("Erreur : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
