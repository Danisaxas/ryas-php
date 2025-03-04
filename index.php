<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redirige al login si no está autenticado
    exit();
}

echo "<h1>Bienvenido, " . $_SESSION['user_name'] . "!</h1>";
echo "<p>Has iniciado sesión correctamente.</p>";
echo "<a href='logout.php'>Cerrar sesión</a>";
?>
