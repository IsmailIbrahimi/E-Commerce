<?php
require "partials/header.php"
?>

    <main>
        <h1>Espace Utilisateur</h1>
        <div class="user-options">
            <div class="user-option">
                <a href="connexion.php">
                    <img src="/Serveur/public/Images/sign-in.svg" alt="Se connecter">
                    <p>Connexion</p>
                </a>
            </div>
            <div class="user-option">
                <a href="inscription.php">
                    <img src="/Serveur/public/Images/sign-up.svg" alt="S'inscrire">
                    <p>Inscription</p>
                </a>
            </div>
        </div>
    </main>
</body>
</html>

<?php
require "partials/footer.php"
?>