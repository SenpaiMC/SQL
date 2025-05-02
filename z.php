<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'mon_site';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Si une requête AJAX est envoyée
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $stmt = $pdo->prepare("SELECT * FROM series WHERE name LIKE :query LIMIT 10");
    $stmt->execute(['query' => "%$query%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barre de recherche avec auto-suggestion</title>
    <style>
        #suggestions {
            border: 1px solid #ccc;
            max-width: 300px;
            position: absolute;
            background: white;
            z-index: 1000;
        }
        #suggestions div {
            padding: 8px;
            cursor: pointer;
        }
        #suggestions div:hover {
            background: #f0f0f0;
        }
    </style>
    <!-- <script>
        function searchSuggestions() {
            const query = document.getElementById('search').value;
            if (query.length > 0) {
                fetch(`z.php?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        const suggestions = document.getElementById('suggestions');
                        suggestions.innerHTML = '';
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.textContent = item.name;
                            div.onclick = () => {
                                document.getElementById('search').value = item.name;
                                suggestions.innerHTML = '';
                            };
                            suggestions.appendChild(div);
                        });
                    });
            } else {
                document.getElementById('suggestions').innerHTML = '';
            }
        }
        </script>
        <script>
            // Fonction pour rechercher des suggestions
            function searchSuggestions() {
                const query = document.getElementById('search').value;
                if (query.length > 0) {
                    // Envoi d'une requête AJAX pour récupérer les suggestions
                    fetch(`z.php?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            const suggestions = document.getElementById('suggestions');
                            suggestions.innerHTML = '';
                            data.forEach(item => {
                                const div = document.createElement('div');
                                div.style.display = 'flex';
                                div.style.alignItems = 'center';
                                div.style.gap = '10px';
    
                                // Création de l'image pour chaque suggestion
                                const img = document.createElement('img');
                                img.src = item.cover; // Supposons que la requête retourne un champ `cover` depuis la base de données
                                img.alt = item.name;
                                img.style.width = '50px';
                                img.style.height = '50px';
                                img.style.objectFit = 'cover';
    
                                // Création du texte pour chaque suggestion
                                const span = document.createElement('span');
                                span.textContent = item.name;
    
                                // Ajout de l'image et du texte dans le conteneur
                                div.appendChild(img);
                                div.appendChild(span);
    
                                // Gestion du clic sur une suggestion
                                div.onclick = () => {
                                    document.getElementById('search').value = item.name;
                                    suggestions.innerHTML = '';
                                };
    
                                // Ajout de la suggestion au conteneur des suggestions
                                suggestions.appendChild(div);
                            });
                        });
                } else {
                    // Si la barre de recherche est vide, on efface les suggestions
                    document.getElementById('suggestions').innerHTML = '';
                }
            }
        </script> -->
</head>
<body>
    <script src="zauto.js"></script>
    <h1>Recherche avec auto-suggestion</h1>
    <form class="recherche" action="fonction.php" method="GET">
    <input type="text" id="search" name="search" onkeyup="searchSuggestions()" placeholder="Rechercher..." autocomplete="off">
    <div id="suggestions"></div>
    </form>
    <style>
        #search {
            width: 200px;
            transition: width 0.3s ease;
        }
        #search:focus {
            width: 300px;
        }
    </style>
    

</body>
</html>