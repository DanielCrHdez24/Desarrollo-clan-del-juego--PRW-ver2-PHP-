<?php
session_start();
include('config.php');


if (!isset($_SESSION['moderador_id']) || !isset($_SESSION['es_moderador']) || $_SESSION['es_moderador'] !== true) {
    echo "Acceso denegado.";
    exit;
}

// Verificar que se recibió un ID válido
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id); 

    if ($stmt->execute()) {
        header("Location: admin-usuarios.php");
        exit;
    } else {
        echo "Error al eliminar usuario: " . $stmt->error;
    }

    $stmt->close(); 
} else {
    echo "ID de usuario no proporcionado.";
}

$conn->close(); 
?>