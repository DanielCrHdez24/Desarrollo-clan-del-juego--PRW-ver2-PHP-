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
        $sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conn->query($sql_check_email);
        if ($result->num_rows > 0) {
            echo "⚠️ El correo electrónico ya está registrado.";
        } else {
            // Insertar el usuario en la base de datos
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password_hash')";
            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso.";
                header("Location: login.php"); // Redirigir al login después de registrar
                exit();
            } else {
                echo "Error al registrar al usuario: " . $conn->error;
            }
        }
    }
}

$conn->close();
?>
