<?php
// Incluir el archivo de configuración para la conexión a la base de datos
include('config.php');

// Verificar si los datos del formulario han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Crear la consulta SQL para insertar los datos
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";

    // Preparar la sentencia SQL
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros a la sentencia
        $stmt->bind_param("sss", $nombre, $email, $password);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Datos guardados correctamente.";
        } else {
            echo "Error al guardar los datos: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
