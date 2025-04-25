<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" href="index_style.css">

<section id="profil">
    <div class="formulaire" id="zone-connexion">
        <h2>Connexion</h2>
        <form action="connexion.php" method="POST">
            <div class="input-groupe">
                <!-- Pseudo -->
                <label for="login-username"></label>
                <input type="text" id="login-username" name="nom" placeholder="Pseudo" required>
            </div>
            <div class="input-groupe">
                <!-- Mot de passe -->
                <label for="login-password"></label>
                <input type="mot_de_passe" id="login-password" name="mot_de_passe" placeholder="Mot de passe" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <h3>Pas de compte ? <a href="page_d'inscrition.php">S'inscrire</a></h3>
    </div>

</section>
<?php require_once('includes/footer.php'); ?>