<?php
//Este documento lo utilice de posterior consulta y decidi no eliminarlo del proyecto

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'el_clan_del_juego'; 

// Crear la conexión con manejo de excepciones
try {
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }
    
    // Verificar si el formulario fue enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Encriptar la contraseña antes de guardarla 
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $password_hash);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    }

} catch (Exception $e) {
    // Manejar el error
    die("Error: " . $e->getMessage());
}

// Cerrar la conexión 
$conn->close();
?>
