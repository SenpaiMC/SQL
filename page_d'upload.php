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
                    <label for="type">Type:</label>
                    <!-- <input type="type" id="type" name="type" placeholder="Manga, Webtoon..." required> -->
                    <select inputmode="text" name="type" id="type" required>
                        <option value="Manga">Manga</option>
                        <option value="Webtoon">Webtoon</option>
                        <option value="Manhwa">Manhwa</option>
                        <option value="Manhua">Manhua</option>
                    </select>
                </div>
                <div class="input-groupe">
                    <!-- Genre -->
                    <label for="genre">Genre:</label>
                    <!-- <input type="text" id="genre" name="genre" placeholder="Action, Aventure..." required> -->
                    <select inputmode="text" name="genre" id="genre" required>
                        <option value="Action">Action</option>
                        <option value="Aventure">Aventure</option>
                        <option value="Comédie">Comédie</option>
                        <option value="Drame">Drame</option>
                        <option value="Fantastique">Fantastique</option>
                        <option value="Horreur">Horreur</option>
                        <option value="Romance">Romance</option>
                        <option value="Science-fiction">Science-fiction</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class="input-groupe">
                    <!-- Synopsis -->
                    <label for="register-password">Synopsis:</label>
                    <!-- <input  type="text" id="register-password" name="synopsie" placeholder="Un résumé de la série..." required> -->
                    <textarea name="synopsie" id="" placeholder="Un résumé ..." style="width: 90%;" required></textarea>
                </div> 
                <!-- <div class="input-groupe">
                    <!-- Photo de couverture 
                    <label for="cover"></label>
                    <input type="file" id="fileinput" name="cover" onchange="previewImage()" required>
                    <div id="previewImageContainer"></div>
                </div> -->

                <div class="input-group">
                    <label for="cover">Cover</label>
                <input type="file" id="fileInput" name="cover" onchange="previewImage()" required>
                <div id="previewImageContainer"></div>

                </div>

                <button type="submit">Envoyer</button>
            </form>

    </section>

            <!-- formulaire d'enregistrement de série -->

    <section>
        <div>
            <form action="fonction.php" method="post">
                <label for="document">Ajouter un dossier:</label>
                <label for="type">Type:</label>
                    <!-- <input type="type" id="type" name="type" placeholder="Manga, Webtoon..." required> -->
                    <select inputmode="text" name="type" id="type" required>
                        <option value="Manga">Manga</option>
                        <option value="Webtoon">Webtoon</option>
                        <option value="Manhwa">Manhwa</option>
                        <option value="Manhua">Manhua</option>
                    </select>
                <input type="file" id="document" name="document[]" webkitdirectory directory multiple required>
                <input type="hidden" name="series_name" value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="type" value="<?php echo htmlspecialchars($_POST['type'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" name="upload_document">Ajouter</button>
            </form>
        </div>
    </section>    
    
<script type="text/javascript">
    function previewImage() {
  const fileInput = document.getElementById('fileInput');
  const file = fileInput.files[0];
  const imagePreviewContainer = document.getElementById('previewImageContainer');
  
  if(file.type.match('image.*')){
    const reader = new FileReader();
    
    reader.addEventListener('load', function (event) {
      const imageUrl = event.target.result;
      const image = new Image();
      
      image.addEventListener('load', function() {
        imagePreviewContainer.innerHTML = ''; // Vider le conteneur au cas où il y aurait déjà des images.
        imagePreviewContainer.appendChild(image);
      });
      
      image.src = imageUrl;
      image.style.width = '200px'; // Indiquez les dimensions souhaitées ici.
      image.style.height = 'auto'; // Vous pouvez également utiliser "px" si vous voulez spécifier une hauteur.
    });
    
    reader.readAsDataURL(file);
  }
}
</script>
    

</body>
</html>
