<?php
// exo.php

// Connexion à la base de données
$host = 'localhost';
$dbname = 'sakura_scan';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
// Vérification de la table 'mangas'
try {
    $pdo->query("SELECT 1 FROM mangas LIMIT 1");
} catch (PDOException $e) {
    die("La table 'mangas' est introuvable ou inaccessible : " . $e->getMessage());
}

// Vérification de la table 'webtoons'
try {
    $pdo->query("SELECT 1 FROM webtoons LIMIT 1");
} catch (PDOException $e) {
    die("La table 'webtoons' est introuvable ou inaccessible : " . $e->getMessage());
}

// Si une requête est envoyée via AJAX
if (isset($_GET['query'])) {
    $query = strtolower($_GET['query']);
    $stmt = $pdo->prepare("
        SELECT titre, image FROM mangas WHERE LOWER(titre) LIKE :query
        UNION
        SELECT titre, image FROM webtoons WHERE LOWER(titre) LIKE :query
        LIMIT 5
    ");
    $stmt->execute(['query' => "%$query%"]);
    $suggestions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($suggestions);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Auto-Suggestion</title>
    <script>
        function searchSuggestions() {
            const query = document.getElementById('search').value;
            if (query.length === 0) {
                document.getElementById('suggestions').innerHTML = '';
                return;
            }
            
            fetch(`search-bar.php?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                const suggestionsBox = document.getElementById('suggestions');
                suggestionsBox.innerHTML = '';
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.style.display = 'flex';
                    div.style.alignItems = 'center';
                    div.style.gap = '10px';
                    // div.textContent = item;
                    const img = document.createElement('img');
                                img.src = item.image; // Supposons que la requête retourne un champ `cover` depuis la base de données
                                img.alt = item.titre; // Utiliser le titre comme texte alternatif   
                                img.style.width = '50px';
                                img.style.height = 'auto';
                                img.style.objectFit = 'cover';

                    const span = document.createElement('span');
                    span.textContent = item.titre;

                    // Ajout de l'image et du texte dans le conteneur
                    div.appendChild(img);
                    div.appendChild(span);
                    div.style.cursor = 'pointer';

                    div.onclick = () => {
                        document.getElementById('search').value = item.titre;
                        suggestionsBox.innerHTML = '';
                    };
                    suggestionsBox.appendChild(div);
                    
                });
            });
        }
        </script>
</head>
<body>
    <form action="page_serie.php" method="get">
    <!-- <h1>Recherche de Mangas et Webtoons</h1> -->
    <input type="text" id="search" name="search" onkeyup="searchSuggestions()" placeholder="Rechercher..." autocomplete="off" />
    <div id="suggestions"></div>
</form>
</body>
</html>
        <style>
            form {
                position: relative;
                width: 100%;
                max-width: 600px;
            }
            #search {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            #search:focus {
                border-color: #007BFF;
                outline: none;
            }

            #suggestions {
                top: 100%;
                border: 1px solid #ccc;
                overflow-y: auto;
                position: absolute;
                background: white;
                width: 100%;
            }
            #suggestions div {
                padding: 8px;
                cursor: pointer;
            }
            #suggestions div:hover {
                background-color: #f0f0f0;
            }
        </style>