<?php
$servername = "localhost"; // server
$username = "root"; // username
$password = "Dan1906"; // autenticacion
$dbname = "users_db";  // Nombre de la base de datos

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión De la base de datos
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
