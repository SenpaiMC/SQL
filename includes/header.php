<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index_style.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="espace_user.css">
    <link rel="stylesheet" href="includes.css">
    <title>Mon site</title>
</head>
<body>
    <header>
        <a href="index.php">Mon site</a>

        <?php if (isset($_SESSION['utilisateur_nom'])): ?>
            <p>Bonjour, <strong><?php echo ($_SESSION['utilisateur_nom']) ?></p>
            <nav>
                <ul>
                <a href="espace_user.php">Espace utilisateur</a><br>
                <a href="deconnexion.php">Déconnexion</a><br>
                <a href="contact.php">Contact</a><br>
                </ul>
            </nav>

        <?php endif; ?>
    </header>

    
</body>
</html>