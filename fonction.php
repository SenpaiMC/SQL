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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connexion à la base de données
        $document = $_POST['document'];
        
        // Requête pour vérifier si l'utilisateur existe et récupérer ses informations
        $sql = "SELECT * FROM series WHERE name = ?";
        $stmt = $mysqli->prepare($sql);
        
        // Liaison des paramètres
        $stmt->bind_param('s', $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $utilisateur = $result->fetch_assoc();

        // Stocker le document dans un dossier spécifique
        $target_dir = "uploads/";
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
            
            $target_file = $target_dir . basename($_FILES["document"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            // Vérifier si le fichier est un type autorisé
            $allowedTypes = ['pdf', 'doc', 'docx', 'txt'];
            if (!in_array($fileType, $allowedTypes)) {
                echo "Seuls les fichiers PDF, DOC, DOCX et TXT sont autorisés.";
                $uploadOk = 0;
            }
            
            // Vérifier si le fichier peut être téléchargé
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
                    echo "Le fichier " . htmlspecialchars(basename($_FILES["document"]["name"])) . " a été téléchargé avec succès.";
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
            }
            
            
            
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
    function getFolderNames($directory) {
        $folders = [];
        if (is_dir($directory)) {
            $dirHandle = opendir($directory);
            while (($file = readdir($dirHandle)) !== false) {
                if ($file != '.' && $file != '..' && is_dir($directory . DIRECTORY_SEPARATOR . $file)) {
                    $folders[] = $file;
                }
            }
            closedir($dirHandle);
        }
        return $folders;
    }
    
    // Exemple d'utilisation
    $directoryPath = 'series/';
    $folderNames = getFolderNames($directoryPath);
    foreach ($folderNames as $folder) {
        echo $folder . '<br>';
    }
    ?>