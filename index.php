<?php

require_once 'Model/User.php';
require_once 'Model/Post.php';

$usuario = new User();
$usuario->setUsername('Tomas');
$usuario->setEmail('tomiechague@gmail.com');

if($usuario->is_valid()){
    echo "El usuario es correcto";
}else{
    echo "El usuario es incorrecto";
}

