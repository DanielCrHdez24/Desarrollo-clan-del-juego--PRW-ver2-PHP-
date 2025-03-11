<?php
session_start(); // Inicia la sesión
include('config.php');  

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
    
    $contenido = $conn->real_escape_string($_POST["publicacion_contenido"]);

    $validacion = validarPublicacion($contenido);
    if ($validacion !== true) {
        echo $validacion; 
    } else {
        
        $sql = "INSERT INTO publicaciones (usuario, contenido) VALUES ('$usuario', '$contenido')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php?page=publicaciones");
            exit; 
        } else {
            echo "Error al publicar: " . $conn->error;
        }
    }
} else {
    echo "No se recibió contenido para la publicación.";
}


$conn->close();
?>
