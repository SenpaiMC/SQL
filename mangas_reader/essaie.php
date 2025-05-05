<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <section id="présentation" >
        <div class="serie" id="image">
            <img src="<?php echo htmlspecialchars($_SESSION['image']); ?>" alt="Couverture de la série">
        </div>
        <div class="serie" id="description">
            <h1><?php echo htmlspecialchars($_SESSION['titre']); ?></h1>
            <h2>Genre : <?php echo htmlspecialchars($_SESSION['genre']); ?></h2>
            <h2>Description :</h2>
            <h2><?php echo isset($_SESSION['description']) ? htmlspecialchars($_SESSION['description']) : 'Description non disponible'; ?></h2>
            <h2><?php echo htmlspecialchars($_SESSION['id']); ?></h2>
            </div>
            </section>
            <style>
            #présentation {
                margin: 10px auto;
                width: 100%;
                height: auto;
                display: grid;
                grid-template-columns:30% 60%;
                align-items: center;
                justify-content: space-around;
                background-color: blueviolet;
            }
            .serie {
                width: 100%;
                height: auto;
                flex-direction: column;
                justify-content: start;
                align-items: center;
                background-color: white;
            }
            
            .serie img {
                width: 100%;
                height: auto;
                object-fit: cover;
                border: 3px solid black;
            }
            
            #description {
                border: 3px solid black;
            }
            #description h1 {
                font-size: 2em;
                margin: 10px 0;
            }
            
        </style>
        <h2>Chapitre</h2>
        <?php
        include 'db_sakura-scan.php';
        // Récupérer les chapitres liés à l'ID de la session
        $query = "SELECT * FROM m_chapitres WHERE manga_id = ? union SELECT * FROM w_chapitres WHERE webtoon_id = ?";
        $stmt = $mysqli->prepare($query);
        // Vérifie si l'ID est défini dans la session, sinon attribue une valeur par défaut de 0
        $id = isset($_SESSION['id']) ? (int)$_SESSION['id'] : 0;
        $stmt->bind_param("ii", $id, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $chapitres = [];
            while ($row = $result->fetch_assoc()) {
                $chapitres[] = $row;
            }
            $_SESSION['numero'] = $chapitres ;  // Récupérer le numéro du chapitre   
            $_SESSION['chemin'] = $chapitres ;// Récupérer le chemin d'accès
        } else {
            echo "Aucun chapitre trouvé pour cet ID.";
            exit;
        }
        ?>
        <section id="chapitre">
            <?php 
            foreach ($_SESSION['chemin'] as $chemin) {
                if (is_array($chemin) && isset($chemin['chemin']) && isset($chemin['numero'])) {
                    echo '<div class="chapitre">
                    <form action="lecture.php" method="get">
                    <input type="hidden" name="chemin" value="' . htmlspecialchars($chemin['chemin']) . '">
                    <input type="hidden" name="numero" value="' . htmlspecialchars($chemin['numero']) . '">
                    <input type="submit" value="Chapitre ' . htmlspecialchars($chemin['numero']) . '">
                    </form>
                    </div>';
                }
            }
                ?>
    </section>
    <style>
        #chapitre {
            width: 90%;
            height: auto;
            display: grid;
            grid-template-columns: 20% 20% 20% 20%;
            grid-template-rows: 20% 20% 20%;
            margin: 20px auto;
            align-items: center;
            justify-content: space-around;
            border: 3px solid black;
        }
        .chapitre{
            width: 100%;
            height: 100px;
            align-items: center;
            background-color: white;
            box-sizing: border-box;
        }
        .chapitre input[type="submit"] {
            width: 100%;
            height: 100px;
            display: flex;
            background-color: blueviolet;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.5em;
            border-radius: 5px;
        }
        .chapitre input[type="submit"]:hover {
            background-color: #5a5a5a;
        }
        /* .chapitre input[type="submit"] {
            width: 100%;
            height: 100%;
        } */
    </style>

</body>
</html>