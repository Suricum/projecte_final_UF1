
<?php
require 'creaBDD.php';

// Función para agregar un libro
function add_book($conn, $titol, $autor, $isbn, $idioma)
{
    $sql = "INSERT INTO llibre (titol, autor, isbn, idioma) VALUES ('$titol', '$autor', '$isbn', '$idioma')";
    return mysqli_query($conn, $sql) ? "Libro agregado correctamente." : "Error: " . mysqli_error($conn);
}

// Función para editar un libro
function edit_book($conn, $id, $titol, $autor, $isbn, $idioma)
{
    $sql = "UPDATE llibre SET titol = '$titol', autor = '$autor', isbn = '$isbn', idioma = '$idioma' WHERE id = $id";
    return mysqli_query($conn, $sql) ? "Libro editado correctamente." : "Error: " . mysqli_error($conn);
}

// Función para eliminar un libro
function delete_book($conn, $id)
{
    $sql = "DELETE FROM llibre WHERE id = $id";
    return mysqli_query($conn, $sql) ? "Libro eliminado correctamente." : "Error: " . mysqli_error($conn);
}

// Función para asignar un libro a una biblioteca
function assign_book_to_library($conn, $id, $id_biblioteca)
{
    $sql = "UPDATE llibre SET id_biblioteca = $id_biblioteca WHERE id = $id";
    return mysqli_query($conn, $sql) ? "Libro asignado correctamente." : "Error: " . mysqli_error($conn);
}

// Función para mostrar todos los libros
function show_books($conn)
{
    $sql = "SELECT * FROM llibre";
    $result = mysqli_query($conn, $sql);
    return $result;
}
