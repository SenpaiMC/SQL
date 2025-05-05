<?php require 'db_sakura-scan.php'; ?>
<?php include 'header.php'; ?>
<?php $genres = ["","Action","Aventure","Comédie","Drame","Fantastique","Horreur","Romance","Science-fiction","Autre","Système"]; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manga_webtoon.css">
    <title>Déposer</title>
</head>
<body> <br>
<section><h1>Partie Manga</h1></section>
    <section id="manga" class="page1">
        <div class="mangas" >
            <h2>Déposer un Manga</h2>
            <form action="upload_m.php" method="post" enctype="multipart/form-data">
                <label for="titre">Titre du Manga:</label>
                <input type="text" id="titre" name="titre" required><br><br>
                
                <select inputmode="text" id="genre" name="genre" required>
                    <option value="">Sélectionner un genre</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select> <br><br>
                    
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" cols="30" required></textarea><br><br>
                    
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .gif" multiple required><br><br>
                    
                    <input type="submit" value="Déposer le Manga">
                </form>
            </div>
            <div class="mangas">
                <h2>Déposer un Chapitre</h2>
                <form action="upload_m.php" method="post">
                    <label for="manga_id">Id du manga :</label>
                    <input type="text" id="manga_id" name="manga_id" required><br><br>
        
                    <label for="numero">Numéro du chapitre :</label>
                    <input type="text" id="numero" name="numero" required><br><br>
        
                    <label for="chemin">Chemin d'accée :</label>
                    <input type="text" id="chemin" name="chemin" required><br><br>
                    
                    <input type="submit" value="Déposer le chapitre">
                </form>
            </div>
            <div class="mangas">
                <h2>Liste des mangas déposés</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Image</th>
                    </tr>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM mangas");
                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row['titre'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') . "' alt='Image' width='40'></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
    </section><br> <br>
    <section><h1>Partie Webtoon</h1></section>
    <section id="manga" class="page2">
        <div class="mangas">
            <h2>Déposer un Webtoon</h2>
            <form action="upload_w.php" method="post" enctype="multipart/form-data">
            <label for="titre">Titre du Webtoon:</label>
            <input type="text" id="titre" name="titre" required><br><br>

            <select inputmode="text" id="genre" name="genre" required>
                <option value="">Sélectionner un genre</option>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php endforeach; ?>
            </select> <br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="30" required></textarea><br><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .gif" multiple required><br><br>

            <input type="submit" value="Déposer le Webtoon">
            </form>
        </div>
            <div class="mangas">
                <h2>Déposer un Chapitre</h2>
                <form action="upload_w.php" method="post">
                    <label for="manga_id">Id du webtoon :</label>
                    <input type="text" id="weebtoon_id" name="weebtoon_id" required><br><br>
        
                    <label for="chapitre">Numéro du chapitre :</label>
                    <input type="text" id="chapitre" name="chapitre" required><br><br>
        
                    <label for="chemin">Chemin d'accée :</label>
                    <input type="text" id="chemin" name="chemin" required><br><br>  
                    
                    <input type="submit" value="Déposer le chapitre">
                </form>
            </div>
            <div class="mangas">
                <h2>Liste des webtoons déposés</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Image</th>
                    </tr>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM webtoons");
                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row['titre'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') . "' alt='Image' width='40'></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
    </section>

</body>
</html>