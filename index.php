
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
    $nom = $conn->real_escape_string($_POST['nom']);
    $direccio = $conn->real_escape_string($_POST['direccio']);
    $telefon = $conn->real_escape_string($_POST['telefon']);
    $sql = "INSERT INTO biblioteca (nom, direccio, telefon) VALUES ('$nom', '$direccio', '$telefon')";
    echo $conn->query($sql) ? "Biblioteca afegida." : "Error: " . $conn->error;
}

function edit_library($conn)
{
    $id = (int) $_POST['id'];
    $nom = $conn->real_escape_string($_POST['nom']);
    $direccio = $conn->real_escape_string($_POST['direccio']);
    $telefon = $conn->real_escape_string($_POST['telefon']);
    $sql = "UPDATE biblioteca SET nom = '$nom', direccio = '$direccio', telefon = '$telefon' WHERE id = $id";
    echo $conn->query($sql) ? "Biblioteca editada." : "Error: " . $conn->error;
}

function delete_library($conn)
{
    $id = (int) $_POST['id'];
    $sql = "DELETE FROM biblioteca WHERE id = $id";
    echo $conn->query($sql) ? "Biblioteca eliminada." : "Error: " . $conn->error;
}

function add_book($conn)
{
    $titol = $conn->real_escape_string($_POST['titol']);
    $autor = $conn->real_escape_string($_POST['autor']);
    $isbn = $conn->real_escape_string($_POST['isbn']);
    $idioma = $conn->real_escape_string($_POST['idioma']);

    $sql = "INSERT INTO llibre (titol, autor, isbn, idioma) VALUES ('$titol', '$autor', '$isbn', '$idioma')";
    echo $conn->query($sql) ? "Llibre afegit." : "Error; " . $conn->error;
}
function edit_book($conn)
{
    $id = (int) $POST['id'];
    $titol = $conn->real_escape_string($_POST['titol']);
    $autor = $conn->real_escape_string($_POST['autor']);
    $isbn = $conn->real_escape_string($_POST['isbn']);
    $idioma = $conn->real_escape_string($_POST['idioma']);

    $sql = "UPDATE llibre SET titol = '$titol', autor = '$autor', isbn = '$isbn', idioma = '$idioma' WHERE id = $id";
    echo $conn->query($sql) ? "Llibre editat." : "Error: " . $conn->error;
}

function delete_book($conn)
{
    $id = (int) $_POST['id'];
    $sql = "DELETE FROM llibre WHERE id = $id";
    echo $conn->query($sql) ? "Llibre eliminat." : "Error: " . $conn->error;
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

function show_books($conn)
{
    $result = $conn->query("SELECT * FROM llibre");
    echo "<h3>Libros:</h3><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['id']} - {$row['titol']}, {$row['autor']}, {$row['isbn']}, {$row['idioma']}</li>";
    }
    echo "</ul>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    switch ($action) {
        case 'add_library':
            add_library($conn);
            break;
        case 'edit_library':
            edit_library($conn);
            break;
        case 'delete_library':
            delete_library($conn);
            break;
        case 'add_book':
            add_book($conn);
            break;
        case 'edit_book':
            edit_book($conn);
            break;
        case 'delete_book':
            delete_book($conn);
            break;
        case 'assign_book_to_library':
            assign_book_to_library($conn);
            break;
        case 'show_libraries':
            show_libraries($conn);
            break;
        case 'show_books':
            show_books($conn);
            break;
        default:
            echo "Acció no válida.";
    }
}

$conn->close();
