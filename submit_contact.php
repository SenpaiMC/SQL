<?php
include 'connex_bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sujet = $_POST['objet'];
    $message = $_POST['message'];

    // Préparer la requête SQL avec des marqueurs "?"
    $sql = "INSERT INTO messages_contact (email, sujet, message) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param("sss", $email, $sujet, $message);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Message envoyé avec succès!";
        } else {
            echo "Erreur lors de l'envoi du message : " . $stmt->error;
        }

        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $mysqli->error;
    }
}
?>
<br>
<a href="index.php">Retour à l'accueil pour se connecter ou s'inscrire</a>