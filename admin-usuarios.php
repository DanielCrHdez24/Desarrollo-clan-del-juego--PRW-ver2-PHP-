<?php
session_start();
include('config.php');

// Verificar si el usuario es moderador antes de mostrar la página
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'moderador') {
    echo "Acceso denegado. Solo los moderadores pueden acceder a esta página.";
    exit;
}

// Obtener lista de usuarios
$sql = "SELECT id, nombre, email, rol FROM usuarios";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Administración de Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php while ($usuario = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
            <td>
                <a href="editar-usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a> |
                <a href="eliminar-usuario.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
