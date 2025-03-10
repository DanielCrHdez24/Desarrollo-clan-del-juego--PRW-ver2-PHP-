<?php
// Parámetros de la conexión
$host = 'Localhost'; 
$username = 'root';  
$password = '';      
$dbname = 'el_clan_del_juego'; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos.";
?>
