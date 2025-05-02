<?php
    include 'connex_bdd.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Connexion à la base de données
        $search = $_GET['search'];

        // Requête pour vérifier si l'utilisateur existe et récupérer ses informations
        $sql = "SELECT * FROM series WHERE name = ?";
        $stmt = $mysqli->prepare($sql);

        // Liaison des paramètres
        $stmt->bind_param('s', $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $utilisateur = $result->fetch_assoc();

        

        // Vérification du mot de passe
        if (!empty($utilisateur['name'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['utilisateur_id'] = $utilisateur['id'];
            $_SESSION['utilisateur_name'] = $utilisateur['name'];
            $_SESSION['utilisateur_type'] = $utilisateur['type'];
            $_SESSION['utilisateur_genre'] = $utilisateur['genre'];
            $_SESSION['utilisateur_synopsie'] = $utilisateur['synopsie'];
            $_SESSION['cover'] = $utilisateur['cover'];

            echo "Connexion réussie!";
            // Redirection vers l'espace utilisateur après connexion
            header("Location: essaie.php");
            exit();
        } else {
            echo "Série pas trouver.";
        }
    }
?>

<?php
    include 'connex_bdd.php';
    session_start();

    ?>
    <!-- <script>
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
    </script> -->
    <?php

    if (isset($_GET['search'])) {
        $query = $conn->real_escape_string($_GET['search']);
    
        // Requête pour rechercher les séries correspondant à la saisie
        $sql = "SELECT * FROM series WHERE name LIKE '%$query%' LIMIT 10";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Affichage des résultats
            while ($row = $result->fetch_assoc()) {
                echo "<div id='result'>";
                echo "<div id=tt> <p>" . htmlspecialchars($row['name']) . "</p> </div>";
                echo "<div id=tt> <img src='" . htmlspecialchars($row['cover']) . "'> </div>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun résultat trouvé</p>";
        }
    }
    
    $conn->close();
    ?>
<style>
    #result {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: 50% 50%;
        justify-content: center;
        align-items: center;

    }

    #tt {
        width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    /* background-color: #c0c264; */
    }
</style>



<?php
    include 'connex_bdd.php';
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si un fichier a été téléchargé
    if (isset($_FILES['folder']) && $_FILES['folder']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Répertoire de destination
        $uploadFile = $uploadDir . basename($_FILES['folder']['name']);

        // Vérification et création du répertoire si nécessaire
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Déplacement du fichier téléchargé vers le répertoire de destination
        if (move_uploaded_file($_FILES['folder']['tmp_name'], $uploadFile)) {
            echo "Le dossier a été enregistré avec succès.";
        } else {
            echo "Erreur lors de l'enregistrement du dossier.";
        }
    } else {
        echo "Aucun fichier n'a été téléchargé ou une erreur s'est produite.";
    }
}