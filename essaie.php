<?php 
require_once('includes/header.php'); 

// Initialize session variables if not already set
if (!isset($_SESSION['cover'])) $_SESSION['cover'] = 'default_cover.jpg';
if (!isset($_SESSION['utilisateur_name'])) $_SESSION['utilisateur_name'] = 'Invité';
if (!isset($_SESSION['utilisateur_type'])) $_SESSION['utilisateur_type'] = 'Non spécifié';
if (!isset($_SESSION['utilisateur_genre'])) $_SESSION['utilisateur_genre'] = 'Non spécifié';
if (!isset($_SESSION['utilisateur_synopsie'])) $_SESSION['utilisateur_synopsie'] = 'Aucun synopsis disponible';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="serie.css">
    <title>Document</title>
</head>
<body>
    <section id="serie" >
        <div class="page_serie" id="image">
            <img src="<?php echo htmlspecialchars($_SESSION['cover']); ?>" alt="Couverture de la série">
        </div>
        <div class="page_serie" id="description">
            <p><?php echo htmlspecialchars($_SESSION['utilisateur_name']); ?></p>
            <p>Type: <?php echo htmlspecialchars($_SESSION['utilisateur_type']); ?></p>
            <p>Genre: <?php echo htmlspecialchars($_SESSION['utilisateur_genre']); ?></p>
            <p data-v-a214b854="">Synopsis: <?php echo htmlspecialchars($_SESSION['utilisateur_synopsie']); ?></p>
        </div>

        
    </section>    
</body>
</html>