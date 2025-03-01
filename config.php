<?php
$host = "127.0.0.1";  // O localhost
$user = "root";  // Usuario de MySQL
$pass = "Dan1906";  // Contraseña de MySQL
$dbname = "login_system";  // Nombre de la base de datos

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>
