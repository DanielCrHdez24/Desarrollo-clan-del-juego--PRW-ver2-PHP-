<?php
// Verifica qué página se está solicitando
$page = isset($_GET['page']) ? $_GET['page'] : 'inicio';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Clan del Juego</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=publicaciones">Publicaciones</a></li>
                <li><a href="index.php?page=nueva-publicacion">Añadir Publicación</a></li>
                <li><a href="index.php?page=catalogo-venta">Nuestra Merch</a></li>
                <li><a href="index.php?page=registro">Registrarse</a></li>
                <li><a href="index.php?page=login">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        // Carga el contenido de la página solicitada
        switch ($page) {
            case 'inicio':
                include 'inicio.html';
                break;
            case 'publicaciones':
                include 'publicaciones.html';
                break;
            case 'crear-publicacion':
                include 'crear-publicacion.php';
                break;
            case 'nueva-publicacion':
                include 'nueva-publicacion.html';
                break;
            case 'catalogo-venta':
                include 'catalogo-venta.php';
                break;
            case 'registro':
                include 'registro.html';
                break;
            case 'login':
                include 'login.html';
                break;
        }

        ?>
    </main>

    <footer>
        <p>&copy; 2025 El Clan del Juego. Todos los derechos reservados.</p>
        <p>Síguenos en:
            <a href="https://www.facebook.com">Facebook</a> |
            <a href="https://x.com">Twitter/X</a> |
            <a href="https://www.instagram.com">Instagram</a>
        </p>
    </footer>

</body>

</html>