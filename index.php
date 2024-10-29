<?php

$SERVERNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "mp07uf1";

$conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

if ($conn->connect_error) {
    die("Connexió trencada: " . $conn->connect_error);
}

function add_library($conn)
{
    $nom = $_POST['nom'];
    $direccio = $_POST['direccio'];
    $telefon = $_POST['telefon'];
    $sql = "INSERT INTO biblioteca (nom, direccio, telefon) VALUES ('$nom', '$direccio', '$telefon')";
    echo $conn->query($sql) ? "Biblioteca afegida." : "Error: " . $conn->error;
}

function add_book($conn)
{
    $titol = $_POST['titol'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $idioma = $_POST['idioma'];
    $sql = "INSERT INTO llibre (titol, autor, isbn, idioma) VALUES ('$titol', '$autor', '$isbn', '$idioma')";
    echo $conn->query($sql) ? "Llibre afegit." : "Error: " . $conn->error;
}

function assign_book_to_library($conn)
{
    $id = $_POST['id'];
    $id_biblioteca = $_POST['id_biblioteca'];
    $sql = "UPDATE llibre SET id_biblioteca = $id_biblioteca WHERE id = $id";
    echo $conn->query($sql) ? "Llibre asignat" : "Error: " . $conn->error;
}

function show_libraries($conn)
{
    $result = $conn->query("SELECT * FROM biblioteca");
    echo "<h3>Biblioteques:</h3><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['id']} - {$row['nom']}, {$row['direccio']}, {$row['telefon']}</li>";
    }
    echo "</ul>";
}
