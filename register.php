<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);  // Encriptamos la contraseña

    // Verificar si el correo ya está registrado
    $sql = "SELECT * FROM users WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "El correo ya está registrado.";
    } else {
        // Insertar nuevo usuario en la base de datos
        $sql = "INSERT INTO users (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>

<!-- Formulario de registro -->
<form method="POST" action="register.php">
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="email" name="correo" placeholder="Correo electrónico" required><br>
    <input type="password" name="contrasena" placeholder="Contraseña" required><br>
    <button type="submit">Registrarse</button>
</form>
