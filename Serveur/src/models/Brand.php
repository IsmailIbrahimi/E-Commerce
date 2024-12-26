<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Brand extends CoreModel
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM brand");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
