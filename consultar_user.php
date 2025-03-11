<?php
//Este documento lo utilice para unas pruebas por cuestiones de posterior consulta decidi no eliminarlo del proyecto
// Parámetros de la conexión
$host = 'localhost'; 
$username = 'root';  
$password = '';      
$dbname = 'el_clan_del_juego'; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el email desde el formulario
$email = $_POST['email'];

// Consulta SQL para verificar si el email existe
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si existe el usuario
if ($result->num_rows > 0) {
    // Si el usuario existe, obtener y mostrar los datos
    $user = $result->fetch_assoc(); // Obtener los datos del usuario

    echo "Usuario encontrado:<br>";
    echo "Nombre: " . $user['nombre'] . "<br>";
    echo "Correo: " . $user['email'] . "<br>";
    echo "Contraseña: " . $user['password'] . "<br>"; 
} else {
    // Si el usuario no existe
    echo "No se encontró ningún usuario con el correo electrónico '$email'.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
