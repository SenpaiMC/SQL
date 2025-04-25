<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" href="index_style.css">
<section id="profil">
    <div class="formulaire
<div class="formulaire" id="zone-inscription">
        <h2>Création de compte</h2>
        <form action="inscription.php" method="POST" enctype="multipart/form-data">
            <div class="input-groupe">
                <!-- Pseudo -->
                <label for="register-username"></label>
                <input type="text" id="register-username" name="nom" placeholder="Pseudo" required>
            </div>
            <div class="input-groupe">
                <!-- Mot de passe -->
                <label for="register-password"></label>
                <input type="mot_de_passe" id="register-password" name="mot_de_passe" placeholder="Mot de passe" required>
            </div>

            <div class="input-groupe">
                <!-- Photo de profil -->
                <label for="photo_profil"></label>
                <input type="file" id="photo_profil" name="photo_profil" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>

        <h3>Déjà inscrit ? <a href="page_connexion.php">Se connecter</a></h3>
    </div>

</section>
<?php require_once('includes/footer.php'); ?>