<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="index_style.css"> -->
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="espace_user.css">
    <link rel="stylesheet" href="includes.css">
    <link rel="stylesheet" href="includes/header.css">
    <link rel="stylesheet" href="fonction.js">
    <title>Mon site</title>
</head>
<body>

    <header>
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

        <?php if (isset($_SESSION['utilisateur_nom'])): ?>
            <!-- <p>Bonjour, <strong><?php echo ($_SESSION['utilisateur_nom']) ?></p> -->


            <div class="logo">
            <div class="logo-container" id="logo1"> 
                <a href="index.php"><img src="logo\logo sakura_scan.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo2"> 
                <div id="search-container">
                    <form class="recherche" action="fonction.php" method="GET">
                        <input type="text" name="search" id="search" onkeyup="searchSeries()" class="barre-de-recherche" id="search"  placeholder="Rechercher...">
                        <button type="submit" class="recherche-btn"><img src="logo\search.png" alt=""></button>
                        <!-- <input type="text" name=search id="search" onkeyup="searchSeries()" placeholder="Rechercher une série..."> -->
                </div id="search-container">
                    <div id="results" class="results" style="background-color: black;"></div>
                </form>
            </div>

            <div class="logo-container" id="logo3"> 
                <a href="page_connexion.php"><img src="logo\calendar.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo4"> 
                <a href="page_connexion.php"><img src="logo\Serie.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo6"> 
                <a href="espace_user.php"><img src="<?php echo htmlspecialchars($_SESSION['photo_profil']); ?>" alt="Photo de profil" width="150"></a>
            </div>

            <div class="logo-container" id="logo7"> 
                <a href="deconnexion.php">Deconnexion</a>
            </div>
        </div>

        <?php else : ?>

            <?php endif; ?>
        
            
            
            <?php if (isset($_SESSION['admin_nom'])): ?>
                
                <div class="logo">
                    <div class="logo-container" id="logo1"> 
                        <a href="index.php"><img src="logo\logo sakura_scan.png" alt=""></a>
                    </div>
                    
                    
                    <div class="logo-container" id="logo2"> 
                        <form class="recherche" action="fonction.php" method="GET">
                            <input type="text" name="search" class="barre-de-recherche"  placeholder="Rechercher...">
                            <button type="submit" class="recherche-btn"><img src="logo\search.png" alt=""></button>
                        </form>
                    </div>
                    
                    <div class="logo-container" id="logo3"> 
                        <a href="page_connexion.php"><img src="logo\calendar.png" alt=""></a>
                    </div>
                    
                    <div class="logo-container" id="logo4"> 
                        <a href="page_connexion.php"><img src="logo\Serie.png" alt=""></a>
                    </div>
                    
                    <div class="logo-container" id="logo5"> 
                        <a href="form_connexion.php"><img src="logo\User.png" alt=""></a>
                    </div>
            <div class="logo-container" id="logo6"> 
                <a href="deconnexion.php">Deconnexion</a>
            </div>
        </div>         
            <?php endif; ?>

                <?php if (!isset($_SESSION['utilisateur_nom']) && !isset($_SESSION['admin_nom'])): ?>
                    <div class="logo">
                        <div class="logo-container" id="logo1"> 
                            <a href="index.php"><img src="logo\logo sakura_scan.png" alt=""></a>
                        </div>

                        <div class="logo-container" id="logo2"> 
                            <!-- <form class="recherche" action="fonction.php" method="GET">
                                <input type="text" name="search" class="barre-de-recherche" placeholder="Rechercher...">
                                <button type="submit" class="recherche-btn"><img src="logo\search.png" alt=""></button>
                            </form> -->
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

                            <script src="zauto.js"></script>
    <h1>Recherche avec auto-suggestion</h1>
    <form class="recherche" action="fonction.php" method="GET">
    <input type="text" id="search" name="search" onkeyup="searchSuggestions()" placeholder="Rechercher..." autocomplete="off">
    <div id="suggestions"></div>
    </form>
                        </div>

                        <div class="logo-container" id="logo3"> 
                            <a href="page_connexion.php"><img src="logo\calendar.png" alt=""></a>
                        </div>

                        <div class="logo-container" id="logo4"> 
                            <a href="page_connexion.php"><img src="logo\Serie.png" alt=""></a>
                        </div>

                        <div class="logo-container" id="logo5"> 
                            <a href="form_connexion.php"><img src="logo\User.png" alt=""></a>
                        </div>
                    </div>
                <?php endif; ?>
            
        </header>
        
    </body>
    </html>