<?php
include("config.php"); // Incluir la conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar los campos
    if (empty($email) || empty($password)) {
        echo "Por favor, rellene todos los campos.";
        exit();
    }

    // Verificar si el correo existe
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Autenticación exitosa, redirigir al dashboard
            echo "Bienvenido, " . $user['username'] . "!";
            // Aquí puedes redirigir a otra página (ej. dashboard.php)
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró un usuario con ese correo electrónico.";
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form method="POST" action="login.php">
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required><br>

    <button type="submit">Iniciar sesión</button>
</form>
