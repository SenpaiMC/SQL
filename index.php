<?php
// Connexion à la base de données

$conn = new mysqli('localhost', 'root', '', 'mon_site');

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Séries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .results p {
            margin: 5px 0;
        }
    </style>
    <script>
        function searchSeries() {
            const query = document.getElementById('search').value;
            const resultsDiv = document.getElementById('results');

            if (query.length > 0) {
                fetch(`index.php?q=${encodeURIComponent(query)}`)
                    .then(response => response.text())
                    .then(data => {
                        resultsDiv.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                    });
            } else {
                resultsDiv.innerHTML = '';
            }
        }
    </script>
</head>
<body>
    <h1>Recherche de Séries</h1>
    <input type="text" name=search id="search" onkeyup="searchSeries()" placeholder="Rechercher une série...">
    <div id="results" class="results"></div>
</body>
</html>

<?php
// Vérification de la présence du paramètre 'q'
if (isset($_GET['q'])) {
    $query = $conn->real_escape_string($_GET['q']);

    // Requête pour rechercher les séries correspondant à la saisie
    $sql = "SELECT * FROM series WHERE name LIKE '%$query%' LIMIT 10";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des résultats
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<a href='essaie.php?id=" . htmlspecialchars($row['id']) . "' style='text-decoration:none;color:inherit;'>";
            echo "<img src='" . htmlspecialchars($row['cover']) . "' alt='' style='width:100px;height:auto;'>";
            echo "<p>" . htmlspecialchars($row['name']) . "</p>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucun résultat trouvé</p>";
    }
}

$conn->close();
?>

</body>
</html>