<?php
session_start(); // Inicia la sesión
include('config.php'); // Incluir el archivo de configuración para la base de datos

// Verifica si el usuario está logueado
if (isset($_SESSION['usuario_nombre'])) {
    $usuario = $_SESSION['usuario_nombre']; // Usuario logueado
} else {
    $usuario = '@Anonimo'; // Si no está logueado, poner como anónimo
}

// Verificar si se recibió la publicación
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["publicacion_contenido"])) {
    // Escapar caracteres especiales para evitar SQL Injection
    $contenido = $conn->real_escape_string($_POST["publicacion_contenido"]);

    // Insertar la publicación en la base de datos
    $sql = "INSERT INTO publicaciones (usuario, contenido) VALUES ('$usuario', '$contenido')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario a la página de publicaciones
        header("Location: index.php?page=publicaciones");
        exit; // Importante para evitar que el código continúe ejecutándose
    } else {
        echo "Error al publicar: " . $conn->error;
    }
} else {
    echo "No se recibió contenido para la publicación.";
}

// Cerrar la conexión
$conn->close();
?>
