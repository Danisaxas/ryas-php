<?php
session_start();

$host = "localhost";
$usuario = "root";
$contrasena = "Dan1906";
$base_datos = "user";

// Conexión a la base de datos
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Buscar usuario en la base de datos
$sql = "SELECT * FROM users WHERE correo='$correo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    
    if (password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['usuario'] = $usuario['nombre'];
        echo "Inicio de sesión exitoso. <a href='bienvenido.php'>Ir a la página principal</a>";
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "No se encontró una cuenta con ese correo.";
}

$conn->close();
?>
