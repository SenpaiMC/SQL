                <?php
                // Connexion à la base de données
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=mon_site', 'root', '');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Récupérer les noms depuis la base de données
                    $stmt = $pdo->query('SELECT name FROM series');
                    $titreResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo 'Erreur de connexion : ' . $e->getMessage();
                    exit;
                }
                ?>
<?php $genres = ["","Action","Aventure","Comédie","Drame","Fantastique","Horreur","Romance","Science-fiction","Autre","Système"]; ?>
<?php require_once('includes/header.php'); ?>
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
            <form action="admin_serie.php" method="POST" enctype="multipart/form-data">
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
                    <select inputmode="text" name="genre1" id="genre" required>
                        <?php foreach ($genres as $genre): ?>
                            <option value="<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select inputmode="text" name="genre2" id="genre" required>
                        <?php foreach ($genres as $genre): ?>
                            <option value="<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select inputmode="text" name="genre3" id="genre" required>
                        <?php foreach ($genres as $genre): ?>
                            <option value="<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
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
<
                <select inputmode="text" name="genre1" id="genre" required>
                    <?php foreach ($titreResults as $titre): ?>
                        <option value="<?php echo htmlspecialchars($titre['name'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($titre['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>

    </section>

            <!-- formulaire d'enregistrement de série -->

    <section>
        <div>
            <form action="fonction.php" method="POST" enctype="multipart/form-data">
                <label for="document">Ajouter un dossier:</label>
                <label for="register-username">Nom de série:</label>
                <input type="text" id="name" name="name" placeholder="Solo leveling..." required>
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
            <a href="deconnexion.php">Deconnexion</a>
            
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
