
<?php
$servidor = "localhost";
$usuario = "root";
$contrasenya = "";

// Conectar al servidor MySQL
$conn = mysqli_connect($servidor, $usuario, $contrasenya);

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS mp07uf1";
if (mysqli_query($conn, $sql)) {
    echo "Base de datos creada o ya existe.";
} else {
    echo "Error al crear la base de datos: " . mysqli_error($conn);
}

// Seleccionar la base de datos
mysqli_select_db($conn, "mp07uf1");
