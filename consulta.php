<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Usuario</title>
</head>
<body>

    <hr>

    <!-- Formulario para consultar usuario -->
    <form class="formulario" action="consultar_user.php" method="POST">
        <div>
            <span class="icon"><i class="bi bi-envelope-at-fill"></i></span>
            <input class="input-user" type="email" name="email" placeholder="Correo electrónico" required />
        </div>
        <div class="link">
            <input class="boton" type="submit" value="Consultar Usuario">
        </div>
    </form>
</body>
</html>
