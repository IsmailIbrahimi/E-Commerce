<?php
require "partials/header.php";
?>
<main>
    <h1>Votre Panier</h1>
    <div id="panier-container"></div>
    <div class="panier-actions">
        <button id="vider-panier" class="btn-rouge">Vider le panier</button>
        <p>Total : <span id="total">0 €</span></p>
    </div>
</main>
<div id="notification-container" style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>
</body>
</html>

<?php
require "partials/footer.php";
?>
