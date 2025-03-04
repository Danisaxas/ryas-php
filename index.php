<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bienvenido a tu página principal, " . $_SESSION['user_name'];

// Aquí puedes agregar más contenido dinámico para el usuario
?>
