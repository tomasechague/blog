<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'User.class.php';

$user = new User();
$username = $_GET['username'];
$email = $_GET['email'];

$user->setUsername($username);
$user->setEmail($email);

$mensaje = "";
if($user->isValid()){
    $user->save();
    $result = ['code'=>200,'mensaje'=>'El usuario se ha agregado correctamente'];
}else{
    $result = ['code'=>500,'mensaje'=>'El usuario no se ha podido agregar'];
}

header('Content-Type: application/json');
echo json_encode($result);