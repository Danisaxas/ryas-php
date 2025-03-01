<?php
// Crear la conexión usando mysqli
$conexion = new mysqli("localhost", "root", "Dan1906", "login_system", 3306);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres
$conexion->set_charset("utf8");

echo "Conexión exitosa";
?>
