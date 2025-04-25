<?php require_once('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="carousel">
        <div class="slides">
            <div class="slide">
                <img src="image1.jpg" alt="Image 1">
            </div>
            <div class="slide">
                <img src="image2.jpg" alt="Image 2">
            </div>
            <div class="slide">
                <img src="image3.jpg" alt="Image 3">
            </div>
            <div class="slide">
                <img src="image1.jpg" alt="Image 4">
            </div>
            <div class="slide">
                <img src="image2.jpg" alt="Image 5">
            </div>
            <div class="slide">
                <img src="image3.jpg" alt="Image 6">
            </div>
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </section>

    <h2>Derniere sortie</h2>

    <section>
        
    </section>

    <style>
    .carousel {
        position: relative;
        max-width: 900px;
        height: 600px;
        overflow: hidden;
    }
    .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }
    .slide {
        min-width: 100%;
        box-sizing: border-box;
        background-color: brown;
    }
    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    button.prev, button.next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
    }
    button.prev {
        left: 10px;
    }
    button.next {
        right: 10px;
    }
    </style>

    <script>
    let currentSlide = 0;

    function moveSlide(direction) {
        const slides = document.querySelector('.slides');
        const totalSlides = slides.children.length;

        currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
        slides.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    function autoSlide() {
        moveSlide(1);
    }

    setInterval(autoSlide, 7000); // Change slide tout les 7 secondes

    </script>

</body>
</html>