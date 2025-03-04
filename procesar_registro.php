<?php
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
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Cifra la contraseña

// Insertar datos en la base de datos
$sql = "INSERT INTO users (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
