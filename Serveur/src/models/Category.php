<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Category extends CoreModel
{
    private $name;
    private $subtitle;
    private $picture;

    public function getName()
    {
        return $this->name;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Récupère toutes les catégories
     * 
     * @return Category[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM category ORDER BY home_order ASC");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
