<?php
require "partials/header.php"
?>

    <main>
        <h1>Détails du Produit</h1>
        <img src="/Serveur/public/Images/produit1.jpg" alt="Produit 1">
        <h2>Produit 1</h2>
        <p>Prix : 10 €</p>
        <p>Description : Ce produit est incroyable, vous allez l'adorer !</p>
        <button class="btn-ajouter" data-nom="Produit 1" data-prix="10" data-image="/Serveur/public/Images/produit1.jpg">Ajouter au panier</button>
    </main>
</body>
</html>

<?php
require "partials/footer.php"
?>