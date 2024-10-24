<?php
$servername = "localhost"; // Canvia si cal
$username = "root"; // Nom d'usuari
$password = ""; // Contrasenya
$dbname = "ddbb_ar"; // Nom de la base de dades

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
}
?>
