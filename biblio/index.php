
<?php
require 'biblioteca.php';
require 'llibre.php';

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
