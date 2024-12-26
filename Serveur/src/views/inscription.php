<?php
require "partials/header.php";
?>
<main>
    <h1>Inscription</h1>
    <form method="post" action="inscription-handler.php">
        <label for="name">Nom complet :</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="./connexion">Connectez-vous ici</a>.</p>
</main>
</body>
</html>


<?php
require "partials/footer.php"
?>