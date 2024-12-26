<?php
require "partials/header.php";
?>
<main>
    <h1>Notre Catalogue</h1>
    <div class="catalogue">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($product->getPicture()) ?>" alt="<?= htmlspecialchars($product->getName()) ?>">
                <h2><?= htmlspecialchars($product->getName()) ?></h2>
                <p>Prix : <?= number_format($product->getPrice(), 2, ',', ' ') ?> €</p>
                <div class="card-buttons">
                    <button class="btn-ajouter" data-nom="<?= htmlspecialchars($product->getName()) ?>" data-prix="<?= htmlspecialchars($product->getPrice()) ?>" data-image="<?= htmlspecialchars($product->getPicture()) ?>">Ajouter au panier</button>
                    <a href="./produit?id=<?= $product->getId() ?>" class="btn-produit">Voir le produit</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>

<?php
require "partials/footer.php";
?>