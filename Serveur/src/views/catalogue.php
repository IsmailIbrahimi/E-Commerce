<?php
require "partials/header.php"
?>
    <main>
        <h1>Notre Catalogue</h1>
        <div class="catalogue">
            <div class="product-card">
                <img src="/Serveur/public/Images/produit1.jpg" alt="Produit 1">
                <h2>Produit 1</h2>
                <p>Prix : 10 €</p>
                <div class="card-buttons">
                    <button class="btn-ajouter" data-nom="Produit 1" data-prix="10" data-image="/Serveur/public/Images/produit1.jpg">Ajouter au panier</button>
                    <a href="produit.php" class="btn-produit">Voir le produit</a>
                </div>
            </div>
            <div class="product-card">
                <img src="/Serveur/public/Images/produit2.jpg" alt="Produit 2">
                <h2>Produit 2</h2>
                <p>Prix : 20 €</p>
                <div class="card-buttons">
                    <button class="btn-ajouter" data-nom="Produit 2" data-prix="20" data-image="/Serveur/public/Images/produit2.jpg">Ajouter au panier</button>
                    <a href="produit.php" class="btn-produit">Voir le produit</a>
                </div>
            </div>
            <div class="product-card">
                <img src="/Serveur/public/Images/produit3.jpg" alt="Produit 3">
                <h2>Produit 3</h2>
                <p>Prix : 30 €</p>
                <div class="card-buttons">
                    <button class="btn-ajouter" data-nom="Produit 3" data-prix="30" data-image="/Serveur/public/Images/produit3.jpg">Ajouter au panier</button>
                    <a href="produit.php" class="btn-produit">Voir le produit</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<?php
require "partials/footer.php"
?>