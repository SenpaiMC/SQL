<?php
include 'connex_bdd.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    $photo_profil = '';

    // Gestion du téléchargement de la photo
    if (isset($_FILES['photo_profil']) && $_FILES['photo_profil']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['photo_profil']['name']);
        $file_tmp = $_FILES['photo_profil']['tmp_name'];
        $target_file = $upload_dir . $file_name;

        // Déplacer le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($file_tmp, $target_file)) {
            $photo_profil = $target_file;
        } else {
            echo "Erreur lors du téléchargement de la photo.";
            exit();
        }
    }

    // Insertion des données de l'utilisateur dans la base de données avec MySQLi
    $sql = "INSERT INTO utilisateurs (nom, mot_de_passe, photo_profil) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Erreur lors de la préparation de la requête : " . $mysqli->error);
    }

    // 'ssss' indique que les 4 valeurs sont des chaînes de caractères
    $stmt->bind_param("sss", $nom, $mot_de_passe, $photo_profil);

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
<a href="page_connexion.php">Retour à l'accueil pour se connecter ou s'inscrire</a>

