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
    <link rel="stylesheet" href="includes/header.css">
    <title>Mon site</title>
</head>
<body>
    <header>

        <?php if (isset($_SESSION['utilisateur_nom'])): ?>
            <!-- <p>Bonjour, <strong><?php echo ($_SESSION['utilisateur_nom']) ?></p> -->


            <div class="logo">
            <div class="logo-container" id="logo1"> 
                <a href="index.php"><img src="logo\logo sakura_scan.png" alt=""></a>
                
            </div>

            <div class="logo-container" id="logo2"> 
                <form class="recherche" action="#" method="GET">
                    <input type="text" name="search" class="barre-de-recherche"  placeholder="Rechercher...">
                    <button type="submit" class="recherche-btn"><img src="logo\search.png" alt=""></button>
                </form>
            </div>

            <div class="logo-container" id="logo3"> 
                <a href="page_connexion.php"><img src="logo\calendar.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo4"> 
                <a href="page_connexion.php"><img src="logo\Serie.png" alt=""></a>
            </div>

            <div class="logo-container" id="logo6"> 
                <a href="espace_user.php"><img src="<?php echo htmlspecialchars($_SESSION['photo_profil']); ?>" alt="Photo de profil" width="150"></a>
            </div>
        </div>

        <?php else: ?>

        
        <div class="logo">
            <div class="logo-container" id="logo1"> 
                <a href="php.php"><img src="logo\logo sakura_scan.png" alt=""></a>
                
            </div>
            
            
            <div class="logo-container" id="logo2"> 
                <form class="recherche" action="#" method="GET">
                    <input type="text" name="search" class="barre-de-recherche"  placeholder="Rechercher...">
                    <button type="submit" class="recherche-btn"><img src="logo\search.png" alt=""></button>
                </form>
            </div>
            
            <div class="logo-container" id="logo3"> 
                <a href="page_connexion.php"><img src="logo\calendar.png" alt=""></a>
            </div>
            
            <div class="logo-container" id="logo4"> 
                <a href="page_connexion.php"><img src="logo\Serie.png" alt=""></a>
            </div>
            
            <div class="logo-container" id="logo5"> 
                <a href="page_connexion.php"><img src="logo\User.png" alt=""></a>
            </div>
        </div>
        
        <?php endif; ?>

    </header>
    
    
</body>
</html>