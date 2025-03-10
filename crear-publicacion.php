<?php
// Incluir el archivo de configuración para la conexión a la base de datos
include('config.php');

// Verificar que se recibió la publicación
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["publicacion_contenido"])) {
    // Escapar caracteres especiales para evitar SQL Injection
    $contenido = $conn->real_escape_string($_POST["publicacion_contenido"]);
    $usuario = "@Anonimo"; // Aquí puedes cambiarlo por el usuario autenticado

    // Insertar la publicación en la base de datos
    $sql = "INSERT INTO publicaciones (usuario, contenido) VALUES ('$usuario', '$contenido')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario a la página principal o a otra página después de insertar
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
