<?php
session_start();
include('config.php');

// Verificar si el moderador está logueado
if (!isset($_SESSION['moderador_id']) || !isset($_SESSION['es_moderador']) || $_SESSION['es_moderador'] !== true) {
    echo "Acceso denegado.";
    exit;
}

// Obtener datos del usuario a editar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);

    
    $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $nombre, $email, $id); 
    if ($stmt->execute()) {
        header("Location: admin-usuarios.php");
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

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>