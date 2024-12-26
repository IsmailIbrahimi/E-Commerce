<?php
require "partials/header.php";
?>
<main>
    <div class="produit-container">
        <?php if (isset($product) && $product): ?>
            <img src="<?= htmlspecialchars($product->getPicture()) ?>" alt="<?= htmlspecialchars($product->getName()) ?>">
            <h1><?= htmlspecialchars($product->getName()) ?></h1>
            <p class="price">Prix : <?= number_format($product->getPrice(), 2, ',', ' ') ?> €</p>
            <p class="description">Description : <?= htmlspecialchars($product->getDescription()) ?></p>
            <button class="btn-ajouter" data-nom="<?= htmlspecialchars($product->getName()) ?>" data-prix="<?= htmlspecialchars($product->getPrice()) ?>" data-image="<?= htmlspecialchars($product->getPicture()) ?>">
                Ajouter au panier
            </button>
        <?php else: ?>
            <p>Produit non trouvé.</p>
        <?php endif; ?>
    </div>
</main>

<!-- Ajout du conteneur pour les notifications -->
<div id="notification-container" style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>

<script>
    // Fonction pour afficher une notification
    function afficherNotification(message, couleur = 'green') {
        const notification = document.createElement('div');
        notification.textContent = message;
        notification.style.backgroundColor = couleur;
        notification.style.color = 'white';
        notification.style.padding = '10px 20px';
        notification.style.borderRadius = '5px';
        notification.style.marginTop = '10px';

        const notificationContainer = document.getElementById('notification-container');
        notificationContainer.appendChild(notification);

        // Supprime la bulle après 3 secondes
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('btn-ajouter')) {
            const nom = e.target.dataset.nom;

            // Affiche une notification d'ajout au panier
            afficherNotification(`${nom} a été ajouté avec succès !`);
        }
    });
</script>
</body>
</html>

<?php
require "partials/footer.php";
?>
