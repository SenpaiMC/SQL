<?php require_once('header.php'); ?>
<!-- <link rel="stylesheet" href="index_style.css"> -->
<link rel="stylesheet" href="Global-form.css">
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
</head>
<body>
<section id="carousel">
    <div class="carousel-container">
        <div class="carousel-slide">
        <h2>Connexion</h2>
            <form action="user_connexion.php" method="POST">
                <div class="input-groupe">
                <!-- Pseudo -->
                <label for="login-username"></label>
                <input type="text" id="login-username" name="nom" placeholder="Pseudo" required>
            </div>
            <div class="input-groupe">
                <!-- Mot de passe -->
                <label for="login-password"></label>
                <input type="password" id="login-password" name="mot_de_passe" placeholder="Mot de passe" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <button onclick="moveCarousel(1)" style="background: none; border: none; color: white; font-size: 16px; cursor: pointer;">Pas de compte ? S'inscrire</button>
        </div>
        <div class="carousel-slide">
        <h2>Création de compte</h2>
        <form action="user_inscription.php" method="POST" enctype="multipart/form-data">
            <div class="input-groupe">
                <!-- Pseudo -->
                <label for="register-username"></label>
                <input type="text" id="register-username" name="nom" placeholder="Pseudo" required>
            </div>
            <div class="input-groupe">
                <!-- Mot de passe -->
                <label for="register-password"></label>
                <input type="mot_de_passe" id="register-password" name="mot_de_passe" placeholder="Mot de passe" required>
            </div>

            <div class="input-groupe">
                <!-- Photo de profil -->
                <label for="photo_profil"></label>
                <input type="file" id="fileInput" name="photo_profil" onchange="previewImage()" required>
                <div id="previewImageContainer"></div>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
        <button onclick="moveCarousel(1)" style="background: none; border: none; color: white; font-size: 16px; cursor: pointer;">Déjà inscrit ? Se conecter </button>
            </div>

        </div>
    </div>
    <!-- <button class="carousel-prev" onclick="moveCarousel(-1)">&#10094;</button>
    <button class="carousel-next" onclick="moveCarousel(1)">&#10095;</button> -->
</section>


<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');

    function moveCarousel(direction) {
        slides[currentSlide].style.display = 'none';
        currentSlide = (currentSlide + direction + slides.length) % slides.length;
        slides[currentSlide].style.display = 'block';
    }

    // Initialize carousel
    slides.forEach((slide, index) => {
        slide.style.display = index === 0 ? 'block' : 'none';
    });
</script>

<style>
    #carousel {
        position: relative;
        width: 100%;
        max-width: 550px;
        height: 600px;
        margin: 0 auto;
        margin-top: 1%;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: aquamarine;
    }

    .carousel-container {
        display: flex;
        flex-direction: row;
    }
    
    .carousel-slide {
        width: 100%;
        height: 600px;
        flex: 0 0 100%;
        display: none;
        background-color:purple;
        color: white;
        align-content: center;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    }

    .carousel-slide:last-child {
        background-color:rgb(66, 24, 48);
    }
    .carousel-slide input {
        width: 60%;
        height: 30px;
        padding: 10px;
        margin: 20px 0;
        align-items: center;
    }
    .carousel-slide button {
        background-color:rgb(150, 71, 134);
        width: 40%;
        padding: 10px;
        margin: 10px 0;
        align-items: center;
        border: none;
        cursor: pointer;
    }

    .carousel-slide button:hover {
        background-color:rgb(151, 80, 151);
    }

    .carousel-prev, .carousel-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .carousel-prev {
        left: 10px;
    }

    .carousel-next {
        right: 10px;
    }
</style>
</body>
</html>