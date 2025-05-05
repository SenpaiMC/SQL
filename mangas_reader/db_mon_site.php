<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli("localhost", "root", "", "mon_site");

// Check connection
if ($mysqli->connect_error) {
    exit("Connection failed: " . $mysqli->connect_error);
}

?>
