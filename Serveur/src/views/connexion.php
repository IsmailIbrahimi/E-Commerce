<?php
require "partials/header.php"
?>
    <main>
        <h1>Connexion</h1>
        <form method="post" action="connexion.php">
            <label for="email">Email :</label>
            <input type="email" id="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" required>
            <button type="submit">Se connecter</button>
        </form>
        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
    </main>
</body>
</html>

<?php
require "partials/footer.php"
?>