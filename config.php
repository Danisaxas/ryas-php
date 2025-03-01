<?php
$host = "localhost"; // Servidor de MySQL
$user = "root"; // Usuario de MySQL en Navicat
$pass = "Dan1906"; // Contraseña de MySQL en Navicat
$dbname = "login_system"; // Base de datos dentro de la conexión "users"

// Crear conexión con MySQL
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos";
}
?>
