<?php
session_start();
include('config.php');

// Verificar si el moderador está logueado
if (!isset($_SESSION['moderador_id']) || !isset($_SESSION['es_moderador']) || $_SESSION['es_moderador'] !== true) {
    echo "Acceso denegado.";
    exit;
}

// Verificar que se recibió un ID válido
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir a entero para seguridad

    // Usar una consulta preparada para eliminar el usuario
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indica que el parámetro es un entero

    if ($stmt->execute()) {
        header("Location: admin-usuarios.php");
        exit;
    } else {
        echo "Error al eliminar usuario: " . $stmt->error;
    }

    $stmt->close(); // Cerrar la declaración
} else {
    echo "ID de usuario no proporcionado.";
}

$conn->close(); // Cerrar la conexión
?>