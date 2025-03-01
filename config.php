<?php
$host = "localhost";  // Servidor MySQL (XAMPP usa localhost)
$user = "root";       // Usuario por defecto en XAMPP
$pass = "";           // XAMPP no tiene contraseña por defecto
$dbname = "login_system";  // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos 'login_system'";
}
?>
