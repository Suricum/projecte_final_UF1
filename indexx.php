<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mp07uf1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM biblioteca";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bibliotecas</title>
</head>
<body>
    <h1>Lista de Bibliotecas</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nom']}</td>
                        <td>{$row['direccio']}</td>
                        <td>{$row['telefon']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay registros</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
