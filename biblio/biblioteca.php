
<?php
require_once 'db.php';

// Función para agregar una biblioteca
function add_library($conn, $nom, $direccio, $telefon)
{
    $sql = "INSERT INTO biblioteca (nom, direccio, telefon) VALUES ('$nom', '$direccio', '$telefon')";
    return mysqli_query($conn, $sql) ? "Biblioteca agregada correctamente." : "Error: " . mysqli_error($conn);
}

// Función para editar una biblioteca
function edit_library($conn, $id, $nom, $direccio, $telefon)
{
    $sql = "UPDATE biblioteca SET nom = '$nom', direccio = '$direccio', telefon = '$telefon' WHERE id = $id";
    return mysqli_query($conn, $sql) ? "Biblioteca editada correctamente." : "Error: " . mysqli_error($conn);
}

// Función para eliminar una biblioteca
function delete_library($conn, $id)
{
    $sql = "DELETE FROM biblioteca WHERE id = $id";
    return mysqli_query($conn, $sql) ? "Biblioteca eliminada correctamente." : "Error: " . mysqli_error($conn);
}

// Función para mostrar todas las bibliotecas
function show_libraries($conn)
{
    $sql = "SELECT * FROM biblioteca";
    $result = mysqli_query($conn, $sql);
    return $result;
}
