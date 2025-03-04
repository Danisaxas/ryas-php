<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Cifra la contraseña

    // Insertar los datos en la tabla `users`
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
        header("Location: login.php");  // Redirige al login después del registro
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Formulario de Registro</h2>
    <form method="POST" action="register.php">
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Registrar">
    </form>
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</body>
</html>
