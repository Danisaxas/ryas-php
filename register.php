<?php
include("config.php"); // Incluir la conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar los campos
    if (empty($username) || empty($email) || empty($password)) {
        echo "Por favor, rellene todos los campos.";
        exit();
    }

    // Verificar si el usuario ya existe
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "El nombre de usuario o el correo electrónico ya están registrados.";
    } else {
        // Cifrar la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>

<!-- Formulario de registro -->
<form method="POST" action="register.php">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required><br>

    <button type="submit">Registrarse</button>
</form>
