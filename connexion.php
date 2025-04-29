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
            header("Location: espace_user.php");
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }

        
    
    }
    ?>

<br>
<br>
<a href="page_connexion.php">Retour à l'accueil pour se connecter</a>