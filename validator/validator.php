<?php

//aca van todas las validaciones esenciales 

//only letters
function onlyLetters($in) {
    if (preg_match('/^([a-z ñáéíóú]{2,255})$/i', $in))
        return TRUE;
    else
        return FALSE;
}

//validate username

function validateUsername($username) {
    $errors = array();

    if (strlen($username) == 0) {
        $errors['username'] = "Nombre de usuario es un campo obligatorio";
        return FALSE;
    } else {
        if (!onlyLetters($username)) {
            $errors['username'] = "Solo se permiten letras en el campo nombre de usuario";
            return FALSE;
        }
    }
    return TRUE;
}

//validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


