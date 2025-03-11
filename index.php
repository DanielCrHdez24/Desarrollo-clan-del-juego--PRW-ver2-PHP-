<?php
// Inicia la sesión
session_start();

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

    <!-- Nav en Header -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=publicaciones">Publicaciones</a></li>
                <li><a href="index.php?page=nueva-publicacion">Añadir Publicación</a></li>
                <li><a href="index.php?page=catalogo-venta">Nuestra Merch</a></li>
                <li><a href="index.php?page=registro">Registrarse</a></li>
                <li><a href="index.php?page=registro-moderador">Registro Moderador</a></li>
                <li><a href="index.php?page=login-moderador">Iniciar Sesión Moderador</a></li>
                <li><a href="index.php?page=login">Iniciar Sesión</a></li>
                <li><a href="index.php?page=logout">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        // Verifica logeo
        if (isset($_SESSION['usuario_nombre'])) {
            echo "¡Bienvenido @" . $_SESSION['usuario_nombre'] . "!";
        } else {
            echo "¡Bienvenido visitante! Inicia sesión o regístrate.";
        }

        // Mostramos la pantalla pasra cada situación
        switch ($page) {
            case 'inicio':
                include 'inicio.html';
                break;
            case 'publicaciones':
                include 'publicaciones.php';
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
            case 'registro-moderador':
                include 'registro-moderadores.html';
                break;
            case 'login':
                include 'login.html';
                break;
            case 'login-moderador':
                include 'login-moderador.html';
                break;
            case 'logout':
                include 'logout.php';
                break;
            default:
                include 'inicio.html'; // Página principal 
                break;
        }
        ?>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2025 El Clan del Juego. Todos los derechos reservados.</p>
        <p>Síguenos en:
            <a href="https://www.facebook.com" target="_blank">Facebook</a> |
            <a href="https://x.com" target="_blank">Twitter/X</a> |
            <a href="https://www.instagram.com" target="_blank">Instagram</a>
        </p>
    </footer>

</body>

</html>