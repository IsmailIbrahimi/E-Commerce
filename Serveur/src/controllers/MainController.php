<?php

class MainController
{
    // Page d'accueil
    public function home()
{
    $categoryId = $_GET['category'] ?? null;
    $products = [];

    if ($categoryId) {
        $products = \App\Models\Product::findByCategory($categoryId);
    }

    $categories = \App\Models\Category::findAll();
    $this->render('acceuil', ['categories' => $categories, 'products' => $products]);
}



    // Page "Catalogue"
    public function catalogue()
    {
        $products = \App\Models\Product::findAll();
        $this->render('catalogue', ['products' => $products]);
    }


    // Page "Connexion"
    public function signin()
    {
        $this->render('connexion');
    }

    // Page "Inscription"
    public function register()
    {
        $this->render('inscription');
    }

    // Page "Panier"
    public function cart()
    {
        $this->render('panier');
    }

    // Page "Produit"
    public function product()
{
    // Récupère l'ID du produit depuis les paramètres GET
    $productId = $_GET['id'] ?? null;

    if ($productId) {
        $product = \App\Models\Product::find($productId);
        $this->render('produit', ['product' => $product]);
    } else {
        $this->render('produit', ['product' => null]);
    }
}


    // Page "User"
    public function user()
    {
        $this->render('user');
    }

    // Page 404
    public function notFound()
    {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }

    // Méthode pour inclure une vue
    private function render($view, $data = [])
    {
        // Transmet les données aux vues
        extract($data);

        // Inclut la vue demandée
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "View not found: $view";
        }
    }
}