<?php
$servername = "localhost";
$username = "edib";
$password = "edib";
$dbname = "PasswordSwift";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}
?>
