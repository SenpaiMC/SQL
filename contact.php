<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" href="contact.css">

<section>
    <div class="formulaire" id="zone-contact">
        <h2>Nous contacter</h2>
        <form action="submit_contact.php" method="POST">
            <div class="input-groupe">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="email" required>
            </div>
            <div class="input-groupe">
                <label for="login-objet">Onjet</label>
                <input type="text" id="login-objet" name="objet" required>
            </div>
            <div class="input-groupe">
                <label for="login-message">Message</label>
                <input type="text" id="login-message" name="message" required>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>