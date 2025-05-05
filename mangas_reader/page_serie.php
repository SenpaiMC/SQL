<?php
    include 'db_sakura-scan.php';
    session_start();

    // Initialize database connection
    $mysqli = new mysqli('localhost', 'root', '', 'sakura_scan');

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Connexion à la base de données
        $search = $_GET['search'];
        if (!isset($_GET['search']) || empty($_GET['search'])) {
            echo "Aucun terme de recherche fourni.";
            exit();
        }

        // Requête pour vérifier si la série existe et récupérer ses informations
        $sql = "SELECT * FROM mangas WHERE titre = ? UNION SELECT * FROM webtoons WHERE titre = ?";
        $stmt = $mysqli->prepare($sql);

        // Liaison des paramètres
        $stmt->bind_param('ss', $search , $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $utilisateur = $result->fetch_assoc();
        // Vérification si la série existe
        

        // Vérification du mot de passe
        if (!empty($utilisateur['titre'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['titre'] = $utilisateur['titre'];
            $_SESSION['description'] = $utilisateur['description'];
            $_SESSION['genre'] = $utilisateur['genre'];
            $_SESSION['image'] = $utilisateur['image'];

            echo "Connexion réussie!";
            // Redirection vers la page de série
            header("Location: essaie.php");
            exit();
        } else {
            echo "Série pas trouver.";
        }
    }
?>

<?php
    include 'db_sakura-scan.php';
    session_start();

    $sql = "SELECT * FROM m_chapitres WHERE manga_id = ? UNION SELECT * FROM w_chapitres WHERE webtoon_id = ?";
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("ss", $_SESSION["webtoon_id"], $utilisateur["manga_id"]);
    // Vérification si la série existe
    if (!isset($_GET['manga_id']) || empty($_GET['manga_id'])) {
        echo "Aucun terme de recherche fourni.";
        exit();
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $utilisateur = $result->fetch_assoc();

    if (!empty($utilisateur["id"]) == $_SESSION["id"]) {
        $_SESSION["id"] = $utilisateur["id"];
        $_SESSION["numero"] = $utilisateur["numero"];
        $_SESSION["chemin"] = $utilisateur["chemin"];
        echo "Chapitre trouvé!";
    } else {
        echo "Chapitre pas trouver.";
    }
    $stmt->close();
    ?>