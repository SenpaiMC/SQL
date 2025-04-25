<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index_style.css">
    <title>Document</title>
</head>
<body>
    <section id="profil">
        <div class="formulaire" id="zone-inscription">
            <h2>Création de compte</h2>
            <form action="page_de_serie.php" method="POST" enctype="multipart/form-data">
                <div class="input-groupe">
                    <!-- Name -->
                    <label for="register-username">Nom de série:</label>
                    <input type="text" id="name" name="name" placeholder="Solo leveling..." required>
                </div>
                <div class="input-groupe">
                    <!-- Type -->
                    <label for="register-password">Type:</label>
                    <input type="type" id="type" name="type" placeholder="Manga, Webtoon..." required>
                </div>
                <div class="input-groupe">
                    <!-- Genre -->
                    <label for="register-username">Genre:</label>
                    <input type="text" id="genre" name="genre" placeholder="Action, Aventure..." required>
                </div>
                <div class="input-groupe">
                    <!-- Synopsis -->
                    <label for="register-password">Synopsis:</label>
                    <!-- <input  type="text" id="register-password" name="synopsie" placeholder="Un résumé de la série..." required> -->
                    <textarea name="synopsie" id="" placeholder="Un résumé ..." style="width: 90%;" required></textarea>
                </div> 
                <div class="input-groupe">
                    <!-- Photo de couverture -->
                    <label for="cover"></label>
                    <input type="file" id="cover" name="cover" required>
                </div>

                <button type="submit">Envoyer</button>
            </form>

</body>
</html>
