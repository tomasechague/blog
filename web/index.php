<?php

require_once __DIR__ . '/../Model/User.class.php';
require_once __DIR__ . '/../Model/Post.class.php';

$usuario = new User();
$usuario->setUsername('Tomas');
$usuario->setEmail('tomiechague@gmail.com');
$usuario->save();
$usuario->setUsername('Manuel');
$usuario->setEmail('manueldelapenna@gmail.com');
$usuario->save();
$usuario2 = User::retrieve(8);
$usuario2->delete();
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
