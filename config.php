<?php
$servername = "bbdd.antonicolledib.com";
$username = "ddb220747";
$password = "ubqR#C4tq8/h5k	";
$dbname = "ddb220747";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}
?>