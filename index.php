<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" href="index_style.css">

<h1>Bienvenue sur mon site</h1>

<section>
    <div class="formulaire" id="zone-connexion">
        <h2>Connexion</h2>
        <form action="connexion.php" method="POST">
            <div class="input-groupe">
                <label for="login-username">Nom d'utilisateur</label>
                <input type="text" id="login-username" name="nom" required>
            </div>
            <div class="input-groupe">
                <label for="login-password">Mot de passe</label>
                <input type="mot_de_passe" id="login-password" name="mot_de_passe" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>

    <div class="formulaire" id="zone-inscription">
        <h2>Inscription</h2>
        <form action="inscription.php" method="POST" enctype="multipart/form-data">
            <div class="input-groupe">
                <label for="register-username">Nom d'utilisateur</label>
                <input type="text" id="register-username" name="nom" required>
            </div>
            <div class="input-groupe">
                <label for="register-password">Mot de passe</label>
                <input type="mot_de_passe" id="register-password" name="mot_de_passe" required>
            </div>
            <div class="input-groupe">
                <label for="register-email">Email</label>
                <input type="email" id="register-email" name="email" required>
            </div>

            <div class="input-groupe">
                <label for="photo_profil">Photo de profil:</label>
                <input type="file" id="photo_profil" name="photo_profil" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>
    </div>

</section>
<?php require_once('includes/footer.php'); ?>