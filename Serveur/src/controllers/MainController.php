<?php

class MainController
{
    // Page d'accueil
    public function home()
    {
        $this->render('acceuil');
    }

    // Page "Catalogue"
    public function catalogue()
    {
        $this->render('catalogue');
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
        $this->render('produit');
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
        $viewFile = __DIR__ . '/Serveur/src/views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "View not found: $view";
        }
    }
}