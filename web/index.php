<?php

require_once __DIR__ . '/../Model/User.class.php';
require_once __DIR__ . '/../Model/Post.class.php';

$usuario = User::retrieveBy('id',11);
$post = Post::retrieveBy('id',1);

die();

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
