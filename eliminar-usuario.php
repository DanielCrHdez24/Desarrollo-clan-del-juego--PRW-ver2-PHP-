<?php
session_start();
include('config.php');

// Verificar si el usuario es moderador
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'moderador') {
    echo "Acceso denegado.";
    exit;
}

// Verificar que se recibió un ID válido
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir a entero para seguridad
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_usuarios.php");
        exit;
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }
} else {
    echo "ID de usuario no proporcionado.";
}
?>
