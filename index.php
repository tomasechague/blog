<?php

require_once 'Model/User.class.php';
require_once 'Model/Post.class.php';

$usuario = new User();
$usuario->setUsername('Tomas');
$usuario->setEmail('tomiechague@gmail.com');

if($usuario->isValid()){
    echo "El usuario es correcto";
}else{
    var_dump($usuario->getValidator()->getErrors());
}

