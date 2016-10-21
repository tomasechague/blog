<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'User.class.php';

$user = new User();
$username = $_POST['username'];
$email = $_POST['email'];
$file = $_FILES['archivo'];

$user->setUsername($username);
$user->setEmail($email);
$user->setAvatarLink($file);
$targetPath =$_SERVER['PHP_SELF']."/web/uploads/";
$targetPath = $targetPath.basename($file['name']);
$result = move_uploaded_file($file['tmp_name'], $targetPath);
die();
$mensaje = "";
if($user->isValid()){
    $user->saveAvatarLink($file['name']);
    $user->setAvatarLink($file['name']);
    $user->save();
    $result = ['code'=>200,'mensaje'=>'El usuario se ha agregado correctamente'];
}else{
    $result = ['code'=>500,'mensaje'=>'El usuario no se ha podido agregar'];
}

header('Content-Type: application/json');
echo json_encode($result);