<?php
// Iniciar la sesión
session_start();

// Incluir el archivo de configuración para la conexión a la base de datos
include('config.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Encriptar la contraseña antes de guardarla
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Verificar si el email ya está registrado
    $sql_check_email = "SELECT * FROM moderadores WHERE email = '$email'";
    $result = $conn->query($sql_check_email);

    if ($result->num_rows > 0) {
        echo "⚠️ El correo electrónico ya está registrado.";
    } else {
        // Insertar el moderador en la base de datos
        $sql = "INSERT INTO moderadores (nombre, email, password) VALUES ('$nombre', '$email', '$password_hash')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso de moderador.";
            // Opcional: Redirigir a la página de inicio o de login
            header("Location: index.php?page=login");
            exit();
        } else {
            echo "Error al registrar al moderador: " . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();
?>
