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
$usuario2 = User::retrieve(7);
$usuario2->delete();
$usuario3 = User::getElementByUsername('Tomas');
var_dump($usuario3);
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
