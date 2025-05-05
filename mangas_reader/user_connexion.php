<?php
    include 'db_mon_site.php'; // Inclure le fichier de connexion à la base de données

    // Initialiser la connexion à la base de données
    $mysqli = new mysqli("localhost", "root", "", "mon_site");

    // Vérifier la connexion
    if ($mysqli->connect_error) {
        die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
    }
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $mot_de_passe = $_POST['mot_de_passe'];
    
        
        // Requête pour vérifier si l'utilisateur existe et récupérer ses informations
        // Requête pour vérifier si l'utilisateur existe
        $sql_utilisateur = "SELECT * FROM utilisateurs WHERE nom = ?";
        $stmt_utilisateur = $mysqli->prepare($sql_utilisateur);
        $stmt_utilisateur->bind_param('s', $nom);
        $stmt_utilisateur->execute();
        $result_utilisateur = $stmt_utilisateur->get_result();
        $utilisateur = $result_utilisateur->fetch_assoc();

        // Requête pour vérifier si l'administrateur existe
        $sql_admin = "SELECT * FROM administrateurs WHERE nom = ?";
        $stmt_admin = $mysqli->prepare($sql_admin);
        $stmt_admin->bind_param('s', $nom);
        $stmt_admin->execute();
        $result_admin = $stmt_admin->get_result();
        $admin = $result_admin->fetch_assoc();

        // Vérification du mot de passe pour utilisateur
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

        // Vérification du mot de passe pour administrateur
        } elseif ($admin && password_verify($mot_de_passe, $admin['mot_de_passe'])) {
            // Stocker les informations de l'administrateur dans la session
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_nom'] = $admin['nom'];
            $_SESSION['mot_de_passe'] = $admin['mot_de_passe'];
            // Redirection vers l'espace administrateur après connexion
            header("Location:Page_upload.php");
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
            
        }
    ?>