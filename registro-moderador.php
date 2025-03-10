<?php
// Incluir las validaciones
include('validaciones.php');

// Incluir la conexión a la base de datos
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar los datos
    $validacion = validarRegistroUsuario($nombre, $email, $password);
    if ($validacion !== true) {
        echo $validacion; // Muestra el error si la validación falla
    } else {
        // Si la validación pasa, encriptamos la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Comprobar si el correo ya está registrado
        $sql_check_email = "SELECT * FROM moderadores WHERE email = '$email'";
        $result = $conn->query($sql_check_email);
        if ($result->num_rows > 0) {
            echo "⚠️ El correo electrónico ya está registrado.";
        } else {
            // Insertar el moderador en la base de datos
            $sql = "INSERT INTO moderadores (nombre, email, password) VALUES ('$nombre', '$email', '$password_hash')";
            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso de moderador.";
                header("Location: login-moderador.html"); // Redirigir al login después de registrar
                exit();
            } else {
                echo "Error al registrar al moderador: " . $conn->error;
            }
        }
    }
}

$conn->close();
