<?php // header.php ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Clan del Juego</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php" data-screen="inicio">Inicio</a></li>
                <li><a href="publicaciones.php" data-screen="publicaciones">Publicaciones</a></li>
                <li><a href="procesar_publicacion" data-screen="crear-publicacion">Añadir Publicación</a></li>
                <li><a href="index.php?screen=catalogo-venta" data-screen="catalogo-venta">Nuestra Merch</a></li>
                <li><a href="index.php?screen=registro-moderadores" data-screen="registro-moderadores">Registrarse como Moderador</a></li>
                <li><a href="index.php?screen=registro" data-screen="registro">Registrarse</a></li>
                <li><a href="index.php?screen=login" data-screen="login">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>