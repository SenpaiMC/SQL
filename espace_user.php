<?php require_once('includes/header.php'); ?>

<link rel="stylesheet" href="espace_user.css">
<section id="espace_user">

    <?php if (!empty($_SESSION['photo_profil'])): ?>
        <img src="<?php echo htmlspecialchars($_SESSION['photo_profil']); ?>" alt="Photo de profil" width="150">
    <?php else: ?>
        <p>Aucune photo de profil enregistrée.</p>
    <?php endif; ?>
    <p><?php echo htmlspecialchars($_SESSION['utilisateur_nom']) ?></p>
    
</section>

 <a href="deconnexion.php">Deconnexion</a>

<?php require_once('includes/footer.php'); ?>