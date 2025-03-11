<?php
session_start(); // Inicia la sesión
include('config.php'); // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Buscar en la tabla de moderadores
    $sql = "SELECT id, nombre, password FROM moderadores WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $moderador = $resultado->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $moderador['password'])) {
            $_SESSION['moderador_id'] = $moderador['id'];
            $_SESSION['moderador_nombre'] = $moderador['nombre'];
            $_SESSION['es_moderador'] = true; 
            header("Location: panel-moderador.php"); 
            exit();
        } else {
            echo " Usted ingreso: Contraseña incorrecta.";
        }
    } else {
        echo " Moderador no encontrado.";
    }

    $stmt->close();
}

$conn->close();
?>