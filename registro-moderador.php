<?php
include('validaciones.php');

include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validacion = validarRegistroUsuario($nombre, $email, $password);
    if ($validacion !== true) {
        echo $validacion; 
    } else {
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql_check_email = "SELECT * FROM moderadores WHERE email = '$email'";
        $result = $conn->query($sql_check_email);
        if ($result->num_rows > 0) {
            echo " El correo electrónico ya está registrado.";
        } else {
            
            $sql = "INSERT INTO moderadores (nombre, email, password) VALUES ('$nombre', '$email', '$password_hash')";
            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso de moderador.";
                header("Location: index.php"); 
                exit();
            } else {
                echo "Error al registrar al moderador: " . $conn->error;
            }
        }
    }
}

$conn->close();
