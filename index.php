<?php 
$SERVERNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "mp07uf1";

$conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

if ($conn->connect_error) {
    die("Connexió trencada: " . $conn->connect_error);
}
?>