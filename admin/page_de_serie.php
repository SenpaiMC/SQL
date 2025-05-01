<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'mon_site';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $name = htmlspecialchars($_POST['name']);
        $type = htmlspecialchars($_POST['type']);
        $genre = htmlspecialchars($_POST['genre']);
        $synopsie = htmlspecialchars($_POST['synopsie']);

        
        // Gestion de l'upload de l'image
        if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'series/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $folder_type = $uploadDir . htmlspecialchars($_POST['type']) . '/';
            if (!is_dir($folder_type)) {
                mkdir($folder_type, 0777, true);
            }
            $folder_name = $folder_type . htmlspecialchars($_POST['name']) . '/';
            if (!is_dir($folder_name)) {
                mkdir($folder_name, 0777, true);
            }


            $fileTmpPath = $_FILES['cover']['tmp_name'];
            $fileName = "cover" . basename($_FILES['cover']['name']);
            $filePath = $folder_name . $fileName;

            

            if (move_uploaded_file($fileTmpPath, $filePath)) {
                // Insertion dans la base de données
                $sql = "INSERT INTO series (name, type, genre, synopsie, cover) VALUES (:name, :type, :genre, :synopsie, :cover)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':type' => $type,
                    ':genre' => $genre,
                    ':synopsie' => $synopsie,
                    ':cover' => $filePath
                ]);

                echo "Série ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'upload de l'image.";
            }
        } else {
            echo "Veuillez sélectionner une image valide.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>