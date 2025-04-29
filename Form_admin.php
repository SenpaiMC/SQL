<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Admin</title>
</head>
<body>
    <section>
        <div class="formulaire" id="zone-connexion">
            <h2>Connexion Admin</h2>
            <p>Veuillez entrer vos identifiants pour accéder à l'interface d'administration.</p>
        </div>
        <div class="formulaire" id="zone-connexion">
            <h2>Connexion</h2>
            <form action="admin.php" method="POST">
                <div class="input-groupe">
                    <!-- Pseudo -->
                    <label for="login-username"></label>
                    <input type="text" id="login-username" name="nom" placeholder="Pseudo" required>
                </div>
                <div class="input-groupe">
                    <!-- Mot de passe -->
                    <label for="login-password"></label>
                    <input type="password" id="login-password" name="mot_de_passe" placeholder="Mot de passe" required>
                </div>
                <button type="submit">Se connecter</button>
            </form>
            <h3>Pas de compte ? <a href="Form_inscription.php">S'inscrire</a></h3>
    </section>
</body>
</html>