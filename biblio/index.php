
<?php
require_once 'biblioteca.php';
require_once 'llibre.php';

// Manejo de acciones según la solicitud
$action = $_REQUEST['action'] ?? '';
$response = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'add_library':
            $response = add_library($conn, $_POST['nom'], $_POST['direccio'], $_POST['telefon']);
            break;
        case 'edit_library':
            $response = edit_library($conn, $_POST['id'], $_POST['nom'], $_POST['direccio'], $_POST['telefon']);
            break;
        case 'delete_library':
            $response = delete_library($conn, $_POST['id']);
            break;
        case 'add_book':
            $response = add_book($conn, $_POST['titol'], $_POST['autor'], $_POST['isbn'], $_POST['idioma']);
            break;
        case 'edit_book':
            $response = edit_book($conn, $_POST['id'], $_POST['titol'], $_POST['autor'], $_POST['isbn'], $_POST['idioma']);
            break;
        case 'delete_book':
            $response = delete_book($conn, $_POST['id']);
            break;
        case 'assign_book_to_library':
            $response = assign_book_to_library($conn, $_POST['id'], $_POST['id_biblioteca']);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bibliotecas y Libros</title>
</head>
<body>
    <h1>Gestión de Bibliotecas y Libros</h1>

    <!-- Formulario para bibliotecas -->
    <section>
        <h2>Bibliotecas</h2>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="add_library">
            <input type="text" name="nom" placeholder="Nombre" required>
            <input type="text" name="direccio" placeholder="Dirección" required>
            <input type="text" name="telefon" placeholder="Teléfono" required>
            <button type="submit">Agregar Biblioteca</button>
        </form>
    </section>

    <!-- Más secciones aquí -->
    <p><?php echo $response; ?></p>
</body>
</html>
