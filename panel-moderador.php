<?php
session_start(); 
include('config.php'); 

// Verificar si el moderador está logueado
if (!isset($_SESSION['moderador_id']) || !isset($_SESSION['es_moderador']) || $_SESSION['es_moderador'] !== true) {
    header("Location: login-moderador.php"); 
    exit();
}

// Obtiene la lista de usuarios
$sql = "SELECT id, nombre, email FROM usuarios";
$resultado = $conn->query($sql);
?>

<h1>Bienvenido, <?php echo $_SESSION['moderador_nombre']; ?></h1>
<p>¡Bienvenido al Panel de Moderador!</p>
<link rel="stylesheet" href="styles-pmoderador.css"> 


<!-- Mostrar lista de usuarios -->
<h2>Usuarios registrados:</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($usuario = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$usuario['id']}</td>
                    <td>{$usuario['nombre']}</td>
                    <td>{$usuario['email']}</td>
                    <td>
                        <a href='editar-usuario.php?id={$usuario['id']}'>Editar</a> | 
                        <a href='eliminar-usuario.php?id={$usuario['id']}'>Eliminar</a>
                    </td>
                </tr>";
        }
        ?>
    </tbody>
</table>

<a href="logout.php">Cerrar sesión</a>

<?php
$conn->close();
?>
