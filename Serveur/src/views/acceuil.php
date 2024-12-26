<?php
require "partials/header.php";
?>

<main>
    <section>
        <h1>Bienvenue sur notre site - Tomat-E</h1>
        <p>Explorez notre boutique et découvrez des produits exceptionnels !</p>
        <img src="/Serveur/public/Images/logo.png" alt="Image de présentation">
    </section>
    <section>
        <h2>Nos Catégories</h2>
        <div class="categories-navigation">
            <button id="toggle-nav" class="nav-toggle-btn">Catégories</button>
            <div id="categories-nav" class="nav-dropdown hidden">
                <?php foreach ($categories as $category): ?>
                    <a href="./acceuil?category=<?= $category->getId() ?>" class="nav-item">
                        <img src="<?= htmlspecialchars($category->getPicture()) ?>" alt="<?= htmlspecialchars($category->getName()) ?>" class="nav-icon">
                        <span><?= htmlspecialchars($category->getName()) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php if (!empty($products)): ?>
        <section>
            <h2>Produits de la catégorie</h2>
            <div class="catalogue">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?= htmlspecialchars($product->getPicture()) ?>" alt="<?= htmlspecialchars($product->getName()) ?>">
                        <h3><?= htmlspecialchars($product->getName()) ?></h3>
                        <p>Prix : <?= number_format($product->getPrice(), 2, ',', ' ') ?> €</p>
                        <button class="btn-ajouter" data-nom="<?= htmlspecialchars($product->getName()) ?>" data-prix="<?= htmlspecialchars($product->getPrice()) ?>" data-image="<?= htmlspecialchars($product->getPicture()) ?>">Ajouter au panier</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</main>
</body>
</html>

<?php
require "partials/footer.php";
?>
