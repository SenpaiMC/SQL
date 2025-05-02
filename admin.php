<?php
include 'connex_bdd.php';
 // Inclure le fichier de connexion à la base de données
session_start(); // Démarrer la session
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
            header("Location: admin_upload.php");
            exit();
        }
         else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
            
        }

?>

