<?php
$servername = "localhost";
$username = "root";
$password = "Dan1906";
$dbname = "users_db";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
