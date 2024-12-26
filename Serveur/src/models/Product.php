<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Product extends CoreModel
{
    private $name;
    private $description;
    private $picture;
    private $price;

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Récupère tous les produits
     * 
     * @return Product[]
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetchObject(self::class);
    }
    
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM product");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function findByCategory($categoryId)
    {
        $pdo = \App\Utils\Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM product WHERE category_id = :category_id");
        $stmt->execute([':category_id' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

}
