<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="formulario" action="insertar_user.php" method="POST">
          <div> <span class="icon"><i class="bi bi-person-fill"></i></span>
              <input class="input-user" type="text" name="nombre" placeholder=" Nombre completo" required />
          </div>
          <div> <span class="icon"><i class="bi bi-envelope-at-fill"></i></span>
              <input class="input-user" type="email" name="email" placeholder=" Correo electrónico" required />
          </div>
         
          <div>
              <span class="icon"><i class="bi bi-key-fill"></i></i></span>
              <input class="input-password" type="password" name="password" placeholder=" Contraseña" required/>
          </div>
        
          <p></p>
          <div class="link">
          <input class="boton" type="submit" value="Registrarse">

          </div>
      </form>
</body>
</html>