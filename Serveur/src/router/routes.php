<?php

require_once __DIR__ . '/../controllers/MainController.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/acceuil', 'MainController#home', 'home');
$router->map('GET', '/catalogue', 'MainController#catalogue', 'catalogue');
$router->map('GET', '/connexion', 'MainController#signin', 'signin');
$router->map('GET', '/inscription', 'MainController#register', 'register');
$router->map('GET', '/panier', 'MainController#cart', 'cart');
$router->map('GET', '/produit', 'MainController#product', 'product');
$router->map('GET', '/user', 'MainController#user', 'user');

// Retourne l'objet router
return $router;