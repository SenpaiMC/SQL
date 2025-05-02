<?php
    include 'connex_bdd.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $mot_de_passe = $_POST['mot_de_passe'];
    
        
        // Requête pour vérifier si l'utilisateur existe et récupérer ses informations
        $sql = "SELECT * FROM utilisateurs WHERE nom = ?";
        $stmt = $mysqli->prepare($sql);

        // Liaison des paramètres
        $stmt->bind_param('s', $nom);
        $stmt->execute();
        $result = $stmt->get_result();
        $utilisateur = $result->fetch_assoc();
        
        // Vérification du mot de passe
        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['utilisateur_id'] = $utilisateur['id'];
            $_SESSION['utilisateur_nom'] = $utilisateur['nom'];
            $_SESSION['utilisateur_email'] = $utilisateur['email'];
            $_SESSION['photo_profil'] = $utilisateur['photo_profil'];
            
            echo "Connexion réussie!";
            // Redirection vers l'espace utilisateur après connexion
            header("Location:espace_user.php");
            
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }

        
    
    }
    ?>

<?php
include 'connex_bdd.php';
 // Inclure le fichier de connexion à la base de données // Démarrer la session
// Inclure le fichier de connexion à la base de données
// Inclure le fichier de connexion à la base de données
// Connexion réussie (commented out to prevent output before header redirection)
// echo "Connexion réussie !";

        // Vérification si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST['nom'];
            $mot_de_passe = $_POST['mot_de_passe'];
        } else {
            die("Erreur : le formulaire n'a pas été soumis.");
        }
        // Requête pour vérifier si l'utilisateur existe et récupérer ses informations

        $sql = "SELECT * FROM administrateurs WHERE nom = ?";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $mysqli->error);
        }
        // Vérification si le formulaire a été soumis
        
        
        // Liaison des paramètres
        $stmt->bind_param('s', $nom);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();
        
        // Si l'utilisateur est un administrateur
        if ($admin && password_verify($mot_de_passe, $admin['mot_de_passe'])) {
            // Vérification du mot de passe
            // Stocker les informations de l'administrateur dans la session
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_nom'] = $admin['nom'];
            $_SESSION['mot_de_passe'] = $admin['mot_de_passe'];
            // Redirection vers l'espace administrateur après connexion
            header("Location: C:\Users\utilisateur\Documents\Sakura-scan\espace_user.php");
            exit();
        }
         else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
            
        }


?>

<br>
<br>
<a href="page_connexion.php">Retour à l'accueil pour se connecter</a>