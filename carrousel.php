<?php require_once 'includes/header.php'; ?>
 <!-- // Inclure l'en-tête de votre site -->
<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'mon_site';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des images depuis la base de données
$query = $pdo->query("SELECT cover FROM series WHERE cover IS NOT NULL");
$query->execute();
$images = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel</title>
    <style>
        .carousel {
            width: 80%;
            margin: auto;
            overflow: hidden;
            position: relative;
        }
        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-images img {
            width: 100%;
            flex-shrink: 0;
        }
        .carousel-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .carousel-buttons button {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="carousel">
        <div class="carousel-images" id="carouselImages">
            <?php foreach ($images as $image): ?>
                <img src="<?= htmlspecialchars($image['cover']) ?>" alt="Image">
            <?php endforeach; ?>
        </div>
        <div class="carousel-buttons">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <script>
        let currentIndex = 0;

        function showSlide(index) {
            const carouselImages = document.getElementById('carouselImages');
            const totalImages = carouselImages.children.length;
            if (index >= totalImages) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalImages - 1;
            } else {
                currentIndex = index;
            }
            const offset = -currentIndex * 100;
            carouselImages.style.transform = `translateX(${offset}%)`;
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }
    </script>
</body>
</html>