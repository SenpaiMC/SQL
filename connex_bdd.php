<?php
    $host = 'localhost';
    $dbname = 'mon_site';
    $username = 'root';
    $password = '';

    // Connexion avec MySQLi
    $mysqli = new mysqli($host, $username, $password, $dbname);

    // Vérification de la connexion
    if ($mysqli->connect_error) {
        die("Échec de la connexion : " . $mysqli->connect_error);
    }

    echo "Connexion réussie !";
?>