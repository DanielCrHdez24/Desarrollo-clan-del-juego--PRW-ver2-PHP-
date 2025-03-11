<?php

function validarRegistroUsuario($nombre, $email, $password) {
    if (empty($nombre) || empty($email) || empty($password)) {
        return "Todos los campos son obligatorios.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "El correo electrónico no es válido.";
    }

    if (strlen($password) < 6) {
        return "La contraseña debe tener al menos 6 caracteres.";
    }

    return true; 
}

function validarPublicacion($contenido) {
    if (empty($contenido)) {
        return "La publicación no puede estar vacía.";
    }

    if (strlen($contenido) < 10) {
        return "La publicación debe tener al menos 10 caracteres.";
    }

    return true;
}

?>
