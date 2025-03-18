<?php require_once('includes/header.php'); ?>

<link rel="stylesheet" href="espace_user.css">
<section id="espace_user">
    <h2>Vos informations</h2>
    <?php if (!empty($_SESSION['photo_profil'])): ?>
        <img src="<?php echo htmlspecialchars($_SESSION['photo_profil']); ?>" alt="Photo de profil" width="150">
    <?php else: ?>
        <p>Aucune photo de profil enregistrée.</p>
    <?php endif; ?>
    <p>Nom d'utilisateur : <?php echo htmlspecialchars($_SESSION['utilisateur_nom']) ?></p>
    <p>Email : <?php echo htmlspecialchars($_SESSION['utilisateur_email']) ?></p>
</section>

<?php require_once('includes/footer.php'); ?>