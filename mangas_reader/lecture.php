<?php
include 'header.php'; // Inclure le fichier header.php pour le menu de navigation
include 'db_sakura-scan.php'; // Inclure le fichier de connexion à la base de données
?>

<?php
$chemin = isset($_GET['chemin']) ? $_GET['chemin'] : null; // Récupérer le chemin d'accès du chapitre
$numero = isset($_GET['numero']) ? $_GET['numero'] : null; // Récupérer le numéro du chapitre
// Configuration
$mangaFolder = 'mangas\mission__yozakura_family\chapitre 1'; // Dossier contenant les images des mangas
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Page actuelle
$mangaFiles = glob("$mangaFolder/*.jpg"); // Récupère toutes les images .jpg du dossier

// Tri des fichiers par ordre alphabétique
sort($mangaFiles);

// Vérification de la validité de la page
$totalPages = count($mangaFiles);
if ($page < 1 || $page > $totalPages) {
    die("Page invalide.");
}

// Image actuelle
$currentImage = $mangaFiles[$page - 1];

// Liens de navigation
$prevPage = $page > 1 ? $page - 1 : null;
$nextPage = $page < $totalPages ? $page + 1 : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecteur de Manga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        img {
            max-width: 60%;
            height: auto;
        }
        .navigation {
            margin: 20px 0;
        }
        .navigation a {
            text-decoration: none;
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }
        .navigation a:disabled {
            background-color: #ccc;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <h1>Lecteur de Manga</h1>
    <div class="navigation">
        <?php if ($prevPage): ?>
            <a href="?page=<?= $prevPage ?>">Page Précédente</a>
        <?php else: ?>
            <a disabled>Page Précédente</a>
        <?php endif; ?>

        <?php if ($nextPage): ?>
            <a href="?page=<?= $nextPage ?>">Page Suivante</a>
        <?php else: ?>
            <a disabled>Page Suivante</a>
        <?php endif; ?>
    </div>
    <img src="<?= htmlspecialchars($currentImage) ?>" alt="Page <?= $page ?>">
    <div class="navigation">
        <?php if ($prevPage): ?>
            <a href="?page=<?= $prevPage ?>">Page Précédente</a>
        <?php else: ?>
            <a disabled>Page Précédente</a>
        <?php endif; ?>

        <?php if ($nextPage): ?>
            <a href="?page=<?= $nextPage ?>">Page Suivante</a>
        <?php else: ?>
            <a disabled>Page Suivante</a>
        <?php endif; ?>
    </div>
</body>
</html>