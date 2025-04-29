<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" href="Global-form.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="fonction.js"></script>
    <script src="espace_user.js"></script>
    <script src="index.js"></script>
<section id="profil">
    <div class="formulaire
<div class="formulaire" id="zone-connexion">
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
                <input type="file" id="fileInput" name="photo_profil" onchange="previewImage()" required>
                <div id="previewImageContainer"></div>
            </div>
                    <!-- <label for="cover"></label>
                    <input type="file" id="fileInput" name="cover" onchange="previewImage()" required>
                <div id="previewImageContainer"></div>
                <!-- <img id="previewImageContainer" src="" alt=""> -->
            <button type="submit">S'inscrire</button>
        </form>

        <h3>Déjà inscrit ? <a href="Form_connexion.php">Se connecter</a></h3>
    </div>

</section>
<?php require_once('includes/footer.php'); ?>
</body>
</html>