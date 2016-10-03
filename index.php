<?php

require_once 'Model/User.class.php';
require_once 'Model/Post.class.php';

$usuario = new User();
$usuario->setUsername('Tomas');
$usuario->setEmail('tomiechague@gmail.com');

$publicacion = new Post();
$publicacion->setTitle('Aprendiendo OOP');
$publicacion->setContent('Esto es una prueba de programacion orientada a objetos');
$publicacion->setUserId('Tomas');

if($usuario->isValid()){
    echo "El usuario es correcto";
}else{
    var_dump($usuario->getValidator()->getErrors());
}

if($publicacion->isValid()){
    echo "El usuario es correcto";
}else{
    var_dump($usuario->getValidator()->getErrors());
}
