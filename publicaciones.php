<?php
// Incluir el archivo de configuración para la conexión a la base de datos
include('config.php');

// Realizar la consulta para obtener las publicaciones de la base de datos
$sql = "SELECT usuario, contenido FROM publicaciones ORDER BY id DESC"; // Puedes ajustar el orden si es necesario
$resultado = $conn->query($sql);
?>

<div class="publicaciones-lista">
    <?php if ($resultado->num_rows > 0): ?>
        <?php while ($publicacion = $resultado->fetch_assoc()): ?>
            <div class="post">
                <p><?php echo htmlspecialchars($publicacion['contenido']); ?></p>
                <span>Publicado por: <?php echo htmlspecialchars($publicacion['usuario']); ?></span>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hay publicaciones disponibles.</p>
    <?php endif; ?>
</div>

<?php
// Cerrar la conexión
$conn->close();
?>
