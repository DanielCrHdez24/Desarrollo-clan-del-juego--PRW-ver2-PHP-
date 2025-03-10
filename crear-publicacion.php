<?php
session_start(); // Inicia la sesión
include('config.php');  // Conexión a la base de datos

// Verifica si el usuario está logueado
if (isset($_SESSION['usuario_nombre'])) {
    $usuario = $_SESSION['usuario_nombre']; // Usuario logueado
} else {
    $usuario = '@Anonimo'; // Si no está logueado, poner como anónimo
}

// Incluir las funciones de validación
include('validaciones.php');

// Verificar si se recibió la publicación
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["publicacion_contenido"])) {
    // Escapar caracteres especiales para evitar SQL Injection
    $contenido = $conn->real_escape_string($_POST["publicacion_contenido"]);

    // Validar el contenido de la publicación
    $validacion = validarPublicacion($contenido);
    if ($validacion !== true) {
        echo $validacion; // Muestra el error si la validación falla
    } else {
        // Si la validación pasa, insertar la publicación
        $sql = "INSERT INTO publicaciones (usuario, contenido) VALUES ('$usuario', '$contenido')";

        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario a la página de publicaciones
            header("Location: index.php?page=publicaciones");
            exit; // Evita que el código siga ejecutándose
        } else {
            echo "Error al publicar: " . $conn->error;
        }
    }
} else {
    echo "No se recibió contenido para la publicación.";
}

// Cerrar la conexión
$conn->close();
?>

<!-- Formulario de publicación -->
<h1>Cuéntanos...</h1>
<form id="formPublicacion" action="crear-publicacion.php" method="post">
    <textarea id="publicacion_contenido" name="publicacion_contenido" placeholder="Escribe aquí tu publicación..." required></textarea>
    <button type="submit">Añadir Publicación</button>
</form>
