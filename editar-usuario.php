<?php
session_start();
include('config.php');

// Verificar si el usuario es moderador
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'moderador') {
    echo "Acceso denegado.";
    exit;
}

// Obtener datos del usuario a editar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegurar que es un número
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conn->query($sql);
    
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}

// Procesar el formulario de edición
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $rol = $conn->real_escape_string($_POST['rol']);

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', rol='$rol' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_usuarios.php");
        exit;
    } else {
        echo "Error al actualizar usuario: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required><br>

        <label>Rol:</label>
        <select name="rol">
            <option value="usuario" <?php echo ($usuario['rol'] === 'usuario') ? 'selected' : ''; ?>>Usuario</option>
            <option value="moderador" <?php echo ($usuario['rol'] === 'moderador') ? 'selected' : ''; ?>>Moderador</option>
        </select><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
