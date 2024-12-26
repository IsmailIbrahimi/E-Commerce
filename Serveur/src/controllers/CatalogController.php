<?php

namespace App\Controllers;

use App\Models\Product;

class CatalogController
{
    public function catalogue()
    {
        $products = Product::findAll();
        $this->render('catalogue', ['products' => $products]);
    }

    private function render($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
