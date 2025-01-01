
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

$sqlCrearTablas = "
CREATE TABLE IF NOT EXISTS biblioteca (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    direccio VARCHAR(255) NOT NULL,
    telefon VARCHAR(15) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS llibre (
    id INT(11) NOT NULL AUTO_INCREMENT,
    titol VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    isbn VARCHAR(13) NOT NULL,
    idioma VARCHAR(3) NOT NULL,
    id_biblioteca INT(11) DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_biblioteca) REFERENCES biblioteca(id) ON DELETE SET NULL ON UPDATE CASCADE
);
";
if (!mysqli_multi_query($conn, $sqlCrearTablas)) {
    die("Error al crear las tablas: " . mysqli_error($conn));
}


// Consultar las tablas para mostrar datos
$resultBiblioteca = mysqli_query($conn, "SELECT * FROM biblioteca");
$resultLlibre = mysqli_query($conn, "SELECT * FROM llibre");

// Mostrar resultados en pantalla
echo "<h1>Contenido de la base de datos</h1>";

// Mostrar bibliotecas
echo "<h2>Bibliotecas</h2>";
if (mysqli_num_rows($resultBiblioteca) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>";
    while ($fila = mysqli_fetch_assoc($resultBiblioteca)) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['nom']}</td>
                <td>{$fila['direccio']}</td>
                <td>{$fila['telefon']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay bibliotecas registradas.</p>";
}

// Mostrar libros
echo "<h2>Libros</h2>";
if (mysqli_num_rows($resultLlibre) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Idioma</th>
                <th>Biblioteca ID</th>
            </tr>";
    while ($fila = mysqli_fetch_assoc($resultLlibre)) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['titol']}</td>
                <td>{$fila['autor']}</td>
                <td>{$fila['isbn']}</td>
                <td>{$fila['idioma']}</td>
                <td>{$fila['id_biblioteca']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay libros registrados.</p>";
}

// Cerrar la conexión
mysqli_close($conn);
