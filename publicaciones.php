<?php
include('config.php');

$sql = "SELECT usuario, contenido FROM publicaciones ORDER BY id DESC"; 
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

$conn->close();
?>
