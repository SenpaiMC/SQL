<?php 
include 'db_sakura-scan.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['titre'])) {
    // Gestion de l'upload de manga
    $titre = $_POST['titre'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    
    // Création d'un dossier basé sur le titre
    $titre_dossier = preg_replace('/[^a-zA-Z0-9_-]/', '_', $titre); // Nettoyage du titre pour éviter les caractères spéciaux
    $dossierPath = 'webtoons/' . $titre_dossier;
    
    if (!is_dir($dossierPath)) {
        mkdir($dossierPath, 0777, true); // Création du dossier avec permissions
    }
    // Vérification de l'upload de l'image
    if ($image['error'] == 0) {
        $imagePath = $dossierPath . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $imagePath);
    } else {
        die('Erreur lors de l\'upload de l\'image.');
    }
    
    // Insertion dans la base de données
    $stmt = $mysqli->prepare("INSERT INTO webtoons (titre, genre, description, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titre, $genre, $description, $imagePath]);

    echo "Manga déposé avec succès !";
    } elseif (isset($_POST['manga_id'])) {
    // Gestion de l'upload de chapitre
    $manga_id = $_POST['manga_id'];
    $numero = $_POST['numero'];
    $chemin = $_POST['chemin'];

    // Insertion dans la base de données
    $stmt = $pdo->prepare("INSERT INTO w_chapitres (manga_id, numero, chemin) VALUES (?, ?, ?)");
    $stmt->execute([$manga_id, $numero, $chemin]);

    header("Location: Page_upload.php"); // Redirection après l'upload
    exit;
} else {
    echo "Données non valides.";
echo "Méthode de requête non valide.";
}
}

?>