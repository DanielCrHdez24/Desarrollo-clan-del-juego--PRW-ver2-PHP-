<?php
// Conexión a la base de datos
include('config.php');


// Verificar que se recibió la publicación
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["publicacion_contenido"])) {
    $contenido = $conexion->real_escape_string($_POST["publicacion_contenido"]);
    $usuario = "@Anonimo"; // Aquí puedes cambiarlo por el usuario autenticado

    // Insertar la publicación en la base de datos
    $sql = "INSERT INTO publicaciones (usuario, contenido) VALUES ('$usuario', '$contenido')";

    if ($conexion->query($sql) === TRUE) {
        echo "Publicación añadida correctamente.";
    } else {
        echo "Error al publicar: " . $conexion->error;
    }
} else {
    echo "No se recibió contenido para la publicación.";
}

$conexion->close();
?>
