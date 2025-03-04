<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el usuario existe
    $sql = "SELECT * FROM users WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($contrasena, $user['contrasena'])) {
            echo "Inicio de sesión exitoso. Bienvenido, " . $user['nombre'];
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El correo no está registrado.";
    }
}

?>

<!-- Formulario de inicio de sesión -->
<form method="POST" action="login.php">
    <input type="email" name="correo" placeholder="Correo electrónico" required><br>
    <input type="password" name="contrasena" placeholder="Contraseña" required><br>
    <button type="submit">Iniciar sesión</button>
</form>
