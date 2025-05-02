<?php
include 'connex_bdd.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

    // Insertion des données de l'utilisateur dans la base de données avec MySQLi
    $sql = "INSERT INTO administrateurs (nom, mot_de_passe) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Erreur lors de la préparation de la requête : " . $mysqli->error);
    }

    // 'ssss' indique que les 4 valeurs sont des chaînes de caractères
    $stmt->bind_param("ss", $nom, $mot_de_passe);

    if ($stmt->execute()) {
        echo "Inscription réussie!";
        // Rediriger ou afficher un message de succès
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }

    $stmt->close();
}
?>

<br>
<a href="Form_connexion.php">Retour à l'accueil pour se connecter ou s'inscrire</a>

